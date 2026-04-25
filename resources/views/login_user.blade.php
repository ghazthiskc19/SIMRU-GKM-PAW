@extends('layouts.auth')

@section('lang', 'en')
@section('title', 'Login Mahasiswa')

@push('styles')
    @vite(['resources/css/login_register_style.css'])
@endpush

@section('page')
    @include('partials.auth-decor')

    <div class="login-card">
            <h2>Welcome back!</h2>
            <p class="subtitle">Login to your  account</p>
            @if(session('error'))
                <div style="
                    background-color:#ffdddd;
                    color:#a94442;
                    padding:10px;
                    border-radius:5px;
                    margin-bottom:10px;
                    text-align:center;
                ">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login_mahasiswa.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                
                <button type="submit" class="btn-login">Login</button>
                
            </form>

            <div class="forgot-password">
                <a href="">Lupa password</a>
            </div>

            <div class="register-link">
                Don't have account? <a href="{{ route('register') }}">Daftar Akun Baru</a>
            </div>

    </div>
@endsection