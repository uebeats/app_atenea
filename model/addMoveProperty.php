<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id = $_POST['id_property'];
	$agent = $_POST['agent_designated'];
	$date = $_POST['date_register'];

	$date_mov = $_POST['date_movement'];
	$month_rendir = $_POST['month_rendir'];
	$type_mov = $_POST['type_movement'];
	$amount_mov = $_POST['amount_movement'];
	$obs_mov = $_POST['obs_movement'];
	$status_mov = $_POST['status_movement'];
	$status_rend = $_POST['status_rend'];


	//Evitar la inyecciones sql
	$con->real_escape_string($date_mov);
	$con->real_escape_string($type_mov);
	$con->real_escape_string($amount_mov);
	$con->real_escape_string($obs_mov);
	$con->real_escape_string($status_mov);
	$con->real_escape_string($status_rend);

	//Valido que los campos no esten vacios
	if (empty($date_mov) || empty($type_mov) || empty($amount_mov) || empty($obs_mov) || empty($status_mov)) {
	    echo "vacio";

	} else {
	    $query = "INSERT INTO tbl_move_property (id_property, agent_designated, date_register, date_movement, month_rendir, type_movement, amount_movement, obs_movement, status_movement, status_rend ) VALUES ('$id','$agent','$date','$date_mov','$month_rendir','$type_mov','$amount_mov','$obs_mov','$status_mov','$status_rend')";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>