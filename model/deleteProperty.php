<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_property = $_POST['id_property'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_property);

	//Valido que los campos no esten vacios
	if (empty($id_property)) {
	    echo "vacio";

	} else {
	    $query = "DELETE FROM tbl_property_system WHERE id_property = '$id_property' ";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>