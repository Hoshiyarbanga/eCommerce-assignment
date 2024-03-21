<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $SubCategory = SubCategory::with('category')->get();
        return view('admin.pages.sub-category.index')->with(compact('SubCategory'));
    }

    public function create()
    {
        $category = Category::get();
        return view('admin.pages.sub-category.create')->with(compact('category'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'category_id' => 'required',
            ]);
            SubCategory::create([
                'name' => $request->name,
                'slug' => $request->slug, 'category_id' => $request->category_id,
            ]);
            return redirect()->back()->with('success',  __('messages.flash.create', ['var' => 'Sub-category']));
        } catch (Exception $e) {
            return abort(401);
        }
    }

    public function edit($id)
    {
        $category = Category::get();
        $subcategories = SubCategory::where('id', $id)->first();
        return view('admin.pages.sub-category.edit')->with(compact('subcategories', 'category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'category_id' => 'required',
            ]);
            $category = SubCategory::where('id', $id)->first();
            $category->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('view-sub-category')->with('update',  __('messages.flash.update', ['var' => 'Sub-category']));
        } catch (Exception $e) {
            return abort(401);
        }
    }

    public function delete($id)
    {
        try {
            DB::table('sub_categories')->where('id', $id)->delete();
            return redirect()->back()->with('delete',  __('messages.flash.delete', ['var' => 'SUb-category']));
        } catch (Exception $e) {
            return abort(402);
        }
    }
}
