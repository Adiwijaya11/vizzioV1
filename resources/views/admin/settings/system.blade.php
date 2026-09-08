@extends('layouts.admin.app')

@section('title', 'Sistem & Konfigurasi — VizzioCraft')
@section('page_title', 'Sistem & Environment')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 9999px; background: #ede9fe; color: #7c3aed; font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; border: 1px solid #ddd6fe;">
                ★ Khusus Super Admin
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Informasi Sistem & Lingkungan Server</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Parameter runtime PHP, kerangka kerja Laravel 11, batas memori, dan konfigurasi inti backend.</p>
        </div>
        <div style="padding: 6px 14px; border-radius: 10px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #059669; font-size: 12px; font-weight: 700;">
            Environment: {{ strtoupper($envConfig['app_env']) }}
        </div>
    </div>

    {{-- Parameters Grid --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 26px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <h2 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 18px 0;">Spesifikasi Mesin Server & Runtime</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
            @foreach($envConfig as $key => $val)
                <div style="padding: 16px; border-radius: 14px; background: #f8fafc; border: 1px solid #eef2f6;">
                    <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">
                        {{ str_replace('_', ' ', strtoupper($key)) }}
                    </div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a; font-family: monospace;">
                        {{ $val }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- System Optimization Tips --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 26px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <h2 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0;">Optimasi Performa Web VizzioCraft</h2>
        <div style="display: flex; flex-direction: column; gap: 10px; font-size: 12.5px; color: #475569;">
            <div style="padding: 12px 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6; display: flex; align-items: center; justify-content: space-between;">
                <span>Vite Asset Bundler & Minification</span>
                <span style="color: #059669; font-weight: 700;">HMR Active & Fast Refresh</span>
            </div>
            <div style="padding: 12px 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6; display: flex; align-items: center; justify-content: space-between;">
                <span>Eloquent Query Cache & Prepared Statements</span>
                <span style="color: #059669; font-weight: 700;">Active & Optimized</span>
            </div>
            <div style="padding: 12px 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6; display: flex; align-items: center; justify-content: space-between;">
                <span>Lenis Smooth Scroll Engine</span>
                <span style="color: #2563eb; font-weight: 700;">Scoped to Landing Page</span>
            </div>
        </div>
    </div>

</div>
@endsection
