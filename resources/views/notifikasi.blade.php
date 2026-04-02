<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - Sistem Informasi Manajemen Ruangan GKM</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/shared_header_nav.css', 'resources/css/notifikasi_style.css'])
</head>
<body>

    <div class="mobile-container">
        @include('partials.header', ['id' => 2, 'judul' => 'Notifikasi'])

        <div class="content">
            
            <div class="notif-item" onclick="toggleDetail(this)">
                <div class="notif-summary">
                    <div class="icon-circle bg-purple">
                        <img src="{{ asset('images/icon_terverifikasi.svg') }}" alt="Icon">
                    </div>
                    <div class="notif-text">
                        <span class="notif-title">Verifikasi Sudah Dilakukan!</span>
                        <span class="notif-date">19 Oct 2025 | 17.05 WIB</span>
                    </div>
                </div>
                
                <div class="notif-detail">
                    <div class="detail-title">Detail Peminjaman</div>
                    <div class="detail-info">
                        Tanggal: 1 November 2025<br>
                        Waktu: 12.00-18.00 WIB<br>
                        Tempat: GKM 4.2<br>
                        Kegiatan: Workshop<br>
                        Lembaga: HMDTIF
                    </div>
                    <p class="detail-desc">Surat Peminjaman ruangan sudah diverifikasi oleh staff Administrasi dan Keuangan BEM Filkom.</p>
                    <p class="detail-desc">Status pengajuan peminjaman ruangan akan berganti menjadi <strong>menunggu finalisasi</strong> dan selanjutnya akan dikirim kepada Staff Unit Umum dan Perlengkapan Filkom.</p>
                </div>
            </div>

            <div class="notif-item" onclick="toggleDetail(this)">
                <div class="notif-summary">
                    <div class="icon-circle bg-yellow">
                        <img src="{{ asset('images/icon_ditinjau.svg') }}" alt="Icon">
                    </div>
                    <div class="notif-text">
                        <span class="notif-title">Surat Sedang Ditinjau</span>
                        <span class="notif-date">17 Oct 2025 | 17.05 WIB</span>
                    </div>
                </div>
                
                <div class="notif-detail">
                    <div class="detail-title">Detail Peminjaman</div>
                    <div class="detail-info">
                        Tanggal: 1 November 2025<br>
                        Waktu: 12.00-18.00 WIB<br>
                        Tempat: GKM 4.2<br>
                        Kegiatan: Workshop<br>
                        Lembaga: HMDTIF
                    </div>
                    <p class="detail-desc">Surat Peminjaman ruangan sedang dalam tahap peninjauan oleh staff Administrasi dan Keuangan BEM Filkom.</p>
                    <p class="detail-desc">Status pengajuan peminjaman ruangan saat ini adalah <strong>menunggu persetujuan awal</strong>.</p>
                </div>
            </div>

            <div class="notif-item" onclick="toggleDetail(this)">
                <div class="notif-summary">
                    <div class="icon-circle bg-green">
                        <img src="{{ asset('images/icon_terkirim.svg') }}" alt="Icon">
                    </div>
                    <div class="notif-text">
                        <span class="notif-title">Surat Telah Terkirim!</span>
                        <span class="notif-date">16 Oct 2025 | 17.05 WIB</span>
                    </div>
                </div>
                
                <div class="notif-detail">
                    <div class="detail-title">Detail Peminjaman</div>
                    <div class="detail-info">
                        Tanggal: 1 November 2025<br>
                        Waktu: 12.00-18.00 WIB<br>
                        Tempat: GKM 4.2<br>
                        Kegiatan: Workshop<br>
                        Lembaga: HMDTIF
                    </div>
                    <p class="detail-desc">Surat Peminjaman ruangan telah berhasil dikirimkan ke sistem.</p>
                    <p class="detail-desc">Status pengajuan saat ini adalah <strong>terkirim</strong> dan menunggu antrean untuk ditinjau oleh pihak terkait.</p>
                </div>
            </div>

        </div>
        @include('partials.bottom-nav', ['active' => 'home'])


    </div>

    <script>
        document.querySelector('.header-back')?.addEventListener('click', function () {
            window.history.back();
        });

        function toggleDetail(item) {
            const detailBox = item.querySelector('.notif-detail');
            
            if (detailBox.style.display === "block") {
                detailBox.style.display = "none";
            } else {
                const allDetails = document.querySelectorAll('.notif-detail');
                allDetails.forEach(box => box.style.display = "none");
                
                detailBox.style.display = "block";
            }
        }
    </script>

</body>
</html>