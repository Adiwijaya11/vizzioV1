@extends('layouts.admin.app')

@section('title', 'Reset Kata Sandi Pengguna — VizzioCraft')
@section('page_title', 'Reset Password')

@section('content')
<div style="max-width: 760px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 9999px; background: #ede9fe; color: #7c3aed; font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; border: 1px solid #ddd6fe;">
                ★ Akses Khusus Super Admin
            </div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Reset Kata Sandi Administrator</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Pilih akun administrator dan tentukan kata sandi baru untuk memulihkan akses login.</p>
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
        <form action="{{ route('admin.users.reset-password.post') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Pilih Akun Administrator *</label>
                <select name="user_id" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                    <option value="">-- Pilih Pengguna --</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>
                            {{ $u->name }} ({{ $u->email }}) &bull; [{{ strtoupper($u->role) }}]
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kata Sandi Baru *</label>
                    <input type="password" name="password" required minlength="6" placeholder="Minimal 6 karakter..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Konfirmasi Kata Sandi Baru *</label>
                    <input type="password" name="password_confirmation" required minlength="6" placeholder="Ketik ulang kata sandi..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px;">
                <a href="{{ route('admin.users.index') }}" style="padding: 10px 20px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Batal</a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; background: #7c3aed; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);">
                    Reset Password
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
