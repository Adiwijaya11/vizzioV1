@extends('layouts.app')

@section('title', 'Portofolio Proyek & Studi Kasus | VizzioCraft')
@section('meta_description', 'Jelajahi proyek nyata dan studi kasus rekayasa digital yang telah dibangun oleh tim VizzioCraft: mulai dari ERP, Corporate LMS, IoT Telemetry, hingga Portal Enterprise.')

@section('content')
    @php
        try {
            $dbProjects = \App\Models\Project::latest()->get();
        } catch (\Throwable $e) {
            $dbProjects = collect();
        }

        try {
            $testimonials = \App\Models\Testimonial::where('status', 'published')->latest()->take(4)->get();
        } catch (\Throwable $e) {
            $testimonials = collect();
        }

        $showcaseProjects = [
            [
                'slug'        => 'erp-logistik-nusantara',
                'name'        => ['id' => 'Enterprise Resource Planning (ERP): PT Logistik Nusantara', 'en' => 'Enterprise Resource Planning (ERP): PT Logistik Nusantara'],
                'client'      => 'PT Logistik Nusantara',
                'category'    => 'erp',
                'cat_label'   => ['id' => 'Platform Produk & ERP', 'en' => 'Product Platform & ERP'],
                'status'      => 'active',
                'year'        => '2026',
                'image'       => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80',
                'summary'     => [
                    'id' => 'Sistem kustom ERP terintegrasi untuk manajemen armada transportasi, pergudangan multi-depo, dan rekonsiliasi keuangan otomatis secara real-time.',
                    'en' => 'Integrated custom ERP system managing transport fleets, multi-depot warehousing, and automated real-time financial reconciliation.',
                ],
                'challenge'   => [
                    'id' => 'Pencatatan surat jalan dan biaya operasional armada masih tersebar di spreadsheet terpisah sehingga rekonsiliasi memakan waktu berhari-hari.',
                    'en' => 'Waybills and fleet operational costs were scattered across spreadsheets, causing reconciliation to take days.',
                ],
                'solution'    => [
                    'id' => 'Membangun modul dispatch armada terpusat, integrasi GPS tracker, serta automated invoicing yang terhubung langsung ke buku besar akuntansi.',
                    'en' => 'Built a centralized fleet dispatch module, GPS tracker integration, and automated invoicing connected directly to the accounting ledger.',
                ],
                'stack'       => ['Laravel 11', 'Vue.js 3', 'PostgreSQL', 'Redis', 'Docker', 'REST API'],
            ],
            [
                'slug'        => 'lms-bank-finansia',
                'name'        => ['id' => 'Corporate LMS & Interactive Training: Bank Finansia Mandiri', 'en' => 'Corporate LMS & Interactive Training: Bank Finansia Mandiri'],
                'client'      => 'Bank Finansia Mandiri',
                'category'    => 'edtech',
                'cat_label'   => ['id' => 'EdTech & LMS', 'en' => 'EdTech & LMS'],
                'status'      => 'completed',
                'year'        => '2026',
                'image'       => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80',
                'summary'     => [
                    'id' => 'Platform Learning Management System korporat untuk pegawai perbankan dengan ujian terproteksi, video streaming adaptif, dan sertifikat ber-QR.',
                    'en' => 'Corporate Learning Management System for banking employees featuring proctored exams, adaptive video streaming, and QR-verified certificates.',
                ],
                'challenge'   => [
                    'id' => 'Pelatihan tatap muka cabang memakan biaya akomodasi tinggi dan sulit memantau progres kepatuhan sertifikasi pegawai secara serentak.',
                    'en' => 'In-person branch training incurred high accommodation costs and made tracking simultaneous employee certification compliance difficult.',
                ],
                'solution'    => [
                    'id' => 'Merancang arsitektur LMS berbasis RBAC multi-cabang dengan HLS video streaming, bank soal acak otomatis, dan analitik kelulusan real-time.',
                    'en' => 'Engineered a multi-branch RBAC LMS architecture with HLS video streaming, randomized question banks, and real-time completion analytics.',
                ],
                'stack'       => ['Laravel', 'Tailwind CSS', 'MySQL 8', 'AWS S3 & CloudFront', 'Redis Queue', 'WebRTC'],
            ],
            [
                'slug'        => 'iot-agro-makmur',
                'name'        => ['id' => 'Smart IoT Cold-Chain Monitoring: PT Agro Makmur Abadi', 'en' => 'Smart IoT Cold-Chain Monitoring: PT Agro Makmur Abadi'],
                'client'      => 'PT Agro Makmur Abadi',
                'category'    => 'iot',
                'cat_label'   => ['id' => 'IoT & Smart System', 'en' => 'IoT & Smart System'],
                'status'      => 'completed',
                'year'        => '2026',
                'image'       => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1200&q=80',
                'summary'     => [
                    'id' => 'Sistem telemetri IoT pemantauan suhu dan kelembapan kontainer berpendingin secara real-time dengan peringatan WhatsApp dan Webhook instan.',
                    'en' => 'Real-time IoT telemetry system monitoring refrigerated container temperature and humidity with instant WhatsApp and Webhook alerts.',
                ],
                'challenge'   => [
                    'id' => 'Fluktuasi suhu kontainer saat pengiriman lintas pulau sering terlambat terdeteksi hingga menyebabkan kerusakan komoditas segar.',
                    'en' => 'Container temperature fluctuations during inter-island shipping often went undetected until fresh commodities were spoiled.',
                ],
                'solution'    => [
                    'id' => 'Integrasi mikrokontroler sensor suhu industri via protokol MQTT ke dashboard analitik berbasis WebSocket dengan notifikasi instan.',
                    'en' => 'Integrated industrial temperature sensor microcontrollers via MQTT into a WebSocket analytics dashboard with instant alert notifications.',
                ],
                'stack'       => ['ESP32 / MQTT', 'Node.js', 'Laravel', 'WebSockets', 'InfluxDB', 'Grafana'],
            ],
            [
                'slug'        => 'portal-sentosa-global',
                'name'        => ['id' => 'Customer Portal & Corporate Web Revamp: Sentosa Global', 'en' => 'Customer Portal & Corporate Web Revamp: Sentosa Global'],
                'client'      => 'PT Sentosa Global Investama',
                'category'    => 'web',
                'cat_label'   => ['id' => 'Situs & Portal Korporat', 'en' => 'Corporate Site & Portal'],
                'status'      => 'completed',
                'year'        => '2026',
                'image'       => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
                'summary'     => [
                    'id' => 'Redesain portal investor multi-bahasa dan website korporat berkecepatan tinggi dengan struktur SEO teknis dan integrasi CRM.',
                    'en' => 'High-speed multilingual investor portal and corporate website redesign with technical SEO architecture and CRM integration.',
                ],
                'challenge'   => [
                    'id' => 'Website lama lambat diakses di perangkat mobile, belum mendukung multi-bahasa, dan memiliki konversi permintaan penawaran yang rendah.',
                    'en' => 'The legacy website was slow on mobile, lacked multilingual support, and suffered from low inquiry conversion rates.',
                ],
                'solution'    => [
                    'id' => 'Arsitektur frontend modern dengan optimasi gambar WebP otomatis, struktur Technical SEO Schema.org, serta CRM lead capture terintegrasi.',
                    'en' => 'Modern frontend architecture with automated WebP image optimization, Schema.org Technical SEO, and integrated CRM lead capture.',
                ],
                'stack'       => ['Laravel', 'Tailwind CSS', 'Alpine.js', 'Cloudflare CDN', 'Technical SEO'],
            ],
            [
                'slug'        => 'emr-klinik-sehat',
                'name'        => ['id' => 'Mobile Health & Rekam Medis Elektronik (RME): Klinik Sehat', 'en' => 'Mobile Health & Electronic Medical Records (EMR): Klinik Sehat'],
                'client'      => 'Klinik Utama Sehat Sejahtera',
                'category'    => 'mobile',
                'cat_label'   => ['id' => 'Mobile & Healthcare', 'en' => 'Mobile & Healthcare'],
                'status'      => 'active',
                'year'        => '2026',
                'image'       => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
                'summary'     => [
                    'id' => 'Aplikasi booking antrean dokter mobile dan sistem Rekam Medis Elektronik terenkripsi yang terhubung standar FHIR SatuSehat Kemenkes.',
                    'en' => 'Mobile doctor queue booking app and encrypted Electronic Medical Records integrated with SatuSehat Kemenkes FHIR standards.',
                ],
                'challenge'   => [
                    'id' => 'Antrean pasien di ruang tunggu menumpuk dan pencarian berkas rekam medis kertas memakan waktu lama per pasien.',
                    'en' => 'Patient waiting rooms were overcrowded and retrieving paper medical records took too long per patient.',
                ],
                'solution'    => [
                    'id' => 'Digitalisasi penuh rekam medis dengan enkripsi AES-256, aplikasi pasien berbasis Flutter, dan jembatan API SatuSehat serta e-Resep apotek.',
                    'en' => 'Full digitization of medical records with AES-256 encryption, a Flutter patient app, and SatuSehat API plus pharmacy e-Prescription bridge.',
                ],
                'stack'       => ['Flutter', 'Laravel API', 'PostgreSQL', 'FHIR SatuSehat', 'Redis'],
            ],
            [
                'slug'        => 'fintech-bpr-artha',
                'name'        => ['id' => 'Core Microbanking & SLA Infrastructure: BPR Artha Sejahtera', 'en' => 'Core Microbanking & SLA Infrastructure: BPR Artha Sejahtera'],
                'client'      => 'BPR Artha Sejahtera',
                'category'    => 'erp',
                'cat_label'   => ['id' => 'Platform Produk & ERP', 'en' => 'Product Platform & ERP'],
                'status'      => 'completed',
                'year'        => '2026',
                'image'       => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
                'summary'     => [
                    'id' => 'Dashboard pengajuan kredit digital, scoring kelayakan nasabah, dan infrastruktur server high-availability dengan pemantauan terpusat.',
                    'en' => 'Digital loan origination dashboard, customer credit scoring, and high-availability server infrastructure with centralized monitoring.',
                ],
                'challenge'   => [
                    'id' => 'Proses verifikasi berkas pengajuan kredit membutuhkan waktu berhari-hari dan server internal sering mengalami beban puncak saat tutup buku.',
                    'en' => 'Loan application verification took days and internal servers frequently experienced peak load bottlenecks during month-end closing.',
                ],
                'solution'    => [
                    'id' => 'Implementasi workflow persetujuan berjenjang dengan audit trail lengkap serta replikasi database otomatis berstandar perbankan.',
                    'en' => 'Implemented multi-tier approval workflows with full audit trails and automated banking-grade database replication.',
                ],
                'stack'       => ['Laravel', 'PostgreSQL', 'Docker Swarm', 'Prometheus', 'Grafana', 'Cloudflare WAF'],
            ],
        ];

        $existingSlugs = collect($showcaseProjects)->pluck('slug')->all();
        foreach ($dbProjects as $dbProj) {
            if (!in_array($dbProj->slug, $existingSlugs, true)) {
                $showcaseProjects[] = [
                    'slug'      => $dbProj->slug,
                    'name'      => ['id' => str_replace('—', ':', $dbProj->name), 'en' => str_replace('—', ':', $dbProj->name)],
                    'client'    => $dbProj->client,
                    'category'  => 'erp',
                    'cat_label' => ['id' => 'Proyek Klien', 'en' => 'Client Project'],
                    'status'    => $dbProj->status ?? 'active',
                    'year'      => optional($dbProj->start_date)->format('Y') ?? '2026',
                    'image'     => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80',
                    'summary'   => [
                        'id' => $dbProj->description ?: 'Solusi rekayasa perangkat lunak kustom yang dirancang khusus untuk kebutuhan operasional klien.',
                        'en' => $dbProj->description ?: 'Custom software engineering solution tailored specifically for client operational needs.',
                    ],
                    'challenge' => [
                        'id' => 'Kebutuhan akselerasi operasional dan integrasi sistem bisnis lintas divisi.',
                        'en' => 'Need for operational acceleration and cross-division business system integration.',
                    ],
                    'solution'  => [
                        'id' => 'Pengembangan aplikasi kustom berarsitektur modern dengan keamanan dan skalabilitas tinggi.',
                        'en' => 'Custom application development with modern architecture, high security, and scalability.',
                    ],
                    'stack'     => ['Laravel', 'Tailwind CSS', 'MySQL', 'Docker'],
                ];
            }
        }

        $projectFilters = [
            'all'    => ['id' => 'Semua Proyek', 'en' => 'All Projects'],
            'erp'    => ['id' => 'ERP & Enterprise', 'en' => 'ERP & Enterprise'],
            'edtech' => ['id' => 'EdTech & LMS', 'en' => 'EdTech & LMS'],
            'iot'    => ['id' => 'IoT & Telemetri', 'en' => 'IoT & Telemetry'],
            'web'    => ['id' => 'Portal Korporat', 'en' => 'Corporate Portal'],
            'mobile' => ['id' => 'Mobile & Healthcare', 'en' => 'Mobile & Healthcare'],
        ];
    @endphp

    {{-- ═══ CLEAN 50SVH IMAGE HERO (Bright Primary Blue Theme) ═══ --}}
    <section class="relative w-full min-h-[50svh] flex items-center bg-primary overflow-hidden">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=85"
                alt="Portofolio Proyek VizzioCraft"
                class="proj-bg-zoom h-full w-full object-cover object-center"
            />
            <div class="absolute inset-0 bg-gradient-to-r from-primary-deep/90 via-primary/80 to-primary/45"></div>
        </div>

        <div class="relative z-10 mx-auto w-full max-w-6xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="max-w-2xl proj-hero-enter">
                <p class="text-xs font-bold tracking-widest text-sky-200 uppercase mb-3">
                    <span data-lang-id>PORTOFOLIO & STUDI KASUS REKAYASA</span>
                    <span data-lang-en class="hidden">PORTFOLIO & ENGINEERING CASE STUDIES</span>
                </p>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.15] mb-4">
                    <span data-lang-id>Sistem Produksi yang Kami Bangun untuk Operasional Nyata.</span>
                    <span data-lang-en class="hidden">Production Systems We Built for Real Operations.</span>
                </h1>

                <p class="text-sm sm:text-base text-blue-50 leading-relaxed">
                    <span data-lang-id>Telusuri arsitektur di balik sistem ERP logistik, platform LMS perbankan, telemetri IoT rantai dingin, hingga rekam medis elektronik klien kami.</span>
                    <span data-lang-en class="hidden">Explore the architecture behind logistics ERPs, banking LMS platforms, cold-chain IoT telemetry, and electronic medical records for our clients.</span>
                </p>
            </div>
        </div>
    </section>

    {{-- ═══ FILTERABLE PROJECT CASE STUDIES ═══ --}}
    <section id="portfolio-showcase" class="py-16 sm:py-24 bg-[#F8FAFC] border-b border-border/50 scroll-mt-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
                <div>
                    <div class="text-xs font-bold uppercase tracking-widest text-primary mb-2">
                        <span data-lang-id>DAFTAR STUDI KASUS</span>
                        <span data-lang-en class="hidden">CASE STUDY ARCHIVE</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-ink tracking-tight">
                        <span data-lang-id>Arsitektur & Solusi yang Telah Kami Bangun</span>
                        <span data-lang-en class="hidden">Architectures & Solutions We Have Built</span>
                    </h2>
                </div>

                {{-- Filter Buttons --}}
                <div class="flex flex-wrap items-center gap-2" role="tablist" aria-label="Filter kategori proyek">
                    @foreach($projectFilters as $fKey => $fLabel)
                        <button
                            type="button"
                            data-project-filter="{{ $fKey }}"
                            class="proj-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer {{ $fKey === 'all' ? 'bg-primary text-white shadow-sm' : 'bg-white text-ink-muted border border-border hover:border-primary/40 hover:text-primary' }}"
                        >
                            <span data-lang-id>{{ $fLabel['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $fLabel['en'] }}</span>
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Projects Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="projects-showcase-grid">
                @foreach($showcaseProjects as $proj)
                    <article
                        id="project-{{ $proj['slug'] }}"
                        data-project-card
                        data-category="{{ $proj['category'] }}"
                        class="group rounded-2xl border border-border bg-white overflow-hidden shadow-xs hover:shadow-lg hover:border-primary/30 transition-all duration-300 flex flex-col justify-between"
                    >
                        <div>
                            {{-- Image Banner --}}
                            <div class="relative h-56 sm:h-64 w-full overflow-hidden bg-slate-900">
                                <img
                                    src="{{ $proj['image'] }}"
                                    alt="{{ $proj['name']['id'] }}"
                                    loading="lazy"
                                    class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 opacity-90"
                                />
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-900/30 to-transparent"></div>

                                {{-- Top Badges --}}
                                <div class="absolute top-4 left-4 right-4 flex items-center justify-between gap-2">
                                    <span class="rounded-lg bg-slate-900/85 backdrop-blur-xs px-3 py-1 text-[11px] font-bold text-white border border-white/15">
                                        <span data-lang-id>{{ $proj['cat_label']['id'] }}</span>
                                        <span data-lang-en class="hidden">{{ $proj['cat_label']['en'] }}</span>
                                    </span>
                                    <span class="rounded-lg bg-white/95 px-3 py-1 text-[11px] font-bold {{ $proj['status'] === 'completed' ? 'text-emerald-700' : 'text-blue-700' }}">
                                        @if($proj['status'] === 'completed')
                                            <span data-lang-id>Production Live</span>
                                            <span data-lang-en class="hidden">Production Live</span>
                                        @else
                                            <span data-lang-id>Active Rollout</span>
                                            <span data-lang-en class="hidden">Active Rollout</span>
                                        @endif
                                    </span>
                                </div>

                                {{-- Bottom Client & Title --}}
                                <div class="absolute bottom-4 left-5 right-5 text-white">
                                    <div class="text-xs font-semibold text-sky-300 mb-1">
                                        {{ $proj['client'] }} • {{ $proj['year'] }}
                                    </div>
                                    <h3 class="text-lg sm:text-xl font-extrabold leading-snug text-white">
                                        <span data-lang-id>{{ $proj['name']['id'] }}</span>
                                        <span data-lang-en class="hidden">{{ $proj['name']['en'] }}</span>
                                    </h3>
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-6 sm:p-7 space-y-5">
                                <p class="text-sm text-ink-muted leading-relaxed">
                                    <span data-lang-id>{{ $proj['summary']['id'] }}</span>
                                    <span data-lang-en class="hidden">{{ $proj['summary']['en'] }}</span>
                                </p>

                                {{-- Challenge & Solution Box --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 rounded-xl bg-muted/60 p-4 border border-border/60">
                                    <div>
                                        <div class="text-[11px] font-bold uppercase tracking-wider text-rose-700 mb-1">
                                            <span data-lang-id>Tantangan Klien</span>
                                            <span data-lang-en class="hidden">Client Challenge</span>
                                        </div>
                                        <p class="text-xs text-ink-muted leading-relaxed">
                                            <span data-lang-id>{{ $proj['challenge']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $proj['challenge']['en'] }}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <div class="text-[11px] font-bold uppercase tracking-wider text-emerald-700 mb-1">
                                            <span data-lang-id>Solusi VizzioCraft</span>
                                            <span data-lang-en class="hidden">VizzioCraft Solution</span>
                                        </div>
                                        <p class="text-xs text-ink-muted leading-relaxed">
                                            <span data-lang-id>{{ $proj['solution']['id'] }}</span>
                                            <span data-lang-en class="hidden">{{ $proj['solution']['en'] }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Card Footer: Tech Stack Tags & Action --}}
                        <div class="px-6 sm:px-7 pb-6 pt-4 border-t border-border/50 flex flex-wrap items-center justify-between gap-3">
                            <div class="flex flex-wrap items-center gap-1.5">
                                @foreach($proj['stack'] as $tech)
                                    <span class="rounded-md bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-700">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                            <a href="/contact?project={{ urlencode($proj['name']['id']) }}" class="inline-flex items-center gap-1 text-xs font-bold text-primary hover:text-primary-dark transition-colors">
                                <span data-lang-id>Diskusikan Arsitektur Serupa</span>
                                <span data-lang-en class="hidden">Discuss Similar Architecture</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ ENGINEERING DELIVERY LIFECYCLE ═══ --}}
    <section class="py-16 sm:py-20 bg-white border-b border-border/40">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mb-12">
                <div class="text-xs font-bold uppercase tracking-widest text-primary mb-2">
                    <span data-lang-id>METODOLOGI EKSEKUSI</span>
                    <span data-lang-en class="hidden">EXECUTION METHODOLOGY</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-ink tracking-tight mb-3">
                    <span data-lang-id>Tahapan Rekayasa dari Spesifikasi hingga Produksi</span>
                    <span data-lang-en class="hidden">Engineering Stages from Specification to Production</span>
                </h2>
                <p class="text-sm sm:text-base text-ink-muted">
                    <span data-lang-id>Transparansi penuh dari pemetaan skema data hingga sistem berjalan stabil di server produksi.</span>
                    <span data-lang-en class="hidden">Full transparency from data schema mapping until your system runs reliably in production.</span>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $steps = [
                        [
                            'num'   => '01',
                            'title' => ['id' => 'Discovery & System Blueprint', 'en' => 'Discovery & System Blueprint'],
                            'desc'  => ['id' => 'Pemetaan alur proses bisnis, skema database ERD, dan spesifikasi API sebelum kode ditulis.', 'en' => 'Mapping business workflows, ERD database schemas, and API specs before writing code.'],
                        ],
                        [
                            'num'   => '02',
                            'title' => ['id' => 'UI/UX Interactive Prototype', 'en' => 'UI/UX Interactive Prototype'],
                            'desc'  => ['id' => 'Desain antarmuka high-fidelity di Figma yang bisa diklik dan diuji langsung oleh stakeholder Anda.', 'en' => 'Clickable high-fidelity Figma prototypes validated directly with your stakeholders.'],
                        ],
                        [
                            'num'   => '03',
                            'title' => ['id' => 'Agile Sprint & Automated QA', 'en' => 'Agile Sprint & Automated QA'],
                            'desc'  => ['id' => 'Siklus rilis mingguan di staging server lengkap dengan pengujian beban dan audit keamanan.', 'en' => 'Weekly staging releases complete with load testing and security vulnerability audits.'],
                        ],
                        [
                            'num'   => '04',
                            'title' => ['id' => 'Zero-Downtime Go-Live & SLA', 'en' => 'Zero-Downtime Go-Live & SLA'],
                            'desc'  => ['id' => 'Deployment produksi terotomatisasi, pelatihan tim internal klien, dan dukungan garansi SLA.', 'en' => 'Automated production deployment, internal team training, and SLA warranty support.'],
                        ],
                    ];
                @endphp
                @foreach($steps as $st)
                    <div class="rounded-2xl border border-border bg-[#F8FAFC] p-6 hover:border-primary/40 hover:bg-white transition-all duration-300">
                        <div class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-white text-xs font-extrabold mb-4">
                            {{ $st['num'] }}
                        </div>
                        <h3 class="text-base font-bold text-ink mb-2">
                            <span data-lang-id>{{ $st['title']['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $st['title']['en'] }}</span>
                        </h3>
                        <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                            <span data-lang-id>{{ $st['desc']['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $st['desc']['en'] }}</span>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ CLIENT TESTIMONIALS (Database Seeded) ═══ --}}
    @if($testimonials->count() > 0)
    <section class="py-16 sm:py-20 bg-[#F8FAFC]">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mb-10">
                <div class="text-xs font-bold uppercase tracking-widest text-primary mb-2">
                    <span data-lang-id>CATATAN KLIEN</span>
                    <span data-lang-en class="hidden">CLIENT NOTES</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-ink tracking-tight">
                    <span data-lang-id>Umpan Balik dari Mitra Proyek Kami</span>
                    <span data-lang-en class="hidden">Feedback from Our Project Partners</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($testimonials as $testi)
                    <div class="rounded-2xl border border-border bg-white p-6 flex flex-col justify-between">
                        <p class="text-sm text-ink leading-relaxed mb-5">"{{ $testi->comment }}"</p>
                        <div class="flex items-center justify-between pt-4 border-t border-border/50">
                            <div>
                                <div class="text-sm font-bold text-ink">{{ $testi->name }}</div>
                                <div class="text-xs text-ink-muted">{{ $testi->title }}, {{ $testi->company }}</div>
                            </div>
                            @if($testi->project)
                                <span class="rounded-md bg-primary/10 px-2.5 py-1 text-[11px] font-semibold text-primary">
                                    {{ $testi->project }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <x-about-cta />
@endsection

@push('scripts')
<style>
@keyframes projHeroReveal {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes projBgZoom {
    from { transform: scale(1.07); }
    to   { transform: scale(1); }
}
.proj-hero-enter {
    animation: projHeroReveal 0.75s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.proj-bg-zoom {
    animation: projBgZoom 1.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
<script>
(function () {
    const filterButtons = document.querySelectorAll('[data-project-filter]');
    const projectCards  = document.querySelectorAll('[data-project-card]');
    const activeClass   = 'proj-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer bg-primary text-white shadow-sm';
    const inactiveClass = 'proj-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer bg-white text-ink-muted border border-border hover:border-primary/40 hover:text-primary';

    filterButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const cat = btn.getAttribute('data-project-filter');
            filterButtons.forEach(function (b) {
                b.className = (b === btn) ? activeClass : inactiveClass;
            });
            projectCards.forEach(function (card) {
                const match = (cat === 'all' || card.getAttribute('data-category') === cat);
                card.style.display = match ? '' : 'none';
            });
        });
    });
})();
</script>
@endpush
