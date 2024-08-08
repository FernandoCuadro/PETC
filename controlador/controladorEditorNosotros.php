<?php 
error_reporting(0);
require_once("modelo/modeloNosotros.php");    
$imagen = new modeloNosotros(); 
$integrantes = new modeloNosotros();    
$integrantesEdit = new modeloNosotros();    
$PonerImagen = $imagen->imagenes();
$PonerIntegrantes = $integrantes->integrantes();
$MostrarEditar = $integrantesEdit->MostrarDatos($_GET['idInt']);

require("vista/vistaEditorNosotros.php");
if(isset($_POST['agregarimagenes'])){
  if($_FILES['imagengaleria']['name'] == ""){
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
       swal({
       title:'Imagenes',
       text:'Seleccione una imagen',
       icon:'error'
       })</script>";
       /*      
  }elseif($_FILES['imagengaleria']['PATHINFO_EXTENSION'] != "jpg"){
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
       swal({
       title:'Imagenes',
       text:'No es una imagen',
       icon:'error'
       })</script>";
       */
  }else{
 
    $agregarImg = $imagen->agregarImagen();
  }
}










        //Agregar editar integrantes
if(isset($_POST['crearintegrante'])){
    if($_POST['nombreint'] == ""){
      echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
      echo "<script>
         swal({
         title:'Integrantes',
         text:'Ingrese un nombre',
         icon:'error'
         })</script>";          
        }elseif($_POST['cargoint'] == ""){
          echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
          echo "<script>
             swal({
             title:'Integrantes',
             text:'Ingrese un rol',
             icon:'error'
             })</script>";          
        }elseif($_FILES['fotoint']['name'] == ""){
      $agregarInt = $integrantes->agregarIntegrantes(
        $nombreint = $_POST['nombreint'],
        $cargoint = $_POST['cargoint'],
        $fotoint = $_POST['fotoint']

    );
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
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
       swal({
       title:'Integrantes',
       text:'Seleccione el integrante',
       icon:'error'
       })</script>";         
  }elseif($_POST['nombreintedit'] == ""){
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
       swal({
       title:'Integrantes',
       text:'Ingrese nombre del integrante',
       icon:'error'
       })</script>";  
  }elseif($_POST['cargointedit'] == ""){
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
       swal({
       title:'Integrantes',
       text:'Ingrese un rol',
       icon:'error'
       })</script>";  
  }elseif($_FILES['fotointedit']['name'] == ""){
   
    $editarInt = $integrantes->editarIntegrantes(
      $idint = $_POST['idint'],
      $nombreint = $_POST['nombreintedit'],
      $cargoint = $_POST['cargointedit'],
      $imagenint = $_POST['fotointedit']
  );
  
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
if(isset($_POST['eliminarintegrante'])){
$eliminarint = $integrantes->eliminarintegrante(
  $idint = $_POST['idint']
);  
}
?>
