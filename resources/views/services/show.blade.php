@extends('layouts.app')

@section('title', $service->title . ' — Layanan VizzioCraft')
@section('meta_description', Str::limit($service->description, 160) ?? 'Pelajari lebih lanjut tentang layanan ' . $service->title . ' dari VizzioCraft.')

@section('content')

@php
    $isLms = ($service->slug === 'lms-development');
@endphp

{{-- Hero Section --}}
<section class="relative w-full py-14 sm:py-20 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] overflow-hidden text-white">
    <x-hero-blob prefix="serviceShowHero" />

    <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-xs font-medium text-blue-100/80 mb-6" aria-label="Breadcrumb">
            <a href="/" class="hover:text-white transition-colors">
                <span data-lang-id>Beranda</span>
                <span data-lang-en class="hidden">Home</span>
            </a>
            <svg class="h-3 w-3 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            <a href="/services" class="hover:text-white transition-colors">
                <span data-lang-id>Layanan</span>
                <span data-lang-en class="hidden">Services</span>
            </a>
            <svg class="h-3 w-3 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            <span class="text-white font-semibold truncate max-w-xs">{{ $service->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            {{-- Left: Title & Overview --}}
            <div class="lg:col-span-7">
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/15 backdrop-blur-sm border border-white/20 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-white">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-300 animate-pulse"></span>
                        {{ $service->category ?? 'Engineering' }}
                    </span>
                    @if(!empty($service->badge))
                    <span class="inline-flex items-center rounded-full bg-sky-400/20 border border-sky-300/30 px-3 py-1 text-xs font-bold text-sky-200">
                        ⭐ {{ $service->badge }}
                    </span>
                    @endif
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                    @if($isLms)
                        <span data-lang-id>LMS Development: <span class="text-sky-300">Platform E-Learning</span> Kustom & Terintegrasi</span>
                        <span data-lang-en class="hidden">LMS Development: <span class="text-sky-300">Custom E-Learning</span> & Training Platform</span>
                    @else
                        {{ $service->title }}
                    @endif
                </h1>

                <p class="text-base sm:text-lg text-blue-100/90 leading-relaxed mb-8 max-w-2xl font-normal">
                    @if($isLms)
                        <span data-lang-id>Bangun ekosistem belajar daring modern yang interaktif, scalable, dan terintegrasi penuh untuk sekolah, kampus, lembaga pelatihan, hingga corporate training perusahaan Anda.</span>
                        <span data-lang-en class="hidden">Build an interactive, scalable, and fully integrated modern online learning ecosystem for schools, universities, training centers, and corporate upskilling.</span>
                    @else
                        {{ $service->description }}
                    @endif
                </p>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="/contact?service={{ urlencode($service->title) }}" class="inline-flex items-center gap-2 rounded-xl bg-white text-primary font-bold text-sm px-6 py-3.5 hover:bg-blue-50 hover:scale-[1.02] hover:shadow-[0_12px_24px_rgba(255,255,255,0.2)] transition-all duration-300">
                        <span data-lang-id>Konsultasi Proyek Gratis</span>
                        <span data-lang-en class="hidden">Free Project Consultation</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    @if($isLms)
                    <a href="#lms-modules" class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 text-white font-semibold text-sm px-6 py-3.5 hover:bg-white/20 transition-all duration-300">
                        <span data-lang-id>Lihat Fitur & Modul</span>
                        <span data-lang-en class="hidden">Explore Modules</span>
                    </a>
                    @else
                    <a href="#features" class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 text-white font-semibold text-sm px-6 py-3.5 hover:bg-white/20 transition-all duration-300">
                        <span data-lang-id>Lihat Fitur Layanan</span>
                        <span data-lang-en class="hidden">Explore Features</span>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Right: Price & Highlights Card --}}
            <div class="lg:col-span-5">
                <div class="rounded-3xl bg-white/10 border border-white/25 backdrop-blur-xl p-6 sm:p-8 shadow-2xl text-white relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-44 h-44 rounded-full bg-sky-400/20 blur-2xl pointer-events-none"></div>

                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center text-white shrink-0">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $service->icon_path }}" />
                            </svg>
                        </div>
                        <span class="text-xs uppercase tracking-widest font-bold text-sky-200">
                            <span data-lang-id>ESTIMASI INVESTASI</span>
                            <span data-lang-en class="hidden">INVESTMENT ESTIMATE</span>
                        </span>
                    </div>

                    <div class="mb-6">
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">
                            {{ $service->price }}
                        </div>
                        <div class="text-xs text-blue-100/70 mt-1">
                            <span data-lang-id>Fleksibel sesuai skala kebutuhan & custom fitur</span>
                            <span data-lang-en class="hidden">Flexible based on scope & customized features</span>
                        </div>
                    </div>

                    <div class="border-t border-white/15 pt-5 space-y-3">
                        <div class="text-xs font-bold uppercase tracking-wider text-sky-200 mb-2">
                            <span data-lang-id>Keunggulan Standar VizzioCraft</span>
                            <span data-lang-en class="hidden">Standard VizzioCraft Guarantees</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-blue-50">
                            <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>Full Source Code Ownership & No Vendor Lock-in</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-blue-50">
                            <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>Responsive Mobile, Tablet & Desktop UI</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-blue-50">
                            <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>Garansi Bug Free & Pemeliharaan Berkala</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-blue-50">
                            <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span>Deployment Cloud Server & Training Admin Tim</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-5 border-t border-white/15">
                        <a href="https://wa.me/6281234567890?text={{ urlencode('Halo VizzioCraft, saya ingin konsultasi mengenai layanan ' . $service->title) }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full rounded-xl bg-[#25D366] hover:bg-[#22c55e] text-white font-bold text-xs py-3 shadow-lg transition-all duration-200">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.625.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.29.173-1.412-.074-.124-.272-.198-.57-.347z"/><path d="M12.004 2c-5.514 0-9.99 4.475-9.99 9.988a9.947 9.947 0 001.333 4.987L2 22l5.233-1.237a9.98 9.98 0 004.767 1.214h.004c5.514 0 9.99-4.475 9.99-9.989A9.936 9.936 0 0012.004 2zm0 18.088a8.24 8.24 0 01-4.216-1.156l-.302-.18-3.128.825.836-3.052-.197-.313a8.196 8.196 0 01-1.267-4.376c0-4.535 3.694-8.229 8.238-8.229a8.19 8.19 0 015.83 2.416 8.181 8.181 0 012.41 5.826c0 4.535-3.694 8.239-8.204 8.239z"/></svg>
                            <span data-lang-id>Tanya Estimasi via WhatsApp</span>
                            <span data-lang-en class="hidden">Chat on WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($isLms)
    {{-- ============================================================ --}}
    {{-- LMS SPECIALIZED CONTENT: MENDALAM, DETAIL & INTERAKTIF        --}}
    {{-- ============================================================ --}}

    {{-- Section: Apa Itu LMS & Mengapa Memilih Kustom? --}}
    <section class="py-16 sm:py-20 bg-white border-b border-border/70">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    <span data-lang-id>PENGENALAN LMS KUSTOM</span>
                    <span data-lang-en class="hidden">CUSTOM LMS OVERVIEW</span>
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-ink mb-4">
                    <span data-lang-id>Apa Itu LMS dan Mengapa Bisnis & Kampus Anda Membutuhkannya?</span>
                    <span data-lang-en class="hidden">What is an LMS and Why Does Your Institution Need It?</span>
                </h2>
                <p class="text-sm sm:text-base text-ink-muted leading-relaxed">
                    <span data-lang-id>Learning Management System (LMS) adalah aplikasi terintegrasi untuk mengadministrasi, mendokumentasikan, melacak, melaporkan, dan menyampaikan program edukasi atau pelatihan digital secara mandiri dan terukur.</span>
                    <span data-lang-en class="hidden">A Learning Management System (LMS) is an integrated application for administering, documenting, tracking, reporting, and delivering digital educational courses or corporate training.</span>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 rounded-2xl border border-border bg-slate-50/50 hover:bg-white hover:border-primary/40 hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-primary flex items-center justify-center font-bold text-lg mb-4">
                        01
                    </div>
                    <h3 class="text-base font-bold text-ink mb-2">100% Hak Milik (No Recurring SaaS Fee)</h3>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Berbeda dengan platform sewa bulanan yang biayanya membengkak saat jumlah murid bertambah, LMS kustom VizzioCraft adalah aset milik Anda seutuhnya tanpa lisensi per user.
                    </p>
                </div>

                <div class="p-6 rounded-2xl border border-border bg-slate-50/50 hover:bg-white hover:border-primary/40 hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-lg mb-4">
                        02
                    </div>
                    <h3 class="text-base font-bold text-ink mb-2">Kustomisasi Branding & Alur Belajar</h3>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Tampilan, domain, skema penilaian, format sertifikat, hingga alur pendaftaran disesuaikan sepenuhnya dengan identitas merek dan kurikulum spesifik instansi Anda.
                    </p>
                </div>

                <div class="p-6 rounded-2xl border border-border bg-slate-50/50 hover:bg-white hover:border-primary/40 hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center font-bold text-lg mb-4">
                        03
                    </div>
                    <h3 class="text-base font-bold text-ink mb-2">Keamanan Data & Privasi Konten</h3>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Data siswa, bank soal ujian, dan video pembelajaran tersimpan aman di server privat Anda dengan proteksi streaming terenkripsi agar tidak mudah dibajak atau diunduh.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: 8 Modul Lengkap LMS --}}
    <section id="lms-modules" class="py-16 sm:py-24 bg-[#F8FAFC]">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    FITUR & MODUL UTAMA
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-ink mb-3">
                    Fitur Lengkap yang Kami Bangun di Dalam LMS Anda
                </h2>
                <p class="text-sm sm:text-base text-ink-muted leading-relaxed">
                    Setiap modul dirancang modular, berkinerja tinggi, dan ramah pengguna bagi admin, guru, hingga siswa di segala perangkat.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Modul 1 --}}
                <div class="bg-white p-6 rounded-2xl border border-border/80 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-blue-50 text-primary flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">1. Multi-Role RBAC Portal</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">
                            Hak akses terpisah dengan hak kontrol spesifik untuk Super Admin, Instruktur/Guru, Siswa/Peserta, hingga Pengawas/Wali.
                        </p>
                    </div>
                    <ul class="text-[11px] text-ink-muted space-y-1.5 pt-3 border-t border-slate-100">
                        <li class="flex items-center gap-1.5"><span class="text-primary font-bold">✓</span> Dashboard kustom per role</li>
                        <li class="flex items-center gap-1.5"><span class="text-primary font-bold">✓</span> Audit log aktivitas pengguna</li>
                    </ul>
                </div>

                {{-- Modul 2 --}}
                <div class="bg-white p-6 rounded-2xl border border-border/80 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">2. Course & Curriculum Builder</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">
                            Manajemen silabus bertingkat: Section, Modul, Video VOD, Materi PDF terlindungi, SCORM, hingga Drip Schedule.
                        </p>
                    </div>
                    <ul class="text-[11px] text-ink-muted space-y-1.5 pt-3 border-t border-slate-100">
                        <li class="flex items-center gap-1.5"><span class="text-indigo-600 font-bold">✓</span> Drag-and-drop builder</li>
                        <li class="flex items-center gap-1.5"><span class="text-indigo-600 font-bold">✓</span> Support audio, video, teks, doc</li>
                    </ul>
                </div>

                {{-- Modul 3 --}}
                <div class="bg-white p-6 rounded-2xl border border-border/80 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">3. Exam Engine & Auto-Grading</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">
                            Bank soal pilihan ganda, esai, timer ujian otomatis, acak urutan soal, anti-tab switch detection, dan koreksi instan.
                        </p>
                    </div>
                    <ul class="text-[11px] text-ink-muted space-y-1.5 pt-3 border-t border-slate-100">
                        <li class="flex items-center gap-1.5"><span class="text-emerald-600 font-bold">✓</span> Nilai otomatis & kunci jawaban</li>
                        <li class="flex items-center gap-1.5"><span class="text-emerald-600 font-bold">✓</span> Pembatasan batas remidi</li>
                    </ul>
                </div>

                {{-- Modul 4 --}}
                <div class="bg-white p-6 rounded-2xl border border-border/80 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">4. Live Webinar & Virtual Class</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">
                            Integrasi langsung Zoom SDK, Google Meet API, atau Jitsi Meet langsung di halaman portal kelas tanpa install aplikasi pihak ketiga.
                        </p>
                    </div>
                    <ul class="text-[11px] text-ink-muted space-y-1.5 pt-3 border-t border-slate-100">
                        <li class="flex items-center gap-1.5"><span class="text-rose-600 font-bold">✓</span> Presensi absensi live otomatis</li>
                        <li class="flex items-center gap-1.5"><span class="text-rose-600 font-bold">✓</span> Arsip rekaman sesi kelas</li>
                    </ul>
                </div>

                {{-- Modul 5 --}}
                <div class="bg-white p-6 rounded-2xl border border-border/80 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">5. Auto-Generate Certificate</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">
                            Generate otomatis sertifikat kelulusan dalam format PDF resolusi tinggi dengan nomor unik dan QR Code verifikasi publik.
                        </p>
                    </div>
                    <ul class="text-[11px] text-ink-muted space-y-1.5 pt-3 border-t border-slate-100">
                        <li class="flex items-center gap-1.5"><span class="text-amber-600 font-bold">✓</span> QR Code validasi keaslian</li>
                        <li class="flex items-center gap-1.5"><span class="text-amber-600 font-bold">✓</span> Download & share ke LinkedIn</li>
                    </ul>
                </div>

                {{-- Modul 6 --}}
                <div class="bg-white p-6 rounded-2xl border border-border/80 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">6. Gamifikasi & Komunitas</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">
                            Tingkatkan retensi belajar siswa dengan sistem Leaderboard, reward points, badges prestasi, dan forum diskusi materi interaktif.
                        </p>
                    </div>
                    <ul class="text-[11px] text-ink-muted space-y-1.5 pt-3 border-t border-slate-100">
                        <li class="flex items-center gap-1.5"><span class="text-purple-600 font-bold">✓</span> Forum Q&A per modul belajar</li>
                        <li class="flex items-center gap-1.5"><span class="text-purple-600 font-bold">✓</span> Visual progress completion</li>
                    </ul>
                </div>

                {{-- Modul 7 --}}
                <div class="bg-white p-6 rounded-2xl border border-border/80 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">7. Payment Gateway & E-Commerce</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">
                            Monetisasi materi kursus dengan QRIS, Virtual Account bank, e-Wallet, atau kartu kredit melalui Midtrans / Xendit.
                        </p>
                    </div>
                    <ul class="text-[11px] text-ink-muted space-y-1.5 pt-3 border-t border-slate-100">
                        <li class="flex items-center gap-1.5"><span class="text-teal-600 font-bold">✓</span> Sekali bayar / Subscription bulanan</li>
                        <li class="flex items-center gap-1.5"><span class="text-teal-600 font-bold">✓</span> Kupon promo & referral affiliate</li>
                    </ul>
                </div>

                {{-- Modul 8 --}}
                <div class="bg-white p-6 rounded-2xl border border-border/80 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">8. Realtime Learning Analytics</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">
                            Laporan komprehensif tentang durasi belajar, statistik kelulusan ujian, metrik penyelesaian tugas, dan ekspor ke Excel/PDF.
                        </p>
                    </div>
                    <ul class="text-[11px] text-ink-muted space-y-1.5 pt-3 border-t border-slate-100">
                        <li class="flex items-center gap-1.5"><span class="text-sky-600 font-bold">✓</span> Grafik aktivitas belajar harian</li>
                        <li class="flex items-center gap-1.5"><span class="text-sky-600 font-bold">✓</span> Laporan KPI HR / Akreditasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Kasus Penggunaan (Use Cases) --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    SOLUSI INDUSTRI
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-ink mb-3">
                    Dirancang Siap Pakai untuk Berbagai Sektor
                </h2>
                <p class="text-sm sm:text-base text-ink-muted">
                    LMS kami fleksibel dikustomisasi sesuai regulasi dan kebutuhan spesifik organisasi Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 rounded-2xl border border-slate-200 bg-slate-50">
                    <div class="text-2xl mb-3">🏫</div>
                    <h4 class="text-sm font-bold text-ink mb-1">Sekolah & Madrasah</h4>
                    <p class="text-xs text-ink-muted leading-relaxed">
                        Mendukung K-12 blended learning, ulangan harian online, pengumpulan tugas, dan rekap nilai otomatis sesuai rapor kurikulum.
                    </p>
                </div>
                <div class="p-6 rounded-2xl border border-slate-200 bg-slate-50">
                    <div class="text-2xl mb-3">🎓</div>
                    <h4 class="text-sm font-bold text-ink mb-1">Universitas & Kampus</h4>
                    <p class="text-xs text-ink-muted leading-relaxed">
                        Integrasi dengan SIAKAD (Sistem Akademik), perkuliahan daring multi-fakultas, dan repositori karya ilmiah terpusat.
                    </p>
                </div>
                <div class="p-6 rounded-2xl border border-slate-200 bg-slate-50">
                    <div class="text-2xl mb-3">🏢</div>
                    <h4 class="text-sm font-bold text-ink mb-1">Korporat & BUMN</h4>
                    <p class="text-xs text-ink-muted leading-relaxed">
                        Standarisasi onboarding karyawan baru, sertifikasi compliance, dan training upskilling berkala dengan dashboard HR terpadu.
                    </p>
                </div>
                <div class="p-6 rounded-2xl border border-slate-200 bg-slate-50">
                    <div class="text-2xl mb-3">💡</div>
                    <h4 class="text-sm font-bold text-ink mb-1">Bimbel & Edu-Creator</h4>
                    <p class="text-xs text-ink-muted leading-relaxed">
                        Monetisasi video kursus berbayar, manajemen webinar bertiket, mentoring privat, dan penjualan e-book materi edukasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Tech Stack & Security --}}
    <section class="py-16 bg-[#0F172A] text-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-500/20 border border-blue-400/30 px-3.5 py-1 text-xs font-semibold text-sky-300 mb-4">
                        TEKNOLOGI & ARSITEKTUR
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-4 leading-tight">
                        Infrastruktur Handal, Skalabel & Aman Tanpa Khawatir Crash
                    </h2>
                    <p class="text-sm text-slate-300 leading-relaxed mb-6">
                        Kami membangun LMS dengan standar teknologi enterprise modern agar sanggup menampung ribuan sesi ujian serentak tanpa lag atau downtime.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs">
                        <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700">
                            <div class="font-bold text-white mb-1">Backend & API</div>
                            <div class="text-slate-400">Laravel PHP 11 / Node.js Express</div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700">
                            <div class="font-bold text-white mb-1">Frontend UI</div>
                            <div class="text-slate-400">Tailwind CSS & Vue.js / React</div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700">
                            <div class="font-bold text-white mb-1">Database & Caching</div>
                            <div class="text-slate-400">PostgreSQL / MySQL + Redis Cache</div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700">
                            <div class="font-bold text-white mb-1">Cloud Video Streaming</div>
                            <div class="text-slate-400">AWS S3, Cloudflare Stream, Vimeo Pro</div>
                        </div>
                    </div>
                </div>
                <div class="rounded-2xl border border-slate-700 bg-slate-800/50 p-6 sm:p-8 backdrop-blur">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        Fitur Keamanan Terintegrasi
                    </h3>
                    <ul class="space-y-3 text-xs sm:text-sm text-slate-300">
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">✓</span>
                            <span><strong>Proteksi Video Terenkripsi:</strong> Mencegah tombol download langsung dan pembajakan materi via browser.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">✓</span>
                            <span><strong>Anti-Cheat Ujian:</strong> Deteksi perpindahan tab window, full-screen lock saat ujian berlangsung, dan batas waktu acak.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">✓</span>
                            <span><strong>Enkripsi Data SSL 256-Bit:</strong> Seluruh pertukaran data siswa, transaksi, dan password dienkripsi dengan standar bank.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400 font-bold shrink-0">✓</span>
                            <span><strong>Automated Database Backup:</strong> Pencadangan data berkala otomatis ke cloud storage terisolasi.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: FAQ Khusus LMS --}}
    <section class="py-16 sm:py-20 bg-white border-t border-border/60">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    PERTANYAAN UMUM
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-ink">
                    Pertanyaan Seputar Pembuatan LMS
                </h2>
            </div>

            <div class="space-y-4" id="lms-faq-accordion">
                <div class="rounded-2xl border border-border bg-slate-50/60 p-5">
                    <h4 class="text-sm sm:text-base font-bold text-ink mb-2">Berapa lama estimasi pengerjaan sebuah LMS kustom?</h4>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Waktu pengerjaan berkisar antara 3 hingga 6 minggu tergantung pada kompleksitas modul, jumlah integrasi (seperti payment gateway, Zoom SDK, atau SIAKAD), serta kesiapan materi kurikulum.
                    </p>
                </div>
                <div class="rounded-2xl border border-border bg-slate-50/60 p-5">
                    <h4 class="text-sm sm:text-base font-bold text-ink mb-2">Apakah source code menjadi hak milik penuh instansi kami?</h4>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Ya, 100%! Anda memiliki hak penuh atas seluruh source code dan database aplikasi. Tidak ada royalti berkala atau biaya lisensi per siswa.
                    </p>
                </div>
                <div class="rounded-2xl border border-border bg-slate-50/60 p-5">
                    <h4 class="text-sm sm:text-base font-bold text-ink mb-2">Apakah kami dibantu setup server dan pelatihan penggunaan admin?</h4>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Pasti. Paket pengembangan kami sudah mencakup setup server cloud (VPS/Dedicated), konfigurasi domain, SSL gratis, serta sesi pelatihan (training) online maupun offline bagi tim admin dan instruktur Anda.
                    </p>
                </div>
                <div class="rounded-2xl border border-border bg-slate-50/60 p-5">
                    <h4 class="text-sm sm:text-base font-bold text-ink mb-2">Apakah bisa integrasi dengan payment gateway lokal seperti QRIS dan Virtual Account?</h4>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Sangat bisa. Kami telah berpengalaman mengintegrasikan Midtrans, Xendit, dan DOKU untuk pembayaran otomatis via QRIS (BCA, GoPay, OVO, ShopeePay) serta Virtual Account seluruh bank besar di Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </section>

