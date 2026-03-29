<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return view('menu_mahasiswa');
});

Route::get('/profil_mahasiswa', function () {
    return view('profil_mahasiswa'); 
});

Route::get('/list_ruangan', function () {
    return view('list_ruangan');
});
