<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando</title>

    <style>
        body{
            background-image: url(../img/fondo-login.jpg);
        }


    </style>
</head> 
<body>

<p style="visibility: hidden;">hola</p>
<?php
session_start();
if($_SESSION['perfil'] == 'administrador'){
   
	



		include("../conexion/conexion.php");
		$conexion = projectoinovacion::conexion();

		$sqlBorrar = "DELETE FROM noticias;";
		$borrar =  $conexion->query($sqlBorrar);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));
   

		if($borrar!=null){

            $fecha_actual = date("Y-m-d H:i:s");
			$ci = $_SESSION['ci'];
			$nombreusuario = $_SESSION['usuario'];
			$consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a eliminado todas las noticias', '$fecha_actual')";
			$sqlauditoria = $conexion->query($consauditoria); 

            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Noticias',
                    text:'Se ha eliminado correctamente',
                    icon:'success'
                    
                    })
                    .then((value) => {
                        window.location='../noticias.php';
                        window.location='../noticias.php';
                        
                    })</script>";
		}else{
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Noticias',
                    text:'No se ha podido eliminar',
                    icon:'error'
                    
                    })
                    .then((value) => {
                        window.location='../noticias.php';
                        window.location='../noticias.php';
                        
                    })</script>";           
		}

    }else{
            
        echo "<script>window.location='../not-found.php'</script>";

    }

       
?>

</body>
</html>