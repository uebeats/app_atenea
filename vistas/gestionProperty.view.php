<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'head.php';?>
  <!-- DataTables -->
  <link rel="stylesheet" href="resources/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <style type="text/css">
    .cke_textarea_inline {
      border: 1px solid #ccc;
      padding: 10px;
      min-height: 300px;
      background: #fff;
      color: #000;
    }
  </style>

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
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddProperty">
          <i class="fa fa-plus-circle"></i> Nueva Administración
        </button>

      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-xs-12">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddProperty">
          <i class="fa fa-plus-circle"></i> Nueva Administración
        </button>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box no-border">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tableProperty" class="table table-striped" style="font-size: 1.2rem">
                <thead>
                <tr>
                  <th>INFORMACIÓN BÁSICA</th>
                  <th>DATOS INMUEBLE</th>
                  <th>ADMINISTRACIÓN</th>
                  <th>PERÍODO</th>
                  <th>SERVICIOS</th>
                  <th width="150px">OPCIONES</th>
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

  <!-- Modal NEW -->
  <div class="modal fade" id="modalAddProperty" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">REGISTRO DE PROPIEDAD</h4>
        </div>
        <div class="modal-body" style="background-color: #efefef;">
          <form id="addProperty" method="POST">
            <input type="hidden" id="agent_designated" name="agent_designated" value="<?php nameUser($_SESSION['user_system']);?>">
            <input type="hidden" id="date_register" name="date_register" value="<?php echo date('Y-m-d');?>">
          <div class="row">
            <div class="col-xs-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#info" data-toggle="tab" aria-expanded="true">INFORMACIÓN BÁSICA</a></li>
                  <li class=""><a href="#details" data-toggle="tab" aria-expanded="false">DETALLES PROPIEDAD</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="info">

                    <div class="row">

                      <div class="col-xs-6">
                        <!-- propietario -->
                        <div class="form-group">
                          <label>Selecciona al propietario:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <select style="text-transform: capitalize;" name="owner" id="owner" class="form-control select2">
                              <option></option>
                              <?php
                                $query ="SELECT * FROM tbl_owner_system WHERE owner_group = 1";
                                $resultado = $con->query($query);
                                while($row=$resultado->fetch_assoc()){;
                              ?>
                              <option value="<?php echo $row['name_owner'];?>"><?php echo $row['name_owner'];?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-6">
                        <!-- cliente -->
                        <div class="form-group">
                          <label>Selecciona al Cliente:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <select style="text-transform: capitalize;" name="client" id="client" class="form-control select2">
                              <option></option>
                              <?php
                                $query ="SELECT * FROM tbl_owner_system WHERE owner_group = 2 OR owner_group = 3";
                                $resultado = $con->query($query);
                                while($row=$resultado->fetch_assoc()){;
                              ?>
                              <option value="<?php echo $row['name_owner'];?>"><?php echo $row['name_owner'];?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Código Propiedad: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Solo dígitos"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              DNG
                            </div>
                              <?php
                                $query ="SELECT code_property FROM tbl_property_system ORDER BY code_property DESC LIMIT 1";
                                $resultado = $con->query($query);
                                $rw_number = $resultado->fetch_assoc();
                              ?>
                            <input type="text" id="code_property" name="code_property" class="form-control" readonly value="<?php echo $rw_number['code_property']+1;?>">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Formato Precio:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-chevron-circle-down"></i>
                            </div>

                            <select name="format_price" id="format_price" class="form-control select2">
                              <option></option>
                              <option value="UF">UF</option>
                              <option value="Pesos">Pesos</option>
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Canon de Arriendo: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Solo dígitos"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                            </div>
                            <input type="text" id="canon_price" name="canon_price" class="form-control">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Administración: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Solo dígitos"></i></label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-usd"></i>
                            </div>
                            
                            <input type="text" name="comision_canon" id="comision_canon" class="form-control">
                            
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                    <!-- Button -->
                    <div class="row">
                      <div class="col-xs-12">
                        <a class="btn btn-primary pull-right btnNext">
                          Siguiente <i class="fa fa-chevron-circle-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="details">
                    <!-- primera columna -->
                    <div class="row">
                      <div class="col-xs-8">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Dirección del Inmueble: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Ingresar dirección con calle y número"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-map-marker"></i>
                            </div>
                            <input type="text" id="address_property" name="address_property" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-4">
                        <!-- propietario -->
                        <div class="form-group">
                          <label>Selecciona la Comuna:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-map-o"></i>
                            </div>
                            <select style="text-transform: capitalize;" id="city" name="city" class="form-control select2">
                              <option></option>
                              <?php
                                $query ="SELECT * FROM tbl_city_property";
                                $resultado = $con->query($query);
                                while($row=$resultado->fetch_assoc()){;
                              ?>
                              <option value="<?php echo $row['city_property'];?>"><?php echo $row['city_property'];?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                    <!-- primera columna -->
                    <div class="row">
                      <div class="col-xs-2">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Día Pago <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar día para pago"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="day_pay" name="day_pay" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-2">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Día Rendición <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar día para rendición"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="day_rend" name="day_rend" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Fecha Inicio: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar día de inicio"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" id="date_start" name="date_start" class="form-control">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Fecha Término: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar día para renovación o término"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" id="date_end" name="date_end" class="form-control">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Titular Cuenta: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar titular de la cuenta"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <input type="text" id="titular_bank" name="titular_bank" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Rut del Titular: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar el rut del titular de la cuenta"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-id-card"></i>
                            </div>
                            <input type="text" id="rut_bank" name="rut_bank" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>N° Cuenta Bancaria: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar el n° de cuenta bancaria"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="text" id="account_bank" name="account_bank" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Tipo de cuenta: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar tipo de Cuenta"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-chevron-circle-down"></i>
                            </div>
                            <select style="text-transform: capitalize;" id="type_bank" name="type_bank" class="form-control select2">
                              <option></option>
                              <?php
                                $query ="SELECT * FROM tbl_type_bank";
                                $resultado = $con->query($query);
                                while($row=$resultado->fetch_assoc()){;
                              ?>
                              <option value="<?php echo $row['type_bank'];?>"><?php echo $row['type_bank'];?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Correo confirmación: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar el correo electrónico de confirmación"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <input type="text" id="mail_confirm" name="mail_confirm" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Selecciona el Banco:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-university"></i>
                            </div>
                            <select style="text-transform: capitalize;" id="bank" name="bank" class="form-control select2">
                              <option></option>
                              <?php
                                $query ="SELECT * FROM tbl_bank_system";
                                $resultado = $con->query($query);
                                while($row=$resultado->fetch_assoc()){;
                              ?>
                              <option value="<?php echo $row['name_bank'];?>"><?php echo $row['name_bank'];?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="row">
                      

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>N° Cliente Agua:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-lightbulb-o"></i>
                            </div>
                            <input type="text" id="client_agua" name="client_agua" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>N° Cliente Luz:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-tint"></i>
                            </div>
                            <input type="text" id="client_luz" name="client_luz" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>N° Cliente Gas:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-free-code-camp"></i>
                            </div>
                            <input type="text" id="client_gas" name="client_gas" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>

                    <!-- button -->
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="btn-group pull-right">
                          
                          <a class="btn btn-primary btnPrevious">
                            <i class="fa fa-chevron-circle-left"></i> Anterior 
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
          </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btnSave" type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Guardar</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <!-- Modal EDIT -->
  <div class="modal fade" id="modalEditProperty" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">REGISTRO DE PROPIEDAD</h4>
        </div>
        <div class="modal-body" style="background-color: #efefef;">
          <form id="editProperty" method="POST">
            <input type="hidden" id="agent_designated" name="agent_designated" value="<?php nameUser($_SESSION['user_system']);?>">
            <input type="hidden" id="date_register" name="date_register" value="<?php echo date('Y-m-d');?>">
            <input type="hidden" id="id_property" name="id_property">
          <div class="row">
            <div class="col-xs-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#infoEdit" data-toggle="tab" aria-expanded="true">INFORMACIÓN BÁSICA</a></li>
                  <li class=""><a href="#detailsEdit" data-toggle="tab" aria-expanded="false">DETALLES PROPIEDAD</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="infoEdit">

                    <div class="row">

                      <div class="col-xs-6">
                        <!-- propietario -->
                        <div class="form-group">
                          <label>Propietario del Inmueble:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <input type="text" name="owner_edit" id="owner_edit" class="form-control" readonly="">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-6">
                        <!-- cliente -->
                        <div class="form-group">
                          <label>Arrendatario Actual:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <input type="text" name="client_edit" id="client_edit" class="form-control">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Código Propiedad: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Solo dígitos"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              DNG
                            </div>
                            <input type="text" id="code_edit" name="code_edit" class="form-control" readonly="">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Formato Precio:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-chevron-circle-down"></i>
                            </div>

                            <input type="text" id="format_edit" name="format_edit" class="form-control" readonly="">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Canon de Arriendo: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Solo dígitos"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-money"></i>
                            </div>
                            <input type="text" id="canon_edit" name="canon_edit" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Administración: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Solo dígitos"></i></label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-usd"></i>
                            </div>
                            
                            <input type="text" name="comision_edit" id="comision_edit" class="form-control">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                    <!-- Button -->
                    <div class="row">
                      <div class="col-xs-12">
                        <a class="btn btn-primary pull-right btnNext">
                          Siguiente <i class="fa fa-chevron-circle-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="detailsEdit">
                    <!-- primera columna -->
                    <div class="row">
                      <div class="col-xs-8">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Dirección del Inmueble: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Ingresar dirección con calle y número"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-map-marker"></i>
                            </div>
                            <input type="text" id="address_edit" name="address_edit" class="form-control" readonly="">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-4">
                        <!-- propietario -->
                        <div class="form-group">
                          <label>Selecciona la Comuna:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-map-o"></i>
                            </div>
                            <input type="text" id="city_edit" name="city_edit" class="form-control" readonly="">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                    <!-- primera columna -->
                    <div class="row">
                      <div class="col-xs-2">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Día Pago <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar día para pago"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="day_edit" name="day_edit" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-2">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Día Rendición <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar día para rendición"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="rend_edit" name="rend_edit" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Fecha Inicio: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar día de inicio"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" id="start_edit" name="start_edit" class="form-control">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Fecha Término: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar día para renovación o término"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" id="end_edit" name="end_edit" class="form-control">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Titular Cuenta: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar titular de la cuenta"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <input type="text" id="titular_edit" name="titular_edit" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Rut del Titular: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar el rut del titular de la cuenta"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-id-card"></i>
                            </div>
                            <input type="text" id="rut_edit" name="rut_edit" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>N° Cuenta Bancaria: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar el n° de cuenta bancaria"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="text" id="account_edit" name="account_edit" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Tipo de cuenta: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar tipo de Cuenta"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-chevron-circle-down"></i>
                            </div>
                            <select style="text-transform: capitalize;" id="type_edit" name="type_edit" class="form-control">
                              <?php
                                $query ="SELECT * FROM tbl_type_bank";
                                $resultado = $con->query($query);
                                while($row=$resultado->fetch_assoc()){;
                              ?>
                              <option value="<?php echo $row['type_bank'];?>"><?php echo $row['type_bank'];?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Correo confirmación: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Indicar el correo electrónico de confirmación"></i> </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <input type="text" id="mail_edit" name="mail_edit" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>Selecciona el Banco:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-university"></i>
                            </div>
                            <select style="text-transform: capitalize;" id="bank_edit" name="bank_edit" class="form-control">
                              <?php
                                $query ="SELECT * FROM tbl_bank_system";
                                $resultado = $con->query($query);
                                while($row=$resultado->fetch_assoc()){;
                              ?>
                              <option value="<?php echo $row['name_bank'];?>"><?php echo $row['name_bank'];?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="row">
                      

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>N° Cliente Agua:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-lightbulb-o"></i>
                            </div>
                            <input type="text" id="edit_agua" name="edit_agua" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>N° Cliente Luz:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-tint"></i>
                            </div>
                            <input type="text" id="edit_luz" name="edit_luz" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                      <div class="col-xs-3">
                        <!-- titulo propiedad -->
                        <div class="form-group">
                          <label>N° Cliente Gas:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-free-code-camp"></i>
                            </div>
                            <input type="text" id="edit_gas" name="edit_gas" class="form-control" autocomplete="off">
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>
                    </div>

                    <!-- button -->
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="btn-group pull-right">
                          
                          <a class="btn btn-primary btnPrevious">
                            <i class="fa fa-chevron-circle-left"></i> Anterior 
                          </a>
                          <button id="btnModify" type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Modificar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
          </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              
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
<!-- Select 2 -->
<script src="resources/bower_components/select2/dist/js/select2.full.js"></script>
<!-- Datepicker -->
<script src="resources/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="resources/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>
<!-- DataTables -->
<script src="resources/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="resources/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Rut Chileno -->
<script src="resources/dist/js/jquery.rut.js"></script>
<!-- AdminLTE App -->
<script src="resources/dist/js/adminlte.min.js"></script>
<!-- Moment.js -->
<script type="text/javascript" src="resources/dist/js/moment.min.js"></script>

<script type="text/javascript">
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

  // Script para cargar funciones JS
  $(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    cargarProperty();
    addProperty();
    editProperty();
    });

  // Cargamos la lista de propiedades en relación al propietario
  cargarProperty = function () {
        // Obtenemos el valor por el id
        // id_property = document.getElementById("id_owner_property").value;

        //REDIRECCIONAR CON BOTON JS DATATABLES
        $.fn.dataTable.ext.buttons.alert = {
            className: 'buttons-alert',
         
            action: function ( e, dt, node, config ) {
                // alert( this.text() );
                window.location.assign("https://app.propiedadesdng.com/printProperty.php");
                // window.location.assign("http://localhost/app_atenea/printProperty.php");
            }
        };

        $("#tableProperty").dataTable({
            "destroy":true,
            "order": [],//[[ 0, "desc" ]],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "dom": "<'row'<'form-inline' <'col-sm-6'B><'col-sm-6'f>>>"
          +"<rt>"
          +"<'row'<'form-inline'"
          +"<'col-sm-6 col-md-6 col-lg-6'l>"
          +"<'col-sm-6 col-md-6 col-lg-6'p>>>",//'Bfrtip'
          "buttons": [
        //Btn Imprimir
        {
            extend: 'alert',
            text: '<i class="fa fa-print"></i> Imprimir',
            className:'btn btn-default',
        },
    ],
            "ajax": {
                "url": "model/listProperty.php",
                "method": "POST"
            },
            "aoColumns": [

                //1
                { "mData": function (data, type, dataToSet) {
                 return data.agent_designated + "<br><b>DNG-"+ data.code_property +"</b><br><b>Propietario:</b> "+ data.name_owner +" <br><b>Arrendatario:</b> "+ data.name_client;}
                },
                //2
                { "mData": function (data, type, dataToSet) {
                 return "<b>Dirección:</b> "+ data.address_property +"<br><b>Comuna:</b> "+ data.city_property;}
                },
                //3
                { "mData": function (data, type, dataToSet) {
                 return "<b>Canon:</b> $"+ formatNumber.new(data.canon_price) +"<br><b>Administración:</b> $"+ formatNumber.new(data.comision_canon)+"<br><b>Día Pago:</b> "+ data.day_pay;}
                },
                //4
                { "mData": function (data, type, dataToSet) {
                 return "<b>Ingreso:</b> "+ moment(data.date_start).format('D/M/Y') +"<br><b>Término:</b> "+ moment(data.date_end).format('D/M/Y');}
                },
                //5
                { "mData": function (data, type, dataToSet) {
                 return "<b>N° Agua:</b> "+ data.client_agua +"<br><b>N° Luz:</b> "+ data.client_luz +" <br><b>N° Gas:</b> "+ data.client_gas;}
                },
                //6
                // { "mData": function (data, type, dataToSet) {
                //  return "DNG-"+ data.bank;}
                // },
                { "mData": function (data, type, dataToSet) {
                        // return "<div class='btn-group'><button button='button' onclick='mostrarProperty(" + data + ");' class='btn bg-olive' data-toggle='modal' data-target='#modalEditProperty'><i class='fa fa-edit'></i></button><a href='fichaProperty.php?property="+ data +"' class='btn btn-default'><i class='fa fa-eye'></i></a><button type='button' onclick='deleteProperty(" + data + ");' class='btn btn-danger'><i class='fa fa-trash'></i></button></div>"

                        return "<!-- Single button --><div class='ocultar-elemento btn-group'><button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Mostrar <span class='caret'></span></button><ul class='dropdown-menu'><li><a href='' onclick='mostrarProperty(" + data.id_property + ");' data-toggle='modal' data-target='#modalEditProperty'><i class='fa fa-edit'></i>Editar Inmueble</a></li><li><a href='fichaProperty.php?property="+ data.id_property +"'><i class='fa fa-eye'></i>Ficha Inmueble</a></li><li><a herf='' onclick='deleteProperty(" + data.id_property + ");'><i class='fa fa-trash'></i> Eliminar Inmueble</a></li><li role='separator' class='divider'></li><li><a herf='' >Pronto!</a></li></ul></div>"
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

  var mostrarProperty = function (id_property) {

        if (!/^([0-9])*$/.test(id_property)) {
            return false
        } else {
            $.ajax({
                url: "model/searchProperty.php",
                method: "POST",
                dataType: "json",
                data: {id_property: id_property},
                success: function (datos) {
                    $('#id_property').val(datos.id_property);
                    $('#owner_edit').val(datos.name_owner);
                    $('#client_edit').val(datos.name_client);
                    $('#code_edit').val(datos.code_property);
                    $('#format_edit').val(datos.format_price);
                    $('#canon_edit').val(datos.canon_price);
                    $('#comision_edit').val(datos.comision_canon);
                    //
                    $('#address_edit').val(datos.address_property);
                    $('#city_edit').val(datos.city_property);
                    $('#day_edit').val(datos.day_pay);
                    $('#rend_edit').val(datos.day_rend);
                    $('#start_edit').val(datos.date_start);
                    $('#end_edit').val(datos.date_end);
                    $('#titular_edit').val(datos.titular_bank);
                    $('#rut_edit').val(datos.rut_bank);
                    $('#account_edit').val(datos.account_bank);
                    $('#type_edit').val(datos.type_bank);
                    $('#mail_edit').val(datos.mail_confirm);
                    $('#bank_edit').val(datos.bank);
                    $('#edit_agua').val(datos.client_agua);
                    $('#edit_luz').val(datos.client_luz);
                    $('#edit_gas').val(datos.client_gas);
                }
            });
        }
    }

  //Script para eliminar propiedad del registro
  var deleteProperty = function (id_property) {

        if (!/^([0-9])*$/.test(id_property)) {
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
                    url: "model/deleteProperty.php",
                    method: "POST",
                    data: {id_property: id_property},
                    success: function (data) {
                        if (data == 'ok') {
                          swal("Eliminado! El registro fue eliminado.", {
                            icon: "success",
                          });
                          cargarProperty();
                        }
                    }
                });
                
              } else {
                swal("Que bien, no se ha eliminado el registro!");
              }
            });
        }
    }

  var editProperty = function (id_property) {
        $('#editProperty').submit(function (e) {
            var datos = $(this).serialize();
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "model/editPropertyModel.php",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        swal({
                          title: "Actualizado!",
                          text: "El registro fue actualizado.",
                          icon: "success",
                          button: "Ok",
                        });
                        cargarProperty();
                        $('#editProperty')[0].reset();
                        $('#modalEditProperty').modal('hide');
                        // console.log('Exitazooooooo');
                    } else if (data == 'vacio') {
                        swal({
                          title: "Algo salio mal!",
                          text: "Intentalo nuevamente, no puedes incluir campos vacios, ni caracteres extraños.",
                          icon: "error",
                          button: "Cerrar",
                        });
                        $('#editProperty')[0].reset();
                        $('#modalEditProperty').modal('hide');
                    } else {
                        console.log(data);
                    }
                }
            });
        });
    }

  //Script para añadir propiedad al registro
  var addProperty = function () {
        $('#addProperty').submit(function (e) {
            e.preventDefault();
            var datos = $(this).serialize();
            // console.log(datos);
            $.ajax({
                type: "POST",
                url: "model/addProperty.php",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        swal({
                          title: "Buen Trabajo!",
                          text: "El inmueble fue registrado.",
                          icon: "success",
                          button: "Ok",
                        });
                        cargarProperty();
                        $('#addProperty')[0].reset();
                        $('#modalAddProperty').modal('hide');
                        // console.log('Exitazooooooo');
                    } else if (data == 'vacio') {
                        swal({
                          title: "Algo salio mal!",
                          text: "Un campo esta vacío, recuerda registrar todos los datos.",
                          icon: "error",
                          button: "Cerrar",
                        });
                        $('#addProperty')[0].reset();
                        $('#modalAddProperty').modal('hide');
                    } else {
                        console.log(data);
                    }
                }
            });
        });
    }

  //Llamamos a la función para formatear RUT Chileno
  $("#rut_bank").rut();
  //Llamamos a la función para formatear RUT Chileno
  $("#rut_edit").rut();

  $('.btnNext').click(function(){
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
  });

  $('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
  });
</script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
</body>
</html>