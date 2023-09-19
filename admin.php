<?php
session_start();
if(empty($_SESSION['usuario'])){
		echo "<script>alert(\"Acceso Denegado...\");window.location='index.php';</script>";

	}else{
require_once("conexion/conexion.php");
require_once("controlador/controladorAdmin.php");
    }
?>