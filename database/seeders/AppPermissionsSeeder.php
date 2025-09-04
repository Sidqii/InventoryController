<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_permissions')->insertOrIgnore([
            ['hak_akses' => 'kelola barang', 'created_at' => now(), 'updated_at' => now()],
            ['hak_akses' => 'kelola unit', 'created_at' => now(), 'updated_at' => now()],
            ['hak_akses' => 'proses pengajuan', 'created_at' => now(), 'updated_at' => now()],
            ['hak_akses' => 'ubah status', 'created_at' => now(), 'updated_at' => now()],
            ['hak_akses' => 'lihat laporan', 'created_at' => now(), 'updated_at' => now()],
            ['hak_akses' => 'kelola akun', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
