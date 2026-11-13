<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('user_role') !== 'super_admin') {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden.'], 403);
            }

            return redirect()->route('admin.dashboard')->with('error', 'Akses ditolak. Halaman ini khusus Super Admin.');
        }

        return $next($request);
    }
}

