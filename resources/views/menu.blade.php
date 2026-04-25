@extends('layouts.app')

@section('lang', 'en')
@section('title', 'Menu - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/halaman_menu_style.css'])
@endpush

@section('page')
    @php
        $userRole = auth()->user()?->role;
    @endphp

    @include('partials.header', ['id' => 1])

        <div class="content">
            <div class="menu-grid">
                <a href="{{ route('list-ruangan') }}" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_ruangan.svg') }}" alt="List Ruangan">
                    </div>
                    <span class="menu-label">List Ruangan</span>
                </a>

                <a href="{{ route('jadwal-ruangan') }}" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_jadwal.svg') }}" alt="Jadwal Ruangan">
                    </div>
                    <span class="menu-label">Jadwal Ruangan</span>
                </a>
                
                @if ($userRole === 'bem')
                    <a href="{{ route('verifikasi-peminjaman') }}" class="menu-item">
                        <div class="menu-icon-box">
                            <img src="{{ asset('images/icon_peminjaman.svg') }}" alt="Verifikasi Peminjaman Ruangan">
                        </div>
                        <span class="menu-label">Verifikasi Peminjaman Ruangan</span>
                    </a>

                    <a href="{{ route('riwayat-verifikasi') }}" class="menu-item">
                        <div class="menu-icon-box">
                            <img src="{{ asset('images/icon_riwayat.svg') }}" alt="Riwayat Verifikasi">
                        </div>
                        <span class="menu-label">Riwayat Verifikasi</span>
                    </a>
                @else
                    <a href="{{ route('peminjaman-ruangan') }}" class="menu-item">
                        <div class="menu-icon-box">
                            <img src="{{ asset('images/icon_peminjaman.svg') }}" alt="Peminjaman Ruangan">
                        </div>
                        <span class="menu-label">Peminjaman Ruangan</span>
                    </a>

                    <a href="{{ route('riwayat-peminjaman') }}" class="menu-item">
                        <div class="menu-icon-box">
                            <img src="{{ asset('images/icon_riwayat.svg') }}" alt="Riwayat Peminjaman">
                        </div>
                        <span class="menu-label">Riwayat Peminjaman</span>
                    </a>
                @endif
                
                <a href="{{ route('laporan-masalah') }}" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_laporan.svg') }}" alt="Laporan Masalah">
                    </div>
                    <span class="menu-label">Laporan Masalah</span>
                </a>

                <a href="{{ route('riwayat-laporan') }}" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_riwayat.svg') }}" alt="Riwayat Laporan">
                    </div>
                    <span class="menu-label">Riwayat Laporan</span>
                </a>


                <a href="{{ route('bantuan') }}" class="menu-item">
                    <div class="menu-icon-box">
                        <img src="{{ asset('images/icon_bantuan.svg') }}" alt="Bantuan">
                    </div>
                    <span class="menu-label">Bantuan</span>
                </a>
            </div>

            
        </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection