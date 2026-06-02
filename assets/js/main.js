/**
 * Dev Portfolio - Main JS (SPA Dark Theme Version)
 */

// ─── SPA Work Details Modal Functions (Exposed Globally) ────────────────────
// Track currently active expanding card to reverse the animation on close
let activeExpandingCard = null;

window.openWorkModal = function(id, cardEl, event) {
    const data = window.worksData ? window.worksData[id] : null;
    if (!data) return;
    
    // Fill title
    document.getElementById('modal-title').textContent = data.title;
    
    // Fill client / date
    document.getElementById('modal-client').textContent = data.client;
    document.getElementById('modal-date').textContent = data.date;
    
    // Fill description / content
    document.getElementById('modal-content').innerHTML = data.content || data.desc;
    
    // Fill primary image
    document.getElementById('modal-image').src = data.image;
    
    // Fill tags
    const tagsContainer = document.getElementById('modal-tags');
    tagsContainer.innerHTML = '';
    if (data.tags && data.tags.length) {
        data.tags.forEach(tag => {
            const span = document.createElement('span');
            span.className = 'bg-accent/10 border border-accent/25 text-xs text-accent px-3 py-1 rounded-full font-bold uppercase tracking-wider';
            span.textContent = tag;
            tagsContainer.appendChild(span);
        });
    }
    
    // Fill tech tags
    const techContainer = document.getElementById('modal-tech');
    techContainer.innerHTML = '';
    if (data.tech && data.tech.length) {
        data.tech.forEach(tech => {
            const span = document.createElement('span');
            span.className = 'bg-zinc-950 border border-border-dark px-3 py-1.5 rounded-lg text-xs text-zinc-300';
            span.textContent = tech;
            techContainer.appendChild(span);
        });
    }
    
    // Fill highlights
    const highlightsContainer = document.getElementById('modal-highlights');
    const highlightsWrap = document.getElementById('modal-highlights-wrapper');
    highlightsContainer.innerHTML = '';
    if (data.highlights && data.highlights.length) {
        highlightsWrap.classList.remove('hidden');
        data.highlights.forEach(hl => {
            const li = document.createElement('li');
            li.className = 'flex items-start gap-3 text-sm text-zinc-400';
            li.innerHTML = `<span class="text-accent mt-1"><i class="fa-regular fa-circle-check text-xs"></i></span><span class="leading-tight">${hl}</span>`;
            highlightsContainer.appendChild(li);
        });
    } else {
        highlightsWrap.classList.add('hidden');
    }
    
    // Fill gallery
    const galleryContainer = document.getElementById('modal-gallery');
    const galleryWrap = document.getElementById('modal-gallery-wrapper');
    galleryContainer.innerHTML = '';
    if (data.gallery && data.gallery.length) {
        galleryWrap.classList.remove('hidden');
        data.gallery.forEach(imgUrl => {
            const div = document.createElement('div');
            div.className = 'aspect-[16/10] rounded-xl overflow-hidden border border-border-dark bg-zinc-950';
            div.innerHTML = `<img src="${imgUrl}" class="w-full h-full object-cover">`;
            galleryContainer.appendChild(div);
        });
    } else {
        galleryWrap.classList.add('hidden');
    }
    
    // Links
    const liveBtn = document.getElementById('modal-live-link');
    if (data.url) {
        liveBtn.href = data.url;
        liveBtn.classList.remove('hidden');
    } else {
        liveBtn.classList.add('hidden');
    }
    
    const githubBtn = document.getElementById('modal-github-link');
    if (data.github) {
        githubBtn.href = data.github;
        githubBtn.classList.remove('hidden');
    } else {
        githubBtn.classList.add('hidden');
    }
    
    const showModalDirectly = () => {
        const modal = document.getElementById('work-details-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.add('opacity-100');
        }, 10);
        document.body.classList.add('overflow-hidden');
    };

    if (cardEl) {
        if (event) {
            event.stopPropagation();
        }

        // Add class to the parent grid to dim other cards
        const grid = cardEl.closest('.grid');
        if (grid) {
            grid.classList.add('portfolio-grid-focused');
        }

        // Add expand class to the clicked card
        cardEl.classList.add('card-expanded-active');
        activeExpandingCard = cardEl;

        // Wait for card scale transition to complete before showing details modal
        setTimeout(showModalDirectly, 400); // 400ms matches transition duration
    } else {
        showModalDirectly();
    }
};

window.closeWorkModal = function() {
    const modal = document.getElementById('work-details-modal');
    modal.classList.remove('opacity-100');
    
    if (activeExpandingCard) {
        const grid = activeExpandingCard.closest('.grid');
        
        // Wait for the modal fade-out to trigger card scale-down
        setTimeout(() => {
            if (activeExpandingCard) {
                activeExpandingCard.classList.remove('card-expanded-active');
            }
            if (grid) {
                grid.classList.remove('portfolio-grid-focused');
            }
            activeExpandingCard = null;
        }, 100);
    }

    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
    document.body.classList.remove('overflow-hidden');
};

// Close modal on Escape key press
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        window.closeWorkModal();
    }
});


document.addEventListener('DOMContentLoaded', () => {

    // ─── Mobile Nav Toggle ──────────────────────────────────────────
    const toggle = document.getElementById('nav-toggle');
    const nav    = document.getElementById('site-nav');

    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            nav.classList.toggle('hidden');
        });
    }

    // ─── Sticky Header Scroll Effect ─────────────────────────────────
    const header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 30) {
                header.classList.add('bg-bg-dark/95', 'py-4');
                header.classList.remove('bg-bg-dark/80', 'py-5');
            } else {
                header.classList.add('bg-bg-dark/80', 'py-5');
                header.classList.remove('bg-bg-dark/95', 'py-4');
            }
        });
    }

    // ─── SPA Smooth scroll for anchor links with header offset ───────
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const targetId = anchor.getAttribute('href');
            if (targetId === '#') return;
            
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                
                // Close mobile menu if open
                if (nav) nav.classList.add('hidden');
                
                const headerHeight = document.getElementById('site-header').offsetHeight || 70;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Check if URL has a hash on load and scroll to it smoothly
    if (window.location.hash) {
        const hashTarget = document.querySelector(window.location.hash);
        if (hashTarget) {
            setTimeout(() => {
                const headerHeight = document.getElementById('site-header').offsetHeight || 70;
                const targetPosition = hashTarget.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }, 300);
        }
    }
});
