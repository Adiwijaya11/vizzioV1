@extends('layouts.app')

@section('title', 'Partner & Klien | VizzioCraft')
@section('meta_description', 'Daftar mitra teknologi dan klien enterprise yang mempercayakan solusi perangkat lunak serta transformasi digital kepada tim VizzioCraft.')

@section('content')
    @php
        $fallbackPartners = [
            [
                'id'          => 1,
                'name'        => 'Bank Mandiri',
                'slug'        => 'bank-mandiri',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg',
                'type'        => 'client',
                'website_url' => 'https://www.bankmandiri.co.id',
                'order'       => 1,
            ],
            [
                'id'          => 2,
                'name'        => 'Telkom Indonesia',
                'slug'        => 'telkom-indonesia',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/id/c/c4/Telkom_Indonesia_2013.svg',
                'type'        => 'client',
                'website_url' => 'https://www.telkom.co.id',
                'order'       => 2,
            ],
            [
                'id'          => 3,
                'name'        => 'Bank Central Asia (BCA)',
                'slug'        => 'bank-central-asia',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg',
                'type'        => 'client',
                'website_url' => 'https://www.bca.co.id',
                'order'       => 3,
            ],
            [
                'id'          => 4,
                'name'        => 'PT Astra International',
                'slug'        => 'astra-international',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/b/b3/Astra_International_logo.svg',
                'type'        => 'client',
                'website_url' => 'https://www.astra.co.id',
                'order'       => 4,
            ],
            [
                'id'          => 5,
                'name'        => 'PT Pelabuhan Indonesia (Pelindo)',
                'slug'        => 'pelindo',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/4/4b/Logo_Pelindo.svg',
                'type'        => 'client',
                'website_url' => 'https://www.pelindo.co.id',
                'order'       => 5,
            ],
            [
                'id'          => 6,
                'name'        => 'Kimia Farma',
                'slug'        => 'kimia-farma',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/d/da/Logo_Kimia_Farma.svg',
                'type'        => 'client',
                'website_url' => 'https://www.kimiafarma.co.id',
                'order'       => 6,
            ],
            [
                'id'          => 7,
                'name'        => 'PT Kereta Api Indonesia (KAI)',
                'slug'        => 'kereta-api-indonesia',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/5/56/Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg',
                'type'        => 'client',
                'website_url' => 'https://www.kai.id',
                'order'       => 7,
            ],
            [
                'id'          => 8,
                'name'        => 'PT PLN (Persero)',
                'slug'        => 'pln-persero',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.svg',
                'type'        => 'client',
                'website_url' => 'https://web.pln.co.id',
                'order'       => 8,
            ],
            [
                'id'          => 9,
                'name'        => 'Amazon Web Services (AWS)',
                'slug'        => 'amazon-web-services',
                'logo'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original-wordmark.svg',
                'type'        => 'partner',
                'website_url' => 'https://aws.amazon.com',
                'order'       => 9,
            ],
            [
                'id'          => 10,
                'name'        => 'Google Cloud Platform',
                'slug'        => 'google-cloud-platform',
                'logo'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg',
                'type'        => 'partner',
                'website_url' => 'https://cloud.google.com',
                'order'       => 10,
            ],
            [
                'id'          => 11,
                'name'        => 'Cloudflare',
                'slug'        => 'cloudflare',
                'logo'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cloudflare/cloudflare-original.svg',
                'type'        => 'partner',
                'website_url' => 'https://www.cloudflare.com',
                'order'       => 11,
            ],
            [
                'id'          => 12,
                'name'        => 'Docker Inc',
                'slug'        => 'docker-inc',
                'logo'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg',
                'type'        => 'partner',
                'website_url' => 'https://www.docker.com',
                'order'       => 12,
            ],
        ];

        $partnerList = isset($partners) && $partners->count() > 0 ? $partners : collect($fallbackPartners);

        $partnerFilters = [
            'all'     => ['id' => 'Semua Perusahaan', 'en' => 'All Companies'],
            'client'  => ['id' => 'Klien Enterprise', 'en' => 'Enterprise Clients'],
            'partner' => ['id' => 'Mitra Teknologi', 'en' => 'Technology Partners'],
        ];
    @endphp

    {{-- ═══ CLEAN 50SVH IMAGE HERO (Bright Theme-Matched Blue Overlay) ═══ --}}
    <section class="relative w-full min-h-[50svh] flex items-center bg-primary overflow-hidden">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=85"
                alt="Partner & Klien VizzioCraft"
                class="ind-bg-zoom h-full w-full object-cover object-center"
            />
            <div class="absolute inset-0 bg-gradient-to-r from-primary-deep/90 via-primary/80 to-primary/45"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl w-full px-4 sm:px-6 lg:px-8 py-14">
            <div class="max-w-2xl ind-hero-head">
                <div class="text-xs font-bold tracking-widest text-sky-200 uppercase mb-3">
                    <span data-lang-id>PARTNER & KLIEN STRATEGIS</span>
                    <span data-lang-en class="hidden">STRATEGIC PARTNERS & CLIENTS</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.15] mb-4">
                    <span data-lang-id>Mitra dan Klien yang Bertumbuh Bersama VizzioCraft.</span>
                    <span data-lang-en class="hidden">Partners and Clients Growing Together with VizzioCraft.</span>
                </h1>

                <p class="text-sm sm:text-base text-blue-50/95 leading-relaxed">
                    <span data-lang-id>Perusahaan dan institusi terkemuka yang mempercayakan rekayasa sistem, portal enterprise, dan infrastruktur digital kepada kami.</span>
                    <span data-lang-en class="hidden">Leading enterprises and institutions that trust our team for system engineering, corporate portals, and digital infrastructure.</span>
                </p>
            </div>
        </div>
    </section>

    {{-- ═══ PARTNER & CLIENT GRID SECTION ═══ --}}
    <section class="py-16 sm:py-24 bg-[#F8FAFC] border-b border-border/50">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

            {{-- Toolbar: Filter Tabs & Live Search --}}
            <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                {{-- Type Filter Tabs --}}
                <div class="flex flex-wrap gap-2" role="tablist">
                    @foreach($partnerFilters as $pfKey => $pfLabel)
                        <button
                            type="button"
                            data-partner-filter="{{ $pfKey }}"
                            class="partner-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer {{ $pfKey === 'all' ? 'bg-primary text-white shadow-sm' : 'bg-white text-ink-muted border border-border hover:border-primary/40 hover:text-primary' }}"
                        >
                            <span data-lang-id>{{ $pfLabel['id'] }}</span>
                            <span data-lang-en class="hidden">{{ $pfLabel['en'] }}</span>
                        </button>
                    @endforeach
                </div>

                {{-- Live Search Input --}}
                <div class="w-full md:w-72">
                    <div class="relative">
                        <input
                            type="text"
                            id="partner-search-input"
                            placeholder="Cari nama perusahaan..."
                            class="w-full rounded-xl border border-border bg-white px-4 py-2.5 pl-10 text-xs sm:text-sm text-ink placeholder-slate-400 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                        />
                        <svg class="absolute left-3.5 top-3 h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Clean Grid: Logo & Company Name Only --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-6" id="partner-grid">
                @foreach($partnerList as $p)
                    @php
                        $pName = is_array($p) ? $p['name'] : $p->name;
                        $pLogo = is_array($p) ? $p['logo'] : $p->logo;
                        $pType = is_array($p) ? $p['type'] : $p->type;
                        $pUrl  = is_array($p) ? ($p['website_url'] ?? null) : $p->website_url;
                        $searchBlob = strtolower($pName . ' ' . $pType);
                    @endphp

                    <div
                        data-partner-card
                        data-type="{{ $pType }}"
                        data-search="{{ $searchBlob }}"
                        class="group rounded-2xl border border-border bg-white p-6 sm:p-7 flex flex-col items-center justify-between text-center hover:border-primary/50 hover:shadow-xl transition-all duration-300"
                    >
                        {{-- Logo Box --}}
                        <div class="h-20 sm:h-24 w-full flex items-center justify-center p-2 mb-3">
                            <img
                                src="{{ $pLogo }}"
                                alt="{{ $pName }}"
                                class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300 transform group-hover:scale-105"
                                onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.svg'"
                            />
                        </div>

                        {{-- Company Name --}}
                        <div class="w-full">
                            <h3 class="text-xs sm:text-sm font-extrabold text-ink group-hover:text-primary transition-colors leading-snug">
                                {{ $pName }}
                            </h3>

                            <div class="mt-2 flex items-center justify-center gap-2">
                                <span class="text-[9.5px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full {{ $pType === 'client' ? 'bg-blue-50 text-blue-700 border border-blue-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                    {{ $pType === 'client' ? 'Klien' : 'Partner' }}
                                </span>

                                @if($pUrl)
                                    <a
                                        href="{{ $pUrl }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        title="Kunjungi Website"
                                        class="text-slate-400 hover:text-primary transition-colors"
                                    >
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Empty Search Results Notice --}}
            <div id="partner-empty-state" class="hidden rounded-2xl border border-border bg-white p-12 text-center my-8">
                <h3 class="text-base font-bold text-ink mb-1">
                    <span data-lang-id>Perusahaan Tidak Ditemukan</span>
                    <span data-lang-en class="hidden">No Company Found</span>
                </h3>
                <p class="text-xs sm:text-sm text-ink-muted mb-4">
                    <span data-lang-id>Tidak ada partner atau klien yang sesuai dengan kata kunci pencarian Anda.</span>
                    <span data-lang-en class="hidden">No partners or clients matched your search keyword.</span>
                </p>
                <button
                    type="button"
                    id="partner-reset-btn"
                    class="rounded-xl bg-primary px-4 py-2 text-xs font-bold text-white hover:bg-primary-dark transition-colors cursor-pointer"
                >
                    <span data-lang-id>Tampilkan Semua Perusahaan</span>
                    <span data-lang-en class="hidden">Show All Companies</span>
                </button>
            </div>

        </div>
    </section>

    <x-about-cta />
