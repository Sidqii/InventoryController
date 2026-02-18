<?php

namespace Database\Seeders;

use App\Models\Inventory\Category;
use Illuminate\Database\Seeder;

class InvenCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['code' => 'ATK', 'name' => 'Alat Tulis Kantor'],
            ['code' => 'FURN', 'name' => 'Furniture'],
            ['code' => 'IT', 'name' => 'IT Equipment'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['code' => $category['code']],
                ['name' => $category['name']],
            );
        }
    }
}
