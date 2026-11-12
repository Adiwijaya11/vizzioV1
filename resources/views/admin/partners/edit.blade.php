@extends('layouts.admin.app')

@section('title', 'Edit Partner & Klien — ' . $partner->name . ' — VizzioCraft')
@section('page_title', 'Edit Partner & Klien')

@section('content')
<div style="max-width: 760px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Perbarui Perusahaan: {{ $partner->name }}</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Perbarui nama dan logo perusahaan mitra atau klien.</p>
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
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            @method('PUT')

            {{-- Nama Perusahaan & Tipe --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Perusahaan *</label>
                    <input type="text" name="name" value="{{ old('name', $partner->name) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tipe Kerja Sama *</label>
                    <select name="type" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        <option value="client" {{ old('type', $partner->type) === 'client' ? 'selected' : '' }}>Klien Enterprise</option>
                        <option value="partner" {{ old('type', $partner->type) === 'partner' ? 'selected' : '' }}>Mitra Teknologi</option>
                    </select>
                </div>
            </div>

            {{-- Logo Section --}}
            <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 16px; padding: 20px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <div>
                        <div style="font-size: 12px; font-weight: 700; color: #1e293b;">Logo Perusahaan</div>
                        <div style="font-size: 11px; color: #64748b;">Unggah berkas baru atau masukkan URL logo baru.</div>
                    </div>
                    @if($partner->logo)
                        <div style="display: flex; align-items: center; gap: 8px; background: #ffffff; border: 1px solid #e2e8f0; padding: 4px 10px; border-radius: 10px;">
                            <span style="font-size: 10px; color: #64748b; font-weight: 600;">Saat Ini:</span>
                            <div style="height: 28px; width: 60px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            </div>
                        </div>
                    @endif
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Opsi A: Unggah Berkas Baru</label>
                        <input type="file" name="logo_file" accept="image/*" style="width: 100%; font-size: 12px; color: #475569;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Opsi B: Tautan URL Logo</label>
                        <input type="text" name="logo_url" value="{{ old('logo_url', $partner->logo) }}" placeholder="https://domain.com/logo.svg" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; font-family: 'Poppins', sans-serif;">
                    </div>
                </div>
            </div>

            {{-- Website URL, Urutan & Status --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tautan Website (Opsional)</label>
                    <input type="url" name="website_url" value="{{ old('website_url', $partner->website_url) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $partner->order) }}" min="0" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Publikasi *</label>
                    <select name="status" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        <option value="active" {{ old('status', $partner->status) === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ old('status', $partner->status) === 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>
            </div>

            {{-- Actions --}}
            <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 20px; margin-top: 10px;">
                <a href="{{ route('admin.partners.index') }}" style="padding: 10px 20px; border-radius: 10px; border: 1px solid #cbd5e1; background: #ffffff; color: #475569; font-size: 13px; font-weight: 600; text-decoration: none;">
                    Batal
                </a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; border: none; background: #2563eb; color: #ffffff; font-size: 13px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

