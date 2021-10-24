<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\General;
use App\Models\Partner;
use App\Models\Research;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(18);
        $help = General::where('name', 'help')->first();
        $partners = Partner::latest()->get();
        return view('frontend.event', compact('help', 'partners', 'events'));
    }

    public function detail($id, $title)
    {
        $event = Event::findOrFail($id);
        $help = General::where('name', 'help')->first();
        $partners = Partner::latest()->get();
        return view('frontend.eventDetail', compact('event', 'partners', 'help'));
    }

    public function research($type)
    {
        $researchObject = new Research();
        $type = ucwords(str_replace('-', ' ', $type));
        $researches = $researchObject->getAllResearchByType($type);
        return view('frontend.research', compact('researches', 'type'));
    }
}
