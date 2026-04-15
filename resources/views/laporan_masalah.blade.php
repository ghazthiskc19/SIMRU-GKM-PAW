@extends('layouts.app')

@section('title', 'Form Laporan Masalah - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/laporan_masalah_style.css'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Form Laporan Masalah', 'kembaliKe' => '/menu_mahasiswa'])

    <div class="content form-content">
        <div class="room-selector-container">
            <select class="room-select">
                <option value="gkm4.1">GKM 4.1</option>
                <option value="gkm4.2">GKM 4.2</option>
                <option value="gkm3.1">GKM 3.1</option>
            </select>
            <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
        </div>

        <form id="form-laporan" action="#" method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" placeholder="Isi Dengan Benar" class="form-control" required>
            </div>

            <div class="form-group">
                <label>NIM</label>
                <input type="text" placeholder="Isi Dengan Benar" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" placeholder="Isi Dengan Benar" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tanggal Pemakaian</label>
                <div class="split-input">
                    <input type="date" class="form-control" required>
                    <input type="time" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label>Laporan Permasalahan</label>
                <textarea placeholder="Isi Dengan Benar" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group upload-group">
                <label for="dokumen">Dokumen Tambahan (Foto Bukti)</label>
                <input type="file" id="dokumen" name="dokumen[]" accept="image/png, image/jpeg, image/jpg" multiple required>
                <small class="upload-hint">Format hanya gambar (JPG/PNG), maksimal 2MB per file.</small>
            </div>
        </form>
    </div>

    @include('partials.footer-submit', ['teks' => 'Submit'])
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-laporan');
            const btnSubmit = document.querySelector('.btn-submit');

            btnSubmit.addEventListener('click', function(e) {
                e.preventDefault();

                if (!form.checkValidity()) {
                    alert('Form tidak boleh kosong. Mohon isi semua data dengan benar.');
                    form.reportValidity();
                } else {
                    alert('Berhasil! Laporan masalah Anda telah terkirim dan sedang ditinjau.');
                    window.location.href = "{{ route('riwayat-laporan') }}";
                }
            });
        });
    </script>
@endpush