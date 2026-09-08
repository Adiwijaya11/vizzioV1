<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::query();

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('company', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('message', 'like', "%{$s}%");
            });
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $leads = $query->latest()->paginate(10)->withQueryString();
        $newCount = Lead::where('status', 'new')->count();
        $proposalCount = Lead::where('status', 'proposal')->count();
        $wonCount = Lead::where('status', 'won')->count();

        return view('admin.leads.index', compact('leads', 'newCount', 'proposalCount', 'wonCount'));
    }

    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        return view('admin.leads.show', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $status = $request->input('status', 'qualified');
        $lead->status = $status;
        $lead->contacted_at = now();
        $lead->save();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_lead_status',
            'description' => "Memperbarui status penawaran klien '{$lead->name}' ({$lead->company}) menjadi {$status}.",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->back()->with('success', "Status penawaran berhasil diubah menjadi {$status}!");
    }

    public function destroy(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $client = $lead->name;
        $lead->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_lead',
            'description' => "Menghapus penawaran prospek '{$client}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.leads.index')->with('success', 'Data penawaran berhasil dihapus!');
    }
}
