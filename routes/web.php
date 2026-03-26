<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAsetController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\MutasiAsetController;
use App\Http\Controllers\LaporanController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/', fn() => redirect()->route('dashboard.index'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('kategori-aset', KategoriAsetController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('aset', AsetController::class);
    Route::resource('mutasi_aset', MutasiAsetController::class);

    // Laporan routes
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('index');
        Route::get('/kategori-aset', [LaporanController::class, 'kategoriAset'])->name('kategori-aset');
        Route::get('/lokasi-aset', [LaporanController::class, 'lokasiAset'])->name('lokasi-aset');
        Route::get('/aset', [LaporanController::class, 'aset'])->name('aset');
        Route::get('/mutasi-aset', [LaporanController::class, 'mutasiAset'])->name('mutasi-aset');
        Route::get('/export/kategori-aset', [LaporanController::class, 'exportKategoriAset'])->name('export-kategori-aset');
        Route::get('/export/lokasi-aset', [LaporanController::class, 'exportLokasiAset'])->name('export-lokasi-aset');
        Route::get('/export/aset', [LaporanController::class, 'exportAset'])->name('export-aset');
        Route::get('/export/mutasi-aset', [LaporanController::class, 'exportMutasiAset'])->name('export-mutasi-aset');
    });

    // Admin only
    Route::middleware('role:admin')->group(function () {
        Route::resource('user', UserController::class)->except(['show']);
    });
});
