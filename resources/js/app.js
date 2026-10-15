import './bootstrap';

document.documentElement.classList.add('js');

// Mobile navigation
const toggle = document.querySelector('[data-nav-toggle]');
const panel = document.querySelector('[data-nav-panel]');

if (toggle && panel) {
    const setOpen = (open) => {
        panel.classList.toggle('hidden', !open);
        toggle.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('overflow-hidden', open);
    };

    toggle.addEventListener('click', () => setOpen(toggle.getAttribute('aria-expanded') !== 'true'));
    document.addEventListener('keydown', (e) => e.key === 'Escape' && setOpen(false));
    panel.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setOpen(false)));
}

// Scroll reveal
const items = document.querySelectorAll('.reveal');

if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
        (entries) =>
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            }),
        { threshold: 0.12 },
    );
    items.forEach((el) => observer.observe(el));
} else {
    items.forEach((el) => el.classList.add('is-visible'));
}
