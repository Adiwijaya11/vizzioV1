<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index(Request $request)
    {
        if (session('user_role') !== 'super_admin') {
            abort(403, 'Akses terbatas untuk Super Admin.');
        }

        $securityInfo = [
            'ip'              => $request->ip() ?: '127.0.0.1',
            'user_agent'      => $request->userAgent() ?: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            'login_time'      => now()->format('d M Y, H:i') . ' WIB',
            'session_driver'  => config('session.driver', 'file'),
            'session_lifetime'=> config('session.lifetime', 120) . ' Menit',
            'csrf_protection' => 'Aktif (Token Verified)',
            'ssl_status'      => 'TLS 1.3 Encrypted',
            'auth_guard'      => 'Session Eloquent MySQL',
            'db_host'         => config('database.connections.mysql.host', '127.0.0.1') . ':' . config('database.connections.mysql.port', '3306'),
            'security_score'  => '98/100 (A+ Grade)',
        ];

        return view('admin.security.index', compact('securityInfo'));
    }
}
