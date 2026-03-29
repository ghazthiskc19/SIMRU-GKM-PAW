@php
    $id = (int) ($id ?? 1);
    $judul = (string) ($judul ?? 'Sistem Informasi Manajemen Ruangan GKM');
@endphp

@if ($id === 2)
    <header class="header-with-back">
        <button class="header-back" type="button" aria-label="Kembali">
            <img src="{{ asset('images/icon_back.svg') }}" alt="Kembali">
        </button>
        <h1 class="header-title-back">{{ $judul }}</h1>
        <div class="header-back-spacer"></div>
    </header>
@else
    <div class="header">
        <div class="header-logo">
            <img src="{{ asset('images/icon_logo.png') }}" alt="Logo">
        </div>
        <h1 class="header-title">{{ $judul }}</h1>
        <div class="header-notif">
            <img src="{{ asset('images/icon_notifikasi.png') }}" alt="Notifikasi">
        </div>
    </div>
@endif
