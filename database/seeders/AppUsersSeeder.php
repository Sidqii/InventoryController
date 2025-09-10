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
                'instansi' => 'OPS.co',
                'password' => Hash::make('admin123'),
                'id_peran' => $roles['admin'] ?? null,
            ],
            [
                'nama' => 'Lewis',
                'email' => 'atasan@mail.com',
                'instansi' => 'OPS.co',
                'password' => Hash::make('atasan123'),
                'id_peran' => $roles['atasan'] ?? null,
            ],

            //Operator
            [
                'nama' => 'George',
                'email' => 'george@mail.com',
                'instansi' => 'OPS.co',
                'password' => Hash::make('george123'),
                'id_peran' => $roles['operator'] ?? null,
            ],
            [
                'nama' => 'Pierre',
                'email' => 'pierre@mail.com',
                'instansi' => 'BLCK.co',
                'password' => Hash::make('pierre123'),
                'id_peran' => $roles['operator'] ?? null,
            ],

            //Teknisi
            [
                'nama' => 'Linus',
                'email' => 'linus@mail.com',
                'instansi' => 'OPS.co',
                'password' => Hash::make('linus123'),
                'id_peran' => $roles['teknisi'] ?? null,
            ],
            [
                'nama' => 'Demetri',
                'email' => 'demitri@mail.com',
                'instansi' => 'BLCK.co',
                'password' => Hash::make('demitri123'),
                'id_peran' => $roles['teknisi'] ?? null,
            ],

            //Staff
            [
                'nama' => 'Kent',
                'email' => 'kent@mail.com',
                'instansi' => 'OPS.co',
                'password' => Hash::make('kent123'),
                'id_peran' => $roles['staff'] ?? null,
            ],
            [
                'nama' => 'Willy',
                'email' => 'willy@mail.com',
                'instansi' => 'BLCK.co',
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
