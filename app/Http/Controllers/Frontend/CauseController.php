<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cause;
use App\Models\Donation;
use App\Models\Event;
use App\Models\General;
use App\Models\Partner;

class CauseController extends Controller
{
    public function detail($id, $title)
    {
        $cause = Cause::findOrFail($id);
        $categoryObjet = new Category();
        $events = Event::latest()->take(3)->select('id', 'title')->get();
        $partners = Partner::latest()->get();
        $serviceCategories = $categoryObjet->getCategories();
        
        return view('frontend.causeDetail', compact('partners', 'cause', 'events', 'serviceCategories'));
    }

    public function category($category_id, $name)
    {
        $categoryObjet = new Category();
        $causes = Cause::where('category_id', $category_id)->latest()->paginate(6);
        $events = Event::latest()->take(3)->select('id', 'title')->get();
        $partners = Partner::latest()->get();
        $serviceCategories = $categoryObjet->getCategories();
        return view('frontend.cause', compact('partners', 'causes', 'events', 'serviceCategories'));
    }
}
