<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['translation', 'productCategory'])->active()->ordered()->get();

        return view('pages.products', compact('products'));
    }

    public function show(?string $locale, Product $product)
    {
        $product->loadMissing(['translation', 'productCategory']);

        return view('pages.product-details', compact('product'));
    }
}
