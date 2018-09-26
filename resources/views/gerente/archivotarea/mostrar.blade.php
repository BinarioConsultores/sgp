@extends('plantillas.headergerente')

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

								<!-- Sidebar content -->
				<div class="sidebar-content">

					<!-- Sidebar search -->
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
					<!-- /sidebar search -->
					<!-- Actions -->
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
						<!-- /actions -->


						<!-- Sub navigation -->
							<div class="card mb-2">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Nombre del proyecto</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="dropdown">
									<div class="card-body p-0">
										<ul class="nav nav-sidebar" data-nav-type="accordion">
											<li class="nav-item-header">Tareas</li>

											

												<li class="nav-item nav-item-submenu">
													<a href="" class="nav-link text-default dropdown-toggle caret-0" data-toggle="dropdown" id="tar_id" name="tar_id">
														@foreach($tarea as $tare)
														<i class="icon-portfolio" value="{{$tare->tar_id}}"></i> {{$tare->tar_nom}}
														@endforeach
													</a>

													<div class="dropdown-menu dropdown-menu-right">
														<a href="/gerente/tarea/crear" class="dropdown-item"><i class="icon-file-plus"></i> Agregar Tarea
														</a>
													</div>
										
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
											

											<li class="nav-item nav-item-submenu">
												<a href="#" class="nav-link"><i class="icon-portfolio"></i> Tarea 2</a>
											</li>

											<li class="nav-item nav-item-submenu">
												<a href="#" class="nav-link"><i class="icon-portfolio"></i> Tarea 3</a>
											</li>
											<li class="nav-item nav-item-submenu">
												<a href="#" class="nav-link"><i class="icon-portfolio"></i> Tarea 4</a>
											</li>
											<li class="nav-item nav-item-submenu">
												<a href="#" class="nav-link"><i class="icon-portfolio"></i> Tarea 5</a>
											</li>
											<li class="nav-item nav-item-submenu">
												<a href="#" class="nav-link"><i class="icon-portfolio"></i> Tarea 6</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link">
													<i class="icon-user-plus"></i>
													Assign users
													<span class="badge bg-primary badge-pill ml-auto">94 online</span>
												</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link"><i class="icon-collaboration"></i> Create team</a>
											</li>
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
							<!-- /sub navigation -->


							<!-- Online users -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Online users</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									<ul class="media-list">
										<li class="media">
											<a href="#" class="mr-3">
												<img src="../../../../global_assets/images/demo/users/face1.jpg" width="36" height="36" class="rounded-circle" alt="">
											</a>
											<div class="media-body">
												<a href="#" class="media-title font-weight-semibold">James Alexander</a>
												<span class="font-size-xs text-muted d-block">Santa Ana, CA.</span>
											</div>
											<div class="ml-3 align-self-center">
												<span class="badge badge-mark border-success"></span>
											</div>
										</li>

										<li class="media">
											<a href="#" class="mr-3">
												<img src="../../../../global_assets/images/demo/users/face2.jpg" width="36" height="36" class="rounded-circle" alt="">
											</a>
											<div class="media-body">
												<a href="#" class="media-title font-weight-semibold">Jeremy Victorino</a>
												<span class="font-size-xs text-muted d-block">Dowagiac, MI.</span>
											</div>
											<div class="ml-3 align-self-center">
												<span class="badge badge-mark border-danger"></span>
											</div>
										</li>

										<li class="media">
											<a href="#" class="mr-3">
												<img src="../../../../global_assets/images/demo/users/face3.jpg" width="36" height="36" class="rounded-circle" alt="">
											</a>
											<div class="media-body">
												<a href="#" class="media-title font-weight-semibold">Margo Baker</a>
												<span class="font-size-xs text-muted d-block">Kasaan, AK.</span>
											</div>
											<div class="ml-3 align-self-center">
												<span class="badge badge-mark border-success"></span>
											</div>
										</li>

										<li class="media">
											<a href="#" class="mr-3">
												<img src="../../../../global_assets/images/demo/users/face4.jpg" width="36" height="36" class="rounded-circle" alt="">
											</a>
											<div class="media-body">
												<a href="#" class="media-title font-weight-semibold">Beatrix Diaz</a>
												<span class="font-size-xs text-muted d-block">Neenah, WI.</span>
											</div>
											<div class="ml-3 align-self-center">
												<span class="badge badge-mark border-warning"></span>
											</div>
										</li>

										<li class="media">
											<a href="#" class="mr-3">
												<img src="../../../../global_assets/images/demo/users/face5.jpg" width="36" height="36" class="rounded-circle" alt="">
											</a>
											<div class="media-body">
												<a href="#" class="media-title font-weight-semibold">Richard Vango</a>
												<span class="font-size-xs text-muted d-block">Grapevine, TX.</span>
											</div>
											<div class="ml-3 align-self-center">
												<span class="badge badge-mark border-grey-400"></span>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- /online-users -->


							<!-- Latest updates -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Latest updates</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									<ul class="media-list">
										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
													<i class="icon-git-pull-request"></i>
												</a>
											</div>

											<div class="media-body">
												Drop the IE <a href="#">specific hacks</a> for temporal inputs
												<div class="text-muted font-size-sm">4 minutes ago</div>
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-warning text-warning rounded-round border-2 btn-icon">
													<i class="icon-git-commit"></i>
												</a>
											</div>
											
											<div class="media-body">
												Add full font overrides for popovers and tooltips
												<div class="text-muted font-size-sm">36 minutes ago</div>
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-info text-info rounded-round border-2 btn-icon">
													<i class="icon-git-branch"></i>
												</a>
											</div>
											
											<div class="media-body">
												<a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch
												<div class="text-muted font-size-sm">2 hours ago</div>
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
													<i class="icon-git-merge"></i>
												</a>
											</div>
											
											<div class="media-body">
												<a href="#">Eugene Kopyov</a> merged <span class="font-weight-semibold">Master</span> and <span class="font-weight-semibold">Dev</span> branches
												<div class="text-muted font-size-sm">Dec 18, 18:36</div>
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
													<i class="icon-git-pull-request"></i>
												</a>
											</div>
											
											<div class="media-body">
												Have Carousel ignore keyboard events
												<div class="text-muted font-size-sm">Dec 12, 05:46</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- /latest updates -->


							<!-- Filter -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Filter</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									<form action="#">
										<div class="form-group">
											<div class="form-check form-check-right">
												<label class="form-check-label">
													<input type="checkbox" class="form-input-styled" checked data-fouc>
													Free People
												</label>	
											</div>

											<div class="form-check form-check-right">
												<label class="form-check-label">
													<input type="checkbox" class="form-input-styled" data-fouc>
													GAP
												</label>
											</div>

											<div class="form-check form-check-right">
												<label class="form-check-label">
													<input type="checkbox" class="form-input-styled" checked data-fouc>
													Lane Bryant
												</label>
											</div>

											<div class="form-check form-check-right">
												<label class="form-check-label">
													<input type="checkbox" class="form-input-styled" checked data-fouc>
													Ralph Lauren
												</label>
											</div>

											<div class="form-check form-check-right">
												<label class="form-check-label">
													<input type="checkbox" class="form-input-styled" data-fouc>
													Liz Claiborne
												</label>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /filter -->


							<!-- Contacts -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Contacts</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									
										<li class="media nav-item">

											<li class="media nav-item nav-item-submenu">

											<a href="#" class="nav-link">
												<i class="icon-portfolio"></i> Tarea 1
											</a>
											<div class="ml-3 align-self-center">
												<div class="dropdown">
													<a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
													</div>
												</div>
											</div>
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
										</li>

										<li class="media">
											<a href="#" class="mr-3 position-relative">
												<img src="../../../../global_assets/images/demo/users/face25.jpg" width="36" height="36" class="rounded-circle" alt="">
												<span class="badge badge-info badge-pill badge-float">9</span>
											</a>

											<div class="media-body align-self-center">
												Walter Sommers
											</div>

											<div class="ml-3 align-self-center">
												<div class="dropdown">
													<a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
														<a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
														<a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
														<div class="dropdown-divider"></div>
														<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
													</div>
												</div>
											</div>
										</li>

										<li class="media">
											<a href="#" class="mr-3">
												<img src="../../../../global_assets/images/demo/users/face10.jpg" width="36" height="36" class="rounded-circle" alt="">
											</a>

											<div class="media-body align-self-center">
												Otto Gerwald
											</div>

											<div class="ml-3 align-self-center">
												<div class="dropdown">
													<a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
														<a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
														<a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
														<div class="dropdown-divider"></div>
														<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
													</div>
												</div>
											</div>
										</li>

										<li class="media">
											<a href="#" class="mr-3">
												<img src="../../../../global_assets/images/demo/users/face14.jpg" width="36" height="36" class="rounded-circle" alt="">
											</a>

											<div class="media-body align-self-center">
												Vince Satmann
											</div>

											<div class="ml-3 align-self-center">
												<div class="dropdown">
													<a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
														<a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
														<a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
														<div class="dropdown-divider"></div>
														<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
													</div>
												</div>
											</div>
										</li>

										<li class="media">
											<a href="#" class="mr-3">
												<img src="../../../../global_assets/images/demo/users/face24.jpg" width="36" height="36" class="rounded-circle" alt="">
											</a>

											<div class="media-body align-self-center">
												Jason Leroy
											</div>

											<div class="ml-3 align-self-center">
												<div class="dropdown">
													<a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
														<a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
														<a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
														<div class="dropdown-divider"></div>
														<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
													</div>
												</div>
											</div>
										</li>
								
								</div>
							</div>
						<!-- /contacts -->
					</div>
							<!-- /sidebar content -->
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