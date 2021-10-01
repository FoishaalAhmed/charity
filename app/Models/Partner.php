<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
    ];

    public static $validateRule = [
        'logo' => 'mimes:jpeg,jpg,png,gif,webp|max:100|required',
    ];

    public function storePartner(Object $request)
    {
        $image = $request->file('logo');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/partners/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $this->logo     = $image_url;
        $storePartner    = $this->save();

        $storePartner
            ? session()->flash('message', 'New Partner Stored Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updatePartner(Object $request, Int $id)
    {
        $partner = $this::findOrFail($id);
        $image = $request->file('logo');
        if (file_exists($partner->logo)) unlink($partner->logo);
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/partners/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $partner->logo   = $image_url;
        $updatePartner   = $partner->save();

        $updatePartner
            ? session()->flash('message', 'Partner Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyPartner(Int $id)
    {
        $partner = $this::findOrFail($id);
        if (file_exists($partner->logo)) unlink($partner->logo);
        $destroyPartner   = $partner->delete();

        $destroyPartner
            ? session()->flash('message', 'Partner Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
