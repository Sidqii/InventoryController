<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppStatusPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_status_pengajuan')->insertOrIgnore([
            ['id' => 1, 'status_pengajuan' => 'Ditolak', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'status_pengajuan' => 'Selesai', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'status_pengajuan' => 'Pengajuan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'status_pengajuan' => 'Dipinjam', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'status_pengajuan' => 'Pengembalian', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'status_pengajuan' => 'Dikembalikan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
