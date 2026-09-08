@extends('layouts.admin.app')

@section('title', 'Notifikasi Sistem — VizzioCraft')
@section('page_title', 'Notifikasi Sistem')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Pusat Notifikasi & Peringatan Sistem</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Pemberitahuan otomatis terkait integritas basis data, audit keamanan, dan interaksi penting klien.</p>
        </div>
        <div style="padding: 6px 14px; border-radius: 10px; background: #eff6ff; border: 1px solid #bfdbfe; color: #2563eb; font-size: 12px; font-weight: 700;">
            Semua Sistem Normal
        </div>
    </div>

    {{-- Notification List --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="display: flex; flex-direction: column; gap: 14px;">
            @foreach($notifications as $n)
                <div style="padding: 16px 20px; border-radius: 14px; background: {{ $n['read'] ? '#ffffff' : '#f8fafc' }}; border: 1px solid {{ $n['read'] ? '#f1f5f9' : '#e2e8f0' }}; display: flex; align-items: flex-start; justify-content: space-between; gap: 16px;">
                    <div style="display: flex; align-items: flex-start; gap: 14px;">
                        <div style="width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; shrink-0: 0;
                            @if($n['type'] === 'success') background: #ecfdf5; color: #059669;
                            @elseif($n['type'] === 'warning') background: #fffbeb; color: #d97706;
                            @else background: #eff6ff; color: #2563eb; @endif">
                            @if($n['type'] === 'success')
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            @elseif($n['type'] === 'warning')
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            @else
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @endif
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 2px;">
                                <span style="font-size: 13px; font-weight: 800; color: #0f172a;">{{ $n['title'] }}</span>
                                <span style="font-size: 10px; font-weight: 700; padding: 1px 6px; border-radius: 4px; background: #f1f5f9; color: #475569;">{{ $n['category'] }}</span>
                                @if(!$n['read'])
                                    <span style="width: 6px; height: 6px; border-radius: 50%; background: #2563eb;"></span>
                                @endif
                            </div>
                            <div style="font-size: 12px; color: #64748b; line-height: 1.5;">{{ $n['desc'] }}</div>
                        </div>
                    </div>
                    <span style="font-size: 11px; color: #94a3b8; white-space: nowrap;">{{ $n['time'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
