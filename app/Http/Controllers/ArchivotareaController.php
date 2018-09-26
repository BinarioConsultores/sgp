<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use sgp\ArchivoTarea;
use sgp\tarea;

class ArchivotareaController extends Controller
{
   /*public function __construct()
    {
    	$this->middleware('auth');
    }*/

    public function getIndex()
    {
    	$tarea = Tarea::all();
    	return view('gerente.archivotarea.mostrar',['tarea'=>$tarea]);
    	//return view('gerente.archivotarea.mostrar');

    }

    public function getCrear()
    {
    	/*$registrotareas = RegistroTarea::all();
        return view('gerente.archivotarea.crear', ['registrotareas'=>$registrotareas]);*/
    	return view('gerente.archivotarea.crear');
    }

    public function postCrear(Request $request)
    {
    	$this->validate($request,[
            'archita_nom'=>'required',
            'archita_peso'=>'required',
            'archita_tipo'=>'required',
            'archita_dir'=>'required',
            'regitar_id'=>'required',
        ]
        /*[   
            'pro_nom.required'=>'Por favor, ingrese el nombre del proyecto',
            'pro_cd.required'=>'Por favor, ingrese el Costo Directo',
            'pro_cd.numeric'=>'Por favor, el campo Costo Directo debe ser numérico',
        ]*/);

        $archivotareas = ArchivoTarea::create($request->all());
        $archivotarea->save();
    }
}
