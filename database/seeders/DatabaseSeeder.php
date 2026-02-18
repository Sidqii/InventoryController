<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermSeeder::class,
            SeederPivotPermRole::class,
            UserSeeder::class,
            SeederPivotUserRole::class,
            InvenCategorySeeder::class,
            InvenProductSeeder::class,
            InventoriesSeeder::class,
        ]);
    }
}
