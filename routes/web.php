<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAsetController;
use App\Http\Controllers\LokasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('kategori-aset', KategoriAsetController::class);
Route::resource('lokasi', LokasiController::class);
