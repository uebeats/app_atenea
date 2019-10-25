<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php';?>
  <!-- DataTables -->
  <link rel="stylesheet" href="resources/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
</head>
<body class="hold-transition skin-black sidebar-mini <?php echo $sidebar;?>">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <?php include 'header.php';?>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <?php include 'menu_nav.php';?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $titulo;?>
        <small>Sistema de Gestión Inmobiliaria</small>
        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalAddMove">
          <i class="fa fa-plus-circle"></i> Nuevo Movimiento
        </button>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active">
              <h3 class="widget-user-username"><?php echo $rw['name_owner'];?></h3>
              <h5 class="widget-user-desc">Propietario</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="resources/dist/img/img-avatar.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">$<?php echo number_format($rw['canon_price'], 0, ",", ".");?></h5>
                    <span class="description-text">Canon</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $rw['comision_canon'];?>%</h5>
                    <span class="description-text">Comisión</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $rw['day_pay'];?></h5>
                    <span class="description-text">Día Pago</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $rw['address_property'];?></h5>
                    <span class="description-text"><?php echo $rw['city_property'];?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-sm-12">
                  <p>Módulos Adicionales:</p>
                  <a href="listPayNote.php?property=<?php echo $_GET['property']?>" target="_blank" class="btn btn-app">
                    <i class="fa fa-file-text-o"></i> Nota Pago
                  </a>
                  <a class="btn btn-app" data-toggle="modal" data-target="#modalComprobante">
                    <i class="fa fa-cloud-upload"></i> Comprobante
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>



        <input type="hidden" name="id_property" id="id_property" value="<?php echo $_GET['property'];?>">

        <div class="col-md-8">

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#movement" data-toggle="tab"><i class="fa fa-refresh"></i> Movimientos</a></li>
              <li><a href="#paynote" data-toggle="tab"><i class="fa fa-file-text-o"></i> Notas de Pago</a></li>
              <li><a href="#voucher" data-toggle="tab"><i class="fa fa-file-pdf-o"></i> Comprobante</a></li>
              <!-- <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li> -->
              <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="movement">
                <table id="customer_data" class="table table-borderless table-hover table-striped" style="font-size: 1.2rem">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>FECHA</th>
                      <th>TIPO</th>
                      <th>MONTO</th>
                      <th width="200">OBSERVACIÓN</th>
                      <th>ESTADO</th>
                      <th>RENDICIÓN</th>
                      <th style="width: 100px;">OPCIONES</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="paynote">
                <table id="paynote_data" class="table table-borderless table-hover table-striped" style="font-size: 1.2rem" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NOTA DE PAGO</th>
                      <th>DETALLES</th>
                      <th>MONTO</th>
                      <th>ESTADO</th>
                      <th>OPCIONES</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="voucher">
                <table id="voucher_data" class="table table-borderless table-hover table-striped" style="font-size: 1.2rem" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>MOVIMIENTO</th>
                      <th>NOMBRE ARCHIVO</th>
                      <th>TIPO</th>
                      <th width="150">OPCIONES</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

          
        </div>

      </div>
    </section>
    <!-- /.content -->

    <!-- Modal Nuevo Movimiento -->
    <div class="modal fade" id="modalAddMove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document" style="width: 400px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel">REGISTRO DE MOVIMIENTO</h4>
          </div>
          <div class="modal-body">
            <form id="addMoveProperty" method="POST">
              <input type="hidden" name="id_property" id="id_property" value="<?php echo $_GET['property'];?>">
              
              <!-- nombre propietario -->
              <div class="form-group">
                <label>Mandante:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-circle"></i>
                  </div>
                  <input type="text" id="agent_designated" name="agent_designated" class="form-control" readonly value="<?php nameUser($_SESSION['user_system']);?>">
                  <input type="hidden" id="date_register" name="date_register" value="<?php echo date('Y-m-d');?>">
                </div>
                <!-- /.input group -->
              </div>

              <!-- nombre propietario -->
              <div class="form-group">
                <label>Fecha Movimiento:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" id="date_movement" name="date_movement" class="form-control">
                </div>
                <!-- /.input group -->
              </div>

              <!-- rut propietario -->
              <div class="form-group">
                <label>Tipo Movimiento:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-refresh"></i>
                  </div>
                  <input type="text" id="type_movement" name="type_movement" class="form-control" placeholder="TIPO DE MOVIMIENTO" autocomplete="off">
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Monto Movimiento:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-usd"></i>
                  </div>
                  <input type="text" id="amount_movement" name="amount_movement" class="form-control" placeholder="($)" autocomplete="off">
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-file-text"></i>
                  </div>
                  <textarea id="obs_movement" name="obs_movement" class="form-control" placeholder="INGRESAR NOTAS IMPORTANTES Y/U OBSERVACIONES" style="height: 150px"></textarea>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Estado Movimiento:</label>
                <div class="input-group">

                  <div class="input-group-addon">
                    <i class="fa fa-chevron-circle-down"></i>
                  </div>

                  <select id="status_movement" name="status_movement" class="form-control">
                    <option value="Pendiente">PENDIENTE</option>
                    <option value="Completado">COMPLETADO</option>
                  </select>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Estado Rendición:</label>
                <div class="input-group">

                  <div class="input-group-addon">
                    <i class="fa fa-chevron-circle-down"></i>
                  </div>

                  <select id="status_rend" name="status_rend" class="form-control">
                    <option value="No Rendido">NO RENDIDO</option>
                    <option value="Rendido">RENDIDO</option>
                  </select>
                </div>
                <!-- /.input group -->
              </div>
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Crear Movimiento</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Editar Movimiento -->
    <div class="modal fade" id="modalEditMove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document" style="width: 400px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel">MODIFICACIÓN DE MOVIMIENTO</h4>
          </div>
          <div class="modal-body">
            <form id="editMoveProperty" method="POST">
              <input type="hidden" name="id_move_edit" id="id_move_edit">
              <!-- nombre propietario -->
              <div class="form-group">
                <label>Mandante:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-circle"></i>
                  </div>
                  <input type="text" id="agent_edit" name="agent_edit" class="form-control" readonly>
                </div>
                <!-- /.input group -->
              </div>

              <!-- nombre propietario -->
              <div class="form-group">
                <label>Fecha Movimiento:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="register_edit" name="register_edit" class="form-control" readonly>
                </div>
                <!-- /.input group -->
              </div>

              <!-- rut propietario -->
              <div class="form-group">
                <label>Tipo Movimiento:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-refresh"></i>
                  </div>
                  <input type="text" id="type_edit" name="type_edit" class="form-control">
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Monto Movimiento:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-usd"></i>
                  </div>
                  <input type="text" id="amount_edit" name="amount_edit" class="form-control">
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-file-text"></i>
                  </div>
                  <textarea id="obs_edit" name="obs_edit" class="form-control" style="height: 150px"></textarea>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Estado Movimiento:</label>
                <div class="input-group">

                  <div class="input-group-addon">
                    <i class="fa fa-chevron-circle-down"></i>
                  </div>

                  <select id="status_move_edit" name="status_move_edit" class="form-control">
                    <option value="Pendiente">PENDIENTE</option>
                    <option value="Completado">COMPLETADO</option>
                  </select>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Estado Rendición:</label>
                <div class="input-group">

                  <div class="input-group-addon">
                    <i class="fa fa-chevron-circle-down"></i>
                  </div>

                  <select id="status_edit" name="status_edit" class="form-control">
                    <option value="No Rendido">NO RENDIDO</option>
                    <option value="Rendido">RENDIDO</option>
                  </select>
                </div>
                <!-- /.input group -->
              </div>
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btnModify" type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Actualizar Movimiento</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal Editar Comprobante -->
    <div class="modal fade in" id="modalComprobante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Subir documento</h4>
          </div>
            <form id="addVoucher" method="POST" action="model/uploadVoucher.php">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" name="name_voucher" id="name_voucher" class="form-control" placeholder="Añadir nombre voucher">
                      <input type="hidden" name="id_property" id="property" value="<?php $id_property = $_GET['property']; echo $id_property;?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <select style="text-transform: capitalize;" id="movement" name="movement" class="form-control select2">
                        <?php
                        $id_property = $_GET['property'];
                        $query ="SELECT * FROM tbl_move_property WHERE id_property = '$id_property'";
                        $resultado = $con->query($query);
                        while($row=$resultado->fetch_assoc()){;
                          ?>
                          <option value="<?php echo $row['id_move_property'] ." - ". $row['type_movement'];?>"><?php echo $row['id_move_property'] ." - ". $row['type_movement'] ." - $". $row['amount_movement'];?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="file" name="uploadVoucher" id="uploadVoucher" class="form-control" required="">
                </div>
                <div class="form-group">
                  <input type="submit" id="uploadSubmit" class="btn btn-success" value="Subir">
                </div>
                <div class="progress active">
                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
                <div id="targetLayer"></div>
              </div>
            </form>
              <div class="loader-icon" style="display: none;"><i class="fa fa-spin fa-spinner fa-3x"></i></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <?php include 'footer.php';?>
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select 2 -->
<script src="resources/bower_components/select2/dist/js/select2.full.js"></script>
<!-- DataTables -->
<script src="resources/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="resources/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="resources/dist/js/adminlte.min.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Moment.js -->
<script type="text/javascript" src="resources/dist/js/moment.min.js"></script>
<!-- Ventana Centrada JS -->
<script type="text/javascript" src="resources/dist/js/VentanaCentrada.js"></script>
<!-- CDN Form Jquery -->
<script type="text/javascript" src="https://malsup.github.io/jquery.form.js"></script>

<script type="text/javascript" language="javascript">
  //-------//

  // Select 2
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      width:'100%',
      language: {

        noResults: function() {

          return "No hay resultado";        
        },
        searching: function() {

          return "Buscando..";
        }
      },
      placeholder: "Seleccionar opción",
      allowClear: true
    })
  });

  var formatNumber = {
     separador: ".", // separador para los miles
     sepDecimal: ',', // separador para los decimales
     formatear:function (num){
     num +='';
     var splitStr = num.split('.');
     var splitLeft = splitStr[0];
     var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
     var regx = /(\d+)(\d{3})/;
     while (regx.test(splitLeft)) {
     splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
     }
     return this.simbol + splitLeft +splitRight;
     },
     new:function(num, simbol){
     this.simbol = simbol ||'';
     return this.formatear(num);
     }
    }

  // Script para cargar funciones JS
  $(document).ready(function () {
    
    $('[data-toggle="tooltip"]').tooltip();

    cargarPayNote();
    cargarMove();
    cargarVoucher();
    addMoveProperty();
    editMove();
  });

  // Funcion JS para subir archivo y mostrar barra de progreso
  $(document).ready(function(){
    $('#addVoucher').submit(function(e){
      if($('#uploadVoucher').val()){
        e.preventDefault()
        $('#loader-icon').show()
        $(this).ajaxSubmit({
          target: "#targetLayer",
          beforeSubmit: function(){
            $('.progress-bar').width('0%');
          },
          uploadProgress: function(event, position, total, percentComplete){
            $('.progress-bar').width(percentComplete+'%')
            $('.progress-bar').html('<div id="progress-status">'+percentComplete+' %</div>')
          },
          success: function(){
            $('#loader-icon').hide();
            $('#addVoucher')[0].reset();
            cargarVoucher();
          },
          resetForm: true,
        })
        return false
      }
    })
  });

  // Cargamos la lista de propiedades en relación al propietario
  cargarMove = function () {
        // Obtenemos el valor por el id
        id = document.getElementById("id_property").value;

        $("#customer_data").dataTable({
            "destroy":true,
            "order": false,//[[ 0, "desc" ]],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "ajax": {
                "url": "model/listMoveModel.php?property="+id,
                "method": "POST"
            },
            "aoColumns": [

                //1
                { "mData": function (data, type, dataToSet) {
                 return data.id_move_property;}
                },
                //2
                { "mData": function (data, type, dataToSet) {
                 return  moment(data.date_movement).format('D/M/Y');}
                },
                //3
                { "mData": function (data, type, dataToSet) {
                 return data.type_movement;}
                },
                //4
                { "mData": function (data, type, dataToSet) {
                 return "$"+ formatNumber.new(data.amount_movement);}
                },
                //5
                { "mData": function (data, type, dataToSet) {
                 return data.obs_movement;}
                },
                //6
                { "mData": function (data, type, dataToSet) {

                  if (data.status_movement === 'Completado') {
                    return "<label class='label label-success'>"+ data.status_movement +"</label>";
                  }else{
                    return "<label class='label label-danger'>"+ data.status_movement +"</label>";
                  }
                 }
                },

                //7
                { "mData": function (data, type, dataToSet) {

                  if (data.status_rend === 'Rendido') {
                    return "<label class='label label-success'>"+ data.status_rend +"</label>";
                  }else{
                    return "<label class='label label-danger'>"+ data.status_rend +"</label>";
                  }
                 }
                },

                //8
                {
                    "data": "id_move_property",
                    render: function (data, type, row) {
                        return "<div class='btn-group btn-group-sm'><button button='button' onclick='mostrarMove(" + data + ");' class='btn btn-default' data-toggle='modal' data-target='#modalEditMove'><i class='fa fa-eye'></i></button><button type='button' onclick='deleteMove(" + data + ");' class='btn btn-danger'><i class='fa fa-trash'></i></button></div>"
                    }
                }

            ], 
            "language": idioma_spanol
        });
    }

    idioma_spanol = {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }

  // Cargamos la lista de propiedades en relación al propietario
  cargarPayNote = function () {
        // Obtenemos el valor por el id
        id = document.getElementById('id_property').value;

        $("#paynote_data").dataTable({
            "destroy":true,
            "order": false,//[[ 0, "desc" ]],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "ajax": {
                "url": "model/listPayModel.php?property="+ id,
                "method": "POST"
            },
            "aoColumns": [

                //1
                { "mData": function (data, type, dataToSet) {
                 return data.id_paynote;}
                },
                //2
                { "mData": function (data, type, dataToSet) {
                 return "N° " + data.number_paynote;}
                },
                //3
                { "mData": function (data, type, dataToSet) {
                 return "<b>Registro:</b> " + moment(data.date_register).format('D/M/Y') + "<br><b>Pago:</b> " + moment(data.date_paynote).format('D/M/Y') + "<br><b>Dirección:</b> " + data.address_property ;}
                },
                //4
                { "mData": function (data, type, dataToSet) {
                 return "$"+ formatNumber.new(data.total_amount);}
                },
                //5
                { "mData": function (data, type, dataToSet) {

                  if (data.status_paynote === 'Pagado') {
                    return "<label class='label label-success'>"+ data.status_paynote +"</label>";
                  }else{
                    return "<label class='label label-danger'>"+ data.status_paynote +"</label>";
                  }
                 }
                },

                //8
                { "mData": function (data, type, dataToSet) {
                        return "<div class='btn-group btn-group-sm'><button button='button' onclick='mostrarPdf(" + data.number_paynote + ");' class='btn btn-default'><i class='fa fa-file-text-o'></i></button><button type='button' onclick='deleteNotePay(" + data.id_paynote + ");' class='btn btn-danger'><i class='fa fa-trash'></i></button></div>"
                    }
                }

            ], 
            "language": idioma_spanol
        });
    }

    idioma_spanol = {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }

  // Cargamos la lista de propiedades en relación al propietario
  cargarVoucher = function () {
        // Obtenemos el valor por el id
        id = document.getElementById('id_property').value;

        $("#voucher_data").dataTable({
            "destroy":true,
            "order": false,//[[ 0, "desc" ]],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "ajax": {
                "url": "model/listVoucherModel.php?property="+ id,
                "method": "POST"
            },
            "aoColumns": [

                //1
                { "mData": function (data, type, dataToSet) {
                 return data.id_voucher_mov;}
                },
                //2
                { "mData": function (data, type, dataToSet) {

                    return data.name_movement;
                 }
                },
                //3
                { "mData": function (data, type, dataToSet) {
                 return data.name_voucher;}
                },
                //4
                { "mData": function (data, type, dataToSet) {
                  return data.type_file_voucher;}
                },

                //5
                { "mData": function (data, type, dataToSet) {
                        return "<div class='btn-group btn-group-sm'><a href='doc/" + data.url_voucher + "' target='_blank' class='btn btn-sm btn-default'><i class='fa fa-eye'></i></a><button type='button' onclick='deleteVoucher(" + data.id_voucher_mov + ");' class='btn btn-danger'><i class='fa fa-trash'></i></button></div>"
                    }
                }

            ], 
            "language": idioma_spanol
        });
    }

    idioma_spanol = {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }

  var mostrarMove = function (id_move_property) {

        if (!/^([0-9])*$/.test(id_move_property)) {
            return false
        } else {
            $.ajax({
                url: "model/searchMoveProperty.php",
                method: "POST",
                dataType: "json",
                data: {id_move_property: id_move_property},
                success: function (datos) {
                    $('#id_move_edit').val(datos.id_move_property);
                    $('#agent_edit').val(datos.agent_designated);
                    $('#register_edit').val(datos.date_register);
                    //
                    $('#type_edit').val(datos.type_movement);
                    $('#amount_edit').val(datos.amount_movement);
                    $('#obs_edit').val(datos.obs_movement);
                    $('#status_move_edit').val(datos.status_movement);
                    $('#status_edit').val(datos.status_rend);
                }
            });
        }
    }

  //Script para eliminar propiedad del registro
  var deleteMove = function (id_move_property) {

        if (!/^([0-9])*$/.test(id_move_property)) {
            return false
        } else {

            swal({
              title: "¿Quieres eliminar el Registro?",
              text: "Una vez eliminado, no podras recuperarlo!",
              icon: "warning",
              buttons: ['Cancelar','Eliminar'],
              dangerMode: true,
            })

            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    url: "model/deleteMoveProperty.php",
                    method: "POST",
                    data: {id_move_property: id_move_property},
                    success: function (data) {
                        if (data == 'ok') {
                          swal("Eliminado! El registro fue eliminado.", {
                            icon: "success",
                          });
                          cargarMove();
                        }
                    }
                });
                
              } else {
                swal("Que bien, no se ha eliminado el registro!");
              }
            });
        }
    }

  //Script para eliminar nota de pago del registro
  var deleteNotePay = function (id_paynote) {

        if (!/^([0-9])*$/.test(id_paynote)) {
            return false
        } else {

            swal({
              title: "¿Quieres eliminar el Registro?",
              text: "Una vez eliminado, no podras recuperarlo!",
              icon: "warning",
              buttons: ['Cancelar','Eliminar'],
              dangerMode: true,
            })

            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    url: "model/deletePayNote.php",
                    method: "POST",
                    data: {id_paynote: id_paynote},
                    success: function (data) {
                        if (data == 'ok') {
                          swal("Eliminado! El registro fue eliminado.", {
                            icon: "success",
                          });
                          cargarPayNote();
                        }
                    }
                });
                
              } else {
                swal("Que bien, no se ha eliminado el registro!");
              }
            });
        }
    }

  //Script para eliminar nota de pago del registro
  var deleteVoucher = function (id_voucher_mov) {

        if (!/^([0-9])*$/.test(id_voucher_mov)) {
            return false
        } else {

            swal({
              title: "¿Quieres eliminar el Registro?",
              text: "Una vez eliminado, no podras recuperarlo!",
              icon: "warning",
              buttons: ['Cancelar','Eliminar'],
              dangerMode: true,
            })

            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    url: "model/deleteVoucher.php",
                    method: "POST",
                    data: {id_voucher_mov: id_voucher_mov},
                    success: function (data) {
                        if (data == 'ok') {
                          swal("Eliminado! El registro fue eliminado.", {
                            icon: "success",
                          });
                          cargarVoucher();
                        }
                    }
                });
                
              } else {
                swal("Que bien, no se ha eliminado el registro!");
              }
            });
        }
    }

  //Script para editar propiedad del registro
  var editMove = function (id_move_property) {
        $('#editMoveProperty').submit(function (e) {
            var datos = $(this).serialize();
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "model/editMoveProperty.php",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        swal({
                          title: "Actualizado!",
                          text: "El registro fue actualizado.",
                          icon: "success",
                          button: "Ok",
                        });
                        cargarMove();
                        $('#editMoveProperty')[0].reset();
                        $('#modalEditMove').modal('hide');
                        // console.log('Exitazooooooo');
                    } else if (data == 'vacio') {
                        swal({
                          title: "Algo salio mal!",
                          text: "Intentalo nuevamente, no puedes incluir campos vacios, ni caracteres extraños.",
                          icon: "error",
                          button: "Cerrar",
                        });
                        $('#editMoveProperty')[0].reset();
                        $('#modalEditMove').modal('hide');
                    } else {
                        console.log(data);
                    }
                }
            });
        });
    }

  //Script para añadir propiedad al registro
  var addMoveProperty = function () {
        $('#addMoveProperty').submit(function (e) {
            e.preventDefault();
            var datos = $(this).serialize();
            // console.log(datos);

            $.ajax({
                type: "POST",
                url: "model/addMoveProperty.php",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        swal({
                          title: "Buen Trabajo!",
                          text: "El movimiento fue registrado.",
                          icon: "success",
                          button: "Ok",
                        });
                        cargarMove();
                        $('#addMoveProperty')[0].reset();
                        $('#modalAddMove').modal('hide');
                        // console.log('Exitazooooooo');
                    } else if (data == 'vacio') {
                        swal({
                          title: "Algo salio mal!",
                          text: "Un campo esta vacío, recuerda registrar todos los datos.",
                          icon: "error",
                          button: "Cerrar",
                        });
                        $('#addMoveProperty')[0].reset();
                        $('#modalAddMove').modal('hide');
                    } else {
                        console.log(data);
                    }
                }
            });
        });
    }

  //Script para añadir propiedad al registro
  var addPayNote = function () {
        $('#addPayNote').submit(function (e) {
            e.preventDefault();
            var datos = $(this).serialize();
            // alert(datos);
            swal({
              title: "Buen Trabajo!",
              text: datos,
              icon: "success",
              button: "Ok",
            });
            // $.ajax({
            //     type: "POST",
            //     url: "model/createPayNote.php",
            //     data: datos,
            //     success: function (data) {
            //         if (data == 'ok') {
            //             swal({
            //               title: "Buen Trabajo!",
            //               text: "El movimiento fue registrado.",
            //               icon: "success",
            //               button: "Ok",
            //             });
            //             cargarMove();
            //             $('#addMoveProperty')[0].reset();
            //             $('#modalAddMove').modal('hide');
            //             // console.log('Exitazooooooo');
            //         } else if (data == 'vacio') {
            //             swal({
            //               title: "Algo salio mal!",
            //               text: "Un campo esta vacío, recuerda registrar todos los datos.",
            //               icon: "error",
            //               button: "Cerrar",
            //             });
            //             $('#addMoveProperty')[0].reset();
            //             $('#modalAddMove').modal('hide');
            //         } else {
            //             console.log(data);
            //         }
            //     }
            // });
      });
    }

  var mostrarPdf = function(number_paynote){
    if (!/^([0-9])*$/.test(number_paynote)) {
      return false
    } else {
      VentanaCentrada('./resources/dompdf/pdf_blanco.php?number='+number_paynote,'Nota de Pago','','1024','768','true');
    }
  }
 
</script>
</body>
</html>
