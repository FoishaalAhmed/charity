<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static $validateStoreRule = [

        'name'  => 'required|string|max:255|unique:categories,name',
    ];

    public static $validateUpdateRule = [

        'name' => 'required|string|max:255',
    ];

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
