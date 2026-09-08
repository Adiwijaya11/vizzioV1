@extends('layouts.admin.app')

@section('title', 'Banner & Hero Section — VizzioCraft')
@section('page_title', 'Banner & Hero Section')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 3px 10px; border-radius: 9999px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; margin-bottom: 6px; border: 1px solid #bfdbfe;">
                Pengaturan & Halaman
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Pengaturan Hero Banner Beranda</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola tajuk utama landing page, tombol aksi (CTA), efek latar belakang visual, dan bilah pencarian layanan.</p>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="/" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 16px; border-radius: 12px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; text-decoration: none;">
                Lihat Beranda Publik &rarr;
            </a>
        </div>
    </div>

    {{-- Live Real-Time Banner Preview --}}
    <div style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #2563eb 100%); border-radius: 24px; padding: 36px 40px; color: #ffffff; position: relative; overflow: hidden; box-shadow: 0 10px 30px -5px rgba(37, 99, 235, 0.3);">
        <div id="previewBlob" style="position: absolute; right: -50px; top: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(59, 130, 246, 0.4) 0%, rgba(37, 99, 235, 0) 70%); border-radius: 50%; pointer-events: none; {{ !($heroSection['blob_active'] ?? true) ? 'display: none;' : '' }}"></div>
        
        <div style="position: relative; z-index: 2; max-width: 680px;">
            <div id="liveBadge" style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 5px 14px; border-radius: 9999px; font-size: 11px; font-weight: 800; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 14px; border: 1px solid rgba(255,255,255,0.25);">
                <span style="width: 6px; height: 6px; border-radius: 50%; background: #60a5fa;"></span>
                <span>{{ $heroSection['badge'] ?? 'SOLUSI DIGITAL TERDEPAN' }}</span>
            </div>

            <h2 id="liveTitle" style="font-size: 28px; font-weight: 800; line-height: 1.25; margin: 0 0 12px 0; letter-spacing: -0.02em;">
                {{ $heroSection['title_id'] ?? 'Solusi Digital Terpadu untuk Bisnis Anda' }}
            </h2>

            <p id="liveDesc" style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.85); margin: 0 0 24px 0;">
                {{ $heroSection['desc_id'] ?? 'Kami menyediakan ekosistem layanan teknologi lengkap dari tahap perencanaan hingga dukungan operasional.' }}
            </p>

            <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center;">
                <span id="liveBtn1" style="display: inline-flex; align-items: center; gap: 8px; background: #ffffff; color: #1e3a8a; font-weight: 800; font-size: 13px; padding: 11px 22px; border-radius: 12px; box-shadow: 0 4px 14px rgba(0,0,0,0.15);">
                    {{ $heroSection['cta_primary'] ?? 'Konsultasi Gratis' }} &rarr;
                </span>
                <span id="liveBtn2" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); color: #ffffff; font-weight: 700; font-size: 13px; padding: 11px 20px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.25);">
                    {{ $heroSection['cta_second'] ?? 'Lihat Semua Layanan' }}
                </span>
            </div>

            <div id="liveSearchBar" style="margin-top: 24px; max-width: 480px; background: rgba(255,255,255,0.15); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.25); border-radius: 12px; padding: 10px 16px; font-size: 12px; color: rgba(255,255,255,0.7); display: flex; align-items: center; gap: 10px; {{ !($heroSection['search_bar'] ?? true) ? 'display: none;' : '' }}">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <span>Cari solusi teknologi (LMS, Cloud, Web Design, IoT)...</span>
            </div>
        </div>
    </div>

    {{-- Edit Form --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        <form action="{{ route('admin.settings.banner.update') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Badge Kicker Atas *</label>
                <input type="text" id="inputBadge" name="badge" value="{{ old('badge', $heroSection['badge'] ?? '') }}" required oninput="updateBannerPreview()" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Headline Utama (Title ID) *</label>
                <input type="text" id="inputTitle" name="title_id" value="{{ old('title_id', $heroSection['title_id'] ?? '') }}" required oninput="updateBannerPreview()" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Deskripsi Narasi Hero *</label>
                <textarea id="inputDesc" name="desc_id" rows="3" required oninput="updateBannerPreview()" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('desc_id', $heroSection['desc_id'] ?? '') }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Label Tombol Utama (Primary CTA) *</label>
                    <input type="text" id="inputBtn1" name="cta_primary" value="{{ old('cta_primary', $heroSection['cta_primary'] ?? '') }}" required oninput="updateBannerPreview()" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Target URL Tombol Utama *</label>
                    <input type="text" name="cta_primary_url" value="{{ old('cta_primary_url', $heroSection['cta_primary_url'] ?? '/contact') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Label Tombol Kedua (Secondary CTA) *</label>
                    <input type="text" id="inputBtn2" name="cta_second" value="{{ old('cta_second', $heroSection['cta_second'] ?? '') }}" required oninput="updateBannerPreview()" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Target URL Tombol Kedua *</label>
                    <input type="text" name="cta_second_url" value="{{ old('cta_second_url', $heroSection['cta_second_url'] ?? '/services') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Pilihan Gradien Tema Latar Belakang</label>
                <select name="gradient_style" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                    <option value="blue-cyan" {{ ($heroSection['gradient_style'] ?? '') === 'blue-cyan' ? 'selected' : '' }}>Navy Blue to Royal Blue (Standar VizzioCraft)</option>
                    <option value="indigo-purple" {{ ($heroSection['gradient_style'] ?? '') === 'indigo-purple' ? 'selected' : '' }}>Deep Indigo to Violet</option>
                    <option value="slate-dark" {{ ($heroSection['gradient_style'] ?? '') === 'slate-dark' ? 'selected' : '' }}>Dark Slate Luxury Corporate</option>
                </select>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <label style="display: flex; align-items: center; gap: 10px; padding: 14px; border-radius: 12px; border: 1px solid #e2e8f0; background: #f8fafc; cursor: pointer;">
                    <input type="checkbox" id="inputBlob" name="blob_active" value="1" {{ ($heroSection['blob_active'] ?? true) ? 'checked' : '' }} onchange="toggleBlob(this.checked)" style="width: 16px; height: 16px;">
                    <div>
                        <div style="font-size: 12.5px; font-weight: 700; color: #0f172a;">Aktifkan Efek Glow Organic Blob</div>
                        <div style="font-size: 11px; color: #64748b;">Sheen ambient futuristik latar belakang</div>
                    </div>
                </label>

                <label style="display: flex; align-items: center; gap: 10px; padding: 14px; border-radius: 12px; border: 1px solid #e2e8f0; background: #f8fafc; cursor: pointer;">
                    <input type="checkbox" id="inputSearch" name="search_bar" value="1" {{ ($heroSection['search_bar'] ?? true) ? 'checked' : '' }} onchange="toggleSearchBar(this.checked)" style="width: 16px; height: 16px;">
                    <div>
                        <div style="font-size: 12.5px; font-weight: 700; color: #0f172a;">Tampilkan Bilah Pencarian Cepat Layanan</div>
                        <div style="font-size: 11px; color: #64748b;">Akses instan pengguna ke produk digital</div>
                    </div>
                </label>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px; border-top: 1px solid #f1f5f9; padding-top: 18px;">
                <button type="submit" style="padding: 12px 28px; border-radius: 12px; background: #2563eb; color: #fff; font-size: 13px; font-weight: 800; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28);">
                    Simpan Perubahan Hero Banner
                </button>
            </div>
        </form>
    </div>

</div>

<script>
function updateBannerPreview() {
    document.getElementById('liveBadge').querySelector('span:last-child').innerText = document.getElementById('inputBadge').value || 'SOLUSI DIGITAL TERDEPAN';
    document.getElementById('liveTitle').innerText = document.getElementById('inputTitle').value || 'Solusi Digital Terpadu untuk Bisnis Anda';
    document.getElementById('liveDesc').innerText = document.getElementById('inputDesc').value || 'Kami menyediakan ekosistem layanan teknologi lengkap.';
    document.getElementById('liveBtn1').innerText = (document.getElementById('inputBtn1').value || 'Konsultasi Gratis') + ' →';
    document.getElementById('liveBtn2').innerText = document.getElementById('inputBtn2').value || 'Lihat Semua Layanan';
}
function toggleBlob(checked) {
    document.getElementById('previewBlob').style.display = checked ? 'block' : 'none';
}
function toggleSearchBar(checked) {
    document.getElementById('liveSearchBar').style.display = checked ? 'flex' : 'none';
}
</script>
@endsection
