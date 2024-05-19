<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        return view('category');
    }

    public function add()
    {
        $categories = Category::all();
        return view('category-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($category->name); // or any slug generation logic
        $category->save();


        return redirect()->route('categories.index')->with('status', 'Category added successfully.');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('category-edit', compact('category'));
    }

    public function update(Request $request, $slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    $request->validate([
        'name' => 'required|unique:categories|max:100',
    ]);

    $category->name = $request->input('name');
    $category->slug = Str::slug($request->input('name')); // Update the slug based on the updated name
    $category->save();

    return redirect()->route('category')->with('status', 'Category updated successfully.');
}

public function destroy($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();
    $category->delete();

    return redirect()->route('category')->with('status', 'Category deleted successfully.');
}

public function restore($id)
{
    $category = Category::withTrashed()->findOrFail($id);
    $category->restore();

    return redirect()->route('category-deleted')->with('status', 'Category restored successfully.');
}

public function deleted()
{
    $deletedCategories = Category::onlyTrashed()->get();
    return view('category-deleted', ['deletedCategories' => $deletedCategories]);
}

}
