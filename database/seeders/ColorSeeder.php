<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors=['black','red','white','blue'];
        foreach ($colors as $color) {
            Color::create([
                'id'=>uniqid(),
                'name'=>$color
            ]);
        }
    }
}
