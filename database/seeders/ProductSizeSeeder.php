<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=Product::all();
        $sizes=Size::all();
        foreach ($products as $product) {
            foreach ($sizes as $size) {
                $product->sizes()->sync([
                    $size->id=>[
                        'id'=>uniqid()
                    ]
                ]);
            }
        }
    }
}
