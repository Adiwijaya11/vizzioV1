@extends('layouts.admin.app')

@section('title', 'Tambah Partner & Klien — VizzioCraft')
@section('page_title', 'Tambah Partner & Klien')

@section('content')
<div style="max-width: 760px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Tambah Perusahaan (Partner / Klien)</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Tambahkan logo dan nama perusahaan yang bekerja sama dengan VizzioCraft.</p>
        </div>
        <a href="{{ route('admin.partners.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
            &larr; Kembali ke Daftar
        </a>
    </div>

    @if ($errors->any())
        <div style="padding: 14px 18px; border-radius: 14px; background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; font-size: 12px;">
            <div style="font-weight: 700; margin-bottom: 6px;">Harap perbaiki kesalahan berikut:</div>
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            {{-- Nama Perusahaan & Tipe --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Perusahaan *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Bank Mandiri, PT Pelindo, Telkom..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tipe Kerja Sama *</label>
                    <select name="type" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        <option value="client" {{ old('type', 'client') === 'client' ? 'selected' : '' }}>Klien Enterprise</option>
                        <option value="partner" {{ old('type') === 'partner' ? 'selected' : '' }}>Mitra Teknologi</option>
                    </select>
                </div>
            </div>

            {{-- Logo Section --}}
            <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 16px; padding: 20px;">
                <div style="font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 4px;">Logo Perusahaan *</div>
                <div style="font-size: 11px; color: #64748b; margin-bottom: 14px;">Unggah file gambar logo (SVG, PNG, WebP) atau masukkan tautan URL logo perusahaan.</div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Opsi A: Unggah Berkas Gambar</label>
                        <input type="file" name="logo_file" accept="image/*" style="width: 100%; font-size: 12px; color: #475569;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Opsi B: Tautan URL Logo</label>
                        <input type="text" name="logo_url" value="{{ old('logo_url') }}" placeholder="https://domain.com/logo.svg" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; font-family: 'Poppins', sans-serif;">
                    </div>
                </div>
            </div>

            {{-- Website URL, Urutan & Status --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tautan Website (Opsional)</label>
                    <input type="url" name="website_url" value="{{ old('website_url') }}" placeholder="https://perusahaan.co.id" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 1) }}" min="0" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Publikasi *</label>
                    <select name="status" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>
            </div>

            {{-- Actions --}}
            <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 20px; margin-top: 10px;">
                <a href="{{ route('admin.partners.index') }}" style="padding: 10px 20px; border-radius: 10px; border: 1px solid #cbd5e1; background: #ffffff; color: #475569; font-size: 13px; font-weight: 600; text-decoration: none;">
                    Batal
                </a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; border: none; background: #2563eb; color: #ffffff; font-size: 13px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                    Simpan Perusahaan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

