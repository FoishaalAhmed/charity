<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteerRequest;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    private $volunteerObject;

    public function __construct()
    {
        $this->volunteerObject = new Volunteer();
    }

    public function index()
    {
        $volunteers = Volunteer::latest()->get();
        return view('backend.admin.volunteers.index', compact('volunteers'));
    }

    public function create()
    {
        return view('backend.admin.volunteers.create');
    }

    public function store(VolunteerRequest $request)
    {
        $this->volunteerObject->storeVolunteer($request);
        return back();
    }

    public function edit($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('backend.admin.volunteers.edit', compact('volunteer'));
    }

    public function update(VolunteerRequest $request, $id)
    {
        $this->volunteerObject->updateVolunteer($request, $id);
        return redirect()->route('admin.volunteers.index');
    }

    public function destroy($id)
    {
        $this->volunteerObject->destroyVolunteer($id);
        return back();
    }
}
