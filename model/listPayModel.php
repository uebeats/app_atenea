<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$datos['data'] = [];

	$id = $_GET['property'];

	// $id_group = 2;
	// WHERE owner_group = '2' OR owner_group = '3' ORDER BY id_owner_property DESC

	$query = "SELECT * FROM tbl_paynote_system WHERE id_property = '$id' ORDER BY number_paynote DESC";
	$resultado = $con->query($query);
	while ($data = $resultado->fetch_array()){
		$datos['data'][]=$data;
	}

	echo json_encode($datos);

?>