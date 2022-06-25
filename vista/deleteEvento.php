<?php
include("../conexion/conexion.php");
$conexion = projectoinovacion::conexion();
$id = $_REQUEST['id']; 

$sqlDeleteEvento = ("DELETE FROM eventoscalendar WHERE  id='" .$id. "'");
$resultProd = $conexion->query($sqlDeleteEvento); 

?>
  