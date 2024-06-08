<?php
session_start();
if(empty($_SESSION['usuario'])){
    echo "<script>window.location='../not-found.php'</script>";
	}else{

include("conexion/conexion.php");
                        
$idEvento         = $_POST['idEvento'];
$start            = $_REQUEST['start'];
$fecha_inicio     = date('Y-m-d', strtotime($start)); 
$end              = $_REQUEST['end']; 
$fecha_fin        = date('Y-m-d', strtotime($end));  


$UpdateProd = ("UPDATE eventoscalendar 
    SET 
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin'

    WHERE id='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);
    }
?>