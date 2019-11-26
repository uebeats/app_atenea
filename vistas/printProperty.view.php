<!DOCTYPE html>
<html lang="es_ES">
<head>
  <?php include 'head.php';?>
</head>
<body onload="window.print();">
<!-- <body> -->
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>DNG</th>
            <th>Propietario</th>
            <th>Arrendatario</th>
            <th>Canon</th>
            <th>Fecha de Pago</th>
            <th>Pagado</th>
            <th>Rendido</th>
          </tr>
          </thead>
          <tbody>
          <?php

          $select = "SELECT * FROM tbl_property_system";
          $res = $con->query($select);
          while($row = $res->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['code_property'];?></td>
            <td><?php echo $row['name_owner'];?></td>
            <td><?php echo $row['name_client'];?></td>
            <td><?php $monto = $row['canon_price']; echo "$" . number_format($monto, 0,"", ".")?></td>
            <td><?php echo $row['day_pay'] . " de cada mes";?></td>
            <td class="text-center"><i class="fa fa-square-o"></i></td>
            <td class="text-center"><i class="fa fa-square-o"></i></td>
          </tr>
          <?php
      		}
      	  ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>