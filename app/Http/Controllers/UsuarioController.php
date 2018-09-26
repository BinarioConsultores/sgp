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

            't_nom'=>'required',
            't_ape'=>'required',
            't_tel'=>'required',
            't_dni'=>'required',
            'usu_tip'=>'required',
            't_dir'=>'required',
            't_email'=>'required',
            'usu_pass'=>'required',   
        ]);
        /*[   
            'pro_nom.required'=>'Por favor, ingrese el nombre del proyecto',
            'pro_cd.required'=>'Por favor, ingrese el Costo Directo',
            'pro_cd.numeric'=>'Por favor, el campo Costo Directo debe ser numérico',
        ]*/

        /*$usuario = Usuario::create($request->all());
        $usuario->save();*/

        \DB::Transaction(function() use ($request){

        $personas = new Persona();
        $personas->per_nom = $request->get('t_nom');
        $personas->per_ape = $request->get('t_ape');
        $personas->per_tel = $request->get('t_tel');
        $personas->per_dni = $request->get('t_dni');
        $personas->per_dir = $request->get('t_dir');
        $personas->per_email = $request->get('t_email');
        $personas->save();

        $usuarios = new Usuario();
        $usuarios->usu_nom = $request->get('t_nom');
        $usuarios->usu_tip = $request->get('usu_tip');
        $usuarios->usu_email = $request->get('t_email');
        $usuarios->usu_pass = $request->get('usu_pass');
        $usuarios->per_id = $personas->per_id;
        $usuarios->save();

    });


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
