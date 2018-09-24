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
		<div class="col-12">
			@if(!empty($errors->first()))
			    <div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
					<span class="font-weight-semibold">¡Oh No!</span>  {{ $errors->first() }}
			    </div>
			@endif
		</div>
	</div>

    <div class="row">
    	<div class="col-md-8 col-centered">
            <form action="/gerente/archivotarea/crear" method="POST">
            	{{ csrf_field() }}
            	<div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Subir Archivo de Tarea</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">

									<div class="form-group">
										<label>Nombre de archivo:</label>
										<input type="text" class="form-control" placeholder="Nombre del archivo" name="archita_nom">
									</div>

									<div class="form-group">
										<label>Tamaño:</label>
										<input type="text" class="form-control" placeholder="Tamaño" name="archita_peso">
									</div>

									<div class="form-group form-group-float">
										<label>Tipo de archivo:</label>
										<label class="form-group-float-label animate">Seleccione el tipo de archivo</label>
										<select class="form-control" name="usu_tip">
											<option value="Excel" selected="">Excel</option>
											<option value="Imagen">Imagen</option>
											<option value="Documento">Documento</option>
										</select>
									</div>

									<div class="form-group">
										<label>URL:</label>
										<input type="password" class="form-control" placeholder="direccion del archivo" name="archita_dir">
									</div>

									

									<div class="d-flex justify-content-between align-items-center">
										<button type="submit" class="btn btn-light">Cancel</button>
										<button type="submit" class="btn bg-blue">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>  
            </form>
            

		</div>
    </div>
</div>
@endsection