<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Contracts\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        $careers = Career::query()
            ->where('is_active', true)
            ->orderByDesc('published_at')
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('pages.careers.index', compact('careers'));
    }

    public function show(int $id): View
    {
        $career = Career::query()->findOrFail($id);

        return view('pages.careers.show', compact('career'));
    }
}
