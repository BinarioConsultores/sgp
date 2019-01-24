@extends('plantillas.headergerente')

@section('css')
<link href="{{asset('global_assets/css/extras/animate.min.css')}}" rel="stylesheet" type="text/css">

<style type="text/css">

.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
   background-color: #81A8BA;
   color: #000000;
}
.content {
   background-image: url("{{asset('assets/img/textura.jpg')}}");
}

</style>
@endsection
@section('javascript')
<script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>

<script type="text/javascript">
	function obtenerTotal(){

		var facd_cant = parseFloat($('#facd_cant').val());
		var facd_punit = parseFloat($('#facd_punit').val());
		if (isNaN(Math.round(parseFloat(facd_cant*facd_punit) * 100) / 100)) {
			$('#facd_total').val(0);
		}
		else{
			$('#facd_total').val(Math.round(parseFloat(facd_cant*facd_punit) * 100) / 100);
		}
	}
	function obtenerTotaledit(){

		var facd_cant = parseFloat($('#facd_cant1').val());
		var facd_punit = parseFloat($('#facd_punit1').val());
		if (isNaN(Math.round(parseFloat(facd_cant*facd_punit) * 100) / 100)) {
			$('#facd_total1').val(0);
		}
		else{
			$('#facd_total1').val(Math.round(parseFloat(facd_cant*facd_punit) * 100) / 100);
		}
	}
</script>

<script>
	function obtenerEdit(id){

		$('#facd_id1').val(id.facd_id);
        $('#facd_desc1').val(id.facd_desc);
		$('#facd_cant1').val(id.facd_cant);
		$('#facd_punit1').val(id.facd_punit);
		$('#recum_id1').val(id.recum_id);
		$('#facd_total1').val(id.facd_cant*id.facd_punit);
	};

</script>
@endsection
@section('content')

<div id="modal_theme_custom" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-slate-600">
				<h6 class="modal-title">Agregar Detalle de Factura</h6>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 mx-auto">
						Seleccione el Tipo de Gasto: 
						
					</div>
					
				</div>
				
				<hr>
				<form method="POST" action="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/creardetalle">
					{{ csrf_field() }}
					<div class="card card-table table-responsive shadow-3 mb-0">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="35%">Descripción</th>
									<th width="35%">Recurso y Unidad de Medida</th>
									<th width="10%">Cantidad</th>
									<th width="10%">Precio Unitario</th>
									<th width="10%">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td width="35%">
										<textarea name="facd_desc" rows="2" cols="3" class="form-control" placeholder="Coloque una Descripción"></textarea>
									</td>
									<td width="35%">
										<input type="text" name="gas_id" value="1" hidden="hidden">
										<select class="form-control select-search" data-fouc name="recum_id" required="required">
											<option value="1">************ OTROS ************</option>
											@foreach($proyecto->Curs[0]->CurDetalles as $curdetalle)
												@if($curdetalle->curd_idpadre != 1)
													<option value="{{$curdetalle->RecursoUnidadMedida->recum_id}}">{{$curdetalle->RecursoUnidadMedida->Recurso->rec_nom}} || {{$curdetalle->RecursoUnidadMedida->UnidadMedida->um_abr}}</option>
												@endif
											@endforeach
										</select>
									</td>
									<td width="10%">
										<input type="text" class="form-control daterange-single" name="facd_cant" id="facd_cant" onkeyup="obtenerTotal();" required="required" value="0">
									</td>
									<td width="10%">
										<input type="text" class="form-control daterange-single" name="facd_punit" id="facd_punit" onkeyup="obtenerTotal();" required="required" value="0">
									</td>
									<td width="10%">
										<input type="text" class="form-control daterange-single font-weight-black" id="facd_total" required="required" value="0" disabled>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
	            
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success">Crear Detalle</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal_theme_custom_edit" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-slate-600">
				<h6 class="modal-title">Agregar Detalle de Factura</h6>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 mx-auto">
						Seleccione el Tipo de Gasto: 
						
					</div>
					
				</div>
				
				<hr>
				<form method="POST" action="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/editardetalle">
					{{ csrf_field() }}
					<div class="card card-table table-responsive shadow-3 mb-0">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="35%">Descripción</th>
									<th width="35%">Recurso y Unidad de Medida</th>
									<th width="10%">Cantidad</th>
									<th width="10%">Precio Unitario</th>
									<th width="10%">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td width="35%">
										<textarea name="facd_desc" id="facd_desc1" rows="2" cols="3" class="form-control" placeholder="Coloque una Descripción"></textarea>
									</td>
									<td width="35%">
										<input type="text" name="gas_id" value="1" hidden="hidden">
										<input type="text" name="facd_id" id="facd_id1" hidden="hidden">
										<select class="form-control select-search" data-fouc name="recum_id" id="recum_id1" required="required">
											<option value="1">************ OTROS ************</option>
											@foreach($proyecto->Curs[0]->CurDetalles as $curdetalle)
												@if($curdetalle->curd_idpadre != 1)
													<option value="{{$curdetalle->RecursoUnidadMedida->recum_id}}">{{$curdetalle->RecursoUnidadMedida->Recurso->rec_nom}} || {{$curdetalle->RecursoUnidadMedida->UnidadMedida->um_abr}}</option>
												@endif
											@endforeach
										</select>
									</td>
									<td width="10%">
										<input type="text" class="form-control daterange-single" name="facd_cant" id="facd_cant1" onkeyup="obtenerTotaledit();" required="required" value="0">
									</td>
									<td width="10%">
										<input type="text" class="form-control daterange-single" name="facd_punit" id="facd_punit1" onkeyup="obtenerTotaledit();" required="required" value="0">
									</td>
									<td width="10%">
										<input type="text" class="form-control daterange-single font-weight-black" id="facd_total1" required="required" value="0" disabled>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
	            
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success">Editar Detalle</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="">
			<div class="card-header header-elements-inline bg-slate-600">
		        <h6 class="card-title h4">Ver y Editar Gastos</h6>
			</div>
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
		<div class="d-flex">
			<div class="breadcrumb">
				<a href="/gerente/proyecto/{{$proyecto->pro_id}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Proyecto</a>
				<span class="breadcrumb-item active">Gasto</span>
			</div>

			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
		</div>
	</div>
