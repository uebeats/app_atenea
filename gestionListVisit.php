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

  $titulo = "Gestión de Visitas";
  $sidebar = "sidebar-collapse";

  $active_dash = "";
  $active_owner = "";
  $active_property = "";
  $active_documents = "active";
  $active_options = "";

  include 'vistas/gestionListVisit.view.php';
?>