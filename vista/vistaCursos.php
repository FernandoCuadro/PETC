<!DOCTYPE html>
<html lang="spanish">
<head>	

	 <?php //<!--Meta tags--> ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

	<meta name="description" content="Enterate de todos los cursos y carreras que podes seguir en el Polo Educativo Tecnológico Cerro. Conocé los requisitos para la inscripción.">

	<meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<?php //<!--Link a icono y hojas de estilo--> ?>
	<link rel="icon" type="image/jpg" href="img/Logo.png">
<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href="css/styleCursos2.css">
=======
	<link rel="stylesheet" type="text/css" href="css/styleCursos3.css">
>>>>>>> b958538 (Hasta Cursos arreglado)
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css"> 

	<?php //<!-- Fuente usada para los titulos --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">


	<?php //<!-- Fuente usada para la descripcion --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title>Cursos</title>
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
	    <p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <a href="admin.html" id="modo-admin">Administrador</a></p>
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

	    <?php //<!-- Empieza menu responsive --> ?>
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
		    <?php //<!-- Termina el menu responsive --> ?>

		    <?php //<!-- Empieza menu normal --> ?>
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
	    <?php //<!-- Termina menu --> ?>
  	</header>
  	
  	<?php //<!-- Empieza contenido de la pagina --> ?>
  	<main>

  		<section id="cursos">

  			<div id="encabezado">
  				<h2 id="titulo"><span>Cursos disponibles</span></h2>

  				<div id="info">
  					<p>Para la inscripción del curso (aplica para todos) el alumno deberá presentar:</p>

  					<ul>
  						<li>2 Fotos Carnet</li>
  						<li>Fotocopia de Cédula</li>
  						<li>Fotocopia de Credencial (mayores de edad)</li>
  						<li>Fotocopia de Carnet de salud o Carnet del adolescente</li>
  						<li>Formula 69 (Tecnicaturas)</li>
  						<li>Certificados de estudios</li>
  					</ul>
  				</div>
  				

  			
  			</div>

  			<?php //<!--Estos son los botones que llevan al editor--> ?>
			  <?php   
        		
        		if(empty($_SESSION['usuario'])){       			
    		?>
    		<?php
        		}elseif($_SESSION['perfil'] == 'administrador'){
    		?>  
  			<div id="btns-acceso-edicion">
  				<a href="editor-cursos.php">Agregar y editar cursos<i class="fa-solid fa-plus"></i></a>
  			</div>
			<?php } ?>
  			<?php foreach($ObtenerNiveles as $PonerNiveles){
				//session_start(); 
				$_SESSION['niv'] = $PonerNiveles['numero'];   
			?>
  			<?php //<!--Todo esto se repite si se trata de otro nivel de cursos--> ?>
  			<section>
	  			<div class="cursos-por-nivel">
	  				
	  				<h3 id="<?php echo $PonerNiveles['numero'] ?>"><?php echo $PonerNiveles['nombre'] ?></h3>

	  				<div class="contenedor-cursos">
					  <?php foreach($ObtenerAreas as $PonerAreas){ 
							
							if($_SESSION['niv'] != $PonerAreas['nivelnum']){

							}else{	
						?>
	  					<?php //<!--Esto es lo que se repite por cada nuevo curso--> ?>
<<<<<<< HEAD
	  					<a class="curso-enlace" href="<?php echo $PonerAreas['enlace'] ?>" target="__blank">
	  						<article>
	  						

	  							
	  							<p class="curso-nivel"><?php echo $PonerNiveles['numero'];?></p>
=======
	  					<a class="curso-enlace" href="<?php echo $PonerAreas['enlace']; ?>" target="_blank">
	  						<article>
								
>>>>>>> b958538 (Hasta Cursos arreglado)

	  							<?php
									if($_SESSION['perfil'] == 'administrador'){
								?>
	  							<p class="curso-nivel"><?php echo $PonerNiveles['numero'];?></p>
								<?php } ?>		
	  							<img src="<?php echo $PonerAreas['imagen'] ?>">
	  							<p class="curso-titulo"><?php echo $PonerAreas['area'] ?></p>
	  						</article>
	  					</a>
						<?php 
							} 
							}
						?>		

	  				</div>
	  			</div>
	  		</section>
		<?php } ?>				
  		</section>
  		

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

<<<<<<< HEAD
  	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  	
  	<script src="js/animaciones.js"></script>

  	
	<script src="js/menu.js"></script>
	
	
	<script src="js/irArriba.js"></script>

	
	<script src="js/redesSociales.js"></script>

	
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

=======
  	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>

>>>>>>> b958538 (Hasta Cursos arreglado)
</body>
</html>