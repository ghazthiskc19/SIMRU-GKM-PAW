@extends('layouts.app')

@section('title', 'Riwayat Laporan Masalah - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/riwayat_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Laporan Masalah', 'kembaliKe' => '/menu'])

    @if (session('success'))
        <div class="alert alert-success" style="padding: 12px 16px; margin: 20px; border-radius: 10px; background: #e6ffed; color: #1a7f37;">
            {{ session('success') }}
        </div>
    @endif

    <div class="content riwayat-content">
        <div class="history-list">
            @foreach (($items ?? []) as $item)
                <a href="{{ route('riwayat-laporan-detail', ['id' => $item['id']]) }}" style="text-decoration: none; color: inherit; display: block;" aria-label="Lihat detail laporan {{ $item['ruangan'] }} tanggal {{ $item['hari_tanggal'] }}">
                    <div class="history-card">
                        <div class="card-main">
                            <div class="room-img-placeholder"></div>
                            <div class="card-info">
                                <h3>{{ $item['ruangan'] }}</h3>
                                <p>Hari/Tanggal: {{ $item['hari_tanggal'] }}</p>
                                <p>Pukul: {{ $item['pukul'] }}</p>
                                <div class="status-row">
                                    <span>Status Laporan:</span>
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