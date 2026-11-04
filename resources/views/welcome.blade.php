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
    <section data-hero-section class="relative w-full h-[calc(100svh-4rem)] min-h-[calc(100svh-4rem)] flex items-center overflow-hidden">
        {{-- Dark background gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF]" aria-hidden="true"></div>
        
        {{-- Background Shape — Organic SVG Blob (Responsive: Mobile + Desktop) --}}
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

                {{-- ① Mobile Organic Blob Main Fill --}}
                <path d="
                    M0,0
                    L390,0
                    C450,0 510,45 500,130
                    C490,215 410,270 440,360
                    C470,450 530,500 515,600
                    C500,700 410,760 435,845
                    C450,905 395,955 300,960
                    L0,960
                    Z
                " fill="url(#mobileBlobFill)"/>

                {{-- ② Primary Ambient Radial Spotlight --}}
                <path d="
                    M0,0
                    L390,0
                    C450,0 510,45 500,130
                    C490,215 410,270 440,360
                    C470,450 530,500 515,600
                    C500,700 410,760 435,845
                    C450,905 395,955 300,960
                    L0,960
                    Z
                " fill="url(#mobileBlobGlow1)"/>

                {{-- ③ Secondary Lower Radial Accent --}}
                <path d="
                    M0,0
                    L390,0
                    C450,0 510,45 500,130
                    C490,215 410,270 440,360
                    C470,450 530,500 515,600
                    C500,700 410,760 435,845
                    C450,905 395,955 300,960
                    L0,960
                    Z
                " fill="url(#mobileBlobGlow2)"/>

                {{-- ④ Top-left soft highlight ellipse --}}
                <ellipse cx="140" cy="110" rx="220" ry="90" fill="white" fill-opacity="0.06" transform="rotate(-10 140 110)"/>

                {{-- ⑤ Inner pearl glow accent --}}
                <ellipse cx="70" cy="45" rx="90" ry="35" fill="white" fill-opacity="0.1" transform="rotate(-6 70 45)"/>

                {{-- ⑥ Mid soft glow circle --}}
                <circle cx="430" cy="380" r="130" fill="white" fill-opacity="0.035"/>

                {{-- ⑦ Bottom subtle lift --}}
                <ellipse cx="220" cy="880" rx="190" ry="60" fill="white" fill-opacity="0.04"/>

                {{-- ⑧ Top-edge sheen strip --}}
                <rect x="0" y="0" width="450" height="4" fill="url(#mobileTopSheen)"/>

                {{-- ⑨ Flowing luminous shimmer arc along the boundary --}}
                <path d="
                    M390,0
                    C450,0 510,45 500,130
                    C490,215 410,270 440,360
                    C470,450 530,500 515,600
                    C500,700 410,760 435,845
                    C450,905 395,955 300,960
                " fill="none" stroke="white" stroke-opacity="0.2" stroke-width="2" stroke-linecap="round"/>

                {{-- ⑩ Offset inner depth echo arc for 3D glassy realism --}}
                <path d="
                    M376,8
                    C434,8 488,48 478,126
                    C468,204 394,264 422,352
                    C452,440 508,490 494,588
                    C480,686 394,746 418,836
                    C432,894 380,942 288,950
                " fill="none" stroke="white" stroke-opacity="0.075" stroke-width="1.2" stroke-linecap="round"/>

                {{-- ⑪ Delicate floating micro-dots for modern tech elegance --}}
                <circle cx="90"  cy="180" r="2.5" fill="white" fill-opacity="0.22"/>
                <circle cx="210" cy="80"  r="1.5" fill="white" fill-opacity="0.2"/>
                <circle cx="340" cy="150" r="2"   fill="#38BDF8" fill-opacity="0.28"/>
                <circle cx="460" cy="280" r="2.5" fill="white" fill-opacity="0.18"/>
                <circle cx="120" cy="460" r="2"   fill="white" fill-opacity="0.16"/>
                <circle cx="390" cy="620" r="2.5" fill="#38BDF8" fill-opacity="0.25"/>
                <circle cx="270" cy="800" r="1.5" fill="white" fill-opacity="0.18"/>
            </svg>
        </div>


        {{-- Main Container --}}
        <div class="relative z-10 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-6 lg:py-8">
            <div id="hero-text" style="opacity: 0; transform: translateX(-90px);" class="w-full">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-4 sm:gap-8 lg:gap-12 xl:gap-14">
                    
                    {{-- Left Column: Text Content --}}
                    <div class="w-full flex-1 min-w-0 text-left">
                        {{-- Badge (Clean White Pill) --}}
                        <div class="inline-flex items-center gap-1.5 sm:gap-2 rounded-full bg-white/95 px-3 py-1 sm:px-4 sm:py-1.5 text-[11px] sm:text-xs font-bold text-primary-deep shadow-md mb-2 sm:mb-3.5 lg:mb-5 backdrop-blur-sm">
                            <span class="h-1.5 w-1.5 sm:h-2 sm:w-2 rounded-full bg-primary animate-pulse"></span>
                            Digital Solutions Partner
                        </div>

                        {{-- Main Heading --}}
                        <h1 id="hero-heading" class="text-2xl xs:text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-extrabold tracking-tight text-white leading-[1.18] mb-2 sm:mb-3 lg:mb-4">
                            <span data-lang-id>Bergerak<br><span class="text-sky-300">Memberi Solusi.</span></span>
                            <span data-lang-en class="hidden">Moving Forward,<br><span class="text-sky-300">Providing Solutions.</span></span>
                        </h1>

                        {{-- Subheading --}}
                        <p class="text-xs sm:text-base lg:text-lg text-blue-50/90 leading-relaxed mb-3 sm:mb-5 lg:mb-7 font-normal">
                            <span data-lang-id>Kami hadir sebagai mitra digital terpercaya untuk membangun software, platform LMS, website modern, serta infrastruktur IT yang efisien dan terintegrasi.</span>
                            <span data-lang-en class="hidden">We are here as a trusted digital partner to build custom software, LMS platforms, modern websites, and integrated, efficient IT infrastructure.</span>
                        </p>

                        {{-- Action Buttons --}}
                        <div class="flex flex-row items-center gap-2 sm:gap-3 w-full">
                            <a
                                href="/#contact"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 sm:gap-2 rounded-xl bg-white px-3.5 py-2.5 sm:px-6 sm:py-3.5 text-xs sm:text-sm font-bold text-primary shadow-sm hover:bg-blue-50 hover:scale-[1.02] hover:shadow-[0_12px_24px_rgba(255,255,255,0.2)] transition-all duration-300 touch-target select-none whitespace-nowrap"
                            >
                                <span data-lang-id>Mulai Project</span>
                                <span data-lang-en class="hidden">Start Project</span>
                                <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <a
                                href="/services"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 sm:gap-2 rounded-xl border border-white/30 bg-white/10 px-3.5 py-2.5 sm:px-6 sm:py-3.5 text-xs sm:text-sm font-semibold text-white backdrop-blur-xs hover:bg-white/25 hover:border-white/50 hover:scale-[1.02] transition-all duration-300 touch-target select-none whitespace-nowrap"
                            >
                                <span data-lang-id>Jelajahi Layanan</span>
                                <span data-lang-en class="hidden">Explore Services</span>
                            </a>
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
                                <div id="hero-search-recommendations" class="hidden absolute top-full left-0 right-0 z-50 mt-1.5 sm:mt-2 bg-white rounded-xl sm:rounded-2xl border border-slate-200 shadow-2xl p-2 sm:p-2.5 transform transition-all duration-200 origin-top max-h-48 sm:max-h-60 overflow-y-auto">
                                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-2 sm:px-2.5 py-1">
                                        <span data-lang-id>Rekomendasi Layanan</span>
                                        <span data-lang-en class="hidden">Recommended Services</span>
                                    </div>
                                    <div class="mt-1 space-y-0.5" id="recommendations-list">
                                        @foreach ($servicesList as $s)
                                        <button type="button" data-service-chip="{{ $s->slug }}" data-title="{{ $s->title }}" class="rec-item w-full text-left px-3 py-2 rounded-xl text-xs font-semibold text-slate-800 hover:bg-primary/5 hover:text-primary transition-colors flex items-center justify-between group">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover:bg-primary"></span>
                                                {{ $s->title }}
                                            </span>
                                            <span class="text-[10px] text-slate-400 group-hover:text-primary font-normal">{{ $s->category }}</span>
                                        </button>
                                        @endforeach
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

            {{-- Services Cards Grid --}}
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6 lg:gap-8">
                @forelse ($servicesList as $s)
                    <div id="service-card-{{ $s->slug }}" class="group relative overflow-hidden rounded-xl sm:rounded-2xl border border-border bg-white p-3.5 sm:p-6 lg:p-7 transition-all duration-[1900ms] ease-[cubic-bezier(0.22,1,0.36,1)] hover:-translate-y-2 hover:border-primary hover:shadow-[0_22px_44px_rgba(29,78,216,0.28)] flex flex-col justify-between scroll-mt-28">
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
                                {{ $s->title }}
                            </h3>
                            <p class="text-xs sm:text-sm text-ink-muted leading-relaxed mb-3 sm:mb-6 font-normal service-wave-ink group-hover:text-white/80 line-clamp-3 sm:line-clamp-none">
                                {{ $s->description }}
                            </p>
                        </div>

                        {{-- Card Link Footer --}}
                        <div class="relative z-10 pt-2.5 sm:pt-4 border-t border-border/40 service-wave-ink group-hover:border-white/25">
                            <a href="/services#all-services" class="inline-flex items-center gap-1 sm:gap-1.5 text-[11px] sm:text-xs font-semibold text-primary service-wave-ink group-hover:text-white">
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