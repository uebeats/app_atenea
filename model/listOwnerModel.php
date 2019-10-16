<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$datos['data'] = [];

	$id_group = 1;

	$query = "SELECT * FROM tbl_owner_system WHERE owner_group = '$id_group' ORDER BY id_owner_property DESC";
	$resultado = $con->query($query);
	while ($data = $resultado->fetch_array()){
		$datos['data'][]=$data;
	}

	echo  json_encode($datos);

?>