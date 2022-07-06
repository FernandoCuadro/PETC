<!DOCTYPE html>
<html lang="spanish">
<head>

	<?php //<!--Meta tags--> ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

	<meta name="description" content="Conocé todo sobre el Polo Educativo Tecnológico Cerro, novedades, fechas importantes, los distintos cursos, su historia, integrantes y más.">

	<meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleIndex.css">
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
	<title>Home</title>
</head>
<body>
	<a href="javascript:void(0);" id="scroll" title="Volver arriba">Top<span></span></a>

	<div id="contenedor-carga">
  			
		<div class="spinner"></div>
			
  	</div>
	<header>

		<img id="img-header" src="img/banner.png">

		<?php   
        /*Si ningún usuario inició sesión, no se muestra nada, en cambio, si uno inició, mostrará la opción de cerrar sesión y el tipo de usuario que inició sesión*/
        	session_start();
        	if(empty($_SESSION['usuario'])){       			
    	?>
    	<?php
        	}elseif($_SESSION['perfil'] == 'administrador'){
    	?>  
	    <div id="contenedor-sesion">

	    	<?php //<!-- Esto se muestra en caso de que la sesion iniciada sea de Admin --> ?>
	    	<p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <a href="admin.php" id="modo-admin">Administrador</a></p>
		</div>
		<?php
		}elseif($_SESSION['perfil'] == 'moderador'){	
		?>	
		<div id="contenedor-sesion">	
	    	<?php //<!-- Esto se muestra en caso de que la sesion iniciada sea de Editor --> ?>
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

  		<?php //<!--Seccion acceso a novedades--> ?>
		<section>

		    <div class="slider-frame">
		    	
		    	<div id="articulo-se-mueve">
					<?php foreach($datosNoticias as $ColocarNoticias){ ?>
		    		<?php //<!--Esto es lo que se repite por articulo--> ?>
		    		<article class="ultimas-noticias">

				    	<div id="ultimas-noticias-contenido">

				    		<div id="titulo">
				    			<h2><?php echo $ColocarNoticias['titulo'] ?></h2>
				    		</div>
				    		

				    		<div class="contenedor-descripcion-btn">

				    			<div id="descripcion">
					    			<p><?php echo $ColocarNoticias['descripcion'] ?></p>
					    		</div>
				    		

					    		<div id="btn">
					    			<a href="noticiaCompleta.php?idNot=<?php echo $ColocarNoticias['id'] ?>">Leer más<i class="fa-solid fa-arrow-right"></i></a>
					    		</div>
				    		</div>
				    		
				    		
				    	</div>

						<img src="<?php echo $ColocarNoticias['miniatura']?>">

		    		</article>
					<?php } ?>

		    	 </div>
		    	
		    </div>

		</section>


		<?php //Seccion acceso a cursos ?>
		<section>
			<article id="contenedor-cursos">
			
		<?php	foreach($datosNiveles as $PonerNivel){
				//foreach($datosAreas as $PonerAreas){ 
				//if($PonerNivel['numero'] == $PonerAreas['nivelnum'] ){			
		?>
				<a href="cursos.php#<?php echo $PonerNivel['numero'] ?>"><div class="acceso-curso">
					<h3><?php echo $PonerNivel['nombre'] ?></h3>
				</div></a>
		<?php 
			} 
			//}
			//}	
		?>

			</article>
		</section>


		<section>
			<article id="contenedor-nosotros">
				<img src="img/home-nosotros2.jpg">

				<div id="nosotros-contenido">
					<h3>Nuestra historia</h3>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<a href="nosotros.php">¡Conócenos!</a>
				</div>
			</article>
		</section>



		<?php //<!--Seccion acceso a calendario--> ?>
		<section>
			<article id="contenedor-calendario">
				<img src="img/home-calendario.jpg">

				<div id="calendario-contenido">
					<h3>Calendario de actividades</h3>

					<p>Contamos con un Calendario de Actividades para que no te pierdas las actividades y fechas importantes, inicio de clases, exámenes ¡y más!</p>

					<a href="calendario.php"><i class="fa-solid fa-calendar-days"></i>Quiero ver el calendario</a>
				</div>
			</article>
		</section>



		<section>
			<article id="contenedor-novedades">
				<a href="nosotros.php"><h3>Acceso a Novedades<i class="fa-solid fa-arrow-right"></i></h3></a>
			</article>
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

  	<script src="js/animaciones.js"></script>

  	<?php //<!-- Script necesario para que funcione el menu --> ?>
	<script src="js/menu.js"></script>
	
	<?php //<!-- Script necesario para que funcione el btn de volver arriba --> ?>
	<script src="js/irArriba.js"></script>

	<?php //<!-- Script necesario para que funcione el btn de redes sociales --> ?>
	<script src="js/redesSociales.js"></script>
</body>
</html>