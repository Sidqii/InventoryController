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
            // lookupSeeder::class,
            userSeeder::class,
            // barangSeeder::class,
            // unitbarangSeeder::class
        ]);
    }
}
