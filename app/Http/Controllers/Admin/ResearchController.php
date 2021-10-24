<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Research;
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
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.research', compact('researches', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate(Research::$validateRule);
        $this->researchObject->storeResearch($request);
        return back();
    }

    public function edit(Research $research)
    {
        $researches = $this->researchObject->getAllResearch();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.research', compact('researches', 'categories', 'research'));
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
