<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private $testimonialObject;

    public function __construct()
    {
        $this->testimonialObject = new Testimonial();
    }

    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backend.admin.testimonials.create');
    }

    public function store(TestimonialRequest $request)
    {
        $this->testimonialObject->storeTestimonial($request);
        return back();
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.admin.testimonials.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, $id)
    {
        $this->testimonialObject->updateTestimonial($request, $id);
        return redirect()->route('admin.testimonials.index');
    }

    public function destroy($id)
    {
        $this->testimonialObject->destroyTestimonial($id);
        return back();
    }
}
