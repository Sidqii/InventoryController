<?php

namespace App\Http\Controllers;

use App\Models\AppPengajuan;
use Illuminate\Http\Request;

class AppPengajuanController extends Controller
{
    /**
     * semua riwayat peminjaman barang
     */
    public function index()
    {
        $data = AppPengajuan::with([
            'user',
            'unitBarang.barang',
            'status',
            'riwayat',
        ])->get();

        return response()->json($data);
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * pengajuan peminjaman barang oleh staff
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pengguna' => 'required|exists:app_users,id',
            'instansi' => 'required|string|max:255',
            'hal' => 'required|string|max:255',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
            'unit_barang' => 'required|array|min:1',
            'unit_barang.*' => 'exists:app_unit_barang,id',
        ]);

        $pengajuan = AppPengajuan::create([
            'id_pengguna' => $validated['id_pengguna'],
            'id_status' => 3,
            'instansi' => $validated['instansi'],
            'hal' => $validated['hal'],
            'tgl_pinjam' => $validated['tgl_pinjam'],
            'tgl_kembali' => $validated['tgl_kembali'] ?? null,
            'jumlah' => count($validated['unit_barang']),
        ]);

        $pengajuan->unitBarang()->attach($validated['unit_barang']);

        return response()->json([
            'message' => 'Pengajuan berhasil dibuat',
            'data' => $pengajuan->load(['user', 'unitBarang.barang', 'status'])
        ]);
    }

    /**
     * riwayat peminjaman dengan status hanya Dipinjam by id (staff)
     */
    public function show($id)
    {
        $data = AppPengajuan::with([
            'user',
            'unitBarang.barang',
            'unitBarang.kondisi',
            'status',
            'riwayat'
        ])->where('id_pengguna', $id)->whereHas('status', function ($q) {
            $q->where('status_pengajuan', 'Dipinjam');
        })->get();

        return response()->json($data);
    }

    /**
     *
     */
    public function edit(AppPengajuan $appPengajuan)
    {
        //
    }

    /**
     * pengajuan pengembalian barang
     */
    public function update($id)
    {
        try {
            $pengajuan = AppPengajuan::with('unitBarang')->findOrFail($id);
            $pengajuan->id_status = 5;
            $pengajuan->save();

            return response()->json([
                'message' => 'Pengembalian diajukan, menunggu verifikasi',
                'data' => $pengajuan,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * masih lom tau wat apa ges
     */
    public function destroy(AppPengajuan $appPengajuan)
    {
        $appPengajuan->delete();

        return response()->json([
            'message' => 'Pengajuan berhasil dihapus',
            'data' => $appPengajuan,
        ]);
    }
}
