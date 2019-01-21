@extends('plantillas.headergerente')
@section('css')
<link href="{{asset('global_assets/css/extras/animate.min.css')}}" rel="stylesheet" type="text/css">

<style type="text/css">

.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
   background-color: #81A8BA;
   color: #000000;
}
.content {
   background-image: url("{{asset('assets/img/textura.jpg')}}");
}

</style>
@endsection
@section('javascript')
<script src="{{asset('global_assets/js/demo_pages/components_modals.js')}}"></script>
<script src="{{asset('global_assets/js/sgp/task_manager_list_cur.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>

<script type="text/javascript">
	function obtenerTotal(){

		var facd_cant = parseFloat($('#facd_cant').val());
		var facd_punit = parseFloat($('#facd_punit').val());
		if (isNaN(Math.round(parseFloat(facd_cant*facd_punit) * 100) / 100)) {
			$('#facd_total').val(0);
		}
		else{
			$('#facd_total').val(Math.round(parseFloat(facd_cant*facd_punit) * 100) / 100);
		}
	}
	function obtenerTotaledit(){

		var facd_cant = parseFloat($('#efacd_cant').val());
		var facd_punit = parseFloat($('#efacd_punit').val());
		if (isNaN(Math.round(parseFloat(facd_cant*facd_punit) * 100) / 100)) {
			$('#efacd_total').val(0);
		}
		else{
			$('#efacd_total').val(Math.round(parseFloat(facd_cant*facd_punit) * 100) / 100);
		}
	}

</script>
<script type="text/javascript">
	function obtenerEdit(id){

		$('#facd_id1').val(id.facd_id);
        $('#facd_desc1').val(id.facd_desc);
		$('#facd_cant1').val(id.facd_cant);
		$('#facd_punit1').val(id.facd_punit);
		$('#recum_id1').val(id.recum_id);
		$('#facd_total1').val(id.facd_cant*id.facd_punit);
	};
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var datos=new Array();
        $("#add").click(function(){
            
            var nuevaFila="<tr>";
            var trs=$("#historial tr").length;
            var texto = $("#recum_id option:selected").text().replace(/ /g, "");
            nuevaFila+="<td><input type=text readonly style='border-width: 0px' name=desc"+trs+" value="+$("#facd_desc").val()+"></input></td>";
            nuevaFila+="<td style='display:none'><input type=text readonly readonly style='border-width: 0px' name=gasid"+trs+" value="+$("#gas_id").val()+"></input></td>";
            nuevaFila+="<td style='display:none'><input type=text readonly readonly style='border-width: 0px' name=recuid"+trs+" value="+$("#recum_id").val()+"></input></td>";
            nuevaFila+="<td><input type=text style='border-width: 0px' name=recu"+trs+" value="+texto+"></input></td>";
            nuevaFila+="<td><input type=text readonly style='border-width: 0px' name=cant"+trs+" value="+$("#facd_cant").val()+"></input></td>";
            nuevaFila+="<td><input type=text readonly style='border-width: 0px' name=puni"+trs+" value="+$("#facd_punit").val()+"></input></td>";
            nuevaFila+="<td><input type=text readonly style='border-width: 0px' name=ptot"+trs+" value="+$("#facd_total").val()+"></input></td>";
            nuevaFila+="</tr>";
            $("#historial").append(nuevaFila);

            trs=$("#historial tr").length;
            $('#nro_filas').val(trs);
            $('#cambio').val("SI");
        });
 
        /**
         * Funcion para eliminar la ultima columna de la tabla.
         * Si unicamente queda una columna, esta no sera eliminada
         */
        $("#del").click(function(){
            // Obtenemos el total de columnas (tr) del id "tabla"
            var trs=$("#historial tr").length;
            if(trs>2)
            {
                // Eliminamos la ultima columna
                $("#historial tr:last").remove();              

            }

            trs=$("#historial tr").length;
            $('#nro_filas').val(trs);
            $('#cambio').val("SI");
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var datos=new Array();
        $("#eadd").click(function(){
            
            var enuevaFila="<tr>";
            var etrs=$("#ehistorial tr").length;
            var etexto = $("#erecum_id option:selected").text().replace(/ /g, "");
            enuevaFila+="<td><input type=text readonly style='border-width: 0px' name=edesc"+etrs+" value="+$("#efacd_desc").val()+"></input></td>";
            enuevaFila+="<td style='display:none'><input type=text readonly readonly style='border-width: 0px' name=egasid"+etrs+" value="+$("#egas_id").val()+"></input></td>";
            enuevaFila+="<td style='display:none'><input type=text readonly readonly style='border-width: 0px' name=erecuid"+etrs+" value="+$("#erecum_id").val()+"></input></td>";
            enuevaFila+="<td><input type=text style='border-width: 0px' name=erecu"+etrs+" value="+etexto+"></input></td>";
            enuevaFila+="<td><input type=text readonly style='border-width: 0px' name=ecant"+etrs+" value="+$("#efacd_cant").val()+"></input></td>";
            enuevaFila+="<td><input type=text readonly style='border-width: 0px' name=epuni"+etrs+" value="+$("#efacd_punit").val()+"></input></td>";
            enuevaFila+="<td><input type=text readonly style='border-width: 0px' name=eptot"+etrs+" value="+$("#efacd_total").val()+"></input></td>";
            enuevaFila+="</tr>";
            $("#ehistorial").append(enuevaFila);

            etrs=$("#ehistorial tr").length;
            $('#enro_filas').val(etrs);
            $('#ecambio').val("SI");
        });
 
        /**
         * Funcion para eliminar la ultima columna de la tabla.
         * Si unicamente queda una columna, esta no sera eliminada
         */
        $("#edel").click(function(){
            // Obtenemos el total de columnas (tr) del id "tabla"
            var etrs=$("#ehistorial tr").length;
            if(etrs>2)
            {
                // Eliminamos la ultima columna
                $("#ehistorial tr:last").remove();              

            }

            etrs=$("#ehistorial tr").length;
            $('#enro_filas').val(etrs);
            $('#ecambio').val("SI");
        });
    });
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
<!-- Modal para mostrar el formato de subida de CUR -->
<div id="modal_formato" class="modal fade" tabindex="-1">
   <div class="modal-dialog modal-full">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Formato para subir el <strong>CALENDARIO DE UTILIZACIÓN DE RECURSOS</strong></h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <div class="modal-body col-centered">
            <img src="{{asset('assets/img/fila_cabecera.png')}}">
         </div>
      </div>
   </div>
