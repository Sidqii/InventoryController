<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_pengajuan_unit;
use App\Models\model_riwayat_status;
use App\Models\model_unitbarang;

class ctrl_pengembalian extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_jenis_perubahan' => 'required|exists:app_jenis_perubahan,id',
            'id_status_unit' => 'required|integer|exists:app_status,id',
            'id_user' => 'required|exists:app_user,id',
            'catatan' => 'nullable|string',
        ]);

        // Ambil data unit berdasarkan ID (dari app_unit_barang)
        $unit = model_unitbarang::with('pengajuan')->findOrFail($id);

        $statusAwal = $unit->id_status;

        // Update status unit
        $unit->update([
            'id_status' => $request->id_status_unit,
        ]);

        // Simpan ke riwayat
        model_riwayat_status::create([
            'id_unit_barang' => $unit->id,
            'id_jenis_perubahan' => $request->id_jenis_perubahan,
            'status_awal' => $statusAwal,
            'status_baru' => $request->id_status_unit,
            'lokasi_awal' => $unit->id_lokasi,
            'lokasi_baru' => $unit->id_lokasi, // diasumsikan tidak pindah
            'tanggal' => now(),
            'oleh' => $request->id_user,
            'catatan' => $request->catatan,
            'lampiran' => null,
            'id_pengajuan' => $unit->pengajuan_unit->id_pengajuan ?? null,
        ]);

        return response()->json([
            'message' => 'Pengembalian barang berhasil dicatat.',
        ]);
    }
}
