<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_kategori')->insertOrIgnore([
            ['kategori' => 'Drone', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Server', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Komunikasi', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Pengawasan', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Navigasi', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Enkripsi', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Laptop', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Monitor', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Router', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
