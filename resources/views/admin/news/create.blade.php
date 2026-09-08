@extends('layouts.admin.app')

@section('title', 'Tulis Artikel Baru — VizzioCraft')
@section('page_title', 'Tulis Artikel')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Tambah Artikel Berita Baru</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Isi rincian artikel di bawah ini untuk menerbitkan berita baru di portal VizzioCraft.</p>
        </div>
        <a href="{{ route('admin.news.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
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
        <form action="{{ route('admin.news.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Judul Artikel (Bahasa Indonesia) *</label>
                <input type="text" name="title_id" value="{{ old('title_id') }}" required placeholder="Contoh: Arsitektur Cloud Native untuk Modernisasi Bisnis" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kategori Sistem *</label>
                    <select name="category" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <option value="cloud" {{ old('category') == 'cloud' ? 'selected' : '' }}>Cloud & Infrastruktur (cloud)</option>
                        <option value="security" {{ old('category') == 'security' ? 'selected' : '' }}>Cyber Security (security)</option>
                        <option value="ai" {{ old('category') == 'ai' ? 'selected' : '' }}>Kecerdasan Buatan (ai)</option>
                        <option value="devops" {{ old('category') == 'devops' ? 'selected' : '' }}>DevOps & CI/CD (devops)</option>
                        <option value="business" {{ old('category') == 'business' ? 'selected' : '' }}>Transformasi Bisnis (business)</option>
                        <option value="corporate" {{ old('category') == 'corporate' ? 'selected' : '' }}>Berita Korporat (corporate)</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Label Kategori Tampilan *</label>
                    <input type="text" name="category_label_id" value="{{ old('category_label_id', 'Cloud Computing') }}" required placeholder="Contoh: Cloud Architecture" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">URL Gambar Thumbnail</label>
                <input type="url" name="image" value="{{ old('image') }}" placeholder="https://images.unsplash.com/photo-..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                <span style="font-size: 11px; color: #94a3b8; margin-top: 4px; display: block;">Kosongkan jika ingin menggunakan gambar ilustrasi default beresolusi tinggi.</span>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Ringkasan Singkat (Excerpt) *</label>
                <textarea name="desc_id" rows="3" required placeholder="Tuliskan rangkuman 1-2 kalimat untuk kartu artikel..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('desc_id') }}</textarea>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Isi Konten Lengkap</label>
                <textarea name="content_id" rows="6" placeholder="Tuliskan isi paragraf lengkap artikel di sini..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('content_id') }}</textarea>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Publikasi *</label>
                <select name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Langsung Terbitkan (Published)</option>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan Sebagai Draf (Draft)</option>
                </select>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px;">
                <a href="{{ route('admin.news.index') }}" style="padding: 10px 20px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Batal</a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                    Simpan & Terbitkan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
