<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    #constructor que inicializa el acceso a traves de la obligacion de estar logueado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	#llamada a los registros de roles usando Eloquent
    	$roles = Role::orderBy('nombre','ASC')->get(); #select * from roles order by nombre

    	return view('roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        return view('roles.show', compact('role')); #select * from roles where id = ?
    }

    public function create()
    {
    	return view('roles.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'nombre' => 'required|string|min:4|unique:roles',
    	]);

        #insert into roles values(null, ?)
    	$rol = new Role;
    	$rol->nombre = $request->nombre;
    	$rol->save();

    	return redirect('/roles')->with('success','El rol se ha registrado correctamente');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role')); #select * from roles where id = ?
    }

    public function update(Request $request, Role $role)
    {
        #return $request;
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
        ]);

        #update roles set nombre = ?
        $rol = Role::find($role->id);
        $rol->nombre = $request->nombre;
        $rol->save();

        return redirect('/roles/' . $role->id)->with('success','El rol se ha modificado correctamente');
    }
}
