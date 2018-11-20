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

<script type="text/javascript">
	$(function (argument) {
		function setLink() {
			$("#linkVerRecurso").attr("href","/gerente/VerRecurso/{{$proyecto->pro_id}}/recurso/"+$("#recum_id").val());
		}
		setLink();
		$("#recum_id").change(function () {
			setLink();
		});
	});
	
</script>

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

	<div class="row">
		<div class="col-md-12">
			<div class="card-header header-elements-inline bg-dark">
					<h6 class="card-title h3">Recurso:</h6>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
	                	</div>
                	</div>
			</div>
			
				{{ csrf_field() }}
				<div class="card card-table table-responsive shadow-3 mb-0">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="35%">Recurso {{$proyecto->pro_nom}}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td width="95%">
									<select class="form-control" name="recum_id" id="recum_id">
										@foreach($proyecto->Curs[0]->CurDetalles as $curdetalle)
											@if($curdetalle->curd_idpadre != 1)
												<option value="{{$curdetalle->RecursoUnidadMedida->recum_id}}">{{$curdetalle->RecursoUnidadMedida->Recurso->rec_nom}}</option>
											@endif
										@endforeach
									</select>
								</td>
								<td class="text-center">
									<div class="list-icons">
										<div>
											<a class="list-icons-item" id="linkVerRecurso">
												<i class="icon-menu5"></i>
											</a>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div>
@endsection