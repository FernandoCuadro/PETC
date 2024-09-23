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
if(empty($_SESSION['usuario']) || $_SESSION['perfil'] == 'moderador'){
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

            $sqlurl = "SELECT min_not, img_not, img_not2,img_not3,img_not4,img_not5 FROM noticias where id_not = '$idBorrar';";
            $sqlimagen = $conexion->query($sqlurl);
            while($filas=$sqlimagen->fetch_assoc()){
                $imagen[]=$filas;
                }  

            foreach($imagen as $Poner){
                if($Poner['min_not'] != "img/miniatura/pti.jpg"){
                    if($Poner['min_not'] !="") {unlink('../'.$Poner['min_not']);}
            } 
               if($Poner['img_not'] !="") {unlink('../'.$Poner['img_not']);} 
               if($Poner['img_not2'] !="") {unlink('../'.$Poner['img_not2']);} 
               if($Poner['img_not3'] !="") {unlink('../'.$Poner['img_not3']);} 
               if($Poner['img_not4'] !="") {unlink('../'.$Poner['img_not4']);} 
               if($Poner['img_not5'] !="") {unlink('../'.$Poner['img_not5']);} 
                 
                
                //echo '<script>alert("'.$Poner["fotoint"].'");</script>';
               }  

		$sqlBorrar = "DELETE FROM noticias WHERE (`id_not` = '$idBorrar');";
		$borrar =  $conexion->query($sqlBorrar);
	//	Al borrar la noticia borra las etiquetas en caso de tener
         $sqlverEti = "SELECT idnoticia FROM etiquetas WHERE `idnoticia` = '$idBorrar';";
         $sqlerrorEti = $conexion->query($sqlverEti);
         $contarEti = mysqli_num_rows($sqlerrorEti);  
         
    //	Al borrar la noticia borra los enlaces en caso de tener
        $sqlverEnl = "SELECT idNoticias FROM enlaces WHERE `idNoticias` = '$idBorrar';";
        $sqlerrorEnl = $conexion->query($sqlverEnl);
        $contarEnl = mysqli_num_rows($sqlerrorEnl);       
            if($contarEnl >= 1){
            $sqlBorrarEnl = "DELETE FROM enlaces where (`idNoticias` = '$idBorrar');";
            $borrarEnl = $conexion->query($sqlBorrarEnl);
            }

		if($borrar!=null){

            $fecha_actual = date("Y-m-d H:i:s");
			$ci = $_SESSION['ci'];
			$nombreusuario = $_SESSION['usuario'];
			$consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a eliminado una noticia: $idBorrar', '$fecha_actual')";
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

