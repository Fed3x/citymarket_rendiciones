<?php

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



Route::group(['middleware' => 'auth'], function (){

Route::get('/sitios', function () {
    return view('sucursales');
});

Route::get('/distancias', function () {
    return view('distancias');
});

Route::get('/pruebas', 'SitiosSQLSRVController@importar');
Route::get('/pruebaspdf', function(){
    return view('PDF.plantilla');
});

Route::post('/ImportarDistancias', 'DistanciasController@import');
Route::get('/distancia/export/', 'DistanciasController@export');

    
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dataSitios', 'DataController@dataSitios')->name('ciudades');

Route::ApiResource('tarea', 'TareasController');
Route::ApiResource('sitio', 'SitiosController');
Route::ApiResource('distancia', 'DistanciasController');
Route::ApiResource('rendicion', 'RendicionesController');

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/login")
      ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});
});