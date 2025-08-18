<?php

namespace App\Http\Controllers;

use App\Models\model_pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\model_pengajuan_unit;
use App\Models\model_riwayat_status;
use App\Models\model_unitbarang;
use Illuminate\Support\Carbon;

class ctrl_pengembalian extends Controller
{
    private int $STATUS_UNIT_AKTIF = 1;
    private int $STATUS_UNIT_PINJAM = 2;
    private int $STATUS_PENGAJUAN_RETURNED = 5;

    public function update(Request $request, $id_unit)
    {
        $request->validate([
            'id_jenis_perubahan' => 'required|exists:app_jenis_perubahan,id',
            'id_status_unit' => 'required|integer|exists:app_status,id',
            'id_user' => 'required|exists:app_user,id',
            'catatan' => 'nullable|string',
        ]);

        if ((int) $request->id_status_unit !== $this->STATUS_UNIT_AKTIF) {
            return response()->json(['message' => 'Status unti pengembalian bukan aktif (1)'], 422);
        }

        $now = Carbon::now();

        return DB::transaction(function () use ($id_unit, $request, $now) {
            $unit = model_unitbarang::where('id', $id_unit)->lockForUpdate()->firstOrFail();

            $statusAwal = (int) $unit->id_status;
            $lokasiAwal = $unit->id_lokasi;

            if ($statusAwal !== $this->STATUS_UNIT_PINJAM) {
                return response()->json(['message' => 'Unit tidak dalam status dipinjam.'], 422);
            }

            $detail = model_pengajuan_unit::where('id_unit_barang', $unit->id)->whereNull('returned_at')->lockForUpdate()->latest('id')->first();

            if (!$detail) {
                return response()->json(['message' => 'Tidak ada pengajuan unit aktif'], 422);
            }

            $unit->id_status = $this->STATUS_UNIT_AKTIF;
            $unit->updated_at = $now;
            $unit->save();

            $detail->returned_at = $now;
            $detail->updated_at = $now;
            $detail->save();

            model_riwayat_status::create([
                'id_unit_barang' => $unit->id,
                'id_jenis_perubahan' => (int) $request->id_jenis_perubahan,
                'status_awal' => $statusAwal,
                'status_baru' => $this->STATUS_UNIT_AKTIF,
                'lokasi_awal' => $lokasiAwal,
                'lokasi_baru' => $lokasiAwal,
                'tanggal' => $now,
                'oleh' => (int) $request->id_user,
                'catatan' => $request->catatan,
                'lampiran' => null,
                'id_pengajuan' => $detail->id_pengajuan,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $pengajuan = model_pengajuan::where('id', $detail->id_pengajuan)->lockForUpdate()->first();
            if ($pengajuan) {
                $masihAdaYangBelumKembali = model_pengajuan_unit::where('id_pengajuan', $pengajuan->id)
                    ->whereNull('returned_at')
                    ->exists();

                if (!$masihAdaYangBelumKembali) {
                    $pengajuan->id_status = $this->STATUS_PENGAJUAN_RETURNED; // 5
                    $pengajuan->updated_at = $now;
                    $pengajuan->save();
                }
            }

            return response()->json([
                'message' => 'Pengembalian barang berhasil dicatat.',
                'data' => [
                    'id_unit_barang' => $unit->id,
                    'id_pengajuan' => $detail->id_pengajuan,
                    'returned_at' => $now->toDateTimeString(),
                    'status_after' => $this->STATUS_UNIT_AKTIF,
                ]
            ], 200);
        });
    }
}
