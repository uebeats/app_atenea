<!DOCTYPE html>
<html lang="es">
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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddOwner">
          <i class="fa fa-plus-circle"></i> Nuevo Propietario
        </button>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <div class="box no-border">
            <!-- <div class="box-header">
              <h3 class="box-title">Listado de Propietarios</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tableOwner" class="table table-striped">
                <thead>
                <tr>
                  <th style="font-size: 13px" width="10">#</th>
                  <th style="font-size: 13px" width="130">NOMBRE PROPIETARIO</th>
                  <th style="font-size: 13px" width="130">RUT PROPIETARIO</th>
                  <th style="font-size: 13px" width="150">NÚMERO DE PROPIETARIO</th>
                  <th style="font-size: 13px" width="130">CORREO PROPIETARIO</th>
                  <th style="font-size: 13px" width="130">OBSERVACIONES</th>
                  <th style="font-size: 13px" width="130">OPCIONES</th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Nuevo Propietario -->
  <div class="modal fade" id="modalAddOwner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 400px">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">REGISTRO DE PROPIETARIO</h4>
        </div>
        <div class="modal-body">
          <form id="addOwner" method="POST">
            <input type="hidden" id="agent_designated" name="agent_designated" value="<?php nameUser($_SESSION['user_system']);?>">
            <input type="hidden" id="date_register" name="date_register" value="<?php echo date('Y-m-d');?>">
            <input type="hidden" id="owner_group" name="owner_group" value="1">

            <!-- nombre propietario -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user-circle"></i>
                </div>
                <input type="text" id="name_owner" name="name_owner" class="form-control" placeholder="INGRESAR NOMBRE PROPIETARIO" autocomplete="off">
              </div>
              <!-- /.input group -->
            </div>

            <!-- rut propietario -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-id-card"></i>
                </div>
                <input type="text" id="rut_owner" name="rut_owner" class="form-control" placeholder="INGRESAR ROL UNICO TRIBUTARIO" autocomplete="off" maxlength="12">
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  +56
                </div>
                <input type="text" id="phone_owner" name="phone_owner" class="form-control" placeholder="INGRESAR NÚMERO CONTACTO" autocomplete="off" maxlength="9">
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input type="email" id="email_owner" name="email_owner" class="form-control" placeholder="INGRESAR CORREO ELECTRÓNICO" autocomplete="off">
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-file-text"></i>
                </div>
                <textarea id="obs_owner" name="obs_owner" class="form-control" placeholder="INGRESAR NOTAS IMPORTANTES Y/U OBSERVACIONES" style="height: 150px"></textarea>
              </div>
              <!-- /.input group -->
            </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btnModify" type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Crear Propietario</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <!-- Modal Nuevo Propietario -->
  <div class="modal fade" id="modalEditOwner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 400px">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">ACTUALIZAR PROPIETARIO</h4>
        </div>
        <div class="modal-body">
          <form id="editOwner" method="POST">
            <input type="hidden" id="agent_designated" name="agent_designated" value="<?php nameUser($_SESSION['user_system']);?>">
            <input type="hidden" id="date_register" name="date_register" value="<?php echo date('Y-m-d');?>">
            <input type="hidden" id="id_owner" name="id_owner">

            <!-- nombre propietario -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user-circle"></i>
                </div>
                <input type="text" id="name_edit" name="name_owner" class="form-control" placeholder="INGRESAR NOMBRE PROPIETARIO">
              </div>
              <!-- /.input group -->
            </div>

            <!-- rut propietario -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-id-card"></i>
                </div>
                <input type="text" id="rut_edit" name="rut_owner" class="form-control" placeholder="INGRESAR ROL UNICO TRIBUTARIO" autocomplete="off" maxlength="12">
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  +56
                </div>
                <input type="text" id="phone_edit" name="phone_owner" class="form-control" placeholder="INGRESAR NÚMERO CONTACTO" autocomplete="off" maxlength="9">
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input type="email" id="email_edit" name="email_owner" class="form-control" placeholder="INGRESAR CORREO ELECTRÓNICO" autocomplete="off">
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-file-text"></i>
                </div>
                <textarea id="obs_edit" name="obs_owner" class="form-control" placeholder="INGRESAR NOTAS IMPORTANTES Y/U OBSERVACIONES" style="height: 150px"></textarea>
              </div>
              <!-- /.input group -->
            </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btnModify" type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Actualizar Propietario</button>
            </div>
          </form>
      </div>
    </div>
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
<!-- DataTables -->
<script src="resources/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="resources/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Rut Chileno -->
<script src="resources/dist/js/jquery.rut.js"></script>
<!-- Script Custom -->
<script src="resources/dist/js/gestion.owner.js"></script>
</body>
</html>