@else
    {{-- ============================================================ --}}
    {{-- GENERAL SERVICE DETAIL: DINAMIS & KOMPREHENSIF                --}}
    {{-- ============================================================ --}}

    {{-- Section: Fitur & Spesifikasi --}}
    <section id="features" class="py-16 sm:py-20 bg-white border-b border-border/70">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    FITUR UTAMA
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-ink mb-3">
                    Fitur & Ruang Lingkup Layanan
                </h2>
                <p class="text-sm text-ink-muted leading-relaxed">
                    Setiap paket kami bangun dengan arsitektur modern, performa teroptimasi, dan dukungan teknis berdedikasi.
                </p>
            </div>

            @if(!empty($service->features) && is_array($service->features))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($service->features as $idx => $feat)
                <div class="p-6 rounded-2xl border border-border bg-slate-50/60 hover:bg-white hover:border-primary/40 hover:shadow-lg transition-all duration-300">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center font-bold text-sm mb-4">
                        {{ sprintf('%02d', $idx + 1) }}
                    </div>
                    <h3 class="text-base font-bold text-ink mb-2">
                        {{ is_array($feat) ? ($feat['id'] ?? '') : $feat }}
                    </h3>
                    <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                        Solusi teruji yang diimplementasikan dengan standar industri terbaik untuk memastikan stabilitas dan skalabilitas jangka panjang.
                    </p>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12 text-ink-muted bg-slate-50 rounded-2xl border border-border">
                Detail fitur lengkap dapat disesuaikan dengan kebutuhan proyek Anda saat sesi konsultasi.
            </div>
            @endif
        </div>
    </section>

    {{-- Section: Alur Kerja 4 Tahap --}}
    <section class="py-16 sm:py-20 bg-[#F8FAFC]">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    METODOLOGI EKSEKUSI
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-ink mb-3">
                    Alur Pengerjaan Terstruktur & Transparan
                </h2>
                <p class="text-sm text-ink-muted">
                    Kami memastikan setiap tahap pengerjaan terukur dengan update berkala kepada Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-5 rounded-2xl bg-white border border-border shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 text-primary font-bold text-xs flex items-center justify-center mb-3">01</div>
                    <h4 class="text-sm font-bold text-ink mb-1">Discovery & Audit</h4>
                    <p class="text-xs text-ink-muted leading-relaxed">Analisis kebutuhan bisnis, spesifikasi teknis, dan timeline proyek.</p>
                </div>
                <div class="p-5 rounded-2xl bg-white border border-border shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-sky-100 text-sky-600 font-bold text-xs flex items-center justify-center mb-3">02</div>
                    <h4 class="text-sm font-bold text-ink mb-1">Arsitektur & UI/UX</h4>
                    <p class="text-xs text-ink-muted leading-relaxed">Perancangan wireframe interaktif dan desain arsitektur database.</p>
                </div>
                <div class="p-5 rounded-2xl bg-white border border-border shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 font-bold text-xs flex items-center justify-center mb-3">03</div>
                    <h4 class="text-sm font-bold text-ink mb-1">Sprint Development</h4>
                    <p class="text-xs text-ink-muted leading-relaxed">Coding berbasis agile, integrasi modul, dan pengujian QA berlapis.</p>
                </div>
                <div class="p-5 rounded-2xl bg-white border border-border shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 font-bold text-xs flex items-center justify-center mb-3">04</div>
                    <h4 class="text-sm font-bold text-ink mb-1">Deploy & Garansi</h4>
                    <p class="text-xs text-ink-muted leading-relaxed">Peluncuran ke server produksi, pelatihan user, dan garansi bug-free.</p>
                </div>
            </div>
        </div>
    </section>
