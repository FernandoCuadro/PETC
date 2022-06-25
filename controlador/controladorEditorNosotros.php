<?php 
require_once("modelo/modeloNosotros.php");    
$imagen = new modeloNosotros();
$integrantes = new modeloNosotros();    
    
    
$PonerImagen = $imagen->imagenes();
$PonerIntegrantes = $integrantes->integrantes();

require("vista/vistaEditorNosotros.php");
if(isset($_POST['agregarimagenes'])){
  if($_FILES['imagen1']['name'] == "" and
    $_FILES['imagen2']['name'] == "" and
    $_FILES['imagen4']['name'] == "" and
    $_FILES['imagen3']['name'] == "" and
    $_FILES['imagen5']['name'] == "" 
  ){
    echo "<script>window.alert('Seleccione una imagen');window.location='editor-nosotros.php#subir-nueva-imagen';</script>";

  }else{
    $directorio = 'img';  
    //imagen 1   
    $archivo1 = $_FILES['imagen1']['tmp_name'];	

    if(is_dir($directorio) && is_uploaded_file($archivo1)){

      $nom_archivo1 = $_FILES['imagen1']['name'];
      $tipo_archivo1 = $_FILES['imagen1']['type'];

      if (((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "jpeg") || strpos($tipo_archivo1, "jpg") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1, "webp")))){
        if (move_uploaded_file($archivo1, $directorio . '/' . $nom_archivo1)){
          $ruta1 = $directorio . '/' . $nom_archivo1;
        }
      }
    }     
//imagen 2

          $archivo2 = $_FILES['imagen2']['tmp_name'];	

          if(is_dir($directorio) && is_uploaded_file($archivo2)){
      
            $nom_archivo2 = $_FILES['imagen2']['name'];
            $tipo_archivo2 = $_FILES['imagen2']['type'];
      
            if (((strpos($tipo_archivo2, "gif") || strpos($tipo_archivo2, "jpeg") || strpos($tipo_archivo2, "jpg") || strpos($tipo_archivo2, "png") || strpos($tipo_archivo2, "webp")))){
              if (move_uploaded_file($archivo2, $directorio . '/' . $nom_archivo2)){
                $ruta2 = $directorio . '/' . $nom_archivo2;
            }
        }
      }    
                
    //imagen 3
    
    $archivo3 = $_FILES['imagen3']['tmp_name'];	

    if(is_dir($directorio) && is_uploaded_file($archivo3)){

      $nom_archivo3 = $_FILES['imagen3']['name'];
      $tipo_archivo3 = $_FILES['imagen3']['type'];

      if (((strpos($tipo_archivo3, "gif") || strpos($tipo_archivo3, "jpeg") || strpos($tipo_archivo3, "jpg") || strpos($tipo_archivo3, "png") || strpos($tipo_archivo3, "webp")))){
        if (move_uploaded_file($archivo3, $directorio . '/' . $nom_archivo3)){
          $ruta3 = $directorio . '/' . $nom_archivo3;
        }
    }
  }    

//imagen 4

$archivo4 = $_FILES['imagen4']['tmp_name'];	

if(is_dir($directorio) && is_uploaded_file($archivo4)){

  $nom_archivo4 = $_FILES['imagen4']['name'];
  $tipo_archivo4 = $_FILES['imagen4']['type'];

  if (((strpos($tipo_archivo4, "gif") || strpos($tipo_archivo4, "jpeg") || strpos($tipo_archivo4, "jpg") || strpos($tipo_archivo4, "png") || strpos($tipo_archivo4, "webp")))){
    if (move_uploaded_file($archivo4, $directorio . '/' . $nom_archivo4)){
      $ruta4 = $directorio . '/' . $nom_archivo4;
    }
}
}    

//imagen 5

$archivo5 = $_FILES['imagen5']['tmp_name'];	

