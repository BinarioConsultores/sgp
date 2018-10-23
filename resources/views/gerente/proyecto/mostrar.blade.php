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

<script src="{{asset('global_assets/js/sgp/datatables_api_para_proyectos.js')}}"></script>
<script type="text/javascript">

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
							<table class="table table-bordered table-hover datatable-basic table-xs">
								<thead class="">
									<tr>
						                <th>Nombre de Proyecto</th>
						                <th>Cliente</th>
						                <th>Ubicación</th>
						                <th>Fecha Inicio</th>
						                <th>Fecha Fin</th>
						                <th>Costo Directo</th>
						                <th>Utilidades</th>
						                <th>Gastos Generales</th>
						                <th class="text-center">Acciones</th>
						            </tr>
								</thead>
								<tbody>
									@foreach($proyectos as $proyecto)
										@if($proyecto->pro_tipo == "obra")
											<tr>
								                <td>{{$proyecto->pro_nom}}</td>
								                <td>{{$proyecto->Cliente->cli_nom}}</td>
								                <td>{{$proyecto->pro_ubi}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_fechin}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_fechfin}}</td>
								                <td style="text-align: center;">S/. {{$proyecto->pro_cd}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_uti}} %</td>
								                <td style="text-align: center;">{{$proyecto->pro_gg}} %</td>
												<td class="text-center">
													<div class="list-icons">
														<div class="dropdown">
															<a href="#" class="list-icons-item" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>
															<div class="dropdown-menu dropdown-menu-right">
																<a href="/gerente/proyecto/{{$proyecto->pro_id}}" class="dropdown-item"><i class="icon-file-pdf"></i> Ver Proyecto</a>
															</div>
														</div>
													</div>
												</td>
								            </tr>
										@endif
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="tab-pane fade" id="supervisiones">
							<table class="table table-bordered table-hover datatable-basic">
								<thead class="">
									<tr>
						                <th>Nombre de Proyecto</th>
						                <th>Cliente</th>
						                <th>Ubicación</th>
						                <th>Fecha Inicio</th>
						                <th>Fecha Fin</th>
						                <th>Costo Directo</th>
						                <th>Utilidades</th>
						                <th>Gastos Generales</th>
						                <th class="text-center">Acciones</th>
						            </tr>
								</thead>
								<tbody>
									@foreach($proyectos as $proyecto)
										@if($proyecto->pro_tipo == "supervision")
											<tr>
								                <td>{{$proyecto->pro_nom}}</td>
								                <td>{{$proyecto->Cliente->cli_nom}}</td>
								                <td>{{$proyecto->pro_ubi}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_fechin}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_fechfin}}</td>
								                <td style="text-align: center;">S/. {{$proyecto->pro_cd}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_uti}} %</td>
								                <td style="text-align: center;">{{$proyecto->pro_gg}} %</td>
												<td class="text-center">
													<div class="list-icons">
														<div class="dropdown">
															<a href="#" class="list-icons-item" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>
															<div class="dropdown-menu dropdown-menu-right">
																<a href="/gerente/proyecto/{{$proyecto->pro_id}}" class="dropdown-item"><i class="icon-file-pdf"></i> Ver Proyecto</a>
															</div>
														</div>
													</div>
												</td>
								            </tr>
										@endif
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="tab-pane fade" id="expedientes">
							<table class="table table-bordered table-hover datatable-basic">
								<thead class="">
									<tr>
						                <th>Nombre de Proyecto</th>
						                <th>Cliente</th>
						                <th>Ubicación</th>
						                <th>Fecha Inicio</th>
						                <th>Fecha Fin</th>
						                <th>Costo Directo</th>
						                <th>Utilidades</th>
						                <th>Gastos Generales</th>
						                <th class="text-center">Acciones</th>
						            </tr>
								</thead>
								<tbody>
									@foreach($proyectos as $proyecto)
										@if($proyecto->pro_tipo == "expediente")
											<tr>
								                <td>{{$proyecto->pro_nom}}</td>
								                <td>{{$proyecto->Cliente->cli_nom}}</td>
								                <td>{{$proyecto->pro_ubi}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_fechin}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_fechfin}}</td>
								                <td style="text-align: center;">S/. {{$proyecto->pro_cd}}</td>
								                <td style="text-align: center;">{{$proyecto->pro_uti}} %</td>
								                <td style="text-align: center;">{{$proyecto->pro_gg}} %</td>
												<td class="text-center">
													<div class="list-icons">
														<div class="dropdown">
															<a href="#" class="list-icons-item" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>
															<div class="dropdown-menu dropdown-menu-right">
																<a href="/gerente/proyecto/{{$proyecto->pro_id}}" class="dropdown-item"><i class="icon-file-pdf"></i> Ver Proyecto</a>
															</div>
														</div>
													</div>
												</td>
								            </tr>
										@endif
									@endforeach
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection