{{-- VizzioCraft Clean Blue Chatbot --}}
<div id="wa-chatbot" class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-40 transition-all duration-300" aria-label="VizzioCraft Chatbot">
    <button id="wa-toggle" type="button"
        class="relative w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-primary hover:bg-primary-dark shadow-[0_8px_24px_rgba(37,99,235,0.35)] flex items-center justify-center text-white hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 cursor-pointer"
        aria-label="Buka Chatbot" aria-expanded="false">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <span id="wa-badge"
            class="hidden absolute -top-1 -right-1 w-4 h-4 bg-rose-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center ring-2 ring-white">1</span>
    </button>

    <div id="wa-panel"
        class="absolute bottom-[4.25rem] right-0 w-[calc(100vw-2.5rem)] sm:w-[22rem] bg-white border border-slate-200/90 shadow-[0_20px_55px_rgba(15,23,42,0.14)] rounded-2xl opacity-0 invisible transform translate-y-3 transition-all duration-250 pointer-events-none overflow-hidden flex flex-col">

        {{-- Clean Light Header --}}
        <div class="bg-white border-b border-slate-100 px-4 py-3.5 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-blue-50 text-primary flex items-center justify-center border border-blue-100 shrink-0">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-[13px] text-slate-900 leading-tight">VizzioBot</p>
                    <p class="text-[10.5px] text-slate-500 flex items-center gap-1.5 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span data-lang-id>Online</span>
                        <span data-lang-en class="hidden">Online</span>
                    </p>
                </div>
            </div>
            <button id="wa-close" type="button"
                class="w-7 h-7 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 flex items-center justify-center transition-colors cursor-pointer"
                aria-label="Tutup chat">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Scrollable Messages (Hidden Scrollbar) --}}
        <div id="vc-chat-messages" data-lenis-prevent
            class="p-4 space-y-2.5 bg-slate-50/50 h-60 overflow-y-auto overscroll-contain text-[12.5px] [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">
            <div class="flex justify-start">
                <div class="bg-white border border-slate-200/70 text-slate-700 rounded-2xl rounded-tl-sm px-3.5 py-2.5 max-w-[85%] shadow-2xs leading-relaxed">
                    <span data-lang-id>Halo! Ada yang bisa kami bantu hari ini?</span>
                    <span data-lang-en class="hidden">Hi! How can we help you today?</span>
                </div>
            </div>
        </div>

        {{-- Rekomendasi Chat --}}
        <div class="px-3.5 py-2 bg-white border-t border-slate-100 flex flex-wrap gap-1.5 shrink-0">
            <button type="button" data-bot-prompt="Layanan & Solusi" class="vc-quick-btn px-2.5 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-primary border border-slate-200/80 hover:border-blue-200 text-[11px] font-medium cursor-pointer transition">
                Layanan &amp; Solusi
            </button>
            <button type="button" data-bot-prompt="Estimasi Biaya" class="vc-quick-btn px-2.5 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-primary border border-slate-200/80 hover:border-blue-200 text-[11px] font-medium cursor-pointer transition">
                Estimasi Biaya
            </button>
            <button type="button" data-bot-prompt="Konsultasi Tim" class="vc-quick-btn px-2.5 py-1 rounded-full bg-slate-100 hover:bg-blue-50 text-slate-600 hover:text-primary border border-slate-200/80 hover:border-blue-200 text-[11px] font-medium cursor-pointer transition">
                Konsultasi Tim
            </button>
        </div>

        {{-- Input --}}
        <form id="vc-chat-form" class="p-3 border-t border-slate-100 bg-white flex items-center gap-2 shrink-0">
            <input id="vc-chat-input" type="text" autocomplete="off"
                placeholder="Tulis pesan..."
                class="flex-1 px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50/70 text-xs text-slate-800 placeholder:text-slate-400 focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/15 outline-none transition" />
            <button type="submit" aria-label="Kirim pesan"
                class="w-9 h-9 rounded-xl bg-primary hover:bg-primary-dark text-white flex items-center justify-center shrink-0 cursor-pointer transition">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </button>
        </form>
    </div>
</div>

