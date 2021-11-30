<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'position', 'order', 'education', 'area',
    ];

    public static $validateRule = [
        'name' => ['required', 'string', 'max: 255'],
        'position' => ['required', 'string', 'max: 255'],
        'order' => ['required', 'numeric', 'min: 1'],
        'education' => ['nullable', 'string'],
        'area' => ['nullable', 'string'],
    ];

    public function storeExpert(Object $request)
    {
        $this->name = $request->name;
        $this->position = $request->position;
        $this->order = $request->order;
        $this->education = $request->education;
        $this->area = $request->area;
        $storeExpert = $this->save();

        $storeExpert
            ? session()->flash('message', 'New Expert Info Stored Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateExpert(Object $request, Object $expert)
    {
        $expert->name = $request->name;
        $expert->position = $request->position;
        $expert->order = $request->order;
        $expert->education = $request->education;
        $expert->area = $request->area;
        $updateExpert = $expert->save();

        $updateExpert
            ? session()->flash('message', 'Expert Info Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyExpert(Object $expert)
    {
        $destroyExpert = $expert->delete();

        $destroyExpert
            ? session()->flash('message', 'Expert Info Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
