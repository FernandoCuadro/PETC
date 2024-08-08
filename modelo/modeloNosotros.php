<?php

    class modeloNosotros{

        private $conexion;      
        private $nosotros;

      
        public function __construct(){

            $this->conexion = projectoinovacion::conexion();
            $this->nosotros = array();
        }
        


       


      
     
    public function imagenes(){

            $sqlMostrarimgs = "SELECT idnosotrosimg as id, imagen 
            FROM nosotrosimg";  

            $sqlMostrarimg = $this->conexion->query($sqlMostrarimgs);
            $rowcount=mysqli_num_rows($sqlMostrarimg);
                while($filas=$sqlMostrarimg->fetch_assoc()){
                $this->nosotros[]=$filas;
                }

                return $this->nosotros;


            }

    public function integrantes(){

                $sqlMostrarints = "SELECT idintegrantes as id, nombreint, cargoint, fotoint 
                FROM integrantes";  
    
                $sqlMostrarint = $this->conexion->query($sqlMostrarints);
    
                    while($filas=$sqlMostrarint->fetch_assoc()){
                    $this->nosotros[]=$filas;
                    }
    
                    return $this->nosotros;
                }

                //AGREGAR Y ELIMINAR IMAGENES
    public function agregarImagen(){
        
        foreach($_FILES['imagengaleria']['tmp_name'] as $p => $tmp_name){
            
            
            if($_FILES['imagengaleria']['name'][$p]){
                $nom_archivo1 = $_FILES['imagengaleria']['name'][$p];
                $archivo1 = $_FILES['imagengaleria']['tmp_name'][$p];	
                $directorio = 'img';  
                $tipo_archivo1 = $_FILES['imagengaleria']['type'][$p];
                

      if (strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "jpeg") || strpos($tipo_archivo1, "jpg") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1, "webp")){

            if (move_uploaded_file($archivo1, $directorio . '/' . $nom_archivo1)){                                             
            }
       }
    }   
        $ruta1 = $directorio . '/' . $nom_archivo1;
          $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$ruta1');";
          $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);           
    }
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Imagenes',
                text:'Se han agregado correctamente',
                icon:'success'
                
                })
                .then((value) => {
                    window.location='nosotros.php';
                    window.location='editor-nosotros.php';
                    
                })</script>";
         
          
    
                }


    

                //AGREGAR EDITAR INTEGRANTES


                public function MostrarDatos($idInt){
                    
                    $sqlMostrarInt = "SELECT 
                    idintegrantes as id, nombreint, cargoint, fotoint 
                    from integrantes
                    where 
                    idintegrantes = '$idInt'";
                  
                    $sqlMostrarInts = $this->conexion->query($sqlMostrarInt);
                    while($filas= $sqlMostrarInts->fetch_assoc()){
                    $this->nosotros[]=$filas;
                    }
                  
                    //Liberamos la variable
                    return $this->nosotros;
                  
                  }



    public function agregarIntegrantes($nombreint, $cargoint, $fotoint){


    if(empty($fotoint)){
        $fotoint = "img/imagenpordefecto/integrante.png";
    }
        $sqlAgregarIntegrantes = "INSERT INTO integrantes values (0, '$nombreint', '$cargoint', '$fotoint')";
                
        $sqlAgregarIntegrante = $this->conexion->query($sqlAgregarIntegrantes);
       
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Integrantes PETC',
                text:'Se han agregado correctamente',
                icon:'success'
                
                })
                .then((value) => {
                    window.location='nosotros.php';
                    window.location='editor-nosotros.php';
                    
                })</script>";



    }

    public function editarIntegrantes($idint, $nombreint, $cargoint, $imagenint){

    if(!empty($imagenint)){
         
        $sqlurl = "SELECT fotoint FROM integrantes where idintegrantes = '$idint';";
        $sqlEnlace = $this->conexion->query($sqlurl);
        while($filas=$sqlEnlace->fetch_assoc()){
            $nosotros2[]=$filas;
            }  
            
       foreach($nosotros2 as $Poner){
        if($Poner['fotoint'] != "img/imagenpordefecto/integrante.png"){
        unlink($Poner['fotoint']); 
        }
        //echo '<script>alert("'.$Poner["fotoint"].'");</script>';
       }    
       
    }elseif(empty($imagenint)){
        $imagenint = "img/imagenpordefecto/integrante.png";
    }

        $sqlEditarIntegrantes = "UPDATE integrantes SET nombreint = '$nombreint', cargoint = '$cargoint', fotoint = '$imagenint' WHERE (`idintegrantes` = '$idint');";
                
        $sqlEditarIntegrante = $this->conexion->query($sqlEditarIntegrantes);
                
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                swal({
                title:'Integrantes PETC',
                text:'Se ha editado correctamente',
                icon:'success'
                
                })
                .then((value) => {
                    window.location='nosotros.php';
                    window.location='editor-nosotros.php';
                    
                })</script>";

    
        }    

    public function eliminarintegrante($idint){
        $sqlver = "SELECT idintegrantes FROM integrantes where idintegrantes = '$idint';";
        $sqlerror = $this->conexion->query($sqlver);
        $contarint = mysqli_num_rows($sqlerror);

        if($contarint == 1){

            $sqlurl = "SELECT fotoint FROM integrantes where idintegrantes = '$idint';";
            $sqlEnlace = $this->conexion->query($sqlurl);
            while($filas=$sqlEnlace->fetch_assoc()){
                $nosotros2[]=$filas;
                }  
                
           foreach($nosotros2 as $Poner){
            if($Poner['fotoint'] != "img/imagenpordefecto/integrante.png"){
            unlink($Poner['fotoint']); 
            }
            //echo '<script>alert("'.$Poner["fotoint"].'");</script>';
           }    
           
           
            $sqleliminarintegrantes = "DELETE FROM integrantes where (idintegrantes = '$idint');";
            $borrar = $this->conexion->query($sqleliminarintegrantes);
            if($borrar!=null){
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                        swal({
                        title:'Imagenes',
                        text:'Se ah eliminado correctamente',
                        icon:'success'
                        
                        })
                        .then((value) => {
                            window.location='nosotros.php';
                            window.location='editor-nosotros.php';
                            
                        })</script>";
            }else{
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                        swal({
                        title:'Imagenes',
                        text:'No se ah podido eliminar',
                        icon:'error'
                        
                        })
                        .then((value) => {
                            window.location='nosotros.php';
                            window.location='editor-nosotros.php';
                            
                        })</script>";           
            }
    
        }else{

            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Imagenes',
                    text:'La imagen que desea eliminar no existe',
                    icon:'error'
                    
                    })
                    .then((value) => {
                        window.location='nosotros.php';
                        window.location='editor-nosotros.php';
                        
                    })</script>";           
    
    
        }
        
    }    
        

    }   