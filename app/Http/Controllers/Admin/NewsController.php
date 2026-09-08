<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsArticle::query();

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('title_id', 'like', "%{$s}%")
                  ->orWhere('title_en', 'like', "%{$s}%")
                  ->orWhere('desc_id', 'like', "%{$s}%");
            });
        }

        if ($request->filled('category') && $request->input('category') !== 'all') {
            $query->where('category', $request->input('category'));
        }

        $articles = $query->latest('published_at')->paginate(10)->withQueryString();
        $categories = NewsArticle::select('category', 'category_label_id')->distinct()->get();

        return view('admin.news.index', compact('articles', 'categories'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_id'          => 'required|string|max:255',
            'category'          => 'required|string',
            'category_label_id' => 'required|string',
            'desc_id'           => 'required|string',
            'content_id'        => 'nullable|string',
            'image'             => 'nullable|url',
            'status'            => 'required|in:published,draft',
        ]);

        $slug = Str::slug($validated['title_id']);
        // Ensure unique slug
        $originalSlug = $slug;
        $count = 1;
        while (NewsArticle::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $article = NewsArticle::create([
            'title_id'          => $validated['title_id'],
            'slug'              => $slug,
            'category'          => $validated['category'],
            'category_label_id' => $validated['category_label_id'],
            'category_label_en' => ucfirst($validated['category']),
            'desc_id'           => $validated['desc_id'],
            'content_id'        => $validated['content_id'] ?? $validated['desc_id'],
            'image'             => $validated['image'] ?: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
            'status'            => $validated['status'],
            'published_at'      => now(),
            'views'             => 0,
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'create_news',
            'description' => "Menambahkan artikel berita baru: '{$article->title_id}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Artikel berita berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $article = NewsArticle::findOrFail($id);
        return view('admin.news.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = NewsArticle::findOrFail($id);

        $validated = $request->validate([
            'title_id'          => 'required|string|max:255',
            'category'          => 'required|string',
            'category_label_id' => 'required|string',
            'desc_id'           => 'required|string',
            'content_id'        => 'nullable|string',
            'image'             => 'nullable|url',
            'status'            => 'required|in:published,draft',
        ]);

        $article->update([
            'title_id'          => $validated['title_id'],
            'category'          => $validated['category'],
            'category_label_id' => $validated['category_label_id'],
            'category_label_en' => ucfirst($validated['category']),
            'desc_id'           => $validated['desc_id'],
            'content_id'        => $validated['content_id'] ?? $validated['desc_id'],
            'image'             => $validated['image'] ?: $article->image,
            'status'            => $validated['status'],
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_news',
            'description' => "Memperbarui artikel berita: '{$article->title_id}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Artikel berita berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        $article = NewsArticle::findOrFail($id);
        $title = $article->title_id;
        $article->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_news',
            'description' => "Menghapus artikel berita: '{$title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Artikel berita berhasil dihapus!');
    }
}
