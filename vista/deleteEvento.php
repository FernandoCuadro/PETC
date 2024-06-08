<?php
date_default_timezone_set("America/Montevideo");
session_start();
if(empty($_SESSION['usuario'])){
    echo "<script>window.location='../not-found.php'</script>";
	}else{


include("../conexion/conexion.php");
$conexion = projectoinovacion::conexion();
$id = $_REQUEST['id']; 

$sqlDeleteEvento = ("DELETE FROM eventoscalendar WHERE  id='" .$id. "'");
$resultProd = $conexion->query($sqlDeleteEvento); 

$fecha_actual = date("Y-m-d H:i:s");
$ci = $_SESSION['ci'];
$nombreusuario = $_SESSION['usuario'];
$consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a eliminado un evento', '$fecha_actual')";
$sqlauditoria = $this->conexion->query($consauditoria);   
    }
?>
  