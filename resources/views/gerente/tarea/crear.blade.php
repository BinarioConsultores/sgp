@extends('plantillas.paginaenblanco')
@section('javascript')
<script type="text/javascript">
	function buscar() {
		var entrada = document.getElementById('busqueda').value;
		console.log(entrada);
  		var opciones = document.getElementById('pro_nom').options;
  		console.log(opciones);
  		for(var i=0;i<opciones.length;i++) {
			if(opciones[i].text.indexOf(entrada)==0){
				opciones[i].selected=true;
			}
			if(document.getElementById('busqueda').value==''){
				opciones[0].selected=true;
			}
		}

	}
	
</script>
@endsection
@section('content')

<div class="mb-3">
	<div class="page-header page-header-dark has-cover">
		<div class="page-header-content header-elements-inline">
			<div class="page-title">
				<h5>
					<i class="icon-arrow-left52 mr-2"></i>
					<span class="font-weight-semibold">Crear Nueva Tarea</span>
					<small class="d-block opacity-75">Sistema de Gestion de Proyectos</small>
				</h5>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<a href="components_page_header.html" class="breadcrumb-item">Current</a>
					<span class="breadcrumb-item active">Location</span>
				</div>

				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			
		</div>
	</div>
</div>
<div class="content">
	
	<div class="row">
		<div class="col-12">
			@if(!empty($errors->first()))
			    <div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
					<span class="font-weight-semibold">¡Oh No!</span>  {{ $errors->first() }}
			    </div>
			@endif
		</div>
	</div>

    <div class="row">
    	<div class="col-md-8 col-centered">

			<!-- Custom background -->
            <form action="/gerente/tarea/crear" method="POST">
            	{{ csrf_field() }}
	            <div class="card">
					<div class="card-header header-elements-inline">
		                <h6 class="card-title">Ingresar datos de la nueva Tarea</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

	                <div class="card-body">

						<div class="form-group">
							<label>Nombre de la nueva Tarea:</label>
							<input type="text" class="form-control {{ $errors->has('tar_nom') ? 'border-danger' : '' }}" placeholder="Ej:Volcan Misti" name="tar_nom" value="{{ old('tar_nom')}}">
							@if ($errors->has('tar_nom'))
                                <span class="form-text text-danger">
                                    <strong>{{ $errors->first('tar_nom') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Descripcion:</label>
									<input type="text" class="form-control" placeholder="Ej: Arequipa" name="tar_desc" value="{{ old('tar_desc')}}">
								</div>
							</div>
						</div>
						

						
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Prioridad </label>
									<div class="input-group bootstrap-touchspin"><span class="input-group-prepend"></span><span class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text"></span></span><input type="text" placeholder="Ej: 15" class="form-control touchspin-prefix" style="display: block;" name="tar_prio" value="{{ old('tar_prio')}}"><span class="input-group-append bootstrap-touchspin-postfix d-none"><span class="input-group-text"></span></span><span class="input-group-append"></span></div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Estado </label>
									<div class="input-group bootstrap-touchspin"><span class="input-group-prepend"></span><span class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text"> </span></span><input type="text" placeholder="Ej: 20" class="form-control touchspin-prefix" style="display: block;" name="tar_est" value="{{ old('tar_est')}}"><span class="input-group-append bootstrap-touchspin-postfix d-none"><span class="input-group-text"></span></span><span class="input-group-append"></span></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label>Fecha de Inicio:</label>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar22"></i></span>
										</span>
										<input type="date" class="form-control daterange-single" name="tar_fechin" value="{{ old('tar_fechin')}}">
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label>Fecha de Fin:</label>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar22"></i></span>
										</span>
										<input type="date" class="form-control daterange-single" name="tar_fechfin" value="{{ old('tar_fechfin')}}">
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label>Usuario:</label>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar22"></i></span>
										</span>
										<input type="text" class="form-control daterange-single" name="usu_id" value="{{ old('usu_id')}}">
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Proyecto:</label>
							<input type="text" class="form-control" placeholder="Término a buscar" id="busqueda" onkeyup="buscar();">
							<br/>
							<select class="form-control" id="pro_id" name="pro_id">
								@foreach($proyectos as $proyecto)
									<option value="{{$proyecto->pro_id}}"> {{$proyecto->pro_nom}} </option>
								@endforeach
							</select>
						</div>

						
						

					</div>

					<div class="card-footer d-flex justify-content-between align-items-center bg-teal-400 border-top-0">
						<a href={{url('gerente/tarea')}} class="btn bg-transparent text-white border-white border-2">Atras</a>
						<button type="submit" class="btn btn-outline bg-white text-white border-white border-2">Crear Tarea <i class="icon-paperplane ml-2"></i></button>
					</div>
                </div>
            </form>
            <!-- /custom background -->

		</div>
    </div>
</div>
@endsection
