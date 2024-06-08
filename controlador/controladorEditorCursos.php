<?php
//error_reporting(0);
require_once("modelo/modeloCursos.php");
$nivel = new modeloCursos();
$mostrarlvl = new modeloCursos();
$cursos = new modeloCursos();
$mostrarCursos = new modeloCursos();




$vernivel = $mostrarlvl->obtenerNiveles();
$vercursos = $mostrarCursos->obtenerAreas();

require_once("vista/vistaEditorCursos.php");
if(isset($_POST['crearnivel'])){
    if($_POST['nomnivel'] == ""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Nivel',
           text:'Inserte un nombre al nivel',
           icon:'error'        
           })
          </script>";
    }elseif($_POST['ordernivel'] ==""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Nivel',
           text:'Inserte un orden al nivel',
           icon:'error'
           })</script>";    
    }elseif($_POST['nomnivel'] !== "" and $_POST['ordernivel'] !==""){
        if($_POST['ordernivel'] <= 0){
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
               swal({
               title:'Nivel',
               text:'el orden del nivel tiene que ser mayor a 0',
               icon:'error'
               })</script>";  
        
        }else{   
$agregarNivel = $nivel->agregarNivel(
$nombrenivel = $_POST['nomnivel'],
$ordennivel = $_POST['ordernivel']  
);

echo $agregarNivel;
        }
    }
}    

if(isset($_POST['editarnivel'])){
    if($_POST['idnivel'] == ""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Nivel',
           text:'Seleccione nivel a editar',
           icon:'error'
           })</script>";  
    }elseif($_POST['nomniveledit'] == ""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Nivel',
           text:'Ingrese un nombre',
           icon:'error'
           })</script>";  
    }elseif($_POST['ordernivel2'] ==""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Nivel',
           text:'Ingrese un orden',
           icon:'error'
           })</script>";      
    }elseif($_POST['idnivel'] !== "" and $_POST['nomniveledit'] !== "" and $_POST['ordernivel2'] !==""){
        if($_POST['ordernivel2'] <= 0){
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
               swal({
               title:'Nivel',
               text:'El orden del nivel debe ser mayor a 0',
               icon:'error'
               })</script>";  
        
        }else{   
   $editarNivel = $nivel->editarNivel(
    $idnivel = $_POST['idnivel'],
    $nombrenivel = $_POST['nomniveledit'],
    $ordennivel = $_POST['ordernivel2']
   ); 
        }
    }
} 
   

if(isset($_POST['eliminarNivel'])){
    if($_POST['idnivel'] == ""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Nivel',
           text:'Seleccione nivel a eliminar',
           icon:'error'
           })</script>";  
    }else{    
    $eliminarNivel = $nivel->eliminarNivel(
        $idnivel = $_POST['idnivel']
    );

}
}

if(isset($_POST['crearcurso'])){
    if($_POST['nomcurso'] == ""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Cursos',
           text:'Inserte un nombre al curso',
           icon:'error'
           })</script>";      
        }elseif($_POST['nivelcurso'] == ""){
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
               swal({
               title:'Cursos',
               text:'Inserte nivel al curso',
               icon:'error'
               })</script>";  
        }elseif($_POST['enlacecurso'] == ""){
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
               swal({
               title:'Cursos',
               text:'Inserte un enlace al curso',
               icon:'error'
               })</script>";  
    }elseif($_FILES['imagencurso']['name'] == ""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Cursos',
           text:'Inserte una imagen al curso',
           icon:'error'
           })</script>";      
        }else{    

    $directorio = 'img/cursos';     
    $archivo = $_FILES['imagencurso']['tmp_name'];	    

    if(is_dir($directorio) && is_uploaded_file($archivo)){

      $nom_archivo = $_FILES['imagencurso']['name'];
      $tipo_archivo = $_FILES['imagencurso']['type'];

      if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
        if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
          $ruta = $directorio . '/' . $nom_archivo;
    $agregarCurso = $cursos->agregarCursos(
        $nombreCurso = ucfirst($_POST['nomcurso']),
        $nivelCurso = $_POST['nivelcurso'],
        $imagenCurso = $ruta,
        $enlaceCurso = $_POST['enlacecurso']
    );
                } 
            }else{
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                   swal({
                   title:'Cursos',
                   text:'Inserte una imagen al curso',
                   icon:'error'
                   })</script>";   
            }   
        }
    }
}

if(isset($_POST['editarCurso'])){
    if($_POST['idCurso'] == ""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Cursos',
           text:'Inserte el curso a editar',
           icon:'error'
           })</script>";      
        }elseif($_FILES['imagencursoedit']['name'] == ""){  
        $editarCurso = $cursos->editarCursos(
            $idCurso = $_POST['idCurso'],
            $nombreCurso = ucfirst($_POST['nomcursoedit']),
            $nivelCurso = $_POST['nivelcursoedit'],
            $imagenCurso = "",
            $enlaceCurso = $_POST['enlacecursoedit']
        );
    }else{    
        $directorio = 'img/cursos';     
        $archivo = $_FILES['imagencursoedit']['tmp_name'];	

    if(is_dir($directorio) && is_uploaded_file($archivo)){

      $nom_archivo = $_FILES['imagencursoedit']['name'];
      $tipo_archivo = $_FILES['imagencursoedit']['type'];

    if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
    if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
          $ruta = $directorio . '/' . $nom_archivo;
    
    
    $editarCurso = $cursos->editarCursos(
        $idCurso = $_POST['idCurso'],
        $nombreCurso = ucfirst($_POST['nomcursoedit']),
        $nivelCurso = $_POST['nivelcursoedit'],
        $imagenCurso = $ruta,
        $enlaceCurso = $_POST['enlacecursoedit']
    );

                }
            }
        }
    } 
} 

if(isset($_POST['eliminarCurso'])){
    if($_POST['idCurso'] == ""){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
           swal({
           title:'Cursos',
           text:'Seleccione curso a eliminar',
           icon:'error'
           })</script>";      
    }else{    
    $eliminarCurso = $cursos->eliminarCursos(
        $idCurso = $_POST['idCurso']
    );

}
}

?>