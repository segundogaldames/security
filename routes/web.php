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
Route::get('/comunas/addComuna/{region}','ComunaController@addComuna')->name('comunas.addComuna');
Route::post('/comunas/setComuna/{region}','ComunaController@setComuna')->name('comunas.setComuna');
Route::get('/people/addPerson/{user}','PersonController@addPerson')->name('people.addPerson');
Route::post('/people/setPerson/{user}','PersonController@setPerson')->name('people.setPerson');
Route::get('/images/addImagen/{product}','ImageController@addImage')->name('images.addImage');
Route::post('/images/setImage/{product}','ImageController@setImage')->name('images.setImage');
Route::get('/images/changePrincipal/{image}','ImageController@changePrincipal')->name('images.changePrincipal');
Route::put('/images/modifyPrincipal/{image}','ImageController@modifyPrincipal')->name('images.modifyPrincipal');

Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('regions','RegionController');
Route::resource('comunas','ComunaController');
Route::resource('people','PersonController');
Route::resource('categories','CategoryController');
Route::resource('products','ProductController');
Route::resource('images','ImageController');

/*
http es un protocolo de peticiones y respuestas en html
Verbos: GET => carga informacion desde el servidor en el navegador
		POST => enviar peticiones al servidor de manera interna
		PUT => actualizar datos en el servidor
		DELETE => eliminar recursos en el servidor
*/