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
        @include('partials.header', ['id' => 2, 'judul' => 'List Ruangan', 'kembaliKe' => '/menu_mahasiswa'])

        <div class="content list-ruangan-content">
            <section class="ruangan-list" aria-label="Daftar ruangan yang tersedia">
                <article class="ruangan-card" data-ruangan-id="1">
                    <div class="ruangan-card-header">
                        <div class="ruangan-thumbnail"></div>
                        <div class="ruangan-info">
                            <h2 class="ruangan-name">GKM 4.1</h2>
                            <button class="ruangan-toggle" type="button" aria-expanded="false" aria-label="Lihat detail GKM 4.1">
                                <span>Detail Ruangan</span>
                                <img src="{{ asset('images/icon_arrow_down.svg') }}" alt="" aria-hidden="true">
                            </button>
                        </div>
                    </div>

                    <div class="ruangan-details" hidden>
                        <div class="ruangan-detail-content">
                            <p><strong>Ukuran Ruangan:</strong> <span class="detail-capacity">Cukup hingga 80 Orang</span></p>
                            <p><strong>Fasilitas:</strong> <span class="detail-facilities">AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone</span></p>
                        </div>
                        <button class="btn-detail-ruangan" type="button" data-ruangan-id="1">Lihat Detail Ruangan</button>
                    </div>
                </article>

                <article class="ruangan-card" data-ruangan-id="2">
                    <div class="ruangan-card-header">
                        <div class="ruangan-thumbnail"></div>
                        <div class="ruangan-info">
                            <h2 class="ruangan-name">GKM 4.2</h2>
                            <button class="ruangan-toggle" type="button" aria-expanded="false" aria-label="Lihat detail GKM 4.2">
                                <span>Detail Ruangan</span>
                                <img src="{{ asset('images/icon_arrow_down.svg') }}" alt="" aria-hidden="true">
                            </button>
                        </div>
                    </div>

                    <div class="ruangan-details" hidden>
                        <div class="ruangan-detail-content">
                            <p><strong>Ukuran Ruangan:</strong> <span class="detail-capacity">Cukup hingga 80 Orang</span></p>
                            <p><strong>Fasilitas:</strong> <span class="detail-facilities">AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone</span></p>
                        </div>
                        <button class="btn-detail-ruangan" type="button" data-ruangan-id="2">Lihat Detail Ruangan</button>
                    </div>
                </article>

                <article class="ruangan-card" data-ruangan-id="3">
                    <div class="ruangan-card-header">
                        <div class="ruangan-thumbnail"></div>
                        <div class="ruangan-info">
                            <h2 class="ruangan-name">GKM 3.1</h2>
                            <button class="ruangan-toggle" type="button" aria-expanded="false" aria-label="Lihat detail GKM 3.1">
                                <span>Detail Ruangan</span>
                                <img src="{{ asset('images/icon_arrow_down.svg') }}" alt="" aria-hidden="true">
                            </button>
                        </div>
                    </div>

                    <div class="ruangan-details" hidden>
                        <div class="ruangan-detail-content">
                            <p><strong>Ukuran Ruangan:</strong> <span class="detail-capacity">Cukup hingga 80 Orang</span></p>
                            <p><strong>Fasilitas:</strong> <span class="detail-facilities">AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone</span></p>
                        </div>
                        <button class="btn-detail-ruangan" type="button" data-ruangan-id="3">Lihat Detail Ruangan</button>
                    </div>
                </article>

                <article class="ruangan-card" data-ruangan-id="4">
                    <div class="ruangan-card-header">
                        <div class="ruangan-thumbnail"></div>
                        <div class="ruangan-info">
                            <h2 class="ruangan-name">GKM Lantai 1</h2>
                            <button class="ruangan-toggle" type="button" aria-expanded="false" aria-label="Lihat detail GKM Lantai 1">
                                <span>Detail Ruangan</span>
                                <img src="{{ asset('images/icon_arrow_down.svg') }}" alt="" aria-hidden="true">
                            </button>
                        </div>
                    </div>

                    <div class="ruangan-details" hidden>
                        <div class="ruangan-detail-content">
                            <p><strong>Ukuran Ruangan:</strong> <span class="detail-capacity">Cukup hingga 200 Orang</span></p>
                            <p><strong>Fasilitas:</strong> <span class="detail-facilities">AC, Sound System, In Focus, Proyektor, Meja, Kursi, Microphone</span></p>
                        </div>
                        <button class="btn-detail-ruangan" type="button" data-ruangan-id="4">Lihat Detail Ruangan</button>
                    </div>
                </article>
            </section>
        </div>

        @include('partials.bottom-nav', ['active' => 'menu'])
    </div>
</body>
</html>
