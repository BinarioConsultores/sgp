@extends('plantillas.headeradmin')

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
                <a class="btn bg-blue btn-labeled btn-labeled-left" href="/admin/usuario/crear"><b><i class="icon-user-plus"></i></b> Crear Usuario</a>
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

<div class="row">
	<div class="col-12">
		@if(Session::has('creado'))
		    <div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
				{{Session::get('creado')}}
		    </div>
		@endif

		@if(Session::has('eliminado'))
		    <div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
				{{Session::get('eliminado')}}
		    </div>
		@endif
	</div>
</div>
<script src="{{asset('global_assets/js/plugins/cliente/datatable_cliente.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
     
        @if (Session::has('editado'))
            <div class="alert alert-success" role="alert">
                {{Session::get('editado')}}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif
        
        <div class="content">
            <div class="row">  
                <div class="col-md-9 col-centered">
                    <div class="card">
                        <div class="content container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="example ">
                                        <div class="source-preview-wrapper">
                                            <div class="preview">
                                                <div class="preview-elements">
                                                    <table class="table datatable-basic">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Id
                                                                </th>
                                                                <th>
                                                                    Nombre
                                                                </th>
                                                                <th>
                                                                    Tipo
                                                                </th>
                                                                <th>
                                                                	Email
                                                                </th>
                                                                <th>
                                                                	Contrasenia
                                                                </th>
                                                                <th>
                                                                	Persona Id
                                                                </th>
                                                                <th>
                                                                	Actions
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        @if(sizeof($usuarios)>0)
                                                        <tbody>                  
                                                            @foreach ($usuarios as $usua)
                                                                <tr>
                                                                    <td>{{$usua->usu_id}}</td>
                                                                    <td>{{$usua->usu_nom}}</td>
                                                                    <td>{{$usua->usu_tip}}</td>
                                                                    <td>{{$usua->usu_email}}</td>
                                                                    <td>{{$usua->usu_pass}}</td>
                                                                    <td>{{$usua->per_id}}</td>
                                                                    <td><a href="/admin/usuario/eliminar?usu_id={{$usua->usu_id}}" class="btn btn-danger btn-fab fuse-ripple-ready" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="icon-user-cancel"></i></a>  
                                                                    </td>
                                                               </tr>
                                                            @endforeach
                                                        @else
                                                            <div class="alert alert-danger" role="alert">
                                                                No tienes suarios creados
                                                            </div>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                	</div>
                </div>   
            </div>
        </div> 
@endsection