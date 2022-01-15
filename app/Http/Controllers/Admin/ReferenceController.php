<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReferenceRequest;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    private $referenceObject;

    public function __construct()
    {
        $this->referenceObject = new Reference();
    }

    public function index()
    {
        $references = Reference::latest()->get();
        return view('backend.admin.references.index', compact('references'));
    }

    public function create()
    {
        return view('backend.admin.references.create');
    }

    public function store(ReferenceRequest $request)
    {
        $this->referenceObject->storeReference($request);
        return back();
    }

    public function edit($id)
    {
        $reference = Reference::findOrFail($id);
        return view('backend.admin.references.edit', compact('reference'));
    }

    public function update(ReferenceRequest $request, $id)
    {
        $this->referenceObject->updateReference($request, $id);
        return redirect()->route('admin.references.index');
    }

    public function destroy($id)
    {
        $this->referenceObject->destroyReference($id);
        return back();
    }
}
