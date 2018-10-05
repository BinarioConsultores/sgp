<?php

namespace sgp\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sgp\Tarea;
use sgp\Cliente;
use sgp\Proyecto;
use sgp\Usuario;


/**/
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
        $tarea = Tarea::all();
        return view('gerente.tarea.mostrarquery',['tarea'=>$tarea]);
    }
    public function getIndex2()
    {
        return view("gerente.tarea.arbol");
    }    
    public function getCrear()
    {
        $proyectos = Proyecto::all();
        $usuarios = Usuario::all();
        return view('gerente.tarea.crear', ['proyectos'=>$proyectos, 'usuarios'=>$usuarios]);
    }

    public function getVerTareas($pro_id){


        $tarea = Tarea::Where('pro_id', $pro_id)->get();

        //$tarea = Tarea::all();
        return view('gerente.tarea.estesi', ['tarea'=>$tarea]);
        //return $tarea;


        /*$proyecto = Proyecto::findOrFail($pro_id);
        return view("gerente.proyecto.ver", ["proyecto"=>$proyecto]);*/
    }

    public function traerHijos($tar_id){

        if ($hijos = Tarea::Where('tar_idpadre', $tar_id)->get()){
            $hijos_total = $hijos->count();
            if($hijos_total>0){
                return response()->json([
                    'totalhijos' => $hijos_total,
                ]);
            }
        }
        else{   
            return false;
        }
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

    public function getEliminar(Request $request)
    {
      $this->validate($request,['tar_id'=>'required']);
      $tar_id=$request->get('tar_id');
      $tarea = Tarea::find($tar_id);
      $tarea->delete();      

      return view('gerente.tarea.estesi')->with('eliminado','Eliminado correctamente'); 
    }
}
