@extends('layouts.admin.app')

@section('title', 'Analitik Pengunjung — VizzioCraft')
@section('page_title', 'Analitik Pengunjung')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex flex-wrap items-center gap-2.5 mb-1">
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">Analitik Pengunjung Situs Web</h1>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-semibold">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Live
                </span>
            </div>
            <p class="text-xs sm:text-sm text-slate-500">Statistik kunjungan, halaman populer, sumber trafik, dan riwayat akses pengunjung.</p>
        </div>
        <div class="shrink-0">
            <a href="{{ route('admin.analytics.traffic') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-blue-600 text-xs font-semibold border border-slate-200 shadow-xs transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                Laporan Funnel Bisnis &rarr;
            </a>
        </div>
    </div>

    {{-- 4 KPI Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Kunjungan Hari Ini</span>
                <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ number_format($visitorToday) }}</div>
            <div class="text-xs text-emerald-600 font-medium mt-1.5">{{ number_format($uniqueToday) }} pengunjung unik (IP)</div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">30 Hari Terakhir</span>
                <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ number_format($totalVisitsMonth) }}</div>
            <div class="text-xs text-slate-500 mt-1.5">{{ number_format($uniqueMonth) }} pengunjung unik bulan ini</div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Total Akumulatif</span>
                <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ number_format($totalVisitsAll) }}</div>
            <div class="text-xs text-slate-500 mt-1.5">{{ number_format($uniqueAll) }} IP terdata di sistem</div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Puncak Kunjungan</span>
                <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-blue-600 tabular-nums">{{ number_format($traffic14['peak']) }}</div>
            <div class="text-xs text-slate-500 mt-1.5">Tercatat pada {{ $traffic14['peakDay'] }}</div>
        </div>
    </div>

    {{-- Main Interactive Chart --}}
    <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-5">
            <div>
                <h2 class="text-base font-bold text-slate-900">Tren Kunjungan Website</h2>
                <p class="text-xs text-slate-500 mt-0.5">Kurva trafik harian berdasarkan catatan kunjungan website.</p>
            </div>

            <div class="bg-slate-100 p-1 rounded-xl inline-flex gap-1">
                <button id="range-btn-7" type="button" class="px-3 py-1.5 rounded-lg text-[11px] font-semibold text-slate-600 hover:text-slate-900 cursor-pointer transition">
                    7 Hari
                </button>
                <button id="range-btn-14" type="button" class="px-3 py-1.5 rounded-lg text-[11px] font-semibold bg-blue-600 text-white cursor-pointer transition">
                    14 Hari
                </button>
                <button id="range-btn-30" type="button" class="px-3 py-1.5 rounded-lg text-[11px] font-semibold text-slate-600 hover:text-slate-900 cursor-pointer transition">
                    30 Hari
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-5 px-4 py-3 rounded-xl bg-slate-50 border border-slate-100">
            <div>
                <div class="text-[10px] font-semibold text-slate-400 uppercase">Total Periode Ini</div>
                <div id="metric-total" class="text-base font-bold text-slate-900 tabular-nums">{{ number_format($traffic14['total']) }} Kunjungan</div>
            </div>
            <div>
                <div class="text-[10px] font-semibold text-slate-400 uppercase">Rata-rata / Hari</div>
                <div id="metric-avg" class="text-base font-bold text-blue-600 tabular-nums">{{ number_format($traffic14['avg']) }} Kunjungan</div>
            </div>
            <div>
                <div class="text-[10px] font-semibold text-slate-400 uppercase">Hari Tertinggi</div>
                <div id="metric-peak" class="text-base font-bold text-emerald-600 tabular-nums">{{ number_format($traffic14['peak']) }} ({{ $traffic14['peakDay'] }})</div>
            </div>
        </div>

        <div id="analytics-traffic-chart" class="w-full min-h-[300px]"></div>
    </div>

    {{-- Top Pages & Referrers --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

        {{-- Top Visited Pages --}}
        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-sm font-bold text-slate-900">Halaman Paling Sering Dikunjungi</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Distribusi kunjungan per halaman.</p>
                </div>
                <span class="text-[11px] font-semibold text-blue-700 bg-blue-50 border border-blue-100 px-2.5 py-1 rounded-lg">Top 6</span>
            </div>

            <div class="space-y-3.5">
                @forelse($topPages as $page)
                    @php $pct = round(($page->total_hits / $totalHitsAllPages) * 100, 1); @endphp
                    <div>
                        <div class="flex items-center justify-between text-xs mb-1.5">
                            <span class="font-mono font-semibold text-slate-800 bg-slate-100 px-2 py-0.5 rounded-md truncate max-w-[65%]">
                                {{ $page->url ?: '/' }}
                            </span>
                            <span class="font-semibold text-slate-700 tabular-nums">
                                {{ number_format($page->total_hits) }} <span class="text-slate-400 font-normal">({{ $pct }}%)</span>
                            </span>
                        </div>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-600 rounded-full" style="width: {{ max($pct, 3) }}%;"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 py-4 text-center">Belum ada log halaman tercatat.</p>
                @endforelse
            </div>
        </div>

        {{-- Referrer Breakdown --}}
        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-sm font-bold text-slate-900">Sumber Rujukan Traffic</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Saluran asal pengunjung sebelum masuk ke situs.</p>
                </div>
                <span class="text-[11px] font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-lg">Referrer</span>
            </div>

            <div class="space-y-3.5">
                @forelse($sources as $src)
                    <div>
                        <div class="flex items-center justify-between text-xs mb-1.5">
                            <span class="font-semibold text-slate-800 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full" style="background: {{ $src['color'] }};"></span>
                                {{ $src['label'] }}
                            </span>
                            <span class="font-semibold text-slate-700 tabular-nums">
                                {{ number_format($src['count']) }} <span class="text-slate-400 font-normal">({{ $src['value'] }}%)</span>
                            </span>
                        </div>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full rounded-full" style="width: {{ max($src['value'], 3) }}%; background: {{ $src['color'] }};"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 py-4 text-center">Belum ada log rujukan referrer tercatat.</p>
                @endforelse
            </div>
        </div>

    </div>

    {{-- Device & Browser Breakdown --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
            <h2 class="text-sm font-bold text-slate-900 mb-3.5">Komposisi Perangkat</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @foreach($deviceBreakdown as $dLabel => $dVal)
                    @php $dPct = round(($dVal / $totalDevices) * 100, 1); @endphp
                    <div class="bg-slate-50 border border-slate-100 rounded-xl p-3.5 text-center">
                        <div class="text-[11px] font-medium text-slate-500">{{ $dLabel }}</div>
                        <div class="text-lg font-extrabold text-slate-900 mt-0.5 tabular-nums">{{ $dPct }}%</div>
                        <div class="text-[11px] font-semibold text-blue-600 tabular-nums">{{ number_format($dVal) }} hits</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
            <h2 class="text-sm font-bold text-slate-900 mb-3.5">Browser Pengunjung</h2>
            <div class="flex flex-wrap gap-2">
                @foreach($browserBreakdown as $bLabel => $bVal)
                    @if($bVal > 0)
                        @php $bPct = round(($bVal / $totalBrowsers) * 100, 1); @endphp
                        <div class="bg-slate-50 border border-slate-100 rounded-xl px-3.5 py-2 text-xs inline-flex items-center gap-2">
                            <span class="font-semibold text-slate-800">{{ $bLabel }}</span>
                            <span class="font-bold text-blue-600 tabular-nums">{{ $bPct }}%</span>
                            <span class="text-[11px] text-slate-400 tabular-nums">({{ number_format($bVal) }})</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    {{-- Visitor Logs Table --}}
    <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-5">
            <div>
                <h2 class="text-sm font-bold text-slate-900">Riwayat Log Kunjungan</h2>
                <p class="text-xs text-slate-500 mt-0.5">Rekaman akses pengunjung terbaru ke website VizzioCraft.</p>
            </div>

            <form action="{{ route('admin.analytics.visitors') }}" method="GET" class="flex items-center gap-2">
                <input
                    type="text"
                    name="q"
                    value="{{ $search }}"
                    placeholder="Cari URL, IP, atau Referrer..."
                    class="w-full sm:w-60 px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50/50 text-xs text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition"
                >
                <button type="submit" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold cursor-pointer transition shrink-0">
                    Cari
                </button>
                @if($search)
                    <a href="{{ route('admin.analytics.visitors') }}" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold transition shrink-0">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-y border-slate-100 text-[10.5px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3 px-3 rounded-l-lg">Tanggal</th>
                        <th class="py-3 px-3">Halaman / URL</th>
                        <th class="py-3 px-3">IP Address</th>
                        <th class="py-3 px-3">Referrer</th>
                        <th class="py-3 px-3">User Agent</th>
                        <th class="py-3 px-3 text-center rounded-r-lg">Hits</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($visitorLogs as $log)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-3 px-3 whitespace-nowrap">
                                <div class="font-semibold text-slate-900">{{ $log->visit_date ? $log->visit_date->format('d M Y') : date('d M Y', strtotime($log->created_at)) }}</div>
                                <div class="text-[10.5px] text-slate-400">{{ $log->created_at ? $log->created_at->format('H:i') . ' WIB' : 'Hari ini' }}</div>
                            </td>
                            <td class="py-3 px-3">
                                <span class="inline-block font-mono font-semibold text-blue-700 bg-blue-50 border border-blue-100 px-2 py-0.5 rounded-md">
                                    {{ $log->url ?: '/' }}
                                </span>
                            </td>
                            <td class="py-3 px-3 font-mono text-slate-600 font-medium whitespace-nowrap">
                                {{ $log->ip_address ?: '127.0.0.1' }}
                            </td>
                            <td class="py-3 px-3 text-slate-500 max-w-[200px] truncate" title="{{ $log->referrer }}">
                                {{ $log->referrer ?: 'Direct / Langsung' }}
                            </td>
                            <td class="py-3 px-3 text-slate-400 max-w-[180px] truncate text-[11px]" title="{{ $log->user_agent }}">
                                {{ $log->user_agent ?: 'Browser Standar' }}
                            </td>
                            <td class="py-3 px-3 text-center">
                                <span class="inline-block px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold text-[11px] tabular-nums">
                                    {{ $log->visit_count }}x
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">
                                Belum ada catatan log kunjungan yang sesuai kriteria pencarian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($visitorLogs->hasPages())
            <div class="mt-5 pt-4 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="text-xs text-slate-500">
                    Menampilkan <strong class="text-slate-700">{{ $visitorLogs->firstItem() }}</strong> - <strong class="text-slate-700">{{ $visitorLogs->lastItem() }}</strong> dari <strong class="text-slate-700">{{ $visitorLogs->total() }}</strong> log
                </div>
                <div class="flex items-center gap-2">
                    @if($visitorLogs->onFirstPage())
                        <span class="px-3 py-1.5 text-xs rounded-lg bg-slate-100 text-slate-400 font-semibold cursor-not-allowed">&larr; Sebelumnya</span>
                    @else
                        <a href="{{ $visitorLogs->previousPageUrl() }}" class="px-3 py-1.5 text-xs rounded-lg bg-white border border-slate-200 text-slate-700 hover:text-blue-600 font-semibold transition">&larr; Sebelumnya</a>
                    @endif

                    @if($visitorLogs->hasMorePages())
                        <a href="{{ $visitorLogs->nextPageUrl() }}" class="px-3 py-1.5 text-xs rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">Selanjutnya &rarr;</a>
                    @else
                        <span class="px-3 py-1.5 text-xs rounded-lg bg-slate-100 text-slate-400 font-semibold cursor-not-allowed">Selanjutnya &rarr;</span>
                    @endif
                </div>
            </div>
        @endif
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    function initAnalyticsChart() {
        if (typeof ApexCharts === 'undefined') {
            setTimeout(initAnalyticsChart, 100);
            return;
        }

        const trafficData = {
            7: {
                categories: @json($traffic7['categories']),
                counts: @json($traffic7['counts']),
                total: '{{ number_format($traffic7['total']) }} Kunjungan',
                avg: '{{ number_format($traffic7['avg']) }} Kunjungan',
                peak: '{{ number_format($traffic7['peak']) }} ({{ $traffic7['peakDay'] }})'
            },
            14: {
                categories: @json($traffic14['categories']),
                counts: @json($traffic14['counts']),
                total: '{{ number_format($traffic14['total']) }} Kunjungan',
                avg: '{{ number_format($traffic14['avg']) }} Kunjungan',
                peak: '{{ number_format($traffic14['peak']) }} ({{ $traffic14['peakDay'] }})'
            },
            30: {
                categories: @json($traffic30['categories']),
                counts: @json($traffic30['counts']),
                total: '{{ number_format($traffic30['total']) }} Kunjungan',
                avg: '{{ number_format($traffic30['avg']) }} Kunjungan',
                peak: '{{ number_format($traffic30['peak']) }} ({{ $traffic30['peakDay'] }})'
            }
        };

        const chartOptions = {
            series: [{ name: 'Kunjungan Pengunjung', data: trafficData[14].counts }],
            chart: {
                type: 'area',
                height: 300,
                fontFamily: "'Poppins', sans-serif",
                toolbar: { show: false },
                zoom: { enabled: false },
                animations: { enabled: true, easing: 'easeinout', speed: 650 }
            },
            colors: ['#2563eb'],
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 3 },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.4,
                    gradientToColors: ['#3b82f6'],
                    opacityFrom: 0.35,
                    opacityTo: 0.02,
                    stops: [0, 95, 100]
                }
            },
            markers: {
                size: 4,
                colors: ['#ffffff'],
                strokeColors: '#2563eb',
                strokeWidth: 2.5,
                hover: { size: 7 }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                xaxis: { lines: { show: false } },
                yaxis: { lines: { show: true } },
                padding: { top: 8, right: 10, bottom: 0, left: 8 }
            },
            xaxis: {
                categories: trafficData[14].categories,
                labels: { style: { colors: '#94a3b8', fontSize: '11px', fontWeight: 500 } },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                    style: { colors: '#94a3b8', fontSize: '11px', fontWeight: 500 },
                    formatter: function(val) { return Math.round(val); }
                }
            },
            tooltip: {
                theme: 'light',
                y: { formatter: function(val) { return val + ' Kunjungan'; } }
            }
        };

        const chartEl = document.querySelector("#analytics-traffic-chart");
        if (chartEl) {
            const chart = new ApexCharts(chartEl, chartOptions);
            chart.render();

            const btn7 = document.getElementById('range-btn-7');
            const btn14 = document.getElementById('range-btn-14');
            const btn30 = document.getElementById('range-btn-30');
            const metricTotal = document.getElementById('metric-total');
            const metricAvg = document.getElementById('metric-avg');
            const metricPeak = document.getElementById('metric-peak');

            function setRange(range) {
                [btn7, btn14, btn30].forEach(b => {
                    if (!b) return;
                    b.className = 'px-3 py-1.5 rounded-lg text-[11px] font-semibold text-slate-600 hover:text-slate-900 cursor-pointer transition';
                });

                const activeBtn = range === 7 ? btn7 : (range === 14 ? btn14 : btn30);
                if (activeBtn) {
                    activeBtn.className = 'px-3 py-1.5 rounded-lg text-[11px] font-semibold bg-blue-600 text-white cursor-pointer transition';
                }

                const d = trafficData[range];
                if (metricTotal) metricTotal.innerText = d.total;
                if (metricAvg) metricAvg.innerText = d.avg;
                if (metricPeak) metricPeak.innerText = d.peak;

                chart.updateOptions({ xaxis: { categories: d.categories } });
                chart.updateSeries([{ name: 'Kunjungan Pengunjung', data: d.counts }]);
            }

            if (btn7) btn7.addEventListener('click', () => setRange(7));
            if (btn14) btn14.addEventListener('click', () => setRange(14));
            if (btn30) btn30.addEventListener('click', () => setRange(30));
        }
    }

    initAnalyticsChart();
});
</script>
@endpush
