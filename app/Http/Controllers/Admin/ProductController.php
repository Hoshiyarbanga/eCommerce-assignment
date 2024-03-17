<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $products = Product::where('user_id', $user_id)->get();
        return view('admin.pages.products.index')->with(compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $sub_cat = SubCategory::get();
        return view('admin.pages.products.create')->with(compact('categories', 'sub_cat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'quantity' => 'required',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('assets/images/products'), $imageName);
        Product::create([
            'title' => $request->title, 'description' => $request->description,
            'price' => $request->price, 'image' => $imageName,
            'category' => $request->category, 'sub_category' => $request->sub_category,
            'quantity' => $request->quantity,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success',  __('messages.flash.create', ['var' => 'Product' ]));
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::get();
        $sub_cat = SubCategory::get();
        return view('admin.pages.products.edit')->with(compact('product', 'categories', 'sub_cat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'quantity' => 'required',
        ]);
        $product = Product::where('id', $id)->first();
        $product->update([
            'title' => $request->title, 'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category, 'sub_category' => $request->sub_category,
            'quantity' => $request->quantity,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('view-products')->with('update',  __('messages.flash.update', ['var' => 'Product' ]));
    }

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back()->with('delete',  __('messages.flash.delete', ['var' => 'Product' ]));
    }
}
