@extends('layouts.app')

@section('title', 'Riwayat Peminjaman - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/riwayat_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Riwayat Peminjaman', 'kembaliKe' => '/menu'])

    <div class="content riwayat-content">
        <div class="month-selector">
            <a class="arrow-btn" href="{{ route('riwayat-peminjaman', ['month' => $previousMonth ?? date('Y-m')]) }}" aria-label="Bulan sebelumnya">&lt;</a>
            <h2>{{ $selectedMonth ?? date('F Y') }}</h2>
            <a class="arrow-btn" href="{{ route('riwayat-peminjaman', ['month' => $nextMonth ?? date('Y-m')]) }}" aria-label="Bulan berikutnya">&gt;</a>
        </div>

        <div class="history-list">
            @foreach (($items ?? []) as $item)
                <a href="{{ route('riwayat-peminjaman-detail', ['id' => $item['id_peminjaman']]) }}" style="text-decoration: none; color: inherit; display: block;" aria-label="Lihat detail riwayat {{ $item['ruangan'] }} tanggal {{ $item['hari_tanggal'] }}">
                    <div class="history-card">
                        <div class="card-main">
                            <div class="room-img-placeholder"></div>
                            <div class="card-info">
                                <h3>{{ $item['ruangan'] }}</h3>
                                <p>Hari/Tanggal: {{ $item['hari_tanggal'] }}</p>
                                <p>Pukul: {{ $item['pukul'] }}</p>
                                <div class="status-row">
                                    <span>Status Peminjaman:</span>
                                    <span class="badge {{ $item['status_class'] }}">{{ $item['status'] }}</span>
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