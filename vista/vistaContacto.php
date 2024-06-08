<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="spanish">
<head>

	<!--Meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

	<meta name="description" content="Contactate con el Polo Educativo Tecnológico Cerro.">

	<meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<link rel="icon" type="image/jpg" href="img/Logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/styleContacto16.css">
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
	<title>Contacto</title>
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

  		<article id="contacto">	

  			<div id="contenedor-info-formulario">

  				<div id="contenedor-info-titulo-texto-btns">

  					<div id="info-titulo">
  						<h3>Contactate con nosotros</h3>
  					</div>
	  				
	  				<div id="info-texto">
	  					<p>Recordá que podes contactarnos rellenando el formulario de contacto o mediante las siguiente vías de comunicación.</p>
	  				</div>

	  				<div id="info-btns">

	  					<div id="horarios">
	  						<p><i class="fa-solid fa-clock"></i>Lunes a Viernes: 12:30 a 22:30hs</p>

	  						<p>Sábados: 9 a 13hs</p>
	  					</div>

	  					<a href="https://goo.gl/maps/brBY468PRzrsXS5S9" target="__blank"><i class="fa-solid fa-location-dot"></i>Haíti 1590, Cerro, Montevideo</a>

	  					<a id="btn-email" href="#formulario-contacto"><i class="fa-solid fa-envelope"></i>poloeducativocerro@gmail.com</a>

	  					<a href="tel:22889812"><i class="fa-solid fa-phone"></i>(+598) 2288 9812</a>
	  				</div>
	  				
	  			</div>

	  			<div id="contenedor-formulario" class="formularioContacto">
	  				<form action="contacto.php" method="post">

	  					<div id="nombre-apellido">

							<div id="nombre">

		  						<h4>Nombre</h4>	  					
			  					<input id="formulario-contacto" type="text" name="nombre" placeholder="Mariana" minlength="2" maxlength="30" required>

			  					<div class="contenedor-informacion-nombre">
			  						<p class="textoInfo">.</p>
			  						<p class="cantCaracteres">0/30</p>
			  						<p class="textoLimite">.</p>
			  					</div>	

	  						</div>


		  					<div id="apellido">

		  						<h4>Apellido</h4>	  					
								<input type="text" name="apellido" placeholder="Martínez" minlength="0" maxlength="30" required>

								<div class="contenedor-informacion-apellido">
			  						<p class="textoInfo">.</p>
			  						<p class="cantCaracteres">0/30</p>
			  						<p class="textoLimite">.</p>
			  					</div>

		  					</div>
	  					

	  					</div>
	
	  					<h4>Correo electrónico</h4>
	  					<input type="email" name="correo" placeholder="ejemplo@ejemplo.com" required>

	  					<div class="contenedor-informacion-correo">
			  				<p class="textoInfo">.</p>
			  			</div>
	  					
	  					<h4>Mensaje</h4>
	  					<textarea name="mensaje" placeholder="Hola, mi nombre es Mariana, me gustaría saber como inscribirme en un nuevo curso!" minlength="30" maxlength="3000" required></textarea>

	  					<div class="contenedor-informacion-mensaje">
			  				<p class="textoInfo">.</p>
			  				<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p>
			  			</div>	

	  					<input class="submit cursorInactivo" type="submit" name="enviarmensaje" value="Enviar mensaje" title="Complete el formulario para poder enviar un mensaje" disabled>

	  					

	  				</form>
				
	  			</div>

  			</div>

  		
  		</article>
		  <?php
					if(isset($_POST['enviarmensaje'])){
						if($_POST['nombre'] == ""){
							echo "<script>window.alert('El nombre está vacio!');</script>";
						}elseif($_POST['correo'] == ""){
							echo "<script>window.alert('El correo está vacio!');</script>";
						}elseif($_POST['mensaje'] == ""){
							echo "<script>window.alert('El mensaje está vacio!');</script>";
						}else{
						$nombre = $_POST['nombre'];
						$apellido = $_POST['apellido'];
						$correo = $_POST['correo'];
						$mensaje = $_POST['mensaje'];

						
					
					require 'modelocontacto/src/PHPMailer.php';
					require 'modelocontacto/src/SMTP.php';
					require 'modelocontacto/src/Exception.php';

					$mail = new PHPMailer(true)	;

					try{
						//$mail->SMTPDebug = 2;
						$mail->isSMTP();						
						$mail->Host = 'smtp.gmail.com';
						$mail->SMTPAuth = true;
						$mail->Username = 'DudasPoloEducativoCerro@gmail.com';
						$mail->Password = 'yktrxouspwffigdr';
						$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
						$mail->Port = 465;
						$mail->setFrom('DudasPoloEducativoCerro@gmail.com', 'Email Contacto PETC');
						$mail->addAddress('fernandocuadro134@gmail.com','Correo Contacto');
						$mail->isHTML(true);
						$mail->Subject = 'Se ha contactado con usted: '.$correo;
						$mail->Body = 'Nombre: '.$nombre. ' '.$apellido.'<br> Mensaje:'.$mensaje;
						$mail->send(); 
						echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
						echo "<script>
								swal({
								title:'Contacto',
								text:'Se ah enviado correctamente!!',
								icon:'success'
								
								})
								</script>";

					}catch(Exception $e){
					echo 'Error al enviar el mensaje'.$mail->ErrorInfo;	
					}
				}
				}

					?>
		<!--Articulo ubicacion-->
		<article id="contenedor-ubicacion">

			<div id="ubicacion">

				<div id="ubicacion-mapa">

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3273.37361625393!2d-56.25138987037216!3d-34.87196329999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a1d59dbc629db5%3A0x62e7b916427f5dd9!2sHait%C3%AD%201590%2C%2012800%20Montevideo%2C%20Departamento%20de%20Montevideo!5e0!3m2!1ses!2suy!4v1651858604020!5m2!1ses!2suy"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="ubicacion-gps"></iframe>

				</div>
				

				<div id="contenedor-ubicacion-titulo-texto-btn">
					<div id="ubicacion-titulo">
						<h3>Visitanos</h3>
					</div>
					
					<div id="ubicacion-texto">						
						<p>En caso de que lo prefieras podes encontrarnos en Haití 1590, Cerro, Montevideo</p>
					</div>

					<div id="ubicacion-btn">
						<a href="https://goo.gl/maps/brBY468PRzrsXS5S9" target="__blank"><i class="fa-solid fa-map-location-dot"></i> Ir a Google Maps</a>
					</div>
					
				</div>

			</div>
			
		</article>

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

  	<script src="js/validaciones.js"></script>
  	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>

</body>
</html>