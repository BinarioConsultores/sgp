<?php

use sgp\FacturaDetalle;

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

Route::get('/information/create/ajax-state-verdetallefactura',function()
{
    $facd_id = Input::get('facd_id');

    $detalle=FacturaDetalle::find($facd_id);
    
    echo $detalle; die();
});

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
Route::get('/gerente/proyecto/{pro_id}','ProyectoController@getVer');

Route::post('/gerente/tarea','TareaController@getIndex');
Route::get('/gerente/tarea/crear','TareaController@getCrear');
Route::post('/gerente/tarea/crear','TareaController@postCrear');

Route::post('/usuario','UsuarioController@getIndex');
Route::get('/usuario/crear','UsuarioController@getCrear');
Route::post('/usuario/crear','UsuarioController@postCrear');


Route::get('/gerente/ajax/gerente/getVerProyectosPorTipo','ProyectoController@getVerProyectosPorTipo');


Route::get('/excel', function(){
	Excel::load('ejemplo.xls', function($reader) {
	    // reader methods
	});
	return 'ok';
});

Route::get('/importExport', 'ProyectoController@importExport');
Route::get('/downloadExcel/{type}', 'ProyectoController@downloadExcel');
Route::post('/importExcel', 'ProyectoController@importExcel');

Route::post('/gerente/proyecto/{pro_id}/loadcur','ProyectoController@postLoadCur');


Route::get('/gerente/proyecto/{pro_id}/factura/crear', 'FacturaController@getCrearFactura');
Route::post('/gerente/proyecto/{pro_id}/factura/crear', 'FacturaController@postCrearFactura');
Route::get('/gerente/proyecto/{pro_id}/factura/{fact_id}/editar', 'FacturaController@getEditarFactura');
Route::post('/gerente/proyecto/{pro_id}/factura/{fact_id}/editar', 'FacturaController@postEditarFactura');

Route::post('/gerente/proyecto/{pro_id}/loadcur','ProyectoController@postLoadCur');
Route::get('/gerente/proyecto/{pro_id}/factura/{fact_id}/creardetalle', 'FacturaController@getCrearDetalleFactura');
Route::post('/gerente/proyecto/{pro_id}/factura/{fact_id}/creardetalle', 'FacturaController@postCrearDetalleFactura');
Route::post('/gerente/proyecto/{pro_id}/factura/{fact_id}/editardetalle', 'FacturaController@postEditarDetalleFactura');
Route::get('/gerente/proyecto/{pro_id}/factura/{fact_id}/eliminar', 'FacturaController@getEliminarFactura');
Route::get('/gerente/proyecto/{pro_id}/factura/{fact_id}/eliminardetalle/{facd_id}', 'FacturaController@getEliminarDetalleFactura');



Route::get('/arbol', function(){
	return "ejemplos.arbol";
});


//Ponce
Route::get('/gerente/tarea','TareaController@getIndex');
Route::get('/gerente/tarea/crear','TareaController@getCrear');
Route::get('/gerente/tarea/mostrar','TareaController@getIndex');
Route::post('/gerente/tarea/crear','TareaController@postCrear');

Route::get('/gerente/archivotarea','ArchivotareaController@getIndex');
Route::get('/gerente/archivotarea/crear','ArchivotareaController@getCrear');
Route::post('/gerente/archivotarea/crear','ArchivotareaController@postCrear');
Route::get('/gerente/archivotareaeliminar','ArchivotareaController@getEliminar');

Route::get('/admin/usuario','UsuarioController@getIndex');
Route::get('/admin/usuario/crear','UsuarioController@getCrear');
Route::post('/admin/usuario/crear','UsuarioController@postCrear');
Route::get('/admin/usuario/eliminar','UsuarioController@getEliminar');


