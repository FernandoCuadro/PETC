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
<<<<<<< HEAD

        $sqlVerificaNum = "SELECT * from niveles where nivelnumero = $ordennivel;";
        $sqlVerificaNums = $this->conexion->query($sqlVerificaNum);
        if(mysqli_num_rows($sqlVerificaNums) > 0){
          echo "<script>window.alert('Ya existe ese orden ingrese otro');window.location='editor-cursos.php#CrearNivel';</script>";
          exit();
        }
=======
>>>>>>> b958538 (Hasta Cursos arreglado)

        $sqlVerificaNum = "SELECT * from niveles where nivelnumero = $ordennivel;";
        $sqlVerificaNums = $this->conexion->query($sqlVerificaNum);
        if(mysqli_num_rows($sqlVerificaNums) > 0){
           echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Nivel',
                text:'Ya existe ese numero de orden',
                icon:'Error'
                
                })
                .then((value) => {
                    window.location='cursos.php';
                    window.location='editor-cursos.php';
                    
                })</script>";
         
          
          
        }else{

        
        $sqlAgregarNivel = $this->conexion->query($sqlAgregarNiveles);

<<<<<<< HEAD
        echo "<script>window.alert('Nivel añadido de forma exitosa');window.location='editor-cursos.php';</script>";

=======
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Nivel',
                text:'Nivel agregado correctamente',
                icon:'success'
                
                })
                .then((value) => {
                    window.location='cursos.php';
                    window.location='editor-cursos.php';
                    
                })</script>";
            }
>>>>>>> b958538 (Hasta Cursos arreglado)
}



public function editarNivel($idnivel, $nombrenivel, $ordennivel){

        $sqlEditarNiveles = "UPDATE niveles SET nivelnombre = '$nombrenivel', nivelnumero = '$ordennivel' WHERE (`idnivel` = '$idnivel');";
<<<<<<< HEAD

        $sqlVerificaNum = "SELECT * from niveles where nivelnumero = $ordennivel;";
        $sqlVerificaNums = $this->conexion->query($sqlVerificaNum);
        if(mysqli_num_rows($sqlVerificaNums) > 1){
          echo "<script>window.alert('Ya existe ese orden ingrese otro');window.location='editor-cursos.php#CrearNivel';</script>";
          exit();
        }

=======
/*
        $sqlVerificaNum = "SELECT * from niveles where nivelnumero = $ordennivel;";
        $sqlVerificaNums = $this->conexion->query($sqlVerificaNum);
        if(mysqli_num_rows($sqlVerificaNums) > 1){
          echo "<script>window.location='avisoCursosError.php';</script>";
          exit();
        }
        usar el idlevel para verificar
*/
>>>>>>> b958538 (Hasta Cursos arreglado)
        $sqlEditarNivel = $this->conexion->query($sqlEditarNiveles);

        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Nivel',
                text:'Nivel editado correctamente',
                icon:'success'
                
                })
                .then((value) => {
                    window.location='cursos.php';
                    window.location='editor-cursos.php';
                    
                })</script>";
}

public function eliminarNivel($idNivel){

        $sqlEliminarNivel = "DELETE FROM niveles WHERE (`idnivel` = '$idNivel');";
        $sqlEliminarNiveles = $this->conexion->query($sqlEliminarNivel);

        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Nivel',
                text:'Nivel eliminado correctamentex',
                icon:'success'
                
                })
                .then((value) => {
                    window.location='cursos.php';
                    window.location='editor-cursos.php';
                    
                })</script>";
  
    }





//AGREGAR MODIFICAR CURSOS

public function agregarCursos($nombreCurso, $nivelCurso, $imagenCurso, $enlaceCurso){
    $sqlBuscar = "SELECT area FROM area where area LIKE '$nombreCurso';";
    $sqlBuscarNombre = $this->conexion->query($sqlBuscar);

    if(mysqli_num_rows($sqlBuscarNombre) == 0){

    $sqlAgregarCursos = "INSERT INTO area values (0, '$nombreCurso', '$nivelCurso', '$imagenCurso', '$enlaceCurso')";

    $sqlAgregarCurso = $this->conexion->query($sqlAgregarCursos);

    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
            swal({
            title:'Cursos',
            text:'Curso agregado correctamente',
            icon:'success'
            
            })
            .then((value) => {
                window.location='cursos.php';
                window.location='editor-cursos.php';
                
            })</script>";
    
  }else{

      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
            swal({
            title:'Cursos',
            text:'El curso ya existe',
            icon:'error'
            
            })
            .then((value) => {
                window.location='cursos.php';
                window.location='editor-cursos.php';
                
            })</script>";
    }
}


public function editarCursos($idCurso, $nombreCurso, $nivelCurso, $imagenCurso, $enlaceCurso){
if($nombreCurso == "" & $imagenCurso== "" & $enlaceCurso == ""){
    
  $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso' WHERE (`id_area` = '$idCurso');";
    $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
      echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
            swal({
            title:'Cursos',
            text:'Curso editado correctamente',
            icon:'success'
            
            })
            .then((value) => {
                window.location='cursos.php';
                window.location='editor-cursos.php';
                
            })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
}elseif($nivelCurso == "" & $imagenCurso == "" & $enlaceCurso == ""){
   
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
      
}elseif($nombreCurso == "" & $nivelCurso == "" & $enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
}elseif($nombreCurso == "" & $nivelCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
          


  }elseif($imagenCurso == "" & $enlaceCurso == ""){

    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)

  }elseif($nivelCurso == "" & $enlaceCurso == ""){

    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
  }elseif($nivelCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>"; 
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
  
  }elseif($nombreCurso == "" & $enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
   
  }elseif($nombreCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
   
  
}elseif($nombreCurso == "" & $nivelCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)

}elseif($nombreCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
}elseif($nivelCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
}elseif($imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";}elseif($imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
}elseif($enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
        echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
              swal({
              title:'Cursos',
              text:'Curso editado correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='cursos.php';
                  window.location='editor-cursos.php';
                  
              })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)
}else{
  
  $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
    $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
<<<<<<< HEAD
      echo "<script>window.alert('Curso modificado de forma exitosa');window.location='editor-cursos.php';</script>";
=======
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
            swal({
            title:'Cursos',
            text:'Curso editado correctamente',
            icon:'success'
            
            })
            .then((value) => {
                window.location='cursos.php';
                window.location='editor-cursos.php';
                
            })</script>";
>>>>>>> b958538 (Hasta Cursos arreglado)

} 





}



public function eliminarCursos($idCurso){

  $sqlEliminarCurso = "DELETE FROM area WHERE (`id_area` = '$idCurso');";
  $sqlEliminarCursos = $this->conexion->query($sqlEliminarCurso);

  echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
  echo "<script>
          swal({
          title:'Cursos',
          text:'Curso eliminado correctamente',
          icon:'success'
          
          })
          .then((value) => {
              window.location='cursos.php';
              window.location='editor-cursos.php';
              
          })</script>";

}

}




?>