<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$type = $_POST['type_movement'];

	//Evitar la inyecciones sql
	$con->real_escape_string($type);

	//Valido que los campos no esten vacios
	if (empty($type)) {
	    echo "vacio";

	} else {
	    $query = "INSERT INTO tbl_type_movement (name_movement) VALUES ('$type')";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>