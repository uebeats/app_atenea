<?php
//Solicitamos Conexion
	include '../at-config/conexion.php';
	$datos['data'] = [];

	$id_owner = $_POST['id_owner_property'];

	$query = "SELECT * FROM tbl_owner_system WHERE id_owner_property ='$id_owner' ";
	$resultado = $con->query($query);
	$data = $resultado->fetch_array();
	
	$datos['data'][]=$data;

	echo json_encode($data);
?>