@php
    $menus = [
        [
            'label' => ['id' => 'Beranda', 'en' => 'Home'],
            'href'  => '/',
        ],
        [
            'label' => ['id' => 'Tentang', 'en' => 'About'],
            'href'  => '/about/company',
            'intro' => [
                'title' => ['id' => 'Siapa kami',       'en' => 'Who we are'],
                'text'  => ['id' => 'Tim digital yang membantu perusahaan membangun produk, proses, dan kehadiran online yang lebih kuat.',
                            'en' => 'A digital team that helps companies build stronger products, processes, and online presence.'],
                'cta'   => ['id' => 'Pelajari lebih',   'en' => 'Learn more'],
            ],
            'items' => [
                ['label' => ['id' => 'Perusahaan', 'en' => 'Company'],  'desc' => ['id' => 'Cerita, visi, dan cara kami bekerja.',             'en' => 'Our story, vision, and how we work.'],              'href' => '/about/company'],
                ['label' => ['id' => 'Pendekatan', 'en' => 'Approach'], 'desc' => ['id' => 'Discovery, delivery, dan dukungan jangka panjang.', 'en' => 'Discovery, delivery, and long-term support.'],       'href' => '/about/approach'],
                ['label' => ['id' => 'Tim',        'en' => 'Team'],     'desc' => ['id' => 'Engineer, designer, dan consultant di satu meja.',  'en' => 'Engineers, designers, and consultants in one team.'], 'href' => '/about/team'],
            ],
        ],
        [
            'label' => ['id' => 'Layanan', 'en' => 'Services'],
            'href'  => '/services',
        ],
        [
            'label' => ['id' => 'Proyek', 'en' => 'Projects'],
            'href'  => '/projects',
            'intro' => [
                'title' => ['id' => 'Karya pilihan', 'en' => 'Selected work'],
                'text'  => ['id' => 'Cuplikan project yang menunjukkan cara kami menyelesaikan masalah bisnis nyata.',
                            'en' => 'A snapshot of projects showing how we solve real business problems.'],
                'cta'   => ['id' => 'Lihat proyek',  'en' => 'See projects'],
            ],
            'items' => [
                ['label' => ['id' => 'Platform Produk',  'en' => 'Product Platforms'], 'desc' => ['id' => 'Aplikasi yang dipakai tim dan pelanggan setiap hari.', 'en' => 'Apps used by teams and customers daily.'],         'href' => '/projects'],
                ['label' => ['id' => 'Situs Perusahaan', 'en' => 'Company Sites'],     'desc' => ['id' => 'Profil perusahaan yang jelas, cepat, dan SEO-ready.',  'en' => 'Clear, fast, and SEO-ready company profiles.'],    'href' => '/projects'],
                ['label' => ['id' => 'Alat Internal',    'en' => 'Internal Tools'],    'desc' => ['id' => 'Dashboard dan workflow untuk operasional.',             'en' => 'Dashboards and workflows for operations.'],         'href' => '/projects'],
            ],
        ],
        [
            'label' => ['id' => 'Berita', 'en' => 'News'],
            'href'  => '/news',
        ],
        [
            'label' => ['id' => 'Event', 'en' => 'Events'],
            'href'  => '/events',
        ],
        [
            'label' => ['id' => 'Kontak', 'en' => 'Contact'],
            'href'  => '/contact',
        ],
    ];

    $languages = [
        ['code' => 'id',    'name' => 'Bahasa Indonesia', 'short' => 'ID', 'country' => 'Indonesia', 'flag' => 'id'],
        ['code' => 'en',    'name' => 'English',          'short' => 'EN', 'country' => 'Global',    'flag' => 'gb'],
        ['code' => 'ja',    'name' => '日本語',            'short' => 'JA', 'country' => 'Japan',     'flag' => 'jp'],
        ['code' => 'ko',    'name' => '한국어',            'short' => 'KO', 'country' => 'Korea',     'flag' => 'kr'],
        ['code' => 'zh-CN', 'name' => '中文 (简体)',      'short' => 'ZH', 'country' => 'China',     'flag' => 'cn'],
        ['code' => 'ar',    'name' => 'العربية',          'short' => 'AR', 'country' => 'Arabic',    'flag' => 'sa'],
        ['code' => 'de',    'name' => 'Deutsch',          'short' => 'DE', 'country' => 'Germany',   'flag' => 'de'],
        ['code' => 'fr',    'name' => 'Français',         'short' => 'FR', 'country' => 'France',    'flag' => 'fr'],
        ['code' => 'es',    'name' => 'Español',          'short' => 'ES', 'country' => 'Spain',     'flag' => 'es'],
        ['code' => 'ru',    'name' => 'Русский',          'short' => 'RU', 'country' => 'Russia',    'flag' => 'ru'],
    ];
@endphp

