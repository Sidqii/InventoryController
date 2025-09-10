<?php

namespace App\Http\Controllers;

use App\Models\AppBarang;
use Illuminate\Http\Request;

class AppBarangController extends Controller
{
    /**
     * ambil semua data barang
     */
    public function index()
    {
        $data = AppBarang::with(['kategori', 'jenis', 'unitBarang'])->get();

        return response()->json([$data], 200);
    }

    /**
     * tambah data barang
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
     * ambil data barang by id
     */
    public function show($id)
    {
        $data = AppBarang::with(['kategori', 'jenis', 'unitBarang'])->findOrFail($id);

        return response()->json([$data], 200);
    }

    /**
     * update data barang untuk operator
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
     * gatau juga wat apaan masih bingung
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
