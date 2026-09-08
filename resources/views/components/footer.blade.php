@php
    $company = [
        ['label' => 'About', 'href' => '/about/company'],
        ['label' => 'Services', 'href' => '/#services'],
        ['label' => 'Projects', 'href' => '/#projects'],
        ['label' => 'News', 'href' => '/news'],
        ['label' => 'Contact', 'href' => '/#contact'],
    ];

    $services = [
        ['label' => 'Web Development', 'href' => '/#services'],
        ['label' => 'Digital Solutions', 'href' => '/#services'],
        ['label' => 'Technology Consulting', 'href' => '/#services'],
        ['label' => 'IT Services', 'href' => '/#services'],
    ];
@endphp

<footer class="border-t border-border bg-white">
    <div class="mx-auto grid max-w-6xl gap-10 px-4 py-16 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-8">
        <div class="md:col-span-2 lg:col-span-1">
            <x-logo />
            <p class="mt-4 max-w-xs text-sm leading-relaxed text-ink-muted">
                Modern digital solutions for companies that want to build better, grow faster, and stay visible online.
            </p>
            <div class="mt-5 flex items-center gap-3">
                <a href="#" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-border text-ink-muted transition-colors duration-200 hover:border-primary hover:text-primary" aria-label="LinkedIn">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8.5h4V24h-4V8.5zM8.5 8.5h3.8v2.1h.05c.53-1 1.84-2.1 3.79-2.1 4.05 0 4.8 2.67 4.8 6.14V24h-4v-7.7c0-1.84-.03-4.2-2.56-4.2-2.56 0-2.95 2-2.95 4.06V24h-4V8.5z" />
                    </svg>
                </a>
                <a href="#" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-border text-ink-muted transition-colors duration-200 hover:border-primary hover:text-primary" aria-label="Instagram">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="5" />
                        <circle cx="12" cy="12" r="4" />
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                    </svg>
                </a>
                <a href="#" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-border text-ink-muted transition-colors duration-200 hover:border-primary hover:text-primary" aria-label="X">
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M18.9 2H22l-6.8 7.8L23 22h-6.4l-5-6.6L6 22H2.9l7.3-8.3L1 2h6.6l4.5 6L18.9 2zm-1.1 18h1.8L6.3 3.9H4.4L17.8 20z" />
                    </svg>
                </a>
            </div>
        </div>

        <div>
            <h2 class="text-sm font-semibold text-ink">Company</h2>
            <ul class="mt-4 space-y-2.5 text-sm text-ink-muted">
                @foreach ($company as $link)
                    <li>
                        <a href="{{ $link['href'] }}" class="transition-colors duration-200 hover:text-primary">{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="text-sm font-semibold text-ink">Services</h2>
            <ul class="mt-4 space-y-2.5 text-sm text-ink-muted">
                @foreach ($services as $link)
                    <li>
                        <a href="{{ $link['href'] }}" class="transition-colors duration-200 hover:text-primary">{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="text-sm font-semibold text-ink">Contact</h2>
            <ul class="mt-4 space-y-3 text-sm text-ink-muted">
                <li class="flex items-start gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6" />
                    </svg>
                    <a href="mailto:hello@vizziocraft.com" class="hover:text-primary">hello@vizziocraft.com</a>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <a href="tel:+6281200000000" class="hover:text-primary">+62 812 0000 0000</a>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-5.4 7-11a7 7 0 1 0-14 0c0 5.6 7 11 7 11z" />
                        <circle cx="12" cy="10" r="2.5" />
                    </svg>
                    <span>Jl. Sudirman No. 12<br>Jakarta, Indonesia</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="border-t border-border">
        <div class="mx-auto flex max-w-6xl flex-col gap-2 px-4 py-6 text-sm text-ink-muted sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p>&copy; {{ date('Y') }} VizzioCraft. All rights reserved.</p>
            <p>Build better. Grow faster.</p>
        </div>
    </div>
</footer>
