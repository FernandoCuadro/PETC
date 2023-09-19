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
if(empty($_SESSION['usuario'])){
    echo "<script>window.location='../not-found.php'</script>";
	}else{

if(!empty($_GET)){

		include("../conexion/conexion.php");
		$conexion = projectoinovacion::conexion();
		$idBorrar = $_GET['idNotEli'];

		//$cosa1 = new projectoinovacion();
        $sqlver = "SELECT id_not FROM noticias WHERE `id_not` = '$idBorrar';";
        $sqlerror = $conexion->query($sqlver);
        $contarint = mysqli_num_rows($sqlerror);
        
        if($contarint == 1){

		$sqlBorrar = "DELETE FROM noticias WHERE (`id_not` = '$idBorrar');";
		$borrar =  $conexion->query($sqlBorrar);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));

		if($borrar!=null){
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
            
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Noticias',
                text:'La noticia que desea eliminar no existe',
                icon:'error'
                
                })
                .then((value) => {
                    window.location='../noticias.php';
                    window.location='../noticias.php';
                    
                })</script>";           


    }
	}elseif(empty($_GET)){
        echo "<script>window.location='../not-found.php'</script>";
    }
    }   
?>

</body>
</html>

