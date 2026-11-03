<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('speaker', 'like', "%{$s}%")
                  ->orWhere('location', 'like', "%{$s}%");
            });
        }

        if ($request->filled('type') && $request->input('type') !== 'all') {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $events = $query->orderBy('event_date', 'desc')->paginate(10)->withQueryString();

        $stats = [
            'total'      => Event::count(),
            'upcoming'   => Event::where('status', 'upcoming')->count(),
            'registered' => Event::sum('registered'),
            'completed'  => Event::where('status', 'completed')->count(),
        ];

        return view('admin.events.index', compact('events', 'stats'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'type'             => 'required|in:workshop,webinar,seminar,meetup,bootcamp,hackathon,talk',
            'format'           => 'required|in:offline,online,hybrid',
            'location'         => 'nullable|string|max:255',
            'location_url'     => 'nullable|url|max:255',
            'event_date'       => 'required|date',
            'start_time'       => 'nullable',
            'end_time'         => 'nullable',
            'speaker'          => 'nullable|string|max:255',
            'capacity'         => 'nullable|integer|min:1',
            'registered'       => 'nullable|integer|min:0',
            'price'            => 'required|numeric|min:0',
            'registration_url' => 'nullable|url|max:255',
            'status'           => 'required|in:upcoming,ongoing,completed,cancelled',
            'excerpt'          => 'nullable|string',
            'description'      => 'required|string',
            'image'            => 'nullable|string|max:500',
            'image_file'       => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'tags'             => 'nullable|string',
            'is_featured'      => 'nullable|boolean',
            'is_published'     => 'nullable|boolean',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Event::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $tagsArray = null;
        if (!empty($validated['tags'])) {
            $tagsArray = array_map('trim', explode(',', $validated['tags']));
        }

        $imageUrl = $validated['image'] ?? null;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('events', 'public');
            $imageUrl = '/storage/' . $path;
        }

        $event = Event::create([
            'title'            => $validated['title'],
            'slug'             => $slug,
            'type'             => $validated['type'],
            'format'           => $validated['format'],
            'location'         => $validated['location'] ?? null,
            'location_url'     => $validated['location_url'] ?? null,
            'event_date'       => $validated['event_date'],
            'start_time'       => $validated['start_time'] ?? null,
            'end_time'         => $validated['end_time'] ?? null,
            'speaker'          => $validated['speaker'] ?? null,
            'capacity'         => $validated['capacity'] ?? null,
            'registered'       => $validated['registered'] ?? 0,
            'price'            => $validated['price'] ?? 0,
            'registration_url' => $validated['registration_url'] ?? null,
            'status'           => $validated['status'],
            'excerpt'          => $validated['excerpt'] ?? null,
            'description'      => $validated['description'],
            'image'            => $imageUrl,
            'tags'             => $tagsArray,
            'is_featured'      => $request->boolean('is_featured'),
            'is_published'     => $request->boolean('is_published', true),
            'organizer'        => 'VizzioCraft',
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'create_event',
            'description' => "Menambahkan event baru: '{$event->title}' ({$event->type})",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'type'             => 'required|in:workshop,webinar,seminar,meetup,bootcamp,hackathon,talk',
            'format'           => 'required|in:offline,online,hybrid',
            'location'         => 'nullable|string|max:255',
            'location_url'     => 'nullable|url|max:255',
            'event_date'       => 'required|date',
            'start_time'       => 'nullable',
            'end_time'         => 'nullable',
            'speaker'          => 'nullable|string|max:255',
            'capacity'         => 'nullable|integer|min:1',
            'registered'       => 'nullable|integer|min:0',
            'price'            => 'required|numeric|min:0',
            'registration_url' => 'nullable|url|max:255',
            'status'           => 'required|in:upcoming,ongoing,completed,cancelled',
            'excerpt'          => 'nullable|string',
            'description'      => 'required|string',
            'image'            => 'nullable|string|max:500',
            'image_file'       => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'tags'             => 'nullable|string',
            'is_featured'      => 'nullable|boolean',
            'is_published'     => 'nullable|boolean',
        ]);

        $tagsArray = null;
        if (!empty($validated['tags'])) {
            $tagsArray = array_map('trim', explode(',', $validated['tags']));
        }

        $imageUrl = $validated['image'] ?? $event->image;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('events', 'public');
            $imageUrl = '/storage/' . $path;
        }

        $event->update([
            'title'            => $validated['title'],
            'type'             => $validated['type'],
            'format'           => $validated['format'],
            'location'         => $validated['location'] ?? null,
            'location_url'     => $validated['location_url'] ?? null,
            'event_date'       => $validated['event_date'],
            'start_time'       => $validated['start_time'] ?? null,
            'end_time'         => $validated['end_time'] ?? null,
            'speaker'          => $validated['speaker'] ?? null,
            'capacity'         => $validated['capacity'] ?? null,
            'registered'       => $validated['registered'] ?? 0,
            'price'            => $validated['price'] ?? 0,
            'registration_url' => $validated['registration_url'] ?? null,
            'status'           => $validated['status'],
            'excerpt'          => $validated['excerpt'] ?? null,
            'description'      => $validated['description'],
            'image'            => $imageUrl,
            'tags'             => $tagsArray,
            'is_featured'      => $request->boolean('is_featured'),
            'is_published'     => $request->boolean('is_published', true),
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_event',
            'description' => "Memperbarui event: '{$event->title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(Request $request, Event $event)
    {
        $title = $event->title;
        $event->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_event',
            'description' => "Menghapus event: '{$title}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus!');
    }
}

