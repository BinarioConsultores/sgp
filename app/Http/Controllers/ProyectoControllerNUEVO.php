<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sgp\Cliente;
use sgp\Proyecto;
use sgp\Recurso;
use sgp\UnidadMedida;
use sgp\Cur;
use sgp\Gasto;
use sgp\Empleado;
use sgp\Proveedor;
use sgp\CurDetalle;
use sgp\CurdPlazo;
use sgp\RecursoUnidadMedida;
use sgp\Factura;
use sgp\FacturaDetalle;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
use Illuminate\Support\Facades\Input;

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
        return view("gerente.proyecto.mostrar", ["proyectos"=>Proyecto::All()]);
        // return json_encode(\DB::table('t_proyecto')->get());
    }
    
    public function getCrear()
    {
        $clientes = Cliente::all();
        return view("gerente.proyecto.crear", ["clientes"=>$clientes]);
    }


    public function getVer($pro_id){
        $proyecto = Proyecto::findOrFail($pro_id);
        $empleados = Empleado::All();
        $proveedores = Proveedor::All();
        $gastos = Gasto::All();
        $factura = Factura::findOrFail(1);
        $modo="normal";

        /*return $facturas->where('fac_id',1)->get();
        die();*/
        return view("gerente.proyecto.ver", ['empleados'=>$empleados,'proveedores'=>$proveedores,'proyecto'=>$proyecto,'gastos'=>$gastos,'factura'=>$factura,'modo'=>$modo]);
    }

    public function getVerEditar($pro_id,$fact_id){
        $proyecto = Proyecto::findOrFail($pro_id);
        $empleados = Empleado::All();
        $proveedores = Proveedor::All();
        $gastos = Gasto::All();
        $factura = Factura::findOrFail($fact_id);
        $modo="editar";

        /*return $facturas->where('fac_id',1)->get();
        die();*/
        return view("gerente.proyecto.ver", ['empleados'=>$empleados,'proveedores'=>$proveedores,'proyecto'=>$proyecto,'gastos'=>$gastos,'factura'=>$factura,'modo'=>$modo]);
    }

    public function getVerMostrar($pro_id,$fact_id){
        $proyecto = Proyecto::findOrFail($pro_id);
        $empleados = Empleado::All();
        $proveedores = Proveedor::All();
        $gastos = Gasto::All();
        $factura = Factura::findOrFail($fact_id);
        $modo="ver";

        /*return $facturas->where('fac_id',1)->get();
        die();*/
        return view("gerente.proyecto.ver", ['empleados'=>$empleados,'proveedores'=>$proveedores,'proyecto'=>$proyecto,'gastos'=>$gastos,'factura'=>$factura,'modo'=>$modo]);
    }
    
    
    public function postCrear(Request $request)
    {
        $this->validate($request,[
            'pro_nom'=>'required',
            'pro_tipo'=>'required',
            'pro_ubi'=>'required',
            'pro_cd'=>'required|numeric',
            'pro_gg'=>'required|numeric',
            'pro_uti'=>'required|numeric',
            'pro_fechin'=>'required',
            'pro_fechfin'=>'required',
            'cli_id'=>'required',
        ],
        [   
            'pro_nom.required'=>'Por favor, ingrese el nombre del proyecto',
            'pro_tipo.required'=>'Por favor, seleccione el tipo del proyecto',
            'pro_ubi.required'=>'Por favor, ingrese la ubicación del proyecto',
            'pro_cd.required'=>'Por favor, ingrese el Costo Directo',
            'pro_cd.numeric'=>'Por favor, el campo Costo Directo debe ser numérico',
            'pro_gg.required'=>'Por favor, ingrese los Gastos Generales',
            'pro_gg.numeric'=>'Por favor, el campo Gastos Generales debe ser numérico',
            'pro_uti.required'=>'Por favor, ingrese las Utilidades',
            'pro_uti.numeric'=>'Por favor, el campo Utilidades debe ser numérico',
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

        $presupuestoexcel = $request->file('path');

        return redirect("/gerente/proyecto/".$proyecto->pro_id)->with('creado','¡El proyecto se ha creado con éxito!');
    }

    public function postCrearFacturayDetalle($pro_id, Request $request){

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

        if($request->get('cambio')=="SI")
        {
            //$comprobante->pagos()->delete();
            
            $nro_filas = strtoupper($request->get('nro_filas'));

            
            for ($i=2; $i < $nro_filas ; $i++) { 
                $desc=$request->get('desc'.$i);
                $recuid=$request->get('recuid'.$i);
                $cant=$request->get('cant'.$i);
                $puni=$request->get('puni'.$i);
                $gasid=$request->get('gasid'.$i);

                $objDetalleFactura = new FacturaDetalle();
                $objDetalleFactura->facd_desc = $desc;
                $objDetalleFactura->facd_cant = $cant;
                $objDetalleFactura->facd_punit = $puni;
                $objDetalleFactura->gas_id = $gasid;
                $objDetalleFactura->recum_id = $recuid;
                $objDetalleFactura->fac_id = $objFactura->fac_id;
                $objDetalleFactura->save();
            }
        }


        /*$objDetalleFactura = new FacturaDetalle();
        $objDetalleFactura->facd_desc = $request->get('facd_desc');
        $objDetalleFactura->facd_cant = $request->get('facd_cant');
        $objDetalleFactura->facd_punit = $request->get('facd_punit');
        $objDetalleFactura->gas_id = $request->get('gas_id');
        $objDetalleFactura->recum_id = $request->get('recum_id');
        $objDetalleFactura->fac_id = $fac_id;
        $objDetalleFactura->save();*/

        return redirect('/gerente/proyecto/'.$pro_id.'/factura/'.$objFactura->fac_id.'/creardetalle')->with('creado','Se creó la factura exitosamente');
    }

    public function postEditarFacturayDetalle($pro_id, $fac_id,Request $request){

        $this->validate($request,[
            'efac_nro'=>'required',
            'efac_fech'=>'required',
            'efac_tipo'=>'required',
            'efac_est'=>'required',
            'efac_obs'=>'required',
            'eprov_id'=>'required',
            'eemp_id'=>'required',
        ]);
        //para la factura
        //factura = 1
        //boleta = 2
        //sinvalor = 3
        $objFactura = Factura::findOrFail($fac_id);
        $objFactura->fac_nro = $request->get('efac_nro');
        $objFactura->fac_fech = $request->get('efac_fech');
        $objFactura->fac_est = $request->get('efac_est');
        $objFactura->fac_obs = $request->get('efac_obs');
        $objFactura->fac_tipo = $request->get('efac_tipo');
        $objFactura->prov_id = $request->get('eprov_id');
        $objFactura->emp_id = $request->get('eemp_id');
        $objFactura->pro_id = $pro_id;
        $objFactura->save();

        if($request->get('ecambio')=="SI")
        {
            $objFactura->FacturaDetalles()->delete();
            
            $nro_filas = strtoupper($request->get('enro_filas'));

            
            for ($i=2; $i < $nro_filas ; $i++) { 

                $desc=$request->get('edesc'.$i);
                $recuid=$request->get('erecuid'.$i);
                $cant=$request->get('ecant'.$i);
                $puni=$request->get('epuni'.$i);
                $gasid=$request->get('egasid'.$i);

                $objDetalleFactura = new FacturaDetalle();
                $objDetalleFactura->facd_desc = $desc;
                $objDetalleFactura->facd_cant = $cant;
                $objDetalleFactura->facd_punit = $puni;
                $objDetalleFactura->gas_id = $gasid;
                $objDetalleFactura->recum_id = $recuid;
                $objDetalleFactura->fac_id = $objFactura->fac_id;
                $objDetalleFactura->save();
            }
        }

        return redirect('/gerente/proyecto/'.$pro_id.'/factura/'.$objFactura->fac_id.'/creardetalle')->with('creado','Se creó la factura exitosamente');
    }


    public function getVerProyectosPorTipo(Request $request){
        
        switch ($request->get('identificador')) {
            case 0:
                $proyectos = Proyecto::where('pro_tipo','obra')->get();
                break;
            case 1:
                $proyectos = Proyecto::where('pro_tipo','supervision')->get();
                break;
            case 2:
                $proyectos = Proyecto::where('pro_tipo','expediente')->get();
                break;
            default:
                $proyectos = [];
                break;
        }
        return $proyectos;
    }


    public function importExport()
    {
        return view('ejemplos.importExport');
    }
    public function downloadExcel($type)
    {
        $data = Proyecto::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function postLoadCur($pro_id, Request $request){
        $this->validate($request,[
            'import_file'=>'required',
            'cur_pl'=>'required',
            'cur_ul'=>'required',
        ]);

        if(Input::hasFile('import_file')){

             \DB::transaction(function() use ($request, $pro_id){
                /**
                 * Se crea el Calendario de Utilización de Recursos
                 *
                 * @var        Cur
                 */
                $objCur = new Cur();
                $objCur->cur_dir = $request->import_file->storeAs('curs', $pro_id.".xlsx");
                $objCur->pro_id = $pro_id;
                $objCur->save();


                $path = Input::file('import_file')->getRealPath();
                $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
                //$reader = ReaderFactory::create(Type::CSV); // for CSV files
                //$reader = ReaderFactory::create(Type::ODS); // for ODS files
                
                $reader->open($path);
                $objCurdAntiguo = new CurDetalle();
                $flagCurdPadre = false;
                $arrayFechas=array();
                
                
                foreach ($reader->getSheetIterator() as $hojas =>$sheet) {
                    foreach ($sheet->getRowIterator() as $contfilas =>$fila) {
                        
                        if (($contfilas >= $request->get('cur_pl')-2) and ($contfilas<=$request->get('cur_ul')-1)) {
                            

                            $objCurd = new CurDetalle();
                            $objCurd->cur_id = $objCur->cur_id;
                            return $fila[1];
                            //analizar si es recurso o no
                            if (trim($fila[0])=="" and trim($fila[2])=="" and trim($fila[3])=="" and trim($fila[4])=="" and trim($fila[5])=="" ) {
                                //es titulo de recurso
                                $objRecTipo = $this->traerOCrearRecurso(strtoupper(trim($fila[1])),trim($fila[0]));
                                $objRecursoUnidadMedida = $this->traerOCrearRecursoUnidadMedida(1,$objRecTipo->rec_id);

                                //setteando los campos del curd
                                $objCurd->curd_cant = 0;
                                $objCurd->curd_prec = 0;
                                $objCurd->recum_id = $objRecursoUnidadMedida->recum_id;
                                $objCurd->curd_idpadre = 1;
                                $flagCurdPadre = true;

                                $objCurd->save();
                                return "padres";

                            }else{

                                $objRecProp = $this->traerOCrearRecurso(strtoupper(trim($fila[1])),trim($fila[0]));
                                $objUnidadMedida = $this->traerOCrearUnidadMedida(strtoupper(trim($fila[2])));
                                $objRecursoUnidadMedida = $this->traerOCrearRecursoUnidadMedida($objUnidadMedida->um_id,$objRecProp->rec_id);
                                //echo $objRecursoUnidadMedida->recum_id;

                                if (trim($fila[2])!="" and trim($fila[5])!="" and trim($fila[3])=="" and trim($fila[4])=="" and trim($fila[0])!="" and trim($fila[1])!="") {
                                    //es recurso propiamente dicho con campos incompletos SOLO precio total

                                    $objCurd->curd_cant = 1;
                                    $objCurd->curd_prec = round($fila[5], 2);
                                    $objCurd->recum_id = $objRecursoUnidadMedida->recum_id;
                                    $objCurd->curd_idpadre = $objCurdAntiguo->curd_id;
                                }
                                else{
                                    //es recurso propiamente dicho con campos completos

                                    $objCurd->curd_cant = round($fila[3], 2);
                                    $objCurd->curd_prec = round($fila[4], 2);
                                    $objCurd->recum_id = $objRecursoUnidadMedida->recum_id;
                                    $objCurd->curd_idpadre = $objCurdAntiguo->curd_id;
                                }
                                $flagCurdPadre = false;

                                $objCurd->save();

                                for($i=1;$i<=3;$i++)
                                {
                                    $objCurdPlazo = new CurdPlazo();
                                    $objCurdPlazo->curd_id = $objCurd->curd_id;
                                    $objCurdPlazo->curdp_cant = round($fila[5+$i], 2);
                                    $objCurdPlazo->curdp_fechin = $arrayFechas[$i-1][0];
                                    $objCurdPlazo->curdp_fechfin = $arrayFechas[$i-1][1];
                                    $objCurdPlazo->curdp_nro = $i;
                                    $objCurdPlazo->save();
                                }
                            }
                                                        
                            //guardando el ultimo padre creado
                            if ($flagCurdPadre) {
                                $objCurdAntiguo = CurDetalle::find($objCurd->curd_id);
                            }
                        }
                        //verficando fila cabecera
                        elseif ($contfilas == $request->get('cur_fc')-1) {
                            $fechaini = date('Y-m-d',strtotime($request->get('pro_fechin')));

                            for($i=1;$i<=$request->get('cur_etapas');$i++)
                            {
                                $dias=trim($fila[5+$i]);
                                $nrodias=intval(preg_replace('/[^0-9]+/', '', $dias), 10);
                                $fechafin=date('Y-m-d',strtotime('+'.$nrodias.' day' , strtotime ( $fechaini ) ));
                                array_push($arrayFechas,array($fechaini,$fechafin));
                                $fechaini=$fechafin;                              
                            }
                        }

                    }
                }
                $reader->close();
             });          
        }
        return "ok";
    }

    public function traerOCrearRecurso($rec_nom,$rec_cod){
        if (Recurso::where('rec_nom',$rec_nom)->get()->count()>0) {
            //existe el recurso previamente
            return Recurso::where('rec_nom',$rec_nom)->get()[0];
        }else{
            //no existe el recurso, hay que crearlo
            $objRecurso = new Recurso();
            $objRecurso->rec_nom = $rec_nom;
            $objRecurso->rec_cod = $rec_cod;
            $objRecurso->save();
            return $objRecurso;
        }
    }
    public function traerOCrearUnidadMedida($um_abr){
        if (UnidadMedida::where('um_abr',$um_abr)->get()->count()>0) {
            //existe la unidad de medidad previamente
            return UnidadMedida::where('um_abr',$um_abr)->get()[0];
        }else{
            //no existe la unidad de medida, hay que crearlo
            $objUnidadMedida = new UnidadMedida();
            $objUnidadMedida->um_desc = "Sin nombre";
            $objUnidadMedida->um_abr = $um_abr;
            $objUnidadMedida->save();
            return $objUnidadMedida;
        }
    }
    public function traerOCrearRecursoUnidadMedida($um_id, $rec_id){
        
        if (RecursoUnidadMedida::where('um_id',$um_id)->where('rec_id',$rec_id)->get()->count()>0) {
            //existe la RecursoUnidadMedida previamente
            return RecursoUnidadMedida::where('um_id',$um_id)->where('rec_id',$rec_id)->get()[0];
        }else{
            //no existe RecursoUnidadMedida, hay que crearlo
            $objRecursoUnidadMedida = new RecursoUnidadMedida();
            $objRecursoUnidadMedida->um_id = $um_id;
            $objRecursoUnidadMedida->rec_id = $rec_id;
            $objRecursoUnidadMedida->save();
            return $objRecursoUnidadMedida;
        }
    }



    public function importExcel(Request $request)
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
            //$reader = ReaderFactory::create(Type::CSV); // for CSV files
            //$reader = ReaderFactory::create(Type::ODS); // for ODS files

            $reader->open($path);

            foreach ($reader->getSheetIterator() as $hojas =>$sheet) {
                foreach ($sheet->getRowIterator() as $contfilas =>$fila) {
                    echo $contfilas." ";
                    foreach ($fila as $contcolumnas => $columna) {
                        echo $contcolumnas." ";
                        if (trim($columna)== "" ){
                            echo 'null';
                            echo '-';
                            continue;
                        }
                        echo $columna;
                        echo '-';
                    }
                    echo '<br>';
                }
            }

            echo dd($sheet->getRowIterator());

            return;
            $reader->close();
            
        }
        return back();


    }
}