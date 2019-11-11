<?php
    /*-------------------------
    Autor: Jesus Caballero
    Web: propiedadesdng.com
    Mail: jesus@propiedadesdng.com
    ---------------------------*/

    //ob_start guardará en un búfer lo que esté
    //en la ruta del include.
    ob_start();

    /* Connect To Database*/
    require_once ('../at-config/conexion.php');//Contiene funcion que conecta a la base de datos

    //Funciones
    require_once 'functions.php';

    $fecha = date_default_timezone_set('America/Santiago');

    global $fecha;

    $number = $_GET['number'];
    $q = "SELECT * FROM tbl_paynote_system WHERE number_paynote = '$number'";
    $rs = $con->query($q);
    $rw_paynote = $rs->fetch_assoc();

    $name = $rw_paynote['name_owner'];
    $query = "SELECT * FROM tbl_owner_system WHERE name_owner = '$name'";
    $res = $con->query($query);
    $rw_owner = $res->fetch_assoc();

    $id_property = $rw_paynote['id_property'];
    $qry = "SELECT * FROM tbl_property_system WHERE id_property = '$id_property'";
    $result = $con->query($qry);
    $rw_property = $result->fetch_assoc();

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <title>Nota de Pago</title>
        <link rel="stylesheet" href="../resources/dist/css/print_styles.css" type="text/css">
    </head>

    <body marginwidth="0" marginheight="0">

        <div id="body">

            <div id="section_header">
            </div>

            <div id="content">

                <div class="page" style="font-size: 7pt">
                    <table style="width: 100%;padding-bottom: 10px" class="header">
                        <tbody>
                            <tr>
                                <td><h1 style="text-align: left;"><img src="../resources/dist/img/logo-quote.png" style="width: 150px"></h1></td>
                                <td><p style="text-align: center;font-size: 12px"><b>Inmobiliaria de Los Valles Limitada</b><br> contacto@propiedadesdng.com<br>Casa Matriz: Cajales #34, San Felipe<br>Teléfono: (+56) 9 9848 0003</p></td>

                                <td><h1 style="padding-right:30px;font-size: 15px">NOTA DE PAGO N°<?php echo $rw_paynote['number_paynote'];?></h1></td>
                            </tr>
                            
                        </tbody>
                    </table>

                    <table style="width: 100%; font-size: 12px;padding: 10px 0 10px 0" class="header">
                        <tbody>
                            <tr>
                                <td>Propietario: <b><?php echo $rw_owner['name_owner'];?></b></td>
                                <td>Agente: <b><?php echo $rw_paynote['agent_admin'];?></b></td>
                            </tr>

                            <tr>
                                <td>Rut Propietario: <strong><?php echo $rw_owner['rut_owner'];?></strong></td>
                                <td>Emisión: <strong><?php $originalDate = $rw_paynote['date_register']; $newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate;?></strong></td>
                            </tr>

                            <tr>
                                <td>Dirección: <strong><?php echo $rw_paynote['address_property'];?></strong></td>
                                <td>Registro DNG: <strong><?php echo $rw_property['code_property'];?></strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="change_order_items">

                        
                        <tbody style="font-size: 12px">
                            <tr>
                                <th style="text-align: center">Item</th>
                                <th style="text-align: center">Descripción</th>
                                <th style="text-align: center">Qty</th>
                                <th colspan="2" style="text-align: center">Unitario</th>
                                <th style="text-align: center">Total</th>
                            </tr>
                            <?php
                                $tax = 0;

                                $select = "SELECT * FROM tbl_detalle_paynote WHERE id_number_paynote = '$number'";
                                $result = $con->query($select);

                                $items=1;
                                $suma = 0;

                                while($r = $result->fetch_assoc()){

                                    $total = $r['tmp_quantity']*$r['tmp_amount'];
                            ?>
                            <tr class="even_row">
                                <td style="text-align: center"><?php echo $items;?></td>
                                <td><?php echo $r['tmp_description'];?></td>
                                <td style="text-align: center"><?php echo $r['tmp_quantity'];?></td>
                                <td style="text-align: right; border-right-style: none;">$</td>
                                <td class="change_order_unit_col" style="border-left-style: none;"><?php $amount = $r['tmp_amount']; echo number_format($amount, 0,'','.')?></td>
                                <td class="change_order_total_col">$ <?php echo number_format($total, 0,'','.');?></td>
                            </tr>
                            <?php
                                    $items++;
                                    $suma+= $total;
                                }
                                $iva = $suma * ($tax / 100);
                                $total_iva = number_format($iva);   
                                $total = $suma + $total_iva;
                            ?>

                        </tbody>

                        <tbody style="font-size: 12px">
                            <tr>
                                <td colspan="3" style="text-align: right;">Estado: <span style="text-transform: uppercase;"><?php echo $rw_paynote['status_paynote'];?></span></td>
                                <td colspan="2" style="text-align: right;"><strong>TOTAL OPERACIÓN:</strong></td>
                                <td class="change_order_total_col"><strong>$<?php echo number_format($total, 0,'','.');?></strong></td>
                            </tr>
                        </tbody>

                        <tbody>
                            <tr>
                                <td colspan="6" style="font-size: 12px; padding-bottom: 10px"><h2>Resumen:</h2><?php echo $rw_paynote['obs_paynote'];?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="change_order_history">

                        
                        <tbody style="font-size: 12px">
                            <tr>
                                <th colspan="4" style="text-align: center">Historial de Últimos 5 pagos</th>
                            </tr>
                            <?php
                                $id = $rw_property['id_property'];
                                $select = "SELECT * FROM tbl_paynote_system WHERE id_property = '$id' LIMIT 3";
                                $result = $con->query($select);
                                while($r_paynote = $result->fetch_assoc()){
                            ?>
                            <tr class="even_row">
                                <td class="change_order_unit_col" style="border-left-style: none;text-align: center;">N° <?php echo $r_paynote['number_paynote'];?></td>
                                <td style="border-left-style: none;text-align: center;"><?php $originalDate = $r_paynote['date_register']; $newDate = date("d-m-y", strtotime($originalDate)); echo $newDate;?></td>
                                <td class="change_order_total_col" style="border-left-style: none;text-align: center;">$ <?php echo number_format($r_paynote['total_amount'], 0,'','.');?></td>
                                <td class="change_order_unit_col" style="border-left-style: none;text-align: center;"><?php echo $r_paynote['status_paynote'];?></td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                    <table class="change_order_history" style="width: 100%; border-bottom: 1px solid black; border-top: 1px solid black;font-size: 12px;">
                        <tbody>
                            <tr>
                                <td colspan="4" style="font-size: 12px;"><h2 style="margin-bottom: 0">Forma de Pago: <?php echo $rw_paynote['pago_paynote'];?></h2>
                                Estimado Cliente, el monto total mostrado en esta nota de pago fue integramente abonado a la cuenta bancaria que se indica a continuación:</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td>N° Cuenta: <strong><?php echo $rw_property['account_bank'];?></strong></td>
                                
                                <td>Banco: <strong><?php echo $rw_property['bank'];?></strong></td>
                                <td>Cuenta: <strong><?php echo $rw_property['type_bank'];?></strong></td>
                                <td>Correo: <strong><?php echo $rw_property['mail_confirm'];?></strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <table style="width: 100%; font-size: 12px;padding-top:40px;text-align: center;">
                        <tbody>
                            <tr>
                                <td>Nota de Pago emitida por <strong><?php echo $rw_paynote['agent_designated'];?></strong></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <script type="text/php">

            if ( isset($pdf) ) {

            $font = Font_Metrics::get_font("verdana");
            // If verdana isn't available, we'll use sans-serif.
            if (!isset($font)) { Font_Metrics::get_font("sans-serif"); }
            $size = 6;
            $color = array(0,0,0);
            $text_height = Font_Metrics::get_font_height($font, $size);

            $foot = $pdf->open_object();

            $w = $pdf->get_width();
            $h = $pdf->get_height();

            // Draw a line along the bottom
            $y = $h - 2 * $text_height - 24;
            $pdf->line(16, $y, $w - 16, $y, $color, 1);

            $y += $text_height;

            $text = "Job: 132-003";
            $pdf->text(16, $y, $text, $font, $size, $color);

            $pdf->close_object();
            $pdf->add_object($foot, "all");

            global $initials;
            $initials = $pdf->open_object();

            // Add an initals box
            $text = "Initials:";
            $width = Font_Metrics::get_text_width($text, $font, $size);
            $pdf->text($w - 16 - $width - 38, $y, $text, $font, $size, $color);
            $pdf->rectangle($w - 16 - 36, $y - 2, 36, $text_height + 4, array(0.5,0.5,0.5), 0.5);


            $pdf->close_object();
            $pdf->add_object($initials);

            // Mark the document as a duplicate
            $pdf->text(110, $h - 240, "DUPLICATE", Font_Metrics::get_font("verdana", "bold"),
            110, array(0.85, 0.85, 0.85), 0, 0, -52);

            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";  

            // Center the text
            $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
            $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);

        }
    </script>
