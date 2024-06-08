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
date_default_timezone_set("America/Montevideo");
session_start();
if(empty($_SESSION['usuario'])){
    echo "<script>window.location='../not-found.php'</script>";
	}else{
if(!empty($_GET)){

		include("../conexion/conexion.php");
		$conexion = projectoinovacion::conexion();
        
		$idBorrar = $_GET['idimagen'];

		//$cosa1 = new projectoinovacion();
        $sqlver = "SELECT idnosotrosimg FROM nosotrosimg WHERE `idnosotrosimg` = '$idBorrar';";
        $sqlerror = $conexion->query($sqlver);
        $contarimg = mysqli_num_rows($sqlerror);
        
        if($contarimg == 1){
            $sqlurl = "SELECT imagen FROM nosotrosimg WHERE `idnosotrosimg` = '$idBorrar';";
            $sqlEnlace = $conexion->query($sqlurl);
            while($filas=$sqlEnlace->fetch_assoc()){
                $enlaces[]=$filas;
                }  
              
           foreach($enlaces as $Poner){
            unlink('../'.$Poner['imagen']);
           }        
		$sqlBorrar = "DELETE FROM nosotrosimg WHERE (`idnosotrosimg` = '$idBorrar');";
		$borrar =  $conexion->query($sqlBorrar);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));

		if($borrar!=null){
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Imagenes',
                    text:'Se ah eliminado correctamente',
                    icon:'success'
                    
                    })
                    .then((value) => {
                        window.location='../nosotros.php';
                        window.location='../editor-nosotros.php';
                        
                    })</script>";
		}else{
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Imagenes',
                    text:'No se ah podido eliminar',
                    icon:'error'
                    
                    })
                    .then((value) => {
                        window.location='../nosotros.php';
                        window.location='../editor-nosotros.php';
                        
                    })</script>";           
		}

    }else{

        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Imagenes',
                text:'La imagen que desea eliminar no existe',
                icon:'error'
                
                })
                .then((value) => {
                    window.location='../nosotros.php';
                    window.location='../editor-nosotros.php';
                    
                })</script>";           


    }
	}elseif(empty($_GET)){
        echo "<script>window.location='../not-found.php'</script>";
    }  
   } 
?>

</body>
</html>

