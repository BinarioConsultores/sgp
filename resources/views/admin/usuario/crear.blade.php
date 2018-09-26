@extends('plantillas.headergerente')
@section('javascript')
<script type="text/javascript">
	function buscar() {
		var entrada = document.getElementById('busqueda').value;
		console.log(entrada);
  		var opciones = document.getElementById('per_id').options;
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
					<span class="font-weight-semibold">Lista de Usuarios</span>
					<small class="d-block opacity-75">Crear o buscar usuario</small>
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
		<div class="col-md-4">
			<form action="/admin/usuario/crear" method="POST">
				{{ csrf_field() }}
				<div class="card" style="zoom: 1;">
					<div class="card-header header-elements-inline bg-teal-400">
			            <h6 class="card-title">Buscar un Usuario</h6>
						<div class="header-elements">
							<div class="list-icons">
			            		<a class="list-icons-item" data-action="collapse"></a>
			            		<a class="list-icons-item" data-action="reload"></a>
			            		<a class="list-icons-item" data-action="remove"></a>
			            	</div>
			        	</div>
					</div>

			        <div class="card-body" style="">
			        	<form action="#">
							<div class="form-group">
								<label>Buscar por Nombre:</label>
								<input type="text" class="form-control" placeholder="Ingrese el nombre de la persona: Buscar" name="usu_nom">
							</div>

						<div class="form-group">
							<label>Buscar por DNI:</label>
							<input type="text" class="form-control" placeholder="DNI" id="busqueda" onkeyup="buscar();">
							<br/>
							<select class="form-control" id="per_id" name="per_id">
								@foreach($personas as $persona)
									<option value="{{$persona->per_id}}"> {{$persona->per_nom}} </option>
								@endforeach
							</select>	
						</div>

							<div class="d-flex justify-content-between align-items-center">
								<button type="submit" class="btn btn-light">Cancel</button>
								<button type="submit" class="btn bg-blue">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
					</div>
				</div>
		    </form>
		</div>
		<div class="col-md-8">
			<form action="/admin/usuario/crear" method="POST">
				{{ csrf_field() }}
				<div class="card" style="zoom: 1;">
					<div class="card-header header-elements-inline bg-teal-400">
			            <h6 class="card-title">Ingresar los datos del Usuario</h6>
						<div class="header-elements">
							<div class="list-icons">
			            		<a class="list-icons-item" data-action="collapse"></a>
			            		<a class="list-icons-item" data-action="reload"></a>
			            		<a class="list-icons-item" data-action="remove"></a>
			            	</div>
			        	</div>
					</div>

			        <div class="card-body" style="">
							<div class="form-group">
								<label>Nombre:</label>
								<input type="text" class="form-control" placeholder="Ingrese su nombre de ususario" name="t_nom">
							</div>

							<div class="form-group">
								<label>Apellido:</label>
								<input type="text" class="form-control" placeholder="Ingrese su apellido" name="t_ape">
							</div>

							<div class="form-group">
								<label>Telefono:</label>
								<input type="text" class="form-control" placeholder="Ingrese su numero telefono" name="t_tel">
							</div>

							<div class="form-group">
								<label>DNI:</label>
								<input type="text" class="form-control" placeholder="Ingrese su numero de DNI" name="t_dni">
							</div>

							<div class="form-group form-group-float">
								<label>Tipo de usuario:</label>
								<label class="form-group-float-label animate">Seleccione tipo de usuario</label>
								<select class="form-control" name="usu_tip">
									<option value="Admin" selected="">Admin</option>
										<option value="Gerente">Gerente</option>
										<option value="Trabajador">Trabajador</option>
								</select>
							</div>

							<div class="form-group">
								<label>Email:</label>
								<input type="text" class="form-control" placeholder="Ingrese su direccion de correo electronico" name="t_email">
							</div>

							<div class="form-group">
								<label>Contraseña:</label>
								<input type="password" class="form-control" placeholder="Ingrese su contraseña" name="usu_pass">
							</div>

							<div class="form-group">
								<label>Direccion:</label>
								<input type="text" class="form-control" placeholder="Ingrese su Direccion" name="t_dir">
							</div>

							<div class="d-flex justify-content-between align-items-center">
								<button type="submit" class="btn btn-light">Cancel</button>
								<button type="submit" class="btn bg-blue">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
					</div>
				</div>
		    </form>
	    </div>
    </div>
</div>
@endsection