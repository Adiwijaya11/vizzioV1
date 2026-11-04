@php
    $company = [
        [
            'label' => ['id' => 'Tentang Kami', 'en' => 'About Us'],
            'href'  => '/about/company',
        ],
        [
            'label' => ['id' => 'Layanan', 'en' => 'Services'],
            'href'  => '/services',
        ],
        [
            'label' => ['id' => 'Portofolio Proyek', 'en' => 'Projects'],
            'href'  => '/#projects',
        ],
        [
            'label' => ['id' => 'Berita & Insight', 'en' => 'News & Insights'],
            'href'  => '/news',
        ],
        [
            'label' => ['id' => 'Event & Workshop', 'en' => 'Events & Workshops'],
            'href'  => '/events',
        ],
        [
            'label' => ['id' => 'Hubungi Kami', 'en' => 'Contact Us'],
            'href'  => '/contact',
        ],
    ];

    $services = [
        [
            'label' => ['id' => 'Pengembangan Web', 'en' => 'Web Development'],
            'href'  => '/services',
        ],
        [
            'label' => ['id' => 'Solusi Platform Digital', 'en' => 'Digital Solutions'],
            'href'  => '/services',
        ],
        [
            'label' => ['id' => 'Konsultasi Teknologi', 'en' => 'Technology Consulting'],
            'href'  => '/services',
        ],
        [
            'label' => ['id' => 'Infrastruktur & Cloud', 'en' => 'Cloud & Infrastructure'],
            'href'  => '/services',
        ],
    ];
@endphp

<footer class="border-t border-border bg-white">
    <div class="mx-auto grid max-w-6xl gap-10 px-4 py-16 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-8">
        {{-- Brand & Bio --}}
        <div class="md:col-span-2 lg:col-span-1">
            <x-logo />
            <p class="mt-4 max-w-xs text-sm leading-relaxed text-ink-muted">
                <span data-lang-id>Solusi digital modern untuk perusahaan yang ingin membangun produk lebih andal, berkembang lebih cepat, dan memperkuat eksistensi online.</span>
                <span data-lang-en class="hidden">Modern digital solutions for companies that want to build better, grow faster, and stay visible online.</span>
            </p>
            <div class="mt-5 flex items-center gap-3">
                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-border text-ink-muted transition-colors duration-200 hover:border-primary hover:text-primary" aria-label="LinkedIn">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8.5h4V24h-4V8.5zM8.5 8.5h3.8v2.1h.05c.53-1 1.84-2.1 3.79-2.1 4.05 0 4.8 2.67 4.8 6.14V24h-4v-7.7c0-1.84-.03-4.2-2.56-4.2-2.56 0-2.95 2-2.95 4.06V24h-4V8.5z" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/vizziocraft/" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-border text-ink-muted transition-colors duration-200 hover:border-primary hover:text-primary" aria-label="Instagram">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="5" />
                        <circle cx="12" cy="12" r="4" />
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                    </svg>
                </a>
                <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-border text-ink-muted transition-colors duration-200 hover:border-primary hover:text-primary" aria-label="X">
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M18.9 2H22l-6.8 7.8L23 22h-6.4l-5-6.6L6 22H2.9l7.3-8.3L1 2h6.6l4.5 6L18.9 2zm-1.1 18h1.8L6.3 3.9H4.4L17.8 20z" />
                    </svg>
                </a>
                <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-border text-ink-muted transition-colors duration-200 hover:border-primary hover:text-primary" aria-label="GitHub">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Company Links --}}
        <div>
            <h2 class="text-sm font-semibold text-ink">
                <span data-lang-id>Perusahaan</span>
                <span data-lang-en class="hidden">Company</span>
            </h2>
            <ul class="mt-4 space-y-2.5 text-sm text-ink-muted">
                @foreach ($company as $link)
                    <li>
                        <a href="{{ $link['href'] }}" class="transition-colors duration-200 hover:text-primary">
                            <span data-lang-id>{{ $link['label']['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $link['label']['en'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Services Links --}}
        <div>
            <h2 class="text-sm font-semibold text-ink">
                <span data-lang-id>Layanan</span>
                <span data-lang-en class="hidden">Services</span>
            </h2>
            <ul class="mt-4 space-y-2.5 text-sm text-ink-muted">
                @foreach ($services as $link)
                    <li>
                        <a href="{{ $link['href'] }}" class="transition-colors duration-200 hover:text-primary">
                            <span data-lang-id>{{ $link['label']['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $link['label']['en'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Contact Info --}}
        <div>
            <h2 class="text-sm font-semibold text-ink">
                <span data-lang-id>Kontak</span>
                <span data-lang-en class="hidden">Contact</span>
            </h2>
            <ul class="mt-4 space-y-3 text-sm text-ink-muted">
                <li class="flex items-start gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6" />
                    </svg>
                    <a href="mailto:vizziocraft@gmail.com" class="hover:text-primary">vizziocraft@gmail.com</a>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#25D366]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    <a href="https://wa.me/6283114592416" target="_blank" rel="noopener noreferrer" class="hover:text-primary">+62 831-1459-2416</a>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-5.4 7-11a7 7 0 1 0-14 0c0 5.6 7 11 7 11z" />
                        <circle cx="12" cy="10" r="2.5" />
                    </svg>
                    <span class="leading-relaxed">
                        <span data-lang-id>Denpasar, Bali, Indonesia<br>(Remote-First, Jangkauan Global)</span>
                        <span data-lang-en class="hidden">Denpasar, Bali, Indonesia<br>(Remote-First, Global Reach)</span>
                    </span>
                </li>
            </ul>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-border">
        <div class="mx-auto flex max-w-6xl flex-col gap-2 px-4 py-6 text-sm text-ink-muted sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p>
                <span data-lang-id>&copy; {{ date('Y') }} VizzioCraft. Seluruh hak cipta dilindungi.</span>
                <span data-lang-en class="hidden">&copy; {{ date('Y') }} VizzioCraft. All rights reserved.</span>
            </p>
            <p>
                <span data-lang-id>Bangun lebih baik. Tumbuh lebih cepat.</span>
                <span data-lang-en class="hidden">Build better. Grow faster.</span>
            </p>
        </div>
    </div>
</footer>
