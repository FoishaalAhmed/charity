<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;

class EventController extends Controller
{
    private $eventObject;

    public function __construct()
    {
        $this->eventObject = new Event();
    }

    public function index()
    {
        $events = Event::latest()->get();
        return view('backend.admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('backend.admin.events.create');
    }

    public function store(EventRequest $request)
    {
        $this->eventObject->storeEvent($request);
        return back();
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('backend.admin.events.edit', compact('event'));
    }

    public function update(EventRequest $request, $id)
    {
        $this->eventObject->updateEvent($request, $id);
        return redirect()->route('admin.events.index');
    }

    public function destroy($id)
    {
        $this->eventObject->destroyEvent($id);
        return back();
    }
}
