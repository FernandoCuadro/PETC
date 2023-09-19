<?php
require_once("modelo/modeloNosotros.php");
$slide = new modeloNosotros();
$integrantes = new modeloNosotros();    

$MostrarImagen = $slide->imagenes();    

$MostrarIntegrantes = $integrantes->integrantes();

require_once("vista/vistaNosotros.php");
?>
 