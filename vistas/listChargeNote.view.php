<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php';?>
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <?php include 'header.php';?>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <?php include 'menu_nav.php';?>

  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nota de Cobro
        <small>Sistema de Gestión Inmobiliaria</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <form id="addChargeNote" method="POST">
        <input type="hidden" name="agent_designated" value="<?php nameUser($_SESSION['user_system']);?>">
        <input type="hidden" name="id_property" value="<?php echo $_GET['property'];?>">

        <div class="row">
          <div class="col-md-12">
            <div class="pad margin no-print">
              <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-info-circle"></i> Atención:</h4>
                Por favor, este sistema se encuentra en desarrollo, si no puedes realizar la operación comunicate con <a href="mailto:jesus@propiedadesdng.com">soporte@propiedadesdng.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Fecha:</label>
              <input type="text" id="date_register" name="date_register" class="form-control" value="<?php echo date('Y-m-d');?>" readonly>
            </div>
          </div>

          <?php
            $q = "SELECT number_chargenote FROM tbl_chargenote_system ORDER BY id_chargenote DESC LIMIT 1";
            $res = $con->query($q);
            $rw = $res->fetch_assoc();
          ?>

          <div class="col-md-3">
            <div class="form-group">
              <label>Nota de Cobro:</label>
              <div class="input-group">
                <div class="input-group-addon">
                 NC
               </div>
               <input type="text" id="number_chargenote" name="number_chargenote" class="form-control" value="<?php echo $rw['number_chargenote']+1;?>" readonly>
             </div>
            </div>
          </div>

          <?php
            $id = $_GET['property'];
            $q = "SELECT * FROM tbl_property_system WHERE id_property = '$id' ";
            $res = $con->query($q);
            $rw = $res->fetch_assoc();
          ?>

          <div class="col-md-6">
            <div class="form-group">
              <label>Nombre Cliente:</label>
              <input type="text" id="name_owner" name="name_owner" class="form-control" value="<?php echo $rw['name_client'];?>" readonly>
            </div>
          </div>   
        </div>

        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label>Dirección Propiedad:</label>
              <input type="text" id="address_property" name="address_property" class="form-control" value="<?php echo $rw['address_property'];?>" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Comuna:</label>
              <input type="text" id="city_property" name="city_property" class="form-control" value="<?php echo $rw['city_property'];?>" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Agente Administrador:</label>
              <input type="text" id="agent_admin" name="agent_admin" class="form-control" value="<?php echo $rw['agent_designated'];?>" readonly>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12" style="margin-bottom: 10px">
            <table class="table" style="margin-bottom: 0!important">
              <thead>
                <tr>
                  <th class='text-center'>#</th>
                  <th class='text-center'>Item</th>
                  <th class='text-center'>Descripción</th>
                  <th class='text-center'>Cantidad</th>
                  <th class='text-right'>Subtotal</th>
                  <th class='text-right'>Total</th>
                  <th class='text-right'></th>
                </tr>
              </thead>
              <tbody class="items">
                  
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-8">
            <p class="lead">Observaciones Adicionales:</p>
              <div class="form-group">
                <textarea name="obs_paynote" id="obs_paynote" class="form-control" style="height: 80px">Estimado Cliente, detallamos en esta nota de cobro lo adeudado por usted. Recuerde que si tiene alguna duda con respecto al cobro puede llamarnos al +569 9848 0003 o comuníquese con su agente designado. </textarea>
              </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Estado:</label>
              <select id="status_paynote" name="status_paynote" class="form-control">
                <option value="Pagado">Pagado</option>
                <option value="Pendiente">Pendiente</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Método de Pago:</label>
              <select id="pago_paynote" name="pago_paynote" class="form-control">
                <option value="Transferencia o Depósito">Transferencia o Depósito</option>
                <option value="Débito o Crédito">Débito o Crédito</option>
                <option value="Efectivo">Efectivo</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Fecha Pago:</label>
              <input type="date" id="date_paynote" name="date_paynote" class="form-control" required="">
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check-circle"></i> Crear Nota de Cobro
            </button>
            <a class="btn btn-info" href="fichaProperty.php?property=<?php echo $_GET['property']?>"><i class="fa fa-arrow-circle-left"></i> Volver a la ficha</a>
          </div>
        </div>
      </form>
    </section>

    <!-- Modal Editar Movimiento -->
    <form id="addItemCharge" method="POST">
      <div class="modal fade in" id="modalItemPay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Ítem</h4>
            </div>

            <div class="modal-body">
              <?php
                $q = "SELECT number_chargenote FROM tbl_chargenote_system ORDER BY id_chargenote DESC LIMIT 1";
                $res = $con->query($q);
                $rw_chargenote = $res->fetch_assoc();
              ?>
              <input type="hidden" name="agent_designated" value="<?php echo $_SESSION['user_system'];?>">
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Descripción del Servicio</label>
                      <select style="text-transform: capitalize;" name="tmp_description" id="tmp_description" class="form-control select2 desc ">
                        <option></option>
                        <?php
                          $id_property = $_GET['property'];
                          $query ="SELECT * FROM tbl_move_property WHERE id_property = $id_property AND status_rend = 'No Rendido'";
                          $resultado = $con->query($query);
                          while($row=$resultado->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['id_move_property'];?>"><?php echo $row['type_movement'] . " | " . $row['status_movement'] . " | $" . $row['amount_movement'];?></option>
                        <?php
                        }
                        ?>
                      </select>
                        <?php
                          $q = "SELECT number_paynote FROM tbl_paynote_system";
                          $res = $con->query($q);
                          $rw = $res->fetch_assoc();
                        ?>
                        <input type="hidden" class="form-control" id="id_number_paynote" name="id_number_paynote" value="<?php echo $rw_chargenote['number_chargenote']+1;?>">
                        <input type="hidden" class="form-control" id="action" name="action" value="ajax">
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Cantidad:</label>
                    <input type="number" class="form-control" id="tmp_quantity" name="tmp_quantity" min="1" max="99" required="">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Monto:</label>
                    <input type="text" class="form-control amount" id="tmp_amount" name="tmp_amount">
                  </div>
                </div>
                  
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Detalle Movimiento:</label>
                    <textarea name="tmp_detalle_mov" id="detalle_mov" class="form-control"></textarea>
                  </div>
                </div>
              
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-info">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- /.content -->
    <div class="clearfix"></div>
  </div>

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
<!-- AdminLTE App -->
<script src="resources/dist/js/adminlte.min.js"></script>
<!-- Select 2 -->
<script src="resources/bower_components/select2/dist/js/select2.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Ventana Centrada JS -->
<script type="text/javascript" src="resources/dist/js/VentanaCentrada.js"></script>

