@extends('layouts.app')

@section('title', 'Profil - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/profil_mahasiswa_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 1])

    <div class="content">
        <div class="profile-content">
            <div class="profile-image-wrapper">
                <img src="{{ asset($user['foto'] ?? 'images/default-profile.png') }}" alt="Foto Profil Lampu Kaka" class="profile-img">
            </div>

            <div class="profile-form">
                <div class="form-group">
                    <span class="form-label">Nama</span>
                    <div class="form-input-box">{{ $user['nama'] }}</div>
                </div>

                <div class="form-group">
                    <span class="form-label">NIM</span>
                    <div class="form-input-box">{{ $user['nim'] }}</div>
                </div>

                <div class="form-group">
                    <span class="form-label">Program Studi</span>
                    <div class="form-input-box">{{ $user['prodi'] }}</div>
                </div>

                <div class="logout-btn-container">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('partials.bottom-nav', ['active' => 'profil'])
@endsection