if(is_dir($directorio) && is_uploaded_file($archivo5)){

  $nom_archivo5 = $_FILES['imagen5']['name'];
  $tipo_archivo5 = $_FILES['imagen5']['type'];

  if (((strpos($tipo_archivo5, "gif") || strpos($tipo_archivo5, "jpeg") || strpos($tipo_archivo5, "jpg") || strpos($tipo_archivo5, "png") || strpos($tipo_archivo5, "webp")))){
    if (move_uploaded_file($archivo5, $directorio . '/' . $nom_archivo5)){
      $ruta5 = $directorio . '/' . $nom_archivo5;
    }
}
}
  
 
    $agregarImg = $imagen->agregarImagen(
        $imagen1 = $ruta1,
        $imagen2 = $ruta2,
        $imagen3 = $ruta3,
        $imagen4 = $ruta4,
        $imagen5 = $ruta5
    );
  }
}

if(isset($_POST['eliminarintegrantes'])){
    if($_POST['idimagen1'] == "" and
        $_POST['idimagen2'] == "" and
        $_POST['idimagen3'] == "" and
        $_POST['idimagen4'] == "" and
        $_POST['idimagen5'] == ""
      ){

      echo "<script>window.alert('Seleccione una imagen');window.location='editor-nosotros.php#subir-nueva-imagen';</script>";  
    }else{

    $eliminarImg = $imagen->eliminarImagen(
      $idimagen1 = $_POST['idimagen1'],
      $idimagen2 = $_POST['idimagen2'],
      $idimagen3 = $_POST['idimagen3'],
      $idimagen4 = $_POST['idimagen4'],
      $idimagen5 = $_POST['idimagen5']

    );
  }
}








        //Agregar editar integrantes
if(isset($_POST['crearintegrante'])){
    if($_POST['nombreint'] == ""){
        echo "<script>window.alert('El Nombre esta vácio');window.location='editor-nosotros.php#seccion-integrantes';</script>";
    }elseif($_POST['cargoint'] == ""){
        echo "<script>window.alert('El Rol esta vácio');window.location='editor-nosotros.php#seccion-integrantes';</script>";
    }elseif($_FILES['fotoint']['name'] == ""){
        echo "<script>window.alert('Debe ingresar una imagen');window.location='editor-nosotros.php#seccion-integrantes';</script>";
    }else{
    $directorio = 'img';  
    $imagen = $_FILES['fotoint']['tmp_name'];	

if(is_dir($directorio) && is_uploaded_file($imagen)){

  $nom_archivo = $_FILES['fotoint']['name'];
  $tipo_archivo = $_FILES['fotoint']['type'];

  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
    if (move_uploaded_file($imagen, $directorio . '/' . $nom_archivo)){
      $rutaimg = $directorio . '/' . $nom_archivo;
 

    $agregarInt = $integrantes->agregarIntegrantes(
        $nombreint = $_POST['nombreint'],
        $cargoint = $_POST['cargoint'],
        $fotoint = $rutaimg

    );
}
}
}

    }
}
if(isset($_POST['editarintegrante'])){
  if($_POST['idint'] == ""){
    echo "<script>window.alert('Seleccione un integrante');window.location='editor-nosotros.php#seccion-integrantes';</script>";
   }elseif($_POST['nombreintedit'] == ""){
    echo "<script>window.alert('El Nombre esta vácio');window.location='editor-nosotros.php#seccion-integrantes';</script>";
}elseif($_POST['cargointedit'] == ""){
    echo "<script>window.alert('El Rol esta vácio');window.location='editor-nosotros.php#seccion-integrantes';</script>";
}elseif($_FILES['fotointedit']['name'] == ""){
    echo "<script>window.alert('Debe ingresar una imagen');window.location='editor-nosotros.php#seccion-integrantes';</script>";
}else{
    $directorio = 'img';  
    $imagen = $_FILES['fotointedit']['tmp_name'];	

if(is_dir($directorio) && is_uploaded_file($imagen)){

  $nom_archivo = $_FILES['fotointedit']['name'];
  $tipo_archivo = $_FILES['fotointedit']['type'];

  if (((strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
    if (move_uploaded_file($imagen, $directorio . '/' . $nom_archivo)){
      $rutaimgedit = $directorio . '/' . $nom_archivo;
    }
}
}
    $editarInt = $integrantes->editarIntegrantes(
        $idint = $_POST['idint'],
        $nombreint = $_POST['nombreintedit'],
        $cargoint = $_POST['cargointedit'],
        $imagenint = $rutaimgedit


    );

}
}
?>
