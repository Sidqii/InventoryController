<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'code' => 'ADM00001',
            'email' => 'admin@mail.com',
            'password' => 'admin123',
            'department' => 'OPS.co',
        ]);
    }
}
