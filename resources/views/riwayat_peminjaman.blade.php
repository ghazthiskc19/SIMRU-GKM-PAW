<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman - Sistem Informasi Manajemen Ruangan GKM</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/shared_header_nav.css', 'resources/css/riwayat_style.css'])
</head>
<body>
    <div class="mobile-container">
        @include('partials.header', ['id' => 2, 'judul' => 'Riwayat Peminjaman', 'kembaliKe' => '/menu_mahasiswa'])

        <div class="content riwayat-content">
            
            <div class="month-selector">
                <button class="arrow-btn">&lt;</button>
                <h2>Oktober 2025</h2>
                <button class="arrow-btn">&gt;</button>
            </div>

            <div class="history-list">
                <a href="{{ route('detail-riwayat') }}" style="text-decoration: none; color: inherit; display: block;">
                    <div class="history-card">
                        <div class="card-main">
                            <div class="room-img-placeholder"></div>
                            <div class="card-info">
                                <h3>GKM 4.1</h3>
                                <p>Hari/Tanggal: Senin, 20 Oktober 2025</p>
                                <p>Pukul: 07.00 - 10.00</p>
                                <div class="status-row">
                                    <span>Status Peminjaman:</span>
                                    <span class="badge badge-warning">Proses Pengajuan</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Dalam Proses Verifikasi oleh Staff AdKeu BEM
                        </div>
                    </div>
                </a>

                <div class="history-card">
                    <div class="card-main">
                        <div class="room-img-placeholder"></div>
                        <div class="card-info">
                            <h3>GKM 4.1</h3>
                            <p>Hari/Tanggal: Jumat, 17 Oktober 2025</p>
                            <p>Pukul: 07.00 - 10.00</p>
                            <div class="status-row">
                                <span>Status Peminjaman:</span>
                                <span class="badge badge-danger">Ditolak/Dibatalkan</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        Alasan Penolakan: Konflik Jadwal dengan Kuliah Tamu
                    </div>
                </div>

                <div class="history-card">
                    <div class="card-main">
                        <div class="room-img-placeholder"></div>
                        <div class="card-info">
                            <h3>GKM 4.1</h3>
                            <p>Hari/Tanggal: Kamis, 16 Oktober 2025</p>
                            <p>Pukul: 07.00 - 10.00</p>
                            <div class="status-row">
                                <span>Status Peminjaman:</span>
                                <span class="badge badge-success">Selesai Dipinjam</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.bottom-nav', ['active' => 'menu'])
    </div>

    <script>
        document.querySelector('.header-back')?.addEventListener('click', function () {
            window.history.back();
        });
    </script>
</body>
</html>