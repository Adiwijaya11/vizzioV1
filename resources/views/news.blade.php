@php
    $curCatKey = $selectedCategory ?? 'all';
    $curDetail = $categoryDetail ?? null;
    $pageTitle = ($curDetail && $curCatKey !== 'all')
        ? ($curDetail['meta_title'] ?? 'Berita & Insight — VizzioCraft')
        : 'Berita & Insight — VizzioCraft';
    $pageMetaDesc = ($curDetail && $curCatKey !== 'all')
        ? ($curDetail['meta_desc'] ?? 'Berita terbaru, insight teknologi, update proyek, dan artikel praktis dari VizzioCraft.')
        : 'Berita terbaru, insight teknologi, update proyek, dan artikel praktis dari VizzioCraft.';
@endphp
@extends('layouts.app')

@section('title', $pageTitle)
@section('meta_description', $pageMetaDesc)

@section('content')
    @php
        $newsArticles = include base_path('resources/data/news.php');
        $categoryCounts = [
            'all'      => count($newsArticles),
            'company'  => 0,
            'project'  => 0,
            'event'    => 0,
            'tech'     => 0,
            'tips'     => 0,
            'industry' => 0,
        ];
        foreach ($newsArticles as $art) {
            if (isset($categoryCounts[$art['category']])) {
                $categoryCounts[$art['category']]++;
            }
        }

        $categoryMeta = [
            'all'      => ['dot' => 'bg-primary',    'id' => 'Semua Berita',   'en' => 'All News',       'href' => '/news',                     'icon' => 'grid'],
            'company'  => ['dot' => 'bg-indigo-500',  'id' => 'Perusahaan',     'en' => 'Company',        'href' => '/news/category/perusahaan', 'icon' => 'building'],
            'project'  => ['dot' => 'bg-emerald-500', 'id' => 'Proyek',         'en' => 'Projects',       'href' => '/news/category/proyek',     'icon' => 'folder'],
            'event'    => ['dot' => 'bg-purple-500',  'id' => 'Event',          'en' => 'Events',         'href' => '/events',                   'icon' => 'calendar'],
            'tech'     => ['dot' => 'bg-sky-500',     'id' => 'Teknologi',      'en' => 'Technology',     'href' => '/news/category/teknologi',  'icon' => 'cpu'],
            'tips'     => ['dot' => 'bg-amber-500',   'id' => 'Tips & Panduan', 'en' => 'Tips & Guides',  'href' => '/news/category/tips',       'icon' => 'lightbulb'],
            'industry' => ['dot' => 'bg-cyan-600',    'id' => 'Industri',       'en' => 'Industry',       'href' => '/news/category/industri',  'icon' => 'briefcase'],
        ];

        $catColors = [
            'tech'     => 'from-sky-500 to-blue-600',
            'project'  => 'from-emerald-500 to-teal-600',
            'company'  => 'from-indigo-500 to-violet-600',
            'tips'     => 'from-amber-500 to-orange-500',
            'event'    => 'from-purple-500 to-fuchsia-600',
            'industry' => 'from-cyan-600 to-teal-600',
        ];

        $heroGradient = 'from-primary-deep via-primary to-[#1E40AF]';
    @endphp

    {{-- ═══ HERO ═══ --}}
    <section class="relative w-full overflow-hidden py-16 sm:py-20 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF]">
        {{-- Organic SVG Blob (desktop) --}}
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden lg:block hidden" aria-hidden="true">
            <svg class="absolute left-0 top-0 w-full h-full" viewBox="0 0 1200 900" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="nBlobGlow1" cx="28%" cy="22%" r="48%" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#5B9BD5" stop-opacity="0.22"/>
                        <stop offset="60%"  stop-color="#2158D0" stop-opacity="0.08"/>
                        <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
                    </radialGradient>
                    <radialGradient id="nBlobGlow2" cx="75%" cy="78%" r="42%" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#60A5FA" stop-opacity="0.12"/>
                        <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
                    </radialGradient>
                    <linearGradient id="nTopSheen" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%"   stop-color="white" stop-opacity="0.12"/>
                        <stop offset="55%"  stop-color="white" stop-opacity="0.04"/>
                        <stop offset="100%" stop-color="white" stop-opacity="0"/>
                    </linearGradient>
                </defs>

                {{-- Main organic blob --}}
                <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="#2158D0" fill-opacity="0.4"/>
                <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="url(#nBlobGlow1)"/>
                <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="url(#nBlobGlow2)"/>

                <ellipse cx="220" cy="140" rx="380" ry="170" fill="white" fill-opacity="0.055" transform="rotate(-12 220 140)"/>
                <ellipse cx="80"  cy="60"  rx="120" ry="55"  fill="white" fill-opacity="0.09"  transform="rotate(-8 80 60)"/>
                <circle  cx="820" cy="400" r="160"  fill="white" fill-opacity="0.025"/>
                <ellipse cx="380" cy="820" rx="300" ry="80"  fill="white" fill-opacity="0.03"/>
                <rect    x="0"    y="0"    width="900" height="6" fill="url(#nTopSheen)" rx="0"/>

                <path d="M840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762" fill="none" stroke="white" stroke-opacity="0.1"   stroke-width="1.5" stroke-linecap="round"/>
                <path d="M820,12 C888,14 950,50 972,128 C994,206 982,278 968,354 C954,430 974,482 960,562 C946,642 906,702 830,756" fill="none" stroke="white" stroke-opacity="0.045" stroke-width="1"   stroke-linecap="round"/>

                <circle cx="160" cy="240" r="3"   fill="white" fill-opacity="0.12"/>
                <circle cx="280" cy="120" r="2"   fill="white" fill-opacity="0.10"/>
                <circle cx="500" cy="60"  r="2.5" fill="white" fill-opacity="0.09"/>
                <circle cx="680" cy="30"  r="2"   fill="white" fill-opacity="0.08"/>
                <circle cx="90"  cy="400" r="3"   fill="white" fill-opacity="0.07"/>
                <circle cx="340" cy="700" r="2"   fill="white" fill-opacity="0.06"/>
                <circle cx="600" cy="780" r="2.5" fill="white" fill-opacity="0.05"/>
            </svg>
        </div>

        {{-- Mobile blobs --}}
        <div class="absolute inset-0 z-0 lg:hidden pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-1/4 w-72 h-72 rounded-full bg-sky-400/20 blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 rounded-full bg-primary/20 blur-3xl"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <nav class="mb-8 flex items-center gap-2 text-xs text-blue-200/60" aria-label="Breadcrumb">
                <a href="/" class="inline-flex items-center gap-1 hover:text-white transition-colors font-medium">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span data-lang-id>Beranda</span><span data-lang-en class="hidden">Home</span>
                </a>
                <span class="text-blue-300/30 select-none">/</span>
                @if($curCatKey === 'all')
                    <span class="font-semibold text-white"><span data-lang-id>Berita & Insight</span><span data-lang-en class="hidden">News & Insights</span></span>
                @else
                    <a href="/news" class="hover:text-white transition-colors font-medium">
                        <span data-lang-id>Berita</span><span data-lang-en class="hidden">News</span>
                    </a>
                    <span class="text-blue-300/30 select-none">/</span>
                    <span class="font-semibold text-white">
                        <span data-lang-id>{{ $curDetail['label']['id'] ?? ucfirst($curCatKey) }}</span>
                        <span data-lang-en class="hidden">{{ $curDetail['label']['en'] ?? ucfirst($curCatKey) }}</span>
                    </span>
                @endif
            </nav>

            <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between gap-8">
                <div class="max-w-2xl">
                    <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs font-bold text-white backdrop-blur-sm shadow-sm">
                        <span class="h-1.5 w-1.5 rounded-full bg-sky-300 animate-pulse"></span>
                        <span data-lang-id>{{ $curDetail['badge']['id'] ?? 'VizzioCraft Newsroom' }}</span>
                        <span data-lang-en class="hidden">{{ $curDetail['badge']['en'] ?? 'VizzioCraft Newsroom' }}</span>
                    </div>
                    <h1 class="mb-4 text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.15]">
                        <span data-lang-id>{!! $curDetail['title']['id'] ?? 'Berita & <span class="text-sky-300">Insight</span> Terkini' !!}</span>
                        <span data-lang-en class="hidden">{!! $curDetail['title']['en'] ?? 'Latest <span class="text-sky-300">News</span> & Insights' !!}</span>
                    </h1>
                    <p class="text-sm sm:text-base text-blue-100/80 leading-relaxed max-w-xl">
                        <span data-lang-id>{{ $curDetail['desc']['id'] ?? 'Ikuti perkembangan terbaru seputar teknologi, proyek, dan inovasi digital dari tim VizzioCraft.' }}</span>
                        <span data-lang-en class="hidden">{{ $curDetail['desc']['en'] ?? 'Follow the latest developments in technology, projects, and digital innovation from the VizzioCraft team.' }}</span>
                    </p>
                </div>
                <div class="flex items-center gap-5 rounded-2xl bg-white/8 border border-white/15 px-6 py-4 backdrop-blur-sm shrink-0">
                    <div class="text-center">
                        <div class="text-2xl font-black text-white">{{ $curCatKey === 'all' ? count($newsArticles) : ($categoryCounts[$curCatKey] ?? count($newsArticles)) }}</div>
                        <div class="text-[11px] text-blue-200/60 mt-0.5"><span data-lang-id>Artikel</span><span data-lang-en class="hidden">Articles</span></div>
                    </div>
                    <div class="h-8 w-px bg-white/15"></div>
                    <div class="text-center">
                        <div class="text-2xl font-black text-white">{{ count($categoryMeta) - 1 }}</div>
                        <div class="text-[11px] text-blue-200/60 mt-0.5"><span data-lang-id>Kategori</span><span data-lang-en class="hidden">Categories</span></div>
                    </div>
                    <div class="h-8 w-px bg-white/15"></div>
                    <div class="text-center">
                        <div class="text-2xl font-black text-sky-300">2026</div>
                        <div class="text-[11px] text-blue-200/60 mt-0.5"><span data-lang-id>Tahun Ini</span><span data-lang-en class="hidden">This Year</span></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Wave divider --}}
        <div class="absolute bottom-0 left-0 right-0" aria-hidden="true">
            <svg viewBox="0 0 1440 44" preserveAspectRatio="none" class="h-11 w-full" fill="#EFF6FF"><path d="M0,44 C360,4 1080,56 1440,22 L1440,44 Z"/></svg>
        </div>
    </section>

    {{-- ═══ CONTENT ═══ --}}
    <div class="bg-[#EFF6FF] w-full min-h-screen">

        {{-- Count bar --}}
        <div class="sticky top-16 z-20 border-b border-blue-100/70 bg-white/80 backdrop-blur-md">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-2.5 flex items-center justify-between gap-4">
                <p class="text-xs text-slate-500">
                    <span data-lang-id>Menampilkan <span id="article-count-label" class="font-bold text-primary">{{ $curCatKey === 'all' ? count($newsArticles) : ($categoryCounts[$curCatKey] ?? count($newsArticles)) }}</span> artikel</span>
                    <span data-lang-en class="hidden">Showing <span id="article-count-label-en" class="font-bold text-primary">{{ $curCatKey === 'all' ? count($newsArticles) : ($categoryCounts[$curCatKey] ?? count($newsArticles)) }}</span> articles</span>
                </p>
                <div class="flex items-center gap-1.5 text-[11px] text-slate-400">
                    <svg class="w-3.5 h-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>
                    <span data-lang-id>Diperbarui hari ini</span><span data-lang-en class="hidden">Updated today</span>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8 lg:py-10">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-10 items-start">

                {{-- ═══ LEFT: Feed ═══ --}}
                <main class="w-full lg:flex-1 min-w-0 space-y-5">

                    {{-- Filter pills with Left/Right slider buttons --}}
                    <div class="relative w-full flex items-center gap-1.5 sm:gap-2">
                        {{-- Left slide button --}}
                        <button
                            type="button"
                            id="pill-scroll-left"
                            aria-label="Geser kategori ke kiri"
                            class="shrink-0 flex h-9 w-9 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-500 shadow-sm transition-all duration-200 hover:border-primary/40 hover:bg-primary/5 hover:text-primary hover:scale-105 active:scale-95 cursor-pointer disabled:opacity-30 disabled:pointer-events-none"
                        >
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        {{-- Scrollable Pills Track --}}
                        <div
                            id="pill-scroll-container"
                            class="flex-1 flex items-center gap-2 overflow-x-auto scroll-smooth py-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden touch-pan-x"
                            role="tablist"
                        >
                            @foreach(['all','company','project','event','tech','tips','industry'] as $cat)
                            @php
                                $cnt = $categoryCounts[$cat] ?? 0;
                                $m = $categoryMeta[$cat];
                                $lid = $m['id'] . " ({$cnt})";
                                $len = $m['en'] . " ({$cnt})";
                                $isCurrentTab = $curCatKey === $cat;
                            @endphp
                            <a href="{{ $m['href'] }}" data-filter-tab="{{ $cat }}" role="tab"
                                class="shrink-0 cursor-pointer rounded-2xl px-4 py-2 text-xs font-bold transition-all duration-200 {{ $isCurrentTab ? 'bg-primary text-white shadow-md shadow-primary/30' : 'bg-white border border-slate-200 text-slate-500 hover:border-primary/40 hover:text-primary hover:bg-blue-50' }}">
                                <span data-lang-id>{{ $lid }}</span><span data-lang-en class="hidden">{{ $len }}</span>
                            </a>
                            @endforeach
                        </div>

                        {{-- Right slide button --}}
                        <button
                            type="button"
                            id="pill-scroll-right"
                            aria-label="Geser kategori ke kanan"
                            class="shrink-0 flex h-9 w-9 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-500 shadow-sm transition-all duration-200 hover:border-primary/40 hover:bg-primary/5 hover:text-primary hover:scale-105 active:scale-95 cursor-pointer disabled:opacity-30 disabled:pointer-events-none"
                        >
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    {{-- Cards --}}
                    <div id="news-grid" class="space-y-4">
                        @foreach ($newsArticles as $index => $article)
                        @php $gr = $catColors[$article['category']] ?? 'from-primary to-blue-700'; @endphp
                        <article data-news-card data-category="{{ $article['category'] }}"
                            data-title="{{ strtolower($article['title']['id'].' '.$article['title']['en']) }}"
                            data-desc="{{ strtolower($article['desc']['id'].' '.$article['desc']['en']) }}"
                            class="news-card group relative flex flex-col sm:flex-row rounded-3xl bg-white border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:-translate-y-1 hover:border-primary/20 transition-all duration-300"
                            style="animation-delay:{{ $index*60 }}ms">

                            {{-- Image --}}
                            <div class="relative w-full sm:w-56 md:w-64 shrink-0 overflow-hidden bg-slate-100" style="min-height:190px">
                                <img src="{{ $article['image'] }}" alt="{{ $article['title']['id'] }}" loading="lazy"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/15 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
                                <span class="absolute top-3 left-3 inline-flex items-center gap-1.5 rounded-xl bg-gradient-to-r {{ $gr }} px-2.5 py-1 text-[10px] font-bold text-white shadow-lg">
                                    <x-news-icon :name="$article['icon']" class="w-3 h-3"/>
                                    <span data-lang-id>{{ $article['category_label']['id'] }}</span><span data-lang-en class="hidden">{{ $article['category_label']['en'] }}</span>
                                </span>
                                <span class="absolute bottom-3 right-3 inline-flex items-center gap-1 rounded-lg bg-black/50 backdrop-blur-sm px-2 py-1 text-[10px] font-medium text-white">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $article['read'] }}
                                </span>
                            </div>

                            {{-- Content --}}
                            <div class="flex flex-col flex-1 min-w-0 p-5 sm:p-6 justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-3 text-[11px] text-slate-400 font-medium">
                                        <svg class="w-3.5 h-3.5 text-primary/60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span data-lang-id>{{ $article['date']['id'] }}</span><span data-lang-en class="hidden">{{ $article['date']['en'] }}</span>
                                    </div>
                                    <h3 class="text-base sm:text-[17px] font-bold text-slate-800 mb-2.5 leading-snug group-hover:text-primary transition-colors duration-200">
                                        <a href="/news/{{ $article['slug'] }}" class="hover:underline">
                                            <span data-lang-id>{{ $article['title']['id'] }}</span><span data-lang-en class="hidden">{{ $article['title']['en'] }}</span>
                                        </a>
                                    </h3>
                                    <p class="text-xs sm:text-sm text-slate-500 leading-relaxed line-clamp-2 sm:line-clamp-3 mb-4">
                                        <span data-lang-id>{{ $article['desc']['id'] }}</span><span data-lang-en class="hidden">{{ $article['desc']['en'] }}</span>
                                    </p>
                                </div>
                                <div class="flex items-center justify-between pt-3.5 border-t border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-primary to-sky-500 text-white font-black text-[10px] flex items-center justify-center shadow-sm">VC</div>
                                        <span class="text-xs font-semibold text-slate-500">Tim VizzioCraft</span>
                                    </div>
                                    <a href="/news/{{ $article['slug'] }}" class="inline-flex items-center gap-1.5 rounded-xl bg-primary/8 px-3 py-1.5 text-xs font-bold text-primary hover:bg-primary hover:text-white transition-all duration-200 group/btn">
                                        <span data-lang-id>Baca Selengkapnya</span><span data-lang-en class="hidden">Read More</span>
                                        <svg class="w-3 h-3 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>

                    {{-- Empty state --}}
                    <div id="no-results" class="hidden rounded-3xl border-2 border-dashed border-slate-200 bg-white p-14 text-center">
                        <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center mx-auto mb-4 text-slate-400">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-700 mb-1.5">
                            <span data-lang-id>Tidak ada berita ditemukan</span><span data-lang-en class="hidden">No news found</span>
                        </h4>
                        <p class="text-sm text-slate-400 max-w-xs mx-auto mb-5">
                            <span data-lang-id>Coba gunakan kata kunci lain atau pilih kategori berbeda.</span>
                            <span data-lang-en class="hidden">Try different keywords or choose another category.</span>
                        </p>
                        <button type="button" id="reset-filter-btn"
                            class="inline-flex items-center gap-1.5 rounded-xl bg-primary px-5 py-2.5 text-xs font-bold text-white hover:bg-primary-dark transition-colors cursor-pointer shadow-md shadow-primary/25">
                            <span data-lang-id>Reset Filter & Pencarian</span><span data-lang-en class="hidden">Reset Filter & Search</span>
                        </button>
                    </div>

                    {{-- Pagination --}}
                    <div id="pagination-wrap" class="pt-4 pb-6 flex justify-center">
                        <nav class="inline-flex items-center gap-1 bg-white p-1.5 rounded-2xl border border-slate-200 shadow-sm" aria-label="Pagination">
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-slate-100 hover:text-primary transition-colors cursor-pointer" aria-label="Previous">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-primary text-white font-bold text-xs shadow-sm" aria-current="page">1</button>
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 hover:text-primary transition-colors text-xs font-semibold cursor-pointer">2</button>
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 hover:text-primary transition-colors text-xs font-semibold cursor-pointer">3</button>
                            <span class="px-2 text-xs text-slate-400">…</span>
                            <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-slate-100 hover:text-primary transition-colors cursor-pointer" aria-label="Next">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </nav>
                    </div>
                </main>

                {{-- ═══ RIGHT: Sidebar ═══ --}}
                <aside class="w-full lg:w-72 xl:w-80 shrink-0 lg:sticky lg:top-28 lg:self-start">
                    <div class="space-y-5">

                        {{-- 1. SEARCH dark card --}}
                        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] p-5 shadow-xl shadow-primary/30">
                            <div class="pointer-events-none absolute -top-8 -right-8 h-28 w-28 rounded-full bg-sky-400/15 blur-2xl"></div>
                            <div class="pointer-events-none absolute -bottom-6 -left-6 h-20 w-20 rounded-full bg-white/5 blur-xl"></div>
                            <h3 class="relative mb-3 flex items-center gap-2 text-sm font-bold text-white">
                                <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-white/15">
                                    <svg class="w-3.5 h-3.5 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </span>
                                <span data-lang-id>Cari Berita</span><span data-lang-en class="hidden">Search News</span>
                            </h3>
                            <div class="relative">
                                <input type="text" id="sidebar-search-input" placeholder="Ketik kata kunci..."
                                    class="relative w-full rounded-2xl border border-white/15 bg-white/10 pl-10 pr-4 py-2.5 text-xs text-white placeholder-blue-200/40 focus:bg-white/18 focus:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/15 transition-all"/>
                                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-blue-200/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>

                        {{-- 2. CATEGORIES white card --}}
                        <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
                            <h3 class="mb-3.5 flex items-center gap-2 text-sm font-bold text-slate-800">
                                <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-primary/10">
                                    <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                                </span>
                                <span data-lang-id>Kategori</span><span data-lang-en class="hidden">Categories</span>
                            </h3>
                            <ul class="space-y-0.5" role="list">
                                @foreach(['all','company','project','event','tech','tips','industry'] as $cat)
                                @php
                                    $m = $categoryMeta[$cat];
                                    $cnt = $categoryCounts[$cat] ?? 0;
                                    $isCurrentTab = $curCatKey === $cat;
                                @endphp
                                <li>
                                    <a href="{{ $m['href'] }}" data-filter-tab="{{ $cat }}"
                                        class="sidebar-cat-btn w-full flex items-center justify-between px-3 py-2.5 rounded-2xl text-xs font-semibold transition-all duration-200 cursor-pointer {{ $isCurrentTab ? 'bg-primary/8 text-primary' : 'text-slate-500 hover:bg-slate-50 hover:text-primary' }}">
                                        <span class="flex items-center gap-2.5">
                                            <span class="h-2 w-2 rounded-full {{ $m['dot'] }} shrink-0"></span>
                                            <span data-lang-id>{{ $m['id'] }}</span><span data-lang-en class="hidden">{{ $m['en'] }}</span>
                                        </span>
                                        <span class="shrink-0 min-w-[22px] text-center rounded-lg bg-slate-100 px-2 py-0.5 text-[10px] font-bold text-slate-500">{{ $cnt }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- 3. RECENT NEWS amber accent --}}
                        <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
                            <h3 class="mb-4 flex items-center gap-2 text-sm font-bold text-slate-800">
                                <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-amber-500/10">
                                    <svg class="w-3.5 h-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </span>
                                <span data-lang-id>Berita Terbaru</span><span data-lang-en class="hidden">Latest News</span>
                            </h3>
                            <div class="space-y-1">
                                @php $dotPalette = ['bg-sky-500','bg-emerald-500','bg-indigo-500','bg-amber-500']; @endphp
                                @foreach (array_slice($newsArticles, 0, 4) as $i => $recent)
                                <a href="/news/{{ $recent['slug'] }}" class="group flex items-start gap-3 rounded-2xl p-2.5 hover:bg-slate-50 transition-colors">
                                    <div class="relative shrink-0">
                                        <img src="{{ $recent['image'] }}" alt="" class="w-12 h-12 rounded-xl object-cover transition-transform duration-300 group-hover:scale-105"/>
                                        <span class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full border-2 border-white {{ $dotPalette[$i % 4] }}"></span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-0.5">
                                        <h4 class="text-xs font-bold text-slate-700 leading-snug line-clamp-2 group-hover:text-primary transition-colors">
                                            <span data-lang-id>{{ $recent['title']['id'] }}</span><span data-lang-en class="hidden">{{ $recent['title']['en'] }}</span>
                                        </h4>
                                        <span class="mt-1 block text-[10px] text-slate-400">
                                            <span data-lang-id>{{ $recent['date']['id'] }}</span><span data-lang-en class="hidden">{{ $recent['date']['en'] }}</span>
                                        </span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>

                        {{-- 4. CTA BANNER --}}
                        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] p-5 text-center shadow-lg shadow-primary/30">
                            <div class="pointer-events-none absolute -top-6 -right-6 h-20 w-20 rounded-full bg-white/10 blur-xl"></div>
                            <div class="relative">
                                <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-2xl bg-white/20">
                                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <p class="mb-1 text-xs font-bold text-white">
                                    <span data-lang-id>Punya proyek digital?</span><span data-lang-en class="hidden">Have a digital project?</span>
                                </p>
                                <p class="mb-3 text-[11px] text-white/80 leading-relaxed">
                                    <span data-lang-id>Konsultasikan dengan tim kami secara gratis.</span><span data-lang-en class="hidden">Consult with our team for free.</span>
                                </p>
                                <a href="/contact" class="inline-flex items-center gap-1.5 rounded-xl bg-white px-4 py-2 text-xs font-bold text-primary hover:bg-blue-50 transition-colors shadow-sm">
                                    <span data-lang-id>Hubungi Kami</span><span data-lang-en class="hidden">Contact Us</span>
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </aside>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<style>
.news-card { opacity:0; transform:translateY(18px); animation:ncSlideUp .42s ease forwards; }
@keyframes ncSlideUp { to { opacity:1; transform:translateY(0); } }
</style>
<script>
(function(){
    const allTabs   = document.querySelectorAll('[data-filter-tab]');
    const cards     = document.querySelectorAll('[data-news-card]');
    const search    = document.getElementById('sidebar-search-input');
    const labelId   = document.getElementById('article-count-label');
    const labelEn   = document.getElementById('article-count-label-en');
    const noResults = document.getElementById('no-results');
    const pagWrap   = document.getElementById('pagination-wrap');
    const resetBtn  = document.getElementById('reset-filter-btn');

    let activeFilter = '{{ $curCatKey }}', activeSearch = '';

    const PILL_ON  = 'shrink-0 cursor-pointer rounded-2xl px-4 py-2 text-xs font-bold transition-all duration-200 bg-primary text-white shadow-md shadow-primary/30';
    const PILL_OFF = 'shrink-0 cursor-pointer rounded-2xl px-4 py-2 text-xs font-bold transition-all duration-200 bg-white border border-slate-200 text-slate-500 hover:border-primary/40 hover:text-primary hover:bg-blue-50';
    const CAT_ON   = 'sidebar-cat-btn w-full flex items-center justify-between px-3 py-2.5 rounded-2xl text-xs font-semibold transition-all duration-200 cursor-pointer bg-primary/8 text-primary font-bold';
    const CAT_OFF  = 'sidebar-cat-btn w-full flex items-center justify-between px-3 py-2.5 rounded-2xl text-xs font-semibold transition-all duration-200 cursor-pointer text-slate-500 hover:bg-slate-50 hover:text-primary';

    function run(){
        let n = 0;
        cards.forEach(function(c){
            const ok = (activeFilter === 'all' || c.dataset.category === activeFilter) &&
                       (!activeSearch || c.dataset.title.includes(activeSearch) || c.dataset.desc.includes(activeSearch));
            if (ok) {
                c.style.display = '';
                void c.offsetWidth;
                n++;
            } else {
                c.style.display = 'none';
            }
        });
        if (labelId) labelId.textContent = n;
        if (labelEn) labelEn.textContent = n;
        if (noResults) noResults.classList.toggle('hidden', n > 0);
        if (pagWrap) pagWrap.classList.toggle('hidden', n === 0);
    }

    function styleAll(f){
        allTabs.forEach(function(t){
            const on = (t.dataset.filterTab === f);
            t.className = t.classList.contains('sidebar-cat-btn') ? (on ? CAT_ON : CAT_OFF) : (on ? PILL_ON : PILL_OFF);
        });
    }

    allTabs.forEach(function(t){
        t.addEventListener('click', function(e){
            const targetHref = t.getAttribute('href');
            activeFilter = t.dataset.filterTab || 'all';
            if (targetHref && window.history && window.history.pushState) {
                e.preventDefault();
                window.history.pushState({ category: activeFilter }, '', targetHref);
            }
            styleAll(activeFilter);
            run();
        });
    });

    if (search) {
        search.addEventListener('input', function(e){
            activeSearch = e.target.value.toLowerCase().trim();
            run();
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function(){
            activeFilter = 'all';
            activeSearch = '';
            if (search) search.value = '';
            if (window.history && window.history.pushState) {
                window.history.pushState({ category: 'all' }, '', '/news');
            }
            styleAll('all');
            run();
        });
    }

    window.addEventListener('popstate', function(e){
        if (e.state && e.state.category) {
            activeFilter = e.state.category;
        } else {
            const path = window.location.pathname;
            const match = path.match(/\/news\/category\/([a-zA-Z0-9_-]+)/);
            if (match) {
                activeFilter = match[1];
            } else {
                activeFilter = 'all';
            }
        }
        styleAll(activeFilter);
        run();
    });

    // Category Pills Slider Controls (Left / Right buttons)
    const pillContainer = document.getElementById('pill-scroll-container');
    const pillLeftBtn   = document.getElementById('pill-scroll-left');
    const pillRightBtn  = document.getElementById('pill-scroll-right');

    function updatePillButtons() {
        if (!pillContainer || !pillLeftBtn || !pillRightBtn) return;
        const maxScroll = pillContainer.scrollWidth - pillContainer.clientWidth;
        pillLeftBtn.disabled = pillContainer.scrollLeft <= 5;
        pillRightBtn.disabled = pillContainer.scrollLeft >= maxScroll - 5;
    }

    if (pillLeftBtn && pillContainer) {
        pillLeftBtn.addEventListener('click', function() {
            pillContainer.scrollBy({ left: -240, behavior: 'smooth' });
        });
    }

    if (pillRightBtn && pillContainer) {
        pillRightBtn.addEventListener('click', function() {
            pillContainer.scrollBy({ left: 240, behavior: 'smooth' });
        });
    }

    if (pillContainer) {
        pillContainer.addEventListener('scroll', updatePillButtons, { passive: true });
        window.addEventListener('resize', updatePillButtons);
        setTimeout(function() {
            updatePillButtons();
            const activeTabEl = pillContainer.querySelector('.bg-primary');
            if (activeTabEl) {
                activeTabEl.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }
        }, 150);
    }

    // Initialize with activeFilter
    styleAll(activeFilter);
    run();
})();
</script>
@endpush
