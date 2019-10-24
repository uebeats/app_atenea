<?php
	/*-------------------------
	    Autor: Jesús Caballero P.
	    Web: www.propiedadesdng.com
	    Mail: jesus@propiedadesdng.com
	---------------------------*/

  	require_once ("../at-config/conexion.php");//Contiene funcion que conecta a la base de datos

	if (!empty($_FILES)) {
		if(is_uploaded_file($_FILES['uploadVoucher']['tmp_name'])){

			$errorType = $_FILES['uploadVoucher']['error'];

			$srcPath = $_FILES['uploadVoucher']['tmp_name']; //Nombre temporal del archivo
			$nombrefinal = trim ($_FILES['uploadVoucher']['name']); //Eliminamos los espacios en blanco
			$nombrefinal = str_replace(" ", "-", $nombrefinal); //Sustituye una expresión regular
			$trgPath = "../doc/".$nombrefinal; //Ruta del archivo


			if(move_uploaded_file($srcPath, $trgPath)){

				$docType = $_FILES['uploadVoucher']['type'];

				$name = $_POST['name_voucher'];
				$id_property = $_POST['id_property'];
				$movement = $_POST['movement'];

				$query = "INSERT INTO tbl_voucher_movement (id_property,name_movement,name_voucher,url_voucher,type_file_voucher) VALUES ('$id_property', '$movement', '$nombrefinal', '$trgPath', '$docType')";

				$res = $con->query($query);

				if($docType === 'image/jpeg' or 'image/png') {
					echo '<img class="thumbnail" src="atenea/'. $trgPath .'" width="200">';
				}else{
					echo '<img class="thumbnail" src="resources/dist/img/pdf-icon-300x300.png" width="100">';
				}
			?>
				<div class="alert alert-info alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Exito!</h4>
	                El comprobante o registro de gasto fue subido satisfactoriamente.
	                Código: <?php echo $errorType ."<br>". $docType;?>
	            </div>
			<?php
			}
		}
	}
?>