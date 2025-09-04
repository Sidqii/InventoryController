<?php

namespace App\Http\Controllers;

use App\Models\AppBarang;
use Illuminate\Http\Request;

class AppBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppBarang::with(['kategori', 'jenis', 'unitBarang'])->get();

        return response()->json([$data], 200);
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
        $data = AppBarang::create($request->all());

        return response()->json([
            'message' => 'Barang berhasil ditambahkan',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppBarang::with(['kategori', 'jenis', 'unitBarang'])->findOrFail($id);

        return response()->json([$data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppBarang $appBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|integer|exists:app_kategori,id',
            'id_jenis' => 'required|integer|exists:app_jenis,id',
            'merk' => 'nullable|string|max:255',
            'spek_barang' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
            'vendor' => 'nullable|string|max:255',
            'note_perawatan' => 'nullable|string|max:255',
        ]);

        $barang = AppBarang::findOrFail($id);
        $barang->update($validated);

        return response()->json([
            'message' => 'Barang berhasil diperbarui',
            'data' => $barang,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppBarang $appBarang)
    {
        $appBarang->delete();

        return response()->json([
            'message' => 'Barang berhasil dihapus',
            'data' => $appBarang,
        ], 200);
    }
}
