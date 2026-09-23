<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SpkController;

// 1. Autentikasi
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 2. Rute Khusus Admin (Dikelola oleh AdminController & SpkController)
Route::middleware(['web'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Kelola Kriteria & Bobot
    Route::get('/admin/kriteria', [AdminController::class, 'kriteriaIndex'])->name('admin.kriteria.index');
    Route::post('/admin/kriteria/update', [AdminController::class, 'kriteriaUpdate'])->name('admin.kriteria.update');
    
    // Kelola Alternatif Ikan
    Route::get('/admin/alternatif', [AdminController::class, 'alternatifIndex'])->name('admin.alternatif.index');
    Route::post('/admin/alternatif/store', [AdminController::class, 'alternatifStore'])->name('admin.alternatif.store');
    Route::delete('/admin/alternatif/{id}', [AdminController::class, 'alternatifDestroy'])->name('admin.alternatif.destroy');
    
    // Manajemen Akun Pegawai
    Route::get('/admin/pegawai', [AdminController::class, 'pegawaiIndex'])->name('admin.pegawai.index');
    Route::post('/admin/pegawai', [AdminController::class, 'pegawaiStore'])->name('admin.pegawai.store');

    // Perhitungan & Laporan SAW
    Route::get('/admin/spk/perhitungan', [SpkController::class, 'hitungSAW'])->name('admin.spk.hitung');
    Route::get('/admin/spk/cetak-pdf', [SpkController::class, 'cetakPdf'])->name('admin.spk.pdf');
});

// 3. Rute Khusus Pegawai (Dikelola oleh PegawaiController)
Route::middleware(['web'])->group(function () {
    Route::get('/pegawai/dashboard', [PegawaiController::class, 'dashboard'])->name('pegawai.dashboard');
    
    // Input Nilai Lapangan
    Route::get('/pegawai/penilaian', [PegawaiController::class, 'penilaianIndex'])->name('pegawai.penilaian.index');
    Route::post('/pegawai/penilaian', [PegawaiController::class, 'penilaianStore'])->name('pegawai.penilaian.store');
    
    // Lihat Hasil SPK (Read-Only)
    Route::get('/pegawai/spk/hasil', [SpkController::class, 'hitungSAW'])->name('pegawai.spk.hasil');
});
