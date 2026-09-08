@extends('layouts.admin.app')

@section('title', 'Pusat Keamanan — VizzioCraft')
@section('page_title', 'Pusat Keamanan & Sesi')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 9999px; background: #ede9fe; color: #7c3aed; font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; border: 1px solid #ddd6fe;">
                ★ Khusus Super Admin
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Pusat Keamanan & Status Sesi Aktif</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Parameter pertahanan sistem, verifikasi token CSRF, proteksi TLS HTTPS, dan parameter sesi administrator.</p>
        </div>
        <div style="padding: 8px 16px; border-radius: 12px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #059669; font-size: 12px; font-weight: 800; display: flex; align-items: center; gap: 6px;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981;"></span>
            Skor Keamanan: {{ $securityInfo['security_score'] }}
        </div>
    </div>

    {{-- Security Parameter Grid --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 26px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <h2 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 18px 0;">Inspeksi Parameter Keamanan Real-Time</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px;">
            @foreach($securityInfo as $key => $val)
                <div style="padding: 16px; border-radius: 14px; background: #f8fafc; border: 1px solid #eef2f6;">
                    <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">
                        {{ str_replace('_', ' ', strtoupper($key)) }}
                    </div>
                    <div style="font-size: 13.5px; font-weight: 700; color: #0f172a; word-break: break-word;">
                        {{ $val }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Active Session Details --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 26px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <h2 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 16px 0;">Sesi Aktif Administrator Anda</h2>
        <div style="display: flex; flex-direction: column; gap: 12px; font-size: 13px;">
            <div style="display: flex; justify-content: space-between; padding: 12px 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6;">
                <span style="color: #64748b; font-weight: 600;">Akun Pengguna</span>
                <span style="color: #0f172a; font-weight: 700;">{{ session('user_name') }} ({{ session('user_email') }})</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 12px 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6;">
                <span style="color: #64748b; font-weight: 600;">Tingkat Hak Akses</span>
                <span style="color: #7c3aed; font-weight: 800;">{{ strtoupper(session('user_role')) }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 12px 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6;">
                <span style="color: #64748b; font-weight: 600;">Waktu Login Sesi</span>
                <span style="color: #0f172a; font-weight: 700;">{{ $securityInfo['login_time'] }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 12px 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6;">
                <span style="color: #64748b; font-weight: 600;">Driver Session Laravel</span>
                <span style="color: #059669; font-weight: 700;">{{ $securityInfo['session_driver'] }} (Lifetime: {{ $securityInfo['session_lifetime'] }})</span>
            </div>
        </div>
    </div>

</div>
@endsection
