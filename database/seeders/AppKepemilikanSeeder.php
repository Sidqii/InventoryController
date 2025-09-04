<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppKepemilikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_kepemilikan')->insertOrIgnore([
            ['jenis_kepemilikan' => 'Milik Sendiri', 'created_at' => now(), 'updated_at' => now()],
            ['jenis_kepemilikan' => 'Hibah', 'created_at' => now(), 'updated_at' => now()],
            ['jenis_kepemilikan' => 'Pinjaman', 'created_at' => now(), 'updated_at' => now()],
            ['jenis_kepemilikan' => 'Inventaris Nasional', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
