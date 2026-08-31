import './bootstrap';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const root = document.documentElement;
root.classList.remove('no-js');

/* ---------------------------------------------------------------------- */
/* Smooth scroll (Lenis) wired into GSAP's ticker                          */
/* ---------------------------------------------------------------------- */
let lenis;

if (!prefersReducedMotion) {
    lenis = new Lenis({
        duration: 1.1,
        smoothWheel: true,
    });

    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);
    root.classList.add('has-lenis');
}

function scrollToTarget(target) {
    if (lenis) {
        lenis.scrollTo(target, { offset: -20 });
    } else {
        document.querySelector(target)?.scrollIntoView({ behavior: 'smooth' });
    }
}

/* ---------------------------------------------------------------------- */
/* Preloader                                                                */
/* ---------------------------------------------------------------------- */
const preloader = document.querySelector('.preloader');

window.addEventListener('load', () => {
    const tl = gsap.timeline({
        defaults: { ease: 'power3.out' },
        onComplete: () => {
            preloader?.remove();
            playHeroIntro();
        },
    });

    tl.to('.preloader .pl-bar span', { scaleX: 1, duration: 0.8, ease: 'power2.inOut' })
      .to(preloader, { yPercent: -100, duration: 0.7, ease: 'power4.inOut' }, '+=0.1');

    // Safety: never block content forever.
    setTimeout(() => {
        if (document.body.contains(preloader)) {
            tl.progress(1);
        }
    }, 2500);
});

/* ---------------------------------------------------------------------- */
/* Hero intro                                                               */
/* ---------------------------------------------------------------------- */
function playHeroIntro() {
    const tl = gsap.timeline({ defaults: { ease: 'power4.out' } });

    tl.to('.hero-name .line > span', {
        yPercent: 0,
        duration: 1.1,
        stagger: 0.08,
    })
      .from('.hero-eyebrow', { autoAlpha: 0, y: 16, duration: 0.6 }, '-=0.9')
      .from('.hero-roles', { autoAlpha: 0, y: 16, duration: 0.6 }, '-=0.7')
      .from('.hero-summary', { autoAlpha: 0, y: 16, duration: 0.6 }, '-=0.6')
      .from('.hero-actions .btn', { autoAlpha: 0, y: 16, duration: 0.5, stagger: 0.1 }, '-=0.5')
      .from('.scroll-cue', { autoAlpha: 0, duration: 0.6 }, '-=0.4');
}

if (prefersReducedMotion) {
    // No preloader animation needed — reveal everything immediately.
    preloader?.remove();
    gsap.set('.hero-name .line > span', { yPercent: 0 });
}

/* ---------------------------------------------------------------------- */
/* Role cycler                                                              */
/* ---------------------------------------------------------------------- */
const roleEl = document.querySelector('.role-cycle');

if (roleEl) {
    const roles = JSON.parse(roleEl.dataset.roles || '[]');
    let i = 0;

    if (roles.length > 1) {
        setInterval(() => {
            i = (i + 1) % roles.length;
            gsap.timeline()
                .to(roleEl, { yPercent: -100, autoAlpha: 0, duration: 0.4, ease: 'power2.in' })
                .call(() => { roleEl.textContent = roles[i]; })
                .fromTo(roleEl, { yPercent: 100 }, { yPercent: 0, autoAlpha: 1, duration: 0.5, ease: 'power2.out' });
        }, 2600);
    }
}

/* ---------------------------------------------------------------------- */
/* Nav: scrolled state, active link, mobile menu                           */
/* ---------------------------------------------------------------------- */
const nav = document.querySelector('.nav');

ScrollTrigger.create({
    start: 'top -60',
    onUpdate: (self) => nav?.classList.toggle('is-scrolled', self.scroll() > 60),
});

const navLinks = document.querySelectorAll('.nav-links a, .mobile-menu a');
const sections = document.querySelectorAll('main section[id]');

sections.forEach((section) => {
    ScrollTrigger.create({
        trigger: section,
        start: 'top center',
        end: 'bottom center',
        onToggle: (self) => {
            if (!self.isActive) return;
            navLinks.forEach((link) => {
                link.classList.toggle('is-active', link.getAttribute('href') === `#${section.id}`);
            });
        },
    });
});

document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener('click', (e) => {
        const target = link.getAttribute('href');
        if (target.length > 1) {
            e.preventDefault();
            closeMobileMenu();
            scrollToTarget(target);
        }
    });
});

const burger = document.querySelector('.nav-burger');
const mobileMenu = document.querySelector('.mobile-menu');

function closeMobileMenu() {
    mobileMenu?.classList.remove('is-open');
    document.body.classList.remove('menu-open');
}

burger?.addEventListener('click', () => {
    const open = mobileMenu.classList.toggle('is-open');
    document.body.classList.toggle('menu-open', open);
});

/* ---------------------------------------------------------------------- */
/* Scroll reveals                                                          */
/* ---------------------------------------------------------------------- */
document.querySelectorAll('[data-reveal]').forEach((el) => {
    gsap.to(el, {
        opacity: 1,
        y: 0,
        duration: 0.9,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: el,
            start: 'top 88%',
            once: true,
        },
    });
});

