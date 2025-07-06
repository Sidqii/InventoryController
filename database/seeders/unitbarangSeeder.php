<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class unitbarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('app_unit_barang')->insert([
            [
                'id_barang' => 1,
                'id_kepemilikan' => 1,
                'kode_unit' => 'UNT-LPT-001-A',
                'no_seri' => 'SN-LEN-001A',
                'id_kondisi' => 1,
                'id_status' => 1,
                'id_lokasi' => 1,
                'tgl_terima' => '2023-03-17',
                'ket_unit' => 'Digunakan oleh staf TI A',
                'foto' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id_barang' => 1,
                'id_kepemilikan' => 1,
                'kode_unit' => 'UNT-LPT-001-B',
                'no_seri' => 'SN-LEN-001B',
                'id_kondisi' => 1,
                'id_status' => 1,
                'id_lokasi' => 2,
                'tgl_terima' => '2023-03-18',
                'ket_unit' => 'Cadangan di Lab IT',
                'foto' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id_barang' => 2,
                'id_kepemilikan' => 2,
                'kode_unit' => 'UNT-RT-001-A',
                'no_seri' => 'SN-MTK-001A',
                'id_kondisi' => 1,
                'id_status' => 1,
                'id_lokasi' => 1,
                'tgl_terima' => '2022-08-25',
                'ket_unit' => 'Router utama gedung A',
                'foto' => null,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
