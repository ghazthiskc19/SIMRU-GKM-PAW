@extends('layouts.auth')

@section('title', 'Login Staff - Pilihan')

@push('styles')
    @vite(['resources/css/login_register_style.css'])
@endpush

@section('page')
    @include('partials.auth-decor')

    <div class="login-card">
            <h2>Login Staff</h2>
            <p class="subtitle">Pilih jenis akun yang akan digunakan</p>

            <div class="button-group" style="display:flex; flex-direction:column; gap:1rem;">
                <a href="{{ route('login-staff-filkom') }}" class="btn-login">Staff Filkom</a>
                <a href="{{ route('login-bem') }}" class="btn-login">Staff BEM</a>
            </div>
    </div>
@endsection
