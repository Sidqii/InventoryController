<?php

namespace App\Http\Controllers;

use App\Models\model_barang;
use App\Models\model_pengajuan;
use App\Models\model_pengajuan_unit;
use App\Models\model_unitbarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ctrl_pengajuan extends Controller
{
    public function index()
    {
        $pengajuan = model_pengajuan::with(['status_pengajuan', 'user', 'unit_detail'])->get();

        if ($pengajuan->isEmpty()) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($pengajuan);
    }

    public function show($id)
    {
        $pengajuan = model_pengajuan::with(['status_pengajuan', 'user', 'unit_detail'])->where('id_pengguna', $id)->get();

        if ($pengajuan->isEmpty()) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($pengajuan);
    }

    public function readyitem()
    {
        $data = model_barang::select('app_barang.*')
            ->whereIn('id', function ($query) {
                $query->select('id_barang')
                    ->from('app_unit_barang')
                    ->where('id_status', 1);
            })->get();

        return response()->json($data);
    }


    public function store(Request $request)
    {
        $userId = $request->input('id_pengguna');

        $validated = $request->validate([
            'id_barang' => 'required|exists:app_barang,id',
            'hal' => 'required|string',
            'instansi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'nullable|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        $tgl_pinjam = $validated['tanggal_pinjam'] ?? now()->toDateString();

        // Cari unit aktif dari app_unit_barang
        $unit_tersedia = model_unitbarang::where('id_barang', $validated['id_barang'])
            ->where('id_status', 1) // status aktif
            ->orderBy('updated_at', 'asc')
            ->limit($validated['jumlah'])
            ->get();

        if ($unit_tersedia->count() < $validated['jumlah']) {
            return response()->json([
                'message' => 'Stok unit tidak mencukupi.',
                'stok_tersedia' => $unit_tersedia->count()
            ], 400);
        }

        DB::beginTransaction();

        try {
            // Simpan ke app_pengajuan
            $pengajuan = model_pengajuan::create([
                'id_pengguna' => $userId,
                'id_status' => 1,
                'instansi' => $validated['instansi'] ?? null,
                'hal' => $validated['hal'],
                'jumlah' => $validated['jumlah'],
                'tanggal_pinjam' => $tgl_pinjam,
                'tanggal_kembali' => $validated['tanggal_kembali'] ?? null,
            ]);

            // Simpan ke app_pengajuan_unit
            foreach ($unit_tersedia as $unit) {
                model_pengajuan_unit::create([
                    'id_pengajuan' => $pengajuan->id,
                    'id_unit_barang' => $unit->id
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Pengajuan berhasil dibuat',
                'data' => $pengajuan
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Gagal menyimpan pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