<script>
(function () {
    var chatbot = document.getElementById('wa-chatbot');
    var toggle = document.getElementById('wa-toggle');
    var panel = document.getElementById('wa-panel');
    var closeBtn = document.getElementById('wa-close');
    var badge = document.getElementById('wa-badge');
    var messagesEl = document.getElementById('vc-chat-messages');
    var form = document.getElementById('vc-chat-form');
    var input = document.getElementById('vc-chat-input');
    var quickBtns = document.querySelectorAll('.vc-quick-btn');
    var open = false;

    function setOpen(v) {
        open = v;
        toggle.setAttribute('aria-expanded', String(v));
        if (v) {
            panel.classList.remove('opacity-0', 'invisible', 'translate-y-3', 'pointer-events-none');
            badge.classList.add('hidden');
            if (input) setTimeout(function () { input.focus(); }, 150);
        } else {
            panel.classList.add('opacity-0', 'invisible', 'translate-y-3', 'pointer-events-none');
        }
    }

    function escapeHtml(str) {
        return str.replace(/[&<>"']/g, function (m) {
            return ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[m];
        });
    }

    function appendMessage(text, isUser) {
        if (!messagesEl) return;
        var wrap = document.createElement('div');
        wrap.className = isUser ? 'flex justify-end' : 'flex justify-start';
        wrap.innerHTML = isUser
            ? '<div class="bg-primary text-white rounded-2xl rounded-tr-sm px-3.5 py-2 max-w-[85%] leading-relaxed break-words">' + escapeHtml(text) + '</div>'
            : '<div class="bg-white border border-slate-200/70 text-slate-700 rounded-2xl rounded-tl-sm px-3.5 py-2.5 max-w-[85%] shadow-2xs leading-relaxed break-words">' + text + '</div>';
        messagesEl.appendChild(wrap);
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    function getBotReply(query) {
        var q = query.toLowerCase();
        if (q.indexOf('layanan') !== -1 || q.indexOf('jasa') !== -1 || q.indexOf('service') !== -1 || q.indexOf('solusi') !== -1) {
            return 'Kami menyediakan jasa Website, Software Custom, LMS, dan Infrastruktur IT. Info lengkap ada di <a href="/services" class="text-primary font-semibold underline">halaman Layanan</a>.';
        }
        if (q.indexOf('harga') !== -1 || q.indexOf('biaya') !== -1 || q.indexOf('budget') !== -1 || q.indexOf('estimasi') !== -1) {
            return 'Biaya menyesuaikan kebutuhan proyek. Silakan kirim detail Anda di <a href="/contact" class="text-primary font-semibold underline">halaman Kontak</a> untuk penawaran gratis.';
        }
        if (q.indexOf('portofolio') !== -1 || q.indexOf('proyek') !== -1 || q.indexOf('project') !== -1) {
            return 'Lihat hasil karya kami di <a href="/projects" class="text-primary font-semibold underline">halaman Portofolio</a>.';
        }
        if (q.indexOf('konsultasi') !== -1 || q.indexOf('hubungi') !== -1 || q.indexOf('kontak') !== -1 || q.indexOf('tim') !== -1) {
            return 'Anda dapat menghubungi tim kami melalui <a href="/contact" class="text-primary font-semibold underline">halaman Kontak</a> atau email <strong>vizziocraft@gmail.com</strong>.';
        }
        return 'Terima kasih atas pesan Anda! Silakan kunjungi <a href="/contact" class="text-primary font-semibold underline">halaman Kontak</a> untuk terhubung langsung dengan tim kami.';
    }

    function sendUserQuery(text) {
        var clean = (text || '').trim();
        if (!clean) return;
        appendMessage(clean, true);
        setTimeout(function () {
            appendMessage(getBotReply(clean), false);
        }, 300);
    }

    if (form && input) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var val = input.value;
            if (!val.trim()) return;
            input.value = '';
            sendUserQuery(val);
        });
    }

    quickBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            sendUserQuery(this.getAttribute('data-bot-prompt'));
        });
    });

    function syncWithNav() {
        var mobileNav = document.getElementById('mobile-nav');
        if (!mobileNav) return;
        var navOpen = mobileNav.classList.contains('is-open');
        if (navOpen) {
            chatbot.classList.add('opacity-0', 'pointer-events-none', 'scale-75');
            if (open) setOpen(false);
        } else {
            chatbot.classList.remove('opacity-0', 'pointer-events-none', 'scale-75');
        }
    }

    var mobileNav = document.getElementById('mobile-nav');
    if (mobileNav && window.MutationObserver) {
        var observer = new MutationObserver(syncWithNav);
        observer.observe(mobileNav, { attributes: true, attributeFilter: ['class'] });
    }

    toggle.addEventListener('click', function (e) { e.stopPropagation(); setOpen(!open); });
    if (closeBtn) closeBtn.addEventListener('click', function () { setOpen(false); });

    document.addEventListener('click', function (e) {
        if (open && !toggle.contains(e.target) && !panel.contains(e.target)) setOpen(false);
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && open) setOpen(false);
    });

    setTimeout(function () {
        if (!open) badge.classList.remove('hidden');
    }, 4000);
})();
</script>