<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-xl border-b border-border/40 shadow-[0_1px_0_rgba(0,0,0,0.04)]">
    <nav class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <x-logo class="text-lg" />

        {{-- Desktop Menu --}}
        <ul class="hidden items-center gap-1 lg:flex">
            @foreach ($menus as $menu)
                <li class="relative" @if (!empty($menu['items'])) data-nav-item @endif>
                    @if (!empty($menu['items']))
                        <button
                            type="button"
                            data-nav-trigger
                            class="group inline-flex items-center gap-1 rounded-lg px-3.5 py-2 text-[13px] font-medium text-ink-muted transition-all duration-200 hover:text-ink hover:bg-muted/70"
                            aria-expanded="false"
                        >
                            <span data-lang-id>{{ $menu['label']['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $menu['label']['en'] }}</span>
                            <svg class="h-3.5 w-3.5 text-ink-muted/60 group-hover:text-ink-muted transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div data-nav-panel class="invisible absolute left-1/2 top-full z-50 w-[38rem] -translate-x-1/2 pt-3 opacity-0 transition-all duration-200">
                            <div class="overflow-hidden rounded-2xl border border-border/70 bg-white/98 backdrop-blur-xl shadow-[0_24px_64px_rgba(0,0,0,0.10)]">
                                <div class="grid grid-cols-[13rem_1fr]">
                                    {{-- Left panel --}}
                                    <div class="bg-gradient-to-b from-primary/5 to-primary/3 border-r border-border/50 p-5">
                                        <p class="text-[10px] font-bold tracking-widest text-primary uppercase mb-2">
                                            <span data-lang-id>{{ $menu['intro']['title']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $menu['intro']['title']['en'] }}</span>
                                        </p>
                                        <p class="text-[13px] leading-relaxed text-ink-muted">
                                            <span data-lang-id>{{ $menu['intro']['text']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $menu['intro']['text']['en'] }}</span>
                                        </p>
                                        <a href="{{ $menu['href'] }}" class="mt-4 inline-flex items-center gap-1 text-[13px] font-semibold text-primary hover:text-primary-dark transition-colors">
                                            <span data-lang-id>{{ $menu['intro']['cta']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $menu['intro']['cta']['en'] }}</span>
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                        </a>
                                    </div>
                                    {{-- Right items --}}
                                    <ul class="p-3">
                                        @foreach ($menu['items'] as $item)
                                            <li>
                                                <a href="{{ $item['href'] }}" class="group/item flex items-start gap-3 rounded-xl px-3 py-2.5 transition-all duration-200 hover:bg-primary/5">
                                                    <div class="mt-0.5 w-7 h-7 rounded-lg bg-primary/8 flex items-center justify-center shrink-0 transition-colors group-hover/item:bg-primary/15">
                                                        <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                                    </div>
                                                    <div>
                                                        <span class="block text-[13px] font-semibold text-ink group-hover/item:text-primary transition-colors">
                                                            <span data-lang-id>{{ $item['label']['id'] }}</span>
                                                            <span data-lang-en class="hidden">{{ $item['label']['en'] }}</span>
                                                        </span>
                                                        <span class="mt-0.5 block text-[12px] leading-relaxed text-ink-muted">
                                                            <span data-lang-id>{{ $item['desc']['id'] }}</span>
                                                            <span data-lang-en class="hidden">{{ $item['desc']['en'] }}</span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                        @php
                            $path = trim($menu['href'], '/');
                            $isActive = $path === '' ? request()->is('/') : request()->is($path . '*');
                        @endphp
                        <a
                            href="{{ $menu['href'] }}"
                            class="inline-flex rounded-lg px-3.5 py-2 text-[13px] font-medium transition-all duration-200 {{ $isActive ? 'text-primary font-semibold' : 'text-ink-muted hover:text-ink hover:bg-muted/70' }}"
                        >
                            <span data-lang-id>{{ $menu['label']['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $menu['label']['en'] }}</span>
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>

        {{-- Desktop Right: Lang Switcher Dropdown + CTA --}}
        <div class="hidden lg:flex items-center gap-2.5">
            {{-- Language Switcher Dropdown --}}
            <div class="relative" id="lang-dropdown-wrapper" data-lenis-prevent>
                <button
                    id="lang-dropdown-btn"
                    type="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    class="inline-flex items-center gap-2 rounded-xl border border-border/80 bg-muted/40 px-3 py-1.5 text-xs font-semibold text-ink hover:border-primary/40 hover:bg-white hover:shadow-xs transition-all duration-200 cursor-pointer select-none"
                    title="Ganti Bahasa / Switch Language"
                >
                    <span id="current-lang-flag" class="shrink-0 flex items-center">
                        <x-flag-icon code="id" class="w-4.5 h-3" />
                    </span>
                    <span id="current-lang-code" class="text-[11px] font-bold tracking-wide text-ink">ID</span>
                    <svg id="lang-chevron" class="h-3 w-3 text-ink-muted/70 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- Desktop Dropdown Menu --}}
                <div
                    id="lang-dropdown-menu"
                    data-lenis-prevent
                    class="invisible opacity-0 scale-95 origin-top-right absolute right-0 top-full mt-2 w-72 rounded-2xl border border-border/80 bg-white/98 backdrop-blur-xl p-2 shadow-[0_20px_50px_rgba(15,23,42,0.14)] z-50 transition-all duration-200"
                >
                    <div class="px-3 py-2 border-b border-border/50 mb-1 flex items-center justify-between">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-ink-muted">Pilih Bahasa</span>
                        <span class="text-[10px] font-semibold text-primary bg-primary/10 px-2 py-0.5 rounded-full">10 Bahasa</span>
                    </div>
                    <div data-lenis-prevent class="lang-dropdown-scroll max-h-64 overflow-y-auto space-y-0.5 [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden overscroll-contain" style="scrollbar-width: none; -ms-overflow-style: none;">
                        @foreach($languages as $l)
                            <button
                                type="button"
                                data-lang-code="{{ $l['code'] }}"
                                data-lang-short="{{ $l['short'] }}"
                                data-lang-flag="{{ $l['flag'] }}"
                                class="lang-option-btn w-full flex items-center justify-between gap-2.5 px-3 py-2 rounded-xl text-left text-xs transition-colors hover:bg-primary/5 hover:text-primary group/lang cursor-pointer"
                            >
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <x-flag-icon code="{{ $l['flag'] }}" class="w-5 h-3.5" />
                                    <div class="min-w-0">
                                        <p class="font-medium text-ink group-hover/lang:text-primary truncate">{{ $l['name'] }}</p>
                                        <p class="text-[10px] text-ink-muted leading-tight">{{ $l['country'] }}</p>
                                    </div>
                                </div>
                                <span class="lang-check-icon hidden text-primary shrink-0" data-check-code="{{ $l['code'] }}">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- WA Quick Button --}}
            <a href="https://wa.me/6283114592416" target="_blank" rel="noopener noreferrer"
                class="inline-flex items-center gap-1.5 rounded-lg border border-[#25D366]/30 bg-[#25D366]/8 px-3 py-1.5 text-[13px] font-medium text-[#22c55e] transition-all duration-200 hover:bg-[#25D366]/15 hover:border-[#25D366]/50 hover:text-[#16a34a]"
                title="Chat WhatsApp"
            >
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            </a>

            {{-- CTA Button --}}
            <a
                href="/contact"
                class="inline-flex items-center gap-1.5 rounded-xl bg-primary px-4 py-2 text-[13px] font-semibold text-white transition-all duration-200 hover:bg-primary-dark shadow-[0_2px_8px_rgba(37,99,235,.25)] hover:shadow-[0_4px_16px_rgba(37,99,235,.4)] hover:-translate-y-0.5"
            >
                <span data-lang-id>Konsultasi Gratis</span>
                <span data-lang-en class="hidden">Free Consult</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        {{-- Mobile: Lang Switcher + Hamburger --}}
        <div class="flex items-center gap-2 lg:hidden">
            {{-- Language Selector (Mobile Dropdown) --}}
            <div class="relative" id="lang-dropdown-mobile-wrapper" data-lenis-prevent>
                <button
                    id="lang-dropdown-mobile-btn"
                    type="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    class="inline-flex items-center gap-1.5 rounded-xl border border-border/80 bg-muted/40 px-2.5 py-1.5 text-xs font-semibold text-ink hover:border-primary/40 hover:bg-white transition-all cursor-pointer select-none"
                    aria-label="Pilih Bahasa"
                >
                    <span id="current-lang-mobile-flag" class="shrink-0 flex items-center">
                        <x-flag-icon code="id" class="w-4 h-2.5" />
                    </span>
                    <span id="current-lang-mobile-code" class="text-[11px] font-bold">ID</span>
                    <svg id="lang-mobile-chevron" class="h-3 w-3 text-ink-muted/70 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- Mobile Dropdown Menu --}}
                <div
                    id="lang-dropdown-mobile-menu"
                    data-lenis-prevent
                    class="invisible opacity-0 scale-95 origin-top-right absolute right-0 top-full mt-2 w-64 rounded-2xl border border-border/80 bg-white/98 backdrop-blur-xl p-2 shadow-[0_20px_50px_rgba(15,23,42,0.18)] z-50 transition-all duration-200"
                >
                    <div class="px-2.5 py-1.5 border-b border-border/50 mb-1 flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-ink-muted">Pilih Bahasa</span>
                        <span class="text-[9px] font-semibold text-primary bg-primary/10 px-1.5 py-0.5 rounded-full">10 Bahasa</span>
                    </div>
                    <div data-lenis-prevent class="lang-dropdown-scroll max-h-60 overflow-y-auto space-y-0.5 [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden overscroll-contain" style="scrollbar-width: none; -ms-overflow-style: none;">
                        @foreach($languages as $l)
                            <button
                                type="button"
                                data-lang-code="{{ $l['code'] }}"
                                data-lang-short="{{ $l['short'] }}"
                                data-lang-flag="{{ $l['flag'] }}"
                                class="lang-option-btn w-full flex items-center justify-between gap-2 px-2.5 py-1.5 rounded-xl text-left text-xs transition-colors hover:bg-primary/5 hover:text-primary group/lang cursor-pointer"
                            >
                                <div class="flex items-center gap-2 min-w-0">
                                    <x-flag-icon code="{{ $l['flag'] }}" class="w-4.5 h-3" />
                                    <div class="min-w-0">
                                        <p class="font-medium text-ink group-hover/lang:text-primary truncate text-[12px]">{{ $l['name'] }}</p>
                                        <p class="text-[9px] text-ink-muted leading-none">{{ $l['country'] }}</p>
                                    </div>
                                </div>
                                <span class="lang-check-icon hidden text-primary shrink-0" data-check-code="{{ $l['code'] }}">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <button
                type="button"
                id="mobile-nav-toggle-btn"
                data-nav-toggle
                class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-border/80 bg-muted/40 text-ink hover:bg-muted hover:border-border transition-colors cursor-pointer"
                aria-expanded="false"
                aria-controls="mobile-nav"
                aria-label="Toggle menu"
            >
                <svg data-icon-open class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg data-icon-close class="hidden h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    @php
        $isHomePage = request()->is('/');
    @endphp

    {{-- Sub-category bar --}}
    <div
        id="subnav-category-bar"
        class="border-border/50 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/80 overflow-hidden {{ $isHomePage ? 'border-t-0' : 'border-t' }}"
        style="transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease, transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.2s ease; {{ $isHomePage ? 'max-height: 0px; opacity: 0; transform: translateY(-8px); pointer-events: none; border-top-width: 0px;' : 'max-height: 60px; opacity: 1; transform: translateY(0); pointer-events: auto;' }}"
    >
        <div class="mx-auto max-w-6xl px-3 sm:px-6 lg:px-8">
            <div class="relative flex items-center gap-1 sm:gap-2">
                {{-- Left slide arrow --}}
                <button
                    type="button"
                    id="subnav-scroll-left"
                    aria-label="Geser sub-navbar ke kiri"
                    class="shrink-0 flex h-7 w-7 items-center justify-center rounded-full border border-border/70 bg-white text-ink-muted shadow-sm hover:text-primary hover:border-primary/40 hover:bg-primary/5 transition-all cursor-pointer disabled:opacity-20 disabled:pointer-events-none"
                >
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </button>

                <nav id="subnav-scroll-container" class="flex-1 flex items-center gap-1 overflow-x-auto py-2 scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden touch-pan-x" aria-label="Kategori konten" role="navigation">
                    @php
                        $categories = [
                            ['key' => 'company',  'slug' => 'perusahaan', 'label' => ['id' => 'Perusahaan','en' => 'Company'],  'href' => '/about/company', 'icon' => 'building'],
                            ['key' => 'project',  'slug' => 'proyek',     'label' => ['id' => 'Proyek',    'en' => 'Project'],  'href' => '/projects',      'icon' => 'folder'],
                            ['key' => 'event',    'slug' => 'event',      'label' => ['id' => 'Event',     'en' => 'Event'],    'href' => '/events',        'icon' => 'calendar'],
                            ['key' => 'tech',     'slug' => 'teknologi',  'label' => ['id' => 'Teknologi', 'en' => 'Tech'],     'href' => '/technology',    'icon' => 'cpu'],
                            ['key' => 'tips',     'slug' => 'tips',       'label' => ['id' => 'Tips',      'en' => 'Tips'],     'href' => '/tips',          'icon' => 'lightbulb'],
                            ['key' => 'industry', 'slug' => 'industri',   'label' => ['id' => 'Partner & Klien', 'en' => 'Partner & Client'], 'href' => '/industries', 'icon' => 'briefcase'],
                        ];

                        $activeCategoryNav = null;
                        if (request()->is('about/company*') || request()->is('company*') || request()->is('perusahaan*')) {
                            $activeCategoryNav = 'company';
                        } elseif (request()->is('projects*') || request()->is('proyek*')) {
                            $activeCategoryNav = 'project';
                        } elseif (request()->is('events*')) {
                            $activeCategoryNav = 'event';
                        } elseif (request()->is('technology*') || request()->is('teknologi*')) {
                            $activeCategoryNav = 'tech';
                        } elseif (request()->is('tips*')) {
                            $activeCategoryNav = 'tips';
                        } elseif (request()->is('industries*') || request()->is('industri*') || request()->is('partners*') || request()->is('klien*') || request()->is('mitra*')) {
                            $activeCategoryNav = 'industry';
                        }
                    @endphp
                    @foreach ($categories as $cat)
                        @php
                            $isActive = false;
                            if ($activeCategoryNav) {
                                $isActive = ($activeCategoryNav === $cat['key'] || $activeCategoryNav === $cat['slug']);
                            }
                            $activeClass = $isActive
                                ? 'bg-primary text-white shadow-[0_2px_8px_rgba(37,99,235,.3)]'
                                : 'bg-white text-ink-muted hover:bg-muted hover:text-primary';
                        @endphp
                        <a
                            href="{{ $cat['href'] }}"
                            class="group shrink-0 inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-medium transition-all duration-200 ease-out {{ $activeClass }}"
                            @if($isActive) aria-current="page" @endif
                        >
                            @switch($cat['icon'])
                                @case('grid')
                                    <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                                    @break
                                @case('building')
                                    <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    @break
                                @case('folder')
                                    <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                                    @break
                                @case('calendar')
                                    <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                    @break
                                @case('cpu')
                                    <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 4v16M15 4v16M4 9h16M4 15h16"/></svg>
                                    @break
                                @case('lightbulb')
                                    <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 2a6 6 0 00-6 6v6a8 8 0 0016 0V8a6 6 0 00-6-6z"/><line x1="12" y1="20" x2="12" y2="23"/><line x1="8" y1="17" x2="8" y2="20"/><line x1="16" y1="17" x2="16" y2="20"/></svg>
                                    @break
                                @case('briefcase')
                                    <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M16 20V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/><rect x="2" y="6" width="20" height="12" rx="2"/></svg>
                                    @break
                            @endswitch
                            <span>
                                <span data-lang-id>{{ $cat['label']['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $cat['label']['en'] }}</span>
                            </span>
                        </a>
                    @endforeach
                </nav>

                {{-- Right slide arrow --}}
                <button
                    type="button"
                    id="subnav-scroll-right"
                    aria-label="Geser sub-navbar ke kanan"
                    class="shrink-0 flex h-7 w-7 items-center justify-center rounded-full border border-border/70 bg-white text-ink-muted shadow-sm hover:text-primary hover:border-primary/40 hover:bg-primary/5 transition-all cursor-pointer disabled:opacity-20 disabled:pointer-events-none"
                >
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </button>
            </div>
        </div>
    </div>

    <script>
    (function() {
        const subnavContainer = document.getElementById('subnav-scroll-container');
        const subnavLeftBtn   = document.getElementById('subnav-scroll-left');
        const subnavRightBtn  = document.getElementById('subnav-scroll-right');

        function updateSubnavButtons() {
            if (!subnavContainer || !subnavLeftBtn || !subnavRightBtn) return;
            const maxScroll = subnavContainer.scrollWidth - subnavContainer.clientWidth;
            subnavLeftBtn.disabled = subnavContainer.scrollLeft <= 5;
            subnavRightBtn.disabled = subnavContainer.scrollLeft >= maxScroll - 5;
        }

        if (subnavLeftBtn && subnavContainer) {
            subnavLeftBtn.addEventListener('click', function() {
                subnavContainer.scrollBy({ left: -200, behavior: 'smooth' });
            });
        }
        if (subnavRightBtn && subnavContainer) {
            subnavRightBtn.addEventListener('click', function() {
                subnavContainer.scrollBy({ left: 200, behavior: 'smooth' });
            });
        }
        if (subnavContainer) {
            subnavContainer.addEventListener('scroll', updateSubnavButtons, { passive: true });
            window.addEventListener('resize', updateSubnavButtons);
            window.addEventListener('subnav-visibility-change', function() {
                setTimeout(updateSubnavButtons, 350);
            });
            setTimeout(function() {
                updateSubnavButtons();
                const activeNavEl = subnavContainer.querySelector('[aria-current="page"]');
                if (activeNavEl) {
                    activeNavEl.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                }
            }, 100);
        }
    })();
    </script>

    {{-- Subnav Category Bar Show/Hide on Scroll (Hero Section Page) --}}
    <script>
    (function() {
        const subnavCategoryBar = document.getElementById('subnav-category-bar');
        const heroSection       = document.querySelector('[data-hero-section]');

        if (!subnavCategoryBar) return;

        // Jika halaman tidak memiliki hero section, pastikan subnav tampil normal
        if (!heroSection) {
            subnavCategoryBar.style.maxHeight = '';
            subnavCategoryBar.style.opacity = '';
            subnavCategoryBar.style.transform = '';
            subnavCategoryBar.style.pointerEvents = '';
            subnavCategoryBar.style.borderTopWidth = '';
            subnavCategoryBar.classList.remove('border-t-0');
            subnavCategoryBar.classList.add('border-t');
            return;
        }

        let isVisible = false;
        const scrollThreshold = 150;

        function showSubnav() {
            if (isVisible) return;
            isVisible = true;
            subnavCategoryBar.style.maxHeight = '60px';
            subnavCategoryBar.style.opacity = '1';
            subnavCategoryBar.style.transform = 'translateY(0)';
            subnavCategoryBar.style.pointerEvents = 'auto';
            subnavCategoryBar.style.borderTopWidth = '1px';
            subnavCategoryBar.classList.remove('border-t-0');
            subnavCategoryBar.classList.add('border-t');
            window.dispatchEvent(new Event('subnav-visibility-change'));
        }

        function hideSubnav() {
            if (!isVisible) return;
            isVisible = false;
            subnavCategoryBar.style.maxHeight = '0px';
            subnavCategoryBar.style.opacity = '0';
            subnavCategoryBar.style.transform = 'translateY(-8px)';
            subnavCategoryBar.style.pointerEvents = 'none';
            subnavCategoryBar.style.borderTopWidth = '0px';
            subnavCategoryBar.classList.remove('border-t');
            subnavCategoryBar.classList.add('border-t-0');
            window.dispatchEvent(new Event('subnav-visibility-change'));
        }

        function onScroll() {
            const currentScroll = window.scrollY || window.pageYOffset || document.documentElement.scrollTop || 0;
            if (currentScroll > scrollThreshold) {
                showSubnav();
            } else {
                hideSubnav();
            }
        }

        onScroll();

        window.addEventListener('scroll', onScroll, { passive: true });
        if (window.lenis) {
            window.lenis.on('scroll', onScroll);
        } else {
            const checkLenis = setInterval(function() {
                if (window.lenis) {
                    window.lenis.on('scroll', onScroll);
                    clearInterval(checkLenis);
                }
            }, 100);
            setTimeout(function() { clearInterval(checkLenis); }, 3000);
        }
    })();
    </script>

    {{-- Discreet Top Translation Bar --}}
    <div id="vizzio-translate-bar" aria-hidden="true"></div>

    {{-- Hidden Google Translate Element --}}
    <div id="google_translate_element" class="hidden"></div>

    {{-- ===== Automatic Full-Page Multi-Language Switcher Script ===== --}}
    <script>
    function googleTranslateElementInit() {
        if (window.google && window.google.translate) {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'id,en,ja,ko,zh-CN,ar,de,fr,es,ru',
                autoDisplay: false
            }, 'google_translate_element');
        }
    }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" async defer></script>

    <script>
    (function () {
        var currentLang = localStorage.getItem('vizzio_lang') || 'id';

        // Dropdown elements
        var desktopWrapper = document.getElementById('lang-dropdown-wrapper');
        var desktopBtn = document.getElementById('lang-dropdown-btn');
        var desktopMenu = document.getElementById('lang-dropdown-menu');
        var desktopChevron = document.getElementById('lang-chevron');

        var mobileWrapper = document.getElementById('lang-dropdown-mobile-wrapper');
        var mobileBtn = document.getElementById('lang-dropdown-mobile-btn');
        var mobileMenu = document.getElementById('lang-dropdown-mobile-menu');
        var mobileChevron = document.getElementById('lang-mobile-chevron');

        function openDropdown(btn, menu, chevron) {
            if (!menu) return;
            menu.classList.remove('invisible', 'opacity-0', 'scale-95');
            menu.classList.add('opacity-100', 'scale-100');
            if (chevron) chevron.classList.add('rotate-180');
            if (btn) btn.setAttribute('aria-expanded', 'true');
        }

        function closeDropdown(btn, menu, chevron) {
            if (!menu) return;
            menu.classList.remove('opacity-100', 'scale-100');
            menu.classList.add('opacity-0', 'scale-95');
            if (chevron) chevron.classList.remove('rotate-180');
            if (btn) btn.setAttribute('aria-expanded', 'false');
            setTimeout(function() {
                if (btn && btn.getAttribute('aria-expanded') === 'false') {
                    menu.classList.add('invisible');
                }
            }, 180);
        }

        function toggleDropdown(btn, menu, chevron) {
            if (!menu) return;
            var isClosed = menu.classList.contains('invisible') || menu.classList.contains('opacity-0');
            if (isClosed) {
                openDropdown(btn, menu, chevron);
            } else {
                closeDropdown(btn, menu, chevron);
            }
        }

        if (desktopBtn && desktopMenu) {
            desktopBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleDropdown(desktopBtn, desktopMenu, desktopChevron);
            });
        }

        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleDropdown(mobileBtn, mobileMenu, mobileChevron);
            });
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (desktopWrapper && !desktopWrapper.contains(e.target)) {
                closeDropdown(desktopBtn, desktopMenu, desktopChevron);
            }
            if (mobileWrapper && !mobileWrapper.contains(e.target)) {
                closeDropdown(mobileBtn, mobileMenu, mobileChevron);
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDropdown(desktopBtn, desktopMenu, desktopChevron);
                closeDropdown(mobileBtn, mobileMenu, mobileChevron);
            }
        });

        // Ensure scrolling inside the language dropdown scrolls the list, NOT the webpage
        document.querySelectorAll('.lang-dropdown-scroll').forEach(function(scrollEl) {
            scrollEl.addEventListener('wheel', function(e) {
                e.stopPropagation();
                var maxScroll = this.scrollHeight - this.clientHeight;
                if (maxScroll <= 0) return;

                var next = this.scrollTop + e.deltaY;
                if (next < 0) {
                    this.scrollTop = 0;
                } else if (next > maxScroll) {
                    this.scrollTop = maxScroll;
                } else {
                    this.scrollTop = next;
                }
                e.preventDefault();
            }, { passive: false });

            scrollEl.addEventListener('touchmove', function(e) {
                e.stopPropagation();
            }, { passive: true });
        });

        function clearGoogleTranslateCookies() {
            var host = window.location.hostname;
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=" + host + "; path=/;";
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=." + host + "; path=/;";
        }

        function setGoogleTranslateCookie(langCode) {
            var host = window.location.hostname;
            var cookieVal = "/id/" + langCode;
            document.cookie = "googtrans=" + cookieVal + "; path=/;";
            document.cookie = "googtrans=" + cookieVal + "; domain=" + host + "; path=/;";
            document.cookie = "googtrans=" + cookieVal + "; domain=." + host + "; path=/;";
        }

        function updateUI(code) {
            // Find option button for code
            var targetBtn = document.querySelector('.lang-option-btn[data-lang-code="' + code + '"]');
            var shortCode = targetBtn ? targetBtn.getAttribute('data-lang-short') : code.toUpperCase();

            // Update text labels
            var desktopCode = document.getElementById('current-lang-code');
            var mobileCode = document.getElementById('current-lang-mobile-code');
            if (desktopCode) desktopCode.textContent = shortCode;
            if (mobileCode) mobileCode.textContent = shortCode;

            // Update flag SVGs
            if (targetBtn) {
                var flagSvg = targetBtn.querySelector('svg');
                if (flagSvg) {
                    var dFlag = document.getElementById('current-lang-flag');
                    var mFlag = document.getElementById('current-lang-mobile-flag');
                    if (dFlag) {
                        dFlag.innerHTML = '';
                        var clonedD = flagSvg.cloneNode(true);
                        clonedD.setAttribute('class', 'w-4.5 h-3 rounded-[2px] shrink-0 shadow-xs border border-black/10');
                        dFlag.appendChild(clonedD);
                    }
                    if (mFlag) {
                        mFlag.innerHTML = '';
                        var clonedM = flagSvg.cloneNode(true);
                        clonedM.setAttribute('class', 'w-4 h-2.5 rounded-[2px] shrink-0 shadow-xs border border-black/10');
                        mFlag.appendChild(clonedM);
                    }
                }
            }

            // Update check icons and active states across all dropdowns
            document.querySelectorAll('.lang-option-btn').forEach(function(btn) {
                var btnCode = btn.getAttribute('data-lang-code');
                var isMatch = btnCode === code;
                var check = btn.querySelector('.lang-check-icon');
                if (check) {
                    check.classList.toggle('hidden', !isMatch);
                }
                if (isMatch) {
                    btn.classList.add('bg-primary/10', 'text-primary');
                } else {
                    btn.classList.remove('bg-primary/10', 'text-primary');
                }
            });

            // Toggle curated bilingual labels in template
            var isId = code === 'id';
            document.querySelectorAll('[data-lang-id]').forEach(function(el) {
                el.classList.toggle('hidden', !isId);
            });
            document.querySelectorAll('[data-lang-en]').forEach(function(el) {
                el.classList.toggle('hidden', isId);
            });

            document.documentElement.lang = code;
        }

        function applyLang(code, isUserAction) {
            currentLang = code;
            localStorage.setItem('vizzio_lang', code);

            updateUI(code);

            // Close dropdowns
            closeDropdown(desktopBtn, desktopMenu, desktopChevron);
            closeDropdown(mobileBtn, mobileMenu, mobileChevron);

            var bar = document.getElementById('vizzio-translate-bar');

            if (code === 'id') {
                clearGoogleTranslateCookies();

                var select = document.querySelector('.goog-te-combo');
                if (select && select.value !== '') {
                    select.value = '';
                    select.dispatchEvent(new Event('change'));
                }

                if (isUserAction && (document.querySelector('.goog-te-combo') || document.cookie.indexOf('googtrans') !== -1)) {
                    if (bar) {
                        bar.classList.add('is-active');
                        bar.style.opacity = '1';
                    }
                    setTimeout(function() {
                        location.reload();
                    }, 300);
                }
            } else {
                setGoogleTranslateCookie(code);

                if (isUserAction && bar) {
                    bar.classList.add('is-active');
                    bar.style.opacity = '1';
                }

                var select = document.querySelector('.goog-te-combo');
                if (select) {
                    select.value = code;
                    select.dispatchEvent(new Event('change'));
                    if (bar) {
                        setTimeout(function() {
                            bar.style.opacity = '0';
                            setTimeout(function() { bar.classList.remove('is-active'); }, 400);
                        }, 500);
                    }
                } else if (isUserAction) {
                    // If Google Translate engine isn't ready in DOM yet, reload page cleanly with cookie
                    setTimeout(function() {
                        location.reload();
                    }, 250);
                }
            }
        }

        // Attach click listeners to all language options in dropdowns
        document.querySelectorAll('.lang-option-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                var code = this.getAttribute('data-lang-code');
                applyLang(code, true);
            });
        });

        // Initialize state on load
        if (currentLang === 'id') {
            clearGoogleTranslateCookies();
            updateUI('id');
        } else {
            setGoogleTranslateCookie(currentLang);
            updateUI(currentLang);
            window.addEventListener('load', function() {
                applyLang(currentLang, false);
            });
        }
    })();
    </script>
