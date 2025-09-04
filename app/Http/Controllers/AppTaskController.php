<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\AppPengajuan;
use App\Models\AppRiwayatStatus;
use App\Models\AppUsers;

class AppTaskController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $data = AppUsers::where('email', $request->email)->first();

            if (!$data || !Hash::check($request->password, $data->password)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Email atau Password salah',
                ], 401);
            }

            return response()->json([
                'status' => 200,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function persetujuan(Request $request, $id)
    {
        try {
            $request->validate([
                'status_id' => 'required|integer|exists:app_status,id',
                'catatan' => 'nullable|string',
            ]);

            $statusPengajuanId = $request->status_id;
            $catatan = $request->catatan;

            $mapUnit = [
                3 => 2, //disetujui => dipinjam
                4 => 1, //ditolak => tersedia
                5 => 5, //perawatan => perawatan
                6 => 6, //perbaikan => perbaikan
                8 => 1, //dikembalikan => tersedia
            ];

            $statusBaru = $mapUnit[$statusPengajuanId] ?? null;

            $pengajuan = AppPengajuan::with('unitBarang')->findOrFail($id);
            $pengajuan->id_status = $statusPengajuanId;
            $pengajuan->save();

            foreach ($pengajuan->unitBarang as $unit) {
                $statusAwal = $unit->id_status;

                if ($statusBaru) {
                    $unit->id_status = $statusBaru;
                    $unit->save();
                }

                AppRiwayatStatus::create([
                    'id_unit_barang' => $unit->id,
                    'id_pengajuan' => $pengajuan->id,
                    'status_awal' => $statusAwal,
                    'status_baru' => $statusBaru,
                    'lokasi_unit' => $unit->id_lokasi,
                    'oleh' => Auth::id(),
                    'catatan' => $catatan,
                ]);
            }

            return response()->json([
                'message' => 'Persetujuan berhasil diproses',
                'data' => $pengajuan->load('unitBarang'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function indexPengembalian()
    {
        $pengembalian = AppPengajuan::with(['unitBarang.barang', 'unitBarang.kondisi', 'status'])->whereHas('status', function ($q) {
            $q->where('status', 'Disetujui');
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


    public function ajukanPengembalian(Request $request, $id)
    {
        try {
            $pengajuan = AppPengajuan::with('unitBarang')->findOrFail($id);

            $pengajuan->id_status = 7;
            $pengajuan->save();

            return response()->json([
                'message' => 'Pengembalian diajukan, menunggu verifikasi',
                'data' => $pengajuan,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function prosesPengembalian(Request $request, $id)
    {
        try {
            $request->validate([
                'unit' => 'required|array',
                'unit.*.id_unit' => 'required|integer|exists:app_unit_barang,id',
                'unit.*.status_baru' => 'required|integer|exists:app_status,id',
                'unit.*.catatan' => 'nullable|string',
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

            $pengajuan->id_status = 8;
            $pengajuan->save();

            return response()->json([
                'message' => 'Verifikasi berhasil',
                'data' => $pengajuan->load('unitBarang'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
