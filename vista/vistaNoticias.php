<!DOCTYPE html>
<html lang="spanish">	
<head>
	
	<!--Meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

	<meta name="description" content="Conocé las novedades del Polo Educativo Tecnológico Cerro en todas sus áreas, Informática, Diseño, Construcción, y más.
	Enterate de todo lo que pasa en el Polo Educativo Cerro.">

	<meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<!--Link a icono y hojas de estilo-->
	<link rel="icon" type="image/jpg" href="img/Logo.png">
<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href="css/styleArticulos4.css">
=======
	<link rel="stylesheet" type="text/css" href="css/styleArticulos11.css">
>>>>>>> b958538 (Hasta Cursos arreglado)
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">

	<!-- Fuente usada para la introduccion sobre la imagen -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet"> 

	<!-- Fuente usada para los titulos -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> 	

	<!-- Fuente usada para la descripcion -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title>Novedades</title>
</head>
<body>
	<a href="javascript:void(0);" id="scroll" title="Volver arriba">Top<span></span></a>

	<div id="contenedor-carga">
  			
		<div class="spinner"></div>
			
  	</div>

	<header>

		<img id="img-header" src="img/banner.png">

		<?php   
        session_start();
		
        if(empty($_SESSION['usuario'])){       			
    ?>
    <?php
        }elseif($_SESSION['perfil'] == 'administrador'){
    ?>  
	     <div id="contenedor-sesion"> 
	    	 <p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <a href="admin.php" id="modo-admin">Administrador</a></p>		
		</div>	 
	<?php 	
			}elseif($_SESSION['perfil'] == 'moderador'){
	?>			
		<div id="contenedor-sesion"> 
	    	 <p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <span id="modo-editor">Editor</span></p> 
	    </div>
	<?php } ?>		

		<div id="logo-normal-size">
	    	<h1><a href="index.php"><img src="img/Logo.png"></a></h1>
	    </div>

	    <!-- Empieza menu responsive -->
	    <nav>

	    	<div id="logo-responsive">
	    		<h1><a href="index.php"><img src="img/Logo.png"></a></h1>
	    	</div>

	    	<div id="contenedor-burger-menu">
	    		<div id="burger-menu">
		    		<div id="bar1"></div>
		    		<div id="bar2"></div>
		    		<div id="bar3"></div>
	    		</div>
	    	</div>

		    <div id="menu-responsive">
		        <ul>
		            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
		            <li><a href="nosotros.php"><i class="fa-solid fa-users"></i>Nosotros</a></li>
		            <li><a href="cursos.php"><i class="fa-solid fa-chalkboard"></i>Cursos</a></li>
		            <li><a href="noticias.php"><span><i class="fa-solid fa-newspaper"></i>Novedades</span></a></li>     
		            <li><a href="calendario.php"><i class="fa-solid fa-calendar-days"></i>Calendario</a></li>
		            <li><a href="unidad-de-extension.php"><i class="fa-solid fa-arrow-trend-up"></i>Unidad de extensión</a></li>
		            <li><a href="contacto.php"><i class="fa-solid fa-phone"></i>Contacto</a></li>
		        </ul>
		    </div>
		    <!-- Termina el menu responsive -->

		    <!-- Empieza menu normal -->
		    <div id="menu-normal-size">
		    	<ul>
		            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
		            <li><a href="nosotros.php"><i class="fa-solid fa-users"></i>Nosotros</a></li>
		            <li><a href="cursos.php"><i class="fa-solid fa-chalkboard"></i>Cursos</a></li>
		            <li><a href="noticias.php"><span><i class="fa-solid fa-newspaper"></i>Novedades</span></a></li>     
		            <li><a href="calendario.php"><i class="fa-solid fa-calendar-days"></i>Calendario</a></li>
		            <li><a href="unidad-de-extension.php"><i class="fa-solid fa-arrow-trend-up"></i>Unidad de extensión</a></li>
		            <li><a href="contacto.php"><i class="fa-solid fa-phone"></i>Contacto</a></li>
		        </ul>
		    </div>
		</nav>
	    <!-- Termina menu -->
  	</header>
				
  	<!-- Empieza contenido de la pagina -->
  	<main>
  		<!-- Esto solo lo ve el editor o el admin -->
  		<div id="contenedor-agregar-ver-articulo">
		  <?php
			if(empty($_SESSION['usuario'])){
					  
				}elseif($_SESSION['perfil'] == 'administrador'){
		?>		  
  			<a href="editor-noticias.php">Agregar artículo</a>
<<<<<<< HEAD
=======
			  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
  				<select name="listaver">
  					<option value="reciente">Más recientes</option>
  					<option value="antiguo">Más antiguos</option>
  					<option value="visible">Visibles</option>
  					<option value="novisible">No visibles</option>	
  				</select>
  				<input type="submit" name="ver" value="Ver">	
  			</form>
>>>>>>> b958538 (Hasta Cursos arreglado)
			<?php } ?>
  		</div>


  		<!-- Articulo/noticia independiente -->
  		<article id="articulo">
  			<div class="contenedor-articulo">
			<?php  
					if(empty($_SESSION['usuario'])){	
						foreach($listaNoticias as $colocarNoticia){		

			?>				
  				<!-- Esto será lo que se tiene que replicar por cada noticia que exista -->
	  			<div class="contenedor-articulo__contenido">
				<?php
                /*Si el articulo no tiene miniatura cargada la imagen por defecto será la que definamos*/
				  if(empty($colocarNoticia['miniatura'])){
                ?>  
                    <!--Imagen por defecto-->
                    <img src="img/pti.jpg">
                <?php
                    }else{
                ?>  
	  				<img src="<?php echo $colocarNoticia['miniatura']?>">
				<?php } ?>	

	  				<div class="contenedor-articulo__contenido__info">
	  				
					  	<a href="noticias.php?idarea=<?php echo $colocarNoticia['idarea']; ?>" class="articulo-area-btn"><?php echo $colocarNoticia['area'] ?></a>
	  					<div class="articulo-titulo">
					  		<h2><?php echo $colocarNoticia['titulo'] ?></h2>
					  	</div>
	  					<div class="articulo-descripcion">
	  						<p><?php echo nl2br($colocarNoticia['descripcion']) ?></p>
	  					</div>
	  					
	  					<p class="articulo-fecha"><?php echo substr($colocarNoticia['fecha'], 0, 16); ?></p>
	  				</div>
	  				<div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $colocarNoticia['id'] ?>">LEER MÁS</a>
	  				</div>
	  			</div>
				<?php
				}
				
				
				}elseif($_SESSION['perfil'] == 'administrador' & $_SESSION['listaVer'] == 'novisible'){
					foreach($NoticiaVer as $PonerVer){
				?>
				
				<div class="contenedor-articulo__contenido">
				<?php	  
				  if(empty($PonerVer['miniatura'])){
                ?>  
                                        
                    <img src="img/pti.jpg">
                <?php
                    }else{	
                ?>  
	  				<img src="<?php echo $PonerVer['miniatura']?>">	
					
				<?php } ?>			
				
				<div class="contenedor-articulo__contenido__edicion">
	  					<a href="inactivoNoticias.php?idInNot=<?php echo $PonerVer['id'] ?>" class="no-view"><i class="fa-solid fa-eye-slash"></i></a>
	  					<a href="activoNoticias.php?idAcNot=<?php echo $PonerVer['id'] ?>" class="view"><i class="fa-solid fa-eye"></i></a>
  						<a href="editor-noticias.php?idNot=<?php echo $PonerVer['id'] ?>" class="edit"><i class="fa-solid fa-pen"></i></a>
  						<a href="modelo/eliminarnoticia.php?idNotEli=<?php echo $PonerVer['id'] ?>" class="remove"><i class="fa-solid fa-trash-can"></i></a>
	  			</div>

	  				<div class="contenedor-articulo__contenido__info">
<<<<<<< HEAD
	  					<!-- El ID solo se muestra al admin -->
	  					<p class="articulo-id"><?php echo $ColocarTodo['id'] ?></p>
	  					<p class="articulo-area"><?php echo $ColocarTodo['area'] ?></p>

	  					<!-- 
						Boton hecho en caso de que se pueda filtrar por area
	  					<a href="#" class="articulo-area-btn"><?php echo $ColocarTodo['area'] ?></a> -->
	  					<h2><?php echo $ColocarTodo['titulo'] ?></h2>
	  					<p class="articulo-descripcion"><?php echo nl2br($ColocarTodo['descripcion']) ?></p>
	  					<p class="articulo-fecha"><?php echo $ColocarTodo['fecha'] ?></p>
	  				</div>
	  				<div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $ColocarTodo['id'] ?>">LEER MÁS</a>
=======
	  					
	  					<p class="articulo-id"><?php echo $PonerVer['id'] ?></p>
	  					

						
	  					<a href="noticias.php?idarea=<?php echo $PonerVer['idarea']; ?>" class="articulo-area-btn"><?php echo $PonerVer['area'] ?></a>
	  					<div class="articulo-titulo">
					  		<h2><?php echo $colocarNoticia['titulo'] ?></h2>
					  	</div>
	  					<div class="articulo-descripcion">
	  						<p><?php echo nl2br($PonerVer['descripcion']) ?></p>
	  					</div>
	  					
	  					<p class="articulo-fecha"><?php echo substr($PonerVer['fecha'], 0, 16); ?></p>
	  				</div>		
					  <div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $PonerVer['id'] ?>">LEER MÁS</a>
>>>>>>> b958538 (Hasta Cursos arreglado)
	  				</div>
					<?php
					 	if($PonerVer['estado'] == 'inactivo') {
					?> 	
	  				<div class="contenedor-articulo__contenido__estado-articulo">
	  					<i class="fa-solid fa-eye-slash no-view-end">
	  						<span class="bubble-no-view"><i class="fa-solid fa-triangle-exclamation"></i>Artículo actualmente oculto</span>
	  					</i>
					</div>
					<?php
						}elseif($PonerVer['estado'] == 'activo') {
					?> 
					<div class="contenedor-articulo__contenido__estado-articulo">		
	  					<i class="fa-solid fa-eye view-end">
	  						<span class="bubble-view"><i class="fa-solid fa-check"></i>Artículo actualmente visible</span>
	  					</i>
	  				</div>
					  <?php } ?>	
				</div>		
				<?php } ?>

				<?php		  			 
				}elseif($_SESSION['perfil'] == 'administrador' & $_SESSION['listaVer'] == 'visible'){
					foreach($NoticiaVer as $PonerVer){
				?>
				<div class="contenedor-articulo__contenido">
				<?php	  
				  if(empty($PonerVer['miniatura'])){
                ?>  
                                        
                    <img src="img/pti.jpg">
                <?php
                    }else{	
                ?>  
	  				<img src="<?php echo $PonerVer['miniatura']?>">
				<?php } ?>			
				
				<div class="contenedor-articulo__contenido__edicion">
						<a href="modelo/inactivoNoticias.php?idInNot=<?php echo $PonerVer['id'] ?>" class="no-view"><i class="fa-solid fa-eye-slash"></i></a>
	  					<a href="modelo/activoNoticias.php?idAcNot=<?php echo $PonerVer['id'] ?>" class="view"><i class="fa-solid fa-eye"></i></a>
  						<a href="editor-noticias.php?idNot=<?php echo $PonerVer['id'] ?>" class="edit"><i class="fa-solid fa-pen"></i></a>
  						<a href="modelo/eliminarnoticia.php?idNotEli=<?php echo $PonerVer['id'] ?>" class="remove"><i class="fa-solid fa-trash-can"></i></a>
	  			</div>

	  				<div class="contenedor-articulo__contenido__info">
	  					
	  					<p class="articulo-id"><?php echo $PonerVer['id'] ?></p>
	  					

	  					
						
	  					<a href="noticias.php?idarea=<?php echo $PonerVer['idarea']; ?>" class="articulo-area-btn"><?php echo $PonerVer['area'] ?></a>
	  					<div class="articulo-titulo">
					  		<h2><?php echo $colocarNoticia['titulo'] ?></h2>
					  	</div>
	  					<div class="articulo-descripcion">
	  						<p><?php echo nl2br($PonerVer['descripcion']) ?></p>
	  					</div>
	  					
	  					<p class="articulo-fecha"><?php echo substr($PonerVer['fecha'], 0, 16); ?></p>
	  				</div>		
					  <div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $PonerVer['id'] ?>">LEER MÁS</a>
	  				</div>
					<?php
					 	if($PonerVer['estado'] == 'inactivo') {
					?> 	
	  				<div class="contenedor-articulo__contenido__estado-articulo">
	  					<i class="fa-solid fa-eye-slash no-view-end">
	  						<span class="bubble-no-view"><i class="fa-solid fa-triangle-exclamation"></i>Artículo actualmente oculto</span>
	  					</i>
					</div>
					<?php
						}elseif($PonerVer['estado'] == 'activo') {
					?> 
					<div class="contenedor-articulo__contenido__estado-articulo">		
	  					<i class="fa-solid fa-eye view-end">
	  						<span class="bubble-view"><i class="fa-solid fa-check"></i>Artículo actualmente visible</span>
	  					</i>
	  				</div>
					  <?php } ?>	
				</div>		
				<?php } ?>	
				

				<?php		  			 
				}elseif($_SESSION['perfil'] == 'administrador' & $_SESSION['listaVer'] == 'antiguo'){
					foreach($NoticiaVer as $PonerVer){
				?>
				<div class="contenedor-articulo__contenido">
				<?php	  
				  if(empty($PonerVer['miniatura'])){
                ?>  
                                        
                    <img src="img/pti.jpg">
                <?php
                    }else{	
                ?>  
	  				<img src="<?php echo $PonerVer['miniatura']?>">
				<?php } ?>			
				
				<div class="contenedor-articulo__contenido__edicion">
	  					<a href="modelo/inactivoNoticias.php?idInNot=<?php echo $PonerVer['id'] ?>" class="no-view"><i class="fa-solid fa-eye-slash"></i></a>
	  					<a href="modelo/activoNoticias.php?idAcNot=<?php echo $PonerVer['id'] ?>" class="view"><i class="fa-solid fa-eye"></i></a>
  						<a href="editor-noticias.php?idNot=<?php echo $PonerVer['id'] ?>" class="edit"><i class="fa-solid fa-pen"></i></a>
  						<a href="modelo/eliminarnoticia.php?idNotEli=<?php echo $PonerVer['id'] ?>" class="remove"><i class="fa-solid fa-trash-can"></i></a>
	  			</div>

	  				<div class="contenedor-articulo__contenido__info">
	  					
	  					<p class="articulo-id"><?php echo $PonerVer['id'] ?></p>
	  					

	  					
	  					<a href="noticias.php?idarea=<?php echo $PonerVer['idarea']; ?>" class="articulo-area-btn"><?php echo $PonerVer['area'] ?></a>
	  					<div class="articulo-titulo">
					  		<h2><?php echo $colocarNoticia['titulo'] ?></h2>
					  	</div>
	  					<div class="articulo-descripcion">
	  						<p><?php echo nl2br($PonerVer['descripcion']) ?></p>
	  					</div>
	  					
	  					<p class="articulo-fecha"><?php echo substr($PonerVer['fecha'], 0, 16); ?></p>
	  				</div>		
					  <div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $PonerVer['id'] ?>">LEER MÁS</a>
	  				</div>
					<?php
					 	if($PonerVer['estado'] == 'inactivo') {
					?> 	
	  				<div class="contenedor-articulo__contenido__estado-articulo">
	  					<i class="fa-solid fa-eye-slash no-view-end">
	  						<span class="bubble-no-view"><i class="fa-solid fa-triangle-exclamation"></i>Artículo actualmente oculto</span>
	  					</i>
					</div>
					<?php
						}elseif($PonerVer['estado'] == 'activo') {
					?> 
					<div class="contenedor-articulo__contenido__estado-articulo">		
	  					<i class="fa-solid fa-eye view-end">
	  						<span class="bubble-view"><i class="fa-solid fa-check"></i>Artículo actualmente visible</span>
	  					</i>
	  				</div>
					  <?php } ?>	
				</div>		
				<?php } ?>	
				
				
				<?php	
				}elseif($_SESSION['perfil'] == 'administrador' & $_SESSION['listaVer'] == 'reciente'){
					foreach($NoticiaVer as $PonerVer){ 
		  		?>

	  			<div class="contenedor-articulo__contenido">
				<?php	  
				  if(empty($PonerVer['miniatura'])){
                ?>  
                                        
                    <img src="img/pti.jpg">
                <?php
                    }else{	
                ?>  
	  				<img src="<?php echo $PonerVer['miniatura']?>">
				<?php } ?>	

	  				<!-- Esto se oculta si hay un usuario iniciado -->
	  				<div class="contenedor-articulo__contenido__edicion">
					  <a href="modelo/inactivoNoticias.php?idInNot=<?php echo $PonerVer['id'] ?>" class="no-view"><i class="fa-solid fa-eye-slash"></i></a>
	  					<a href="modelo/activoNoticias.php?idAcNot=<?php echo $PonerVer['id'] ?>" class="view"><i class="fa-solid fa-eye"></i></a>
  						<a href="editor-noticias.php?idNot=<?php echo $PonerVer['id'] ?>" class="edit"><i class="fa-solid fa-pen"></i></a>
  						<a href="modelo/eliminarnoticia.php?idNotEli=<?php echo $PonerVer['id'] ?>" class="remove"><i class="fa-solid fa-trash-can"></i></a>
	  				</div>

	  				<div class="contenedor-articulo__contenido__info">
	  					<!-- El ID solo se muestra al admin -->
	  					<p class="articulo-id"><?php echo $PonerVer['id'] ?></p>
	  					

	  				
	  					<a href="noticias.php?idarea=<?php echo $PonerVer['idarea']; ?>" class="articulo-area-btn"><?php echo $PonerVer['area'] ?></a>
	  					<div class="articulo-titulo">
					  		<h2><?php echo $PonerVer['titulo'] ?></h2>
					  	</div>
	  					<div class="articulo-descripcion">
	  						<p><?php echo nl2br($PonerVer['descripcion']) ?></p>
	  					</div>
	  					
	  					<p class="articulo-fecha"><?php echo substr($PonerVer['fecha'], 0, 16); ?></p>
	  				</div>
	  				<div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $PonerVer['id'] ?>">LEER MÁS</a>
	  				</div>
					<?php
					 	if($PonerVer['estado'] == 'inactivo') {
					?> 	
	  				<div class="contenedor-articulo__contenido__estado-articulo">
	  					<i class="fa-solid fa-eye-slash no-view-end">
	  						<span class="bubble-no-view"><i class="fa-solid fa-triangle-exclamation"></i>Artículo actualmente oculto</span>
	  					</i>
					</div>
					<?php
						}elseif($PonerVer['estado'] == 'activo') {
					?> 
					<div class="contenedor-articulo__contenido__estado-articulo">		
	  					<i class="fa-solid fa-eye view-end">
	  						<span class="bubble-view"><i class="fa-solid fa-check"></i>Artículo actualmente visible</span>
	  					</i>
	  				</div>
					<?php } ?>
	  			</div>
			<?php
					 	
				} 
				}elseif($_SESSION['perfil'] == 'administrador'){
					
					foreach($NoticiaVer as $PonerVer){ 
		  		?>

	  			<div class="contenedor-articulo__contenido">
				<?php	  
				  if(empty($PonerVer['miniatura'])){
                ?>  
                                        
                    <img src="img/pti.jpg">
                <?php
                    }else{	
                ?>  
	  				<img src="<?php echo $PonerVer['miniatura']?>">
				<?php } ?>	

	  				<!-- Esto se oculta si hay un usuario iniciado -->
	  				<div class="contenedor-articulo__contenido__edicion">
					  <a href="modelo/inactivoNoticias.php?idInNot=<?php echo $PonerVer['id'] ?>" class="no-view"><i class="fa-solid fa-eye-slash"></i></a>
	  					<a href="modelo/activoNoticias.php?idAcNot=<?php echo $PonerVer['id'] ?>" class="view"><i class="fa-solid fa-eye"></i></a>
  						<a href="editor-noticias.php?idNot=<?php echo $PonerVer['id'] ?>" class="edit"><i class="fa-solid fa-pen"></i></a>
  						<a href="modelo/eliminarnoticia.php?idNotEli=<?php echo $PonerVer['id'] ?>" class="remove"><i class="fa-solid fa-trash-can"></i></a>
	  				</div>
							
	  				<div class="contenedor-articulo__contenido__info">
	  					<!-- El ID solo se muestra al admin -->
	  					<p class="articulo-id"><?php echo $PonerVer['id'] ?></p>
	  					

	  				
	  					<a href="noticias.php?idarea=<?php echo $PonerVer['idarea']; ?>" class="articulo-area-btn"><?php echo $PonerVer['area'] ?></a>
	  					<div class="articulo-titulo">
					  		<h2><?php echo $PonerVer['titulo']?></h2>
					  	</div>
	  					<div class="articulo-descripcion">
	  						<p><?php echo nl2br($PonerVer['descripcion']) ?></p>
	  					</div>
	  					
	  					<p class="articulo-fecha"><?php echo substr($PonerVer['fecha'], 0, 16); ?></p>
	  				</div>
	  				<div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $PonerVer['id'] ?>">LEER MÁS</a>
	  				</div>
					<?php
					 	if($PonerVer['estado'] == 'inactivo') {
					?> 	
	  				<div class="contenedor-articulo__contenido__estado-articulo">
	  					<i class="fa-solid fa-eye-slash no-view-end">
	  						<span class="bubble-no-view"><i class="fa-solid fa-triangle-exclamation"></i>Artículo actualmente oculto</span>
	  					</i>
					</div>
					<?php
						}elseif($PonerVer['estado'] == 'activo') {
					?> 
					<div class="contenedor-articulo__contenido__estado-articulo">		
	  					<i class="fa-solid fa-eye view-end">
	  						<span class="bubble-view"><i class="fa-solid fa-check"></i>Artículo actualmente visible</span>
	  					</i>
	  				</div>
					<?php } ?>
	  			</div>
			<?php 	
				}	
			}
				?>

			
  		</div>
  		</article>
		<?php 
			if($_GET['lista2'] != ''){
				$list = $_GET['lista2'];
		
		?>	
			<!--Aparece la paginacion de los articulos, segun lo hecho en el modelo, en este caso aparecen 6 articulos maximo por pagina-->
			<div id="contenedor-paginacion">
            <div id="contenido-paginacion">
                <?php
                $url = "noticias.php";
                      
                      if ($_SESSION['TPag'] > 1) {
                          if ($_SESSION['Pag'] != 1)
                              echo '<a id='.'paginas'.' href="'.$url.'?lista2='.$list.'&pagina='.($_SESSION['Pag']-1).'"> <span>Anterior</span> </a>';

                          	?>

                          	<div class="paginasTotales">

                          	<?php

                              for ($i=1;$i<=$_SESSION['TPag'];$i++) {
                                  if ($_SESSION['Pag'] == $i){
                                      // Si se muestra el índice de la página actual, no se coloca enlace.
                                      echo '<p class="paginaActiva">'.$_SESSION['Pag'].'</p>';
                                  }else{
                                      // Si el índice no corresponde con la página mostrada actualmente, 
                                      // se coloca el enlace para ir a esa página.
                                      echo '<a id='.'paginas'.' href="'.$url.'?lista2='.$list.'&pagina='.$i.'">'.$i.'</a> ';
                                  }
                              }
                            ?>

                        	</div>

                        	<?php

                          if ($_SESSION['Pag'] != $_SESSION['TPag'])
                              echo '<a id='.'paginas'.' href="'.$url.'?lista2='.$list.'&pagina='.($_SESSION['Pag']+1).'"> <span>Siguiente</span> </a>';
                      }

                      if ($_SESSION['Pag'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['Pag'] == 2){
                ?>                    

                <?php
                      }

                  ?>
            </div>

        </div>




		<?php 	
			}elseif($_GET['idarea'] != ''){
				$idarea = $_GET['idarea'];
		?>
				
		<!--Aparece la paginacion de los articulos, segun lo hecho en el modelo, en este caso aparecen 6 articulos maximo por pagina-->
		  <div id="contenedor-paginacion">
            <div id="contenido-paginacion">

            	<div class="btns-prev-next prev">
                <?php
                $url = "noticias.php";
                      
                      if ($_SESSION['TPag'] > 1) {
                          if ($_SESSION['Pag'] != 1)
                              echo '<a id='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.($_SESSION['Pag']-1).'"> <span>Anterior</span> </a>';
                          ?>
                </div>
                        <div class="paginasTotales">

                          <?php

                              for ($i=1;$i<=$_SESSION['TPag'];$i++) {
                                  if ($_SESSION['Pag'] == $i){
                                      // Si se muestra el índice de la página actual, no se coloca enlace.
                                      echo '<p class="paginaActiva">'.$_SESSION['Pag'].'</p>';
                                  }else{
                                      // Si el índice no corresponde con la página mostrada actualmente, 
                                      // se coloca el enlace para ir a esa página.
                                      echo '<a id='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.$i.'">'.$i.'</a> ';
                                  }
                              }

                          ?>

                      	</div>
                <div class="btns-prev-next next">
                      	<?php
                          if ($_SESSION['Pag'] != $_SESSION['TPag'])
                              echo '<a id='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.($_SESSION['Pag']+1).'"> <span>Siguiente</span> </a>';
                      }

                      if ($_SESSION['Pag'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['Pag'] == 2){
                ?>       

                <?php
                      }

                  ?>
              </div>
            </div>

        </div>
	<?php 
		}elseif($_GET['idEti'] != ''){ 
		$idEti = $_GET['idEti'];
	?>
	<!--Aparece la paginacion de los articulos, segun lo hecho en el modelo, en este caso aparecen 6 articulos maximo por pagina-->
	<div id="contenedor-paginacion">
            <div id="contenido-paginacion">

            	<div class="btns-prev-next prev">
                <?php
                $url = "noticias.php";
                      
                  if ($_SESSION['TPag'] > 1) {
                      if ($_SESSION['Pag'] != 1)
                          echo '<a id='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.($_SESSION['Pag']-1).'"> <span>Anterior</span> </a>';

                      	?>
                </div>
                          	<div class="paginasTotales">

                          	<?php
                          	

                              for ($i=1;$i<=$_SESSION['TPag'];$i++) {
                                  if ($_SESSION['Pag'] == $i){
                                      // Si se muestra el índice de la página actual, no se coloca enlace.
                                      echo '<p class="paginaActiva">'.$_SESSION['Pag'].'</p>';
                                  }else{
                                      // Si el índice no corresponde con la página mostrada actualmente, 
                                      // se coloca el enlace para ir a esa página.
                                      echo '<a id='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.$i.'">'.$i.'</a> ';
                                  }
                              }

                            ?>

                            </div>

                <div class="btns-prev-next next">

                            <?php
                          if ($_SESSION['Pag'] != $_SESSION['TPag'])
                              echo '<a id='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.($_SESSION['Pag']+1).'"> <span>Siguiente</span> </a>';
                      }

                      if ($_SESSION['Pag'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['Pag'] == 2){
                ?>

                    

					<?php } ?>

				</div>
            </div>


        </div>
		<?php }else{ ?>
			<div id="contenedor-paginacion">
            <div id="contenido-paginacion">

            	<div class="btns-prev-next prev">
                <?php
                $url = "noticias.php";
                      
                      if ($_SESSION['TPag'] > 1) {
                          if ($_SESSION['Pag'] != 1)
                              echo '<a id='.'paginas'.' href="'.$url.'?pagina='.($_SESSION['Pag']-1).'"> <span>Anterior</span> </a>';
                          ?>
                </div>
                <div class="paginasTotales">

                  <?php
                      for ($i=1;$i<=$_SESSION['TPag'];$i++) {
                          if ($_SESSION['Pag'] == $i){
                              // Si se muestra el índice de la página actual, no se coloca enlace.
                             echo '<p class="paginaActiva">'.$_SESSION['Pag'].'</p>';
                          }else{
                              // Si el índice no corresponde con la página mostrada actualmente, 
                              // se coloca el enlace para ir a esa página.
                              echo '<a id='.'paginas'.' href="'.$url.'?pagina='.$i.'">'.$i.'</a> ';
                          }
                      }
                  ?>
              	</div>

              	<div class="btns-prev-next next">
                      	<?php
                          if ($_SESSION['Pag'] != $_SESSION['TPag'])
                              echo '<a id='.'paginas'.' href="'.$url.'?pagina='.($_SESSION['Pag']+1).'"> <span>Siguiente</span> </a>';
                      }

                      if ($_SESSION['Pag'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['Pag'] == 2){
                ?>

                    

					<?php } ?>
				</div>
            </div>

        </div>
		<?php } ?>
  		<!-- Btn para redes sociales -->
  		<aside>
  			<div class="share">
			  <i class="fa fa-plus"></i>
			</div>
		  	<div class="one">
		    	<a href="https://www.facebook.com/Polo-Educativo-Tecnol%C3%B3gico-Cerro-2488348534525108/" target="__blank"><i class="fa-brands fa-facebook-f"></i></a>
		 	</div>

		  	<div class="two">
		    	<a href="https://instagram.com/educativopolo" target="__blank"><i class="fa-brands fa-instagram"></i></a>
		  	</div>

		  	<div class="three">
		    	<a href="https://www.youtube.com/user/arqlopezviana/videos" target="__blank"><i class="fa-brands fa-youtube"></i></a>
		  	</div>
  		</aside>
  	</main>

  	<footer>
  		<section>
	  		<div>
	  			<p>E-mail: <a href="https://www.gmail.com" target="__blank">poloeducativocerro@gmail.com</a></p>
	  			<p>© 2022 Polo Educativo Tecnológico Cerro, todos los derechos reservados.</p>
	  		</div>
  		</section>

  		<section>
  			<div id="contenedor-creditos">
  				<p>Diseño y desarrollo por <a href="#">2FAR™</a></p>
  			</div>
  		</section>
  	</footer>

  	<script src="js/avoidOverflowNovedades.js"></script>
  	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>
</body>
</html>