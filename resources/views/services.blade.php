@extends('layouts.app')

@section('title', 'Layanan — VizzioCraft')
@section('meta_description', 'Temukan layanan digital terpadu VizzioCraft: Software Development, LMS, Web Design, Hosting, IoT, IT Maintenance, SEO, dan lebih banyak lagi.')

@section('content')

{{-- Hero Section --}}
<section class="relative w-full py-16 sm:py-24 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] overflow-hidden">
    <x-hero-blob prefix="servicesHero" />

    <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-center w-full flex flex-col items-center justify-center">

        <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1.5 text-xs font-bold text-white border border-white/20 mb-5 backdrop-blur-sm">
            <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
            <span data-lang-id>LAYANAN KAMI</span>
            <span data-lang-en class="hidden">OUR SERVICES</span>
        </div>
        
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-5 leading-tight max-w-4xl">
            <span data-lang-id>Solusi Digital <span class="text-sky-300">Terpadu</span> untuk Bisnis Anda</span>
            <span data-lang-en class="hidden">Integrated <span class="text-sky-300">Digital Solutions</span> for Your Business</span>
        </h1>

        <p class="text-sm sm:text-base lg:text-lg text-blue-100 leading-relaxed max-w-3xl mx-auto mb-8 font-normal">
            <span data-lang-id>Dari pengembangan software hingga infrastruktur IT — kami menyediakan ekosistem layanan teknologi lengkap yang dirancang untuk mendorong pertumbuhan bisnis Anda.</span>
            <span data-lang-en class="hidden">From software development to IT infrastructure — we provide a complete tech ecosystem designed to drive your business growth.</span>
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="/contact" class="inline-flex items-center gap-2 rounded-xl bg-white text-primary font-bold text-sm px-6 py-3.5 hover:bg-blue-50 hover:scale-[1.02] hover:shadow-[0_12px_24px_rgba(255,255,255,0.2)] transition-all duration-300">
                <span data-lang-id>Konsultasi Gratis</span>
                <span data-lang-en class="hidden">Free Consultation</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            <a href="#all-services" class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 text-white font-semibold text-sm px-6 py-3.5 hover:bg-white/20 hover:border-white/50 transition-all duration-300">
                <span data-lang-id>Lihat Semua Layanan</span>
                <span data-lang-en class="hidden">Explore All Services</span>
            </a>
        </div>
    </div>
</section>

