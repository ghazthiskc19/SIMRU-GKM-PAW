document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.peminjaman-ruangan-container');
    if (!container) return;

    const roomId = String(container.getAttribute('data-ruangan-id') || '1');

    const elNameChip = document.getElementById('detail-room-name-chip');
    const elStatus = document.getElementById('detail-room-status');
    const roomIdInput = document.getElementById('ruangan-id-input');

    if (elNameChip) elNameChip.textContent = room.nama_ruangan;
    if (elStatus) elStatus.textContent = room.status;
    if (roomIdInput) roomIdInput.value = roomId;

    const roomSelect = document.getElementById('room-select');
    if (roomSelect) {
        roomSelect.addEventListener('change', (e) => {
            const selectedRoomId = e.target.value;
            const selectedRoom = window.allRooms.find(r => String(r.id_ruangan) === selectedRoomId);

            if (selectedRoom) {
                // Update room details
                if (elNameChip) elNameChip.textContent = selectedRoom.nama_ruangan;
                if (elStatus) elStatus.textContent = selectedRoom.status;
                if (roomIdInput) roomIdInput.value = selectedRoomId;

                // Update images
                const newImages = selectedRoom.images && selectedRoom.images.length
                    ? selectedRoom.images
                    : ['/images/hero_ruangan.png'];
                images.length = 0;
                images.push(...newImages);
                index = 0;
                renderImage();
            }
        });
    }

    const imageEl = document.getElementById('detail-hero-image');
    const dotsEl = document.getElementById('hero-dots');
    const leftBtn = document.querySelector('.arrow-left-hero');
    const rightBtn = document.querySelector('.arrow-right-hero');

    const images = room.images && room.images.length
        ? room.images
        : ['/images/hero_ruangan.png'];    let index = 0;

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

    const backButton = document.querySelector('.header-back');
    backButton?.addEventListener('click', () => {
        window.history.back();
    });

    const fileInput = document.getElementById('dokumen');
    const uploadFeedback = document.getElementById('upload-feedback');
    const uploadFileList = document.getElementById('upload-file-list');
    const form = document.getElementById('peminjaman-form');

    const MAX_FILE_SIZE_BYTES = 2 * 1024 * 1024;

    const resetFeedbackState = () => {
        uploadFeedback?.classList.remove('is-error');
    };

    const setErrorFeedback = (message) => {
        if (!uploadFeedback) return;
        uploadFeedback.textContent = message;
        uploadFeedback.classList.add('is-error');
    };

    const setInfoFeedback = (message) => {
        if (!uploadFeedback) return;
        uploadFeedback.textContent = message;
        uploadFeedback.classList.remove('is-error');
    };

    const formatSizeMB = (size) => {
        return `${(size / (1024 * 1024)).toFixed(2)} MB`;
    };

    const renderUploadedFiles = (files) => {
        if (!uploadFileList) return;
        uploadFileList.innerHTML = files
            .map((file) => `<li>${file.name} (${formatSizeMB(file.size)})</li>`)
            .join('');
    };

    fileInput?.addEventListener('change', () => {
        resetFeedbackState();

        const selected = Array.from(fileInput.files || []);
        if (!selected.length) {
            renderUploadedFiles([]);
            setInfoFeedback('Belum ada file diunggah.');
            return;
        }

        const invalidType = selected.find((file) => {
            const ext = file.name.toLowerCase().endsWith('.pdf');
            const mime = file.type === 'application/pdf' || file.type === '';
            return !(ext && mime);
        });

        if (invalidType) {
            fileInput.value = '';
            renderUploadedFiles([]);
            setErrorFeedback('Semua dokumen harus berformat PDF.');
            return;
        }

        const oversize = selected.find((file) => file.size > MAX_FILE_SIZE_BYTES);
        if (oversize) {
            fileInput.value = '';
            renderUploadedFiles([]);
            setErrorFeedback(`Ukuran file melebihi 2MB: ${oversize.name}`);
            return;
        }

        renderUploadedFiles(selected);
        setInfoFeedback(`${selected.length} file berhasil dipilih.`);
    });

    form?.addEventListener('submit', (event) => {
        const jamMulai = document.getElementById('jam_mulai')?.value;
        const jamSelesai = document.getElementById('jam_selesai')?.value;
        if (jamMulai && jamSelesai) {
            if (jamMulai === jamSelesai) {
                event.preventDefault();
                setErrorFeedback('Jam selesai harus berbeda dari jam mulai.');
                return;
            }
            // allow jam_selesai < jam_mulai which indicates an overnight booking
        }

        if (!fileInput?.files?.length) {
            event.preventDefault();
            setErrorFeedback('Silakan unggah minimal 1 dokumen PDF.');
            return;
        }

    });
});
