<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::published()->orderBy('event_date', 'asc');

        if ($type = $request->query('type')) {
            $query->ofType($type);
        }

        if ($format = $request->query('format')) {
            $query->ofFormat($format);
        }

        if ($status = $request->query('status')) {
            if ($status === 'upcoming') {
                $query->where('event_date', '>=', now()->toDateString());
            } elseif ($status === 'past') {
                $query->where('event_date', '<', now()->toDateString());
            }
        } else {
            $query->where('event_date', '>=', now()->subMonths(2)->toDateString());
        }

        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('speaker', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->query('price') === 'free') {
            $query->where('price', 0);
        } elseif ($request->query('price') === 'paid') {
            $query->where('price', '>', 0);
        }

        $events = $query->paginate(9)->appends($request->query());

        $types = Event::published()
            ->select('type')
            ->distinct()
            ->pluck('type')
            ->sort()
            ->values();

        $featuredEvent = Event::published()
            ->where('is_featured', true)
            ->where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date')
            ->first();

        return view('events.index', compact('events', 'types', 'featuredEvent'));
    }

    public function show($slug)
    {
        $event = Event::published()->where('slug', $slug)->firstOrFail();

        $relatedEvents = Event::published()
            ->where('id', '!=', $event->id)
            ->where('type', $event->type)
            ->where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date')
            ->take(3)
            ->get();

        return view('events.show', compact('event', 'relatedEvents'));
    }
}

