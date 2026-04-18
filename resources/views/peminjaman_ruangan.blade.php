@extends('layouts.app')

@section('title', 'Peminjaman Ruangan - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/peminjaman_ruangan_style.css'])
@endpush

@push('scripts')
    <script>
        window.room = @json($ruangan);
        window.allRooms = @json($data);
    </script>
    @vite(['resources/js/peminjaman_ruangan.js'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Peminjaman Ruangan', 'kembaliKe' => '/menu'])

    <div class="peminjaman-ruangan-container" data-ruangan-id="{{ request('ruangan', 1) }}">
        <div class="room-selector-container">
            <label for="room-select">Pilih Ruangan:</label>
            <select id="room-select" class="room-select">
                @foreach($data as $room)
                    <option value="{{ $room['id_ruangan'] }}" {{ $room['id_ruangan'] == request('ruangan', 1) ? 'selected' : '' }}>
                        {{ $room['nama_ruangan'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="list-ruangan-detail-status">
            <div class="nama-ruangan-container">
                <h3 class="ruangan-name" id="detail-room-name-chip">{{ $ruangan['nama_ruangan'] }}</h3>
            </div>
            <div class="status-ruangan-container">
                <h3 class="status-ruangan" id="detail-room-status">{{ $ruangan['status'] }}</h3>
            </div>
        </div>

        <div class="list-ruangan-detail-hero">
            <button class="arrow-hero arrow-left-hero" type="button" aria-label="Gambar sebelumnya">❮</button>
            <div class="hero-image-container">
                <img src="{{ asset('images/hero_ruangan.png') }}" alt="Foto Ruangan" class="hero-image" id="detail-hero-image">
            </div>
            <button class="arrow-hero arrow-right-hero" type="button" aria-label="Gambar berikutnya">❯</button>
        </div>

        <div class="hero-dots" id="hero-dots" aria-label="Indikator gambar"></div>

        <form   class="peminjaman-form"
                id="peminjaman-form"
                novalidate
                action="{{ route('peminjaman-ruangan.process') }}"
                method="post"
                enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="ruangan_id" id="ruangan-id-input" value="{{ request('ruangan', 1) }}">

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Isi Dengan Benar" required>
            </div>

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" placeholder="Isi Dengan Benar" required>
            </div>

            <div class="form-group">
                <label for="program_studi">Program Studi</label>
                <input type="text" id="program_studi" name="program_studi" placeholder="Isi Dengan Benar" required>
            </div>

            <div class="form-group">
                <label>Tanggal Pemakaian</label>
                <div class="split-row">
                    <input type="date" id="tanggal_pemakaian" name="tanggal_pemakaian" required>
                    <div class="split-time">
                        <label class="split-time-label label-start">Jam Mulai</label>
                        <input type="time" id="jam_mulai" name="jam_mulai" aria-label="Jam mulai" required>
                        <label class="split-time-label label-end">Jam Selesai</label>
                        <input type="time" id="jam_selesai" name="jam_selesai" aria-label="Jam selesai" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="alasan_peminjaman">Alasan Peminjaman</label>
                <textarea id="alasan_peminjaman" name="alasan_peminjaman" placeholder="Isi Dengan Benar" required></textarea>
            </div>

            <div class="form-group">
                <label for="sarana_prasarana">Sarana dan Prasarana yang Dipinjam</label>
                <textarea id="sarana_prasarana" name="sarana_prasarana" placeholder="Tuliskan dalam bentuk paragraf" required></textarea>
            </div>

            <div class="form-group">
                <label for="alat_tambahan">Peminjaman Alat Tambahan (Opsional)</label>
                <input type="text" id="alat_tambahan" name="alat_tambahan" placeholder="Isi Dengan Benar">
            </div>

            <div class="form-group upload-group">
                <label for="dokumen">Unggah Dokumen</label>
                <input type="file" id="dokumen" name="dokumen[]" accept="application/pdf,.pdf" multiple>
                <small class="upload-hint">Format hanya PDF, maksimal 2MB per file.</small>
                <div class="upload-feedback" id="upload-feedback" aria-live="polite">Belum ada file diunggah.</div>
                <ul class="upload-file-list" id="upload-file-list"></ul>
            </div>
        </form>
    </div>

    @include('partials.footer-submit', ['teks' => 'Submit', 'formId' => 'peminjaman-form'])
@endsection
