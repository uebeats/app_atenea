<?php

	//Solicitamos Conexion
	include '../at-config/conexion.php';

	$id_paynote = $_POST['id_paynote'];

	//Evitar la inyecciones sql
	$con->real_escape_string($id_paynote);

	//Valido que los campos no esten vacios
	if (empty($id_paynote)) {
	    echo "vacio";
	} else {
		$select = "SELECT status_paynote FROM tbl_paynote_system WHERE id_paynote = '$id_paynote'";
		$res = $con->query($select);
		$rw_status = $res->fetch_assoc();

		$status_tmp = $rw_status['status_paynote'];

		if ($status_tmp === 'Pagado') {
			$status = 'Pendiente';
			$query = "UPDATE tbl_paynote_system SET status_paynote='$status' WHERE id_paynote='$id_paynote'";
			$resultado = $con->query($query);

			if ($resultado) {
		        echo "ok";
		    }else{
		        die("Error" . mysqli_error($con));
		    }
		}else{
			$status = 'Pagado';
			$query = "UPDATE tbl_paynote_system SET status_paynote='$status' WHERE id_paynote='$id_paynote'";
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