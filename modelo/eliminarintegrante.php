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
		$idBorrar = $_GET['idint'];

		//$cosa1 = new projectoinovacion();
        $sqlver = "SELECT idintegrantes FROM integrantes WHERE `idintegrantes` = '$idBorrar';";
        $sqlerror = $conexion->query($sqlver);
        $contarint = mysqli_num_rows($sqlerror);
        
        if($contarint == 1){
            
            $sqlurl = "SELECT fotoint FROM integrantes where idintegrantes = '$idBorrar';";
            $sqlEnlace = $conexion->query($sqlurl);
            while($filas=$sqlEnlace->fetch_assoc()){
                $nosotros2[]=$filas;
                }  
                
           foreach($nosotros2 as $Poner){
            if($Poner['fotoint'] != "img/imagenpordefecto/integrante.png"){
            unlink('../'.$Poner['fotoint']); 
            }
            //echo '<script>alert("'.$Poner["fotoint"].'");</script>';
           }    

		$sqlBorrar = "DELETE FROM integrantes WHERE (`idintegrantes` = '$idBorrar');";
		$borrar =  $conexion->query($sqlBorrar);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));

		if($borrar!=null){
            
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Integrantes',
                    text:'Se ha eliminado correctamente',
                    icon:'success'
                    
                    })
                    .then((value) => {
                        window.location='../nosotros.php';
                        window.location='../nosotros.php';
                        
                    })</script>";
		}else{
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Integrantes',
                    text:'No se ha podido eliminar',
                    icon:'error'
                    
                    })
                    .then((value) => {
                        window.location='../nosotros.php';
                        window.location='../nosotros.php';
                        
                    })</script>";           
		}

    }else{
            
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Integrantes',
                text:'El integrante que desea eliminar no existe',
                icon:'error'
                
                })
                .then((value) => {
                    window.location='../nosotros.php';
                    window.location='../nosotros.php';
                    
                })</script>";           


    }
	}elseif(empty($_GET)){
        echo "<script>window.location='../not-found.php'</script>";
    }
}  
?>

</body>
</html>

