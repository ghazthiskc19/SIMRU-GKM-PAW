@extends('layouts.app')

@section('title', 'Profil - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/profil_mahasiswa_style.css'])
@endpush

@section('page')
    @php
        $user = auth()->user();
    @endphp

    @include('partials.header', ['id' => 1])

    <div class="content">
        <div class="profile-content">
            <div class="profile-image-wrapper">
                <img src="
                {{ 
                    $user && $user->foto
                        ? (str_starts_with($user->foto, 'foto_users')
                            ? asset('storage/' . $user->foto)
                            : asset($user->foto))
                        : asset('images/default-profile.png')
                }}
                " class="profile-img">
            </div>

            <div class="profile-form">
                <div class="form-group">
                    <span class="form-label">Nama</span>
                    <div class="form-input-box">{{ $user?->name }}</div>
                </div>

                @php
                    $role = $user?->role ?? null;
                @endphp

                @if (in_array($role, ['administrasi','staff_filkom']))
                    <div class="form-group">
                        <span class="form-label">NIP</span>
                        <div class="form-input-box">{{ $user?->nip }}</div>
                    </div>

                    <div class="form-group">
                        <span class="form-label">Jabatan</span>
                        <div class="form-input-box">Staff FILKOM</div>
                    </div>
                @else
                    <div class="form-group">
                        <span class="form-label">NIM</span>
                        <div class="form-input-box">{{ $user?->nim }}</div>
                    </div>

                    <div class="form-group">
                        <span class="form-label">Program Studi</span>
                        <div class="form-input-box">{{ $user?->prodi }}</div>
                    </div>
                @endif

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