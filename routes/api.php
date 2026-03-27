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


Route::prefix('v1')->group(function () {
    Route::apiResource('kategori-aset', KategoriAsetController::class)->names([
        'index' => 'api.kategori-aset.index',
        'store' => 'api.kategori-aset.store',
        'show' => 'api.kategori-aset.show',
        'update' => 'api.kategori-aset.update',
        'destroy' => 'api.kategori-aset.destroy',
    ]);
    Route::apiResource('lokasi', LokasiController::class)->names([
        'index' => 'api.lokasi.index',
        'store' => 'api.lokasi.store',
        'show' => 'api.lokasi.show',
        'update' => 'api.lokasi.update',
        'destroy' => 'api.lokasi.destroy',
    ]);
    Route::apiResource('aset', AsetController::class)->names([
        'index' => 'api.aset.index',
        'store' => 'api.aset.store',
        'show' => 'api.aset.show',
        'update' => 'api.aset.update',
        'destroy' => 'api.aset.destroy',
    ]);
    Route::apiResource('mutasi_aset', MutasiAsetController::class)->names([
        'index' => 'api.mutasi_aset.index',
        'store' => 'api.mutasi_aset.store',
        'show' => 'api.mutasi_aset.show',
        'update' => 'api.mutasi_aset.update',
        'destroy' => 'api.mutasi_aset.destroy',
    ]);
});

