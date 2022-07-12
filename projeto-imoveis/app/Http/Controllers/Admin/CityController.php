<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $subtitle = 'Lista de Cidades';

        $cities = City::all();

        return view('admin.cities.index', compact('subtitle', 'cities'));
    }

    public function formAdd()
    {
        return "formAdd";
    }
}
