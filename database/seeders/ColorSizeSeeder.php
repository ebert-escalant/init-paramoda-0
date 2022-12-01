<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class ColorSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes=Size::all();
        foreach ($sizes as $size) {
            foreach ($size->colors as $color) {
                $color->sizes()->sync([
                    $size->id=>[
                        'id'=>uniqid()
                    ]
                ]);
            }
        }
    }
}
