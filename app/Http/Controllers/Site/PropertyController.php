<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index($idCity)
    {
        $city = City::find($idCity);

        $properties = Property::with(['goal', 'pictures'])
            ->where('city_id', $idCity)
            ->paginate(4);

        return view('site.cities.properties.index', compact('city', 'properties'));
    }

    public function show($idCity, $idProperty)
    {
        $property = Property::find($idProperty);

        return view('site.cities.properties.show', compact('property'));
    }
}
