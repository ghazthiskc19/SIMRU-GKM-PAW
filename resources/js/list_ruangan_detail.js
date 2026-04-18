document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.list-ruangan-detail-container');
    if (!container) return;

    const roomId = String(container.getAttribute('data-ruangan-id') || '1');

    const imageEl = document.getElementById('detail-hero-image');
    const dotsEl = document.getElementById('hero-dots');
    const leftBtn = document.querySelector('.arrow-left-hero');
    const rightBtn = document.querySelector('.arrow-right-hero');

    const room = window.room;
    const images = room.images && room.images.length ? room.images : ['/images/hero_ruangan.png'];
    let index = 0;

    const renderDots = () => {
        if (!dotsEl) return;
        dotsEl.innerHTML = images
            .map((_, i) => `<button class="hero-dot ${i === index ? 'active' : ''}" data-index="${i}" aria-label="Slide ${i + 1}"></button>`)
            .join('');

        dotsEl.querySelectorAll('.hero-dot').forEach((dot) => {
            dot.addEventListener('click', () => {
                index = Number(dot.getAttribute('data-index'));
                renderImage();
            });
        });
    };

    const renderImage = () => {
        if (imageEl) imageEl.src = images[index];
        renderDots();
    };

    leftBtn?.addEventListener('click', () => {
        index = (index - 1 + images.length) % images.length;
        renderImage();
    });

    rightBtn?.addEventListener('click', () => {
        index = (index + 1) % images.length;
        renderImage();
    });

    renderImage();

    const checkBtn = document.getElementById('check-ketersediaan-button');
    checkBtn?.addEventListener('click', () => {
        window.location.href = `/jadwal_ruangan?ruangan=${encodeURIComponent(roomId)}`;
    });

    const pinjamBtn = document.getElementById('pinjam-button');
    pinjamBtn?.addEventListener('click', () => {
        window.location.href = `/peminjaman_ruangan?ruangan=${encodeURIComponent(roomId)}`;
    });

    const backButton = document.querySelector('.header-back');
    backButton?.addEventListener('click', () => {
        window.history.back();
    });
});
