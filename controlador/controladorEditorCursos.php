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
        echo "<script>window.alert('El campo nombre esta vacio');</script>";
    }elseif($_POST['ordernivel'] ==""){
        echo "<script>window.alert('El campo orden esta vacio');</script>";     
    }elseif($_POST['idnivel'] !== "" and $_POST['nomnivel'] !== "" and $_POST['ordernivel'] !==""){
        if($_POST['ordernivel'] <= 0){
            echo "<script>window.alert('El numero debe ser mayor a 0');</script>";
        
        }else{   
$agregarNivel = $nivel->agregarNivel(
$nombrenivel = $_POST['nomnivel'],
$ordennivel = $_POST['ordernivel']  
);
        }
    }
}    

if(isset($_POST['editarnivel'])){
    if($_POST['idnivel'] == ""){
        echo "<script>window.alert('Seleccione un nivel para editarlo');</script>";
    }elseif($_POST['nomniveledit'] == ""){
        echo "<script>window.alert('El campo nombre esta vacio');</script>";
    }elseif($_POST['orderniveledit'] ==""){
        echo "<script>window.alert('El campo orden esta vacio');</script>";     
    }elseif($_POST['idnivel'] !== "" and $_POST['nomniveledit'] !== "" and $_POST['orderniveledit'] !==""){
        if($_POST['orderniveledit'] <= 0){
            echo "<script>window.alert('El numero debe ser mayor a 0');</script>";
        
        }else{   
   $editarNivel = $nivel->editarNivel(
    $idnivel = $_POST['idnivel'],
    $nombrenivel = $_POST['nomniveledit'],
    $ordennivel = $_POST['orderniveledit']
   ); 
        }
    }
} 
   

if(isset($_POST['eliminarNivel'])){
    if($_POST['idnivel'] == ""){
        echo "<script>window.alert('Seleccione un nivel para eliminarlo');</script>";
    }else{    
    $eliminarNivel = $nivel->eliminarNivel(
        $idnivel = $_POST['idnivel']
    );

}
}

if(isset($_POST['crearcurso'])){
    if($_POST['nomcurso'] == ""){
        echo "<script>window.alert('El Nombre esta vácio');window.location='editor-cursos.php#CrearCurso';</script>";
    }elseif($_POST['nivelcurso'] == ""){
        echo "<script>window.alert('Debe seleccionar un nivel');window.location='editor-cursos.php#CrearCurso';</script>";
    }elseif($_POST['enlacecurso'] == ""){
        echo "<script>window.alert('Debe ingresar un enlace');window.location='editor-cursos.php#CrearCurso';</script>";
    }elseif($_FILES['imagencurso']['name'] == ""){
        echo "<script>window.alert('Debe ingresar una imagen');window.location='editor-cursos.php#CrearCurso';</script>";
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
        $nombreCurso = $_POST['nomcurso'],
        $nivelCurso = $_POST['nivelcurso'],
        $imagenCurso = $ruta,
        $enlaceCurso = $_POST['enlacecurso']
    );
                } 
            }   
        }
    }
}

if(isset($_POST['editarCurso'])){
    if($_POST['idCurso'] == ""){
        echo "<script>window.alert('Seleccione un curso');window.location='editor-cursos.php#CrearCurso';</script>";
    }elseif($_FILES['imagencursoedit']['name'] == ""){  
        $editarCurso = $cursos->editarCursos(
            $idCurso = $_POST['idCurso'],
            $nombreCurso = $_POST['nomcursoedit'],
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
        $nombreCurso = $_POST['nomcursoedit'],
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
        echo "<script>window.alert('Seleccione un curso para eliminarlo');</script>";
    }else{    
    $eliminarCurso = $cursos->eliminarCursos(
        $idCurso = $_POST['idCurso']
    );

}
}

?>