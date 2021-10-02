<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cause;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->take(3)->get();
        $fundAmount = Donation::where('status', 1)->selectRaw('sum(amount) as total')->first()->total;
        $page1 = Page::where('id', 2)->first();
        $page2 = Page::where('id', 4)->first();
        $volunteerCount = Volunteer::count();
        $eventCount = Event::count();
        $donarCount = Donation::where('status', 1)->count();
        $causes = Cause::withSum('donations', 'amount')->latest()->take(6)->get();
        $events = Event::take(8)->get();
        $volunteers = Volunteer::take(4)->latest()->get();
        $blogs = Blog::take(6)->latest()->get();
        $partners = Partner::latest()->get();
        return view('frontend.index', compact('sliders', 'fundAmount', 'page1', 'volunteerCount', 'donarCount', 'eventCount', 'causes', 'events', 'page2', 'volunteers', 'blogs', 'partners'));
    }
}
