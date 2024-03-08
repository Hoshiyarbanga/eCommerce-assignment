<?php

namespace Database\Seeders;

use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grocery =  Category::create([
            'name' => 'Grocery',
            'slug'=>'grocery',
            'image' => 'grocery.png', // Example path to the image
        ]);
        $mobile =  Category::create([
            'name' => 'Mobiles',
            'slug'=>'mobile',
            'image' => 'mobiles.png', // Example path to the image
        ]);
        $fashion =  Category::create([
            'name' => 'Fashion',
            'slug'=>'fashion',
            'image' => 'fashion.png', // Example path to the image
        ]);
        $elctronic =  Category::create([
            'name' => 'Elctronics',
            'slug'=>'eletronics',
            'image' => 'elctronic.png', // Example path to the image
        ]);
        $home =  Category::create([
            'name' => 'Home & Furniure',
            'slug'=>'home$furniture',
            'image' => 'home.png', // Example path to the image
        ]);
        $appliances =  Category::create([
            'name' => 'Appliences',
            'slug'=>'applience',
            'image' => 'appilence.png', // Example path to the image
        ]);
        $travel =  Category::create([
            'name' => 'Travel',
            'slug'=>'travel',
            'image' => 'travel.png', // Example path to the image
        ]);
        $toys =  Category::create([
            'name' => 'Toys',
            'slug'=>'toys',
            'image' => 'toys.png', // Example path to the image
        ]);
    }
}