</div>

<!-- /full width modal -->

@if(Session::has('creado'))
<div class="row">
   <div class="col-12">
      <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
         {{Session::get('creado')}}
      </div>
   </div>
</div>
@endif

<!-- Profile navigation -->
<div class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
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
            Recursos del Proyecto</span>
         </a>
         <li class="nav-item">
            <a href="#curv" class="navbar-nav-link" data-toggle="tab">
               <i class="icon-calendar3 mr-2"></i>
            Calendario Valorizado</span>
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

                        <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round" data-toggle="modal" data-target="#modal_gasto"><b><i class="icon-stack-plus"></i></b>Nuevo gasto Compra</button>
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <table class="table table-bordered table-hover datatable-basic table-xs">
                     <thead>
                        <tr>
                           <th>Número</th>
                           <th>Fecha</th>
                           <th>Tipo</th>
                           <th>Estado</th>
                           <th>Observaciones</th>
                           <th>Proveedor</th>
                           <th>Empleado</th>
                           <th>Total</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     @if(!empty($proyecto->facturas))
                     <tbody>
                        @foreach($proyecto->facturas as $factura)
                        <tr>
                           <td>{{$factura->fac_nro}}</td>
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
                           <td>S/.{{number_format($total,2)}}</td>
                           <td class="text-center">
                              <div class="list-icons">
                                 <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                       <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       <a href="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/ver" class="dropdown-item"><i class="icon-eye"></i> Ver</a>
                                       <a href="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/creardetalle" class="dropdown-item"><i class="icon-pencil5"></i> Editar</a>
                                       <a href="/gerente/proyecto/{{$proyecto->pro_id}}/factura/{{$factura->fac_id}}/eliminar" onclick="return confirm('Esta seguro que desea eliminar?')" class="dropdown-item"><i class="icon-bin2"></i> Eliminar</a>
                                    </div>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                     @else
                     <div class="card-body">
                        <div class="alert alert-danger alert-dismissible">
                           Al parecer no tiene facturas o gastos registrados.
                        </div>
                     </div>
                     @endif
                  </table>
               </div>
            </div>
         </div>

         <div class="tab-pane fade" id="settings">
            <!-- Profile info -->

            <div class="card col-md-8 m-auto">
               <div class="card-header header-elements-inline">
                  <h5 class="card-title h3">Calendario de Utilización de Recursos</h5>
                  <div class="header-elements">
                     <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                     </div>
                  </div>
               </div>
               @if(!$proyecto->Curs->count()>0)
               <div class="card-body">
                  <form action="/gerente/proyecto/{{$proyecto->pro_id}}/loadcur" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="h5">Archivo - Calendario De Utilización de Recursos</label>
                              <input type="file" class="form-input-styled" name="import_file" data-fouc>
                              <span class="form-text text-muted">Formatos Aceptados: XLSX</span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="h5">Fecha de Inicio: </label>
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
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="h5">Nro de Etapas: </label>
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
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="h5">Fila de Cabecera: </label>
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
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="h5">Fila de la primera Familia de Insumos: </label>
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

                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="h5">Fila del último Insumo: </label>
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
                     </div>

                     <div class="row mt-3">
                        <div class="col-md-4">
                           <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_formato"><i class="icon-search4"></i> <span>Ver Formato</span></button>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-right">
                           <button type="submit" class="btn btn-primary btn-block">Subir Formato</button>
                        </div>
                     </div>

                  </form>
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
               <table class="table tasks-list table-xs table-hover">
                  <thead>
                     <tr>
                        <th>Cod.</th>
                        <th>Period</th>
                        <th>Insumo</th>
                        <th>Unidad</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Parcial</th>
                        @foreach($proyecto->Curs[0]->CurDetalles[0]->CurdPlazos as $objCurdPlazo)
                           <th>{{$objCurdPlazo->curdp_nro}}_Valorización</th>
                        @endforeach
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($proyecto->Curs->first()->CurDetalles as $CurDetalle)
                        @if($CurDetalle->curd_idpadre!=1)
                        <tr>
                           <td>{{str_replace(" ","_",$CurDetalle->RecursoUnidadMedida->Recurso->rec_cod)}}</td>
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
                           @foreach($CurDetalle->CurdPlazos as $objCurdPlazo)
                              <td>
                                 <div class="font-weight-semibold">S/. {{$objCurdPlazo->curdp_cant}}</div>
                              </td>
                           @endforeach

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

         <div class="tab-pane fade" id="curv">
            sd
         </div>
      </div>
      <!-- /left content -->


     

   </div>
   <!-- /inner container -->
