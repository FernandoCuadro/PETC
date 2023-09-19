<?php

class modeloAdmin{

    private $conexion;
    private $admin;

    // Iniciamos las variables
    public function __construct(){

      $this->conexion = projectoinovacion::conexion(); 
      $this->admin = array();

    }   

    /*Función usada para mostrar todos las áreas en la
    parte del menu*/
    public function obtenerAreasMenu(){
        //Se define la consulta a ejecutar
        /*Se busca que se muestren las distintas áreas
        que estén activas, para luego poder filtrar la 
        información mostrada a partir de ellas*/
        $sqlAreas = "SELECT 
        id_area as id, 
        area
        from area";

        /*Se envia la consulta a la base de datos y se obtiene la información
        de todas las áreas que estén activas*/
        $sqlResultadoAreas = $this->conexion->query($sqlAreas);

        /*Generamos un array con el resultado obtenido
        de la consulta realizada a la base de datos*/
        while($filas=$sqlResultadoAreas->fetch_assoc()){
        $this->admin[]=$filas;
        }

        // Liberamos la variable
        return $this->admin;

    }

    public function obtenerNoticia(){
        $sqlObtenerNoticia = "SELECT id_not as id,
        fecha_not as fecha, 
        titulo_not as titulo, 
        descripcion_not as descripcion, 
        contenido_not as contenido1, 
        contenido_not2 as contenido2,
        
        min_not as miniatura,
        img_not as imagen,
        noticias.estado,
        area,
        noticias.id_area as idarea
        
        from noticias, area
        where noticias.id_area = area.id_area  
        order by fecha_not desc, id_not desc";

        $sqlResultado = $this->conexion->query($sqlObtenerNoticia);

        while($filas=$sqlResultado->fetch_assoc()){
            $this->admin[]=$filas;
            }
            return $this->admin;    

    }

    public function obtenerEtiquetas(){

        $sqlObtenerEtiquetas = "SELECT idetiquetas as id, 
        etiquetasnombre as nombre,
        idnoticia,
        noticias.titulo_not as titulo
         from etiquetas, noticias
         where noticias.id_not = etiquetas.idnoticia
         ";

        $sqlResultado = $this->conexion->query($sqlObtenerEtiquetas);

         while($filas=$sqlResultado->fetch_assoc()){
             $this->admin[]=$filas;
        }
            return $this->admin;    

    }


 public function obtenerUsuarios(){

        $sqlObtenerUsuarios = "SELECT 
        ci, 
        nombre
         from usuarios";

        $sqlResultadoUsu = $this->conexion->query($sqlObtenerUsuarios);

         while($filas=$sqlResultadoUsu->fetch_assoc()){
             $this->admin[]=$filas;
        }
            return $this->admin;    

    }

    //AGREGAR EDITAR USUARIOS
    public function crearUsuario($nombreUsu, $cedulaUsu, $contraseñaUsu, $rolUsuario){

        $sqlAgregarUsuarios = "INSERT INTO  usuarios values ($cedulaUsu, '$nombreUsu', '$contraseñaUsu', '$rolUsuario', 'activo')";

        $sqlAgregarUsuario = $this->conexion->query($sqlAgregarUsuarios);

          echo "<script>window.location='avisoUsuario.php';</script>";
      
}

public function editarUsuario($ciUsuario, $nombreUsuario, $contrUsuario, $rolUsuario){

    $sqlEditarUsuarios = "UPDATE usuarios SET nombre = '$nombreUsuario', contraseña = '$contrUsuario', rol = '$rolUsuario' WHERE (ci = '$ciUsuario');";

    $sqlEditarUsuario = $this->conexion->query($sqlEditarUsuarios);

    echo "<script>window.location='avisoUsuario.php';</script>";

}


public function eliminarUsuario($ciUsuario){

    
	
		$sqlBorrarUsuarios = "DELETE FROM usuarios WHERE (`ci` = '$ciUsuario');";


		$borrar =  $conexion->query($sqlBorrarUsuarios);
	//	$sqlBorrarNoticia = $cosa1->conexion($conexion->query($sqlBorrar));

		if($borrar!=null){
			print "<script>window.location='avisoUsuario.php';</script>";
		}else{
			print "<script>window.location='avisoUsuarioError.php';</script>";
	
		}
	}  
	



}


?>