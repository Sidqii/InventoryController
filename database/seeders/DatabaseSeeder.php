<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AppRolesSeeder::class,
            AppPermissionsSeeder::class,
            AppRolesPermissionsSeeder::class,
            AppUsersSeeder::class,
            AppKategoriSeeder::class,
            AppJenisSeeder::class,
            AppKepemilikanSeeder::class,
            AppKondisiSeeder::class,
            AppStatusSeeder::class,
            AppLokasiSeeder::class,
            AppBarangSeeder::class,
            AppUnitBarangSeeder::class,
        ]);
    }
}
