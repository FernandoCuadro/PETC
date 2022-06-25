<?php
if(!empty($_GET)){

		include("conexion/conexion.php");
		$conexion = projectoinovacion::conexion();
		$idBorrar = $_GET['idint'];

		//$cosa1 = new projectoinovacion();
	
		$sqlBorrar = "DELETE FROM integrantes WHERE (`idintegrantes` = '$idBorrar');";


		$borrar =  $conexion->query($sqlBorrar);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));

		if($borrar!=null){
			print "<script>alert(\"Eliminado exitosamente.\");window.location='nosotros.php';</script>";
		}else{
			print "<script>alert(\"No se pudo eliminar.\");window.location='nosotros.php';</script>";
	
		}
	}  
	


?>