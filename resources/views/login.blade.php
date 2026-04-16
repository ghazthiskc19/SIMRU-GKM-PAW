@extends('layouts.auth')

@section('title', 'Login - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/login_page_style.css'])
@endpush

@section('page')
    @include('partials.auth-decor')

    <div class="login-content">
            
            <img src="{{ asset('images/logo_filkom.svg') }}" alt="FILKOM UB" class="logo-filkom">
            
            <img src="{{ asset('images/icon_logo.svg') }}" alt="GKM Icon" class="main-icon">
            
            <h1 class="app-title">Peminjaman Ruangan GKM</h1>

            <div class="button-group">
                <a href="{{ route('login-user') }}" class="btn-login">Login Admin</a>
                <a href="{{ route('login-user') }}" class="btn-login">Login As Student</a>
            </div>

    </div>
@endsection