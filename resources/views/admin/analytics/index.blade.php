@extends('layouts.admin.app')

@section('title', 'Analitik Pengunjung — VizzioCraft')
@section('page_title', 'Analitik Pengunjung')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Header with action --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0;">Analitik Pengunjung Situs Web</h1>
                <span style="display: inline-flex; align-items: center; gap: 5px; background: #ecfdf5; color: #059669; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 9999px; border: 1px solid #a7f3d0;">
                    <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981; animate: pulse;"></span>
                    Live Data Real-Time
                </span>
            </div>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Monitoring traffic riil dari database log pengunjung asli web VizzioCraft.</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.analytics.traffic') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 12px; padding: 10px 16px; border-radius: 12px; text-decoration: none; border: 1px solid #bfdbfe; transition: all 0.15s;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                Laporan Funnel Bisnis &rarr;
            </a>
        </div>
    </div>

    {{-- Metrics Cards (Data Asli Database) --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px;">
        {{-- Card 1: Hari Ini --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">Kunjungan Hari Ini</span>
                <span style="width: 28px; height: 28px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
            </div>
            <div style="font-size: 26px; font-weight: 800; color: #2563eb;">{{ number_format($visitorToday) }}</div>
            <div style="font-size: 11.5px; color: #059669; font-weight: 600; margin-top: 4px; display: flex; align-items: center; gap: 4px;">
                <span>&bull;</span> {{ number_format($uniqueToday) }} Pengunjung Unik (IP)
            </div>
        </div>

        {{-- Card 2: 30 Hari Terakhir --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">30 Hari Terakhir</span>
                <span style="width: 28px; height: 28px; border-radius: 8px; background: #f0fdf4; color: #16a34a; display: flex; align-items: center; justify-content: center;">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </span>
            </div>
            <div style="font-size: 26px; font-weight: 800; color: #0f172a;">{{ number_format($totalVisitsMonth) }}</div>
            <div style="font-size: 11.5px; color: #64748b; font-weight: 500; margin-top: 4px;">
                {{ number_format($uniqueMonth) }} Pengunjung Unik Bulan Ini
            </div>
        </div>

        {{-- Card 3: Total Akumulatif --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">Total Akumulatif</span>
                <span style="width: 28px; height: 28px; border-radius: 8px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center;">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </span>
            </div>
            <div style="font-size: 26px; font-weight: 800; color: #059669;">{{ number_format($totalVisitsAll) }}</div>
            <div style="font-size: 11.5px; color: #64748b; font-weight: 500; margin-top: 4px;">
                {{ number_format($uniqueAll) }} IP Terdata di Sistem
            </div>
        </div>

        {{-- Card 4: Rata-rata & Puncak Kunjungan --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">Puncak Kunjungan</span>
                <span style="width: 28px; height: 28px; border-radius: 8px; background: #fdf2f8; color: #db2777; display: flex; align-items: center; justify-content: center;">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </span>
            </div>
            <div style="font-size: 26px; font-weight: 800; color: #db2777;">{{ number_format($traffic14['peak']) }}</div>
            <div style="font-size: 11.5px; color: #64748b; font-weight: 500; margin-top: 4px;">
                Tercatat pada {{ $traffic14['peakDay'] }}
            </div>
        </div>
    </div>

    {{-- Main Modern Chart (Never Gepeng & Full Interactive) --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 26px; box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04);">
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 14px; margin-bottom: 20px;">
            <div>
                <h2 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Tren Kunjungan Website (Data Riil)</h2>
                <p style="font-size: 12px; color: #64748b; margin: 0;">Kurva trafik interaktif berdasarkan agregasi riil tabel <code style="color: #2563eb; background: #eff6ff; padding: 2px 6px; border-radius: 6px;">visitor_logs</code>.</p>
            </div>

            {{-- Range Filter Controls --}}
            <div style="display: flex; align-items: center; gap: 8px;">
                <div style="background: #f1f5f9; padding: 4px; border-radius: 12px; display: inline-flex; gap: 3px;">
                    <button id="range-btn-7" type="button" style="border: none; background: transparent; color: #64748b; font-size: 11px; font-weight: 700; padding: 6px 14px; border-radius: 8px; cursor: pointer; transition: all 0.2s;">
                        7 Hari
                    </button>
                    <button id="range-btn-14" type="button" style="border: none; background: #2563eb; color: #ffffff; font-size: 11px; font-weight: 700; padding: 6px 14px; border-radius: 8px; cursor: pointer; transition: all 0.2s;">
                        14 Hari
                    </button>
                    <button id="range-btn-30" type="button" style="border: none; background: transparent; color: #64748b; font-size: 11px; font-weight: 700; padding: 6px 14px; border-radius: 8px; cursor: pointer; transition: all 0.2s;">
                        30 Hari
                    </button>
                </div>
            </div>
        </div>

        {{-- Metrik Ringkasan di Bawah Header Chart --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 12px; margin-bottom: 20px; background: #f8fafc; border: 1px solid #eef2f6; border-radius: 14px; padding: 12px 18px;">
            <div>
                <div style="font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase;">Total Periode Ini</div>
                <div id="metric-total" style="font-size: 18px; font-weight: 800; color: #0f172a;">{{ number_format($traffic14['total']) }} Kunjungan</div>
            </div>
            <div>
                <div style="font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase;">Rata-rata / Hari</div>
                <div id="metric-avg" style="font-size: 18px; font-weight: 800; color: #2563eb;">{{ number_format($traffic14['avg']) }} Kunjungan</div>
            </div>
            <div>
                <div style="font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase;">Hari Tertinggi (Peak)</div>
                <div id="metric-peak" style="font-size: 18px; font-weight: 800; color: #059669;">{{ number_format($traffic14['peak']) }} ({{ $traffic14['peakDay'] }})</div>
            </div>
        </div>

        {{-- ApexCharts Canvas Container --}}
        <div id="analytics-traffic-chart" style="width: 100%; min-height: 330px;"></div>
    </div>

    {{-- Two Columns: Top Pages & Referrers Breakdown (Data Asli) --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px;">
        
        {{-- Halaman Paling Populer (Top Visited Pages) --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
                <div>
                    <h2 style="font-size: 15px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Halaman Paling Sering Dikunjungi</h2>
                    <p style="font-size: 12px; color: #64748b; margin: 0;">Halaman dengan traffic dan interaksi pengunjung tertinggi.</p>
                </div>
                <span style="font-size: 11px; font-weight: 700; color: #2563eb; background: #eff6ff; padding: 4px 10px; border-radius: 8px;">
                    Top 6 Halaman
                </span>
            </div>

            <div style="display: flex; flex-direction: column; gap: 14px;">
                @forelse($topPages as $page)
                    @php $pct = round(($page->total_hits / $totalHitsAllPages) * 100, 1); @endphp
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 12px; margin-bottom: 6px;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="font-weight: 700; color: #0f172a; font-family: monospace; background: #f1f5f9; padding: 2px 8px; border-radius: 6px;">
                                    {{ $page->url ?: '/' }}
                                </span>
                            </div>
                            <div style="font-weight: 700; color: #0f172a;">
                                {{ number_format($page->total_hits) }} hits <span style="color: #64748b; font-weight: 500;">({{ $pct }}%)</span>
                            </div>
                        </div>
                        <div style="width: 100%; height: 7px; background: #f1f5f9; border-radius: 9999px; overflow: hidden;">
                            <div style="height: 100%; width: {{ max($pct, 3) }}%; background: #2563eb; border-radius: 9999px;"></div>
                        </div>
                    </div>
                @empty
                    <p style="font-size: 12px; color: #94a3b8; margin: 0;">Belum ada log halaman tercatat.</p>
                @endforelse
            </div>
        </div>

        {{-- Sumber Rujukan Traffic (Referrer Breakdown) --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
                <div>
                    <h2 style="font-size: 15px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Sumber Rujukan Traffic (Referrer)</h2>
                    <p style="font-size: 12px; color: #64748b; margin: 0;">Saluran asal pengunjung sebelum masuk ke situs VizzioCraft.</p>
                </div>
                <span style="font-size: 11px; font-weight: 700; color: #059669; background: #ecfdf5; padding: 4px 10px; border-radius: 8px;">
                    Channel Riil
                </span>
            </div>

            <div style="display: flex; flex-direction: column; gap: 14px;">
                @forelse($sources as $src)
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 6px;">
                            <span style="font-weight: 700; color: #1e293b; display: flex; align-items: center; gap: 6px;">
                                <span style="width: 8px; height: 8px; border-radius: 50%; background: {{ $src['color'] }};"></span>
                                {{ $src['label'] }}
                            </span>
                            <span style="font-weight: 700; color: {{ $src['color'] }};">
                                {{ number_format($src['count']) }} kunjungan ({{ $src['value'] }}%)
                            </span>
                        </div>
                        <div style="width: 100%; height: 7px; background: #f1f5f9; border-radius: 9999px; overflow: hidden;">
                            <div style="height: 100%; width: {{ max($src['value'], 3) }}%; background: {{ $src['color'] }}; border-radius: 9999px;"></div>
                        </div>
                    </div>
                @empty
                    <p style="font-size: 12px; color: #94a3b8; margin: 0;">Belum ada log rujukan referrer tercatat.</p>
                @endforelse
            </div>
        </div>

    </div>

    {{-- Device & Browser Breakdown --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
        
        {{-- Tipe Perangkat --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0;">Komposisi Perangkat (Device)</h2>
            <div style="display: flex; gap: 12px;">
                @foreach($deviceBreakdown as $dLabel => $dVal)
                    @php $dPct = round(($dVal / $totalDevices) * 100, 1); @endphp
                    <div style="flex: 1; background: #f8fafc; border: 1px solid #eef2f6; border-radius: 14px; padding: 14px; text-align: center;">
                        <div style="font-size: 11px; font-weight: 600; color: #64748b; margin-bottom: 4px;">{{ $dLabel }}</div>
                        <div style="font-size: 20px; font-weight: 800; color: #0f172a;">{{ $dPct }}%</div>
                        <div style="font-size: 11px; color: #2563eb; font-weight: 600; margin-top: 2px;">{{ number_format($dVal) }} hits</div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Browser Pengunjung --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0;">Browser Pengunjung</h2>
            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                @foreach($browserBreakdown as $bLabel => $bVal)
                    @if($bVal > 0)
                        @php $bPct = round(($bVal / $totalBrowsers) * 100, 1); @endphp
                        <div style="background: #f8fafc; border: 1px solid #eef2f6; border-radius: 10px; padding: 8px 12px; font-size: 12px; display: inline-flex; align-items: center; gap: 6px;">
                            <span style="font-weight: 700; color: #0f172a;">{{ $bLabel }}:</span>
                            <span style="font-weight: 800; color: #2563eb;">{{ $bPct }}%</span>
                            <span style="font-size: 10.5px; color: #94a3b8;">({{ number_format($bVal) }})</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

    {{-- Table of Recent Visitor Logs (Data Asli dengan Pencarian & Pagination) --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 14px; margin-bottom: 20px;">
            <div>
                <h2 style="font-size: 15px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Riwayat Log Kunjungan Nyata (Tabel visitor_logs)</h2>
                <span style="font-size: 12px; color: #64748b;">Menampilkan rekaman aktivitas akses asli pengguna ke website VizzioCraft.</span>
            </div>

            {{-- Form Search Log --}}
            <form action="{{ route('admin.analytics.visitors') }}" method="GET" style="display: flex; align-items: center; gap: 8px; margin: 0;">
                <input
                    type="text"
                    name="q"
                    value="{{ $search }}"
                    placeholder="Cari URL, IP, atau Referrer..."
                    style="border: 1px solid #cbd5e1; border-radius: 10px; padding: 8px 14px; font-size: 12px; outline: none; width: 240px; font-family: inherit;"
                >
                <button type="submit" style="background: #2563eb; color: #ffffff; border: none; border-radius: 10px; padding: 8px 14px; font-size: 12px; font-weight: 700; cursor: pointer;">
                    Cari
                </button>
                @if($search)
                    <a href="{{ route('admin.analytics.visitors') }}" style="background: #f1f5f9; color: #64748b; text-decoration: none; border-radius: 10px; padding: 8px 12px; font-size: 12px; font-weight: 600;">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 2px solid #f1f5f9; text-align: left; background: #f8fafc;">
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; border-radius: 10px 0 0 10px;">Tanggal Akses</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Halaman / URL</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">IP Address</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Sumber Referrer</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Perangkat / User Agent</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; text-align: center; border-radius: 0 10px 10px 0;">Frekuensi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($visitorLogs as $log)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.15s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 12px; color: #0f172a; font-weight: 600; white-space: nowrap;">
                                {{ $log->visit_date ? $log->visit_date->format('d M Y') : date('d M Y', strtotime($log->created_at)) }}
                                <div style="font-size: 10.5px; color: #94a3b8; font-weight: 400;">{{ $log->created_at ? $log->created_at->format('H:i') . ' WIB' : 'Hari ini' }}</div>
                            </td>
                            <td style="padding: 12px;">
                                <span style="display: inline-block; font-weight: 700; color: #2563eb; background: #eff6ff; padding: 3px 8px; border-radius: 6px; font-family: monospace;">
                                    {{ $log->url ?: '/' }}
                                </span>
                            </td>
                            <td style="padding: 12px; font-family: monospace; color: #475569; font-weight: 600;">
                                {{ $log->ip_address ?: '127.0.0.1' }}
                            </td>
                            <td style="padding: 12px; color: #64748b; max-width: 220px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $log->referrer }}">
                                {{ $log->referrer ?: 'Direct / Akses Langsung' }}
                            </td>
                            <td style="padding: 12px; color: #64748b; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: 11px;" title="{{ $log->user_agent }}">
                                {{ $log->user_agent ?: 'Browser Standar' }}
                            </td>
                            <td style="padding: 12px; text-align: center;">
                                <span style="display: inline-block; padding: 2px 8px; border-radius: 9999px; background: #ecfdf5; color: #059669; font-weight: 800; font-size: 11.5px;">
                                    {{ $log->visit_count }}x
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 32px; text-align: center; color: #94a3b8;">
                                Belum ada catatan log kunjungan yang sesuai kriteria pencarian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($visitorLogs->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 14px;">
                <div style="font-size: 12px; color: #64748b;">
                    Menampilkan <strong>{{ $visitorLogs->firstItem() }}</strong> - <strong>{{ $visitorLogs->lastItem() }}</strong> dari <strong>{{ $visitorLogs->total() }}</strong> total log kunjungan
                </div>
                <div style="display: flex; gap: 8px;">
                    @if($visitorLogs->onFirstPage())
                        <span style="padding: 6px 12px; font-size: 12px; border-radius: 8px; background: #f1f5f9; color: #94a3b8; font-weight: 600; cursor: not-allowed;">&larr; Sebelumnya</span>
                    @else
                        <a href="{{ $visitorLogs->previousPageUrl() }}" style="padding: 6px 12px; font-size: 12px; border-radius: 8px; background: #ffffff; border: 1px solid #cbd5e1; color: #0f172a; text-decoration: none; font-weight: 700;">&larr; Sebelumnya</a>
                    @endif

                    @if($visitorLogs->hasMorePages())
                        <a href="{{ $visitorLogs->nextPageUrl() }}" style="padding: 6px 12px; font-size: 12px; border-radius: 8px; background: #2563eb; color: #ffffff; text-decoration: none; font-weight: 700;">Selanjutnya &rarr;</a>
                    @else
                        <span style="padding: 6px 12px; font-size: 12px; border-radius: 8px; background: #f1f5f9; color: #94a3b8; font-weight: 600; cursor: not-allowed;">Selanjutnya &rarr;</span>
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
            series: [{
                name: 'Kunjungan Pengunjung',
                data: trafficData[14].counts
            }],
            chart: {
                type: 'area',
                height: 330,
                fontFamily: "'Poppins', sans-serif",
                toolbar: { show: false },
                zoom: { enabled: false },
                dropShadow: {
                    enabled: true,
                    top: 6,
                    left: 0,
                    blur: 8,
                    color: '#2563eb',
                    opacity: 0.18
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 750
                }
            },
            colors: ['#2563eb'],
            dataLabels: { enabled: false },
            stroke: {
                curve: 'smooth',
                width: 3.5
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.5,
                    gradientToColors: ['#3b82f6'],
                    inverseColors: false,
                    opacityFrom: 0.55,
                    opacityTo: 0.03,
                    stops: [0, 90, 100]
                }
            },
            markers: {
                size: 5,
                colors: ['#ffffff'],
                strokeColors: '#2563eb',
                strokeWidth: 3,
                hover: {
                    size: 8,
                    sizeOffset: 3
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                xaxis: { lines: { show: false } },
                yaxis: { lines: { show: true } },
                padding: { top: 10, right: 15, bottom: 0, left: 10 }
            },
            xaxis: {
                categories: trafficData[14].categories,
                labels: {
                    style: {
                        colors: '#94a3b8',
                        fontSize: '11px',
                        fontWeight: 600
                    }
                },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#94a3b8',
                        fontSize: '11px',
                        fontWeight: 600
                    },
                    formatter: function(val) {
                        return Math.round(val);
                    }
                }
            },
            tooltip: {
                theme: 'light',
                x: { show: true },
                y: {
                    formatter: function(val) {
                        return val + ' Kunjungan';
                    }
                },
                marker: { show: true },
                style: { fontSize: '12px' }
            }
        };

        const chartEl = document.querySelector("#analytics-traffic-chart");
        if (chartEl) {
            const chart = new ApexCharts(chartEl, chartOptions);
            chart.render();

            // Range Button Handlers
            const btn7 = document.getElementById('range-btn-7');
            const btn14 = document.getElementById('range-btn-14');
            const btn30 = document.getElementById('range-btn-30');

            const metricTotal = document.getElementById('metric-total');
            const metricAvg = document.getElementById('metric-avg');
            const metricPeak = document.getElementById('metric-peak');

            function setRange(range) {
                [btn7, btn14, btn30].forEach(b => {
                    b.style.background = 'transparent';
                    b.style.color = '#64748b';
                });

                if (range === 7) {
                    btn7.style.background = '#2563eb';
                    btn7.style.color = '#ffffff';
                } else if (range === 14) {
                    btn14.style.background = '#2563eb';
                    btn14.style.color = '#ffffff';
                } else if (range === 30) {
                    btn30.style.background = '#2563eb';
                    btn30.style.color = '#ffffff';
                }

                const d = trafficData[range];
                if (metricTotal) metricTotal.innerText = d.total;
                if (metricAvg) metricAvg.innerText = d.avg;
                if (metricPeak) metricPeak.innerText = d.peak;

                chart.updateOptions({
                    xaxis: { categories: d.categories }
                });
                chart.updateSeries([{
                    name: 'Kunjungan Pengunjung',
                    data: d.counts
                }]);
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
