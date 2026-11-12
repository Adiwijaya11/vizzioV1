<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $query = Technology::query();

        // Filter category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Filter status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search query
        if ($request->filled('search')) {
            $s = trim($request->search);
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('role', 'like', "%{$s}%")
                  ->orWhere('version', 'like', "%{$s}%")
                  ->orWhere('use_case', 'like', "%{$s}%")
                  ->orWhere('description', 'like', "%{$s}%");
            });
        }

        $technologies = $query->orderBy('order')->orderBy('id')->paginate(12)->withQueryString();

        $stats = [
            'total'      => Technology::count(),
            'active'     => Technology::where('status', 'active')->count(),
            'featured'   => Technology::where('is_featured', true)->count(),
            'categories' => Technology::distinct('category')->count('category'),
        ];

        $categories = Technology::CATEGORIES;

        return view('admin.technologies.index', compact('technologies', 'stats', 'categories'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $categories = Technology::CATEGORIES;
        return view('admin.technologies.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $validated = $request->validate([
            'name'               => 'required|string|max:255',
            'category'           => 'required|string|in:' . implode(',', array_keys(Technology::CATEGORIES)),
            'version'            => 'nullable|string|max:100',
            'role'               => 'required|string|max:255',
            'description'        => 'required|string',
            'description_en'     => 'nullable|string',
            'image_file'         => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:3072',
            'image_url'          => 'nullable|string|max:1000',
            'features'           => 'nullable|string', // newline separated or comma separated
            'use_case'           => 'nullable|string',
            'performance_metric' => 'nullable|string|max:100',
            'official_url'       => 'nullable|url|max:255',
            'order'              => 'nullable|integer',
            'status'             => 'required|in:active,inactive',
            'is_featured'        => 'nullable|boolean',
        ]);

        // Features parsing
        $featuresArr = [];
        if (!empty($validated['features'])) {
            $rawFeatures = preg_split('/[\r\n,]+/', $validated['features']);
            $featuresArr = array_values(array_filter(array_map('trim', $rawFeatures)));
        }

        // Image handling: prioritize uploaded file, fallback to URL, then default devicon/svg
        $imageUrl = $validated['image_url'] ?? null;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $uploadDir = public_path('uploads/technologies');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imageUrl = '/uploads/technologies/' . $filename;
        }

        if (empty($imageUrl)) {
            $imageUrl = 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/devicon/devicon-original.svg';
        }

        // Slug generation
        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug ?: 'tech';
        $count = 1;
        while (Technology::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $categoryMeta = Technology::CATEGORIES[$validated['category']] ?? [
            'id' => ucfirst($validated['category']),
            'en' => ucfirst($validated['category']),
        ];

        $technology = Technology::create([
            'name'               => $validated['name'],
            'slug'               => $slug,
            'category'           => $validated['category'],
            'category_label_id'  => $categoryMeta['id'],
            'category_label_en'  => $categoryMeta['en'],
            'version'            => $validated['version'] ?? null,
            'role'               => $validated['role'],
            'description'        => $validated['description'],
            'description_en'     => $validated['description_en'] ?? null,
            'image'              => $imageUrl,
            'features'           => $featuresArr,
            'use_case'           => $validated['use_case'] ?? null,
            'performance_metric' => $validated['performance_metric'] ?? null,
            'official_url'       => $validated['official_url'] ?? null,
            'order'              => $validated['order'] ?? (Technology::max('order') + 1),
            'is_featured'        => $request->boolean('is_featured', true),
            'status'             => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'create_technology',
            'description' => "Menambahkan stack teknologi baru: '{$technology->name}' ({$technology->category})",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.technologies.index')->with('success', "Teknologi '{$technology->name}' berhasil ditambahkan ke katalog rekayasa!");
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $technology = Technology::findOrFail($id);
        $categories = Technology::CATEGORIES;

        return view('admin.technologies.edit', compact('technology', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $technology = Technology::findOrFail($id);

        $validated = $request->validate([
            'name'               => 'required|string|max:255',
            'category'           => 'required|string|in:' . implode(',', array_keys(Technology::CATEGORIES)),
            'version'            => 'nullable|string|max:100',
            'role'               => 'required|string|max:255',
            'description'        => 'required|string',
            'description_en'     => 'nullable|string',
            'image_file'         => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:3072',
            'image_url'          => 'nullable|string|max:1000',
            'features'           => 'nullable|string',
            'use_case'           => 'nullable|string',
            'performance_metric' => 'nullable|string|max:100',
            'official_url'       => 'nullable|url|max:255',
            'order'              => 'nullable|integer',
            'status'             => 'required|in:active,inactive',
            'is_featured'        => 'nullable|boolean',
        ]);

        // Features parsing
        $featuresArr = [];
        if (!empty($validated['features'])) {
            $rawFeatures = preg_split('/[\r\n,]+/', $validated['features']);
            $featuresArr = array_values(array_filter(array_map('trim', $rawFeatures)));
        }

        // Image handling
        $imageUrl = $technology->image;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $uploadDir = public_path('uploads/technologies');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imageUrl = '/uploads/technologies/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imageUrl = $validated['image_url'];
        }

        $categoryMeta = Technology::CATEGORIES[$validated['category']] ?? [
            'id' => ucfirst($validated['category']),
            'en' => ucfirst($validated['category']),
        ];

        $technology->update([
            'name'               => $validated['name'],
            'category'           => $validated['category'],
            'category_label_id'  => $categoryMeta['id'],
            'category_label_en'  => $categoryMeta['en'],
            'version'            => $validated['version'] ?? null,
            'role'               => $validated['role'],
            'description'        => $validated['description'],
            'description_en'     => $validated['description_en'] ?? null,
            'image'              => $imageUrl,
            'features'           => $featuresArr,
            'use_case'           => $validated['use_case'] ?? null,
            'performance_metric' => $validated['performance_metric'] ?? null,
            'official_url'       => $validated['official_url'] ?? null,
            'order'              => $validated['order'] ?? $technology->order,
            'is_featured'        => $request->boolean('is_featured', true),
            'status'             => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_technology',
            'description' => "Memperbarui stack teknologi: '{$technology->name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.technologies.index')->with('success', "Teknologi '{$technology->name}' berhasil diperbarui!");
    }

    public function destroy(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $technology = Technology::findOrFail($id);
        $name = $technology->name;
        $technology->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_technology',
            'description' => "Menghapus teknologi dari katalog: '{$name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.technologies.index')->with('success', "Teknologi '{$name}' berhasil dihapus dari katalog!");
    }
}

