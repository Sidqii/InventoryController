<?php

namespace Database\Seeders;

use App\Models\RBAC\Role;
use Illuminate\Database\Seeder;

use function Symfony\Component\Clock\now;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['code' => 'ADMIN', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'OPERATOR', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'EMPLOYEE', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
