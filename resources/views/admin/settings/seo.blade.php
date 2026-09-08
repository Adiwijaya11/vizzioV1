@extends('layouts.admin.app')

@section('title', 'SEO & Meta Tag — VizzioCraft')
@section('page_title', 'SEO & Meta Tag')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 3px 10px; border-radius: 9999px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; margin-bottom: 6px; border: 1px solid #bfdbfe;">
                Pengaturan & Halaman
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Konfigurasi SEO & OpenGraph Meta</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Optimalisasi indexing mesin pencari Google, tag media sosial, dan integrasi tracking analitik.</p>
        </div>
        <div style="padding: 6px 14px; border-radius: 10px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #059669; font-size: 12px; font-weight: 700;">
            Sitemap: {{ $seoMeta['sitemap_status'] ?? 'Aktif (/sitemap.xml)' }}
        </div>
    </div>

    {{-- Main Layout: Form on Left, Live Google SERP & Social Preview on Right --}}
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start;">
        
        {{-- Left: SEO Form --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
            <form action="{{ route('admin.settings.seo.update') }}" method="POST" style="display: flex; flex-direction: column; gap: 22px;">
                @csrf

                {{-- Basic Meta --}}
                <div>
                    <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #2563eb;"></span>
                        Tag Judul & Deskripsi Utama
                    </h2>
                    
                    <div style="display: grid; grid-template-columns: 3fr 1fr; gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Judul Standar Situs (Meta Title) *</label>
                            <input type="text" id="seoSiteTitle" name="site_title" value="{{ old('site_title', $seoMeta['site_title'] ?? '') }}" required oninput="updateSerpPreview()" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Pemisah (Separator)</label>
                            <input type="text" name="title_separator" value="{{ old('title_separator', $seoMeta['title_separator'] ?? '|') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; text-align: center; font-family: 'Poppins', sans-serif;">
                        </div>
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Deskripsi Penelusuran (Meta Description) *</label>
                        <textarea id="seoMetaDesc" name="meta_description" rows="3" required oninput="updateSerpPreview()" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('meta_description', $seoMeta['meta_description'] ?? '') }}</textarea>
                        <div style="display: flex; justify-content: space-between; font-size: 11px; color: #94a3b8; margin-top: 4px;">
                            <span>Disarankan 120-160 karakter untuk keterbacaan Google SERP.</span>
                            <span id="charCount">0 karakter</span>
                        </div>
                    </div>
                </div>

                {{-- Keywords & OpenGraph --}}
                <div>
                    <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #2563eb;"></span>
                        OpenGraph & Media Sosial
                    </h2>

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kata Kunci Penelusuran (Meta Keywords)</label>
                        <input type="text" name="keywords" value="{{ old('keywords', $seoMeta['keywords'] ?? '') }}" placeholder="software house jakarta, jasa pembuatan website, konsultan it..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">URL Gambar Pratinjau Sosial Media (og:image)</label>
                        <input type="url" id="seoOgImage" name="og_image" value="{{ old('og_image', $seoMeta['og_image'] ?? '') }}" oninput="updateSocialPreview()" placeholder="https://images.unsplash.com/..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                    </div>
                </div>

                {{-- Indexing & Webmaster Tracking --}}
                <div>
                    <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #2563eb;"></span>
                        Robot Indexing & Kode Verifikasi Webmaster
                    </h2>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">URL Kanonikal Utama *</label>
                            <input type="url" name="canonical_url" value="{{ old('canonical_url', $seoMeta['canonical_url'] ?? 'https://vizziocraft.com') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Instruksi Robots Meta *</label>
                            <input type="text" name="robots" value="{{ old('robots', $seoMeta['robots'] ?? 'index, follow, max-image-preview:large') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Google Analytics (GA4 Measurement ID)</label>
                            <input type="text" name="google_analytics" value="{{ old('google_analytics', $seoMeta['google_analytics'] ?? '') }}" placeholder="Contoh: G-XXXXXXXXXX" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: monospace;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Google Search Console Token</label>
                            <input type="text" name="google_search_console" value="{{ old('google_search_console', $seoMeta['google_search_console'] ?? '') }}" placeholder="google-site-verification=..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: monospace;">
                        </div>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px; border-top: 1px solid #f1f5f9; padding-top: 18px;">
                    <button type="submit" style="padding: 12px 28px; border-radius: 12px; background: #2563eb; color: #fff; font-size: 13px; font-weight: 800; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28);">
                        Simpan Konfigurasi SEO
                    </button>
                </div>
            </form>
        </div>

        {{-- Right: Live Google SERP & Social Preview --}}
        <div style="display: flex; flex-direction: column; gap: 20px;">
            
            {{-- Google Search Result Snippet --}}
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px;">
                    <span style="font-size: 11px; font-weight: 800; color: #475569; text-transform: uppercase;">Pratinjau Google Search (SERP)</span>
                    <span style="font-size: 10px; color: #059669; font-weight: 700;">Live Desktop Preview</span>
                </div>

                <div style="background: #ffffff; border: 1px solid #f1f5f9; border-radius: 12px; padding: 14px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                        <div style="width: 18px; height: 18px; border-radius: 50%; background: #2563eb; color: #fff; font-size: 10px; font-weight: 900; display: flex; align-items: center; justify-content: center;">
                            V
                        </div>
                        <div>
                            <div style="font-size: 11px; color: #202124; font-weight: 600;">VizzioCraft</div>
                            <div style="font-size: 10px; color: #5f6368; font-family: monospace;">https://vizziocraft.com</div>
                        </div>
                    </div>
                    <div id="previewTitle" style="font-size: 15px; font-weight: 600; color: #1a0dab; line-height: 1.3; margin-bottom: 4px; cursor: pointer;">
                        {{ $seoMeta['site_title'] ?? 'VizzioCraft — Bergerak Memberi Solusi' }}
                    </div>
                    <div id="previewDesc" style="font-size: 12px; color: #4d5156; line-height: 1.4;">
                        {{ $seoMeta['meta_description'] ?? 'VizzioCraft menyediakan layanan Apps & Software Development...' }}
                    </div>
                </div>
            </div>

            {{-- OpenGraph Social Preview --}}
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="font-size: 11px; font-weight: 800; color: #475569; text-transform: uppercase; margin-bottom: 12px;">
                    Pratinjau Kartu Sosial (OpenGraph)
                </div>
                <div style="border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden;">
                    <img id="previewImage" src="{{ $seoMeta['og_image'] ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80' }}" alt="social-og" style="width: 100%; height: 130px; object-fit: cover;">
                    <div style="padding: 12px; background: #f8fafc;">
                        <div style="font-size: 9.5px; text-transform: uppercase; color: #64748b; font-weight: 700;">vizziocraft.com</div>
                        <div id="previewSocialTitle" style="font-size: 12.5px; font-weight: 700; color: #0f172a; margin-top: 2px;">
                            {{ $seoMeta['site_title'] ?? 'VizzioCraft' }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
function updateSerpPreview() {
    const title = document.getElementById('seoSiteTitle').value || 'VizzioCraft — Bergerak Memberi Solusi';
    const desc = document.getElementById('seoMetaDesc').value || 'Solusi digital terpadu untuk bisnis Anda.';
    document.getElementById('previewTitle').innerText = title;
    document.getElementById('previewSocialTitle').innerText = title;
    document.getElementById('previewDesc').innerText = desc;
    document.getElementById('charCount').innerText = desc.length + ' karakter';
}
function updateSocialPreview() {
    const imgUrl = document.getElementById('seoOgImage').value;
    if (imgUrl) {
        document.getElementById('previewImage').src = imgUrl;
    }
}
document.addEventListener('DOMContentLoaded', updateSerpPreview);
</script>
@endsection
