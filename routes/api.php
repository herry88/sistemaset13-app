<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KategoriAsetController;
use App\Http\Controllers\Api\LokasiController;
use App\Http\Controllers\Api\AsetController;
use App\Http\Controllers\Api\MutasiAsetController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('kategori-aset', KategoriAsetController::class);
Route::apiResource('lokasi', LokasiController::class);
Route::apiResource('aset', AsetController::class);
Route::apiResource('mutasi_aset', MutasiAsetController::class);
