<?php

class modeloNoticias{

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
 


    /*Función usada para mostrar todas las noticias 
    que estén activas*/
    public function obtenerNoticias(){

      if(!empty($_GET['idEti'])){
        $etiqueta = $_GET['idEti'];

        $sqlObtenerNoticias = "SELECT id_not as id,
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
        noticias.id_area as idarea
        from noticias, area, etiquetas
        where noticias.id_area = area.id_area and  
        noticias.estado = 'activo' and 
        fecha_not <= now() and
        noticias.id_not = etiquetas.idnoticia and
        etiquetas.etiquetasnombre = '$etiqueta'
        order by fecha_not desc, id_not desc";

          /* Se envia la consulta a la base de datos y se obtiene la información
      de todos los articulos que existen hasta el momento
      en el apartado Noticias*/
      $sqlObtenerNoticias = $this->conexion->query($sqlObtenerNoticias);
      $Totalconsulta = mysqli_num_rows($sqlObtenerNoticias);

      if($Totalconsulta > 0){

        // Cantidad de articulos que se mostrarán por pagina
        $RegXPag = 6;
        $pagina = false;

        if (isset($_GET["pagina"])){
          $pagina = $_GET["pagina"];
        }

        if (!$pagina){
          $inicio = 0;
          $pagina = 1;
        }else{
          $inicio = ($pagina - 1) * $RegXPag;
        }
        
        $totalPaginas = ceil($Totalconsulta / $RegXPag);

          $sqlObtenerNoticias2 = "SELECT id_not as id,
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
          noticias.id_area as idarea
          from noticias, area, etiquetas 
          where noticias.id_area = area.id_area and  
          noticias.estado = 'activo' and 
          fecha_not <= now() and 
          noticias.id_not = etiquetas.idnoticia and
          etiquetas.etiquetasnombre = '$etiqueta'
          order by fecha_not desc, id_not desc 
          LIMIT $inicio,$RegXPag";

          $sqlObtenerNoticias2 = $this->conexion->query($sqlObtenerNoticias2);

          /*Generamos un array con el resultado obtenido
          de la consulta realizada a la base de datos*/
          while($lista=$sqlObtenerNoticias2->fetch_assoc()){
            $this->admin[]=$lista;
          }
        session_start();
            $_SESSION['TPag'] = $totalPaginas;
            $_SESSION['Pag'] = $pagina;

          return $this->admin;
      
      }



      }elseif(!empty($_GET['idarea'])){
          $area = $_GET['idarea'];
      
          $sqlObtenerNoticias = "SELECT id_not as id,
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
            noticias.id_area as idarea
            from noticias, area 
            where noticias.id_area = area.id_area and 
            fecha_not <= now() and 
            area.id_area = '$area'
            order by fecha_not desc, id_not desc";
      
            /* Se envia la consulta a la base de datos y se obtiene la información
        de todos los articulos que existen hasta el momento
        en el apartado Noticias*/
        $sqlObtenerNoticias = $this->conexion->query($sqlObtenerNoticias);
        $Totalconsulta = mysqli_num_rows($sqlObtenerNoticias);
      
        if($Totalconsulta > 0){
      
          // Cantidad de articulos que se mostrarán por pagina
          $RegXPag = 6;
          $pagina = false;
      
          if (isset($_GET["pagina"])){
            $pagina = $_GET["pagina"];
          }
      
          if (!$pagina){
            $inicio = 0;
            $pagina = 1;
          }else{
            $inicio = ($pagina - 1) * $RegXPag;
          }
          
          $totalPaginas = ceil($Totalconsulta / $RegXPag);
      
            $sqlObtenerNoticias2 = "SELECT id_not as id,
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
            noticias.id_area as idarea
            from noticias, area
            where noticias.id_area = area.id_area and  
            fecha_not <= now() and 
            area.id_area = '$area'
            order by fecha_not desc, id_not desc 
            LIMIT $inicio,$RegXPag";
      
            $sqlObtenerNoticias2 = $this->conexion->query($sqlObtenerNoticias2);
      
            /*Generamos un array con el resultado obtenido
            de la consulta realizada a la base de datos*/
            while($lista=$sqlObtenerNoticias2->fetch_assoc()){
              $this->admin[]=$lista;
            }
          session_start();
              $_SESSION['TPag'] = $totalPaginas;
              $_SESSION['Pag'] = $pagina;
      
            return $this->admin;
        
        }
      
      }else{


      //Se define la consulta a ejecutar
      /*Se busca obtener toda la información de todas 
      las noticias que estén activas*/
      $sqlObtenerNoticias = "SELECT id_not as id,
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
          noticias.id_area as idarea
          from noticias, area 
          where noticias.id_area = area.id_area and   
          noticias.estado = 'activo' and 
          fecha_not <= now()
          order by fecha_not desc, id_not desc";

      /* Se envia la consulta a la base de datos y se obtiene la información
      de todos los articulos que existen hasta el momento
      en el apartado Noticias*/
      $sqlObtenerNoticias = $this->conexion->query($sqlObtenerNoticias);
      $Totalconsulta = mysqli_num_rows($sqlObtenerNoticias);

      if($Totalconsulta > 0){

        // Cantidad de articulos que se mostrarán por pagina
        $RegXPag = 6;
        $pagina = false;

        if (isset($_GET["pagina"])){
          $pagina = $_GET["pagina"];
        }

        if (!$pagina){
          $inicio = 0;
          $pagina = 1;
        }else{
          $inicio = ($pagina - 1) * $RegXPag;
        }
        
        $totalPaginas = ceil($Totalconsulta / $RegXPag);

          $sqlObtenerNoticias2 = "SELECT id_not as id,
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
          noticias.id_area as idarea
          from noticias, area 
          where noticias.id_area = area.id_area and  
          noticias.estado = 'activo' and 
          fecha_not <= now()
          order by fecha_not desc, id_not desc 
          LIMIT $inicio,$RegXPag";

          $sqlObtenerNoticias2 = $this->conexion->query($sqlObtenerNoticias2);

          /*Generamos un array con el resultado obtenido
          de la consulta realizada a la base de datos*/
          while($lista=$sqlObtenerNoticias2->fetch_assoc()){
            $this->admin[]=$lista;
          }
        session_start();
            $_SESSION['TPag'] = $totalPaginas;
            $_SESSION['Pag'] = $pagina;

          return $this->admin;
      
      }

    }
  }


//NOTICIAS QUE VE EL ADMIN

public function obtenerNoticiasAdmin(){

  if(!empty($_GET['idEti'])){
    $etiqueta = $_GET['idEti'];

    $sqlObtenerNoticias = "SELECT id_not as id,
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
    noticias.id_area as idarea
    from noticias, area, etiquetas
    where noticias.id_area = area.id_area and  
    noticias.estado = 'activo' and 
    fecha_not <= now() and
    noticias.id_not = etiquetas.idnoticia and
    etiquetas.etiquetasnombre = '$etiqueta'
    order by fecha_not desc, id_not desc";

      /* Se envia la consulta a la base de datos y se obtiene la información
  de todos los articulos que existen hasta el momento
  en el apartado Noticias*/
  $sqlObtenerNoticias = $this->conexion->query($sqlObtenerNoticias);
  $Totalconsulta = mysqli_num_rows($sqlObtenerNoticias);

  if($Totalconsulta > 0){

    // Cantidad de articulos que se mostrarán por pagina
    $RegXPag = 15;
    $pagina = false;

    if (isset($_GET["pagina"])){
      $pagina = $_GET["pagina"];
    }

    if (!$pagina){
      $inicio = 0;
      $pagina = 1;
    }else{
      $inicio = ($pagina - 1) * $RegXPag;
    }
    
    $totalPaginas = ceil($Totalconsulta / $RegXPag);

      $sqlObtenerNoticias2 = "SELECT id_not as id,
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
      noticias.id_area as idarea
      from noticias, area, etiquetas 
      where noticias.id_area = area.id_area and  
      noticias.estado = 'activo' and 
      fecha_not <= now() and 
      noticias.id_not = etiquetas.idnoticia and
      etiquetas.etiquetasnombre = '$etiqueta'
      order by fecha_not desc, id_not desc 
      LIMIT $inicio,$RegXPag";

      $sqlObtenerNoticias2 = $this->conexion->query($sqlObtenerNoticias2);

      /*Generamos un array con el resultado obtenido
      de la consulta realizada a la base de datos*/
      while($lista=$sqlObtenerNoticias2->fetch_assoc()){
        $this->admin[]=$lista;
      }
    session_start();
        $_SESSION['TPag'] = $totalPaginas;
        $_SESSION['Pag'] = $pagina;

      return $this->admin;
  
  }



  }elseif(!empty($_GET['idarea'])){
    $area = $_GET['idarea'];

    $sqlObtenerNoticias = "SELECT id_not as id,
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
      noticias.id_area as idarea
      from noticias, area 
      where noticias.id_area = area.id_area and  
      fecha_not <= now() and 
      area.id_area = '$area'
      order by fecha_not desc, id_not desc";

      /* Se envia la consulta a la base de datos y se obtiene la información
  de todos los articulos que existen hasta el momento
  en el apartado Noticias*/
  $sqlObtenerNoticias = $this->conexion->query($sqlObtenerNoticias);
  $Totalconsulta = mysqli_num_rows($sqlObtenerNoticias);

  if($Totalconsulta > 0){

    // Cantidad de articulos que se mostrarán por pagina
    $RegXPag = 15;
    $pagina = false;

    if (isset($_GET["pagina"])){
      $pagina = $_GET["pagina"];
    }

    if (!$pagina){
      $inicio = 0;
      $pagina = 1;
    }else{
      $inicio = ($pagina - 1) * $RegXPag;
    }
    
    $totalPaginas = ceil($Totalconsulta / $RegXPag);

      $sqlObtenerNoticias2 = "SELECT id_not as id,
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
      noticias.id_area as idarea
      from noticias, area, usuarios 
      where noticias.id_area = area.id_area and   
      fecha_not <= now() and 
      area.id_area = '$area'
      order by fecha_not desc, id_not desc 
      LIMIT $inicio,$RegXPag";

      $sqlObtenerNoticias2 = $this->conexion->query($sqlObtenerNoticias2);

      /*Generamos un array con el resultado obtenido
      de la consulta realizada a la base de datos*/
      while($lista=$sqlObtenerNoticias2->fetch_assoc()){
        $this->admin[]=$lista;
      }
    session_start();
        $_SESSION['TPag'] = $totalPaginas;
        $_SESSION['Pag'] = $pagina;

      return $this->admin;
  
  }



  }else{

  //Se define la consulta a ejecutar
  /*Se busca obtener toda la información de todas 
  las noticias que estén activas*/
  $sqlObtenerNoticias = "SELECT id_not as id,
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
      noticias.id_area as idarea
      from noticias, area
      where noticias.id_area = area.id_area and  
      fecha_not <= now()
      order by fecha_not desc, id_not desc";

  /* Se envia la consulta a la base de datos y se obtiene la información
  de todos los articulos que existen hasta el momento
  en el apartado Noticias*/
  $sqlObtenerNoticias = $this->conexion->query($sqlObtenerNoticias);
  $Totalconsulta = mysqli_num_rows($sqlObtenerNoticias);

  if($Totalconsulta > 0){

    // Cantidad de articulos que se mostrarán por pagina
    $RegXPag = 15;
    $pagina = false;

    if (isset($_GET["pagina"])){
      $pagina = $_GET["pagina"];
    }

    if (!$pagina){
      $inicio = 0;
      $pagina = 1;
    }else{
      $inicio = ($pagina - 1) * $RegXPag;
    }
    
    $totalPaginas = ceil($Totalconsulta / $RegXPag);

      $sqlObtenerNoticias2 = "SELECT id_not as id,
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
      noticias.id_area as idarea
      from noticias, area
      where noticias.id_area = area.id_area and  
      fecha_not <= now()
      order by fecha_not desc, id_not desc 
      LIMIT $inicio,$RegXPag";

      $sqlObtenerNoticias2 = $this->conexion->query($sqlObtenerNoticias2);

      /*Generamos un array con el resultado obtenido
      de la consulta realizada a la base de datos*/
      while($lista=$sqlObtenerNoticias2->fetch_assoc()){
        $this->admin[]=$lista;
      }
    session_start();
        $_SESSION['TPag'] = $totalPaginas;
        $_SESSION['Pag'] = $pagina;

      return $this->admin;
  
  }

}
}



