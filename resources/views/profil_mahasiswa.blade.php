<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Sistem Informasi Manajemen Ruangan GKM</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/shared_header_nav.css', 'resources/css/profil_mahasiswa_style.css'])
</head>
<body>

    <div class="mobile-container">
        @include('partials.header')

        <div class="content">
            <div class="profile-content">
                
                <div class="profile-image-wrapper">
                    <img src="{{ asset('images/photo_user_mahasiswa.png') }}" alt="Foto Profil Lampu Kaka" class="profile-img">
                </div>

                <div class="profile-form">
                    
                    <div class="form-group">
                        <span class="form-label">Nama</span>
                        <div class="form-input-box">Prabowo Subianto</div>
                    </div>

                    <div class="form-group">
                        <span class="form-label">NIM</span>
                        <div class="form-input-box">20051998</div>
                    </div>

                    <div class="form-group">
                        <span class="form-label">Program Studi</span>
                        <div class="form-input-box">Tim Mawar</div>
                    </div>

                    <div class="logout-btn-container">
                        <button class="logout-btn">Logout</button>
                    </div>

                </div>
                
            </div>
        </div>

        @include('partials.bottom-nav', ['active' => 'profil'])

    </div>
</body>
</html>