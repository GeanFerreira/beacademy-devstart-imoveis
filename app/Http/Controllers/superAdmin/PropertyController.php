<?php

namespace App\Http\Controllers\superAdmin;

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
    public function index(Request $request)
    {
        $properties = Property::join('cities', 'cities.id', '=', 'properties.city_id')
            ->join('addresses', 'addresses.property_id', '=', 'properties.id')
            ->orderBy('cities.name', 'asc')
            ->orderBy('addresses.bairro', 'asc')
            ->orderBy('title', 'asc');

        $city_id = $request->city_id;
        $title = $request->title;

        if($request->city_id)
        {
            $properties->where('cities.id', $city_id);
        }

        if($request->title)
        {
            $properties->where('title', 'like', "%$title%");
        }
        //WHERE city.id = 1 AND title like "%valor%" AND ...
        $properties = $properties->paginate(3)->withQueryString();

        $cities = City::orderBy('name')->get();

        return view('superAdmin.properties.index', compact('properties', 'cities', 'title', 'city_id'));
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
        return view('superAdmin.properties.form', compact('action', 'cities', 'types', 'goals', 'neighborhoods'));
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
            $property->neighborhoods()->create($request->neighborhoods);
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
        $property = Property::with(['city', 'address', 'goal', 'type', 'neighborhoods'])->find($id);

        return view('superAdmin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $property = Property::with(['city', 'address', 'goal', 'type', 'neighborhoods'])->find($id);

        $cities = City::all();
        $types = Type::all();
        $goals = Goal::all();
        $neighborhoods = Neighborhood::all();

        $action = route('admin.properties.update', $property->id);
        return view('superAdmin.properties.form', compact('property','action', 'cities', 'types', 'goals', 'neighborhoods'));
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
        $property = Property::find($id);

        DB::beginTransaction();
        $property->update($request->all());
        $property->address->update($request->all());

        if($request->has('neighborhoods'))
        {
            $property->neighborhoods()->sync($request->neighborhoods);
        }
        DB::commit();

        $request->session()->flash('success', "Imóvel atualizado com sucesso!");
        return redirect()->route('admin.properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $property = Property::find($id);
        DB::beginTransaction();
        $property->address->delete();
        $property->delete();
        DB::commit();

        $request->session()->flash('success', 'Imóvel excluído com sucesso!');
        return redirect()->route('admin.properties.index');
    }
}
