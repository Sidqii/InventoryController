<?php

namespace App\Http\Controllers;

use App\Models\model_pengajuan;
use App\Models\model_riwayat_status;
use Illuminate\Http\Request;

class ctrl_persetujuan extends Controller
{
    public function index()
    {
        $riwayat = model_riwayat_status::with(['unit', 'jenis', 'user'])->get();
        return response()->json($riwayat);
    }

    public function patch(Request $request, $id)
    {
        $request->validate([
            'id_status' => 'required|in:2,3',
            'id_user' => 'required|exists:app_user,id',
            'catatan' => 'nullable|string',
        ]);

        $pengajuan = model_pengajuan::with('unit')->findOrFail($id);

        $statusLama = $pengajuan->id_status;
        $lokasiAwal = $pengajuan->unit->id_lokasi ?? null;

        $pengajuan->id_status = $request->id_status;

        model_riwayat_status::create([
            'id_unit_barang' => $pengajuan->id_unit_barang,
            'id_jenis_perubahan' => 1,
            'status_awal' => $statusLama,
            'status_baru' => $request->id_status,
            'lokasi_awal' => $lokasiAwal,
            'lokasi_baru' => null,
            'tanggal' => now(),
            'oleh' => (string) $request->id_user,
            'catatan' => $request->catatan,
            'lampiran' => null,
            'id_pengajuan' => $pengajuan->id,
        ]);

        $pengajuan->delete();

        return response()->json([
            'message' => 'Status pengajuan berhasil diperbarui',
        ]);
    }
}
