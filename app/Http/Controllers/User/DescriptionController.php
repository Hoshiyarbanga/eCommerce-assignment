<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function index($id)
    {
        $products = Product::find($id);
        return view('user.pages.home.description')->with(compact('products'));
    }
}
