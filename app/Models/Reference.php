<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'position', 'photo', 'message',
    ];

    public function storeReference(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/references/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name      = $request->name;
        $this->message   = $request->message;
        $this->position  = $request->position;
        $storeReference       = $this->save();

        $storeReference
            ? session()->flash('message', 'New Reference Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateReference(Object $request, Int $id)
    {
        $reference = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($reference->photo)) unlink($reference->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/references/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $reference->photo     = $image_url;
        }

        $reference->name      = $request->name;
        $reference->message  = $request->message;
        $reference->position  = $request->position;
        $updateReference      = $reference->save();

        $updateReference
            ? session()->flash('message', 'Reference Info Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyReference(Int $id)
    {
        $reference = $this::findOrFail($id);
        if (file_exists($reference->photo)) unlink($reference->photo);
        $destroyReference = $reference->delete();

        $destroyReference
            ? session()->flash('message', 'Reference Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
