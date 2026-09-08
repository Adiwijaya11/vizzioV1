@extends('layouts.admin.app')

@section('title', 'Edit Administrator — VizzioCraft')
@section('page_title', 'Edit Administrator')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 9999px; background: #ede9fe; color: #7c3aed; font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; border: 1px solid #ddd6fe;">
                ★ Akses Khusus Super Admin
            </div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Perbarui Akun Administrator</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Mengedit otorisasi akun: <strong style="color: #7c3aed;">{{ $user->name }} ({{ $user->email }})</strong></p>
        </div>
        <a href="{{ route('admin.users.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
            &larr; Kembali
        </a>
    </div>

    @if ($errors->any())
        <div style="padding: 14px 18px; border-radius: 14px; background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; font-size: 12px;">
            <div style="font-weight: 700; margin-bottom: 6px;">Harap periksa kesalahan input berikut:</div>
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Lengkap Administrator *</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Alamat Email Resmi *</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Peran & Otorisasi (Role) *</label>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <label style="display: flex; align-items: flex-start; gap: 12px; padding: 14px; border-radius: 12px; border: 1px solid #cbd5e1; cursor: pointer; background: #fafafa;">
                        <input type="radio" name="role" value="admin" {{ old('role', $user->role) == 'admin' ? 'checked' : '' }} style="margin-top: 3px;">
                        <div>
                            <div style="font-size: 13px; font-weight: 800; color: #0f172a;">Administrator Biasa (Admin)</div>
                            <div style="font-size: 11px; color: #64748b; line-height: 1.4; margin-top: 2px;">Dapat mengelola artikel, proyek, testimonial, portofolio, dan pesan kontak.</div>
                        </div>
                    </label>

                    <label style="display: flex; align-items: flex-start; gap: 12px; padding: 14px; border-radius: 12px; border: 1px solid #ddd6fe; cursor: pointer; background: #faf5ff;">
                        <input type="radio" name="role" value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'checked' : '' }} style="margin-top: 3px;">
                        <div>
                            <div style="font-size: 13px; font-weight: 800; color: #7c3aed;">Super Administrator</div>
                            <div style="font-size: 11px; color: #64748b; line-height: 1.4; margin-top: 2px;">Akses penuh mencakup kelola All Users, audit trail aktivitas, backup database, dan konfigurasi server.</div>
                        </div>
                    </label>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px;">
                <a href="{{ route('admin.users.index') }}" style="padding: 10px 20px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Batal</a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; background: #7c3aed; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
