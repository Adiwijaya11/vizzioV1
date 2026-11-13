<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in') === true && in_array(session('user_role'), ['admin', 'super_admin'], true)) {
            return redirect('/admin/dashboard');
        }

        return response()
            ->view('auth.login')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, private')
            ->header('Pragma', 'no-cache')
            ->header('X-Frame-Options', 'DENY')
            ->header('X-Content-Type-Options', 'nosniff');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email:rfc', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Email atau kata sandi tidak valid.',
        ]);

        $email = mb_strtolower(trim($validated['email']));
        $password = $validated['password'];
        $ip = (string) $request->ip();

        $accountKey = 'admin-login:' . Str::transliterate($email . '|' . $ip);
        $ipKey = 'admin-login-ip:' . $ip;

        if (RateLimiter::tooManyAttempts($accountKey, 5)) {
            $seconds = RateLimiter::availableIn($accountKey);
            $this->recordAudit($request, null, $email, 'LOGIN_THROTTLED', "Login diblokir sementara untuk {$email} (sisa {$seconds} detik).");

            return back()
                ->withInput($request->only('email'))
                ->with('error', "Terlalu banyak percobaan login. Silakan coba lagi dalam {$seconds} detik.");
        }

        if (RateLimiter::tooManyAttempts($ipKey, 20)) {
            $seconds = RateLimiter::availableIn($ipKey);

            return back()
                ->withInput($request->only('email'))
                ->with('error', "Aktivitas mencurigakan terdeteksi. Coba lagi dalam {$seconds} detik.");
        }

        // 1. Cek kredensial dari .env (config/admin.php) terlebih dahulu
        $envAuth = $this->authenticateFromEnv($email, $password);
        if ($envAuth !== null) {
            return $this->completeLogin($request, $accountKey, $ipKey, $envAuth);
        }

        // 2. Cek database MySQL menggunakan Eloquent parameterized query (anti SQL Injection)
        try {
            $user = User::where('email', $email)->first();
            if ($user && in_array($user->role, ['admin', 'super_admin'], true) && Hash::check($password, $user->password)) {
                return $this->completeLogin($request, $accountKey, $ipKey, [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'user_role' => $user->role,
                ]);
            }
        } catch (\Throwable $e) {
            // Jangan bocorkan detail error database ke pengguna
        }

        // Catat percobaan gagal (brute-force protection)
        RateLimiter::hit($accountKey, 300);
        RateLimiter::hit($ipKey, 60);

        $this->recordAudit($request, null, $email, 'LOGIN_FAILED', "Percobaan login gagal untuk email {$email}.");

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Email atau kata sandi tidak valid.');
    }

    public function logout(Request $request)
    {
        if (session('admin_logged_in')) {
            $this->recordAudit(
                $request,
                session('user_id'),
                session('user_name', 'Admin'),
                'LOGOUT',
                'Logout dari panel admin.'
            );
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    private function authenticateFromEnv(string $email, string $password): ?array
    {
        foreach (['super_admin', 'admin'] as $role) {
            $account = config("admin.{$role}");
            if (! is_array($account)) {
                continue;
            }

            $configuredEmail = mb_strtolower(trim((string) ($account['email'] ?? '')));
            $configuredPassword = (string) ($account['password'] ?? '');

            if ($configuredEmail === '' || $configuredPassword === '') {
                continue;
            }

            if (! hash_equals($configuredEmail, $email)) {
                continue;
            }

            $matches = Hash::isHashed($configuredPassword)
                ? Hash::check($password, $configuredPassword)
                : hash_equals($configuredPassword, $password);

            if ($matches) {
                return [
                    'user_id' => null,
                    'user_name' => (string) ($account['name'] ?? ($role === 'super_admin' ? 'Super Admin VizzioCraft' : 'Admin VizzioCraft')),
                    'user_email' => $configuredEmail,
                    'user_role' => $role,
                ];
            }
        }

        return null;
    }

    private function completeLogin(Request $request, string $accountKey, string $ipKey, array $identity)
    {
        RateLimiter::clear($accountKey);
        RateLimiter::clear($ipKey);

        // Regenerate session ID untuk mencegah Session Fixation
        $request->session()->regenerate();

        session([
            'admin_logged_in' => true,
            'user_id' => $identity['user_id'],
            'user_name' => $identity['user_name'],
            'user_email' => $identity['user_email'],
            'user_role' => $identity['user_role'],
            'login_ip' => (string) $request->ip(),
            'login_at' => now()->toIso8601String(),
        ]);

        $this->recordAudit(
            $request,
            $identity['user_id'],
            $identity['user_name'],
            'LOGIN_SUCCESS',
            "Login berhasil sebagai {$identity['user_role']} ({$identity['user_email']})."
        );

        return redirect()->intended('/admin/dashboard');
    }

    private function recordAudit(Request $request, ?int $userId, string $userName, string $action, string $description): void
    {
        try {
            AuditLog::create([
                'user_id' => $userId,
                'user_name' => mb_substr($userName, 0, 255),
                'action' => $action,
                'description' => $description,
                'ip_address' => (string) $request->ip(),
                'user_agent' => mb_substr((string) $request->userAgent(), 0, 255),
            ]);
        } catch (\Throwable $e) {
            // Abaikan jika tabel audit_logs belum tersedia
        }
    }
}

