<?php

use App\Http\Controllers\kategoriCtrl;
use App\Http\Controllers\KondisiCtrl;
use App\Http\Controllers\LokasiCtrl;
use App\Http\Controllers\RoleCtrl;
use App\Http\Controllers\StatusCtrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inventarisCtrl;
use App\Http\Controllers\pengajuanCtrl;
use App\Http\Controllers\riwayatCtrl;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;

Route::middleware('api')->group(function () {
    // Inventaris
    Route::get('/inventaris', [inventarisCtrl::class, 'index']);
    Route::get('/inventaris/{id}', [inventarisCtrl::class, 'show']);
    Route::post('/inventaris', [inventarisCtrl::class, 'store']);
    Route::put('/inventaris/{id}', [inventarisCtrl::class, 'updateFull']);
    Route::patch('/inventaris/{id}', [inventarisCtrl::class, 'updatePatch']);
    Route::delete('/inventaris/{id}', [inventarisCtrl::class, 'destroy']);

    // Pengajuan
    Route::get('/pengajuan', [pengajuanCtrl::class, 'index']);
    Route::get('/pengajuan/{id}', [pengajuanCtrl::class, 'show']);
    Route::post('/pengajuan', [pengajuanCtrl::class, 'store']);
    Route::post('/pengajuan/proses/{id}', [pengajuanCtrl::class, 'proses']);
    Route::delete('/pengajuan/{id}', [pengajuanCtrl::class, 'destroy']);

    // Riwayat
    Route::get('/riwayat', [riwayatCtrl::class, 'index']);
    Route::get('/riwayat/{id}', [riwayatCtrl::class, 'show']);
    Route::delete('/riwayat/{id}', [riwayatCtrl::class, 'destroy']);

    // Master Data
    Route::apiResource('kategori', kategoriCtrl::class);
    Route::apiResource('lokasi', lokasiCtrl::class);
    Route::apiResource('kondisi', kondisiCtrl::class);
    Route::apiResource('role', roleCtrl::class);
    Route::apiResource('status', statusCtrl::class);
});
