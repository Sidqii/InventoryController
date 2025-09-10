<?php

namespace App\Http\Controllers;

use App\Models\AppPengajuan;
use Illuminate\Http\Request;

class AppPengembalian extends Controller
{
    public function index()
    {
        //
    }

    public function update($id)
    {
        try {
            $pengajuan = AppPengajuan::with('unitBarang')->findOrFail($id);
            $pengajuan->id_status = 1;
            $pengajuan->save();

            return response()->json([
                'message' => 'Pengembalian diajukan, menunggu verfikasi',
                'data' => $pengajuan,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        $pengembalian = AppPengajuan::with(['unitBarang.barang', 'unitBarang.kondisi', 'status'])
            ->where('id_pengguna', $id)
            ->whereHas('status', function ($s) {
                $s->where('status_pengajuan', 'Dipinjam');
            })->get();

        $data = $pengembalian->map(function ($item) {
            return [
                'id' => $item->id,
                'kode_pinjam' => 'Pengajuan #' . str_pad($item->id, 3, '0', STR_PAD_LEFT), //kode untuk id pengajuan => Pengajuan #00..$id
                'nama_barang' => $item->unitBarang->first()?->barang?->nama_barang ?? '-',
                'status' => $item->status->status === 'Disetujui' ? 'Dipinjam' : ($item->status->status ?? '-'),
                'pengembalian' => $item->tgl_kembali,
                'unit' => $item->unitBarang->map(function ($unit) {
                    return [
                        'id' => $unit->id,
                        'kode_unit' => $unit->kode_unit,
                        'no_seri' => $unit->no_seri,
                        'kondisi' => $unit->kondisi,
                    ];
                })
            ];
        });

        return response()->json($data, 200);
    }
}
