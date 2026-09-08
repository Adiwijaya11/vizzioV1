@extends('layouts.admin.app')

@section('title', 'Audit Log Aktivitas — VizzioCraft')
@section('page_title', 'Audit Trail Aktivitas')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 9999px; background: #ede9fe; color: #7c3aed; font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; border: 1px solid #ddd6fe;">
                ★ Khusus Super Admin
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Audit Trail Aktivitas & Histori Tindakan</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Rekaman jejak digital kepatuhan sistem mencatat setiap operasi perubahan data, pembaruan konten, dan login administrator.</p>
        </div>
        <div style="padding: 8px 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0; color: #475569; font-size: 12px; font-weight: 700;">
            Total {{ $totalLogs }} Catatan Audit Log
        </div>
    </div>

    {{-- Filter Bar --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 16px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <form method="GET" action="{{ route('admin.logs.index') }}" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin: 0;">
            <div style="flex: 1; min-width: 220px; position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama admin, rincian aktivitas, IP..." style="width: 100%; padding: 9px 14px 9px 36px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; outline: none; font-family: 'Poppins', sans-serif;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #94a3b8;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select name="action" style="padding: 9px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; color: #475569; outline: none; background: #fff; font-family: 'Poppins', sans-serif;">
                <option value="all">Semua Tipe Aksi</option>
                <option value="login" {{ request('action') == 'login' ? 'selected' : '' }}>Login</option>
                <option value="create_news" {{ request('action') == 'create_news' ? 'selected' : '' }}>Create News</option>
                <option value="update_news" {{ request('action') == 'update_news' ? 'selected' : '' }}>Update News</option>
                <option value="create_project" {{ request('action') == 'create_project' ? 'selected' : '' }}>Create Project</option>
                <option value="create_user" {{ request('action') == 'create_user' ? 'selected' : '' }}>Create User</option>
                <option value="system_backup" {{ request('action') == 'system_backup' ? 'selected' : '' }}>System Backup</option>
            </select>
            <button type="submit" style="padding: 9px 18px; border-radius: 10px; background: #0f172a; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">
                Filter
            </button>
            @if(request('search') || (request('action') && request('action') !== 'all'))
                <a href="{{ route('admin.logs.index') }}" style="padding: 9px 14px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Reset</a>
            @endif
        </form>
    </div>

    {{-- Audit Logs Table --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Waktu & Tanggal</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Administrator</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Aksi</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Rincian Deskripsi</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Alamat IP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 12px; color: #64748b; font-size: 11px; white-space: nowrap;">
                                {{ $log->created_at->format('d M Y, H:i:s') }}
                            </td>
                            <td style="padding: 12px; white-space: nowrap;">
                                <div style="font-weight: 700; color: #0f172a;">{{ $log->user_name }}</div>
                                <div style="font-size: 10.5px; color: #94a3b8;">UID: #{{ $log->user_id ?: 'Sys' }}</div>
                            </td>
                            <td style="padding: 12px; white-space: nowrap;">
                                <span style="font-size: 10px; font-weight: 700; font-family: monospace; padding: 2px 7px; border-radius: 6px; background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0;">
                                    {{ $log->action }}
                                </span>
                            </td>
                            <td style="padding: 12px; color: #1e293b; max-width: 440px;">
                                {{ $log->description }}
                            </td>
                            <td style="padding: 12px; font-family: monospace; color: #64748b; font-size: 11px; white-space: nowrap;">
                                {{ $log->ip_address ?: '127.0.0.1' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 32px; text-align: center; color: #94a3b8;">
                                Belum ada log aktivitas yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div style="margin-top: 20px;">
                {{ $logs->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
