<?php

namespace App\Http\Controllers;

use App\Models\AppUnitBarang;
use Illuminate\Http\Request;

class AppUnitBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppUnitBarang::with([
            'barang',
            'kepemilikan',
            'status',
            'lokasi',
            'kondisi',
            'pengajuan',
            'riwayat',
        ])->get();

        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexStaff()
    {
        $data = AppUnitBarang::with([
            'barang',
            'kepemilikan',
            'status',
            'lokasi',
            'kondisi',
            // 'pengajuan',
            // 'riwayat',
        ])->where('id_status', 1)->get();

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
        $data = AppUnitBarang::create($request->all());

        return response()->json([
            'message' => 'Unit berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppUnitBarang::with([
            'barang',
            'kepemilikan',
            'status',
            'lokasi',
            'kondisi',
            'pengajuan',
            'riwayat',
        ])->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppUnitBarang $appUnitBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppUnitBarang $appUnitBarang)
    {
        $appUnitBarang->update($request->all());

        return response()->json([
            'message' => 'Unit berhasil diperbarui',
            'data' => $appUnitBarang,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppUnitBarang $appUnitBarang)
    {
        $appUnitBarang->delete();

        return response()->json([
            'message' => 'Unit berhasil dihapus',
            'data' => $appUnitBarang,
        ]);
    }
}
