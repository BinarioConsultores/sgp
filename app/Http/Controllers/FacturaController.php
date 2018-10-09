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
        $objFactura->pro_id = $pro_id;
    	$objFactura->save();

    	return redirect('/gerente/proyecto/'.$pro_id.'/factura/'.$objFactura->fac_id.'/creardetalle');
    }

    public function getEditarFactura($pro_id,$fact_id){

        $empleados = Empleado::All();
        $proveedores = Proveedor::All();
        $proyecto = Proyecto::findOrFail($pro_id);
        $factura = Factura::findOrFail($fact_id);
        return view('gerente.factura.editar',['empleados'=>$empleados,'proveedores'=>$proveedores,'proyecto'=>$proyecto,'factura'=>$factura]);
    }

    public function postEditarFactura($pro_id,$fac_id, Request $request){
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
        $objFactura = Factura::findOrFail($fac_id);
        $objFactura->fac_nro = $request->get('fac_nro');
        $objFactura->fac_fech = $request->get('fac_fech');
        $objFactura->fac_est = $request->get('fac_est');
        $objFactura->fac_obs = $request->get('fac_obs');
        $objFactura->fac_tipo = $request->get('fac_tipo');
        $objFactura->prov_id = $request->get('prov_id');
        $objFactura->emp_id = $request->get('emp_id');
        $objFactura->pro_id = $pro_id;
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
        $objDetalleFactura = new FacturaDetalle();
        $objDetalleFactura->facd_desc = $request->get('facd_desc');
        $objDetalleFactura->facd_cant = $request->get('facd_cant');
        $objDetalleFactura->facd_punit = $request->get('facd_punit');
        $objDetalleFactura->gas_id = $request->get('gas_id');
        $objDetalleFactura->recum_id = $request->get('recum_id');
        $objDetalleFactura->fac_id = $fac_id;
        $objDetalleFactura->save();

        return redirect('/gerente/proyecto/'.$pro_id.'/factura/'.$fac_id.'/creardetalle');
    }

    public function postEditarDetalleFactura($pro_id, $fac_id,Request $request)
    {
        $this->validate($request,[
            'facd_id'=>'required',
            'facd_desc'=>'required',
            'facd_cant'=>'required',
            'facd_punit'=>'required',
            'gas_id'=>'required',
            'recum_id'=>'required',
        ]);

        $objDetalleFactura = FacturaDetalle::findOrFail($request->get('facd_id'));
        $objDetalleFactura->facd_desc = $request->get('facd_desc');
        $objDetalleFactura->facd_cant = $request->get('facd_cant');
        $objDetalleFactura->facd_punit = $request->get('facd_punit');
        $objDetalleFactura->gas_id = $request->get('gas_id');
        $objDetalleFactura->recum_id = $request->get('recum_id');
        $objDetalleFactura->fac_id = $fac_id;
        $objDetalleFactura->save();

        return redirect('/gerente/proyecto/'.$pro_id.'/factura/'.$fac_id.'/creardetalle');
    }

    public function getEliminarDetalleFactura($pro_id, $fac_id,$facd_id)
    {
        $objfacturadetalle = FacturaDetalle::find($facd_id);
        $objfacturadetalle->delete();

        return redirect('/gerente/proyecto/'.$pro_id.'/factura/'.$fac_id.'/creardetalle');
    }

    public function getEliminarFactura($pro_id,$fact_id)
    {

        FacturaDetalle::where('fac_id',$fact_id)->delete();

        Factura::find($fact_id)->delete();

        $proyecto = Proyecto::findOrFail($pro_id);
        return view("gerente.proyecto.ver", ["proyecto"=>$proyecto]);
    }
}
