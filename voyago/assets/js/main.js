document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('[data-site-header]');
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const navigation = document.querySelector('[data-navigation]');
    const mobileLayout = window.matchMedia('(max-width: 760px)');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    document.documentElement.classList.add('mrr-js');

    if (header) {
        const updateHeader = () => {
            header.classList.toggle('is-scrolled', window.scrollY > 36);
        };

        updateHeader();
        window.addEventListener('scroll', updateHeader, { passive: true });
    }

    if (menuToggle && navigation) {
        const closeMenu = (returnFocus = false) => {
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Open navigation');
            navigation.classList.remove('is-open');
            navigation.inert = mobileLayout.matches;
            document.body.classList.remove('menu-is-open');
            if (returnFocus) menuToggle.focus();
        };

        const openMenu = () => {
            menuToggle.setAttribute('aria-expanded', 'true');
            menuToggle.setAttribute('aria-label', 'Close navigation');
            navigation.classList.add('is-open');
            navigation.inert = false;
            document.body.classList.add('menu-is-open');
            navigation.querySelector('a')?.focus();
        };

        navigation.inert = mobileLayout.matches;
        menuToggle.addEventListener('click', () => {
            menuToggle.getAttribute('aria-expanded') === 'true' ? closeMenu() : openMenu();
        });
        navigation.addEventListener('click', (event) => {
            if (event.target.closest('a')) closeMenu();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') closeMenu(true);
        });
        mobileLayout.addEventListener('change', (event) => {
            closeMenu();
            navigation.inert = event.matches;
        });
    }

    const revealItems = document.querySelectorAll('[data-reveal]');
    if ('IntersectionObserver' in window && !reducedMotion.matches) {
        const observer = new IntersectionObserver((entries, activeObserver) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                activeObserver.unobserve(entry.target);
            });
        }, { rootMargin: '0px 0px -45px 0px', threshold: 0.08 });

        revealItems.forEach((item) => observer.observe(item));
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const id = link.getAttribute('href')?.slice(1);
            const target = id ? document.getElementById(id) : null;
            if (!target) return;
            event.preventDefault();
            target.scrollIntoView({ behavior: reducedMotion.matches ? 'auto' : 'smooth', block: 'start' });
            history.replaceState(null, '', `#${id}`);
        });
    });
});
