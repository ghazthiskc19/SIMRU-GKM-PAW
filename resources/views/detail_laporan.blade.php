@extends('layouts.app')

@section('title', 'Detail Laporan - Sistem Informasi Manajemen Ruangan GKM')

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
                    <h3>Laporan Sedang Ditinjau</h3>
                    <p>19 Oct 2025 | 17.05 WIB</p>
                </div>
            </div>

            <hr class="separator">

            <div class="detail-info">
                <h3>Detail Peminjaman</h3>
                <p>Tanggal: 1 November 2025</p>
                <p>Waktu: 12.00-18.00 WIB</p>
                <p>Tempat: GKM 4.2</p>
                <p>Kegiatan: Workshop</p>
                <p>Lembaga: HMDTIF</p>
            </div>

            <div class="detail-description">
                <p>Laporan masalah sedang ditinjau oleh Staff Perlengkapan Filkom. Harap menunggu hingga proses verifikasi dan review selesai.</p>
            </div>

        </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection