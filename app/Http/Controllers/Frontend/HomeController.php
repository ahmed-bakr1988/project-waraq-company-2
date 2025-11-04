<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $products = ProductCategory::active()->ordered()->get();
        } catch (\Throwable $e) {
            $products = collect();
        }

        return view('home', compact('products'));
    }
}
