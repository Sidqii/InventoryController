<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class lookupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        $now = now();

        DB::table('app_kategori')->insert([
            ['kategori' => 'Laptop', 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Monitor', 'created_at' => $now, 'updated_at' => $now],
            ['kategori' => 'Router', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('app_jenis')->insert([
            ['jenis' => 'Elektronik', 'created_at' => $now, 'updated_at' => $now],
            ['jenis' => 'Jaringan', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('app_kondisi')->insert([
            ['kondisi' => 'Baik', 'created_at' => $now, 'updated_at' => $now],
            ['kondisi' => 'Rusak', 'created_at' => $now, 'updated_at' => $now],
            ['kondisi' => 'Perawatan', 'created_at' => $now, 'updated_at' => $now],
            ['kondisi' => 'Perbaikan', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('app_status')->insert([
            ['status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['status' => 'dipinjam', 'created_at' => $now, 'updated_at' => $now],
            ['status' => 'perbaikan', 'created_at' => $now, 'updated_at' => $now],
            ['status' => 'nonaktif', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('app_kepemilikan')->insert([
            ['tipe' => 'Aset Tetap', 'created_at' => $now, 'updated_at' => $now],
            ['tipe' => 'Pinjam Pakai', 'created_at' => $now, 'updated_at' => $now],
            ['tipe' => 'Sewa', 'created_at' => $now, 'updated_at' => $now],
            ['tipe' => 'Hibah', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('app_lokasi')->insert([
            ['nama_lokasi' => 'Gudang Utama', 'kode_lokasi' => 'GDG-001', 'keterangan' => 'Penyimpanan utama', 'created_at' => $now, 'updated_at' => $now],
            ['nama_lokasi' => 'Lab IT', 'kode_lokasi' => 'LAB-002', 'keterangan' => 'Uji perangkat', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('app_role')->insert([
            ['role' => 'Staff', 'created_at' => $now, 'updated_at' => $now],
            ['role' => 'Operator', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('app_jenis_perubahan')->insert([
            ['kode' => 'dipinjam', 'label' => 'Barang Dipinjam', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'kembali', 'label' => 'Barang Dikembalikan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'service', 'label' => 'Service / Perawatan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'mutasi', 'label' => 'Pindah Lokasi', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'rusak', 'label' => 'Rusak', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'penggantian', 'label' => 'Unit Diganti', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'lainnya', 'label' => 'Lainnya', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

}
