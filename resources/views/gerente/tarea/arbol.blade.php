@extends('plantillas.headeradmin')	

@section('content')

<div class="mb-0">
	<div class="page-header page-header-dark has-cover">
		<div class="page-header-content header-elements-inline">
			<div class="page-title">
				<h5>
					<i class="icon-arrow-left52 mr-2"></i>
					<span class="font-weight-semibold">Proyecto:</span>
					<small class="d-block opacity-75">Sistema de Gestion de Proyectos</small>
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

			
		</div>
	</div>
</div>
<div class="row">
	<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-secondary-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Secondary sidebar</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Sidebar search -->
				<div class="card">
					<div class="card-header bg-transparent header-elements-inline">
						<span class="text-uppercase font-size-sm font-weight-semibold">Sidebar search</span>
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
				<!-- /sidebar search -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Mantenimientos</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="/mantenimientos/clientes" class="nav-link active">
								<i class="icon-home4"></i>
								<span>
									Nombre del Proyecto
								</span>
							</a>
						</li>
						
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-tree5"></i> <span>Tarea 1</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Menu levels">
								<li class="nav-item"><a href="#" class="nav-link"><i class="icon-IE"></i>Segundo nivel</a></li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link"><i class="icon-firefox"></i>Segundo nivel con hijo</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="#" class="nav-link"><i class="icon-android"></i> Tercer nivel</a></li>
										<li class="nav-item nav-item-submenu">
											<a href="#" class="nav-link"><i class="icon-apple2"></i> Tercer nivel con hijo</a>
											<ul class="nav nav-group-sub">
												<li class="nav-item"><a href="#" class="nav-link"><i class="icon-html5"></i> Cuarto nivel</a></li>
											</ul>
										</li>
										<li class="nav-item"><a href="#" class="nav-link"><i class="icon-windows"></i> Tercer nivel</a></li>
									</ul>
								</li>
								<li class="nav-item"><a href="#" class="nav-link"><i class="icon-chrome"></i> Segundo nivel</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-tree5"></i> <span>Tarea 2</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Menu levels">
								<li class="nav-item"><a href="#" class="nav-link"><i class="icon-IE"></i>Segundo nivel</a></li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link"><i class="icon-firefox"></i>Segundo nivel con hijo</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="#" class="nav-link"><i class="icon-android"></i> Tercer nivel</a></li>
										<li class="nav-item nav-item-submenu">
											<a href="#" class="nav-link"><i class="icon-apple2"></i> Tercer nivel con hijo</a>
											<ul class="nav nav-group-sub">
												<li class="nav-item"><a href="#" class="nav-link"><i class="icon-html5"></i> Cuarto nivel</a></li>
											</ul>
										</li>
										<li class="nav-item"><a href="#" class="nav-link"><i class="icon-windows"></i> Tercer nivel</a></li>
									</ul>
								</li>
								<li class="nav-item"><a href="#" class="nav-link"><i class="icon-chrome"></i> Segundo nivel</a></li>
							</ul>
							<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-tree5"></i> <span>Tarea 3</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Menu levels">
								<li class="nav-item"><a href="#" class="nav-link"><i class="icon-IE"></i>Segundo nivel</a></li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link"><i class="icon-firefox"></i>Segundo nivel con hijo</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="#" class="nav-link"><i class="icon-android"></i> Tercer nivel</a></li>
										<li class="nav-item nav-item-submenu">
											<a href="#" class="nav-link"><i class="icon-apple2"></i> Tercer nivel con hijo</a>
											<ul class="nav nav-group-sub">
												<li class="nav-item"><a href="#" class="nav-link"><i class="icon-html5"></i> Cuarto nivel</a></li>
											</ul>
										</li>
										<li class="nav-item"><a href="#" class="nav-link"><i class="icon-windows"></i> Tercer nivel</a></li>
									</ul>
								</li>
								<li class="nav-item"><a href="#" class="nav-link"><i class="icon-chrome"></i> Segundo nivel</a></li>
							</ul>
						</li>
						</li>
						<li class="nav-item">
							<a href="/admin/usuario" class="nav-link">
								<i class="icon-portfolio"></i>
								<span>
									Usuarios
								</span>
							</a>
						</li>

					</ul>
				</div>

				<!-- Actions -->
				<div class="card">
					<div class="card-header bg-transparent header-elements-inline">
						<span class="text-uppercase font-size-sm font-weight-semibold">Actions</span>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
	                		</div>
                		</div>
					</div>

					<div class="card-body">
						<div class="row row-tile no-gutters">
							<div class="col-6">
								<button type="button" class="btn btn-light btn-block btn-float m-0">
									<i class="icon-github4 icon-2x"></i>
									<span>Github</span>
								</button>

								<button type="button" class="btn btn-light btn-block btn-float m-0">
									<i class="icon-dropbox text-blue-400 icon-2x"></i>
									<span>Dropbox</span>
								</button>
							</div>
							
							<div class="col-6">
								<button type="button" class="btn btn-light btn-block btn-float m-0">
									<i class="icon-dribbble3 text-pink-400 icon-2x"></i>
									<span>Dribbble</span>
								</button>

								<button type="button" class="btn btn-light btn-block btn-float m-0">
									<i class="icon-google-drive text-success-400 icon-2x"></i>
									<span>Google Drive</span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /actions -->


				<!-- Sub navigation -->
				<div class="card mb-0">
					<div class="card-header bg-transparent header-elements-inline">
						<span class="text-uppercase font-size-sm font-weight-semibold">Navigation</span>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
	                		</div>
                		</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item-header">Navigate</li>
							<li class="nav-item">
								<a href="#" class="nav-link"><i class="icon-files-empty"></i> All tasks</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-file-plus"></i>
									Active tasks
									<span class="badge bg-dark badge-pill ml-auto">28</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link"><i class="icon-file-check"></i> Closed tasks</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-reading"></i>
									Assigned to me
									<span class="badge bg-info badge-pill ml-auto">86</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-make-group"></i>
									Assigned to my team
									<span class="badge bg-danger badge-pill ml-auto">47</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link"><i class="icon-cog3"></i> Settings</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /sidebar content -->
	</div>
   <div class="col-md-8 col-centered">
		<div class="content card">

			
			<div class="card">
				<div class="card-header bg-transparent header-elements-inline">
					<span class="text-uppercase font-size-sm font-weight-semibold">Navigation</span>
					<div class="header-elements">
						<div class="list-icons">
		            		<a class="list-icons-item" data-action="collapse"></a>
		        		</div>
		    		</div>
				</div>

				<div class="card-body p-0" style="">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<li class="nav-item-header">Category title</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="icon-googleplus5"></i> Link</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="icon-portfolio"></i> Another link</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="icon-user-plus"></i>
								Link with badge
								<span class="badge bg-primary badge-pill ml-auto">2</span>
							</a>
						</li>
						<li class="nav-item-divider"></li>
						<li class="nav-item nav-item-submenu nav-item-open">
							<a href="#" class="nav-link"><i class="icon-cog3"></i> Menu levels</a>
							<ul class="nav nav-group-sub" style="display: block;">
								<li class="nav-item"><a href="#" class="nav-link">Second level</a></li>
								<li class="nav-item nav-item-submenu nav-item-open">
									<a href="#" class="nav-link">Second level with child</a>
									<ul class="nav nav-group-sub" style="display: block;">
										<li class="nav-item"><a href="#" class="nav-link">Third level</a></li>
										<li class="nav-item nav-item-submenu nav-item-open">
											<a href="#" class="nav-link">Third level with child</a>
											<ul class="nav nav-group-sub" style="display: block;">
												<li class="nav-item"><a href="#" class="nav-link">Fourth level</a></li>
												<li class="nav-item"><a href="#" class="nav-link">Fourth level</a></li>
											</ul>
										</li>
										<li class="nav-item"><a href="#" class="nav-link">Third level</a></li>
									</ul>
								</li>
								<li class="nav-item"><a href="#" class="nav-link">Second level</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


