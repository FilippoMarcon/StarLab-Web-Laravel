// Scroll Progress Bar
document.addEventListener('DOMContentLoaded', function () {
    const progressBar = document.getElementById('scroll-progress');
    if (progressBar) {
        window.addEventListener('scroll', function () {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            progressBar.style.width = scrollPercent + '%';
        });
    }
});

// Navbar scroll effect
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('navbar');
    if (navbar) {
        let lastScroll = 0;
        window.addEventListener('scroll', function () {
            const currentScroll = window.scrollY;
            if (currentScroll > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            lastScroll = currentScroll;
        }, { passive: true });
    }
});

// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function () {
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        });
    }
});

// Cookie Banner
document.addEventListener('DOMContentLoaded', function () {
    const banner = document.getElementById('cookie-banner');
    const acceptBtn = document.getElementById('cookie-accept');
    const closeBtn = document.getElementById('cookie-close');
    if (banner && !localStorage.getItem('starlab-cookie-consent')) {
        setTimeout(function () { banner.classList.remove('hidden'); }, 1000);
    }
    if (acceptBtn) {
        acceptBtn.addEventListener('click', function () {
            localStorage.setItem('starlab-cookie-consent', 'true');
            banner.classList.add('hidden');
        });
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            banner.classList.add('hidden');
        });
    }
});

// Preloader
document.addEventListener('DOMContentLoaded', function () {
    const preloader = document.getElementById('preloader');
    if (preloader) {
        setTimeout(function () { preloader.classList.add('opacity-0'); }, 1800);
        setTimeout(function () { preloader.classList.add('hidden'); }, 2300);
    }
});

// Scroll Reveal
document.addEventListener('DOMContentLoaded', function () {
    const revealElements = document.querySelectorAll('.scroll-reveal');
    if (revealElements.length > 0) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '-100px' });
        revealElements.forEach(function (el) { observer.observe(el); });
    }
});

// FAQ Accordion
document.addEventListener('DOMContentLoaded', function () {
    const faqButtons = document.querySelectorAll('.faq-btn');
    faqButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector('.faq-icon');
            const isOpen = content.classList.contains('max-h-40');
            
            faqButtons.forEach(function (b) {
                const c = b.nextElementSibling;
                const i = b.querySelector('.faq-icon');
                if (c !== content) {
                    c.classList.remove('max-h-40', 'opacity-100', 'p-5', 'pt-0');
                    c.classList.add('max-h-0', 'opacity-0');
                    if (i) i.classList.replace('fa-chevron-up', 'fa-chevron-down');
                }
            });

            if (isOpen) {
                content.classList.remove('max-h-40', 'opacity-100', 'p-5', 'pt-0');
                content.classList.add('max-h-0', 'opacity-0');
                if (icon) icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
            } else {
                content.classList.remove('max-h-0', 'opacity-0');
                content.classList.add('max-h-40', 'opacity-100', 'p-5', 'pt-0');
                if (icon) icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
            }
        });
    });
});

// Portfolio Filters
document.addEventListener('DOMContentLoaded', function () {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const items = document.querySelectorAll('.portfolio-item');
    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterBtns.forEach(function (b) { b.classList.remove('active-filter'); });
            btn.classList.add('active-filter');
            const filter = btn.dataset.filter;
            items.forEach(function (item) {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
});

