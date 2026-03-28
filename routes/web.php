<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('menu_mahasiswa');
});

Route::get('/profil_mahasiswa', function () {
    return view('profil_mahasiswa'); 
});
