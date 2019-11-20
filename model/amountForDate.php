<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$start = $_POST['start_date'];
	$end = $_POST['end_date'];
	$de = $_POST['from_table'];

	$query = "SELECT $de FROM tbl_property_system WHERE date_register BETWEEN '$start' AND '$end'";
	$resultado = $con->query($query);

	$suma = 0;

	while ($data = $resultado->fetch_assoc()){
		$de = $_POST['from_table'];
		$total = $data[$de];
		$suma+=$total;
	}
	echo number_format($suma,0 , " ", ".");
?>