</body>
</html>
<?php

    // Include autoloader 
    require_once '../resources/dompdf/autoload.inc.php';

    // Reference the Dompdf namespace 
    use Dompdf\Dompdf; 

    // Instantiate and use the dompdf class 
    $dompdf = new Dompdf();

    //Variables por GET
    $number = $_GET['number'];

    // Load content from html file
    // $html = file_get_contents('../dompdf/pdf.php');
    $dompdf->loadHtml(ob_get_clean()); 

    // (Optional) Setup the paper size and orientation 
    $dompdf->setPaper('P', 'Letter', 'landscape'); 

    // Render the HTML as PDF 
    $dompdf->render();

    $timestamp = date('YmdGis') . $number;

    $filename =  'tmp_pdf/'. $timestamp . '.pdf';

    // Output the generated PDF (1 = download and 0 = preview) 
    // $dompdf->stream("Nota de Pago", array("Attachment" => 0));
    $file = $dompdf->output();

    file_put_contents($filename, $file);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../resources/PHPMailer/src/Exception.php';
    require '../resources/PHPMailer/src/PHPMailer.php';
    require '../resources/PHPMailer/src/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    	// Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'contacto@propiedadesdng.com';          // SMTP username
        $mail->Password   = 'granallas1';                           // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->CharSet    = 'UTF-8';                                // Activa la condificacción utf-8
        $mail->Port       = 587;                                    // TCP port to connect to

        $emailTo = $rw_owner['email_owner'];
        $nameTo = $rw_owner['name_owner'];

        //Recipients
        $mail->setFrom('contacto@propiedadesdng.com', 'Propiedades DNG | Servicios Inmobiliarios');
        $mail->addAddress($emailTo, $nameTo);                       // Add a recipient
        $mail->addReplyTo('contacto@propiedadesdng.com', 'Propiedades DNG | Servicios Inmobiliarios');
        $mail->addCC('contacto@propiedadesdng.com');
        $mail->addCC('jesus@propiedadesdng.com');
        $mail->addCC('info@propiedadesdng.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
        $mail->addAttachment($filename, 'Nota de Pago');            // Optional name

        // Content
        $number = $_GET['number'];
        $q = "SELECT name_owner FROM tbl_paynote_system WHERE number_paynote = '$number'";
        $res = $con->query($q);
        $row = $res->fetch_assoc();
        $name_owner = $row['name_owner'];

        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'IMPORTANTE | Nota de Pago N°'.$number.'';
        $mail->Body    = '<b>Estimado/a '.$name_owner.',</b><br>Junto con saludar, le indicamos que hemos adjuntado a este correo electronico la Nota de Pago N°'.$number.'.<br> Si tiene alguna duda, consulta o sugerencia, puede responder a este correo electronico o llamar a los telefonos indicados en la firma.<br><br>
        <b>Propiedades DNG </b><br> Damos valor a tu propiedad <br>Encuentranos en Cajales 34, San Felipe <br>Contactanos al +569 9848 0003 o al +569 7774 2140 <br>info@propiedadesdng.com<br><small>P.D.: Los tildes han sido omitidos en forma intencional.</small>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>