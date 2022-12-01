<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            [
                'id'=>uniqid(),
                'name'=>'Mujeres',
                'slug'=>Str::slug('Mujeres'),
                'icon'=>'<i class="fas fa-tshirt"></i>'
            ],
            [
                'id'=>uniqid(),
                'name'=>'Hombres',
                'slug'=>Str::slug('Hombres'),
                'icon'=>'<i class="fas fa-tshirt"></i>'
            ],
            [
                'id'=>uniqid(),
                'name'=>'Lentes',
                'slug'=>Str::slug('Lentes'),
                'icon'=>'<i class="fas fa-glasses"></i>'
            ],
            [
                'id'=>uniqid(),
                'name'=>'Relojes',
                'slug'=>Str::slug('Relojes'),
                'icon'=>'<i class="fas fa-clock"></i>'
            ],
        ];
        foreach($categories as $category){
            $category=Category::factory(1)->create($category)->first();
            $brands=Brand::factory(4)->create();
            foreach ($brands as $brand) {
                $brand->categories()->sync([
                    $category->id=>[
                        'id'=>uniqid()
                    ]
                ]);
            }
        }
    }
}
