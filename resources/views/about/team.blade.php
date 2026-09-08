@extends('layouts.app')

@section('title', 'Tim Kami — Tentang VizzioCraft')
@section('meta_description', 'Kenali tim di balik VizzioCraft: engineer, designer, dan digital consultant berdedikasi tinggi yang bekerja di satu meja untuk membangun solusi teknologi terbaik.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full min-h-[calc(100svh-4.25rem)] flex flex-col justify-center py-8 sm:py-12 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] overflow-hidden">
        <x-hero-blob prefix="teamHero" />

        <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-center my-auto w-full flex flex-col items-center justify-center">
            {{-- Category Pill --}}
            <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1.5 text-xs font-bold text-white border border-white/20 mb-4 sm:mb-5 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                <span data-lang-id>TALENTA & KULTUR • TIM KAMI</span>
                <span data-lang-en class="hidden">TALENT & CULTURE • OUR TEAM</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-4 sm:mb-5 leading-tight max-w-4xl">
                <span data-lang-id>Engineer, Designer, & Consultant di Satu Meja</span>
                <span data-lang-en class="hidden">Engineers, Designers, & Consultants at One Table</span>
            </h1>

            <p class="text-sm sm:text-base lg:text-lg text-blue-100 leading-relaxed max-w-3xl mx-auto mb-8 sm:mb-10 font-normal">
                <span data-lang-id>Kekuatan VizzioCraft terletak pada sinergi antar disiplin ilmu. Kami menggabungkan pemikiran analitis, estetika visual, dan keterampilan kode untuk mewujudkan produk digital yang istimewa.</span>
                <span data-lang-en class="hidden">The strength of VizzioCraft lies in multidisciplinary synergy. We combine analytical thinking, visual aesthetics, and code mastery to craft exceptional digital products.</span>
            </p>

            {{-- Sub-Navigation Tabs --}}
            <div class="inline-flex items-center p-1.5 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md gap-1 mb-8 sm:mb-10">
                <a href="/about/company" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-blue-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <span data-lang-id>Perusahaan</span>
                    <span data-lang-en class="hidden">Company</span>
                </a>
                <a href="/about/approach" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-blue-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <span data-lang-id>Pendekatan</span>
                    <span data-lang-en class="hidden">Approach</span>
                </a>
                <a href="/about/team" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-white text-primary shadow-sm transition-all duration-200">
                    <span data-lang-id>Tim Kami</span>
                    <span data-lang-en class="hidden">Our Team</span>
                </a>
            </div>

            {{-- 4 Pillars Preview Badges --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-6 w-full max-w-4xl">
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-left flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-primary/20 text-white font-bold text-xs flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </span>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-white truncate">Engineering</div>
                        <div class="text-[10px] text-blue-100/80 truncate">Web & Mobile Devs</div>
                    </div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-left flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-sky-500/20 text-white font-bold text-xs flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                    </span>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-white truncate">UI/UX Creative</div>
                        <div class="text-[10px] text-blue-100/80 truncate">Design & Prototype</div>
                    </div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-left flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-indigo-500/20 text-white font-bold text-xs flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </span>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-white truncate">Consulting</div>
                        <div class="text-[10px] text-blue-100/80 truncate">Strategy & Solution</div>
                    </div>
                </div>
                <div class="p-3 sm:p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-left flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-blue-500/20 text-white font-bold text-xs flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </span>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-white truncate">DevOps & SLA</div>
                        <div class="text-[10px] text-blue-100/80 truncate">24/7 Cloud Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Leadership & Core Team Showcase --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    <span data-lang-id>LEADERSHIP TEAM</span>
                    <span data-lang-en class="hidden">LEADERSHIP TEAM</span>
                </span>
                <h2 class="text-3xl font-extrabold text-ink mb-4">
                    <span data-lang-id>Para Penggerak di Balik VizzioCraft</span>
                    <span data-lang-en class="hidden">The Drivers Behind VizzioCraft</span>
                </h2>
                <p class="text-sm sm:text-base text-ink-muted leading-relaxed">
                    Dipimpin oleh para profesional berpengalaman yang berdedikasi menciptakan dampak positif melalui teknologi mutakhir.
                </p>
            </div>

            @php
                $teamMembers = [
                    [
                        'name' => 'Adrian Pratama',
                        'role' => ['id' => 'Chief Executive Officer & Co-Founder', 'en' => 'Chief Executive Officer & Co-Founder'],
                        'bio' => ['id' => 'Memimpin strategi pertumbuhan dan kemitraan perusahaan dengan pengalaman 8+ tahun di industri transformasi digital.', 'en' => 'Leading corporate growth and partnerships with 8+ years of experience in digital transformation.'],
                        'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                        'tag' => 'Strategy & Leadership',
                    ],
                    [
                        'name' => 'Reza Kurniawan',
                        'role' => ['id' => 'Chief Technology Officer', 'en' => 'Chief Technology Officer'],
                        'bio' => ['id' => 'Arsitek sistem cloud & backend berkinerja tinggi, mengawasi seluruh standar keamanan dan skalabilitas kode.', 'en' => 'Cloud & backend system architect overseeing code security standards and global scalability.'],
                        'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                        'tag' => 'Cloud Architecture',
                    ],
                    [
                        'name' => 'Sarah Wijaya',
                        'role' => ['id' => 'Head of Product Design & UI/UX', 'en' => 'Head of Product Design & UI/UX'],
                        'bio' => ['id' => 'Pakar human-centered design yang mendedikasikan karyanya untuk menghasilkan antarmuka elegan dan ramah pengguna.', 'en' => 'Human-centered design expert crafting elegant, accessible, and intuitive digital interfaces.'],
                        'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                        'tag' => 'Design Systems',
                    ],
                    [
                        'name' => 'Dimas Aditya',
                        'role' => ['id' => 'Principal Solutions Consultant', 'en' => 'Principal Solutions Consultant'],
                        'bio' => ['id' => 'Menghubungkan kebutuhan bisnis klien dengan implementasi teknologi yang terukur dan hemat biaya.', 'en' => 'Bridging complex client business goals with measurable and cost-efficient tech roadmaps.'],
                        'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
                        'tag' => 'Solutions Consulting',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($teamMembers as $m)
                <div class="group rounded-3xl border border-border bg-[#F8FAFC] overflow-hidden hover:bg-white hover:border-primary/40 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative w-full h-64 overflow-hidden">
                            <img src="{{ $m['image'] }}" alt="{{ $m['name'] }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-gradient-to-t from-ink/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 right-4">
                                <span class="px-2.5 py-1 rounded-full bg-white/90 backdrop-blur-md text-[10px] font-bold text-primary shadow-sm">
                                    {{ $m['tag'] }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-ink mb-1 group-hover:text-primary transition-colors">
                                {{ $m['name'] }}
                            </h3>
                            <div class="text-xs font-semibold text-primary mb-3">
                                <span data-lang-id>{{ $m['role']['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $m['role']['en'] }}</span>
                            </div>
                            <p class="text-xs text-ink-muted leading-relaxed font-normal">
                                <span data-lang-id>{{ $m['bio']['id'] }}</span>
                                <span data-lang-en class="hidden">{{ $m['bio']['en'] }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Specialized Divisions (4 Pillars) --}}
    <section class="py-20 bg-[#F8FAFC] border-t border-border/40">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                    <span data-lang-id>STRUKTUR KEAHLIAN</span>
                    <span data-lang-en class="hidden">SPECIALIZED DIVISIONS</span>
                </span>
                <h2 class="text-3xl font-extrabold text-ink mb-3">
                    <span data-lang-id>Departemen Spesialis yang Terintegrasi</span>
                    <span data-lang-en class="hidden">Integrated Specialist Departments</span>
                </h2>
                <p class="text-sm sm:text-base text-ink-muted leading-relaxed">
                    Setiap proyek didukung oleh tim lintas disiplin yang saling melengkapi untuk hasil yang maksimal.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 rounded-2xl bg-white border border-border shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Software Engineering</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">Fullstack developers, backend architects, dan mobile engineers yang menguasai ekosistem modern.</p>
                    </div>
                    <div class="text-[11px] font-semibold text-primary">Laravel • Vue • React • Flutter</div>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-border shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-sky-500/10 text-sky-600 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">UI/UX & Product Design</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">Perancang pengalaman pengguna yang memprioritaskan estetika, konversi, dan kemudahan aksesibilitas.</p>
                    </div>
                    <div class="text-[11px] font-semibold text-sky-600">Figma • Design System • Prototyping</div>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-border shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">Digital Consulting</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">Konsultan strategi transformasi digital yang menganalisis efisiensi proses bisnis dan roadmap teknologi.</p>
                    </div>
                    <div class="text-[11px] font-semibold text-indigo-600">Business Analysis • Tech Roadmap</div>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-border shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-ink mb-2">DevOps & 24/7 SLA</h4>
                        <p class="text-xs text-ink-muted leading-relaxed mb-4">Spesialis infrastruktur cloud, automated CI/CD, backup reguler, dan tanggap darurat teknis 24/7.</p>
                    </div>
                    <div class="text-[11px] font-semibold text-blue-600">Docker • AWS • Cloudflare • CI/CD</div>
                </div>
            </div>
        </div>
    </section>

    <x-about-cta
        titleId="Ingin Berkolaborasi Langsung dengan Tim Kami?"
        titleEn="Want to Collaborate Directly with Our Team?"
        descId="Mulai percakapan hari ini dan ceritakan tantangan digital bisnis Anda kepada tim kami."
        descEn="Start a conversation today and share your business digital challenges with our team."
        primaryId="Hubungi Tim Kami"
        primaryEn="Contact Our Team"
        secondaryHref="/about/company"
        secondaryId="Profil Perusahaan"
        secondaryEn="Company Profile"
    />
@endsection
