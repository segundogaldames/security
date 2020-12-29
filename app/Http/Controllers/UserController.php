<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->orderBY('name','ASC')->get();
        #select * from users inner join roles on users.role_id = roles.id

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id','nombre')->orderBy('nombre','ASC')->get();
        #select id,nombre from roles order by nombre;
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #return $request;
        $this->validate($request, [
            'name' => 'required|string|min:4',
            'email' => 'required|email|min:4|unique:users',
            'role' => 'required|integer',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->active = 1; #1 => activo y 2 => inactivo
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/users')->with('success','El usuario se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::select('id','nombre')->orderBY('nombre','ASC')->get();
        //select id,nombre from users order by nombre;
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|min:4',
            'email' => 'required|email|min:4',
            'role' => 'required|integer',
            'active' => 'required|integer',
        ]);

        $user = User::find($user->id); #select * from users where id = id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->active = $request->active;
        $user->save();

        return redirect('/users/' . $user->id)->with('success','El usuario se ha modificado correctamente');
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
