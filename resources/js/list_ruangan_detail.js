document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.list-ruangan-detail-container');
    if (!container) return;

    const roomId = String(container.getAttribute('data-ruangan-id') || '1');

    const roomDataMap = {
        '1': {
            name: 'GKM 4.1',
            status: 'Tersedia',
            capacity: 'String value',
            facilities: 'String value',
            location: 'String value',
            images: [
                '/images/hero_ruangan.png',
                '/images/hero_ruangan.png',
                '/images/hero_ruangan.png',
                '/images/hero_ruangan.png',
                '/images/hero_ruangan.png'
            ]
        },
        '2': {
            name: 'GKM 4.2',
            status: 'Tersedia',
            capacity: 'String value',
            facilities: 'String value',
            location: 'String value',
            images: ['/images/hero_ruangan.png', '/images/hero_ruangan.png', '/images/hero_ruangan.png']
        },
        '3': {
            name: 'GKM 3.1',
            status: 'Tersedia',
            capacity: 'String value',
            facilities: 'String value',
            location: 'String value',
            images: ['/images/hero_ruangan.png', '/images/hero_ruangan.png']
        },
        '4': {
            name: 'GKM Lantai 1',
            status: 'Tersedia',
            capacity: 'String value',
            facilities: 'String value',
            location: 'String value',
            images: ['/images/hero_ruangan.png', '/images/hero_ruangan.png', '/images/hero_ruangan.png']
        }
    };

    const room = roomDataMap[roomId] || roomDataMap['1'];

    const elNameChip = document.getElementById('detail-room-name-chip');
    const elStatus = document.getElementById('detail-room-status');
    const elName = document.getElementById('detail-room-name');
    const elCapacity = document.getElementById('detail-room-capacity');
    const elFacilities = document.getElementById('detail-room-facilities');
    const elLocation = document.getElementById('detail-room-location');

    if (elNameChip) elNameChip.textContent = room.name;
    if (elStatus) elStatus.textContent = room.status;
    if (elName) elName.textContent = room.name;
    if (elCapacity) elCapacity.textContent = room.capacity;
    if (elFacilities) elFacilities.textContent = room.facilities;
    if (elLocation) elLocation.textContent = room.location;

    const imageEl = document.getElementById('detail-hero-image');
    const dotsEl = document.getElementById('hero-dots');
    const leftBtn = document.querySelector('.arrow-left-hero');
    const rightBtn = document.querySelector('.arrow-right-hero');

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
