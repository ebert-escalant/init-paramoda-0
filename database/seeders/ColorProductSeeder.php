<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;
class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=Product::all();
        foreach ($products as $product) {
            foreach ($product->colors as $color) {
                $color->products()->sync([
                    $product->id=>[
                        'id'=>uniqid()
                    ]
                ]);
            }
        }
    }
}
