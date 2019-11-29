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

  $titulo = "Panel Administración";
  $sidebar = "sidebar-collapse";

  $active_escritorio = "active";
  $active_property = "";
  $active_client = "";
  $active_options = "";
  $active_docs = "";

  include 'vistas/escritorio.view.php';
?>