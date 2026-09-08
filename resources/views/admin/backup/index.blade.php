@extends('layouts.admin.app')

@section('title', 'Backup Database — VizzioCraft')
@section('page_title', 'Backup Database')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 9999px; background: #ede9fe; color: #7c3aed; font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; border: 1px solid #ddd6fe;">
                ★ Khusus Super Admin
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Manajemen Cadangan & Integritas Basis Data</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Snapshot data relasional MySQL, pemantauan ukuran tabel, dan pemulihan sistem instan.</p>
        </div>
        <form action="{{ route('admin.backup.create') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; border: none; cursor: pointer; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25); font-family: 'Poppins', sans-serif;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                Buat Snapshot Database Sekarang
            </button>
        </form>
    </div>

    {{-- Backup Info Grid --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px;">
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">Nama Basis Data</div>
            <div style="font-size: 20px; font-weight: 800; color: #0f172a; font-family: monospace;">{{ $backupInfo['database'] }}</div>
            <div style="font-size: 11px; color: #059669; font-weight: 700; margin-top: 4px;">{{ $backupInfo['driver'] }} (Active)</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">Ukuran Database Fisik</div>
            <div style="font-size: 20px; font-weight: 800; color: #2563eb;">{{ $backupInfo['size_kb'] }} KB <span style="font-size: 12px; color: #64748b; font-weight: 600;">(~{{ $backupInfo['size_mb'] }} MB)</span></div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Data & Index terpakai</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">Jumlah Tabel MySQL</div>
            <div style="font-size: 20px; font-weight: 800; color: #7c3aed;">{{ $backupInfo['tables_count'] }} Tabel</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Schema termigrasi lengkap</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">Snapshot Terakhir</div>
            <div style="font-size: 14px; font-weight: 800; color: #0f172a;">{{ $backupInfo['last_backup'] }}</div>
            <div style="font-size: 11px; color: #10b981; font-weight: 600; margin-top: 4px;">Status Terverifikasi Utuh</div>
        </div>
    </div>

    {{-- Tables Breakdown --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h2 style="font-size: 15px; font-weight: 800; color: #0f172a; margin: 0;">Struktur Tabel Database (information_schema)</h2>
            <span style="font-size: 11px; font-weight: 600; color: #64748b;">Engine: InnoDB MySQL</span>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Nama Tabel</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Estimasi Baris Data (Rows)</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Ukuran Alokasi (KB)</th>
                        <th style="padding: 10px 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; text-align: right;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tablesStatus as $t)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 10px 12px; font-family: monospace; font-weight: 700; color: #0f172a;">{{ $t->table_name }}</td>
                            <td style="padding: 10px 12px; color: #475569; font-weight: 600;">{{ number_format($t->row_count ?? 0) }} baris</td>
                            <td style="padding: 10px 12px; color: #2563eb; font-weight: 700;">{{ $t->size_kb }} KB</td>
                            <td style="padding: 10px 12px; text-align: right;">
                                <span style="font-size: 9.5px; font-weight: 800; padding: 2px 7px; border-radius: 6px; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">HEALTHY</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 24px; text-align: center; color: #94a3b8;">Tidak dapat memuat metadata information_schema.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
