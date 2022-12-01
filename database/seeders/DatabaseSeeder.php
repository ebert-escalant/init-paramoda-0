<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('categories');
        Storage::disk('public')->deleteDirectory('products');

        Storage::disk('public')->makeDirectory('categories');
        Storage::disk('public')->makeDirectory('products');

        User::create([
            'name'=>'Ebert Escalante',
            'email'=>'ebertescalant@gmail.com',
            'password'=>bcrypt('123456789')
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            SizeSeeder::class,
            ProductSizeSeeder::class,
            ColorSeeder::class,
            ColorProductSeeder::class,
            ColorSizeSeeder::class
        ]);
    }
}
