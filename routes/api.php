<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppUnitBarangController;
use App\Http\Controllers\AppBarangController;
use App\Http\Controllers\AppJenisController;
use App\Http\Controllers\AppKategoriController;
use App\Http\Controllers\AppPengajuanController;
use App\Http\Controllers\AppPengajuanUnitController;
use App\Http\Controllers\AppPermissionsController;
use App\Http\Controllers\AppRiwayatStatusController;
use App\Http\Controllers\AppRolesController;
use App\Http\Controllers\AppTaskController;
use App\Http\Controllers\AppUsersController;


//login
Route::post('/login', [AppTaskController::class, 'login']);

//persetujuan pengajuan
Route::post('/pengajuan/{id}/persetujuan', [AppTaskController::class, 'persetujuan']);

//pengembalian peminjaman
Route::post('pengajuan/{id}/ajukan-pengembalian', [AppTaskController::class, 'ajukanPengembalian']);

//proses pengembalian peminjaman
Route::post('pengajuan/{id}/proses-pengembalian', [AppTaskController::class, 'prosesPengembalian']);

//get pengembalian
Route::get('/pengembalian', [AppTaskController::class, 'indexRiwayat']);
Route::get('/pengembalian/{id}', [AppTaskController::class, 'showPengembalian']);

//user data
Route::apiResource('/user', AppUsersController::class);
Route::apiResource('/role', AppRolesController::class);

//peran akses pengguna
Route::apiResource('/perm', AppPermissionsController::class);

//update barang
Route::post('/store', [AppBarangController::class, 'store']);
Route::put('/update/{id}', [AppBarangController::class, 'update']);

//data barang
Route::get('/barang', [AppBarangController::class, 'index']);
Route::get('/barang/{id}', [AppBarangController::class, 'show']);

//data unit barang
Route::get('/staff/unit', [AppUnitBarangController::class, 'indexStaff']);
Route::apiResource('/unit', AppUnitBarangController::class);

//riwayat
Route::get('/riwayat/{id}', [AppPengajuanController::class, 'all']);
Route::apiResource('/pengajuan', AppPengajuanController::class);

//lainnya
// Route::apiResource('/riwayat', AppRiwayatStatusController::class);
Route::apiResource('/jenis', AppJenisController::class);
Route::apiResource('/kategori', AppKategoriController::class);
Route::apiResource('/unit_pengajuan', AppPengajuanUnitController::class);
