<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function donations()
    {
        return $this->hasMany('App\Models\Donation');
    }

    protected $fillable = [
        'category_id', 'title', 'last_date', 'description', 'photo', 'amount',
    ];

    public function storeCause(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/causes/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->title = $request->title;
        $this->last_date = date('Y/m/d', strtotime($request->last_date));
        $this->category_id = $request->category_id;
        $this->description = $request->description;
        $this->amount = $request->amount;
        $storeCause = $this->save();

        $storeCause
            ? session()->flash('message', 'New Cause Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateCause(Object $request, Int $id)
    {
        $cause = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($cause->photo)) unlink($cause->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/causes/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $cause->photo     = $image_url;
        }

        $cause->title = $request->title;
        $cause->last_date = date('Y/m/d', strtotime($request->last_date));
        $cause->description = $request->description;
        $cause->amount = $request->amount;
        $cause->category_id = $request->category_id;
        $updateCause = $cause->save();

        $updateCause
            ? session()->flash('message', 'Cause Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyCause(Int $id)
    {
        $cause = $this::findOrFail($id);
        if (file_exists($cause->photo)) unlink($cause->photo);
        $destroyCause = $this->delete();

        $destroyCause
            ? session()->flash('message', 'Cause Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
