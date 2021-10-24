<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'facebook', 'twitter', 'instagram', 'photo',
    ];

    public function storeVolunteer(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/volunteers/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name      = $request->name;
        $this->email     = $request->email;
        $this->phone     = $request->phone;
        $this->facebook  = $request->facebook;
        $this->twitter   = $request->twitter;
        $this->instagram = $request->instagram;
        $this->reference = $request->reference;
        $this->comment = $request->comment;
        $this->status = $request->status;
        $storeVolunteer       = $this->save();

        $storeVolunteer
            ? session()->flash('message', 'New Volunteer Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateVolunteer(Object $request, Int $id)
    {
        $volunteer = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($volunteer->photo)) unlink($volunteer->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/volunteers/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $volunteer->photo     = $image_url;
        }

        $volunteer->name      = $request->name;
        $volunteer->facebook  = $request->facebook;
        $volunteer->twitter   = $request->twitter;
        $volunteer->instagram = $request->instagram;
        $updateVolunteer      = $volunteer->save();

        $updateVolunteer
            ? session()->flash('message', 'Volunteer Info Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyVolunteer(Int $id)
    {
        $volunteer = $this::findOrFail($id);
        if (file_exists($volunteer->photo)) unlink($volunteer->photo);
        $destroyVolunteer = $volunteer->delete();

        $destroyVolunteer
            ? session()->flash('message', 'Volunteer Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
