{{-- WhatsApp Chat Component — hidden on mobile when nav drawer is open --}}
<div id="wa-chatbot" class="fixed bottom-6 right-6 z-40 transition-all duration-300" aria-label="WhatsApp Chat">
    <button id="wa-toggle" type="button"
        class="relative w-14 h-14 rounded-2xl bg-[#25D366] shadow-[0_8px_24px_rgba(37,211,102,.35)] flex items-center justify-center text-white hover:bg-[#22c55e] hover:scale-105 hover:-translate-y-0.5 hover:shadow-[0_12px_32px_rgba(37,211,102,.5)] transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#25D366]/60 focus:ring-offset-2"
        aria-label="Buka Chat WhatsApp" aria-expanded="false">
        <x-news-icon :name="'whatsapp'" class="w-7 h-7 drop-shadow" />
        <span id="wa-badge"
            class="hidden absolute -top-1.5 -right-1.5 w-5 h-5 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center ring-2 ring-white">1</span>
    </button>

    <div id="wa-panel"
        class="absolute bottom-[4.5rem] right-0 w-[22rem] bg-white border border-border/60 shadow-[0_20px_60px_rgba(0,0,0,0.12)] rounded-2xl opacity-0 invisible transform translate-y-3 transition-all duration-300 pointer-events-none overflow-hidden">

        {{-- Header --}}
        <div class="bg-[#25D366] text-white px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center border border-white/20">
                    <x-news-icon :name="'whatsapp'" class="w-5.5 h-5.5" />
                </div>
                <div>
                    <p class="font-semibold text-[13px] leading-tight">VizzioCraft</p>
                    <p class="text-[11px] text-white/85 flex items-center gap-1 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-white/80 animate-pulse inline-block"></span>
                        <span data-lang-id>Online sekarang</span>
                        <span data-lang-en class="hidden">Online now</span>
                    </p>
                </div>
            </div>
            <button id="wa-close" type="button"
                class="w-8 h-8 rounded-xl bg-white/15 hover:bg-white/25 flex items-center justify-center transition-colors border border-white/10"
                aria-label="Tutup chat">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Body --}}
        <div class="p-5 space-y-4 bg-white">
            {{-- Chat bubble --}}
            <div class="bg-[#f0fdf4] border border-[#dcfce7] rounded-xl px-4 py-3">
                <p class="text-[13px] text-ink leading-relaxed">
                    <span data-lang-id>👋 Halo! Ada yang bisa kami bantu hari ini? Konsultasi <strong>gratis</strong> untuk proyek digital Anda.</span>
                    <span data-lang-en class="hidden">👋 Hi! How can we help you today? <strong>Free</strong> consultation for your digital project.</span>
                </p>
            </div>

            {{-- CTA --}}
            <a id="wa-link"
                href="https://wa.me/6283114592416?text=Halo%20VizzioCraft%2C%20saya%20ingin%20berkonsultasi%20mengenai%20proyek%20digital%20saya"
                target="_blank" rel="noopener noreferrer"
                class="flex items-center justify-center gap-2.5 w-full bg-[#25D366] hover:bg-[#22c55e] text-white font-semibold py-3 rounded-xl text-[13px] transition-all duration-200 shadow-[0_4px_16px_rgba(37,211,102,.3)] hover:shadow-[0_6px_20px_rgba(37,211,102,.45)] hover:-translate-y-0.5">
                <x-news-icon :name="'whatsapp'" class="w-5 h-5" />
                <span>
                    <span data-lang-id>Chat di WhatsApp</span>
                    <span data-lang-en class="hidden">Chat on WhatsApp</span>
                </span>
                <svg class="w-4 h-4 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>

            <p class="text-center text-[11px] text-ink-muted flex items-center justify-center gap-1.5">
                <svg class="w-3 h-3 text-[#25D366]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span data-lang-id>Biasanya balas dalam beberapa menit</span>
                <span data-lang-en class="hidden">Usually replies within minutes</span>
            </p>
        </div>
    </div>
</div>

<script>
(function () {
    var chatbot = document.getElementById('wa-chatbot');
    var toggle = document.getElementById('wa-toggle');
    var panel = document.getElementById('wa-panel');
    var closeBtn = document.getElementById('wa-close');
    var badge = document.getElementById('wa-badge');
    var open = false;

    function setOpen(v) {
        open = v;
        toggle.setAttribute('aria-expanded', String(v));
        if (v) {
            panel.classList.remove('opacity-0', 'invisible', 'translate-y-3', 'pointer-events-none');
            badge.classList.add('hidden');
        } else {
            panel.classList.add('opacity-0', 'invisible', 'translate-y-3', 'pointer-events-none');
        }
    }

    // Hide WA button when mobile nav is open, show when closed
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

    // Observe mobile nav class changes
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

    // Show badge after 4s if panel not opened
    setTimeout(function () {
        if (!open) badge.classList.remove('hidden');
    }, 4000);
})();
</script>