<?php session_start();
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	/* Connect To Database*/
	require_once ('../at-config/conexion.php');//Contiene funcion que conecta a la base de datos

	//Solicitamos Funciones
  	require_once '../model/functions.php';
	
	if (isset($_REQUEST['id_tmp_paynote'])){
		$id = intval($_REQUEST['id_tmp_paynote']);
		$q = "DELETE FROM tbl_tmp_paynote WHERE id_tmp_paynote = '$id'";
        $res = $con->query($q);
	}
	
	if (isset($_POST['tmp_description'])){
		
		//Evitar la inyecciones sql
		$agent = $con->real_escape_string($_POST['agent_designated']);
		$desc = $con->real_escape_string($_POST['tmp_description']);
		$qty = intval($_POST['tmp_quantity']);
		$amount = floatval($_POST['tmp_amount']);

		$insert ="INSERT INTO tbl_tmp_paynote (agent_designated, tmp_description, tmp_quantity, tmp_amount) VALUES ('$agent','$desc','$qty','$amount')";
		$result = $con->query($insert);
	}

	// $query_perfil = mysqli_query($con,"select * from perfil where id=1");
	// $rw=mysqli_fetch_assoc($query_perfil);

	$tax = 0; //% de iva o impuestos;

	$q = "SELECT * FROM tbl_tmp_paynote WHERE agent_designated = '". $_SESSION['user_system'] ."'";
    $res = $con->query($q);

	$items = 1;
	$suma = 0;

	while($row=$res->fetch_assoc()){
		$total = $row['tmp_quantity']*$row['tmp_amount'];
	?>
	<tr>
		<td class='text-center'><?php echo $items;?></td>
		<td><?php echo $row['tmp_description'];?></td>
		<td class='text-center'><?php echo $row['tmp_quantity'];?></td>
		<td class='text-right'>$<?php echo $row['tmp_amount'];?></td>
		<td class='text-right'>$<?php echo $total;?></td>
		<td class='text-right'>
			<a class="btn btn-danger" href="#" onclick="eliminar_item('<?php echo $row['id_tmp_paynote'];?>')" ><i class="fa fa-trash"></i></a>
		</td>
	</tr>	
	<?php

		$items++;
		$suma+=$total;
		
	}
		$iva = $suma * ($tax / 100);
		$total_iva = number_format($iva);	
		$total = $suma + $total_iva;
	?>
	<tr>
		<td colspan='6'>
		
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalItemPay"><span class="fa fa-plus-circle"></span> Agregar Concepto</button>
		</td>
	</tr>
	<tr>
		<th colspan='4' class='text-right'>
			Subtotal:
		</td>
		<td class='text-right'>
			$<?php echo $suma;?>
		</td>
		<td></td>
	</tr>
	<tr>
		<th colspan='4' class='text-right'>
			Impuesto:
		</th>
		<td class='text-right'>
			$<?php echo $total_iva;?>
		</td>
		<td></td>
	</tr>
	<tr>
		<th colspan='4' class='text-right'>
			Total:
		</th>
		<td class='text-right'>
			$<span id="total_paynote"><?php echo $total;?></span>
		</td>
		<td></td>
	</tr>
<?php

}