<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/login_mahasiswa', function () {
    return view('login_mahasiswa');
})->name('login-mahasiswa');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/menu_mahasiswa', function () {
    return view('menu_mahasiswa');
})->name('menu-mahasiswa');

Route::get('/profil_mahasiswa', function () {
    return view('profil_mahasiswa');
});

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
});

Route::get('/riwayat_peminjaman', function () {
    return view('riwayat_peminjaman');
})->name('riwayat-peminjaman');

Route::get('/detail_riwayat', function () {
    return view('detail_peminjaman');
})->name('detail-peminjaman');

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


