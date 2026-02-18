<?php

namespace Database\Seeders;

use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use Illuminate\Database\Seeder;

class InvenProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $atk    = Category::where('code', 'ATK')->first();
        $it     = Category::where('code', 'IT')->first();
        $furn   = Category::where('code', 'FURN')->first();

        $products = [
            [
                'code'          => 'ATK001',
                'name'          => 'Tipe x roll',
                'category_id'   => $atk->id,
                'description'   => '',
            ],
            [
                'code'          => 'ATK002',
                'name'          => 'Kertas A4',
                'category_id'   => $atk->id,
                'description'   => '',
            ],
            [
                'code'          => 'IT001',
                'name'          => 'Mouse Wireless',
                'category_id'   => $it->id,
                'description'   => '',
            ],
            [
                'code'          => 'IT002',
                'name'          => 'Keyboard Mechanical',
                'category_id'   => $it->id,
                'description'   => '',
            ],
            [
                'code'          => 'FURN001',
                'name'          => 'Kursi Kantor',
                'category_id'   => $furn->id,
                'description'   => '',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['code' => $product['code']],
                [
                    'name' => $product['name'],
                    'category_id' => $product['category_id'],
                    'description' => $product['description'],
                ]
            );
        }
    }
}
