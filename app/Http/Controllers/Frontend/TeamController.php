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
        $advisors = Advisor::with('details')->get();
        $experts = Expert::all();
        $volunteerCount = Team::count();
        $eventCount = Event::count();
        $donarCount = Donation::where('status', 1)->count();
        $fundAmount = Donation::where('status', 1)->selectRaw('sum(amount) as total')->first()->total;
        $partners = Partner::latest()->get();
        $faqs = Faq::latest()->take(3)->get();
        $question_text = General::where('name', 'frequently-ask-question-text')->first();
        $expert_text = General::where('name', 'expart-text')->first();
        return view('frontend.team', compact('volunteerCount', 'eventCount', 'donarCount', 'fundAmount', 'faqs', 'partners', 'question_text', 'teams', 'advisors', 'experts', 'expert_text'));
    }

    public function faq()
    {
        $faqs = Faq::latest()->paginate(10);
        $partners = Partner::latest()->get();
        $help = General::where('name', 'help')->first();
        return view('frontend.faq', compact('faqs', 'partners', 'help'));
    }

    public function reference()
    {
        $testimonials = Testimonial::latest()->get();
        $partners = Partner::latest()->get();
        $help = General::where('name', 'help')->first();
        return view('frontend.reference', compact('help', 'partners', 'testimonials'));
    }
}
