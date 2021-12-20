<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }

    public function causes()
    {
        return $this->hasMany('App\Models\Cause');
    }

    protected $fillable = [
        'name',
    ];

    public static $validateStoreRule = [

        'name'  => 'required|string|max:255|unique:categories,name',
    ];

    public static $validateUpdateRule = [

        'name' => 'required|string|max:255',
    ];

    public function getCategories()
    {
        $categories = $this::join('causes', 'causes.category_id', '=', 'categories.id')
            ->orderBy('categories.name', 'asc')
            ->groupBy('causes.category_id')
            ->select([
                DB::raw('count(causes.id) as total'), 'categories.name', 'categories.id'
            ])
            ->get();
        return $categories;
    }

    public function getResearchCategories()
    {
        $services = $this::join('research', 'categories.id', '=', 'research.category_id')
            ->orderBy('categories.name', 'asc')
            ->groupBy('research.category_id')
            ->select([
                DB::raw('count(research.id) as total'), 'categories.name', 'categories.id'
            ])
            ->get();
        return $services;
    }

    public function storeCategory($request)
    {
        $this->name         = $request->name;
        $storeCategory           = $this->save();

        $storeCategory
            ? session()->flash('message', 'New Category Created Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }

    public function updateCategory($request, $id)
    {
        try {

            $category  = $this::findOrFail($id);

            $category->name     = $request->name;
            $updateCategory    = $category->save();

            $updateCategory
                ? session()->flash('message', 'Category Updated Successfully!')
                : session()->flash('message', 'Something Went Wrong!');
        } catch (QueryException $exception) {

            return redirect()->back()->withErrors('The category has already exists.');
        }
    }

    public function deleteCategory($id)
    {
        $category = $this::findOrFail($id);
        $deleteCategory = $category->delete();

        $deleteCategory
            ? session()->flash('message', 'Category Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
    }
}
