<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil mapping kategori & jenis dari DB
        $kategori = DB::table('app_kategori')->pluck('id', 'kategori');
        $jenis    = DB::table('app_jenis')->pluck('id', 'jenis');

        DB::table('app_barang')->insertOrIgnore([
            // DRONE
            [
                'nama_barang'   => 'Drone Recon X6',
                'kode_barang'   => 'DRN-001',
                'id_kategori'   => $kategori['Drone'] ?? null,
                'id_jenis'      => $jenis['Drone Recon'] ?? null,
                'merk'          => 'DJI',
                'spek_barang'   => 'Kamera HD, 40 menit terbang, GPS tracking',
                'deskripsi'     => 'Drone pengintai jarak jauh',
                'tgl_pengadaan' => Carbon::parse('2023-05-01'),
                'garansi'       => 24,
                'sumber_barang' => 'APBN',
                'vendor'        => 'PT AeroTech',
                'note_perawatan' => 'Cek propeller setiap 50 jam terbang',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'nama_barang'   => 'Drone Combat C9',
                'kode_barang'   => 'DRN-002',
                'id_kategori'   => $kategori['Drone'] ?? null,
                'id_jenis'      => $jenis['Drone Combat'] ?? null,
                'merk'          => 'Parrot',
                'spek_barang'   => 'Payload 2kg, sensor inframerah',
                'deskripsi'     => 'Drone tempur jarak menengah',
                'tgl_pengadaan' => Carbon::parse('2024-02-12'),
                'garansi'       => 12,
                'sumber_barang' => 'APBD',
                'vendor'        => 'PT SkyForce',
                'note_perawatan' => 'Kalibrasi sensor tiap 3 bulan',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            // SERVER
            [
                'nama_barang'   => 'Server Rack Dell R740',
                'kode_barang'   => 'SRV-001',
                'id_kategori'   => $kategori['Server'] ?? null,
                'id_jenis'      => $jenis['Server Rack'] ?? null,
                'merk'          => 'Dell',
                'spek_barang'   => '2x Xeon Gold, RAM 128GB, Storage 4TB SSD',
                'deskripsi'     => 'Server utama data center',
                'tgl_pengadaan' => Carbon::parse('2022-11-15'),
                'garansi'       => 36,
                'sumber_barang' => 'APBN',
                'vendor'        => 'PT DataIndo',
                'note_perawatan' => 'Update firmware tiap 6 bulan',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            // KOMUNIKASI
            [
                'nama_barang'   => 'Radio HT Motorola GP328',
                'kode_barang'   => 'KOM-001',
                'id_kategori'   => $kategori['Komunikasi'] ?? null,
                'id_jenis'      => $jenis['Radio HT'] ?? null,
                'merk'          => 'Motorola',
                'spek_barang'   => 'UHF/VHF, daya tahan baterai 12 jam',
                'deskripsi'     => 'Radio komunikasi lapangan',
                'tgl_pengadaan' => Carbon::parse('2023-01-20'),
                'garansi'       => 12,
                'sumber_barang' => 'Hibah',
                'vendor'        => 'PT Commsindo',
                'note_perawatan' => 'Ganti baterai tiap 2 tahun',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            // MONITOR
            [
                'nama_barang'   => 'Monitor Dell 27” LED',
                'kode_barang'   => 'MON-001',
                'id_kategori'   => $kategori['Monitor'] ?? null,
                'id_jenis'      => $jenis['LED Monitor'] ?? null,
                'merk'          => 'Dell',
                'spek_barang'   => 'Resolusi 2560x1440, refresh rate 75Hz',
                'deskripsi'     => 'Monitor kerja staf IT',
                'tgl_pengadaan' => Carbon::parse('2023-07-18'),
                'garansi'       => 24,
                'sumber_barang' => 'APBN',
                'vendor'        => 'PT VisualTech',
                'note_perawatan' => 'Bersihkan layar dengan microfiber',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
