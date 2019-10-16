<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_owner = $_POST['id_owner'];
	
	$agent = $_POST['agent_designated'];
	$date = $_POST['date_register'];
	$name = $_POST['name_owner'];
	$rut = $_POST['rut_owner'];
	$phone = $_POST['phone_owner'];
	$email = $_POST['email_owner'];
	$obs = $_POST['obs_owner'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_owner);
	$con->real_escape_string($agent);
	$con->real_escape_string($date);
	$con->real_escape_string($name);
	$con->real_escape_string($rut);
	$con->real_escape_string($phone);
	$con->real_escape_string($email);
	$con->real_escape_string($obs);

	//Valido que los campos no esten vacios
	if (empty($id_owner) || empty($name) || empty($rut) || empty($phone) || empty($email) || empty($obs)) {
	    echo "vacio";

	} else {
	    $query = "UPDATE tbl_owner_system SET agent_designated='$agent',date_register='$date',name_owner='$name',rut_owner='$rut',phone_owner='$phone',email_owner='$email',obs_owner='$obs' WHERE id_owner_property= '$id_owner'";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>