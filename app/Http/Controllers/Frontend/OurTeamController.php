<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\View\View;

class OurTeamController extends Controller
{
    /**
     * Display a listing of team members.
     */
    public function index(): View
    {
        $teamMembers = OurTeam::where('is_active', true)
            ->orderBy('display_order')
            ->orderBy('name')
            ->paginate(12);

        return view('pages.our-team.index', compact('teamMembers'));
    }

    /**
     * Display the specified team member.
     */
    public function show(string $slug): View
    {
        $member = OurTeam::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.our-team.show', compact('member'));
    }
}