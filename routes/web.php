<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/menu_mahasiswa', function () {
    return view('menu_mahasiswa');
});

Route::get('/profil_mahasiswa', function () {
    return view('profil_mahasiswa'); 
});

Route::get('/list_ruangan', function () {
    return view('list_ruangan');
});

Route::get('/list_ruangan_detail', function () {
    return view('list_ruangan_detail');
});

Route::get('/jadwal_ruangan', function () {
    return view('jadwal_ruangan');
})->name('jadwal-ruangan');

Route::get('/notifikasi', function () {
    return view('notifikasi');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/login_mahasiswa', function () {
    return view('login_mahasiswa');
});
