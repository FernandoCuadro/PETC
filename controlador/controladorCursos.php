<?php
require_once("modelo/modeloCursos.php");
$areas = new modeloCursos();
$niveles = new modeloCursos();

$ObtenerAreas = $areas->obtenerAreas();
$ObtenerNiveles = $niveles->obtenerNiveles();

require_once("vista/vistaCursos.php");


?>