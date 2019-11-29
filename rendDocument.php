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

  $session = $_SESSION['user_system'];

  $titulo = "Rendición para Cliente";
  $sidebar = "sidebar-collapse";

  $active_dash = "";
  $active_docs = "active";
  $active_calls = "";
  $active_property = "";
  $active_clients = "";
  $active_options = "";

  include 'vistas/rendDocument.view.php';
?>