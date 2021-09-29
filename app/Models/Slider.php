<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_one', 'title_two', 'detail', 'photo',
    ];

    public function storeSlider(Object $request)
    {
        $image = $request->file('photo');
        if ($image) {
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/users/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->title_one = $request->title_one;
        $this->title_two = $request->title_two;
        $this->detail    = $request->detail;
        $storeSlider     = $this->save();

        $storeSlider
            ? session()->flash('message', 'New Slider Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateSlider(Object $request, Int $id)
    {
        $slider = $this::findOrFail($id);
        $image = $request->file('photo');
        if ($image) {
            if (file_exists($slider->photo)) unlink($slider->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/users/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $slider->photo     = $image_url;
        }

        $slider->title_one = $request->title_one;
        $slider->title_two = $request->title_two;
        $slider->detail    = $request->detail;
        $updateSlider      = $slider->save();

        $updateSlider
            ? session()->flash('message', 'Slider Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroySlider(Int $id)
    {
        $slider = $this::findOrFail($id);
        if (file_exists($slider->photo)) unlink($slider->photo);
        $destroySlider = $slider->save();

        $destroySlider
            ? session()->flash('message', 'Slider Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
