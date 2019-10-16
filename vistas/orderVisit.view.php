<!DOCTYPE html>
<html>
<head>
  <!-- Select 2 -->
  <style src="resources/bower_components/select2/dist/css/select2.min.css"></style>
  <?php include 'head.php';?>
  <link rel="stylesheet" href="resources/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="resources/plugins/timepicker/bootstrap-timepicker.min.css">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $titulo;?>
        <small>Sistema de Gestión Inmobiliaria</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-12">
          <form id="newOrderVisit">
            <div class="panel panel-default">
              <!-- <div class="panel-heading">INFORMACIÓN DE LA ORDEN DE VISITA</div> -->
              <div class="panel-body">
                <input type="hidden" name="date_register" value="<?php nameUser($_SESSION['user_system']);?>">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Número:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          OV
                        </div>
                        <input type="text" id="name_owner" name="name_owner" class="form-control" value="<?php $r = $rw['num_order'] + 1; echo $r;?>" readonly>
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Fecha Registro:</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" value="<?php echo date('d-m-Y');?>" readonly>
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Fecha visita:</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Hora visita:</label>

                        <div class="input-group">
                          <input type="text" class="form-control timepicker">

                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                </div>
                <!-- Fin Fecha -->
              </div>
            </div>

            <div class="panel panel-default">
              <!-- <div class="panel-heading">INFORMACIÓN DEL CLIENTE</div> -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Prospecto:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" id="name_prospect" name="name_prospect" class="form-control" placeholder="NOMBRE PROSPECTO" required="" autocomplete="off">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>R.U.T.:</label><small class="pull-right">(Opcional)</small>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-id-card"></i>
                        </div>
                        <input type="text" id="rut_prospect" name="rut_prospect" class="form-control" placeholder="RUT PROSPECTO">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Teléfono:</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-whatsapp"></i>
                        </div>
                        <input type="text" id="phone_prospect" name="phone_prospect" class="form-control" placeholder="INGRESAR NÚMERO CONTACTO" autocomplete="off" maxlength="9" required="">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Correo Electrónico:</label>

                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                          </div>
                          <input type="text" id="email_prospect" name="email_prospect" class="form-control" placeholder="INGRESAR CORREO ELECTRÓNICO" autocomplete="off" required="">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                </div>
                <!-- Fin Datos Prospecto -->
              </div>
            </div>

            <div class="panel panel-default">
              <!-- <div class="panel-heading">INFORMACIÓN DEL INMUEBLE</div> -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Seleccionar el Inmueble</label>
                        <select id="cbx_inmueble" name="cbx_inmueble" class="form-control select2" required>
                          <option value="0">-- Seleccionar --</option>
                          <?php
                            $query ="SELECT * FROM tbl_property_system";
                            $resultado = $con->query($query);
                            while($row=$resultado->fetch_assoc()){;
                          ?>
                          <option value="<?php echo $row['code_property'];?>">DNG <?php echo $row['code_property'] .' - '. $row['title_property'];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      <!-- /.input group -->
                    </div>
                  </div>
                
                </div>
                <div id="resultado"></div>
                <!-- Fin Datos Prospecto -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->

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
<!-- Moment Js -->
<script src="resources/bower_components/moment/min/moment.min.js"></script>
<!-- Select 2 -->
<script src="resources/bower_components/select2/dist/js/select2.min.js"></script>
<!-- Datepicker -->
<script src="resources/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Datepicker Es -->
<script src="resources/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>
<!-- Timepicker -->
<script src="resources/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="resources/dist/js/adminlte.min.js"></script>
<!-- Rut Chileno -->
<script src="resources/dist/js/jquery.rut.js"></script>

<script type="text/javascript">
  //Date picker
  $('#datepicker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    language: 'es',
  });
  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Select 2
  $('.select2').select2();


  $(function() {
    $("#rut_prospect").rut();
  })

  $(document).ready(function(){
      $('#cbx_inmueble').change(function(){
        $('#cbx_inmueble option:selected').each(function() {
          code_property = $(this).val();
          // console.log(code_property);
          $.post("model/getProperty_json.php",{ code_property: code_property }, function(data){
            $("#resultado").html(data);
          });
        });
      })
  });

</script>
</body>
</html>