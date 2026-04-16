@extends('layouts.app')

@section('title', 'FAQ - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/bantuan_style.css', 'resources/js/bantuan.js'])
@endpush

@section('page')
    @include('partials.header', ['id' => 2, 'judul' => 'Frequently Asked Questions', 'kembaliKe' => '/menu'])

    <div class="content faq-content">
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-question">
                    <img src="{{ asset('images/icon_tanda_tanya.svg') }}" alt="?" class="faq-icon-img">
                    <span>Apa itu SIMRU GKM?</span>
                    <img src="{{ asset('images/icon_panah_atas.svg') }}" alt="v" class="chevron-icon-img">
                </button>
                <div class="faq-answer">
                    <p>SIMRU GKM adalah Sistem Informasi Manajemen Ruangan Gedung Kuliah Bersama yang digunakan untuk mempermudah mahasiswa dalam meminjam ruangan.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <img src="{{ asset('images/icon_tanda_tanya.svg') }}" alt="?" class="faq-icon-img">
                    <span>Bagaimana alur untuk meminjam ruangan?</span>
                    <img src="{{ asset('images/icon_panah_atas.svg') }}" alt="v" class="chevron-icon-img">
                </button>
                <div class="faq-answer">
                    <p>Pilih menu Peminjaman, isi form dengan lengkap, unggah surat yang dibutuhkan, dan tunggu proses verifikasi dari pihak terkait.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <img src="{{ asset('images/icon_tanda_tanya.svg') }}" alt="?" class="faq-icon-img">
                    <span>Dokumen apa saja yang perlu saya siapkan untuk mengajukan peminjaman?</span>
                    <img src="{{ asset('images/icon_panah_atas.svg') }}" alt="v" class="chevron-icon-img">
                </button>
                <div class="faq-answer">
                    <p>Anda perlu menyiapkan Surat Peminjaman resmi berformat PDF berukuran maksimal 2MB.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <img src="{{ asset('images/icon_tanda_tanya.svg') }}" alt="?" class="faq-icon-img">
                    <span>Bagaimana saya tahu jika pengajuan peminjaman saya disetujui?</span>
                    <img src="{{ asset('images/icon_panah_atas.svg') }}" alt="v" class="chevron-icon-img">
                </button>
                <div class="faq-answer">
                    <p>Anda dapat mengecek status persetujuan secara berkala pada menu Riwayat Peminjaman.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <img src="{{ asset('images/icon_tanda_tanya.svg') }}" alt="?" class="faq-icon-img">
                    <span>Berapa lama proses verifikasi peminjaman berlangsung?</span>
                    <img src="{{ asset('images/icon_panah_atas.svg') }}" alt="v" class="chevron-icon-img">
                </button>
                <div class="faq-answer">
                    <p>Proses verifikasi biasanya memakan waktu 1 hingga 3 hari kerja setelah pengajuan disubmit.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <img src="{{ asset('images/icon_tanda_tanya.svg') }}" alt="?" class="faq-icon-img">
                    <span>Bisakah saya membatalkan pengajuan yang sudah saya kirim?</span>
                    <img src="{{ asset('images/icon_panah_atas.svg') }}" alt="v" class="chevron-icon-img">
                </button>
                <div class="faq-answer">
                    <p>Ya, pembatalan dapat dilakukan melalui menu Riwayat Peminjaman selama statusnya belum disetujui sepenuhnya.</p>
                </div>
            </div>
        </div>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection