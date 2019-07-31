<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\CreateCityRequest;
use Illuminate\Http\UpdateCityRequest;

use App\City;
use App\Country;

class CityController extends Controller
{
    public function index()
    {
        $users = City::paginate();
        
        return $users;
    }

    public function store(CreateCityRequest $request)
    {
        $inputs = $request->only('name', 'country_id');
        $city = City::create($inputs);
        
        return $city;
    }

    public function update(City $city, UpdateCityRequest $request)
    {
        $inputs = $request->only('name', 'country_id');
        
        $city->update($inputs);
        
        return response()->json(['message' => 'Success']);
    }
    
    public function destroy(City $city)
    {
        $city->delete();
        
        return response()->json(['message' => 'Success']);
    }
}
