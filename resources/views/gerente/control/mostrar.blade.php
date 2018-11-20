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
<script src="../../../../global_assets/js/plugins/media/fancybox.min.js"></script>

<script src="{{asset('global_assets/js/sgp/datatables_api_para_proyectos.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/content_cards_content.js')}}"></script>

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
			<div class="card">
				<div class="card-header header-elements-inline bg-dark">
					<h6 class="card-title h3">Portafolio de Proyectos</h6>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
	                	</div>
                	</div>
				</div>

				<div class="card-body ">
					<ul class="nav nav-tabs nav-tabs-bottom ">
						<li class="nav-item"><a href="#obras" class="nav-link active show" data-toggle="tab">Obras</a></li>
						<li class="nav-item"><a href="#supervisiones" class="nav-link" data-toggle="tab">Supervisiones</a></li>
						<li class="nav-item"><a href="#expedientes" class="nav-link" data-toggle="tab">Expedientes</a></li>
						
					</ul>

					<div class="tab-content ">
						<div class="tab-pane fade active show" id="obras">
							
						<div class="row">
							@foreach($proyectos as $proyecto)
							@if($proyecto->pro_tipo == "obra")
							<div class="col-md-4">
								<div class="card text-center" style="min-height: 350px;">
									<div class="card-body">
										<i class="icon-checkmark3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3"></i>
										<h5 class="card-title">{{$proyecto->pro_nom}}</h5>
										<p class="mb-3">{{$proyecto->pro_fechin}}</p>
										<p class="mb-3">{{$proyecto->pro_fechfin}}</p>
										<a href="/gerente/VerRecursos/{{$proyecto->pro_id}}" class="btn bg-success">Recursos<i class="icon-arrow-right14 ml-2"></i></a>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>

						</div>

						<div class="tab-pane fade" id="supervisiones">
							<div class="row">
								@foreach($proyectos as $proyecto)
								@if($proyecto->pro_tipo == "supervision")
								<div class="col-md-4">
									<div class="card text-center" style="min-height: 350px;">
										
										<div class="card-body">
											<i class="icon-checkmark3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3"></i>
											<h5 class="card-title">{{$proyecto->pro_nom}}</h5>
											<p class="mb-3">{{$proyecto->pro_fechin}}</p>
											<p class="mb-3">{{$proyecto->pro_fechfin}}</p>
											<a href="/gerente/controlver/{{$proyecto->pro_id}}" class="btn bg-success">Recursos <i class="icon-arrow-right14 ml-2"></i></a>
										</div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div>

						<div class="tab-pane fade" id="expedientes">
							<div class="row">
								@foreach($proyectos as $proyecto)
								@if($proyecto->pro_tipo == "expediente")
								<div class="col-md-4">
									<div class="card text-center" style="min-height: 350px;">
										
										<div class="card">
											<div class="card-body">
												<i class="icon-checkmark3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3"></i>
												<h5 class="card-title">{{$proyecto->pro_nom}}</h5>
												<p class="mb-3">{{$proyecto->pro_fechin}}</p>
												<p class="mb-3">{{$proyecto->pro_fechfin}}</p>
												<a href="/gerente/controlver/{{$proyecto->pro_id}}" class="btn bg-success">Recursos <i class="icon-arrow-right14 ml-2"></i></a>
											</div>
										</div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection