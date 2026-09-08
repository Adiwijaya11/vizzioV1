@extends('layouts.app')

@section('title', ($article['title']['id'] ?? 'Berita') . ' — VizzioCraft')
@section('meta_description', $article['desc']['id'] ?? 'Berita & insight terbaru dari VizzioCraft.')

@section('content')
    @php
        $catGradients = [
            'tech'    => 'from-sky-500 to-blue-600',
            'project' => 'from-emerald-500 to-teal-600',
            'company' => 'from-indigo-500 to-violet-600',
            'tips'    => 'from-amber-500 to-orange-500',
            'event'   => 'from-purple-500 to-fuchsia-600',
        ];
        $gradient = $catGradients[$article['category']] ?? 'from-primary to-blue-700';
    @endphp

    {{-- ══════════════════════════════════════════════════════
         HERO SECTION: Article Header (Identical Theme to Welcome & News)
    ══════════════════════════════════════════════════════ --}}
    <section class="relative w-full overflow-hidden py-14 sm:py-18 lg:py-20">
        {{-- Base Gradient matching Welcome Page --}}
        <div class="absolute inset-0 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF]" aria-hidden="true"></div>

        {{-- Organic SVG Blob (Desktop) --}}
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden lg:block hidden" aria-hidden="true">
            <svg class="absolute left-0 top-0 w-full h-full" viewBox="0 0 1200 900" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="showBlobGlow1" cx="28%" cy="22%" r="48%" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#5B9BD5" stop-opacity="0.22"/>
                        <stop offset="60%"  stop-color="#2158D0" stop-opacity="0.08"/>
                        <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
                    </radialGradient>
                    <radialGradient id="showBlobGlow2" cx="75%" cy="78%" r="42%" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#60A5FA" stop-opacity="0.12"/>
                        <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
                    </radialGradient>
                    <linearGradient id="showTopSheen" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%"   stop-color="white" stop-opacity="0.12"/>
                        <stop offset="55%"  stop-color="white" stop-opacity="0.04"/>
                        <stop offset="100%" stop-color="white" stop-opacity="0"/>
                    </linearGradient>
                </defs>
                <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="#2158D0"/>
                <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="url(#showBlobGlow1)"/>
                <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="url(#showBlobGlow2)"/>
                <ellipse cx="220" cy="140" rx="380" ry="170" fill="white" fill-opacity="0.055" transform="rotate(-12 220 140)"/>
                <ellipse cx="80"  cy="60"  rx="120" ry="55"  fill="white" fill-opacity="0.09"  transform="rotate(-8 80 60)"/>
                <circle  cx="820" cy="400" r="160"  fill="white" fill-opacity="0.025"/>
                <ellipse cx="380" cy="820" rx="300" ry="80"  fill="white" fill-opacity="0.03"/>
                <rect    x="0"    y="0"    width="900" height="6" fill="url(#showTopSheen)" rx="0"/>
            </svg>
        </div>

        {{-- Mobile Blobs --}}
        <div class="absolute inset-0 z-0 lg:hidden pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-1/4 w-72 h-72 rounded-full bg-sky-400/20 blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 rounded-full bg-primary/20 blur-3xl"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb Navigation --}}
            <nav class="mb-6 flex flex-wrap items-center gap-2 text-xs text-blue-200/70" aria-label="Breadcrumb">
                <a href="/" class="inline-flex items-center gap-1 hover:text-white transition-colors font-medium">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span data-lang-id>Beranda</span><span data-lang-en class="hidden">Home</span>
                </a>
                <span class="text-blue-300/30 select-none">/</span>
                <a href="/news" class="hover:text-white transition-colors font-medium">
                    <span data-lang-id>Berita & Insight</span><span data-lang-en class="hidden">News & Insights</span>
                </a>
                <span class="text-blue-300/30 select-none">/</span>
                <span class="inline-flex items-center gap-1 rounded-md bg-white/10 px-2 py-0.5 text-[11px] font-semibold text-sky-200">
                    <span data-lang-id>{{ $article['category_label']['id'] }}</span>
                    <span data-lang-en class="hidden">{{ $article['category_label']['en'] }}</span>
                </span>
            </nav>

            {{-- Article Meta & Category Badge --}}
            <div class="max-w-4xl">
                <div class="mb-4 inline-flex items-center gap-2 rounded-xl bg-gradient-to-r {{ $gradient }} px-3.5 py-1.5 text-xs font-bold text-white shadow-lg shadow-black/20">
                    <x-news-icon :name="$article['icon']" class="w-4 h-4" />
                    <span data-lang-id>{{ $article['category_label']['id'] }}</span>
                    <span data-lang-en class="hidden">{{ $article['category_label']['en'] }}</span>
                </div>

                {{-- Main Title --}}
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.2] mb-6">
                    <span data-lang-id>{{ $article['title']['id'] }}</span>
                    <span data-lang-en class="hidden">{{ $article['title']['en'] }}</span>
                </h1>

                {{-- Author & Publishing Meta Row --}}
                <div class="flex flex-wrap items-center gap-4 sm:gap-6 pt-2 border-t border-white/15 text-xs text-blue-100/80">
                    {{-- Author --}}
                    <div class="flex items-center gap-2.5">
                        <img src="{{ $article['author']['avatar'] ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80' }}"
                             alt="{{ $article['author']['name'] ?? 'Penulis' }}"
                             class="w-9 h-9 rounded-full object-cover ring-2 ring-white/30" />
                        <div>
                            <div class="font-bold text-white text-sm leading-none">{{ $article['author']['name'] ?? 'Tim VizzioCraft' }}</div>
                            <div class="text-[11px] text-blue-200/70 mt-1">
                                <span data-lang-id>{{ $article['author']['role']['id'] ?? 'Editorial Team' }}</span>
                                <span data-lang-en class="hidden">{{ $article['author']['role']['en'] ?? 'Editorial Team' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="h-6 w-px bg-white/15 hidden sm:block"></div>

                    {{-- Date --}}
                    <div class="flex items-center gap-1.5 font-medium">
                        <svg class="w-4 h-4 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <span data-lang-id>{{ $article['date']['id'] }}</span>
                        <span data-lang-en class="hidden">{{ $article['date']['en'] }}</span>
                    </div>

                    <div class="h-6 w-px bg-white/15 hidden sm:block"></div>

                    {{-- Read Time --}}
                    <div class="flex items-center gap-1.5 font-medium">
                        <svg class="w-4 h-4 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <span>{{ $article['read'] }} <span data-lang-id>baca</span><span data-lang-en class="hidden">read</span></span>
                    </div>

                    <div class="h-6 w-px bg-white/15 hidden sm:block"></div>

                    {{-- Views --}}
                    <div class="flex items-center gap-1.5 font-medium text-blue-200/90">
                        <svg class="w-4 h-4 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>{{ $article['views'] ?? '1.250' }} <span data-lang-id>dilihat</span><span data-lang-en class="hidden">views</span></span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Organic Wave Divider to Content --}}
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden" aria-hidden="true">
            <svg viewBox="0 0 1440 44" preserveAspectRatio="none" class="h-11 w-full" fill="#EFF6FF">
                <path d="M0,44 C360,4 1080,56 1440,22 L1440,44 Z"/>
            </svg>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════
         MAIN ARTICLE BODY & SIDEBAR
    ══════════════════════════════════════════════════════ --}}
    <div class="bg-[#EFF6FF] w-full pb-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-4">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 items-start">

                {{-- ──────────────────────────────────────────
                     LEFT: Full Article Column
                ────────────────────────────────────────── --}}
                <main class="w-full lg:flex-1 min-w-0">
                    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-10 space-y-8">

                        {{-- 1. Main Hero Image --}}
                        <div class="relative overflow-hidden rounded-2xl sm:rounded-3xl shadow-lg border border-slate-100 group">
                            <img src="{{ $article['image'] }}"
                                 alt="{{ $article['title']['id'] }}"
                                 class="w-full h-64 sm:h-96 md:h-[420px] object-cover transition-transform duration-700 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-80"></div>
                            
                            {{-- Image Overlay Caption --}}
                            <div class="absolute bottom-4 left-4 right-4 sm:bottom-6 sm:left-6 sm:right-6 flex items-end justify-between gap-4 text-white">
                                <p class="text-xs sm:text-sm font-medium text-slate-200 line-clamp-2 drop-shadow">
                                    <span data-lang-id>{{ $article['desc']['id'] }}</span>
                                    <span data-lang-en class="hidden">{{ $article['desc']['en'] }}</span>
                                </p>
                                <span class="hidden sm:inline-flex shrink-0 items-center gap-1 text-[11px] rounded-lg bg-black/40 backdrop-blur-md px-2.5 py-1 text-slate-300">
                                    <svg class="w-3 h-3 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                    VizzioCraft Media
                                </span>
                            </div>
                        </div>

                        {{-- 2. Article Lead / Abstract Callout --}}
                        @if (!empty($article['lead']))
                        <div class="relative rounded-2xl bg-blue-50/70 border-l-4 border-primary p-5 sm:p-6 text-slate-700">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-primary shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="text-base sm:text-lg font-medium leading-relaxed italic text-slate-800">
                                    <span data-lang-id>{{ $article['lead']['id'] }}</span>
                                    <span data-lang-en class="hidden">{{ $article['lead']['en'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- 3. Key Takeaways Box (Poin-Poin Utama) --}}
                        @if (!empty($article['takeaways']))
                        <div class="rounded-2xl border border-blue-200/80 bg-gradient-to-br from-white to-blue-50/40 p-6 shadow-sm">
                            <h2 class="text-base font-bold text-slate-900 flex items-center gap-2.5 mb-4">
                                <span class="flex h-7 w-7 items-center justify-center rounded-xl bg-primary text-white text-xs shadow-sm">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                                <span data-lang-id>Ringkasan & Poin Kunci</span>
                                <span data-lang-en class="hidden">Key Takeaways & Highlights</span>
                            </h2>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3" role="list">
                                @foreach ($article['takeaways'] as $takeaway)
                                    <li class="flex items-start gap-2.5 rounded-xl bg-white border border-slate-200/70 p-3 shadow-xs">
                                        <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        <span class="text-xs sm:text-sm font-semibold text-slate-700 leading-snug">
                                            <span data-lang-id>{{ $takeaway['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $takeaway['en'] }}</span>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        {{-- 4. Deep Article Sections --}}
                        <div class="prose max-w-none space-y-8 text-slate-700">
                            @if (!empty($article['sections']))
                                @foreach ($article['sections'] as $sIdx => $section)
                                    <section id="section-{{ $sIdx }}" class="space-y-4 pt-2">
                                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight flex items-center gap-3">
                                            <span class="h-6 w-1 rounded-full bg-primary shrink-0"></span>
                                            <span data-lang-id>{{ $section['heading']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $section['heading']['en'] }}</span>
                                        </h2>

                                        @foreach ($section['paragraphs'] as $para)
                                            <p class="text-sm sm:text-base leading-relaxed text-slate-700 font-normal">
                                                <span data-lang-id>{{ $para['id'] }}</span>
                                                <span data-lang-en class="hidden">{{ $para['en'] }}</span>
                                            </p>
                                        @endforeach

                                        {{-- Quote Block --}}
                                        @if (!empty($section['quote']))
                                            <blockquote class="my-6 rounded-2xl bg-gradient-to-r from-primary/10 via-sky-50 to-white border-l-4 border-primary p-5 sm:p-6 shadow-xs">
                                                <div class="flex gap-3">
                                                    <span class="text-3xl text-primary font-serif select-none leading-none">“</span>
                                                    <div>
                                                        <p class="text-sm sm:text-base font-semibold text-slate-800 italic leading-relaxed mb-2">
                                                            <span data-lang-id>{{ $section['quote']['text']['id'] }}</span>
                                                            <span data-lang-en class="hidden">{{ $section['quote']['text']['en'] }}</span>
                                                        </p>
                                                        <cite class="text-xs font-bold text-primary not-italic">
                                                            {{ $section['quote']['author'] }}
                                                        </cite>
                                                    </div>
                                                </div>
                                            </blockquote>
                                        @endif
                                    </section>
                                @endforeach
                            @else
                                <p class="text-base text-slate-700 leading-relaxed">
                                    <span data-lang-id>{{ $article['desc']['id'] }}</span>
                                    <span data-lang-en class="hidden">{{ $article['desc']['en'] }}</span>
                                </p>
                            @endif
                        </div>

                        {{-- 5. Article Tags --}}
                        @if (!empty($article['tags']))
                        <div class="pt-6 border-t border-slate-100 flex flex-wrap items-center gap-2">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-2">
                                <span data-lang-id>Tagar:</span>
                                <span data-lang-en class="hidden">Tags:</span>
                            </span>
                            @foreach ($article['tags'] as $tag)
                                <a href="/news" class="inline-flex items-center gap-1 rounded-xl bg-slate-100 hover:bg-primary/10 hover:text-primary text-slate-600 px-3 py-1.5 text-xs font-semibold transition-colors">
                                    <span class="text-primary font-bold">#</span>
                                    <span data-lang-id>{{ $tag['id'] }}</span>
                                    <span data-lang-en class="hidden">{{ $tag['en'] }}</span>
                                </a>
                            @endforeach
                        </div>
                        @endif

                        {{-- 6. Interactive Share Bar --}}
                        <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 sm:p-5 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                <span class="text-xs font-bold text-slate-800">
                                    <span data-lang-id>Bagikan artikel ini:</span>
                                    <span data-lang-en class="hidden">Share this article:</span>
                                </span>
                            </div>

                            <div class="flex items-center gap-2">
                                {{-- WhatsApp --}}
                                <a href="https://api.whatsapp.com/send?text={{ urlencode(($article['title']['id'] ?? '') . ' - ' . url()->current()) }}"
                                   target="_blank" rel="noopener noreferrer"
                                   class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition-all shadow-xs hover:scale-105"
                                   title="Share to WhatsApp">
                                    <x-news-icon name="whatsapp" class="w-4 h-4" />
                                </a>

                                {{-- Twitter / X --}}
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode(($article['title']['id'] ?? '') . ' via @VizzioCraft') }}&url={{ urlencode(url()->current()) }}"
                                   target="_blank" rel="noopener noreferrer"
                                   class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-900 hover:bg-black text-white transition-all shadow-xs hover:scale-105"
                                   title="Share to X (Twitter)">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>

                                {{-- LinkedIn --}}
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                   target="_blank" rel="noopener noreferrer"
                                   class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-[#0A66C2] hover:bg-[#084e96] text-white transition-all shadow-xs hover:scale-105"
                                   title="Share to LinkedIn">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.68 1.68 0 1 0-.02-3.36 1.68 1.68 0 0 0 .02 3.36m1.4 9.74V9.93H5.06v8.57h2.8z"/></svg>
                                </a>

                                {{-- Copy Link --}}
                                <button type="button" id="copy-link-btn"
                                        class="inline-flex items-center gap-1.5 rounded-xl bg-white border border-slate-200 hover:border-primary text-slate-700 hover:text-primary px-3 py-2 text-xs font-bold transition-all shadow-xs cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    <span id="copy-link-text" data-lang-id>Salin Link</span>
                                    <span id="copy-link-text-en" data-lang-en class="hidden">Copy Link</span>
                                </button>
                            </div>
                        </div>

                        {{-- 7. Author Bio Box --}}
                        <div class="rounded-2xl border border-slate-200/80 bg-gradient-to-br from-slate-50 to-white p-6 flex flex-col sm:flex-row items-center sm:items-start gap-5">
                            <img src="{{ $article['author']['avatar'] ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80' }}"
                                 alt="{{ $article['author']['name'] ?? 'Penulis' }}"
                                 class="w-16 h-16 rounded-2xl object-cover ring-4 ring-primary/10 shrink-0" />
                            <div class="flex-1 text-center sm:text-left">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 mb-2">
                                    <div>
                                        <h3 class="text-base font-bold text-slate-900">{{ $article['author']['name'] ?? 'Tim VizzioCraft' }}</h3>
                                        <p class="text-xs font-semibold text-primary">
                                            <span data-lang-id>{{ $article['author']['role']['id'] ?? 'Spesialis Teknologi' }}</span>
                                            <span data-lang-en class="hidden">{{ $article['author']['role']['en'] ?? 'Technology Specialist' }}</span>
                                        </p>
                                    </div>
                                    <span class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-400 self-center sm:self-auto">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        VizzioCraft Verified Author
                                    </span>
                                </div>
                                <p class="text-xs text-slate-600 leading-relaxed">
                                    <span data-lang-id>Fokus pada rekayasa perangkat lunak, optimasi performa infrastruktur, dan strategi digital untuk mempercepat transformasi bisnis di Indonesia.</span>
                                    <span data-lang-en class="hidden">Specializing in software engineering, infrastructure tuning, and digital strategies empowering enterprise growth across Indonesia.</span>
                                </p>
                            </div>
                        </div>

                        {{-- 8. Previous / Next Article Navigation --}}
                        <div class="pt-6 border-t border-slate-100 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            {{-- Prev Article --}}
                            @if ($prevArticle)
                                <a href="/news/{{ $prevArticle['slug'] }}"
                                   class="group flex flex-col justify-between p-4 rounded-2xl border border-slate-200 hover:border-primary hover:bg-blue-50/40 transition-all">
                                    <span class="text-[11px] font-bold text-slate-400 flex items-center gap-1 group-hover:text-primary transition-colors">
                                        <svg class="w-3.5 h-3.5 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                                        <span data-lang-id>Artikel Sebelumnya</span>
                                        <span data-lang-en class="hidden">Previous Article</span>
                                    </span>
                                    <h4 class="text-xs font-bold text-slate-800 line-clamp-2 mt-2 group-hover:text-primary transition-colors">
                                        <span data-lang-id>{{ $prevArticle['title']['id'] }}</span>
                                        <span data-lang-en class="hidden">{{ $prevArticle['title']['en'] }}</span>
                                    </h4>
                                </a>
                            @else
                                <div class="p-4 rounded-2xl border border-dashed border-slate-200 text-slate-400 text-xs flex items-center justify-center">
                                    <span data-lang-id>Ini adalah artikel terbaru</span>
                                    <span data-lang-en class="hidden">This is the latest article</span>
                                </div>
                            @endif

                            {{-- Next Article --}}
                            @if ($nextArticle)
                                <a href="/news/{{ $nextArticle['slug'] }}"
                                   class="group flex flex-col justify-between p-4 rounded-2xl border border-slate-200 hover:border-primary hover:bg-blue-50/40 transition-all sm:text-right">
                                    <span class="text-[11px] font-bold text-slate-400 flex items-center sm:justify-end gap-1 group-hover:text-primary transition-colors">
                                        <span data-lang-id>Artikel Selanjutnya</span>
                                        <span data-lang-en class="hidden">Next Article</span>
                                        <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </span>
                                    <h4 class="text-xs font-bold text-slate-800 line-clamp-2 mt-2 group-hover:text-primary transition-colors">
                                        <span data-lang-id>{{ $nextArticle['title']['id'] }}</span>
                                        <span data-lang-en class="hidden">{{ $nextArticle['title']['en'] }}</span>
                                    </h4>
                                </a>
                            @else
                                <div class="p-4 rounded-2xl border border-dashed border-slate-200 text-slate-400 text-xs flex items-center justify-center">
                                    <span data-lang-id>Ini adalah artikel terakhir</span>
                                    <span data-lang-en class="hidden">This is the earliest article</span>
                                </div>
                            @endif
                        </div>

                    </div>
                </main>

                {{-- ──────────────────────────────────────────
                     RIGHT: Sticky Sidebar
                ────────────────────────────────────────── --}}
                <aside class="w-full lg:w-80 shrink-0 lg:sticky lg:top-28 lg:self-start space-y-5">

                    {{-- Back to All Articles Button --}}
                    <a href="/news"
                       class="w-full flex items-center justify-center gap-2 rounded-2xl bg-white border border-slate-200 hover:border-primary text-slate-700 hover:text-primary px-4 py-3 text-xs font-bold shadow-xs transition-all">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span data-lang-id>Kembali ke Semua Berita</span>
                        <span data-lang-en class="hidden">Back to All News</span>
                    </a>

                    {{-- 1. Table of Contents Widget --}}
                    @if (!empty($article['sections']))
                    <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
                        <h3 class="mb-3.5 flex items-center gap-2 text-sm font-bold text-slate-800">
                            <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-primary/10">
                                <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"/></svg>
                            </span>
                            <span data-lang-id>Daftar Isi</span>
                            <span data-lang-en class="hidden">Table of Contents</span>
                        </h3>
                        <nav class="space-y-1.5" aria-label="Table of contents">
                            @foreach ($article['sections'] as $sIdx => $sec)
                                <a href="#section-{{ $sIdx }}"
                                   class="group flex items-start gap-2.5 px-2.5 py-2 rounded-xl text-xs font-medium text-slate-600 hover:text-primary hover:bg-primary/5 transition-all">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-primary shrink-0 mt-1.5 transition-colors"></span>
                                    <span class="line-clamp-2">
                                        <span data-lang-id>{{ $sec['heading']['id'] }}</span>
                                        <span data-lang-en class="hidden">{{ $sec['heading']['en'] }}</span>
                                    </span>
                                </a>
                            @endforeach
                        </nav>
                    </div>
                    @endif

                    {{-- 2. Related Articles Widget --}}
                    <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
                        <h3 class="mb-4 flex items-center gap-2 text-sm font-bold text-slate-800">
                            <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-amber-500/10">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </span>
                            <span data-lang-id>Artikel Terkait</span>
                            <span data-lang-en class="hidden">Related Articles</span>
                        </h3>
                        <div class="space-y-3">
                            @foreach ($relatedArticles as $related)
                                <a href="/news/{{ $related['slug'] }}" class="group flex items-start gap-3 rounded-2xl p-2 hover:bg-slate-50 transition-colors">
                                    <img src="{{ $related['image'] }}" alt="" class="w-14 h-14 rounded-xl object-cover shrink-0 transition-transform duration-300 group-hover:scale-105"/>
                                    <div class="min-w-0 flex-1">
                                        <span class="text-[10px] font-bold text-primary block mb-0.5">
                                            <span data-lang-id>{{ $related['category_label']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $related['category_label']['en'] }}</span>
                                        </span>
                                        <h4 class="text-xs font-bold text-slate-700 leading-snug line-clamp-2 group-hover:text-primary transition-colors">
                                            <span data-lang-id>{{ $related['title']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $related['title']['en'] }}</span>
                                        </h4>
                                        <span class="mt-1 block text-[10px] text-slate-400">
                                            <span data-lang-id>{{ $related['date']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $related['date']['en'] }}</span>
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- 3. CTA Banner matching Theme Colors --}}
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] p-6 text-center shadow-xl shadow-primary/25 text-white">
                        <div class="pointer-events-none absolute -top-8 -right-8 h-28 w-28 rounded-full bg-sky-400/15 blur-2xl"></div>
                        <div class="pointer-events-none absolute -bottom-6 -left-6 h-20 w-20 rounded-full bg-white/5 blur-xl"></div>
                        <div class="relative z-10">
                            <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-xs border border-white/20">
                                <svg class="w-6 h-6 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <h4 class="text-sm font-bold mb-1.5">
                                <span data-lang-id>Tertarik Membangun Solusi Ini?</span>
                                <span data-lang-en class="hidden">Interested in This Solution?</span>
                            </h4>
                            <p class="text-xs text-blue-100/80 mb-4 leading-relaxed">
                                <span data-lang-id>Diskusikan kebutuhan website, software, atau cloud hosting Anda bersama arsitek teknologi kami.</span>
                                <span data-lang-en class="hidden">Discuss your web, custom software, or cloud infrastructure requirements with our architects.</span>
                            </p>
                            <a href="/contact" class="inline-flex items-center justify-center gap-2 w-full rounded-xl bg-white px-4 py-2.5 text-xs font-bold text-primary hover:bg-blue-50 transition-all shadow-md hover:scale-[1.02]">
                                <span data-lang-id>Mulai Konsultasi Gratis</span>
                                <span data-lang-en class="hidden">Start Free Consultation</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>

                </aside>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
(function() {
    const copyBtn = document.getElementById('copy-link-btn');
    const copyTextId = document.getElementById('copy-link-text');
    const copyTextEn = document.getElementById('copy-link-text-en');

    if (copyBtn) {
        copyBtn.addEventListener('click', function() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                const origId = copyTextId ? copyTextId.textContent : '';
                const origEn = copyTextEn ? copyTextEn.textContent : '';

                if (copyTextId) copyTextId.textContent = 'Tersalin!';
                if (copyTextEn) copyTextEn.textContent = 'Copied!';
                copyBtn.classList.add('bg-emerald-50', 'border-emerald-400', 'text-emerald-700');

                setTimeout(function() {
                    if (copyTextId) copyTextId.textContent = origId;
                    if (copyTextEn) copyTextEn.textContent = origEn;
                    copyBtn.classList.remove('bg-emerald-50', 'border-emerald-400', 'text-emerald-700');
                }, 2000);
            });
        });
    }
})();
</script>
@endpush
