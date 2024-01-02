<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function MainView()
    {
        $product = new Product();
        $products = $product->lastProduct();
        if (!empty($products)){
            return view('about', compact('products'));
        }
    }
}
