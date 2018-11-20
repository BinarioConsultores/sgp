
@extends('plantillas.headergerente')
@section('css')
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
<script src="{{asset('global_assets/js/plugins/media/fancybox.min.js')}}"></script>

<script src="{{asset('global_assets/js/sgp/datatables_api_para_proyectos.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/content_cards_content.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/visualization/c3/c3.min.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/charts/c3/c3_grid.js')}}"></script>

@endsection
@section('content')

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

	<div class="card">
		<div class="card-header header-elements-inline">
			<h1 class="card-title">Recurso: {{$objRecursoUnidadMedida->Recurso->rec_nom}}</h1>
			<div class="header-elements">
				<div class="list-icons">
            		<a class="list-icons-item" data-action="collapse"></a>
            		<a class="list-icons-item" data-action="reload"></a>
            		<a class="list-icons-item" data-action="remove"></a>
            	</div>
        	</div>
		</div>

		<div class="card-body">
			<div class="chart-container">
				<div class="chart" id="c3-grid-lines-y"></div>
			</div>
		</div>
	</div>
</div>
@endsection