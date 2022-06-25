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
        area, 
        estado
        from area
        where estado='activo'";

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
        enlace,  
        min_not as miniatura,
        img_not as imagen,
        noticias.estado,
        area,
        noticias.id_area as idarea,
        nombre
        
        from noticias, area, usuarios
        where noticias.id_area = area.id_area and  
        noticias.ci_usuario = usuarios.ci 
        
        
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

    public function agregarEtiqueta($Titulo, $Noticia, $Estado){

        /*Cuando le damos a agregar articulo*/
       

            /*Chequeamos que las variables antes mencionadas no estén vacias*/
            if($Titulo !== "" and $Noticia !== "" and $Estado !== ""){
                
                //Se define la consulta a ejecutar
                /*Se inserta la información antes especificada*/
                $sqlAgregarEtiqueta = "INSERT INTO  etiquetas values (0, '$Titulo', '$Noticia', '$Estado')";

                /*Se envia la consulta a la base de datos agrega 
                el nuevo articulo*/
                $sqlResultado = $this->conexion->query($sqlAgregarEtiqueta);

                //Redirecciona al usuario a la página de inicio
                print "<script>alert(\"Agregado exitosamente.\");window.location='admin.php';</script>";
                //header("location:index.php");

            }else{

                /*En caso de que los campos no hayan sido rellenados, se
                mostrará un mensaje de error*/
                echo "<script>window.alert('Los campos no pueden quedar vacíos, rellene todos los campos');</script>";
            }

        

    }
    
    public function editarEtiqueta($ID, $Titulo, $Estado){
        if($ID !== "" and $Titulo !== "" and $Estado !== ""){
            $sqlEditarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$Titulo', estado = '$Estado' where idetiquetas = '$ID'";

            $SqlResultado = $this->conexion->query($sqlEditarEtiqueta);

            print "<script>alert(\"Editado exitosamente.\");window.location='admin.php';</script>";
    
        }else{
            echo "<script>window.alert('Los campos no pueden quedar vacíos, rellene todos los campos');</script>";
        }
    }

}

?>