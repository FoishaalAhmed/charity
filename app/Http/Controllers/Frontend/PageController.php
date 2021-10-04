<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Faq;
use App\Models\General;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $about = Page::where('id', 4)->first();
        $mission = Page::where('id', 5)->first();
        $vision = Page::where('id', 6)->first();
        $history = Page::where('id', 7)->first();
        $intern = General::where('name', 'intern')->first();
        $since = General::where('name', 'since')->first();
        $about_text = General::where('name', 'about-text')->first();
        $question_text = General::where('name', 'frequently-ask-question-text')->first();
        $volunteers = Volunteer::take(4)->latest()->get();
        $faqs = Faq::latest()->take(3)->get();
        $volunteerCount = Volunteer::count();
        $eventCount = Event::count();
        $donarCount = Donation::where('status', 1)->count();
        $fundAmount = Donation::where('status', 1)->selectRaw('sum(amount) as total')->first()->total;
        $testimonials = Testimonial::latest()->take(6)->get();
        $help = General::where('name', 'help')->first();
        $partners = Partner::latest()->get();
        return view('frontend.about', compact('about', 'intern', 'mission', 'vision', 'history', 'since', 'about_text', 'volunteers', 'question_text', 'faqs', 'volunteerCount', 'eventCount', 'donarCount', 'fundAmount', 'testimonials', 'help', 'partners'));
    }
}
