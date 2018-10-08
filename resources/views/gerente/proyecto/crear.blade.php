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
<script src="{{asset('global_assets/js/sgp/form_wizard.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/wizards/steps.min.js')}}"></script>
@endsection
@section('content')
<div class="page-header page-header-dark has-cover">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h5>
				<i class="icon-arrow-left52 mr-2"></i>
				<span class="font-weight-semibold">Crear Proyecto</span>
				<small class="d-block opacity-75">A continuación una serie de formularios para la creación de proyectos y sus recursos</small>
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
			@if(!empty($errors))
				@foreach ($errors->all() as $error)
				  <div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
					<span class="font-weight-semibold">¡Oh No!</span>  {{ $error }}
			    </div>
				@endforeach
			@endif
		</div>
	</div>

    <div class="row">
    	<div class="col-md-8 col-centered">

			<!-- Custom background -->
            
	            <div class="card">
					<div class="card-header bg-teal-400 header-elements-inline">
		                <h6 class="card-title">Creando el Proyecto</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
					<div class="card-body">
						<form class="wizard-form steps-basic" action="/gerente/proyecto/crear" method="POST" data-fouc>
							{{ csrf_field() }}
							<h6>Información General del Proyecto</h6>
							<fieldset>
								<div class="form-group">
									<label>Nombre del Proyecto:</label>
									<input type="text" class="form-control {{ $errors->has('pro_nom') ? 'border-danger' : '' }} " placeholder="Ej: Alcantarillado de Av. Parra" name="pro_nom" value="{{ old('pro_nom')}}">
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
											<select multiple="multiple" class="form-control listbox-custom-text {{ $errors->has('pro_tipo') ? 'border-danger' : '' }} " name="pro_tipo">
												<option value="obra" selected="">Obra</option>
												<option value="supervision">Supervisión</option>
												<option value="expediente">Expediente</option>
											</select>
										</div>
										@if ($errors->has('pro_tipo'))
			                                <span class="form-text text-danger">
			                                    <strong>{{ $errors->first('pro_tipo') }}</strong>
			                                </span>
			                            @endif
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Ubicación:</label>
											<input type="text" class="form-control {{ $errors->has('pro_ubi') ? 'border-danger' : '' }} " placeholder="Ej: Arequipa" name="pro_ubi" value="{{ old('pro_ubi')}}">
											@if ($errors->has('pro_ubi'))
				                                <span class="form-text text-danger">
				                                    <strong>{{ $errors->first('pro_ubi') }}</strong>
				                                </span>
				                            @endif

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
											<div class="input-group bootstrap-touchspin"><span class="input-group-prepend"></span><span class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text">% </span></span><input type="text" placeholder="Ej: 15" class="form-control touchspin-prefix {{ $errors->has('pro_gg') ? 'border-danger' : '' }}" style="display: block;" name="pro_gg" value="{{ old('pro_gg')}}"><span class="input-group-append bootstrap-touchspin-postfix d-none"><span class="input-group-text"></span></span><span class="input-group-append"></span></div>
											@if ($errors->has('pro_gg'))
				                                <span class="form-text text-danger">
				                                	@foreach($errors->get('pro_gg') as $message)
				                                		<strong>{{ $message }}</strong>
				                                	@endforeach
				                                </span>
				                            @endif
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Utilidades: </label>
											<div class="input-group bootstrap-touchspin"><span class="input-group-prepend"></span><span class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text">% </span></span><input type="text" placeholder="Ej: 20" class="form-control touchspin-prefix {{ $errors->has('pro_uti') ? 'border-danger' : '' }}" style="display: block;" name="pro_uti" value="{{ old('pro_uti')}}"><span class="input-group-append bootstrap-touchspin-postfix d-none"><span class="input-group-text"></span></span><span class="input-group-append"></span></div>
											@if ($errors->has('pro_uti'))
				                                <span class="form-text text-danger">
				                                	@foreach($errors->get('pro_uti') as $message)
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
											<label>Fecha de Inicio:</label>
											<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text"><i class="icon-calendar22"></i></span>
												</span>
												<input type="date" class="form-control daterange-single" name="pro_fechin" value="{{ old('pro_fechin')}}">
												@if ($errors->has('pro_fechin'))
					                                <span class="form-text text-danger">
					                                	@foreach($errors->get('pro_fechin') as $message)
					                                		<strong>{{ $message }}</strong>
					                                	@endforeach
					                                </span>
					                            @endif
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
												@if ($errors->has('pro_fechfin'))
					                                <span class="form-text text-danger">
					                                	@foreach($errors->get('pro_fechfin') as $message)
					                                		<strong>{{ $message }}</strong>
					                                	@endforeach
					                                </span>
					                            @endif
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
									@if ($errors->has('cli_id'))
		                                <span class="form-text text-danger">
		                                	@foreach($errors->get('cli_id') as $message)
		                                		<strong>{{ $message }}</strong>
		                                	@endforeach
		                                </span>
		                            @endif						
								</div>
							</fieldset>
							<h6>Subir Hoja de Presupuesto</h6>
							<fieldset>
								<div class="form-group row">
									<label class="col-form-label col-lg-2">Subir Hoja de Presupuestos</label>
									<div class="col-lg-10">
										<input type="file" name="presupuesto" class="form-control" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel">
									</div>
								</div>
								<div class="text-right">
		                        	<button type="submit" class="btn btn-primary">Crear Proyecto <i class="icon-paperplane ml-2"></i></button>
		                        </div>
		                        <br>
							</fieldset>
						</form>
					</div>
                </div>
            <!-- /custom background -->
		</div>
    </div>
</div>
@endsection