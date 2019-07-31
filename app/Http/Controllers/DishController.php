<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Http\Requests\CreateDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Support\Arr;

class DishController extends Controller
{
    public function index()
    {
        $dish = Dish::paginate();

        return $dish;
    }

    public function store(CreateDishRequest $request)
    {
        $inputs = $request->only('name', 'resturant_id', 'description', 'price');
        $categories = $request->categories;

        $dish = Dish::create($inputs);
        $dish->categories()->attach($categories);

        return $dish;
    }

    public function update(Dish $dish, UpdateDishRequest $request)
    {
        $inputs = $request->only('name', 'resturant_id', 'description', 'price');
        $categories = $request->categories;
        $dish->update($inputs)->categories()->sync($categories);
        
        return response()->json(['message' => 'Success']);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->q;

        $query = Dish::when($searchQuery, function ($builder) use ($searchQuery) {
            return $builder->where('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('description', 'LIKE', '%' . $searchQuery . '%');
        });

        return $query->paginate();
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();

        return reponse()->json(['message' => 'Success']);
    }

    public function show(Dish $dish)
    {
        return $dish;
    }
}
