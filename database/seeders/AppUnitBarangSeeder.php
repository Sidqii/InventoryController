<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppUnitBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = DB::table('app_barang')->pluck('id', 'kode_barang'); // contoh: ['DRN-001' => 1, ...]
        $kep = DB::table('app_kepemilikan')->pluck('id', 'jenis_kepemilikan');
        $status = DB::table('app_status_unit')->pluck('id', 'status_unit');
        $lokasi = DB::table('app_lokasi')->pluck('id', 'kode_lokasi');
        $kondisi = DB::table('app_kondisi')->pluck('id', 'kondisi');

        $rows = [];
        $counter = 1;

        // Bagi rata ke semua barang
        foreach ($barang as $kodeBarang => $idBarang) {
            for ($i = 1; $i <= 10; $i++) { // misalnya 10 unit per barang → kalau ada 5 barang = 50 unit
                $rows[] = [
                    'kode_unit' => $kodeBarang . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'no_seri' => 'SN-' . strtoupper($kodeBarang) . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'id_barang' => $idBarang,
                    'id_kepemilikan' => $kep['Milik Sendiri'] ?? $kep->first(),
                    'id_status' => $status['Tersedia'] ?? $status->first(),
                    'id_lokasi' => $lokasi['GDP'] ?? $lokasi->first(),
                    'id_kondisi' => $kondisi['baik'] ?? $kondisi->first(),
                    'foto' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $counter++;
                if ($counter > 50) break; // stop di 50 unit total
            }
            if ($counter > 50) break;
        }

        foreach ($rows as $row) {
            DB::table('app_unit_barang')->updateOrInsert(
                ['kode_unit' => $row['kode_unit']],
                $row
            );
        }
    }
}
