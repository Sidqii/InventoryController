<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class pengajuanCtrl extends Controller
{
    public function index()
    {
        return response()->json(Pengajuan::with(['inventaris', 'user', 'status'])->get());
    }

    public function show($id)
    {
        return response()->json(Pengajuan::with(['inventaris', 'user', 'status'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_barang' => 'required|exists:app_inventaris,id',
            'id_pengguna' => 'required|exists:app_users,id',
            'instansi' => 'required|string|max:255',
            'hal' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        $data['id_status'] = 1;

        Pengajuan::create($data);
        return response()->json(['message' => 'Pengajuan berhasil ditambahkan'], 201);
    }

    public function proses(Request $request, $id)
    {
        $validated = $request->validate([
            'id_status' => 'required|in:2,3',
            'tanggal_kembali' => 'nullable|date',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        if ($validated['id_status'] == 2 && !$pengajuan->tanggal_kembali) {
            return response()->json([
                'message' => 'Tanggal kembali wajib diisi jika pengajuan disetujui.'
            ], 422);
        }

        Riwayat::create([
            'id_barang' => $pengajuan->id_barang,
            'id_pengguna' => $pengajuan->id_pengguna,
            'id_status' => $validated['id_status'],
            'instansi' => $pengajuan->instansi,
            'hal' => $pengajuan->hal,
            'jumlah' => $pengajuan->jumlah,
            'tanggal_pinjam' => $pengajuan->tanggal_pinjam,
            'tanggal_kembali' => $pengajuan->tanggal_kembali,
            'id_pengajuan' => $pengajuan->id,
            'tanggal_proses' => now(),
        ]);

        $pengajuan->delete();

        return response()->json(['message' => 'Pengajuan berhasil diproses']);
    }

    public function destroy($id)
    {
        $data = Pengajuan::findOrFail($id);
        $data->delete();

        return response()->json(['message' => 'Pengajuan berhasil dihapus']);
    }
}
