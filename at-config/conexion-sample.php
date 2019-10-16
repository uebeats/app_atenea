<?php
	/*-------------------------
    Autor: Jesús Caballero P.
    Web: www.ptd.cl
    Correo: jcaballero@ptd.cl
    ---------------------------*/
    /*Datos de conexion a la base de datos*/
    define('DB_HOST', 'localhost');//DB_HOST:  generalmente suele ser "127.0.0.1"
    define('DB_USER', 'propieda_usrapp');//Usuario de tu base de datos
    define('DB_PASS', 'skinamc2011');//Contraseña del usuario de la base de datos
    define('DB_NAME', 'propieda_dng_system');//Nombre de la base de datos
    
	# conectare la base de datos
	global $con;
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexion fallo: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
    $con->set_charset('utf8');
?>