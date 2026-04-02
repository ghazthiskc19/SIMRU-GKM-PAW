<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Riwayat - Sistem Informasi Manajemen Ruangan GKM</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/shared_header_nav.css', 'resources/css/detail_riwayat_style.css'])
</head>
<body>
    <div class="mobile-container">
        @include('partials.header', ['id' => 2, 'judul' => 'Riwayat Peminjaman', 'kembaliKe' => '/riwayat_peminjaman'])

        <div class="content detail-content">
            
            <div class="status-alert">
                <div class="status-icon">
                    <img src="{{ asset('images/icon_jadwal.svg') }}" alt="Status">
                </div>
                <div class="status-text">
                    <h3>Verifikasi Sudah Dilakukan!</h3>
                    <p>19 Oct 2025 | 17.05 WIB</p>
                </div>
            </div>

            <hr class="separator">

            <div class="detail-info">
                <h3>Detail Peminjaman</h3>
                <p>Tanggal: 1 November 2025</p>
                <p>Waktu: 12.00-18.00 WIB</p>
                <p>Tempat: GKM 4.2</p>
                <p>Kegiatan: Workshop</p>
                <p>Lembaga: HMDTIF</p>
            </div>

            <div class="detail-description">
                <p>Surat Peminjaman ruangan sudah diverifikasi oleh staff Administrasi dan Keuangan BEM Filkom.</p>
                <p>Status pengajuan peminjaman ruangan akan berganti menjadi <strong>menunggu finalisasi</strong> dan selanjutnya akan dikirim kepada Staff Unit Umum dan Perlengkapan Filkom.</p>
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