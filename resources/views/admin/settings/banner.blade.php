@extends('layouts.admin.app')

@section('title', 'Banner & Hero Section — VizzioCraft')
@section('page_title', 'Banner & Hero Section')

@section('content')
@php
    $currentBgImage = $heroSection['bg_image'] ?? null;
@endphp
<div style="display: flex; flex-direction: column; gap: 24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 3px 10px; border-radius: 9999px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; margin-bottom: 6px; border: 1px solid #bfdbfe;">
                Pengaturan & Halaman
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Pengaturan Hero Banner Beranda</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola latar belakang Hero Section (Mode Gambar atau Mode Blob), tajuk utama, tombol aksi (CTA), dan bilah pencarian.</p>
        </div>
        <div style="display: flex; align-items: center; gap: 10px;">
            <span id="activeModeBadge" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; font-size: 12px; font-weight: 700; {{ $currentBgImage ? 'background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0;' : 'background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe;' }}">
                <span style="width: 7px; height: 7px; border-radius: 50%; {{ $currentBgImage ? 'background: #10b981;' : 'background: #2563eb;' }}"></span>
                <span>{{ $currentBgImage ? 'Mode Aktif: Background Gambar' : 'Mode Aktif: Organic Blob' }}</span>
            </span>
            <a href="/" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 16px; border-radius: 12px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; text-decoration: none;">
                Lihat Beranda Publik &rarr;
            </a>
        </div>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div style="background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; padding: 12px 16px; border-radius: 12px; font-size: 13px;">
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Live Real-Time Banner Preview --}}
    <div id="liveBannerContainer" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #2563eb 100%); border-radius: 24px; padding: 36px 40px; color: #ffffff; position: relative; overflow: hidden; box-shadow: 0 10px 30px -5px rgba(37, 99, 235, 0.3);">
        {{-- Preview Background Image Layer --}}
        <div id="previewBgImageWrap" style="position: absolute; inset: 0; z-index: 0; {{ $currentBgImage ? '' : 'display: none;' }}">
            <img id="previewBgImage" src="{{ $currentBgImage ?? '' }}" alt="Preview Background" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
            <div style="position: absolute; inset: 0; background: linear-gradient(90deg, rgba(15, 23, 42, 0.88) 0%, rgba(30, 58, 138, 0.72) 55%, rgba(37, 99, 235, 0.45) 100%);"></div>
        </div>

        {{-- Preview Blob Layer (shown when no image) --}}
        <div id="previewBlob" style="position: absolute; right: -50px; top: -50px; width: 320px; height: 320px; background: radial-gradient(circle, rgba(59, 130, 246, 0.45) 0%, rgba(37, 99, 235, 0) 70%); border-radius: 50%; pointer-events: none; z-index: 1; {{ ($currentBgImage || !($heroSection['blob_active'] ?? true)) ? 'display: none;' : '' }}"></div>
        
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
        <form action="{{ route('admin.settings.banner.update') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            {{-- Background Mode Manager (Image vs Blob) --}}
            <div style="border: 1.5px dashed #cbd5e1; border-radius: 16px; padding: 20px; background: #f8fafc;">
                <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 14px;">
                    <div>
                        <h3 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 3px 0;">Foto Latar Belakang Hero Section (2 Mode: Gambar / Blob)</h3>
                        <p style="font-size: 12px; color: #64748b; margin: 0;">Jika foto diisi, Hero Section beranda otomatis menggunakan <strong>Background Gambar</strong>. Jika dikosongkan/dihapus, otomatis kembali menggunakan <strong>Mode Organic Blob</strong>.</p>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; align-items: start;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Upload Foto Background (JPG, PNG, WEBP, maks 5MB)</label>
                        <input type="file" id="inputBgFile" name="bg_image_file" accept="image/*" onchange="handleFilePreview(this)" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; background: #ffffff;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Atau Gunakan URL Gambar Eksternal</label>
                        <input type="text" id="inputBgUrl" name="bg_image_url" value="{{ old('bg_image_url', $currentBgImage ?? '') }}" placeholder="https://images.unsplash.com/..." oninput="handleUrlPreview(this.value)" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #ffffff;">
                    </div>
                </div>

                @if($currentBgImage)
                <div style="margin-top: 14px; padding-top: 14px; border-top: 1px solid #e2e8f0; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <img src="{{ $currentBgImage }}" alt="Current Hero Background" style="width: 84px; height: 48px; object-fit: cover; border-radius: 8px; border: 1px solid #cbd5e1;">
                        <div>
                            <div style="font-size: 12px; font-weight: 700; color: #0f172a;">Foto Aktif Tersimpan</div>
                            <div style="font-size: 11px; color: #64748b; max-width: 340px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $currentBgImage }}</div>
                        </div>
                    </div>
                    <label style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 10px; background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; font-size: 12px; font-weight: 700; cursor: pointer;">
                        <input type="checkbox" id="inputRemoveBg" name="remove_bg_image" value="1" onchange="handleRemoveToggle(this.checked)" style="width: 15px; height: 15px;">
                        <span>Hapus Foto (Pakai Mode Blob)</span>
                    </label>
                </div>
                @endif
            </div>

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
                        <div style="font-size: 11px; color: #64748b;">Aktif saat menggunakan Mode Blob (tanpa foto)</div>
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

function setPreviewImageMode(src) {
    var wrap = document.getElementById('previewBgImageWrap');
    var img  = document.getElementById('previewBgImage');
    var blob = document.getElementById('previewBlob');
    var blobCheck = document.getElementById('inputBlob');

    if (src) {
        img.src = src;
        wrap.style.display = 'block';
        blob.style.display = 'none';
    } else {
        img.src = '';
        wrap.style.display = 'none';
        blob.style.display = (blobCheck && blobCheck.checked) ? 'block' : 'none';
    }
}

function handleFilePreview(input) {
    var removeCheck = document.getElementById('inputRemoveBg');
    if (removeCheck) removeCheck.checked = false;

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            setPreviewImageMode(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function handleUrlPreview(url) {
    var removeCheck = document.getElementById('inputRemoveBg');
    if (removeCheck && url.trim() !== '') removeCheck.checked = false;
    setPreviewImageMode(url.trim());
}

function handleRemoveToggle(checked) {
    if (checked) {
        var fileInp = document.getElementById('inputBgFile');
        if (fileInp) fileInp.value = '';
        setPreviewImageMode('');
    } else {
        var urlInp = document.getElementById('inputBgUrl');
        setPreviewImageMode(urlInp ? urlInp.value.trim() : '');
    }
}

function toggleBlob(checked) {
    var wrap = document.getElementById('previewBgImageWrap');
    if (wrap && wrap.style.display !== 'none') return;
    document.getElementById('previewBlob').style.display = checked ? 'block' : 'none';
}

function toggleSearchBar(checked) {
    document.getElementById('liveSearchBar').style.display = checked ? 'flex' : 'none';
}
</script>
@endsection
