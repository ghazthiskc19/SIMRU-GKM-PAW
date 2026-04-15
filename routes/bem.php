<?php

use App\Http\Controllers\BemVerificationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.session', 'role:bem'])->group(function () {
    Route::get('/riwayat_verifikasi', [BemVerificationController::class, 'index'])
        ->name('riwayat-verifikasi');

    Route::get('/riwayat_verifikasi/detail/{id}', [BemVerificationController::class, 'detail'])
        ->name('riwayat-verifikasi-detail');
});
