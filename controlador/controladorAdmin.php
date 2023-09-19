<?php
error_reporting(0);
require_once("modelo/modeloAdmin.php");

$areas = new modeloAdmin();
$noticias = new modeloAdmin();
$etiquetas = new modeloAdmin();
$usuario = new modeloAdmin();

$obtenerAreas = $areas->obtenerAreasMenu();

$obtenerNoticias = $noticias->obtenerNoticia();

$obtenerEtiquetas = $etiquetas->obtenerEtiquetas();

$obtenerUsuarios = $usuario->obtenerUsuarios();

require_once("vista/vistaAdmin.php");
if(isset($_POST['crearUsuario'])){
    if($_POST['nombreUsuario'] == ""){
        echo "<script>window.alert('El campo nombre esta vacio');</script>";
    }elseif($_POST['ciUsuario'] == ""){
        echo "<script>window.alert('El campo cédula esta vacio');</script>";
    }elseif($_POST['ciUsuario'] <= 10000000 || $_POST['ciUsuario'] >= 99999999){
        echo "<script>window.alert('El campo cédula debe tener 8 digitos');</script>";
    }elseif($_POST['contraUsuario'] == ""){
        echo "<script>window.alert('El campo contraseña esta vacio');</script>";
    }elseif($_POST['rolUsuario'] == ""){
        echo "<script>window.alert('El campo Rol esta vacio');</script>";
    }else{    
    $crearUsuario = $usuario->crearUsuario(
        $nombreUsu = $_POST['nombreUsuario'],
        $cedulaUsu = $_POST['ciUsuario'],
        $contraseñaUsu = md5($_POST['contraUsuario']),
        $rolUsuario = $_POST['rolUsuario']
             
    );
    }          
}

if(isset($_POST['editarusuario'])){

    $editarUsuario = $usuario->editarUsuario(
        $ciUsuario = $_POST['seleccionarCIUsuario'],
        $nombreUsuario = $_POST['nombreUsuarioEditar'],
        $contrUsuario = md5($_POST['contUsuario']),
        $rolUsuario = $_POST['rolUsuarioEditar']

    );
}

if(isset($_POST['eliminarusuario'])){
    $borrarUsuarios = $usuario->eliminarUsuario(
        $ciUsuario = $_POST['seleccionarCIUsuario']
    );
}

?>