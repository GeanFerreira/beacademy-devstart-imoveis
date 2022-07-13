<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $subtitle = 'Lista de Cidades';

        $cities = City::all();

        return view('admin.cities.index', compact('subtitle', 'cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function add(CityRequest $request)
    {
        City::create($request->all());

        $request->session()->flash('success', "Cidade $request->name incluída com sucesso!");

        return redirect()->route('admin.cities.index');
    }
}
