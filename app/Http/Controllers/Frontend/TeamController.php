<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Expert;
use App\Models\Faq;
use App\Models\General;
use App\Models\Partner;
use App\Models\Advisor;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('category')) {
            $teams = Team::where('category', $request->category)->orderBy('priority', 'asc')->paginate(16);
        } else {
            $teams = Team::orderBy('priority', 'asc')->paginate(16);
        }
        $partners = Partner::latest()->get();
        return view('frontend.team', compact('partners', 'teams'));
    }

    public function detail($id, $name)
    {
        $team = Team::findOrFail($id);
        return view('frontend.teamDetail', compact('team'));
    }

    public function reference()
    {
        $testimonials = Testimonial::latest()->get();
        $partners = Partner::latest()->get();
        $help = General::where('name', 'help')->first();
        return view('frontend.reference', compact('help', 'partners', 'testimonials'));
    }
}
