@extends('plantillas.headergerente')
@section('css')
<link href="{{asset('global_assets/css/extras/animate.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('javascript')
<script src="{{asset('global_assets/js/demo_pages/animations_css3.js')}}"></script>
<script type="text/javascript">

	$( document ).ready(function() {
	    console.log( "ready!" );
	});
	function verProyectos(numero){
		$('#proyectos').attr("hidden","hidden");
		$('#proyectos').removeAttr("hidden");
		if (numero==0) {
			$('#tituloproyectos').text("Proyectos en Categoría: Obras");
			$('#bordeproyectos').attr("class","card border-success-400");
			$('#rellenoproyectos').attr("class","card-header bg-success-400 text-white header-elements-inline");
		}
		if (numero==1) {
			$('#tituloproyectos').text("Proyectos en Categoría: Supervisiones");
			$('#bordeproyectos').attr("class","card border-warning-400");
			$('#rellenoproyectos').attr("class","card-header bg-warning-400 text-white header-elements-inline");
		}
		if (numero==2) {
			$('#tituloproyectos').text("Proyectos en Categoría: Expedientes");
			$('#bordeproyectos').attr("class","card border-blue");
			$('#rellenoproyectos').attr("class","card-header bg-blue text-white header-elements-inline");
		}

		$('#proyectoscuerpo').append("<img align='center' src='{{asset('assets/images/cargandop.gif')}}'>");
		var request = $.ajax({
		    url: 'ajax/gerente/getVerProyectosPorTipo',
		    type: 'GET',
		    data: { id: numero} ,
		    contentType: 'application/json; charset=utf-8'
		});

		request.done(function(data) {
	        $('#cement_id_editar').val(data.cement_id);
	        $('#cement_nom_editar').val(data.cement_nom);

		});

		request.fail(function(jqXHR, textStatus) {
		      alert(textStatus);
		});
	}
</script>
@endsection
@section('content')

<div class="page-header page-header-dark has-cover">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h5>
				<i class="icon-arrow-left52 mr-2"></i>
				<span class="font-weight-semibold">Dashboard</span> - Proyectos
				<small class="d-block opacity-75">With dark image</small>
			</h5>
		</div>

		<div class="header-elements d-flex align-items-center">
            <a class="btn bg-blue btn-labeled btn-labeled-left" href="/gerente/proyecto/crear"><b><i class="icon-folder-plus2"></i></b> Crear Proyecto</a>
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
    <div class="row">
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body text-center">
				<i class="icon-city icon-2x text-success-400 border-success-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
					<h5 class="card-title">Obras</h5>
					<p class="mb-3">Una vista general de todas las obras que incluyen indicadores generales a cerca del progeso, ganancias, pérdidas, etc.</p>
					<a href="#" class="btn bg-success-400" onclick="verProyectos(0);">Ver Obras</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card">
				<div class="card-body text-center">
					<i class="icon-file-eye icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
					<h5 class="card-title">Supervisiones</h5>
					<p class="mb-3">Dear spryly growled much far jeepers vigilantly less and far hideous and some mannishly less jeepers less and and crud</p>
					<a href="#" class="btn bg-warning-400" onclick="verProyectos(1);">Ver Supervisiones</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card">
				<div class="card-body text-center">
					<i class="icon-stack icon-2x text-blue border-blue border-3 rounded-round p-3 mb-3 mt-1"></i>
					<h5 class="card-title">Expedientes</h5>
					<p class="mb-3">Diabolically somberly astride crass one endearingly blatant depending peculiar antelope piquantly popularly adept much</p>
					<a href="#" class="btn bg-blue" onclick="verProyectos(2);">Ver Expedientes</a>
					<a href="#" class="list-icons-item animation" data-animation="bounceOut"><i class="icon-play3"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="row" id="proyectos" hidden="hidden">
		<div class="col-12">
			
			<div class="card border-success-400" id="bordeproyectos">
				<div class="card-header bg-success-400 text-white header-elements-inline" id="rellenoproyectos">
					<h6 class="card-title" id="tituloproyectos"></h6>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
	                		<a class="list-icons-item" data-action="reload"></a>
	                		<a class="list-icons-item" data-action="remove"></a>
	                	</div>
	            	</div>
				</div>

				<div class="card-body" id="proyectoscuerpo">
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection