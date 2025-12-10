<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $productCategories = ProductCategory::active()->ordered()->get();
            $featuredProducts = \App\Models\Product::active()->ordered()->take(6)->get();
            $latestNews = \App\Models\NewsPost::where('is_published', true)
                ->where('published_at', '<=', now())
                ->latest('published_at')
                ->take(3)
                ->get();
        } catch (\Throwable $e) {
            $productCategories = collect();
            $featuredProducts = collect();
            $latestNews = collect();
        }

        return view('home', compact('productCategories', 'featuredProducts', 'latestNews'));
    }
}
