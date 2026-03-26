<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAsetController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\UserController;

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

    // Admin only
    Route::middleware('role:admin')->group(function () {
        Route::resource('user', UserController::class)->except(['show']);
    });
});
