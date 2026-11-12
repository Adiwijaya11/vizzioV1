@extends('layouts.app')

@section('title', 'Kontak Kami — VizzioCraft')
@section('meta_description', 'Hubungi tim VizzioCraft untuk konsultasi gratis, penawaran proyek, atau pertanyaan seputar layanan digital kami. Kami siap membantu bisnis Anda berkembang.')

@section('content')
   
    {{-- Contact Form & Info Section --}}
    <section class="relative py-12 sm:py-20 lg:py-32 bg-white overflow-hidden">
        <x-hero-blob prefix="contactForm" />

        <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pt-4 sm:pt-8">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.2fr] gap-8 sm:gap-12 lg:gap-16">
                {{-- Left: Contact Info --}}
                <div class="lg:pl-4">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 text-primary border border-primary/20 lg:bg-white/10 lg:text-white lg:border-white/20 px-3.5 py-1 text-xs font-semibold mb-4 sm:mb-6 backdrop-blur-sm">
                        <span data-lang-id>INFORMASI KONTAK</span>
                        <span data-lang-en class="hidden">CONTACT INFO</span>
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-ink lg:text-white mb-4 sm:mb-6 leading-snug">
                        <span data-lang-id>Kami Siap Mendengar</span>
                        <span data-lang-en class="hidden">We're Ready to Listen</span>
                    </h2>
                    <p class="text-sm sm:text-base text-ink-muted lg:text-blue-100 leading-relaxed mb-8 sm:mb-10 font-normal">
                        <span data-lang-id>Setiap proyek besar bermula dari percakapan sederhana. Jangan ragu untuk menghubungi kami — baik itu hanya untuk bertanya, diskusi ide, atau meminta penawaran harga.</span>
                        <span data-lang-en class="hidden">Every big project starts with a simple conversation. Don't hesitate to reach out — whether it's just a question, idea discussion, or a quote request.</span>
                    </p>

                    {{-- Contact Methods --}}
                    <div class="space-y-4 sm:space-y-6 mb-8 sm:mb-12">
                        {{-- Email --}}
                        <div class="group flex items-start gap-3.5 sm:gap-4 p-4 sm:p-5 rounded-2xl border border-border bg-[#F8FAFC] hover:border-primary/40 hover:bg-white lg:border-white/20 lg:bg-white/10 lg:backdrop-blur-md lg:hover:bg-white/20 lg:hover:border-white/30 hover:shadow-lg transition-all duration-300">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-primary/10 text-primary lg:bg-white/15 lg:text-white flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 sm:w-5.5 sm:h-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-sm sm:text-base font-bold text-ink lg:text-white mb-0.5 sm:mb-1">
                                    <span data-lang-id>Email</span>
                                    <span data-lang-en class="hidden">Email</span>
                                </h3>
                                <a href="mailto:vizziocraft@gmail.com" class="text-xs sm:text-sm text-ink-muted lg:text-blue-100 hover:text-primary lg:hover:text-white transition-colors truncate block">vizziocraft@gmail.com</a>
                                <p class="text-xs sm:text-sm text-ink-muted/70 lg:text-blue-100/70 mt-0.5 sm:mt-1">
                                    <span data-lang-id>Balasan dalam 24 jam kerja</span>
                                    <span data-lang-en class="hidden">Response within 24 business hours</span>
                                </p>
                            </div>
                        </div>

                        {{-- WhatsApp --}}
                        <div class="group flex items-start gap-3.5 sm:gap-4 p-4 sm:p-5 rounded-2xl border border-border bg-[#F8FAFC] hover:border-[#25D366]/40 hover:bg-white lg:border-white/20 lg:bg-white/10 lg:backdrop-blur-md lg:hover:bg-white/20 lg:hover:border-white/30 hover:shadow-lg transition-all duration-300">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#25D366]/10 text-[#16a34a] lg:bg-[#25D366]/20 lg:text-[#25D366] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 sm:w-5.5 sm:h-5.5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-sm sm:text-base font-bold text-ink lg:text-white mb-0.5 sm:mb-1">
                                    <span data-lang-id>WhatsApp</span>
                                    <span data-lang-en class="hidden">WhatsApp</span>
                                </h3>
                                <a href="https://wa.me/6283114592416?text=Halo%20VizzioCraft%2C%20saya%20ingin%20berkonsultasi" target="_blank" rel="noopener noreferrer" class="text-xs sm:text-sm text-ink-muted lg:text-blue-100 hover:text-[#16a34a] lg:hover:text-[#25D366] transition-colors truncate block">+62 831-1459-2416</a>
                                <p class="text-xs sm:text-sm text-ink-muted/70 lg:text-blue-100/70 mt-0.5 sm:mt-1">
                                    <span data-lang-id>Chat langsung dengan tim kami</span>
                                    <span data-lang-en class="hidden">Chat directly with our team</span>
                                </p>
                            </div>
                        </div>

                        {{-- Location --}}
                        <div class="group flex items-start gap-3.5 sm:gap-4 p-4 sm:p-5 rounded-2xl border border-border bg-[#F8FAFC] hover:border-primary/40 hover:bg-white lg:border-white/20 lg:bg-white/10 lg:backdrop-blur-md lg:hover:bg-white/20 lg:hover:border-white/30 hover:shadow-lg transition-all duration-300">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-sky-500/10 text-sky-600 lg:bg-sky-400/20 lg:text-sky-300 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 sm:w-5.5 sm:h-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-sm sm:text-base font-bold text-ink lg:text-white mb-0.5 sm:mb-1">
                                    <span data-lang-id>Lokasi</span>
                                    <span data-lang-en class="hidden">Location</span>
                                </h3>
                                <address class="text-xs sm:text-sm text-ink-muted lg:text-blue-100 not-italic leading-relaxed">
                                    <span data-lang-id>Denpasar, Bali, Indonesia<br>(Remote-First, Jangkauan Global)</span>
                                    <span data-lang-en class="hidden">Denpasar, Bali, Indonesia<br>(Remote-First, Global Reach)</span>
                                </address>
                            </div>
                        </div>
                    </div>

                    {{-- Social Links --}}
                    <div class="pt-6 sm:pt-8 border-t border-border lg:border-white/20 mb-8 lg:mb-0">
                        <p class="text-xs font-semibold text-ink-muted lg:text-blue-100/80 uppercase tracking-wider mb-3 sm:mb-4">
                            <span data-lang-id>IKUTI KAMI</span>
                            <span data-lang-en class="hidden">FOLLOW US</span>
                        </p>
                        <div class="flex items-center gap-2.5 sm:gap-3">
                            {{-- LinkedIn --}}
                            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#F8FAFC] border border-border text-ink-muted hover:bg-primary/10 hover:border-primary/40 hover:text-primary lg:bg-white/10 lg:border-white/20 lg:text-blue-100 lg:hover:bg-white/20 lg:hover:border-white/40 lg:hover:text-white lg:hover:shadow-[0_4px_16px_rgba(255,255,255,.15)] transition-all duration-200 flex items-center justify-center">
                                <svg class="w-4.5 h-4.5 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8.5h4V24h-4V8.5zM8.5 8.5h3.8v2.1h.05c.53-1 1.84-2.1 3.79-2.1 4.05 0 4.8 2.67 4.8 6.14V24h-4v-7.7c0-1.84-.03-4.2-2.56-4.2-2.56 0-2.95 2-2.95 4.06V24h-4V8.5z"/></svg>
                            </a>
                            {{-- GitHub --}}
                            <a href="https://github.com" target="_blank" rel="noopener noreferrer" aria-label="GitHub" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#F8FAFC] border border-border text-ink-muted hover:bg-primary/10 hover:border-primary/40 hover:text-primary lg:bg-white/10 lg:border-white/20 lg:text-blue-100 lg:hover:bg-white/20 lg:hover:border-white/40 lg:hover:text-white lg:hover:shadow-[0_4px_16px_rgba(255,255,255,.15)] transition-all duration-200 flex items-center justify-center">
                                <svg class="w-4.5 h-4.5 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                            </a>
                            {{-- Twitter / X --}}
                            <a href="https://x.com" target="_blank" rel="noopener noreferrer" aria-label="X (Twitter)" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#F8FAFC] border border-border text-ink-muted hover:bg-primary/10 hover:border-primary/40 hover:text-primary lg:bg-white/10 lg:border-white/20 lg:text-blue-100 lg:hover:bg-white/20 lg:hover:border-white/40 lg:hover:text-white lg:hover:shadow-[0_4px_16px_rgba(255,255,255,.15)] transition-all duration-200 flex items-center justify-center">
                                <svg class="w-4.5 h-4.5 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.9 2H22l-6.8 7.8L23 22h-6.4l-5-6.6L6 22H2.9l7.3-8.3L1 2h6.6l4.5 6L18.9 2zm-1.1 18h1.8L6.3 3.9H4.4L17.8 20z"/></svg>
                            </a>
                            {{-- Instagram --}}
                            <a href="https://www.instagram.com/vizziocraft/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#F8FAFC] border border-border text-ink-muted hover:bg-primary/10 hover:border-primary/40 hover:text-primary lg:bg-white/10 lg:border-white/20 lg:text-blue-100 lg:hover:bg-white/20 lg:hover:border-white/40 lg:hover:text-white lg:hover:shadow-[0_4px_16px_rgba(255,255,255,.15)] transition-all duration-200 flex items-center justify-center">
                                <svg class="w-4.5 h-4.5 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: Contact Form --}}
                <div class="relative">
                    <div class="bg-white rounded-2xl sm:rounded-3xl border border-border shadow-xl p-5 sm:p-8 lg:p-10">
                        <div class="mb-6 sm:mb-8">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3.5 py-1 text-xs font-semibold text-primary border border-primary/20 mb-2.5 sm:mb-3">
                                <span data-lang-id>KIRIM PESAN</span>
                                <span data-lang-en class="hidden">SEND MESSAGE</span>
                            </span>
                            <h3 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-ink">
                                <span data-lang-id>Isi Formulir di Bawah</span>
                                <span data-lang-en class="hidden">Fill Out the Form Below</span>
                            </h3>
                            <p class="text-xs sm:text-sm text-ink-muted mt-1.5 sm:mt-2">
                                <span data-lang-id>Kami akan merespons secepatnya. Bidang bertanda * wajib diisi.</span>
                                <span data-lang-en class="hidden">We'll respond as soon as possible. Fields marked * are required.</span>
                            </p>
                        </div>

                        <form id="contact-form" class="space-y-4 sm:space-y-5" action="#" method="POST">
                            {{-- CSRF token would go here in production --}}

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                                {{-- Name --}}
                                <div>
                                    <label for="name" class="block text-xs sm:text-sm font-medium text-ink mb-1 sm:mb-1.5">
                                        <span data-lang-id>Nama Lengkap *</span>
                                        <span data-lang-en class="hidden">Full Name *</span>
                                    </label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base rounded-xl border border-border/80 bg-white text-ink placeholder-ink-muted/40 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all duration-200"
                                        placeholder="John Doe">
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="block text-xs sm:text-sm font-medium text-ink mb-1 sm:mb-1.5">
                                        <span data-lang-id>Email *</span>
                                        <span data-lang-en class="hidden">Email *</span>
                                    </label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base rounded-xl border border-border/80 bg-white text-ink placeholder-ink-muted/40 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all duration-200"
                                        placeholder="john@company.com">
                                </div>
                            </div>

                            {{-- Company --}}
                            <div>
                                <label for="company" class="block text-xs sm:text-sm font-medium text-ink mb-1 sm:mb-1.5">
                                    <span data-lang-id>Perusahaan / Organisasi</span>
                                    <span data-lang-en class="hidden">Company / Organization</span>
                                </label>
                                <input type="text" id="company" name="company"
                                    class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base rounded-xl border border-border/80 bg-white text-ink placeholder-ink-muted/40 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all duration-200"
                                    placeholder="PT. Contoh Tbk">
                            </div>

                            {{-- Service Interest --}}
                            <div>
                                <label for="service" class="block text-xs sm:text-sm font-medium text-ink mb-1 sm:mb-1.5">
                                    <span data-lang-id>Layanan yang Diminati *</span>
                                    <span data-lang-en class="hidden">Service of Interest *</span>
                                </label>
                                <select id="service" name="service" required
                                    class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base rounded-xl border border-border/80 bg-white text-ink focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all duration-200 appearance-none bg-no-repeat bg-right pr-10"
                                    style="background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748B' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E\"); background-size: 1rem;">
                                    <option value="" disabled selected>
                                        <span data-lang-id>Pilih layanan...</span>
                                        <span data-lang-en class="hidden">Select a service...</span>
                                    </option>
                                    <option value="web-development">
                                        <span data-lang-id>Pengembangan Web</span>
                                        <span data-lang-en class="hidden">Web Development</span>
                                    </option>
                                    <option value="digital-solutions">
                                        <span data-lang-id>Solusi Digital</span>
                                        <span data-lang-en class="hidden">Digital Solutions</span>
                                    </option>
                                    <option value="tech-consulting">
                                        <span data-lang-id>Konsultasi Teknologi</span>
                                        <span data-lang-en class="hidden">Tech Consulting</span>
                                    </option>
                                    <option value="it-services">
                                        <span data-lang-id>Layanan IT</span>
                                        <span data-lang-en class="hidden">IT Services</span>
                                    </option>
                                    <option value="other">
                                        <span data-lang-id>Lainnya</span>
                                        <span data-lang-en class="hidden">Other</span>
                                    </option>
                                </select>
                            </div>

                            {{-- Budget --}}
                            <div>
                                <label for="budget" class="block text-xs sm:text-sm font-medium text-ink mb-1 sm:mb-1.5">
                                    <span data-lang-id>Perkiraan Anggaran</span>
                                    <span data-lang-en class="hidden">Estimated Budget</span>
                                </label>
                                <select id="budget" name="budget"
                                    class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base rounded-xl border border-border/80 bg-white text-ink focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all duration-200 appearance-none bg-no-repeat bg-right pr-10"
                                    style="background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748B' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E\"); background-size: 1rem;">
                                    <option value="" disabled selected>
                                        <span data-lang-id>Pilih rentang anggaran...</span>
                                        <span data-lang-en class="hidden">Select budget range...</span>
                                    </option>
                                    <option value="<50jt">
                                        <span data-lang-id>< Rp 50 Juta</span>
                                        <span data-lang-en class="hidden">< $3,000</span>
                                    </option>
                                    <option value="50-150jt">
                                        <span data-lang-id>Rp 50 Juta - 150 Juta</span>
                                        <span data-lang-en class="hidden">$3,000 - $10,000</span>
                                    </option>
                                    <option value="150-500jt">
                                        <span data-lang-id>Rp 150 Juta - 500 Juta</span>
                                        <span data-lang-en class="hidden">$10,000 - $30,000</span>
                                    </option>
                                    <option value="500jt-1m">
                                        <span data-lang-id>Rp 500 Juta - 1 Miliar</span>
                                        <span data-lang-en class="hidden">$30,000 - $65,000</span>
                                    </option>
                                    <option value=">1m">
                                        <span data-lang-id>> Rp 1 Miliar</span>
                                        <span data-lang-en class="hidden">> $65,000</span>
                                    </option>
                                    <option value="discuss">
                                        <span data-lang-id>Ingin diskusi dulu</span>
                                        <span data-lang-en class="hidden">Want to discuss first</span>
                                    </option>
                                </select>
                            </div>

                            {{-- Message --}}
                            <div>
                                <label for="message" class="block text-xs sm:text-sm font-medium text-ink mb-1 sm:mb-1.5">
                                    <span data-lang-id>Pesan *</span>
                                    <span data-lang-en class="hidden">Message *</span>
                                </label>
                                <textarea id="message" name="message" rows="4" required
                                    class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base rounded-xl border border-border/80 bg-white text-ink placeholder-ink-muted/40 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all duration-200 resize-none"
                                    placeholder="Ceritakan tentang proyek, tantangan, atau ide Anda..."></textarea>
                            </div>

                            {{-- Submit Button --}}
                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-primary px-6 sm:px-8 py-3 sm:py-3.5 text-sm sm:text-base font-semibold text-white transition-all duration-200 hover:bg-primary-dark hover:-translate-y-0.5 hover:shadow-[0_8px_24px_rgba(37,99,235,.35)] focus:ring-2 focus:ring-primary/40 focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed">
                                    <svg class="w-4.5 h-4.5 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                    <span data-lang-id>Kirim Pesan</span>
                                    <span data-lang-en class="hidden">Send Message</span>
                                </button>
                            </div>

                            {{-- Success/Error Messages --}}
                            <div id="form-message" class="hidden p-3.5 sm:p-4 rounded-xl text-xs sm:text-sm font-medium"></div>
                        </form>

                        {{-- Trust Indicators --}}
                        <div class="mt-6 sm:mt-8 pt-6 sm:pt-8 border-t border-border/60 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-4">
                            <div class="flex items-center gap-2.5 sm:gap-3 text-xs sm:text-sm text-ink-muted">
                                <svg class="w-4.5 h-4.5 sm:w-5 sm:h-5 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>
                                    <span data-lang-id>Data Anda aman & terenkripsi</span>
                                    <span data-lang-en class="hidden">Your data is safe & encrypted</span>
                                </span>
                            </div>
                            <div class="flex items-center gap-2.5 sm:gap-3 text-xs sm:text-sm text-ink-muted">
                                <svg class="w-4.5 h-4.5 sm:w-5 sm:h-5 text-sky-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                <span>
                                    <span data-lang-id>Tidak ada spam, ever</span>
                                    <span data-lang-en class="hidden">No spam, ever</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const messageDiv = document.getElementById('form-message');
    const submitBtn = form.querySelector('button[type="submit"]');
    const btnText = submitBtn.querySelector('span[data-lang-id], span[data-lang-en]:not(.hidden)');
    const btnIcon = submitBtn.querySelector('svg');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Show loading state
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-75', 'cursor-wait');
        const originalHTML = submitBtn.innerHTML;
        submitBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg><span data-lang-id>Mengirim...</span><span data-lang-en class="hidden">Sending...</span>';

        // Collect form data
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        try {
            // Simulate API call - replace with actual endpoint
            await new Promise(resolve => setTimeout(resolve, 1500));

            // Success
            messageDiv.className = 'block p-4 rounded-xl bg-green-50 border border-green-200 text-green-800';
            messageDiv.innerHTML = '<span data-lang-id>✓ Terima kasih! Pesan Anda telah terkirim. Tim kami akan menghubungi Anda dalam 1x24 jam.</span><span data-lang-en class="hidden">✓ Thank you! Your message has been sent. Our team will contact you within 24 hours.</span>';
            messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            // Reset form
            form.reset();

        } catch (error) {
            // Error
            messageDiv.className = 'block p-4 rounded-xl bg-red-50 border border-red-200 text-red-800';
            messageDiv.innerHTML = '<span data-lang-id>✗ Terjadi kesalahan. Silakan coba lagi atau hubungi kami via WhatsApp.</span><span data-lang-en class="hidden">✗ Something went wrong. Please try again or contact us via WhatsApp.</span>';
            messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } finally {
            // Restore button
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-75', 'cursor-wait');
            submitBtn.innerHTML = originalHTML;
        }
    });

    // Input focus effects
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('ring-2', 'ring-primary/20');
        });
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('ring-2', 'ring-primary/20');
        });
    });
});
</script>
@endpush
