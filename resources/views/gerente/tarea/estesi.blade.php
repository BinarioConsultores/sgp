@extends('plantillas.headergerente')

@section('css')
<link href="{{asset('global_assets/css/extras/animate.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('javascript')

<script src="{{asset('global_assets/js/demo_pages/animations_css3.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/components_modals.js')}}"></script>
<script src="{{asset('global_assets/js/tarea/task_manager_list_tarea.js')}}"></script>
<script type="text/javascript">

	function verTareas(dato){
		//alert(dato);

				
		$('#hijocuerpo').attr("hidden","hidden");
		$('#hijocuerpo').removeAttr("hidden");
		$('#hijocuerpo2').removeAttr("hidden");
		$('#listadetareas').attr("class","col-md-9");
		//$('#tareadetalle').removeAttr("hidden");

		var request = $.ajax({
		    url: '/ajax/tarea/verTareaPadre',
		    type: 'GET',
		    data: { tareita: dato},
		    contentType: 'application/json; charset=utf-8'
		});

		request.done(function(tareaG){

			//alert(tareaG);

			$('#hijocuerpo').empty();

			$('#hijocuerpo').append("<div class='card border-success-400'><div class='card-body'><div class='d-sm-flex align-item-sm-center flex-sm-nowrap'><div><h6><a href='#'>"+tareaG.tar_nom+"</a></h6><p class='mb-3'>"+tareaG.tar_desc+"</p><a href='#'> <img src='../../../../global_assets/images/demo/users/face2.jpg' class='rounded-circle' width='36' height='36'> </a> <h6 class='font-weight-semibold mb-0'> Descripcion: "+tareaG.tar_desc+"</h6> </div><ul class='list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto'><li><span class='text-muted'>"+tareaG.tar_fechin+"</span></li><li class='dropdown'> Prioridad: <a href='#' class='badge bg-success-400 align-top dropdown-toggle' data-toggle='dropdown'>"+tareaG.tar_prio+"</a></li></ul></div></div><div class='card-footer d-sm-flex justify-content-sm-between align-items-sm-center'><span>Fecha de Finalizacion: <span class='font-weight-semibold'>"+tareaG.tar_fechfin+"</span></span><ul class='list-inline mb-0 mt-2 mt-sm-0'><li class='list-inline-item dropdown'><a href='#' class='text-default dropdown-toggle' data-toggle='dropdown'>Opciones</a><div class='dropdown-menu dropdown-menu-right'><a href='#' class='dropdown-item active' data-toggle='modal' data-target='#eliminarModal' onclick='setEliminarModal(this)'>Eliminar </a> <a href='#' class='dropdown-item'>Editar</a><div class='dropdown-divider'></div><a href='#' data-toggle='modal' data-target='#subirArchivoModal' class='dropdown-item'>Subir Archivo</a><a href='#' class='dropdown-item'>Dublicate</a></div></li><li class='list-inline-item dropdown'><a href='#' class='text-default dropdown-toggle' data-toggle='dropdown'><i class='icon-menu7'></i></a><div class='dropdown-menu dropdown-menu-right'><a href='#' class='dropdown-item'><i class='icon-alarm-add'></i> Check in</a><a href='#' class='dropdown-item'><i class='icon-attachment'></i> Attach screenshot</a><a href='#' class='dropdown-item'><i class='icon-rotate-ccw2'></i> 'Reassign'</a><div class='dropdown-divider'></div><a href='#' class='dropdow n-item'><i class='icon-pencil7'></i> Edit task</a><a href='#' class='dropdown-item'><i class='icon-cross2'></i> Remove</a></div></li></ul></div></div>");

			verTareasHijas(dato);
		});

		request.fail(function(jqXHR, textStatus) {
			$('#hijocuerpo').empty();
			$('#hijocuerpo').append($('<label>ERROR contacte al administrador -> </label>'));
		});
	}

	function verTareasHijas(dato){

		
		$('#titulo').text("Lista de Subtareas");

		
		//alert(dato);
		var request = $.ajax({
		url: '/ajax/tarea/verTareasHijas',
		type: 'GET',
		data: { tareita: dato},
		contentType: 'application/json; charset=utf-8'
		});

		request.done(function(tareasHijas) {

			$('#listatareas').removeAttr("hidden");
			$('#hijocuerpo2').empty();

			
			//alert(tareasHijas);
			//$('#hijocuerpo').empty();
			//htrhtr(9);
			//$('#tareadetalle').empty();

			$.each(tareasHijas, function(index,tarea){

			$('#hijocuerpo2').append("<div class='card-body'><div class='d-sm-flex align-item-sm-center flex-sm-nowrap'><div><h6><a href='#' onclick='VerTareaHija("+tarea.tar_id+");'>"+tarea.tar_nom+"</a></h6><p class='mb-3'>"+tarea.tar_desc+"</p><a href='#'> <img src='../../../../global_assets/images/demo/users/face2.jpg' class='rounded-circle' width='36' height='36'> </a><h6 class='font-weight-semibold mb-0'> Usuario:</h6></div></div></div>");
			});

		});

		request.fail(function(jqXHR, textStatus) {
			$('#hijocuerpo2').empty();
			$('#hijocuerpo2').append($('<label>ERROR contacte al administrador -> </label>'));
		});
	}

	function VerTareaHija(dato){
		alert(dato);


		$('#tareadetalle').removeAttr("hidden");

		var request = $.ajax({
		    url: '/ajax/tarea/verTareaPadre',
		    type: 'GET',
		    data: { tareita: dato},
		    contentType: 'application/json; charset=utf-8'
		});

		request.done(function(tareaG){

			//alert(tareaG);

			$('#tareadetalle').empty();

			$('#tareadetalle').append("<div class='row'><div class='card-body border-top-info col-md-9'><div class='text-center'><h3 class='font-weight-semibold mb-0'>Construccion el primer tramo - carretera AQP-Los Angeles </h3><label>Progreso de la tarea: </label><br/><div class='container-fluid'><div><div class='progress mb-3'><div class='progress-bar progress-bar-striped progress-bar-animated bg-blue-400' style='width: 60%'><span>60% Completado</span></div></div><label class='text-left'>23-01-1994</label></div></div><button type='button' class='btn btn-primary' data-toggle='collapse' data-target='#collapse-button-collapsed' aria-expanded='true'>Detalles de la Tarea</button></div><div class='collapse show' id='collapse-button-collapsed'><div class='mt-3'><ul class='list-group'> <li class='list-group-item'>Primer avance</li><li class='list-group-item'>Segundo avance</li><li class='list-group-item'>Tercer Avance</li></ul></div></div></div><div class='col-md-3'><div class='card-body text-center'><div class='card-img-actions d-inline-block mb-3'><img class='img-fluid rounded-circle' src='../../../../global_assets/images/demo/users/face2.jpg' width='170' height='170' alt='><div class='card-img-actions-overlay card-img rounded-circle'><a href='#' class='btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round'><i class='icon-plus3'></i></a><a href='user_pages_profile.html' class='btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2'><i class='icon-link'></i></a></div><h6 class='font-weight-semibold mb-0'>Raydy Ponce</h6> <span class='d-block text-muted'>Gerente de Proyecto</span> <div class='list-icons list-icons-extended mt-3'> <a href='#' class='list-icons-item' data-popup='tooltip' title=' data-container='body' data-original-title='Google Drive'><i class='icon-google-drive'></i></a> <a href='#' class='list-icons-item' data-popup='tooltip' title=' data-container='body' data-original-title='Twitter'><i class='icon-twitter'></i></a> <a href='#' class='list-icons-item' data-popup='tooltip' title=' data-container='body' data-original-title='Github'><i class='icon-github'></i></a> </div></div></div></div>");
		});

		request.fail(function(jqXHR, textStatus) {
			$('#tareadetalle').empty();
			$('#tareadetalle').append($('<label>ERROR contacte al administrador -> </label>'));
		});
	}
	//function x (id_padre){

	//}
	/*function setEliminarModal(btn){
    var tar_id = $(btn).attr( "tar_id" )

    var request = $.ajax({
        url: '/gerente/tarea/eliminar/{pro_id}/{tar_id}',
        type: 'GET',
        data: { tar_id: tar_id} ,
        contentType: 'application/json; charset=utf-8'
    });

    request.fail(function(jqXHR, textStatus) {
          alert(textStatus);
    });

	}*/

