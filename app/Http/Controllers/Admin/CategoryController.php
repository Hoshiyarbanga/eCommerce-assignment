<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.pages.category.index')->with(compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.category.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'image' => 'required',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('assets/images/category'), $imageName);
            $category = Category::create([
                'name' => $request->name, 'slug' => $request->slug,
                'image' => $imageName,
            ]);
            return redirect()->back()->with('success', __('messages.flash.create', ['var' => 'Category']));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went Wrong');
        }
    }

    public function edit($id)
    {
        try {
            $categories = Category::where('id', $id)->first();
            return view('admin.pages.category.edit')->with(compact('categories'));
        } catch (Exception $e) {
            return view('errors.error.404');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
            ]);
            $category = Category::where('id', $id)->first();
            $category->update([
                'name' => $request->name,
                'slug' => $request->slug,
            ]);
            return redirect()->route('view-category')->with('update',  __('messages.flash.update', ['var' => 'Category']));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went Wrong');
        }
    }

    public function delete($id)
    {
        try {
            DB::table('categories')->where('id', $id)->delete();
            return redirect()->back()->with('delete', __('messages.flash.delete', ['var' => 'Category']));
        } catch (Exception $e) {
            return view('errors.error.404');
        }
    }
}
