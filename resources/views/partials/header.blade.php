@php
    $id = (int) ($id ?? 1);
    $judul = (string) ($judul ?? 'Sistem Informasi Manajemen Ruangan GKM');
    $kembaliKe = $kembaliKe ?? null;
@endphp

@if ($id === 2)
    <header class="header-with-back">
        @if($kembaliKe)
            <a href="{{ url($kembaliKe) }}" class="header-back" aria-label="Kembali">
                <img src="{{ asset('images/icon_back.svg') }}" alt="Kembali">
            </a>
        @else
            <button class="header-back" type="button" aria-label="Kembali" onclick="window.history.back();">
                <img src="{{ asset('images/icon_back.svg') }}" alt="Kembali">
            </button>
        @endif
        
        <h1 class="header-title-back">{{ $judul }}</h1>
        <div class="header-back-spacer"></div>
    </header>
@else
    <header class="header">
        <div class="header-logo">
            <img src="{{ asset('images/icon_logo.svg') }}" alt="Logo">
        </div>
        <h1 class="header-title">{{ $judul }}</h1>
        <div class="header-notif">
            <img src="{{ asset('images/icon_notifikasi.svg') }}" alt="Notifikasi">
        </div>
    </header>
@endif