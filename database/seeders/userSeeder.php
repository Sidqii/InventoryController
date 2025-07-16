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
                'nama' => 'Enpio',
                'email' => 'user@mail.com',
                'password' => Hash::make('user123'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
