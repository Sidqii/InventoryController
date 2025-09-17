<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppUnitBarangController;
use App\Http\Controllers\AppBarangController;
use App\Http\Controllers\AppJenisController;
use App\Http\Controllers\AppKategoriController;
use App\Http\Controllers\AppLoginController;
use App\Http\Controllers\AppPengajuanController;
use App\Http\Controllers\AppPengajuanUnitController;
use App\Http\Controllers\AppPengembalian;
use App\Http\Controllers\AppPersetujuanController;
use App\Http\Controllers\AppRiwayatController;
use App\Http\Controllers\AppRolesController;
use App\Http\Controllers\AppUsersController;


//login
Route::post('/login', [AppLoginController::class, 'login']);

/**
 * index -> get semua data pengajuan => operator
 * store -> ajukan peminjaman => staff
 * update -> ajukan pengembalian => staff
 * show(id) -> get AppPengajuan by id (staffId) dengan status 'Dipinjam'
 */

//pengajuan dan pengembalian barang
Route::apiResource('/pengajuan', AppPengajuanController::class);

/**
 * update -> proses pengajuan peminjaman/pengembalian
 */

//proses pengajuan dan penolakan
Route::apiResource('/persetujuan', AppPersetujuanController::class);

//proses pengembalian peminjaman
Route::apiResource('/pengembalian', AppPengembalian::class);

/**
 * (index) riwayat untuk operator
 * show untuk get by id pengguna (staff)
 * indexApp riwayat by status pengajuan
 * indexRtt riwayat by status pengembalian
 */

//riwayat
Route::get('/riwayat/{id}', [AppRiwayatController::class, 'show']);
Route::get('/app/riwayat', [AppRiwayatController::class, 'indexApp']);
Route::get('/rtt/riwayat', [AppRiwayatController::class, 'indexRtt']);

/**
 * index -> semua data barang
 * store -> tambah data barang
 * show -> ambil data barang by id
 * update -> edit data barang
 */

//data barang
Route::apiResource('/barang', AppBarangController::class);

/**
 * index -> semua data barang => operator
 * store -> tambah data barang => operator
 * show -> ambil data barang by id
 * update -> update data barang => operator
 */

//edit data dan get unit barang
Route::apiResource('/unit', AppUnitBarangController::class);

//get data unit barang untuk staff
Route::get('/staff/unit', [AppUnitBarangController::class, 'indexStaff']);

//lainnya
Route::apiResource('/user', AppUsersController::class);
Route::apiResource('/role', AppRolesController::class);
Route::apiResource('/jenis', AppJenisController::class);
Route::apiResource('/kategori', AppKategoriController::class);
Route::apiResource('/unit_pengajuan', AppPengajuanUnitController::class);
