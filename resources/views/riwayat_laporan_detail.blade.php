@extends('layouts.app')

@section('title', 'Detail Riwayat Laporan - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/detail_riwayat_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Laporan Masalah', 'kembaliKe' => '/riwayat_laporan'])

    <div class="content detail-content">
        <div class="status-alert">
            <div class="status-icon">
                <img src="{{ asset('images/icon_jadwal.svg') }}" alt="Status">
            </div>
            <div class="status-text">
                <h3>{{ $item['status_title'] }}</h3>
                <p>{{ $item['status_time'] }}</p>
            </div>
        </div>

        <hr class="separator">

        <div class="detail-info">
            <h3>Detail Laporan</h3>
            <p>Tanggal: {{ $item['tanggal'] }}</p>
            <p>Waktu: {{ $item['waktu'] }}</p>
            <p>Tempat: {{ $item['tempat'] }}</p>
            <p>Kegiatan: {{ $item['kegiatan'] }}</p>
            <p>Lembaga: {{ $item['lembaga'] }}</p>
        </div>

        <div class="detail-description">
            @foreach (($item['description'] ?? []) as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
