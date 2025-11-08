<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductReviewRequest;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Log;

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
