<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Contracts\View\View;

class FactoryController extends Controller
{
    public function show(): View
    {
        $locale = app()->getLocale();
        $page = Page::query()->where('locale', $locale)->where('slug', 'factory')->first();

        if ($page) {
            return view('pages.factory', compact('page'));
        }

        return view('pages.factory');
    }
}
