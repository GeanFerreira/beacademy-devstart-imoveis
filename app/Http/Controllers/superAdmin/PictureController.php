<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PictureRequest;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Models\Property;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

//use phpDocumentor\Reflection\DocBlock\Tags\Property;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($idProperty)
    {
        $property = Property::find($idProperty);

        $pictures = Picture::where('property_id', '=', $idProperty)->get();

        return view('superAdmin.properties.pictures.index', compact('property', 'pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($idProperty)
    {
        $property = Property::find($idProperty);

        return view('superAdmin.properties.pictures.form', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PictureRequest $request, $idProperty)
    {
        if($request->hasFile('picture'))
        {
            if($request->picture->isValid())
            {
                //$pictureURL = $request->picture->store("properties/$idProperty", 'public');
                //utilizando intervention image
                $pictureURL = $request->picture->hashName("properties/$idProperty");

                //Redimensionar a Image
                $image = Image::make($request->picture)->fit(1600, 900);
                //Salvar image redimensionada
                Storage::disk('public')->put($pictureURL, $image->encode());
            }

            $picture = new Picture();
            $picture->url = $pictureURL;
            $picture->property_id = $idProperty;
            $picture->save();
        }

        $request->session()->flash('success', "Foto incluída com sucesso!");
        return redirect()->route('admin.properties.pictures.index', $idProperty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $idProperty, $idPicture)
    {
        $picture = Picture::find($idPicture);

        //Apagar a imagem no disco
        Storage::disk('public')->delete($picture->url);

        //Apagar o registro no BD
        $picture->delete();

        $request->session()->flash('success', 'Foto excluída com sucesso!');
        return redirect()->route('admin.properties.pictures.index', $idProperty);
    }
}
