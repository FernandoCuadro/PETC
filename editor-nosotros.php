<?php 
session_start();
if(empty($_SESSION['usuario']) || $_SESSION['perfil'] == 'moderador'){

    echo "<script>window.location='not-found.php'</script>";

	}else{
require_once("conexion/conexion.php");
require_once("controlador/controladorEditorNosotros.php");

    }
?>