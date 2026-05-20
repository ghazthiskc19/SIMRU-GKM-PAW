<?php

use App\Http\Controllers\BemVerificationController;
use App\Http\Controllers\StudentHistoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.session', 'role:bem,administrasi,staff_filkom'])->group(function () {
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

    // Staff-only: Verifikasi Laporan Masalah (restrict further to staff roles)
    Route::middleware(['role:administrasi,staff_filkom'])->group(function () {
        Route::get('/verifikasi_laporan', [\App\Http\Controllers\StudentHistoryController::class, 'verifikasiLaporan'])
            ->name('verifikasi-laporan');

        Route::get('/verifikasi_laporan/detail/{id}', [\App\Http\Controllers\StudentHistoryController::class, 'verifikasiLaporanDetail'])
            ->name('verifikasi-laporan-detail');

        Route::post('/verifikasi_laporan/{id}/complete', [\App\Http\Controllers\StudentHistoryController::class, 'completeLaporan'])
            ->name('laporan-complete');
        
        // Staff-only: Generate peminjaman report PDF
        Route::get('/laporan/generate', [\App\Http\Controllers\StudentHistoryController::class, 'generatePeminjamanPdf'])
            ->name('laporan-generate');
    });
});
