<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'type', 'detail',
    ];

    public static $validateRule = [
        'category_id' => ['required', 'numeric'],
        'type' => ['required', 'string', 'max:50'],
        'detail' => ['required', 'string'],
    ];

    public function getAllResearch()
    {
        $researches = $this::join('categories', 'research.category_id', '=', 'categories.id')
            ->orderBy('research.id', 'desc')
            ->select('research.*', 'categories.name')
            ->get();
        return $researches;
    }

    public function getAllResearchByType($type)
    {
        $researches = $this::join('categories', 'research.category_id', '=', 'categories.id')
            ->where('research.type', $type)
            ->orderBy('categories.name', 'asc')
            ->select('research.*', 'categories.name')
            ->get();
        return $researches;
    }

    public function storeResearch(Object $request)
    {
        $this->category_id = $request->category_id;
        $this->type = $request->type;
        $this->detail = $request->detail;
        $storeResearch = $this->save();

        $storeResearch
            ? session()->flash('message', 'New Research Info Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateResearch(Object $request, Object $research)
    {
        $research->category_id = $request->category_id;
        $research->type = $request->type;
        $research->detail = $request->detail;
        $updateResearch = $research->save();

        $updateResearch
            ? session()->flash('message', 'Research Info Updated Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function destroyResearch(Object $research)
    {
        $destroyResearch = $research->delete();

        $destroyResearch
            ? session()->flash('message', 'Research Info Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
