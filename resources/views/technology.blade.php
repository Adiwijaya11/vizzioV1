@extends('layouts.app')

@section('title', 'Teknologi & Arsitektur Rekayasa | VizzioCraft')
@section('meta_description', 'Pelajari tech stack, arsitektur cloud, standar keamanan siber, dan perkakas rekayasa perangkat lunak modern yang digunakan oleh tim engineer VizzioCraft.')

@section('content')
    @php
        // Fallback default tech items if DB table is empty
        $fallbackTech = [
            [
                'id' => 1,
                'name' => 'Laravel 11',
                'slug' => 'laravel-11',
                'category' => 'backend',
                'category_label_id' => 'Backend & Core API',
                'category_label_en' => 'Backend & Core API',
                'version' => 'v11.x • PHP 8.3+',
                'role' => 'Enterprise Web & ERP Core Engine',
                'description' => 'Framework server-side utama VizzioCraft untuk sistem ERP, LMS, dan portal korporat dengan arsitektur modular, queue worker tangguh, dan enkripsi data berlapis.',
                'description_en' => 'Our primary server-side framework for ERP, LMS, and enterprise portals with modular architecture, resilient queue workers, and multi-layered data encryption.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg',
                'features' => ['Modular Clean Architecture', 'Resilient Queue Workers', 'Eloquent ORM & Migrations', 'AES-256 Data Encryption'],
                'use_case' => 'ERP Terintegrasi, Sistem Akuntansi, & Portal Bisnis Multi-Cabang',
                'performance_metric' => 'P99 Latency < 45ms',
                'official_url' => 'https://laravel.com',
                'order' => 1,
                'is_featured' => true,
            ],
            [
                'id' => 2,
                'name' => 'Node.js & NestJS',
                'slug' => 'nodejs-nestjs',
                'category' => 'backend',
                'category_label_id' => 'Backend & Core API',
                'category_label_en' => 'Backend & Core API',
                'version' => 'v20 LTS • NestJS v10',
                'role' => 'Real-Time Streaming & Event-Driven API',
                'description' => 'Digunakan untuk microservices real-time berlatensi rendah, gateway telemetri IoT, streaming WebSocket antarmuka live, dan job broker asinkron.',
                'description_en' => 'Used for low-latency real-time microservices, IoT telemetry gateways, live WebSocket streams, and asynchronous job brokers.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg',
                'features' => ['Asynchronous Event Loop', 'Native WebSocket Streaming', 'Microservice Transports', 'High Concurrent Throughput'],
                'use_case' => 'Live Chatting, Pelacak GPS Armada Real-Time, & Gateway Telemetri IoT',
                'performance_metric' => '15,000+ Req/sec per Pod',
                'official_url' => 'https://nodejs.org',
                'order' => 2,
                'is_featured' => true,
            ],
            [
                'id' => 3,
                'name' => 'Go (Golang)',
                'slug' => 'golang',
                'category' => 'backend',
                'category_label_id' => 'Backend & Core API',
                'category_label_en' => 'Backend & Core API',
                'version' => 'v1.22 • Native Binary',
                'role' => 'High-Throughput Concurrent Microservices',
                'description' => 'Layanan pemrosesan paralel beban tinggi dan worker antrean skala masif dengan konsumsi memori minimal dan eksekusi goroutine secepat kilat.',
                'description_en' => 'High-concurrency parallel processing services and massive-scale queue workers with minimal memory footprint and lightning-fast goroutine execution.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg',
                'features' => ['Lightweight Goroutines', 'Low Memory Overhead (<30MB)', 'Fast Compile-to-Binary', 'Zero-Downtime Hot Reload'],
                'use_case' => 'Pemrosesan Transaksi Massal, Ingestion Sensor IoT, & Export Data Skala Besar',
                'performance_metric' => '50,000+ Req/sec',
                'official_url' => 'https://go.dev',
                'order' => 3,
                'is_featured' => true,
            ],
            [
                'id' => 4,
                'name' => 'Vue.js 3 & Nuxt',
                'slug' => 'vuejs-3-nuxt',
                'category' => 'frontend',
                'category_label_id' => 'Frontend & UI',
                'category_label_en' => 'Frontend & UI',
                'version' => 'v3.4 • Composition API',
                'role' => 'Reactive Interactive Dashboard & SPA',
                'description' => 'Membangun dashboard operasional yang responsif, visualisasi grafik data dinamis, dan builder drag-and-drop dengan rendering state yang mulus.',
                'description_en' => 'Building responsive operational dashboards, dynamic charts, and drag-and-drop builders with smooth reactive state management.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg',
                'features' => ['Composition API & Pinia', 'Zero-Lag Component Re-renders', 'Vite Ultra-Fast HMR', 'Accessible UI System'],
                'use_case' => 'Dashboard Analytics Eksekutif, POS Kasir Web, & Portal Admin Operasional',
                'performance_metric' => 'Initial Load < 280ms',
                'official_url' => 'https://vuejs.org',
                'order' => 4,
                'is_featured' => true,
            ],
            [
                'id' => 5,
                'name' => 'React & Next.js',
                'slug' => 'react-nextjs',
                'category' => 'frontend',
                'category_label_id' => 'Frontend & UI',
                'category_label_en' => 'Frontend & UI',
                'version' => 'v18.3 • Next.js v14',
                'role' => 'Server-Side Rendering & Public Portal',
                'description' => 'Arsitektur SSR dan Incremental Static Regeneration (ISR) untuk portal berita, e-commerce, dan aplikasi publik dengan skor Core Web Vitals sempurna.',
                'description_en' => 'SSR and ISR architecture for news portals, e-commerce, and high-traffic public web applications with high Core Web Vitals scores.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg',
                'features' => ['Server-Side Rendering (SSR)', 'Dynamic Image Optimization', 'Edge Route Handlers', '100% Core Web Vitals'],
                'use_case' => 'Corporate Web Portal, E-Commerce B2B, & Platform Media Berita',
                'performance_metric' => 'Lighthouse Score 98+',
                'official_url' => 'https://nextjs.org',
                'order' => 5,
                'is_featured' => true,
            ],
            [
                'id' => 6,
                'name' => 'Tailwind CSS',
                'slug' => 'tailwind-css',
                'category' => 'frontend',
                'category_label_id' => 'Frontend & UI',
                'category_label_en' => 'Frontend & UI',
                'version' => 'v3.4 • JIT Engine',
                'role' => 'Atomic Design System & Mobile First',
                'description' => 'Fondasi desain UI konsisten bebas file CSS besar. Memastikan antarmuka mobile-first tampil presisi di semua resolusi dengan payload di bawah 15KB gzipped.',
                'description_en' => 'Consistent UI design system without CSS bloat. Ensures pixel-perfect mobile-first rendering across all devices under 15KB gzipped.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original.svg',
                'features' => ['Just-In-Time Compiler', 'Sub-15KB Production CSS', 'Dark/Light Token Theming', 'Fluid Responsive Typography'],
                'use_case' => 'Design System Seluruh Aplikasi Web & Komponen UI Kustom',
                'performance_metric' => '< 15KB Asset Payload',
                'official_url' => 'https://tailwindcss.com',
                'order' => 6,
                'is_featured' => true,
            ],
            [
                'id' => 7,
                'name' => 'Flutter (iOS & Android)',
                'slug' => 'flutter',
                'category' => 'mobile',
                'category_label_id' => 'Mobile & Cross-Platform',
                'category_label_en' => 'Mobile & Cross-Platform',
                'version' => 'v3.22 • Dart 3',
                'role' => 'Cross-Platform Native Mobile Apps',
                'description' => 'Satu basis kode untuk Android dan iOS dengan performa native 60fps, akses modul hardware bluetooth printer, kamera barcode scanner, dan geofencing GPS.',
                'description_en' => 'Single codebase for iOS and Android delivering 60fps native speed, Bluetooth thermal printer integration, barcode scanning, and GPS geofencing.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg',
                'features' => ['Native GPU Skia/Impeller', 'Offline SQLite Local Cache', 'Bluetooth Thermal Printing', 'Realtime Push Notifications'],
                'use_case' => 'Aplikasi Kurir Ekspedisi, Mobile POS Lapangan, & Portal Absensi Karyawan',
                'performance_metric' => 'Smooth 60 FPS Engine',
                'official_url' => 'https://flutter.dev',
                'order' => 7,
                'is_featured' => true,
            ],
            [
                'id' => 8,
                'name' => 'PostgreSQL & MySQL 8',
                'slug' => 'postgresql-mysql',
                'category' => 'database',
                'category_label_id' => 'Database & In-Memory Cache',
                'category_label_en' => 'Database & In-Memory Cache',
                'version' => 'PostgreSQL 16 • MySQL 8',
                'role' => 'ACID Enterprise Relational Storage',
                'description' => 'Penyimpanan data transaksional utama yang dijamin integritasnya dengan partitioning tabel bulanan, JSONB indexing berkecepatan tinggi, dan replikasi read-only.',
                'description_en' => 'Primary transactional storage with guaranteed integrity via monthly table partitioning, high-speed JSONB indexing, and read-replica failover.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg',
                'features' => ['ACID Transaction Guarantees', 'High-Speed B-Tree & GIN Indexing', 'Automatic Point-in-Time Recovery', 'Read-Replica Load Split'],
                'use_case' => 'Penyimpanan Buku Besar ERP, Rekam Medis Pasien, & Riwayat Transaksi Jual-Beli',
                'performance_metric' => 'Zero Data Loss (RPO = 0)',
                'official_url' => 'https://www.postgresql.org',
                'order' => 8,
                'is_featured' => true,
            ],
            [
                'id' => 9,
                'name' => 'Redis',
                'slug' => 'redis',
                'category' => 'database',
                'category_label_id' => 'Database & In-Memory Cache',
                'category_label_en' => 'Database & In-Memory Cache',
                'version' => 'v7.2 • In-Memory Cluster',
                'role' => 'Sub-Millisecond Cache & Distributed Pub/Sub',
                'description' => 'Memangkas beban query database hingga 80% dengan menyimpan token sesi, data master yang sering diakses, rate-limiting limiter, dan antrean Redis Streams.',
                'description_en' => 'Cuts database query load by 80% by caching session tokens, master catalogs, rate-limiting counters, and event streams.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original.svg',
                'features' => ['Sub-Millisecond Response', 'Distributed Locking Redlock', 'Redis Streams Queue', 'Pub/Sub Realtime Broker'],
                'use_case' => 'Penyimpanan Token JWT, Cache Katalog Produk, & Antrean Notifikasi Email',
                'performance_metric' => '< 1.5ms Query Latency',
                'official_url' => 'https://redis.io',
                'order' => 9,
                'is_featured' => true,
            ],
            [
                'id' => 10,
                'name' => 'Docker & Kubernetes',
                'slug' => 'docker-kubernetes',
                'category' => 'devops',
                'category_label_id' => 'Cloud, DevOps & Containers',
                'category_label_en' => 'Cloud, DevOps & Containers',
                'version' => 'Docker 26 • K8s v1.30',
                'role' => 'Container Orchestration & Microservices',
                'description' => 'Menjamin konsistensi lingkungan dari mesin developer hingga server produksi dengan autoscaling pod otomatis saat lonjakan trafik pengguna terjadi.',
                'description_en' => 'Guarantees environmental consistency from developer laptops to production nodes with automated pod autoscaling during user traffic spikes.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg',
                'features' => ['Zero-Downtime Rolling Updates', 'Horizontal Pod Autoscaler (HPA)', 'Isolated Sandboxed Containers', 'Self-Healing Auto Recovery'],
                'use_case' => 'Cluster Produksi Seluruh Layanan Backend, Database Staging, & Queue Workers',
                'performance_metric' => '99.98% Service Uptime',
                'official_url' => 'https://www.docker.com',
                'order' => 10,
                'is_featured' => true,
            ],
            [
                'id' => 11,
                'name' => 'AWS, Cloudflare & Edge Security',
                'slug' => 'aws-cloudflare-edge',
                'category' => 'security',
                'category_label_id' => 'Security & Gateway',
                'category_label_en' => 'Security & Gateway',
                'version' => 'Enterprise WAF & Global Edge CDN',
                'role' => 'DDoS Shield, Edge DNS & Object Storage',
                'description' => 'Lapisan perlindungan terdepan terhadap serangan DDoS layer 3/4/7, optimasi SSL/TLS 1.3 otomatis, dan backup snapshot terenkripsi di Amazon S3.',
                'description_en' => 'Frontline shield against Layer 3/4/7 DDoS attacks, automated TLS 1.3 handshakes, and encrypted snapshot backups on Amazon S3.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original-wordmark.svg',
                'features' => ['Cloudflare Enterprise WAF', 'Global Anycast Edge CDN', 'Automated Daily S3 Snapshots', 'AES-256 Object Encryption'],
                'use_case' => 'Mitigasi Serangan Web, Distribusi Aset Statis, & Brute-Force Rate Limiting',
                'performance_metric' => 'Global Edge TTL < 20ms',
                'official_url' => 'https://cloudflare.com',
                'order' => 11,
                'is_featured' => true,
            ],
            [
                'id' => 12,
                'name' => 'Python & FastAPI',
                'slug' => 'python-fastapi',
                'category' => 'ai',
                'category_label_id' => 'AI & Data Engineering',
                'category_label_en' => 'AI & Data Engineering',
                'version' => 'v3.12 • FastAPI v0.111',
                'role' => 'AI Data Pipeline, OCR & Machine Learning',
                'description' => 'Ekosistem machine learning untuk parsing dokumen bisnis cerdas, OCR invoice otomatis, model prediktif tren penjualan, dan asisten virtual bisnis berbasis LLM.',
                'description_en' => 'Machine learning ecosystem for intelligent business document parsing, automated invoice OCR, sales prediction models, and business virtual assistants.',
                'image' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg',
                'features' => ['Async OpenAPI Contracts', 'Document OCR & NLP', 'PyTorch & Scikit-learn Ready', 'Automated Data Cleanse'],
                'use_case' => 'Ekstraksi Faktur Pajak Otomatis, Forecast Stok Gudang, & Analisis Sentimen',
                'performance_metric' => 'OCR Parsing < 1.2s',
                'official_url' => 'https://fastapi.tiangolo.com',
                'order' => 12,
                'is_featured' => true,
            ],
        ];

        $techList = isset($technologies) && $technologies->count() > 0 ? $technologies : collect($fallbackTech);

        $filterCategories = [
            'all'      => ['id' => 'Semua Stack', 'en' => 'All Stacks'],
            'backend'  => ['id' => 'Backend & API', 'en' => 'Backend & API'],
            'frontend' => ['id' => 'Frontend & UI', 'en' => 'Frontend & UI'],
            'mobile'   => ['id' => 'Mobile & IoT', 'en' => 'Mobile & IoT'],
            'database' => ['id' => 'Database & Cache', 'en' => 'Database & Cache'],
            'devops'   => ['id' => 'Cloud & DevOps', 'en' => 'Cloud & DevOps'],
            'security' => ['id' => 'Keamanan & WAF', 'en' => 'Security & WAF'],
            'ai'       => ['id' => 'AI & Data Pipeline', 'en' => 'AI & Data Pipeline'],
        ];
    @endphp

    {{-- ═══ CLEAN 50SVH IMAGE HERO (Bright Primary Blue Theme - Preserved) ═══ --}}
    <section class="relative w-full min-h-[50svh] flex items-center bg-primary overflow-hidden">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1920&q=85"
                alt="Infrastruktur & Arsitektur Teknologi VizzioCraft"
                class="tech-bg-zoom h-full w-full object-cover object-center"
            />
            <div class="absolute inset-0 bg-gradient-to-r from-primary-deep/90 via-primary/80 to-primary/45"></div>
        </div>

        <div class="relative z-10 mx-auto w-full max-w-6xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="max-w-2xl tech-stagger-1">
                <p class="text-xs font-bold tracking-widest text-sky-200 uppercase mb-3">
                    <span data-lang-id>TECH STACK & ARSITEKTUR REKAYASA</span>
                    <span data-lang-en class="hidden">TECH STACK & ENGINEERING ARCHITECTURE</span>
                </p>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.15] mb-4">
                    <span data-lang-id>Fondasi Teknologi untuk Stabilitas Jangka Panjang.</span>
                    <span data-lang-en class="hidden">Technology Foundations for Long-Term Stability.</span>
                </h1>

                <p class="text-sm sm:text-base text-blue-50 leading-relaxed">
                    <span data-lang-id>Kami menyusun setiap lapisan sistem, mulai dari database relasional, API backend, antarmuka pengguna, hingga pipeline kontainer Docker.</span>
                    <span data-lang-en class="hidden">We engineer every system layer, from relational databases and backend APIs to user interfaces and Docker container pipelines.</span>
                </p>
            </div>
        </div>
    </section>

    {{-- ═══ MAIN TECH STACK EXPLORER SECTION ═══ --}}
    <section class="py-16 sm:py-24 bg-[#F8FAFC] border-b border-border/50">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

            {{-- Section Title & Subtitle --}}
            <div class="max-w-3xl mb-10">
                <div class="text-xs font-bold uppercase tracking-widest text-primary mb-2">
                    <span data-lang-id>KATALOG PERKAKAS REKAYASA</span>
                    <span data-lang-en class="hidden">ENGINEERING STACK CATALOG</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-ink tracking-tight mb-3">
                    <span data-lang-id>Perangkat Lunak, Bahasa Pemrograman & Pustaka Inti</span>
                    <span data-lang-en class="hidden">Software, Programming Languages & Core Libraries</span>
                </h2>
                <p class="text-sm sm:text-base text-ink-muted leading-relaxed">
                    <span data-lang-id>Semua teknologi yang kami adopsi telah melalui pengujian beban tinggi dan audit keamanan, dirawat oleh tim engineer internal VizzioCraft.</span>
                    <span data-lang-en class="hidden">Every adopted technology undergoes strict load testing and security auditing, maintained by our in-house engineering team.</span>
                </p>
            </div>

            {{-- Interactive Layer Filter & Live Search Toolbar --}}
            <div class="mb-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                {{-- Category Filter Pills --}}
                <div class="flex flex-wrap gap-2" role="tablist">
                    @foreach($filterCategories as $fKey => $fLabel)
                        <button
                            type="button"
                            data-tech-filter="{{ $fKey }}"
                            class="tech-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer {{ $fKey === 'all' ? 'bg-primary text-white shadow-sm' : 'bg-white text-ink-muted border border-border hover:border-primary/40 hover:text-primary' }}"
                        >
                            <span data-lang-id>{{ $fLabel['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $fLabel['en'] }}</span>
                        </button>
                    @endforeach
                </div>

                {{-- Live Search Input --}}
                <div class="w-full lg:w-80">
                    <div class="relative">
                        <input
                            type="text"
                            id="tech-search-input"
                            placeholder="Cari stack (Laravel, Redis, Go, K8s...)"
                            class="w-full rounded-xl border border-border bg-white px-4 py-2.5 pl-10 text-xs sm:text-sm text-ink placeholder-slate-400 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                        />
                        <svg class="absolute left-3.5 top-3 h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Technology Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="tech-cards-grid">
                @foreach($techList as $tech)
                    @php
                        $techName        = is_array($tech) ? $tech['name'] : $tech->name;
                        $techSlug        = is_array($tech) ? $tech['slug'] : $tech->slug;
                        $techCat         = is_array($tech) ? $tech['category'] : $tech->category;
                        $techVersion     = is_array($tech) ? ($tech['version'] ?? null) : $tech->version;
                        $techRole        = is_array($tech) ? $tech['role'] : $tech->role;
                        $techDescId      = is_array($tech) ? $tech['description'] : $tech->description;
                        $techDescEn      = is_array($tech) ? ($tech['description_en'] ?? $techDescId) : ($tech->description_en ?: $techDescId);
                        $techImage       = is_array($tech) ? $tech['image'] : $tech->image;
                        $techFeatures    = is_array($tech) ? ($tech['features'] ?? []) : ($tech->features ?? []);
                        $techUseCase     = is_array($tech) ? ($tech['use_case'] ?? null) : $tech->use_case;
                        $techMetric      = is_array($tech) ? ($tech['performance_metric'] ?? null) : $tech->performance_metric;
                        $techUrl         = is_array($tech) ? ($tech['official_url'] ?? null) : $tech->official_url;

                        $featuresStr     = is_array($techFeatures) ? implode(' ', $techFeatures) : (string)$techFeatures;
                        $searchBlob      = strtolower($techName . ' ' . $techRole . ' ' . $techDescId . ' ' . $featuresStr . ' ' . $techUseCase);
                    @endphp

                    <article
                        data-tech-card
                        data-category="{{ $techCat }}"
                        data-search="{{ $searchBlob }}"
                        class="group rounded-2xl border border-border bg-white p-6 hover:border-primary/50 hover:shadow-xl transition-all duration-300 flex flex-col justify-between"
                    >
                        <div>
                            {{-- Header: Crisp Logo, Category, Version --}}
                            <div class="flex items-start justify-between gap-3 mb-5">
                                <div class="flex items-center gap-3.5">
                                    <div class="h-12 w-12 rounded-xl bg-slate-50 border border-slate-200/80 p-2 flex items-center justify-center shrink-0 group-hover:scale-105 group-hover:border-primary/30 transition-transform">
                                        <img
                                            src="{{ $techImage }}"
                                            alt="{{ $techName }}"
                                            class="max-h-full max-w-full object-contain"
                                            onerror="this.src='https://cdn.jsdelivr.net/gh/devicons/devicon/icons/devicon/devicon-original.svg'"
                                        />
                                    </div>
                                    <div>
                                        <h3 class="text-base font-extrabold text-ink group-hover:text-primary transition-colors leading-snug">
                                            {{ $techName }}
                                        </h3>
                                        @if($techVersion)
                                            <span class="text-[11px] font-semibold text-slate-500">{{ $techVersion }}</span>
                                        @endif
                                    </div>
                                </div>

                                <span class="text-[10px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 border border-slate-200">
                                    {{ strtoupper($techCat) }}
                                </span>
                            </div>

                            {{-- Role Title --}}
                            <div class="text-xs font-bold text-primary mb-2.5">
                                {{ $techRole }}
                            </div>

                            {{-- Description --}}
                            <p class="text-xs sm:text-sm text-ink-muted leading-relaxed mb-4">
                                <span data-lang-id>{{ $techDescId }}</span>
                                <span data-lang-en class="hidden">{{ $techDescEn }}</span>
                            </p>

                            {{-- Features Tags --}}
                            @if(!empty($techFeatures) && is_array($techFeatures))
                                <div class="flex flex-wrap gap-1.5 mb-5">
                                    @foreach(array_slice($techFeatures, 0, 3) as $tag)
                                        <span class="text-[10px] font-semibold bg-slate-50 text-slate-700 border border-slate-200 px-2 py-0.5 rounded-md">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                    @if(count($techFeatures) > 3)
                                        <span class="text-[10px] font-semibold text-primary px-1 py-0.5">
                                            +{{ count($techFeatures) - 3 }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        {{-- Card Bottom Info & Interactive Action --}}
                        <div class="pt-4 border-t border-border/70 flex items-center justify-between gap-3">
                            <div>
                                @if($techMetric)
                                    <div class="text-[10px] font-bold text-emerald-700 flex items-center gap-1">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        {{ $techMetric }}
                                    </div>
                                @else
                                    <span class="text-[10px] font-bold text-slate-400">Enterprise Ready</span>
                                @endif
                            </div>

                            <button
                                type="button"
                                class="tech-spec-btn text-xs font-bold text-primary hover:text-primary-dark transition-colors inline-flex items-center gap-1 cursor-pointer"
                                data-spec-name="{{ $techName }}"
                                data-spec-image="{{ $techImage }}"
                                data-spec-category="{{ strtoupper($techCat) }}"
                                data-spec-version="{{ $techVersion ?: 'N/A' }}"
                                data-spec-role="{{ $techRole }}"
                                data-spec-desc="{{ $techDescId }}"
                                data-spec-usecase="{{ $techUseCase ?: 'Implementasi sistem rekayasa perangkat lunak enterprise VizzioCraft.' }}"
                                data-spec-metric="{{ $techMetric ?: 'High Availability & Resilient SLA' }}"
                                data-spec-tags="{{ is_array($techFeatures) ? implode(', ', $techFeatures) : '' }}"
                                data-spec-docs="{{ $techUrl ?: '' }}"
                            >
                                <span data-lang-id>Spesifikasi</span>
                                <span data-lang-en class="hidden">Specs</span>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Empty Search Results Notice --}}
            <div id="tech-empty-state" class="hidden rounded-2xl border border-border bg-white p-12 text-center my-8">
                <div class="h-12 w-12 rounded-xl bg-blue-50 text-primary flex items-center justify-center mx-auto mb-3">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                    </svg>
                </div>
                <h3 class="text-base font-bold text-ink mb-1">
                    <span data-lang-id>Teknologi Tidak Ditemukan</span>
                    <span data-lang-en class="hidden">No Technology Found</span>
                </h3>
                <p class="text-xs sm:text-sm text-ink-muted mb-4">
                    <span data-lang-id>Tidak ada stack yang cocok dengan kata kunci pencarian Anda. Klik tombol di bawah untuk menampilkan seluruh stack.</span>
                    <span data-lang-en class="hidden">No stack matched your query. Click the button below to view all engineering stacks.</span>
                </p>
                <button
                    type="button"
                    id="tech-reset-btn"
                    class="rounded-xl bg-primary px-4 py-2 text-xs font-bold text-white hover:bg-primary-dark transition-colors cursor-pointer"
                >
                    <span data-lang-id>Tampilkan Semua Stack</span>
                    <span data-lang-en class="hidden">Show All Stacks</span>
                </button>
            </div>

        </div>
    </section>

    {{-- ═══ ENGINEERING STANDARDS & SECURITY PILLARS ═══ --}}
    <section class="py-16 sm:py-24 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-12">
                <div class="text-xs font-bold uppercase tracking-widest text-primary mb-2">
                    <span data-lang-id>STANDAR ARSITEKTUR KAMI</span>
                    <span data-lang-en class="hidden">OUR ARCHITECTURAL STANDARDS</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-ink tracking-tight mb-3">
                    <span data-lang-id>Prinsip Rekayasa pada Setiap Repositori Klien</span>
                    <span data-lang-en class="hidden">Engineering Principles Across Every Client Repository</span>
                </h2>
                <p class="text-sm sm:text-base text-ink-muted">
                    <span data-lang-id>Standar kualitas yang kami terapkan agar aplikasi mudah dipelihara dan aman saat trafik meningkat.</span>
                    <span data-lang-en class="hidden">Quality standards we enforce so applications remain maintainable and secure as traffic grows.</span>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rounded-2xl border border-border bg-[#F8FAFC] p-7 hover:border-primary/30 transition-colors">
                    <div class="text-xs font-extrabold text-primary uppercase tracking-wider mb-2">01 / SECURITY FIRST</div>
                    <h3 class="text-lg font-extrabold text-ink mb-2">
                        <span data-lang-id>Keamanan Berlapis (Defense-in-Depth)</span>
                        <span data-lang-en class="hidden">Defense-in-Depth Multi-Layered</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        <span data-lang-id>Proteksi terhadap SQL Injection, XSS, CSRF, enkripsi data sensitif AES-256, rate-limiting API, serta audit log aktivitas pengguna secara menyeluruh.</span>
                        <span data-lang-en class="hidden">Protection against SQL Injection, XSS, CSRF, AES-256 sensitive data encryption, API rate-limiting, and comprehensive user audit logging.</span>
                    </p>
                </div>

                <div class="rounded-2xl border border-border bg-[#F8FAFC] p-7 hover:border-primary/30 transition-colors">
                    <div class="text-xs font-extrabold text-primary uppercase tracking-wider mb-2">02 / SCALABILITY</div>
                    <h3 class="text-lg font-extrabold text-ink mb-2">
                        <span data-lang-id>Skalabilitas Horizontal & Caching</span>
                        <span data-lang-en class="hidden">Horizontal Scalability & Caching</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        <span data-lang-id>Arsitektur stateless yang siap diperluas dengan load balancer, Redis caching untuk query berat, dan pemisahan worker antrean latar belakang.</span>
                        <span data-lang-en class="hidden">Stateless architecture ready to scale behind load balancers, Redis caching for heavy queries, and dedicated background queue workers.</span>
                    </p>
                </div>

                <div class="rounded-2xl border border-border bg-[#F8FAFC] p-7 hover:border-primary/30 transition-colors">
                    <div class="text-xs font-extrabold text-primary uppercase tracking-wider mb-2">03 / MAINTAINABILITY</div>
                    <h3 class="text-lg font-extrabold text-ink mb-2">
                        <span data-lang-id>Kode Bersih & Kontrak API</span>
                        <span data-lang-en class="hidden">Clean Code & API Contracts</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        <span data-lang-id>Struktur kode modular yang mudah dirawat oleh tim internal Anda di masa depan, dilengkapi dokumentasi OpenAPI/Swagger dan automated test suite.</span>
                        <span data-lang-en class="hidden">Modular code structure easy for your internal team to maintain in the future, complete with OpenAPI/Swagger docs and automated test suites.</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ INTERACTIVE SPEC DRAWER / MODAL ═══ --}}
    <div id="tech-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        {{-- Backdrop --}}
        <div id="tech-modal-backdrop" class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm transition-opacity"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 w-full sm:max-w-xl border border-slate-200">
                {{-- Modal Header --}}
                <div class="bg-slate-50 border-b border-border/80 px-6 py-5 flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="h-11 w-11 rounded-xl bg-white border border-slate-200 p-2 flex items-center justify-center shrink-0">
                            <img id="modal-image" src="" alt="Tech Logo" class="max-h-full max-w-full object-contain">
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 id="modal-title" class="text-base sm:text-lg font-extrabold text-ink">Tech Name</h3>
                                <span id="modal-category" class="text-[10px] font-extrabold px-2 py-0.5 rounded-full bg-blue-100 text-blue-800">CATEGORY</span>
                            </div>
                            <span id="modal-version" class="text-xs text-slate-500 font-semibold">Version</span>
                        </div>
                    </div>
                    <button type="button" id="modal-close-btn" class="h-8 w-8 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-200/60 flex items-center justify-center cursor-pointer transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                {{-- Modal Body --}}
                <div class="px-6 py-5 space-y-4 text-left">
                    <div>
                        <div class="text-[11px] font-bold uppercase tracking-wider text-primary mb-1">Peran dalam Rekayasa VizzioCraft</div>
                        <div id="modal-role" class="text-sm font-bold text-ink">Enterprise Web Core</div>
                    </div>

                    <div>
                        <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1">Deskripsi Arsitektur</div>
                        <p id="modal-desc" class="text-xs sm:text-sm text-slate-600 leading-relaxed">Description...</p>
                    </div>

                    <div class="rounded-xl bg-slate-50 border border-slate-200/80 p-4 space-y-2">
                        <div>
                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Kasus Pakai Lapangan:</div>
                            <div id="modal-usecase" class="text-xs font-semibold text-slate-800">Use case text</div>
                        </div>
                        <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Benchmark SLA:</span>
                            <span id="modal-metric" class="text-xs font-extrabold text-emerald-700">Latency &lt; 45ms</span>
                        </div>
                    </div>

                    <div id="modal-tags-section">
                        <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">Kapabilitas Kunci</div>
                        <div id="modal-tags" class="flex flex-wrap gap-1.5"></div>
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="bg-slate-50 px-6 py-4 border-t border-border flex items-center justify-between">
                    <a id="modal-docs-link" href="#" target="_blank" class="text-xs font-bold text-primary hover:text-primary-dark transition-colors inline-flex items-center gap-1.5">
                        <span>Dokumentasi Resmi</span>
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                    <button type="button" id="modal-done-btn" class="rounded-xl bg-slate-900 px-4 py-2 text-xs font-bold text-white hover:bg-slate-800 transition-colors cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <x-about-cta />
@endsection

@push('scripts')
<style>
@keyframes techSlideIn {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes techBgZoom {
    from { transform: scale(1.07); }
    to   { transform: scale(1); }
}
.tech-stagger-1 {
    animation: techSlideIn 0.75s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.tech-bg-zoom {
    animation: techBgZoom 1.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
<script>
(function () {
    // 1. Technology Filter & Live Search
    const filterBtns = document.querySelectorAll('[data-tech-filter]');
    const techCards  = document.querySelectorAll('[data-tech-card]');
    const searchInp  = document.getElementById('tech-search-input');
    const emptyState = document.getElementById('tech-empty-state');
    const resetBtn   = document.getElementById('tech-reset-btn');

    let currentCat = 'all';
    let currentQ   = '';

    const onCls  = 'tech-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer bg-primary text-white shadow-sm';
    const offCls = 'tech-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer bg-white text-ink-muted border border-border hover:border-primary/40 hover:text-primary';

    function runFilter() {
        let visibleCount = 0;
        techCards.forEach(function (card) {
            const cardCat = card.getAttribute('data-category');
            const cardBlob = card.getAttribute('data-search') || '';

            const catMatch = (currentCat === 'all' || cardCat === currentCat);
            const qMatch   = (!currentQ || cardBlob.indexOf(currentQ) !== -1);

            if (catMatch && qMatch) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (emptyState) {
            emptyState.classList.toggle('hidden', visibleCount > 0);
        }
    }

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            currentCat = btn.getAttribute('data-tech-filter');
            filterBtns.forEach(function (b) {
                b.className = (b === btn) ? onCls : offCls;
            });
            runFilter();
        });
    });

    if (searchInp) {
        searchInp.addEventListener('input', function () {
            currentQ = searchInp.value.toLowerCase().trim();
            runFilter();
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentCat = 'all';
            currentQ   = '';
            if (searchInp) searchInp.value = '';
            filterBtns.forEach(function (b) {
                b.className = (b.getAttribute('data-tech-filter') === 'all') ? onCls : offCls;
            });
            runFilter();
        });
    }

    // 3. Interactive Tech Spec Modal
    const modal        = document.getElementById('tech-modal');
    const modalBackdrop= document.getElementById('tech-modal-backdrop');
    const modalCloseBtn= document.getElementById('modal-close-btn');
    const modalDoneBtn = document.getElementById('modal-done-btn');
    const specBtns     = document.querySelectorAll('.tech-spec-btn');

    const mImg         = document.getElementById('modal-image');
    const mTitle       = document.getElementById('modal-title');
    const mCategory    = document.getElementById('modal-category');
    const mVersion     = document.getElementById('modal-version');
    const mRole        = document.getElementById('modal-role');
    const mDesc        = document.getElementById('modal-desc');
    const mUsecase     = document.getElementById('modal-usecase');
    const mMetric      = document.getElementById('modal-metric');
    const mTags        = document.getElementById('modal-tags');
    const mDocs        = document.getElementById('modal-docs-link');

    function openModal(btn) {
        if (!modal) return;
        if (mImg) mImg.src = btn.getAttribute('data-spec-image');
        if (mTitle) mTitle.textContent = btn.getAttribute('data-spec-name');
        if (mCategory) mCategory.textContent = btn.getAttribute('data-spec-category');
        if (mVersion) mVersion.textContent = btn.getAttribute('data-spec-version');
        if (mRole) mRole.textContent = btn.getAttribute('data-spec-role');
        if (mDesc) mDesc.textContent = btn.getAttribute('data-spec-desc');
        if (mUsecase) mUsecase.textContent = btn.getAttribute('data-spec-usecase');
        if (mMetric) mMetric.textContent = btn.getAttribute('data-spec-metric');

        if (mTags) {
            mTags.innerHTML = '';
            const rawTags = btn.getAttribute('data-spec-tags');
            if (rawTags) {
                rawTags.split(',').map(function (t) { return t.trim(); }).filter(Boolean).forEach(function (t) {
                    const span = document.createElement('span');
                    span.className = 'text-[10px] font-bold bg-slate-100 text-slate-700 px-2.5 py-1 rounded-md border border-slate-200';
                    span.textContent = t;
                    mTags.appendChild(span);
                });
            }
        }

        const docsUrl = btn.getAttribute('data-spec-docs');
        if (mDocs) {
            if (docsUrl) {
                mDocs.href = docsUrl;
                mDocs.style.display = 'inline-flex';
            } else {
                mDocs.style.display = 'none';
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

    specBtns.forEach(function (b) {
        b.addEventListener('click', function () {
            openModal(b);
        });
    });

    if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeModal);
    if (modalDoneBtn)  modalDoneBtn.addEventListener('click', closeModal);
    if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
})();
</script>
@endpush
