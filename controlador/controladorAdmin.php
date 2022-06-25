<?php
//error_reporting(0);
require_once("modelo/modeloAdmin.php");
$areas = new modeloAdmin();
$noticias = new modeloAdmin();
$agregar = new modeloAdmin();
$etiquetas = new modeloAdmin();
$editar = new modeloAdmin();

$obtenerAreas = $areas->obtenerAreasMenu();

$obtenerNoticias = $noticias->obtenerNoticia();

$obtenerEtiquetas = $etiquetas->obtenerEtiquetas();


require_once("vista/vistaAdmin.php");

if(isset($_POST['etiquetaAgregar'])){
    $agregarEtiquetas = $agregar->agregarEtiqueta(
        $Titulo = $_POST['etiquetaNombre'],
        $Noticia = $_POST['etiquetaNoticia'],
        $Estado = $_POST['etiquetaEstado']
    );   

}

if(isset($_POST['etiquetaEditar'])){
    $editarEtiqueta = $editar->editarEtiqueta(
        $ID = $_POST['etiquetaID'],
        $Titulo = $_POST['etiquetaNombre'],
        $Estado = $_POST['etiquetaEstado']
    );

}

?>