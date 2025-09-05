<?php

namespace App\Http\Controllers;

use App\Models\AppPengajuan;
use Illuminate\Http\Request;

class AppPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
            'id_status' => 1,
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
     * Display the specified resource.
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
            $q->where('status', 'Disetujui');
        })->get();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function all($id)
    {
        $data = AppPengajuan::with([
            'user',
            'unitBarang.barang',
            'unitBarang.kondisi',
            'status',
            'riwayat'
        ])->where('id_pengguna', $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppPengajuan $appPengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppPengajuan $appPengajuan)
    {
        $validated = $request->validate([
            'instansi' => 'nullable|string|max:255',
            'hal' => 'nullable|string|max:255',
            'tgl_pinjam' => 'nullable|date',
            'tgl_kembali' => 'nullable|date|after_or_equal:tgl_pinjam',
            'id_status' => 'nullable|exists:app_status,id',
        ]);

        $appPengajuan->update($validated);

        return response()->json([
            'message' => 'Pengajuan berhasil diperbarui',
            'data' => $appPengajuan->load([
                'user',
                'unitBarang.barang',
                'status',
            ])
        ]);
    }

    /**
     * Remove the specified resource from storage.
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
