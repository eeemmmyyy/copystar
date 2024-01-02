<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::all();
        return view('categories.add_category', compact('categories'));
    }

    public function AddCategoryPost(AddCategoryRequest $request)
    {
        Category::create($request->validated());
        return back();
    }

    public function DeleteCategoryPost(Category $category)
    {
        $name = $category->category_name;
        $category->delete();
        return back()->with(['delete_category'=>$name]);
    }

    public function EditCategoryPost(Request $request, Category $category)
    {
        $request->validate([
           'category_name' => 'required|max:25'
        ]);
        $name = $category->category_name;
        $category->category_name = $request->input('category_name');
        $category->save();
        return back()->with(['edit_category'=>$name, 'old_edit_category'=>$category->category_name]);

    }
}
