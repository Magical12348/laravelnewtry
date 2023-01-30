<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('Admin.Category.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.Category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return back()->with('status', 'Category Added');
    }

    public function edit(Category $category)
    {
        return view('Admin.Category.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return back()->with('status', 'Category Updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('status', 'category deleted successfully');
    }
}
