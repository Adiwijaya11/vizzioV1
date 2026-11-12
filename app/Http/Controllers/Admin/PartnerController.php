<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $query = Partner::query();

        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = trim($request->search);
            $query->where('name', 'like', "%{$s}%");
        }

        $partners = $query->orderBy('order')->orderBy('name')->paginate(16)->withQueryString();

        $stats = [
            'total'   => Partner::count(),
            'active'  => Partner::where('status', 'active')->count(),
            'clients' => Partner::where('type', 'client')->count(),
            'partners'=> Partner::where('type', 'partner')->count(),
        ];

        return view('admin.partners.index', compact('partners', 'stats'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'type'        => 'required|in:client,partner',
            'logo_file'   => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:3072',
            'logo_url'    => 'nullable|string|max:1000',
            'website_url' => 'nullable|url|max:255',
            'order'       => 'nullable|integer',
            'status'      => 'required|in:active,inactive',
        ]);

        // Logo handling
        $logoUrl = $validated['logo_url'] ?? null;
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $uploadDir = public_path('uploads/partners');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $logoUrl = '/uploads/partners/' . $filename;
        }

        if (empty($logoUrl)) {
            $logoUrl = 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.svg';
        }

        // Slug generation
        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug ?: 'partner';
        $count = 1;
        while (Partner::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $partner = Partner::create([
            'name'        => $validated['name'],
            'slug'        => $slug,
            'logo'        => $logoUrl,
            'type'        => $validated['type'],
            'website_url' => $validated['website_url'] ?? null,
            'order'       => $validated['order'] ?? (Partner::max('order') + 1),
            'status'      => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'create_partner',
            'description' => "Menambahkan mitra/klien baru: '{$partner->name}' ({$partner->type})",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.partners.index')->with('success', "Mitra/Klien '{$partner->name}' berhasil ditambahkan!");
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $partner = Partner::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'type'        => 'required|in:client,partner',
            'logo_file'   => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:3072',
            'logo_url'    => 'nullable|string|max:1000',
            'website_url' => 'nullable|url|max:255',
            'order'       => 'nullable|integer',
            'status'      => 'required|in:active,inactive',
        ]);

        $logoUrl = $partner->logo;
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $uploadDir = public_path('uploads/partners');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $logoUrl = '/uploads/partners/' . $filename;
        } elseif ($request->filled('logo_url')) {
            $logoUrl = $validated['logo_url'];
        }

        $partner->update([
            'name'        => $validated['name'],
            'logo'        => $logoUrl,
            'type'        => $validated['type'],
            'website_url' => $validated['website_url'] ?? null,
            'order'       => $validated['order'] ?? $partner->order,
            'status'      => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_partner',
            'description' => "Memperbarui mitra/klien: '{$partner->name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.partners.index')->with('success', "Mitra/Klien '{$partner->name}' berhasil diperbarui!");
    }

    public function destroy(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $partner = Partner::findOrFail($id);
        $name = $partner->name;
        $partner->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_partner',
            'description' => "Menghapus mitra/klien: '{$name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.partners.index')->with('success', "Mitra/Klien '{$name}' berhasil dihapus!");
    }
}

