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

Route::get('/pil_login', function () {
    return view('pil_login');
})->name('login-staff');

Route::get('/login_staff', function () {
    return view('login_staff');
})->name('login-staff-filkom');

Route::post('/login_staff', [AuthController::class, 'login_staff'])
    ->name('login_staff.process');

Route::get('/login_bem', function () {
    return view('login_bem');
})->name('login-bem');

Route::post('/login_bem', [AuthController::class, 'login_bem'])
    ->name('login_bem.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register_user', [AuthController::class, 'register_user' ])->name('register_user.process');


