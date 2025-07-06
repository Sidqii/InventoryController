<?php

use App\Http\Controllers\ctrl_barang;
use App\Http\Controllers\ctrl_login;
use App\Http\Controllers\ctrl_pengajuan;
use App\Http\Controllers\ctrl_persetujuan;
use App\Http\Controllers\ctrl_unitbarang;

Route::middleware('api')->group(function () {
    //Login
    Route::apiResource('login', ctrl_login::class);

    //barang API
    Route::apiResource('barang', ctrl_barang::class);
    Route::patch('barang/{id}/6902', [ctrl_barang::class, 'patch']);

    //unit barang API
    Route::apiResource('unitbarang', ctrl_unitbarang::class);
    Route::patch('unitbarang/{id}/6902', [ctrl_unitbarang::class, 'patch']);

    //pengajuan
    Route::apiResource('pengajuan', ctrl_pengajuan::class);

    //persetujuan
    // Route::patch('persetujuan/{id}/6902', [ctrl_persetujuan::class, 'patch']);
    Route::apiResource('riwayat', ctrl_persetujuan::class);
});