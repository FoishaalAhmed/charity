<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'date', 'time', 'center', 'map', 'detail', 'photo',
    ];

    public function storeEvent(Object $request)
    {
        $image = $request->file('photo');

        if ($image) {
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/events/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $this->photo     = $image_url;
        }

        $this->title = $request->title;
        $this->date = date('Y-m-d', strtotime($request->date));
        $this->time = date('H:i', strtotime($request->time));
        $this->center = $request->center;
        $this->map = $request->map;
        $this->detail = $request->detail;
        $storeEvent = $this->save();

        $storeEvent
            ? session()->flash('message', 'New Event Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateEvent(Object $request, Int $id)
    {
        $event = $this::findOrFail($id);
        $image = $request->file('photo');

        if ($image) {
            if (file_exists($event->photo)) unlink($event->photo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/events/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $event->photo     = $image_url;
        }

        $event->title = $request->title;
        $event->date = date('Y-m-d', strtotime($request->date));
        $event->time = date('H:i', strtotime($request->time));
        $event->center = $request->center;
        $event->map = $request->map;
        $event->detail = $request->detail;
        $updateEvent = $event->save();

        $updateEvent
            ? session()->flash('message', 'Event Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyEvent(Int $id)
    {
        $event = $this::findOrFail($id);
        if (file_exists($event->photo)) unlink($event->photo);
        $destroyEvent = $event->delete();

        $destroyEvent
            ? session()->flash('message', 'Event Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
