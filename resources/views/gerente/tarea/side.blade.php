@extends('plantillas.headergerente')

@section('css')
<link href="{{asset('global_assets/css/extras/animate.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('javascript')
<script src="{{asset('global_assets/js/demo_pages/animations_css3.js')}}"></script>
<script type="text/javascript">

		function verTareas(pro_id){

		var request = $.ajax({
		    url: 'ajax/gerente/getVerTareas',
		    type: 'GET',
		    data: { pro_id: pro_id},
		    contentType: 'application/json; charset=utf-8'
		});

		request.done(function(tareas) {

			$('#tareascuerpo').empty();
			
			$.each(tarea, function(index,tarea){

				if (tarea.pro_id=='3') {

					$('#tareascuerpo').append("<li class='nav-item nav-item-submenu'><a href="#" class='nav-link'><i class='icon-portfolio'></i>"+tarea.tar_nom+" </a></li>");
				}	
			});
		});



		request.fail(function(jqXHR, textStatus) {
			$('#tareascuerpo').empty();
			$('#tareascuerpo').append($('<label>ERROR contacte al administrador -> </label>'));
		});
	}

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
                <a class="btn bg-blue btn-labeled btn-labeled-left" href="/gerente/archivotarea/crear"><b><i class="icon-task"></i></b> Subir Archivo</a>
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
		<div class="col-md-3">
		    <div class="sidebar sidebar-light sidebar-component sidebar-component-left sidebar-expand-md">

				<div class="sidebar-content">


					<div class="card">
						<div class="card-header bg-transparent header-elements-inline">
							<span class="text-uppercase font-size-sm font-weight-semibold">Buscar Tarea</span>
							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a>
		                		</div>
	                		</div>
						</div>

						<div class="card-body">
							<form action="#">
								<div class="form-group-feedback form-group-feedback-right">
									<input type="search" class="form-control" placeholder="Search">
									<div class="form-control-feedback">
										<i class="icon-search4 font-size-base text-muted"></i>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="card">
						<div class="card-header bg-transparent header-elements-inline">
							<span class="text-uppercase font-size-sm font-weight-semibold">Acciones</span>
							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a>
		                		</div>
	                		</div>
						</div>
					

						<div class="card-body">

							<div class="row row-tile no-gutters">

								<div class="header-elements d-flex align-items-center col-centered">
					                <a class="btn bg-blue btn-labeled btn-labeled-left" href="/gerente/tarea/crear"><b><i class="icon-file-plus"></i></b> Agregar tarea al proyecto</a>
								</div>
							</div>
						</div>
					</div>

					<div class="card" id="tareas">
						<div class="card-header bg-transparent header-elements-inline">

							<span><a href="#" class="text-uppercase font-size-sm font-weight-semibold">Nombre del proyecto</a></span>

							<!--<a href="#" class="bg-warning-400" onclick="verTareas($pro_id);">Tareas</a>-->

							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a>
		                		</div>
	                		</div>
						</div>

						<div class="card-body" id="tareascuerpo">
								<div class="card-body p-0">
									<ul class="nav nav-sidebar" data-nav-type="accordion">
										<li class="nav-item-header">Tareas</li>
										@foreach($tarea as $tare)
											<li class="nav-item nav-item-submenu">
												<a href="" class="nav-link text-default dropdown-toggle caret-0" data-toggle="dropdown" id="tar_id" name="tar_id">
													<i class="icon-portfolio" value="{{$tare->tar_id}}"></i> {{$tare->tar_nom}}
												</a>
												<ul class="nav nav-group-sub" data-submenu-title="Menu levels">
													<li class="nav-item">
														<a href="#" class="nav-link">
															<i class="icon-file-empty2"></i>Tarea 1.1
														</a>
														<ul class="nav nav-group-sub">
															<li class="nav-item">
																<a href="#" class="nav-link">
																	<i class="icon-file-empty2"></i> Tarea 1.1.1
																</a>
															</li>
														</ul>
													</li>
												</ul>
												<ul class="nav nav-group-sub" data-submenu-title="Menu levels">
													<li class="nav-item">
														<a href="#" class="nav-link">
															<i class="icon-file-empty2"></i>Tarea 1.2
														</a>
													</li>
												</ul>
											</li>

											@endforeach
										<li class="nav-item nav-item-submenu">
											<a href="#" class="nav-link"><i class="icon-portfolio"></i> Tarea 2</a>
										</li>
									</ul>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-9">
			<div class="row">
					@foreach($tarea as $tare)
				<div class="col-md-6">
								
					<div class="card border-success-400">

									<div class="card-body">
										<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
											<div>
												<h6><a href="#">{{$tare->tar_nom}}</a></h6>
												<p class="mb-3">{{$tare->Proyecto->pro_nom}}</p>

							                	<a href="#">
							                		<img src="../../../../global_assets/images/demo/users/face2.jpg" class="rounded-circle" width="36" height="36" alt="">
						                		</a>
							                
											</div>

											<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
												<li><span class="text-muted">{{$tare->tar_fechin}}</span></li>
												<li class="dropdown">
							                		Priority: &nbsp; 
													<a href="#" class="badge bg-success-400 align-top dropdown-toggle" data-toggle="dropdown">{{$tare->tar_prio}}</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-danger"></span> Blocker</a>
														<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-warning-400"></span> High priority</a>
														<a href="#" class="dropdown-item active"><span class="badge badge-mark mr-2 border-success"></span> Normal priority</a>
														<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-grey-300"></span> Low priority</a>
													</div>
												</li>
												
											</ul>
										</div>
									</div>

									<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
										<span>Due: <span class="font-weight-semibold">14 horas</span></span>

										<ul class="list-inline mb-0 mt-2 mt-sm-0">
											<li class="list-inline-item dropdown">
												<a href="#" class="text-default dropdown-toggle" data-toggle="dropdown">Open</a>

												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item active">Open</a>
													<a href="#" class="dropdown-item">On hold</a>
													<a href="#" class="dropdown-item">Resolved</a>
													<a href="#" class="dropdown-item">Closed</a>
													<div class="dropdown-divider"></div>
													<a href="#" class="dropdown-item">Dublicate</a>
													<a href="#" class="dropdown-item">Invalid</a>
													<a href="#" class="dropdown-item">Wontfix</a>
												</div>
											</li>
											<li class="list-inline-item dropdown">
												<a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>

												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
													<a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach screenshot</a>
													<a href="#" class="dropdown-item"><i class="icon-rotate-ccw2"></i> Reassign</a>
													<div class="dropdown-divider"></div>
													<a href="#" class="dropdown-item"><i class="icon-pencil7"></i> Edit task</a>
													<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
												</div>
											</li>
										</ul>
									</div>
					</div>
				</div>
					@endforeach
			</div>
		
			<div class="card border-success-400">
				<div class="row">
					<div class="card-body border-top-info col-md-9">

						
							<div class="text-center">
								<h3 class="font-weight-semibold mb-0">Construccion el primer tramo - carretera AQP-Los Angeles </h3>
							
								<label>Progreso de la tarea: </label>
								<br/>

								<div class='container-fluid'>
								<div>						
									<div class='progress mb-3'>						
										<div class='progress-bar progress-bar-striped progress-bar-animated bg-blue-400' style='width: 60%'>
											<span>60% Completado</span>
										</div>					
									</div>

									<label class="text-left">{{$tare->tar_fechin}}</i></label>				
								</div>
								</div>
								<!--<p class="mb-3 text-muted">Specify target in <code>data-target</code> attribute</p>-->
								<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapse-button-collapsed" aria-expanded="true">Detalles de la Tarea
								</button>
							</div>

							<div class="collapse show" id="collapse-button-collapsed" style="">
								<div class="mt-3">
									<ul class="list-group">
  										<li class="list-group-item">Primer avance</li>
  										<li class="list-group-item">Segundo avance</li>
  										<li class="list-group-item">Tercer Avance</li>
									</ul>										
								</div>
							</div>
						
						
					</div>
					<div class="col-md-3">
						
							<div class="card-body text-center">
								<div class="card-img-actions d-inline-block mb-3">
									<img class="img-fluid rounded-circle" src="../../../../global_assets/images/demo/users/face2.jpg" width="170" height="170" alt="">
									<div class="card-img-actions-overlay card-img rounded-circle">
										<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
											<i class="icon-plus3"></i>
										</a>
										<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
											<i class="icon-link"></i>
										</a>
									</div>
								</div>

					    		<h6 class="font-weight-semibold mb-0">Raydy Ponce</h6>
					    		<span class="d-block text-muted">Gerente de Proyecto</span>

				    			<div class="list-icons list-icons-extended mt-3">
			                    	<a href="#" class="list-icons-item" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a>
			                    	<a href="#" class="list-icons-item" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a>
			                    	<a href="#" class="list-icons-item" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a>
		                    	</div>
					    	</div>
				    	

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection