<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Sistem Informasi Manajemen Ruangan GKM</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/shared_header_nav.css', 'resources/css/halaman_menu_style.css'])
</head>
<body>
    <div class="mobile-container">
        @include('partials.header', ['id' => 1])

        <div class="content">
            <div class="menu-grid">
                <a href="{{ url('/list_ruangan') }}" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_ruangan.svg') }}" alt="List Ruangan">
                    </div>
                    <span class="menu-label">List Ruangan</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_jadwal.svg') }}" alt="Jadwal Ruangan">
                    </div>
                    <span class="menu-label">Jadwal Ruangan</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_peminjaman.svg') }}" alt="Peminjaman Ruangan">
                    </div>
                    <span class="menu-label">Peminjaman Ruangan</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_riwayat.svg') }}" alt="Riwayat Peminjaman">
                    </div>
                    <span class="menu-label">Riwayat Peminjaman</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_laporan.svg') }}" alt="Laporan Masalah">
                    </div>
                    <span class="menu-label">Laporan Masalah</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_bantuan.svg') }}" alt="Bantuan">
                    </div>
                    <span class="menu-label">Bantuan</span>
                </a>
            </div>

            
        </div>

        @include('partials.bottom-nav', ['active' => 'menu'])
    </div>
    

</body>
</html>