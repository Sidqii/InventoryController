<?php

namespace App\Http\Controllers;

use App\Models\model_pengajuan;
use Illuminate\Http\Request;

class ctrl_pengajuan extends Controller
{
    public function index()
    {
        $pengajuan = model_pengajuan::with(['status_pengajuan', 'unit', 'user'])->get();

        return response()->json($pengajuan);
    }

    public function store(Request $request)
    {
        $userId = $request->input('id_pengguna');

        $validated = $request->validate([
            'id_unit_barang' => 'required|exists:app_unit_barang,id',
            'hal' => 'required|string',
            'instansi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'nullable|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        $tgl_pinjam = $validated['tanggal_pinjam'] ?? now()->toDateString();

        $pengajuan = model_pengajuan::create([
            'id_unit_barang' => $validated['id_unit_barang'],
            'id_pengguna' => $userId,
            'id_status' => 1,
            'instansi' => $validated['instansi'] ?? null,
            'hal' => $validated['hal'],
            'jumlah' => $validated['jumlah'],
            'tanggal_pinjam' => $tgl_pinjam,
            'tanggal_kembali' => $validated['tanggal_kembali'] ?? null,
        ]);

        return response()->json([
            'message' => 'Pengajuan berhasil dibuat',
            'data' => $pengajuan
        ], 200);
    }
}
