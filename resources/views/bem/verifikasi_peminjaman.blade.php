@extends('layouts.app')

@section('title', 'Verifikasi Peminjaman - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/verifikasi_peminjaman_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Verifikasi Peminjaman', 'kembaliKe' => '/menu'])

    <div class="content verifikasi-peminjaman-content">
        <div class="month-selector" aria-label="Pilihan bulan verifikasi peminjaman">
            <button class="month-arrow" type="button" aria-label="Bulan sebelumnya">◀</button>
            <h2>{{ $selectedMonth ?? 'Oktober 2025' }}</h2>
            <button class="month-arrow" type="button" aria-label="Bulan berikutnya">▶</button>
        </div>

        <div class="verification-list">
            @forelse (($items ?? [1, 2, 3]) as $item)
                <a href="{{ route('verifikasi-peminjaman-detail', ['id' => $item['id_peminjaman']]) }}" class="verification-card-link">
                    <article class="verification-card">
                        <div class="verification-card-main">
                            <div class="room-img-placeholder" aria-hidden="true"></div>
                            <div class="verification-card-info">
                                
                                <h3>{{ $item['ruangan']}}</h3>
                                <p>Hari/Tanggal: {{ $item['tanggal_pemakaian'] }}</p>
                                <p>Pukul: {{ $item['pukul'] ?? '07.00 - 10.00' }}</p>
                                @php
                                    $status = $item['status'] ?? 'Proses Pengajuan';
                                    $statusClass = match($status) {
                                        'Proses Pengajuan' => 'btn-verifikasi-small btn-warning',
                                        'Disetujui' => 'btn-verifikasi-small btn-success',
                                        'Ditolak' => 'btn-verifikasi-small btn-danger',
                                        'Selesai' => 'btn-verifikasi-small btn-success',
                                        'Dibatalkan' => 'btn-verifikasi-small btn-danger',
                                        default => 'btn-verifikasi-small btn-info'
                                    };
                                @endphp
                                <button class="{{ $statusClass }}" disabled>{{ $status }}</button>
                            </div>
                        </div>
                    </article>
                </a>
            @empty
                <p style="text-align: center; margin-top: 20px;">Tidak ada data peminjaman.</p>
            @endforelse
        </div>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
