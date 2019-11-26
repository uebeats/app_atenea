<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_paynote = $_POST['id_paynote'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_paynote);

	//Valido que los campos no esten vacios
	if (empty($id_paynote)) {
	    echo "vacio";

	} else {
	    $query = "DELETE FROM tbl_paynote_system WHERE number_paynote = '$id_paynote' ";
	    $resultado = $con->query($query);
	    if ($resultado) {
	    	$del = "DELETE FROM tbl_detalle_paynote WHERE id_number_paynote = '$id_paynote'";
	    	$res = $con->query($del);
	    	
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>