</div>




<div class="row">
	<div class="col-12">
		@if(Session::has('creado'))
		    <div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
				{{Session::get('creado')}}
		    </div>
		@endif
	</div>
</div>

<div class="content">

    <div class="col-md-12 col-centered">
        
        <div class="card">
			<div class="card-header header-elements-inline bg-slate-600" style="padding: 8.5px">
                <label class="card-title mx-auto"><font size="3.5">Cabecera de Factura</font></label>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
                	</div>
            	</div>
			</div>

            <div class="card-body">
				<form action="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/editar">
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Persona que genera la Factura:</label>
							<select class="form-control select-search" data-fouc name="emp_id" required="required" disabled>
								@foreach($empleados as $empleado)
									@if($empleado->emp_id == $factura->emp_id)
										<option value="{{$empleado->emp_id}}" selected>{{$empleado->Persona->per_nom}} {{$empleado->Persona->per_ape}}</option>
									@else
										<option value="{{$empleado->emp_id}}">{{$empleado->Persona->per_nom}} {{$empleado->Persona->per_ape}}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Tipo de Gasto:</label>
							<select class="form-control select-search" data-fouc name="fac_tipo" required="required" disabled>
								@if($factura->fac_tipo == 1)
									<option value="1" selected>Factura</option>
									<option value="2">Boleta</option>
									<option value="3">Sin Documento</option>
								@elseif($factura->fac_tipo == 2)
									<option value="1">Factura</option>
									<option value="2" selected>Boleta</option>
									<option value="3">Sin Documento</option>
								@else
									<option value="1">Factura</option>
									<option value="2">Boleta</option>
									<option value="3" selected>Sin Documento</option>
								@endif
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Fecha <span id="tipo_gasto">de la Factura</span></label>
							<div class="input-group">
								<span class="input-group-prepend">
									<span class="input-group-text"><i class="icon-calendar22"></i></span>
								</span>
								<input type="date" class="form-control daterange-single" name="fac_fech" required="required" value="{{$factura->fac_fech}}" disabled="">
							</div>
						</div>
					</div>

					<div class="row">
						
						<div class="col-md-4 form-group">
							<label>Estado <span id="tipo_gasto_est">de la Factura</span></label>
							<input type="text" class="form-control daterange-single" name="fac_est" readonly="readonly" required="required" value="{{$factura->fac_est}}" disabled>
						</div>
						<div class="col-md-4 form-group">
							<label>Número <span id="tipo_gasto_nro">de la Factura</span></label>
							<input type="text" class="form-control daterange-single" name="fac_nro" required="required" value="{{$factura->fac_nro}}" disabled>

						</div>
					</div>

					<div class="row">
						<div class="col-md-4 form-group">
							<label>Observación <span id="tipo_gasto_obs">de la Factura</span></label>
							<textarea name="fac_obs" rows="3" cols="3" class="form-control" placeholder="Coloque los detalles que justifiquen el gasto" disabled>{{$factura->fac_obs}}</textarea>
						</div>
						<div class="col-md-4 form-group">
							<label>Proveedor</label>
							<select class="form-control select-search" data-fouc name="prov_id" required="required" disabled>
								@foreach($proveedores as $proveedor)
									@if($proveedor->prov_id == $factura->prov_id)
										<option value="{{$proveedor->proveedor}}" selected>{{$proveedor->prov_nom}}</option>
									@else
										<option value="{{$proveedor->proveedor}}">{{$proveedor->prov_nom}}</option>
									@endif
								@endforeach
							</select>

						</div>
						<div class="col-md-4 form-group text-center">
							<button type="submit" class="btn btn-lg bg-green-700">Editar Factura<i class="icon-paperplane ml-2"></i></button>
						</div>
					</div>
	            </form>
			</div>
        </div>

        <div class="card">
			<div class="card-header header-elements-inline bg-slate-600" style="padding: 8.5px">
                <label class="card-title mx-auto"><font size="3.5">Detalle de la Factura</font></label>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
                	</div>
            	</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-lg-12 ml-lg-auto">
						<div class="d-flex justify-content-between align-items-center">
							<button type="button" class="btn btn-success btn-float rounded-round" data-toggle="modal" data-target="#modal_theme_custom"><i class="icon-stack-plus"></i></button>
						</div>
					</div>
				</div>
			</div>


			<div class="datatable-scroll">
				<table class="table datatable-pagination dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
					<thead>
						<tr role="row">
							<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Descripción</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DOB: activate to sort column ascending">Concepto</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Cantidad</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">P. Unitario</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DOB: activate to sort column ascending">P. Total</th>
							<th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">Actions</th></tr>
					</thead>
					<tbody>
						@foreach ($factura->FacturaDetalles as $detallefactura)
							<tr role="row" class="odd">
								<td class="sorting_1">{{$detallefactura->facd_desc}}</td>
								<td>{{$detallefactura->RecursoUnidadMedida->Recurso->rec_nom}} || {{$detallefactura->RecursoUnidadMedida->UnidadMedida->um_abr}}</td>
								<td>{{$detallefactura->facd_cant}}</td>
								<td>{{$detallefactura->facd_punit}}</td>
								<td>{{number_format(round($detallefactura->facd_cant*$detallefactura->facd_punit,2),2)}}</td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" onclick="obtenerEdit({{$detallefactura}})" class="dropdown-item" data-toggle="modal" data-target="#modal_theme_custom_edit"><i class="icon-pencil5"></i> Editar</a>
												<a href="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/eliminardetalle/{{$detallefactura->facd_id}}" onclick="
return confirm('Esta seguro que desea eliminar?')" class="dropdown-item"><i class="icon-bin2"></i> Eliminar</a>
											</div>
										</div>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

            <div class="card-body">
            	@if(!$factura->FacturaDetalles->count()>0)

				@else

				@endif
				
			</div>
        </div>
	</div>
</div>
@endsection
@section('javascriptfinal')

@endsection