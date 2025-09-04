<?php

namespace App\Http\Controllers;

use App\Models\AppRiwayatStatus;
use Illuminate\Http\Request;

class AppRiwayatStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppRiwayatStatus::with([
            'unitBarang.barang',
            'statusAwal',
            'statusBaru',
            'lokasiUnit',
            'pengajuan',
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
            'id_unit_barang' => 'required|exists:app_unit_barang,id',
            'id_pengajuan' => 'nullable|exists:app_pengajuan,id',
            'status_awal' => 'nullable|exists:app_status,id',
            'status_baru' => 'nullable|exists:app_status,id',
            'lokasi_awal' => 'nullable|exists:app_lokasi,id',
            'lokasi_baru' => 'nullable|exists:app_lokasi,id',
            'tanggal' => 'nullable|date',
            'catatan' => 'nullable|string',
        ]);

        $data = AppRiwayatStatus::create([
            'id_unit_barang' => $validated['id_unit_barang'],
            'id_pengajuan' => $validated['id_pengajuan'],
            'status_awal' => $validated['status_awal'],
            'status_baru' => $validated['status_baru'],
            'lokasi_awal' => $validated['lokasi_awal'],
            'lokasi_baru' => $validated['lokasi_baru'],
            'tanggal' => $validated['tanggal'] ?? now(),
            'catatan' => $validated['catatan'] ?? null,
        ]);

        return response()->json([
            'message' => 'Riwayat berhasil dicatat',
            'data' => $data->load([
                'unitBarang.barang',
                'statusAwal',
                'statusBaru',
                'lokasiAwal',
                'lokasiBaru',
                'pengajuan',
            ])
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppRiwayatStatus::with([
            'unitBarang.barang',
            'statusAwal',
            'statusBaru',
            'lokasiAwal',
            'lokasiBaru',
            'pengajuan',
        ])->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppRiwayatStatus $appRiwayatStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppRiwayatStatus $appRiwayatStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppRiwayatStatus $appRiwayatStatus)
    {
        //
    }
}
