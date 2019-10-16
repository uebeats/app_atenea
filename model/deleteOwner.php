<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_owner = $_POST['id_owner_property'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_owner);

	//Valido que los campos no esten vacios
	if (empty($id_owner)) {
	    echo "vacio";

	} else {
	    $query = "DELETE FROM tbl_owner_system WHERE id_owner_property = '$id_owner' ";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>