<?php

namespace App\Http\Controllers;

use App\Models\AppPengajuan;
use Illuminate\Http\Request;

class AppRiwayatController extends Controller
{
    /**
     *  riwayat pengajuan by id (staff)
     */
    public function show($id)
    {
        $data = AppPengajuan::with([
            'user',
            'unitBarang.barang',
            'unitBarang.kondisi',
            'status',
            'riwayat',
        ])->where('id_pengguna', $id)->get();

        return response()->json($data, 200);
    }
}
