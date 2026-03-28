<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Sistem Informasi Manajemen Ruangan GKM</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/halaman_menu_style.css'])
</head>
<body>
    <div class="mobile-container">
        <div class="header">
            <div class="header-logo">
                <img src="{{ asset('images/icon_logo.png') }}" alt="Profil">
            </div>
            <h1 class="header-title">Sistem Informasi Manajemen Ruangan GKM</h1>
            <div class="header-notif">
                <img src="{{ asset('images/icon_notifikasi.png') }}" alt="Notifikasi">
            </div>
        </div>

        <div class="content">
            <div class="menu-grid">
                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_ruangan.png') }}" alt="List Ruangan">
                    </div>
                    <span class="menu-label">List Ruangan</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_jadwal.png') }}" alt="Jadwal Ruangan">
                    </div>
                    <span class="menu-label">Jadwal Ruangan</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_peminjaman.png') }}" alt="Peminjaman Ruangan">
                    </div>
                    <span class="menu-label">Peminjaman Ruangan</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_riwayat.png') }}" alt="Riwayat Peminjaman">
                    </div>
                    <span class="menu-label">Riwayat Peminjaman</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_laporan.png') }}" alt="Laporan Masalah">
                    </div>
                    <span class="menu-label">Laporan Masalah</span>
                </a>

                <a href="#" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_bantuan.png') }}" alt="Bantuan">
                    </div>
                    <span class="menu-label">Bantuan</span>
                </a>
            </div>

            
        </div>

        <div class="bottom-nav">
                <a href="#" class="nav-item">
                    <img src="{{ asset('images/icon_home.png') }}" alt="Home" class="nav-icon">
                    <span class="nav-label">Home</span>
                </a>
            
                <a href="#" class="nav-item active">
                    <img src="{{ asset('images/icon_menu_active.png') }}" alt="Menu" class="nav-icon">
                    <span class="nav-label">Menu</span>
                </a>
            
                <a href="{{ url('/profil_mahasiswa') }}" class="nav-item">
                    <img src="{{ asset('images/icon_profile.png') }}" alt="Profil" class="nav-icon">
                    <span class="nav-label">Profil</span>
                </a>
            </div>
    </div>
    

</body>
</html>