<?php

namespace Database\Seeders;

use App\Models\Inventory\Inventory;
use App\Models\Inventory\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            Inventory::updateOrCreate(
                ['product_id' => $product->id],
                ['quantity' => rand(10, 100)],
            );
        }
    }
}
