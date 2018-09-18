@extends('plantillas.headeradmin')

@section('javascript')


<script src="{{asset('global_assets/js/plugins/cliente/datatable_cliente.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>


@endsection

@section('content')
            <div class="mb-12">
                <div class="page-header page-header-light border-bottom-2 border-bottom-teal" style="border-top: 1px solid #ddd; border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h5>
                                <i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Page</span> - Header
                                <small class="d-block text-muted">Large <code>bottom</code> border with custom color</small>
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
                                    <i class="icon-menu7"></i>
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
    <div class="doc data-table-doc page-layout simple full-width">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Todos los Proveedor</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearModal" data-whatever="@getbootstrap">Crear Proveedor
                </button>

        </div>
         
        <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/proveedor/crear">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Nombre del Proveedor:</label>
                                <input type="text" class="form-control" id="recipient-name"  name="prov_nom"/>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">RUC del Proveedor:</label>
                                <input type="text" class="form-control" id="recipient-name"  name="prov_ruc"/>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Crear</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

       

        @if (Session::has('creado'))
            <div class="alert alert-success" role="alert">
                {{Session::get('creado')}}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif

       


        <div class="page-content p-6">
            <div class="content container">
                <div class="card col-md-8 col-mr-4">
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
                                                        Ruc
                                                    </th>
                                                    <th>
                                                        Acciones
                                                    </th>

                                                </tr>
                                            </thead>
                                            @if(sizeof($proveedores)>0)
                                            <tbody>                  
                                                @foreach ($proveedores as $prove)
                                                    <tr>
                                                        <td>{{$prove->prov_id}}</td>
                                                        <td>{{$prove->prov_nom}}</td>
                                                        <td>{{$prove->prov_ruc}}</td>
                                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#editarModal"  cli_id="{{$prove->prove}}" onclick="setModal(this)"><i class="icon-lead-pencil" data-toggle="tooltip" data-placement="top" data-original-title="Editar">Editar</i>
                                                        </button>
                                                        
                                                        <a href="/admin/proveedor/eliminar?prov_id={{$prove->prov_id}}" class="btn btn-danger btn-fab fuse-ripple-ready" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">Eliminar<i class="icon-delete"></i></a>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <div class="alert alert-danger" role="alert">
                                                    No tienes Proveedores creados
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