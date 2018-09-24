<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sgp\Cliente;
use sgp\Proyecto;

class ProyectoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view("gerente.proyecto.mostrar");
    }
    
    public function getCrear()
    {
        $clientes = Cliente::all();
        return view("gerente.proyecto.crear", ["clientes"=>$clientes]);
    }
    
    public function postCrear(Request $request)
    {
        $this->validate($request,[
            'pro_nom'=>'required',
            'pro_tipo'=>'required',
            'pro_ubi'=>'required',
            'pro_cd'=>'required|numeric',
            'pro_gg'=>'required',
            'pro_uti'=>'required',
            'pro_fechin'=>'required',
            'pro_fechfin'=>'required',
            'cli_id'=>'required',
        ],
        [   
            'pro_nom.required'=>'Por favor, ingrese el nombre del proyecto',
            'pro_cd.required'=>'Por favor, ingrese el Costo Directo',
            'pro_cd.numeric'=>'Por favor, el campo Costo Directo debe ser numérico',
        ]);

        $proyecto = new Proyecto();
        $proyecto->pro_nom = $request->get('pro_nom');
        $proyecto->pro_ubi = $request->get('pro_ubi');
        $proyecto->pro_tipo = $request->get('pro_tipo');
        $proyecto->pro_fechin = $request->get('pro_fechin');
        $proyecto->pro_gg = $request->get('pro_gg');
        $proyecto->pro_uti = $request->get('pro_uti');
        $proyecto->pro_cd = $request->get('pro_cd');
        $proyecto->pro_fechfin = $request->get('pro_fechfin');
        $proyecto->cli_id = $request->get('cli_id');
        $proyecto->save();


        return redirect("/gerente/proyectos")->with('creado','¡El proyecto se ha creado con éxito!');
    }
}
