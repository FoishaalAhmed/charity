<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Cause;
use App\Models\Event;
use App\Models\Partner;
use App\Models\PartnerResearch;
use App\Models\Research;
use App\Models\ResearchTeam;

class ResearchController extends Controller
{
    public function research($type)
    {
        $researchObject = new Research();
        $type = ucwords(str_replace('-', ' ', $type));
        $researches = $researchObject->getAllResearchByType($type);
        $partners = Partner::latest()->get();
        $events = Event::latest()->take(3)->select('id', 'title', 'photo')->get();
        return view('frontend.research', compact('researches', 'type', 'partners', 'events'));
    }

    public function detail($id, $title)
    {
        $researchTeamObject = new ResearchTeam();
        $partnerResearchObject = new PartnerResearch();
        $research = Research::findOrFail($id);
        $researchTeams = $researchTeamObject->getResearchTeams($id);
        $partnerResearches = $partnerResearchObject->getPartnerResearches($id);
        $publications = Blog::where('research_id', $id)->latest()->select('id', 'title', 'photo')->get();
        $partners = Partner::latest()->get();
        return view('frontend.researchDetail', compact('research', 'researchTeams', 'partnerResearches', 'publications', 'partners'));
    }

    public function partner($id, $name)
    {
        $researchObject = new Research();
        $type = 'Partner';
        $partners = PartnerResearch::where('partner_id', $id)->pluck('research_id')->toArray();
        $researches = $researchObject->getAllResearchByResearchers($partners);
        $partners = Partner::latest()->get();
        $events = Event::latest()->take(3)->select('id', 'title', 'photo')->get();
        return view('frontend.research', compact('researches', 'type', 'partners', 'events'));
    }

    public function researcher($id, $name)
    {
        $researchObject = new Research();
        
        $type = 'Researcher';
        $researchers = ResearchTeam::where('team_id', $id)->pluck('research_id')->toArray();
        $researches = $researchObject->getAllResearchByResearchers($researchers);
        $partners = Partner::latest()->get();
        $events = Event::latest()->take(3)->select('id', 'title', 'photo')->get();
        return view('frontend.research', compact('researches', 'type', 'partners', 'events'));
    }
}
