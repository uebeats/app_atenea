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
	    $query = "DELETE FROM tbl_paynote_system WHERE id_paynote = '$id_paynote' ";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>