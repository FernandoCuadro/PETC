<?php
date_default_timezone_set("America/Montevideo");
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
           echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Nivel',
                text:'Ya existe ese numero de orden',
                icon:'error'
                
                })
                .then((value) => {
                    window.location='cursos.php';
                    window.location='editor-cursos.php';
                    
                })</script>";
         
          
          
        }else{

        
        $sqlAgregarNivel = $this->conexion->query($sqlAgregarNiveles);
        $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a agregado un nivel', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);    
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
}



public function editarNivel($idnivel, $nombrenivel, $ordennivel){

        $sqlEditarNiveles = "UPDATE niveles SET nivelnombre = '$nombrenivel', nivelnumero = '$ordennivel' WHERE (`idnivel` = '$idnivel');";

        $sqlVerificaNum = "SELECT * from niveles where nivelnumero = $ordennivel;";
        $sqlVerificaNums = $this->conexion->query($sqlVerificaNum);
        if(mysqli_num_rows($sqlVerificaNums) > 0){
           echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Nivel',
                text:'Ya existe ese numero de orden',
                icon:'error'
                
                })
                .then((value) => {
                    window.location='cursos.php';
                    window.location='editor-cursos.php';
                    
                })</script>";

      }else{
        $sqlEditarNivel = $this->conexion->query($sqlEditarNiveles);
        $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un nivel', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);    

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
}

public function eliminarNivel($idNivel){

        $seleccionarlvl = "SELECT idnivel FROM niveles WHERE `idnivel` = '$idNivel';";
        $seleccionarlvls = $this->conexion->query($seleccionarlvl);
        $contarlvl = mysqli_num_rows($seleccionarlvls);
        if($contarlvl == 1){
        $sqlEliminarNivel = "DELETE FROM niveles WHERE (`idnivel` = '$idNivel');";
        $sqlEliminarNiveles = $this->conexion->query($sqlEliminarNivel);
    
        $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a eliminado un nivel', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);    
    
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
            }else{
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                        swal({
                        title:'Nivel',
                        text:'No se ah podido eliminar',
                        icon:'error'
                        
                        })
                        .then((value) => {
                            window.location='../cursos.php';
                            window.location='../editor-cursos.php';
                            
                        })</script>";           
            }
    }





//AGREGAR MODIFICAR CURSOS

public function agregarCursos($nombreCurso, $nivelCurso, $imagenCurso, $enlaceCurso){
    $sqlBuscar = "SELECT area FROM area where area LIKE '$nombreCurso';";
    $sqlBuscarNombre = $this->conexion->query($sqlBuscar);

    if(mysqli_num_rows($sqlBuscarNombre) == 0){

    $sqlAgregarCursos = "INSERT INTO area values (0, '$nombreCurso', '$nivelCurso', '$imagenCurso', '$enlaceCurso')";

    $sqlAgregarCurso = $this->conexion->query($sqlAgregarCursos);

    $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a agregado un curso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);    

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
    $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
}elseif($nivelCurso == "" & $imagenCurso == "" & $enlaceCurso == ""){
   
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
      
}elseif($nombreCurso == "" & $nivelCurso == "" & $enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
}elseif($nombreCurso == "" & $nivelCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado el curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
          


  }elseif($imagenCurso == "" & $enlaceCurso == ""){

    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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

  }elseif($nivelCurso == "" & $enlaceCurso == ""){

    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
  }elseif($nivelCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
  
  }elseif($nombreCurso == "" & $enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
   
  }elseif($nombreCurso == "" & $imagenCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
   
  
}elseif($nombreCurso == "" & $nivelCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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

}elseif($nombreCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
}elseif($nivelCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
}elseif($enlaceCurso == ""){
    
    $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso' WHERE (`id_area` = '$idCurso');";
      $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
      $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);
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
}else{
  
  $sqlEditarCursos = "UPDATE area SET area = '$nombreCurso', nivelnumero = '$nivelCurso', areaimagen = '$imagenCurso', areaenlace = '$enlaceCurso' WHERE (`id_area` = '$idCurso');";
    $sqlEditarCurso = $this->conexion->query($sqlEditarCursos);
    $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a editado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);

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

} 





}



public function eliminarCursos($idCurso){

  $sqlEliminarCurso = "DELETE FROM area WHERE (`id_area` = '$idCurso');";
  $sqlEliminarCursos = $this->conexion->query($sqlEliminarCurso);
  $fecha_actual = date("Y-m-d H:i:s");
        $ci = $_SESSION['ci'];
        $nombreusuario = $_SESSION['usuario'];
        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a eliminado un curso $nombreCurso', '$fecha_actual')";
        $sqlauditoria = $this->conexion->query($consauditoria);  
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