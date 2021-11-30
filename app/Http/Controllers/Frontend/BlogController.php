<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Cause;
use App\Models\General;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(18);
        return view('frontend.blog', compact('blogs'));
    }

    public function detail($id, $title)
    {
        $blog = Blog::findOrFail($id);
        $blog->increment('view');
        $category = Category::where('id', $blog->category_id)->first();
        $blogs = Blog::orderBy('view', 'desc')->take(2)->get();
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->get();
        $causes = Cause::withSum('donations', 'amount')->latest()->take(3)->get();
        $donation_text = General::where('name', 'donation text')->first();
        return view('frontend.blogDetail', compact('blog', 'categories', 'blogs', 'causes', 'donation_text', 'category'));
    }

    public function category($category_id, $name)
    {
        $blogs = Blog::where('category_id', $category_id)->latest()->paginate(18);
        return view('frontend.blog', compact('blogs'));
    }
}
