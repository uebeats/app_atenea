<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$agent = $_POST['agent_designated'];
	$date = $_POST['date_register'];
	$owner = $_POST['owner_group'];
	$name = $_POST['name_owner'];
	$rut = $_POST['rut_owner'];
	$phone = $_POST['phone_owner'];
	$email = $_POST['email_owner'];
	$obs = $_POST['obs_owner'];

	//Evitar la inyecciones sql
	$con->real_escape_string($agent);
	$con->real_escape_string($date);
	$con->real_escape_string($name);
	$con->real_escape_string($rut);
	$con->real_escape_string($phone);
	$con->real_escape_string($email);
	$con->real_escape_string($obs);

	//Valido que los campos no esten vacios
	if (empty($name) || empty($rut) || empty($phone) || empty($email) || empty($obs)) {
	    echo "vacio";

	} else {
	    $query = "INSERT INTO tbl_owner_system (agent_designated,date_register,owner_group,name_owner,rut_owner,phone_owner,email_owner,obs_owner) VALUES ('$agent','$date','$owner','$name','$rut','$phone','$email','$obs')";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>