<?php

namespace App\Http\Controllers;

use App\Models\AppPengajuan;
use App\Models\AppRiwayatStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppPengembalian extends Controller
{
    public function index()
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'unit' => 'required|array',
                'unit.*.id_unit' => 'required|integer|exists:app_unit_barang,id',
                'unit.*.status_baru' => 'required|integer|exists:app_status_unit,id',
                'unit.*.catatan' => 'nullable|string'
            ]);

            $pengajuan = AppPengajuan::with('unitBarang')->findOrFail($id);

            foreach ($request->unit as $u) {
                $unit = $pengajuan->unitBarang->where('id', $u['id_unit'])->firstOrFail();
                $statusAwal = $unit->id_status;

                $unit->id_status = $u['status_baru'];
                $unit->save();

                AppRiwayatStatus::create([
                    'id_unit_barang' => $unit->id,
                    'id_pengajuan' => $pengajuan->id,
                    'status_awal' => $statusAwal,
                    'status_baru' => $u['status_baru'],
                    'lokasi_unit' => $unit->id_lokasi,
                    'oleh' => Auth::id(),
                    'catatan' => $u['catatan'] ?? null,
                ]);
            }

            $onPinjam = $pengajuan->unitBarang->where('id_status', 2)->count();

            if ($onPinjam === 0) {
                $pengajuan->id_status = 6;
                $pengajuan->save();
            }

            return response()->json([
                'message' => 'Pengembalian berhasil diproses',
                'data' => $pengajuan->load('unitBarang')
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $pengembalian = AppPengajuan::with(['unitBarang.barang', 'unitBarang.kondisi', 'status'])
            ->where('id_pengguna', $id)
            ->whereHas('status', function ($s) {
                $s->where('status_pengajuan', 'Dipinjam');
            })->get();

        $data = $pengembalian->map(function ($item) {
            return [
                'id' => $item->id,
                'kode_pinjam' => 'Pengajuan #' . str_pad($item->id, 3, '0', STR_PAD_LEFT), //kode untuk id pengajuan => Pengajuan #00..$id
                'nama_barang' => $item->unitBarang->first()?->barang?->nama_barang ?? '-',
                'status' => $item->status->status === 'Disetujui' ? 'Dipinjam' : ($item->status->status ?? '-'),
                'pengembalian' => $item->tgl_kembali,
                'unit' => $item->unitBarang->map(function ($unit) {
                    return [
                        'id' => $unit->id,
                        'kode_unit' => $unit->kode_unit,
                        'no_seri' => $unit->no_seri,
                        'kondisi' => $unit->kondisi,
                    ];
                })
            ];
        });

        return response()->json($data, 200);
    }
}
