<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use sgp\Proyecto;
use sgp\Cliente;
use sgp\Recurso;
use sgp\UnidadMedida;
use sgp\Cur;
use sgp\Factura;
use sgp\Empleado;
use sgp\Gasto;
use sgp\Proveedor;
use sgp\CurDetalle;
use sgp\RecursoUnidadMedida;

class ControlController extends Controller
{

public function getIndex(){
        return view("gerente.control.mostrar", ["proyectos"=>Proyecto::All()]);
    }

public function getVer($pro_id){
        $proyecto = Proyecto::findOrFail($pro_id);
        return view("gerente.control.ver", ["proyecto"=>$proyecto]);
    }

public function getVerRec(){

    	return view("gerente.control.detallerecurso");

	}
public function getVerRecursos($pro_id){
    	$objProyecto = Proyecto::findOrFail($pro_id);
    	$empleados = Empleado::All();
    	$gastos = Gasto::All();
    	$proveedores = Proveedor::All();
    	return view('gerente.control.ver',['proyecto'=>$objProyecto,'empleados'=>$empleados,'proveedores'=>$proveedores,'gastos'=>$gastos]);
    }

public function getVerRecurso($pro_id,$recum_id){
    	$objProyecto = Proyecto::findOrFail($pro_id);
    	$objRecursoUnidadMedida = RecursoUnidadMedida::findOrFail($recum_id);
    	return view('gerente.control.detallerecurso',['proyecto'=>$objProyecto,'objRecursoUnidadMedida'=>$objRecursoUnidadMedida]);
    }
}
