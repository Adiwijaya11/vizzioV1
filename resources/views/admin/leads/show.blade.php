@extends('layouts.admin.app')

@section('title', 'Rincian Penawaran — VizzioCraft')
@section('page_title', 'Rincian Penawaran')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Detail Prospek & Penawaran Klien</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Klien: <strong style="color: #2563eb;">{{ $lead->name }}</strong> ({{ $lead->company }})</p>
        </div>
        <a href="{{ route('admin.leads.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        
        {{-- Metadata Grid --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 20px; margin-bottom: 20px;">
            <div>
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">Perusahaan Klien</span>
                <div style="font-size: 14px; font-weight: 800; color: #0f172a; margin-top: 2px;">{{ $lead->company }}</div>
                <div style="font-size: 12px; color: #64748b;">Kontak PIC: {{ $lead->name }}</div>
            </div>

            <div>
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">Kontak Komunikasi</span>
                <div style="font-size: 13px; color: #2563eb; font-weight: 600; margin-top: 2px;">
                    <a href="mailto:{{ $lead->email }}" style="color: inherit; text-decoration: none;">{{ $lead->email }}</a>
                </div>
                @if($lead->phone)
                    <div style="font-size: 12px; color: #64748b;">Tel: {{ $lead->phone }}</div>
                @endif
            </div>

            <div>
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">Layanan Diminati</span>
                <div style="font-size: 14px; font-weight: 800; color: #2563eb; margin-top: 2px;">{{ $lead->service_interest ?: 'General Development' }}</div>
                <div style="font-size: 12px; color: #059669; font-weight: 700;">Budget: {{ $lead->budget_range ?: 'Fleksibel' }}</div>
            </div>

            <div>
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">Status Pipeline Saat Ini</span>
                <div style="margin-top: 4px;">
                    @if($lead->status === 'new')
                        <span style="padding: 4px 10px; border-radius: 6px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 800; border: 1px solid #bfdbfe;">NEW LEAD</span>
                    @elseif($lead->status === 'qualified')
                        <span style="padding: 4px 10px; border-radius: 6px; background: #fef3c7; color: #d97706; font-size: 11px; font-weight: 800; border: 1px solid #fde68a;">QUALIFIED</span>
                    @elseif($lead->status === 'proposal')
                        <span style="padding: 4px 10px; border-radius: 6px; background: #f5f3ff; color: #7c3aed; font-size: 11px; font-weight: 800; border: 1px solid #ddd6fe;">PROPOSAL SENT</span>
                    @elseif($lead->status === 'won')
                        <span style="padding: 4px 10px; border-radius: 6px; background: #ecfdf5; color: #059669; font-size: 11px; font-weight: 800; border: 1px solid #a7f3d0;">WON DEAL</span>
                    @else
                        <span style="padding: 4px 10px; border-radius: 6px; background: #f1f5f9; color: #64748b; font-size: 11px; font-weight: 800; border: 1px solid #e2e8f0;">LOST</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Lead Requirements / Message --}}
        <div style="margin-bottom: 24px;">
            <div style="font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 8px;">Kebutuhan Proyek & Catatan Klien:</div>
            <div style="font-size: 13.5px; line-height: 1.7; color: #334155; white-space: pre-line; background: #f8fafc; padding: 22px; border-radius: 14px; border: 1px solid #eef2f6;">
                {{ $lead->message ?: 'Tidak ada pesan tertulis tambahan.' }}
            </div>
        </div>

        {{-- Pipeline Updater Bar --}}
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
            <form action="{{ route('admin.leads.update', $lead->id) }}" method="POST" style="margin: 0; display: flex; gap: 10px; align-items: center;">
                @csrf
                @method('PATCH')
                <label style="font-size: 12px; font-weight: 700; color: #1e293b;">Pindahkan Tahap Pipeline:</label>
                <select name="status" style="padding: 8px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif; background: #fff;">
                    <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New (Lead Baru)</option>
                    <option value="qualified" {{ $lead->status === 'qualified' ? 'selected' : '' }}>Qualified (Prospek Sesuai)</option>
                    <option value="proposal" {{ $lead->status === 'proposal' ? 'selected' : '' }}>Proposal (Kirim Penawaran)</option>
                    <option value="won" {{ $lead->status === 'won' ? 'selected' : '' }}>Won (Kesepakatan Deal)</option>
                    <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>Lost (Batal/Tidak Deal)</option>
                </select>
                <button type="submit" style="padding: 8px 16px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">
                    Simpan Perubahan Tahap
                </button>
            </form>

            <div style="display: flex; gap: 8px;">
                <a href="mailto:{{ $lead->email }}?subject=Penawaran Resmi Proyek VizzioCraft — {{ rawurlencode($lead->company) }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 10px; background: #0f172a; color: #fff; font-size: 12px; font-weight: 700; text-decoration: none;">
                    Kirim Email Proposal
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
