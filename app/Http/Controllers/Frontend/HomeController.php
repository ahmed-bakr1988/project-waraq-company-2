<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $products = Product::active()->ordered()->get();
        } catch (\Throwable $e) {
            $products = collect();
        }

        return view('home', compact('products'));
    }
}
