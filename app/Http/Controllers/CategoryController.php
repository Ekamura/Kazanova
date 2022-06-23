<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }



    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'category_name' => $request->get('category_name'),
        ]);

        return redirect()->route('admin.category.index');
    }
}
