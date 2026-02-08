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
            ->with('translation')
            ->active()
            ->ordered()
            ->get();

        return view('pages.product-categories.index', compact('categories'));
    }

    public function show(string $slug): View
    {
        $locale = app()->getLocale();

        $category = ProductCategory::query()
            ->whereHas('translations', function ($query) use ($locale, $slug) {
                $query
                    ->where('locale', $locale)
                    ->where('slug', $slug);
            })
            ->with('translation')
            ->firstOrFail();

        $products = $category->products()
            ->with('translation')
            ->active()
            ->ordered()
            ->get();

        return view('pages.product-categories.show', compact('category', 'products'));
    }
}
