<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cause;
use App\Models\Donation;
use App\Models\Faq;
use App\Models\General;
use App\Models\Partner;
use Illuminate\Http\Request;

class CauseController extends Controller
{
    public function index()
    {
        $causes = Cause::withSum('donations', 'amount')->latest()->paginate(18);
        $partners = Partner::latest()->get();
        $faqs = Faq::latest()->take(3)->get();
        $question_text = General::where('name', 'frequently-ask-question-text')->first();
        return view('frontend.cause', compact('partners', 'faqs', 'causes', 'question_text'));
    }

    public function detail($id, $title)
    {
        $cause = Cause::findOrFail($id);
        $category = Category::where('id', $cause->category_id)->first();
        $donations_sum_amount = Donation::where('cause_id', $id)->selectRaw('sum(amount) as donations_sum_amount')->first()->donations_sum_amount;
        $causes = Cause::withSum('donations', 'amount')->latest()->take(3)->get();
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->get();
        $help = General::where('name', 'help')->first();
        $partners = Partner::latest()->get();
        return view('frontend.causeDetail', compact('cause', 'category', 'donations_sum_amount', 'causes', 'categories', 'help', 'partners'));
    }

    public function category($category_id, $name)
    {

        $causes = Cause::withSum('donations', 'amount')->where('category_id', $category_id)->latest()->paginate(18);
        $partners = Partner::latest()->get();
        $faqs = Faq::latest()->take(3)->get();
        $question_text = General::where('name', 'frequently-ask-question-text')->first();
        return view('frontend.cause', compact('partners', 'faqs', 'causes', 'question_text'));
    }
}
