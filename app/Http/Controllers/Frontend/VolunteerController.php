<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Faq;
use App\Models\General;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::latest()->paginate(16);
        $volunteerCount = Volunteer::count();
        $eventCount = Event::count();
        $donarCount = Donation::where('status', 1)->count();
        $fundAmount = Donation::where('status', 1)->selectRaw('sum(amount) as total')->first()->total;
        $partners = Partner::latest()->get();
        $faqs = Faq::latest()->take(3)->get();
        $question_text = General::where('name', 'frequently-ask-question-text')->first();
        return view('frontend.volunteer', compact('volunteerCount', 'eventCount', 'donarCount', 'fundAmount', 'faqs', 'partners', 'question_text', 'volunteers'));
    }

    public function volunteer()
    {
        $partners = Partner::latest()->get();
        $help = General::where('name', 'help')->first();
        $volunteer = Page::where('id', 8)->first();
        return view('frontend.becomeVolunteer', compact('partners', 'help', 'volunteer'));
    }
}
