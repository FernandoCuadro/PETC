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

public function listaVer(){




 
  if($_GET['lista2'] == "novisible"){
    
    $sqlVer = "SELECT 
    id_not as id,
    fecha_not as fecha,		
    titulo_not as titulo,
    descripcion_not as descripcion,
    min_not as miniatura,
    noticias.id_area as idArea,
    area,
    estado
     FROM noticias, area
     where noticias.id_area = area.id_area and
     estado = 'inactivo' and
     fecha_not <= now()
     order by fecha_not desc
     ";
   
    $sqlVers = $this->conexion->query($sqlVer);
    $Totalconsulta = mysqli_num_rows($sqlVers);

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
    
        $sqlVer2 = "SELECT 
        id_not as id,
        fecha_not as fecha,		
        titulo_not as titulo,
        descripcion_not as descripcion,
        min_not as miniatura,
        noticias.id_area as idArea,
        area,
        estado
         FROM noticias, area
         where noticias.id_area = area.id_area and
         estado = 'inactivo' and
         fecha_not <= now()
         order by fecha_not desc
        LIMIT $inicio,$RegXPag";
    
        $sqlVers2 = $this->conexion->query($sqlVer2);
    
        /*Generamos un array con el resultado obtenido
        de la consulta realizada a la base de datos*/
        while($lista=$sqlVers2->fetch_assoc()){
          $this->admin[]=$lista;
        }
      session_start();
          $_SESSION['TPag'] = $totalPaginas;
          $_SESSION['Pag'] = $pagina;
    
        return $this->admin;
    
    }

  

  }elseif($_GET['lista2'] == "visible"){
    
    $sqlVer = "SELECT 
    id_not as id,
    fecha_not as fecha,		
    titulo_not as titulo,
    descripcion_not as descripcion,
    min_not as miniatura,
    noticias.id_area as idArea,
    area,
    estado
     FROM noticias, area
     where noticias.id_area = area.id_area and
     estado = 'activo' and
     fecha_not <= now() 
     order by fecha_not desc
     ";
   
    $sqlVers = $this->conexion->query($sqlVer);
    $Totalconsulta = mysqli_num_rows($sqlVers);

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

    $sqlVer2 = "SELECT 
    id_not as id,
    fecha_not as fecha,		
    titulo_not as titulo,
    descripcion_not as descripcion,
    min_not as miniatura,
    noticias.id_area as idArea,
    area,
    estado
     FROM noticias, area
     where noticias.id_area = area.id_area and
     estado = 'activo' and
     fecha_not <= now() 
     order by fecha_not desc
    LIMIT $inicio,$RegXPag";

    $sqlVers2 = $this->conexion->query($sqlVer2);

    /*Generamos un array con el resultado obtenido
    de la consulta realizada a la base de datos*/
    while($lista=$sqlVers2->fetch_assoc()){
      $this->admin[]=$lista;
    }
  session_start();
      $_SESSION['TPag'] = $totalPaginas;
      $_SESSION['Pag'] = $pagina;

    return $this->admin;

}

  
  }elseif($_GET['lista2'] == "antiguo"){

    
    $sqlVer = "SELECT 
    id_not as id,
    fecha_not as fecha,		
    titulo_not as titulo,
    descripcion_not as descripcion,
    min_not as miniatura,
    noticias.id_area as idArea,
    area,
    estado
     FROM noticias, area
     where noticias.id_area = area.id_area and
     fecha_not <= now() 
     order by fecha_not asc
     ";
   
    $sqlVers = $this->conexion->query($sqlVer);
    $Totalconsulta = mysqli_num_rows($sqlVers);

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
    
        $sqlVer2 = "SELECT 
        id_not as id,
        fecha_not as fecha,		
        titulo_not as titulo,
        descripcion_not as descripcion,
        min_not as miniatura,
        noticias.id_area as idArea,
        area,
        estado
         FROM noticias, area
         where noticias.id_area = area.id_area and
         fecha_not <= now() 
         order by fecha_not asc
        LIMIT $inicio,$RegXPag";
    
        $sqlVers2 = $this->conexion->query($sqlVer2);
        
    
        /*Generamos un array con el resultado obtenido
        de la consulta realizada a la base de datos*/
        while($lista=$sqlVers2->fetch_assoc()){
          $this->admin[]=$lista;
        }
      session_start();
          $_SESSION['TPag'] = $totalPaginas;
          $_SESSION['Pag'] = $pagina;
    
        return $this->admin;
    
    }

  }elseif($_GET['lista2'] == "reciente"){

    
    $sqlVer = "SELECT 
    id_not as id,
    fecha_not as fecha,		
    titulo_not as titulo,
    descripcion_not as descripcion,
    min_not as miniatura,
    noticias.id_area as idArea,
    area,
    estado
     FROM noticias, area
     where noticias.id_area = area.id_area and
     fecha_not <= now()
     order by fecha_not desc
     ";
   
    $sqlVers = $this->conexion->query($sqlVer);
    $Totalconsulta = mysqli_num_rows($sqlVers);
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
    
        $sqlVer2 = "SELECT 
        id_not as id,
        fecha_not as fecha,		
        titulo_not as titulo,
        descripcion_not as descripcion,
        min_not as miniatura,
        noticias.id_area as idArea,
        area,
        estado
         FROM noticias, area
         where noticias.id_area = area.id_area and
         fecha_not <= now()
         order by fecha_not desc
        LIMIT $inicio,$RegXPag";
    
        $sqlVers2 = $this->conexion->query($sqlVer2);
    
        /*Generamos un array con el resultado obtenido
        de la consulta realizada a la base de datos*/
        while($lista=$sqlVers2->fetch_assoc()){
          $this->admin[]=$lista;
        }
      session_start();
          $_SESSION['TPag'] = $totalPaginas;
          $_SESSION['Pag'] = $pagina;
    
        return $this->admin;
    
    }
  }


