<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use sgp\Factura;
use sgp\Proyecto;
use sgp\Proveedor;
use sgp\Empleado;
use sgp\Gasto;
use sgp\FacturaDetalle;


class FacturaController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getCrearFactura($pro_id){

    	$empleados = Empleado::All();
    	$proveedores = Proveedor::All();
    	$proyecto = Proyecto::findOrFail($pro_id);
    	return view('gerente.factura.crear',['empleados'=>$empleados,'proveedores'=>$proveedores,'proyecto'=>$proyecto]);
    }

    public function postCrearFactura($pro_id, Request $request){
    	$this->validate($request,[
            'fac_nro'=>'required',
            'fac_fech'=>'required',
            'fac_tipo'=>'required',
            'fac_est'=>'required',
            'fac_obs'=>'required',
            'prov_id'=>'required',
            'emp_id'=>'required',
            'pro_id'=>'required',
        ]);
        //para la factura
        //factura = 1
        //boleta = 2
        //sinvalor = 3
    	$objFactura = new Factura();
    	$objFactura->fac_nro = $request->get('fac_nro');
    	$objFactura->fac_fech = $request->get('fac_fech');
    	$objFactura->fac_est = $request->get('fac_est');
    	$objFactura->fac_obs = $request->get('fac_obs');
    	$objFactura->fac_tipo = $request->get('fac_tipo');
    	$objFactura->prov_id = $request->get('prov_id');
    	$objFactura->emp_id = $request->get('emp_id');
    	$objFactura->save();

    	return redirect('/gerente/proyecto/'.$pro_id.'/factura/'.$objFactura->fac_id.'/creardetalle');
    }

    public function getCrearDetalleFactura($pro_id, $fac_id){
    	$objProyecto = Proyecto::findOrFail($pro_id);
    	$objFactura = Factura::findOrFail($fac_id);
    	$empleados = Empleado::All();
    	$gastos = Gasto::All();
    	$proveedores = Proveedor::All();
    	return view('gerente.factura.creardetalle',['factura'=>$objFactura,'proyecto'=>$objProyecto,'empleados'=>$empleados,'proveedores'=>$proveedores,'gastos'=>$gastos]);
    }

    public function postCrearDetalleFactura($pro_id, $fac_id, Request $request){
        $this->validate($request,[
            'facd_desc'=>'required',
            'facd_cant'=>'required',
            'facd_punit'=>'required',
            'gas_id'=>'required',
            'recum_id'=>'required',
        ]);
        // $objDetalleFactura = new FacturaDetalle();
        // $objDetalleFactura = $request;


        // return view('gerente.factura.creardetalle',['factura'=>$objFactura,'proyecto'=>$objProyecto,'empleados'=>$empleados,'proveedores'=>$proveedores,'gastos'=>$gastos]);
    }
}
