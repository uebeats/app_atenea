<?php session_start();

  /*-------------------------
  Autor: Jesús Caballero P.
  Web: www.betahost.cl
  Correo: uebeats@gmail.com
  ---------------------------*/

  if(!$_SESSION['user_system']){
    header('Location: login.php');
  }
  
  //Solicitamos Conexion
  require_once 'at-config/conexion.php';
  
  //Solicitamos Funciones
  require_once 'model/functions.php';

  $id = $_GET['property'];

  $titulo = "Gestión de Inmuebles";
  $sidebar = "sidebar-collapse";

  $q = "SELECT * FROM tbl_property_system WHERE id_property = '$id' ";
  $res = $con->query($q);
  $rw = $res->fetch_assoc();

  $active_dash = "";
  $active_owner = "";
  $active_property = "active";
  $active_clients = "";
  $active_options = "";

  include 'vistas/fichaProperty.view.php';
?>