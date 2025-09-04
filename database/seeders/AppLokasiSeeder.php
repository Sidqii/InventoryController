<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_lokasi')->insertOrIgnore([
            [
                'nama_lokasi' => 'Gudang Pusat',
                'kode_lokasi' => 'GDP',
                'keterangan'  => 'Tempat penyimpanan utama',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_lokasi' => 'Ruang IT',
                'kode_lokasi' => 'RIT',
                'keterangan'  => 'Ruang untuk peralatan IT',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_lokasi' => 'Ruang Operasi',
                'kode_lokasi' => 'ROP',
                'keterangan'  => 'Peralatan operasional lapangan',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_lokasi' => 'Ruang Server',
                'kode_lokasi' => 'RSR',
                'keterangan'  => 'Khusus server & jaringan',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
