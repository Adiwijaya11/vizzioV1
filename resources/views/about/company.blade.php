@extends('layouts.app')

@section('title', 'Perusahaan — Tentang VizzioCraft')
@section('meta_description', 'Kenali lebih dekat VizzioCraft: cerita perjalanan, visi & misi, nilai inti, dan komitmen kami dalam menghadirkan solusi teknologi digital kelas dunia.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full min-h-[calc(100svh-4.25rem)] flex flex-col justify-center py-8 sm:py-12 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] overflow-hidden">
        <x-hero-blob prefix="companyHero" />

        <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-center my-auto w-full flex flex-col items-center justify-center">
            {{-- Category Pill --}}
            <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1.5 text-xs font-bold text-white border border-white/20 mb-4 sm:mb-5 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                <span data-lang-id>TENTANG KAMI • PERUSAHAAN</span>
                <span data-lang-en class="hidden">ABOUT US • COMPANY</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-4 sm:mb-5 leading-tight max-w-4xl">
                <span data-lang-id>Membangun Solusi Digital yang Berdampak Nyata & Terpercaya</span>
                <span data-lang-en class="hidden">Building Impactful & Trusted Digital Solutions</span>
            </h1>

            <p class="text-sm sm:text-base lg:text-lg text-blue-100 leading-relaxed max-w-3xl mx-auto mb-8 sm:mb-10 font-normal">
                <span data-lang-id>VizzioCraft adalah agensi teknologi dan solusi digital modern yang membantu perusahaan merancang, membangun, dan mengembangkan platform digital dengan standar rekayasa kelas dunia.</span>
                <span data-lang-en class="hidden">VizzioCraft is a modern tech agency and digital solutions partner helping businesses design, build, and scale digital platforms with world-class engineering standards.</span>
            </p>

            {{-- Sub-Navigation Tabs --}}
            <div class="inline-flex items-center p-1.5 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md gap-1 mb-8 sm:mb-10">
                <a href="/about/company" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-white text-primary shadow-sm transition-all duration-200">
                    <span data-lang-id>Perusahaan</span>
                    <span data-lang-en class="hidden">Company</span>
                </a>
                <a href="/about/approach" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-blue-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <span data-lang-id>Pendekatan</span>
                    <span data-lang-en class="hidden">Approach</span>
                </a>
                <a href="/about/team" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-blue-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <span data-lang-id>Tim Kami</span>
                    <span data-lang-en class="hidden">Our Team</span>
                </a>
            </div>

            {{-- Quick Stats Row --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-6 w-full max-w-3xl">
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20">
                    <div class="text-xl sm:text-2xl font-extrabold text-white">100+</div>
                    <div class="text-[11px] sm:text-xs text-blue-100/80 mt-0.5 font-medium">Proyek Sukses</div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20">
                    <div class="text-xl sm:text-2xl font-extrabold text-white">99.9%</div>
                    <div class="text-[11px] sm:text-xs text-blue-100/80 mt-0.5 font-medium">Uptime Guarantee</div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20">
                    <div class="text-xl sm:text-2xl font-extrabold text-white">5+ Thn</div>
                    <div class="text-[11px] sm:text-xs text-blue-100/80 mt-0.5 font-medium">Pengalaman Industri</div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20">
                    <div class="text-xl sm:text-2xl font-extrabold text-white">98%</div>
                    <div class="text-[11px] sm:text-xs text-blue-100/80 mt-0.5 font-medium">Kepuasan Klien</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Story & Origins Section (50/50 Equal Split Layout) --}}
    <section class="py-16 sm:py-24 bg-white border-b border-border/40">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                {{-- Left Image Showcase (50% Width / 6 Columns) --}}
                <div class="lg:col-span-6 relative">
                    {{-- Main Photo Card --}}
                    <div class="relative rounded-3xl overflow-hidden shadow-xl border border-border/80 bg-ink group">
                        <img
                            src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80"
                            alt="Tim VizzioCraft Bekerja Bersama"
                            class="w-full h-[380px] sm:h-[460px] object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>
                        
                        <div class="absolute bottom-6 left-6 right-6 text-white">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/20 backdrop-blur-md px-3 py-1 text-xs font-bold text-sky-300 border border-white/30 mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                                <span data-lang-id>Kolaborasi & Keahlian</span>
                                <span data-lang-en class="hidden">Collaboration & Expertise</span>
                            </span>
                            <h3 class="text-lg sm:text-xl font-bold leading-snug text-white">
                                <span data-lang-id>Fokus pada Detail & Kualitas Hasil Rekayasa Perangkat Lunak</span>
                                <span data-lang-en class="hidden">Focusing on Precision & Engineering Quality</span>
                            </h3>
                        </div>
                    </div>

                </div>

                {{-- Right Narrative Content (50% Width / 6 Columns - Human & Authentic Copy) --}}
                <div class="lg:col-span-6">
                    <span class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-bold text-primary border border-primary/20 mb-4">
                        <span data-lang-id>CERITA PERJALANAN KAMI</span>
                        <span data-lang-en class="hidden">OUR JOURNEY</span>
                    </span>

                    <h2 class="text-2xl sm:text-3xl font-extrabold text-ink mb-5 leading-tight tracking-tight">
                        <span data-lang-id>Bukan Sekadar Agensi, Kami Adalah Tim Engineer yang Peduli pada Kualitas Perangkat Lunak</span>
                        <span data-lang-en class="hidden">Not Just an Agency — We Are Engineers Caring Deeply About Software Quality</span>
                    </h2>

                    <div class="space-y-4 text-sm sm:text-base text-ink-muted leading-relaxed font-normal">
                        <p>
                            <span data-lang-id>VizzioCraft lahir dari pengalaman nyata di lapangan. Kami sering melihat perusahaan dan UMKM kesulitan karena aplikasi yang lambat, sulit dikembangkan, atau dibuat dengan template seadanya yang tidak sesuai dengan alur bisnis asli.</span>
                            <span data-lang-en class="hidden">VizzioCraft was born from real engineering experience. We repeatedly saw businesses struggle with slow apps, rigid setups, and generic templates that held back their actual growth.</span>
                        </p>
                        <p>
                            <span data-lang-id>Kami hadir untuk mengubah itu. Setiap sistem yang kami kerjakan — mulai dari platform LMS interaktif, aplikasi web custom, hingga arsitektur cloud — dirancang khusus dari nol dengan fondasi rekayasa yang kokoh, cepat, dan aman.</span>
                            <span data-lang-en class="hidden">We built VizzioCraft to change that status quo. Every system we create — from interactive LMS platforms, custom web apps, to cloud infrastructure — is engineered from scratch for speed, security, and scalability.</span>
                        </p>
                        <p>
                            <span data-lang-id>Bagi kami, tidak ada solusi pasaran. Kami duduk bersama Anda, memahami alur kerja tim Anda, dan mengeksekusi ide menjadi produk digital yang benar-benar memberikan nilai tambah bagi bisnis Anda.</span>
                            <span data-lang-en class="hidden">We believe there is no one-size-fits-all shortcut. We sit down with you, understand your workflows, and build digital products that drive tangible business value.</span>
                        </p>
                    </div>

                    {{-- 3 Authentic Value Pillars --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8 pt-6 border-t border-border/60">
                        <div class="space-y-1">
                            <div class="text-sm font-bold text-ink flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span data-lang-id>Custom Built</span>
                                <span data-lang-en class="hidden">Custom Built</span>
                            </div>
                            <p class="text-xs text-ink-muted leading-snug">
                                <span data-lang-id>Disesuaikan 100% dengan proses bisnis Anda.</span>
                                <span data-lang-en class="hidden">Tailored 100% to your unique business workflows.</span>
                            </p>
                        </div>

                        <div class="space-y-1">
                            <div class="text-sm font-bold text-ink flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                <span data-lang-id>Siap Scalable</span>
                                <span data-lang-en class="hidden">Scalable Design</span>
                            </div>
                            <p class="text-xs text-ink-muted leading-snug">
                                <span data-lang-id>Siap menangani pertumbuhan trafik & pengguna.</span>
                                <span data-lang-en class="hidden">Engineered to handle traffic growth effortlessly.</span>
                            </p>
                        </div>

                        <div class="space-y-1">
                            <div class="text-sm font-bold text-ink flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span data-lang-id>Tim Dampingan</span>
                                <span data-lang-en class="hidden">Direct Support</span>
                            </div>
                            <p class="text-xs text-ink-muted leading-snug">
                                <span data-lang-id>Didampingi langsung oleh developer berdedikasi.</span>
                                <span data-lang-en class="hidden">Directly supported by dedicated developers.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Vision & Mission Section with Solid Crisp Organic Blobs (NO BLUR) --}}
    <section class="relative py-20 sm:py-28 bg-[#F4F8FC] border-t border-b border-border/50 overflow-hidden">
        {{-- Solid Crisp Organic Blobs & Circles Background (No blur applied, clean solid vector shapes) --}}
        <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden" aria-hidden="true">
            {{-- Solid Blob 1: Top-Left Crisp Circle --}}
            <div class="absolute -top-24 -left-20 w-96 h-96 rounded-full bg-[#E0F2FE] opacity-70"></div>
            <div class="absolute -top-10 -left-6 w-64 h-64 rounded-full bg-[#BFDBFE] opacity-50"></div>

            {{-- Solid Blob 2: Bottom-Right Large Organic Circle Ring --}}
            <div class="absolute -bottom-28 -right-24 w-[32rem] h-[32rem] rounded-full border-[18px] border-[#2563EB]/10 bg-[#EFF6FF]"></div>
            <div class="absolute bottom-10 right-16 w-52 h-52 rounded-full bg-[#DBEAFE] opacity-60"></div>

            {{-- Solid Blob 3: Center Floating Solid Accent Circles --}}
            <div class="absolute top-1/2 left-8 -translate-y-1/2 w-16 h-16 rounded-full bg-[#2563EB]/15"></div>
            <div class="absolute top-1/4 right-12 w-24 h-24 rounded-full bg-[#0EA5E9]/12"></div>
            <div class="absolute bottom-1/4 left-1/3 w-10 h-10 rounded-full bg-[#3B82F6]/20"></div>

            {{-- Crisp Geometric Grid Dots --}}
            <div class="absolute top-12 right-1/3 opacity-20">
                <svg width="120" height="120" fill="none" viewBox="0 0 120 120">
                    <pattern id="solid-dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="3" cy="3" r="2.5" fill="#2563EB" />
                    </pattern>
                    <rect width="120" height="120" fill="url(#solid-dots)" />
                </svg>
            </div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            {{-- Section Heading --}}
            <div class="text-center max-w-3xl mx-auto mb-14 sm:mb-16">
                <span class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-4 py-1.5 text-xs font-bold text-primary border border-primary/20 mb-3.5">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    <span data-lang-id>VISI & MISI</span>
                    <span data-lang-en class="hidden">VISION & MISSION</span>
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-ink tracking-tight mb-4 leading-tight">
                    <span data-lang-id>Komitmen & Arah Langkah Kami</span>
                    <span data-lang-en class="hidden">Our Commitment & Direction</span>
                </h2>
                <p class="text-sm sm:text-base text-ink-muted leading-relaxed font-normal max-w-2xl mx-auto">
                    <span data-lang-id>Prinsip dan standar kerja tinggi yang menjadi pemandu utama VizzioCraft dalam menciptakan produk digital yang berdampak nyata.</span>
                    <span data-lang-en class="hidden">The core principles and high standards that guide VizzioCraft in crafting impactful digital solutions.</span>
                </p>
            </div>

            {{-- Vision & Mission Cards Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                
                {{-- Vision Card (Spotlight Card - 6 Columns) --}}
                <div class="lg:col-span-6 relative flex flex-col justify-between rounded-3xl border border-primary/30 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] p-8 sm:p-10 text-white shadow-xl overflow-hidden group">
                    {{-- Decorative Internal Solid Shapes inside card --}}
                    <div class="pointer-events-none absolute -top-16 -right-16 w-56 h-56 rounded-full bg-white/10" aria-hidden="true"></div>
                    <div class="pointer-events-none absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-sky-400/15" aria-hidden="true"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-between gap-4 mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-white/15 backdrop-blur-md text-white flex items-center justify-center border border-white/20 shadow-inner shrink-0">
                                <svg class="w-7 h-7 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/20 backdrop-blur-md px-3 py-1 text-xs font-extrabold text-white border border-white/30">
                                <span>01</span>
                                <span>•</span>
                                <span data-lang-id>Cita-Cita Utama</span>
                                <span data-lang-en class="hidden">Core Vision</span>
                            </span>
                        </div>

                        <h3 class="text-2xl sm:text-3xl font-extrabold text-white mb-4 leading-tight">
                            <span data-lang-id>Visi Perusahaan</span>
                            <span data-lang-en class="hidden">Our Vision</span>
                        </h3>

                        <p class="text-sm sm:text-base text-blue-100 leading-relaxed font-normal mb-8">
                            <span data-lang-id>Menjadi studio teknologi dan mitra transformasi digital terdepan di Asia Tenggara yang dikenal atas kualitas rekayasa sistem yang kokoh, desain antarmuka yang intuitif, serta dampak positif berkelanjutan bagi ekosistem bisnis klien.</span>
                            <span data-lang-en class="hidden">To be the leading tech studio and digital transformation partner in Southeast Asia renowned for resilient system engineering, intuitive design, and lasting business impact.</span>
                        </p>
                    </div>

                    {{-- Vision 3 Pillars Badge Row --}}
                    <div class="relative z-10 pt-6 border-t border-white/20 grid grid-cols-3 gap-2 text-center">
                        <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-sm border border-white/15">
                            <div class="text-xs font-bold text-white">Engineering</div>
                            <div class="text-[10px] text-blue-100/80">Kode Handal</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-sm border border-white/15">
                            <div class="text-xs font-bold text-white">Modern UI</div>
                            <div class="text-[10px] text-blue-100/80">Presisi Visual</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-sm border border-white/15">
                            <div class="text-xs font-bold text-white">Scalable</div>
                            <div class="text-[10px] text-blue-100/80">Siap Tumbuh</div>
                        </div>
                    </div>
                </div>

                {{-- Mission Card (Detail Cards - 6 Columns) --}}
                <div class="lg:col-span-6 flex flex-col justify-between rounded-3xl border border-border/80 bg-white p-8 sm:p-10 shadow-xl relative overflow-hidden">
                    {{-- Solid background accent --}}
                    <div class="pointer-events-none absolute -bottom-16 -right-16 w-52 h-52 rounded-full bg-primary/5" aria-hidden="true"></div>

                    <div>
                        <div class="flex items-center justify-between gap-4 mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-sky-500/10 text-sky-600 flex items-center justify-center border border-sky-500/20 shrink-0">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-muted px-3 py-1 text-xs font-extrabold text-ink-muted border border-border">
                                <span>02</span>
                                <span>•</span>
                                <span data-lang-id>Langkah Nyata</span>
                                <span data-lang-en class="hidden">Core Missions</span>
                            </span>
                        </div>

                        <h3 class="text-2xl sm:text-3xl font-extrabold text-ink mb-6 leading-tight">
                            <span data-lang-id>Misi Utama Kami</span>
                            <span data-lang-en class="hidden">Our Missions</span>
                        </h3>

                        {{-- Mission Items List --}}
                        <div class="space-y-4">
                            <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-[#F8FAFC] border border-border/60 hover:bg-white hover:border-primary/30 transition-all duration-200">
                                <div class="w-7 h-7 rounded-xl bg-primary text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 shadow-sm">
                                    1
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-ink mb-0.5">
                                        <span data-lang-id>Rekayasa Sistem Berstandar Tinggi</span>
                                        <span data-lang-en class="hidden">High-Standard System Engineering</span>
                                    </h4>
                                    <p class="text-xs text-ink-muted leading-relaxed">
                                        <span data-lang-id>Menyediakan produk digital berbasis kode bersih (*clean code*) dengan performa optimal dan keamanan tinggi.</span>
                                        <span data-lang-en class="hidden">Providing clean-code digital products with optimal performance and top-tier security.</span>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-[#F8FAFC] border border-border/60 hover:bg-white hover:border-primary/30 transition-all duration-200">
                                <div class="w-7 h-7 rounded-xl bg-primary text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 shadow-sm">
                                    2
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-ink mb-0.5">
                                        <span data-lang-id>Pendampingan Transparan & Akuntabel</span>
                                        <span data-lang-en class="hidden">Transparent & Accountable Partnership</span>
                                    </h4>
                                    <p class="text-xs text-ink-muted leading-relaxed">
                                        <span data-lang-id>Mendampingi setiap tahap transformasi digital klien dari perencanaan hingga pemeliharaan jangka panjang.</span>
                                        <span data-lang-en class="hidden">Guiding clients through every digital transformation stage with complete transparency.</span>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-[#F8FAFC] border border-border/60 hover:bg-white hover:border-primary/30 transition-all duration-200">
                                <div class="w-7 h-7 rounded-xl bg-primary text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5 shadow-sm">
                                    3
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-ink mb-0.5">
                                        <span data-lang-id>Inovasi Teknologi Tepat Guna</span>
                                        <span data-lang-en class="hidden">Pragmatic Tech Innovation</span>
                                    </h4>
                                    <p class="text-xs text-ink-muted leading-relaxed">
                                        <span data-lang-id>Mendorong adopsi teknologi mutakhir (AI, Cloud, LMS) yang berdampak nyata pada efisiensi operasional bisnis.</span>
                                        <span data-lang-en class="hidden">Accelerating modern tech adoption (AI, Cloud, LMS) for tangible operational impact.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Core Values (4 Grid Cards) --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    <span data-lang-id>NILAI-NILAI KAMI</span>
                    <span data-lang-en class="hidden">CORE VALUES</span>
                </span>
                <h2 class="text-3xl font-extrabold text-ink">
                    <span data-lang-id>Prinsip yang Memandu Setiap Karya Kami</span>
                    <span data-lang-en class="hidden">Principles that Guide Every Work</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Value 1 --}}
                <div class="group p-6 rounded-2xl border border-border bg-[#F8FAFC] hover:bg-white hover:border-primary/40 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Engineering Precision</h4>
                        <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                            Standar kode yang ketat, arsitektur teruji, serta pengujian menyeluruh di setiap iterasi rilis.
                        </p>
                    </div>
                </div>

                {{-- Value 2 --}}
                <div class="group p-6 rounded-2xl border border-border bg-[#F8FAFC] hover:bg-white hover:border-primary/40 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-sky-500/10 text-sky-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Modern Aesthetics</h4>
                        <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                            Antarmuka visual memukau, responsif, dan memberikan pengalaman pengguna yang intuitif.
                        </p>
                    </div>
                </div>

                {{-- Value 3 --}}
                <div class="group p-6 rounded-2xl border border-border bg-[#F8FAFC] hover:bg-white hover:border-primary/40 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Radical Transparency</h4>
                        <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                            Komunikasi terbuka, milestone terukur, dan tidak ada biaya tersembunyi selama kerja sama.
                        </p>
                    </div>
                </div>

                {{-- Value 4 --}}
                <div class="group p-6 rounded-2xl border border-border bg-[#F8FAFC] hover:bg-white hover:border-primary/40 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Long-term Growth</h4>
                        <p class="text-xs sm:text-sm text-ink-muted leading-relaxed">
                            Fokus pada kesuksesan jangka panjang produk dengan dukungan pemeliharaan berkelanjutan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-about-cta
        titleId="Siap Mengakselerasi Bisnis Anda Bersama VizzioCraft?"
        titleEn="Ready to Accelerate Your Business with VizzioCraft?"
        descId="Konsultasikan kebutuhan teknologi Anda dengan tim kami dan dapatkan solusi digital terukur yang sesuai dengan tujuan bisnis Anda."
        descEn="Consult your technology needs with our team and get scalable digital solutions tailored to your business goals."
    />
@endsection
