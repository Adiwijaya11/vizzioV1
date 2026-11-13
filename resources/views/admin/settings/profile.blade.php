@extends('layouts.admin.app')

@section('title', 'Profil Perusahaan — VizzioCraft')
@section('page_title', 'Profil Perusahaan')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-[11px] font-semibold tracking-wide mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                Pengaturan & Halaman
            </span>
            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">Profil Resmi Perusahaan</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Kelola identitas hukum, brand visual, narasi visi & misi, kontak bisnis, dan media sosial resmi VizzioCraft.</p>
        </div>
        <div class="shrink-0">
            <a href="/" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white text-slate-700 hover:text-blue-600 hover:border-blue-200 text-xs font-semibold border border-slate-200 shadow-xs transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat Website Publik
            </a>
        </div>
    </div>

    {{-- Main Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

        {{-- Left: Structured Form --}}
        <form action="{{ route('admin.settings.profile.update') }}" method="POST" class="lg:col-span-8 space-y-5">
            @csrf

            {{-- Card 1: Identitas Legal & Komersial --}}
            <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs space-y-4">
                <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-slate-900">Identitas Legal & Komersial</h2>
                        <p class="text-[11px] text-slate-500">Nama resmi perusahaan dan identitas brand yang tampil di publik.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama Entitas Legal <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $profile['name'] ?? '') }}" required
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama Brand Komersial <span class="text-rose-500">*</span></label>
                        <input type="text" id="inputBrand" name="brand" value="{{ old('brand', $profile['brand'] ?? '') }}" required
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Slogan / Tagline Resmi</label>
                    <input type="text" id="inputTagline" name="tagline" value="{{ old('tagline', $profile['tagline'] ?? '') }}"
                           placeholder="Contoh: Bergerak Memberi Solusi"
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                </div>
            </div>

            {{-- Card 2: Visi & Misi --}}
            <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs space-y-4">
                <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-slate-900">Visi & Misi Perusahaan</h2>
                        <p class="text-[11px] text-slate-500">Arah jangka panjang dan komitmen strategis VizzioCraft.</p>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Visi Jangka Panjang</label>
                    <textarea id="inputVision" name="vision" rows="2"
                              class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition leading-relaxed">{{ old('vision', $profile['vision'] ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Misi Strategis</label>
                    <textarea name="mission" rows="3"
                              class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition leading-relaxed">{{ old('mission', $profile['mission'] ?? '') }}</textarea>
                </div>
            </div>

            {{-- Card 3: Kontak & Jam Operasional --}}
            <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs space-y-4">
                <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-slate-900">Kontak & Lokasi Operasional</h2>
                        <p class="text-[11px] text-slate-500">Informasi komunikasi resmi, alamat kantor, dan jam layanan.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email Bisnis Utama <span class="text-rose-500">*</span></label>
                        <input type="email" id="inputEmail" name="email" value="{{ old('email', $profile['email'] ?? '') }}" required
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email Customer Support</label>
                        <input type="email" name="support" value="{{ old('support', $profile['support'] ?? '') }}"
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">No. WhatsApp / Telepon <span class="text-rose-500">*</span></label>
                        <input type="text" id="inputPhone" name="phone" value="{{ old('phone', $profile['phone'] ?? '') }}" required
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Jam Kerja & Layanan</label>
                        <input type="text" id="inputHours" name="operating_hours" value="{{ old('operating_hours', $profile['operating_hours'] ?? 'Senin - Jumat: 08:30 - 17:30 WIB') }}"
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Alamat Kantor Fisik</label>
                    <textarea name="address" rows="2"
                              class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition leading-relaxed">{{ old('address', $profile['address'] ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Tautan Google Maps</label>
                    <input type="url" name="maps_url" value="{{ old('maps_url', $profile['maps_url'] ?? '') }}"
                           placeholder="https://maps.google.com/..."
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                </div>
            </div>

            {{-- Card 4: Media Sosial --}}
            <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs space-y-4">
                <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-slate-900">Tautan Media Sosial Resmi</h2>
                        <p class="text-[11px] text-slate-500">Akun resmi yang ditampilkan di footer dan halaman kontak.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">LinkedIn Page</label>
                        <input type="url" name="social_linkedin" data-social="LinkedIn" value="{{ old('social_linkedin', $profile['socials']['linkedin'] ?? '') }}"
                               placeholder="https://linkedin.com/company/..."
                               class="social-input w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">GitHub Organization</label>
                        <input type="url" name="social_github" data-social="GitHub" value="{{ old('social_github', $profile['socials']['github'] ?? '') }}"
                               placeholder="https://github.com/..."
                               class="social-input w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Twitter / X</label>
                        <input type="url" name="social_twitter" data-social="X / Twitter" value="{{ old('social_twitter', $profile['socials']['twitter'] ?? '') }}"
                               placeholder="https://twitter.com/..."
                               class="social-input w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Instagram Official</label>
                        <input type="url" name="social_instagram" data-social="Instagram" value="{{ old('social_instagram', $profile['socials']['instagram'] ?? '') }}"
                               placeholder="https://instagram.com/..."
                               class="social-input w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">YouTube Channel</label>
                        <input type="url" name="social_youtube" data-social="YouTube" value="{{ old('social_youtube', $profile['socials']['youtube'] ?? '') }}"
                               placeholder="https://youtube.com/@..."
                               class="social-input w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                    </div>
                </div>
            </div>

            {{-- Submit Bar --}}
            <div class="flex items-center justify-end gap-3 pt-1">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs sm:text-sm font-bold shadow-md shadow-blue-600/20 cursor-pointer transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    Simpan Perubahan Profil
                </button>
            </div>
        </form>

        {{-- Right: Sticky Live Preview Card --}}
        <div class="lg:col-span-4 lg:sticky lg:top-6 space-y-4">
            <div class="rounded-2xl bg-gradient-to-br from-slate-900 via-slate-900 to-blue-950 p-6 text-white shadow-xl shadow-slate-900/15 border border-slate-800">
                <div class="flex items-center justify-between mb-5">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-blue-300 bg-blue-500/15 border border-blue-400/25 px-2.5 py-1 rounded-full">Live Preview</span>
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                </div>

                <div class="flex items-center gap-3.5 mb-5">
                    <div id="previewAvatar" class="w-11 h-11 rounded-xl bg-blue-600 flex items-center justify-center font-extrabold text-lg text-white shadow-lg shadow-blue-600/30 shrink-0">
                        {{ strtoupper(substr($profile['brand'] ?? 'V', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <div id="previewBrand" class="text-base font-bold text-white truncate">{{ $profile['brand'] ?? 'VizzioCraft' }}</div>
                        <div id="previewTagline" class="text-xs text-slate-400 truncate">{{ $profile['tagline'] ?? 'Bergerak Memberi Solusi' }}</div>
                    </div>
                </div>

                <p id="previewVision" class="text-xs text-slate-300 leading-relaxed pb-4 mb-4 border-b border-white/10">
                    {{ Str::limit($profile['vision'] ?? '', 120) }}
                </p>

                <div class="space-y-2.5 text-xs text-slate-300">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-3.5 h-3.5 text-blue-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span id="previewEmail" class="truncate">{{ $profile['email'] ?? 'vizziocraft@gmail.com' }}</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg class="w-3.5 h-3.5 text-blue-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span id="previewPhone" class="truncate">{{ $profile['phone'] ?? '+62 831-1459-2416' }}</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg class="w-3.5 h-3.5 text-blue-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span id="previewHours" class="truncate">{{ $profile['operating_hours'] ?? 'Sen - Jum: 08:30 - 17:30' }}</span>
                    </div>
                </div>

                <div id="previewSocials" class="mt-5 pt-4 border-t border-white/10 flex flex-wrap gap-1.5">
                    @foreach(['linkedin' => 'LinkedIn', 'github' => 'GitHub', 'twitter' => 'X / Twitter', 'instagram' => 'Instagram', 'youtube' => 'YouTube'] as $key => $label)
                        @if(!empty($profile['socials'][$key] ?? ''))
                            <span class="px-2 py-0.5 rounded-md bg-white/10 text-[10px] font-semibold text-slate-200">{{ $label }}</span>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-xs">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-slate-900 mb-1">Sinkronisasi Otomatis</div>
                        <p class="text-[11.5px] text-slate-500 leading-relaxed">
                            Semua perubahan informasi di halaman ini otomatis diterapkan ke footer landing page, halaman About Us, serta halaman Kontak.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
(function() {
    const inputBrand = document.getElementById('inputBrand');
    const inputTagline = document.getElementById('inputTagline');
    const inputVision = document.getElementById('inputVision');
    const inputEmail = document.getElementById('inputEmail');
    const inputPhone = document.getElementById('inputPhone');
    const inputHours = document.getElementById('inputHours');
    const socialInputs = document.querySelectorAll('.social-input');

    const previewAvatar = document.getElementById('previewAvatar');
    const previewBrand = document.getElementById('previewBrand');
    const previewTagline = document.getElementById('previewTagline');
    const previewVision = document.getElementById('previewVision');
    const previewEmail = document.getElementById('previewEmail');
    const previewPhone = document.getElementById('previewPhone');
    const previewHours = document.getElementById('previewHours');
    const previewSocials = document.getElementById('previewSocials');

    if (inputBrand) {
        inputBrand.addEventListener('input', function() {
            const val = this.value.trim() || 'VizzioCraft';
            if (previewBrand) previewBrand.textContent = val;
            if (previewAvatar) previewAvatar.textContent = val.charAt(0).toUpperCase();
        });
    }
    if (inputTagline && previewTagline) {
        inputTagline.addEventListener('input', function() {
            previewTagline.textContent = this.value.trim() || 'Bergerak Memberi Solusi';
        });
    }
    if (inputVision && previewVision) {
        inputVision.addEventListener('input', function() {
            const text = this.value.trim();
            previewVision.textContent = text.length > 120 ? text.slice(0, 120) + '...' : text;
        });
    }
    if (inputEmail && previewEmail) {
        inputEmail.addEventListener('input', function() {
            previewEmail.textContent = this.value.trim() || 'vizziocraft@gmail.com';
        });
    }
    if (inputPhone && previewPhone) {
        inputPhone.addEventListener('input', function() {
            previewPhone.textContent = this.value.trim() || '+62 831-1459-2416';
        });
    }
    if (inputHours && previewHours) {
        inputHours.addEventListener('input', function() {
            previewHours.textContent = this.value.trim() || 'Sen - Jum: 08:30 - 17:30';
        });
    }
    if (socialInputs.length && previewSocials) {
        const updateSocialPills = function() {
            previewSocials.innerHTML = '';
            socialInputs.forEach(input => {
                if (input.value.trim()) {
                    const pill = document.createElement('span');
                    pill.className = 'px-2 py-0.5 rounded-md bg-white/10 text-[10px] font-semibold text-slate-200';
                    pill.textContent = input.dataset.social || '';
                    previewSocials.appendChild(pill);
                }
            });
        };
        socialInputs.forEach(input => input.addEventListener('input', updateSocialPills));
    }
})();
</script>
@endsection
