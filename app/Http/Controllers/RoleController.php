<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
    	#llamada a los registros de roles usando Eloquent
    	$roles = Role::all(); #select * from roles

    	return view('roles.index', compact('roles'));
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

    	$rol = new Role;
    	$rol->nombre = $request->nombre;
    	$rol->save();

    	return redirect('/roles')->with('success','El rol se ha registrado correctamente');
    }
}
