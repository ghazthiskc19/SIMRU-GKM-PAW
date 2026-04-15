<!DOCTYPE html>
<html lang="@yield('lang', 'id')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Autentikasi - Sistem Informasi Manajemen Ruangan GKM')</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div class="mobile-container">
        @yield('page')
    </div>

    @stack('scripts')
</body>
</html>