  //Funciones de la noticia completa..


  public function MostrarNotiCompleta(){
    $idNot = $_GET['idNot'];
  
    $ConsultaNovedades = "SELECT 
    id_not as id, 
    titulo_not as titulo, 
    descripcion_not as descripcion, 
    contenido_not as contenido1, 
    contenido_not2 as contenido2, 
    enlace,
    fecha_not as fecha, 
    area,
    noticias.id_area as idarea, 
    noticias.estado, 
    min_not as miniatura, 
    img_not as imagen 
    from noticias, area
    where noticias.id_area = area.id_area 
    and id_not = '$idNot' ";

      $ResultadoMostrarNoti = $this->conexion->query($ConsultaNovedades);
            
      while($ListaNoticia=$ResultadoMostrarNoti->fetch_assoc()){

        $this->admin[]=$ListaNoticia;
     }
        return $this->admin; 
  }

  public function obtenerEtiquetas(){
    $idNot = $_GET['idNot'];
    
    $sqletiqueta = "SELECT idetiquetas as id, 
    etiquetasnombre as nombre, 
    idnoticia, etiquetas.estado from etiquetas, noticias
    where etiquetas.estado = 'activo' and 
    etiquetas.idnoticia = noticias.id_not and 
    etiquetas.idnoticia = '$idNot' ";

    /*Se envia la consulta a la base de datos y se obtiene la información
    de todas las áreas que estén activas*/
    $sqlResultadoetiqueta = $this->conexion->query($sqletiqueta);

    /*Generamos un array con el resultado obtenido
    de la consulta realizada a la base de datos*/
    while($filas=$sqlResultadoetiqueta->fetch_assoc()){
    $this->admin[]=$filas;
    }

    // Liberamos la variable
    return $this->admin;

}

/*
  public function mostrarComentarios(){
    $idnotCom = $_GET['idNot'];
      $sqlComentarios = "select id_com, nombre_com, correo_com, contenido_com, fecha_com, id_noticia, id_not from comentarios
        join noticias on noticias.id_not=comentarios.id_noticia
        where noticias.id_not = '$idnotCom'";
        
      $sqlComentariosResultado = $this->conexion->query($sqlComentarios);
//echo $sqlComentariosResultado;
      while ($lista=$sqlComentariosResultado->fetch_assoc()) {
          $this->admin[]=$lista;
      }

      return $this->admin;
      
  }
    
  public function mostrarRespuestas(){
    session_start();
   $id_come = $_SESSION['com'];
    
      $sqlRespuestas = "SELECT id_res as id, nombre_res as nombre, correo_res as correo, contenido_res as contenido, id_comentario as idCom from respuestas";
      
      $sqlRespuestasResultado = $this->conexion->query($sqlRespuestas);

      while($lista=$sqlRespuestasResultado->fetch_assoc()){
          $this->admin[]=$lista;
      }

      return $this->admin;
  }



  public function agregarComentario($nombreUsuario, $correoUsuario, $contenido){
    // $noticia = $_GET['idNot'];
  if($nombreUsuario !="" and $correoUsuario!="" and $contenido=""){   
     $sqlAgregarComentario = "INSERT INTO comentarios values (0, '$nombreUsuario', '$correoUsuario', '$contenido', 1)";
   echo $sqlAgregarComentario;
     $sqlAgregarComentario = $this->conexion->query($sqlAgregarComentario);
     print "<script>window.alert('Noticia agregada de forma exitosa');window.location='noticias.php';</script>";
 }else{
   print "<script>alert(\"Los datos no fueron completados, vuelva a intentar.\");window.location='noticias.php';</script>";
 }
    // echo json_encode($row);
 
     
   
 //  echo  "<script>alert('$sqlAgregarComentario');<script>";
 //  echo $sqlAgregarComentario;
 //   header('location: noticias.php');
 }
*/



//EDITOR NOTICIAS

public function MostrarDatos($idNot){

  //Se define la consulta a ejecutar
        /*Se busca obtener toda la información del articulo en cuestión*/
  $sqlMostrarDatos = "SELECT 
  id_not as id,
  fecha_not as fecha, 
  titulo_not as titulo, 
  descripcion_not as descripcion, 
  contenido_not as contenido1, 
  contenido_not2 as contenido2, 
  enlace,  
  min_not as miniatura,
  img_not as imagen,
  noticias.estado as estado,
  noticias.id_area,
  area
  from noticias, area
  where noticias.id_area = area.id_area and  
      id_not = '$idNot'";

      /*Se envia la consulta a la base de datos y se obtiene la información
        del articulo en cuestión*/
  $sqlMostrarDatos = $this->conexion->query($sqlMostrarDatos);
    

  /*Generamos un array con el resultado obtenido
        de la consulta realizada a la base de datos*/
  while($filas= $sqlMostrarDatos->fetch_assoc()){
  $this->admin[]=$filas;
  }

  //Liberamos la variable
  return $this->admin;

}



//Función usada para editar un articulo del apartado Noticias
public function editarNoticias($idNot, $Fecha, $Titulo, $Descripcion, $Contenido1, $Contenido2, $url, $Estado, $Area, $nombreEtiqueta, $estadoEtiqueta){
  if($Fecha !== "" and $Fecha >= date("Y-m-d")){
  if($idNot !== "" and 
     $Titulo !== "" and 
     $Descripcion !== "" and 
     $Contenido1 !== "" and 
     $Fecha !== "" and 
     $Area !== "" and 
     $Estado !== ""){

      
    if($_FILES['miniatura']['error'] > 0){
      
      $ruta='img/pti.jpg';

      //Se define la consulta a ejecutar
          /*Se inserta la información antes especificada*/
      $sqlActualizarNoticias = "UPDATE noticias set fecha_not = '$Fecha', titulo_not = '$Titulo', descripcion_not = '$Descripcion',
            contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', enlace= '$url', min_not = '$ruta', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

      /*Se envia la consulta a la base de datos agrega  
      el nuevo articulo*/
      $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticias);

      if($sqlActualizarNoticias){

        if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

          $sqlActualizarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$nombreEtiqueta', estado = '$estadoEtiqueta' where idnoticia = '$idNot'";

          $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

          echo "<script>window.alert('Noticia y Etiquetas actualizada forma exitosa');window.location='noticias.php';</script>";
        }  
        echo "<script>window.alert('Noticia actualizada forma exitosa');window.location='noticias.php';</script>";
      }

      //Redirecciona al usuario a la página de noticias
      

    }else{
      $directorio = 'img';
      
      $archivo = $_FILES['miniatura']['tmp_name'];

      if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['miniatura']['name'];
        $tipo_archivo = $_FILES['miniatura']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
            $ruta = $directorio . '/' . $nom_archivo;
    
            //Se define la consulta a ejecutar
                /*Se inserta la información antes especificada*/
            $sqlActualizarNoticias = "UPDATE noticias set fecha_not = '$Fecha', titulo_not = '$Titulo', descripcion_not = '$Descripcion',
            contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', enlace= '$url', min_not = '$ruta', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

            /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
            $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticias);

            //Redirecciona al usuario a la página de noticias
            if($sqlActualizarNoticias){
              if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

                $sqlActualizarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$nombreEtiqueta', estado = '$estadoEtiqueta' where idnoticia = '$idNot'";

                $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

                echo "<script>window.alert('Noticia y Etiquetas actualizada forma exitosa');window.location='noticias.php';</script>";
              }
              echo "<script>window.alert('Noticia actualizada forma exitosa');window.location='noticias.php';</script>";
      
            }

          }
        }		
      }

    }


    if($_FILES['archivo2']['error'] > 0){
      
      $ruta2='';

      //Se define la consulta a ejecutar
          /*Se inserta la información antes especificada*/
      $sqlActualizarNoticias = "UPDATE noticias set fecha_not = '$Fecha', titulo_not = '$Titulo', descripcion_not = '$Descripcion',
      contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', enlace= '$url', min_not = '$ruta', img_not = '$ruta2', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

      /*Se envia la consulta a la base de datos agrega 
      el nuevo articulo*/
      $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticias);

      echo "<h3>".$ruta2."</h3>";

      //Redirecciona al usuario a la página de noticias
      if($sqlActualizarNoticias){
        if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

          $sqlActualizarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$nombreEtiqueta', estado = '$estadoEtiqueta' where idnoticia = '$idNot'";

          $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

          echo "<script>window.alert('Noticia y Etiquetas actualizada forma exitosa');window.location='noticias.php';</script>";
        }
        echo "<script>window.alert('Noticia actualizada forma exitosa');window.location='noticias.php';</script>";

      }

    }else{
      $directorio = 'img';
      
      $archivo = $_FILES['archivo2']['tmp_name'];

      if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['archivo2']['name'];
        $tipo_archivo = $_FILES['archivo2']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
            $ruta2 = $directorio . '/' . $nom_archivo;
    
            //Se define la consulta a ejecutar
                /*Se inserta la información antes especificada*/
            $sqlActualizarNoticias = "UPDATE noticias set fecha_not = '$Fecha', titulo_not = '$Titulo', descripcion_not = '$Descripcion',
            contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', enlace= '$url', min_not = '$ruta', img_not = '$ruta2', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

            /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
            $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticias);
            echo "<h3>".$ruta2."</h3>";
            //Redirecciona al usuario a la página de noticias
            if($sqlActualizarNoticias){
              if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

                $sqlActualizarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$nombreEtiqueta', estado = '$estadoEtiqueta' where idnoticia = '$idNot'";

                $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

                echo "<script>window.alert('Noticia y Etiquetas actualizada forma exitosa');window.location='noticias.php';</script>";
              }
              echo "<script>window.alert('Noticia actualizada forma exitosa');window.location='noticias.php';</script>";
      
            }

          }
        }		
      }

    }


  }elseif($idNot !== "" and 
     $Titulo !== "" and 
     $Descripcion !== "" and 
     $Contenido1 !== "" and 
     $Fecha == "" and 
     $Area !== "" and  
     $Estado !== ""){

      
    if($_FILES['miniatura']['error'] > 0){
      
      $ruta='img/pti.jpg';

      //Se define la consulta a ejecutar
          /*Se inserta la información antes especificada*/
      $sqlActualizarNoticias = "UPDATE noticias set fecha_not = curdate(), titulo_not = '$Titulo', descripcion_not = '$Descripcion',
            contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', enlace= '$url', min_not = '$ruta', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

      /*Se envia la consulta a la base de datos agrega 
      el nuevo articulo*/
      $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticias);

      //Redirecciona al usuario a la página de noticias
      if($sqlActualizarNoticias){
        if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

          $sqlActualizarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$nombreEtiqueta', estado = '$estadoEtiqueta' where idnoticia = '$idNot'";

          $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

          echo "<script>window.alert('Noticia y Etiquetas actualizada forma exitosa');window.location='noticias.php';</script>";
        }
        echo "<script>window.alert('Noticia actualizada forma exitosa');window.location='noticias.php';</script>";

      }

    }else{
      $directorio = 'img';
      
      $archivo = $_FILES['miniatura']['tmp_name'];

      if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['miniatura']['name'];
        $tipo_archivo = $_FILES['miniatura']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
            $ruta = $directorio . '/' . $nom_archivo;
    
            //Se define la consulta a ejecutar
                /*Se inserta la información antes especificada*/
            $sqlActualizarNoticias = "UPDATE noticias set fecha_not = curdate(), titulo_not = '$Titulo', descripcion_not = '$Descripcion',
            contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', enlace= '$url', min_not = '$ruta', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

            /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
            $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticias);

            //Redirecciona al usuario a la página de noticias
            if($sqlActualizarNoticias){
              if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

                $sqlActualizarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$nombreEtiqueta', estado = '$estadoEtiqueta' where idnoticia = '$idNot'";

                $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

                echo "<script>window.alert('Noticia y Etiquetas actualizada forma exitosa');window.location='noticias.php';</script>";
              }
              echo "<script>window.alert('Noticia actualizada forma exitosa');window.location='noticias.php';</script>";
      
            }

          }
        }		
      }

    }


    if($_FILES['archivo2']['error'] > 0){
      
      $ruta2='';

      //Se define la consulta a ejecutar
          /*Se inserta la información antes especificada*/
      $sqlActualizarNoticias = "UPDATE noticias set fecha_not = curdate(), titulo_not = '$Titulo', descripcion_not = '$Descripcion',
      contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', enlace= '$url', min_not = '$ruta', img_not = '$ruta2', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

      /*Se envia la consulta a la base de datos agrega 
      el nuevo articulo*/
      $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticias);

      echo "<h3>".$ruta2."</h3>";

      //Redirecciona al usuario a la página de noticias
      if($sqlActualizarNoticias){
        if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

          $sqlActualizarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$nombreEtiqueta', estado = '$estadoEtiqueta' where idnoticia = '$idNot'";

          $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

          echo "<script>window.alert('Noticia y Etiquetas actualizada forma exitosa');window.location='noticias.php';</script>";
        }
        echo "<script>window.alert('Noticia actualizada forma exitosa');window.location='noticias.php';</script>";

      }
    }else{
      $directorio = 'img';
      
      $archivo = $_FILES['archivo2']['tmp_name'];

      if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['archivo2']['name'];
        $tipo_archivo = $_FILES['archivo2']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
            $ruta2 = $directorio . '/' . $nom_archivo;
    
            //Se define la consulta a ejecutar
                /*Se inserta la información antes especificada*/
            $sqlActualizarNoticias = "UPDATE noticias set fecha_not = curdate(), titulo_not = '$Titulo', descripcion_not = '$Descripcion',
            contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', enlace= '$url', min_not = '$ruta', img_not = '$ruta2', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

            /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
            $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticias);
            echo "<h3>".$ruta2."</h3>";
            //Redirecciona al usuario a la página de noticias
            if($sqlActualizarNoticias){
              if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

                $sqlActualizarEtiqueta = "UPDATE etiquetas set etiquetasnombre = '$nombreEtiqueta', estado = '$estadoEtiqueta' where idnoticia = '$idNot'";

                $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

                echo "<script>window.alert('Noticia y Etiquetas actualizada forma exitosa');window.location='noticias.php';</script>";
              }
              echo "<script>window.alert('Noticia actualizada forma exitosa');window.location='noticias.php';</script>";
      
            }

          }
        }		
      }

    }



  }else{
  /*En caso de que no se completen todos los datos, se muestra un mensaje de error*/
  echo "<script>window.alert('Los datos importantes estan vacios, rellena');window.location='noticias.php';</script>";
  }
}else{
  print "<script>alert(\"No se puede ingresar una fecha pasada.\");</script>";
}

}	


  /*Si el usuario no ingresa la fecha, se ingresan todos los datos y como fecha se guarda
  la del día corriente*/
  

  






