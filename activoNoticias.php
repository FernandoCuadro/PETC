<?php
if(!empty($_GET)){

		include("conexion/conexion.php");
		$conexion = projectoinovacion::conexion();
		$idBorrar = $_GET['idAcNot'];

		//$cosa1 = new projectoinovacion();
	
		$sqlBorrar = "UPDATE noticias set estado = 'activo' where id_not = $idBorrar";


		$borrar =  $conexion->query($sqlBorrar);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));

		if($borrar!=null){
			print "<script>alert(\"Noticia habilitada exitosamente.\");window.location='admin.php';</script>";
		}else{
			print "<script>alert(\"No se ah podido habilitar.\");window.location='admin.php';</script>";
            
            
	
		}
	}  
	


?>