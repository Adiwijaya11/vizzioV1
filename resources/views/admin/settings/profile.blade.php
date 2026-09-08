@extends('layouts.admin.app')

@section('title', 'Profil Perusahaan — VizzioCraft')
@section('page_title', 'Profil Perusahaan')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

    {{-- Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 3px 10px; border-radius: 9999px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; margin-bottom: 6px; border: 1px solid #bfdbfe;">
                Pengaturan & Halaman
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Profil Resmi Perusahaan</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola identitas hukum, brand visual, narasi visi & misi, kontak bisnis, dan media sosial resmi VizzioCraft.</p>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="/" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 16px; border-radius: 12px; background: #f8fafc; color: #475569; font-size: 12px; font-weight: 700; text-decoration: none; border: 1px solid #e2e8f0;">
                Lihat Website Publik &rarr;
            </a>
        </div>
    </div>

    {{-- Main Grid: Form on Left, Live Card Preview on Right --}}
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start;">
        
        {{-- Left: Edit Form --}}
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
            <form action="{{ route('admin.settings.profile.update') }}" method="POST" style="display: flex; flex-direction: column; gap: 22px;">
                @csrf

                {{-- Section: Identitas Inti --}}
                <div>
                    <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #2563eb;"></span>
                        Identitas Legal & Komersial
                    </h2>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Entitas Legal *</label>
                            <input type="text" name="name" value="{{ old('name', $profile['name'] ?? '') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Brand Komersial *</label>
                            <input type="text" name="brand" value="{{ old('brand', $profile['brand'] ?? '') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                    </div>
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Slogan / Tagline Resmi</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $profile['tagline'] ?? '') }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>

                {{-- Section: Visi & Misi --}}
                <div>
                    <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #2563eb;"></span>
                        Visi & Misi Perusahaan
                    </h2>
                    <div style="display: flex; flex-direction: column; gap: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Visi Jangka Panjang</label>
                            <textarea name="vision" rows="2" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('vision', $profile['vision'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Misi Strategis</label>
                            <textarea name="mission" rows="3" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('mission', $profile['mission'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Section: Kontak & Lokasi --}}
                <div>
                    <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #2563eb;"></span>
                        Kontak & Jam Operasional
                    </h2>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Email Bisnis Utama *</label>
                            <input type="email" name="email" value="{{ old('email', $profile['email'] ?? '') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Email Customer Support</label>
                            <input type="email" name="support" value="{{ old('support', $profile['support'] ?? '') }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">No. WhatsApp / Telepon *</label>
                            <input type="text" name="phone" value="{{ old('phone', $profile['phone'] ?? '') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Jam Kerja & Layanan</label>
                            <input type="text" name="operating_hours" value="{{ old('operating_hours', $profile['operating_hours'] ?? 'Senin - Jumat: 08:30 - 17:30 WIB') }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                        </div>
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Alamat Kantor Fisik</label>
                        <textarea name="address" rows="2" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">{{ old('address', $profile['address'] ?? '') }}</textarea>
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tautan Google Maps</label>
                        <input type="url" name="maps_url" value="{{ old('maps_url', $profile['maps_url'] ?? '') }}" placeholder="https://maps.google.com/..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                    </div>
                </div>

                {{-- Section: Media Sosial --}}
                <div>
                    <h2 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0 0 14px 0; display: flex; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #2563eb;"></span>
                        Tautan Media Sosial Resmi
                    </h2>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                        <div>
                            <label style="display: block; font-size: 11.5px; font-weight: 600; color: #475569; margin-bottom: 4px;">LinkedIn Page</label>
                            <input type="url" name="social_linkedin" value="{{ old('social_linkedin', $profile['socials']['linkedin'] ?? '') }}" placeholder="https://linkedin.com/company/..." style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 11.5px; font-weight: 600; color: #475569; margin-bottom: 4px;">GitHub Organization</label>
                            <input type="url" name="social_github" value="{{ old('social_github', $profile['socials']['github'] ?? '') }}" placeholder="https://github.com/..." style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 11.5px; font-weight: 600; color: #475569; margin-bottom: 4px;">Twitter / X</label>
                            <input type="url" name="social_twitter" value="{{ old('social_twitter', $profile['socials']['twitter'] ?? '') }}" placeholder="https://twitter.com/..." style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 11.5px; font-weight: 600; color: #475569; margin-bottom: 4px;">Instagram Official</label>
                            <input type="url" name="social_instagram" value="{{ old('social_instagram', $profile['socials']['instagram'] ?? '') }}" placeholder="https://instagram.com/..." style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px;">
                        </div>
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 11.5px; font-weight: 600; color: #475569; margin-bottom: 4px;">YouTube Channel</label>
                            <input type="url" name="social_youtube" value="{{ old('social_youtube', $profile['socials']['youtube'] ?? '') }}" placeholder="https://youtube.com/@..." style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px;">
                        </div>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 10px; border-top: 1px solid #f1f5f9; padding-top: 18px;">
                    <button type="submit" style="padding: 12px 28px; border-radius: 12px; background: #2563eb; color: #fff; font-size: 13px; font-weight: 800; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28);">
                        Simpan Perubahan Profil
                    </button>
                </div>
            </form>
        </div>

        {{-- Right: Live Preview Card --}}
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div style="background: linear-gradient(145deg, #0f172a 0%, #1e293b 100%); border-radius: 20px; padding: 24px; color: #ffffff; box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.3);">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 18px;">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: #2563eb; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 20px; color: #fff; box-shadow: 0 4px 12px rgba(37,99,235,0.4);">
                        V
                    </div>
                    <div>
                        <div style="font-size: 16px; font-weight: 800; color: #fff;">{{ $profile['brand'] ?? 'VizzioCraft' }}</div>
                        <div style="font-size: 11px; color: #94a3b8;">{{ $profile['tagline'] ?? 'Bergerak Memberi Solusi' }}</div>
                    </div>
                </div>

                <div style="font-size: 11.5px; color: #cbd5e1; line-height: 1.5; margin-bottom: 16px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 14px;">
                    {{ Str::limit($profile['vision'] ?? '', 120) }}
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px; font-size: 11px; color: #94a3b8;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ $profile['email'] ?? 'hello@vizziocraft.com' }}</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>{{ $profile['phone'] ?? '+62 831-1459-2416' }}</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $profile['operating_hours'] ?? 'Sen - Jum: 08:30 - 17:30' }}</span>
                    </div>
                </div>
            </div>

            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px;">
                <div style="font-size: 12px; font-weight: 800; color: #0f172a; margin-bottom: 8px;">Sinkronisasi Otomatis</div>
                <p style="font-size: 11.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Semua perubahan informasi di halaman ini akan langsung disinkronkan ke footer landing page, halaman About Us, serta halaman Kontak.
                </p>
            </div>
        </div>

    </div>

</div>
@endsection
