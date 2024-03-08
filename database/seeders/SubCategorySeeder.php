<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grocery = SubCategory::create([
            'name' => 'Staples',
            'slug'=>'stples',
            'category_id' => '1', 
        ]);
        $grocery = SubCategory::create([
            'name' => 'Kitchen',
            'slug'=>'kitchen',
            'category_id' => '1', 
        ]);
        $mobiles = SubCategory::create([
            'name' => 'Keypad',
            'slug'=>'keypad',
            'category_id' => '2', 
        ]);
        $mobiles = SubCategory::create([
            'name' => 'Smartphone',
            'slug'=>'smartphone',
            'category_id' => '2', 
        ]);
        $fashion = SubCategory::create([
            'name' => 'Shoes',
            'slug'=>'shoes',
            'category_id' => '3', 
        ]);
        $fashion = SubCategory::create([
            'name' => 'Clothes',
            'slug'=>'clothes',
            'category_id' => '3', 
        ]);
        $Electronic = SubCategory::create([
            'name' => 'Tv',
            'slug'=>'tv',
            'category_id' => '4', 
        ]);
        $Electronic = SubCategory::create([
            'name' => 'Computer',
            'slug'=>'computer',
            'category_id' => '4', 
        ]);
        // $furniture = SubCategory::create([
        //     'name' => 'Sofa',
        //     'slug'=>'sofa',
        //     'category_id' => '5', 
        // ]);
        // $furniture = SubCategory::create([
        //     'name' => 'Bed',
        //     'slug'=>'bed',
        //     'category_id' => '5', 
        // ]);
        // $furniture = SubCategory::create([
        //     'name' => 'Sofa',
        //     'slug'=>'sofa',
        //     'category_id' => '5', 
        // ]);
        // $furniture = SubCategory::create([
        //     'name' => 'Bed',
        //     'slug'=>'bed',
        //     'category_id' => '5', 
        // ]);
    }
}
