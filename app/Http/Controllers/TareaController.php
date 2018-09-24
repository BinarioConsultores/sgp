<?php

namespace sgp\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sgp\Cliente;
use sgp\Proyecto;
use sgp\Tarea;
use sgp\Usuario;



class TareaController extends Controller
{
    //
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
        return view("gerente.tarea.mostrar");
    }
    public function getIndex2()
    {
        return view("gerente.tarea.arbol");
    }    
    public function getCrear()
    {
        $proyectos = Proyecto::all();
        return view("gerente.tarea.crear", ["proyectos"=>$proyectos]);
    }
    public function postCrear(Request $request)
    {
        $this->validate($request,[
            'tar_nom'=>'required',
            'tar_desc'=>'required',
            'tar_fechin'=>'required',
            'tar_fechfin'=>'required',
            'tar_prio'=>'required',
            'tar_est'=>'required',
            'pro_id'=>'required',
            'usu_id'=>'required',
        ]);

        $tarea = new Tarea();
        $tarea->tar_nom = $request->get('tar_nom');
        $tarea->tar_desc = $request->get('tar_desc');
        $tarea->tar_fechin = $request->get('tar_fechin');
        $tarea->tar_fechfin = $request->get('tar_fechfin');
        $tarea->tar_prio = $request->get('tar_prio');
        $tarea->tar_est = $request->get('tar_est');
        $tarea->tar_idpadre = 1;
        $tarea->pro_id = $request->get('pro_id');
        $tarea->usu_id = $request->get('usu_id');
        $tarea->save();


        return redirect("/gerente/tarea/mostrar")->with('creada','¡La tarea se ha creado con éxito!');
    }
}
