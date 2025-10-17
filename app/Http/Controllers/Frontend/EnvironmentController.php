<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Contracts\View\View;

class EnvironmentController extends Controller
{
    public function show(): View
    {
        $locale = app()->getLocale();
        $page = Page::query()->where('locale', $locale)->where('slug', 'environment')->first();

        if ($page) {
            return view('pages.environment', compact('page'));
        }

        // Fallback to existing sustainability page if present
        if (view()->exists('pages.sustainability-activities')) {
            return view('pages.sustainability-activities');
        }

        return view('pages.environment');
    }
}
