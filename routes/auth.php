<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login_mahasiswa', function () {
    return view('login_user');
})->name('login-user');

Route::get('/register_user', function () {
    return view('register_user');
})->name('register');

Route::post('/login_mahasiswa', [AuthController::class, 'login_mahasiswa'])
    ->name('login_mahasiswa.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