@endif

{{-- Related Services Section --}}
@if(isset($relatedServices) && $relatedServices->count() > 0)
<section class="py-16 bg-white border-t border-border/70">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4">
            <div>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-2">
                    LAYANAN LAINNYA
                </span>
                <h3 class="text-2xl font-bold tracking-tight text-ink">
                    Jelajahi Solusi Teknologi Lainnya
                </h3>
            </div>
            <a href="/services" class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:text-primary-deep transition-colors">
                <span>Lihat Semua Layanan</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedServices as $rel)
            <div class="group bg-white rounded-2xl border border-border p-6 hover:border-primary/40 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $rel->icon_path }}" />
                        </svg>
                    </div>
                    <h4 class="text-base font-bold text-ink mb-1.5 group-hover:text-primary transition-colors">
                        <a href="{{ route('services.show', $rel->slug) }}">{{ $rel->title }}</a>
                    </h4>
                    <p class="text-xs text-ink-muted leading-relaxed line-clamp-2 mb-4">
                        {{ $rel->description }}
                    </p>
                </div>
                <div class="pt-4 border-t border-border/50 flex items-center justify-between">
                    <span class="text-xs font-extrabold text-primary">{{ $rel->price }}</span>
                    <a href="{{ route('services.show', $rel->slug) }}" class="inline-flex items-center gap-1 text-xs font-semibold text-primary hover:underline">
                        <span>Detail</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Bottom Call to Action --}}
<x-about-cta
    eyebrowId="KONSULTASI GRATIS"
    eyebrowEn="FREE CONSULTATION"
    titleId="Siap Memulai Proyek {{ $service->title }} Anda?"
    titleEn="Ready to Start Your {{ $service->title }} Project?"
    descId="Diskusikan arsitektur, fitur kustom, dan estimasi investasi terbaik bersama tim konsultan teknologi VizzioCraft sekarang."
    descEn="Discuss your architecture, custom features, and ideal investment estimate with VizzioCraft technology consultants today."
    primaryBtnId="Hubungi Kami Sekarang"
    primaryBtnEn="Contact Us Today"
    primaryBtnUrl="/contact?service={{ urlencode($service->title) }}"
/>

@endsection
