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
            'href'  => '/#projects',
            'intro' => [
                'title' => ['id' => 'Karya pilihan', 'en' => 'Selected work'],
                'text'  => ['id' => 'Cuplikan project yang menunjukkan cara kami menyelesaikan masalah bisnis nyata.',
                            'en' => 'A snapshot of projects showing how we solve real business problems.'],
                'cta'   => ['id' => 'Lihat proyek',  'en' => 'See projects'],
            ],
            'items' => [
                ['label' => ['id' => 'Platform Produk',  'en' => 'Product Platforms'], 'desc' => ['id' => 'Aplikasi yang dipakai tim dan pelanggan setiap hari.', 'en' => 'Apps used by teams and customers daily.'],         'href' => '/#projects'],
                ['label' => ['id' => 'Situs Perusahaan', 'en' => 'Company Sites'],     'desc' => ['id' => 'Profil perusahaan yang jelas, cepat, dan SEO-ready.',  'en' => 'Clear, fast, and SEO-ready company profiles.'],    'href' => '/#projects'],
                ['label' => ['id' => 'Alat Internal',    'en' => 'Internal Tools'],    'desc' => ['id' => 'Dashboard dan workflow untuk operasional.',             'en' => 'Dashboards and workflows for operations.'],         'href' => '/#projects'],
            ],
        ],
        [
            'label' => ['id' => 'Berita', 'en' => 'News'],
            'href'  => '/news',
        ],
        [
            'label' => ['id' => 'Kontak', 'en' => 'Contact'],
            'href'  => '/contact',
        ],
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

        {{-- Desktop Right: Lang Switcher + CTA --}}
        <div class="hidden lg:flex items-center gap-2.5">
            {{-- Language Switcher --}}
            <button
                id="lang-switcher"
                type="button"
                aria-label="Ganti bahasa / Switch language"
                class="inline-flex items-center gap-1.5 rounded-lg border border-border/80 bg-muted/50 px-3 py-1.5 text-[11px] font-bold text-ink-muted tracking-wide transition-all duration-200 hover:border-primary/40 hover:bg-primary/5 hover:text-primary select-none cursor-pointer"
            >
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <span id="lang-label">ID</span>
            </button>

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
            <button
                id="lang-switcher-mobile"
                type="button"
                aria-label="Ganti bahasa"
                class="inline-flex items-center gap-1 rounded-lg border border-border/80 bg-muted/50 px-2.5 py-1.5 text-[11px] font-bold text-ink-muted hover:border-primary/40 hover:bg-primary/5 hover:text-primary select-none cursor-pointer transition-colors"
            >
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <span id="lang-label-mobile">ID</span>
            </button>
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

    {{-- Sub-category bar --}}
    <div class="border-t border-border/50 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/80">
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
                            ['key' => 'all',      'slug' => 'semua',      'label' => ['id' => 'Semua',     'en' => 'All'],      'href' => '/news',                     'icon' => 'grid'],
                            ['key' => 'company',  'slug' => 'perusahaan', 'label' => ['id' => 'Perusahaan','en' => 'Company'],  'href' => '/news/category/perusahaan', 'icon' => 'building'],
                            ['key' => 'project',  'slug' => 'proyek',     'label' => ['id' => 'Proyek',    'en' => 'Project'],  'href' => '/news/category/proyek',     'icon' => 'folder'],
                            ['key' => 'event',    'slug' => 'event',      'label' => ['id' => 'Event',     'en' => 'Event'],    'href' => '/news/category/event',      'icon' => 'calendar'],
                            ['key' => 'tech',     'slug' => 'teknologi',  'label' => ['id' => 'Teknologi', 'en' => 'Tech'],     'href' => '/news/category/teknologi',  'icon' => 'cpu'],
                            ['key' => 'tips',     'slug' => 'tips',       'label' => ['id' => 'Tips',      'en' => 'Tips'],     'href' => '/news/category/tips',       'icon' => 'lightbulb'],
                            ['key' => 'industry', 'slug' => 'industri',   'label' => ['id' => 'Industri',  'en' => 'Industry'], 'href' => '/news/category/industri',  'icon' => 'briefcase'],
                        ];

                        $activeCategoryNav = null;
                        if (request()->is('news')) {
                            $qCat = request()->query('category');
                            $activeCategoryNav = $qCat ? strtolower($qCat) : 'all';
                        } elseif (request()->is('news/category/*')) {
                            $activeCategoryNav = strtolower(request()->segment(3));
                        }
                    @endphp
                    @foreach ($categories as $cat)
                        @php
                            $isActive = false;
                            if ($activeCategoryNav) {
                                $isActive = ($activeCategoryNav === $cat['key'] || $activeCategoryNav === $cat['slug'] || ($cat['key'] === 'all' && ($activeCategoryNav === 'all' || $activeCategoryNav === 'semua')));
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

    {{-- Hidden Google Translate Element --}}
    <div id="google_translate_element" class="hidden"></div>

    {{-- ===== Automatic Full-Page Language Switcher Script ===== --}}
    <script>
    function googleTranslateElementInit() {
        if (window.google && window.google.translate) {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'id,en',
                autoDisplay: false
            }, 'google_translate_element');
        }
    }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" async defer></script>

    <script>
    (function () {
        var lang = localStorage.getItem('vizzio_lang') || 'id';

        function clearGoogleTranslateCookies() {
            var host = window.location.hostname;
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=" + host + "; path=/;";
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=." + host + "; path=/;";
        }

        function applyLang(l, isUserAction) {
            lang = l;
            localStorage.setItem('vizzio_lang', l);
            var isEn = l === 'en';

            // Update Navbar Button Text Labels
            var label = l.toUpperCase();
            var lbl1 = document.getElementById('lang-label');
            var lbl2 = document.getElementById('lang-label-mobile');
            if (lbl1) lbl1.textContent = label;
            if (lbl2) lbl2.textContent = label;

            document.documentElement.lang = isEn ? 'en' : 'id';

            // Curated elements toggle
            document.querySelectorAll('[data-lang-id]').forEach(function (el) {
                el.classList.toggle('hidden', isEn);
            });
            document.querySelectorAll('[data-lang-en]').forEach(function (el) {
                el.classList.toggle('hidden', !isEn);
            });

            if (!isEn) {
                // INDONESIAN (DEFAULT): Completely disable translation engine & restore raw default HTML
                clearGoogleTranslateCookies();

                var select = document.querySelector('.goog-te-combo');
                if (select && select.value !== '') {
                    select.value = '';
                    select.dispatchEvent(new Event('change'));
                }

                if (isUserAction && (document.querySelector('.goog-te-combo') || document.cookie.indexOf('googtrans') !== -1)) {
                    // Reload once on switching back to ID if translation engine was active
                    location.reload();
                }
            } else {
                // ENGLISH: Trigger translation to English
                var select = document.querySelector('.goog-te-combo');
                if (select) {
                    select.value = 'en';
                    select.dispatchEvent(new Event('change'));
                } else {
                    document.cookie = "googtrans=/id/en; path=/;";
                    document.cookie = "googtrans=/id/en; domain=" + window.location.hostname + "; path=/;";
                }
            }
        }

        function toggleLang() {
            var nextLang = lang === 'id' ? 'en' : 'id';
            applyLang(nextLang, true);
        }

        var btn1 = document.getElementById('lang-switcher');
        var btn2 = document.getElementById('lang-switcher-mobile');
        if (btn1) btn1.addEventListener('click', toggleLang);
        if (btn2) btn2.addEventListener('click', toggleLang);

        window.addEventListener('load', function() {
            if (lang === 'id') {
                clearGoogleTranslateCookies();
            } else {
                applyLang(lang, false);
            }
        });

        if (lang === 'id') {
            clearGoogleTranslateCookies();
        } else {
            applyLang(lang, false);
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
