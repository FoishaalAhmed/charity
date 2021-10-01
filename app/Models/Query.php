<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'message',
    ];

    public static $validationRule = [
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'message' => 'required|string',
    ];

    public function storeQuery(Object $request)
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->message = $request->message;
        $storeQuery = $this->save();

        $storeQuery
            ? session()->flash('message', 'Your Query Send Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyQuery(Int $id)
    {
        $query = $this::findOrFail($id);
        $destroyQuery = $query->delete();

        $destroyQuery
            ? session()->flash('message', 'Query Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
