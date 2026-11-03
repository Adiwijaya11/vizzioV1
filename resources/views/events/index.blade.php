@extends('layouts.app')

@section('title', 'Event & Workshop — VizzioCraft')
@section('meta_description', 'Jadwal event, workshop, seminar, dan meetup teknologi terkini dari VizzioCraft.')

@section('content')
<div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="flex flex-col gap-8 lg:flex-row">

        {{-- Sidebar Filter --}}
        <aside class="w-full shrink-0 lg:w-64 xl:w-72">
            <div class="lg:sticky lg:top-24 space-y-5">

                {{-- Search --}}
                <form method="GET" action="/events" class="relative">
                    @foreach(request()->except(['q','page']) as $key => $val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                    @endforeach
                    <input
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Cari event..."
                        class="w-full rounded-xl border border-border bg-white py-2.5 pl-10 pr-4 text-sm text-ink placeholder-ink-muted/50 shadow-sm transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none"
                    >
                    <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-muted/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/></svg>
                </form>

                {{-- Tipe Event --}}
                <div class="rounded-2xl border border-border bg-white p-4 shadow-sm">
                    <h3 class="mb-3 text-xs font-bold uppercase tracking-widest text-ink-muted">
                        <span data-lang-id>Tipe Event</span>
                        <span data-lang-en class="hidden">Event Type</span>
                    </h3>
                    <div class="space-y-1">
                        @php
                            $typeLabels = [
                                'workshop'  => ['label' => 'Workshop'],
                                'webinar'   => ['label' => 'Webinar'],
                                'seminar'   => ['label' => 'Seminar'],
                                'meetup'    => ['label' => 'Meetup'],
                                'bootcamp'  => ['label' => 'Bootcamp'],
                                'hackathon' => ['label' => 'Hackathon'],
                                'talk'      => ['label' => 'Tech Talk'],
                            ];
                        @endphp
                        <a href="/events{{ request()->except(['type','page']) ? '?' . http_build_query(request()->except(['type','page'])) : '' }}"
                           class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-colors {{ !request('type') ? 'bg-primary/10 text-primary' : 'text-ink-muted hover:bg-muted hover:text-ink' }}">
                            <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"/></svg>
                            <span data-lang-id>Semua Tipe</span>
                            <span data-lang-en class="hidden">All Types</span>
                        </a>
                        @foreach($types as $type)
                            @php $tl = $typeLabels[$type] ?? ['label' => ucfirst($type)]; @endphp
                            <a href="/events?{{ http_build_query(array_merge(request()->except(['type','page']), ['type' => $type])) }}"
                               class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-colors {{ request('type') === $type ? 'bg-primary/10 text-primary' : 'text-ink-muted hover:bg-muted hover:text-ink' }}">
                                @switch($type)
                                    @case('workshop')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3"/></svg>
                                        @break
                                    @case('webinar')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8m-4-4v4"/></svg>
                                        @break
                                    @case('seminar')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-14 0m14 0v1a7 7 0 01-14 0v-1m7 7v4m-4 0h8M12 3a3 3 0 00-3 3v5a3 3 0 006 0V6a3 3 0 00-3-3z"/></svg>
                                        @break
                                    @case('meetup')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        @break
                                    @case('bootcamp')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        @break
                                    @case('hackathon')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                        @break
                                    @case('talk')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                        @break
                                    @default
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                @endswitch
                                <span>{{ $tl['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Format --}}
                <div class="rounded-2xl border border-border bg-white p-4 shadow-sm">
                    <h3 class="mb-3 text-xs font-bold uppercase tracking-widest text-ink-muted">Format</h3>
                    <div class="space-y-1">
                        @php
                            $formats = [
                                ''        => ['type' => 'all',     'id' => 'Semua Format', 'en' => 'All Formats'],
                                'offline' => ['type' => 'offline', 'id' => 'Offline',       'en' => 'In-Person'],
                                'online'  => ['type' => 'online',  'id' => 'Online',        'en' => 'Online'],
                                'hybrid'  => ['type' => 'hybrid',  'id' => 'Hybrid',        'en' => 'Hybrid'],
                            ];
                        @endphp
                        @foreach($formats as $fKey => $fVal)
                            <a href="/events?{{ http_build_query(array_merge(request()->except(['format','page']), $fKey ? ['format' => $fKey] : [])) }}"
                               class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-colors {{ request('format') === ($fKey ?: null) && ($fKey || !request('format')) ? 'bg-primary/10 text-primary' : 'text-ink-muted hover:bg-muted hover:text-ink' }}">
                                @switch($fVal['type'])
                                    @case('all')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 9h6m-6 4h6m-6 4h4"/></svg>
                                        @break
                                    @case('offline')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><circle cx="12" cy="11" r="3"/></svg>
                                        @break
                                    @case('online')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
                                        @break
                                    @case('hybrid')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                        @break
                                @endswitch
                                <span data-lang-id>{{ $fVal['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $fVal['en'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Harga --}}
                <div class="rounded-2xl border border-border bg-white p-4 shadow-sm">
                    <h3 class="mb-3 text-xs font-bold uppercase tracking-widest text-ink-muted">
                        <span data-lang-id>Harga</span>
                        <span data-lang-en class="hidden">Price</span>
                    </h3>
                    <div class="space-y-1">
                        @php
                            $prices = [
                                ''     => ['type' => 'all',  'id' => 'Semua', 'en' => 'All'],
                                'free' => ['type' => 'free', 'id' => 'Gratis', 'en' => 'Free'],
                                'paid' => ['type' => 'paid', 'id' => 'Berbayar', 'en' => 'Paid'],
                            ];
                        @endphp
                        @foreach($prices as $pKey => $pVal)
                            <a href="/events?{{ http_build_query(array_merge(request()->except(['price','page']), $pKey ? ['price' => $pKey] : [])) }}"
                               class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-colors {{ request('price') === ($pKey ?: null) && ($pKey || !request('price')) ? 'bg-primary/10 text-primary' : 'text-ink-muted hover:bg-muted hover:text-ink' }}">
                                @switch($pVal['type'])
                                    @case('all')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                                        @break
                                    @case('free')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                                        @break
                                    @case('paid')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M2 10h20M7 15h.01M11 15h2"/></svg>
                                        @break
                                @endswitch
                                <span data-lang-id>{{ $pVal['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $pVal['en'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Status --}}
                <div class="rounded-2xl border border-border bg-white p-4 shadow-sm">
                    <h3 class="mb-3 text-xs font-bold uppercase tracking-widest text-ink-muted">Status</h3>
                    <div class="space-y-1">
                        @php
                            $statuses = [
                                ''         => ['type' => 'all',      'id' => 'Semua',        'en' => 'All'],
                                'upcoming' => ['type' => 'upcoming', 'id' => 'Akan Datang',  'en' => 'Upcoming'],
                                'past'     => ['type' => 'past',     'id' => 'Selesai',      'en' => 'Past'],
                            ];
                        @endphp
                        @foreach($statuses as $sKey => $sVal)
                            <a href="/events?{{ http_build_query(array_merge(request()->except(['status','page']), $sKey ? ['status' => $sKey] : [])) }}"
                               class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-colors {{ request('status') === ($sKey ?: null) && ($sKey || !request('status')) ? 'bg-primary/10 text-primary' : 'text-ink-muted hover:bg-muted hover:text-ink' }}">
                                @switch($sVal['type'])
                                    @case('all')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                                        @break
                                    @case('upcoming')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l2 2 4-4"/></svg>
                                        @break
                                    @case('past')
                                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/></svg>
                                        @break
                                @endswitch
                                <span data-lang-id>{{ $sVal['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $sVal['en'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 min-w-0">

            {{-- Featured Event Banner --}}
            @if($featuredEvent && !request()->hasAny(['type','format','price','status','q']))
            <div class="mb-8 overflow-hidden rounded-2xl border border-primary/20 bg-gradient-to-r from-primary/5 via-white to-primary/5 shadow-sm">
                <div class="flex flex-col sm:flex-row">
                    @if($featuredEvent->image)
                    <div class="sm:w-56 shrink-0">
                        <img src="{{ $featuredEvent->image }}" alt="{{ $featuredEvent->title }}" class="h-48 w-full object-cover sm:h-full">
                    </div>
                    @endif
                    <div class="flex-1 p-5 sm:p-6">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-0.5 text-[11px] font-bold text-amber-700">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                Featured
                            </span>
                            <span class="inline-flex rounded-full bg-primary/10 px-2.5 py-0.5 text-[11px] font-semibold text-primary capitalize">{{ $featuredEvent->type }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-ink leading-snug">{{ $featuredEvent->title }}</h3>
                        <p class="mt-1.5 text-sm text-ink-muted line-clamp-2">{{ $featuredEvent->excerpt }}</p>
                        <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-ink-muted">
                            <span class="flex items-center gap-1">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                {{ $featuredEvent->event_date->translatedFormat('d M Y') }}
                            </span>
                            @if($featuredEvent->start_time)
                            <span class="flex items-center gap-1">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                {{ \Carbon\Carbon::parse($featuredEvent->start_time)->format('H:i') }}
                            </span>
                            @endif
                            @if($featuredEvent->location)
                            <span class="flex items-center gap-1">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                {{ $featuredEvent->location }}
                            </span>
                            @endif
                        </div>
                        <div class="mt-4">
                            <a href="/events/{{ $featuredEvent->slug }}" class="inline-flex items-center gap-1.5 rounded-lg bg-primary px-4 py-2 text-xs font-semibold text-white shadow-sm hover:bg-primary-dark transition-colors">
                                <span data-lang-id>Lihat Detail</span>
                                <span data-lang-en class="hidden">View Details</span>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Active Filters --}}
            @if(request()->hasAny(['type','format','price','status','q']))
            <div class="mb-5 flex flex-wrap items-center gap-2">
                <span class="text-xs font-medium text-ink-muted">Filter aktif:</span>
                @if(request('type'))
                    <a href="/events?{{ http_build_query(request()->except(['type','page'])) }}" class="inline-flex items-center gap-1 rounded-full bg-primary/10 px-2.5 py-1 text-xs font-medium text-primary hover:bg-primary/20 transition-colors">
                        {{ ucfirst(request('type')) }}
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
                @if(request('format'))
                    <a href="/events?{{ http_build_query(request()->except(['format','page'])) }}" class="inline-flex items-center gap-1 rounded-full bg-primary/10 px-2.5 py-1 text-xs font-medium text-primary hover:bg-primary/20 transition-colors">
                        {{ ucfirst(request('format')) }}
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
                @if(request('price'))
                    <a href="/events?{{ http_build_query(request()->except(['price','page'])) }}" class="inline-flex items-center gap-1 rounded-full bg-primary/10 px-2.5 py-1 text-xs font-medium text-primary hover:bg-primary/20 transition-colors">
                        {{ request('price') === 'free' ? 'Gratis' : 'Berbayar' }}
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
                @if(request('status'))
                    <a href="/events?{{ http_build_query(request()->except(['status','page'])) }}" class="inline-flex items-center gap-1 rounded-full bg-primary/10 px-2.5 py-1 text-xs font-medium text-primary hover:bg-primary/20 transition-colors">
                        {{ request('status') === 'upcoming' ? 'Akan Datang' : 'Selesai' }}
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
                @if(request('q'))
                    <a href="/events?{{ http_build_query(request()->except(['q','page'])) }}" class="inline-flex items-center gap-1 rounded-full bg-primary/10 px-2.5 py-1 text-xs font-medium text-primary hover:bg-primary/20 transition-colors">
                        "{{ request('q') }}"
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
                <a href="/events" class="text-xs font-medium text-red-500 hover:text-red-700 transition-colors">
                    <span data-lang-id>Hapus semua</span>
                    <span data-lang-en class="hidden">Clear all</span>
                </a>
            </div>
            @endif

            {{-- Event Cards Grid --}}
            @if($events->count() > 0)
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
                @foreach($events as $event)
                <a href="/events/{{ $event->slug }}" class="group flex flex-col overflow-hidden rounded-2xl border border-border bg-white shadow-sm transition-all duration-300 hover:shadow-lg hover:border-primary/30 hover:-translate-y-0.5">
                    {{-- Image --}}
                    <div class="relative h-44 overflow-hidden bg-gradient-to-br from-primary/10 to-primary/5">
                        @if($event->image)
                            <img src="{{ $event->image }}" alt="{{ $event->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="flex h-full w-full items-center justify-center">
                                <svg class="h-12 w-12 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            </div>
                        @endif
                        {{-- Type Badge --}}
                        <div class="absolute left-3 top-3 flex items-center gap-1.5">
                            <span class="rounded-lg bg-white/95 backdrop-blur px-2.5 py-1 text-[11px] font-bold text-primary capitalize shadow-sm">{{ $event->type }}</span>
                            @if($event->is_featured)
                                <span class="rounded-lg bg-amber-400 px-1.5 py-1 text-amber-950 shadow-sm inline-flex items-center gap-0.5 text-[10px] font-bold" title="Featured">
                                    <svg class="h-3 w-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </span>
                            @endif
                        </div>
                        {{-- Status Badge --}}
                        @php
                            $isPast = $event->event_date->isPast();
                            $statusColor = $isPast ? 'bg-gray-500' : ($event->is_full ? 'bg-red-500' : 'bg-emerald-500');
                            $statusText = $isPast ? 'Selesai' : ($event->is_full ? 'Penuh' : 'Tersedia');
                        @endphp
                        <span class="absolute right-3 top-3 inline-flex items-center gap-1 rounded-lg {{ $statusColor }} px-2 py-1 text-[10px] font-bold text-white shadow-sm">
                            <span class="h-1.5 w-1.5 rounded-full bg-white {{ !$isPast && !$event->is_full ? 'animate-pulse' : '' }}"></span>
                            {{ $statusText }}
                        </span>
                        {{-- Price --}}
                        <div class="absolute bottom-3 right-3">
                            <span class="rounded-lg {{ $event->is_free ? 'bg-emerald-500 text-white' : 'bg-white/95 text-ink' }} px-2.5 py-1 text-[11px] font-bold shadow-sm backdrop-blur">
                                {{ $event->formatted_price }}
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="flex flex-1 flex-col p-4">
                        {{-- Date & Time --}}
                        <div class="mb-2 flex items-center gap-3 text-xs text-ink-muted">
                            <span class="flex items-center gap-1">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                {{ $event->event_date->translatedFormat('d M Y') }}
                            </span>
                            @if($event->start_time)
                            <span class="flex items-center gap-1">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}
                            </span>
                            @endif
                        </div>

                        {{-- Title --}}
                        <h3 class="text-[15px] font-bold leading-snug text-ink group-hover:text-primary transition-colors line-clamp-2">
                            {{ $event->title }}
                        </h3>

                        {{-- Excerpt --}}
                        <p class="mt-1.5 text-xs leading-relaxed text-ink-muted line-clamp-2 flex-1">
                            {{ $event->excerpt }}
                        </p>

                        {{-- Meta --}}
                        <div class="mt-3 flex flex-col gap-1.5 text-xs text-ink-muted">
                            @if($event->location)
                            <span class="flex items-center gap-1.5">
                                <svg class="h-3.5 w-3.5 shrink-0 text-primary/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span class="truncate">{{ $event->location }}</span>
                            </span>
                            @endif
                            @if($event->speaker)
                            <span class="flex items-center gap-1.5">
                                <svg class="h-3.5 w-3.5 shrink-0 text-primary/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <span class="truncate">{{ $event->speaker }}</span>
                            </span>
                            @endif
                        </div>

                        {{-- Footer --}}
                        <div class="mt-3 flex items-center justify-between border-t border-border/50 pt-3">
                            <div class="flex items-center gap-1.5">
                                @if($event->capacity)
                                <span class="inline-flex items-center gap-1 rounded-full bg-muted px-2 py-0.5 text-[10px] font-medium text-ink-muted">
                                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                    {{ $event->registered }}/{{ $event->capacity }}
                                </span>
                                @endif
                                <span class="inline-flex rounded-full bg-muted px-2 py-0.5 text-[10px] font-medium text-ink-muted capitalize">
                                    {{ $event->format }}
                                </span>
                            </div>
                            <span class="text-xs font-semibold text-primary group-hover:translate-x-0.5 transition-transform flex items-center gap-1">
                                Detail
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $events->links() }}
            </div>

            @else
            {{-- Empty State --}}
            <div class="flex flex-col items-center justify-center rounded-2xl border-2 border-dashed border-border bg-muted/30 py-16 px-4 text-center">
                <svg class="h-16 w-16 text-ink-muted/30 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <h3 class="text-lg font-bold text-ink">
                    <span data-lang-id>Tidak Ada Event</span>
                    <span data-lang-en class="hidden">No Events Found</span>
                </h3>
                <p class="mt-1 text-sm text-ink-muted max-w-sm">
                    <span data-lang-id>Tidak ada event yang sesuai dengan filter saat ini. Coba ubah kriteria pencarian.</span>
                    <span data-lang-en class="hidden">No events match the current filters. Try adjusting your search criteria.</span>
                </p>
                <a href="/events" class="mt-4 inline-flex items-center gap-1.5 rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white hover:bg-primary-dark transition-colors">
                    <span data-lang-id>Lihat Semua Event</span>
                    <span data-lang-en class="hidden">View All Events</span>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

