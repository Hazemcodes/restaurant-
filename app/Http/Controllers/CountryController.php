<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
    public function index()
    {
        $country = Country::paginate();

        return $country;
    }

    public function store(CreateCountryRequest $request)
    {
        $inputs = $request->only('name');
        $country = Country::create($inputs);

        return $country;
    }

    public function update(Country $country, UpdateCountryRequest $request)
    {
        $inputs = $request->only('name');
        $country->update($inputs);
        
        return response()->json(['message' => 'Success']);
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return reponse()->json(['message' => 'Success']);
    }
}
