<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use App\Models\TeamMember;
use Illuminate\View\View;

class OurTeamController extends Controller
{
    /**
     * Display a listing of team members.
     */
    public function index(): View
    {
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->paginate(3);
        $teamMembers2 = TeamMember::where('is_active', true)
            ->orderBy('order' ,'desc')
            ->orderBy('name')
            ->paginate(3);

        return view('pages.our-team.index', compact('teamMembers' ,'teamMembers2'));
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
