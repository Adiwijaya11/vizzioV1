@extends('layouts.admin.app')

@section('title', 'Tambah Testimonial — VizzioCraft')
@section('page_title', 'Tambah Testimonial')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Tambah Testimonial Klien Baru</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Entri ulasan kepuasan mitra dan apresiasi hasil deliverable proyek.</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
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
        <form action="{{ route('admin.testimonials.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Klien / Tokoh *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Jabatan Klien</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: VP of Engineering" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Perusahaan *</label>
                    <input type="text" name="company" value="{{ old('company') }}" required placeholder="Contoh: PT Bank Mandiri (Persero)" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Proyek yang Dikerjakan</label>
                    <input type="text" name="project" value="{{ old('project') }}" placeholder="Contoh: Mobile Banking Core UI/UX" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Rating Bintang *</label>
                    <select name="rating" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <option value="5" {{ old('rating', 5) == 5 ? 'selected' : '' }}>★★★★★ (5 Bintang - Luar Biasa)</option>
                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>★★★★☆ (4 Bintang - Sangat Baik)</option>
                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>★★★☆☆ (3 Bintang - Cukup)</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Periode / Tanggal</label>
                    <input type="text" name="date" value="{{ old('date', 'Agustus 2026') }}" placeholder="Contoh: Agustus 2026" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Isi Testimoni / Ulasan Klien *</label>
                <textarea name="comment" rows="4" required placeholder="Tuliskan ulasan langsung dari klien..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('comment') }}</textarea>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Publikasi *</label>
                <select name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                    <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Langsung Terbitkan (Published)</option>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan Sebagai Draf (Draft)</option>
                </select>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px;">
                <a href="{{ route('admin.testimonials.index') }}" style="padding: 10px 20px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Batal</a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                    Simpan Testimonial
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
