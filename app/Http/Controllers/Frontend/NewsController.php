<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $locale = app()->getLocale();
        $query = NewsPost::query()
            ->where('locale', $locale)
            ->where(function ($q) {
                $q->where('is_published', true)
                    ->orWhereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });

        // Search functionality
        if (request()->filled('search')) {
            $searchTerm = request('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('excerpt', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('content', 'LIKE', "%{$searchTerm}%");
            });
        }

        $posts = $query->latest('published_at')->paginate(12)->withQueryString();

        return view('pages.news.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $locale = app()->getLocale();
        $post = NewsPost::query()
            ->where('locale', $locale)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.news.show', compact('post'));
    }
}
