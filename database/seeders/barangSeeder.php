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
                'nama_barang' => 'Laptop Lenovo ThinkPad',
                'kode_barang' => 'ITM-LPT-001',
                'id_kategori' => 1,
                'id_jenis' => 1,
                'merk' => 'Lenovo',
                'deskripsi' => 'Laptop andalan tim IT',
                'spesifikasi_teknis' => json_encode([
                    'prosesor' => 'Intel Core i5',
                    'ram' => '8GB',
                    'storage' => '512GB SSD',
                    'os' => 'Windows 11'
                ]),
                'tanggal_pengadaan' => '2023-03-15',
                'masa_garansi' => 24,
                'sumber_pengadaan' => 'APBN',
                'vendor' => 'PT. Teknologi Jaya',
                'jumlah_total_unit' => 3,
                'catatan_perawatan' => 'Service berkala setiap 6 bulan',
                'status_aktif' => true,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_barang' => 'Router Mikrotik RB4011',
                'kode_barang' => 'ITM-RT-001',
                'id_kategori' => 3,
                'id_jenis' => 2,
                'merk' => 'Mikrotik',
                'deskripsi' => 'Router utama gedung A',
                'spesifikasi_teknis' => json_encode([
                    'port' => '10x Gigabit',
                    'sfp' => '1x SFP+',
                    'os' => 'RouterOS'
                ]),
                'tanggal_pengadaan' => '2022-08-20',
                'masa_garansi' => 12,
                'sumber_pengadaan' => 'Hibah',
                'vendor' => 'CV. Jaringan Hebat',
                'jumlah_total_unit' => 2,
                'catatan_perawatan' => 'Cek suhu setiap bulan',
                'status_aktif' => true,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