</header>

{{-- Mobile Nav Drawer --}}
<div id="mobile-nav" class="fixed inset-0 z-[9999] lg:hidden pointer-events-none" aria-hidden="true">
    {{-- Backdrop Overlay --}}
    <div data-nav-overlay class="fixed inset-0 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out cursor-pointer"></div>

    {{-- Drawer Panel --}}
    <aside data-nav-aside class="fixed top-0 right-0 bottom-0 z-[10000] flex h-full h-[100dvh] w-full max-w-xs sm:max-w-sm translate-x-full flex-col bg-white shadow-2xl transition-transform duration-300 ease-in-out">
        {{-- Drawer Header --}}
        <div class="flex items-center justify-between border-b border-border/60 px-5 py-4 bg-white shrink-0">
            <x-logo class="text-lg" />
            <button type="button" data-nav-close class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-border/70 bg-muted/40 text-ink-muted hover:bg-muted hover:text-ink transition-colors cursor-pointer" aria-label="Close menu">
                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Menu List --}}
        <div class="flex-1 overflow-y-auto px-4 py-3 divide-y divide-border/60 bg-white overscroll-contain touch-pan-y" data-lenis-prevent>
            <ul class="space-y-1">
                @foreach ($menus as $menu)
                    <li class="py-1">
                        @if (!empty($menu['items']))
                            <button
                                type="button"
                                data-mobile-sub
                                class="flex w-full items-center justify-between px-3 py-3 text-left text-sm font-semibold text-ink hover:bg-muted/60 rounded-xl transition-colors cursor-pointer"
                                aria-expanded="false"
                            >
                                <span>
                                    <span data-lang-id>{{ $menu['label']['id'] }}</span>
                                    <span data-lang-en class="hidden">{{ $menu['label']['en'] }}</span>
                                </span>
                                <svg data-mobile-chevron class="h-4 w-4 text-ink-muted transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="hidden pb-2 pt-1 pl-3 pr-1 space-y-1">
                                <p class="mb-2 px-3 text-xs leading-relaxed text-ink-muted">
                                    <span data-lang-id>{{ $menu['intro']['text']['id'] }}</span>
                                    <span data-lang-en class="hidden">{{ $menu['intro']['text']['en'] }}</span>
                                </p>
                                @foreach ($menu['items'] as $item)
                                    <a href="{{ $item['href'] }}" class="block rounded-xl px-3 py-2.5 hover:bg-primary/5 hover:text-primary transition-colors">
                                        <span class="block text-sm font-medium text-ink">
                                            <span data-lang-id>{{ $item['label']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $item['label']['en'] }}</span>
                                        </span>
                                        <span class="block text-xs text-ink-muted mt-0.5">
                                            <span data-lang-id>{{ $item['desc']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $item['desc']['en'] }}</span>
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <a href="{{ $menu['href'] }}" class="block px-3 py-3 text-sm font-semibold text-ink hover:bg-muted/60 rounded-xl transition-colors">
                                <span data-lang-id>{{ $menu['label']['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $menu['label']['en'] }}</span>
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Drawer Footer CTAs --}}
        <div class="border-t border-border/60 p-4 space-y-2.5 bg-muted/20 shrink-0">
            <a href="https://wa.me/6283114592416?text=Halo%20VizzioCraft%2C%20saya%20ingin%20berkonsultasi" target="_blank" rel="noopener noreferrer"
                class="flex items-center justify-center gap-2 w-full rounded-xl bg-[#25D366]/10 border border-[#25D366]/25 px-4 py-2.5 text-[13px] font-semibold text-[#16a34a] hover:bg-[#25D366]/18 transition-colors">
                <svg class="w-4.5 h-4.5 text-[#25D366]" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            <span data-lang-id>Chat via WhatsApp</span>
            <span data-lang-en class="hidden">Chat on WhatsApp</span>
        </a>
        <a href="/contact"
            class="flex items-center justify-center gap-1.5 w-full rounded-xl bg-primary px-4 py-3 text-[13px] font-semibold text-white hover:bg-primary-dark shadow-[0_2px_8px_rgba(37,99,235,.3)] transition-all">
            <span data-lang-id>Konsultasi Gratis</span>
            <span data-lang-en class="hidden">Free Consultation</span>
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>
</aside>
</div>
