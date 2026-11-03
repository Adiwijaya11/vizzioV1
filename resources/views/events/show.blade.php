@extends('layouts.app')

@section('title', $event->title . ' — Event VizzioCraft')
@section('meta_description', $event->excerpt ?? 'Ikuti event dan workshop resmi dari VizzioCraft.')

@section('content')
<article class="min-h-screen bg-bg">
    {{-- Header Banner --}}
    <section class="border-b border-border/70 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-xs font-medium text-ink-muted mb-4" aria-label="Breadcrumb">
                <a href="/" class="hover:text-primary transition-colors">
                    <span data-lang-id>Beranda</span>
                    <span data-lang-en class="hidden">Home</span>
                </a>
                <svg class="h-3 w-3 text-border" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                <a href="/events" class="hover:text-primary transition-colors">Event</a>
                <svg class="h-3 w-3 text-border" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                <span class="text-ink font-semibold truncate max-w-xs">{{ $event->title }}</span>
            </nav>

            {{-- Badges --}}
            <div class="flex flex-wrap items-center gap-2 mb-3">
                <span class="inline-flex rounded-lg bg-primary/10 border border-primary/20 px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary">
                    {{ $event->type }}
                </span>
                <span class="inline-flex rounded-lg bg-muted px-3 py-1 text-xs font-medium text-ink-muted capitalize">
                    {{ $event->format }}
                </span>
                @if($event->is_featured)
                <span class="inline-flex items-center gap-1 rounded-lg bg-amber-100 border border-amber-200 px-2.5 py-1 text-xs font-bold text-amber-900">
                    ⭐ Featured
                </span>
                @endif
                <span class="inline-flex items-center gap-1 rounded-lg {{ $event->is_free ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-primary/5 text-primary border border-primary/20' }} px-3 py-1 text-xs font-bold">
                    {{ $event->formatted_price }}
                </span>
            </div>

            {{-- Title --}}
            <h1 class="text-2xl font-bold tracking-tight text-ink sm:text-3xl lg:text-4xl max-w-4xl">
                {{ $event->title }}
            </h1>

            @if($event->excerpt)
            <p class="mt-3 text-sm sm:text-base leading-relaxed text-ink-muted max-w-3xl">
                {{ $event->excerpt }}
            </p>
            @endif
        </div>
    </section>

    {{-- Main Body & Sticky Booking Sidebar --}}
    <section class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
            {{-- Left 2 Cols: Details & Description --}}
            <div class="lg:col-span-2 space-y-8">
                @if($event->image)
                <div class="overflow-hidden rounded-2xl border border-border shadow-md">
                    <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-auto max-h-[420px] object-cover">
                </div>
                @endif

                {{-- Highlights Bar --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 rounded-2xl border border-border bg-white p-5 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </div>
                        <div>
                            <span class="block text-[11px] font-semibold uppercase tracking-wider text-ink-muted">Tanggal</span>
                            <span class="block text-xs font-bold text-ink">{{ $event->event_date->translatedFormat('d M Y') }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        </div>
                        <div>
                            <span class="block text-[11px] font-semibold uppercase tracking-wider text-ink-muted">Waktu</span>
                            <span class="block text-xs font-bold text-ink">
                                {{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('H:i') : 'TBA' }}
                                @if($event->end_time) - {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }} WIB @endif
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <span class="block text-[11px] font-semibold uppercase tracking-wider text-ink-muted">Lokasi</span>
                            <span class="block text-xs font-bold text-ink truncate max-w-[110px]" title="{{ $event->location }}">{{ $event->location ?? 'Online' }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                        </div>
                        <div>
                            <span class="block text-[11px] font-semibold uppercase tracking-wider text-ink-muted">Kuota</span>
                            <span class="block text-xs font-bold text-ink">
                                @if($event->capacity)
                                    {{ $event->registered }} / {{ $event->capacity }} kursi
                                @else
                                    Terbuka
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Deskripsi Event --}}
                <div class="rounded-2xl border border-border bg-white p-6 sm:p-8 shadow-sm">
                    <h2 class="text-xl font-bold text-ink mb-4">
                        <span data-lang-id>Tentang Event Ini</span>
                        <span data-lang-en class="hidden">About This Event</span>
                    </h2>
                    <div class="prose prose-slate max-w-none text-ink-muted leading-relaxed whitespace-pre-line text-sm sm:text-base">
                        {{ $event->description }}
                    </div>

                    @if(!empty($event->tags))
                    <div class="mt-8 pt-6 border-t border-border flex flex-wrap items-center gap-2">
                        <span class="text-xs font-semibold text-ink-muted">Tags:</span>
                        @foreach($event->tags as $tag)
                        <span class="inline-flex rounded-lg bg-muted px-2.5 py-1 text-xs font-medium text-ink-muted">
                            #{{ $tag }}
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- Speaker Profile Card --}}
                @if($event->speaker)
                <div class="rounded-2xl border border-border bg-white p-6 shadow-sm">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-ink-muted mb-4">
                        <span data-lang-id>Pembicara / Fasilitator</span>
                        <span data-lang-en class="hidden">Speaker / Facilitator</span>
                    </h3>
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-primary to-primary-dark text-white font-bold text-xl shadow-md">
                            {{ strtoupper(substr($event->speaker, 0, 1)) }}
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-ink">{{ $event->speaker }}</h4>
                            <p class="text-xs text-ink-muted mt-0.5">Praktisi & Expert VizzioCraft Team</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Right Col: Registration & Info Sidebar --}}
            <aside class="space-y-6">
                <div class="sticky top-24 rounded-2xl border border-border bg-white p-6 shadow-md space-y-6">
                    <div class="border-b border-border pb-5">
                        <span class="block text-xs font-medium text-ink-muted">Biaya Pendaftaran</span>
                        <div class="mt-1 flex items-baseline gap-2">
                            <span class="text-3xl font-extrabold text-ink">{{ $event->formatted_price }}</span>
                            @if(!$event->is_free)
                            <span class="text-xs text-ink-muted">/ peserta</span>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-3 text-xs text-ink-muted">
                        <div class="flex items-center justify-between">
                            <span>Format Event</span>
                            <span class="font-semibold text-ink capitalize">{{ $event->format }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Penyelenggara</span>
                            <span class="font-semibold text-ink">{{ $event->organizer }}</span>
                        </div>
                        @if($event->capacity)
                        <div class="flex items-center justify-between">
                            <span>Sisa Kursi</span>
                            <span class="font-semibold {{ $event->spots_left <= 5 ? 'text-red-600' : 'text-emerald-600' }}">
                                {{ $event->spots_left }} tempat
                            </span>
                        </div>
                        @endif
                        <div class="flex items-center justify-between">
                            <span>Status</span>
                            <span class="inline-flex items-center gap-1 font-semibold text-ink">
                                <span class="h-2 w-2 rounded-full {{ $event->event_date->isPast() ? 'bg-gray-400' : 'bg-emerald-500' }}"></span>
                                {{ $event->event_date->isPast() ? 'Telah Selesai' : ($event->is_full ? 'Penuh' : 'Pendaftaran Dibuka') }}
                            </span>
                        </div>
                    </div>

                    {{-- CTA Registration Button --}}
                    @if($event->event_date->isPast())
                    <button type="button" disabled class="w-full rounded-xl bg-muted py-3 text-sm font-semibold text-ink-muted cursor-not-allowed text-center">
                        Event Sudah Selesai
                    </button>
                    @elseif($event->is_full)
                    <button type="button" disabled class="w-full rounded-xl bg-red-100 py-3 text-sm font-semibold text-red-700 cursor-not-allowed text-center">
                        Kuota Penuh
                    </button>
                    @elseif($event->registration_url)
                    <a href="{{ $event->registration_url }}" target="_blank" rel="noopener noreferrer"
                       class="flex items-center justify-center gap-2 w-full rounded-xl bg-primary py-3 px-4 text-sm font-semibold text-white shadow-lg shadow-primary/25 hover:bg-primary-dark hover:-translate-y-0.5 transition-all">
                        <span>Daftar Sekarang</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    @else
                    <a href="/contact?subject={{ urlencode('Pendaftaran ' . $event->title) }}"
                       class="flex items-center justify-center gap-2 w-full rounded-xl bg-primary py-3 px-4 text-sm font-semibold text-white shadow-lg shadow-primary/25 hover:bg-primary-dark transition-all">
                        <span>Hubungi untuk Mendaftar</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    @endif

                    <div class="border-t border-border pt-4">
                        <a href="https://wa.me/6283114592416?text={{ urlencode('Halo VizzioCraft, saya ingin bertanya tentang event: ' . $event->title) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center justify-center gap-2 w-full rounded-xl border border-[#25D366]/30 bg-[#25D366]/10 py-2.5 px-3 text-xs font-semibold text-[#16a34a] hover:bg-[#25D366]/20 transition-colors">
                            <svg class="w-4 h-4 text-[#25D366]" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            <span>Tanya via WhatsApp</span>
                        </a>
                    </div>
                </div>
            </aside>
        </div>

        {{-- Related Events Section --}}
        @if($relatedEvents->count() > 0)
        <div class="mt-16 border-t border-border pt-12">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-ink">
                        <span data-lang-id>Event Terkait Lainnya</span>
                        <span data-lang-en class="hidden">Other Related Events</span>
                    </h3>
                    <p class="text-sm text-ink-muted mt-1">Jangan lewatkan agenda workshop dan seminar mendatang.</p>
                </div>
                <a href="/events" class="inline-flex items-center gap-1 text-sm font-semibold text-primary hover:text-primary-dark transition-colors">
                    <span>Lihat Semua</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($relatedEvents as $rel)
                <a href="/events/{{ $rel->slug }}" class="group flex flex-col overflow-hidden rounded-2xl border border-border bg-white shadow-sm transition-all duration-300 hover:shadow-lg hover:border-primary/30 hover:-translate-y-0.5">
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <span class="rounded-lg bg-primary/10 px-2.5 py-0.5 text-[11px] font-bold text-primary capitalize">{{ $rel->type }}</span>
                            <span class="text-xs font-semibold text-emerald-600">{{ $rel->formatted_price }}</span>
                        </div>
                        <h4 class="text-base font-bold text-ink group-hover:text-primary transition-colors line-clamp-2">
                            {{ $rel->title }}
                        </h4>
                        <p class="mt-2 text-xs text-ink-muted line-clamp-2 flex-1">
                            {{ $rel->excerpt }}
                        </p>
                        <div class="mt-4 pt-3 border-t border-border/50 flex items-center justify-between text-xs text-ink-muted">
                            <span>📅 {{ $rel->event_date->translatedFormat('d M Y') }}</span>
                            <span class="font-semibold text-primary">Detail →</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </section>
</article>
@endsection

