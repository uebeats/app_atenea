<?php
	require_once ('../at-config/conexion.php');//Contiene funcion que conecta a la base de datos

	$code = $_POST['code_property'];

	$query = "SELECT * FROM tbl_property_system WHERE code_property ='$code'";
	$resultado = $con->query($query);

	$html = "";

	while($row = $resultado->fetch_assoc()){
		$html .= "
		<div class='row'>
			<div class='col-md-3'>
				<span><b>Operación:</b></span>
				<span id='status_property'>". $row['status_property'] ."</span>
			</div>
			<div class='col-md-3'>
				<span><b>Tipo Propiedad:</b></span>
				<span id='type_property'>". $row['type_property'] ."</span>
			</div>
			<div class='col-md-3'>
				<span><b>Ciudad:</b></span>
				<span id='type_property'>". $row['city_property'] ."</span>
			</div>
			<div class='col-md-3'>
				<span><b>Precio Propiedad:</b></span>
				<span id='type_property'>". $row['price_property'] ."</span>
			</div>
		</div>
		<div class='row' style='padding-top:1%'>
			<div class='col-md-12'>
				<span><b>Dirección Propiedad:</b></span>
				<span id='type_property'>". $row['address_property'] ."</span>
			</div>
		</div>";
	}
	echo $html;
?>