<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Region;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    #metodos get y post para registrar comuna por region
    public function addComuna(Region $region)
    {
        return view('comunas.addComuna', compact('region'));
    }

    public function setComuna(Request $request, Region $region)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4|unique:comunas',
        ]);

        $comuna = new Comuna;
        $comuna->nombre = $request->nombre;
        $comuna->region_id = $region->id;
        $comuna->save();

        return redirect('/regions/' . $region->id)->with('success','La comuna se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function show(Comuna $comuna)
    {
        return view('comunas.show', compact('comuna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function edit(Comuna $comuna)
    {
        $regions = Region::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('comunas.edit', compact('comuna','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comuna $comuna)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
            'region' => 'required|integer',
        ]);

        $comuna = Comuna::find($comuna->id);
        $comuna->nombre = $request->nombre;
        $comuna->region_id = $request->region;
        $comuna->save();

        return redirect('/comunas/' . $comuna->id)->with('success','La comuna se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comuna $comuna)
    {
        //
    }
}
