<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::with('subcategory')->get();
        $products = Product::get();
        return view('user.pages.home.homepage')->with(compact('categories', 'products'));
    }
    public function abc($subcat)
    {
        $categories = Category::with('subcategory')->get();
        $products = Product::where('sub_category', $subcat)->get();
        return view('user.pages.home.products')->with(compact('categories', 'products'));
    }
}
