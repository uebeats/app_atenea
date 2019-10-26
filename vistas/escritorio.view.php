<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php';?>
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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              <?php echo $count_owner['id_owner_property'];?>
                
              </h3>

              <p>Propietarios Registrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="gestionOwner.php" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $count_property['id_property'];?></h3>

              <p>Propiedades Registradas</p>
            </div>
            <div class="icon">
              <i class="fa fa-building"></i>
            </div>
            <a href="gestionProperty.php" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $count_clientes['id_owner_property'];?></h3>

              <p>Clientes Registrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="gestionClient.php" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $count_paynote['id_paynote'];?></h3>

              <p>Documentos Generados</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-open"></i>
            </div>
            <a href="#" class="small-box-footer">Notas de Pago <i class="fa fa-chech-circle"></i></a>
          </div>
        </div>
        <!-- ./col -->
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

</body>
</html>