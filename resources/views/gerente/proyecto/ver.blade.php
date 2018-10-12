@extends('plantillas.headergerente')
@section('css')
<link href="{{asset('global_assets/css/extras/animate.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('javascript')
<script src="{{asset('global_assets/js/demo_pages/animations_css3.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/components_modals.js')}}"></script>
<script src="{{asset('global_assets/js/sgp/task_manager_list.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script type="text/javascript">


</script>
@endsection
@section('content')
@if (Session::has('creado'))
    <div class="alert alert-success">
        {{Session::get('creado')}}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif
<!-- Full width modal -->
<div id="modal_formato" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Formato para subir el <strong>CALENDARIO DE UTILIZACIÓN DE RECURSOS</strong></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<img src="">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!-- /full width modal -->
<div class="page-header page-header-dark has-cover mb-0">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h5>
				<i class="icon-arrow-left52 mr-2"></i>
				<span class="font-weight-semibold">Dashboard</span> - Proyecto - {{$proyecto->pro_nom}}
				<small class="d-block opacity-75">With dark image</small>
			</h5>
		</div>
	</div>

	<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
		<div class="d-flex">
			<div class="breadcrumb">
				<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Gerencia</a>
				<a href="#" class="breadcrumb-item">Proyectos</a>
				<span class="breadcrumb-item active">Ver Proyecto</span>
			</div>

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
<!-- Profile navigation -->
<div class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="text-center d-lg-none w-100">
		<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
			<i class="icon-menu7 mr-2"></i>
			Profile navigation
		</button>
	</div>

	<div class="navbar-collapse collapse" id="navbar-second">
		<ul class="nav navbar-nav">
			<li class="nav-item">
				<a href="#activity" class="navbar-nav-link active" data-toggle="tab">
					<i class="icon-menu7 mr-2"></i>
					General
				</a>
			</li>
			<li class="nav-item">
				<a href="#gastos" class="navbar-nav-link" data-toggle="tab">
					<i class="icon-coins mr-2"></i>
					Gastos
				</a>
			</li>
			<li class="nav-item">
				<a href="#settings" class="navbar-nav-link" data-toggle="tab">
					<i class="icon-cog3 mr-2"></i>
					Opciones
				</a>
			</li>
			<li class="nav-item">
				<a href="#cur" class="navbar-nav-link" data-toggle="tab">
					<i class="icon-calendar3 mr-2"></i>
					Calendario de Recursos</span>
				</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-lg-auto">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link">
					<i class="icon-stack-text mr-2"></i>
					Notes
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="navbar-nav-link">
					<i class="icon-collaboration mr-2"></i>
					Friends
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="navbar-nav-link">
					<i class="icon-images3 mr-2"></i>
					Photos
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
					<i class="icon-gear"></i>
					<span class="d-lg-none ml-2">Settings</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" class="dropdown-item"><i class="icon-image2"></i> Update cover</a>
					<a href="#" class="dropdown-item"><i class="icon-clippy"></i> Update info</a>
					<a href="#" class="dropdown-item"><i class="icon-make-group"></i> Manage sections</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item"><i class="icon-three-bars"></i> Activity log</a>
					<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Profile settings</a>
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- /profile navigation -->
<div class="content">
	@if(!$proyecto->Curs->count()>0)
		<div class="alert bg-warning text-white alert-styled-left alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
			<span class="font-weight-semibold">Atención!</span> EL PROYECTO NO TIENE EL <strong>CALENDARIO DE UTILIZACIÓN DE RECURSOS AÚN</strong>
	    </div>
	@endif
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

	<!-- Left content -->
	<div class="tab-content w-100 order-2 order-md-1">
		<div class="tab-pane fade active show" id="activity">

			<!-- Sales stats -->
			<div class="card">
				<div class="card-header header-elements-sm-inline">
					<h6 class="card-title">Weekly statistics</h6>
					<div class="header-elements">
						<span><i class="icon-history mr-2 text-success"></i> Updated 3 hours ago</span>

						<div class="list-icons ml-3">
	                		<a class="list-icons-item" data-action="reload"></a>
	                	</div>
                	</div>
				</div>

				<div class="card-body">
					<div class="chart-container">
						<div class="chart has-fixed-height" id="weekly_statistics"></div>
					</div>
				</div>
			</div>
			<!-- /sales stats -->


			<!-- Blog post -->
			<div class="card">
				<div class="card-header header-elements-sm-inline">
					<h6 class="card-title">Himalayan sunset</h6>
					<div class="header-elements">
						<span><i class="icon-checkmark-circle mr-2 text-success"></i> 49 minutes ago</span>
						<div class="list-icons ml-3">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
									<i class="icon-arrow-down12"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Hide user posts</a>
									<a href="#" class="dropdown-item"><i class="icon-user-block"></i> Block user</a>
									<a href="#" class="dropdown-item"><i class="icon-user-minus"></i> Unfollow user</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-embed"></i> Embed post</a>
									<a href="#" class="dropdown-item"><i class="icon-blocked"></i> Report this post</a>
								</div>
							</div>
	                	</div>
                	</div>
				</div>

				<div class="card-body">
					<div class="card-img-actions mb-3">
						<img class="card-img img-fluid" src="../../../../global_assets/images/demo/cover3.jpg" alt="">
						<div class="card-img-actions-overlay card-img">
							<a href="blog_single.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
								<i class="icon-link"></i>
							</a>
						</div>
					</div>

					<h6 class="mb-3">
						<i class="icon-comment-discussion mr-2"></i>
						<a href="#">Jason Ansley</a> commented:
					</h6>

					<blockquote class="blockquote blockquote-bordered py-2 pl-3 mb-0">
						<p class="mb-2 font-size-base">When suspiciously goodness labrador understood rethought yawned grew piously endearingly inarticulate oh goodness jeez trout distinct hence cobra despite taped laughed the much audacious less inside tiger groaned darn stuffily metaphoric unihibitedly inside cobra.</p>
						<footer class="blockquote-footer">Jason, <cite title="Source Title">10:39 am</cite></footer>
					</blockquote>
				</div>

				<div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
					<ul class="list-inline mb-0">
						<li class="list-inline-item"><a href="#" class="text-default"><i class="icon-eye4 mr-2"></i> 438</a></li>
						<li class="list-inline-item"><a href="#" class="text-default"><i class="icon-comment-discussion mr-2"></i> 71</a></li>
					</ul>

					<a href="#" class="d-inline-block text-default mt-2 mt-sm-0">Read post <i class="icon-arrow-right14 ml-2"></i></a>
				</div>
			</div>
			<!-- /blog post -->


			<!-- Invoices -->
			<div class="row">
				<div class="col-lg-6">
					<div class="card border-left-3 border-left-danger rounded-left-0">
						<div class="card-body">
							<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
								<div>
									<h6 class="font-weight-semibold">Leonardo Fellini</h6>
									<ul class="list list-unstyled mb-0">
										<li>Invoice #: &nbsp;0028</li>
										<li>Issued on: <span class="font-weight-semibold">2015/01/25</span></li>
									</ul>
								</div>

								<div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
									<h6 class="font-weight-semibold">$8,750</h6>
									<ul class="list list-unstyled mb-0">
										<li>Method: <span class="font-weight-semibold">SWIFT</span></li>
										<li class="dropdown">
											Status: &nbsp;
											<a href="#" class="badge bg-danger-400 align-top dropdown-toggle" data-toggle="dropdown">Overdue</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item active"><i class="icon-alert"></i> Overdue</a>
												<a href="#" class="dropdown-item"><i class="icon-alarm"></i> Pending</a>
												<a href="#" class="dropdown-item"><i class="icon-checkmark3"></i> Paid</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item"><i class="icon-spinner2 spinner"></i> On hold</a>
												<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Canceled</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
							<span>
								<span class="badge badge-mark border-danger mr-2"></span>
								Due:
								<span class="font-weight-semibold">2015/02/25</span>
							</span>

							<ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
								<li class="list-inline-item">
									<a href="#" class="text-default"><i class="icon-eye8"></i></a>
								</li>
								<li class="list-inline-item dropdown">
									<a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>

									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove invoice</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="card border-left-3 border-left-success rounded-left-0">
						<div class="card-body">
							<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
								<div>
									<h6 class="font-weight-semibold">Rebecca Manes</h6>
									<ul class="list list-unstyled mb-0">
										<li>Invoice #: &nbsp;0027</li>
										<li>Issued on: <span class="font-weight-semibold">2015/02/24</span></li>
									</ul>
								</div>

								<div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
									<h6 class="font-weight-semibold">$5,100</h6>
									<ul class="list list-unstyled mb-0">
										<li>Method: <span class="font-weight-semibold">Paypal</span></li>
										<li class="dropdown">
											Status: &nbsp;
											<a href="#" class="badge bg-success-400 align-top dropdown-toggle" data-toggle="dropdown">Paid</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item"><i class="icon-alert"></i> Overdue</a>
												<a href="#" class="dropdown-item"><i class="icon-alarm"></i> Pending</a>
												<a href="#" class="dropdown-item active"><i class="icon-checkmark3"></i> Paid</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item"><i class="icon-spinner2 spinner"></i> On hold</a>
												<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Canceled</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
							<span>
								<span class="badge badge-mark border-success mr-2"></span>
								Due:
								<span class="font-weight-semibold">2015/03/24</span>
							</span>

							<ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
								<li class="list-inline-item">
									<a href="#" class="text-default"><i class="icon-eye8"></i></a>
								</li>
								<li class="list-inline-item dropdown">
									<a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>

									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove invoice</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /invoices -->


			<!-- Video post -->
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header header-elements-sm-inline">
							<h6 class="card-title">Peru mountains</h6>
							<div class="header-elements">
								<span><i class="icon-checkmark-circle mr-2 text-success"></i> Today, 8:39 am</span>
								<div class="list-icons ml-3">
									<div class="list-icons-item dropdown">
										<a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
											<i class="icon-arrow-down12"></i>
										</a>

										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Hide user posts</a>
											<a href="#" class="dropdown-item"><i class="icon-user-block"></i> Block user</a>
											<a href="#" class="dropdown-item"><i class="icon-user-minus"></i> Unfollow user</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item"><i class="icon-embed"></i> Embed post</a>
											<a href="#" class="dropdown-item"><i class="icon-blocked"></i> Report this post</a>
										</div>
									</div>
			                	</div>
		                	</div>
						</div>

						<div class="card-body">
							<p class="mb-3">Cutting much goodness more from sympathetic unwittingly under wow affluent luckily or distinctly demonstrable strewed lewd outside coaxingly and after and rational alas this fitted. Hippopotamus noticeably oh bridled more until dutiful.</p>

							<div class="card-img embed-responsive embed-responsive-16by9">
								<iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="https://player.vimeo.com/video/126945693?title=0&amp;byline=0&amp;portrait=0" webkitallowfullscreen=""></iframe>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="card">
						<div class="card-header header-elements-sm-inline">
							<h6 class="card-title">Woodturner master</h6>
							<div class="header-elements">
								<span><i class="icon-checkmark-circle mr-2 text-success"></i> Yesterday, 7:52 am</span>
								<div class="list-icons ml-3">
									<div class="list-icons-item dropdown">
										<a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
											<i class="icon-arrow-down12"></i>
										</a>

										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Hide user posts</a>
											<a href="#" class="dropdown-item"><i class="icon-user-block"></i> Block user</a>
											<a href="#" class="dropdown-item"><i class="icon-user-minus"></i> Unfollow user</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item"><i class="icon-embed"></i> Embed post</a>
											<a href="#" class="dropdown-item"><i class="icon-blocked"></i> Report this post</a>
										</div>
									</div>
			                	</div>
		                	</div>
						</div>

						<div class="card-body">
							<p class="mb-3">Bewitchingly amid heard by llama glanced fussily quetzal more that overcame eerie goodness badger woolly where since gosh accurate irrespective that pounded much winked urgent and furtive house gosh one while this more.</p>

							<div class="card-img embed-responsive embed-responsive-16by9">
								<iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="https://player.vimeo.com/video/126545288?title=0&amp;byline=0&amp;portrait=0" webkitallowfullscreen=""></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /video post -->

	    </div>

	    <div class="tab-pane fade" id="gastos">

    		<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Listado de Gastos del Proyecto</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a href="/gerente/proyecto/{{$proyecto->pro_id}}/factura/crear" target="_blank" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round"><b><i class="icon-stack-plus"></i></b> Nuevo Gasto/Compra</a>
	                		<a class="list-icons-item" data-action="collapse"></a>
	                		<a class="list-icons-item" data-action="reload"></a>
	                	</div>
                	</div>
				</div>
				<div class="card-body">


					<div class="datatable-scroll">
						<table class="table datatable-pagination dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Número</th>
									<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DOB: activate to sort column ascending">Fecha</th>
									<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Tipo</th>
									<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">Estado</th>
									<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DOB: activate to sort column ascending">Observaciones</th>
									<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DOB: activate to sort column ascending">Proveedor</th>
									<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DOB: activate to sort column ascending">Empleado</th>
									<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="DOB: activate to sort column ascending">Total</th>
									<th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">Actions</th></tr>
							</thead>
							<tbody>
								@foreach($proyecto->facturas as $factura)
									<tr role="row" class="odd">
										<td class="sorting_1">{{$factura->fac_nro}}</td>
										<td>{{$factura->fac_fech}}</td>
										<td>{{$factura->fac_tipo}}</td>
										<td>{{$factura->fac_est}}</td>
										<td>{{$factura->fac_obs}}</td>
										<td>{{$factura->proveedor->prov_nom}}</td>
										<td>{{$factura->empleado->persona->per_nom}}</td>
										<?php $total=0;?>
										@foreach($factura->FacturaDetalles as $detalle)
											<?php $total=$total+($detalle->facd_cant*$detalle->facd_punit);?>
										@endforeach
										<td>{{number_format($total,2)}}</td>
										<td class="text-center">
											<div class="list-icons">
												<div class="dropdown">
													<a href="#" class="list-icons-item" data-toggle="dropdown">
														<i class="icon-menu9"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/creardetalle" class="dropdown-item"><i class="icon-eye"></i> Ver</a>
														<a href="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/editar" class="dropdown-item"><i class="icon-pencil5"></i> Editar</a>
														<a href="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/eliminar" onclick="return confirm('Esta seguro que desea eliminar?')" class="dropdown-item"><i class="icon-bin2"></i> Eliminar</a>
													</div>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
		    	</div>
		    </div>
		 </div>

	    <div class="tab-pane fade" id="settings">
			<!-- Profile info -->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Calendario de Utilización de Recursos</h5>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
	                		<a class="list-icons-item" data-action="reload"></a>
	                	</div>
                	</div>
				</div>
				@if(!$proyecto->Curs->count()>0)
					<div class="alert bg-warning text-white alert-styled-left alert-dismissible ml-3 mr-3">
						<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
						<span class="font-weight-semibold">Atención!</span> EL PROYECTO NO TIENE EL <strong>CALENDARIO DE UTILIZACIÓN DE RECURSOS AÚN</strong>
				    </div>
				    <div class="card-body">
						<div class="col-md-6 col-centered">
							<form action="/gerente/proyecto/{{$proyecto->pro_id}}/loadcur" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
		                        <div class="row">
		                        	<div class="col-md-12">
		                        		<div class="form-group">
											<label></label>
		                                    <input type="file" class="form-input-styled" name="import_file" data-fouc>
		                                    <span class="form-text text-muted">Formatos Aceptados: XLSX</span>
										</div>
		                        	</div>
		                        </div>
		                        <div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label>Fecha de Inicio: </label>
											<input type="date" class="form-control daterange-single" name="pro_fechin" value="{{ $proyecto->pro_fechin}}">
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
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label>Nro de Etapas: </label>
											<input type="number" class="form-control daterange-single" name="cur_etapas" value="1" min="1">
											@if ($errors->has('cur_etapas'))
				                                <span class="form-text text-danger">
				                                	@foreach($errors->get('cur_etapas') as $message)
				                                		<strong>{{ $message }}</strong>
				                                	@endforeach
				                                </span>
				                            @endif
										</div>
									</div>
								</div>
		                        <div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label>Fila de Cabecera: </label>
											<input type="text" placeholder="Ej: 15" class="form-control touchspin-prefix {{ $errors->has('cur_fc') ? 'border-danger' : '' }}" style="display: block;" name="cur_fc" value="{{ old('cur_fc')}}">
											@if ($errors->has('cur_fc'))
				                                <span class="form-text text-danger">
				                                	@foreach($errors->get('cur_fc') as $message)
				                                		<strong>{{ $message }}</strong>
				                                	@endforeach
				                                </span>
				                            @endif
										</div>
									</div>
									<div class="col-md-4 mt-4">
										<div class="form-group">
											<button type="button" class="btn btn-block bg-blue-400" data-toggle="modal" data-target="#modal_formato"><i class="icon-search4"></i> <span>Ver Formato</span></button>
										</div>
									</div>
								</div>
		                       	<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label>Fila de la primera Familia de Insumos: </label>
											<input type="text" placeholder="Ej: 15" class="form-control touchspin-prefix {{ $errors->has('cur_pl') ? 'border-danger' : '' }}" style="display: block;" name="cur_pl" value="{{ old('cur_pl')}}">
											@if ($errors->has('cur_pl'))
				                                <span class="form-text text-danger">
				                                	@foreach($errors->get('cur_pl') as $message)
				                                		<strong>{{ $message }}</strong>
				                                	@endforeach
				                                </span>
				                            @endif
										</div>
									</div>
									<div class="col-md-4 mt-4">
										<div class="form-group">
											<button type="button" class="btn btn-block bg-blue-400" data-toggle="modal" data-target="#modal_formato"><i class="icon-search4"></i> <span>Ver Formato</span></button>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label>Fila del último Insumo: </label>
											<input type="text" placeholder="Ej: 15" class="form-control touchspin-prefix {{ $errors->has('cur_ul') ? 'border-danger' : '' }}" style="display: block;" name="cur_ul" value="{{ old('cur_ul')}}">
											@if ($errors->has('cur_ul'))
				                                <span class="form-text text-danger">
				                                	@foreach($errors->get('cur_ul') as $message)
				                                		<strong>{{ $message }}</strong>
				                                	@endforeach
				                                </span>
				                            @endif
										</div>
									</div>
									<div class="col-md-4 mt-4">
										<div class="form-group">
											<button type="button" class="btn btn-block bg-blue-400" data-toggle="modal" data-target="#modal_formato"><i class="icon-search4"></i> <span>Ver Formato</span></button>
										</div>
									</div>
								</div>
								
		                       	<div class="form-group text-right">
		                       		<div class="col-md-12">
			                        	<button type="submit" class="btn btn-primary text-left">Subir Formato</button>
			                        </div>
								</div>
							</form>
						</div>
					</div>
				@else
					<div class="alert bg-success text-white alert-styled-left alert-dismissible ml-3 mr-3">
						<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
						<span class="font-weight-semibold">Bien!</span> EL PROYECTO YA TIENE EL <strong>CALENDARIO DE UTILIZACIÓN DE RECURSOS</strong>
				    </div>
				@endif
				
			</div>
			<!-- /profile info -->

    	</div>
    	<div class="tab-pane fade" id="cur">
			<!-- Profile info -->
			<div class="card">
				<div class="card-header bg-transparent header-elements-inline">
					<h6 class="card-title">Lista de Recursos</h6>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
	                		<a class="list-icons-item" data-action="reload"></a>
	                		<a class="list-icons-item" data-action="remove"></a>
	                	</div>
                	</div>
				</div>
				@if(!empty($proyecto->Curs->first()->CurDetalles))
					<table class="table tasks-list table-lg">
						<thead>
							<tr>
								<th>Cod.</th>
								<th>Period</th>
				                <th>Insumo</th>
				                <th>Unidad</th>
				                <th>Cantidad</th>
				                <th>Precio</th>
				                <th>Parcial</th>
				            </tr>
						</thead>
						<tbody>
							@foreach($proyecto->Curs->first()->CurDetalles as $CurDetalle)
								@if($CurDetalle->curd_idpadre!=1)
									<tr>
										<td>{{$CurDetalle->RecursoUnidadMedida->Recurso->rec_cod}}</td>
										<td>{{$CurDetalle->CurdPadre->RecursoUnidadMedida->Recurso->rec_nom}}</td>
						                <td>
						                	<div class="font-weight-semibold">{{$CurDetalle->RecursoUnidadMedida->Recurso->rec_nom}}</div>
						                </td>
						                <td>
						                	<div class="font-weight-semibold">{{$CurDetalle->RecursoUnidadMedida->UnidadMedida->um_abr}}</div>
					                	</td>
						                <td>
						                	<div class="font-weight-semibold">S/. {{$CurDetalle->curd_cant}}</div>
					                	</td>
						                <td>
						                	<div class="font-weight-semibold">S/. {{$CurDetalle->curd_prec}}</div>
						                </td>
						                <td>
						                	<div class="font-weight-semibold">S/. {{round(($CurDetalle->curd_cant * $CurDetalle->curd_prec),2)}}</div>
						                </td>
						            </tr>
								@endif
							@endforeach
						</tbody>
					</table>
				@else
					<div class="card-body">
						<div class="alert alert-danger alert-dismissible">
							El proyecto no tiene la lista de recursos o el calendario de recursos cargado
					    </div>
					</div>
				@endif
				
			</div>
			<!-- /profile info -->

    	</div>
	</div>
	<!-- /left content -->


	<!-- Right sidebar component -->
	<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-lg-2 sidebar-expand-md">

		<!-- Sidebar content -->
		<div class="sidebar-content">

			<!-- Navigation -->
			<div class="card">
				<div class="card-header bg-transparent header-elements-inline">
					<span class="card-title font-weight-semibold">Navigation</span>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
                		</div>
            		</div>
				</div>

				<div class="card-body p-0">
					<ul class="nav nav-sidebar my-2">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="icon-user"></i>
								 My profile
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="icon-cash3"></i>
								Balance
								<span class="text-muted font-size-sm font-weight-normal ml-auto">$1,430</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="icon-tree7"></i>
								Connections
								<span class="badge bg-danger badge-pill ml-auto">29</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="icon-users"></i>
								Friends
							</a>
						</li>

						<li class="nav-item-divider"></li>

						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="icon-calendar3"></i>
								Events
								<span class="badge bg-teal-400 badge-pill ml-auto">48</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="icon-cog3"></i>
								Account settings
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- /navigation -->


			<!-- Share your thoughts -->
			<div class="card">
				<div class="card-header bg-transparent header-elements-inline">
					<span class="card-title font-weight-semibold">Share your thoughts</span>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
                		</div>
            		</div>
				</div>

				<div class="card-body">
					<form action="#">
                    	<textarea name="enter-message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."></textarea>

                    	<div class="d-flex align-items-center">
                    		<div class="list-icons list-icons-extended">
                                <a href="#" class="list-icons-item" data-popup="tooltip" title="Add photo" data-container="body"><i class="icon-images2"></i></a>
                            	<a href="#" class="list-icons-item" data-popup="tooltip" title="Add video" data-container="body"><i class="icon-film2"></i></a>
                                <a href="#" class="list-icons-item" data-popup="tooltip" title="Add event" data-container="body"><i class="icon-calendar2"></i></a>
                    		</div>

                    		<button type="button" class="btn bg-blue btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Share</button>
                    	</div>
					</form>
				</div>
			</div>
			<!-- /share your thoughts -->


			<!-- Balance changes -->
			<div class="card">
				<div class="card-header bg-transparent header-elements-inline">
					<span class="card-title font-weight-semibold">Balance changes</span>
					<div class="header-elements">
						<span><i class="icon-arrow-down22 text-danger"></i> <span class="font-weight-semibold">- 29.4%</span></span>
            		</div>
				</div>

				<div class="card-body">
					<div class="chart-container">
						<div class="chart has-fixed-height" id="balance_statistics"></div>
					</div>
				</div>
			</div>
			<!-- /balance changes -->


			<!-- Latest connections -->
			<div class="card">
				<div class="card-header bg-transparent header-elements-inline">
					<span class="card-title font-weight-semibold">Latest connections</span>
					<div class="header-elements">
						<span class="badge bg-success badge-pill">+32</span>
            		</div>
				</div>

				<ul class="media-list media-list-linked my-2">
					<li class="media font-weight-semibold border-0 py-2">Office staff</li>

					<li>
						<a href="#" class="media">
							<div class="mr-3">
								<img src="../../../../global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="40" height="40" alt="">
							</div>
							<div class="media-body">
								<div class="media-title font-weight-semibold">James Alexander</div>
								<span class="text-muted font-size-sm">UI/UX expert</span>
							</div>
							<div class="align-self-center ml-3">
								<span class="badge badge-mark bg-success border-success"></span>
							</div>
						</a>
					</li>

					<li>
						<a href="#" class="media">
							<div class="mr-3">
								<img src="../../../../global_assets/images/demo/users/face2.jpg" class="rounded-circle" width="40" height="40" alt="">
							</div>
							<div class="media-body">
								<div class="media-title font-weight-semibold">Jeremy Victorino</div>
								<span class="text-muted font-size-sm">Senior designer</span>
							</div>
							<div class="align-self-center ml-3">
								<span class="badge badge-mark bg-danger border-danger"></span>
							</div>
						</a>
					</li>

					<li>
						<a href="#" class="media">
							<div class="mr-3">
								<img src="../../../../global_assets/images/demo/users/face6.jpg" class="rounded-circle" width="40" height="40" alt="">
							</div>
							<div class="media-body">
								<div class="media-title"><span class="font-weight-semibold">Jordana Mills</span></div>
								<span class="text-muted">Sales consultant</span>
							</div>
							<div class="align-self-center ml-3">
								<span class="badge badge-mark bg-grey-300 border-grey-300"></span>
							</div>
						</a>
					</li>

					<li>
						<a href="#" class="media">
							<div class="mr-3">
								<img src="../../../../global_assets/images/demo/users/face9.jpg" class="rounded-circle" width="40" height="40" alt="">
							</div>
							<div class="media-body">
								<div class="media-title"><span class="font-weight-semibold">William Miles</span></div>
								<span class="text-muted">SEO expert</span>
							</div>
							<div class="align-self-center ml-3">
								<span class="badge badge-mark bg-success border-success"></span>
							</div>
						</a>
					</li>

					<li class="media font-weight-semibold border-0 py-2">Partners</li>

					<li>
						<a href="#" class="media">
							<div class="mr-3">
								<img src="../../../../global_assets/images/demo/users/face3.jpg" class="rounded-circle" width="40" height="40" alt="">
							</div>
							<div class="media-body">
								<div class="media-title font-weight-semibold">Margo Baker</div>
								<span class="text-muted font-size-sm">Google</span>
							</div>
							<div class="align-self-center ml-3">
								<span class="badge badge-mark bg-success border-success"></span>
							</div>
						</a>
					</li>

					<li>
						<a href="#" class="media">
							<div class="mr-3">
								<img src="../../../../global_assets/images/demo/users/face4.jpg" class="rounded-circle" width="40" height="40" alt="">
							</div>
							<div class="media-body">
								<div class="media-title font-weight-semibold">Beatrix Diaz</div>
								<span class="text-muted font-size-sm">Facebook</span>
							</div>
							<div class="align-self-center ml-3">
								<span class="badge badge-mark bg-warning-400 border-warning-400"></span>
							</div>
						</a>
					</li>

					<li>
						<a href="#" class="media">
							<div class="mr-3">
								<img src="../../../../global_assets/images/demo/users/face5.jpg" class="rounded-circle" width="40" height="40" alt="">
							</div>
							<div class="media-body">
								<div class="media-title font-weight-semibold">Richard Vango</div>
								<span class="text-muted font-size-sm">Microsoft</span>
							</div>
							<div class="align-self-center ml-3">
								<span class="badge badge-mark bg-grey-300 border-grey-300"></span>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<!-- /latest connections -->

		</div>
		<!-- /sidebar content -->

	</div>
	<!-- /right sidebar component -->

</div>
<!-- /inner container -->
</div>
@endsection