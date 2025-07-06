<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_user')->insert([
            [
                'nama' => 'Admin Operator',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin123'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Staff A',
                'email' => 'staff@mail.com',
                'password' => Hash::make('staff123'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
