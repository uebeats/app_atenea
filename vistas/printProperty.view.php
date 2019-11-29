<?php

	//ob_start guardará en un búfer lo que esté
	//en la ruta del include.
	ob_start();

	/* Connect To Database*/
    require_once ('at-config/conexion.php');//Contiene funcion que conecta a la base de datos
    //Funciones
    require_once 'model/functions.php';

    $fecha = date_default_timezone_set('America/Santiago');

    global $fecha;

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <title>Lista de Inmuebles en Administración</title>
    	<link rel="stylesheet" href="resources/dist/css/print_styles.css" type="text/css">
    </head>

    <body marginwidth="0" marginheight="0">

    	<div id="body">

    		<div id="section_header">
    		</div>

    		<div id="content">

    			<div class="page" style="font-size: 7pt">

    				<table class="change_order_items">

    					
    					<tbody style="font-size: 10px">
    						<tr>
                                <th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">#</th>
    							<th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">DNG</th>
    							<th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">Propietario</th>
    							<th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">Arrendatario</th>
    							<th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">Canon</th>
    							<th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">Día Pago</th>
                                <th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">Pago</th>
                                <th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">Rendición</th>
                                <th style="background: #f5f5f5;text-align: center;border-left: 1px solid #000">Agente</th>

    						</tr>
                            <?php
                                $items = 0;

                                $qry = "SELECT * FROM tbl_property_system ORDER BY name_owner ASC";
                                $result = $con->query($qry);
                                while($rw = $result->fetch_assoc()){
                                    $items++;
                            ?>
    						<tr class="even_row">
                                <td style="padding:2px;text-align: center;background: white;"><?php echo $items;?></td>
    							<td style="padding:2px;text-align: center;background: white;"><?php echo $rw['code_property'];?></td>
    							<td style="padding:2px;text-align: center;background: white;"><?php echo $rw['name_owner'];?></td>
    							<td style="padding:2px;text-align: center;background: white;"><?php echo $rw['name_client'];?></td>
    							
    							<td style="padding:2px;text-align: center;background: white;"><?php $amount = $rw['canon_price']; echo "$" . number_format($amount, 0,'','.')?></td>
                                <td style="padding:2px;text-align:center;background: white;"><?php echo $rw['day_pay'];?></td>
    							<td style="padding:2px;background: white;text-align: center"><img src="resources/dist/img/casilla.png" width="10"></td>
                                <td style="padding:2px;background: white;text-align: center"><img src="resources/dist/img/casilla.png" width="10"></td>
                                <td style="padding:2px;text-align:center;background: white;"><?php echo $rw['agent_designated'];?></td>

    						</tr>
    						<?php
		    			     }
	    					?>

    					</tbody>
    				</table>

    				<table style="width: 100%; font-size: 12px;padding-top:40px;text-align: center;">
    					<tbody>
    						<tr>
                                <?php
                                $qry = "SELECT * FROM tbl_property_system";
                                $result = $con->query($qry);
                                $rw = $result->fetch_assoc();
                                ?>
    							<td>Informe de propiedades solicitado por <strong><?php echo $rw['agent_designated'];?></strong></td>
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
    require_once 'resources/dompdf/autoload.inc.php';

	// Reference the Dompdf namespace 
    use Dompdf\Dompdf; 

	// Instantiate and use the dompdf class 
    $dompdf = new Dompdf();

	// Load content from html file
	// $html = file_get_contents('../dompdf/pdf.php');
    $dompdf->loadHtml(ob_get_clean()); 

	// (Optional) Setup the paper size and orientation 
    $dompdf->setPaper('P', 'A4', 'landscape'); 

	// Render the HTML as PDF 
    $dompdf->render(); 

	// Output the generated PDF (1 = download and 0 = preview) 
    $dompdf->stream("Lista de inmuebles en administarción", array("Attachment" => 0));

?>