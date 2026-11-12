@extends('layouts.admin.app')

@section('title', 'Tambah Teknologi & Stack — VizzioCraft')
@section('page_title', 'Tambah Teknologi')

@section('content')
<div style="max-width: 920px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Tambah Stack Teknologi Rekayasa</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Daftarkan framework, database, alat cloud, atau pustaka rekayasa baru ke halaman publik /technology.</p>
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
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            {{-- Row 1: Name, Category, Version --}}
            <div style="display: grid; grid-template-columns: 2fr 1.5fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Teknologi *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Laravel 11, PostgreSQL, Redis..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kategori Layer Arsitektur *</label>
                    <select name="category" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        @foreach($categories as $cKey => $cMeta)
                            <option value="{{ $cKey }}" {{ old('category') === $cKey ? 'selected' : '' }}>
                                {{ $cMeta['id'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Versi / Tagline</label>
                    <input type="text" name="version" value="{{ old('version') }}" placeholder="Contoh: v11.x, v16 LTS" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Row 2: Role / Spesialisasi Utama --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Peran Utama dalam Sistem *</label>
                <input type="text" name="role" value="{{ old('role') }}" required placeholder="Contoh: Enterprise Web & ERP Core Engine / ACID Transaction Storage" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            {{-- Row 3: Logo / Image Section (File Upload OR URL Input) --}}
            <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 16px; padding: 20px;">
                <div style="font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 4px;">Logo / Ikon Teknologi *</div>
                <div style="font-size: 11px; color: #64748b; margin-bottom: 14px;">Unggah file gambar logo (SVG, PNG, WEBP) atau cantumkan tautan URL logo (misalnya dari devicon / cdn).</div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Opsi A: Unggah Berkas Logo</label>
                        <input type="file" name="image_file" accept="image/*" style="width: 100%; font-size: 12px; color: #475569;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Opsi B: Tautan URL Logo Web</label>
                        <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/..." style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; font-family: 'Poppins', sans-serif;">
                    </div>
                </div>
            </div>

            {{-- Row 4: Descriptions (ID & EN) --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Deskripsi Rekayasa (Bahasa Indonesia) *</label>
                    <textarea name="description" rows="4" required placeholder="Jelaskan alasan tim kami memilih teknologi ini dan manfaatnya bagi stabilitas aplikasi..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif; line-height: 1.5;">{{ old('description') }}</textarea>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Deskripsi Rekayasa (English - Opsional)</label>
                    <textarea name="description_en" rows="4" placeholder="Explain why our team adopts this technology and its impact on system stability..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif; line-height: 1.5;">{{ old('description_en') }}</textarea>
                </div>
            </div>

            {{-- Row 5: Features / Key Capabilities (newline or comma) --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Fitur & Kapabilitas Kunci (Satu tag per baris atau pisahkan dengan koma)</label>
                <textarea name="features" rows="3" placeholder="Contoh:&#10;Modular Architecture&#10;Queue Worker&#10;Eloquent ORM&#10;AES-256 Encryption" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif;">{{ old('features') }}</textarea>
            </div>

            {{-- Row 6: Use Case & Performance Metric --}}
            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Implementasi Lapangan / Kasus Pakai</label>
                    <input type="text" name="use_case" value="{{ old('use_case') }}" placeholder="Contoh: ERP Logistik, Core Banking API, Pelacak Armada IoT..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Benchmark / SLA Performa</label>
                    <input type="text" name="performance_metric" value="{{ old('performance_metric') }}" placeholder="Contoh: P99 < 45ms, 15,000 Req/sec..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Row 7: Docs URL, Order, Status, Featured --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 16px; align-items: end;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tautan Dokumentasi Resmi</label>
                    <input type="url" name="official_url" value="{{ old('official_url') }}" placeholder="https://laravel.com" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
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
                <div style="padding-bottom: 10px;">
                    <label style="display: inline-flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 700; color: #1e293b; cursor: pointer;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', true) ? 'checked' : '' }} style="width: 16px; height: 16px; border-radius: 4px; accent-color: #2563eb;">
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
                    Simpan Teknologi ke Katalog
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

