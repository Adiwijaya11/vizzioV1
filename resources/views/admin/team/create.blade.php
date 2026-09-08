@extends('layouts.admin.app')

@section('title', 'Tambah Anggota Tim — VizzioCraft')
@section('page_title', 'Tambah Anggota Tim')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Tambah Anggota Tim Baru</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Entri data personel, jabatan teknis, departemen, dan biografi singkat.</p>
        </div>
        <a href="{{ route('admin.team.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
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
        <form action="{{ route('admin.team.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Lengkap *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Adrian Pratama, S.Kom" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Posisi / Jabatan *</label>
                    <input type="text" name="role" value="{{ old('role') }}" required placeholder="Contoh: Chief Executive Officer & Co-Founder" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Departemen *</label>
                    <input type="text" name="dept" value="{{ old('dept', 'Executive') }}" required placeholder="Contoh: Engineering / Executive / Product Design" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tag Spesialisasi</label>
                    <input type="text" name="tag" value="{{ old('tag') }}" placeholder="Contoh: Ex-GoTo, Enterprise Architect" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">URL Foto Profil</label>
                    <input type="url" name="image" value="{{ old('image') }}" placeholder="https://images.unsplash.com/photo-..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Email Profesional</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="adrian@vizziocraft.com" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Biografi Singkat *</label>
                <textarea name="bio" rows="3" required placeholder="Tuliskan pengalaman teknis dan latar belakang profesional..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('bio') }}</textarea>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Anggota *</label>
                <select name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                    <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Aktif (Tampilkan di Halaman Tim)</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                </select>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px;">
                <a href="{{ route('admin.team.index') }}" style="padding: 10px 20px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Batal</a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                    Simpan Anggota
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
