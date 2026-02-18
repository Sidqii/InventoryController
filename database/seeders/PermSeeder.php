<?php

namespace Database\Seeders;

use App\Models\RBAC\Permission;
use Illuminate\Database\Seeder;

use function Symfony\Component\Clock\now;

class PermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['code' => 'insert_item', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'update_item', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'delete_item', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'request_item', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'observe_item', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
