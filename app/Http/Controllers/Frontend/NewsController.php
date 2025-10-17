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
        $posts = NewsPost::query()
            ->where('locale', $locale)
            ->where(function ($q) {
                $q->where('is_published', true)
                    ->orWhereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->latest('published_at')
            ->paginate(12);

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
