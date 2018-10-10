@extends('plantillas.headergerente')
@section('css')


@endsection
@section('javascript')
<script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>
@endsection
@section('content')

<div class="page-header page-header-dark bg-slate-600">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h5>
				<i class="icon-arrow-left52 mr-2"></i>
				<span class="font-weight-semibold">Registrar Nuevo Gasto</span>
				<small class="d-block opacity-75">Registro de Facturas, Boletas y Gastos Secundarios</small>
			</h5>
		</div>
	</div>

	<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
		<div class="d-flex">
			<div class="breadcrumb">
				<a href="/gerente/proyecto/{{$proyecto->pro_id}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Proyecto</a>
				<span class="breadcrumb-item active">Editar Factura</span>
			</div>

			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="breadcrumb justify-content-center">
				<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
					Actions
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
					<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
					<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
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
			<div class="card-header header-elements-inline bg-slate-600">
                <h1 class="card-title mx-auto">Cabecera de Factura</h1>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
                		<a class="list-icons-item" data-action="reload"></a>
                	</div>
            	</div>
			</div>

            <div class="card-body">
				<form method="POST" action="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/editar">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Persona que genera la Factura:</label>
							<input type="text" name="pro_id" value="{{$proyecto->pro_id}}" hidden="hidden">
							<select class="form-control select-search" data-fouc name="emp_id" required="required">
								@foreach($empleados as $empleado)
									@if($empleado->emp_id==$factura->emp_id)
										<option selected="" value="{{$empleado->emp_id}}">{{$empleado->Persona->per_nom}} {{$empleado->Persona->per_ape}}</option>
									@else
										<option value="{{$empleado->emp_id}}">{{$empleado->Persona->per_nom}} {{$empleado->Persona->per_ape}}</option>
									@endif	
								@endforeach
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Tipo de Gasto:</label>
							<select class="form-control select-search" data-fouc name="fac_tipo" required="required">
								@if($factura->fac_tipo==1)
									<option value="1" selected="">Factura</option>
									<option value="2">Boleta</option>
									<option value="3">Sin Documento</option>
								@elseif($factura->fac_tipo==2)
									<option value="1">Factura</option>
									<option value="2" selected="">Boleta</option>
									<option value="3">Sin Documento</option>
								@else
									<option value="1">Factura</option>
									<option value="2">Boleta</option>
									<option value="3" selected="">Sin Documento</option>
								@endif
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Fecha <span id="tipo_gasto">de la Factura</span></label>
							<div class="input-group">
								<span class="input-group-prepend">
									<span class="input-group-text"><i class="icon-calendar22"></i></span>
								</span>
								<input type="date" class="form-control daterange-single" name="fac_fech" required="required" value="{{$factura->fac_fech}}">
							</div>
						</div>
					</div>

					<div class="row">
						
						<div class="col-md-4 form-group">
							<label>Estado <span id="tipo_gasto_est">de la Factura</span></label>
							<input type="text" class="form-control daterange-single" name="fac_est" readonly="readonly" required="required" value="{{$factura->fac_est}}">
						</div>
						<div class="col-md-4 form-group">
							<label>Número <span id="tipo_gasto_nro">de la Factura</span></label>
							<input type="text" class="form-control daterange-single" name="fac_nro" required="required" value="{{$factura->fac_nro}}">

						</div>
					</div>

					<div class="row">
						<div class="col-md-4 form-group">
							<label>Observación <span id="tipo_gasto_obs">de la Factura</span></label>
							<textarea name="fac_obs" rows="3" cols="3" class="form-control" >{{$factura->fac_obs}}</textarea>
						</div>
						<div class="col-md-4 form-group">
							<label>Proveedor</label>
							<select class="form-control select-search" data-fouc name="prov_id" required="required">
								@foreach($proveedores as $proveedor)
									@if($proveedor->prov_id==$factura->prov_id)
										<option selected="" value="{{$proveedor->prov_id}}">{{$proveedor->prov_nom}}</option>
									@else
										<option value="{{$proveedor->prov_id}}">{{$proveedor->prov_nom}}</option>
									@endif
								@endforeach
							</select>

						</div>
						<div class="col-md-4 form-group text-center">
							<button type="submit" class="btn btn-lg bg-green-700">Editar Factura <i class="icon-paperplane ml-2"></i></button>
						</div>
					</div>
	            </form>
			</div>
        </div>
	</div>
</div>
@endsection