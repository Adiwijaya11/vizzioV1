<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel — VizzioCraft')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        html, body { margin: 0; padding: 0; height: 100vh; overflow: hidden; font-family: 'Poppins', sans-serif; }

        /* === SIDEBAR: fixed flex layout, guaranteed scroll === */
        .admin-sidebar {
            position: fixed;
            top: 0; left: 0;
            width: 268px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            box-shadow: 4px 0 24px -12px rgba(15, 23, 42, 0.08);
            z-index: 50;
            display: flex;
            flex-direction: column;
        }
        .sidebar-brand {
            flex-shrink: 0;
            height: 70px;
            padding: 0 18px;
            border-bottom: 1px solid #f1f5f9;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .sidebar-footer {
            flex-shrink: 0;
            padding: 12px;
            border-top: 1px solid #f1f5f9;
            background: #ffffff;
        }
        /* Nav area fills remaining space between brand and footer */
        .sidebar-nav-wrap {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            overflow-x: hidden;
            overscroll-behavior: contain;
            -webkit-overflow-scrolling: touch;
            padding: 16px 12px 12px;
        }

        /* === HIDE SCROLLBARS — scroll still works === */
        .sidebar-nav-wrap::-webkit-scrollbar,
        .admin-main::-webkit-scrollbar { display: none; }
        .sidebar-nav-wrap,
        .admin-main { -ms-overflow-style: none; scrollbar-width: none; }

        /* === MAIN CONTENT (offset by sidebar width) === */
        .admin-content {
            margin-left: 268px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: #F8FAFC;
        }
        .admin-topbar {
            flex-shrink: 0;
            border-bottom: 1px solid #e2e8f0;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(16px);
            padding: 12px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .admin-main {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            overflow-x: hidden;
            overscroll-behavior: contain;
            -webkit-overflow-scrolling: touch;
            padding: 28px 32px;
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        /* === NAV ITEMS === */
        .nav-group         { margin-bottom: 18px; }
        .nav-group.sa-group {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 10px 8px;
            margin-bottom: 18px;
        }
        .nav-label {
            font-size: 10px;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 0 10px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nav-label.sa {
            color: #1e3a8a;
            padding: 0 8px;
            margin-bottom: 8px;
        }
        .nav-sa-pill {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 2px 6px;
            border-radius: 6px;
            background: #dbeafe;
            color: #1e3a8a;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            margin-bottom: 2px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 500;
            color: #475569;
            text-decoration: none;
            transition: background-color 0.15s ease, color 0.15s ease, box-shadow 0.15s ease;
        }
        .nav-link svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            color: #94a3b8;
            transition: color 0.15s ease;
        }
        .nav-link:hover {
            color: #0f172a;
            background: #f1f5f9;
        }
        .nav-link:hover svg {
            color: #2563eb;
        }
        .nav-link.active {
            color: #ffffff;
            font-weight: 600;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            box-shadow: 0 4px 12px -2px rgba(37, 99, 235, 0.28);
        }
        .nav-link.active svg {
            color: #ffffff;
        }
        .nav-link.sa-item {
            color: #334155;
        }
        .nav-link.sa-item svg {
            color: #64748b;
        }
        .nav-link.sa-item:hover {
            background: #eff6ff;
            color: #1e3a8a;
        }
        .nav-link.sa-item:hover svg {
            color: #2563eb;
        }
        .nav-link.sa-active {
            color: #ffffff;
            font-weight: 600;
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            box-shadow: 0 4px 12px -2px rgba(30, 58, 138, 0.28);
        }
        .nav-link.sa-active svg {
            color: #ffffff;
        }
        .nav-badge {
            margin-left: auto;
            min-width: 22px;
            text-align: center;
            padding: 2px 7px;
            border-radius: 9999px;
            font-size: 10px;
            font-weight: 700;
            line-height: 1.2;
            font-variant-numeric: tabular-nums;
            border: 1px solid transparent;
            transition: all 0.15s ease;
        }
        .badge-blue,
        .badge-purple {
            background: #eff6ff;
            color: #1d4ed8;
            border-color: #dbeafe;
        }
        .badge-green {
            background: #ecfdf5;
            color: #047857;
            border-color: #a7f3d0;
        }
        .badge-red {
            background: #fef2f2;
            color: #dc2626;
            border-color: #fecaca;
        }
        .nav-link.active .nav-badge,
        .nav-link.sa-active .nav-badge {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.28);
        }

        /* === FOOTER CARD === */
        .session-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 12px;
        }
    </style>
