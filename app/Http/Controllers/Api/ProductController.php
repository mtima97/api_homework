<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('privileged:control-product')->only(['add', 'update', 'delete']);
    }

    public function index(Request $request)
    {
        $result = QueryBuilder::for(Product::class)->allowedFilters(['name', 'color', 'weight', 'price'])->get();

        return response()->json($result);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $product = new Product($request->only(['name', 'color', 'weight', 'price']));
        $product->save();

        return response()->json(['message' => 'Product created']);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->only(['name', 'color', 'weight', 'price']));

        return response()->json(['message' => 'Product updated']);
    }

    public function delete(Request $request, Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Product deleted']);
    }
}
