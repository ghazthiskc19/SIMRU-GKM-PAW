<!DOCTYPE html>
<html lang="@yield('lang', 'id')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Manajemen Ruangan GKM')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/shared_header_nav.css'])
    @stack('styles')
</head>
<body>
    <div class="mobile-container">
        @yield('page')
    </div>

    @stack('scripts')
</body>
</html>
