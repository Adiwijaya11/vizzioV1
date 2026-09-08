@extends('layouts.admin.app')

@section('title', 'Analitik Pengunjung — VizzioCraft')
@section('page_title', 'Analitik Pengunjung')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Header with action --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Analitik Pengunjung Situs Web</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Monitoring traffic riil, sumber rujukan, dan riwayat kunjungan pengguna VizzioCraft.</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.analytics.traffic') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 12px; padding: 10px 16px; border-radius: 12px; text-decoration: none; border: 1px solid #bfdbfe;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                Laporan Traffic & Funnel &rarr;
            </a>
        </div>
    </div>

    {{-- Metrics Cards --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Kunjungan Hari Ini</div>
            <div style="font-size: 26px; font-weight: 800; color: #2563eb;">{{ number_format($visitorToday) }}</div>
            <div style="font-size: 11px; color: #10b981; font-weight: 600; margin-top: 4px;">&uarr; Aktivitas real-time tercatat</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Kunjungan 30 Hari Terakhir</div>
            <div style="font-size: 26px; font-weight: 800; color: #0f172a;">{{ number_format($totalVisitsMonth) }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Audience bulanan aktif</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Total Kunjungan Akumulatif</div>
            <div style="font-size: 26px; font-weight: 800; color: #059669;">{{ number_format($totalVisitsAll) }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Sejak integrasi log database</div>
        </div>
    </div>

    {{-- Traffic 14 Days & Sources Breakdown --}}
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
        {{-- 14 Days Chart --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <h2 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0 0 16px 0;">Tren Kunjungan 14 Hari Terakhir</h2>
            <div style="display: flex; align-items: flex-end; justify-content: space-between; height: 180px; gap: 6px; padding-top: 20px;">
                @php $maxCount = max($counts) ?: 1; @endphp
                @foreach($counts as $i => $cnt)
                    @php $barHeight = round(($cnt / $maxCount) * 130); @endphp
                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 6px;">
                        <span style="font-size: 9.5px; font-weight: 700; color: #2563eb;">{{ $cnt }}</span>
                        <div style="width: 100%; max-width: 28px; height: {{ max($barHeight, 6) }}px; background: linear-gradient(180deg, #2563eb 0%, #60a5fa 100%); border-radius: 6px 6px 0 0;"></div>
                        <span style="font-size: 9px; color: #94a3b8; font-weight: 600; transform: rotate(-30deg); transform-origin: top left; margin-top: 4px; white-space: nowrap;">{{ $dates[$i] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Referrer Sources --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <h2 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0 0 16px 0;">Sumber Rujukan Traffic</h2>
            <div style="display: flex; flex-direction: column; gap: 14px;">
                @foreach($sources as $src)
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 4px;">
                            <span style="font-weight: 600; color: #1e293b;">{{ $src['label'] }}</span>
                            <span style="font-weight: 700; color: {{ $src['color'] }};">{{ $src['count'] }} ({{ $src['value'] }}%)</span>
                        </div>
                        <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 9999px; overflow: hidden;">
                            <div style="height: 100%; width: {{ $src['value'] }}%; background: {{ $src['color'] }}; border-radius: 9999px;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Table of Recent Visitor Logs --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h2 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0;">Log Kunjungan Terbaru (30 Record Terkini)</h2>
            <span style="font-size: 11px; font-weight: 600; color: #64748b;">Tabel: visitor_logs</span>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Tanggal</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Halaman / URL</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">IP Address</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Referrer</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Frekuensi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($visitorLogs as $log)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 10px 12px; color: #0f172a; font-weight: 600;">{{ $log->visit_date }}</td>
                            <td style="padding: 10px 12px; color: #2563eb; font-weight: 600;">{{ $log->url ?: '/' }}</td>
                            <td style="padding: 10px 12px; color: #64748b; font-family: monospace;">{{ $log->ip_address ?: '127.0.0.1' }}</td>
                            <td style="padding: 10px 12px; color: #64748b;">{{ $log->referrer ?: 'Direct / Search' }}</td>
                            <td style="padding: 10px 12px; color: #0f172a; font-weight: 700;">{{ $log->visit_count }}x</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 24px; text-align: center; color: #94a3b8;">Belum ada data rekaman kunjungan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
