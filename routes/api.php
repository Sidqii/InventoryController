<?php

use App\Http\Controllers\ctrl_barang;
use App\Http\Controllers\ctrl_login;
use App\Http\Controllers\ctrl_pengajuan;
use App\Http\Controllers\ctrl_pengembalian;
use App\Http\Controllers\ctrl_persetujuan;
use App\Http\Controllers\ctrl_unitbarang;

Route::middleware('api')->group(function () {
    //Login
    Route::apiResource('login', ctrl_login::class);

    //barang API
    Route::patch('/barang/{id}/merge', [ctrl_barang::class, 'merge']);
    Route::patch('/barang/{id}/patch', [ctrl_barang::class, 'patch']);
    Route::apiResource('barang', ctrl_barang::class);

    //unit barang API
    Route::patch('/unitbarang/{id}/patch', [ctrl_unitbarang::class, 'patch']);
    Route::apiResource('unitbarang', ctrl_unitbarang::class);

    //pengajuan
    Route::get('/pengajuan/readyitem', [ctrl_pengajuan::class, 'readyitem']);
    Route::get('/pengajuan/user/{id}', [ctrl_pengajuan::class, 'show']);
    Route::apiResource('/pengajuan', ctrl_pengajuan::class);

    //persetujuan
    Route::patch('/persetujuan/{id}', [ctrl_persetujuan::class, 'update']);
    Route::apiResource('/persetujuan', ctrl_persetujuan::class);

    //pengembalian
    Route::patch('/unit/{id}/pengembalian', [ctrl_pengembalian::class, 'update']);
});