@extends('layouts.app')

@section('title', 'Detail Laporan - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/detail_riwayat_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Laporan Masalah', 'kembaliKe' => '/verifikasi_laporan'])

    <div class="content detail-content">
        <div class="status-alert">
            <div class="status-icon">
                <img src="{{ asset('images/icon_jadwal.svg') }}" alt="Status">
            </div>
            <div class="status-text">
                <h3>{{ $detail['status_title'] ?? ($detail['status'] ?? 'Sedang Ditinjau') }}</h3>
                <p>{{ $detail['status_time'] ?? '' }}</p>
            </div>
        </div>

        <hr class="separator">

        <div class="detail-info">
            <h3>Detail Laporan</h3>
            <p>Tanggal: {{ $detail['tanggal'] ?? '-' }}</p>
            <p>Waktu: {{ $detail['waktu'] ?? '-' }}</p>
            <p>Tempat: {{ $detail['tempat'] ?? '-' }}</p>
            <p>Kegiatan: {{ $detail['kegiatan'] ?? 'Laporan Masalah' }}</p>
            <p>Lembaga: {{ $detail['lembaga'] ?? '-' }}</p>
        </div>

        <div class="detail-description">
            @foreach (($detail['description'] ?? []) as $paragraph)
                <p>{{ strip_tags($paragraph) }}</p>
            @endforeach
        </div>

        <form id="complete-form" method="POST" action="{{ route('laporan-complete', $detail['id'] ?? $detail['id_laporan'] ?? 0) }}">
            @csrf
            <div style="padding: 16px;">
                <button type="button" class="btn-action btn-verify" onclick="handleComplete()">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Selesai
                </button>
            </div>
        </form>

        <script>
            function handleComplete() {
                if (confirm('Tandai laporan ini sebagai selesai?')) {
                    document.getElementById('complete-form').submit();
                }
            }
        </script>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
