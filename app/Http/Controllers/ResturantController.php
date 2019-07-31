<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\CreateResturantRequest;
use Illuminate\Http\UpdateResturantRequest;
use App\Resturant;

class ResturantController extends Controller
{
    public function index()
    {
        $resturants = Resturant::paginate();
        return $resturants;
    }
    
    public function show(Resturant $resturant)
    {
        return $resturant;
    }

    public function create(CreateResturantRequest $request)
    {
        $inputs = $request->only('name', 'city_id', 'address', 'phone', 'description');
        $resturant = Resturant::create($inputs);
        
        return $resturant;
    }
    
    public function update(UpdateResturantRequest $resturant, Request $request)
    {
        $inputs = $request->only('name', 'city_id', 'address', 'phone', 'description');
        $resturant->update($inputs);
        
        return response()->json(['message' => 'Success']);
    }
    
    public function menu(Resturant $resturant)
    {
        return $resturant->dishes;
    }

    public function destroy(Resturant $resturant)
    {
        $resturant->delete();
        
        return response()->json(['message' => 'Success']);
    }
}
