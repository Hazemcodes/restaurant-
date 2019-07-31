<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate();

        return $category;
    }

    public function store(CreateCategoryRequest $request)
    {
        $inputs = $request->only('name');
        $category = Category::create($inputs);

        return $category;
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $inputs = $request->only('name');
        $category->update($inputs);
        
        return response()->json(['message' => 'Success']);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return reponse()->json(['message' => 'Success']);
    }
}
