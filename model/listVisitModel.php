<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$datos['data'] = [];

	$query = "SELECT * FROM tbl_order_visit ORDER BY id_order_visit DESC";
	$resultado = $con->query($query);
	while ($data = $resultado->fetch_array()){
		$datos['data'][]=$data;
	}

	echo  json_encode($datos);

?>