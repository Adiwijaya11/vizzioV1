@extends('layouts.app')

@section('title', 'VizzioCraft — Bergerak Memberi Solusi')
@section('meta_description', 'VizzioCraft menyediakan layanan Apps & Software Development, LMS Development, Domain, Web Design, Hosting, IoT Solutions, IT Maintenance, Digital Consulting, dan SEO Services.')

@push('head')
<style>
    @keyframes highlight-pulse {
        0%, 100% {
            box-shadow: 0 0 0 0px rgba(37, 99, 235, 0);
            transform: scale(1);
        }
        50% {
            box-shadow: 0 0 0 10px rgba(37, 99, 235, 0.4), 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            transform: scale(1.03);
            border-color: #2563EB;
        }
    }
    .service-card-highlight {
        animation: highlight-pulse 2.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        z-index: 20;
    }
</style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section data-hero-section class="relative w-full min-h-[calc(100svh-56px)] lg:h-[calc(100svh-56px)] flex items-center overflow-hidden">
        {{-- Dark background gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF]" aria-hidden="true"></div>
        
        {{-- Background Shape — Organic SVG Blob --}}
        <div id="hero-blob" style="opacity: 0; transform: translateX(-160px);" class="absolute inset-0 z-0 pointer-events-none overflow-hidden lg:block hidden" aria-hidden="true">
            <svg class="absolute left-0 top-0 w-full h-full" viewBox="0 0 1200 900" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    {{-- Radial glow gradient: bright center fading out --}}
                    <radialGradient id="blobGlow1" cx="28%" cy="22%" r="48%" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#5B9BD5" stop-opacity="0.22"/>
                        <stop offset="60%"  stop-color="#2158D0" stop-opacity="0.08"/>
                        <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
                    </radialGradient>
                    {{-- Secondary glow: bottom-right warmth --}}
                    <radialGradient id="blobGlow2" cx="75%" cy="78%" r="42%" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#60A5FA" stop-opacity="0.12"/>
                        <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
                    </radialGradient>
                    {{-- Soft linear sheen across the top edge --}}
                    <linearGradient id="topSheen" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%"   stop-color="white" stop-opacity="0.12"/>
                        <stop offset="55%"  stop-color="white" stop-opacity="0.04"/>
                        <stop offset="100%" stop-color="white" stop-opacity="0"/>
                    </linearGradient>
                </defs>

                {{-- ① Main organic blob fill --}}
                <path d="
                    M0,0
                    L840,0
                    C910,0 975,38 998,118
                    C1021,198 1008,272 992,348
                    C976,424 998,478 982,560
                    C966,642 924,706 845,762
                    C766,818 645,858 468,876
                    C291,894 148,892 0,900
                    Z
                " fill="#2158D0"/>

                {{-- ② Primary radial glow — upper-left spotlight --}}
                <path d="
                    M0,0 L840,0
                    C910,0 975,38 998,118
                    C1021,198 1008,272 992,348
                    C976,424 998,478 982,560
                    C966,642 924,706 845,762
                    C766,818 645,858 468,876
                    C291,894 148,892 0,900 Z
                " fill="url(#blobGlow1)"/>

                {{-- ③ Secondary glow — bottom accent --}}
                <path d="
                    M0,0 L840,0
                    C910,0 975,38 998,118
                    C1021,198 1008,272 992,348
                    C976,424 998,478 982,560
                    C966,642 924,706 845,762
                    C766,818 645,858 468,876
                    C291,894 148,892 0,900 Z
                " fill="url(#blobGlow2)"/>

                {{-- ④ Top-left large soft highlight ellipse --}}
                <ellipse cx="220" cy="140" rx="380" ry="170" fill="white" fill-opacity="0.055" transform="rotate(-12 220 140)"/>

                {{-- ⑤ Small crisp inner highlight pearl — top-left corner --}}
                <ellipse cx="80" cy="60" rx="120" ry="55" fill="white" fill-opacity="0.09" transform="rotate(-8 80 60)"/>

                {{-- ⑥ Mid-right decorative soft glow circle --}}
                <circle cx="820" cy="400" r="160" fill="white" fill-opacity="0.025"/>

                {{-- ⑦ Bottom-center subtle lift --}}
                <ellipse cx="380" cy="820" rx="300" ry="80" fill="white" fill-opacity="0.03"/>

                {{-- ⑧ Top-edge linear sheen band --}}
                <rect x="0" y="0" width="900" height="6" fill="url(#topSheen)" rx="0"/>

                {{-- ⑨ Right-edge flowing shimmer arc --}}
                <path d="
                    M840,0
                    C910,0 975,38 998,118
                    C1021,198 1008,272 992,348
                    C976,424 998,478 982,560
                    C966,642 924,706 845,762
                " fill="none" stroke="white" stroke-opacity="0.1" stroke-width="1.5" stroke-linecap="round"/>

                {{-- ⑩ Offset inner echo arc (gives 3D depth) --}}
                <path d="
                    M820,12
                    C888,14 950,50 972,128
                    C994,206 982,278 968,354
                    C954,430 974,482 960,562
                    C946,642 906,702 830,756
                " fill="none" stroke="white" stroke-opacity="0.045" stroke-width="1" stroke-linecap="round"/>

                {{-- ⑪ Scattered micro-dot accents for texture --}}
                <circle cx="160" cy="240" r="3" fill="white" fill-opacity="0.12"/>
                <circle cx="280" cy="120" r="2" fill="white" fill-opacity="0.1"/>
                <circle cx="500" cy="60"  r="2.5" fill="white" fill-opacity="0.09"/>
                <circle cx="680" cy="30"  r="2" fill="white" fill-opacity="0.08"/>
                <circle cx="90"  cy="400" r="3" fill="white" fill-opacity="0.07"/>
                <circle cx="340" cy="700" r="2" fill="white" fill-opacity="0.06"/>
                <circle cx="600" cy="780" r="2.5" fill="white" fill-opacity="0.05"/>
            </svg>
        </div>

        {{-- Mobile background gradient (lighter blobs on dark) --}}
        <div class="absolute inset-0 z-0 lg:hidden pointer-events-none" aria-hidden="true">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-deep/50 via-primary/30 to-[#1E40AF]/50"></div>
            <div class="absolute top-0 left-1/4 w-72 h-72 rounded-full bg-sky-400/20 blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 rounded-full bg-primary/20 blur-3xl"></div>
        </div>

        {{-- Main Container --}}
        <div class="relative z-10 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-12">
            <div id="hero-text" style="opacity: 0; transform: translateX(-90px);" class="w-full">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-8 sm:gap-10 lg:gap-14">
                    
                    {{-- Left Column: Text Content --}}
                    <div class="flex-1 min-w-0 text-left">
                        {{-- Badge (Clean White Pill) --}}
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/95 px-4 py-1.5 text-xs font-bold text-primary-deep shadow-md mb-5 lg:mb-6 backdrop-blur-sm">
                            <span class="h-2 w-2 rounded-full bg-primary animate-pulse"></span>
                            Digital Solutions Partner
                        </div>

                        {{-- Main Heading --}}
                        <h1 id="hero-heading" class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-extrabold tracking-tight text-white leading-[1.15] mb-4 lg:mb-5">
                            <span data-lang-id>Bergerak<br><span class="text-sky-300">Memberi Solusi.</span></span>
                            <span data-lang-en class="hidden">Moving Forward,<br><span class="text-sky-300">Providing Solutions.</span></span>
                        </h1>

                        {{-- Subheading --}}
                        <p class="text-sm sm:text-base lg:text-lg text-blue-50/90 leading-relaxed mb-7 lg:mb-8 font-normal">
                            <span data-lang-id>Kami hadir sebagai mitra digital terpercaya untuk membangun software, platform LMS, website modern, serta infrastruktur IT yang efisien dan terintegrasi.</span>
                            <span data-lang-en class="hidden">We are here as a trusted digital partner to build custom software, LMS platforms, modern websites, and integrated, efficient IT infrastructure.</span>
                        </p>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3 w-full">
                            <a
                                href="/#contact"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-primary shadow-sm hover:bg-blue-50 hover:scale-[1.02] hover:shadow-[0_12px_24px_rgba(255,255,255,0.2)] transition-all duration-300 w-full sm:w-auto touch-target select-none"
                            >
                                <span data-lang-id>Mulai Project</span>
                                <span data-lang-en class="hidden">Start Project</span>
                                <svg class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <a
                                href="/services"
                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/30 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-xs hover:bg-white/25 hover:border-white/50 hover:scale-[1.02] transition-all duration-300 w-full sm:w-auto touch-target select-none"
                            >
                                <span data-lang-id>Jelajahi Layanan</span>
                                <span data-lang-en class="hidden">Explore Services</span>
                            </a>
                        </div>
                    </div>


                    {{-- Right Column: Premium Glassmorphism Card --}}
                    <div class="w-full sm:w-[360px] lg:w-[430px] shrink-0 relative z-30">
                        <div class="relative rounded-3xl bg-white/10 border border-white/20 backdrop-blur-xl shadow-2xl p-6">
                            
                            {{-- Card inner glow decoration --}}
                            <div class="absolute inset-0 rounded-3xl overflow-hidden pointer-events-none" aria-hidden="true">
                                <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-sky-400/15 blur-2xl"></div>
                                <div class="absolute -bottom-8 -left-8 w-32 h-32 rounded-full bg-primary/20 blur-2xl"></div>
                            </div>

                            {{-- Card Header --}}
                            <div class="relative mb-4">
                                <h2 class="text-white font-bold text-base leading-snug">
                                    <span data-lang-id>Apa yang Anda butuhkan?</span>
                                    <span data-lang-en class="hidden">What do you need?</span>
                                </h2>
                            </div>

                            {{-- Search Bar Container with Dropdown --}}
                            <div id="hero-search-wrapper" class="relative z-50">
                                <div class="flex items-center gap-2">
                                    <div class="relative flex-1">
                                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-white/40 pointer-events-none">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                        <input 
                                            type="text" 
                                            id="hero-search-input" 
                                            placeholder="Cari layanan..."
                                            class="w-full bg-white/10 text-white placeholder-blue-100/50 pl-10 pr-4 py-2.5 rounded-xl border border-white/20 focus:border-white/50 focus:bg-white/15 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all duration-200 text-sm font-medium"
                                            autocomplete="off"
                                        >
                                    </div>
                                    <button 
                                        id="hero-search-btn"
                                        type="button"
                                        class="inline-flex items-center gap-1.5 bg-white text-primary font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 hover:scale-105 hover:shadow-[0_8px_20px_rgba(255,255,255,0.25)] transition-all duration-200 select-none shrink-0"
                                    >
                                        <span data-lang-id>Cari</span>
                                        <span data-lang-en class="hidden">Search</span>
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                </div>

                                {{-- Recommendation Popover (Shown On Focus/Click/Type) --}}
                                <div id="hero-search-recommendations" class="hidden absolute top-full left-0 right-0 z-50 mt-2 bg-white rounded-2xl border border-slate-200 shadow-2xl p-2.5 transform transition-all duration-200 origin-top">
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-2.5 py-1">
                                        <span data-lang-id>Rekomendasi Layanan</span>
                                        <span data-lang-en class="hidden">Recommended Services</span>
                                    </div>
                                    <div class="mt-1 space-y-0.5" id="recommendations-list">
                                        <button type="button" data-service-chip="apps-software-development" data-title="Apps & Software Development" class="rec-item w-full text-left px-3 py-2 rounded-xl text-xs font-semibold text-slate-800 hover:bg-primary/5 hover:text-primary transition-colors flex items-center justify-between group">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover:bg-primary"></span>
                                                Apps & Software Development
                                            </span>
                                            <span class="text-[10px] text-slate-400 group-hover:text-primary font-normal">Custom App</span>
                                        </button>
                                        <button type="button" data-service-chip="lms-development" data-title="LMS Development" class="rec-item w-full text-left px-3 py-2 rounded-xl text-xs font-semibold text-slate-800 hover:bg-primary/5 hover:text-primary transition-colors flex items-center justify-between group">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover:bg-primary"></span>
                                                LMS Development
                                            </span>
                                            <span class="text-[10px] text-slate-400 group-hover:text-primary font-normal">E-Learning</span>
                                        </button>
                                        <button type="button" data-service-chip="web-design" data-title="Web Design" class="rec-item w-full text-left px-3 py-2 rounded-xl text-xs font-semibold text-slate-800 hover:bg-primary/5 hover:text-primary transition-colors flex items-center justify-between group">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover:bg-primary"></span>
                                                Web Design
                                            </span>
                                            <span class="text-[10px] text-slate-400 group-hover:text-primary font-normal">UI/UX & Site</span>
                                        </button>
                                        <button type="button" data-service-chip="hosting" data-title="Hosting" class="rec-item w-full text-left px-3 py-2 rounded-xl text-xs font-semibold text-slate-800 hover:bg-primary/5 hover:text-primary transition-colors flex items-center justify-between group">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover:bg-primary"></span>
                                                Hosting & Cloud Server
                                            </span>
                                            <span class="text-[10px] text-slate-400 group-hover:text-primary font-normal">Cloud & VPS</span>
                                        </button>
                                        <button type="button" data-service-chip="seo-services" data-title="SEO Services" class="rec-item w-full text-left px-3 py-2 rounded-xl text-xs font-semibold text-slate-800 hover:bg-primary/5 hover:text-primary transition-colors flex items-center justify-between group">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover:bg-primary"></span>
                                                SEO Services
                                            </span>
                                            <span class="text-[10px] text-slate-400 group-hover:text-primary font-normal">Google Ranking</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- Services Section (Seamless Transition) --}}
    <section id="services" class="relative pt-20 pb-36 bg-[#F8FAFC] overflow-hidden">
        {{-- Decorative Round Blobs Background --}}
        <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-primary/8 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute top-1/3 -right-20 w-96 h-96 rounded-full bg-primary/6 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute bottom-10 left-1/4 w-52 h-52 rounded-full bg-primary/5 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute -bottom-12 right-1/3 w-64 h-64 rounded-full bg-sky-400/8 pointer-events-none" aria-hidden="true"></div>

        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 relative z-10">
            
            {{-- Section Header --}}
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    OUR SERVICES
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-ink mb-4">
                    Solusi Digital Terpadu untuk Bisnis Anda
                </h2>
                <p class="text-base text-ink-muted leading-relaxed">
                    Kami menyediakan ekosistem layanan teknologi lengkap dari tahap perencanaan, eksekusi, hingga dukungan berkelanjutan.
                </p>
            </div>

            {{-- 9 Services Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @php
                    $detailedServices = [
                        [
                            'title' => 'Apps & Software Development',
                            'desc' => 'Pengembangan aplikasi custom web & mobile berbasis arsitektur modern yang cepat, aman, dan scalable.',
                            'icon' => 'code',
                        ],
                        [
                            'title' => 'LMS Development',
                            'desc' => 'Platform Learning Management System interaktif untuk kebutuhan pelatihan perusahaan, sekolah, dan akademi.',
                            'icon' => 'academic',
                        ],
                        [
                            'title' => 'Domain',
                            'desc' => 'Layanan pendaftaran & konfigurasi nama domain bisnis tingkat lanjut secara cepat, praktis, dan terpercaya.',
                            'icon' => 'globe',
                        ],
                        [
                            'title' => 'Web Design',
                            'desc' => 'Desain UI/UX website modern berkelas dengan estetika visual tinggi yang responsif di seluruh perangkat.',
                            'icon' => 'layout',
                        ],
                        [
                            'title' => 'Hosting',
                            'desc' => 'Infrastruktur cloud hosting & server berkecepatan tinggi dengan jaminan proteksi data dan 99.9% uptime.',
                            'icon' => 'server',
                        ],
                        [
                            'title' => 'IoT Solutions',
                            'desc' => 'Integrasi sistem sensor pintar & perangkat otomatisasi berbasis Internet of Things untuk efisiensi bisnis.',
                            'icon' => 'cpu',
                        ],
                        [
                            'title' => 'IT Maintenance',
                            'desc' => 'Pemeliharaan sistem berkesinambungan, monitoring server, audit keamanan, dan bantuan teknis 24/7.',
                            'icon' => 'shield',
                        ],
                        [
                            'title' => 'Digital Consulting',
                            'desc' => 'Konsultasi strategi teknologi, analisis kebutuhan sistem, dan peta jalan transformasi digital perusahaan.',
                            'icon' => 'lightbulb',
                        ],
                        [
                            'title' => 'SEO Services',
                            'desc' => 'Optimasi mesin pencari organik untuk meningkatkan visibilitas brand, peringkat Google, dan konversi.',
                            'icon' => 'search',
                        ],
                    ];
                @endphp

                @foreach ($detailedServices as $s)
                    <div id="service-card-{{ Str::slug($s['title']) }}" class="group relative overflow-hidden rounded-2xl border border-border bg-white p-7 transition-all duration-[1900ms] ease-[cubic-bezier(0.22,1,0.36,1)] hover:-translate-y-2 hover:border-primary hover:shadow-[0_22px_44px_rgba(29,78,216,0.28)] flex flex-col justify-between scroll-mt-28">
                        {{-- Fluid Wave Fill: slow rise from bottom --}}
                        <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden rounded-2xl" aria-hidden="true">
                            <div class="service-wave-rise absolute inset-x-0 -bottom-2 -top-6">
                                {{-- Back Wave Layer (Lighter Sky Blue, wider crest) --}}
                                <div class="absolute -top-9 left-0 w-[200%] h-12 text-sky-400/50 animate-service-wave-back pointer-events-none">
                                    <svg class="w-full h-full fill-current" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                        <path d="M 0,35 C 180,5 380,75 600,35 C 820,5 1020,75 1200,35 L 1200,120 L 0,120 Z" />
                                    </svg>
                                </div>
                                
                                {{-- Front Wave Layer (Vibrant Primary Blue) --}}
                                <div class="absolute -top-7 left-0 w-[200%] h-10 text-[#3B82F6] animate-service-wave-front pointer-events-none">
                                    <svg class="w-full h-full fill-current" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                        <path d="M 0,45 C 200,85 400,10 600,45 C 800,85 1000,10 1200,45 L 1200,120 L 0,120 Z" />
                                    </svg>
                                </div>

                                {{-- Main Liquid Fill Body --}}
                                <div class="w-full h-full bg-gradient-to-t from-primary-deep via-primary to-[#3B82F6]"></div>
                                <div class="absolute inset-0 bg-[radial-gradient(120%_70%_at_50%_120%,rgba(255,255,255,0.25),transparent_55%)]"></div>
                            </div>
                        </div>

                        <div class="relative z-10">
                            {{-- Icon Header --}}
                            <div class="h-12 w-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-6 service-wave-ink group-hover:bg-white/15 group-hover:text-white group-hover:scale-110 group-hover:shadow-[0_0_0_1px_rgba(255,255,255,0.25)]">

                                @switch($s['icon'])
                                    @case('code')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                                        @break
                                    @case('academic')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                                        @break
                                    @case('globe')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                        @break
                                    @case('layout')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                                        @break
                                    @case('server')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                                        @break
                                    @case('cpu')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M3 9h2m-2 6h2m14-6h2m-2 6h2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                                        @break
                                    @case('shield')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                        @break
                                    @case('lightbulb')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                        @break
                                    @case('search')
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                        @break
                                @endswitch
                            </div>

                            {{-- Title & Description --}}
                            <h3 class="text-xl font-bold text-ink mb-3 service-wave-ink group-hover:text-white">
                                {{ $s['title'] }}
                            </h3>
                            <p class="text-sm text-ink-muted leading-relaxed mb-6 font-normal service-wave-ink group-hover:text-white/80">
                                {{ $s['desc'] }}
                            </p>
                        </div>

                        {{-- Card Link Footer --}}
                        <div class="relative z-10 pt-4 border-t border-border/40 service-wave-ink group-hover:border-white/25">
                            <a href="/#contact" class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary service-wave-ink group-hover:text-white">
                                <span>Pelajari Lebih Lanjut</span>
                                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- News Section --}}
    @php
        $newsArticles = include base_path('resources/data/news.php');
        $list = $newsArticles; // Show all 8 articles
    @endphp

    <section id="news" class="relative w-full pt-20 pb-20 bg-white border-t border-border/40 overflow-hidden">
        <div class="absolute top-1/2 -left-32 w-80 h-80 rounded-full bg-sky-400/5 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute -bottom-24 right-0 w-96 h-96 rounded-full bg-primary/5 pointer-events-none" aria-hidden="true"></div>

        <div class="relative z-10 w-full px-4 sm:px-8 lg:px-10">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    <span data-lang-id>KABAR TERBARU</span>
                    <span data-lang-en class="hidden">LATEST NEWS</span>
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-ink mb-3">
                    <span data-lang-id>Insight & Berita Terbaru Kami</span>
                    <span data-lang-en class="hidden">Our Latest Insights & News</span>
                </h2>
                <p class="text-base text-ink-muted leading-relaxed">
                    <span data-lang-id>Temukan update proyek terbaru, tren teknologi, tips bisnis, dan pengumuman resmi perusahaan.</span>
                    <span data-lang-en class="hidden">Find the latest project updates, technology trends, business tips, and official company announcements.</span>
                </p>
            </div>

            {{-- Premium Compact News Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="news-grid">
                @foreach ($list as $article)
                <article data-news-card data-category="{{ $article['category'] }}" class="group relative overflow-hidden rounded-xl border border-border bg-white shadow-sm hover:shadow-xl hover:border-primary/20 hover:-translate-y-1 transition-all duration-300 flex flex-col">
                    {{-- Image --}}
                    <div class="relative w-full h-32 overflow-hidden">
                        <img src="{{ $article['image'] }}" alt="" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-deep/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    </div>

                    {{-- Content --}}
                    <div class="p-4 flex flex-col flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2 mb-2.5">
                            <div class="inline-flex items-center gap-1 rounded-md bg-muted px-2 py-0.5 text-[10px] font-semibold text-primary">
                                <x-news-icon :name="$article['icon']" class="w-3 h-3" />
                                <span>
                                    <span data-lang-id>{{ $article['category_label']['id'] }}</span>
                                    <span data-lang-en class="hidden">{{ $article['category_label']['en'] }}</span>
                                </span>
                            </div>
                            <span class="text-[11px] text-ink-muted shrink-0">
                                <span data-lang-id>{{ $article['date']['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $article['date']['en'] }}</span>
                            </span>
                        </div>

                        <h3 class="text-sm font-bold text-ink mb-2 leading-snug line-clamp-2 group-hover:text-primary transition-colors duration-200">
                            <a href="/news/{{ $article['slug'] }}" class="hover:underline">
                                <span data-lang-id>{{ $article['title']['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $article['title']['en'] }}</span>
                            </a>
                        </h3>

                        <p class="text-[12px] text-ink-muted leading-relaxed font-normal flex-1 mb-3 line-clamp-2">
                            <span data-lang-id>{{ $article['desc']['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $article['desc']['en'] }}</span>
                        </p>

                        <div class="pt-3 border-t border-border/40 mt-auto">
                            <a href="/news/{{ $article['slug'] }}" class="inline-flex items-center gap-1 text-xs font-semibold text-primary group-hover:text-primary-dark transition-colors duration-200">
                                <span data-lang-id>Baca</span>
                                <span data-lang-en class="hidden">Read</span>
                                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- See More Link --}}
            <div class="text-center mt-8">
                <a href="/news" class="inline-flex items-center gap-2 rounded-xl border-2 border-primary px-6 py-3 text-sm font-semibold text-primary transition-all duration-300 hover:bg-primary hover:text-white hover:shadow-[0_8px_24px_rgba(37,99,235,.35)]">
                    <span data-lang-id>Lihat Semua Berita</span>
                    <span data-lang-en class="hidden">View All News</span>
                    <svg class="w-4 h-4 transition-transform duration-300 hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

@push('scripts')
<script>
(function () {
    var heroSection = document.querySelector('[data-hero-section]');
    var heroBlob    = document.getElementById('hero-blob');
    var heroText    = document.getElementById('hero-text');

    if (!heroSection || !heroBlob || !heroText) return;

    var hidden = true; // Start as hidden to trigger slideIn on load

    function slideIn() {
        if (hidden) {
            hidden = false;
            heroBlob.style.transform = 'translateX(0)';
            heroBlob.style.opacity   = '1';
            heroText.style.transform = 'translateX(0)';
            heroText.style.opacity   = '1';
        }
    }

    function slideOut() {
        if (!hidden) {
            hidden = true;
            heroBlob.style.transform = 'translateX(-160px)';
            heroBlob.style.opacity   = '0';
            heroText.style.transform = 'translateX(-90px)';
            heroText.style.opacity   = '0';
        }
    }

    function onScroll() {
        var bottom = heroSection.getBoundingClientRect().bottom;
        /* Hide when the hero's bottom edge passes 55% of the viewport height */
        if (bottom < window.innerHeight * 0.55) {
            slideOut();
        } else {
            slideIn();
        }
    }

    // Set transitions and run initial slideIn after layout settles (avoid FOUC/instant show)
    setTimeout(function () {
        heroBlob.style.transition = 'transform 0.85s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease';
        heroText.style.transition = 'transform 0.75s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.7s ease';
        onScroll();
    }, 100);

    window.addEventListener('scroll', onScroll, { passive: true });

    // Service Search Logic
    var servicesData = [
        { title: { id: 'Apps & Software Development', en: 'Apps & Software Development' }, slug: 'apps-software-development' },
        { title: { id: 'LMS Development', en: 'LMS Development' }, slug: 'lms-development' },
        { title: { id: 'Domain', en: 'Domain' }, slug: 'domain' },
        { title: { id: 'Web Design', en: 'Web Design' }, slug: 'web-design' },
        { title: { id: 'Hosting', en: 'Hosting' }, slug: 'hosting' },
        { title: { id: 'IoT Solutions', en: 'IoT Solutions' }, slug: 'iot-solutions' },
        { title: { id: 'IT Maintenance', en: 'IT Maintenance' }, slug: 'it-maintenance' },
        { title: { id: 'Digital Consulting', en: 'Digital Consulting' }, slug: 'digital-consulting' },
        { title: { id: 'SEO Services', en: 'SEO Services' }, slug: 'seo-services' }
    ];

    var searchInput = document.getElementById('hero-search-input');
    var searchBtn   = document.getElementById('hero-search-btn');

    function getLang() {
        return localStorage.getItem('vizzio_lang') || 'id';
    }

    function scrollToService(slug) {
        var target = document.getElementById('service-card-' + slug);
        if (!target) {
            // fallback: scroll to services section
            var section = document.getElementById('services');
            if (section) section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            return;
        }

        // Clear previous highlights
        document.querySelectorAll('.service-card-highlight').forEach(function(card) {
            card.classList.remove('service-card-highlight');
        });

        // Smooth scroll
        if (window.lenis) {
            window.lenis.scrollTo(target, { offset: -96, duration: 1.2 });
        } else {
            target.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        // Pulse highlight
        setTimeout(function() {
            target.classList.add('service-card-highlight');
        }, window.lenis ? 400 : 150);
        setTimeout(function() {
            target.classList.remove('service-card-highlight');
        }, 2800);
    }

    var recBox = document.getElementById('hero-search-recommendations');
    function showRecs() {
        if (recBox) recBox.classList.remove('hidden');
    }
    function hideRecs() {
        if (recBox) recBox.classList.add('hidden');
    }

    function doSearch() {
        if (!searchInput) return;
        var query = searchInput.value.toLowerCase().trim();
        if (query === '') {
            // Scroll to services section if empty
            var section = document.getElementById('services');
            if (section) {
                if (window.lenis) {
                    window.lenis.scrollTo(section, { offset: -80, duration: 1.0 });
                } else {
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
            return;
        }
        var l = getLang();
        var match = null;
        for (var i = 0; i < servicesData.length; i++) {
            var t = (servicesData[i].title[l] || servicesData[i].title['id']).toLowerCase();
            if (t.indexOf(query) !== -1) { match = servicesData[i]; break; }
        }
        if (match) {
            scrollToService(match.slug);
            searchInput.value = '';
        } else {
            // No match: still go to services section
            var section = document.getElementById('services');
            if (section) {
                if (window.lenis) {
                    window.lenis.scrollTo(section, { offset: -80, duration: 1.0 });
                } else {
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        }
    }

    if (searchInput) {
        searchInput.addEventListener('focus', showRecs);
        searchInput.addEventListener('click', showRecs);
        searchInput.addEventListener('input', function() {
            var val = searchInput.value.toLowerCase().trim();
            showRecs();
            document.querySelectorAll('.rec-item').forEach(function(item) {
                var title = (item.getAttribute('data-title') || '').toLowerCase();
                if (val === '' || title.indexOf(val) !== -1) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') { e.preventDefault(); hideRecs(); doSearch(); }
            if (e.key === 'Escape') { hideRecs(); searchInput.blur(); }
        });
    }

    document.addEventListener('click', function(e) {
        var wrapper = document.getElementById('hero-search-wrapper');
        if (wrapper && !wrapper.contains(e.target)) {
            hideRecs();
        }
    });

    if (searchBtn) {
        searchBtn.addEventListener('click', function() {
            hideRecs();
            doSearch();
        });
    }

    // Wire up Service Chips & Recommendations
    document.querySelectorAll('[data-service-chip]').forEach(function(chip) {
        chip.addEventListener('click', function(e) {
            e.stopPropagation();
            hideRecs();
            var title = chip.getAttribute('data-title');
            if (title && searchInput) {
                searchInput.value = title;
            }
            scrollToService(chip.getAttribute('data-service-chip'));
        });
    });

})();
</script>
@endpush

@endsection