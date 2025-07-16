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
    Route::patch('barang/{id}/6902', [ctrl_barang::class, 'patch']);
    Route::apiResource('barang', ctrl_barang::class);

    //unit barang API
    Route::patch('unitbarang/{id}/6902', [ctrl_unitbarang::class, 'patch']);
    Route::apiResource('unitbarang', ctrl_unitbarang::class);

    //pengajuan
    Route::get('pengajuan/user/{id}', [ctrl_pengajuan::class, 'show']);
    Route::apiResource('pengajuan', ctrl_pengajuan::class);

    //persetujuan
    Route::apiResource('persetujuan', ctrl_persetujuan::class);
});