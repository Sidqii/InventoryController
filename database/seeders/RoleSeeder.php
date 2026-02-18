<?php

namespace Database\Seeders;

use App\Models\RBAC\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['code' => 'ADMIN'],
            ['code' => 'OPERATOR'],
            ['code' => 'EMPLOYEE'],
        ]);
    }
}
