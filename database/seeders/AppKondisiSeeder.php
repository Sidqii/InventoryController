<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppKondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_kondisi')->insertOrIgnore([
            ['kondisi' => 'baik', 'created_at' => now(), 'updated_at' => now()],
            ['kondisi' => 'rusak', 'created_at' => now(), 'updated_at' => now()],
            ['kondisi' => 'perawatan', 'created_at' => now(), 'updated_at' => now()],
            ['kondisi' => 'perbaikan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
