<?php
	/*-------------------------
	Autor: Jesus Caballero
	Web: propiedadesdng.com
	Mail: jesus@propiedadesdng.com
	---------------------------*/

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	//Funciones
	include '../model/functions.php';

	
	$num = $_POST['number_paynote'];

	if (isset($num)) {

		// Solicitar los campos registrados tbl_tmp_paynote
		$sql = "SELECT * FROM tbl_tmp_paynote";
		$res = $con->query($sql);
		while($rw = $res->fetch_assoc()){
			// Datos volcados de tbl_tmp_paynote
			$num = $_POST['number_paynote'];
			$desc = $rw['tmp_description'];
			$qty = $rw['tmp_quantity'];
			$amount = $rw['tmp_amount'];
            $tmp_desc = $rw['tmp_detalle_mov'];

			$query = "INSERT INTO tbl_detalle_paynote (id_number_paynote, tmp_description, tmp_quantity, tmp_amount, tmp_detalle_mov) VALUES ('$num','$desc','$qty','$amount','$tmp_desc')";
			$resultado = $con->query($query);
			if (isset($resultado)) {
				// Eliminar registros de tbl_tmp_paynote
				$delete = "DELETE FROM tbl_tmp_paynote";
				$del = $con->query($delete);
			}
		}
	}

	//Variables por GET
	// $cliente = $con->real_escape_string($_GET['name_owner']);
	// $number = intval($_GET['number_paynote']);

	$total = $_POST['total_amount'];
	$agent = $_POST['agent_designated'];
	$id_property = $_POST['id_property'];
	$date = $_POST['date_register'];
	//
	// $number = $_POST['number_paynote'];
	$name = $_POST['name_owner'];
	$address = $_POST['address_property'];
	$city = $_POST['city_property'];
	$admin = $_POST['agent_admin'];
	$obs = $_POST['obs_paynote'];
	//
	$status = $_POST['status_paynote'];
	$pago = $_POST['pago_paynote'];
	$date_pago = $_POST['date_paynote'];

	//Evitar la inyecciones sql
	$con->real_escape_string($agent);
	$con->real_escape_string($date);
	//
	$con->real_escape_string($num);
	$con->real_escape_string($address);
	$con->real_escape_string($city);
	$con->real_escape_string($admin);
	$con->real_escape_string($obs);
	//
	$con->real_escape_string($status);
	$con->real_escape_string($pago);
	$con->real_escape_string($date_pago);

	//Valido que los campos no esten vacios
	if (empty($agent) || empty($num) || empty($address) || empty($city) || empty($admin)) {
	    echo "vacio";

	} else {
	    $query = "INSERT INTO tbl_paynote_system (id_property,agent_designated,date_register,number_paynote,name_owner,address_property,city_property,agent_admin,obs_paynote,total_amount,status_paynote,pago_paynote,date_paynote) VALUES ('$id_property','$agent','$date','$num','$name','$address','$city','$admin','$obs','$total','$status','$pago','$date_pago')";
	    $resultado = $con->query($query);
	    if ($resultado) {
	        echo "ok";
	    }else{
	        die("Error" . mysqli_error($con));
	    }
	}

?>