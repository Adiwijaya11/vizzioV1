<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // Enforce Super Admin role for all user management
    }

    private function ensureSuperAdmin()
    {
        if (session('user_role') !== 'super_admin') {
            abort(403, 'Akses terbatas. Halaman ini hanya dapat diakses oleh Super Admin.');
        }
    }

    public function index(Request $request)
    {
        $this->ensureSuperAdmin();

        $query = User::query();

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%");
            });
        }

        if ($request->filled('role') && $request->input('role') !== 'all') {
            $query->where('role', $request->input('role'));
        }

        $users = $query->orderByRaw("FIELD(role, 'super_admin', 'admin')")->latest()->paginate(10)->withQueryString();
        $totalUsers = User::count();
        $superAdminCount = User::where('role', 'super_admin')->count();
        $adminCount = User::where('role', 'admin')->count();

        return view('admin.users.index', compact('users', 'totalUsers', 'superAdminCount', 'adminCount'));
    }

    public function create()
    {
        $this->ensureSuperAdmin();
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->ensureSuperAdmin();

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:super_admin,admin',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Super Admin'),
            'action'      => 'create_user',
            'description' => "Menambahkan akun administrator baru: '{$user->name}' ({$user->email}) dengan role {$user->role}.",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.users.index')->with('success', "Administrator {$user->name} berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $this->ensureSuperAdmin();
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->ensureSuperAdmin();
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:super_admin,admin',
        ]);

        $user->update($validated);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Super Admin'),
            'action'      => 'update_user',
            'description' => "Memperbarui profil administrator: '{$user->name}' ({$user->email}) role {$user->role}.",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.users.index')->with('success', "Data administrator {$user->name} berhasil diperbarui!");
    }

    public function resetPasswordView()
    {
        $this->ensureSuperAdmin();
        $users = User::all();
        return view('admin.users.reset-password', compact('users'));
    }

    public function resetPassword(Request $request)
    {
        $this->ensureSuperAdmin();

        $validated = $request->validate([
            'user_id'  => 'required|exists:users,id',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($validated['user_id']);
        $user->password = Hash::make($validated['password']);
        $user->save();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Super Admin'),
            'action'      => 'reset_password',
            'description' => "Mereset kata sandi administrator: '{$user->name}' ({$user->email}).",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.users.index')->with('success', "Kata sandi untuk {$user->name} berhasil diperbarui!");
    }

    public function destroy(Request $request, $id)
    {
        $this->ensureSuperAdmin();

        if ((int) $id === (int) session('user_id')) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri yang sedang aktif digunakan.');
        }

        $user = User::findOrFail($id);
        $name = $user->name;
        $user->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Super Admin'),
            'action'      => 'delete_user',
            'description' => "Menghapus akun administrator: '{$name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.users.index')->with('success', "Akun administrator {$name} berhasil dihapus!");
    }
}
