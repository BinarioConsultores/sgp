@extends('plantillas.headergerente')


@section('javascript')
<script type="text/javascript">
	function buscar() {
		var entrada = document.getElementById('busqueda').value;
		console.log(entrada);
  		var opciones = document.getElementById('cli_id').options;
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
<div class="page-header page-header-dark has-cover">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h5>
				<i class="icon-arrow-left52 mr-2"></i>
				<span class="font-weight-semibold">Page Header</span> - Image
				<small class="d-block opacity-75">With dark image</small>
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
            <form action="/gerente/proyecto/crear" method="POST">
            	{{ csrf_field() }}
	            <div class="card">
					<div class="card-header header-elements-inline">
		                <h6 class="card-title">Ingresar datos del Proyecto</h6>
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
							<label>Nombre del Proyecto:</label>
							<input type="text" class="form-control {{ $errors->has('pro_nom') ? 'border-danger' : '' }}" placeholder="Ej: Alcantarillado de Av. Parra" name="pro_nom" value="{{ old('pro_nom')}}">
							@if ($errors->has('pro_nom'))
                                <span class="form-text text-danger">
                                    <strong>{{ $errors->first('pro_nom') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Tipo del Proyecto:</label>
									<select multiple="multiple" class="form-control listbox-custom-text" name="pro_tipo">
										<option value="obra" selected="">Obra</option>
										<option value="supervision">Supervisión</option>
										<option value="expediente">Expediente</option>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Ubicación:</label>
									<input type="text" class="form-control" placeholder="Ej: Arequipa" name="pro_ubi" value="{{ old('pro_ubi')}}">
								</div>
								<div class="form-group">
									<label>Costo Directo: </label>
									<div class="input-group bootstrap-touchspin"><span class="input-group-prepend"></span><span class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text">S/. </span></span><input type="text" placeholder="Ej: 1200000.80" class="form-control touchspin-prefix {{ $errors->has('pro_cd') ? 'border-danger' : '' }}" style="display: block;" name="pro_cd" value="{{ old('pro_cd')}}"><span class="input-group-append bootstrap-touchspin-postfix d-none"><span class="input-group-text"></span></span><span class="input-group-append"></span></div>
									@if ($errors->has('pro_cd'))
		                                <span class="form-text text-danger">
		                                	@foreach($errors->get('pro_cd') as $message)
		                                		<strong>{{ $message }}</strong>
		                                	@endforeach
		                                    
		                                </span>
		                            @endif
								</div>
							</div>
						</div>
						

						
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Gastos Generales: </label>
									<div class="input-group bootstrap-touchspin"><span class="input-group-prepend"></span><span class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text">% </span></span><input type="text" placeholder="Ej: 15" class="form-control touchspin-prefix" style="display: block;" name="pro_gg" value="{{ old('pro_gg')}}"><span class="input-group-append bootstrap-touchspin-postfix d-none"><span class="input-group-text"></span></span><span class="input-group-append"></span></div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Utilidades: </label>
									<div class="input-group bootstrap-touchspin"><span class="input-group-prepend"></span><span class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text">% </span></span><input type="text" placeholder="Ej: 20" class="form-control touchspin-prefix" style="display: block;" name="pro_uti" value="{{ old('pro_uti')}}"><span class="input-group-append bootstrap-touchspin-postfix d-none"><span class="input-group-text"></span></span><span class="input-group-append"></span></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Fecha de Inicio:</label>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar22"></i></span>
										</span>
										<input type="date" class="form-control daterange-single" name="pro_fechin" value="{{ old('pro_fechin')}}">
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Fecha de Fin:</label>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar22"></i></span>
										</span>
										<input type="date" class="form-control daterange-single" name="pro_fechfin" value="{{ old('pro_fechfin')}}">
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Cliente:</label>
							<input type="text" class="form-control" placeholder="Término a buscar" id="busqueda" onkeyup="buscar();">
							<br/>
							<select class="form-control" id="cli_id" name="cli_id">
								@foreach($clientes as $cliente)
									<option value="{{$cliente->cli_id}}"> {{$cliente->cli_nom}} </option>
								@endforeach
							</select>

							
						</div>


					</div>

					<div class="card-footer d-flex justify-content-between align-items-center bg-teal-400 border-top-0">
						<button type="submit" class="btn bg-transparent text-white border-white border-2">Cancelar</button>
						<button type="submit" class="btn btn-outline bg-white text-white border-white border-2">Crear Proyecto <i class="icon-paperplane ml-2"></i></button>
					</div>
                </div>
            </form>
            <!-- /custom background -->

		</div>
    </div>
</div>
@endsection