</div>
<!-- Modal para ingresar un nuevo gasto -->
<div id="modal_gasto" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
		    <div class="col-md-12 col-centered">
		        <form method="POST" action="/gerente/proyecto/{{$proyecto->pro_id}}/factura/crear">
		        	<input type="hidden" name="nro_filas" id="nro_filas" value="0" >
					<input type="hidden" name="cambio" id="cambio" value="NO" >
					<div class="card-header header-elements-inline bg-light" style="padding: 8.5px">
		                <label class="card-title mx-auto" ><font size="3.5">Cabecera de Factura</font></label>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                	</div>
		            	</div>
					</div>
		            <div class="card-body">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Persona que genera la Factura:</label>
								<input type="text" name="pro_id" value="{{$proyecto->pro_id}}" hidden="hidden">
								<select class="form-control select-search" data-fouc name="emp_id" required="required" style="width:100%;">
									<option value="1">Empleado</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>Tipo de Gasto:</label>
								<select class="form-control select-search" data-fouc name="fac_tipo" required="required" style="width: 100%;">
									<option value="1">Factura</option>
									<option value="2">Boleta</option>
									<option value="3">Sin Documento</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>Fecha <span id="tipo_gasto">de la Factura</span></label>
								<div class="input-group">
									<span class="input-group-prepend">
										<span class="input-group-text"><i class="icon-calendar22"></i></span>
									</span>
									<input type="date" class="form-control daterange-single" name="fac_fech" required="required">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4 form-group">
								<label>Estado <span id="tipo_gasto_est">de la Factura</span></label>
								<input type="text" class="form-control daterange-single" name="fac_est" value="Realizada" readonly="readonly" required="required">
							</div>
							<div class="col-md-4 form-group">
								<label>Número <span id="tipo_gasto_nro">de la Factura</span></label>
								<input type="text" class="form-control daterange-single" name="fac_nro" value="0" required="required">

							</div>
						</div>

						<div class="row">
							<div class="col-md-4 form-group">
								<label>Observación <span id="tipo_gasto_obs">de la Factura</span></label>
								<textarea name="fac_obs" rows="3" cols="3" class="form-control" placeholder="Coloque los detalles que justifiquen el gasto"></textarea>
							</div>
							<div class="col-md-4 form-group">
								<label>Proveedor</label>
								<select class="form-control select-search" data-fouc name="prov_id" required="required" style="width:100%;">
									<option value="1">Proveedor</option>
								</select>

							</div>
						</div>
					</div>
					<div class="modal-header bg-slate" style="padding: 8.5px">
						<h6 class="modal-title">Agregar Detalle de Factura</h6>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-content">
					<div class="modal-body">				
						<hr>
						<div class="card card-table table-responsive shadow-3 mb-0">
							<table class="table table-bordered table-xs">
								<thead>
									<tr>
										<th width="35%">Descripción: 
											<textarea name="facd_desc" id="facd_desc" rows="1" cols="3" class="form-control" placeholder="Coloque una Descripción"></textarea>
										</th>
										<th width="25%">Recurso y Unidad de Medida:
											</br>
											<input type="text" id="gas_id" name="gas_id" value="1" hidden="hidden">
											<select class="form-control select-search" data-fouc name="recum_id" id="recum_id" required="required">
												<option value="1">************ OTROS ************</option>
												@foreach($proyecto->Curs[0]->CurDetalles as $curdetalle)
													@if($curdetalle->curd_idpadre != 1)
														<option value="{{$curdetalle->RecursoUnidadMedida->recum_id}}">{{$curdetalle->RecursoUnidadMedida->Recurso->rec_nom}} || {{$curdetalle->RecursoUnidadMedida->UnidadMedida->um_abr}}</option>
													@endif
												@endforeach
											</select>
										</th>
										<th width="10%">Cantidad:
											<input type="text" class="form-control daterange-single" name="facd_cant" id="facd_cant" onkeyup="obtenerTotal();" required="required" value="0">
										</th>
										<th width="10%">Precio Unitario:
											<input type="text" class="form-control daterange-single" name="facd_punit" id="facd_punit" onkeyup="obtenerTotal();" required="required" value="0">
										</th>
										<th width="10%">Total:
											<input type="text" class="form-control daterange-single font-weight-black" id="facd_total" required="required" value="0" disabled>
										</th>
										<td>
											<input type="button" id="add" style="width: 100%; height: 100%; background-color: #5cb85c;border-width: 0px;font-size: 20px; color: #fff; font-style: bold" value="+" ></input>
											</td>
										<td>
											<input type="button" id="del" style="width: 100%; height: 100%; background-color: #d9534f;border-width: 0px;font-size: 20px; color: #fff; font-style: bold" value="-"></input>
										</td>
									</tr>
								</thead>
							</table>
							<div class="card-body">
								<table class="table table-bordered datatable-basic table-xs" id="historial" name="historial">
									<thead>
										<tr>
											<th>Descripción</th>
											<th style='display:none'>gasid</th>
											<th style='display:none'>Idconcepto</th>
											<th>Concepto</th>
											<th>Cantidad</th>
											<th>P. Unitario</th>
											<th>P. Total</th>
										</tr>
									</thead>
									<tbody>
										<tr role="row" class="odd">
										</tr>
									</tbody>
								</table>
					    	</div>
						</div>			
		            
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-lg bg-green-700">Crear Factura <i class="icon-paperplane ml-2"></i></button>
					</div>
				</form>
		        </div>
			</div>
		</div>		
	</div>
</div>
<!-- /full width modal -->
@endsection