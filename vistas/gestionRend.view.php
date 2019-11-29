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
        <div class="col-lg-6" style="padding-bottom: 10px">
          <div class="btn-group">
            <a href="rendDocument.php" class="btn btn-success"><i class="fa fa-plus-circle"></i> Nueva Rendición</a>
            <button type="button" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Nueva Cotización</button>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Notas de Pago Emitidas -->
        <div class="col-lg-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Notas de Pago - Sin Administración</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
               <table id="rend_data" class="table table-borderless table-hover table-striped" style="font-size: 1.2rem" width="100%">
                <thead>
                  <tr>
                    <th width="50">N°</th>
                    <th>DETALLES</th>
                    <th>MONTO</th>
                    <th>ESTADO</th>
                    <th width="80">OPCIONES</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <!-- Notas de Cobro Emitidas -->
        <div class="col-lg-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Cotizaciones Inmuebles Emitidas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <table id="chargenote_data" class="table table-borderless table-hover table-striped" style="font-size: 1.2rem" width="100%">
                <thead>
                  <tr>
                    <th width="50">N°</th>
                    <th>DETALLES</th>
                    <th>MONTO</th>
                    <th>ESTADO</th>
                    <th width="80">OPCIONES</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Toastr 2.1.4 -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="resources/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="resources/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="resources/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Moment.js -->
<script type="text/javascript" src="resources/dist/js/moment.min.js"></script>
<!-- Ventana Centrada JS -->
<script type="text/javascript" src="resources/dist/js/VentanaCentrada.js"></script>

