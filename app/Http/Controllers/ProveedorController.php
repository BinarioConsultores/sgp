<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use sgp\Proveedor;

class ProveedorController extends Controller
{
    /*public function __construct()
    {
    	$this->middleware('auth');
    }*/

    public function getIndex()
    {
    	$proveedores = Proveedor::all();
    	return view('proveedor.mostrarproveedor',['proveedores'=>$proveedores]);
    	//return view('proveedor.mostrarproveedor');

    }

    public function getCrear()
    {
    	return view('proveedor.mostrarproveedor');
    }

    public function postCrear(Request $request)
    {
    	$this->validate($request,['prov_nom'=>'required|unique:t_proveedor']);
    	Proveedor::create($request->all());
    	/*Proveedor::create([
    		'prov_ruc'=>$request['prov_ruc'],
    	]);*/

    	return redirect('/admin/proveedor')->with('creado','Creado correctamente');
    }

   
}
