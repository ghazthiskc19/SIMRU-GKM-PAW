<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get("/", function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/login_mahasiswa', function () {
    return view('login_mahasiswa');
})->name('login-mahasiswa');


Route::post('/login_mahasiswa', [AuthController::class, 'login_mahasiswa'])
    ->name('login_mahasiswa.process');

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

Route::get('/riwayat_peminjaman', function () {
    return view('riwayat_peminjaman');
})->name('riwayat-peminjaman');

Route::get('/detail_riwayat', function () {
    return view('detail_peminjaman');
})->name('detail-riwayat');

Route::get('/laporan_masalah', function () {
    return view('laporan_masalah');
})->name('laporan-masalah');

Route::get('/riwayat_laporan', function () {
    return view('riwayat_laporan');
})->name('riwayat-laporan');

Route::get('/detail_laporan', function () {
    return view('detail_laporan');
})->name('detail-laporan');

Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');


