<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'title'   => 'nullable|string|max:255',
            'company' => 'required|string|max:255',
            'project' => 'nullable|string|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'date'    => 'nullable|string|max:100',
            'status'  => 'required|in:published,draft',
        ]);

        $testimonial = Testimonial::create($validated);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'create_testimonial',
            'description' => "Menambahkan ulasan testimonial baru dari: '{$testimonial->name}' ({$testimonial->company})",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'title'   => 'nullable|string|max:255',
            'company' => 'required|string|max:255',
            'project' => 'nullable|string|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'date'    => 'nullable|string|max:100',
            'status'  => 'required|in:published,draft',
        ]);

        $testimonial->update($validated);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_testimonial',
            'description' => "Memperbarui testimonial dari: '{$testimonial->name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $name = $testimonial->name;
        $testimonial->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_testimonial',
            'description' => "Menghapus testimonial dari: '{$name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dihapus!');
    }
}
