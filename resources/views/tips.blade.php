@extends('layouts.app')

@section('title', 'Tips Taktis & Playbook Digital | VizzioCraft')
@section('meta_description', 'Kumpulan panduan praktis, checklist rekayasa perangkat lunak, strategi optimasi performa web, efisiensi biaya cloud, dan keamanan siber dari tim VizzioCraft.')

@section('content')
    @php
        $fallbackPlaybooks = [
            [
                'id'         => 1,
                'title'      => 'Checklist Optimasi Kecepatan Web Tembus Skor 95+',
                'slug'       => 'checklist-optimasi-kecepatan-web',
                'category'   => 'performance',
                'badge'      => 'PERFORMA & WEB VITALS',
                'summary'    => 'Keterlambatan waktu muat halaman berdampak langsung pada rasio pentalan pengunjung. Terapkan langkah teknis ini pada aplikasi web Anda.',
                'summary_en' => 'Page load delays directly impact visitor bounce rates. Apply these technical steps to your web application.',
                'steps'      => [
                    'Konversi seluruh aset gambar ke format generasi baru (WebP/AVIF) dengan atribut width dan height eksplisit untuk mencegah Cumulative Layout Shift (CLS).',
                    'Aktifkan Eager Loading pada query ORM (hindari N+1 Query Problem) dan simpan hasil query yang jarang berubah di Redis Cache.',
                    'Gunakan HTTP/3 dan Brotli Compression di level edge (Cloudflare/Nginx) serta muat skrip analitik pihak ketiga secara defer atau async.',
                ],
                'outcome'    => 'Hasil Teknis: Waktu First Contentful Paint & LCP jauh lebih stabil di jaringan seluler',
                'outcome_en' => 'Technical Outcome: Much more stable First Contentful Paint & LCP on mobile networks',
                'read_time'  => '4 Menit Baca',
                'order'      => 1,
            ],
            [
                'id'         => 2,
                'title'      => 'Standar Pengamanan Aplikasi Bisnis & Database Klien',
                'slug'       => 'standar-pengamanan-aplikasi-bisnis',
                'category'   => 'security',
                'badge'      => 'KEAMANAN SIBER & DATA',
                'summary'    => 'Langkah wajib sebelum meluncurkan sistem internal, ERP, maupun portal pelanggan ke jaringan publik.',
                'summary_en' => 'Mandatory steps before launching internal systems, ERPs, or customer portals to the public internet.',
                'steps'      => [
                    'Terapkan Role-Based Access Control (RBAC) berbasis prinsip Least Privilege dan wajibkan autentikasi berlapis pada akun administrator.',
                    'Pasang Rate Limiter pada endpoint login, lupa password, dan API publik untuk memblokir serangan brute-force maupun DDoS aplikasi.',
                    'Otomatisasi backup database harian ke object storage terpisah (off-site) dengan enkripsi AES-256 dan uji coba restore berkala.',
                ],
                'outcome'    => 'Hasil Teknis: Mitigasi vektor serangan umum OWASP Top 10 sejak hari pertama rilis',
                'outcome_en' => 'Technical Outcome: Mitigates common OWASP Top 10 attack vectors from day one',
                'read_time'  => '5 Menit Baca',
                'order'      => 2,
            ],
            [
                'id'         => 3,
                'title'      => 'Strategi Efisiensi Biaya Cloud Server Tanpa Downgrade Performa',
                'slug'       => 'strategi-efisiensi-biaya-cloud-server',
                'category'   => 'architecture',
                'badge'      => 'ARSITEKTUR & CLOUD',
                'summary'    => 'Banyak perusahaan membayar tagihan cloud berlebih karena alokasi resource dan antrean proses yang kurang tepat.',
                'summary_en' => 'Many companies overpay on cloud bills due to unoptimized resource allocation and job queues.',
                'steps'      => [
                    'Mulai dengan Modular Monolith yang rapi sebelum memecah sistem menjadi Microservices: hemat biaya orkestrasi hingga trafik benar-benar membutuhkan.',
                    'Pindahkan pemrosesan berat (generate PDF, kirim ribuan email, ekspor Excel) ke Background Queue Worker agar CPU web server tetap ringan.',
                    'Manfaatkan CDN caching untuk file statis sehingga penggunaan bandwidth keluar (egress) dari server utama jauh lebih hemat.',
                ],
                'outcome'    => 'Hasil Teknis: Beban CPU server utama turun drastis saat jam sibuk operasional',
                'outcome_en' => 'Technical Outcome: Origin server CPU load drops significantly during peak operational hours',
                'read_time'  => '4 Menit Baca',
                'order'      => 3,
            ],
            [
                'id'         => 4,
                'title'      => 'Panduan Membangun MVP Produk Digital Tepat Sasaran',
                'slug'       => 'panduan-membangun-mvp-produk-digital',
                'category'   => 'product',
                'badge'      => 'STRATEGI PRODUK & MVP',
                'summary'    => 'Hindari jebakan membangun terlalu banyak fitur di awal yang akhirnya jarang dipakai oleh pengguna akhir.',
                'summary_en' => 'Avoid the trap of building too many initial features that end users rarely touch.',
                'steps'      => [
                    'Fokuskan fase pertama pada alur fitur inti yang menyelesaikan masalah operasional paling mendesak bagi pengguna (Core Value Loop).',
                    'Validasi alur layar menggunakan prototipe interaktif Figma bersama calon pengguna sebelum masuk ke tahap penulisan kode.',
                    'Pasang telemetri dan pencatatan penggunaan fitur sejak rilis awal untuk mengambil keputusan pengembangan berbasis penggunaan nyata.',
                ],
                'outcome'    => 'Hasil Teknis: Siklus peluncuran produk lebih singkat dan minim pengerjaan ulang',
                'outcome_en' => 'Technical Outcome: Shorter product launch cycle with minimal engineering rework',
                'read_time'  => '3 Menit Baca',
                'order'      => 4,
            ],
            [
                'id'         => 5,
                'title'      => 'Formula Struktur Website B2B yang Mendatangkan Prospek Organik',
                'slug'       => 'formula-struktur-website-b2b',
                'category'   => 'seo',
                'badge'      => 'SEO TEKNIS & KONVERSI',
                'summary'    => 'Website korporat bukan sekadar brosur digital, melainkan saluran akuisisi klien yang bekerja sepanjang waktu.',
                'summary_en' => 'A corporate website is not just a digital brochure, it is an always-on client acquisition channel.',
                'steps'      => [
                    'Buat halaman spesifik untuk setiap layanan utama (Service Landing Page) dengan struktur heading H1 hingga H3 yang menjawab niat pencarian calon klien.',
                    'Sertakan bukti portofolio proyek nyata dan rincian solusi tepat sebelum mengarahkan pengunjung ke halaman konsultasi.',
                    'Sederhanakan formulir konsultasi menjadi kolom esensial dan sediakan jalur cepat WhatsApp untuk kemudahan komunikasi.',
                ],
                'outcome'    => 'Hasil Teknis: Struktur halaman lebih mudah diindeks mesin pencari dan jelas bagi calon klien',
                'outcome_en' => 'Technical Outcome: Pages are cleaner for search engine crawlers and clearer for prospective clients',
                'read_time'  => '4 Menit Baca',
                'order'      => 5,
            ],
            [
                'id'         => 6,
                'title'      => 'Tips Migrasi dari Spreadsheet Manual ke Sistem ERP Terintegrasi',
                'slug'       => 'tips-migrasi-spreadsheet-ke-erp',
                'category'   => 'database',
                'badge'      => 'DATABASE & INTEGRASI ERP',
                'summary'    => 'Transisi digital yang sukses membutuhkan kesiapan struktur data dan manajemen perubahan tim yang matang.',
                'summary_en' => 'Successful digital transition requires clean data structures and thoughtful team change management.',
                'steps'      => [
                    'Standarisasi kode master data (SKU produk, kode cabang, akun COA keuangan) terlebih dahulu sebelum melakukan impor massal ke database baru.',
                    'Jalankan fase Parallel Run di mana sistem baru diuji berdampingan sebelum menghentikan pencatatan manual sepenuhnya.',
                    'Tunjuk penanggung jawab (PIC) di tiap divisi (Gudang, Finance, Operasional) untuk mempercepat adopsi SOP digital di lapangan.',
                ],
                'outcome'    => 'Hasil Teknis: Integritas data terjaga dan adopsi tim berjalan tanpa gangguan operasional',
                'outcome_en' => 'Technical Outcome: Data integrity is preserved and team adoption proceeds without operational disruption',
                'read_time'  => '5 Menit Baca',
                'order'      => 6,
            ],
        ];

        $playbookList = isset($tips) && $tips->count() > 0 ? $tips : collect($fallbackPlaybooks);

        $tipFilters = [
            'all'          => ['id' => 'Semua Playbook', 'en' => 'All Playbooks'],
            'performance'  => ['id' => 'Performa Web', 'en' => 'Web Performance'],
            'security'     => ['id' => 'Keamanan Siber', 'en' => 'Cybersecurity'],
            'architecture' => ['id' => 'Cloud & Arsitektur', 'en' => 'Cloud & Architecture'],
            'product'      => ['id' => 'Strategi MVP', 'en' => 'MVP Strategy'],
            'seo'          => ['id' => 'SEO & Konversi', 'en' => 'SEO & Conversion'],
            'database'     => ['id' => 'Migrasi ERP', 'en' => 'ERP Migration'],
        ];
    @endphp

    {{-- ═══ CLEAN 50SVH IMAGE HERO (Bright Theme-Matched Blue Overlay) ═══ --}}
    <section class="relative w-full min-h-[50svh] flex items-center bg-primary overflow-hidden">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=1920&q=85"
                alt="Playbook Rekayasa & Panduan Praktis VizzioCraft"
                class="tips-bg-zoom h-full w-full object-cover object-center"
            />
            <div class="absolute inset-0 bg-gradient-to-r from-primary-deep/90 via-primary/80 to-primary/45"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl w-full px-4 sm:px-6 lg:px-8 py-14">
            <div class="max-w-2xl tips-hero-left">
                <div class="text-xs font-bold tracking-widest text-sky-200 uppercase mb-3">
                    <span data-lang-id>PLAYBOOK REKAYASA & PANDUAN PRAKTIS</span>
                    <span data-lang-en class="hidden">ENGINEERING PLAYBOOKS & PRACTICAL GUIDES</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.15] mb-4">
                    <span data-lang-id>Panduan Teknis & Checklist Siap Pakai untuk Tim Anda.</span>
                    <span data-lang-en class="hidden">Actionable Technical Guides & Checklists for Your Team.</span>
                </h1>

                <p class="text-sm sm:text-base text-blue-50/95 leading-relaxed">
                    <span data-lang-id>Dokumentasi praktik terbaik yang kami gunakan saat mengoptimalkan kecepatan aplikasi, mengamankan database produksi, dan memigrasikan sistem perusahaan.</span>
                    <span data-lang-en class="hidden">Best-practice documentation we use when optimizing application speed, hardening production databases, and migrating enterprise systems.</span>
                </p>
            </div>
        </div>
    </section>

    {{-- ═══ PLAYBOOK CARDS GRID SECTION ═══ --}}
    <section class="py-16 sm:py-24 bg-[#F8FAFC] border-b border-border/50">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

            {{-- Filter & Search Toolbar --}}
            <div class="mb-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="flex flex-wrap gap-2" role="tablist">
                    @foreach($tipFilters as $tKey => $tLabel)
                        <button
                            type="button"
                            data-tip-filter="{{ $tKey }}"
                            class="tip-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer {{ $tKey === 'all' ? 'bg-primary text-white shadow-sm' : 'bg-white text-ink-muted border border-border hover:border-primary/40 hover:text-primary' }}"
                        >
                            <span data-lang-id>{{ $tLabel['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $tLabel['en'] }}</span>
                        </button>
                    @endforeach
                </div>

                <div class="w-full lg:w-80">
                    <div class="relative">
                        <input
                            type="text"
                            id="tips-search-input"
                            placeholder="Cari playbook (Redis, WebP, RBAC, ERP...)"
                            class="w-full rounded-xl border border-border bg-white px-4 py-2.5 pl-10 text-xs sm:text-sm text-ink placeholder-slate-400 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                        />
                        <svg class="absolute left-3.5 top-3 h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Playbooks Grid with Interactive Checklist & Actions --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="tips-playbook-grid">
                @foreach($playbookList as $idx => $pb)
                    @php
                        $pbTitle    = is_array($pb) ? $pb['title'] : $pb->title;
                        $pbSlug     = is_array($pb) ? $pb['slug'] : $pb->slug;
                        $pbCat      = is_array($pb) ? $pb['category'] : $pb->category;
                        $pbBadge    = is_array($pb) ? $pb['badge'] : $pb->badge;
                        $pbSummary  = is_array($pb) ? $pb['summary'] : $pb->summary;
                        $pbSummaryEn= is_array($pb) ? ($pb['summary_en'] ?? $pbSummary) : ($pb->summary_en ?: $pbSummary);
                        $pbSteps    = is_array($pb) ? $pb['steps'] : ($pb->steps ?: []);
                        $pbOutcome  = is_array($pb) ? ($pb['outcome'] ?? null) : $pb->outcome;
                        $pbReadTime = is_array($pb) ? ($pb['read_time'] ?? '4 Menit Baca') : ($pb->read_time ?: '4 Menit Baca');

                        $stepsCount = count($pbSteps);
                        $stepsRaw   = implode("\n", $pbSteps);
                        $searchBlob = strtolower($pbTitle . ' ' . $pbBadge . ' ' . $pbSummary . ' ' . $stepsRaw . ' ' . $pbOutcome);
                    @endphp

                    <article
                        id="{{ $pbSlug }}"
                        data-tip-card
                        data-category="{{ $pbCat }}"
                        data-search="{{ $searchBlob }}"
                        class="playbook-item scroll-mt-28 rounded-2xl border border-border bg-white p-6 sm:p-8 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between"
                    >
                        <div>
                            {{-- Header: Category Badge, Read Time & Playbook Index --}}
                            <div class="flex items-center justify-between gap-3 mb-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-primary bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                                        {{ $pbBadge }}
                                    </span>
                                    <span class="text-[11px] font-semibold text-slate-500">
                                        {{ $pbReadTime }}
                                    </span>
                                </div>
                                <span class="text-xs font-extrabold text-slate-400">PLAYBOOK #0{{ $idx + 1 }}</span>
                            </div>

                            <h2 class="text-xl sm:text-2xl font-extrabold text-ink mb-3 leading-snug">
                                {{ $pbTitle }}
                            </h2>

                            <p class="text-xs sm:text-sm text-ink-muted leading-relaxed mb-6">
                                <span data-lang-id>{{ $pbSummary }}</span>
                                <span data-lang-en class="hidden">{{ $pbSummaryEn }}</span>
                            </p>

                            {{-- Interactive Progress Tracker --}}
                            <div class="mb-4 flex items-center justify-between text-xs font-bold text-slate-600">
                                <span>Checklist Teknis:</span>
                                <span class="card-progress-label text-primary font-extrabold">0 / {{ $stepsCount }} Selesai (0%)</span>
                            </div>

                            {{-- Steps with Interactive Checkboxes --}}
                            <div class="space-y-3 mb-6" data-checklist-group>
                                @foreach($pbSteps as $sIdx => $step)
                                    <label class="group/step flex items-start gap-3 rounded-xl bg-slate-50 p-3.5 border border-slate-200/70 hover:border-primary/40 hover:bg-blue-50/20 transition-all cursor-pointer">
                                        <input
                                            type="checkbox"
                                            class="step-checkbox mt-1 h-4 w-4 rounded border-slate-300 text-primary focus:ring-primary cursor-pointer accent-primary shrink-0"
                                            data-step-index="{{ $sIdx + 1 }}"
                                        />
                                        <div class="flex-1 min-w-0">
                                            <p class="step-text text-xs sm:text-sm text-slate-700 leading-relaxed transition-all">
                                                {{ $step }}
                                            </p>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Card Bottom Actions & Technical Outcome --}}
                        <div class="pt-5 border-t border-border/70">
                            @if($pbOutcome)
                                <div class="mb-4 flex items-center gap-2 text-xs font-bold text-emerald-700 bg-emerald-50/70 px-3 py-2 rounded-xl border border-emerald-200/60">
                                    <svg class="h-4 w-4 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="truncate">{{ $pbOutcome }}</span>
                                </div>
                            @endif

                            <div class="flex flex-wrap items-center justify-between gap-3">
                                <div class="flex items-center gap-2">
                                    {{-- Copy Checklist Button --}}
                                    <button
                                        type="button"
                                        class="copy-checklist-btn inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold text-slate-700 hover:border-primary/40 hover:text-primary transition-all cursor-pointer"
                                        data-playbook-title="{{ $pbTitle }}"
                                        data-playbook-steps="{{ json_encode($pbSteps) }}"
                                        title="Salin Checklist untuk Jira / Notion / Slack"
                                    >
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Salin Checklist</span>
                                    </button>

                                    {{-- Quick Modal View --}}
                                    <button
                                        type="button"
                                        class="view-playbook-btn inline-flex items-center gap-1 rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-200 transition-colors cursor-pointer"
                                        data-modal-title="{{ $pbTitle }}"
                                        data-modal-badge="{{ $pbBadge }}"
                                        data-modal-summary="{{ $pbSummary }}"
                                        data-modal-steps="{{ json_encode($pbSteps) }}"
                                        data-modal-outcome="{{ $pbOutcome }}"
                                        data-modal-readtime="{{ $pbReadTime }}"
                                    >
                                        <span>Detail</span>
                                    </button>
                                </div>

                                <a href="/contact" class="text-xs font-bold text-primary hover:text-primary-dark transition-colors inline-flex items-center gap-1">
                                    <span data-lang-id>Konsultasi Topik Ini</span>
                                    <span data-lang-en class="hidden">Consult on This</span>
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Empty Search State --}}
            <div id="tips-empty-state" class="hidden rounded-2xl border border-border bg-white p-12 text-center my-8">
                <div class="h-12 w-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mx-auto mb-3">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-base font-bold text-ink mb-1">
                    <span data-lang-id>Playbook Tidak Ditemukan</span>
                    <span data-lang-en class="hidden">No Playbook Found</span>
                </h3>
                <p class="text-xs sm:text-sm text-ink-muted mb-4">
                    <span data-lang-id>Tidak ada panduan yang cocok dengan kata kunci pencarian Anda.</span>
                    <span data-lang-en class="hidden">No guides matched your search keyword.</span>
                </p>
                <button
                    type="button"
                    id="tips-reset-btn"
                    class="rounded-xl bg-primary px-4 py-2 text-xs font-bold text-white hover:bg-primary-dark transition-colors cursor-pointer"
                >
                    <span data-lang-id>Tampilkan Semua Playbook</span>
                    <span data-lang-en class="hidden">Show All Playbooks</span>
                </button>
            </div>
        </div>
    </section>

    {{-- ═══ DO'S & DON'TS COMPARISON SECTION ═══ --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mb-12">
                <div class="text-xs font-bold uppercase tracking-widest text-primary mb-2">
                    <span data-lang-id>STANDAR OPERASIONAL</span>
                    <span data-lang-en class="hidden">OPERATIONAL STANDARDS</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-ink tracking-tight">
                    <span data-lang-id>Kesalahan Umum vs Praktik Terbaik Rekayasa</span>
                    <span data-lang-en class="hidden">Common Pitfalls vs Engineering Best Practices</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="rounded-2xl border border-rose-200 bg-rose-50/40 p-7">
                    <h3 class="text-lg font-extrabold text-rose-700 mb-4 flex items-center gap-2">
                        <span>Praktik yang Harus Dihindari (Don'ts)</span>
                    </h3>
                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700">
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-600 font-bold">1.</span>
                            <span data-lang-id>Mengubah kode langsung di server produksi (live edit) tanpa melalui pipeline Git dan staging.</span>
                            <span data-lang-en class="hidden">Editing code directly on production servers without a Git and staging pipeline.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-600 font-bold">2.</span>
                            <span data-lang-id>Menyimpan kredensial API atau password database di dalam kode sumber tanpa variabel lingkungan terpisah.</span>
                            <span data-lang-en class="hidden">Hardcoding API credentials or database passwords inside source code.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-rose-600 font-bold">3.</span>
                            <span data-lang-id>Membangun aplikasi besar tanpa dokumentasi skema database dan kontrak API yang jelas.</span>
                            <span data-lang-en class="hidden">Building large applications without clear database schemas and API contracts.</span>
                        </li>
                    </ul>
                </div>

                <div class="rounded-2xl border border-emerald-200 bg-emerald-50/40 p-7">
                    <h3 class="text-lg font-extrabold text-emerald-700 mb-4 flex items-center gap-2">
                        <span>Standar yang Wajib Diterapkan (Do's)</span>
                    </h3>
                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700">
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-700 font-bold">1.</span>
                            <span data-lang-id>Gunakan automated testing dan CI/CD agar setiap rilis fitur baru bebas dari regresi bug.</span>
                            <span data-lang-en class="hidden">Use automated testing and CI/CD so every new feature release is regression-free.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-700 font-bold">2.</span>
                            <span data-lang-id>Pasang pemantauan uptime dan peringatan error real-time agar tim teknis tahu sebelum pengguna melapor.</span>
                            <span data-lang-en class="hidden">Set up real-time uptime and error alerting so engineers know before users report issues.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-700 font-bold">3.</span>
                            <span data-lang-id>Lakukan indeksasi kolom database yang sering dipakai pada filter laporan transaksi.</span>
                            <span data-lang-en class="hidden">Index database columns frequently used in transaction report filters.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ INTERACTIVE PLAYBOOK MODAL ═══ --}}
    <div id="playbook-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" role="dialog" aria-modal="true">
        <div id="playbook-modal-backdrop" class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm transition-opacity"></div>
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 w-full sm:max-w-xl border border-slate-200">
                <div class="bg-slate-50 border-b border-border px-6 py-5 flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span id="pb-modal-badge" class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-full bg-blue-100 text-blue-800">BADGE</span>
                            <span id="pb-modal-readtime" class="text-xs text-slate-500 font-semibold">4 Menit</span>
                        </div>
                        <h3 id="pb-modal-title" class="text-lg font-extrabold text-ink leading-snug">Playbook Title</h3>
                    </div>
                    <button type="button" id="pb-modal-close-btn" class="h-8 w-8 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-200/60 flex items-center justify-center cursor-pointer">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="px-6 py-5 space-y-4">
                    <div>
                        <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1">Ringkasan Panduan</div>
                        <p id="pb-modal-summary" class="text-xs sm:text-sm text-slate-700 leading-relaxed"></p>
                    </div>

                    <div>
                        <div class="text-[11px] font-bold uppercase tracking-wider text-primary mb-2">Langkah-Langkah Implementasi</div>
                        <div id="pb-modal-steps-container" class="space-y-2.5"></div>
                    </div>

                    <div id="pb-modal-outcome-box" class="rounded-xl bg-emerald-50 border border-emerald-200 p-3.5">
                        <div class="text-[10px] font-bold uppercase tracking-wider text-emerald-800 mb-0.5">Target Hasil Teknis:</div>
                        <p id="pb-modal-outcome" class="text-xs font-semibold text-emerald-900"></p>
                    </div>
                </div>

                <div class="bg-slate-50 px-6 py-3.5 border-t border-border flex items-center justify-between">
                    <button type="button" id="pb-modal-copy-btn" class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:text-primary-dark cursor-pointer">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span>Salin Markdown</span>
                    </button>
                    <button type="button" id="pb-modal-done-btn" class="rounded-xl bg-slate-900 px-4 py-2 text-xs font-bold text-white hover:bg-slate-800 cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══ FLOATING TOAST FEEDBACK ═══ --}}
    <div id="tips-toast" class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none rounded-xl bg-slate-900 text-white px-4 py-3 shadow-2xl flex items-center gap-2.5 text-xs font-semibold">
        <svg class="h-4 w-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        <span id="tips-toast-msg">Checklist berhasil disalin ke clipboard!</span>
    </div>

    <x-about-cta />
@endsection

@push('scripts')
<style>
@keyframes tipsHeroEnter {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes tipsBgZoom {
    from { transform: scale(1.07); }
    to   { transform: scale(1); }
}
.tips-hero-left {
    animation: tipsHeroEnter 0.75s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.tips-bg-zoom {
    animation: tipsBgZoom 8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
<script>
(function () {
    // 1. Filter & Search
    const btns       = document.querySelectorAll('[data-tip-filter]');
    const cards      = document.querySelectorAll('[data-tip-card]');
    const searchInp  = document.getElementById('tips-search-input');
    const emptyState = document.getElementById('tips-empty-state');
    const resetBtn   = document.getElementById('tips-reset-btn');

    let currentCat = 'all';
    let currentQ   = '';

    const onCls  = 'tip-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer bg-primary text-white shadow-sm';
    const offCls = 'tip-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer bg-white text-ink-muted border border-border hover:border-primary/40 hover:text-primary';

    function filterCards() {
        let visible = 0;
        cards.forEach(function (c) {
            const catMatch = (currentCat === 'all' || c.getAttribute('data-category') === currentCat);
            const qMatch   = (!currentQ || (c.getAttribute('data-search') || '').indexOf(currentQ) !== -1);
            if (catMatch && qMatch) {
                c.style.display = '';
                visible++;
            } else {
                c.style.display = 'none';
            }
        });
        if (emptyState) {
            emptyState.classList.toggle('hidden', visible > 0);
        }
    }

    btns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            currentCat = btn.getAttribute('data-tip-filter');
            btns.forEach(function (b) {
                b.className = (b === btn) ? onCls : offCls;
            });
            filterCards();
        });
    });

    if (searchInp) {
        searchInp.addEventListener('input', function () {
            currentQ = searchInp.value.toLowerCase().trim();
            filterCards();
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentCat = 'all';
            currentQ   = '';
            if (searchInp) searchInp.value = '';
            btns.forEach(function (b) {
                b.className = (b.getAttribute('data-tip-filter') === 'all') ? onCls : offCls;
            });
            filterCards();
        });
    }

    // 2. Interactive Step Checklist & Progress
    cards.forEach(function (card) {
        const checkboxes = card.querySelectorAll('.step-checkbox');
        const progressEl = card.querySelector('.card-progress-label');
        const total = checkboxes.length;

        function updateProgress() {
            let checkedCount = 0;
            checkboxes.forEach(function (cb) {
                const textEl = cb.closest('label').querySelector('.step-text');
                if (cb.checked) {
                    checkedCount++;
                    if (textEl) {
                        textEl.classList.add('line-through', 'text-slate-400');
                    }
                } else {
                    if (textEl) {
                        textEl.classList.remove('line-through', 'text-slate-400');
                    }
                }
            });

            if (progressEl) {
                const percent = total > 0 ? Math.round((checkedCount / total) * 100) : 0;
                progressEl.textContent = checkedCount + ' / ' + total + ' Selesai (' + percent + '%)';
                if (checkedCount === total && total > 0) {
                    progressEl.className = 'card-progress-label text-emerald-600 font-extrabold';
                } else {
                    progressEl.className = 'card-progress-label text-primary font-extrabold';
                }
            }
        }

        checkboxes.forEach(function (cb) {
            cb.addEventListener('change', updateProgress);
        });
    });

    // 3. Toast Helper
    const toast    = document.getElementById('tips-toast');
    const toastMsg = document.getElementById('tips-toast-msg');
    let toastTimeout;

    function showToast(message) {
        if (!toast) return;
        if (toastMsg) toastMsg.textContent = message;
        toast.classList.remove('translate-y-20', 'opacity-0');
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(function () {
            toast.classList.add('translate-y-20', 'opacity-0');
        }, 3000);
    }

    // 4. Copy Checklist in Markdown
    const copyBtns = document.querySelectorAll('.copy-checklist-btn');
    copyBtns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            const title = btn.getAttribute('data-playbook-title');
            let steps = [];
            try {
                steps = JSON.parse(btn.getAttribute('data-playbook-steps') || '[]');
            } catch(e) {}

            let md = '# ' + title + '\n\n';
            steps.forEach(function (s) {
                md += '- [ ] ' + s + '\n';
            });
            md += '\nSumber: VizzioCraft Playbook (https://vizziocraft.com/tips)';

            if (navigator.clipboard) {
                navigator.clipboard.writeText(md).then(function () {
                    showToast('Checklist disalin dalam format Markdown!');
                });
            } else {
                showToast('Fitur clipboard tidak tersedia pada browser ini.');
            }
        });
    });

    // 5. Interactive Modal Viewer
    const modal        = document.getElementById('playbook-modal');
    const modalBackdrop= document.getElementById('playbook-modal-backdrop');
    const modalCloseBtn= document.getElementById('pb-modal-close-btn');
    const modalDoneBtn = document.getElementById('pb-modal-done-btn');
    const modalCopyBtn = document.getElementById('pb-modal-copy-btn');
    const viewBtns     = document.querySelectorAll('.view-playbook-btn');

    const mBadge       = document.getElementById('pb-modal-badge');
    const mRead        = document.getElementById('pb-modal-readtime');
    const mTitle       = document.getElementById('pb-modal-title');
    const mSummary     = document.getElementById('pb-modal-summary');
    const mStepsBox    = document.getElementById('pb-modal-steps-container');
    const mOutcomeBox  = document.getElementById('pb-modal-outcome-box');
    const mOutcome     = document.getElementById('pb-modal-outcome');

    let currentModalSteps = [];
    let currentModalTitle = '';

    function openModal(btn) {
        if (!modal) return;
        currentModalTitle = btn.getAttribute('data-modal-title') || '';
        try {
            currentModalSteps = JSON.parse(btn.getAttribute('data-modal-steps') || '[]');
        } catch(e) {
            currentModalSteps = [];
        }

        if (mBadge)   mBadge.textContent   = btn.getAttribute('data-modal-badge');
        if (mRead)    mRead.textContent    = btn.getAttribute('data-modal-readtime');
        if (mTitle)   mTitle.textContent   = currentModalTitle;
        if (mSummary) mSummary.textContent = btn.getAttribute('data-modal-summary');

        if (mStepsBox) {
            mStepsBox.innerHTML = '';
            currentModalSteps.forEach(function (step, i) {
                const item = document.createElement('div');
                item.className = 'flex items-start gap-2.5 rounded-xl bg-slate-50 p-3 border border-slate-200/60';
                item.innerHTML = '<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded bg-primary text-white text-[11px] font-bold mt-0.5">' + (i + 1) + '</span>' +
                                 '<p class="text-xs text-slate-700 leading-relaxed">' + step + '</p>';
                mStepsBox.appendChild(item);
            });
        }

        const outcomeText = btn.getAttribute('data-modal-outcome');
        if (mOutcome && mOutcomeBox) {
            if (outcomeText) {
                mOutcome.textContent = outcomeText;
                mOutcomeBox.style.display = 'block';
            } else {
                mOutcomeBox.style.display = 'none';
            }
        }

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    viewBtns.forEach(function (b) {
        b.addEventListener('click', function () {
            openModal(b);
        });
    });

    if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeModal);
    if (modalDoneBtn)  modalDoneBtn.addEventListener('click', closeModal);
    if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);

    if (modalCopyBtn) {
        modalCopyBtn.addEventListener('click', function () {
            let md = '# ' + currentModalTitle + '\n\n';
            currentModalSteps.forEach(function (s) {
                md += '- [ ] ' + s + '\n';
            });
            md += '\nSumber: VizzioCraft Playbook (https://vizziocraft.com/tips)';
            if (navigator.clipboard) {
                navigator.clipboard.writeText(md).then(function () {
                    showToast('Checklist disalin dalam format Markdown!');
                });
            }
        });
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
})();
</script>
@endpush
