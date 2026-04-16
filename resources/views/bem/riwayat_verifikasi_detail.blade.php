@extends('layouts.app')

@section('title', 'Detail Riwayat Verifikasi - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/detail_riwayat_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Riwayat Verifikasi', 'kembaliKe' => '/riwayat_verifikasi'])

    <div class="content detail-content">
        <section class="status-alert" aria-label="Status verifikasi terkini">
            <div class="status-icon">
                <img src="{{ asset('images/icon_jadwal.svg') }}" alt="Status Verifikasi">
            </div>
            <div class="status-text">
                <h3>{{ $detail['status_title'] }}</h3>
                @php
                    $statusTitle = strtolower($detail['status_title'] ?? '');
                @endphp
                @if (str_contains($statusTitle, 'ditolak') || str_contains($statusTitle, 'dibatalkan'))
                    <p>Laporan ditolak.</p>
                @elseif (str_contains($statusTitle, 'diverifikasi') || str_contains($statusTitle, 'selesai') || str_contains($statusTitle, 'disetujui'))
                    <p>Laporan telah diverifikasi.</p>
                @else
                    <p>{{ $detail['status_time'] }}</p>
                @endif
            </div>
        </section>

        <hr class="separator">

        <section class="detail-info">
            <h3>Detail Peminjaman</h3>
            <div class="detail-row"><span>Ruangan</span><strong>{{ $detail['ruangan'] }}</strong></div>
            <div class="detail-row"><span>Nama</span><strong>{{ $detail['nama'] }}</strong></div>
            <div class="detail-row"><span>NIM</span><strong>{{ $detail['nim'] }}</strong></div>
            <div class="detail-row"><span>Program Studi</span><strong>{{ $detail['program_studi'] }}</strong></div>
            <div class="detail-row"><span>Tanggal Pemakaian</span><strong>{{ $detail['tanggal_pemakaian'] }}</strong></div>
            <div class="detail-row"><span>Jam Pemakaian</span><strong>{{ $detail['jam_mulai_lengkap'] }} - {{ $detail['jam_selesai_lengkap'] }}</strong></div>
        </section>

        <section class="detail-section">
            <h4>Alasan Peminjaman</h4>
            <p>{{ $detail['alasan_peminjaman'] }}</p>
        </section>

        <section class="detail-section">
            <h4>Sarana dan Prasarana yang Dipinjam</h4>
            <p>{{ $detail['sarana_prasarana'] }}</p>
        </section>

        <section class="detail-section">
            <h4>Peminjaman Alat Tambahan</h4>
            <p>{{ $detail['alat_tambahan'] }}</p>
        </section>

        <section class="detail-section" aria-label="Dokumen yang diunggah peminjam">
            <h4>Dokumen Terunggah</h4>
            <ul class="dokumen-list">
                @foreach ($detail['dokumen'] as $dokumen)
                    <li>
                        <span class="dokumen-name">{{ $dokumen }}</span>
                        <span class="dokumen-tag">PDF</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="detail-section">
            <h4>Catatan Verifikasi</h4>
            <p>{{ $detail['catatan_verifikasi'] }}</p>
        </section>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
