<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_move = $_POST['id_move_edit'];
	//
	$agent = $_POST['agent_edit'];
	$date = $_POST['register_edit'];
	$month = $_POST['month_edit'];
	//
	$type = $_POST['type_edit'];
	$amount = $_POST['amount_edit'];
	$obs = $_POST['obs_edit'];
	$status_mov = $_POST['status_move_edit'];
	$status_rend = $_POST['status_edit'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_move);
	$con->real_escape_string($agent);
	$con->real_escape_string($date);
	$con->real_escape_string($type);
	$con->real_escape_string($amount);
	$con->real_escape_string($obs);
	$con->real_escape_string($status_mov);
	$con->real_escape_string($status_rend);

	//Valido que los campos no esten vacios
	if (empty($id_move) || empty($agent) || empty($date) || empty($type) || empty($amount) || empty($obs) || empty($obs) || empty($status_mov) || empty($status_rend)) {
	    echo "vacio";

	} else {
	    $query = "UPDATE tbl_move_property SET agent_designated='$agent',date_register='$date',month_rendir='$month',type_movement='$type',amount_movement='$amount',obs_movement='$obs',status_movement='$status_mov',status_rend='$status_rend' WHERE id_move_property= '$id_move'";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>