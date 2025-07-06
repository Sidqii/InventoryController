<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\model_barang;
use App\Models\model_unitbarang;
use Illuminate\Http\Request;

class ctrl_unitbarang extends Controller
{
    public function index()
    {
        $unit = model_unitbarang::with(['status', 'lokasi', 'kondisi'])->get();
        return response()->json($unit);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:app_barang,id',
            'id_kepemilikan' => 'required|exists:app_kepemilikan,id',
            'kode_unit' => 'required|string|unique:app_unit_barang',
            'no_seri' => 'nullable|string',
            'id_kondisi' => 'required|exists:app_kondisi,id',
            'id_status' => 'required|exists:app_status,id',
            'id_lokasi' => 'required|exists:app_lokasi,id',
            'tgl_terima' => 'nullable|date',
            'ket_unit' => 'nullable|string',
            'foto' => 'nullable|string',
        ]);

        $unit = model_unitbarang::create($validated);

        // Hitung ulang total unit
        $total = model_unitbarang::where('id_barang', $request->id_barang)->count();
        model_barang::where('id', $request->id_barang)->update(['jumlah_total_unit' => $total]);

        return response()->json(['message' => 'Unit barang ditambahkan', 'data' => $unit], 201);
    }

    public function update(Request $request, $id)
    {
        $unit = model_unitbarang::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit tidak ditemukan']);
        }

        $validate = $request->validate([
            'id_barang' => 'required|exists:app_barang,id',
            'id_kepemilikan' => 'required|exists:app_kepemilikan,id',
            'kode_unit' => 'required|string|unique:app_unit_barang,kode_unit' . $id,
            'no_seri' => 'nullable|string',
            'id_kondisi' => 'required|exists:app_kondisi,id',
            'id_status' => 'required|exists:app_status,id',
            'id_lokasi' => 'required|exists:app_lokasi,id',
            'tgl_terima' => 'nullable|date',
            'ket_unit' => 'nullable|string',
            'foto' => 'nullable|string',
        ]);

        return response()->json([
            'message' => 'Unit berhasil diperbarui',
            'data' => $validate
        ]);
    }

    public function patch(Request $request, $id)
    {
        $unit = model_unitbarang::find($id);
        if (!$unit) {
            return response()->json(['message' => 'Unit barang tidak ditemukan'], 404);
        }

        $operation = $request->json()->all();
        if (!is_array($operation)) {
            return response()->json(['message' => 'Format patch tidak valid'], 400);
        }

        $allowed = $unit->getFillable();
        foreach ($operation as $op) {
            if (!isset($op['op'], $op['path'], $op['value'])) {
                continue;
            }

            $path = trim($op['path'], '/');
            $segment = explode('/', $path);

            if (in_array($segment[0], $allowed)) {
                $unit->{$segment[0]} = $op['value'];
            }
        }

        $unit->save();

        return response()->json([
            'message' => 'Unit barang berhasil diperbarui (pathc)',
            'data' => $unit,
        ]);
    }

    public function destroy($id)
    {
        $unit = model_unitbarang::findOrFail($id);
        $id_barang = $unit->id_barang;

        $unit->delete();

        $total = model_unitbarang::where('id_barang', $id_barang)->count();
        model_barang::where('id', $id_barang)->update(['jumlah_total_unit' => $total]);

        return response()->json(['message' => 'Unit berhasil dihapus']);
    }
}
