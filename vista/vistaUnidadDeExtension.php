<!DOCTYPE html>
<html lang="spanish">
<head>
	<!--Meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

	<meta name="description" content="El Polo Educativo Tecnológico Cerro cuenta con una Unidad de Extensión, conocé qué es y cuales son sus objetivos.">

	<meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<!--Link a icono y hojas de estilo-->
	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleUE2.css">
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
	<title>Unidad de Extensión</title>
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
	    	<p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <span id="modo-editor">Moderador</span></p>
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

  	<main>

  		<h2 id="titulo-general">DIRECCIÓN TÉCNICA DE GESTIÓN ACADÉMICA
		Proyecto Experimental Unidades de Extensión (PEUE). 
		Departamento de Extensión</h2>


		<section id="que-es">

			<h3>¿Qué es la UE?</h3>	

			<h4>La UE presenta como Objetivos los siguientes</h4>	

			<ul class="apartados">

				<li class="primer-apartado-texto">
					<i class="fa-solid fa-arrow-right-long"></i>
					<p>Promover la integración entre UTU y la sociedad.</p>
				</li>

				<li class="primer-apartado-texto">
					<i class="fa-solid fa-arrow-right-long"></i>
					<p>Contribuir a la construcción interdisciplinaria de saberes a partir del “Diálogo” entre diferentes unidades académicas y actores de la producción.</p>
				</li>

				<li class="primer-apartado-texto">
					<i class="fa-solid fa-arrow-right-long"></i>
					<p>Promover y acompañar la implementación de propuestas (proyectos de egreso en EMS y proyectos Final y actividades de Extensión en Educación Terciaria).</p>
				</li>

				<li class="primer-apartado-texto">
					<i class="fa-solid fa-arrow-right-long"></i>
					<p>Articular y gestionar el sistema de Educación en Ámbitos de Trabajo UTU, que  integre las pasantías  y otras oportunidades de formación de la empresa.</p>
				</li>

			</ul>

			<p>La extensión puede promover la relación de la educación con el desarrollo productivo de un determinado territorio, a partir de un círculo virtuoso entre estos dos ámbitos, que permita también garantizar la cobertura educativa, la calidad de la enseñanza, la equidad de acceso y la permanencia para la conclusión del ciclo.</p>



			<ul class="apartados">
				
				<li class="segundo-apartado-texto">
					<i class="fa-solid fa-circle"></i>
					<p>Los centros educativos forman parte de la red social de un territorio, y pueden posicionarse como agentes que contribuyen al desarrollo (CETP-UTU, 2019).</p>
				</li>

				<li class="segundo-apartado-texto">
					<i class="fa-solid fa-circle"></i>
					<p>El desarrollo de los PET y los IAE está asociado a la vinculación con actores claves del medio, tanto del sector productivo como del académico y social.</p>
				</li>

 				<li class="segundo-apartado-texto">
 					<i class="fa-solid fa-circle"></i>
 					<p>De esta manera se fortalece la formación superior a través de la investigación y la extensión.</p>
 				</li>

 			</ul>

 				<p>Las Unidades de Extensión (UE) difunden y orientan a los equipos directivos, docentes y estudiantes de un determinado territorio, en cuanto a los procedimientos para el desarrollo de “convenios marco” y “acuerdos instrumentales” de pasantías. Compete también a la UE el acercamiento al sector productivo, (empresas privadas y públicas, cámaras empresariales, organización de trabajadores, etc.), para la gestión y difusión de convenios y acuerdos correspondientes. Esto implica la articulación con las direcciones de los centros educativos, la División de Cooperación y Convenios de DGETP-UTU, los representantes de las empresas y los docentes que desarrollan la tutoría académica.</p>


 				<div id="concepto">			
 				
	 				<p>Estos conceptos de extensión son tomados de las siguiente fuentes:</p>

	 				<ol class="apartados">
	 					<li><p>Reglamento de Educación Terciaria Superior , que en su Art. 1. Literal c. (Educación Tecnológica) expresa lo siguiente:<br>
						<span>“Con el fin de generar soluciones pertinentes a las diversas problemáticas y trascender la división entre pensamiento teórico y práctico- aspectos fundamentales para la concreción de una auténtica formación tecnológica- el diseño de las propuestas  de ETS de UTU, se deberá sustentar en procesos caracterizados por hacer pensando y un pensar haciendo, que promuevan la generación de conocimiento por medio de la investigación y un fuerte vínculo con el medio a través de las prácticas de extensión”</span>.</p></li>
	 				</ol>

 				</div>

 			</section>


 			<section id="que-estamos-impulsando">

				<h3>¿Que estamos impulsando en el 2022?</h3>

				<p>En el presente año el trabajo de la Unidad e Extensión da continuidad al “Proyecto de Logística Montevideo Oeste” definido en el 2021 y pretende contribuir a brindar estudios y posibles soluciones a problemas logísticos y administrativos, vinculados al transporte de carga y distribución de mercaderías (granos, carnes, otras), ordenamiento de circulación (peatonal y vehicular) y almacenamiento (disposición de residuos).</p>

			</section>


			<section id="objetivo-general">

				<h3>OBJETIVO GENERAL</h3>

				<p>Contribuir a brindar estudios y posibles soluciones a problemas logísticos y administrativos vinculados al transporte de carga y distribución de mercaderías, ordenamiento de circulación y almacenamiento</p>

			</section>

			<section id="objetivos-especificos">

				<h3>OBJETIVOS ESPECÍFICOS</h3>

				<p>Fortalecer el trabajo interinstitucional entre el PETC y otros organismos  estatales, empresas privadas y demás Instituciones vinculadas al sector.</p>
				
				<p>Promover el trabajo y la coordinación docente entre las comunidades  educativas de centros educativos de la Región Oeste.</p>

				<p>Se pretende vislumbrar mayores oportunidades en el desarrollo de proyectos finales, involucrando a las asignaturas que brindan educación tecnológica para la inserción en los diferentes servicios logísticos y administrativos en la región Montevideo Oeste.De la actualización de los objetivos del proyecto se definieron actividades que se centrarán en fortalecer el vínculo entre la educación tecnológica y profesional desde la articulación y gestión y desde el trabajo con las comunidades educativas con el sector productivo. Se buscará promover y acompañar la implementación de las propuestas dando  mayores oportunidades para la realización de: Proyectos Finales, Tesinas y actividades de Extensión en Educación Terciaria, así como el trabajar desde los acuerdos de cooperación realizados y próximos a concretar : caso de UAM y otras empresas del sector logístico. Además se buscará articular el sistema de Educación en Ámbitos de Trabajo UTU, que  integre las pasantías y otras oportunidades de formación de la empresa, como también aportar a la construcción permanente de la interdisciplina.</p>

		</section>


		<section id="zona-de-influencia">
			<h3>Zona de Influencia de la UE en Montevideo - Oeste:</h3>

			<ul class="apartados">
				
				<li class="tercer-apartado-texto">
					<i class="fa-solid fa-minus"></i>
					<p>Polo Educativo Tecnológico Cerro</p>
				</li>

				<li class="tercer-apartado-texto">
					<i class="fa-solid fa-minus"></i>
					<p>Escuela Agraria de Montevideo</p>
				</li>

				<li class="tercer-apartado-texto">
					<i class="fa-solid fa-minus"></i>
					<p>Escuela Tecnológica Superior de Administración y Servicios - Prado</p>
				</li>

				<li class="tercer-apartado-texto">
					<i class="fa-solid fa-minus"></i>
					<p>Escuela Técnica de Paso de la Arena y anexo “La Casona”</p>
				</li>

				<li class="tercer-apartado-texto">
					<i class="fa-solid fa-minus"></i>
					<p>Escuela Técnica Superior Marítima</p>
				</li>

			</ul>

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

  	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>
</body>
</html>