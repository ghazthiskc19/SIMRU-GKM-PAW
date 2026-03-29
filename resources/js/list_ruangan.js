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

        const toggleDetails = () => {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            const nextExpanded = !isExpanded;

            button.setAttribute('aria-expanded', String(nextExpanded));
            details.hidden = !nextExpanded;
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
            // Backend: Navigate to detail page or open modal
            // Placeholder for backend integration
            console.log('Navigate to detail ruangan ID:', ruanganId);
            // Example: window.location.href = `/ruangan/${ruanganId}`;
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