</head>
<body>


    {{-- ============================= SIDEBAR ============================= --}}
    <aside class="admin-sidebar">

        {{-- Brand --}}
        <div class="sidebar-brand">
            <a href="/admin/dashboard" style="display:flex; align-items:center; gap:11px; text-decoration:none;">
                <div style="width:38px; height:38px; border-radius:11px; background:linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; letter-spacing:-0.02em; box-shadow:0 4px 10px -2px rgba(37,99,235,0.35);">VC</div>
                <div>
                    <div style="font-size:15px; font-weight:800; color:#0f172a; line-height:1.1; letter-spacing:-0.02em;">Vizzio<span style="color:#2563eb;">Craft</span></div>
                    <div style="font-size:9.5px; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-top:2px;">Control Panel</div>
                </div>
            </a>
        </div>

        {{-- Scrollable Navigation --}}
        <div class="sidebar-nav-wrap" data-lenis-prevent>

            {{-- ---- GROUP: UTAMA ---- --}}
            <div class="nav-group">
                <div class="nav-label">Utama & Analitik</div>
                <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard Overview
                </a>
                <a href="/admin/analytics" class="nav-link {{ request()->is('admin/analytics') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    Analitik Pengunjung
                </a>
                <a href="/admin/analytics/traffic" class="nav-link {{ request()->is('admin/analytics/traffic') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg>
                    Laporan Traffic
                </a>
            </div>

            {{-- ---- GROUP: KONTEN ---- --}}
            <div class="nav-group">
                <div class="nav-label">Manajemen Konten</div>
                <a href="/admin/news" class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    Berita & Artikel
                </a>
                <a href="/admin/events" class="nav-link {{ request()->is('admin/events*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Event & Workshop
                    <span class="nav-badge badge-purple">{{ \App\Models\Event::where('status', 'upcoming')->count() }}</span>
                </a>
                <a href="/admin/projects" class="nav-link {{ request()->is('admin/projects*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                    Portofolio & Proyek
                </a>
                <a href="/admin/services" class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    Layanan Digital
                    <span class="nav-badge badge-blue">{{ \App\Models\Service::where('status', 'active')->count() }}</span>
                </a>
                <a href="/admin/technologies" class="nav-link {{ request()->is('admin/technologies*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                    Teknologi & Stack
                    <span class="nav-badge badge-blue">{{ \App\Models\Technology::where('status', 'active')->count() }}</span>
                </a>
                <a href="/admin/gallery" class="nav-link {{ request()->is('admin/gallery*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Galeri Media
                </a>
                <a href="/admin/team" class="nav-link {{ request()->is('admin/team*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Manajemen Tim
                </a>
                <a href="/admin/testimonials" class="nav-link {{ request()->is('admin/testimonials*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Testimonial Klien
                </a>
                <a href="/admin/partners" class="nav-link {{ request()->is('admin/partners*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Partner & Klien
                    <span class="nav-badge badge-blue">{{ \App\Models\Partner::where('status', 'active')->count() }}</span>
                </a>
                <a href="/admin/tips" class="nav-link {{ request()->is('admin/tips*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    Tips & Playbook
                    <span class="nav-badge badge-blue">{{ \App\Models\Tip::where('status', 'active')->count() }}</span>
                </a>
            </div>

            {{-- ---- GROUP: PESAN ---- --}}
            <div class="nav-group">
                <div class="nav-label">Interaksi & Pesan</div>
                <a href="/admin/messages" class="nav-link {{ request()->is('admin/messages*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Pesan Masuk
                    <span class="nav-badge badge-green">{{ \App\Models\Message::where('status', 'unread')->count() }}</span>
                </a>
                <a href="/admin/leads" class="nav-link {{ request()->is('admin/leads*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Permintaan Penawaran
                    <span class="nav-badge badge-red">{{ \App\Models\Lead::whereIn('status', ['new', 'qualified', 'proposal'])->count() }}</span>
                </a>
                <a href="/admin/notifications" class="nav-link {{ request()->is('admin/notifications*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    Notifikasi Sistem
                </a>
            </div>

            {{-- ---- GROUP: SUPER ADMIN ONLY ---- --}}
            @if(session('user_role') === 'super_admin')
            <div class="nav-group sa-group">
                <div class="nav-label sa">
                    <span>Akses Sistem</span>
                    <span class="nav-sa-pill">SUPER ADMIN</span>
                </div>

                <a href="/admin/users" class="nav-link {{ request()->is('admin/users') || (request()->is('admin/users/*') && !request()->is('admin/users/create') && !request()->is('admin/users/reset-password*')) ? 'sa-active' : 'sa-item' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Kelola Admin & Role (All Users)
                </a>
                <a href="/admin/users/create" class="nav-link {{ request()->is('admin/users/create') ? 'sa-active' : 'sa-item' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    Tambah Admin Baru
                </a>
                <a href="/admin/users/reset-password" class="nav-link {{ request()->is('admin/users/reset-password*') ? 'sa-active' : 'sa-item' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                    Reset Password Admin
                </a>
                <a href="/admin/logs" class="nav-link {{ request()->is('admin/logs*') ? 'sa-active' : 'sa-item' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    Audit Log Aktivitas
                </a>
                <a href="/admin/security" class="nav-link {{ request()->is('admin/security*') ? 'sa-active' : 'sa-item' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Keamanan & Sesi Aktif
                </a>
                <a href="/admin/backup" class="nav-link {{ request()->is('admin/backup*') ? 'sa-active' : 'sa-item' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                    Backup & Restore DB
                </a>
                <a href="/admin/settings/email" class="nav-link {{ request()->is('admin/settings/email*') ? 'sa-active' : 'sa-item' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                    Konfigurasi Email SMTP
                </a>
                <a href="/admin/settings/system" class="nav-link {{ request()->is('admin/settings/system*') ? 'sa-active' : 'sa-item' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Konfigurasi Sistem (.env)
                </a>
            </div>
            @endif

            {{-- ---- GROUP: PENGATURAN ---- --}}
            <div class="nav-group">
                <div class="nav-label">Pengaturan & Halaman</div>
                <a href="/admin/settings/profile" class="nav-link {{ request()->is('admin/settings/profile*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Profil Perusahaan
                </a>
                <a href="/admin/settings/pages" class="nav-link {{ request()->is('admin/settings/pages*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Halaman Statis
                </a>
                <a href="/admin/settings/seo" class="nav-link {{ request()->is('admin/settings/seo*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    SEO & Meta Tag
                </a>
                <a href="/admin/settings/banner" class="nav-link {{ request()->is('admin/settings/banner*') ? 'active' : '' }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                    Banner & Hero Section
                </a>
            </div>


            {{-- Extra bottom padding so last items aren't clipped --}}
            <div style="height:16px;"></div>

        </div>{{-- end sidebar-nav-wrap --}}

        {{-- Session Footer (always visible, never scrolls away) --}}
        <div class="sidebar-footer">
            <div class="session-card">
                <div style="display:flex; align-items:center; gap:10px;">
                    <div style="width:32px; height:32px; border-radius:10px; background:{{ session('user_role') === 'super_admin' ? 'linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%)' : 'linear-gradient(135deg, #2563eb 0%, #3b82f6 100%)' }}; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:12px; flex-shrink:0;">
                        {{ strtoupper(substr(session('user_name', 'A'), 0, 1)) }}
                    </div>
                    <div style="min-width:0; flex:1;">
                        <div style="display:flex; align-items:center; justify-content:space-between; gap:6px;">
                            <span style="font-size:11.5px; font-weight:700; color:#0f172a; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ session('user_name', 'Administrator') }}</span>
                            @if(session('user_role') === 'super_admin')
                                <span style="padding:2px 6px; border-radius:6px; background:#eff6ff; color:#1e3a8a; font-size:8.5px; font-weight:800; border:1px solid #bfdbfe; flex-shrink:0; letter-spacing:0.04em;">SUPER ADMIN</span>
                            @else
                                <span style="padding:2px 6px; border-radius:6px; background:#f1f5f9; color:#334155; font-size:8.5px; font-weight:800; border:1px solid #e2e8f0; flex-shrink:0; letter-spacing:0.04em;">ADMIN</span>
                            @endif
                        </div>
                        <div style="font-size:10px; color:#64748b; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; margin-top:1px;">{{ session('user_email', 'admin@vizziocraft.com') }}</div>
                    </div>
                </div>
                <div style="margin-top:8px; padding-top:7px; border-top:1px solid #e2e8f0; display:flex; align-items:center; justify-content:space-between; font-size:10px; font-weight:600; color:#047857;">
                    <span style="display:inline-flex; align-items:center; gap:6px;">
                        <span style="width:6px; height:6px; border-radius:50%; background:#10b981; display:inline-block; animation:pulse 2s infinite;"></span>
                        MySQL Connected
                    </span>
                    <span style="font-size:9.5px; color:#94a3b8; font-weight:500;">v2.0</span>
                </div>
            </div>
        </div>

    </aside>{{-- end sidebar --}}

    {{-- ============================= MAIN CONTENT ============================= --}}
    <div class="admin-content">
        <div id="adminPjaxBar" style="position:fixed; top:0; left:268px; right:0; height:2.5px; background:linear-gradient(90deg, #2563eb, #60a5fa); width:0%; opacity:0; z-index:9999; pointer-events:none; transition:width 0.25s ease, opacity 0.2s ease;"></div>

        {{-- Top Navbar Header (inside main, not full-width) --}}
        <header class="admin-topbar">
            <nav style="display:flex; align-items:center; gap:8px; font-size:12px; color:#94a3b8;">
                <span style="font-weight:500;">Admin Portal</span>
                <span>/</span>
                <span id="adminBreadcrumbTitle" style="font-weight:700; color:#0f172a;">@yield('page_title', 'Dashboard Overview')</span>
            </nav>

            <div style="display:flex; align-items:center; gap:10px;">
                <a href="/" target="_blank" style="display:inline-flex; align-items:center; gap:6px; padding:6px 12px; border-radius:10px; font-size:11px; font-weight:600; color:#64748b; background:#f1f5f9; border:1px solid #e2e8f0; text-decoration:none; transition:all 0.15s;" onmouseover="this.style.color='#2563eb'" onmouseout="this.style.color='#64748b'">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Web Utama
                </a>

                <div style="display:flex; align-items:center; gap:8px; padding:6px 12px; border-radius:10px; background:#f8faff; border:1px solid #e2e8f0;">
                    <div style="width:24px; height:24px; border-radius:50%; background:#2563eb; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:10px;">
                        {{ strtoupper(substr(session('user_name', 'A'), 0, 1)) }}
                    </div>
                    <span style="font-size:11px; font-weight:700; color:#0f172a;">{{ session('user_name', 'Admin') }}</span>
                </div>

                <form action="/logout" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" style="display:inline-flex; align-items:center; gap:5px; padding:6px 12px; border-radius:10px; font-size:11px; font-weight:700; color:#dc2626; background:#fef2f2; border:1px solid #fecaca; cursor:pointer; font-family:'Poppins',sans-serif; transition:all 0.15s;" onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </header>

        {{-- Scrollable Page Content --}}
        <main class="admin-main" id="adminMainContainer" data-lenis-prevent>
            @if(session('success'))
                <div class="rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-3.5 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 text-base font-bold cursor-pointer">&times;</button>
                </div>
            @endif
            @if(session('error'))
                <div class="rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 px-5 py-3.5 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-700 text-base font-bold cursor-pointer">&times;</button>
                </div>
            @endif

            @yield('content')
        </main>

    </div>{{-- end admin-content --}}

<style>
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }
    .admin-section {
        scroll-margin-top: 16px;
    }
    #adminMainContainer {
        transition: opacity 0.15s ease;
    }
    #adminMainContainer.is-loading {
        opacity: 0.55;
        pointer-events: none;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainContainer = document.getElementById('adminMainContainer');
    const breadcrumbTitle = document.getElementById('adminBreadcrumbTitle');
    const pjaxBar = document.getElementById('adminPjaxBar');
    const sidebarLinks = document.querySelectorAll('.admin-sidebar a[href]');
    let currentController = null;

    function setActiveLink(targetLink) {
        const navLinks = document.querySelectorAll('.admin-sidebar .nav-link');
        navLinks.forEach(l => {
            l.classList.remove('active');
            if (l.classList.contains('sa-active')) {
                l.classList.remove('sa-active');
                l.classList.add('sa-item');
            }
        });

        if (!targetLink || !targetLink.classList.contains('nav-link')) return;

        if (targetLink.classList.contains('sa-item') || targetLink.closest('.nav-group')?.classList.contains('sa-group')) {
            targetLink.classList.remove('sa-item');
            targetLink.classList.add('sa-active');
        } else {
            targetLink.classList.add('active');
        }
    }

    function syncSidebarFromDoc(doc) {
        const fetchedMap = new Map();
        doc.querySelectorAll('.admin-sidebar .nav-link').forEach(el => {
            const href = el.getAttribute('href');
            if (href) fetchedMap.set(href, el);
        });

        document.querySelectorAll('.admin-sidebar .nav-link').forEach(liveEl => {
            const href = liveEl.getAttribute('href');
            const fetchedEl = fetchedMap.get(href);
            if (!fetchedEl) return;

            liveEl.className = fetchedEl.className;

            const liveBadge = liveEl.querySelector('.nav-badge');
            const fetchedBadge = fetchedEl.querySelector('.nav-badge');
            if (liveBadge && fetchedBadge) {
                liveBadge.textContent = fetchedBadge.textContent;
                liveBadge.className = fetchedBadge.className;
            }
        });
    }

    async function runPageScripts(mainScripts, stackScriptsHtml) {
        const pageScriptsContainer = document.getElementById('adminPageScripts');
        const tempStack = document.createElement('div');
        tempStack.innerHTML = stackScriptsHtml || '';
        const stackScripts = Array.from(tempStack.querySelectorAll('script'));

        const allScripts = [...mainScripts, ...stackScripts];

        // Clear old dynamic stack scripts container
        if (pageScriptsContainer) {
            pageScriptsContainer.innerHTML = '';
        }

        const origAddEventListener = document.addEventListener.bind(document);
        document.addEventListener = function(type, listener, options) {
            if (type === 'DOMContentLoaded' && typeof listener === 'function') {
                queueMicrotask(() => listener.call(document, new Event('DOMContentLoaded')));
                return;
            }
            return origAddEventListener(type, listener, options);
        };

        try {
            for (const oldScript of allScripts) {
                const src = oldScript.getAttribute('src');
                if (src) {
                    const alreadyLoaded = Array.from(document.scripts).some(s => s.getAttribute('src') === src || s.src === src);
                    if (!alreadyLoaded) {
                        await new Promise((resolve, reject) => {
                            const s = document.createElement('script');
                            s.src = src;
                            s.onload = resolve;
                            s.onerror = resolve;
                            document.head.appendChild(s);
                        });
                    }
                } else if (oldScript.textContent.trim()) {
                    const s = document.createElement('script');
                    if (oldScript.type) s.type = oldScript.type;
                    s.textContent = oldScript.textContent;
                    (pageScriptsContainer || document.body).appendChild(s);
                }
            }
        } finally {
            document.addEventListener = origAddEventListener;
        }
    }

    function startProgress() {
        if (!pjaxBar) return;
        pjaxBar.style.opacity = '1';
        pjaxBar.style.width = '35%';
        requestAnimationFrame(() => {
            pjaxBar.style.width = '78%';
        });
    }

    function finishProgress() {
        if (!pjaxBar) return;
        pjaxBar.style.width = '100%';
        setTimeout(() => {
            pjaxBar.style.opacity = '0';
            setTimeout(() => { pjaxBar.style.width = '0%'; }, 200);
        }, 120);
    }

    async function navigateAdminPage(url, pushHistory = true, clickedLink = null) {
        if (!mainContainer) {
            window.location.href = url;
            return;
        }

        if (currentController) {
            currentController.abort();
        }
        currentController = new AbortController();

        if (clickedLink) {
            setActiveLink(clickedLink);
        }

        mainContainer.classList.add('is-loading');
        startProgress();

        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                },
                signal: currentController.signal
            });

            if (!response.ok) {
                window.location.href = url;
                return;
            }

            const finalUrl = response.url || url;
            const html = await response.text();
            const doc = new DOMParser().parseFromString(html, 'text/html');
            const newMain = doc.getElementById('adminMainContainer');

            // If redirected to login or non-admin layout, do normal navigation
            if (!newMain) {
                window.location.href = finalUrl;
                return;
            }

            // Extract inline scripts from newMain before injecting HTML
            const mainScripts = Array.from(newMain.querySelectorAll('script'));
            mainScripts.forEach(s => s.remove());

            document.title = doc.title || document.title;
            const newBreadcrumb = doc.getElementById('adminBreadcrumbTitle');
            if (breadcrumbTitle && newBreadcrumb) {
                breadcrumbTitle.textContent = newBreadcrumb.textContent;
            }

            mainContainer.innerHTML = newMain.innerHTML;
            mainContainer.scrollTop = 0;

            syncSidebarFromDoc(doc);

            if (pushHistory) {
                window.history.pushState({ pjax: true, url: finalUrl }, '', finalUrl);
            }

            const newStackContainer = doc.getElementById('adminPageScripts');
            await runPageScripts(mainScripts, newStackContainer ? newStackContainer.innerHTML : '');
        } catch (err) {
            if (err.name === 'AbortError') return;
            window.location.href = url;
        } finally {
            mainContainer.classList.remove('is-loading');
            finishProgress();
        }
    }

    // Intercept sidebar links (no full page refresh)
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey || e.button !== 0) return;
            if (this.hasAttribute('download') || this.getAttribute('target') === '_blank') return;

            const href = this.getAttribute('href');
            if (!href) return;

            // Smooth internal hash scrolling
            if (href.startsWith('#')) {
                const targetId = href.substring(1);
                const targetEl = document.getElementById(targetId);
                if (targetEl && mainContainer) {
                    e.preventDefault();
                    targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    window.history.pushState(null, '', href);
                    setActiveLink(this);
                }
                return;
            }

            const targetUrl = new URL(href, window.location.origin);
            if (targetUrl.origin !== window.location.origin) return;

            e.preventDefault();
            if (targetUrl.href === window.location.href) {
                mainContainer.scrollTo({ top: 0, behavior: 'smooth' });
                return;
            }

            navigateAdminPage(targetUrl.href, true, this);
        });
    });

    // Handle browser Back / Forward buttons
    window.addEventListener('popstate', function() {
        if (window.location.pathname.startsWith('/admin')) {
            navigateAdminPage(window.location.href, false, null);
        }
    });

    // Check on initial page load if hash exists
    if (window.location.hash) {
        const targetId = window.location.hash.substring(1);
        const targetEl = document.getElementById(targetId);
        if (targetEl) {
            setTimeout(() => {
                targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 200);
        }
    }
});
</script>

<div id="adminPageScripts">
@stack('scripts')
</div>

</body>
</html>

