<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CauseRequest;
use App\Models\Category;
use App\Models\Cause;
use App\Models\CauseResearch;
use App\Models\Research;
use Illuminate\Http\Request;

class CauseController extends Controller
{
    private $causeObject;

    public function __construct()
    {
        $this->causeObject = new Cause();
    }

    public function index()
    {
        $causes = Cause::orderBy('priority', 'asc')->get();
       
        return view('backend.admin.causes.index', compact('causes'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $researches = Research::orderBy('title', 'asc')->select('id', 'title')->get();
        return view('backend.admin.causes.create', compact('categories', 'researches'));
    }

    public function store(CauseRequest $request)
    {
        $this->causeObject->storeCause($request);
        return back();
    }

    public function edit($id)
    {
        $cause = Cause::findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        $researches = Research::orderBy('title', 'asc')->select('id', 'title')->get();
        $researchIds = CauseResearch::where('cause_id', $id)->pluck('research_id')->toArray();
        return view('backend.admin.causes.edit', compact('categories', 'cause', 'researches', 'researchIds'));
    }

    public function update(CauseRequest $request, $id)
    {
        $this->causeObject->updateCause($request, $id);
        return redirect()->route('admin.causes.index');
    }

    public function destroy($id)
    {
        $this->causeObject->destroyCause($id);
        return back();
    }
}
