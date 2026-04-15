@extends('layouts.app')

@section('title', 'Home - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/home_style.css', 'resources/js/home_calendar.js'])
@endpush

@section('page')
    @include('partials.header', ['id' => 1])

    <div class="content home-content">
        <section class="calendar-panel">
            <div class="calendar-panel-header">
                <div class="calendar-title-wrap">
                    <h2 class="calendar-title">Kalender</h2>
                </div>
                <button class="calendar-action" type="button" aria-label="Kalender">
                    <img src="{{ asset('images/icon_jadwal.svg') }}" alt="Kalender">
                </button>
            </div>

            <div id="home-calendar" class="home-calendar"></div>
        </section>

        @php
            $fullName = auth()->user()->name ?? 'Mahasiswa';
            $nickname = explode(' ', trim($fullName))[0] ?: 'Mahasiswa';
            $lastBorrowedRoom = 'GKM 4.1';
        @endphp

        <section class="activity-section" aria-label="Aktivitas terakhir">
            <h2 class="activity-greeting">Hi, {{ $nickname }}</h2>
            <p class="activity-caption">aktivitas terakhir.</p>

            <article class="activity-card" aria-label="Ruangan terakhir dipinjam">
                <div class="activity-room-thumbnail" aria-hidden="true"></div>
                <div class="activity-card-content">
                    <h3>{{ $lastBorrowedRoom }}</h3>
                    <a href="#" class="activity-link">Pinjam Lagi</a>
                </div>
            </article>
        </section>
    </div>

    @include('partials.bottom-nav', ['active' => 'home'])
@endsection
