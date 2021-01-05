<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('regions','RegionController');
Route::resource('comunas','ComunaController');

/*
http es un protocolo de peticiones y respuestas en html
Verbos: GET => carga informacion desde el servidor en el navegador
		POST => enviar peticiones al servidor de manera interna
		PUT => actualizar datos en el servidor
		DELETE => eliminar recursos en el servidor
*/