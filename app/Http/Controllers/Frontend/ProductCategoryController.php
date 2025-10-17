<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;

class ProductCategoryController extends Controller
{
    public function index(): View
    {
        $categories = ProductCategory::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.product-categories.index', compact('categories'));
    }

    public function show(string $slug): View
    {
        $category = ProductCategory::query()->where('slug', $slug)->firstOrFail();
        $products = $category->products()->with('translation')->active()->ordered()->get();

        return view('pages.product-categories.show', compact('category', 'products'));
    }
}
