@extends('layouts.admin.app')

@section('title', 'Dashboard Overview — VizzioCraft')
@section('page_title', 'Dashboard Overview')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Welcome Hero Banner (Adaptive Role) --}}
    <div style="background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 60%, #3b82f6 100%); border-radius: 20px; padding: 28px 32px; color: #ffffff; position: relative; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.25);">
        <div style="position: absolute; right: -40px; top: -40px; width: 220px; height: 220px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%); border-radius: 50%; pointer-events: none;"></div>
        <div style="position: relative; z-index: 2; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
            <div>
                <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 4px 12px; border-radius: 9999px; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 10px; border: 1px solid rgba(255,255,255,0.2);">
                    <span style="width: 6px; height: 6px; border-radius: 50%; background: #4ade80;"></span>
                    @if(session('user_role') === 'super_admin')
                        Control Panel Terpusat — Super Admin
                    @else
                        Portal Manajemen Operasional — Administrator
                    @endif
                </div>
                <h1 style="font-size: 24px; font-weight: 800; margin: 0 0 6px 0; letter-spacing: -0.02em;">
                    Selamat Datang, {{ session('user_name', 'Administrator') }}!
                </h1>
                <p style="margin: 0; font-size: 13px; color: rgba(255,255,255,0.85); max-width: 640px; line-height: 1.5;">
                    @if(session('user_role') === 'super_admin')
                        Panel kendali penuh untuk mengelola pengguna, data sistem, keamanan, audit trail, serta seluruh modul konten publikasi.
                    @else
                        Kelola konten publikasi, artikel berita, proyek portofolio, katalog layanan, ulasan testimonial klien, dan pesan masuk dengan cepat dan mudah.
                    @endif
                </p>
            </div>

            <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                @if(session('user_role') === 'super_admin')
                    <a href="{{ route('admin.users.index') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #ffffff; color: #1e3a8a; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.15s;">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        Kelola Pengguna
                    </a>
                    <a href="{{ route('admin.backup.index') }}" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); color: #ffffff; font-weight: 600; font-size: 12px; padding: 10px 16px; border-radius: 12px; text-decoration: none; border: 1px solid rgba(255,255,255,0.25); transition: all 0.15s;">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                        Database MySQL
                    </a>
                @else
                    <a href="{{ route('admin.news.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #ffffff; color: #1e3a8a; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.15s;">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Tulis Artikel Baru
                    </a>
                    <a href="{{ route('admin.projects.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); color: #ffffff; font-weight: 600; font-size: 12px; padding: 10px 16px; border-radius: 12px; text-decoration: none; border: 1px solid rgba(255,255,255,0.25); transition: all 0.15s;">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Tambah Proyek
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- 6 Key Metric Cards --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px;">
        
        {{-- Card 1: Users (for super admin) or Visitors Today (for normal admin) --}}
        @if(session('user_role') === 'super_admin')
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">All Users</span>
                    <div style="width: 34px; height: 34px; border-radius: 10px; background: #ede9fe; color: #7c3aed; display: flex; align-items: center; justify-content: center;">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                </div>
                <div style="font-size: 24px; font-weight: 800; color: #0f172a; margin-bottom: 4px;">{{ $userCount }}</div>
                <div style="display: flex; align-items: center; justify-content: space-between; font-size: 11px;">
                    <span style="color: #64748b;">Admin & Super Admin</span>
                    <a href="{{ route('admin.users.index') }}" style="color: #7c3aed; font-weight: 700; text-decoration: none;">Kelola &rarr;</a>
                </div>
            </div>
        @else
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Visitor Hari Ini</span>
                    <div style="width: 34px; height: 34px; border-radius: 10px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                </div>
                <div style="font-size: 24px; font-weight: 800; color: #2563eb; margin-bottom: 4px;">{{ number_format($visitorToday) }}</div>
                <div style="display: flex; align-items: center; justify-content: space-between; font-size: 11px;">
                    <span style="color: #10b981; font-weight: 600;">Kunjungan Real-Time</span>
                    <a href="{{ route('admin.analytics.visitors') }}" style="color: #2563eb; font-weight: 700; text-decoration: none;">Analitik &rarr;</a>
                </div>
            </div>
        @endif

        {{-- Card 2: Proyek Aktif --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Proyek Aktif</span>
                <div style="width: 34px; height: 34px; border-radius: 10px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
            </div>
            <div style="font-size: 24px; font-weight: 800; color: #0f172a; margin-bottom: 4px;">{{ $proyekAktifCount }} <span style="font-size: 13px; font-weight: 500; color: #94a3b8;">/ {{ $proyekTotalCount }} Total</span></div>
            <div style="display: flex; align-items: center; justify-content: space-between; font-size: 11px;">
                <span style="color: #10b981; font-weight: 600;">Sedang Berjalan</span>
                <a href="{{ route('admin.projects.index') }}" style="color: #2563eb; font-weight: 700; text-decoration: none;">Kelola &rarr;</a>
            </div>
        </div>

        {{-- Card 3: Berita & Artikel --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Artikel Berita</span>
                <div style="width: 34px; height: 34px; border-radius: 10px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center;">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
            </div>
            <div style="font-size: 24px; font-weight: 800; color: #0f172a; margin-bottom: 4px;">{{ $newsCount }}</div>
            <div style="display: flex; align-items: center; justify-content: space-between; font-size: 11px;">
                <span style="color: #64748b;">Konten Publikasi</span>
                <a href="{{ route('admin.news.index') }}" style="color: #059669; font-weight: 700; text-decoration: none;">Tulis Baru &rarr;</a>
            </div>
        </div>

        {{-- Card 4: Pesan Masuk --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Pesan Baru</span>
                <div style="width: 34px; height: 34px; border-radius: 10px; background: #fff7ed; color: #ea580c; display: flex; align-items: center; justify-content: center;">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div style="font-size: 24px; font-weight: 800; color: #ea580c; margin-bottom: 4px;">{{ $pesanMasuk }}</div>
            <div style="display: flex; align-items: center; justify-content: space-between; font-size: 11px;">
                <span style="color: #64748b;">Belum Dibaca</span>
                <a href="{{ route('admin.messages.index') }}" style="color: #ea580c; font-weight: 700; text-decoration: none;">Buka Inbox &rarr;</a>
            </div>
        </div>

        {{-- Card 5: Permintaan Penawaran --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Leads Penawaran</span>
                <div style="width: 34px; height: 34px; border-radius: 10px; background: #fdf2f8; color: #db2777; display: flex; align-items: center; justify-content: center;">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
            </div>
            <div style="font-size: 24px; font-weight: 800; color: #0f172a; margin-bottom: 4px;">{{ $penawaran }}</div>
            <div style="display: flex; align-items: center; justify-content: space-between; font-size: 11px;">
                <span style="color: #64748b;">Pipeline Aktif</span>
                <a href="{{ route('admin.leads.index') }}" style="color: #db2777; font-weight: 700; text-decoration: none;">Pipeline &rarr;</a>
            </div>
        </div>

        {{-- Card 6: Katalog Layanan --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 18px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">Layanan Digital</span>
                <div style="width: 34px; height: 34px; border-radius: 10px; background: #f0fdfa; color: #0d9488; display: flex; align-items: center; justify-content: center;">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
            </div>
            <div style="font-size: 24px; font-weight: 800; color: #0f172a; margin-bottom: 4px;">{{ $layananCount }}</div>
            <div style="display: flex; align-items: center; justify-content: space-between; font-size: 11px;">
                <span style="color: #64748b;">Paket Ditampilkan</span>
                <a href="{{ route('admin.services.index') }}" style="color: #0d9488; font-weight: 700; text-decoration: none;">Kelola &rarr;</a>
            </div>
        </div>
    </div>

    {{-- Traffic Trend Chart & Visitor Summary --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 20px;">
            <div>
                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">Tren Kunjungan Website (7 Hari Terakhir)</h2>
                <p style="font-size: 12px; color: #64748b; margin: 0;">Data riil dari tabel log visitor web VizzioCraft.</p>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 10px; padding: 6px 14px; display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 11px; font-weight: 600; color: #1e40af;">Hari ini:</span>
                    <span style="font-size: 13px; font-weight: 800; color: #2563eb;">{{ number_format($visitorToday) }} Kunjungan</span>
                </div>
                <a href="{{ route('admin.analytics.visitors') }}" style="font-size: 12px; font-weight: 700; color: #2563eb; text-decoration: none; padding: 6px 12px; border-radius: 8px; background: #f8fafc;">
                    Detail Analitik &rarr;
                </a>
            </div>
        </div>

        <div style="width: 100%; height: 180px; position: relative;">
            <svg viewBox="0 0 {{ $w }} {{ $h }}" preserveAspectRatio="none" style="width: 100%; height: 100%; overflow: visible;">
                <defs>
                    <linearGradient id="chartGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#2563eb" stop-opacity="0.25" />
                        <stop offset="100%" stop-color="#2563eb" stop-opacity="0.0" />
                    </linearGradient>
                </defs>
                {{-- Grid lines --}}
                <line x1="{{ $padX }}" y1="{{ $padY }}" x2="{{ $w - $padX }}" y2="{{ $padY }}" stroke="#f1f5f9" stroke-width="1" stroke-dasharray="3,3" />
                <line x1="{{ $padX }}" y1="{{ ($h - $padY * 2) / 2 + $padY }}" x2="{{ $w - $padX }}" y2="{{ ($h - $padY * 2) / 2 + $padY }}" stroke="#f1f5f9" stroke-width="1" stroke-dasharray="3,3" />
                <line x1="{{ $padX }}" y1="{{ $h - $padY }}" x2="{{ $w - $padX }}" y2="{{ $h - $padY }}" stroke="#e2e8f0" stroke-width="1" />

                {{-- Area & Line --}}
                <polygon points="{{ $traffic['area'] }}" fill="url(#chartGrad)" />
                <polyline points="{{ $traffic['line'] }}" fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />

                {{-- Data Points --}}
                @foreach($traffic['points'] as $idx => $pt)
                    <circle cx="{{ $pt[0] }}" cy="{{ $pt[1] }}" r="4" fill="#ffffff" stroke="#2563eb" stroke-width="2.5" />
                    <text x="{{ $pt[0] }}" y="{{ $h - 5 }}" font-size="10" font-family="'Poppins', sans-serif" font-weight="600" fill="#94a3b8" text-anchor="middle">{{ $days[$idx] ?? '' }}</text>
                    <text x="{{ $pt[0] }}" y="{{ $pt[1] - 8 }}" font-size="10" font-family="'Poppins', sans-serif" font-weight="700" fill="#1e3a8a" text-anchor="middle">{{ $traffic['values'][$idx] ?? 0 }}</text>
                @endforeach
            </svg>
        </div>
    </div>

    {{-- Dedicated Modules Quick Navigation Grid (Role-Filtered) --}}
    <div>
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px;">
            <h2 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0;">Pintas Modul Admin</h2>
            <span style="font-size: 11px; font-weight: 600; color: #64748b;">Akses langsung per halaman modul</span>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 14px;">
            
            {{-- Super Admin Only: All Users --}}
            @if(session('user_role') === 'super_admin')
            <a href="{{ route('admin.users.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#7c3aed'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #ede9fe; color: #7c3aed; display: flex; align-items: center; justify-content: center; shrink-0: 0;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">All Users Management</div>
                    <div style="font-size: 11px; color: #64748b;">CRUD Admin & Role</div>
                </div>
            </a>
            @endif

            {{-- Modul: Berita & Artikel --}}
            <a href="{{ route('admin.news.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#2563eb'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Berita & Artikel</div>
                    <div style="font-size: 11px; color: #64748b;">CRUD {{ $newsCount }} Artikel</div>
                </div>
            </a>

            {{-- Modul: Portofolio & Proyek --}}
            <a href="{{ route('admin.projects.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#2563eb'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Portofolio & Proyek</div>
                    <div style="font-size: 11px; color: #64748b;">CRUD {{ $proyekTotalCount }} Proyek</div>
                </div>
            </a>

            {{-- Modul: Layanan Digital --}}
            <a href="{{ route('admin.services.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#0d9488'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #f0fdfa; color: #0d9488; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Layanan Digital</div>
                    <div style="font-size: 11px; color: #64748b;">CRUD {{ $layananCount }} Layanan</div>
                </div>
            </a>

            {{-- Modul: Manajemen Tim --}}
            <a href="{{ route('admin.team.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#2563eb'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #f0f9ff; color: #0284c7; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Manajemen Tim</div>
                    <div style="font-size: 11px; color: #64748b;">CRUD Personel & Tim</div>
                </div>
            </a>

            {{-- Modul: Testimonial Klien --}}
            <a href="{{ route('admin.testimonials.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#f59e0b'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #fffbeb; color: #d97706; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Testimonial Klien</div>
                    <div style="font-size: 11px; color: #64748b;">CRUD Ulasan & Rating</div>
                </div>
            </a>

            {{-- Modul: Galeri Media --}}
            <a href="{{ route('admin.gallery.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#8b5cf6'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #f5f3ff; color: #7c3aed; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Galeri Media</div>
                    <div style="font-size: 11px; color: #64748b;">Aset Gambar & Banner</div>
                </div>
            </a>

            {{-- Modul: Pesan Kontak --}}
            <a href="{{ route('admin.messages.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#ea580c'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #fff7ed; color: #ea580c; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Pesan Kontak</div>
                    <div style="font-size: 11px; color: #64748b;">{{ $pesanMasuk }} Pesan Baru</div>
                </div>
            </a>

            {{-- Modul: Permintaan Penawaran --}}
            <a href="{{ route('admin.leads.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#db2777'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #fdf2f8; color: #db2777; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Permintaan Penawaran</div>
                    <div style="font-size: 11px; color: #64748b;">CRM Pipeline Prospek</div>
                </div>
            </a>

            {{-- Modul: Analitik Pengunjung --}}
            <a href="{{ route('admin.analytics.visitors') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#2563eb'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Analitik Pengunjung</div>
                    <div style="font-size: 11px; color: #64748b;">Traffic & Sumber Rujukan</div>
                </div>
            </a>

            {{-- Modul: Laporan Traffic --}}
            <a href="{{ route('admin.analytics.traffic') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#10b981'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Laporan Traffic & Funnel</div>
                    <div style="font-size: 11px; color: #64748b;">Konversi Lead & Won Deal</div>
                </div>
            </a>

            {{-- Modul: Profil Perusahaan --}}
            <a href="{{ route('admin.settings.profile') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#059669'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Profil Perusahaan</div>
                    <div style="font-size: 11px; color: #64748b;">Kontak, Visi & Sosial</div>
                </div>
            </a>

            {{-- Modul: Halaman Statis --}}
            <a href="{{ route('admin.settings.pages') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#2563eb'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Halaman Statis</div>
                    <div style="font-size: 11px; color: #64748b;">Rute & Meta Halaman</div>
                </div>
            </a>

            {{-- Modul: SEO & Meta Tag --}}
            <a href="{{ route('admin.settings.seo') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#2563eb'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">SEO & Meta Tag</div>
                    <div style="font-size: 11px; color: #64748b;">Pratinjau SERP Google</div>
                </div>
            </a>

            {{-- Modul: Banner & Hero Section --}}
            <a href="{{ route('admin.settings.banner') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#2563eb'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Banner & Hero</div>
                    <div style="font-size: 11px; color: #64748b;">Live Preview & CTA</div>
                </div>
            </a>

            {{-- Super Admin Only: Audit Log & Backup --}}
            @if(session('user_role') === 'super_admin')
            <a href="{{ route('admin.logs.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#64748b'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #f1f5f9; color: #475569; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Audit Trail Aktivitas</div>
                    <div style="font-size: 11px; color: #64748b;">Histori Log Real-Time</div>
                </div>
            </a>

            <a href="{{ route('admin.backup.index') }}" style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px; text-decoration: none; color: inherit; transition: all 0.15s; display: flex; align-items: center; gap: 14px;" onmouseover="this.style.borderColor='#2563eb'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e8edf5'; this.style.transform='none'">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Backup Database</div>
                    <div style="font-size: 11px; color: #64748b;">Snapshot MySQL</div>
                </div>
            </a>
            @endif

        </div>
    </div>

    {{-- Two Columns: Recent Projects & Recent Messages + Activity/Health --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: 20px;">
        
        {{-- Column 1: Proyek Terkini & Pesan Masuk --}}
        <div style="display: flex; flex-direction: column; gap: 20px;">
            {{-- Proyek Terkini --}}
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                    <h3 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0;">Proyek Portofolio Terkini</h3>
                    <a href="{{ route('admin.projects.index') }}" style="font-size: 11px; font-weight: 700; color: #2563eb; text-decoration: none;">Semua Proyek &rarr;</a>
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @forelse($recentProjects as $p)
                        <div style="padding: 12px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6; display: flex; align-items: center; justify-content: space-between; gap: 12px;">
                            <div>
                                <div style="font-size: 12px; font-weight: 700; color: #0f172a;">{{ $p->name }}</div>
                                <div style="font-size: 11px; color: #64748b;">Klien: {{ $p->client }} &bull; Rp {{ number_format($p->budget, 0, ',', '.') }}</div>
                            </div>
                            <span style="font-size: 10px; font-weight: 700; padding: 3px 8px; border-radius: 6px; text-transform: uppercase;
                                @if($p->status === 'active') background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe;
                                @elseif($p->status === 'completed') background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;
                                @else background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; @endif">
                                {{ $p->status }}
                            </span>
                        </div>
                    @empty
                        <p style="font-size: 12px; color: #94a3b8; margin: 0;">Belum ada proyek.</p>
                    @endforelse
                </div>
            </div>

            {{-- Pesan Masuk Terbaru --}}
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                    <h3 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0;">Pesan Kontak Terkini</h3>
                    <a href="{{ route('admin.messages.index') }}" style="font-size: 11px; font-weight: 700; color: #2563eb; text-decoration: none;">Semua Pesan &rarr;</a>
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @forelse($recentMessages as $m)
                        <div style="padding: 12px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6; display: flex; align-items: flex-start; justify-content: space-between; gap: 12px;">
                            <div style="min-width: 0;">
                                <div style="display: flex; align-items: center; gap: 6px;">
                                    <span style="font-size: 12px; font-weight: 700; color: #0f172a;">{{ $m->name }}</span>
                                    @if($m->status === 'unread')
                                        <span style="font-size: 9px; font-weight: 800; background: #fee2e2; color: #dc2626; padding: 1px 5px; border-radius: 4px;">BARU</span>
                                    @endif
                                </div>
                                <div style="font-size: 11px; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $m->subject ?: $m->message }}</div>
                            </div>
                            <span style="font-size: 10px; color: #94a3b8; shrink-0: 0;">{{ $m->created_at->diffForHumans() }}</span>
                        </div>
                    @empty
                        <p style="font-size: 12px; color: #94a3b8; margin: 0;">Belum ada pesan kontak.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Column 2: Audit Logs & Sistem Kesehatan --}}
        <div style="display: flex; flex-direction: column; gap: 20px;">
            {{-- Aktivitas Terakhir --}}
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                    <h3 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0;">Log Aktivitas Terakhir</h3>
                    @if(session('user_role') === 'super_admin')
                        <a href="{{ route('admin.logs.index') }}" style="font-size: 11px; font-weight: 700; color: #2563eb; text-decoration: none;">Semua Log &rarr;</a>
                    @endif
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @forelse($recentLogs as $log)
                        <div style="padding: 10px 12px; border-radius: 12px; background: #f8fafc; border: 1px solid #eef2f6; display: flex; align-items: flex-start; justify-content: space-between; gap: 12px;">
                            <div>
                                <div style="font-size: 11.5px; font-weight: 700; color: #1e293b;">{{ $log->user_name }} &bull; <span style="color: #64748b; font-weight: 500;">{{ $log->action }}</span></div>
                                <div style="font-size: 11px; color: #64748b; margin-top: 2px;">{{ $log->description }}</div>
                            </div>
                            <span style="font-size: 10px; color: #94a3b8; shrink-0: 0;">{{ $log->created_at->format('H:i') }}</span>
                        </div>
                    @empty
                        <p style="font-size: 12px; color: #94a3b8; margin: 0;">Belum ada log aktivitas.</p>
                    @endforelse
                </div>
            </div>

            {{-- Status Ekosistem Operasional --}}
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <h3 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0 0 14px 0;">Status Ekosistem Layanan</h3>
                <div style="display: flex; flex-direction: column; gap: 10px; font-size: 12px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 8px 12px; border-radius: 10px; background: #f8fafc;">
                        <span style="color: #64748b; font-weight: 600;">Status Operasional</span>
                        <span style="color: #059669; font-weight: 700; display: flex; align-items: center; gap: 5px;">
                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span>
                            Normal (Semua Modul Aktif)
                        </span>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 8px 12px; border-radius: 10px; background: #f8fafc;">
                        <span style="color: #64748b; font-weight: 600;">Peran Akun Anda</span>
                        <span style="font-weight: 700; color: {{ session('user_role') === 'super_admin' ? '#7c3aed' : '#2563eb' }};">
                            {{ session('user_role') === 'super_admin' ? 'Super Administrator' : 'Administrator Konten' }}
                        </span>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 8px 12px; border-radius: 10px; background: #f8fafc;">
                        <span style="color: #64748b; font-weight: 600;">Sinkronisasi Publik</span>
                        <span style="color: #059669; font-weight: 700;">Live Terhubung ke Website</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
