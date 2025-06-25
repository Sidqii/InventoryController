<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use Illuminate\Http\Request;

class kondisiCtrl extends Controller
{
    public function index()
    {
        return response()->json(Kondisi::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kondisi' => 'required|string|max:255',
        ]);

        $kondisi = Kondisi::create($data);
        return response()->json(['message' => 'Kondisi berhasil ditambahkan', 'data' => $kondisi]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kondisi' => 'required|string|max:255',
        ]);

        $kondisi = Kondisi::findOrFail($id);
        $kondisi->update($data);

        return response()->json(['message' => 'Kondisi berhasil diperbarui', 'data' => $kondisi]);
    }

    public function destroy($id)
    {
        $kondisi = Kondisi::findOrFail($id);
        $kondisi->delete();

        return response()->json(['message' => 'Kondisi berhasil dihapus']);
    }
}
