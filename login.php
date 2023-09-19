<?php

session_start();
if(!empty($_SESSION['usuario'])){
		
    echo "<script>window.location='index.php'</script>";

}else{

require_once("conexion/conexion.php");
require_once("controlador/controladorLogin.php");
}
?>