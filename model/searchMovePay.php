<?php
	//Solicitamos Conexion
	include '../at-config/conexion.php';
	$datos['data'] = [];

	$id = $_POST['id_move_property'];

	$query = "SELECT * FROM tbl_move_property ";
	$resultado = $con->query($query);
	$data = $resultado->fetch_array();
	
	$datos['data'][]=$data;

	echo json_encode($data);
?>