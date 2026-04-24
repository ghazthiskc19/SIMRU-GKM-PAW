@extends('layouts.app')

@section('lang', 'id')
@section('title', 'Daftar Akun Baru')

@push('styles')
    @vite(['resources/css/login_register_style.css'])
    
    <style>
        .login-card {
            padding: 25px 30px;
            max-height: 90%;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .login-card::-webkit-scrollbar {
            display: none;
        }
        .form-group {
            margin-bottom: 15px;
        }

        select {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #e0e5f2;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            color: #333;
            background-color: #f9fbfd;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%232b3582' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 15px;
        }
        select:focus {
            border-color: #f69240;
        }
    </style>
@endpush

@section('page')
    @include('partials.auth-decor')

    <div class="login-card">
        <h2>Create Account</h2>
        <p class="subtitle">Lengkapi data untuk mendaftar</p>
        
        <form action="#" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="bem">Staff Adkeu BEM</option>
                    <option value="staff_filkom">Staff Filkom</option>
                    <option value="penjaga_gkm">Penjaga GKM</option>
                </select>
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <select id="prodi" name="prodi" required>
                    <option value="" disabled selected>Pilih Program Studi</option>
                    <option value="Teknik Persawitan">Teknik Persawitan</option>
                    <option value="Teknik Perhutanan">Teknik Perhutanan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@mail.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="********" required>
            </div>
            
            <button type="submit" class="btn-login">Daftar Akun</button>
        </form>

        <div class="register-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>
@endsection