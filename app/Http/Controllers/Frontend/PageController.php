<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cause;
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
        $volunteers = Volunteer::where('status', 1)->latest()->take(4)->get();
        $faqs = Faq::latest()->take(3)->get();
        $volunteerCount = Volunteer::where('status', 1)->count();
        $eventCount = Event::count();
        $donarCount = Donation::where('status', 1)->count();
        $fundAmount = Donation::where('status', 1)->selectRaw('sum(amount) as total')->first()->total;
        $testimonials = Testimonial::latest()->take(6)->get();
        $help = General::where('name', 'help')->first();
        $partners = Partner::latest()->get();
        return view('frontend.about', compact('about', 'intern', 'mission', 'vision', 'history', 'since', 'about_text', 'volunteers', 'question_text', 'faqs', 'volunteerCount', 'eventCount', 'donarCount', 'fundAmount', 'testimonials', 'help', 'partners'));
    }

    public function search(Request $request)
    {
        $events = Event::latest()->where('title', 'like', '%' . $request->search . '%')->paginate(18);
        $blogs = Blog::latest()->where('title', 'like', '%' . $request->search . '%')->paginate(18);
        $causes = Cause::latest()->where('title', 'like', '%' . $request->search . '%')->paginate(18);
        $partners = Partner::latest()->get();
        $faqs = Faq::latest()->take(3)->get();
        $question_text = General::where('name', 'frequently-ask-question-text')->first();
        return view('frontend.search', compact('events', 'blogs', 'causes', 'partners', 'faqs', 'question_text'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.page', compact('page'));
    }
}
