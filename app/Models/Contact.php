<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [

        'email', 'phone', 'map', 'facebook', 'twitter', 'instagram', 'youtube', 'address',

    ];

    public static $validateRule = [

        'email'     => 'required|email|max:255',
        'phone'     => 'required|string|max:15',
        'map'       => 'nullable|string',
        'address'   => 'nullable|string',
        'facebook'  => 'nullable|string|max:255',
        'twitter'   => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
        'youtube' => 'nullable|string|max:255',
    ];

    public function updateContact(Object $request, Int $id)
    {
        $contact = $this::findOrFail($id);
        $contact->email     = $request->email;
        $contact->phone     = $request->phone;
        $contact->map       = $request->map;
        $contact->facebook  = $request->facebook;
        $contact->twitter   = $request->twitter;
        $contact->instagram = $request->instagram;
        $contact->youtube = $request->youtube;
        $contact->address   = $request->address;
        $updateContact      = $contact->save();

        $updateContact ?
            session()->flash('message', 'Contact Updated Successfully!') :
            session()->flash('message', 'Something Went Wrong!');
    }
}
