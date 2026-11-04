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
            @php 
                $servicesList = (isset($services) && count($services) > 0)
                    ? $services
                    : \App\Models\Service::where('status', 'active')->orderBy('id')->get();
                $stats = [
                    ['value' => ($servicesList->count() ?: 9) . '+', 'id' => 'Layanan Digital', 'en' => 'Digital Services'],
                    ['value' => '50+',  'id' => 'Proyek Selesai',  'en' => 'Completed Projects'],
                    ['value' => '100%', 'id' => 'Kepuasan Klien',  'en' => 'Client Satisfaction'],
                    ['value' => '24/7', 'id' => 'Dukungan IT',     'en' => 'IT Support'],
                ]; 
            @endphp
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($servicesList as $svc)
            <div class="group bg-white rounded-2xl border border-border/80 hover:border-primary/40 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 overflow-hidden flex flex-col justify-between">
                <div class="p-6 flex-1 flex flex-col">
                    {{-- Icon + Badge --}}
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $svc->icon_path ?? 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4' }}" />
                            </svg>
                        </div>
                        @if(!empty($svc->badge))
                        <span class="inline-flex items-center gap-1 rounded-full bg-primary/10 border border-primary/20 px-2.5 py-0.5 text-[10px] font-bold text-primary uppercase tracking-wide">
                            <span class="w-1 h-1 rounded-full bg-primary animate-pulse"></span>
                            <span>{{ $svc->badge }}</span>
                        </span>
                        @endif
                    </div>

                    {{-- Title & Description --}}
                    <h3 class="text-base font-bold text-ink mb-2 group-hover:text-primary transition-colors duration-200">
                        {{ $svc->title }}
                    </h3>
                    <p class="text-sm text-ink-muted leading-relaxed mb-4 flex-1">
                        {{ $svc->description }}
                    </p>

                    {{-- Price Estimation Container --}}
                    <div class="rounded-xl bg-primary/5 border border-primary/15 p-3.5 mb-4">
                        <div class="text-[10px] font-semibold uppercase tracking-wider text-ink-muted mb-0.5">
                            <span data-lang-id>ESTIMASI BIAYA</span>
                            <span data-lang-en class="hidden">ESTIMATED PRICE</span>
                        </div>
                        <div class="text-base font-extrabold text-primary">
                            <span>{{ $svc->price }}</span>
                        </div>
                    </div>

                    {{-- Features List --}}
                    @if(!empty($svc->features) && is_array($svc->features))
                    <ul class="space-y-1.5 mb-5">
                        @foreach($svc->features as $feat)
                        <li class="flex items-center gap-2 text-[12px] text-ink-muted">
                            <svg class="w-3.5 h-3.5 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ is_array($feat) ? ($feat['id'] ?? '') : $feat }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    {{-- Action Button --}}
                    <a href="/contact?service={{ urlencode($svc->title) }}" class="inline-flex items-center justify-center gap-1.5 w-full rounded-xl border border-primary/20 bg-primary/5 text-primary font-semibold text-sm py-2.5 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200 group/btn">
                        <span data-lang-id>Konsultasikan Sekarang</span>
                        <span data-lang-en class="hidden">Consult Now</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover/btn:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-border text-ink-muted">
                Belum ada katalog layanan digital yang aktif.
            </div>
            @endforelse
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

