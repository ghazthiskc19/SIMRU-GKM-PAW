@extends('layouts.app')

@section('title', 'Tambah Akun BEM')

@push('styles')
    @vite(['resources/css/laporan_masalah_style.css'])
    @vite(['resources/js/list_ruangan.js'])
@endpush

@section('page')
    @php
        $isEdit = isset($bem) && $bem;
    @endphp

    @include('partials.header', ['id' => 2, 'judul' => $isEdit ? 'Edit Akun BEM' : 'Tambah Akun BEM', 'kembaliKe' => '/staff/bem'])

    <div class="content form-content">
        <form id="form-tambah-bem" action="{{ $isEdit ? route('staff.bem.update', ['id' => $bem->id_bem]) : route('staff.bem.store') }}" method="POST" enctype="multipart/form-data" data-confirm-submit="{{ $isEdit ? 'Yakin ingin memperbarui akun BEM ini?' : 'Yakin ingin membuat akun BEM baru?' }}">
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

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
                <input id="nim" name="nim" type="text" class="form-control" value="{{ old('nim', $bem?->nim) }}" required>
            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $bem?->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $bem?->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" {{ $isEdit ? '' : 'required' }}>
                @if($isEdit)
                    <small style="display:block; margin-top:8px; opacity:.8;">Kosongkan jika password tidak ingin diubah.</small>
                @endif
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <div class="room-selector-container">
                    <select id="prodi" name="prodi" class="room-select" required>
                        <option value="" disabled {{ old('prodi', $bem?->prodi) ? '' : 'selected' }}>Pilih Program Studi</option>
                        <option value="Teknik Persawitan" {{ old('prodi', $bem?->prodi) === 'Teknik Persawitan' ? 'selected' : '' }}>Teknik Persawitan</option>
                        <option value="Teknik Perhutanan" {{ old('prodi', $bem?->prodi) === 'Teknik Perhutanan' ? 'selected' : '' }}>Teknik Perhutanan</option>
                    </select>
                    <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </div>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <div class="room-selector-container">
                    <select id="jabatan" name="jabatan" class="room-select" required>
                        <option value="" disabled {{ old('jabatan', $bem?->jabatan) ? '' : 'selected' }}>Pilih Jabatan</option>
                        <option value="Ketua BEM" {{ old('jabatan', $bem?->jabatan) === 'Ketua BEM' ? 'selected' : '' }}>Ketua BEM</option>
                        <option value="Wakil BEM" {{ old('jabatan', $bem?->jabatan) === 'Wakil BEM' ? 'selected' : '' }}>Wakil BEM</option>
                        <option value="Anggota BEM" {{ old('jabatan', $bem?->jabatan) === 'Anggota BEM' ? 'selected' : '' }}>Anggota BEM</option>
                    </select>
                    <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </div>
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input id="foto" name="foto" type="file" class="form-control" accept="image/*">
                @if($isEdit && $bem?->foto)
                    <small style="display:block; margin-top:8px; opacity:.8;">Foto saat ini: {{ $bem->foto }}</small>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">{{ $isEdit ? 'Update Akun' : 'Buat Akun' }}</button>
            </div>
        </form>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
