<!DOCTYPE html>
<html>	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleArticulos.css">
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
  			<form>
  				<select>
  					<option value="">Más recientes</option>
  					<option>Más antiguos</option>
  					<option>Visibles</option>
  					<option>No visibles</option>
  				</select>
  				<input type="submit" name="" value="Ver">
  			</form>
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
	  				
	  					<p class="articulo-area"><?php echo $colocarNoticia['area'] ?></p>
	  					<h2><?php echo $colocarNoticia['titulo'] ?></h2>
	  					<p class="articulo-descripcion"><?php echo nl2br($colocarNoticia['descripcion']) ?></p>
	  					<p class="articulo-fecha"><?php echo $colocarNoticia['fecha'] ?></p>
	  				</div>
	  				<div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $colocarNoticia['id'] ?>">LEER MÁS</a>
	  				</div>
	  			</div>
				<?php
				}		  			 
				}elseif($_SESSION['perfil'] == 'administrador'){
					foreach($ListaNoticiasAdmin as $ColocarTodo){ 
		  		?>

	  			<div class="contenedor-articulo__contenido">
				<?php	  
				  if(empty($ColocarTodo['miniatura'])){
                ?>  
                                        
                    <img src="img/pti.jpg">
                <?php
                    }else{
                ?>  
	  				<img src="<?php echo $ColocarTodo['miniatura']?>">
				<?php } ?>	

	  				<!-- Esto se oculta si no hay un usuario iniciado -->
	  				<div class="contenedor-articulo__contenido__edicion">
	  					<a href="eliminarNoticia.php?id=<?php echo $ColocarTodo['id'] ?>" class="no-view"><i class="fa-solid fa-eye-slash"></i></a>
	  					<a href="acciones/activarNoticia.php?id=<?php echo $ColocarTodo['id'] ?>" class="view"><i class="fa-solid fa-eye"></i></a>
  						<a href="editor-noticias.php?idNot=<?php echo $ColocarTodo['id'] ?>" class="edit"><i class="fa-solid fa-pen"></i></a>
  						<a href="#" class="remove"><i class="fa-solid fa-trash-can"></i></a>
	  				</div>

	  				<div class="contenedor-articulo__contenido__info">
	  					<!-- El ID solo se muestra al admin -->
	  					<p class="articulo-id"><?php echo $ColocarTodo['id'] ?></p>
	  					<p class="articulo-area"><?php echo $ColocarTodo['area'] ?></p>
	  					<h2><?php echo $ColocarTodo['titulo'] ?></h2>
	  					<p class="articulo-descripcion"><?php echo nl2br($ColocarTodo['descripcion']) ?></p>
	  					<p class="articulo-fecha"><?php echo $ColocarTodo['fecha'] ?></p>
	  				</div>
	  				<div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $ColocarTodo['id'] ?>">LEER MÁS</a>
	  				</div>
					<?php
					 	if($ColocarTodo['estado'] == 'inactivo') {
					?> 	
	  				<div class="contenedor-articulo__contenido__estado-articulo">
	  					<i class="fa-solid fa-eye-slash no-view-end">
	  						<span class="bubble-no-view"><i class="fa-solid fa-triangle-exclamation"></i>Artículo actualmente oculto</span>
	  					</i>
					</div>
					<?php
						}elseif($ColocarTodo['estado'] == 'activo') {
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

  	<script src="js/animaciones.js"></script>

  	<!-- Script necesario para que funcione el menu -->
	<script src="js/menu.js"></script>
	
	<!-- Script necesario para que funcione el btn de volver arriba -->
	<script src="js/irArriba.js"></script>

	<!-- Script necesario para que funcione el btn de redes sociales -->
	<script src="js/redesSociales.js"></script>
</body>
</html>