<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AppUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = DB::table('app_roles')->pluck('id', 'peran');

        $users = [

            //Atasan seed
            [
                'nama' => 'Morris',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin123'),
                'id_peran' => $roles['admin'] ?? null,
            ],
            [
                'nama' => 'Lewis',
                'email' => 'atasan@mail.com',
                'password' => Hash::make('atasan123'),
                'id_peran' => $roles['atasan'] ?? null,
            ],

            //Operator
            [
                'nama' => 'George',
                'email' => 'george@mail.com',
                'password' => Hash::make('george123'),
                'id_peran' => $roles['operator'] ?? null,
            ],
            [
                'nama' => 'Pierre',
                'email' => 'pierre@mail.com',
                'password' => Hash::make('pierre123'),
                'id_peran' => $roles['operator'] ?? null,
            ],

            //Teknisi
            [
                'nama' => 'Linus',
                'email' => 'linus@mail.com',
                'password' => Hash::make('linus123'),
                'id_peran' => $roles['teknisi'] ?? null,
            ],
            [
                'nama' => 'Demetri',
                'email' => 'demitri@mail.com',
                'password' => Hash::make('demitri123'),
                'id_peran' => $roles['teknisi'] ?? null,
            ],

            //Staff
            [
                'nama' => 'Kent',
                'email' => 'kent@mail.com',
                'password' => Hash::make('kent123'),
                'id_peran' => $roles['staff'] ?? null,
            ],
            [
                'nama' => 'Willy',
                'email' => 'willy@mail.com',
                'password' => Hash::make('willy123'),
                'id_peran' => $roles['staff'] ?? null,
            ],
        ];

        foreach ($users as $user) {
            DB::table('app_users')->updateOrInsert(
                ['email' => $user['email']],
                $user,
            );
        }
    }
}
