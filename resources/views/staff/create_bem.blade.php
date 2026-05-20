@extends('layouts.app')

@section('title', 'Tambah Akun BEM')

@push('styles')
    @vite(['resources/css/laporan_masalah_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Tambah Akun BEM', 'kembaliKe' => '/menu'])

    <div class="content form-content">
        <form id="form-tambah-bem" action="{{ route('staff.bem.store') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="nim">NIM</label>
                <input id="nim" name="nim" type="text" class="form-control" value="{{ old('nim') }}" required>
            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <div class="room-selector-container">
                    <select id="prodi" name="prodi" class="room-select" required>
                        <option value="" disabled selected>Pilih Program Studi</option>
                        <option value="Teknik Persawitan" {{ old('prodi') === 'Teknik Persawitan' ? 'selected' : '' }}>Teknik Persawitan</option>
                        <option value="Teknik Perhutanan" {{ old('prodi') === 'Teknik Perhutanan' ? 'selected' : '' }}>Teknik Perhutanan</option>
                    </select>
                    <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </div>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <div class="room-selector-container">
                    <select id="jabatan" name="jabatan" class="room-select" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="Ketua BEM" {{ old('jabatan') === 'Ketua BEM' ? 'selected' : '' }}>Ketua BEM</option>
                        <option value="Wakil BEM" {{ old('jabatan') === 'Wakil BEM' ? 'selected' : '' }}>Wakil BEM</option>
                        <option value="Anggota BEM" {{ old('jabatan') === 'Anggota BEM' ? 'selected' : '' }}>Anggota BEM</option>
                    </select>
                    <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">Buat Akun</button>
            </div>
        </form>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
