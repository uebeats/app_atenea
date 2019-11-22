<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_chargenote = $_POST['id_chargenote'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_chargenote);

	//Valido que los campos no esten vacios
	if (empty($id_chargenote)) {
	    echo "vacio";
	} else {
		$select = "SELECT status_chargenote FROM tbl_chargenote_system WHERE id_chargenote = '$id_chargenote'";
		$res = $con->query($select);
		$rw_status = $res->fetch_assoc();

		$status_tmp = $rw_status['status_chargenote'];

		if ($status_tmp === 'Pagado') {
			$status = 'Pendiente';
			$query = "UPDATE tbl_chargenote_system SET status_chargenote='$status' WHERE id_chargenote='$id_chargenote'";
			$resultado = $con->query($query);

			if ($resultado) {
		        echo "ok";
		    }else{
		        die("Error" . mysqli_error($con));
		    }
		}else{
			$status = 'Pagado';
			$query = "UPDATE tbl_chargenote_system SET status_chargenote='$status' WHERE id_chargenote='$id_chargenote'";
			$resultado = $con->query($query);

			if ($resultado) {
		        echo "ok";
		    }else{
		        die("Error" . mysqli_error($con));
		    }
		}

		// if ($rw_status === 'Pagado') {
		// 	$status = 'Pendiente';
		// 	$query = "UPDATE tbl_paynote_system SET status_paynote='$status' WHERE id_paynote='$id_paynote'";
		//     $resultado = $con->query($query);
		//     if ($resultado) {
		//         echo "ok";
		//     }else{
		//         die("Error" . mysqli_error($con));
		//     }
		// }else if($rw_status === 'Pendiente'){
		// 	$status = 'Pagado';
		// 	$query = "UPDATE tbl_paynote_system SET status_paynote='$status' WHERE id_paynote='$id_paynote'";
		//     $resultado = $con->query($query);
		//     if ($resultado) {
		//         echo "ok";
		//     }else{
		//         die("Error" . mysqli_error($con));
		//     }
		// }
	}

?>