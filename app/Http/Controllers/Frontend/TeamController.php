<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Faq;
use App\Models\General;
use App\Models\Partner;
use App\Models\Team;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(16);
        $volunteerCount = Volunteer::where('status', 1)->count();
        $eventCount = Event::count();
        $donarCount = Donation::where('status', 1)->count();
        $fundAmount = Donation::where('status', 1)->selectRaw('sum(amount) as total')->first()->total;
        $partners = Partner::latest()->get();
        $faqs = Faq::latest()->take(3)->get();
        $question_text = General::where('name', 'frequently-ask-question-text')->first();
        return view('frontend.team', compact('volunteerCount', 'eventCount', 'donarCount', 'fundAmount', 'faqs', 'partners', 'question_text', 'teams'));
    }

    public function faq()
    {
        $faqs = Faq::latest()->paginate(10);
        $partners = Partner::latest()->get();
        $help = General::where('name', 'help')->first();
        return view('frontend.faq', compact('faqs', 'partners', 'help'));
    }
}
