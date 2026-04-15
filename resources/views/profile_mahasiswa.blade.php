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
        @include('partials.header', ['id' => 1])

        <div class="content">
            <div class="profile-content">
                
                <div class="profile-image-wrapper">
                    <img src="{{ $user['foto'] }}" alt="Foto Profil Lampu Kaka" class="profile-img">
                </div>

                <div class="profile-form">
                    
                    <div class="form-group">
                        <span class="form-label">Nama</span>
                        <div class="form-input-box">{{ $user['nama'] }}</div>
                    </div>

                    <div class="form-group">
                        <span class="form-label">NIM</span>
                        <div class="form-input-box">{{ $user['nim'] }}</div>
                    </div>

                    <div class="form-group">
                        <span class="form-label">Program Studi</span>
                        <div class="form-input-box">{{ $user['prodi'] }}</div>
                    </div>

                    <div class="logout-btn-container">
                        <a href="{{ url('/login') }}">
                            <button class="logout-btn">Logout</button>
                        </a>
                        
                    </div>

                </div>
                
            </div>
        </div>

        @include('partials.bottom-nav', ['active' => 'profil'])

    </div>
</body>
</html>