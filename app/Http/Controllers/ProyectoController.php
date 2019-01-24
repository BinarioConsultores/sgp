<?php

namespace sgp\Http\Controllers;

error_reporting(0); 
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
use Carbon\Carbon;


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
    }
    
    public function getCrear()
    {
        $clientes = Cliente::all();
        return view("gerente.proyecto.crear", ["clientes"=>$clientes]);
    }


    public function getVer($pro_id){
        $proyecto = Proyecto::findOrFail($pro_id);
        $presutot = $proyecto->pro_cd;
        $facturas = Factura::where('pro_id',$proyecto->pro_id)->get();
        $presutil = 0;
        foreach ($facturas as $factura){
            $detalles = FacturaDetalle::where('fac_id',$factura->fac_id)->get();
            foreach ($detalles as $detalle){
             $presutil=$presutil+($detalle->facd_cant*$detalle->facd_punit);
            }
        }
        
        $arrCategos=array();
        if(!empty($proyecto->Curs->first()->CurDetalles)){
            foreach($proyecto->Curs->first()->CurDetalles as $CurDetalle)
                if($CurDetalle->curd_idpadre!=1)
                   array_push($arrCategos,$CurDetalle->CurdPadre->RecursoUnidadMedida->Recurso->rec_nom);
        }
        array_push($arrCategos,"OTROS");
        $arrCatego = array_unique($arrCategos);
        $arrCategor = implode(",",$arrCatego);
        $arrCat =  explode(",", $arrCategor);

        $presutotcate = array();
        $i = 0;
        while($i<count($arrCat)){
            array_push($presutotcate,0);
            $i++; 
        }
        
        $i=0;
        if(!empty($proyecto->Curs->first()->CurDetalles)){
            foreach($proyecto->Curs->first()->CurDetalles as $CurDetalle){
                if($CurDetalle->curd_idpadre!=1){
                    while($i<count($arrCat)){
                        if($arrCat[$i] == $CurDetalle->CurdPadre->RecursoUnidadMedida->Recurso->rec_nom){
                            $presutotcate[$i]=round($presutotcate[$i]+$CurDetalle->curd_cant*$CurDetalle->curd_prec,2);
                        }
                        $i++;
                    }
                    $i=0;
                }
            }
        }

        $presutilcate = array();
        $cursid = array();
        $i = 0;
        while($i<count($arrCat)){
            array_push($presutilcate,0);
            $i++; 
        }

        if(!empty($proyecto->Curs)){
            foreach($proyecto->Curs as $Cur){
                array_push($cursid,$Cur->cur_id);
            }
        }
        
        $i=0;
        if(!empty($proyecto->facturas)){
            foreach($proyecto->facturas as $factura){
                foreach($factura->FacturaDetalles as $detalle){
                    $curdett=CurDetalle::where('cur_id',$cursid[0])->where('recum_id',$detalle->recum_id);
                    $total=0;
                    while($i<count($arrCat)){
                        if($arrCat[$i] == $curdett->first()->CurdPadre->RecursoUnidadMedida->Recurso->rec_nom){
                            $total=$total+($detalle->facd_cant*$detalle->facd_punit);
                            $presutilcate[$i]=round($presutilcate[$i]+$total,2);
                        }
                        $i++;
                    }
                    $i=0;
                    $curdett=0;
                }
            }
        }

        $etapas=0;
   
        foreach($proyecto->Curs[0]->CurDetalles[0]->CurdPlazos as $objCurdPlazo){
            $etapas++;   
        }
        
        $arrEtapasTotal = array();
        $i = 0;
        while($i<count($etapas)){
            array_push($arrEtapasTotal,0);
            $i++; 
        }
        $i = 0;
        foreach($proyecto->Curs->first()->CurDetalles as $CurDetalle){
            if($CurDetalle->curd_idpadre!=1){
                foreach($CurDetalle->CurdPlazos as $objCurdPlazo){
                    $arrEtapasTotal[$i]=round($arrEtapasTotal[$i]+$objCurdPlazo->curdp_cant,2);
                    $i++;
                }
                $i=0;
            }
        }

        $arrEtapasUtilizado = array();
        $i = 0;
        while($i<count($etapas)){
            array_push($arrEtapasUtilizado,0);
            $i++; 
        }
        $j = 0;
        foreach($proyecto->Curs[0]->CurDetalles[0]->CurdPlazos as $objCurdPlazo){
            foreach ($facturas as $factura){
                if($factura->fac_fech>=$objCurdPlazo->curdp_fechin && $factura->fac_fech<= $objCurdPlazo->curdp_fechfin){
                    $detalles = FacturaDetalle::where('fac_id',$factura->fac_id)->get();
                    foreach ($detalles as $detalle){
                         $arrEtapasUtilizado[$j]=round($arrEtapasUtilizado[$j]+($detalle->facd_cant*$detalle->facd_punit),2);
                    }
                }
                       
            }
            $j++; 
        }


        //chart para Categorias * etapas

        ///Total

        $arrEtapasxCategoriaTotal = array();
        $i = 0;
        while($i<$etapas*count($arrCat)){
            array_push($arrEtapasxCategoriaTotal,0);
            $i++; 
        }
        $i=0;
        $j=0;
        $l=0;
        
        if(!empty($proyecto->Curs->first()->CurDetalles)){
            foreach($proyecto->Curs->first()->CurDetalles as $CurDetalle){
                if($CurDetalle->curd_idpadre!=1){
                    foreach($CurDetalle->CurdPlazos as $objCurdPlazo){
                        $j++;
                        while($i<count($arrCat)){
                            if($objCurdPlazo->curdp_nro == $j && $arrCat[$i] == $CurDetalle->CurdPadre->RecursoUnidadMedida->Recurso->rec_nom ){
                                $arrEtapasxCategoriaTotal[$l]=round($arrEtapasxCategoriaTotal[$l]+$objCurdPlazo->curdp_cant,2);
                            }
                            $i++;
                            $l++;
                        }
                        
                        $i=0;
                    }
                    $j=0;
                    
                }
                $l=0;
            }

        }

        ///Utilizado

        $arrEtapasxCategoriaUtilizado = array();
        $i = 0;
        while($i<$etapas*count($arrCat)){
            array_push($arrEtapasxCategoriaUtilizado,0);
            $i++; 
        }
        $j=0;
        $i=0;

        /*foreach($proyecto->Curs[0]->CurDetalles[0]->CurdPlazos as $objCurdPlazo){
            foreach ($facturas as $factura){
                if($factura->fac_fech>=$objCurdPlazo->curdp_fechin && $factura->fac_fech<= $objCurdPlazo->curdp_fechfin){
                    $detalles = FacturaDetalle::where('fac_id',$factura->fac_id)->get();
                    foreach ($detalles as $detalle){
                        
                        $arrEtapasxCategoriaUtilizado[$j]=round($arrEtapasxCategoriaUtilizado[$j]+($detalle->facd_cant*$detalle->facd_punit),2);                  
                    }
                                             
                }
            }
            $j++; 
        }*/

        /////Pruebas
        $recursos = Recurso::All();
        $arrRecursos = array();
        $n=-1;
        //$m=0;
        foreach($recursos as $recurso){
            if($recurso->rec_id!=1){
                if($recurso->rec_cod=='' || $recurso->rec_cod=='0'){
                    array_push($arrRecursos,$recurso->rec_nom);
                    //$arrRecursos[n]=$recurso->rec_nom;
                    $n++;
                    $arrRecursos[$n]=array();
                }
                else{

                    array_push($arrRecursos[$n],$recurso->rec_nom);
                }
            }
        }
        $k=1;
        $j=0;
        $p=0;
        $m=0;
        $bandera = 1;
        foreach($proyecto->Curs[0]->CurDetalles[0]->CurdPlazos as $objCurdPlazo){
            foreach ($facturas as $factura){
                if($factura->fac_fech>=$objCurdPlazo->curdp_fechin && $factura->fac_fech<= $objCurdPlazo->curdp_fechfin){
                    $detalles = FacturaDetalle::where('fac_id',$factura->fac_id)->get();
                    foreach ($detalles as $detalle){
                        for ($i=$p; $i < count($arrCat)*$k; $i++) { 
                            if(in_array($detalle->RecursoUnidadMedida->Recurso->rec_nom,$arrRecursos[($m+1)])){
                                $arrEtapasxCategoriaUtilizado[$j]=round($arrEtapasxCategoriaUtilizado[$j]+($detalle->facd_cant*$detalle->facd_punit),2);
                                $bandera=0;
                            }
                            if($bandera==1 && $m==(count($arrCat)-1)){
                                $arrEtapasxCategoriaUtilizado[$j]=round($arrEtapasxCategoriaUtilizado[$j]+($detalle->facd_cant*$detalle->facd_punit),2);
                            }
                            $j++;
                            $m++;
                        }
                        $m=0;
                        $j=$p;
                        $bandera=1;
                        //$arrEtapasxCategoriaUtilizado[$j]=round($arrEtapasxCategoriaUtilizado[$j]+($detalle->facd_cant*$detalle->facd_punit),2);                  
                    }
                                             
                }
            }
            $p=$p+count($arrCat);
            $k++;
        }



        return view("gerente.proyecto.ver", ["proyecto"=>$proyecto,"empleados"=>Empleado::All(),"proveedores"=>Proveedor::All(),"total"=>(int)$presutot,"utilizado"=>(int)$presutil,"etapas"=>(int)$etapas, "arrEtapasTotal"=>$arrEtapasTotal,"arrEtapasUtilizado"=>$arrEtapasUtilizado,"categorias"=>$arrCat,"presupuestotcate"=>$presutotcate,"presupuestouticate"=>$presutilcate,"arrEtapasxCategoriaTotal"=>$arrEtapasxCategoriaTotal,"arrEtapasxCategoriaUtilizado"=>$arrEtapasxCategoriaUtilizado,"arrRecursos"=>$arrRecursos]);
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

        return redirect('/gerente/proyecto/'.$pro_id)->with('creado','Se creó la factura exitosamente');
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
            'pro_fechin' => 'required',
            'cur_etapas' => 'required',
            'cur_fc' => 'required'
        ]);

        if(Input::hasFile('import_file')){

            \DB::transaction(function() use ($request, $pro_id){
                /**
                 * Se crea el Calendario de Utilización de Recursos
                 *
                 * @var Cur
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

                $flagCurdPadre = false;
                $objCurdAntiguo = new CurDetalle();
                
                $aux_dias = Array();

                foreach ($reader->getSheetIterator() as $hojas =>$sheet) {

                    foreach ($sheet->getRowIterator() as $contfilas =>$fila) {
                        if ($contfilas == $request->get('cur_fc')) {
                           for ($i=6; $i < $request->get('cur_etapas')+6; $i++) { 
                              array_push($aux_dias, filter_var($fila[$i], FILTER_SANITIZE_NUMBER_INT));
                           }
                        }

                        if (($contfilas >= $request->get('cur_pl')) and ($contfilas<=$request->get('cur_ul'))) {
                            
                            $objCurd = new CurDetalle(); 
                            $objCurd->cur_id = $objCur->cur_id; 
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
                            }
                                                        
                            $objCurd->save();
                            //guardando el ultimo padre creado
                            if ($flagCurdPadre == true) {
                                $objCurdAntiguo = $objCurd;
                            }
                            
                            //guardando la fecha de inicio del proyecto en una variable auxiliar
                            $aux_fechafin = $request->get("pro_fechin");
                            //Codigo para crear los plazos en CURD_PLAZO CON UN SUPER ALGORITMO
                            for ($i=6; $i < $request->get("cur_etapas") + 6; $i++) { 
                                 $objCurdPlazo = new CurdPlazo();
                                 $objCurdPlazo->curdp_cant = round(trim($fila[$i]), 2);
                                 $objCurdPlazo->curdp_fechin = $aux_fechafin;
                                 $nuevaFechaFinal = date('Y-m-d', strtotime($aux_fechafin. ' + '.trim($aux_dias[$i-6]).' days'));
                                 $aux_fechafin = $nuevaFechaFinal;
                                 $objCurdPlazo->curdp_fechfin = $aux_fechafin;
                                 $objCurdPlazo->curdp_nro = $i-5;
                                 $objCurdPlazo->curd_id = $objCurd->curd_id;
                                 $objCurdPlazo->save();
                            }
                        }

                    }
                }
                $reader->close();
            });            
        }
        return back();
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