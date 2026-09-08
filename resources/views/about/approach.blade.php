@extends('layouts.app')

@section('title', 'Pendekatan — Tentang VizzioCraft')
@section('meta_description', 'Pelajari metodologi dan alur kerja terstruktur VizzioCraft: dari tahap discovery, desain arsitektur, sprint agile development, hingga deployment dan dukungan berkelanjutan.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full min-h-[calc(100svh-4.25rem)] flex flex-col justify-center py-8 sm:py-12 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] overflow-hidden">
        <x-hero-blob prefix="approachHero" />

        <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-center my-auto w-full flex flex-col items-center justify-center">
            {{-- Category Pill --}}
            <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1.5 text-xs font-bold text-white border border-white/20 mb-4 sm:mb-5 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                <span data-lang-id>METODOLOGI & CARA KERJA • PENDEKATAN</span>
                <span data-lang-en class="hidden">METHODOLOGY & WORKFLOW • APPROACH</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-4 sm:mb-5 leading-tight max-w-4xl">
                <span data-lang-id>Pendekatan Terstruktur dari Konsep Hingga Skala Global</span>
                <span data-lang-en class="hidden">Structured Approach from Concept to Global Scale</span>
            </h1>

            <p class="text-sm sm:text-base lg:text-lg text-blue-100 leading-relaxed max-w-3xl mx-auto mb-8 sm:mb-10 font-normal">
                <span data-lang-id>Kami tidak hanya menulis kode, tetapi merancang solusi komprehensif. Setiap fase dikelola dengan disiplin agile, transparansi penuh, dan pengujian ketat.</span>
                <span data-lang-en class="hidden">We don't just write code; we design comprehensive solutions. Every phase is managed with agile discipline, full transparency, and rigorous testing.</span>
            </p>

            {{-- Sub-Navigation Tabs --}}
            <div class="inline-flex items-center p-1.5 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md gap-1 mb-8 sm:mb-10">
                <a href="/about/company" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-blue-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <span data-lang-id>Perusahaan</span>
                    <span data-lang-en class="hidden">Company</span>
                </a>
                <a href="/about/approach" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-white text-primary shadow-sm transition-all duration-200">
                    <span data-lang-id>Pendekatan</span>
                    <span data-lang-en class="hidden">Approach</span>
                </a>
                <a href="/about/team" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-blue-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <span data-lang-id>Tim Kami</span>
                    <span data-lang-en class="hidden">Our Team</span>
                </a>
            </div>

            {{-- 4 Phases Preview Badges --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-6 w-full max-w-4xl">
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-left flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-primary/20 text-white font-bold text-xs flex items-center justify-center shrink-0">01</span>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-white truncate">Discovery & Plan</div>
                        <div class="text-[10px] text-blue-100/80 truncate">Riset & Spesifikasi</div>
                    </div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-left flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-sky-500/20 text-white font-bold text-xs flex items-center justify-center shrink-0">02</span>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-white truncate">UI/UX Prototype</div>
                        <div class="text-[10px] text-blue-100/80 truncate">Desain & Arsitektur</div>
                    </div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-left flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-indigo-500/20 text-white font-bold text-xs flex items-center justify-center shrink-0">03</span>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-white truncate">Agile Sprint & QA</div>
                        <div class="text-[10px] text-blue-100/80 truncate">Clean Code & Test</div>
                    </div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-left flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-primary-deep/20 text-white font-bold text-xs flex items-center justify-center shrink-0">04</span>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-white truncate">Deploy & 24/7 SLA</div>
                        <div class="text-[10px] text-blue-100/80 truncate">Cloud & Monitoring</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4-Phase Delivery Framework --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    <span data-lang-id>ALUR KERJA KAMI</span>
                    <span data-lang-en class="hidden">OUR WORKFLOW</span>
                </span>
                <h2 class="text-3xl font-extrabold text-ink mb-4">
                    <span data-lang-id>4 Fase Eksekusi Proyek yang Teruji</span>
                    <span data-lang-en class="hidden">4 Battle-Tested Project Execution Phases</span>
                </h2>
                <p class="text-sm sm:text-base text-ink-muted leading-relaxed">
                    Kerangka kerja transparan untuk memastikan proyek selesai tepat waktu, tepat anggaran, dan memenuhi standar performa tinggi.
                </p>
            </div>

            <div class="space-y-8">
                {{-- Phase 1 --}}
                <div class="group relative overflow-hidden rounded-3xl border border-border bg-[#F8FAFC] p-8 sm:p-10 transition-all duration-300 hover:border-primary/40 hover:shadow-xl hover:bg-white flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-16 h-16 rounded-2xl bg-primary text-white flex items-center justify-center font-extrabold text-2xl shrink-0 shadow-md group-hover:scale-105 transition-transform">
                        01
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-primary">FASE PERTAMA</span>
                            <span class="text-xs text-ink-muted">• Discovery & Planning</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-ink mb-3">
                            <span data-lang-id>Riset Kebutuhan & Perencanaan Strategis</span>
                            <span data-lang-en class="hidden">Needs Discovery & Strategic Planning</span>
                        </h3>
                        <p class="text-sm sm:text-base text-ink-muted leading-relaxed mb-6 font-normal">
                            Kami memulai dengan mendengarkan visi bisnis Anda, menganalisis alur kerja pengguna, memetakan risiko teknis, dan menyusun *product backlog* yang jelas dengan timeline yang terukur.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-4 border-t border-border/60 text-xs font-medium text-ink">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                <span>Audit Masalah & Solusi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                <span>Spesifikasi Arsitektur</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                <span>Roadmap & Estimasi Biaya</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Phase 2 --}}
                <div class="group relative overflow-hidden rounded-3xl border border-border bg-[#F8FAFC] p-8 sm:p-10 transition-all duration-300 hover:border-primary/40 hover:shadow-xl hover:bg-white flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-16 h-16 rounded-2xl bg-sky-500 text-white flex items-center justify-center font-extrabold text-2xl shrink-0 shadow-md group-hover:scale-105 transition-transform">
                        02
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-sky-600">FASE KEDUA</span>
                            <span class="text-xs text-ink-muted">• UI/UX & Architecture</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-ink mb-3">
                            <span data-lang-id>Desain UI/UX & Pemodelan Sistem</span>
                            <span data-lang-en class="hidden">UI/UX Design & System Modeling</span>
                        </h3>
                        <p class="text-sm sm:text-base text-ink-muted leading-relaxed mb-6 font-normal">
                            Merancang antarmuka interaktif yang indah berbasis design token konsisten, menyusun skema basis data yang optimal, dan memvalidasi prototipe sebelum baris kode pertama ditulis.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-4 border-t border-border/60 text-xs font-medium text-ink">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                                <span>Interactive Prototype</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                                <span>Database Schema Design</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                                <span>Design System Tokens</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Phase 3 --}}
                <div class="group relative overflow-hidden rounded-3xl border border-border bg-[#F8FAFC] p-8 sm:p-10 transition-all duration-300 hover:border-primary/40 hover:shadow-xl hover:bg-white flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-16 h-16 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-extrabold text-2xl shrink-0 shadow-md group-hover:scale-105 transition-transform">
                        03
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-indigo-600">FASE KETIGA</span>
                            <span class="text-xs text-ink-muted">• Agile Development & QA</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-ink mb-3">
                            <span data-lang-id>Pengembangan Sprint Agile & Pengujian Ketat</span>
                            <span data-lang-en class="hidden">Agile Sprint Development & Rigorous Testing</span>
                        </h3>
                        <p class="text-sm sm:text-base text-ink-muted leading-relaxed mb-6 font-normal">
                            Implementasi fitur dalam siklus sprint 2 mingguan. Setiap kode melalui *peer code review*, automated unit testing, dan verifikasi keamanan sebelum masuk ke *staging environment*.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-4 border-t border-border/60 text-xs font-medium text-ink">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                                <span>Clean Code Standards</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                                <span>Automated Testing & QA</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                                <span>Bi-weekly Sprint Demos</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Phase 4 --}}
                <div class="group relative overflow-hidden rounded-3xl border border-border bg-[#F8FAFC] p-8 sm:p-10 transition-all duration-300 hover:border-primary/40 hover:shadow-xl hover:bg-white flex flex-col md:flex-row gap-8 items-start">
                    <div class="w-16 h-16 rounded-2xl bg-primary-deep text-white flex items-center justify-center font-extrabold text-2xl shrink-0 shadow-md group-hover:scale-105 transition-transform">
                        04
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-primary-deep">FASE KEEMPAT</span>
                            <span class="text-xs text-ink-muted">• Deployment & SLA Support</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-ink mb-3">
                            <span data-lang-id>Deployment Cloud, Skalabilitas, & Dukungan 24/7</span>
                            <span data-lang-en class="hidden">Cloud Deployment, Scaling, & 24/7 SLA Support</span>
                        </h3>
                        <p class="text-sm sm:text-base text-ink-muted leading-relaxed mb-6 font-normal">
                            Peluncuran mulus dengan arsitektur *zero-downtime*, konfigurasi SSL & CDN global, serta jaminan dukungan teknis purna-jual untuk memastikan sistem selalu stabil saat trafik melonjak.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-4 border-t border-border/60 text-xs font-medium text-ink">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-primary-deep"></span>
                                <span>Zero-Downtime Release</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-primary-deep"></span>
                                <span>24/7 Monitoring & Alerting</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-primary-deep"></span>
                                <span>Continuous Maintenance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Engineering Standards Section --}}
    <section class="py-20 bg-[#F8FAFC] border-t border-border/40">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-5">
                    <span class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-primary mb-2">
                        <span data-lang-id>STANDAR REKAYASA</span>
                        <span data-lang-en class="hidden">ENGINEERING STANDARDS</span>
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-ink mb-4">
                        <span data-lang-id>Kualitas yang Tidak Bisa Ditawar</span>
                        <span data-lang-en class="hidden">Non-Negotiable Quality</span>
                    </h2>
                    <p class="text-sm sm:text-base text-ink-muted leading-relaxed mb-6 font-normal">
                        Kami menerapkan prinsip rekayasa perangkat lunak modern untuk memastikan setiap baris kode mudah dirawat (*maintainable*), aman (*secure*), dan siap diperluas (*scalable*).
                    </p>
                    <a href="/#contact" class="inline-flex items-center gap-2 rounded-xl bg-primary px-6 py-3 text-xs sm:text-sm font-semibold text-white hover:bg-primary-dark transition-all duration-300">
                        <span>Diskusikan Proyek Anda</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-6 rounded-2xl bg-white border border-border shadow-sm">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Ultra-Fast Performance</h4>
                        <p class="text-xs text-ink-muted leading-relaxed">Optimasi aset, lazy loading, dan caching multi-layer untuk waktu muat halaman di bawah 1 detik.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white border border-border shadow-sm">
                        <div class="w-10 h-10 rounded-lg bg-sky-500/10 text-sky-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Security by Design</h4>
                        <p class="text-xs text-ink-muted leading-relaxed">Proteksi SQL injection, XSS defense, enkripsi data sensitif, dan kepatuhan standar keamanan data.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white border border-border shadow-sm">
                        <div class="w-10 h-10 rounded-lg bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Cloud Scalability</h4>
                        <p class="text-xs text-ink-muted leading-relaxed">Arsitektur microservices dan serverless yang siap menangani jutaan permintaan secara elastis.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white border border-border shadow-sm">
                        <div class="w-10 h-10 rounded-lg bg-blue-500/10 text-blue-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Test-Driven Quality</h4>
                        <p class="text-xs text-ink-muted leading-relaxed">Cakupan unit test dan end-to-end testing menyeluruh untuk mencegah terjadinya bug regresi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-about-cta
        titleId="Ingin Tahu Bagaimana Kami Menggarap Ide Anda?"
        titleEn="Curious How We Execute Your Ideas?"
        descId="Jadwalkan sesi konsultasi gratis 30 menit dengan konsultan teknologi kami untuk menganalisis kebutuhan sistem Anda."
        descEn="Schedule a free 30-minute consultation with our technology consultants to analyze your system needs."
        primaryId="Mulai Konsultasi Gratis"
        primaryEn="Start Free Consultation"
        secondaryHref="/about/team"
        secondaryId="Kenali Tim Ahli Kami"
        secondaryEn="Meet Our Team"
    />
@endsection
