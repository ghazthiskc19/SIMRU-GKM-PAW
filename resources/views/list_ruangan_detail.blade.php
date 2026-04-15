@extends('layouts.app')

@section('title', 'Detail Ruangan - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/list_ruangan_detail_style.css', 'resources/js/list_ruangan_detail.js'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Peminjaman Ruangan', 'kembaliKe' => '/menu_mahasiswa'])

    <div class="list-ruangan-detail-container" data-ruangan-id="{{ request('ruangan', 1) }}">
        <div class="list-ruangan-detail-status">
            <div class="nama-ruangan-container">
                <h3 class="ruangan-name" id="detail-room-name-chip">String value</h3>
            </div>
            <div class="status-ruangan-container">
                <h3 class="status-ruangan" id="detail-room-status">Tersedia</h3>
            </div>
        </div>

        <div class="list-ruangan-detail-hero">
            <button class="arrow-hero arrow-left-hero" type="button" aria-label="Gambar sebelumnya">❮</button>
            <div class="hero-image-container">
                <img src="{{ asset('images/hero_ruangan.png') }}" alt="Foto Ruangan" class="hero-image" id="detail-hero-image">
            </div>
            <button class="arrow-hero arrow-right-hero" type="button" aria-label="Gambar berikutnya">❯</button>
        </div>

        <div class="hero-dots" id="hero-dots" aria-label="Indikator gambar"></div>

        <div class="list-ruangan-detail-informasi">
            <div class="nama-ruangan">
                <label>Nama Ruangan</label>
                <div class="field-value" id="detail-room-name">String value</div>
            </div>
            <div class="kapasitas-ruangan">
                <label>Kapasitas Ruangan</label>
                <div class="field-value" id="detail-room-capacity">String value</div>
            </div>
            <div class="fasilitas-ruangan">
                <label>Fasilitas Ruangan</label>
                <div class="field-value multiline" id="detail-room-facilities">String value</div>
            </div>
            <div class="lokasi-ruangan">
                <label>Lokasi Ruangan</label>
                <div class="field-value" id="detail-room-location">String value</div>
            </div>

            <div class="jadwal-ketersediaan-ruangan">
                <p>Jadwal Ketersediaan Ruangan</p>
                <div class="check-button-container">
                    <button type="button" class="check-button" id="check-ketersediaan-button">Cek Disini</button>
                </div>
            </div>
        </div>
    </div>

    <div class="pinjam-action-bar">
        <button type="button" class="pinjam-button" id="pinjam-button">Pinjam Ruangan Ini</button>
    </div>
@endsection
