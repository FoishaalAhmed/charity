<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryObject;

    public function __construct()
    {
        $this->categoryObject = new Category;
    }

    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(Category::$validateStoreRule);
        $this->categoryObject->storeCategory($request);
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate(Category::$validateUpdateRule);
        $this->categoryObject->updateCategory($request, $request->id);
        return back();
    }

    public function destroy($id)
    {
        $this->categoryObject->deleteCategory($id);
        return back();
    }
}
