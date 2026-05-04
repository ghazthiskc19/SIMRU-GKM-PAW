<?php

use App\Http\Controllers\BemVerificationController;
use App\Http\Controllers\StudentHistoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.session', 'role:bem'])->group(function () {
    Route::get('/verifikasi_peminjaman', [StudentHistoryController::class, 'verifikasiPeminjaman'])
        ->name('verifikasi-peminjaman');

    Route::get('/verifikasi_peminjaman/detail/{id}', [StudentHistoryController::class, 'verifikasiPeminjamanDetail'])
        ->name('verifikasi-peminjaman-detail');

    Route::post('/verifikasi_peminjaman/{id}/update-status', [StudentHistoryController::class, 'updatePeminjamanStatus'])
        ->name('peminjaman-update-status');

    Route::get('/riwayat_verifikasi', [BemVerificationController::class, 'index'])
        ->name('riwayat-verifikasi');

    Route::get('/riwayat_verifikasi/detail/{id}', [BemVerificationController::class, 'detail'])
        ->name('riwayat-verifikasi-detail');
});
