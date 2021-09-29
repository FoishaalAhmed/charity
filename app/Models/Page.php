<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 'slug', 'content', 'photo',
    ];

    public function storePage(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/pages/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->name = $request->name;
        $this->slug = $request->slug;
        $this->content = $request->content;
        $storePage  = $this->save();

        $storePage
            ? session()->flash('message', 'New Page Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updatePage(Object $request, Int $id)
    {
        $page  = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {

            if (file_exists($page->photo)) unlink($page->photo);

            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/pages/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $page->photo     = $image_url;
        }

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $updatePage  = $page->save();

        $updatePage
            ? session()->flash('message', 'Page Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyPage(Int $id)
    {
        $page  = $this::findOrFail($id);
        if (file_exists($page->photo)) unlink($page->photo);
        $deletePage = $page->delete();

        $deletePage
            ? session()->flash('message', 'Page Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
