<?php
session_start();
if(empty($_SESSION['usuario'])){
    echo "<script>window.location='../not-found.php'</script>";
	}else{
if(!empty($_GET)){

		include("../conexion/conexion.php");
		$conexion = projectoinovacion::conexion();
		$idBorrar = $_GET['idInNot'];

		//$cosa1 = new projectoinovacion();
	
		$sqlBorrar = "UPDATE noticias set estado = 'inactivo' where id_not = $idBorrar";


		$borrar =  $conexion->query($sqlBorrar);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));

		if($borrar!=null){
			print "<script>window.location='../noticias.php';</script>";
		}else{
			print "<script>alert(\"No se ah podido deshabilitar.\");window.location='noticias.php';</script>";
            
            
	
		}
	}  
}	


?>