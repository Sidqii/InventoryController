<?php

namespace App\Http\Controllers;

use App\Models\model_pengajuan;
use App\Models\model_pengajuan_unit;
use App\Models\model_riwayat_status;
use Illuminate\Http\Request;

class ctrl_persetujuan extends Controller
{
    public function index()
    {
        $riwayat = model_riwayat_status::with(['unit.barang', 'jenis', 'user', 'pengajuan.peminjam'])->get();

        return response()->json($riwayat);
    }

    public function show()
    {
        $riwayat = model_riwayat_status::with(['unit.barang', 'jenis', 'user', 'pengajuan.peminjam'])->get();

        return response()->json($riwayat);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_status_pengajuan' => 'required|integer',
            'id_status_unit' => 'required|integer',
            'id_user' => 'required|exists:app_user,id',
            'catatan' => 'nullable|string',
        ]);

        $pengajuan = model_pengajuan::findOrFail($id);
        $statusLama = $pengajuan->id_status;

        $units = model_pengajuan_unit::with('unit_barang')->where('id_pengajuan', $id)->get();

        if ($units->isEmpty()) {
            return response()->json(['message' => 'Tidak ada unit barang yang terkait dengan pengajuan ini'], 404);
        }

        foreach ($units as $unit) {
            model_riwayat_status::create([
                'id_unit_barang' => $unit->id_unit_barang,
                'id_jenis_perubahan' => 1,
                'status_awal' => $statusLama,
                'status_baru' => $request->id_status_unit, // ⬅️ status unit
                'lokasi_awal' => $unit->unit_barang->id_lokasi ?? null,
                'lokasi_baru' => null,
                'tanggal' => now(),
                'oleh' => $request->id_user,
                'catatan' => $request->catatan,
                'lampiran' => null,
                'id_pengajuan' => $pengajuan->id,
            ]);

            $unit->unit_barang->update([
                'id_status' => $request->id_status_unit // ⬅️ update status unit
            ]);
        }

        // ⬅️ Update status pengajuan di luar loop
        $pengajuan->id_status = $request->id_status_pengajuan;
        $pengajuan->save();

        return response()->json([
            'message' => 'Status pengajuan dan unit berhasil diperbarui',
        ]);
    }
}
