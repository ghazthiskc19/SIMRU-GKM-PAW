<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Ruangan - Sistem Informasi Manajemen Ruangan GKM</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/shared_header_nav.css', 'resources/css/list_ruangan_style.css', 'resources/js/list_ruangan.js'])
</head>
<body>
    <div class="mobile-container">
        @include('partials.header', ['id' => 2], ['judul' => 'Peminjaman Ruangan'])

        <div class="list-ruangan-detail-container">
            <div class="list-ruangan-detail-status">
                <div class="nama-ruangan-container">
                    <!-- sesuaikan dengan ruangan yang di klik sebelumnya -->
                    <h3 class="ruangan-name">GKM 4.1</h3>
                </div>
                <div class="status-ruangan-container">
                    <!-- akan mengambil status ruangan, apakah bisa dipinjam atau tidak -->
                    <h3 class="status-ruangan">Tersedia</h3>
                </div>
            </div>
            <div class="list-ruangan-detail-hero">
                <div class="arrow-left-hero">
                    <a href="#"></a>
                </div>
                <div class="hero-image-container">
                    <!-- disini buat foto yang bisa kek ngeslide show secara otomatis fade in kiri or kanan -->
                    <img src="{{ asset('images/hero_ruangan.png') }}" alt="Foto Ruangan GKM 4.1" class="hero-image">
                </div>
                <div class="arrow-right-hero">
                    <a href="#"></a>
                </div>
            </div>
            <div class="list-ruangan-detail-informasi">
                <div class="nama-ruangan">
                    <p>Nama Ruangan:</p>
                    <p class="ruangan-name">GKM 4.1</p>
                </div>
                <div class="kapasitas-ruangan">
                    <p>Kapasitas:</p>
                    <p class="ruangan-kapasitas">50 orang</p>
                </div>
                <div class="fasilitas-ruangan">
                    <p>Fasilitas:</p>
                    <ul class="ruangan-fasilitas">
                        <li>AC</li>
                        <li>Sound System</li>
                        <li>In Focus</li>
                        <li>Layer In Focus</li>
                        <li>Meja Panjang</li>
                        <li>Kursi</li>
                        <li>Microphone</li>
                    </ul>
                <div class="lokasi-ruangan">
                    <p>Lokasi:</p>
                    <p class="ruangan-lokasi">Gedung Kreativitas Mahasiswa, Filkom, Lantai 4</p>
                </div>
                <div class="jadwal-ketersediaan-ruangan">
                    <p>Jadwal Ketersediaan Ruangan</p>
                    <div class="check-button-container">
                        <a href="#" class="check-button">Cek Disini</a>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.bottom-nav', ['active' => 'menu'])
    </div>
</body>
</html>
