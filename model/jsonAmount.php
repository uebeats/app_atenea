<?php
	require_once ("../at-config/conexion.php");//Contiene funcion que conecta a la base de datos

	$id_move = $_POST['parametros'];

	$query = "SELECT amount_movement FROM tbl_move_property WHERE id_move_property = '$id_move'";
	$resultado = $con->query($query);

	$html = "";

	$row = $resultado->fetch_assoc();

	$html = $row['amount_movement'];

	echo $html;
?>