<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use sgp\Cliente;

class ClienteController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getIndex()
    {
    	$clientes = Cliente::all();
    	return view('cliente.clientemostrar',['clientes'=>$clientes]);
    	//return view('cliente.clientemostrar');

    }

    public function getCrear()
    {
    	return view('cliente.clientemostrar');
    }

    public function postCrear(Request $request)
    {
    	$this->validate($request,['cli_nom'=>'required']);
      Cliente::create($request->all());

    	return redirect('/admin/cliente')->with('creado','Creado correctamente');
    }

    public function getEditar(Request $request)
    {
      $this->validate($request,['cli_id'=>'required']);
      $cli_id=$request->get('cli_id');
      $cliente = Cliente::find($cli_id);

      return $cliente; 
    }

    public function postEditar(Request $request)
    {
      $this->validate($request,['cli_nom'=>'required']);
      $cli_nom=$request->get('cli_nom');
      $cli_id=$request->get('cli_id');

      $cliente= Cliente::find($cli_id);
      $cliente->cli_nom = $cli_nom;
      $cliente->save();

      return redirect('/admin/cliente')->with('editado','Editado correctamente');
    }

    public function getEliminar(Request $request)
    {
      $this->validate($request,['cli_id'=>'required']);
      $cli_id=$request->get('cli_id');
      $cliente = Cliente::find($cli_id);
      $cliente->delete();      

      return redirect('/admin/cliente')->with('eliminado','Eliminado correctamente'); 
    }

    public function missingMethod($parameters=array()){
      abort(404);
    }
}
