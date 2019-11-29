<?php
    /****************************************/

    $code = $_POST['code_property'];

    $carpeta = '../upload/'. $code;
    $archivo = $_FILES['file']['tmp_name'];
    $nombrefinal = trim($_FILES['file']['name']); //Eliminamos los espacios en blanco

    //Validamos si la ruta de destino existe, en caso de no existir la creamos
    if(!file_exists($carpeta)){
        mkdir($carpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");  
    }

    move_uploaded_file($archivo, $carpeta."/".$nombrefinal);
?>