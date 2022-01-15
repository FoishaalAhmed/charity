<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\Partner;
use App\Models\PartnerResearch;
use App\Models\Research;
use App\Models\ResearchTeam;
use App\Models\Team;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    private $researchObject;

    public function __construct()
    {
        $this->researchObject = new Research();
    }

    public function index()
    {
        $researches = $this->researchObject->getAllResearch();
        return view('backend.admin.researches.index', compact('researches'));
    }

    public function create()
    {
        $services = Cause::orderBy('title', 'asc')->get();
        $researchers = Team::where('category', 'Researcher')->orderBy('name', 'asc')->select('id', 'name')->get();
        $partners = Partner::orderBy('name', 'asc')->select('id', 'name')->get();
        return view('backend.admin.researches.create', compact('services', 'researchers', 'partners'));
    }

    public function store(Request $request)
    {
        $request->validate(Research::$validateRule);
        $this->researchObject->storeResearch($request);
        return back();
    }

    public function edit(Research $research)
    {
        $services = Cause::orderBy('title', 'asc')->get();
        $researchers = Team::where('category', 'Researcher')->orderBy('name', 'asc')->select('id', 'name')->get();
        $partners = Partner::orderBy('name', 'asc')->select('id', 'name')->get();
        $researcher = ResearchTeam::where('research_id', $research->id)->pluck('team_id')->toArray();
        $partner = PartnerResearch::where('research_id', $research->id)->pluck('partner_id')->toArray();
        return view('backend.admin.researches.edit', compact('services', 'researchers', 'partners', 'research', 'researcher', 'partner'));
    }

    public function update(Request $request, Research $research)
    {
        $request->validate(Research::$validateRule);
        $this->researchObject->updateResearch($request, $research);
        return redirect()->route('admin.researches.index');
    }

    public function destroy(Research $research)
    {
        $this->researchObject->destroyResearch($research);
        return back();
    }
}
