<?php
date_default_timezone_set("America/Montevideo");

class modeloLogin{

    private $conexion;
    private $usuarios;  

    // Iniciamos las variables
    public function __construct(){

     $this->conexion = projectoinovacion::conexion();   
     $this->usuarios = array();

    }

    /*Función la cual usaremos para saber que las crendenciales
    que fueron ingresadas corresponden a un usuario existente*/
    //Ambas crendenciales las pedimos en la vista del Login
    public function LoginUsuario($ci, $loginContraseña){    

        //Se define la consulta a ejecutar  
        
        /*Se busca información de todos los usuarios que coincidan
        con las credenciales que se ingresaron*/
        $consultaUsuario = "SELECT nombre, contraseña, rol FROM usuarios 
            where ci = '$ci' and contraseña = '$loginContraseña'";

        /*Si se encontró información de un usuario, es porque este existe
        en caso de que no se haya encontrado tal usuario no existe*/    
        $numeroFilas = mysqli_num_rows($this->conexion->query($consultaUsuario));

        /*Si no se encuentra un usuario, se muestra un mensaje de error*/
        if($numeroFilas == 0){

            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
			echo "<script>
					swal({
					title:'Login',
					text:'Usuario no valido',
					icon:'error'
					})</script>";
        }else{

            //Se define la consulta a ejecutar
            /*Se quiere encontrar la información correspondiente del usuario
            que ingresó las credenciales */
            $consultaIniciarSesion = "SELECT ci, nombre, rol, estado FROM usuarios where ci = '$ci'";
            
            /*Se envia la consulta a la base de datos y se obtiene la información
            del usuario en cuestión*/
            $resultadoSesion = $this->conexion->query($consultaIniciarSesion);
            $datosUsuario = $resultadoSesion->fetch_assoc();
          

            if($datosUsuario['estado'] == "activo"){      
       
                if ($datosUsuario['rol'] == "administrador"){
                    $fecha_actual = date("Y-m-d H:i:s");
                    $nombreusuario = $datosUsuario['nombre'];
                    $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a iniciado sesión', '$fecha_actual')";
                    $sqlauditoria = $this->conexion->query($consauditoria);

              echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
              echo "<script>
                      swal({
                      title:'Login',
                      text:'Logueado correctamente...',
                      icon:'success'
                      
                      })
                      .then((value) => {
                          window.location='index.php';    
                      })</script>";                
                    }elseif($datosUsuario['rol'] == "moderador"){

                        $fecha_actual = date("Y-m-d H:i:s");
                        $nombreusuario = $datosUsuario['nombre'];
                        $consauditoria = "INSERT INTO auditoria values(0, '$ci', '$nombreusuario', 'Este usuario a iniciado sesión', '$fecha_actual')";
                        $sqlauditoria = $this->conexion->query($consauditoria);
                        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                        echo "<script>
                                swal({
                                title:'Login',
                                text:'Logueado correctamente...',
                                icon:'success'
                                
                                })
                                .then((value) => {
                                    window.location='index.php';   
                                })</script>";                }
      
            }elseif($datosUsuario['estado'] == "Inactivo"){
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                        swal({
                        title:'Login',
                        text:'Este usuario no esta habilitado',
                        icon:'error'
                          
                        })</script>";               
            }

              session_start();
            $_SESSION['ci']  = $datosUsuario['ci'];
            $_SESSION['usuario'] = $datosUsuario['nombre'];
            $_SESSION['perfil'] = $datosUsuario['rol'];

        }   
    }


}   



?>