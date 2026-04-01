<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan Masalah - Sistem Informasi Manajemen Ruangan GKM</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/shared_header_nav.css', 'resources/css/laporan_masalah_style.css'])
</head>
<body>
    <div class="mobile-container">
        
        <div class="header-ungu">
            <a href="{{ url('/menu_mahasiswa') }}" class="header-back">
                <img src="{{ asset('images/icon_back.svg') }}" alt="Kembali">
            </a>
            <h1 class="header-title-back">Form Laporan Masalah</h1>
            <div class="header-back-spacer"></div>
        </div>

        <div class="content form-content">
            
            <div class="room-selector-container">
                <select class="room-select">
                    <option value="gkm4.1">GKM 4.1</option>
                    <option value="gkm4.2">GKM 4.2</option>
                    <option value="gkm3.1">GKM 3.1</option>
                </select>
                <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
            </div>

            <form action="#" method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" placeholder="Isi Dengan Benar" class="form-control">
                </div>

                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" placeholder="Isi Dengan Benar" class="form-control">
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <input type="text" placeholder="Isi Dengan Benar" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tanggal Pemakaian</label>
                    <div class="split-input">
                        <input type="date" class="form-control">
                        <input type="time" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Laporan Permasalahan</label>
                    <input type="text" placeholder="Isi Dengan Benar" class="form-control">
                </div>

                <div class="form-group upload-group">
                    <label for="dokumen">Dokumen Tambahan</label>
                    <input type="file" id="dokumen" name="dokumen[]" accept="application/pdf,.pdf" multiple>
                    <small class="upload-hint">Format hanya PDF, maksimal 2MB per file.</small>
                </div>
            </form>
        </div>

        <div class="footer-submit">
            <button type="submit" class="btn-submit">
                Submit
                <img src="{{ asset('images/icon_submit.svg') }}" alt="Submit Icon" class="submit-icon">
            </button>
        </div>

    </div>
</body>
</html>