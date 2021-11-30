<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    private $expertObject;

    public function __construct()
    {
        $this->expertObject = new Expert();
    }

    public function index()
    {
        $experts = Expert::orderBy('order', 'asc')->get();
        return view('backend.admin.experts.index', compact('experts'));
    }

    public function create()
    {
        return view('backend.admin.experts.create');
    }

    public function store(Request $request)
    {
        $request->validate(Expert::$validateRule);
        $this->expertObject->storeExpert($request);
        return back();
    }

    public function edit(Expert $expert)
    {
        return view('backend.admin.experts.edit', compact('expert'));
    }

    public function update(Request $request, Expert $expert)
    {
        $request->validate(Expert::$validateRule);
        $this->expertObject->updateExpert($request, $expert);
        return redirect()->route('admin.experts.index');
    }

    public function destroy(Expert $expert)
    {
        $this->expertObject->destroyExpert($expert);
        return back();
    }
}
