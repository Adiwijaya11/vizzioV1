@extends('layouts.admin.app')

@section('title', 'Dashboard Overview — VizzioCraft')
@section('page_title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">

    {{-- Clean Header & Quick Actions --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-[11px] font-semibold mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                {{ session('user_role') === 'super_admin' ? 'Super Admin Control Panel' : 'Admin Workspace' }}
            </div>
            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                Selamat Datang, {{ session('user_name', 'Administrator') }}
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">
                {{ session('user_role') === 'super_admin'
                    ? 'Ringkasan aktivitas sistem, traffic website, dan manajemen pengguna.'
                    : 'Ringkasan kunjungan website, proyek berjalan, pesan masuk, dan pipeline leads.' }}
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5 shrink-0">
            @if(session('user_role') === 'super_admin')
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm shadow-blue-600/20 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Kelola Pengguna
                </a>
                <a href="{{ route('admin.backup.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 hover:text-blue-600 text-xs font-semibold border border-slate-200 shadow-xs transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>
                    Backup DB
                </a>
            @else
                <a href="{{ route('admin.news.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm shadow-blue-600/20 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Tulis Artikel
                </a>
                <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 hover:text-blue-600 text-xs font-semibold border border-slate-200 shadow-xs transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Tambah Proyek
                </a>
            @endif
        </div>
    </div>

    {{-- 4 Focused KPI Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

        {{-- KPI 1: Users (Super Admin) / Visitors Today (Admin) --}}
        @if(session('user_role') === 'super_admin')
            <a href="{{ route('admin.users.index') }}" class="group bg-white border border-slate-200/80 hover:border-blue-200 rounded-2xl p-5 shadow-xs transition flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Total Pengguna</span>
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                </div>
                <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ $userCount }}</div>
                <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                    <span>{{ $superAdminCount }} SA &bull; {{ $adminRoleCount }} Admin</span>
                    <span class="font-semibold text-blue-600 group-hover:translate-x-0.5 transition">&rarr;</span>
                </div>
            </a>
        @else
            <a href="{{ route('admin.analytics.visitors') }}" class="group bg-white border border-slate-200/80 hover:border-blue-200 rounded-2xl p-5 shadow-xs transition flex flex-col justify-between">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Visitor Hari Ini</span>
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                </div>
                <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ number_format($visitorToday) }}</div>
                <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                    <span class="text-emerald-600 font-medium">Kunjungan real-time</span>
                    <span class="font-semibold text-blue-600 group-hover:translate-x-0.5 transition">&rarr;</span>
                </div>
            </a>
        @endif

        {{-- KPI 2: Proyek Aktif --}}
        <a href="{{ route('admin.projects.index') }}" class="group bg-white border border-slate-200/80 hover:border-blue-200 rounded-2xl p-5 shadow-xs transition flex flex-col justify-between">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Proyek Aktif</span>
                <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-slate-900 tabular-nums">
                {{ $proyekAktifCount }} <span class="text-xs font-medium text-slate-400">/ {{ $proyekTotalCount }} total</span>
            </div>
            <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                <span>Portofolio berjalan</span>
                <span class="font-semibold text-blue-600 group-hover:translate-x-0.5 transition">&rarr;</span>
            </div>
        </a>

        {{-- KPI 3: Pesan Baru --}}
        <a href="{{ route('admin.messages.index') }}" class="group bg-white border border-slate-200/80 hover:border-blue-200 rounded-2xl p-5 shadow-xs transition flex flex-col justify-between">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pesan Baru</span>
                <div class="w-9 h-9 rounded-xl {{ $pesanMasuk > 0 ? 'bg-emerald-50 text-emerald-600' : 'bg-slate-100 text-slate-700' }} flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ $pesanMasuk }}</div>
            <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                <span>Belum dibaca</span>
                <span class="font-semibold text-blue-600 group-hover:translate-x-0.5 transition">&rarr;</span>
            </div>
        </a>

        {{-- KPI 4: Leads Penawaran --}}
        <a href="{{ route('admin.leads.index') }}" class="group bg-white border border-slate-200/80 hover:border-blue-200 rounded-2xl p-5 shadow-xs transition flex flex-col justify-between">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Leads Penawaran</span>
                <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ $penawaran }}</div>
            <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                <span>Pipeline aktif</span>
                <span class="font-semibold text-blue-600 group-hover:translate-x-0.5 transition">&rarr;</span>
            </div>
        </a>

    </div>

    {{-- Dual-Chart Grid --}}
    <style>
        .apexcharts-tooltip {
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.12) !important;
            border-radius: 12px !important;
            border: 1px solid #e2e8f0 !important;
            font-family: 'Poppins', sans-serif !important;
        }
    </style>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-stretch">

        {{-- Chart 1: Tren Kunjungan Website --}}
        <div class="lg:col-span-8 bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                    <div>
                        <div class="flex items-center gap-2.5">
                            <h2 class="text-base font-bold text-slate-900">Tren Kunjungan Website</h2>
                            <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full {{ $trendIsUp ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }}">
                                {!! $trendIsUp ? '&#8593;' : '&#8595;' !!} {{ abs($trendPercentage) }}%
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5">Statistik kunjungan harian website VizzioCraft.</p>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="bg-slate-100 p-1 rounded-xl inline-flex gap-1">
                            <button id="btn-traffic-7" type="button" class="px-3 py-1.5 rounded-lg text-[11px] font-semibold bg-blue-600 text-white cursor-pointer transition">
                                7 Hari
                            </button>
                            <button id="btn-traffic-14" type="button" class="px-3 py-1.5 rounded-lg text-[11px] font-semibold text-slate-600 hover:text-slate-900 cursor-pointer transition">
                                14 Hari
                            </button>
                        </div>
                        <a href="{{ route('admin.analytics.visitors') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700 px-3 py-1.5 rounded-xl bg-blue-50 border border-blue-100 transition">
                            Detail &rarr;
                        </a>
                    </div>
                </div>

                {{-- Slim Inline Metrics --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-4 px-4 py-3 rounded-xl bg-slate-50 border border-slate-100">
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400 uppercase">Hari Ini</div>
                        <div class="text-base font-bold text-blue-600 tabular-nums">{{ number_format($visitorToday) }}</div>
                    </div>
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400 uppercase">Total Periode</div>
                        <div id="traffic-total-display" class="text-base font-bold text-slate-900 tabular-nums">{{ number_format($totalVisits7) }}</div>
                    </div>
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400 uppercase">Rata-rata/Hari</div>
                        <div class="text-base font-bold text-slate-900 tabular-nums">{{ number_format($avgVisits7) }}</div>
                    </div>
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400 uppercase">Puncak Trafik</div>
                        <div class="text-base font-bold text-emerald-600 tabular-nums">{{ number_format($peakVisits7) }}</div>
                    </div>
                </div>

                <div id="chart-traffic-main" class="w-full min-h-[280px]"></div>
            </div>

            <div class="flex items-center justify-between text-[11px] text-slate-400 border-t border-slate-100 pt-3 mt-2">
                <span>Puncak tercatat pada <strong class="text-slate-600">{{ $peakDay7 }}</strong></span>
                <span class="inline-flex items-center gap-1.5 text-emerald-600 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Auto-sync
                </span>
            </div>
        </div>

        {{-- Chart 2: Role-Adaptive Donut Chart --}}
        <div class="lg:col-span-4 bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs flex flex-col justify-between">
            <div>
                @if(session('user_role') === 'super_admin')
                    <div class="flex items-start justify-between gap-2 mb-4">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Audit & Keamanan Sistem</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Distribusi aktivitas log terpusat.</p>
                        </div>
                        <span class="text-[10px] font-bold bg-blue-50 text-blue-800 border border-blue-200 px-2.5 py-1 rounded-lg shrink-0">
                            Super Admin
                        </span>
                    </div>

                    <div id="chart-role-superadmin" class="w-full min-h-[260px]"></div>

                    <div class="space-y-2 mt-3">
                        <div class="flex items-center justify-between px-3 py-2 rounded-xl bg-slate-50 text-xs">
                            <span class="text-slate-500 font-medium">Total Akun</span>
                            <span class="font-bold text-slate-900">{{ $userCount }} ({{ $superAdminCount }} SA / {{ $adminRoleCount }} Admin)</span>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 rounded-xl bg-slate-50 text-xs">
                            <span class="text-slate-500 font-medium">Audit Trail</span>
                            <span class="font-semibold text-emerald-600">Aktif & Terekam</span>
                        </div>
                    </div>
                @else
                    <div class="flex items-start justify-between gap-2 mb-4">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Pipeline Leads & Konversi</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Tahapan prospek hingga closing.</p>
                        </div>
                        <span class="text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-200 px-2.5 py-1 rounded-lg shrink-0">
                            Win {{ $adminChartData['winRate'] }}%
                        </span>
                    </div>

                    <div id="chart-role-admin" class="w-full min-h-[260px]"></div>

                    <div class="space-y-2 mt-3">
                        <div class="flex items-center justify-between px-3 py-2 rounded-xl bg-slate-50 text-xs">
                            <span class="text-slate-500 font-medium">Kesepakatan (Won)</span>
                            <span class="font-bold text-emerald-600">{{ $adminChartData['wonCount'] }} Klien</span>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 rounded-xl bg-slate-50 text-xs">
                            <span class="text-slate-500 font-medium">Proyek Aktif</span>
                            <span class="font-bold text-blue-600">{{ $adminChartData['projectsActive'] }} Proyek</span>
                        </div>
                    </div>
                @endif
            </div>

            <div class="border-t border-slate-100 pt-3 mt-4">
                @if(session('user_role') === 'super_admin')
                    <a href="{{ route('admin.logs.index') }}" class="flex items-center justify-between text-xs font-semibold text-blue-700 hover:text-blue-800">
                        <span>Buka Audit Log Lengkap</span>
                        <span>&rarr;</span>
                    </a>
                @else
                    <a href="{{ route('admin.leads.index') }}" class="flex items-center justify-between text-xs font-semibold text-blue-600 hover:text-blue-700">
                        <span>Kelola Pipeline Leads</span>
                        <span>&rarr;</span>
                    </a>
                @endif
            </div>
        </div>

    </div>

    {{-- Bottom: Compact 2-Column Activity --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

        {{-- Pesan Kontak Terkini --}}
        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-bold text-slate-900">Pesan Kontak Terkini</h3>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Semua Pesan &rarr;</a>
            </div>
            <div class="space-y-2.5">
                @forelse($recentMessages->take(4) as $m)
                    <div class="px-3.5 py-2.5 rounded-xl bg-slate-50/80 border border-slate-100 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-slate-900 truncate">{{ $m->name }}</span>
                                @if($m->status === 'unread')
                                    <span class="text-[9px] font-bold bg-rose-50 text-rose-600 border border-rose-200 px-1.5 py-0.5 rounded">BARU</span>
                                @endif
                            </div>
                            <div class="text-[11px] text-slate-500 truncate mt-0.5">{{ $m->subject ?: $m->message }}</div>
                        </div>
                        <span class="text-[10px] text-slate-400 shrink-0">{{ $m->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 py-4 text-center">Belum ada pesan kontak.</p>
                @endforelse
            </div>
        </div>

        {{-- Role-Focused Secondary Feed --}}
        @if(session('user_role') === 'super_admin')
            <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-slate-900">Log Aktivitas Terakhir</h3>
                    <a href="{{ route('admin.logs.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Semua Log &rarr;</a>
                </div>
                <div class="space-y-2.5">
                    @forelse($recentLogs->take(4) as $log)
                        <div class="px-3.5 py-2.5 rounded-xl bg-slate-50/80 border border-slate-100 flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <div class="text-xs font-semibold text-slate-800 truncate">
                                    {{ $log->user_name }} <span class="text-slate-400 font-normal">&bull; {{ $log->action }}</span>
                                </div>
                                <div class="text-[11px] text-slate-500 truncate mt-0.5">{{ $log->description }}</div>
                            </div>
                            <span class="text-[10px] text-slate-400 shrink-0 tabular-nums">{{ $log->created_at->format('H:i') }}</span>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 py-4 text-center">Belum ada log aktivitas.</p>
                    @endforelse
                </div>
            </div>
        @else
            <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-slate-900">Proyek Portofolio Terkini</h3>
                    <a href="{{ route('admin.projects.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Semua Proyek &rarr;</a>
                </div>
                <div class="space-y-2.5">
                    @forelse($recentProjects->take(4) as $p)
                        <div class="px-3.5 py-2.5 rounded-xl bg-slate-50/80 border border-slate-100 flex items-center justify-between gap-3">
                            <div class="min-w-0">
                                <div class="text-xs font-bold text-slate-900 truncate">{{ $p->name }}</div>
                                <div class="text-[11px] text-slate-500 truncate mt-0.5">{{ $p->client }} &bull; Rp {{ number_format($p->budget, 0, ',', '.') }}</div>
                            </div>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-md uppercase shrink-0
                                @if($p->status === 'active') bg-blue-50 text-blue-700 border border-blue-200
                                @elseif($p->status === 'completed') bg-emerald-50 text-emerald-700 border border-emerald-200
                                @else bg-slate-100 text-slate-600 border border-slate-200 @endif">
                                {{ $p->status }}
                            </span>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 py-4 text-center">Belum ada proyek.</p>
                    @endforelse
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
    function initDashboardCharts() {
        if (typeof ApexCharts === 'undefined') {
            setTimeout(initDashboardCharts, 100);
            return;
        }

        const categories7 = @json($categories7);
        const values7 = @json($values7);
        const categories14 = @json($categories14);
        const values14 = @json($values14);

        const trafficChartOptions = {
            series: [{
                name: 'Pengunjung Web',
                data: values7
            }],
            chart: {
                type: 'area',
                height: 280,
                fontFamily: "'Poppins', sans-serif",
                toolbar: { show: false },
                zoom: { enabled: false },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 650,
                    dynamicAnimation: { enabled: true, speed: 300 }
                }
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
                padding: { top: 8, right: 8, bottom: 0, left: 8 }
            },
            xaxis: {
                categories: categories7,
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
                y: {
                    formatter: function(val) { return val + ' Pengunjung'; }
                }
            }
        };

        const trafficChartEl = document.querySelector("#chart-traffic-main");
        if (trafficChartEl) {
            const trafficChart = new ApexCharts(trafficChartEl, trafficChartOptions);
            trafficChart.render();

            const btn7 = document.getElementById('btn-traffic-7');
            const btn14 = document.getElementById('btn-traffic-14');
            const totalDisplay = document.getElementById('traffic-total-display');

            if (btn7 && btn14) {
                btn7.addEventListener('click', function() {
                    btn7.className = 'px-3 py-1.5 rounded-lg text-[11px] font-semibold bg-blue-600 text-white cursor-pointer transition';
                    btn14.className = 'px-3 py-1.5 rounded-lg text-[11px] font-semibold text-slate-600 hover:text-slate-900 cursor-pointer transition';
                    if (totalDisplay) totalDisplay.innerText = '{{ number_format($totalVisits7) }}';

                    trafficChart.updateOptions({ xaxis: { categories: categories7 } });
                    trafficChart.updateSeries([{ name: 'Pengunjung Web', data: values7 }]);
                });

                btn14.addEventListener('click', function() {
                    btn14.className = 'px-3 py-1.5 rounded-lg text-[11px] font-semibold bg-blue-600 text-white cursor-pointer transition';
                    btn7.className = 'px-3 py-1.5 rounded-lg text-[11px] font-semibold text-slate-600 hover:text-slate-900 cursor-pointer transition';
                    if (totalDisplay) totalDisplay.innerText = '{{ number_format($totalVisits14) }}';

                    trafficChart.updateOptions({ xaxis: { categories: categories14 } });
                    trafficChart.updateSeries([{ name: 'Pengunjung Web', data: values14 }]);
                });
            }
        }

        @if(session('user_role') === 'super_admin')
            const saOptions = {
                series: @json($superAdminChartData['series']),
                labels: @json($superAdminChartData['labels']),
                colors: @json($superAdminChartData['colors']),
                chart: { type: 'donut', height: 260, fontFamily: "'Poppins', sans-serif" },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '72%',
                            labels: {
                                show: true,
                                name: { show: true, fontSize: '12px', fontWeight: 600, color: '#64748b', offsetY: -4 },
                                value: { show: true, fontSize: '20px', fontWeight: 800, color: '#0f172a', offsetY: 4 },
                                total: {
                                    show: true,
                                    label: 'Total Aktivitas',
                                    fontSize: '11px',
                                    fontWeight: 600,
                                    color: '#94a3b8',
                                    formatter: function(w) { return w.globals.seriesTotals.reduce((a, b) => a + b, 0); }
                                }
                            }
                        }
                    }
                },
                dataLabels: { enabled: false },
                legend: { position: 'bottom', fontSize: '11px', fontWeight: 500, markers: { radius: 12 } },
                tooltip: { theme: 'light', y: { formatter: function(val) { return val + ' aksi'; } } },
                stroke: { width: 2, colors: ['#ffffff'] }
            };

            const saChartEl = document.querySelector("#chart-role-superadmin");
            if (saChartEl) {
                new ApexCharts(saChartEl, saOptions).render();
            }
        @else
            const adminOptions = {
                series: @json($adminChartData['series']),
                labels: @json($adminChartData['labels']),
                colors: @json($adminChartData['colors']),
                chart: { type: 'donut', height: 260, fontFamily: "'Poppins', sans-serif" },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '72%',
                            labels: {
                                show: true,
                                name: { show: true, fontSize: '12px', fontWeight: 600, color: '#64748b', offsetY: -4 },
                                value: { show: true, fontSize: '20px', fontWeight: 800, color: '#0f172a', offsetY: 4 },
                                total: {
                                    show: true,
                                    label: 'Total Leads',
                                    fontSize: '11px',
                                    fontWeight: 600,
                                    color: '#94a3b8',
                                    formatter: function(w) { return w.globals.seriesTotals.reduce((a, b) => a + b, 0); }
                                }
                            }
                        }
                    }
                },
                dataLabels: { enabled: false },
                legend: { position: 'bottom', fontSize: '11px', fontWeight: 500, markers: { radius: 12 } },
                tooltip: { theme: 'light', y: { formatter: function(val) { return val + ' prospek'; } } },
                stroke: { width: 2, colors: ['#ffffff'] }
            };

            const adminChartEl = document.querySelector("#chart-role-admin");
            if (adminChartEl) {
                new ApexCharts(adminChartEl, adminOptions).render();
            }
        @endif
    }

    initDashboardCharts();
});
</script>
@endpush
