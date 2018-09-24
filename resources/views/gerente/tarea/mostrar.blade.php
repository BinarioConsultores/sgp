@extends('plantillas.paginaenblanco')
@section('content')
<div class="mb-3">
	<div class="page-header page-header-dark has-cover">
		<div class="page-header-content header-elements-inline">
			<div class="page-title">
				<h5>
					<i class="icon-arrow-left52 mr-2"></i>
					<span class="font-weight-semibold">Tareas Activas</span>
					<small class="d-block opacity-75">Sistema de Gestion de Proyectos</small>
				</h5>
			</div>

			<div class="header-elements d-flex align-items-center">
                <a class="btn bg-blue btn-labeled btn-labeled-left" href="/gerente/tarea/crear"><b><i class="icon-folder-plus2"></i></b> Crear Tarea</a>
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
	<div class="col-12">
		@if(Session::has('creada'))
		    <div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
				{{Session::get('creada')}}
		    </div>
		@endif
	</div>
</div>

<div class="content">
   <div class="card">
		<div class="card-header header-elements-inline">
            <h5 class="card-title">Tarea 1</h5>
			<div class="header-elements">
				<div class="list-icons">
            		<a class="list-icons-item" data-action="collapse"></a>
            		<a class="list-icons-item" data-action="reload"></a>
            		<a class="list-icons-item" data-action="remove"></a>
            	</div>
        	</div>
		</div>

        <div class="card-body">
        	<div class="row">
        		<div class="col-md-4">
					<div class="form-group">
						<label>Nombre: </label>
                    	<input type="text" class="form-control" name="tar_nom" >
					</div>

					<div class="form-group">
						<label>Descripcion:</label>
                    	<input type="text" class="form-control format-phone-number" name="tar_descripcion" >
					</div>

        		</div>

        		<div class="col-md-4">
					<div class="form-group">
						<label>Fecha Inicio:</label>
                    	<input type="date" class="form-control" name="format-international-phone" name="tar_fechin" >
					</div>
                    
					<div class="form-group">
						<label>Fecha Final:</label>
                    	<input type="date" class="form-control" name="format-tax-id" name="tar_fechfin">
					</div>
                    
					
        		</div>

        		<div class="col-md-4">
					<div class="form-group">
						<label>Prioridad:</label>
                    	<input type="text" class="form-control" name="format-product-key" name="tar_prio">
					</div>
                    
					<div class="form-group">
						<label>Estado:</label>
                    	<input type="text" class="form-control" name="format-order-number" name="tar_est">
					</div>
        		</div>
        	</div>	
        </div>
    </div>
	<div class="card">
		<div class="card-header header-elements-inline">
            <h5 class="card-title">Tarea 2</h5>
			<div class="header-elements">
				<div class="list-icons">
            		<a class="list-icons-item" data-action="collapse"></a>
            		<a class="list-icons-item" data-action="reload"></a>
            		<a class="list-icons-item" data-action="remove"></a>
            	</div>
        	</div>
		</div>

        <div class="card-body">
        	<div class="row">
        		<div class="col-md-4">
					<div class="form-group">
						<label>Nombre:</label>
                    	<input type="text" class="form-control" name="tar_nom" >
					</div>

					<div class="form-group">
						<label>Descripcion: </label>
                    	<input type="text" class="form-control format-phone-number" name="tar_descripcion">
					</div>

        		</div>

        		<div class="col-md-4">
					<div class="form-group">
						<label>Fecha Inicio: </label>
                    	<input type="text" class="form-control" nname="tar_fechin">
					</div>
                    
					<div class="form-group">
						<label>Fecha Final: </label>
                    	<input type="text" class="form-control" name="tar_fechfin">
					</div>
                    	
        		</div>

        		<div class="col-md-4">
					<div class="form-group">
						<label>Prioridad: </label>
                    	<input type="text" class="form-control" name="tar_prio" >
					</div>
                    
					<div class="form-group">
						<label>Estado: </label>
                    	<input type="text" class="form-control" name="tar_est">
					</div>
        		</div>
        	</div>	
        </div>
	</div>
</div>
@endsection