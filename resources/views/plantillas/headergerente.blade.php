<!DOCTYPE html>
<html lang="en">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistema de Gestión de Proyectos</title>

	<!-- Global stylesheets -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	@yield('css')
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>

	<script src="{{asset('assets/js/app.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/selects/select2.full.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/content_page_header.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/datatables_basic.js')}}"></script>

	<script src="{{asset('global_assets/js/sgp/zelect.js')}}"></script>

	<!-- /theme JS files -->
	@yield('javascript')
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-xl navbar-dark bg-dark navbar-component mb-0">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="../../../../global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-xl-none">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-nav-lists">
				<i class="icon-menu"></i>
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-nav-lists">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Menú</a>

					<div class="dropdown-menu">
						<a href="{{url('gerente/proyectos')}}" class="dropdown-item rounded"> <i class="icon-folder"></i>Ver Proyectos</a>
						<div class="dropdown-submenu">
							<a href="#" class="dropdown-item dropdown-toggle"><i class="icon-firefox"></i> Has child</a>
							<div class="dropdown-menu">
								<a href="#" class="dropdown-item"><i class="icon-android"></i> Third level</a>
								<div class="dropdown-submenu">
									<a href="#" class="dropdown-item dropdown-toggle"><i class="icon-apple2"></i> Has child</a>
									<div class="dropdown-menu">
										<a href="#" class="dropdown-item"><i class="icon-html5"></i> Fourth level</a>
										<a href="#" class="dropdown-item"><i class="icon-css3"></i> Fourth level</a>
									</div>
								</div>
								<a href="#" class="dropdown-item"><i class="icon-windows"></i> Third level</a>
							</div>
						</div>
						<a href="#" class="dropdown-item"><i class="icon-chrome"></i> Second level</a>
					</div>
				</li>
			</ul>
			
			<ul class="navbar-nav ml-xl-auto">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="{{asset('global_assets/images/demo/users/face11.jpg')}}" class="rounded-circle" alt="">
						<span>{{Auth::user()->name}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-switch2"></i>Cerrar Sesión</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			
			@yield('content')
			
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2018 <a href="https://www.binarioconsultores.com" target="_blank">Binario Consultores</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

@yield('javascriptfinal')
</html>