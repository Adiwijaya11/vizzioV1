@props(['prefix' => 'hero'])

<div class="pointer-events-none absolute inset-0 z-0 overflow-hidden lg:block hidden" aria-hidden="true">
    <svg class="absolute left-0 top-0 h-full w-full" viewBox="0 0 1200 900" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <radialGradient id="{{ $prefix }}BlobGlow1" cx="28%" cy="22%" r="48%" gradientUnits="userSpaceOnUse">
                <stop offset="0%" stop-color="#5B9BD5" stop-opacity="0.18"/>
                <stop offset="60%" stop-color="#2158D0" stop-opacity="0.06"/>
                <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
            </radialGradient>
            <radialGradient id="{{ $prefix }}BlobGlow2" cx="75%" cy="78%" r="42%" gradientUnits="userSpaceOnUse">
                <stop offset="0%" stop-color="#60A5FA" stop-opacity="0.10"/>
                <stop offset="100%" stop-color="#2158D0" stop-opacity="0"/>
            </radialGradient>
            <linearGradient id="{{ $prefix }}TopSheen" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="white" stop-opacity="0.10"/>
                <stop offset="55%" stop-color="white" stop-opacity="0.03"/>
                <stop offset="100%" stop-color="white" stop-opacity="0"/>
            </linearGradient>
        </defs>

        <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="#2158D0"/>
        <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="url(#{{ $prefix }}BlobGlow1)"/>
        <path d="M0,0 L840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762 C766,818 645,858 468,876 C291,894 148,892 0,900 Z" fill="url(#{{ $prefix }}BlobGlow2)"/>

        <ellipse cx="220" cy="140" rx="380" ry="170" fill="white" fill-opacity="0.05" transform="rotate(-12 220 140)"/>
        <ellipse cx="80" cy="60" rx="120" ry="55" fill="white" fill-opacity="0.08" transform="rotate(-8 80 60)"/>
        <circle cx="820" cy="400" r="160" fill="white" fill-opacity="0.02"/>
        <ellipse cx="380" cy="820" rx="300" ry="80" fill="white" fill-opacity="0.025"/>
        <rect x="0" y="0" width="900" height="6" fill="url(#{{ $prefix }}TopSheen)" rx="0"/>

        <path d="M840,0 C910,0 975,38 998,118 C1021,198 1008,272 992,348 C976,424 998,478 982,560 C966,642 924,706 845,762" fill="none" stroke="white" stroke-opacity="0.08" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M820,12 C888,14 950,50 972,128 C994,206 982,278 968,354 C954,430 974,482 960,562 C946,642 906,702 830,756" fill="none" stroke="white" stroke-opacity="0.035" stroke-width="1" stroke-linecap="round"/>

        <circle cx="160" cy="240" r="3" fill="white" fill-opacity="0.10"/>
        <circle cx="280" cy="120" r="2" fill="white" fill-opacity="0.08"/>
        <circle cx="500" cy="60" r="2.5" fill="white" fill-opacity="0.07"/>
        <circle cx="680" cy="30" r="2" fill="white" fill-opacity="0.06"/>
        <circle cx="90" cy="400" r="3" fill="white" fill-opacity="0.05"/>
        <circle cx="340" cy="700" r="2" fill="white" fill-opacity="0.04"/>
        <circle cx="600" cy="780" r="2.5" fill="white" fill-opacity="0.035"/>
    </svg>
</div>

<div class="pointer-events-none absolute inset-0 z-0 lg:hidden" aria-hidden="true">
    <div class="absolute top-0 left-1/4 h-72 w-72 rounded-full bg-sky-400/15 blur-3xl"></div>
    <div class="absolute right-1/4 bottom-0 h-96 w-96 rounded-full bg-primary/15 blur-3xl"></div>
</div>
