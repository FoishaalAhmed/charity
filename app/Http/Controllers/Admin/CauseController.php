<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CauseRequest;
use App\Models\Category;
use App\Models\Cause;
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
        $causes = Cause::latest()->get();
        return view('backend.admin.causes.index', compact('causes'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.causes.create', compact('categories'));
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
        return view('backend.admin.causes.edit', compact('categories', 'cause'));
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
