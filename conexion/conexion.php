<?php

class projectoinovacion{

    public static function conexion(){
    $conexion = new mysqli("localhost", "root", "", "proyectoits");
    
    $conexion->query("SET NAMES 'utf8'"); 
    return $conexion;
    
    }

}


?>  