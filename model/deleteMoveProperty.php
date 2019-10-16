<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_move = $_POST['id_move_property'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_move);

	//Valido que los campos no esten vacios
	if (empty($id_move)) {
	    echo "vacio";

	} else {
	    $query = "DELETE FROM tbl_move_property WHERE id_move_property = '$id_move' ";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>