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
    @php
        $heroBgImage = $heroBanner['bg_image'] ?? null;
    @endphp
    <section data-hero-section class="relative z-30 w-full min-h-[calc(100svh-4rem)] lg:h-[calc(100svh-4rem)] flex items-center">
        {{-- Base dark background gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF]" aria-hidden="true"></div>
        
        @if(!empty($heroBgImage))
            {{-- Mode 2: Custom Hero Image Background (Configured in Super Admin) --}}
            <div id="hero-bg-image" class="absolute inset-0 z-0 pointer-events-none overflow-hidden" aria-hidden="true">
                <img
                    src="{{ $heroBgImage }}"
                    alt="VizzioCraft Hero Background"
                    class="h-full w-full object-cover object-center"
                />
                <div class="absolute inset-0 bg-gradient-to-r from-primary-deep/90 via-primary/75 to-primary/45"></div>
            </div>
        @else
            {{-- Mode 1: Organic SVG Blob (Default when no image is set) --}}
            <div id="hero-blob" style="opacity: 0; transform: translateX(-160px);" class="absolute inset-0 z-0 pointer-events-none overflow-hidden" aria-hidden="true">
            {{-- Desktop SVG Blob (Screens lg and above) --}}
            <svg class="hidden lg:block absolute left-0 top-0 w-full h-full" viewBox="0 0 1200 900" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
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
                    L850,0
                    C920,0 990,45 1005,140
                    C1020,245 985,340 980,440
                    C975,540 1000,620 965,710
                    C930,800 830,855 640,880
                    C450,905 200,896 0,900
                    Z
                " fill="#2158D0"/>

                {{-- ② Primary radial glow — upper-left spotlight --}}
                <path d="
                    M0,0 L850,0
                    C920,0 990,45 1005,140
                    C1020,245 985,340 980,440
                    C975,540 1000,620 965,710
                    C930,800 830,855 640,880
                    C450,905 200,896 0,900 Z
                " fill="url(#blobGlow1)"/>

                {{-- ③ Secondary glow — bottom accent --}}
                <path d="
                    M0,0 L850,0
                    C920,0 990,45 1005,140
                    C1020,245 985,340 980,440
                    C975,540 1000,620 965,710
                    C930,800 830,855 640,880
                    C450,905 200,896 0,900 Z
                " fill="url(#blobGlow2)"/>

                {{-- ④ Top-left broad soft ambient highlight --}}
                <ellipse cx="260" cy="160" rx="420" ry="190" fill="white" fill-opacity="0.05" transform="rotate(-12 260 160)"/>

                {{-- ⑤ Bottom-center subtle depth lift --}}
                <ellipse cx="400" cy="820" rx="340" ry="85" fill="white" fill-opacity="0.03"/>

                {{-- ⑥ Top-edge linear sheen band --}}
                <rect x="0" y="0" width="880" height="6" fill="url(#topSheen)" rx="0"/>

                {{-- ⑦ Clean flowing luminous edge shimmer arc --}}
                <path d="
                    M850,0
                    C920,0 990,45 1005,140
                    C1020,245 985,340 980,440
                    C975,540 1000,620 965,710
                    C930,800 830,855 640,880
                " fill="none" stroke="white" stroke-opacity="0.12" stroke-width="1.5" stroke-linecap="round"/>

                {{-- ⑧ Offset inner depth echo line --}}
                <path d="
                    M832,10
                    C900,10 968,52 982,142
                    C996,242 964,334 958,432
                    C952,530 978,610 944,698
                    C912,786 816,840 632,864
                " fill="none" stroke="white" stroke-opacity="0.04" stroke-width="1" stroke-linecap="round"/>
            </svg>

            {{-- Mobile & Tablet SVG Blob (Screens below lg) --}}
            <svg class="block lg:hidden absolute left-0 top-0 w-full h-full" viewBox="0 0 540 960" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="mobileBlobFill" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%"   stop-color="#2563EB" stop-opacity="0.95"/>
                        <stop offset="50%"  stop-color="#1D4ED8" stop-opacity="0.9"/>
                        <stop offset="100%" stop-color="#1E40AF" stop-opacity="0.85"/>
                    </linearGradient>
                    <radialGradient id="mobileBlobGlow1" cx="35%" cy="18%" r="52%" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#60A5FA" stop-opacity="0.32"/>
                        <stop offset="55%"  stop-color="#2563EB" stop-opacity="0.14"/>
                        <stop offset="100%" stop-color="#1E40AF" stop-opacity="0"/>
                    </radialGradient>
                    <radialGradient id="mobileBlobGlow2" cx="68%" cy="76%" r="48%" gradientUnits="userSpaceOnUse">
                        <stop offset="0%"   stop-color="#38BDF8" stop-opacity="0.25"/>
                        <stop offset="60%"  stop-color="#1D4ED8" stop-opacity="0.08"/>
                        <stop offset="100%" stop-color="#1E40AF" stop-opacity="0"/>
                    </radialGradient>
                    <linearGradient id="mobileTopSheen" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%"   stop-color="white" stop-opacity="0.18"/>
                        <stop offset="70%"  stop-color="white" stop-opacity="0.05"/>
                        <stop offset="100%" stop-color="white" stop-opacity="0"/>
                    </linearGradient>
                </defs>

                {{-- ① Mobile Organic Blob Main Fill (Smooth graceful continuous wave) --}}
                <path d="
                    M0,0
                    L410,0
                    C480,0 520,100 505,250
                    C490,400 430,520 445,680
                    C460,820 420,920 290,960
                    L0,960
                    Z
                " fill="url(#mobileBlobFill)"/>

                {{-- ② Primary Ambient Radial Spotlight --}}
                <path d="
                    M0,0
                    L410,0
                    C480,0 520,100 505,250
                    C490,400 430,520 445,680
                    C460,820 420,920 290,960
                    L0,960
                    Z
                " fill="url(#mobileBlobGlow1)"/>

                {{-- ③ Secondary Lower Radial Accent --}}
                <path d="
                    M0,0
                    L410,0
                    C480,0 520,100 505,250
                    C490,400 430,520 445,680
                    C460,820 420,920 290,960
                    L0,960
                    Z
                " fill="url(#mobileBlobGlow2)"/>

                {{-- ④ Soft ambient highlight ellipse --}}
                <ellipse cx="160" cy="120" rx="250" ry="100" fill="white" fill-opacity="0.06" transform="rotate(-10 160 120)"/>

                {{-- ⑤ Top-edge sheen strip --}}
                <rect x="0" y="0" width="450" height="4" fill="url(#mobileTopSheen)"/>

                {{-- ⑥ Flowing luminous shimmer arc along the boundary --}}
                <path d="
                    M410,0
                    C480,0 520,100 505,250
                    C490,400 430,520 445,680
                    C460,820 420,920 290,960
                " fill="none" stroke="white" stroke-opacity="0.18" stroke-width="2" stroke-linecap="round"/>

                {{-- ⑦ Offset inner depth echo arc for 3D glassy realism --}}
                <path d="
                    M396,6
                    C464,6 502,102 488,248
                    C474,394 416,512 430,670
                    C444,808 406,906 280,948
                " fill="none" stroke="white" stroke-opacity="0.06" stroke-width="1.2" stroke-linecap="round"/>
            </svg>
        </div>
        @endif


        {{-- Main Container --}}
        <div class="relative z-20 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-6 lg:py-8">
            <div id="hero-text" style="opacity: 0; transform: translateX(-90px);" class="w-full">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-4 sm:gap-8 lg:gap-12 xl:gap-14">
                    
                    {{-- Left Column: Text Content --}}
                    <div class="w-full flex-1 min-w-0 text-left">
                        {{-- Eyebrow Pill (Refined Glassmorphism) --}}
                        <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1.5 text-[11px] sm:text-xs font-semibold tracking-wide text-white/95 backdrop-blur-md shadow-sm mb-3 sm:mb-4 lg:mb-5">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-300"></span>
                            </span>
                            <span>Digital Solutions Partner</span>
                        </div>

                        {{-- Main Heading --}}
                        <h1 id="hero-heading" class="text-3xl sm:text-4xl lg:text-5xl xl:text-[3.5rem] font-extrabold tracking-tight text-white leading-[1.12] mb-3 sm:mb-4 lg:mb-5">
                            <span data-lang-id>
                                Bergerak<br>
                                <span class="bg-gradient-to-r from-sky-200 via-sky-300 to-white bg-clip-text text-transparent">Memberi Solusi.</span>
                            </span>
                            <span data-lang-en class="hidden">
                                Moving Forward,<br>
                                <span class="bg-gradient-to-r from-sky-200 via-sky-300 to-white bg-clip-text text-transparent">Providing Solutions.</span>
                            </span>
                        </h1>

                        {{-- Subheading --}}
                        <p class="max-w-xl text-xs sm:text-base lg:text-[17px] text-blue-100/85 leading-relaxed mb-4 sm:mb-6 lg:mb-7 font-normal">
                            <span data-lang-id>Kami hadir sebagai mitra digital terpercaya untuk membangun software, platform LMS, website modern, serta infrastruktur IT yang efisien dan terintegrasi.</span>
                            <span data-lang-en class="hidden">We are here as a trusted digital partner to build custom software, LMS platforms, modern websites, and integrated, efficient IT infrastructure.</span>
                        </p>

                        {{-- Action Buttons --}}
                        <div class="flex flex-row items-center gap-2.5 sm:gap-3.5 w-full">
                            <a
                                href="/#contact"
                                class="group flex-1 sm:flex-none inline-flex items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 sm:px-6 sm:py-3.5 text-xs sm:text-sm font-bold text-primary-deep shadow-[0_10px_25px_rgba(15,23,42,0.18)] hover:bg-sky-50 hover:-translate-y-0.5 hover:shadow-[0_14px_30px_rgba(255,255,255,0.22)] transition-all duration-300 touch-target select-none whitespace-nowrap"
                            >
                                <span data-lang-id>Mulai Project</span>
                                <span data-lang-en class="hidden">Start Project</span>
                                <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4 text-primary shrink-0 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <a
                                href="/services"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 rounded-xl border border-white/25 bg-white/10 px-4 py-2.5 sm:px-6 sm:py-3.5 text-xs sm:text-sm font-semibold text-white backdrop-blur-md hover:bg-white/20 hover:border-white/40 hover:-translate-y-0.5 transition-all duration-300 touch-target select-none whitespace-nowrap"
                            >
                                <span data-lang-id>Jelajahi Layanan</span>
                                <span data-lang-en class="hidden">Explore Services</span>
                            </a>
                        </div>

                        {{-- Clean Minimal Core Pillars Strip (Hidden on small mobile to preserve clean above-the-fold fit) --}}
                        <div class="hidden sm:flex items-center flex-wrap gap-x-5 gap-y-2 mt-6 lg:mt-8 pt-4 lg:pt-5 border-t border-white/15 text-xs font-medium text-blue-100/80">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span data-lang-id>Software & LMS</span>
                                <span data-lang-en class="hidden">Software & LMS</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span data-lang-id>Web Modern</span>
                                <span data-lang-en class="hidden">Modern Web</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span data-lang-id>Infrastruktur IT</span>
                                <span data-lang-en class="hidden">IT Infrastructure</span>
                            </span>
                        </div>
                    </div>


                    {{-- Right Column: Premium Glassmorphism Card --}}
                    <div class="w-full sm:w-[380px] lg:w-[430px] shrink-0 relative z-30">
                        <div class="relative rounded-2xl sm:rounded-3xl bg-white/10 border border-white/20 backdrop-blur-xl shadow-2xl p-3.5 sm:p-5 lg:p-6">
                            
                            {{-- Card inner glow decoration --}}
                            <div class="absolute inset-0 rounded-2xl sm:rounded-3xl overflow-hidden pointer-events-none" aria-hidden="true">
                                <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-sky-400/15 blur-2xl"></div>
                                <div class="absolute -bottom-8 -left-8 w-32 h-32 rounded-full bg-primary/20 blur-2xl"></div>
                            </div>

                            {{-- Card Header --}}
                            <div class="relative mb-2 sm:mb-3.5">
                                <h2 class="text-white font-bold text-xs sm:text-base leading-snug">
                                    <span data-lang-id>Apa yang Anda butuhkan?</span>
                                    <span data-lang-en class="hidden">What do you need?</span>
                                </h2>
                            </div>

                            {{-- Search Bar Container with Dropdown --}}
                            <div id="hero-search-wrapper" class="relative z-50">
                                <div class="flex items-center gap-2">
                                    <div class="relative flex-1">
                                        <div class="absolute left-2.5 sm:left-3.5 top-1/2 -translate-y-1/2 text-white/40 pointer-events-none">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                        <input 
                                            type="text" 
                                            id="hero-search-input" 
                                            placeholder="Cari layanan..."
                                            class="w-full bg-white/10 text-white placeholder-blue-100/50 pl-8 sm:pl-10 pr-3 sm:pr-4 py-2 sm:py-2.5 rounded-xl border border-white/20 focus:border-white/50 focus:bg-white/15 focus:outline-none focus:ring-2 focus:ring-white/10 transition-all duration-200 text-xs sm:text-sm font-medium"
                                            autocomplete="off"
                                        >
                                    </div>
                                    <button 
                                        id="hero-search-btn"
                                        type="button"
                                        class="inline-flex items-center gap-1 sm:gap-1.5 bg-white text-primary font-bold text-xs sm:text-sm px-3 sm:px-4 py-2 sm:py-2.5 rounded-xl hover:bg-blue-50 hover:scale-105 hover:shadow-[0_8px_20px_rgba(255,255,255,0.25)] transition-all duration-200 select-none shrink-0"
                                    >
                                        <span data-lang-id>Cari</span>
                                        <span data-lang-en class="hidden">Search</span>
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                </div>

                                {{-- Recommendation Popover (Shown On Focus/Click/Type) --}}
                                @php
                                    try {
                                        $servicesList = \App\Models\Service::where('status', 'active')->orderBy('id')->get();
                                    } catch (\Throwable $e) {
                                        $servicesList = collect();
                                    }
                                @endphp
                                <div id="hero-search-recommendations" data-lenis-prevent class="hidden absolute top-full left-0 right-0 z-[100] mt-1.5 sm:mt-2 bg-white rounded-xl sm:rounded-2xl border border-slate-200 shadow-[0_20px_50px_rgba(15,23,42,0.22)] p-2 sm:p-2.5 transform transition-all duration-200 origin-top max-h-48 sm:max-h-60 overflow-y-auto">
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-2 sm:px-2.5 py-1">
                                        <span data-lang-id>Rekomendasi Layanan</span>
                                        <span data-lang-en class="hidden">Recommended Services</span>
                                    </div>
                                    <div class="mt-1 space-y-0.5" id="recommendations-list">
                                        @foreach ($servicesList as $s)
                                        <button type="button" data-service-chip="{{ $s->slug }}" data-title="{{ $s->title }}" class="rec-item w-full text-left px-3 py-2 rounded-xl text-xs font-semibold text-slate-800 hover:bg-primary/5 hover:text-primary transition-colors flex items-center justify-between group cursor-pointer">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover:bg-primary"></span>
                                                {{ $s->title }}
                                            </span>
                                            <span class="text-[10px] text-slate-400 group-hover:text-primary font-normal">{{ $s->category }}</span>
                                        </button>
                                        @endforeach
                                        <div id="rec-no-results" class="hidden px-3 py-4 text-center text-xs text-slate-400">
                                            <span data-lang-id>Tidak ada layanan yang cocok</span>
                                            <span data-lang-en class="hidden">No matching services</span>
                                        </div>
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
    <section id="services" class="relative z-10 pt-20 pb-36 bg-[#F8FAFC] overflow-hidden">
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

            {{-- Services Cards Grid --}}
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6 lg:gap-8">
                @forelse ($servicesList as $s)
                    <div id="service-card-{{ $s->slug }}" onclick="window.location.href='/services#service-card-{{ $s->slug }}'" class="group relative overflow-hidden rounded-xl sm:rounded-2xl border border-border bg-white p-3.5 sm:p-6 lg:p-7 transition-all duration-[1900ms] ease-[cubic-bezier(0.22,1,0.36,1)] hover:-translate-y-2 hover:border-primary hover:shadow-[0_22px_44px_rgba(29,78,216,0.28)] flex flex-col justify-between scroll-mt-28 cursor-pointer">
                        {{-- Fluid Wave Fill: slow rise from bottom --}}
                        <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden rounded-xl sm:rounded-2xl" aria-hidden="true">
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
                            <div class="h-9 w-9 sm:h-12 sm:w-12 rounded-lg sm:rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-3 sm:mb-6 service-wave-ink group-hover:bg-white/15 group-hover:text-white group-hover:scale-110 group-hover:shadow-[0_0_0_1px_rgba(255,255,255,0.25)]">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s->icon_path }}" />
                                </svg>
                            </div>

                            {{-- Title & Description --}}
                            <h3 class="text-sm sm:text-base lg:text-xl font-bold text-ink mb-1.5 sm:mb-3 service-wave-ink group-hover:text-white leading-snug">
                                <a href="/services#service-card-{{ $s->slug }}" class="hover:underline">
                                    {{ $s->title }}
                                </a>
                            </h3>
                            <p class="text-xs sm:text-sm text-ink-muted leading-relaxed mb-3 sm:mb-6 font-normal service-wave-ink group-hover:text-white/80 line-clamp-3 sm:line-clamp-none">
                                {{ $s->description }}
                            </p>
                        </div>

                        {{-- Card Link Footer --}}
                        <div class="relative z-10 pt-2.5 sm:pt-4 border-t border-border/40 service-wave-ink group-hover:border-white/25">
                            <a href="/services#service-card-{{ $s->slug }}" class="inline-flex items-center gap-1 sm:gap-1.5 text-[11px] sm:text-xs font-semibold text-primary service-wave-ink group-hover:text-white">
                                <span class="truncate">Pelajari Lebih Lanjut</span>
                                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 shrink-0 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-border text-ink-muted">
                        Belum ada layanan digital yang aktif.
                    </div>
                @endforelse
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
                <article data-news-card data-category="{{ $article['category'] }}" class="{{ $loop->iteration > 3 ? 'hidden sm:flex' : 'flex' }} group relative overflow-hidden rounded-xl border border-border bg-white shadow-sm hover:shadow-xl hover:border-primary/20 hover:-translate-y-1 transition-all duration-300 flex-col">
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

    if (!heroSection || !heroText) return;

    var hidden = true; // Start as hidden to trigger slideIn on load

    function slideIn() {
        if (hidden) {
            hidden = false;
            if (heroBlob) {
                heroBlob.style.transform = 'translateX(0)';
                heroBlob.style.opacity   = '1';
            }
            heroText.style.transform = 'translateX(0)';
            heroText.style.opacity   = '1';
        }
    }

    function slideOut() {
        if (!hidden) {
            hidden = true;
            if (heroBlob) {
                heroBlob.style.transform = 'translateX(-160px)';
                heroBlob.style.opacity   = '0';
            }
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
        if (heroBlob) {
            heroBlob.style.transition = 'transform 0.85s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease';
        }
        heroText.style.transition = 'transform 0.75s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.7s ease';
        onScroll();
    }, 100);

    window.addEventListener('scroll', onScroll, { passive: true });

    // Service Search Logic
    var servicesData = [
        @foreach($servicesList as $s)
        { title: { id: @json($s->title), en: @json($s->title) }, slug: @json($s->slug) },
        @endforeach
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
            var visibleCount = 0;
            document.querySelectorAll('.rec-item').forEach(function(item) {
                var title = (item.getAttribute('data-title') || '').toLowerCase();
                if (val === '' || title.indexOf(val) !== -1) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            var noResultEl = document.getElementById('rec-no-results');
            if (noResultEl) {
                noResultEl.style.display = (visibleCount === 0) ? 'block' : 'none';
            }
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

    window.addEventListener('scroll', function() {
        if (recBox && !recBox.classList.contains('hidden')) {
            hideRecs();
            if (searchInput) searchInput.blur();
        }
    }, { passive: true });

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