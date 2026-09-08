@extends('layouts.admin.app')

@section('title', 'All Users Management — VizzioCraft')
@section('page_title', 'All Users & Administrators')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 9999px; background: #ede9fe; color: #7c3aed; font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; border: 1px solid #ddd6fe;">
                ★ Akses Khusus Super Admin
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Manajemen Semua Pengguna (All Users)</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola akun administrator, kontrol hak akses (RBAC), reset kata sandi, dan pemeliharaan akun resmi.</p>
        </div>
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="{{ route('admin.users.reset-password') }}" style="display: inline-flex; align-items: center; gap: 6px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 12px; padding: 10px 16px; border-radius: 12px; text-decoration: none; border: 1px solid #bfdbfe;">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                Reset Kata Sandi
            </a>
            <a href="{{ route('admin.users.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #7c3aed; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Tambah Admin Baru
            </a>
        </div>
    </div>

    {{-- Metrics Cards --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px;">
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 6px;">Total Pengguna Terdaftar</div>
            <div style="font-size: 26px; font-weight: 800; color: #0f172a;">{{ $totalUsers }} <span style="font-size: 13px; font-weight: 500; color: #94a3b8;">Akun</span></div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Akun berwenang di sistem</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #7c3aed; text-transform: uppercase; margin-bottom: 6px;">Tingkat Super Admin</div>
            <div style="font-size: 26px; font-weight: 800; color: #7c3aed;">{{ $superAdminCount }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Akses tak terbatas & kontrol role</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase; margin-bottom: 6px;">Tingkat Administrator</div>
            <div style="font-size: 26px; font-weight: 800; color: #2563eb;">{{ $adminCount }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Akses operasional & konten</div>
        </div>
    </div>

    {{-- Filter Bar --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 16px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <form method="GET" action="{{ route('admin.users.index') }}" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin: 0;">
            <div style="flex: 1; min-width: 220px; position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama admin atau email..." style="width: 100%; padding: 9px 14px 9px 36px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; outline: none; font-family: 'Poppins', sans-serif;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #94a3b8;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select name="role" style="padding: 9px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; color: #475569; outline: none; background: #fff; font-family: 'Poppins', sans-serif;">
                <option value="all">Semua Role</option>
                <option value="super_admin" {{ request('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <button type="submit" style="padding: 9px 18px; border-radius: 10px; background: #0f172a; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">
                Filter
            </button>
            @if(request('search') || (request('role') && request('role') !== 'all'))
                <a href="{{ route('admin.users.index') }}" style="padding: 9px 14px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Reset</a>
            @endif
        </form>
    </div>

    {{-- Users Table --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Administrator</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Email Resmi</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Role Otorisasi</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Terdaftar Sejak</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 14px 12px;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div style="width: 38px; height: 38px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 13px;
                                        @if($u->role === 'super_admin') background: #ede9fe; color: #7c3aed; border: 1px solid #ddd6fe;
                                        @else background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; @endif">
                                        {{ strtoupper(substr($u->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div style="font-size: 13px; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 6px;">
                                            {{ $u->name }}
                                            @if($u->id === (int) session('user_id'))
                                                <span style="font-size: 9px; font-weight: 800; padding: 1px 6px; border-radius: 4px; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">ANDA</span>
                                            @endif
                                        </div>
                                        <div style="font-size: 11px; color: #94a3b8;">ID: #{{ $u->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 12px; font-family: monospace; color: #334155; font-weight: 600;">
                                {{ $u->email }}
                            </td>
                            <td style="padding: 12px;">
                                @if($u->role === 'super_admin')
                                    <span style="display: inline-flex; align-items: center; gap: 5px; padding: 3px 9px; border-radius: 6px; background: #ede9fe; color: #7c3aed; font-size: 10px; font-weight: 800; border: 1px solid #ddd6fe;">
                                        <span style="width: 5px; height: 5px; border-radius: 50%; background: #7c3aed;"></span>
                                        SUPER ADMIN
                                    </span>
                                @else
                                    <span style="display: inline-flex; align-items: center; gap: 5px; padding: 3px 9px; border-radius: 6px; background: #eff6ff; color: #2563eb; font-size: 10px; font-weight: 800; border: 1px solid #bfdbfe;">
                                        <span style="width: 5px; height: 5px; border-radius: 50%; background: #2563eb;"></span>
                                        ADMIN
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 12px; color: #64748b; font-size: 11px;">
                                {{ $u->created_at ? $u->created_at->format('d M Y') : 'System' }}
                            </td>
                            <td style="padding: 12px; text-align: right;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    <a href="{{ route('admin.users.edit', $u->id) }}" style="padding: 6px 10px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 11px; text-decoration: none; border: 1px solid #bfdbfe;">
                                        Edit
                                    </a>
                                    @if($u->id !== (int) session('user_id'))
                                        <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun administrator {{ $u->name }}?')" style="margin: 0; display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="padding: 6px 10px; border-radius: 8px; background: #fef2f2; color: #dc2626; font-weight: 700; font-size: 11px; border: 1px solid #fecaca; cursor: pointer; font-family: 'Poppins', sans-serif;">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 32px; text-align: center; color: #94a3b8;">
                                Belum ada administrator yang sesuai dengan kriteria filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div style="margin-top: 20px;">
                {{ $users->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
