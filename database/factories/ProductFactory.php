<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->sentence(2);
        $category=Category::all()->random();
        $brand=$category->brands->random();
        return [
            'id'=>uniqid(),
            'name'=>$name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->text(),
            'price'=>$this->faker->randomElement([19.99,49.99,99.99]),
            'status'=>2,
            'category_id'=>$category->id,
            'brand_id'=>$brand->id,
        ];
    }
}
