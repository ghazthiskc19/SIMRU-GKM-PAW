@extends('layouts.app')

@section('title', 'Detail Verifikasi Peminjaman - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/verifikasi_peminjaman_detail_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Verifikasi Peminjaman', 'kembaliKe' => '/verifikasi_peminjaman'])

    <div class="content verifikasi-detail-content">
        <div class="card-container-ungu">
            <section class="inner-header-card">
                <div class="room-img-placeholder"></div>
                <div class="detail-header-info">
                    <h3>{{ $detail['ruangan'] ?? 'GKM 4.1' }}</h3>
                    <p>{{ $detail['status_title'] ?? 'Verifikasi Sedang Berlangsung' }}</p>
                </div>
            </section>

            <section class="detail-fields">
                <div class="data-group">
                    <label>Tanggal Pemakaian</label>
                    <div class="data-box">{{ $detail['tanggal'] ?? '20 Oktober 2025' }}</div>
                </div>

                <div class="data-group">
                    <label>Waktu</label>
                    <div class="data-box">{{ $detail['waktu'] ?? '07.00 - 10.00 WIB' }}</div>
                </div>

                <div class="data-group">
                    <label>Tempat</label>
                    <div class="data-box">{{ $detail['tempat'] ?? 'GKM 4.1' }}</div>
                </div>

                <div class="data-group">
                    <label>Kegiatan</label>
                    <div class="data-box">{{ $detail['kegiatan'] ?? 'Kegiatan Organisasi' }}</div>
                </div>

                <div class="data-group">
                    <label>Lembaga</label>
                    <div class="data-box">{{ $detail['lembaga'] ?? 'HMDTIF' }}</div>
                </div>
            </section>

            <section class="detail-section">
                <h4>Detail Verifikasi</h4>
                <div class="data-box textarea">
                    @foreach (($detail['description'] ?? []) as $paragraph)
                        <p>{{ strip_tags($paragraph) }}</p>
                    @endforeach
                </div>
            </section>

            @if (!empty($detail['footer']))
                <section class="detail-section">
                    <h4>Ringkasan</h4>
                    <div class="data-box textarea">{{ $detail['footer'] }}</div>
                </section>
            @endif

            <div class="action-buttons">
                <button class="btn-action btn-verify">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Verifikasi
                </button>
                <button class="btn-action btn-reject">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    Tolak
                </button>
            </div>

        </div>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection