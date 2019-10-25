<?php
/*-------------------------
	Autor: Jesus Caballero
	Web: propiedadesdng.com
	Mail: jesus@propiedadesdng.com
	---------------------------*/

	function nameUser($usuario){

		global $con;

		$fecha = date_default_timezone_set('America/Santiago');

		global $fecha;
		
		$user_name = $usuario;
		
		$query = "SELECT * FROM tbl_users_system WHERE user_system = '$user_name'";
        $resultado = $con->query($query);
        $row = $resultado->fetch_assoc();

        $html = $row['name_user_system'];

        echo $html;
	}

	function frasesFooter(){
		// Completamos el vector con frases
		$vector = array(
		1 => "La motivación nos impulsa a comenzar y el hábito nos permite continuar.",
		2 => "El fracaso es la oportunidad de empezar de nuevo con más Inteligencia.",
		3 => "La suerte es lo que ocurre cuando la preparación coincide con la oportunidad.",
		4 => "Si ya sabes lo que tienes que hacer y no lo haces entonces estás peor que antes",
		);

		// Obtenemos un número aleatorio
		$numero = rand(1,4);

		// Imprimimos la frase
		echo $vector[$numero];
	}

	function indicadorUf(){
		// $apiUrl = 'https://mindicador.cl/api';
		// //Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
		// if ( ini_get('allow_url_fopen') ) {
		//     $json = file_get_contents($apiUrl);
		// } else {
		//     //De otra forma utilizamos cURL
		//     $curl = curl_init($apiUrl);
		//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//     $json = curl_exec($curl);
		//     curl_close($curl);
		// }
		 
		// $dailyIndicators = json_decode($json);
		// $uf = $dailyIndicators->uf->valor;

		//echo number_format($uf, 0, ",", ".");
		echo 'No Data';
	}
?>