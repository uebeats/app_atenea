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

  $id_owner = $_GET['id_owner'];

  $titulo = "Ficha del Propietario";
  $sidebar = "sidebar-collapse";

  $q = "SELECT * FROM tbl_owner_system WHERE id_owner_property = '$id_owner' ";
  $res = $con->query($q);
  $rw = $res->fetch_assoc();
  $originalDate = $rw['date_register'];
  $newDate = date('d-m-Y', strtotime($originalDate));

  $active_escritorio = "";
  $active_property = "";
  $active_client = "active";
  $active_options = "";
  $active_docs = "";



  include 'vistas/fichaOwner.view.php';
?>