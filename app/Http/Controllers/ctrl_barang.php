<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\model_barang;
use Illuminate\Http\Request;

class ctrl_barang extends Controller
{
    public function index()
    {
        $barang = model_barang::with(['kategori', 'jenis'])->get();
        return response()->json($barang);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string',
            'kode_barang' => 'required|string|unique:app_barang',
            'id_kategori' => 'required|exists:app_kategori,id',
            'id_jenis' => 'required|exists:app_jenis,id',
            'merk' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'spesifikasi_teknis' => 'nullable|array',
            'tanggal_pengadaan' => 'nullable|date',
            'masa_garansi' => 'nullable|integer',
            'sumber_pengadaan' => 'nullable|string',
            'vendor' => 'nullable|string',
            'catatan_perawatan' => 'nullable|string',
            'status_aktif' => 'boolean',
        ]);

        $barang = model_barang::create($validated);

        return response()->json([
            'message' => 'Barang berhasil ditambahkan',
            'data' => $barang
        ], 201);
    }

    public function show($id)
    {
        $barang = model_barang::with(['kategori', 'jenis', 'unit.kondisi', 'unit.status', 'unit.kepemilikan'])->find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        return response()->json($barang);
    }

    public function merge(Request $request, $id)
    {
        $barang = model_barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $data = $request->only([
            'nama_barang',
            'kode_barang',
            'id_kategori',
            'id_jenis',
            'merk',
            'deskripsi',
            'spesifikasi_teknis',
            'tanggal_pengadaan',
            'masa_garansi',
            'sumber_pengadaan',
            'vendor',
            'catatan_perawatan',
            'status_aktif'
        ]);

        if (isset($data['spesifikasi_teknis']) && is_array($data['spesifikasi_teknis'])) {
            $data['spesifikasi_teknis'] = $data['spesifikasi_teknis'];
        }

        $barang->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'Barang berhasil diperbarui (merge)',
        ]);
    }

    public function update(Request $request, $id)
    {
        $barang = model_barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_barang' => 'nullable|string',
            'kode_barang' => 'nullable|string|unique:app_barang,kode_barang,' . $id,
            'id_kategori' => 'nullable|exists:app_kategori,id',
            'id_jenis' => 'nullable|exists:app_jenis,id',
            'merk' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'spesifikasi_teknis' => 'nullable|array',
            'tanggal_pengadaan' => 'nullable|date',
            'masa_garansi' => 'nullable|integer',
            'sumber_pengadaan' => 'nullable|string',
            'vendor' => 'nullable|string',
            'catatan_perawatan' => 'nullable|string',
            'status_aktif' => 'boolean',
        ]);

        $barang->update($validated);

        return response()->json([
            'message' => 'Barang berhasil diperbarui',
            'data' => $barang
        ]);
    }

    public function patch(Request $request, $id)
    {
        $barang = model_barang::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $ops = $request->json()->all();
        if (!is_array($ops)) {
            return response()->json(['message' => 'Format JSON Patch tidak valid'], 400);
        }

        foreach ($ops as $op) {
            if (($op['op'] ?? '') !== 'replace' || !isset($op['path'], $op['value'])) {
                continue;
            }

            $path = trim($op['path'], '/');
            $segments = explode('/', $path);
            $field = $segments[0];

            // Tangani spesifikasi_teknis
            if ($field === 'spesifikasi_teknis' && isset($segments[1])) {
                $key = $segments[1];
                $current = is_array($barang->spesifikasi_teknis)
                    ? $barang->spesifikasi_teknis
                    : json_decode($barang->spesifikasi_teknis ?? '{}', true);

                if (!is_array($current)) {
                    $current = [];
                }

                $current[$key] = $op['value'];
                $barang->spesifikasi_teknis = $current;
                continue;
            }

            // Tangani field biasa
            if (in_array($field, $barang->getFillable())) {
                $barang->{$field} = $op['value'];
            }
        }

        $barang->save();

        return response()->json([
            'status' => 200,
            'message' => 'Barang berhasil diperbarui (replace)',
        ]);
    }

    public function destroy($id)
    {
        $barang = model_barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $barang->delete();


        return response()->json(['message' => 'Barang berhasil dihapus']);
    }
}
