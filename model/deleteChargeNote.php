<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_chargenote = $_POST['id_chargenote'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_chargenote);

	//Valido que los campos no esten vacios
	if (empty($id_chargenote)) {
	    echo "vacio";

	} else {
	    $query = "DELETE FROM tbl_chargenote_system WHERE id_chargenote = '$id_chargenote' ";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>