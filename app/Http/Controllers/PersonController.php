<?php

namespace App\Http\Controllers;

use App\Person;
use App\Comuna;
use App\User;
use Illuminate\Http\Request;

class PersonController extends Controller
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
    public function addPerson(User $user)
    {
        $comunas = Comuna::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('people.addPerson',compact('user','comunas'));
    }

    public function setPerson(Request $request, User $user)
    {
        $this->validate($request, [
            'telefono' => 'required|numeric|min:8|unique:people',
            'comuna' => 'required|integer',
        ]);

        if ($request->direccion) {
            $this->validate($request, [
                'direccion' => 'string|min:6|max:255',
            ]);
        }

        $person = new Person;
        $person->telefono = $request->telefono;
        $person->direccion = $request->direccion;
        $person->user_id = $user->id;
        $person->comuna_id = $request->comuna;
        $person->save();

        return redirect('/users/' . $user->id)->with('success','Los datos personales se han registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        $comunas = Comuna::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('people.edit', compact('comunas','person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $this->validate($request, [
            'telefono' => 'required|numeric|min:8',
            'comuna' => 'required|integer',
        ]);

        if ($request->direccion) {
            $this->validate($request, [
                'direccion' => 'string|min:6|max:255',
            ]);
        }

        $person = Person::find($person->id);
        $person->telefono = $request->telefono;
        $person->direccion = $request->direccion;
        $person->comuna_id = $request->comuna;
        $person->save();

        return redirect('/users/' . $person->user_id)->with('success','Los datos personales se han modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return redirect('/users/' . $person->user_id)->with('success','Los datos personales de este usuario se ha eliminado correctamente');
    }
}