gsap.utils.toArray('[data-reveal-stagger]').forEach((group) => {
    const items = group.querySelectorAll('[data-reveal-item]');
    gsap.to(items, {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: 'power3.out',
        stagger: 0.08,
        scrollTrigger: {
            trigger: group,
            start: 'top 85%',
            once: true,
        },
    });
});

gsap.set('[data-reveal-item]', { opacity: 0, y: 22 });

/* ---------------------------------------------------------------------- */
/* Animated stat / counter numbers                                         */
/* ---------------------------------------------------------------------- */
document.querySelectorAll('[data-counter]').forEach((el) => {
    const end = parseFloat(el.dataset.counter);
    const suffix = el.dataset.suffix || '';
    const counter = { val: 0 };

    ScrollTrigger.create({
        trigger: el,
        start: 'top 90%',
        once: true,
        onEnter: () => {
            gsap.to(counter, {
                val: end,
                duration: 1.6,
                ease: 'power2.out',
                onUpdate: () => {
                    el.textContent = Math.floor(counter.val) + suffix;
                },
            });
        },
    });
});

/* ---------------------------------------------------------------------- */
/* About: word-by-word "lit up" reveal                                     */
/* ---------------------------------------------------------------------- */
const aboutText = document.querySelector('.about-text');

if (aboutText) {
    const words = aboutText.querySelectorAll('.fade-word');
    ScrollTrigger.create({
        trigger: aboutText,
        start: 'top 75%',
        end: 'bottom 55%',
        scrub: 0.5,
        onUpdate: (self) => {
            const lit = Math.floor(self.progress * words.length);
            words.forEach((w, idx) => w.classList.toggle('is-lit', idx <= lit));
        },
    });
}

/* ---------------------------------------------------------------------- */
/* Timeline progress line                                                  */
/* ---------------------------------------------------------------------- */
const timelineFill = document.querySelector('.timeline-line-fill');
const timeline = document.querySelector('.timeline');

if (timelineFill && timeline) {
    gsap.to(timelineFill, {
        height: '100%',
        ease: 'none',
        scrollTrigger: {
            trigger: timeline,
            start: 'top 65%',
            end: 'bottom 75%',
            scrub: 0.6,
        },
    });
}

/* ---------------------------------------------------------------------- */
/* Project card tilt                                                       */
/* ---------------------------------------------------------------------- */
if (!prefersReducedMotion && window.matchMedia('(hover: hover)').matches) {
    document.querySelectorAll('.project-card').forEach((card) => {
        const glow = card.querySelector('.glow');

        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const rotateX = ((y / rect.height) - 0.5) * -6;
            const rotateY = ((x / rect.width) - 0.5) * 6;

            gsap.to(card, {
                rotateX,
                rotateY,
                duration: 0.4,
                ease: 'power2.out',
                transformPerspective: 800,
            });

            if (glow) {
                gsap.to(glow, { x: x - 110, y: y - 110, duration: 0.3 });
            }
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, { rotateX: 0, rotateY: 0, duration: 0.6, ease: 'power3.out' });
        });
    });
}

/* ---------------------------------------------------------------------- */
/* Custom cursor + magnetic buttons                                        */
/* ---------------------------------------------------------------------- */
if (!prefersReducedMotion && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    const dot = document.querySelector('.cursor-dot');
    const ring = document.querySelector('.cursor-ring');
    const pos = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
    const ringPos = { ...pos };

    window.addEventListener('mousemove', (e) => {
        pos.x = e.clientX;
        pos.y = e.clientY;
        gsap.set(dot, { x: pos.x, y: pos.y });
    });

    gsap.ticker.add(() => {
        ringPos.x += (pos.x - ringPos.x) * 0.18;
        ringPos.y += (pos.y - ringPos.y) * 0.18;
        gsap.set(ring, { x: ringPos.x, y: ringPos.y });
    });

    document.querySelectorAll('a, button, .project-card, .tag').forEach((el) => {
        el.addEventListener('mouseenter', () => ring?.classList.add('is-active'));
        el.addEventListener('mouseleave', () => ring?.classList.remove('is-active'));
    });

    document.querySelectorAll('[data-magnetic]').forEach((el) => {
        el.addEventListener('mousemove', (e) => {
            const rect = el.getBoundingClientRect();
            const x = (e.clientX - rect.left - rect.width / 2) * 0.35;
            const y = (e.clientY - rect.top - rect.height / 2) * 0.35;
            gsap.to(el, { x, y, duration: 0.4, ease: 'power2.out' });
        });

        el.addEventListener('mouseleave', () => {
            gsap.to(el, { x: 0, y: 0, duration: 0.6, ease: 'elastic.out(1, 0.4)' });
        });
    });
}

/* ---------------------------------------------------------------------- */
/* Back to top + footer year                                               */
/* ---------------------------------------------------------------------- */
document.querySelector('[data-year]').textContent = new Date().getFullYear();

document.querySelector('.back-to-top')?.addEventListener('click', (e) => {
    e.preventDefault();
    scrollToTarget(0);
});
