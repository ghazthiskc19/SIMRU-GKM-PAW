<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentHistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\StaffAccountController;


Route::middleware('auth.session')->group(function () {
    Route::get('/home', [AuthController::class, 'home'])->name('home');

    Route::get('/menu', [AuthController::class, 'menu'])
        ->name('menu');

    Route::get('/profile', [AuthController::class, 'profile'])
        ->name('profile');

    Route::get('/list_ruangan', [RuanganController::class, 'dataListRuangan'])->name('list-ruangan');

    Route::get('/list_ruangan_detail/{id}', [RuanganController::class, 'detailRuangan'])
    ->name('list-ruangan-detail');

    Route::get('/list_ruangan_detail/staff', [RuanganController::class, 'detailRuanganStaff'])
    ->name('list-ruangan-detail-staff');

    Route::get('/jadwal_ruangan', function () {
        return view('jadwal_ruangan');
    })->name('jadwal-ruangan');
    
    Route::get('/peminjaman_ruangan', [RuanganController::class, 'peminjaman']) ->name('peminjaman-ruangan');

    Route::post('peminjaman_ruangan', [PeminjamanController::class, 'peminjaman']) ->name('peminjaman-ruangan.process');
    Route::get('/api/jadwal', [RuanganController::class, 'getJadwal']);
    
    Route::get('/notifikasi', function () {
        return view('notifikasi');
    })->name('notifikasi');

    Route::get('/laporan_masalah', [StudentHistoryController::class, 'laporanForm'])
        ->name('laporan-masalah');

    Route::post('/laporan_masalah', [StudentHistoryController::class, 'storeLaporan'])
        ->name('laporan-masalah.store');

    Route::get('/riwayat_laporan', [StudentHistoryController::class, 'laporanIndex'])
        ->name('riwayat-laporan');

    Route::get('/bantuan', function () {
        return view('bantuan');
    })->name('bantuan');

    Route::get('/staff/ruangan', [RuanganController::class, 'dataListRuangan'])->name('staff.ruangan.index');
});

Route::middleware(['auth.session', 'role:mahasiswa'])->group(function () {
    Route::get('/riwayat_peminjaman', [StudentHistoryController::class, 'index'])
        ->name('riwayat-peminjaman');

    Route::get('/riwayat_peminjaman/detail/{id}', [StudentHistoryController::class, 'detail'])
        ->name('riwayat-peminjaman-detail');
});

Route::middleware(['auth.session', 'role:mahasiswa,bem'])->group(function () {
    Route::get('/riwayat_laporan/detail/{id}', [StudentHistoryController::class, 'laporanDetail'])
        ->name('riwayat-laporan-detail');
});

Route::middleware(['auth.session', 'role:administrasi'])->group(function () {
    Route::get('/staff/bem', [StaffAccountController::class, 'manageBem'])
        ->name('staff.bem.index');

    Route::get('/staff/bem/create', [StaffAccountController::class, 'createBem'])
        ->name('staff.bem.create');

    Route::post('/staff/bem', [StaffAccountController::class, 'storeBem'])
        ->name('staff.bem.store');

    Route::get('/staff/bem/{id}/edit', [StaffAccountController::class, 'editBem'])
        ->name('staff.bem.edit');

    Route::put('/staff/bem/{id}', [StaffAccountController::class, 'updateBem'])
        ->name('staff.bem.update');

    Route::delete('/staff/bem/{id}', [StaffAccountController::class, 'destroyBem'])
        ->name('staff.bem.destroy');

    Route::get('/staff/ruangan/create', [RuanganController::class, 'createStaffRuangan'])
        ->name('staff.ruangan.create');

    Route::post('/staff/ruangan', [RuanganController::class, 'storeStaffRuangan'])
        ->name('staff.ruangan.store');

    Route::get('staff/edit_ruangan/{id}', [RuanganController::class, 'redirectStaff'])
        ->name("staff.ruangan.edit-ruangan");

    Route::put('staff/edit_ruangan/{id}', [RuanganController::class, 'updateStaffRuangan'])
        ->name('staff.ruangan.update');

    Route::get('/staff/hapus_ruangan/{id}', [RuanganController::class,  'deleteRuanganStaff'])
        ->name('staff.ruangan.delete');
});
