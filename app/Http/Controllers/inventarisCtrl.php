<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventaris;

class inventarisCtrl extends Controller
{

    public function index()
    {
        return response()->json(Inventaris::with(['status', 'kategori', 'kondisi', 'lokasi'])->get());
    }

    public function show($id)
    {
        return response()->json(Inventaris::with(['status', 'kategori', 'kondisi', 'lokasi'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|exists:app_kategori,id',
            'id_kondisi' => 'required|exists:app_kondisi,id',
            'id_lokasi' => 'required|exists:app_lokasi,id',
            'id_status' => 'required|exists:app_status,id',
            'stok' => 'required|integer|min:0',
            'merk' => 'nullable|string|max:255',
            'kode_barang' => 'required|string|unique:app_inventaris,kode_barang',
            'deskripsi' => 'required|string',
            'tanggal_pengadaan' => 'required|date',
            'nilai_pengadaan' => 'required|numeric|min:0',
            'riwayat_pemakaian' => 'nullable|string',
            'catatan_perawatan' => 'nullable|string',
            'spesifikasi_teknis' => 'nullable|array',
            'log_transaksi' => 'nullable|array',
        ]);

        Inventaris::create($validated);

        return response()->json(['message' => 'Inventaris berhasil ditambahkan']);
    }


    public function updateFull(Request $request, $id)
    {
        $data = $request->all();
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update($data);

        return response()->json(['message' => 'Data berhasil diperbarui (PUT Method)']);
    }

    public function updatePatch(Request $request, $id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $patchData = $request->json()->all();

        foreach ($patchData as $op) {
            if ($op['op'] === 'replace') {
                $field = $op['path'];
                $value = $op['value'];
                $field = ltrim($field, '/');
                $inventaris->{$field} = $value;
            }
        }

        $inventaris->save();

        return response()->json(['message' => 'Data berhasil diperbarui (Patch)']);
    }

    public function destroy($id)
    {
        $data = Inventaris::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
