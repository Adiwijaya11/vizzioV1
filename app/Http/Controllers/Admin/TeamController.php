<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::latest()->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'role'   => 'required|string|max:255',
            'dept'   => 'required|string|max:100',
            'bio'    => 'required|string',
            'image'  => 'nullable|url',
            'tag'    => 'nullable|string|max:100',
            'email'  => 'nullable|email',
            'status' => 'required|in:active,inactive',
        ]);

        $member = TeamMember::create([
            'name'   => $validated['name'],
            'role'   => $validated['role'],
            'dept'   => $validated['dept'],
            'bio'    => $validated['bio'],
            'image'  => $validated['image'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
            'tag'    => $validated['tag'],
            'email'  => $validated['email'],
            'status' => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'create_team',
            'description' => "Menambahkan anggota tim: '{$member->name}' ({$member->role})",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'role'   => 'required|string|max:255',
            'dept'   => 'required|string|max:100',
            'bio'    => 'required|string',
            'image'  => 'nullable|url',
            'tag'    => 'nullable|string|max:100',
            'email'  => 'nullable|email',
            'status' => 'required|in:active,inactive',
        ]);

        $member->update($validated);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_team',
            'description' => "Memperbarui profil anggota tim: '{$member->name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Data anggota tim berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);
        $name = $member->name;
        $member->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_team',
            'description' => "Menghapus anggota tim: '{$name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil dihapus!');
    }
}
