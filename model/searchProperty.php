<?php
//Solicitamos Conexion
	include '../at-config/conexion.php';
	$datos['data'] = [];

	$id_property= $_POST['id_property'];

	$query = "SELECT * FROM tbl_property_system WHERE id_property ='$id_property' ";
	$resultado = $con->query($query);
	$data = $resultado->fetch_array();
	
	$datos['data'][]=$data;

	echo json_encode($data);
?>