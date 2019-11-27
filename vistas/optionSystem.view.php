<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php';?>
  <!-- DataTables css -->
  <link rel="stylesheet" href="resources/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <style type="text/css">
    .form-date{
      margin-bottom: 20px;
    }
    .info-box-content {
      padding: 5px 10px;
      margin-left: 0; 
    }
    .alert {
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
    }
  </style>
</head>
<body class="hold-transition skin-black sidebar-mini <?php echo $sidebar;?>">
<div class="loader"></div>
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
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">

            <div class="info-box-content">
              <h5>Tipos de Movimientos</h5>
              <form id="addTypeMovement" class="form-inline" method="POST">
                <div class="form-group">
                  <input type="text" name="type_movement" class="form-control" placeholder="Ej: Cargo al Propietario">
                </div>
                <div class="form-group">
                  <button button="button" class="btn btn-success btn-block">Nuevo</button>
                </div>
              </form>
              <br>
              <div id="resultado"></div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- form para ingreso -->
        <div class="col-lg-4">

        </div>
        <!-- form para ingreso -->
        <div class="col-lg-4">
        
        </div>
        <!-- form para ingreso -->
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="resources/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="resources/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="resources/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Moment.js -->
<script type="text/javascript" src="resources/dist/js/moment.min.js"></script>

<script type="text/javascript">

   // Script para cargar funciones JS
  $(document).ready(function () {
    addTypeMovement();
    });

  //Script para añadir propiedad al registro
  var addTypeMovement = function () {
        $('#addTypeMovement').submit(function (e) {
            e.preventDefault();
            var datos = $(this).serialize();
            // $('#resultado').html('<div style="font-size:13px;" class="alert alert-success">Excelente! Tipo de Movimiento Ingresado</div>');

            $.ajax({
                type: "POST",
                url: "model/addTypeMovement.php",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        $('#resultado').html('<div style="font-size:13px;" class="alert alert-success">Excelente! Tipo de Movimiento Ingresado.</div>');
                    } else if (data == 'vacio') {
                         $('#resultado').html('<div style="font-size:13px;" class="alert alert-danger">Error! El campo esta vacío.</div>');
                    } else {
                        console.log(data);
                    }
                }
            });
        });
    }

</script>

</body>
</html>