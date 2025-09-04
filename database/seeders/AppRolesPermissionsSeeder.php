<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppRolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = DB::table('app_roles')->pluck('id', 'peran');
        $perms = DB::table('app_permissions')->pluck('id', 'hak_akses');

        $mappings = [
            'admin' => [
                'kelola barang',
                'kelola unit',
                'proses pengajuan',
                'ubah status',
                'lihat laporan',
                'kelola akun',
            ],
            'atasan' => [
                'proses pengajuan',
                'lihat laporan'
            ],
            'operator' => [
                'kelola unit',
                'proses pengajuan',
                'ubah status',
            ],
            'teknisi' => [
                'kelola unit',
                'ubah status',
            ],
            'staff' => [
                'proses pengajuan',
            ],
        ];

        foreach ($mappings as $role => $hakList) {
            $roleId = $roles[$role] ?? null;

            if (!$roleId) continue;

            foreach ($hakList as $hak) {
                $permId = $perms[$hak] ?? null;

                if (!$permId) continue;

                $exists = DB::table('app_roles_permissions')
                    ->where('id_peran', $roleId)
                    ->where('id_akses', $permId)
                    ->exists();

                if (!$exists) {
                    DB::table('app_roles_permissions')->insert([
                        'id_peran' => $roleId,
                        'id_akses' => $permId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
