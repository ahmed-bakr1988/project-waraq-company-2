<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Contracts\View\View;

class CareerController extends Controller
{
    /**
     * Display a listing of active career opportunities
     */
    public function index(): View
    {
        $careers = Career::query()
            ->active()
            ->latest('posted_at')
            ->paginate(12);

        return view('pages.careers.index', compact('careers'));
    }

    /**
     * Display the specified career with application form
     */
    public function show(string $slug): View
    {
        $career = Career::query()
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.careers.show', compact('career'));
    }
}
