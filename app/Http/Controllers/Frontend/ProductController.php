<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'translations'])
            ->where('is_active', true);

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('translations', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->paginate(12);
        $categories = ProductCategory::where('is_active', true)->get();

        return view('pages.products', compact('products', 'categories'));
    }

    public function show($slug)
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

    public function storeReview(Request $request, Product $product)
    {
        try {
            $validator = Validator::make($request->all(), [
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:1000',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);

            if ($validator->fails()) {
                flash()->error(__('messages.validation_error'));
                return back()->withInput()->withErrors($validator);
            }

            $data = $validator->validated();
            $data['product_id'] = $product->id;
            $data['is_approved'] = false;

            ProductReview::create($data);

            $successMessage = __('messages.review_success');
            flash()->success($successMessage);
            return back();

        } catch (\Exception $e) {
            $errorMessage = __('messages.review_error');
            flash()->error($errorMessage);
            return back()->withInput();
        }
    }
}
