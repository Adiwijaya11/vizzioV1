@props([
    'eyebrowId' => 'MULAI SEKARANG',
    'eyebrowEn' => 'GET STARTED',
    'titleId',
    'titleEn',
    'descId',
    'descEn',
    'primaryHref' => '/#contact',
    'primaryId' => 'Hubungi Kami Sekarang',
    'primaryEn' => 'Contact Us Now',
    'secondaryHref' => '/about/approach',
    'secondaryId' => 'Pelajari Pendekatan Kami',
    'secondaryEn' => 'Learn Our Approach',
])

<section {{ $attributes->merge(['class' => 'relative overflow-hidden py-20 sm:py-24']) }}>
    <div class="absolute inset-0 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF]" aria-hidden="true"></div>

    {{-- Organic SVG Blob — same language as homepage hero --}}
    <div class="pointer-events-none absolute inset-0 z-0 hidden overflow-hidden lg:block" aria-hidden="true">
        <svg class="absolute left-0 top-0 h-full w-full" viewBox="0 0 1200 900" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <radialGradient id="ctaBlobGlow1" cx="28%" cy="22%" r="48%" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#5B9BD5" stop-opacity="0.22"/>
                    <stop offset="60%" stop-color="#2158D0" stop-opacity="0.08"/>
                    <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
                </radialGradient>
                <radialGradient id="ctaBlobGlow2" cx="75%" cy="78%" r="42%" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#60A5FA" stop-opacity="0.12"/>
                    <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
                </radialGradient>
                <linearGradient id="ctaTopSheen" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="white" stop-opacity="0.12"/>
                    <stop offset="55%" stop-color="white" stop-opacity="0.04"/>
                    <stop offset="100%" stop-color="white" stop-opacity="0"/>
                </linearGradient>
            </defs>

            <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="#2158D0"/>
            <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="url(#ctaBlobGlow1)"/>
            <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="url(#ctaBlobGlow2)"/>

            <ellipse cx="220" cy="140" rx="380" ry="170" fill="white" fill-opacity="0.055" transform="rotate(-12 220 140)"/>
            <ellipse cx="80" cy="60" rx="120" ry="55" fill="white" fill-opacity="0.09" transform="rotate(-8 80 60)"/>
            <circle cx="820" cy="400" r="160" fill="white" fill-opacity="0.025"/>
            <ellipse cx="380" cy="820" rx="300" ry="80" fill="white" fill-opacity="0.03"/>
            <rect x="0" y="0" width="900" height="6" fill="url(#ctaTopSheen)" rx="0"/>

            <path d="M840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762" fill="none" stroke="white" stroke-opacity="0.1" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M820,12 C888,14 950,50 972,128 C994,206 982,278 968,354 C954,430 974,482 960,562 C946,642 906,702 830,756" fill="none" stroke="white" stroke-opacity="0.045" stroke-width="1" stroke-linecap="round"/>

            <circle cx="160" cy="240" r="3" fill="white" fill-opacity="0.12"/>
            <circle cx="280" cy="120" r="2" fill="white" fill-opacity="0.1"/>
            <circle cx="500" cy="60" r="2.5" fill="white" fill-opacity="0.09"/>
            <circle cx="680" cy="30" r="2" fill="white" fill-opacity="0.08"/>
            <circle cx="90" cy="400" r="3" fill="white" fill-opacity="0.07"/>
            <circle cx="340" cy="700" r="2" fill="white" fill-opacity="0.06"/>
            <circle cx="600" cy="780" r="2.5" fill="white" fill-opacity="0.05"/>
        </svg>
    </div>

    {{-- Mobile: soft circular blobs --}}
    <div class="pointer-events-none absolute inset-0 z-0 lg:hidden" aria-hidden="true">
        <div class="absolute top-0 left-1/4 h-72 w-72 rounded-full bg-sky-400/20 blur-3xl"></div>
        <div class="absolute right-1/4 bottom-0 h-96 w-96 rounded-full bg-primary/20 blur-3xl"></div>
    </div>

    <div class="relative z-10 mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-[2rem] border border-white/20 bg-white/10 px-6 py-10 text-center shadow-[0_28px_80px_rgba(15,23,42,0.35)] backdrop-blur-md sm:px-12 sm:py-14">
            <div class="pointer-events-none absolute -top-20 left-1/2 h-40 w-72 -translate-x-1/2 rounded-full bg-white/20 blur-3xl" aria-hidden="true"></div>

            <div class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-4 py-1.5 text-[11px] font-bold uppercase tracking-[0.18em] text-sky-100 backdrop-blur-sm">
                <span class="h-1.5 w-1.5 rounded-full bg-sky-300 animate-pulse"></span>
                <span data-lang-id>{{ $eyebrowId }}</span>
                <span data-lang-en class="hidden">{{ $eyebrowEn }}</span>
            </div>

            <h2 class="mt-5 text-3xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-[2.6rem] lg:leading-tight">
                <span data-lang-id>{{ $titleId }}</span>
                <span data-lang-en class="hidden">{{ $titleEn }}</span>
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-blue-50/90 sm:text-base">
                <span data-lang-id>{{ $descId }}</span>
                <span data-lang-en class="hidden">{{ $descEn }}</span>
            </p>

            <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row sm:gap-4">
                <a
                    href="{{ $primaryHref }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-white px-7 py-3.5 text-sm font-bold text-primary shadow-[0_10px_30px_rgba(15,23,42,0.18)] transition-all duration-300 hover:-translate-y-0.5 hover:bg-blue-50 hover:shadow-[0_16px_36px_rgba(15,23,42,0.28)] sm:w-auto touch-target"
                >
                    <span data-lang-id>{{ $primaryId }}</span>
                    <span data-lang-en class="hidden">{{ $primaryEn }}</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a
                    href="{{ $secondaryHref }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-white/30 bg-white/10 px-7 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition-all duration-300 hover:bg-white/20 sm:w-auto touch-target"
                >
                    <span data-lang-id>{{ $secondaryId }}</span>
                    <span data-lang-en class="hidden">{{ $secondaryEn }}</span>
                </a>
            </div>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-[11px] font-medium text-blue-100/80 sm:text-xs">
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-3.5 w-3.5 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span data-lang-id>Konsultasi 30 menit</span>
                    <span data-lang-en class="hidden">30-min consultation</span>
                </span>
                <span class="hidden h-1 w-1 rounded-full bg-white/40 sm:inline-block" aria-hidden="true"></span>
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-3.5 w-3.5 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span data-lang-id>Tanpa komitmen</span>
                    <span data-lang-en class="hidden">No commitment</span>
                </span>
                <span class="hidden h-1 w-1 rounded-full bg-white/40 sm:inline-block" aria-hidden="true"></span>
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-3.5 w-3.5 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>24/7 SLA</span>
                </span>
            </div>
        </div>
    </div>
</section>
