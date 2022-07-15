<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\City;
use App\Models\Goal;
use App\Models\Neighborhood;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$properties = Property::with(['city', 'address'])->get();
        $properties = Property::join('cities', 'cities.id', '=', 'properties.city_id')
            ->join('addresses', 'addresses.property_id', '=', 'properties.id')
            ->orderBy('cities.name', 'asc')
            ->orderBy('addresses.bairro', 'asc')
            ->orderBy('tile', 'asc')
            ->get();
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $types = Type::all();
        $goals = Goal::all();
        $neighborhoods = Neighborhood::all();

        $action = route('admin.properties.store');
        return view('admin.properties.form', compact('action', 'cities', 'types', 'goals', 'neighborhoods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        DB::beginTransaction();
        $property = Property::create($request->all());
        $property->address()->create($request->all());

        if($request->has('neighborhoods'))
        {
            $property->neighborhoods()->sync($request->neighborhoods);
        }
        DB::Commit();

        $request->session()->flash('success', "Imóvel incluído com sucesso!");
        return redirect()->route('admin.properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
