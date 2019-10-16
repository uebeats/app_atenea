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

  // COUNT OWNER
  $query = "SELECT count(*) AS id_owner_property FROM tbl_owner_system WHERE owner_group = 1";
  $resultado = $con->query($query);
  $count_owner = $resultado->fetch_assoc();

  // COUNT OWNER
  $q = "SELECT count(*) AS id_property FROM tbl_property_system";
  $result = $con->query($q);
  $count_property = $result->fetch_assoc();

  // COUNT OWNER
  $select = "SELECT count(*) AS id_owner_property FROM tbl_owner_system WHERE owner_group = 2 OR owner_group = 3";
  $res = $con->query($select);
  $count_clientes = $res->fetch_assoc();

  // COUNT OWNER
  $queryPaynote = "SELECT count(*) AS id_paynote FROM tbl_paynote_system";
  $r = $con->query($queryPaynote);
  $count_paynote = $r->fetch_assoc();

  $titulo = "Panel Administración";
  $sidebar = "sidebar-collapse";

  $active_dash = "active";
  $active_calls = "";
  $active_property = "";
  $active_clients = "";
  $active_options = "";

  include 'vistas/escritorio.view.php';
?>