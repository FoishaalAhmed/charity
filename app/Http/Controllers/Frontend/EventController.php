<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cause;
use App\Models\Event;
use App\Models\General;
use App\Models\Partner;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(18);
        $causes = Cause::latest()->take(3)->select('id', 'title', 'photo')->get();
        $partners = Partner::latest()->get();
        $categoryObjet = new Category();
        $serviceCategories = $categoryObjet->getCategories();
        return view('frontend.event', compact('causes', 'partners', 'events', 'serviceCategories'));
    }

    public function detail($id, $title)
    {
        $event = Event::findOrFail($id);
        $help = General::where('name', 'help')->first();
        $partners = Partner::latest()->get();
        $categoryObjet = new Category();
        $serviceCategories = $categoryObjet->getCategories();
        $causes = Cause::latest()->take(3)->select('id', 'title', 'photo')->get();
        return view('frontend.eventDetail', compact('event', 'partners', 'help', 'categoryObjet', 'serviceCategories', 'causes'));
    }
}
