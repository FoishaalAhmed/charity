<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'position', 'photo', 'message',
    ];

    public function storeTestimonial(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/testimonials/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name      = $request->name;
        $this->message   = $request->message;
        $this->position  = $request->position;
        $storeTestimonial       = $this->save();

        $storeTestimonial
            ? session()->flash('message', 'New Testimonial Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateTestimonial(Object $request, Int $id)
    {
        $testimonial = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($testimonial->photo)) unlink($testimonial->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/testimonials/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $testimonial->photo     = $image_url;
        }

        $testimonial->name      = $request->name;
        $testimonial->message  = $request->message;
        $testimonial->position  = $request->position;
        $updateTestimonial      = $testimonial->save();

        $updateTestimonial
            ? session()->flash('message', 'Testimonial Info Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyTestimonial(Int $id)
    {
        $testimonial = $this::findOrFail($id);
        if (file_exists($testimonial->photo)) unlink($testimonial->photo);
        $destroyTestimonial = $testimonial->delete();

        $destroyTestimonial
            ? session()->flash('message', 'Testimonial Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
