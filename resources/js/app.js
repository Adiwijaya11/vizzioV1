import Lenis from 'lenis';

const isAdminPanel = Boolean(document.querySelector('.admin-sidebar'));

// Admin uses nested overflow panes. Lenis steals wheel/touch and those panes freeze.
let lenis = null;
if (!isAdminPanel) {
    lenis = new Lenis({
        autoRaf: true,
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
    });
}
window.lenis = lenis;

document.addEventListener('click', (event) => {
    if (!lenis) return;

    const anchor = event.target.closest('a[href*="#"]');
    if (!anchor) return;

    const href = anchor.getAttribute('href');
    const hashIndex = href.indexOf('#');
    if (hashIndex === -1) return;

    const targetId = href.substring(hashIndex);
    if (!targetId || targetId === '#') return;

    const targetElement = document.querySelector(targetId);
    if (targetElement) {
        event.preventDefault();
        lenis.scrollTo(targetElement, { offset: -80 });
    }
});

// Navigation Bar Interactions
const openClass = ['visible', 'opacity-100'];
const closedClass = ['invisible', 'opacity-0'];

function closeAllDesktop() {
    document.querySelectorAll('[data-nav-item]').forEach((item) => {
        const trigger = item.querySelector('[data-nav-trigger]');
        const panel = item.querySelector('[data-nav-panel]');
        if (!trigger || !panel) return;
        trigger.setAttribute('aria-expanded', 'false');
        panel.classList.add(...closedClass);
        panel.classList.remove(...openClass);
    });
}

function openDesktop(item) {
    closeAllDesktop();
    const trigger = item.querySelector('[data-nav-trigger]');
    const panel = item.querySelector('[data-nav-panel]');
    if (!trigger || !panel) return;
    trigger.setAttribute('aria-expanded', 'true');
    panel.classList.remove(...closedClass);
    panel.classList.add(...openClass);
}

document.querySelectorAll('[data-nav-item]').forEach((item) => {
    item.addEventListener('mouseenter', () => openDesktop(item));
    item.addEventListener('mouseleave', closeAllDesktop);
    item.querySelector('[data-nav-trigger]')?.addEventListener('click', (event) => {
        event.preventDefault();
        const open = item.querySelector('[data-nav-trigger]')?.getAttribute('aria-expanded') === 'true';
        if (open) closeAllDesktop();
        else openDesktop(item);
    });
});

function setMobileOpen(open) {
    const menu = document.getElementById('mobile-nav');
    const toggle = document.querySelector('[data-nav-toggle]');
    const overlay = menu?.querySelector('[data-nav-overlay]');
    const aside = menu?.querySelector('[data-nav-aside]');
    if (!menu || !toggle) return;

    const isOpen = Boolean(open);

    if (isOpen) {
        menu.classList.remove('pointer-events-none');
        menu.classList.add('is-open', 'pointer-events-auto');

        if (overlay) {
            overlay.classList.remove('opacity-0', 'pointer-events-none');
            overlay.classList.add('opacity-100', 'pointer-events-auto');
        }
        if (aside) {
            aside.classList.remove('translate-x-full');
            aside.classList.add('translate-x-0');
        }
    } else {
        menu.classList.remove('is-open');
        if (overlay) {
            overlay.classList.remove('opacity-100', 'pointer-events-auto');
            overlay.classList.add('opacity-0', 'pointer-events-none');
        }
        if (aside) {
            aside.classList.remove('translate-x-0');
            aside.classList.add('translate-x-full');
        }
        setTimeout(() => {
            if (!menu.classList.contains('is-open')) {
                menu.classList.remove('pointer-events-auto');
                menu.classList.add('pointer-events-none');
            }
        }, 300);
    }

    menu.setAttribute('aria-hidden', String(!isOpen));
    toggle.setAttribute('aria-expanded', String(isOpen));

    const iconOpen = toggle.querySelector('[data-icon-open]');
    const iconClose = toggle.querySelector('[data-icon-close]');
    if (iconOpen) iconOpen.classList.toggle('hidden', isOpen);
    if (iconClose) iconClose.classList.toggle('hidden', !isOpen);

    document.body.classList.toggle('overflow-hidden', isOpen);
    document.body.classList.toggle('is-open-nav', isOpen);
    document.documentElement.classList.toggle('overflow-hidden', isOpen);
    document.documentElement.classList.toggle('is-open-nav', isOpen);

    if (window.lenis) {
        if (isOpen) window.lenis.stop();
        else window.lenis.start();
    }
}

document.addEventListener('click', (event) => {
    if (!event.target.closest('[data-nav-item]')) closeAllDesktop();

    const toggleBtn = event.target.closest('[data-nav-toggle]');
    if (toggleBtn) {
        event.preventDefault();
        event.stopPropagation();
        const menu = document.getElementById('mobile-nav');
        setMobileOpen(!menu?.classList.contains('is-open'));
        return;
    }

    if (event.target.closest('[data-nav-close], [data-nav-overlay]')) {
        event.preventDefault();
        setMobileOpen(false);
        return;
    }

    const sub = event.target.closest('[data-mobile-sub]');
    if (sub) {
        event.preventDefault();
        const panel = sub.nextElementSibling;
        if (!panel) return;

        const isOpening = panel.classList.contains('hidden');

        // Accordion behavior: close other open submenus
        document.querySelectorAll('#mobile-nav [data-mobile-sub]').forEach((otherSub) => {
            if (otherSub !== sub) {
                otherSub.setAttribute('aria-expanded', 'false');
                otherSub.querySelector('[data-mobile-chevron]')?.classList.remove('rotate-180');
                const otherPanel = otherSub.nextElementSibling;
                if (otherPanel && !otherPanel.classList.contains('hidden')) {
                    otherPanel.classList.add('hidden');
                }
            }
        });

        panel.classList.toggle('hidden', !isOpening);
        sub.setAttribute('aria-expanded', String(isOpening));
        sub.querySelector('[data-mobile-chevron]')?.classList.toggle('rotate-180', isOpening);
        return;
    }

    if (event.target.closest('#mobile-nav a')) {
        setMobileOpen(false);
    }
});

// Prevent Lenis / body scroll lock from blocking touch drag inside mobile drawer
document.querySelector('#mobile-nav [data-lenis-prevent]')?.addEventListener('touchmove', (event) => {
    event.stopPropagation();
}, { passive: true });

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setMobileOpen(false);
});

window.addEventListener('resize', () => {
    if (window.innerWidth >= 1024) setMobileOpen(false);
});