<script type="text/javascript">

  function mostrar_items(){
    var datos = {"action":"ajax"};
    $.ajax({
      url:'model/addItemCharge.php',
      data: datos,
       beforeSend: function(objeto){
       $('.items').html('Cargando...');
      },
      success:function(data){
        $('.items').html(data).fadeIn('slow');
    }
    })
  }

  function eliminar_item(id){
    $.ajax({
      type: "GET",
      url: "model/addItemCharge.php",
      data: "action=ajax&id_tmp_paynote="+id,
       beforeSend: function(objeto){
         $('.items').html('Cargando...');
        },
      success: function(data){
        $('.items').html(data).fadeIn('slow');
      }
    });
  }

  $( "#addItemCharge" ).submit(function( event ) {
    var parametros = $(this).serialize();
    ///////////////////////////////////////////////////
    $.ajax({
      type: "POST",
      url:'model/addItemCharge.php',
      data: parametros,
       beforeSend: function(objeto){
         $('.items').html('Cargando...');
        },
      success:function(data){
        $('.items').html(data).fadeIn('slow');
        $('#addItemCharge')[0].reset();
        $("#modalItemPay").modal('hide');

      }
    })
    event.preventDefault(); 
  })

  //Script para añadir nota de cobro al registro
  var addChargeNote = function () {
        $('#addChargeNote').submit(function (e) {
            e.preventDefault();
            var datos = $(this).serializeArray();
            var total = $('#total_paynote').html();
            datos.push({ name: "total_amount", value: total});
            // alert(datos);

            // swal({
            //   title: "Buen Trabajo!",
            //   text: datos,
            //   icon: "success",
            //   button: "Ok",
            // });

            $.ajax({
                type: "POST",
                url: "model/createChargeNote.php",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        swal({
                          title: "Buen Trabajo!",
                          text: "La nota de cobro fue registrada.",
                          icon: "success",
                          button: "Ok",
                        });
                        // cargarMove();
                        // $('#addMoveProperty')[0].reset();
                        // $('#modalAddMove').modal('hide');
                        // console.log('Exitazooooooo');
                    } else if (data == 'vacio') {
                        swal({
                          title: "Algo salio mal!",
                          text: "Un campo esta vacío, recuerda registrar todos los datos.",
                          icon: "error",
                          button: "Cerrar",
                        });
                        // $('#addMoveProperty')[0].reset();
                        // $('#modalAddMove').modal('hide');
                    } else {
                        console.log(data);
                    }
                }
            });
        });
    }

  $(document).ready(function(){
      $("#tmp_description").change(function(){
        $("#tmp_description option:selected").each(function() {

          parametros = $(this).val();
            
            //SOLICITUD DE MONTO
            $.ajax({
            type: "POST",
            url:'model/jsonAmount.php',
            data: {parametros: parametros},
            beforeSend: function(objeto){
              $('#tmp_amount').val('Cargando...');
            },
            success:function(data){
              $('#tmp_amount').val(data);
            }
          })
            
            //SOLICITUD DE DETALLE
            $.ajax({
            type: "POST",
            url:'model/jsonMove.php',
            data: {parametros: parametros},
            beforeSend: function(objeto){
                $('#detalle_mov').val('Cargando...');
            },
            success:function(data){
                $('#detalle_mov').val(data);
            }
          })
            
          event.preventDefault();
          // $.post("../main/php/getServicios.php",{ id_materia: id_materia }, function(data){
          //   $("#cbx_servicio").html(data);
          // });
          // alert(id_movement);
          event.preventDefault();
          // $.post("../main/php/getServicios.php",{ id_materia: id_materia }, function(data){
          //   $("#cbx_servicio").html(data);
          // });
          // alert(id_movement);
        });
      })
  });

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

  mostrar_items();
  addChargeNote();
  
</script>

</body>
</html>