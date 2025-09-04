<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_status')->insertOrIgnore([
            ['status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Dipinjam', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Disetujui', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Ditolak', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Perawatan', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Perbaikan', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Dikembalikan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
