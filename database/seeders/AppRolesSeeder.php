<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_roles')->insertOrIgnore([
            ['peran' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['peran' => 'atasan', 'created_at' => now(), 'updated_at' => now()],
            ['peran' => 'operator', 'created_at' => now(), 'updated_at' => now()],
            ['peran' => 'teknisi', 'created_at' => now(), 'updated_at' => now()],
            ['peran' => 'staff', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
