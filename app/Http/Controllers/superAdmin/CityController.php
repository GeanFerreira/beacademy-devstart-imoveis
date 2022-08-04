<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $subtitle = 'Lista de Cidades';
        $cities = City::orderBy('name', 'asc')->get();
        return view('superAdmin.cities.index', compact('subtitle', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.cities.store');
        return view('superAdmin.cities.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CityRequest $request)
    {
        City::create($request->all());
        $request->session()->flash('success', "Cidade $request->name incluída com sucesso!");
        return redirect()->route('admin.cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $action = route('admin.cities.update', $city->id);
        return view('superAdmin.cities.form', compact('city', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        $city->update($request->all());

        $request->session()->flash('success', "Cidade $request->name alterada com sucesso!");
        return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        City::destroy($id);
        $request->session()->flash('success', 'Cidade excluída com sucesso!');
        return redirect()->route('admin.cities.index');
    }
}
