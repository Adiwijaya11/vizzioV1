@extends('layouts.admin.app')

@section('title', 'Tambah Layanan — VizzioCraft')
@section('page_title', 'Tambah Layanan')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Tambah Layanan Digital Baru</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Entri paket layanan IT baru untuk ditampilkan di landing page dan halaman layanan.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
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
        <form action="{{ route('admin.services.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Layanan *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: AI & Machine Learning Integration" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kategori *</label>
                    <input type="text" name="category" value="{{ old('category', 'Artificial Intelligence') }}" required placeholder="Contoh: Enterprise Software" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Harga / Estimasi Biaya *</label>
                    <input type="text" name="price" value="{{ old('price', 'Mulai Rp 15.000.000') }}" required placeholder="Contoh: Mulai Rp 10.000.000 atau Custom Quote" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Badge / Label Khusus</label>
                    <input type="text" name="badge" value="{{ old('badge') }}" placeholder="Contoh: POPULAR / ENTERPRISE / NEW" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Deskripsi Layanan *</label>
                <textarea name="description" rows="3" required placeholder="Jelaskan proposisi nilai dan output yang didapat klien..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('description') }}</textarea>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Daftar Fitur Unggulan (Satu fitur per baris baru)</label>
                <textarea name="features" rows="4" placeholder="Integrasi API Open-AI & Claude&#10;Model fine-tuning khusus&#10;Dashboard analitik predictive&#10;SLA 99.9% uptime" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('features') }}</textarea>
                <span style="font-size: 11px; color: #94a3b8; margin-top: 4px; display: block;">Pisahkan tiap poin dengan tombol Enter (baris baru).</span>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Ikon Sistem</label>
                    <select name="icon" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <option value="code" {{ old('icon') == 'code' ? 'selected' : '' }}>Code / Software (code)</option>
                        <option value="cloud" {{ old('icon') == 'cloud' ? 'selected' : '' }}>Cloud Infrastructure (cloud)</option>
                        <option value="cpu" {{ old('icon') == 'cpu' ? 'selected' : '' }}>IoT / Hardware (cpu)</option>
                        <option value="layout" {{ old('icon') == 'layout' ? 'selected' : '' }}>Design UI/UX (layout)</option>
                        <option value="database" {{ old('icon') == 'database' ? 'selected' : '' }}>Database & Hosting (database)</option>
                        <option value="chart" {{ old('icon') == 'chart' ? 'selected' : '' }}>SEO & Marketing (chart)</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Tampil *</label>
                    <select name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Aktif (Tampilkan di Website)</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Non-Aktif (Sembunyikan)</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px;">
                <a href="{{ route('admin.services.index') }}" style="padding: 10px 20px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Batal</a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                    Simpan Layanan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
