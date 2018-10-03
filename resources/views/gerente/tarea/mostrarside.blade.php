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
			<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Unordered list markup</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>
							
							<div class="card-body">
								<p class="mb-3">Current example demonstrates multi level file tree with default options, initialized from an <code>&lt;ul&gt;</code> element.</p>

								<div class="tree-default card card-body border-left-info border-left-2">
									<ul class="d-none mb-0 ui-fancytree-source fancytree-helper-hidden">
										<li class="folder expanded">Expanded folder with children
											<ul>
												<li class="expanded">Expanded sub-item
													<ul>
														<li class="active focused">Active sub-item (active and focus on init)</li>
														<li>Basic <i>menu item</i> with <strong class="font-weight-semibold">HTML support</strong></li>
													</ul>
												</li>
												<li>Collapsed sub-item
													<ul>
														<li>Sub-item 2.2.1</li>
														<li>Sub-item 2.2.2</li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="has-tooltip" title="Look, a tool tip!">Menu item with key and tooltip</li>
										<li class="folder">Collapsed folder
											<ul>
												<li>Sub-item 1.1</li>
												<li>Sub-item 1.2</li>
											</ul>
										</li>
										<li class="selected">This is a selected item</li>
										<li class="expanded">Document with some children (expanded on init)
											<ul>
												<li>Document sub-item</li>
												<li>Another document sub-item
													<ul>
														<li>Sub-item 2.1.1</li>
														<li>Sub-item 2.1.2</li>
													</ul>
												</li>
											</ul>
										</li>	
									</ul>
								<ul class="ui-fancytree fancytree-container fancytree-plain" tabindex="0" role="tree" aria-multiselectable="true" aria-activedescendant="ui-id-3"><li role="treeitem" aria-expanded="true" aria-selected="false" id="ui-id-3"><span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef"><span role="button" class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Expanded folder with children</span></span><ul role="group"><li role="treeitem" aria-expanded="true" aria-selected="false"><span class="fancytree-node fancytree-expanded fancytree-has-children fancytree-exp-e fancytree-ico-e"><span role="button" class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Expanded sub-item</span></span><ul role="group"><li role="treeitem" aria-selected="false"><span class="fancytree-node fancytree-active focused fancytree-exp-n fancytree-ico-c"><span class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Active sub-item (active and focus on init)</span></span></li><li role="treeitem" aria-selected="false" class="fancytree-lastsib"><span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c"><span class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Basic <i>menu item</i> with <strong class="font-weight-semibold">HTML support</strong></span></span></li></ul></li><li role="treeitem" aria-expanded="false" aria-selected="false" class="fancytree-lastsib"><span class="fancytree-node fancytree-has-children fancytree-lastsib fancytree-exp-cl fancytree-ico-c"><span role="button" class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Collapsed sub-item</span></span></li></ul></li><li role="treeitem" aria-selected="false"><span class="fancytree-node has-tooltip fancytree-exp-n fancytree-ico-c"><span class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title" title="" data-original-title="Look, a tool tip!">Menu item with key and tooltip</span></span></li><li role="treeitem" aria-expanded="false" aria-selected="false"><span class="fancytree-node fancytree-folder fancytree-has-children fancytree-exp-c fancytree-ico-cf"><span role="button" class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Collapsed folder</span></span></li><li role="treeitem" aria-selected="true"><span class="fancytree-node fancytree-selected fancytree-exp-n fancytree-ico-c"><span class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">This is a selected item</span></span></li><li role="treeitem" aria-expanded="true" aria-selected="false" class="fancytree-lastsib"><span class="fancytree-node fancytree-expanded fancytree-has-children fancytree-lastsib fancytree-exp-el fancytree-ico-e"><span role="button" class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Document with some children (expanded on init)</span></span><ul role="group"><li role="treeitem" aria-selected="false"><span class="fancytree-node fancytree-exp-n fancytree-ico-c"><span class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Document sub-item</span></span></li><li role="treeitem" aria-expanded="false" aria-selected="false" class="fancytree-lastsib"><span class="fancytree-node fancytree-has-children fancytree-lastsib fancytree-exp-cl fancytree-ico-c"><span role="button" class="fancytree-expander"></span><span role="presentation" class="fancytree-icon"></span><span class="fancytree-title">Another document sub-item</span></span></li></ul></li></ul></div>
							</div>
						</div>
		</div>
		

	</div>
</div>
@endsection