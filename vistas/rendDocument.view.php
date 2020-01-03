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
        Rendición/Nota de Pago
        <small>Sistema de Gestión Inmobiliaria</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <form id="addRendPay" method="POST">
        <input type="hidden" name="agent_designated" value="<?php nameUser($_SESSION['user_system']);?>">

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
            $q = "SELECT number_rend FROM tbl_rend_system ORDER BY id_rend DESC LIMIT 1";
            $res = $con->query($q);
            $rw = $res->fetch_assoc();
          ?>

          <div class="col-md-3">
            <div class="form-group">
              <label>N° Rendición:</label>
              <div class="input-group">
                <div class="input-group-addon">
                 RN
               </div>
               <input type="text" id="number_rend" name="number_rend" class="form-control" value="<?php echo $rw['number_rend']+1;?>" readonly>
             </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Emitir a:</label>
              <input type="text" id="name_owner" name="name_owner" class="form-control" placeholder="Ej: Aquiles Baeza">
            </div>
          </div>   
        </div>

        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label>Dirección Propiedad:</label>
              <input type="text" id="address_property" name="address_property" class="form-control" placeholder="Ej: Cajales #34, San Felipe">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Comuna:</label>
              
              <select class="form-control select2" id="city_property" name="city_property">
                <option></option>
              <?php
                $qry = "SELECT city_property FROM tbl_city_property";
                $res = $con->query($qry);
                while($rw_city = $res->fetch_assoc()){
              ?>

                <option value="<?php echo $rw_city['city_property'];?>"><?php echo $rw_city['city_property'];?></option>
              <?php
                }
              ?>
              </select>
              
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Agente:</label>
              <input type="text" id="agent_admin" name="agent_admin" class="form-control" value="<?php nameUser($_SESSION['user_system']);?>" readonly>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12" style="margin-bottom: 10px">
            <table class="table" style="margin-bottom: 0!important">
              <thead>
                <tr>
                  <th class='text-center'>Item</th>
                  <th>Descripción</th>
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
                <textarea name="obs_paynote" id="obs_paynote" class="form-control" style="height: 80px">Enviamos detalles de movimientos del periodo.</textarea>
              </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Estado:</label>
              <select id="status_rend" name="status_rend" class="form-control select2">
                <option></option>
                <option value="Pagado">Pagado</option>
                <option value="Pendiente">Pendiente</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group select2c">
              <label>Método de Pago:</label>
              <select id="pago_rend" name="pago_rend" class="form-contro select2">
                <option></option>
                <option value="Transferencia o Depósito">Transferencia o Depósito</option>
                <option value="Débito o Crédito">Débito o Crédito</option>
                <option value="Efectivo">Efectivo</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Fecha Pago:</label>
              <input type="date" id="date_rend" name="date_rend" class="form-control" required="">
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check-circle"></i> Crear Nota de Pago
            </button>
          </div>
        </div>
      </form>
    </section>

    <!-- Modal Editar Movimiento -->
    <form id="addItemPay" method="POST">
      <div class="modal fade in" id="modalItemPay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Ítem</h4>
            </div>

            <div class="modal-body">

              <input type="hidden" name="agent_designated" value="<?php echo $_SESSION['user_system'];?>">
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Descripción del Servicio</label>
                        <input type="text" name="tmp_description" id="tmp_description" class="form-control">
                        <?php
                          $q = "SELECT number_paynote FROM tbl_paynote_system";
                          $res = $con->query($q);
                          $rw = $res->fetch_assoc();
                        ?>
                        <input type="hidden" class="form-control" id="id_number_paynote" name="id_number_paynote" value="<?php echo $rw['number_paynote']+1;?>">
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
<script src="resources/bower_components/select2/dist/js/select2.full.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Ventana Centrada JS -->
<script type="text/javascript" src="resources/dist/js/VentanaCentrada.js"></script>

<script type="text/javascript">

  function mostrar_items(){
    var datos = {"action":"ajax"};
    $.ajax({
      url:'model/addItemRend.php',
      data: datos,
       beforeSend: function(objeto){
       $('.items').html('Cargando...');
      },
      success:function(data){
        $(".items").html(data).fadeIn('slow');
    }
    })
  }

  function eliminar_item(id){
    $.ajax({
      type: "GET",
      url: "model/addItemRend.php",
      data: "action=ajax&id_tmp_paynote="+id,
       beforeSend: function(objeto){
         $('.items').html('Cargando...');
        },
      success: function(data){
        $(".items").html(data).fadeIn('slow');
      }
    });
  }

  $( "#addItemPay" ).submit(function( event ) {
    var parametros = $(this).serialize();
    ///////////////////////////////////////////////////
    $.ajax({
      type: "POST",
      url:'model/addItemRend.php',
      data: parametros,
      beforeSend: function(objeto){
        $('.items').html('Cargando...');
        },
      success:function(data){
        $(".items").html(data).fadeIn('slow');
        $('#addItemPay')[0].reset();
        $("#modalItemPay").modal('hide');

      }
    })
    event.preventDefault();
    
  })

  //Script para añadir nota de pago al registro
  var addRendPay = function () {
        $('#addRendPay').submit(function (e) {
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
                url: "model/createRendPay.php",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        swal({
                          title: "Buen Trabajo!",
                          text: "La nota de pago fue registrada.",
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
  addRendPay();
  
</script>

</body>
</html>