<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Page;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->take(2)->get();
        $page1 = Page::where('id', 7)->first();
        $page2 = Page::where('id', 6)->first();
        $page3 = Page::where('id', 5)->first();
        $page4 = Page::where('id', 4)->first();
        return view('frontend.index', compact('sliders', 'page1', 'page2', 'page3', 'page4'));
    }
}
