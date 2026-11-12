<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TipController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $query = Tip::query();

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = trim($request->search);
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('badge', 'like', "%{$s}%")
                  ->orWhere('summary', 'like', "%{$s}%")
                  ->orWhere('outcome', 'like', "%{$s}%");
            });
        }

        $tips = $query->orderBy('order')->orderBy('id')->paginate(12)->withQueryString();

        $stats = [
            'total'      => Tip::count(),
            'active'     => Tip::where('status', 'active')->count(),
            'categories' => Tip::distinct('category')->count('category'),
        ];

        $categories = Tip::CATEGORIES;

        return view('admin.tips.index', compact('tips', 'stats', 'categories'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $categories = Tip::CATEGORIES;
        return view('admin.tips.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|in:' . implode(',', array_keys(Tip::CATEGORIES)),
            'badge'       => 'nullable|string|max:100',
            'summary'     => 'required|string',
            'summary_en'  => 'nullable|string',
            'steps'       => 'required|string', // newline separated steps
            'outcome'     => 'nullable|string|max:255',
            'outcome_en'  => 'nullable|string|max:255',
            'read_time'   => 'nullable|string|max:50',
            'order'       => 'nullable|integer',
            'status'      => 'required|in:active,inactive',
        ]);

        $stepsArr = array_values(array_filter(array_map('trim', explode("\n", $validated['steps']))));

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug ?: 'playbook';
        $count = 1;
        while (Tip::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $tip = Tip::create([
            'title'      => $validated['title'],
            'slug'       => $slug,
            'category'   => $validated['category'],
            'badge'      => $validated['badge'] ?: strtoupper(Tip::CATEGORIES[$validated['category']]['id'] ?? $validated['category']),
            'summary'    => $validated['summary'],
            'summary_en' => $validated['summary_en'] ?? null,
            'steps'      => $stepsArr,
            'outcome'    => $validated['outcome'] ?? null,
            'outcome_en' => $validated['outcome_en'] ?? null,
            'read_time'  => $validated['read_time'] ?: '4 Menit Baca',
            'order'      => $validated['order'] ?? (Tip::max('order') + 1),
            'status'     => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'create_tip',
            'description' => "Menambahkan playbook rekayasa baru: '{$tip->title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.tips.index')->with('success', "Playbook '{$tip->title}' berhasil ditambahkan ke katalog tips!");
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $tip = Tip::findOrFail($id);
        $categories = Tip::CATEGORIES;

        return view('admin.tips.edit', compact('tip', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $tip = Tip::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|in:' . implode(',', array_keys(Tip::CATEGORIES)),
            'badge'       => 'nullable|string|max:100',
            'summary'     => 'required|string',
            'summary_en'  => 'nullable|string',
            'steps'       => 'required|string',
            'outcome'     => 'nullable|string|max:255',
            'outcome_en'  => 'nullable|string|max:255',
            'read_time'   => 'nullable|string|max:50',
            'order'       => 'nullable|integer',
            'status'      => 'required|in:active,inactive',
        ]);

        $stepsArr = array_values(array_filter(array_map('trim', explode("\n", $validated['steps']))));

        $tip->update([
            'title'      => $validated['title'],
            'category'   => $validated['category'],
            'badge'      => $validated['badge'] ?: strtoupper(Tip::CATEGORIES[$validated['category']]['id'] ?? $validated['category']),
            'summary'    => $validated['summary'],
            'summary_en' => $validated['summary_en'] ?? null,
            'steps'      => $stepsArr,
            'outcome'    => $validated['outcome'] ?? null,
            'outcome_en' => $validated['outcome_en'] ?? null,
            'read_time'  => $validated['read_time'] ?: '4 Menit Baca',
            'order'      => $validated['order'] ?? $tip->order,
            'status'     => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_tip',
            'description' => "Memperbarui playbook: '{$tip->title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.tips.index')->with('success', "Playbook '{$tip->title}' berhasil diperbarui!");
    }

    public function destroy(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $tip = Tip::findOrFail($id);
        $title = $tip->title;
        $tip->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_tip',
            'description' => "Menghapus playbook: '{$title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.tips.index')->with('success', "Playbook '{$title}' berhasil dihapus!");
    }
}

