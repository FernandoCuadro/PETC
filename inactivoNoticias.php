<?php
if(!empty($_GET)){

		include("conexion/conexion.php");
		$conexion = projectoinovacion::conexion();
		$idBorrar = $_GET['idInNot'];

		//$cosa1 = new projectoinovacion();
	
		$sqlBorrar = "UPDATE noticias set estado = 'inactivo' where id_not = $idBorrar";


		$borrar =  $conexion->query($sqlBorrar);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));

		if($borrar!=null){
			print "<script>alert(\"Noticia deshabilitada exitosamente.\");window.location='admin.php';</script>";
		}else{
			print "<script>alert(\"No se ah podido deshabilitar.\");window.location='admin.php';</script>";
            
            
	
		}
	}  
	


?>