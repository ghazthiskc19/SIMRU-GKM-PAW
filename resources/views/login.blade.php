<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Manajemen Ruangan GKM</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/login_page_style.css'])
</head>
<body>

    <div class="mobile-container">
        
        <img src="{{ asset('images/decor_top_orange.svg') }}" alt="" class="decor-top">
        <img src="{{ asset('images/decor_bottom_orange.svg') }}" alt="" class="decor-bottom-orange">
        <img src="{{ asset('images/decor_bottom_blue.svg') }}" alt="" class="decor-bottom-blue">

        <div class="login-content">
            
            <img src="{{ asset('images/logo_filkom.svg') }}" alt="FILKOM UB" class="logo-filkom">
            
            <img src="{{ asset('images/icon_logo.svg') }}" alt="GKM Icon" class="main-icon">
            
            <h1 class="app-title">Peminjaman Ruangan GKM</h1>

            <div class="button-group">
                <a href="#" class="btn-login">Login Admin</a>
                <a href="{{ route('login-mahasiswa') }}" class="btn-login">Login As Student</a>
            </div>

        </div>

    </div>

</body>
</html>