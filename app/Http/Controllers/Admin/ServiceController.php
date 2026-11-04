<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $services = Service::orderBy('id')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'price'       => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'content'     => 'nullable|string',
            'badge'       => 'nullable|string|max:100',
            'features'    => 'nullable|string', // newline separated
            'icon'        => 'nullable|string|max:50',
            'status'      => 'required|in:active,inactive',
        ]);

        $featuresArr = [];
        if (!empty($validated['features'])) {
            $featuresArr = array_values(array_filter(array_map('trim', explode("\n", $validated['features']))));
        }

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug ?: 'service';
        $count = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $service = Service::create([
            'title'       => $validated['title'],
            'slug'        => $slug,
            'price'       => $validated['price'],
            'category'    => $validated['category'],
            'description' => $validated['description'],
            'content'     => $validated['content'] ?? null,
            'badge'       => $validated['badge'],
            'features'    => $featuresArr,
            'icon'        => $validated['icon'] ?: 'code',
            'status'      => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'create_service',
            'description' => "Menambahkan katalog layanan: '{$service->title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan digital berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'price'       => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'content'     => 'nullable|string',
            'badge'       => 'nullable|string|max:100',
            'features'    => 'nullable|string',
            'icon'        => 'nullable|string|max:50',
            'status'      => 'required|in:active,inactive',
        ]);

        $featuresArr = [];
        if (!empty($validated['features'])) {
            $featuresArr = array_values(array_filter(array_map('trim', explode("\n", $validated['features']))));
        }

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug ?: 'service';
        $count = 1;
        while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $service->update([
            'title'       => $validated['title'],
            'slug'        => $slug,
            'price'       => $validated['price'],
            'category'    => $validated['category'],
            'description' => $validated['description'],
            'content'     => $validated['content'] ?? null,
            'badge'       => $validated['badge'],
            'features'    => $featuresArr,
            'icon'        => $validated['icon'] ?: $service->icon,
            'status'      => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_service',
            'description' => "Memperbarui katalog layanan: '{$service->title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan digital berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $service = Service::findOrFail($id);
        $title = $service->title;
        $service->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_service',
            'description' => "Menghapus katalog layanan: '{$title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan digital berhasil dihapus!');
    }
}