</script>
@endsection

@section('content')

<div>
	<div class="page-header page-header-dark has-cover">
		<div class="page-header-content header-elements-inline">
			<div class="page-title">
				<h5>
					<i class="icon-arrow-left52 mr-2"></i>
					<span class="font-weight-semibold">Page Header</span> - Image
					<small class="d-block opacity-75">With dark image</small>
				</h5>
			</div>

			<div class="header-elements d-flex align-items-center">
                <a class="btn bg-blue btn-labeled btn-labeled-left" href="/gerente/tarea/crear"><b><i class="icon-file-plus"></i></b> Agregar tarea al proyecto</a>
                
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

	<div id="eliminarModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h6 class="modal-title">Esta seguro que quiere eliminar esta Tarea ?</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
                    <form method="get" action="/gerente/tarea/eliminar/{pro_id}/{tar_id}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                </div>

				<div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Eliminar
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar
                    </button>
                    </form>
                </div>
			</div>
		</div>
	</div>

	<!-- Horizontal form modal -->
	<div id="subirArchivoModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Horizontal form</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<form action="#" class="form-horizontal">
					<div class="modal-body">
						<div class="form-group row">
							<label class="col-form-label col-sm-3">First name</label>
							<div class="col-sm-9">
								<input type="text" placeholder="Eugene" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-3">Last name</label>
							<div class="col-sm-9">
								<input type="text" placeholder="Kopyov" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-3">Email</label>
							<div class="col-sm-9">
								<input type="text" placeholder="eugene@kopyov.com" class="form-control">
								<span class="form-text text-muted">name@domain.com</span>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-3">Phone #</label>
							<div class="col-sm-9">
								<input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control">
								<span class="form-text text-muted">+99-99-9999-9999</span>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-3">Address line 1</label>
							<div class="col-sm-9">
								<input type="text" placeholder="Ring street 12, building D, flat #67" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-3">City</label>
							<div class="col-sm-9">
								<input type="text" placeholder="Munich" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-3">State/Province</label>
							<div class="col-sm-9">
								<input type="text" placeholder="Bayern" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-3">ZIP code</label>
							<div class="col-sm-9">
								<input type="text" placeholder="1031" class="form-control">
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						<button type="submit" class="btn bg-primary">Submit form</button>
					</div>
				</form>
			</div>
		</div>
	</div>
				<!-- /horizontal form modal -->

	<div class="row">

		<div class="col-md-12" id="listadetareas">

			<div class="col-md-12">

			    <div class="card border-success-400">
						<div class="card-header bg-success-400 header-elements-inline">
							<h4 class="card-title">LISTA DE TAREAS</h4>
							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a>
			                		<a class="list-icons-item" data-action="reload"></a>
			                		<a class="list-icons-item" data-action="remove"></a>
			                	</div>
		                	</div>
						</div>

						<table class="table tasks-list table-lg">
							<thead>
								<tr>
									<th>ID</th>
									<th>IS</th>
					                <th>Nombre de la Tarea</th>
					                <th>Prioridad</th>
					                <th>Fecha de inicio</th>
					               
					                <th>Usuario</th>
									<th class="text-center text-muted" style="width: 30px;"><i class="icon-checkmark3"></i></th>
					            </tr>
							</thead>
							@if(sizeof($tarea)>0)
							<tbody>
								@foreach ($tarea as $tare)

								<tr onclick="verTareas($tare->tar_id)">
									<td>#{{$tare->tar_id}}</td>
									<td>TAREAS</td>
									
					                <td>

					                	<div class="font-weight-semibold"><a onclick="verTareas({{$tare->tar_id}});">{{$tare->tar_nom}}</a></div>
					                	<div class="text-muted">{{$tare->tar_desc}}</div>
					                </td>
					                <td>
					                	<div class="btn-group">
											<a href="#" class="badge bg-danger dropdown-toggle" data-toggle="dropdown">{{$tare->tar_prio}}</a>
											<!--<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item active"><span class="badge badge-mark mr-2 bg-danger border-danger"></span> Blocker</a>
												<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 bg-orange border-orange"></span> High priority</a>
												<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 bg-primary border-primary"></span> Normal priority</a>
												<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 bg-success border-success"></span> Low priority</a>
											-->
											</div>
										</div>
				                	</td>
					                <td>
					                	<div class="d-inline-flex align-items-center">
					                		<i class="icon-calendar2 mr-2"></i>
					                		<input type="text" class="form-control datepicker p-0 border-0 bg-transparent" value="{{$tare->tar_fechin}}">
					                	</div>
				                	</td>
					              
					                <td>
					                	<h6 class="font-weight-semibold mb-0">{{$tare->Usuario->usu_nom}}</h6>
					                	<a href="#"><img src="../../../../global_assets/images/demo/users/face2.jpg" class="rounded-circle" width="32" height="32" alt=""></a>
					                	
					                </td>
									<td class="text-center">
										<div class="list-icons">
											<div class="list-icons-item dropdown">
												<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item active" data-toggle="modal" data-target="#eliminarModal" tar_id="{{$tare->tar_id}}" onclick="setEliminarModal(this)">Eliminar tarea
	                                                </a>
	                                                <a class="dropdown-item" onclick="verTareas(5);">Editar tarea</a>
													<div class="dropdown-divider"></div>
													<a href="#" class="dropdown-item" data-toggle="modal" data-target="#subirArchivoModal" tar_id="{{$tare->tar_id}}" onclick="setSubirArchivoModal(this)">Agregar archivo
													<a href="#" class="dropdown-item">Dublicate</a>
												</div>
											</li>
										</div>
									</td>
					            </tr>

					            @endforeach

					        @else
	                            <div class="alert alert-danger" role="alert">
	                                No tienes Tareas asignadas a este proyecto                            
	                            </div>
	                        @endif

							

							

								
							</tbody>
						</table>
				</div>

			    <div class="card border-success-400" id="tareadetalle" hidden="hidden">

				</div>

			</div>

		</div>
		
		<div class="col-md-3">
			<div class="row">	
				<div class="col-md-12" id="hijocuerpo" hidden="hidden">			
				</div>
				<div class="col-md-12">
					<div class="card border-success-400" id="listatareas" hidden="hidden">
						<div class="card-header bg-success-400 text-white header-elements-inline">
							<h6 class="card-title" id="titulo"></h6>
							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a>
			                		<a class="list-icons-item" data-action="reload"></a>
			                	</div>
			            	</div>
						</div>

						<div class="card-body" id="hijocuerpo2">

						</div>
					</div>
				</div>
			</div>
		
			
		</div>
	</div>
</div>
@endsection