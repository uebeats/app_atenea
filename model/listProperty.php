<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$datos['data'] = [];

	// $key = $_GET['id_property'];

	$query = "SELECT * FROM tbl_property_system ORDER BY code_property DESC";
	$resultado = $con->query($query);
	while ($row = $resultado->fetch_array()){
		$datos['data'][] = $row;
	}

	echo json_encode($datos);

?>