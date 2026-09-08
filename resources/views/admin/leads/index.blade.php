@extends('layouts.admin.app')

@section('title', 'Permintaan Penawaran — VizzioCraft')
@section('page_title', 'Permintaan Penawaran')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Permintaan Penawaran & CRM Leads</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola pipeline prospek masuk, estimasi anggaran proyek klien, dan follow-up penawaran resmi.</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <div style="padding: 8px 14px; border-radius: 12px; background: #eff6ff; border: 1px solid #bfdbfe; color: #1d4ed8; font-size: 12px; font-weight: 700;">
                {{ $newCount }} Lead Baru
            </div>
            <div style="padding: 8px 14px; border-radius: 12px; background: #ede9fe; border: 1px solid #ddd6fe; color: #7c3aed; font-size: 12px; font-weight: 700;">
                {{ $proposalCount }} Tahap Proposal
            </div>
            <div style="padding: 8px 14px; border-radius: 12px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #059669; font-size: 12px; font-weight: 700;">
                {{ $wonCount }} Won Deals
            </div>
        </div>
    </div>

    {{-- Filter Bar --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 16px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <form method="GET" action="{{ route('admin.leads.index') }}" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin: 0;">
            <div style="flex: 1; min-width: 220px; position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama klien, instansi, email..." style="width: 100%; padding: 9px 14px 9px 36px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; outline: none; font-family: 'Poppins', sans-serif;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #94a3b8;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select name="status" style="padding: 9px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; color: #475569; outline: none; background: #fff; font-family: 'Poppins', sans-serif;">
                <option value="all">Semua Status Pipeline</option>
                <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New (Baru Masuk)</option>
                <option value="qualified" {{ request('status') == 'qualified' ? 'selected' : '' }}>Qualified (Terkualifikasi)</option>
                <option value="proposal" {{ request('status') == 'proposal' ? 'selected' : '' }}>Proposal (Kirim Penawaran)</option>
                <option value="won" {{ request('status') == 'won' ? 'selected' : '' }}>Won (Deal Menang)</option>
                <option value="lost" {{ request('status') == 'lost' ? 'selected' : '' }}>Lost (Tidak Deal)</option>
            </select>
            <button type="submit" style="padding: 9px 18px; border-radius: 10px; background: #0f172a; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">
                Filter
            </button>
            @if(request('search') || (request('status') && request('status') !== 'all'))
                <a href="{{ route('admin.leads.index') }}" style="padding: 9px 14px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Reset</a>
            @endif
        </form>
    </div>

    {{-- Leads Table --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Klien & Perusahaan</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Layanan Diminta</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Estimasi Budget</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Status Pipeline</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Tanggal</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 14px 12px;">
                                <div style="font-size: 13px; font-weight: 700; color: #0f172a;">{{ $lead->name }}</div>
                                <div style="font-size: 11px; color: #64748b;">
                                    <strong style="color: #1e293b;">{{ $lead->company }}</strong> &bull; {{ $lead->email }}
                                </div>
                            </td>
                            <td style="padding: 12px;">
                                <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 600; border: 1px solid #bfdbfe;">
                                    {{ $lead->service_interest ?: 'General Software' }}
                                </span>
                            </td>
                            <td style="padding: 12px; color: #059669; font-weight: 700;">
                                {{ $lead->budget_range ?: 'Disesuaikan' }}
                            </td>
                            <td style="padding: 12px;">
                                @if($lead->status === 'new')
                                    <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 6px; background: #eff6ff; color: #2563eb; font-size: 10px; font-weight: 800; border: 1px solid #bfdbfe;">
                                        NEW LEAD
                                    </span>
                                @elseif($lead->status === 'qualified')
                                    <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #fef3c7; color: #d97706; font-size: 10px; font-weight: 800; border: 1px solid #fde68a;">
                                        QUALIFIED
                                    </span>
                                @elseif($lead->status === 'proposal')
                                    <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #f5f3ff; color: #7c3aed; font-size: 10px; font-weight: 800; border: 1px solid #ddd6fe;">
                                        PROPOSAL SENT
                                    </span>
                                @elseif($lead->status === 'won')
                                    <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 6px; background: #ecfdf5; color: #059669; font-size: 10px; font-weight: 800; border: 1px solid #a7f3d0;">
                                        WON DEAL
                                    </span>
                                @else
                                    <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #f1f5f9; color: #64748b; font-size: 10px; font-weight: 700; border: 1px solid #e2e8f0;">
                                        LOST
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 12px; color: #64748b; font-size: 11px; white-space: nowrap;">
                                {{ $lead->created_at->format('d M Y') }}
                            </td>
                            <td style="padding: 12px; text-align: right; white-space: nowrap;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    <a href="{{ route('admin.leads.show', $lead->id) }}" style="padding: 6px 12px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 11px; text-decoration: none; border: 1px solid #bfdbfe;">
                                        Detail Prospek
                                    </a>
                                    <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Hapus penawaran ini?')" style="margin: 0; display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding: 6px 10px; border-radius: 8px; background: #fef2f2; color: #dc2626; font-weight: 700; font-size: 11px; border: 1px solid #fecaca; cursor: pointer; font-family: 'Poppins', sans-serif;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 32px; text-align: center; color: #94a3b8;">
                                Belum ada prospek penawaran yang sesuai filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
            <div style="margin-top: 20px;">
                {{ $leads->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
