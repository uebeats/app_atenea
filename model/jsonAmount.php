<?php
	require_once ("../at-config/conexion.php");//Contiene funcion que conecta a la base de datos

	$tmp_movement = $_POST['parametros'];

	$query = "SELECT amount_movement FROM tbl_move_property WHERE type_movement = '$tmp_movement'";
	$resultado = $con->query($query);

	$html = "";

	$row = $resultado->fetch_assoc();

	$html = $row['amount_movement'];

	echo $html;
?>