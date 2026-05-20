@extends('layouts.app')

@section('title', 'Verifikasi Laporan - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/verifikasi_peminjaman_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Verifikasi Laporan', 'kembaliKe' => '/menu'])

    <div class="content verifikasi-peminjaman-content">
        <div class="verification-list">
            @forelse (($items ?? []) as $item)
                <a href="{{ route('verifikasi-laporan-detail', ['id' => $item['id'] ?? $item['id_laporan'] ?? 0]) }}" class="verification-card-link">
                    <article class="verification-card">
                        <div class="verification-card-main">
                            <div class="room-img-placeholder" aria-hidden="true"></div>
                            <div class="verification-card-info">
                                <h3>{{ $item['ruangan'] ?? 'GKM' }}</h3>
                                <p>Hari/Tanggal: {{ $item['tanggal'] ?? '-' }}</p>
                                <p>Pukul: {{ $item['waktu'] ?? '-' }}</p>
                                @php
                                    $status = $item['status'] ?? ($item['status_laporan'] ?? 'Sedang Ditinjau');
                                    $statusClass = match($status) {
                                        'Sedang Ditinjau' => 'btn-verifikasi-small btn-warning',
                                        'Selesai' => 'btn-verifikasi-small btn-success',
                                        default => 'btn-verifikasi-small btn-info'
                                    };
                                @endphp
                                <button class="{{ $statusClass }}" disabled>{{ $status }}</button>
                            </div>
                        </div>
                    </article>
                </a>
            @empty
                <p style="text-align: center; margin-top: 20px;">Tidak ada laporan.</p>
            @endforelse
        </div>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
