<?php

use App\Http\Controllers\AppPengembalian;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppUnitBarangController;
use App\Http\Controllers\AppBarangController;
use App\Http\Controllers\AppJenisController;
use App\Http\Controllers\AppKategoriController;
use App\Http\Controllers\AppPengajuanController;
use App\Http\Controllers\AppPengajuanUnitController;
use App\Http\Controllers\AppPermissionsController;
use App\Http\Controllers\AppPersetujuanController;
use App\Http\Controllers\AppRiwayatStatusController;
use App\Http\Controllers\AppRolesController;
use App\Http\Controllers\AppTaskController;
use App\Http\Controllers\AppUsersController;


//login
Route::post('/login', [AppTaskController::class, 'login']);

/**
 * index -> get semua data pengajuan => operator
 * store -> ajukan peminjaman => staff
 * update -> ajukan pengembalian => staff
 * show(id) -> get AppPengajuan by id (staffId) dengan status 'Dipinjam'
 * all(id) -> get AppPengajuan by id (staffId)
 */

//pengajuan dan pengembalian barang
Route::apiResource('/pengajuan', AppPengajuanController::class);

/**
 * update -> proses pengajuan peminjaman/pengembalian
 */

//proses pengajuan dan pengembalian
Route::apiResource('/persetujuan', AppPersetujuanController::class);

//riwayat -> all role
Route::get('/riwayat/{id}', [AppPengajuanController::class, 'all']);

// //persetujuan pengajuan -> staff
// Route::post('/pengajuan/{id}/persetujuan', [AppTaskController::class, 'persetujuan']);

// //pengembalian peminjaman -> staff
// Route::post('pengajuan/{id}/ajukan-pengembalian', [AppTaskController::class, 'ajukanPengembalian']);

// //proses pengembalian peminjaman -> operator
// Route::post('pengajuan/{id}/proses-pengembalian', [AppTaskController::class, 'prosesPengembalian']);

//get pengembalian -> all role
Route::get('/pengembalian', [AppTaskController::class, 'indexRiwayat']);
Route::get('/pengembalian/{id}', [AppTaskController::class, 'showPengembalian']);

//user data -> all role
Route::apiResource('/user', AppUsersController::class);
Route::apiResource('/role', AppRolesController::class);

//peran akses pengguna
Route::apiResource('/perm', AppPermissionsController::class);

// //update barang -> operator, admin
// Route::post('/store', [AppBarangController::class, 'store']);
// Route::put('/update/{id}', [AppBarangController::class, 'update']);

//data barang -> all role
Route::get('/barang', [AppBarangController::class, 'index']);
Route::get('/barang/{id}', [AppBarangController::class, 'show']);

//data unit barang -> all role
Route::get('/staff/unit', [AppUnitBarangController::class, 'indexStaff']);
Route::apiResource('/unit', AppUnitBarangController::class);

//lainnya
Route::apiResource('/jenis', AppJenisController::class);
Route::apiResource('/kategori', AppKategoriController::class);
Route::apiResource('/unit_pengajuan', AppPengajuanUnitController::class);
