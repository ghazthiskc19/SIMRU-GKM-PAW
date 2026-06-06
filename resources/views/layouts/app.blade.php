<!DOCTYPE html>
<html lang="@yield('lang', 'id')">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SIMRU GKM | Sistem Informasi Manajemen Ruangan GKM')</title>

    <meta name="description" content="SIMRU GKM adalah sistem informasi manajemen ruangan yang digunakan untuk melihat jadwal ruangan, mengajukan peminjaman ruangan, memantau riwayat peminjaman, serta melaporkan masalah pada ruangan GKM.">
    <meta name="keywords" content="SIMRU GKM, sistem informasi ruangan, manajemen ruangan, peminjaman ruangan, jadwal ruangan, laporan masalah ruangan">
    <meta name="author" content="Tim Pengembang SIMRU GKM">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="SIMRU GKM | Sistem Informasi Manajemen Ruangan GKM">
    <meta property="og:description" content="SIMRU GKM adalah sistem informasi manajemen ruangan yang digunakan untuk melihat jadwal ruangan, mengajukan peminjaman ruangan, memantau riwayat peminjaman, serta melaporkan masalah pada ruangan GKM.">
    <meta property="og:image" content="{{ asset('assets/open-graph/simru-og.png') }}">
    <meta property="og:site_name" content="SIMRU GKM">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="SIMRU GKM | Sistem Informasi Manajemen Ruangan GKM">
    <meta name="twitter:description" content="SIMRU GKM adalah sistem informasi manajemen ruangan yang digunakan untuk melihat jadwal ruangan, mengajukan peminjaman ruangan, memantau riwayat peminjaman, serta melaporkan masalah pada ruangan GKM.">
    <meta name="twitter:image" content="{{ asset('assets/open-graph/simru-og.png') }}">

    <meta name="theme-color" content="#0F172A">
    <meta name="msapplication-TileColor" content="#0F172A">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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