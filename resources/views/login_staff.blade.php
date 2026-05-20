@extends('layouts.auth')

@section('lang', 'en')
@section('title', 'Login Staff')

@push('styles')
    @vite(['resources/css/login_register_style.css'])
@endpush

@section('page')
    @include('partials.auth-decor')

    <div class="login-card">
            <h2>Login Staff Filkom</h2>
            <p class="subtitle">Masuk menggunakan akun staff FILKOM</p>
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

            <form action="{{ route('login_staff.process') }}" method="POST">
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
    </div>
@endsection
