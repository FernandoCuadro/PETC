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
    public function agregarImagen($imagen1, $imagen2, $imagen3, $imagen4, $imagen5){
      if(!empty($imagen1)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen1');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
      
      if(!empty($imagen2)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen2');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
      }
      if(!empty($imagen3)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen3');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
      }
      if(!empty($imagen4)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen4');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
      }
      if(!empty($imagen5)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen5');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
      }


    }elseif(!empty($imagen2)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen2');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
          
    if(!empty($imagen1)){
            $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen1');";
            $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);    
    }
    if(!empty($imagen3)){
            $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen3');";
            $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }
    if(!empty($imagen4)){
            $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen4');";
            $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }
    if(!empty($imagen5)){
            $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen5');";
            $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }  
        
        
    }elseif(!empty($imagen3)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen3');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    
    if(!empty($imagen1)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen1');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);    
    }
    if(!empty($imagen2)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen2');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }
    if(!empty($imagen4)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen4');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }
    if(!empty($imagen5)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen5');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }


    }elseif(!empty($imagen4)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen4');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    
    if(!empty($imagen1)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen1');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);    
    }
    if(!empty($imagen2)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen2');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }
    if(!empty($imagen3)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen3');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }
    if(!empty($imagen5)){
        $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen5');";
        $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
    }
    
}elseif(!empty($imagen5)){
    $sqlAgregarImagenes = "INSERT into nosotrosimg values (0, '$imagen5');";
    $sqlAgregarImagen = $this->conexion->query($sqlAgregarImagenes);
}


        echo "<script>window.alert('Imagen/es agregada de forma exitosa');window.location='editor-nosotros.php';</script>";
       //  echo $sqlAgregarImagenes;   
                                                       
                }


    public function eliminarImagen($idimagen1, $idimagen2, $idimagen3, $idimagen4, $idimagen5){

        $sqlEliminarImagenes = "DELETE FROM nosotrosimg WHERE (`idnosotrosimg` = '$idimagen1');
                                DELETE FROM nosotrosimg WHERE (`idnosotrosimg` = '$idimagen2');
                                DELETE FROM nosotrosimg WHERE (`idnosotrosimg` = '$idimagen3');
                                DELETE FROM nosotrosimg WHERE (`idnosotrosimg` = '$idimagen4');
                                DELETE FROM nosotrosimg WHERE (`idnosotrosimg` = '$idimagen5');
        
        
        ";
        $sqlEliminarImagen = $this->conexion->multi_query($sqlEliminarImagenes);
                              
         echo "<script>window.alert('Imagen/es eliminado de forma exitosa');window.location='editor-nosotros.php';</script>";
                              
         }              



                //AGREGAR EDITAR INTEGRANTES
    public function agregarIntegrantes($nombreint, $cargoint, $fotoint){

        $sqlAgregarIntegrantes = "INSERT INTO integrantes values (0, '$nombreint', '$cargoint', '$fotoint')";
                
        $sqlAgregarIntegrante = $this->conexion->query($sqlAgregarIntegrantes);
        echo "<script>window.alert('Integrante agregado de forma exitosa');window.location='editor-nosotros.php';</script>";

                    
        }


    public function editarIntegrantes($idint, $nombreint, $cargoint, $imagenint){

        $sqlEditarIntegrantes = "UPDATE integrantes SET nombreint = '$nombreint', cargoint = '$cargoint', fotoint = '$imagenint' WHERE (`idintegrantes` = '$idint');";
                
        $sqlEditarIntegrante = $this->conexion->query($sqlEditarIntegrantes);
                
        echo "<script>window.alert('Integrante modificado de forma exitosa');window.location='editor-nosotros.php';</script>";

        }    



    

    }   