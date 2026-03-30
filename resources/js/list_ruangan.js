document.addEventListener('DOMContentLoaded', () => {
    // Toggle room details expansion
    const cards = document.querySelectorAll('.ruangan-card');

    cards.forEach(card => {
        const header = card.querySelector('.ruangan-card-header');
        const button = card.querySelector('.ruangan-toggle');
        const details = card.querySelector('.ruangan-details');

        if (!header || !button || !details) {
            return;
        }

        // Pastikan bisa diukur untuk animasi walau awalnya ada atribut hidden
        details.hidden = false;

        const openDetails = () => {
            details.classList.add('is-open');
            details.style.maxHeight = `${details.scrollHeight + 30}px`;
        };

        const closeDetails = () => {
            details.style.maxHeight = `${details.scrollHeight}px`;
            requestAnimationFrame(() => {
                details.classList.remove('is-open');
                details.style.maxHeight = '0px';
            });
        };

        const initiallyExpanded = button.getAttribute('aria-expanded') === 'true';
        if (initiallyExpanded) {
            openDetails();
        } else {
            details.classList.remove('is-open');
            details.style.maxHeight = '0px';
        }

        const toggleDetails = () => {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            const nextExpanded = !isExpanded;

            button.setAttribute('aria-expanded', String(nextExpanded));

            if (nextExpanded) {
                openDetails();
            } else {
                closeDetails();
            }
        };

        header.addEventListener('click', () => {
            toggleDetails();
        });

        button.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleDetails();
        });
    });

    // Lihat Detail Ruangan button
    const detailButtons = document.querySelectorAll('.btn-detail-ruangan');
    
    detailButtons.forEach(button => {
        button.addEventListener('click', () => {
            const ruanganId = button.getAttribute('data-ruangan-id');
            window.location.href = `/list_ruangan_detail?ruangan=${encodeURIComponent(ruanganId || '')}`;
        });
    });

    // Header back button
    const backButton = document.querySelector('.header-back');
    if (backButton) {
        backButton.addEventListener('click', () => {
            window.history.back();
        });
    }
});
