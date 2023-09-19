<!DOCTYPE html>
<html lang="spanish">
<head>	

	<!--Meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

<<<<<<< HEAD
	<meta name="description" content="Conocé las novedades del Polo Educativo Tecnológico Cerro en todas sus áreas, Informática, Diseño, Construcción, y más.
	Enterate de todo lo que pasa en el Polo Educativo Cerro.">
=======
	<meta name="description" content="Conocé las novedades del Polo Educativo Tecnológico Cerro en todas sus áreas.">
>>>>>>> b958538 (Hasta Cursos arreglado)

	<meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<!--Link a icono y hojas de estilo-->
	<link rel="icon" type="image/jpg" href="img/Logo.png">
<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href="css/styleArticulosIndividual2.css">
=======
	<link rel="stylesheet" type="text/css" href="css/styleArticulosIndividual3.css">
>>>>>>> b958538 (Hasta Cursos arreglado)
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css"> 

	<!-- Fuente usada para los titulos -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> 

	<!-- Fuente usada para la descripcion -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<<<<<<< HEAD
	<title>Titulo de la noticia | Novedades</title>
=======
	<?php foreach($PonerNoticia as $ColocarNotTitle){ ?>
	<title><?php echo $ColocarNotTitle['titulo'] ?></title>
	<?php } ?>
>>>>>>> b958538 (Hasta Cursos arreglado)
</head>
<body>
	<a href="javascript:void(0);" id="scroll" title="Volver arriba">Top<span></span></a>

	<div id="contenedor-carga">
  			
		<div class="spinner"></div>
			
  	</div>
	<header>

		<img id="img-header" src="img/banner.png">
		<?php	
			//session_start();
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
  		<!-- Empieza seccion de contenido del articulo -->
		<section>
		<?php 
			foreach($PonerNoticia as $ColocarNot){
		?>
			<div id="contenedor-general">
				<div id="contenedor-articulo">
					<div id="encabezado">

						<h2><?php echo $ColocarNot['titulo']; ?></h2>
						<a href="noticias.php?idarea=<?php echo $ColocarNot['idarea']; ?>"><p><?php echo $ColocarNot['area'] ?></p></a>

					</div>

					<div id="resumen">
						<h4>Resumen</h4>
						<p><?php echo nl2br($ColocarNot['descripcion'])?></p>
					</div>
					
					<!-- Esto se replica en caso de otro contenido -->
						<div class="contenido">
							<p><?php echo nl2br($ColocarNot['contenido1']) ?></p>
						</div>
						<?php if(empty($ColocarNot['imagen'])){}else{  ?>
						<div class="imagen">
							<img src="<?php echo $ColocarNot['imagen'] ?>">
						</div>
						<?php } ?>
						<!-- Esto se replica en caso de otro contenido -->
						<div class="contenido">
							<p><?php echo nl2br($ColocarNot['contenido2']) ?></p>
						</div>
						<?php if(empty($ColocarNot['imagen2'])){}else{  ?>
						<div class="imagen">
							<img src="<?php echo $ColocarNot['imagen2'] ?>">
						</div>
						<?php } ?>
					
<<<<<<< HEAD
						imegen 2-->
					<div class="contenido">
						<a href="<?php echo $ColocarNot['enlace'] ?>" target="__blank"><?php echo $ColocarNot['enlace'] ?> </a>
					</div>
=======
						<div class="contenido">
							<p><?php echo nl2br($ColocarNot['contenido3']) ?></p>
						</div>
						<?php if(empty($ColocarNot['imagen3'])){}else{  ?>
						<div class="imagen">
							<img src="<?php echo $ColocarNot['imagen3'] ?>">
						</div>
						<?php } ?>			

						<div class="contenido">
							<p><?php echo nl2br($ColocarNot['contenido4']) ?></p>
						</div>
						<?php if(empty($ColocarNot['imagen4'])){}else{  ?>
						<div class="imagen">
							<img src="<?php echo $ColocarNot['imagen4'] ?>">
						</div>
						<?php } ?>
						
						<div class="contenido">
							<p><?php echo nl2br($ColocarNot['contenido5']) ?></p>
						</div>
						<?php if(empty($ColocarNot['imagen5'])){}else{  ?>
						<div class="imagen">
							<img src="<?php echo $ColocarNot['imagen5'] ?>">
						</div>
						<?php } ?>

>>>>>>> b958538 (Hasta Cursos arreglado)
					<div id="fecha">
						<p>Noticia publicada <?php echo $ColocarNot['fecha']?></p>
					</div>
					<?php } ?>
					<?php foreach($PonerEnlace as $ColocarEnlaces){	
								if($ColocarEnlaces['nombre'] != ""){
									
							?>
					<div id="temas-relacionados2">
						<h3>Para más información</h3>	
						<ul>
							
							<a href="<?php echo $ColocarEnlaces['nombre']?>" target="_blank"><li><?php echo $ColocarEnlaces['nombre']?></li></a>	
							
						</ul>
						
					</div>
					<?php
										
								}	
							} 
							
							?>
					<?php 
							foreach($PonerEtiqueta as $ColocarEtiquetas){	
								if($ColocarEtiquetas['nombre'] != ""){
							
					?>						
					<div id="temas-relacionados">
						<h3>Temas relacionados</h3>
						<ul>
							
							<a href="noticias.php?idEti=<?php echo $ColocarEtiquetas['nombre'];?>"><li><?php echo $ColocarEtiquetas['nombre'];?></li></a>
							
						</ul>
					</div>
					<?php 
								} 
							}
							?>
				</div>
			</div>
		</section>
		<!-- Termina seccion de contenido del articulo -->

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

	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>
</body>
</html>