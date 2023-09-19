<?php

class projectoinovacion{

    public static function conexion(){
    $conexion = new mysqli("localhost", "root", "", "innovacionfinal");
    
    $conexion->query("SET NAMES 'utf8'"); 
    return $conexion;
    
    }

}


?>  