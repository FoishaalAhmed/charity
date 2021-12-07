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
use App\Models\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $about = Page::where('id', 4)->first();
        return view('frontend.about', compact('about'));
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