if(!empty($_GET['idEti'])){
  $etiqueta = $_GET['idEti'];

  $sqlVer = "SELECT 
  id_not as id,
  fecha_not as fecha,		
  titulo_not as titulo,
  descripcion_not as descripcion,
  min_not as miniatura,
  noticias.id_area as idArea,
  area,
  noticias.estado
   FROM noticias, area, etiquetas
   where noticias.id_area = area.id_area and
   fecha_not <= now() and
  noticias.id_not = etiquetas.idnoticia and
  etiquetas.etiquetasnombre = '$etiqueta'
  order by fecha_not desc";


$sqlVers = $this->conexion->query($sqlVer);
$Totalconsulta = mysqli_num_rows($sqlVers);

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

    $sqlVer2 = "SELECT 
    id_not as id,
    fecha_not as fecha,		
    titulo_not as titulo,
    descripcion_not as descripcion,
    min_not as miniatura,
    noticias.id_area as idArea,
    area,
    noticias.estado
     FROM noticias, area, etiquetas
     where noticias.id_area = area.id_area and
     fecha_not <= now() and
    noticias.id_not = etiquetas.idnoticia and
    etiquetas.etiquetasnombre = '$etiqueta'
    order by fecha_not desc 
    LIMIT $inicio,$RegXPag";

    $sqlVers2 = $this->conexion->query($sqlVer2);

    /*Generamos un array con el resultado obtenido
    de la consulta realizada a la base de datos*/
    while($lista=$sqlVers2->fetch_assoc()){
      $this->admin[]=$lista;
    }
  session_start();
      $_SESSION['TPag'] = $totalPaginas;
      $_SESSION['Pag'] = $pagina;

    return $this->admin;

}



}elseif(!empty($_GET['idarea'])){
  $area = $_GET['idarea'];

  $sqlVer = "SELECT 
  id_not as id,
  fecha_not as fecha,		
  titulo_not as titulo,
  descripcion_not as descripcion,
  min_not as miniatura,
  noticias.id_area as idArea,
  area,
  estado
   FROM noticias, area
   where noticias.id_area = area.id_area and
   fecha_not <= now() and
   area.id_area = $area
   order by fecha_not desc
   ";

   
$sqlVers = $this->conexion->query($sqlVer);
$Totalconsulta = mysqli_num_rows($sqlVers);

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

    $sqlVer2 = "SELECT 
    id_not as id,
    fecha_not as fecha,		
    titulo_not as titulo, 
    descripcion_not as descripcion,
    min_not as miniatura,
    noticias.id_area as idArea,
    area,
    estado
     FROM noticias, area
     where noticias.id_area = area.id_area and
     fecha_not <= now() and
     area.id_area = $area
     order by fecha_not desc
    LIMIT $inicio,$RegXPag";

    $sqlVers2 = $this->conexion->query($sqlVer2);

    /*Generamos un array con el resultado obtenido
    de la consulta realizada a la base de datos*/
    while($lista=$sqlVers2->fetch_assoc()){
      $this->admin[]=$lista;
    }
  session_start();
      $_SESSION['TPag'] = $totalPaginas;
      $_SESSION['Pag'] = $pagina;

    return $this->admin;

}



}else{




    $sqlVer = "SELECT 
    id_not as id,
    fecha_not as fecha,		
    titulo_not as titulo,
    descripcion_not as descripcion,
    min_not as miniatura,
    noticias.id_area as idArea,
    area,
    estado
     FROM noticias, area
     where noticias.id_area = area.id_area and
     fecha_not <= now() 
     order by fecha_not desc
     ";
    
    $sqlVers = $this->conexion->query($sqlVer);
    $Totalconsulta = mysqli_num_rows($sqlVers);
    
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
    
        $sqlVers2 = "SELECT 
        id_not as id,
        fecha_not as fecha,		
        titulo_not as titulo,
        descripcion_not as descripcion,
        min_not as miniatura,
        noticias.id_area as idArea,
        area,
        estado
         FROM noticias, area
         where noticias.id_area = area.id_area and
         fecha_not <= now() 
         order by fecha_not desc  
        LIMIT $inicio,$RegXPag";
    
        $sqlVers2 = $this->conexion->query($sqlVers2);
        
    
        /*Generamos un array con el resultado obtenido
        de la consulta realizada a la base de datos*/
      while($filas=$sqlVers2->fetch_assoc()){
        $this->admin[]=$filas;
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
    contenido_not3 as contenido3,   
    contenido_not4 as contenido4, 
    contenido_not5 as contenido5, 
    fecha_not as fecha, 
    area,
    noticias.id_area as idarea, 
    noticias.estado, 
    min_not as miniatura, 
    img_not as imagen, 
    img_not2 as imagen2, 
    img_not3 as imagen3, 
    img_not4 as imagen4, 
    img_not5 as imagen5
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

public function obtenerEnlaces(){
  $idNot = $_GET['idNot'];
  
  $sqlenlaces = "SELECT idenlaces as id, 
  nombreEnlace as nombre, 
  idNoticias from enlaces, noticias
  where 
  enlaces.idNoticias = noticias.id_not and 
  enlaces.idNoticias = '$idNot' and
  enlaces.nombreEnlace like 'https://%'";

  /*Se envia la consulta a la base de datos y se obtiene la información
  de todas las áreas que estén activas*/
  $sqlResultadoenlaces = $this->conexion->query($sqlenlaces);

  /*Generamos un array con el resultado obtenido
  de la consulta realizada a la base de datos*/
  while($filas=$sqlResultadoenlaces->fetch_assoc()){
  $this->admin[]=$filas;
  }

  // Liberamos la variable
  return $this->admin;

}


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
<<<<<<< HEAD
  contenido_not2 as contenido2, 
  enlace,  
=======
  contenido_not2 as contenido2,
  contenido_not3 as contenido3,
  contenido_not4 as contenido4,
  contenido_not5 as contenido5,    
>>>>>>> b958538 (Hasta Cursos arreglado)
  min_not as miniatura,
  img_not as imagen,
  img_not2 as imagen2,
  img_not3 as imagen3,
  img_not4 as imagen4,
  img_not5 as imagen5,
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
//Función usada para editar un articulo del apartado Noticias
public function editarNoticias($idNot, $Fecha, $Titulo, $Descripcion, $Contenido1, $Contenido2, $Contenido3, $Contenido4, $Contenido5, $Estado, $Area, $idEtiqueta, $nombreEtiqueta, $nombreEtiquetaagr, $idurl, $url, $urlagr){
  

if($_FILES['miniatura']['error'] > 0){
    $ruta = 'img/pti.jpg';
}else{
    $directorio = 'img';
      
      $archivo = $_FILES['miniatura']['tmp_name'];

    if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['miniatura']['name'];
        $tipo_archivo = $_FILES['miniatura']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
            $ruta = $directorio . '/' . $nom_archivo;
        } 
    }           
}

if($_FILES['archivo1']['error'] > 0){
    $ruta1 = '';
}else{
    $directorio = 'img';
      
      $archivo = $_FILES['archivo1']['tmp_name'];

    if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['archivo1']['name'];
        $tipo_archivo = $_FILES['archivo1']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
            $ruta1 = $directorio . '/' . $nom_archivo;
    
        }
    }
}

