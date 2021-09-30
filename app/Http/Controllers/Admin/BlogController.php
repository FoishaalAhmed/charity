<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    private $blogObject;

    public function __construct()
    {
        $this->blogObject = new Blog();
    }

    public function index()
    {
        $blogs = Blog::with('categories')->latest()->get();
        return view('backend.admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.blogs.create', compact('categories'));
    }

    public function store(BlogRequest $request)
    {
        $this->blogObject->storeBlog($request);
        return back();
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.blogs.edit', compact('categories', 'blog'));
    }

    public function update(BlogRequest $request, $id)
    {
        $this->blogObject->updateBlog($request, $id);
        return redirect()->route('admin.blogs.index');
    }

    public function destroy($id)
    {
        $this->blogObject->destroyBlog($id);
        return back();
    }
}
