<?php
	/*-------------------------
	    Autor: Jesús Caballero P.
	    Web: www.propiedadesdng.com
	    Mail: jesus@propiedadesdng.com
	---------------------------*/

  	require_once ("../at-config/conexion.php");//Contiene funcion que conecta a la base de datos

	if (!empty($_FILES)) {
		if(is_uploaded_file($_FILES['uploadVoucher']['tmp_name'])){
			$srcPath = $_FILES['uploadVoucher']['tmp_name'];
			$nameFile = $srcPath;
			
			$errorType = $_FILES['uploadVoucher']['error'];
			$trgPath = "../doc/".$_FILES['uploadVoucher']['name'];

			if(move_uploaded_file($srcPath, $trgPath)){

				// $docType = $_FILES['uploadVoucher']['type'];
				// $insert = 'INSERT INTO tbl_voucher_movement (name_voucher, url_voucher, type_file_voucher) VALUES ($da, $da, $type_file_voucher)';
				// $res = $con->query($insert);
			?>
				<?php 
					if($docType === 'image/jpeg') {
						echo '<img class="thumbnail" src="atenea/'. $trgPath .'" width="200">';
					}
					if ($docType === 'application/pdf') {
						echo '<img class="thumbnail" src="resources/dist/img/pdf-icon-300x300.png" width="100">';
					}
				?>
				<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Exito!</h4>
	                Success alert preview. This alert is dismissable.
	            </div>
			<?php
			}
		}
	}
?>