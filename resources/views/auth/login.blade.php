<!DOCTYPE html>
<html lang="id" class="h-full font-poppins">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Login Admin — VizzioCraft</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="h-full bg-white font-poppins text-ink antialiased">

    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-12">
        
        {{-- LEFT SECTION: Brand Showcase & Blob Wallpaper (50% / lg:col-span-6) --}}
        <div class="relative lg:col-span-6 flex flex-col justify-between p-8 sm:p-12 lg:p-16 bg-gradient-to-br from-primary-deep via-primary to-[#1E40AF] text-white overflow-hidden min-h-[380px] lg:min-h-screen">
            
            {{-- Organic Blob Animation Component matching website theme --}}
            <x-hero-blob prefix="loginHero" />

            {{-- Top Branding Header --}}
            <div class="relative z-10 flex items-center justify-between">
                <a href="/" class="inline-flex items-center gap-2 text-white font-extrabold text-xl tracking-tight">
                    <div class="w-10 h-10 rounded-xl bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center font-bold text-white shadow-inner">
                        VC
                    </div>
                    <span>Vizzio<span class="text-sky-300">Craft</span></span>
                </a>

                <a href="/" class="inline-flex items-center gap-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 px-3.5 py-1.5 text-xs font-semibold text-white backdrop-blur-sm transition-all">
                    <svg class="w-3.5 h-3.5 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>

            {{-- Middle Tagline & Brand Narrative --}}
            <div class="relative z-10 my-auto py-10 max-w-lg">
                <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1.5 text-xs font-bold text-sky-200 border border-white/20 mb-6 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                    <span>PORTAL MANAGEMENT SYSTEM</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-5 leading-tight">
                    Solusi Digital & Rekayasa Sistem Terpercaya
                </h1>

                <p class="text-sm sm:text-base text-blue-100/90 leading-relaxed font-normal mb-8">
                    Kelola berita, pembaruan layanan, dan pesan konsultasi klien dari panel kontrol internal yang aman dan berkinerja tinggi.
                </p>

                {{-- 3 Pill Badges --}}
                <div class="grid grid-cols-3 gap-3">
                    <div class="p-3 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-center">
                        <div class="text-sm font-extrabold text-white">99.9%</div>
                        <div class="text-[10px] text-blue-100/80 mt-0.5 font-medium">Uptime Guarantee</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-center">
                        <div class="text-sm font-extrabold text-white">256-bit</div>
                        <div class="text-[10px] text-blue-100/80 mt-0.5 font-medium">Encrypted Auth</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-center">
                        <div class="text-sm font-extrabold text-white">Realtime</div>
                        <div class="text-[10px] text-blue-100/80 mt-0.5 font-medium">Dashboard Control</div>
                    </div>
                </div>
            </div>

            {{-- Footer Credit --}}
            <div class="relative z-10 text-xs text-blue-100/70">
                &copy; {{ date('Y') }} VizzioCraft Technology Studio. All rights reserved.
            </div>
        </div>

        {{-- RIGHT SECTION: Form Login (50% / lg:col-span-6) --}}
        <div class="lg:col-span-6 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-white min-h-[500px]">
            <div class="w-full max-w-md space-y-8">
                
                {{-- Form Header --}}
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-primary mb-2 block">
                        AKSES ADMINISTRATOR
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-ink tracking-tight">
                        Masuk ke Dashboard
                    </h2>
                    <p class="text-xs sm:text-sm text-ink-muted mt-1.5 leading-relaxed font-normal">
                        Masukkan kredensial akun admin Anda untuk mengelola konten website VizzioCraft.
                    </p>
                </div>

                {{-- Alert Notification if Error --}}
                @if(session('error') || $errors->any())
                    <div class="rounded-2xl bg-rose-50 border border-rose-200 p-4 text-xs text-rose-700 flex items-center gap-3">
                        <svg class="w-5 h-5 text-rose-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ session('error') ?: $errors->first() }}</span>
                    </div>
                @endif

                {{-- Login Form --}}
                <form class="space-y-5" action="/login" method="POST">
                    @csrf
                    
                    {{-- Email Input Field --}}
                    <div>
                        <label for="email" class="block text-xs font-bold text-ink mb-2">
                            Alamat Email Admin
                        </label>
                        <div class="relative">
                            <input
                                id="email"
                                name="email"
                                type="email"
                                required
                                autocomplete="email"
                                placeholder="nama@vizziocraft.com"
                                value="{{ old('email') }}"
                                class="w-full rounded-xl border border-border bg-[#F8FAFC] pl-10 pr-4 py-3 text-xs sm:text-sm text-ink placeholder:text-ink-muted/60 focus:bg-white focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all font-poppins"
                            />
                            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-ink-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                    </div>

                    {{-- Password Input Field --}}
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-bold text-ink">
                                Kata Sandi
                            </label>
                        </div>
                        <div class="relative">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan kata sandi"
                                class="w-full rounded-xl border border-border bg-[#F8FAFC] pl-10 pr-11 py-3 text-xs sm:text-sm text-ink placeholder:text-ink-muted/60 focus:bg-white focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all font-poppins"
                            />
                            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-ink-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <button type="button" onclick="togglePasswordVisibility()" aria-label="Tampilkan atau sembunyikan kata sandi" class="absolute right-3 top-1/2 -translate-y-1/2 text-ink-muted hover:text-ink p-1 cursor-pointer">
                                <svg id="eyeIconOpen" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg id="eyeIconClosed" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-primary py-3.5 text-xs sm:text-sm font-bold text-white shadow-lg shadow-primary/25 hover:bg-primary-dark hover:shadow-xl hover:shadow-primary/35 focus:outline-none focus:ring-2 focus:ring-primary/40 transition-all duration-200 cursor-pointer flex items-center justify-center gap-2 font-poppins"
                    >
                        <span>Masuk ke Dashboard Admin</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>

                <script>
                function togglePasswordVisibility() {
                    const input = document.getElementById('password');
                    const openIcon = document.getElementById('eyeIconOpen');
                    const closedIcon = document.getElementById('eyeIconClosed');
                    if (input.type === 'password') {
                        input.type = 'text';
                        openIcon.classList.add('hidden');
                        closedIcon.classList.remove('hidden');
                    } else {
                        input.type = 'password';
                        openIcon.classList.remove('hidden');
                        closedIcon.classList.add('hidden');
                    }
                }
                </script>

                {{-- Security Note --}}
                <div class="pt-4 border-t border-border/60 text-center">
                    <p class="text-[11px] text-ink-muted leading-relaxed">
                        Halaman ini khusus dialokasikan untuk pengelola terdaftar VizzioCraft. Seluruh percobaan akses dipantau secara otomatis.
                    </p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
