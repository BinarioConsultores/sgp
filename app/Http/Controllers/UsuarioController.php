<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use sgp\Usuario;
use sgp\Persona;

class UsuarioController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getIndex()
    {
    	$usuarios = Usuario::all();
    	return view('admin.usuario.mostrar',['usuarios'=>$usuarios]);
    	//return view('admin.usuario.mostrar');

    }

    public function getCrear()
    {
    	$personas = Persona::all();
        return view('admin.usuario.crear', ['personas'=>$personas]);
    	//return view('admin.usuario.crear');
    }

    public function postCrear(Request $request)
    {
    	$this->validate($request,[
            'usu_nom'=>'required',
            'usu_tip'=>'required',
            'usu_email'=>'required',
            'usu_pass'=>'required',
            'per_id'=>'required',
        ]
        /*[   
            'pro_nom.required'=>'Por favor, ingrese el nombre del proyecto',
            'pro_cd.required'=>'Por favor, ingrese el Costo Directo',
            'pro_cd.numeric'=>'Por favor, el campo Costo Directo debe ser numérico',
        ]*/);

        $usuario = Usuario::create($request->all());
        $usuario->save();



       /*$proyecto = new Proyecto();
        $proyecto->pro_nom = $request->get('pro_nom');
        $proyecto->pro_ubi = $request->get('pro_ubi');
        $proyecto->pro_tipo = $request->get('pro_tipo');
        $proyecto->pro_fechin = $request->get('pro_fechin');
        $proyecto->pro_gg = $request->get('pro_gg');
        $proyecto->pro_uti = $request->get('pro_uti');
        $proyecto->pro_cd = $request->get('pro_cd');
        $proyecto->pro_fechfin = $request->get('pro_fechfin');
        $proyecto->cli_id = $request->get('cli_id');
        $proyecto->save();*/


        return redirect('/admin/usuario')->with('creado','¡El Usuario se ha creado con éxito!');
    	/*$this->validate($request,['cli_nom'=>'required']);
      Cliente::create($request->all());

    	return redirect('/admin/cliente')->with('creado','Creado correctamente');*/
    }

    public function getEliminar(Request $request)
    {
      $this->validate($request,['usu_id'=>'required']);
      $usu_id=$request->get('usu_id');
      $usuario = Usuario::find($usu_id);
      $usuario->delete();      

      return redirect('/admin/usuario')->with('eliminado','Usuario eliminado correctamente'); 
    }
}
