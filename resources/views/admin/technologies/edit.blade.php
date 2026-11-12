@extends('layouts.admin.app')

@section('title', 'Edit Teknologi — ' . $technology->name . ' — VizzioCraft')
@section('page_title', 'Edit Teknologi')

@section('content')
<div style="max-width: 920px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Perbarui Stack: {{ $technology->name }}</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Perbarui spesifikasi arsitektur, logo, dan metrik performa untuk halaman publik.</p>
        </div>
        <a href="{{ route('admin.technologies.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
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
        <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            @method('PUT')

            {{-- Row 1: Name, Category, Version --}}
            <div style="display: grid; grid-template-columns: 2fr 1.5fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Teknologi *</label>
                    <input type="text" name="name" value="{{ old('name', $technology->name) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kategori Layer Arsitektur *</label>
                    <select name="category" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        @foreach($categories as $cKey => $cMeta)
                            <option value="{{ $cKey }}" {{ old('category', $technology->category) === $cKey ? 'selected' : '' }}>
                                {{ $cMeta['id'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Versi / Tagline</label>
                    <input type="text" name="version" value="{{ old('version', $technology->version) }}" placeholder="Contoh: v11.x, v16 LTS" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Row 2: Role / Spesialisasi Utama --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Peran Utama dalam Sistem *</label>
                <input type="text" name="role" value="{{ old('role', $technology->role) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            {{-- Row 3: Logo / Image Section (File Upload OR URL Input) --}}
            <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 16px; padding: 20px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <div>
                        <div style="font-size: 12px; font-weight: 700; color: #1e293b;">Logo / Ikon Teknologi</div>
                        <div style="font-size: 11px; color: #64748b;">Unggah file gambar baru atau perbarui URL logo.</div>
                    </div>
                    @if($technology->image)
                        <div style="display: flex; align-items: center; gap: 10px; background: #ffffff; border: 1px solid #e2e8f0; padding: 6px 12px; border-radius: 12px;">
                            <span style="font-size: 11px; color: #64748b; font-weight: 600;">Logo Saat Ini:</span>
                            <div style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ $technology->image }}" alt="{{ $technology->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            </div>
                        </div>
                    @endif
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Opsi A: Unggah Berkas Baru</label>
                        <input type="file" name="image_file" accept="image/*" style="width: 100%; font-size: 12px; color: #475569;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Opsi B: Tautan URL Logo Web</label>
                        <input type="text" name="image_url" value="{{ old('image_url', $technology->image) }}" placeholder="https://cdn.jsdelivr.net/gh/devicons/..." style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; font-family: 'Poppins', sans-serif;">
                    </div>
                </div>
            </div>

            {{-- Row 4: Descriptions (ID & EN) --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Deskripsi Rekayasa (Bahasa Indonesia) *</label>
                    <textarea name="description" rows="4" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif; line-height: 1.5;">{{ old('description', $technology->description) }}</textarea>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Deskripsi Rekayasa (English - Opsional)</label>
                    <textarea name="description_en" rows="4" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif; line-height: 1.5;">{{ old('description_en', $technology->description_en) }}</textarea>
                </div>
            </div>

            {{-- Row 5: Features / Key Capabilities (newline or comma) --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Fitur & Kapabilitas Kunci (Satu tag per baris atau pisahkan dengan koma)</label>
                @php
                    $featuresStr = is_array($technology->features) ? implode("\n", $technology->features) : $technology->features;
                @endphp
                <textarea name="features" rows="3" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif;">{{ old('features', $featuresStr) }}</textarea>
            </div>

            {{-- Row 6: Use Case & Performance Metric --}}
            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Implementasi Lapangan / Kasus Pakai</label>
                    <input type="text" name="use_case" value="{{ old('use_case', $technology->use_case) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Benchmark / SLA Performa</label>
                    <input type="text" name="performance_metric" value="{{ old('performance_metric', $technology->performance_metric) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Row 7: Docs URL, Order, Status, Featured --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 16px; align-items: end;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tautan Dokumentasi Resmi</label>
                    <input type="url" name="official_url" value="{{ old('official_url', $technology->official_url) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $technology->order) }}" min="0" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Publikasi *</label>
                    <select name="status" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        <option value="active" {{ old('status', $technology->status) === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ old('status', $technology->status) === 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>
                <div style="padding-bottom: 10px;">
                    <label style="display: inline-flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 700; color: #1e293b; cursor: pointer;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $technology->is_featured) ? 'checked' : '' }} style="width: 16px; height: 16px; border-radius: 4px; accent-color: #2563eb;">
                        Stack Unggulan
                    </label>
                </div>
            </div>

            {{-- Actions --}}
            <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 20px; margin-top: 10px;">
                <a href="{{ route('admin.technologies.index') }}" style="padding: 10px 20px; border-radius: 10px; border: 1px solid #cbd5e1; background: #ffffff; color: #475569; font-size: 13px; font-weight: 600; text-decoration: none;">
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

