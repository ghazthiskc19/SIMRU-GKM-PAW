@extends('layouts.app')

@section('title', 'Tambah Ruangan')

@push('styles')
	@vite(['resources/css/laporan_masalah_style.css'])
	@vite(['resources/js/list_ruangan.js'])
@endpush

@section('page')
	@php
		$isEdit = isset($ruangan) && $ruangan;
	@endphp

	@include('partials.header', ['id' => 2, 'judul' => $isEdit ? 'Edit Ruangan' : 'Tambah Ruangan', 'kembaliKe' => '/staff/ruangan'])

	<div class="content form-content">
		<form id="form-tambah-ruangan" action="{{ $isEdit ? route('staff.ruangan.update', ['id' => $ruangan->id_ruangan]) : route('staff.ruangan.store') }}" method="POST" enctype="multipart/form-data" data-confirm-submit="{{ $isEdit ? 'Yakin ingin memperbarui data ruangan ini?' : 'Yakin ingin menyimpan data ruangan baru?' }}">
			@csrf
			@if($isEdit)
				@method('PUT')
			@endif
			<div class="form-group">
				<label for="nama_ruangan">Nama Ruangan</label>
				<input id="nama_ruangan" name="nama_ruangan" type="text" class="form-control" value="{{ old('nama_ruangan', $ruangan?->nama_ruangan) }}" required>
			</div>

			<div class="form-group">
				<label for="status_ruangan">Status Ruangan</label>
				<div class="room-selector-container">
					<select id="status_ruangan" name="status_ruangan" class="room-select" required>
						<option value="" {{ old('status_ruangan', $ruangan?->status_ruangan) ? '' : 'selected' }} disabled>Pilih Status Ruangan</option>
						<option value="Tersedia" {{ old('status_ruangan', $ruangan?->status_ruangan) === 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
						<option value="Tidak Tersedia" {{ old('status_ruangan', $ruangan?->status_ruangan) === 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
						<option value="Maintenance" {{ old('status_ruangan', $ruangan?->status_ruangan) === 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
					</select>
					<svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
				</div>
			</div>

			<div class="form-group">
				<label for="kapasitas">Kapasitas</label>
				<input id="kapasitas" name="kapasitas" type="text" class="form-control" value="{{ old('kapasitas', $ruangan?->kapasitas) }}" placeholder="Contoh: 80 Orang" required>
			</div>

			<div class="form-group">
				<label for="lokasi">Lokasi</label>
				<textarea id="lokasi" name="lokasi" class="form-control" rows="3" required>{{ old('lokasi', $ruangan?->lokasi) }}</textarea>
			</div>

			<div class="form-group">
				<label for="fasilitas">Fasilitas</label>
				<textarea id="fasilitas" name="fasilitas" class="form-control" rows="4" placeholder="Pisahkan dengan koma" required>{{ old('fasilitas', $ruangan?->fasilitas) }}</textarea>
			</div>

			<div class="form-group">
				<label for="path_images">Gambar Ruangan</label>
				<input id="path_images" name="path_images[]" type="file" class="form-control" accept="image/*" multiple>
				<small style="display:block; margin-top:8px; opacity:.8;">
					Opsional. Bisa pilih lebih dari satu gambar. Nantinya disimpan sebagai path, bukan image langsung.
				</small>
			</div>

			<div class="form-group">
				<button type="submit" class="btn-submit">{{ $isEdit ? 'Update Ruangan' : 'Simpan Ruangan' }}</button>
			</div>
		</form>
	</div>

	@include('partials.bottom-nav', ['active' => 'menu'])
@endsection
