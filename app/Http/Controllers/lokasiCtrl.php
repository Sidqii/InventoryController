<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class lokasiCtrl extends Controller
{
    public function index()
    {
        return response()->json(Lokasi::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lokasi' => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::create($data);
        return response()->json(['message' => 'Lokasi berhasil ditambahkan', 'data' => $lokasi]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'lokasi' => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($data);

        return response()->json(['message' => 'Lokasi berhasil diperbarui', 'data' => $lokasi]);
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return response()->json(['message' => 'Lokasi berhasil dihapus']);
    }
}
