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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/headeradmin', function(){
	return view('plantillas.headeradmin');
});
Route::get('/paginaenblanco', function(){
	return view('plantillas.paginaenblanco');
});
Route::get('/admin/cliente','ClienteController@getIndex');
Route::get('/admin/cliente/crear','ClienteController@getCrear');
Route::post('/admin/cliente/crear','ClienteController@postCrear');
Route::get('/admin/cliente/editar','ClienteController@getEditar');
Route::post('/admin/cliente/editar','ClienteController@postEditar');
Route::get('/admin/cliente/eliminar','ClienteController@getEliminar');

Route::get('/admin/proveedor','ProveedorController@getIndex');
Route::get('/admin/proveedor/crear','ProveedorController@getCrear');
Route::post('/admin/proveedor/crear','ProveedorController@postCrear');
Route::get('/admin/proveedor/editar','ProveedorController@getEditar');
Route::post('/admin/proveedor/editar','ProveedorController@postEditar');
Route::get('/admin/proveedor/eliminar','ProveedorController@getEliminar');

Route::get('/gerente/proyectos','ProyectoController@getIndex');

Route::get('/gerente/proyecto/crear','ProyectoController@getCrear');
Route::post('/gerente/proyecto/crear','ProyectoController@postCrear');


Route::get('prueba', function(){
	return "Hola";
});
