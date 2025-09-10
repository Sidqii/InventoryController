<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppStatusUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_status_unit')->insertOrIgnore([
            ['id' => 1, 'status_unit' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'status_unit' => 'Dipinjam', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'status_unit' => 'Perbaikan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'status_unit' => 'Perawatan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
