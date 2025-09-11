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

    /**
     * riwayat pengajuan untuk operator
     */
    public function indexApp()
    {
        $data = AppPengajuan::with([
            'user',
            'unitBarang.barang',
            'unitBarang.kondisi',
            'status',
            'riwayat'
        ])->whereHas('status', function ($query) {
            $query->where('status_pengajuan', 'Pengajuan');
        })->get();

        return response()->json($data);
    }

    /**
     * riwayat pengembalian untuk operator
     */
    public function indexRtt()
    {
        $data = AppPengajuan::with([
            'user',
            'unitBarang.barang',
            'unitBarang.kondisi',
            'status',
            'riwayat'
        ])->whereHas('status', function ($query) {
            $query->where('status_pengajuan', 'Pengembalian');
        })->get();

        return response()->json($data);
    }
}
