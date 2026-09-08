@extends('layouts.admin.app')

@section('title', 'Laporan Traffic & Funnel — VizzioCraft')
@section('page_title', 'Laporan Traffic')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Laporan Traffic & Conversion Funnel</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Analisis tahapan konversi pengunjung menjadi prospek klien dan kesepakatan proyek (Won Deals).</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.analytics.visitors') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 12px; padding: 10px 16px; border-radius: 12px; text-decoration: none; border: 1px solid #bfdbfe;">
                &larr; Analitik Pengunjung
            </a>
            <a href="{{ route('admin.leads.index') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 16px; border-radius: 12px; text-decoration: none;">
                Kelola Leads &rarr;
            </a>
        </div>
    </div>

    {{-- Conversion Funnel Visual --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 26px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 18px 0;">Tahapan Funnel Konversi Bisnis</h2>
        <div style="display: flex; flex-direction: column; gap: 12px;">
            @php $maxFunnel = max(array_column($funnel, 'value')) ?: 1; @endphp
            @foreach($funnel as $idx => $f)
                @php $pct = round(($f['value'] / $maxFunnel) * 100); @endphp
                <div style="background: #f8fafc; border: 1px solid #eef2f6; border-radius: 14px; padding: 14px 18px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <div>
                            <span style="font-size: 13px; font-weight: 700; color: #0f172a;">{{ $idx + 1 }}. {{ $f['label'] }}</span>
                            <span style="font-size: 11px; color: #64748b; margin-left: 6px;">({{ $f['sub'] }})</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span style="font-size: 16px; font-weight: 800; color: {{ $f['tone'] }};">{{ number_format($f['value']) }}</span>
                        </div>
                    </div>
                    <div style="width: 100%; height: 10px; background: #e2e8f0; border-radius: 9999px; overflow: hidden;">
                        <div style="height: 100%; width: {{ max($pct, 2) }}%; background: {{ $f['tone'] }}; border-radius: 9999px;"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Channel Conversion Table --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h2 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0;">Efektivitas Saluran Masuk (Acquisition Channel)</h2>
            <span style="font-size: 11px; font-weight: 600; color: #64748b;">{{ $totalLeads }} Total Leads &bull; {{ $wonDeals }} Won Deals</span>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Saluran / Kanal</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Porsi Prospek</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Jumlah Lead</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Deals Tercapai (Won)</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Rasio Konversi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($channels as $ch)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 12px; color: #0f172a; font-weight: 700;">{{ $ch['name'] }}</td>
                            <td style="padding: 12px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 80px; height: 6px; background: #f1f5f9; border-radius: 9999px; overflow: hidden;">
                                        <div style="height: 100%; width: {{ $ch['share'] }}%; background: #2563eb;"></div>
                                    </div>
                                    <span style="font-size: 11px; color: #64748b; font-weight: 600;">{{ $ch['share'] }}%</span>
                                </div>
                            </td>
                            <td style="padding: 12px; color: #0f172a; font-weight: 600;">{{ $ch['leads'] }} Prospek</td>
                            <td style="padding: 12px; color: #059669; font-weight: 700;">{{ $ch['won'] }} Proyek</td>
                            <td style="padding: 12px; color: #2563eb; font-weight: 700;">{{ $ch['conv_rate'] }}%</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 24px; text-align: center; color: #94a3b8;">Belum ada data konversi saluran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
