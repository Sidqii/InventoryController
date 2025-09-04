<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_jenis')->insertOrIgnore([
            // Drone
            ['jenis' => 'Drone Recon', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Drone Combat', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Drone Mini', 'created_at' => now(), 'updated_at' => now()],

            // Server
            ['jenis' => 'Server Rack', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Server Blade', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Server Tower', 'created_at' => now(), 'updated_at' => now()],

            // Komunikasi
            ['jenis' => 'Radio HT', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Satcom', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Transceiver', 'created_at' => now(), 'updated_at' => now()],

            // Pengawasan
            ['jenis' => 'CCTV Dome', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'CCTV PTZ', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Thermal Cam', 'created_at' => now(), 'updated_at' => now()],

            // Navigasi
            ['jenis' => 'GPS Tracker', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Radar', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Compass', 'created_at' => now(), 'updated_at' => now()],

            // Enkripsi
            ['jenis' => 'Crypto Module', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'VPN Gateway', 'created_at' => now(), 'updated_at' => now()],

            // Laptop
            ['jenis' => 'Ultrabook', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Gaming Laptop', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Server Book', 'created_at' => now(), 'updated_at' => now()],

            // Monitor
            ['jenis' => 'LED Monitor', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'OLED Monitor', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Curved Monitor', 'created_at' => now(), 'updated_at' => now()],

            // Router
            ['jenis' => 'Mikrotik Router', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Cisco Router', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Huawei Router', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
