<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentHistoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.session')->group(function () {
    Route::get('/home', [AuthController::class, 'home'])->name('home');

    Route::get('/menu_mahasiswa', [AuthController::class, 'menu_mahasiswa'])
        ->name('menu-mahasiswa');

    Route::get('/profile_mahasiswa', [AuthController::class, 'profile_mahasiswa'])
        ->name('profile_mahasiswa');

    Route::get('/list_ruangan', function () {
        return view('list_ruangan');
    })->name('list-ruangan');

    Route::get('/list_ruangan_detail', function () {
        return view('list_ruangan_detail');
    })->name('list-ruangan-detail');

    Route::get('/jadwal_ruangan', function () {
        return view('jadwal_ruangan');
    })->name('jadwal-ruangan');

    Route::get('/peminjaman_ruangan', function () {
        return view('peminjaman_ruangan');
    })->name('peminjaman-ruangan');

    Route::get('/notifikasi', function () {
        return view('notifikasi');
    })->name('notifikasi');

    Route::get('/laporan_masalah', function () {
        return view('laporan_masalah');
    })->name('laporan-masalah');

    Route::get('/riwayat_laporan', [StudentHistoryController::class, 'laporanIndex'])
        ->name('riwayat-laporan');

    Route::get('/bantuan', function () {
        return view('bantuan');
    })->name('bantuan');
});

Route::middleware(['auth.session', 'role:mahasiswa'])->group(function () {
    Route::get('/riwayat_peminjaman', [StudentHistoryController::class, 'index'])
        ->name('riwayat-peminjaman');

    Route::get('/riwayat_peminjaman/detail/{id}', [StudentHistoryController::class, 'detail'])
        ->name('riwayat-peminjaman-detail');

    Route::get('/riwayat_laporan/detail/{id}', [StudentHistoryController::class, 'laporanDetail'])
        ->name('riwayat-laporan-detail');
});