@endsection

@push('scripts')
<style>
@keyframes indStageIn {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes indBgZoom {
    from { transform: scale(1.07); }
    to   { transform: scale(1); }
}
.ind-hero-head {
    animation: indStageIn 0.75s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.ind-bg-zoom {
    animation: indBgZoom 8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
<script>
(function () {
    const filterBtns = document.querySelectorAll('[data-partner-filter]');
    const cards      = document.querySelectorAll('[data-partner-card]');
    const searchInp  = document.getElementById('partner-search-input');
    const emptyState = document.getElementById('partner-empty-state');
    const resetBtn   = document.getElementById('partner-reset-btn');

    let currentType = 'all';
    let currentQ    = '';

    const onCls  = 'partner-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer bg-primary text-white shadow-sm';
    const offCls = 'partner-filter-btn rounded-xl px-4 py-2 text-xs font-bold transition-all duration-200 cursor-pointer bg-white text-ink-muted border border-border hover:border-primary/40 hover:text-primary';

    function filterPartners() {
        let visibleCount = 0;
        cards.forEach(function (card) {
            const cardType = card.getAttribute('data-type');
            const cardBlob = card.getAttribute('data-search') || '';

            const typeMatch = (currentType === 'all' || cardType === currentType);
            const qMatch    = (!currentQ || cardBlob.indexOf(currentQ) !== -1);

            if (typeMatch && qMatch) {
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
            currentType = btn.getAttribute('data-partner-filter');
            filterBtns.forEach(function (b) {
                b.className = (b === btn) ? onCls : offCls;
            });
            filterPartners();
        });
    });

    if (searchInp) {
        searchInp.addEventListener('input', function () {
            currentQ = searchInp.value.toLowerCase().trim();
            filterPartners();
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentType = 'all';
            currentQ    = '';
            if (searchInp) searchInp.value = '';
            filterBtns.forEach(function (b) {
                b.className = (b.getAttribute('data-partner-filter') === 'all') ? onCls : offCls;
            });
            filterPartners();
        });
    }
})();
</script>
@endpush
