<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvisorRequest;
use App\Models\Advisor;
use App\Models\AdvisorDetail;

class AdvisorController extends Controller
{
    private $advisorObject;

    public function __construct()
    {
        $this->advisorObject = new Advisor();
    }

    public function index()
    {
        $advisors = Advisor::orderBy('name', 'asc')->get();
        return view('backend.admin.advisors.index', compact('advisors'));
    }

    public function create()
    {
        return view('backend.admin.advisors.create');
    }

    public function store(AdvisorRequest $request)
    {
        $this->advisorObject->storeAdvisor($request);
        return back();
    }

    public function edit($id)
    {
        $advisor = Advisor::findOrFail($id);
        $details = AdvisorDetail::where('advisor_id', $id)->get();
        return view('backend.admin.advisors.edit', compact('advisor', 'details'));
    }

    public function update(AdvisorRequest $request, $id)
    {
        $this->advisorObject->updateAdvisor($request, $id);
        return redirect()->route('admin.advisors.index');
    }

    public function destroy($id)
    {
        $this->advisorObject->destroyAdvisor($id);
        return back();
    }
}
