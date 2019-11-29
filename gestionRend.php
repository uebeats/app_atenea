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

  $query = "SELECT count(*) AS id_owner_property FROM tbl_owner_system";
  $resultado = $con->query($query);
  $count_owner = $resultado->fetch_assoc();

  $session = $_SESSION['user_system'];

  $titulo = "Panel Administración";
  $sidebar = "sidebar-collapse";

  $active_dash = "";
  $active_calls = "";
  $active_property = "";
  $active_clients = "";
  $active_options = "";
  $active_docs = "active";

  include 'vistas/gestionRend.view.php';
?>