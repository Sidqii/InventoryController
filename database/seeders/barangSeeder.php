<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('app_barang')->insert([
            [
                'nama_barang' => 'Switch Cisco Catalyst 2960',
                'kode_barang' => 'ITM-SWC-001',
                'id_kategori' => 2,
                'id_jenis' => 1,
                'merk' => 'Cisco',
                'deskripsi' => 'Switch utama jaringan gedung A',
                'spesifikasi_teknis' => json_encode([
                    'port' => '24x Gigabit',
                    'uplink' => '2x SFP',
                    'power' => 'Internal PSU'
                ]),
                'tanggal_pengadaan' => '2024-05-10',
                'masa_garansi' => 12,
                'sumber_pengadaan' => 'APBN',
                'vendor' => 'PT TeknoIndonesia',
                'jumlah_total_unit' => 2,
                'catatan_perawatan' => 'Cek konektor tiap bulan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama_barang' => 'Laptop Lenovo ThinkPad',
                'kode_barang' => 'ITM-LPT-002',
                'id_kategori' => 3,
                'id_jenis' => 2,
                'merk' => 'Lenovo',
                'deskripsi' => 'Laptop untuk staff administrasi',
                'spesifikasi_teknis' => json_encode([
                    'cpu' => 'i5-1135G7',
                    'ram' => '16GB',
                    'storage' => '512GB SSD'
                ]),
                'tanggal_pengadaan' => '2025-01-05',
                'masa_garansi' => 24,
                'sumber_pengadaan' => 'APBD',
                'vendor' => 'PT SumberData',
                'jumlah_total_unit' => 3,
                'catatan_perawatan' => 'Instal update OS tiap 3 bulan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama_barang' => 'Printer Canon LBP2900',
                'kode_barang' => 'ITM-PRT-003',
                'id_kategori' => 4,
                'id_jenis' => 2,
                'merk' => 'Canon',
                'deskripsi' => 'Printer kantor bagian surat menyurat',
                'spesifikasi_teknis' => json_encode([
                    'type' => 'Laser',
                    'resolusi' => '600 dpi',
                    'koneksi' => 'USB'
                ]),
                'tanggal_pengadaan' => '2023-11-12',
                'masa_garansi' => 18,
                'sumber_pengadaan' => 'Hibah',
                'vendor' => 'CV MitraPrint',
                'jumlah_total_unit' => 1,
                'catatan_perawatan' => 'Ganti toner 6 bulan sekali',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama_barang' => 'UPS Prolink 1200VA',
                'kode_barang' => 'ITM-UPS-004',
                'id_kategori' => 5,
                'id_jenis' => 1,
                'merk' => 'Prolink',
                'deskripsi' => 'Backup listrik untuk server mini',
                'spesifikasi_teknis' => json_encode([
                    'kapasitas' => '1200VA',
                    'outlet' => '4x Universal',
                    'durasi' => '30 menit'
                ]),
                'tanggal_pengadaan' => '2024-09-25',
                'masa_garansi' => 12,
                'sumber_pengadaan' => 'APBN',
                'vendor' => 'PT PowerSafe',
                'jumlah_total_unit' => 2,
                'catatan_perawatan' => 'Cek baterai tiap bulan',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ]);
    }
}
