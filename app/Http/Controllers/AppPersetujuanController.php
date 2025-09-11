<?php

namespace App\Http\Controllers;

use App\Models\AppPengajuan;
use App\Models\AppRiwayatStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppPersetujuanController extends Controller
{
    /**
     * persetujuan pengajuan peminjaman dan pengembalian
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'status_id' => 'required|integer|exists:app_status_pengajuan,id',
                'catatan' => 'nullable|string',
            ]);

            $statPengajuanId = $request->status_id;
            $catatan = $request->catatan;

            //convert input operator
            $mapUnit = [
                4 => 2, //status_pengajuan.id = (4 Peminjaman) => unit_barang.id => (2 Dipinjam)
                1 => 1, //status_pengajuan.id = (1 Ditolak) => unit_barang.id => (1 Tersedia)
                2 => 1, //status_pengajuan.id = (2 Selesai) => unit_barang.id => (1 Tersedia)
                6 => 1, //status_pengajuan.id = (6 Dikembalikan) => unit_barang.id => (1 Tersedia)
            ];

            $statBaru = $mapUnit[$statPengajuanId] ?? null;

            $pengajuan = AppPengajuan::with('unitBarang')->findOrFail($id);
            $pengajuan->id_status = $statPengajuanId;
            $pengajuan->save();

            foreach ($pengajuan->unitBarang as $unit) {
                $statAwal = $unit->id_status;

                if ($statBaru) {
                    $unit->id_status = $statBaru;
                    $unit->save();
                }

                AppRiwayatStatus::create([
                    'id_unit_barang' => $unit->id,
                    'id_pengajuan' => $pengajuan->id,
                    'status_awal' => $statAwal,
                    'status_baru' => $statBaru,
                    'lokasi_unit' => $unit->id_lokasi,
                    'oleh' => Auth::id(),
                    'catatan' => $catatan,
                ]);
            }

            return response()->json([
                'message' => 'Persetujuan berhasil diproses',
                'data' => $pengajuan->load('unitBarang'),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
