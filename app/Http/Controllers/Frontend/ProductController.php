<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductReviewRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['translation', 'productCategory'])->active();

        // Search
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('summary', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('translation', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%")
                           ->orWhere('description', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $query->where('product_category_id', $request->category);
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'name_asc':
                $query->join('product_translations', function($join) {
                    $join->on('products.id', '=', 'product_translations.product_id')
                         ->where('product_translations.locale', '=', app()->getLocale());
                })->orderBy('product_translations.name', 'asc')
                  ->select('products.*');
                break;
            case 'name_desc':
                $query->join('product_translations', function($join) {
                    $join->on('products.id', '=', 'product_translations.product_id')
                         ->where('product_translations.locale', '=', app()->getLocale());
                })->orderBy('product_translations.name', 'desc')
                  ->select('products.*');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = ProductCategory::active()->ordered()->get();

        return view('pages.products', compact('products', 'categories'));
    }

    public function show(?string $locale, Product $product)
    {
        $product->loadMissing(['translation', 'productCategory']);

        // Load related products from the same category
        $relatedProducts = Product::with(['translation', 'productCategory'])
            ->active()
            ->where('id', '!=', $product->id)
            ->where('product_category_id', $product->product_category_id)
            ->limit(3)
            ->get();

        return view('pages.product-details', compact('product', 'relatedProducts'));
    }

    /**
     * Store product review
     */
    public function storeReview(ProductReviewRequest $request, $locale, Product $product)
    {
        try {
            // Save review to database
            ProductReview::create([
                'product_id' => $product->id,
                'rating' => $request->rating,
                'title' => $request->title,
                'comment' => $request->comment,
                'reviewer_name' => $request->reviewer_name,
                'reviewer_email' => $request->reviewer_email,
                'ip_address' => $request->ip(),
                'status' => 'pending', // Reviews need approval
            ]);

            // Log the review
            Log::info('Product review submitted', [
                'product_id' => $product->id,
                'rating' => $request->rating,
                'reviewer_email' => $request->reviewer_email,
                'ip' => $request->ip(),
            ]);

            $appLocale = app()->getLocale();
            $successMessage = $appLocale === 'ar'
                ? 'شكراً لمراجعتك. سيتم نشرها بعد الموافقة.'
                : 'Thank you for your review. It will be published after approval.';

            return back()->with('success', $successMessage);

        } catch (\Exception $e) {
            Log::error('Product review error: '.$e->getMessage());

            $appLocale = app()->getLocale();
            $errorMessage = $appLocale === 'ar'
                ? 'حدث خطأ أثناء إرسال المراجعة. يرجى المحاولة مرة أخرى.'
                : 'An error occurred while submitting the review. Please try again.';

            return back()->withInput()->with('error', $errorMessage);
        }
    }
}
