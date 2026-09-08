<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        if (session('user_role') !== 'super_admin') {
            abort(403, 'Akses terbatas untuk Super Admin.');
        }

        $query = AuditLog::query();

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('user_name', 'like', "%{$s}%")
                  ->orWhere('action', 'like', "%{$s}%")
                  ->orWhere('description', 'like', "%{$s}%")
                  ->orWhere('ip_address', 'like', "%{$s}%");
            });
        }

        if ($request->filled('action') && $request->input('action') !== 'all') {
            $query->where('action', $request->input('action'));
        }

        $logs = $query->latest()->paginate(15)->withQueryString();
        $totalLogs = AuditLog::count();

        return view('admin.logs.index', compact('logs', 'totalLogs'));
    }
}
