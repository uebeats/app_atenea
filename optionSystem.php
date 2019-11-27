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

  $titulo = "Opciones del Sistema";
  $sidebar = "sidebar-collapse";

  $active_dash = "active";
  $active_calls = "";
  $active_property = "";
  $active_clients = "";
  $active_options = "";

  include 'vistas/optionSystem.view.php';
?>