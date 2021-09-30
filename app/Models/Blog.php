<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }

    protected $fillable = [
        'category_id', 'title', 'date', 'content', 'photo',
    ];

    public function storeBlog(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/blogs/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->title = $request->title;
        $this->date = date('Y-m-d', strtotime($request->date));
        $this->category_id = $request->category_id;
        $this->content = $request->content;
        $storeBlog = $this->save();

        $storeBlog
            ? session()->flash('message', 'New Blog Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateBlog(Object $request, Int $id)
    {
        $blog = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($blog->photo)) unlink($blog->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/blogs/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $blog->photo     = $image_url;
        }

        $blog->title = $request->title;
        $blog->date = date('Y-m-d', strtotime($request->date));
        $blog->content = $request->content;
        $blog->category_id = $request->category_id;
        $updateBlog = $blog->save();

        $updateBlog
            ? session()->flash('message', 'Blog Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyBlog(Int $id)
    {
        $blog = $this::findOrFail($id);
        if (file_exists($blog->photo)) unlink($blog->photo);
        $destroyBlog = $this->delete();

        $destroyBlog
            ? session()->flash('message', 'Blog Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
