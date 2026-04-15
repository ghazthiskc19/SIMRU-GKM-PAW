@extends('layouts.app')

@section('title', 'Jadwal Ruangan - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/jadwal_ruangan_style.css', 'resources/js/jadwal_ruangan.js'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Jadwal Ruangan', 'kembaliKe' => '/menu_mahasiswa'])

    <div class="jadwal-content">
        <div class="jadwal-filter-bar">
            <span class="room-filter-label">Filter Ruangan</span>
            <div id="room-filter-group" class="room-filter-group" role="group" aria-label="Filter ruangan">
                <label class="room-check-item">
                    <input type="checkbox" class="room-filter-checkbox" value="gkm-41" checked>
                    <span>GKM 4.1</span>
                </label>
                <label class="room-check-item">
                    <input type="checkbox" class="room-filter-checkbox" value="gkm-42" checked>
                    <span>GKM 4.2</span>
                </label>
                <label class="room-check-item">
                    <input type="checkbox" class="room-filter-checkbox" value="gkm-31" checked>
                    <span>GKM 3.1</span>
                </label>
                <label class="room-check-item">
                    <input type="checkbox" class="room-filter-checkbox" value="gkm-lt1" checked>
                    <span>GKM Lt.1</span>
                </label>
            </div>
        </div>

        <section class="jadwal-calendar-panel">
            <div id="jadwal-calendar" class="jadwal-calendar"></div>
        </section>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