{{-- Stats Bar --}}
<div class="bg-white border-b border-slate-100 shadow-sm relative z-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
            @php $stats = [
                ['value' => '9+',   'id' => 'Layanan Digital', 'en' => 'Digital Services'],
                ['value' => '50+',  'id' => 'Proyek Selesai',  'en' => 'Completed Projects'],
                ['value' => '100%', 'id' => 'Kepuasan Klien',  'en' => 'Client Satisfaction'],
                ['value' => '24/7', 'id' => 'Dukungan IT',     'en' => 'IT Support'],
            ]; @endphp
            @foreach($stats as $stat)
            <div>
                <div class="text-2xl sm:text-3xl font-extrabold text-primary">{{ $stat['value'] }}</div>
                <div class="text-xs sm:text-sm text-ink-muted mt-0.5 font-medium">
                    <span data-lang-id>{{ $stat['id'] }}</span>
                    <span data-lang-en class="hidden">{{ $stat['en'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- All Services Grid (Theme Consistent & Estimasi Harga) --}}
<section id="all-services" class="bg-[#F8FAFC] py-20 relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-14">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-3">
                <span data-lang-id>KATALOG LAYANAN & BIAYA</span>
                <span data-lang-en class="hidden">SERVICES & ESTIMATES</span>
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-ink mb-3">
                <span data-lang-id>Layanan & Estimasi Harga</span>
                <span data-lang-en class="hidden">Services & Price Estimates</span>
            </h2>
            <p class="text-base text-ink-muted max-w-xl mx-auto leading-relaxed">
                <span data-lang-id>Transparansi estimasi biaya terbaik yang fleksibel sesuai skala proyek dan kebutuhan bisnis Anda.</span>
                <span data-lang-en class="hidden">Transparent and flexible price estimates tailored to your project scope and business needs.</span>
            </p>
        </div>

        @php
        $services = [
            [
                'title_id' => 'Apps & Software Development',
                'title_en' => 'Apps & Software Development',
                'price_id' => 'Mulai Rp 15.000.000',
                'price_en' => 'From $1,000',
                'desc_id'  => 'Pengembangan aplikasi custom web & mobile berbasis arsitektur modern. Scalable, aman, dan siap tumbuh bersama bisnis Anda.',
                'desc_en'  => 'Custom web & mobile app development built on modern architecture. Scalable, secure, and ready to grow with your business.',
                'icon'     => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'badge_id' => 'Populer',
                'badge_en' => 'Popular',
                'features' => [
                    ['id' => 'Web App & API Integration', 'en' => 'Web App & API Integration'],
                    ['id' => 'Mobile App (Android / iOS)', 'en' => 'Mobile App (Android / iOS)'],
                    ['id' => 'Custom ERP / CRM System', 'en' => 'Custom ERP / CRM System'],
                    ['id' => 'Sistem Point of Sale (POS)', 'en' => 'POS System'],
                ]
            ],
            [
                'title_id' => 'LMS Development',
                'title_en' => 'LMS Development',
                'price_id' => 'Mulai Rp 12.000.000',
                'price_en' => 'From $800',
                'desc_id'  => 'Platform Learning Management System interaktif untuk korporasi & lembaga pendidikan. Lengkap dengan kuis, sertifikat, dan progress tracking.',
                'desc_en'  => 'Interactive Learning Management System for corporations & schools. Complete with quizzes, certificates, and progress tracking.',
                'icon'     => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z',
                'badge_id' => null,
                'badge_en' => null,
                'features' => [
                    ['id' => 'Multi-tenant LMS System', 'en' => 'Multi-tenant LMS System'],
                    ['id' => 'Video Streaming & Content Host', 'en' => 'Video Streaming & Content Host'],
                    ['id' => 'Kuis & Sertifikat Otomatis', 'en' => 'Automated Quizzes & Certificates'],
                    ['id' => 'Laporan Progress & Analytics', 'en' => 'Progress Reports & Analytics'],
                ]
            ],
            [
                'title_id' => 'Domain',
                'title_en' => 'Domain Registration',
                'price_id' => 'Mulai Rp 150.000 / thn',
                'price_en' => 'From $10 / yr',
                'desc_id'  => 'Pendaftaran & konfigurasi nama domain bisnis tepercaya dengan harga terbaik dan konsultasi nama domain yang profesional.',
                'desc_en'  => 'Registration & configuration of trusted business domain names with best pricing and professional consultation.',
                'icon'     => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                'badge_id' => null,
                'badge_en' => null,
                'features' => [
                    ['id' => 'Domain .com, .id, .co.id', 'en' => '.com, .id, .co.id Domains'],
                    ['id' => 'Konsultasi Nama Brand', 'en' => 'Brand Name Consultation'],
                    ['id' => 'Transfer & Perpanjangan Domain', 'en' => 'Domain Transfer & Renewal'],
                    ['id' => 'Manajemen DNS & Privacy', 'en' => 'DNS & Privacy Management'],
                ]
            ],
            [
                'title_id' => 'Web Design',
                'title_en' => 'Web Design',
                'price_id' => 'Mulai Rp 3.500.000',
                'price_en' => 'From $250',
                'desc_id'  => 'Desain UI/UX website modern berkelas dengan estetika visual tinggi. Responsive di semua perangkat dan dioptimalkan untuk konversi pengguna.',
                'desc_en'  => 'Modern high-aesthetic UI/UX website design. Responsive across all devices and optimized for conversion.',
                'icon'     => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z',
                'badge_id' => 'Populer',
                'badge_en' => 'Popular',
                'features' => [
                    ['id' => 'Company Profile Website', 'en' => 'Company Profile Website'],
                    ['id' => 'Landing Page Konversi Tinggi', 'en' => 'High-Conversion Landing Page'],
                    ['id' => 'Toko Online (E-Commerce)', 'en' => 'E-Commerce Store'],
                    ['id' => 'Redesign Website Modern', 'en' => 'Modern Website Redesign'],
                ]
            ],
            [
                'title_id' => 'Hosting',
                'title_en' => 'Hosting Services',
                'price_id' => 'Mulai Rp 500.000 / thn',
                'price_en' => 'From $35 / yr',
                'desc_id'  => 'Infrastruktur cloud hosting & server berkecepatan tinggi dengan uptime 99.9%. Managed hosting dengan monitoring dan backup otomatis.',
                'desc_en'  => 'High-speed cloud hosting & server infrastructure with 99.9% uptime. Managed hosting with monitoring and auto-backups.',
                'icon'     => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                'badge_id' => null,
                'badge_en' => null,
                'features' => [
                    ['id' => 'Shared Hosting & VPS', 'en' => 'Shared Hosting & VPS'],
                    ['id' => 'Sertifikat SSL Gratis', 'en' => 'Free SSL Certificate'],
                    ['id' => 'Backup Otomatis Harian', 'en' => 'Daily Automated Backups'],
                    ['id' => 'Panel Control cPanel / Plesk', 'en' => 'cPanel / Plesk Control Panel'],
                ]
            ],
            [
                'title_id' => 'IoT Solutions',
                'title_en' => 'IoT Solutions',
                'price_id' => 'Mulai Rp 20.000.000',
                'price_en' => 'From $1,300',
                'desc_id'  => 'Integrasi sistem sensor pintar & perangkat otomatisasi berbasis IoT. Monitoring real-time dan kontrol perangkat untuk industri & smart building.',
                'desc_en'  => 'Integration of smart sensor systems & IoT automation. Real-time monitoring & device control for industry and smart buildings.',
                'icon'     => 'M9 3v2m6-2v2M9 19v2m6-2v2M3 9h2m-2 6h2m14-6h2m-2 6h2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
                'badge_id' => null,
                'badge_en' => null,
                'features' => [
                    ['id' => 'Integrasi Sensor & Hardware', 'en' => 'Sensor & Hardware Integration'],
                    ['id' => 'Dashboard Monitoring Real-time', 'en' => 'Real-time Monitoring Dashboard'],
                    ['id' => 'Protokol MQTT & HTTP Secure', 'en' => 'MQTT & HTTP Secure Protocols'],
                    ['id' => 'Sistem Alert & Automation', 'en' => 'Alert & Automation System'],
                ]
            ],
            [
                'title_id' => 'IT Maintenance',
                'title_en' => 'IT Maintenance',
                'price_id' => 'Mulai Rp 2.500.000 / bln',
                'price_en' => 'From $170 / mo',
                'desc_id'  => 'Pemeliharaan sistem, monitoring server, dan audit keamanan 24/7. Tim teknis siap menangani masalah IT Anda secara cepat & profesional.',
                'desc_en'  => 'System maintenance, server monitoring, and 24/7 security audits. Our technical team is ready to resolve IT issues fast.',
                'icon'     => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'badge_id' => null,
                'badge_en' => null,
                'features' => [
                    ['id' => 'Server & System Monitoring', 'en' => 'Server & System Monitoring'],
                    ['id' => 'Audit Keamanan Cyber', 'en' => 'Cyber Security Audit'],
                    ['id' => 'Dukungan Troubleshooting 24/7', 'en' => '24/7 Troubleshooting Support'],
                    ['id' => 'Perjanjian SLA Terjamin', 'en' => 'Guaranteed SLA Agreement'],
                ]
            ],
            [
                'title_id' => 'Digital Consulting',
                'title_en' => 'Digital Consulting',
                'price_id' => 'Mulai Rp 5.000.000',
                'price_en' => 'From $330',
                'desc_id'  => 'Konsultasi strategi teknologi dan peta jalan transformasi digital yang tepat. Bantu Anda membuat keputusan teknologi yang optimal.',
                'desc_en'  => 'Tech strategy consulting and digital transformation roadmaps. Helping you make optimal technology decisions.',
                'icon'     => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                'badge_id' => null,
                'badge_en' => null,
                'features' => [
                    ['id' => 'Peta Jalan Teknologi (Roadmap)', 'en' => 'Tech Roadmap Planning'],
                    ['id' => 'Rekomendasi Pemilihan Tech Stack', 'en' => 'Tech Stack Selection Advisory'],
                    ['id' => 'Strategi Digitalisasi Bisnis', 'en' => 'Business Digitalization Strategy'],
                    ['id' => 'Audit Infrastruktur IT', 'en' => 'IT Infrastructure Audit'],
                ]
            ],
            [
                'title_id' => 'SEO Services',
                'title_en' => 'SEO Services',
                'price_id' => 'Mulai Rp 3.000.000 / bln',
                'price_en' => 'From $200 / mo',
                'desc_id'  => 'Optimasi mesin pencari organik untuk meningkatkan peringkat Google & traffic website Anda. Strategi SEO berbasis data yang menghasilkan konversi nyata.',
                'desc_en'  => 'Organic search engine optimization to boost your Google ranking & traffic. Data-driven SEO strategies for real conversions.',
                'icon'     => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
                'badge_id' => null,
                'badge_en' => null,
                'features' => [
                    ['id' => 'On-page & Technical SEO', 'en' => 'On-page & Technical SEO'],
                    ['id' => 'Strategi Backlink Berkulitas', 'en' => 'Quality Backlink Strategy'],
                    ['id' => 'Riset Kata Kunci Terstruktur', 'en' => 'Structured Keyword Research'],
                    ['id' => 'Laporan Performa Analytics Bulanan', 'en' => 'Monthly Performance Reports'],
                ]
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $svc)
            <div class="group bg-white rounded-2xl border border-border/80 hover:border-primary/40 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 overflow-hidden flex flex-col justify-between">
                <div class="p-6 flex-1 flex flex-col">
                    {{-- Icon + Badge --}}
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $svc['icon'] }}" />
                            </svg>
                        </div>
                        @if($svc['badge_id'])
                        <span class="inline-flex items-center gap-1 rounded-full bg-primary/10 border border-primary/20 px-2.5 py-0.5 text-[10px] font-bold text-primary uppercase tracking-wide">
                            <span class="w-1 h-1 rounded-full bg-primary animate-pulse"></span>
                            <span data-lang-id>{{ $svc['badge_id'] }}</span>
                            <span data-lang-en class="hidden">{{ $svc['badge_en'] }}</span>
                        </span>
                        @endif
                    </div>

                    {{-- Title & Description --}}
                    <h3 class="text-base font-bold text-ink mb-2 group-hover:text-primary transition-colors duration-200">
                        <span data-lang-id>{{ $svc['title_id'] }}</span>
                        <span data-lang-en class="hidden">{{ $svc['title_en'] }}</span>
                    </h3>
                    <p class="text-sm text-ink-muted leading-relaxed mb-4 flex-1">
                        <span data-lang-id>{{ $svc['desc_id'] }}</span>
                        <span data-lang-en class="hidden">{{ $svc['desc_en'] }}</span>
                    </p>

                    {{-- Price Estimation Container --}}
                    <div class="rounded-xl bg-primary/5 border border-primary/15 p-3.5 mb-4">
                        <div class="text-[10px] font-semibold uppercase tracking-wider text-ink-muted mb-0.5">
                            <span data-lang-id>ESTIMASI BIAYA</span>
                            <span data-lang-en class="hidden">ESTIMATED PRICE</span>
                        </div>
                        <div class="text-base font-extrabold text-primary">
                            <span data-lang-id>{{ $svc['price_id'] }}</span>
                            <span data-lang-en class="hidden">{{ $svc['price_en'] }}</span>
                        </div>
                    </div>

                    {{-- Features List --}}
                    <ul class="space-y-1.5 mb-5">
                        @foreach($svc['features'] as $feat)
                        <li class="flex items-center gap-2 text-[12px] text-ink-muted">
                            <svg class="w-3.5 h-3.5 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span data-lang-id>{{ $feat['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $feat['en'] }}</span>
                        </li>
                        @endforeach
                    </ul>

                    {{-- Action Button --}}
                    <a href="/contact?service={{ urlencode($svc['title_id']) }}" class="inline-flex items-center justify-center gap-1.5 w-full rounded-xl border border-primary/20 bg-primary/5 text-primary font-semibold text-sm py-2.5 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200 group/btn">
                        <span data-lang-id>Konsultasi Sekarang</span>
                        <span data-lang-en class="hidden">Consult Now</span>
                        <svg class="w-3.5 h-3.5 group-hover/btn:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



{{-- Bottom CTA Section --}}
<x-about-cta
    eyebrowId="MULAI SEKARANG"
    eyebrowEn="GET STARTED"
    titleId="Siap Membangun Solusi Digital Anda?"
    titleEn="Ready to Build Your Digital Solution?"
    descId="Diskusikan kebutuhan Anda bersama tim ahli VizzioCraft. Konsultasi awal gratis dan tanpa komitmen."
    descEn="Discuss your needs with the VizzioCraft expert team. Free initial consultation with no commitment."
    primaryHref="/contact"
    primaryId="Konsultasi Gratis"
    primaryEn="Free Consultation"
    secondaryHref="https://wa.me/6283114592416"
    secondaryId="Chat via WhatsApp"
    secondaryEn="Chat on WhatsApp"
/>

@endsection