if($_FILES['archivo2']['error'] > 0){      
      $ruta2='';
}else{
    $directorio = 'img';
      
      $archivo = $_FILES['archivo2']['tmp_name'];

      if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['archivo2']['name'];
        $tipo_archivo = $_FILES['archivo2']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
            $ruta2 = $directorio . '/' . $nom_archivo;
      
        }
    }
}

if($_FILES['archivo3']['error'] > 0){    
      $ruta3='';
}else{

    $directorio = 'img';
      
      $archivo = $_FILES['archivo3']['tmp_name'];

    if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['archivo3']['name'];
        $tipo_archivo = $_FILES['archivo3']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
            $ruta3 = $directorio . '/' . $nom_archivo;
        }
    }
}

if($_FILES['archivo4']['error'] > 0){    
      $ruta4='';
}else{

    $directorio = 'img';
      
      $archivo = $_FILES['archivo4']['tmp_name'];

    if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['archivo4']['name'];
        $tipo_archivo = $_FILES['archivo4']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
            $ruta4 = $directorio . '/' . $nom_archivo;
        }
    }
}

if($_FILES['archivo5']['error'] > 0){     
      $ruta5='';
}else{

    $directorio = 'img';
      
      $archivo = $_FILES['archivo5']['tmp_name'];

    if(is_dir($directorio) && is_uploaded_file($archivo)){

        $nom_archivo = $_FILES['archivo5']['name'];
        $tipo_archivo = $_FILES['archivo5']['type'];

        if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
          move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
            $ruta5 = $directorio . '/' . $nom_archivo;
        }
    }
}   
            //Se define la consulta a ejecutar
                /*Se inserta la información antes especificada*/
            $sqlActualizarNoticia = "UPDATE noticias set fecha_not = '$Fecha', titulo_not = '$Titulo', descripcion_not = '$Descripcion',
            contenido_not = '$Contenido1', contenido_not2 = '$Contenido2', contenido_not3 = '$Contenido3', contenido_not4 = '$Contenido4', 
            contenido_not5 = '$Contenido5', min_not = '$ruta', img_not = '$ruta1', img_not2 = '$ruta2', 
            img_not3 = '$ruta3', img_not4 = '$ruta4', img_not5 = '$ruta5', estado = '$Estado', id_area = '$Area' where id_not = '$idNot'";

            /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
            $sqlActualizarNoticias = $this->conexion->query($sqlActualizarNoticia);
            //Redirecciona al usuario a la página de noticias
            if($sqlActualizarNoticias){

             
              if($idEtiqueta != "" and $nombreEtiqueta != ""){
      
                while(true){
      
                  $itemID = current($idEtiqueta);
                  $itemNombre = current($nombreEtiqueta);
      
                  $EtiquetaID=(( $itemID !== false) ? $itemID : ", &nbsp;");
                  $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
      
                  $valores="etiquetasnombre = '$EtiquetaNombre', idnoticia = '$idNot', estado = 'activo' where idetiquetas = '$EtiquetaID';";
      
                  $valoresQ= substr($valores, 0, -1);
      
                $sqlActualizarEtiqueta = "UPDATE etiquetas set $valoresQ";
      
                $sqlActualizarEtiquetas = $this->conexion->query($sqlActualizarEtiqueta);
      
                $itemID = next( $idEtiqueta );
                $itemNombre = next( $nombreEtiqueta );
                
                
                // Check terminator
                if($itemID === false && $itemNombre === false) break;
                } 
      
              } 
           
            if($nombreEtiquetaagr !== ""){
      
              while(true){
      
                $itemNombre = current($nombreEtiquetaagr);
                
      
                $EtiquetaNombre=(( $itemNombre !== false) ? $itemNombre : ", &nbsp;");
               
                 $valores="('$EtiquetaNombre',$idNot,'activo'),";
      
                $valoresQ= substr($valores, 0, -1);
      
              $sqlAgregarEtiqueta = "INSERT into etiquetas (etiquetasnombre, idnoticia, estado) VALUES $valoresQ";
      
              $sqlAgregarEtiquetas = $this->conexion->query($sqlAgregarEtiqueta);
      
              $itemNombre = next( $nombreEtiquetaagr );
             
              
              
              // Check terminator
              if($itemNombre === false) break;
              } 
      
            } 

            if($idurl != "" and $url != ""){
              while(true){
      
              $itemidUrl = current($idurl);
              $itemNombreUrl = current($url);
              $EnlaceId=(( $itemidUrl !== false) ? $itemidUrl : ", &nbsp;");
              $EnlaceNombre=(( $itemNombreUrl !== false) ? $itemNombreUrl : ", &nbsp;");
              $valoresEnl="nombreEnlace = '$EnlaceNombre', idNoticias = '$idNot' where idenlaces = '$EnlaceId';";
              $valoresQE= substr($valoresEnl, 0, -1);
      
              $sqlActualizarEnlace = "UPDATE enlaces set $valoresQE";
              $sqlActualizarEnlaces = $this->conexion->query($sqlActualizarEnlace);
      
              $itemidUrl = next( $idurl ); 
              $itemNombreUrl = next( $url ); 
              // Check terminator
              if($itemidUrl === false && $itemNombreUrl === false) break;
      
            }
            
      
          }

          if($urlagr !== ""){
            while(true){
            $itemNombreUrl = current($urlagr);
            $EnlaceNombre=(( $itemNombreUrl !== false) ? $itemNombreUrl : ", &nbsp;");
            $valoresEnl="('$EnlaceNombre',$idNot),";
            $valoresQE= substr($valoresEnl, 0, -1);
      
            $sqlAgregarEnlace = "INSERT into enlaces (nombreEnlace, idNoticias) VALUES $valoresQE";
            $sqlAgregarEnlaces = $this->conexion->query($sqlAgregarEnlace);
      
            $itemNombreUrl = next( $urlagr ); 
            // Check terminator
            if($itemNombreUrl === false) break;
      
          }
        }
         
         }

           if($sqlActualizarEtiquetas || $sqlAgregarEtiquetas || $sqlActualizarEnlaces || $sqlAgregarEnlaces){
            $borrado = "DELETE FROM etiquetas WHERE etiquetasnombre = '' or etiquetasnombre = ', &nbsp;';";
            $borrados = $this->conexion->query($borrado);

            $borradoEnlace = "DELETE FROM enlaces WHERE nombreEnlace = '' or nombreEnlace = ', &nbsp;';";
            $borradosEnlaces = $this->conexion->query($borradoEnlace);
           }     
           echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
           echo "<script>
              swal({
              title:'Noticias',
              text:'Noticia editada correctamente',
              icon:'success'
              
              })
              .then((value) => {
                  window.location='noticias.php';
                  
                  
              })</script>";

}







  /*Si el usuario no ingresa la fecha, se ingresan todos los datos y como fecha se guarda
  la del día corriente*/
  

  






