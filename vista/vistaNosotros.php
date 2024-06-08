<!DOCTYPE html>
<html lang="spanish">
<head>
	
	<!--Meta tags-->
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

	<meta name="description" content="Conocé al Polo Esucativo Tecnológico Cerro en todos sus aspectos, desde su hisotria, su infraestructura y equipo.">

	<meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<!--Link a icono y hojas de estilo-->
	<link rel="icon" type="image/jpg" href="img/Logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/styleSliderIntegrantes.css">
	<link rel="stylesheet" type="text/css" href="css/styleNosotros11.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">  

<!-- Link usado para el Slider galeria de fotos-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Fuente usada para los titulos -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

	<!-- Fuente usada para la descripcion --> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">  

	<!-- Script para redes sociales -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title>Nosotros</title>
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
  	
  	<!-- Empieza contenido de la pagina -->
  	<main>

  		<section>

  			<div class="institucion-intro">
		        <video src="img/petc-video.mp4" id="video"></video>
		     
		        <div class="controls">
		        	<button class="btns-controls" onclick="rewind(event)"><i class="fa-solid fa-backward"  title="Atrasar video"></i></button>
		            <button class="btns-controls btn-reproduccion"><i class="fa-solid fa-play" title="Reproducir"></i><i class="fa-solid fa-pause" title="Pausar"></i></button>
		            <button class="btns-controls" onclick="forward(event)"><i class="fa-solid fa-forward" title="Adelantar video"></i></button>
		            <button class="btns-controls"><i class="fa-solid fa-volume-high"></i></button>
		            <!-- <i class="fa-solid fa-volume-xmark"></i> -->
		            <div class="volume-bar">
		            	<div class="volume-level">
		            		<div class="volume-handle"></div>
		            	</div>		       
		            </div>
		            
		            <div class="timeline">
		                <div class="bar">
		                    <div class="inner"></div>
		                </div>
		            </div>
		            <button class="btns-controls"><i class="fa-solid fa-expand" title="Expandir pantalla"></i></button>
		        </div>
	   	 	</div>

  		</section>
  		
		
		<?php //<!--Empieza sección descripcion institucional--> ?>
		<section id="institucion-descripcion">

			<div id="contenedor-mision-vision">
				
				<?php //<!--Articulo misión--> ?>
				<article id="institucion-descripcion__mision">
					<h2>Misión</h2>

					<p>Formar profesionales y técnicos competentes en los distintos niveles, educación media superior y educación terciaria, promotores de un desarrollo sustentable, que se inserten en el mercado laboral con habilidades y competencias propias de su especialidad y habilitados para la realización de proyectos e investigación.</p>
				</article>


				<?php //<!--Articulo visión--> ?>
				<article id="institucion-descripcion__vision">
					<h2>Visión</h2>

					<p>Aspiramos a que el Polo Educativo Tecnológico del Cerro dependiente de la DGETP se convierta en un centro educativo de referencia para la región Norte y Oeste del Departamento de Montevideo, atendiendo la demanda productiva de la región, integrando educación, investigación, extensión, cooperación y trabajo.</p>
				</article>

			</div>


			<?php //<!--Articulo historia--> ?>
			<article id="institucion-descripcion__historia">
				<h2>Historia</h2>

				<div id="institucion-descripcion__historia-primera-parte">
					
					<p>El Polo Educativo Tecnológico del Cerro (PETC) de la Dirección General de Educación Técnico Profesional (DGETP) nace en el año 2018 como Centro Educativo con una oferta de educación terciaria y media superior con un fuerte vínculo con la extensión, con el sector productivo y con experiencias en prácticas curriculares en ámbitos laborales (proyectos de egreso, proyectos de investigación, pasantías, etc).<br><br>

					Se ubica dentro de las instalaciones del PTI del Cerro, concretamente en el 3er. piso del Edificio "verde", en un antiguo edificio que se encuentra en etapa de remodelación que anteriormente cumplía las funciones de Frigorífico junto a una cantidad grande de empresas, micro empresas y cooperativas que abarcan rubros relacionados con la Alimentación, Eléctrica, Madera, Medio Ambiente, Metalúrgica, Naval, Vidrio y Papel, Plástico, Servicios, Química y Textil.</p>

					<div class="historia-imagen">
						<img src="img/img2.jpg">
					</div>

				</div>

				
				<div id="institucion-descripcion__historia-segunda-parte">
					
					<p>Geograficamente en una zona estratégica, al sur del departamento de Montevideo, en la margen derecha de la cuenca baja del Arroyo Pantanoso en un terreno de 20 has, a 20 minutos del puerto de Montevideo y actualmente conectado al aeropuerto por el corredor vial y acceso a todas las rutas nacionales que conecta con los países limítrofes.</p>

					<div class="historia-imagen">
						<img src="img/bienvenida.png">
					</div>
					

				</div>

				
			</article>
			
		</section>
		<?php //<!--Termina sección descripcion institucional--> ?>


		<?php //<!-- Empieza sección para fotos del instituto --> ?>
		<section id="institucion-slider">

			<div id="slider">
				
				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">		

				  <div class="carousel-inner">
				  <?php
						if(empty($_SESSION['usuario'])){
        				}elseif($_SESSION['perfil'] == 'administrador'){
    				?> 
				  	<?php //<!-- Esto lo ve solo el admin o quien corresponda --> ?>
				  	<div id="slider-edicion-agregar-eliminar">

						<a href="editor-nosotros.php#seccion-imagenes"><i class="fa-solid fa-plus"></i></a>
						<a href="editor-nosotros.php#seccion-imagenes"><i class="fa-solid fa-pencil"></i></a>

					</div>
					<?php } ?>
					
						<div class="carousel-item active">
        			<img src="img/banner.png" class="d-block w-100" alt="...">
     				</div>
				    <?php //<!-- Esto es lo que se repite cada vez que se suma una nueva imagen al slider --> ?>
					<?php foreach($MostrarImagen as $Ponerimagen){ ?>
				    <div class="carousel-item">
				      <img src="<?php echo $Ponerimagen['imagen'] ?>" class="d-block w-100" alt="...">
				    </div>
					<?php } ?>	

				    <?php //<!-- Tiene que existir una condicion que, en caso de que no haya alguna imagen de las que se colocaron, vuelva a mostrar la primer imagen --> ?>

				  </div>

				  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				  </button>

				  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				  </button>

				</div>

				<div id="slider-info">
					<h3>Conoce al PETC por dentro</h3>

					<p>Conoce las instalaciones y las actividades del Polo Educativo Tecnológico Cerro</p>
				</div>

			</div>

			

		</section>
		<?php //<!-- Termina sección para fotos del instituto --> ?>
		


		<?php //<!--Empieza sección integrantes de la institución--> ?>
		<section id="institucion-integrantes">

			<div id="fondo-integrantes">

				<div id="contenedor-integrantes">
					
					<h2>Integrantes del Equipo PETC</h2>
			
					<div class="swiper mySwiper">

						<div class="swiper-wrapper">
							<?php foreach($MostrarIntegrantes as $PonerIntegrantes){ ?>
							<div class="swiper-slide">

								<div class="integrante">

								<?php
									if(empty($_SESSION['usuario'])){
        							}elseif($_SESSION['perfil'] == 'administrador'){
    							?> 
									<p class="integrante-id"><?php echo $PonerIntegrantes['id'] ?></p>
	
									<div class="integrante-edicion">
										
										<ul class="integrante-edicion-menu">
											<li><a href="editor-nosotros.php?idInt=<?php echo $PonerIntegrantes['id'] ?>#seccion-integrantes"><i class="fa-solid fa-pencil"></i></a></li>
											<li><a href="modelo/eliminarintegrante.php?idint=<?php echo $PonerIntegrantes['id']?>"><i class="fa-solid fa-trash-can"></i></a></li>
										</ul>
									</div>
								<?php }	?>
									<div class="perfil">
										<img src="<?php echo $PonerIntegrantes['fotoint'] ?>" class="perfil-img">
									</div>

									<div class="info-personal">
										<h3 class="integrante-nombre"><?php echo $PonerIntegrantes['nombreint'] ?></h3>
										<h3 class="integrante-rol"><?php echo $PonerIntegrantes['cargoint'] ?></h3>
									</div>

								</div>

							</div>
							<?php } ?>



							
						</div>

						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
						<div class="swiper-pagination"></div>

					</div>	
				</div>
			</div>
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


  	<script src="js/reproductorVideoNosotros.js"></script>
  	<!--Slider integrantes-->
  	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  	<script src="js/animaciones.js"></script>

  	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>

	<!--Slider imagenes-->
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>