<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Sistem Informasi Manajemen Ruangan GKM</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/profil_mahasiswa_style.css'])
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
        </div> <div class="bottom-nav">
            <a href="#" class="nav-item">
                <img src="{{ asset('images/icon_home.png') }}" alt="Home" class="nav-icon">
                <span class="nav-label">Home</span>
            </a>
            
            <a href="{{ url('/') }}" class="nav-item">
                <img src="{{ asset('images/icon_menu.png') }}" alt="Menu" class="nav-icon">
                <span class="nav-label">Menu</span>
            </a>
            
            <a href="#" class="nav-item active">
                <img src="{{ asset('images/icon_profile_active.png') }}" alt="Profile" class="nav-icon">
                <span class="nav-label">Profile</span>
            </a>
        </div>

    </div> </body>
</html>