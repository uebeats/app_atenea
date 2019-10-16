<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	// datos importantes
	$agent = $_POST['agent_designated'];
	$date = $_POST['date_register'];

	// recibimos datos del formulario	
	$name_owner = $_POST['owner'];
	$name_client = $_POST['client'];
	$code_property = $_POST['code_property'];
	$format_price = $_POST['format_price'];
	$canon_price = $_POST['canon_price'];
	$comision_canon = $_POST['comision_canon'];

	$address_property = $_POST['address_property'];
	$city_property = $_POST['city'];
	$day_pay = $_POST['day_pay'];
	$day_rend = $_POST['day_rend'];
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];

	$titular_bank  = $_POST['titular_bank'];
	$rut_bank = $_POST['rut_bank'];
	$account_bank = $_POST['account_bank'];
	$type_bank = $_POST['type_bank'];
	$bank = $_POST['bank'];
	$mail_confirm = $_POST['mail_confirm'];

	$client_agua = $_POST['client_agua'];
	$client_luz = $_POST['client_luz'];
	$client_gas = $_POST['client_gas'];


	//Evitar la inyecciones sql
	$con->real_escape_string($name_owner);
	$con->real_escape_string($name_client);
	$con->real_escape_string($code_property);
	$con->real_escape_string($format_price);
	$con->real_escape_string($canon_price);
	$con->real_escape_string($comision_canon);
	$con->real_escape_string($address_property);
	$con->real_escape_string($city_property);
	$con->real_escape_string($day_pay);
	$con->real_escape_string($day_rend);
	$con->real_escape_string($account_bank);
	$con->real_escape_string($bank);
	$con->real_escape_string($mail_confirm);
	$con->real_escape_string($client_agua);
	$con->real_escape_string($client_luz);
	$con->real_escape_string($client_gas);


	//Valido que los campos no esten vacios
	if (empty($name_owner)) {
	    echo "vacio";
	} else {
	    $query = "INSERT INTO tbl_property_system (agent_designated,date_register,name_owner,name_client,code_property,format_price,canon_price,comision_canon,address_property,city_property,day_pay,day_rend,date_start,date_end,titular_bank,rut_bank,account_bank,type_bank,bank,mail_confirm,client_agua,client_luz,client_gas) VALUES ('$agent','$date','$name_owner','$name_client','$code_property','$format_price','$canon_price','$comision_canon','$address_property','$city_property','$day_pay','$day_rend','$date_start','$date_end','$titular_bank','$rut_bank','$account_bank','$type_bank','$bank','$mail_confirm','$client_agua','$client_luz','$client_gas')";

	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>