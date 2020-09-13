<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories->all());
    }

    public function products(Request $request, Category $category)
    {
        return response()->json($category->products);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $category = new Category(['name' => $request->name]);
        $category->save();

        return response()->json(['message' => 'Category was added']);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $category->update($request->only('name'));

        return response()->json(['message' => 'Category was updated']);
    }

    public function delete(Request $request, Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Category was deleted']);
    }
}
