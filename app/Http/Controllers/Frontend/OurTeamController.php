<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\View\View;

class OurTeamController extends Controller
{
    public function index(): View
    {
        $teamMembers = TeamMember::query()
            ->active()
            ->ordered()
            ->paginate(9);

        return view('pages.our-team.index', compact('teamMembers'));
    }

    public function show(string $slug): View
    {
        $member = TeamMember::query()
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        return view('pages.our-team.show', compact('member'));
    }
}
