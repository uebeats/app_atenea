<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manager DNG | Sistema de gestión Inmobiliaria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resources/dist/css/AdminLTE.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><i style="color: #fff" class="fa fa-user-circle fa-2x"></i></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresa tus datos para acceder</p>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
      <div class="form-group has-feedback">
        <span class="fa fa-user form-control-feedback"></span>
        <input name="usuario" type="text" class="form-control" placeholder="Ingrese su correo electrónico" autocomplete="off">
        
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Ingrese su contraseña" autocomplete="off">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Selecciona el departamento:</label>
        <select name="depto" class="form-control">
          <option value="0">Elige una opción</option>
          <option value="administrativo">Administrativo</option>
          <option value="comercial">Comercial</option>
        </select>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block">Ingresar <i class="fa fa-sign-in"></i></button>
        </div>
        <!-- /.col -->
        <div class="col-xs-12"><br>
          <?php echo $errores;?>
        </div>
        <div class="col-xs-12 center">
          <small>Powered by <a href="https://facebook.com/unicoescritorbeats" target="_blank">Jesús Caballero</a></small>
        </div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
