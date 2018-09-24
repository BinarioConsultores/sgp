@extends('plantillas.headergerente')

@section('content')

<div class="mb-3">
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
                <a class="btn bg-blue btn-labeled btn-labeled-left" href="/gerente/archivotarea/crear																				"><b><i class="icon-task"></i></b> Subir Archivo</a>
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
    AQUI SE MOSTRARÁ LA LISTA DE PROYECTOS
</div>
@endsection