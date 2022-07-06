<?php

class modeloCursos{ 

    private $conexion;
    private $cursos;

    // Iniciamos las variables
    public function __construct(){

      $this->conexion = projectoinovacion::conexion(); 
      $this->cursos = array();

    }   

    /*Función usada para mostrar todos las áreas en la
    parte del menu*/
    public function obtenerAreas(){
        //Se define la consulta a ejecutar
        /*Se busca que se muestren las distintas áreas
        que estén activas, para luego poder filtrar la 
        información mostrada a partir de ellas*/
        $sqlAreas = "SELECT 
        id_area as id, 
        area, 
        areaimagen as imagen,
        areaenlace as enlace,
        nivelnumero as nivelnum
        from area";

        /*Se envia la consulta a la base de datos y se obtiene la información
        de todas las áreas que estén activas*/
        $sqlResultadoAreas = $this->conexion->query($sqlAreas);

        /*Generamos un array con el resultado obtenido
        de la consulta realizada a la base de datos*/
        while($filas=$sqlResultadoAreas->fetch_assoc()){
        $this->cursos[]=$filas;
        }

        // Liberamos la variable
        return $this->cursos;

    }

    public function obtenerNiveles(){
    /*  session_start();
     $id_come = $_SESSION['com'];
    */  
        $sqlRespuestas = "SELECT idnivel as id, 
        nivelnombre as nombre, 
        nivelnumero as numero 
        FROM niveles
        order by nivelnumero asc;";
        
        $sqlRespuestasResultado = $this->conexion->query($sqlRespuestas);
  
        while($filas=$sqlRespuestasResultado->fetch_assoc()){
            $this->cursos[]=$filas;
        }
  
        return $this->cursos;
    }
  
//AGREGAR, MODIFICAR NIVELES

public function agregarNivel($nombrenivel, $ordennivel){

        $sqlAgregarNiveles = "INSERT INTO  niveles values (0, '$nombrenivel', '$ordennivel');";

        $sqlVerificaNum = "SELECT * from niveles where nivelnumero = $ordennivel;";
        $sqlVerificaNums = $this->conexion->query($sqlVerificaNum);
        if(mysqli_num_rows($sqlVerificaNums) > 0){
          echo "<script>window.alert('Ya existe ese orden ingrese otro');window.location='editor-cursos.php#CrearNivel';</script>";
          exit();
        }

        $sqlAgregarNivel = $this->conexion->query($sqlAgregarNiveles);

        echo "<script>window.alert('Nivel añadido de forma exitosa');window.location='editor-cursos.php';</script>";

}



public function editarNivel($idnivel, $nombrenivel, $ordennivel){

        $sqlEditarNiveles = "UPDATE niveles SET nivelnombre = '$nombrenivel', nivelnumero = '$ordennivel' WHERE (`idnivel` = '$idnivel');";

        $sqlVerificaNum = "SELECT * from niveles where nivelnumero = $ordennivel;";
        $sqlVerificaNums = $this->conexion->query($sqlVerificaNum);
        if(mysqli_num_rows($sqlVerificaNums) > 1){
          echo "<script>window.alert('Ya existe ese orden ingrese otro');window.location='editor-cursos.php#CrearNivel';</script>";
          exit();
        }

        $sqlEditarNivel = $this->conexion->query($sqlEditarNiveles);

          echo "<script>window.alert('Nivel modificado de forma exitosa');window.location='editor-cursos.php';</script>";
}

public function eliminarNivel($idNivel){

        $sqlEliminarNivel = "DELETE FROM niveles WHERE (`idnivel` = '$idNivel');";
        $sqlEliminarNiveles = $this->conexion->query($sqlEliminarNivel);

      echo "<script>window.alert('Nivel eliminado de forma exitosa');window.location='editor-cursos.php';</script>";
  
    }





//AGREGAR MODIFICAR CURSOS

public function agregarCursos($nombreCurso, $nivelCurso, $imagenCurso, $enlaceCurso){

    $sqlAgregarCursos = "INSERT INTO area values (0, '$nombreCurso', '$nivelCurso', '$imagenCurso', '$enlaceCurso')";

    $sqlAgregarCurso = $this->conexion->query($sqlAgregarCursos);

      echo "<script>window.alert('Curso agregado de forma exitosa');window.location='editor-cursos.php';</script>";
  
}


public function editarCursos($idCurso, $nombreCurso, $nivelCurso, $imagenCurso, $enlaceCurso){
if($nombreCurso == "" & $imagenCurso== "" & $enlaceCurso == ""){
    
  $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso' WHERE (`id_area` = '$idCurso');";
    $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
}elseif($nivelCurso == "" & $imagenCurso == "" & $enlaceCurso == ""){
   
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
      
}elseif($nombreCurso == "" & $nivelCurso == "" & $enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
}elseif($nombreCurso == "" & $nivelCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
          


  }elseif($imagenCurso == "" & $enlaceCurso == ""){

    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";

  }elseif($nivelCurso == "" & $enlaceCurso == ""){

    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
  }elseif($nivelCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>"; 
  
  }elseif($nombreCurso == "" & $enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
   
  }elseif($nombreCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
   
  
}elseif($nombreCurso == "" & $nivelCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";

}elseif($nombreCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
}elseif($nivelCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
}elseif($imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
}elseif($enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
}else{
  
  $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
    $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";

} 





}



public function eliminarCursos($idCurso){

  $sqlEliminarCurso = "DELETE FROM area WHERE (`id_area` = '$idCurso');";
  $sqlEliminarCursos = $this->conexion->query($sqlEliminarCurso);

echo "<script>window.alert('Curso eliminado de forma exitosa');window.location='editor-cursos.php';</script>";

}

}




?>