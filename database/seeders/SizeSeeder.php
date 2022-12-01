<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes=['Talla S','Talla M','Talla L','Talla XL'];
        foreach($sizes as $size){
            $size=Size::create([
                'id'=>uniqid(),
                'name'=>$size
            ]);
        }
        
    }
}