<script type="text/javascript">

  $(document).ready(function(){
    // Display an info toast with no title
    toastr.warning('30 días para actualizar IPC a "Property"')

    $('#formAmount').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    // swal(datos);
      $.ajax({
        type: "POST",
        url: "model/amountForDate.php",
        data: datos,
        success: function (data, type) {
          // console.log(data);
          $('#totalCons').html(data);
          // $('#totalAdmin').html(data);
        }
      });
    });
  })

  $(document).ready(function(){
    cargarPayNote();
    cargarChargeNote();
  })


  // Cargamos la lista de propiedades en relación al propietario
  cargarPayNote = function () {

        $("#rend_data").dataTable({
            "destroy":true,
            "order": false,//[[ 0, "desc" ]],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "ajax": {
                "url": "model/listAllRend.php",
                "method": "POST"
            },
            "aoColumns": [

                // //1
                // { "mData": function (data, type, dataToSet) {
                //  return data.id_paynote;}
                // },
                //2
                { "mData": function (data, type, dataToSet) {
                 return "N° " + data.number_rend;}
                },
                //3
                { "mData": function (data, type, dataToSet) {
                 return "<b>Para:</b> " + data.name_owner + "<br><b>Emisión:</b> " + moment(data.date_register).format('D/M/Y') +"<br><b>Dirección:</b> " + data.address_property ;}
                },
                //4
                { "mData": function (data, type, dataToSet) {
                 return "$"+ formatNumber.new(data.total_amount);}
                },
                //5
                { "mData": function (data, type, dataToSet) {

                  if (data.status_rend === 'Pagado') {
                    return "<label class='label label-success'>"+ data.status_rend +"</label>";
                  }else{
                    return "<label class='label label-danger'>"+ data.status_rend +"</label>";
                  }
                 }
                },

                //8
                { "mData": function (data, type, dataToSet) {

                  if (data.status_rend === 'Pagado') {
                    var btnPag = '<button onclick=checkNotePay('+data.id_rend+') class="btn btn-success"><i class="fa fa-check"></i></button>';
                  }else{
                    var btnPag = '<button onclick=checkNotePay('+data.id_rend+') class="btn btn-danger"><i class="fa fa-times"></i></button>';
                  }

                  return '<div class="btn-group btn-group-sm"><button button="button" onclick="mostrarPdf(' + data.number_rend + ')" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></button>'+ btnPag +'</div>'
                    }

                    // <button onclick=checkNotePay("'+data.status_paynote+'") class="btn btn-success">boton</button>

                  
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
        "sSearch": "<b>Filtrar</b> <i class='fa fa-search'></i>:",
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
  cargarChargeNote = function () {

        $("#chargenote_data").dataTable({
            "destroy":true,
            "order": false,//[[ 0, "desc" ]],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "ajax": {
                "url": "model/listAllCharge.php",
                "method": "POST"
            },
            "aoColumns": [
                //2
                { "mData": function (data, type, dataToSet) {
                 return "N° " + data.number_chargenote;}
                },
                //3
                { "mData": function (data, type, dataToSet) {
                 return "<b>Para: </b>"+ data.name_owner +"<br><b>Emisión:</b> " + moment(data.date_register).format('D/M/Y') + "<br><b>Dirección:</b> " + data.address_property ;}
                },
                //4
                { "mData": function (data, type, dataToSet) {
                 return "$"+ formatNumber.new(data.total_amount);}
                },
                //5
                { "mData": function (data, type, dataToSet) {

                  if (data.status_chargenote === 'Pagado') {
                    return "<label class='label label-success'>"+ data.status_chargenote +"</label>";
                  }else{
                    return "<label class='label label-danger'>"+ data.status_chargenote +"</label>";
                  }
                 }
                },

                //8
                { "mData": function (data, type, dataToSet) {

                  if (data.status_chargenote === 'Pagado') {
                    var btnPag = '<button onclick=checkChargePay('+data.id_chargenote+') class="btn btn-success"><i class="fa fa-check"></i></button>';
                  }else{
                    var btnPag = '<button onclick=checkChargePay('+data.id_chargenote+') class="btn btn-danger"><i class="fa fa-times"></i></button>';
                  }

                  return '<div class="btn-group btn-group-sm"><button button="button" onclick="mostrarCharge(' + data.number_chargenote + ')" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></button>'+ btnPag +'</div>'
                    }

                    // <button onclick=checkNotePay("'+data.status_paynote+'") class="btn btn-success">boton</button>

                  
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

  var mostrarPdf = function(number_paynote){
    if (!/^([0-9])*$/.test(number_paynote)) {
      return false
    } else {
      VentanaCentrada('./resources/dompdf/pdf_rendnote.php?number='+number_paynote,'Comprobante - Nota de Pago','','1024','768','true');
    }
  }

  //Script JS
  var checkNotePay = function (id_paynote) {

    if (!/^([0-9])*$/.test(id_paynote)) {
      return false
    } else {

      swal({
        title: "¿Cambiar estado de Pago?",
        // text: "Recuerda verificar la recepcion con el destinatario, una vez enviado el documento.",
        text: "El número de nota de pago es: "+id_paynote+"",
        icon: "info",
        buttons: ['Cancelar','Aceptar'],
        dangerMode: false,
      })

      .then((willSend) => {
        if (willSend) {
          $('.loader').show();
          $.ajax({
            url: "model/updateStatusNotePay.php",
            method: "POST",
            data: {id_paynote: id_paynote},
            success: function (data) {
              if (data == 'ok') {
                swal({
                  title: "Buen Trabajo!",
                  text: "El estado ha cambiado.",
                  icon: "success",
                  button: "Ok",
                });
                $('.loader').hide();
                cargarPayNote();
              } else if (data == 'vacio') {
                swal({
                  title: "Algo salio mal!",
                  text: "El estado no pudo ser cambiado.",
                  icon: "error",
                  button: "Cerrar",
                });
                $('.loader').hide();
                cargarPayNote();
              } else {
                console.log(data);
                $('.loader').hide();
                cargarPayNote();
              }
              // $('.loader').hide();
              // swal("Genial! El mensaje ha sido enviado satisfactoriamente.", {
              //   icon: "success",
              // });
              // cargarPayNote();
            }
          });

        } else {
          swal("El estado de la Nota de Pago no fue cambiado");
        }
      });
    }
  }
  //Script JS
  var checkChargePay = function (id_chargenote) {

    if (!/^([0-9])*$/.test(id_chargenote)) {
      return false
    } else {

      swal({
        title: "¿Cambiar estado de Cobro?",
        // text: "Recuerda verificar la recepcion con el destinatario, una vez enviado el documento.",
        text: "El número de nota de cobro es: "+id_chargenote+"",
        icon: "info",
        buttons: ['Cancelar','Aceptar'],
        dangerMode: false,
      })

      .then((willSend) => {
        if (willSend) {
          $('.loader').show();
          $.ajax({
            url: "model/updateStatusChargePay.php",
            method: "POST",
            data: {id_chargenote: id_chargenote},
            success: function (data) {
              if (data == 'ok') {
                swal({
                  title: "Buen Trabajo!",
                  text: "El estado ha cambiado.",
                  icon: "success",
                  button: "Ok",
                });
                $('.loader').hide();
                cargarChargeNote();
              } else if (data == 'vacio') {
                swal({
                  title: "Algo salio mal!",
                  text: "El estado no pudo ser cambiado.",
                  icon: "error",
                  button: "Cerrar",
                });
                $('.loader').hide();
                cargarChargeNote();
              } else {
                console.log(data);
                $('.loader').hide();
                cargarChargeNote();
              }
              // $('.loader').hide();
              // swal("Genial! El mensaje ha sido enviado satisfactoriamente.", {
              //   icon: "success",
              // });
              // cargarPayNote();
            }
          });

        } else {
          swal("El estado de la Nota de Pago no fue cambiado");
        }
      });
    }
  }

  var mostrarCharge = function(number_chargenote){
    if (!/^([0-9])*$/.test(number_chargenote)) {
      return false
    } else {
      VentanaCentrada('./resources/dompdf/pdf_chargenote.php?number='+number_chargenote,'Nota de Pago','','1024','768','true');
    }
  }

</script>

</body>
</html>