<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Cause;
use App\Models\Event;
use App\Models\General;
use App\Models\Partner;

class BlogController extends Controller
{
    public function index()
    {
        $blogObject = new Blog();
        $blogs = Blog::latest()->paginate(6);
        $partners = Partner::latest()->get();
        $researchBlogs = $blogObject->getResearchBlogs();
        $events = Event::latest()->take(3)->select('id', 'title', 'photo')->get();
        return view('frontend.blog', compact('blogs', 'partners', 'researchBlogs', 'events'));
    }

    public function detail($id, $title)
    {
        $blogObject = new Blog();
        $blog = Blog::findOrFail($id);
        $partners = Partner::latest()->get();
        $researchBlogs = $blogObject->getResearchBlogs();
        $events = Event::latest()->take(3)->select('id', 'title', 'photo')->get();
        return view('frontend.blogDetail', compact('blog', 'researchBlogs', 'events', 'partners'));
    }

    public function research($research_id, $name)
    {
        $blogObject = new Blog();
        $blogs = Blog::where('research_id', $research_id)->latest()->paginate(6);
        $partners = Partner::latest()->get();
        $researchBlogs = $blogObject->getResearchBlogs();
        $events = Event::latest()->take(3)->select('id', 'title', 'photo')->get();
        return view('frontend.blog', compact('blogs', 'partners', 'researchBlogs', 'events'));
    }
}