//Función para agregar un nuevo articulo en el apartado inicio
public function agregarNoticias($Titulo, $Descripcion, $Contenido1, $Contenido2, $Contenido3, $Contenido4, $Contenido5, $Fecha, $Estado, $IDArea, $url, $nombreEtiqueta, $estadoEtiqueta){



  if($_FILES['miniatura']['error'] > 0){
         
         $ruta='img/pti.jpg';
  }else{
 
     $directorio = 'img';
         
         $archivo = $_FILES['miniatura']['tmp_name'];	
 
         if(is_dir($directorio) && is_uploaded_file($archivo)){
 
           $nom_archivo = $_FILES['miniatura']['name'];
           $tipo_archivo = $_FILES['miniatura']['type'];
 
           if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
            move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
               $ruta = $directorio . '/' . $nom_archivo;
           }
         }
  }
 
  if($_FILES['archivo1']['error'] > 0){     
         $ruta1='';
  }else{
 
     $directorio = 'img';
         
         $archivo = $_FILES['archivo1']['tmp_name'];
 
         if(is_dir($directorio) && is_uploaded_file($archivo)){
 
           $nom_archivo = $_FILES['archivo1']['name'];
           $tipo_archivo = $_FILES['archivo1']['type'];
 
           if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
             move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
               $ruta1 = $directorio . '/' . $nom_archivo;
           }
         }
  }
 
  if($_FILES['archivo2']['error'] > 0){       
         $ruta2='';
  }else{
 
     $directorio = 'img';
         
         $archivo = $_FILES['archivo2']['tmp_name'];
 
         if(is_dir($directorio) && is_uploaded_file($archivo)){
 
           $nom_archivo = $_FILES['archivo2']['name'];
           $tipo_archivo = $_FILES['archivo2']['type'];
 
           if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
             move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
               $ruta2 = $directorio . '/' . $nom_archivo;
           }
         }  
  }
 
  if($_FILES['archivo3']['error'] > 0){       
         $ruta3='';
  }else{
 
     $directorio = 'img';
         
         $archivo = $_FILES['archivo3']['tmp_name'];
 
         if(is_dir($directorio) && is_uploaded_file($archivo)){
 
           $nom_archivo = $_FILES['archivo3']['name'];
           $tipo_archivo = $_FILES['archivo3']['type'];
 
           if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
             move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
               $ruta3 = $directorio . '/' . $nom_archivo;
           }
         }
  }
 
  if($_FILES['archivo4']['error'] > 0){       
         $ruta4='';
  }else{
 
     $directorio = 'img';
         
         $archivo = $_FILES['archivo4']['tmp_name'];
 
         if(is_dir($directorio) && is_uploaded_file($archivo)){
 
           $nom_archivo = $_FILES['archivo4']['name'];
           $tipo_archivo = $_FILES['archivo4']['type'];
 
           if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
             move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
               $ruta4 = $directorio . '/' . $nom_archivo;
           }
         }
  }
 
  if($_FILES['archivo5']['error'] > 0){       
         $ruta5='';
  }else{
 
     $directorio = 'img';
         
         $archivo = $_FILES['archivo5']['tmp_name'];
 
         if(is_dir($directorio) && is_uploaded_file($archivo)){
 
           $nom_archivo = $_FILES['archivo5']['name'];
           $tipo_archivo = $_FILES['archivo5']['type'];
 
           if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
             move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
               $ruta5 = $directorio . '/' . $nom_archivo;
             }
         }
  }
 
  //Se define la consulta a ejecutar
                     /*Se inserta la información antes especificada*/
               $sqlAgregarNoticia = "INSERT INTO noticias values (0, '$Fecha', '$Titulo', '$Descripcion', '$Contenido1', '$Contenido2', '$Contenido3', '$Contenido4', '$Contenido5', '$ruta', '$ruta1', '$ruta2', '$ruta3', '$ruta4', '$ruta5', '$Estado', '$IDArea')";
 
               /*Se envia la consulta a la base de datos agrega el nuevo articulo*/
               $sqlAgregarNoticias = $this->conexion->query($sqlAgregarNoticia);
              echo "$sqlAgregarNoticia";
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
 
                 if($url !== ""){
                   while(true){
                   $itemNombreUrl = current($url);
                   $EnlaceNombre=(( $itemNombreUrl !== false) ? $itemNombreUrl : ", &nbsp;");
                   $valores="('$EnlaceNombre',$IDNotEti),";
                   $valoresQ= substr($valores, 0, -1);
         
                   $sqlAgregarEnlace = "INSERT into enlaces (nombreEnlace, idNoticias) VALUES $valoresQ";
                   $sqlAgregarEnlaces = $this->conexion->query($sqlAgregarEnlace);
         
                   $itemNombreUrl = next( $url ); 
                   // Check terminator
                   if($itemNombreUrl === false) break;
         
                 }
               }
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
              if($sqlActualizarEtiquetas || $sqlAgregarEnlaces){
               $borrado = "DELETE FROM etiquetas WHERE etiquetasnombre = '';";
               $borrados = $this->conexion->query($borrado);

               $borradoEnlace = "DELETE FROM enlaces WHERE nombreEnlace = '' or nombreEnlace = ', &nbsp;';";
               $borradosEnlaces = $this->conexion->query($borradoEnlace);
              }               
              echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
              echo "<script>
                 swal({
                 title:'Noticias',
                 text:'Noticia agregada correctamente',
                 icon:'success'
                 
                 })
                 .then((value) => {
                     window.location='noticias.php';
                     
                     
                 })</script>"; 
           }	
           
         }
 
 
 

  

}


  



?>