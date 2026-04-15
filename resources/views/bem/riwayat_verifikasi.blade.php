@extends('layouts.app')

@section('title', 'Riwayat Verifikasi - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/riwayat_verifikasi_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Riwayat Verifikasi', 'kembaliKe' => '/menu_mahasiswa'])

    <div class="content riwayat-verifikasi-content">
        <div class="month-selector" aria-label="Pilihan bulan riwayat verifikasi">
            <button class="month-arrow" type="button" aria-label="Bulan sebelumnya">◀</button>
            <h2>{{ $selectedMonth ?? 'Oktober 2025' }}</h2>
            <button class="month-arrow" type="button" aria-label="Bulan berikutnya">▶</button>
        </div>

        <div class="verification-list">
            @foreach (($items ?? []) as $item)
                <a href="{{ route('riwayat-verifikasi-detail', ['id' => $item['id']]) }}" class="verification-link" aria-label="Lihat detail verifikasi {{ $item['ruangan'] }} tanggal {{ $item['hari_tanggal'] }}">
                    <article class="verification-card">
                        <div class="verification-card-main">
                            <div class="room-img-placeholder" aria-hidden="true"></div>
                            <div class="verification-card-info">
                                <h3>{{ $item['ruangan'] }}</h3>
                                <p>Hari/Tanggal: {{ $item['hari_tanggal'] }}</p>
                                <p>Pukul: {{ $item['jam_mulai'] }} - {{ $item['jam_selesai'] }}</p>
                                <div class="status-row">
                                    <span>{{ $item['status_label'] }}</span>
                                    <span class="badge {{ $item['status_badge_class'] }}">{{ $item['status_text'] }}</span>
                                </div>
                            </div>
                        </div>
                        @if (!empty($item['catatan_ringkas']))
                            <div class="verification-card-footer">
                                {{ $item['catatan_ringkas'] }}
                            </div>
                        @endif
                    </article>
                </a>
            @endforeach
        </div>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
