<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	// datos importantes
	$id_property = $_POST['id_property'];
	$agent = $_POST['agent_designated'];
	$date = $_POST['date_register'];

	// recibimos datos del formulario
	$name_owner = $_POST['owner_edit'];
	$name_client = $_POST['client_edit'];
	$code_property = $_POST['code_edit'];
	$format_price = $_POST['format_edit'];
	$canon_price = $_POST['canon_edit'];
	$comision_canon = $_POST['comision_edit'];

	$address_property = $_POST['address_edit'];
	$city_property = $_POST['city_edit'];
	$day_pay = $_POST['day_edit'];
	$day_rend = $_POST['rend_edit'];
	$date_start = $_POST['start_edit'];
	$date_end = $_POST['end_edit'];

	$titular_bank  = $_POST['titular_edit'];
	$rut_bank = $_POST['rut_edit'];
	$account_bank = $_POST['account_edit'];
	$type_bank = $_POST['type_edit'];
	$bank = $_POST['bank_edit'];
	$mail_confirm = $_POST['mail_edit'];

	$client_agua = $_POST['edit_agua'];
	$client_luz = $_POST['edit_luz'];
	$client_gas = $_POST['edit_gas'];

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
	if (empty($id_property)) {
	    echo "vacio";

	} else {
	    $query = "UPDATE tbl_property_system SET agent_designated='$agent', date_register='$date', name_owner='$name_owner', name_client='$name_client', code_property='$code_property', format_price='$format_price', canon_price='$canon_price', comision_canon='$comision_canon', address_property='$address_property', city_property='$city_property', day_pay='$day_pay', day_rend='$day_rend', date_start='$date_start', date_end='$date_end', titular_bank='$titular_bank', rut_bank='$rut_bank', account_bank='$account_bank', type_bank='$type_bank', bank='$bank', mail_confirm='$mail_confirm', client_agua='$client_agua', client_luz='$client_luz', client_gas='$client_gas' WHERE id_property= '$id_property'";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>