//Función para agregar un nuevo articulo en el apartado inicio
public function agregarNoticias(){

  /*Cuando le damos a agregar articulo*/
  if(isset($_POST['agregarNoticias'])){ 

    /*Tomamos los siguientes datos del formulario para 
    luego poder ingresarlos en la base de datos*/
    $Titulo = $_POST['titulo'];
    $Descripcion = $_POST['descripcion'];
    $Contenido1 = $_POST['contenido1'];
    $Contenido2 = $_POST['contenido2'];
    $url = $_POST['url'];
  	$Fecha = $_POST['fecha'];
    $Estado = $_POST['estado'];
    $IDArea = $_POST['area'];
    $nombreEtiqueta = $_POST['nombreEtiqueta'];
    $estadoEtiqueta = $_POST['estadoEtiqueta'];
    

    if($Fecha !== "" and $Fecha >= date("Y-m-d")){
    /*Chequeamos que las variables antes mencionadas no estén vacias*/
    if($Titulo !== "" and $Fecha !== "" and $Descripcion !== "" and $Contenido1 !== "" and $IDArea !== "" and $Estado !== ""){
      
      if($_FILES['miniatura']['error'] > 0){
        
        $ruta='img/pti.jpg';
        
        //Se define la consulta a ejecutar
              /*Se inserta la información antes especificada*/
        $sqlAgregarNoticias = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$url', '$ruta', '$Estado', '$IDArea')";

        /*Se envia la consulta a la base de datos agrega 
        el nuevo articulo*/
        $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticias);

        if($sqlAgregarNoticias){
         
          $VerUltimaNoticia = "  SELECT id_not as id from noticias order by id_not desc limit 1";

          $UltimaNoticia = $this->conexion->query($VerUltimaNoticia);
    

          /*Generamos un array con el resultado obtenido
                de la consulta realizada a la base de datos*/
          while($filas= $UltimaNoticia->fetch_assoc()){
            session_start();
          $_SESSION['NotEtiID'] = $filas['id'];
          }
        
          //Liberamos la variable
       $IDNotEti = $_SESSION['NotEtiID'];

       if($UltimaNoticia){
        if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){

          while(true){

            $itemNombre = current($nombreEtiqueta);
				    $itemEstado = current($estadoEtiqueta);

            $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
				    $EtiquetaEstado=(( $itemEstado !== false) ? $itemEstado : ", &nbsp;");

            $valores="('$EtiquetaNombre',$IDNotEti,'$EtiquetaEstado'),";

            $valoresQ= substr($valores, 0, -1);

          $sqlActualizarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";

          $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);

          $itemNombre = next( $nombreEtiqueta );
          $itemEstado = next( $estadoEtiqueta );
          
          
          // Check terminator
          if($itemNombre === false && $itemEstado === false) break;
          } 

        } 
     
     }
          
          echo "<script>window.alert('Se ah agregado la noticia correctamente');window.location='noticias.php';</script>";
        }


        //Redirecciona al usuario a la página de noticias
         
        }else{
        $directorio = 'img';
        
        $archivo = $_FILES['miniatura']['tmp_name'];	

        if(is_dir($directorio) && is_uploaded_file($archivo)){

          $nom_archivo = $_FILES['miniatura']['name'];
          $tipo_archivo = $_FILES['miniatura']['type'];

          if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
            if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
              $ruta = $directorio . '/' . $nom_archivo;
      
              //Se define la consulta a ejecutar
                    /*Se inserta la información antes especificada*/
              $sqlAgregarNoticias = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$url', '$ruta', '$Estado', '$IDArea')";

              /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
              $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticias);

              if($sqlAgregarNoticias){
         
                $VerUltimaNoticia = "  SELECT id_not as id from noticias order by id_not desc limit 1";
      
                $UltimaNoticia = $this->conexion->query($VerUltimaNoticia);
          
      
                /*Generamos un array con el resultado obtenido
                      de la consulta realizada a la base de datos*/
                while($filas= $UltimaNoticia->fetch_assoc()){
                  session_start();
                  $_SESSION['NotEtiID'] = $filas['id'];
                  }
                
                  //Liberamos la variable
               $IDNotEti = $_SESSION['NotEtiID'];
               if($UltimaNoticia){
                if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){
        
                  while(true){
        
                    $itemNombre = current($nombreEtiqueta);
                    $itemEstado = current($estadoEtiqueta);
        
                    $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
                    $EtiquetaEstado=(( $itemEstado !== false) ? $itemEstado : ", &nbsp;");
        
                    $valores="('$EtiquetaNombre',$IDNotEti,'$EtiquetaEstado'),";

                    $valoresQ= substr($valores, 0, -1);
        
                  $sqlActualizarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";
        
                  $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);
        
                  $itemNombre = next( $nombreEtiqueta );
                  $itemEstado = next( $estadoEtiqueta );
                  
                  
                  // Check terminator
                  if($itemNombre === false && $itemEstado === false) break;
                  } 
        
                } 
             
             }
                  
                  echo "<script>window.alert('Se ah agregado la noticia correctamente');window.location='noticias.php';</script>";
              }

            }
          }		
        }

      }	


      if($_FILES['archivo2']['error'] > 0){
        
        $ruta2='';

        //Se define la consulta a ejecutar
              /*Se inserta la información antes especificada*/
        $sqlAgregarNoticias = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$url', '$ruta', '$ruta2', '$Estado', '$IDArea')";

        /*Se envia la consulta a la base de datos agrega 
        el nuevo articulo*/
        $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticias);

        if($sqlAgregarNoticias){
         
          $VerUltimaNoticia = "  SELECT id_not as id from noticias order by id_not desc limit 1";

          $UltimaNoticia = $this->conexion->query($VerUltimaNoticia);
    

          /*Generamos un array con el resultado obtenido
                de la consulta realizada a la base de datos*/
          while($filas= $UltimaNoticia->fetch_assoc()){
            session_start();
            $_SESSION['NotEtiID'] = $filas['id'];
            }
          
            //Liberamos la variable
         $IDNotEti = $_SESSION['NotEtiID'];
         if($UltimaNoticia){
          if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){
  
            while(true){
  
              $itemNombre = current($nombreEtiqueta);
              $itemEstado = current($estadoEtiqueta);
  
              $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
              $EtiquetaEstado=(( $itemEstado !== false) ? $itemEstado : ", &nbsp;");
  
              $valores="('$EtiquetaNombre',$IDNotEti,'$EtiquetaEstado'),";  

              $valoresQ= substr($valores, 0, -1);
  
            $sqlActualizarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";
  
            $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);
  
            $itemNombre = next( $nombreEtiqueta );
            $itemEstado = next( $estadoEtiqueta );
            
            
            // Check terminator
            if($itemNombre === false && $itemEstado === false) break;
            } 
  
          } 
       
       }
            
            echo "<script>window.alert('Se ah agregado la noticia correctamente');window.location='noticias.php';</script>";
        }
      }else{
        $directorio = 'img';
        
        $archivo = $_FILES['archivo2']['tmp_name'];

        if(is_dir($directorio) && is_uploaded_file($archivo)){

          $nom_archivo = $_FILES['archivo2']['name'];
          $tipo_archivo = $_FILES['archivo2']['type'];

          if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
            if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
              $ruta2 = $directorio . '/' . $nom_archivo;
      
              //Se define la consulta a ejecutar
                    /*Se inserta la información antes especificada*/
              $sqlAgregarNoticias = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$url', '$ruta', '$ruta2', '$Estado', '$IDArea')";

              /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
              $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticias);

              if($sqlAgregarNoticias){
         
                $VerUltimaNoticia = "  SELECT id_not as id from noticias order by id_not desc limit 1";
      
                $UltimaNoticia = $this->conexion->query($VerUltimaNoticia);
          
      
                /*Generamos un array con el resultado obtenido
                      de la consulta realizada a la base de datos*/
                while($filas= $UltimaNoticia->fetch_assoc()){
                  session_start();
                  $_SESSION['NotEtiID'] = $filas['id'];
                  }
                
                  //Liberamos la variable
               $IDNotEti = $_SESSION['NotEtiID'];
                  
               if($UltimaNoticia){
                if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){
        
                  while(true){
        
                    $itemNombre = current($nombreEtiqueta);
                    $itemEstado = current($estadoEtiqueta);
        
                    $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
                    $EtiquetaEstado=(( $itemEstado !== false) ? $itemEstado : ", &nbsp;");
                   
                     $valores="('$EtiquetaNombre',$IDNotEti,'$EtiquetaEstado'),";
        
                    $valoresQ= substr($valores, 0, -1);
        
                  $sqlActualizarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";
        
                  $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);
        
                  $itemNombre = next( $nombreEtiqueta );
                  $itemEstado = next( $estadoEtiqueta );
                  
                  
                  // Check terminator
                  if($itemNombre === false && $itemEstado === false) break;
                  } 
        
                } 
             
             }
                  
                  echo "<script>window.alert('Se ah agregado la noticia correctamente');window.location='noticias.php';</script>";
              }
            }
          }		
        }

      }



    }elseif($Titulo !== "" and $Fecha !== "" and $Descripcion !== "" and $Contenido1 !== "" and $Fecha == "" and $IDArea !== "" and $Estado !== ""){

      if($_FILES['miniatura']['error'] > 0){
        
        $ruta='img/pti.jpg';

        //Se define la consulta a ejecutar
              /*Se inserta la información antes especificada*/
        $sqlAgregarNoticias = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$url', '$ruta', '$Estado', '$IDArea')";

        /*Se envia la consulta a la base de datos agrega 
        el nuevo articulo*/
        $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticias);

        if($sqlAgregarNoticias){
         
          $VerUltimaNoticia = "  SELECT id_not as id from noticias order by id_not desc limit 1";

          $UltimaNoticia = $this->conexion->query($VerUltimaNoticia);
    

          /*Generamos un array con el resultado obtenido
                de la consulta realizada a la base de datos*/
          while($filas= $UltimaNoticia->fetch_assoc()){
            session_start();
            $_SESSION['NotEtiID'] = $filas['id'];
            }
          
            //Liberamos la variable
         $IDNotEti = $_SESSION['NotEtiID'];
            
         if($UltimaNoticia){
          if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){
  
            while(true){
  
              $itemNombre = current($nombreEtiqueta);
              $itemEstado = current($estadoEtiqueta);
  
              $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
              $EtiquetaEstado=(( $itemEstado !== false) ? $itemEstado : ", &nbsp;");
  
              $valores="('$EtiquetaNombre',$IDNotEti,'$EtiquetaEstado'),";
  
              $valoresQ= substr($valores, 0, -1);
  
            $sqlActualizarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";
  
            $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);
  
            $itemNombre = next( $nombreEtiqueta );
            $itemEstado = next( $estadoEtiqueta );
            
            
            // Check terminator
            if($itemNombre === false && $itemEstado === false) break;
            } 
  
          } 
       
       }
            
            echo "<script>window.alert('Se ah agregado la noticia Correctamente');window.location='noticias.php';</script>";
          }
      }else{
        $directorio = 'img';
        
        $archivo = $_FILES['miniatura']['tmp_name'];

        if(is_dir($directorio) && is_uploaded_file($archivo)){

          $nom_archivo = $_FILES['miniatura']['name'];
          $tipo_archivo = $_FILES['miniatura']['type'];

          if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
            if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
              $ruta = $directorio . '/' . $nom_archivo;
      
              //Se define la consulta a ejecutar
                    /*Se inserta la información antes especificada*/
              $sqlAgregarNoticias = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$url', '$ruta', '$Estado', '$IDArea')";

              /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
              $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticias);

              //Redirecciona al usuario a la página de noticias
              if($sqlAgregarNoticias){
         
                $VerUltimaNoticia = "  SELECT id_not as id from noticias order by id_not desc limit 1";
      
                $UltimaNoticia = $this->conexion->query($VerUltimaNoticia);
          
      
                /*Generamos un array con el resultado obtenido
                      de la consulta realizada a la base de datos*/
                while($filas= $UltimaNoticia->fetch_assoc()){
                  session_start();
                  $_SESSION['NotEtiID'] = $filas['id'];
                  }
                
                  //Liberamos la variable
               $IDNotEti = $_SESSION['NotEtiID'];
                  
               if($UltimaNoticia){
                if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){
        
                  while(true){
        
                    $itemNombre = current($nombreEtiqueta);
                    $itemEstado = current($estadoEtiqueta);
        
                    $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
                    $EtiquetaEstado=(( $itemEstado !== false) ? $itemEstado : ", &nbsp;");
        
                    $valores="('$EtiquetaNombre',$IDNotEti,'$EtiquetaEstado'),";
        
                    $valoresQ= substr($valores, 0, -1);
        
                  $sqlActualizarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";
        
                  $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);
        
                  $itemNombre = next( $nombreEtiqueta );
                  $itemEstado = next( $estadoEtiqueta );
                  
                  
                  // Check terminator
                  if($itemNombre === false && $itemEstado === false) break;
                  } 
        
                } 
             
             }
                  
                  echo "<script>window.alert('Se ah agregado la noticia Correctamente');window.location='noticias.php';</script>";
              }
            }
          }		
        }

      }


      if($_FILES['archivo2']['error'] > 0){
        
        $ruta2='';

        //Se define la consulta a ejecutar
              /*Se inserta la información antes especificada*/
        $sqlAgregarNoticias = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$url', '$ruta', '$ruta2', '$Estado', '$IDArea')";

        /*Se envia la consulta a la base de datos agrega 
        el nuevo articulo*/
        $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticias);

        //Redirecciona al usuario a la página de noticias
        if($sqlAgregarNoticias){
         
          $VerUltimaNoticia = "  SELECT id_not as id from noticias order by id_not desc limit 1";

          $UltimaNoticia = $this->conexion->query($VerUltimaNoticia);
    

          /*Generamos un array con el resultado obtenido
                de la consulta realizada a la base de datos*/
          while($filas= $UltimaNoticia->fetch_assoc()){
            session_start();
            $_SESSION['NotEtiID'] = $filas['id'];
            }
          
            //Liberamos la variable
         $IDNotEti = $_SESSION['NotEtiID'];
            
         if($UltimaNoticia){
          if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){
  
            while(true){
  
              $itemNombre = current($nombreEtiqueta);
              $itemEstado = current($estadoEtiqueta);
  
              $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
              $EtiquetaEstado=(( $itemEstado !== false) ? $itemEstado : ", &nbsp;");
  
              $valores="('$EtiquetaNombre',$IDNotEti,'$EtiquetaEstado'),";
  
              $valoresQ= substr($valores, 0, -1);
  
            $sqlActualizarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";
  
            $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);
  
            $itemNombre = next( $nombreEtiqueta );
            $itemEstado = next( $estadoEtiqueta );
            
            
            // Check terminator
            if($itemNombre === false && $itemEstado === false) break;
            } 
  
          } 
       
       }
            
            echo "<script>window.alert('Se ah agregado la noticia Correctamente');window.location='noticias.php';</script>";
        }
      }else{
        $directorio = 'img';
        
        $archivo = $_FILES['archivo2']['tmp_name'];

        if(is_dir($directorio) && is_uploaded_file($archivo)){

          $nom_archivo = $_FILES['archivo2']['name'];
          $tipo_archivo = $_FILES['archivo2']['type'];

          if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
            if (move_uploaded_file($archivo, $directorio . '/' . $nom_archivo)){
              $ruta2 = $directorio . '/' . $nom_archivo;
      
              //Se define la consulta a ejecutar
                    /*Se inserta la información antes especificada*/
              $sqlAgregarNoticias = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$url', '$ruta', '$ruta2', '$Estado', '$IDArea')";

              /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
              $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticias);

              //Redirecciona al usuario a la página de noticias
              if($sqlAgregarNoticias){
         
                $VerUltimaNoticia = "  SELECT id_not as id from noticias order by id_not desc limit 1";
      
                $UltimaNoticia = $this->conexion->query($VerUltimaNoticia);
          
      
                /*Generamos un array con el resultado obtenido
                      de la consulta realizada a la base de datos*/
                while($filas= $UltimaNoticia->fetch_assoc()){
                  session_start();
                  $_SESSION['NotEtiID'] = $filas['id'];
                  }
                
                  //Liberamos la variable
               $IDNotEti = $_SESSION['NotEtiID'];

               if($UltimaNoticia){
                if($nombreEtiqueta !== "" and $estadoEtiqueta !== ""){
        
                  while(true){
        
                    $itemNombre = current($nombreEtiqueta);
                    $itemEstado = current($estadoEtiqueta);
        
                    $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
                    $EtiquetaEstado=(( $itemEstado !== false) ? $itemEstado : ", &nbsp;");
        
                    $valores="('$EtiquetaNombre',$IDNotEti,'$EtiquetaEstado'),";
        
                    $valoresQ= substr($valores, 0, -1);
        
                  $sqlActualizarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";
        
                  $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);
        
                  $itemNombre = next( $nombreEtiqueta );
                  $itemEstado = next( $estadoEtiqueta );
                  
                  
                  // Check terminator
                  if($itemNombre === false && $itemEstado === false) break;
                  } 
        
                } 
             
             }
                  
                  echo "<script>window.alert('Se ah agregado la noticia Correctamente');window.location='noticias.php';</script>";
              }
            }
          }		
        }

      }

    }else{
      print "<script>alert(\"Los datos no fueron completados, vuelva a intentar.\");window.location='noticias.php';</script>";
    }
  }else{
    print "<script>alert(\"No se puede ingresar una fecha pasada.\");</script>";
  }
  }
}	

  

}

?>