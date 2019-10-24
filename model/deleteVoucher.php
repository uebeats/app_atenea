<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_voucher = $_POST['id_voucher_mov'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_voucher);

	//Valido que los campos no esten vacios
	if (empty($id_voucher)) {
	    echo "vacio";

	} else {
	    $query = "DELETE FROM tbl_voucher_movement WHERE id_voucher_mov = '$id_voucher'";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>