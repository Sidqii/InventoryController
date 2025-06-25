<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriCtrl extends Controller
{
    public function index()
    {
        return response()->json(Kategori::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::create($data);
        return response()->json(['message' => 'Kategori berhasil ditambahkan', 'data' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($data);

        return response()->json(['message' => 'Kategori berhasil diperbarui', 'data' => $kategori]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
