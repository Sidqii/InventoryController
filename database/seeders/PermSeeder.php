<?php

namespace Database\Seeders;

use App\Models\RBAC\Permission;
use Illuminate\Database\Seeder;

class PermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['code' => 'insert_item'],
            ['code' => 'update_item'],
            ['code' => 'delete_item'],
            ['code' => 'request_item'],
            ['code' => 'observe_item'],
        ]);
    }
}
