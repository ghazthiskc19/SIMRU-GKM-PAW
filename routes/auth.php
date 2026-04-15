<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/login_mahasiswa', function () {
    return view('login_mahasiswa');
})->name('login-mahasiswa');

Route::post('/login_mahasiswa', [AuthController::class, 'login_mahasiswa'])
    ->name('login_mahasiswa.process');
