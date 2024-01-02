<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function CatalogView(Request $request)
    {
        $sortByPrice = $request->query('sort_price', 'asc');
        $sortByName = $request->query('sort_name', 'asc');
        $sortByYear = $request->query('sort_year', 'asc');
        $categoryId = $request->query('category', '');

        $productQuery = Product::where('product_count', '>', 0);

        if ($categoryId) {
            $productQuery->where('category_id', $categoryId);
        }
        $productQuery->orderBy('product_price', $sortByPrice)
            ->orderBy('product_name', $sortByName)
            ->orderBy('product_year', $sortByYear);
        $products = $productQuery->get();
        $categories = Category::all();
        return view('catalog', compact('products', 'categories'));
    }

    public function CatalogProductView(Product $product)
    {
        $productOne = Product::find($product->id);
        return view('product_item', compact('productOne'));
    }
}
