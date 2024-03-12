<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::create([
            'title'=>'AASHIRVAAD (Genhu Ka Atta)  (10 kg)',
            'description'=>"Aashirvaad Shudh Chakki Atta is India's No. 1 atta brand. The 4-step advantage process of sourcing, cleaning, grinding & no-touch packaging ensures zero human contact. 100% pure whole wheat atta ",
            'price'=>'1100',
            'image' =>'0ashirwad.jpeg',
            'quantity'=>'10',
            'category'=>'1',
            'sub_category'=>'1',
            'user_id'=>'1',
            'status'=>'active',
        ]);
        $product = Product::create([
            'title'=>'OMEGA Steel Dinner Fork',
            'description'=>"Bank OfferGet ₹25* instant discount for the 1st Flipkart Order using Flipkart UPI T&C Bank Offer5% Cashback on Flipkart Axis Bank Card",
             'price'=>'100',
            'image' =>'0forg.jpg',
            'quantity'=>'10',
            'category'=>'1',
            'sub_category'=>'2',
            'user_id'=>'1',
            'status'=>'active',
        ]);

      
        $product = Product::create([
            'title'=>'Nokia 1100  (Gray)',
            'description'=>'Want to gift your grandmother a phone which is easy to use and compact? Then this Nokia 215 is what she needs.',
            'price'=>'1100',
            'image' =>'0nokia1100.jpeg',
            'quantity'=>'10',
            'category'=>'2',
            'sub_category'=>'3',
            'user_id'=>'1',
            'status'=>'active',
        ]);
        $product = Product::create([
            'title'=>'vivo Y28 5G (Glitter Aqua, 128 GB)',
            'description'=>"Get brand authorised repairs for all phone damages with free pickup and drop. If we can't repair it, we will replace it",
            'price'=>'14000',
            'image' =>'0vivo-y28.jpg',
            'quantity'=>'10',
            'category'=>'2',
            'sub_category'=>'4',
            'user_id'=>'1',
            'status'=>'active',
        ]);
        $product = Product::create([
            'title'=>'Sneakers For Men  (White)',
            'description'=>"Get brand authorised repairs for all phone damages with free pickup and drop. If we can't repair it, we will replace it",
             'price'=>'1400',
            'image' =>'0shoes.jpg',
            'quantity'=>'100',
            'category'=>'3',
            'sub_category'=>'5',
            'user_id'=>'1',
            'status'=>'active',
        ]);
        $product = Product::create([
            'title'=>'Men Skinny Mid Rise Black Jeans',
            'description'=>"Get brand authorised repairs for all phone damages with free pickup and drop. If we can't repair it, we will replace it",
             'price'=>'1800',
            'image' =>'0jeans.png',
            'quantity'=>'10',
            'category'=>'3',
            'sub_category'=>'6',
            'user_id'=>'2',
            'status'=>'active',
        ]);
        $product = Product::create([
            'title'=>'SONY Bravia X74L 138.8 cm',
            'description'=>"Get brand authorised repairs for all phone damages with free pickup and drop. If we can't repair it, we will replace it",
             'price'=>'18000',
            'image' =>'0tv.jpg',
            'quantity'=>'10',
            'category'=>'4',
            'sub_category'=>'7',
            'user_id'=>'2',
            'status'=>'active',
        ]);
    }
}
