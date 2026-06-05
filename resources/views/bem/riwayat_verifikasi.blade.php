@extends('layouts.app')

@section('title', Auth::user()?->role === 'bem' ? 'Riwayat Verifikasi - Sistem Informasi Manajemen Ruangan GKM' : 'Riwayat Validasi - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/riwayat_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => Auth::user()?->role === 'bem' ? 'Riwayat Verifikasi' : 'Riwayat Validasi', 'kembaliKe' => '/menu'])

    <div class="content riwayat-content">
        <div class="month-selector">
            <a class="arrow-btn" href="{{ route('riwayat-verifikasi', ['month' => $previousMonth ?? date('Y-m')]) }}" aria-label="Bulan sebelumnya">&lt;</a>
            <h2>{{ $selectedMonth ?? date('F Y') }}</h2>
            <a class="arrow-btn" href="{{ route('riwayat-verifikasi', ['month' => $nextMonth ?? date('Y-m')]) }}" aria-label="Bulan berikutnya">&gt;</a>
        </div>

        <div class="history-list">
            @foreach (($items ?? []) as $item)
                <a href="{{ route('riwayat-verifikasi-detail', ['id' => $item['id']]) }}" class="verification-link" aria-label="Lihat detail verifikasi {{ $item['ruangan'] }} tanggal {{ $item['hari_tanggal'] }}">
                    <div class="history-card">
                        <div class="card-main">
                            <div class="room-img-placeholder"></div>
                            <div class="card-info">
                                <h3>{{ $item['ruangan'] }}</h3>
                                <p>Hari/Tanggal: {{ $item['hari_tanggal'] }}</p>
                                <p>Pukul: {{ $item['jam_mulai'] }} - {{ $item['jam_selesai'] }}</p>
                                @php
                                    $statusText = $item['status_text'];
                                    if (str_contains(strtolower($item['status_title'] ?? ''), 'ditinjau')) {
                                        $statusText = 'Menunggu Verifikasi';
                                    }
                                @endphp
                                <div class="status-row">
                                    <span>Status Peminjaman:</span>
                                    <span class="badge {{ $item['status_badge_class'] }}">{{ $statusText }}</span>
                                </div>
                            </div>
                        </div>
                        @if (!empty($item['footer']))
                            <div class="card-footer">
                                {{ $item['footer'] }}
                            </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
