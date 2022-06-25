<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleEditores.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">

	<!-- Usado para el editor, por cada cantidad de editores, es la cantidad de veces que usamos el script -->
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>

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
	<title>Editor | Cursos</title>
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
        	//session_start();
        	if(empty($_SESSION['usuario'])){       			
    	?>
    	<?php
        	}elseif($_SESSION['perfil'] == 'administrador'){
    	?>  
		<!-- Importante que el div tampoco aparezca cuando el usuario no está iniciado, ocupa espacio demás -->
	    <div id="contenedor-sesion">

	    	<!-- Esto se muestra en caso de que la sesion iniciada sea de Admin -->
	    	<p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <a href="admin.php" id="modo-admin">Administrador</a></p>
		</div>
		<?php
		}elseif($_SESSION['perfil'] == 'moderador'){	
		?>	
		<div id="contenedor-sesion">	
	    	<!-- Esto se muestra en caso de que la sesion iniciada sea de Editor -->
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


  		<div id="contenedor-editor">

  			<div class="wrapper-container">
					
				<div class="contenedor-titulos-cajas">
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">

						<h3 class="curso-titulo" id="CrearNivel">Crear nuevo nivel</h3>

						<h3>Nombre</h3>
						<input type="text" name="nomnivel" placeholder="Agregar nombre" required="yes">

						<h3>Orden en el que se muestra</h3>
						<input type="number" min="0" name="ordernivel" placeholder="Indique un número" required="yes">

						<div class="btns-submit">
		  					<input type="reset" name="" value="Cancelar">
		  					<input type="submit" name="crearnivel" value="Crear nivel">
		  				</div>

	  				</form>

				</div>



				<div class="contenedor-titulos-cajas">
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
					
						<h3 class="curso-titulo" id="EditarNivel">Editar/eliminar nivel</h3>
						<h3>Nombre nivel</h3>
						<select name="idnivel" required="yes">
							<option value="">Seleccione un nivel</option>
							<?php foreach($vernivel as $Ponernivelcombo){ ?>
							<option value="<?php echo $Ponernivelcombo['id'] ?>"><?php echo $Ponernivelcombo['nombre'] ?></option>
							<?php } ?>
						</select>

						<h3>Nombre</h3>
						<input type="text" name="nomniveledit" placeholder="Nombre">

						<h3>Orden en el que se muestra</h3>
						<input type="number" name="orderniveledit" min="0" placeholder="Indique un número">

						<div class="btns-submit">
							<input type="submit" name="eliminarNivel" value="Eliminar">
		  					<input type="reset" name="" value="Cancelar">
		  					<input type="submit" name="editarnivel" value="Editar nivel">
		  				</div>
						
	  				</form>
				</div>
			</div>
  				
			<div class="wrapper-container">
					
				<div class="contenedor-titulos-cajas">
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">

						<h3 class="curso-titulo" id="CrearCurso">Crear curso</h3>

						<h3>Nombre</h3>
						<input type="text" name="nomcurso" placeholder="Nombre" required="yes">

						<h3>Nivel</h3>
						<select name="nivelcurso" required="yes">
							<option value="">Seleccione un nivel</option>
							<?php foreach($vernivel as $Ponernivelcombo){ ?>
							<option value="<?php echo $Ponernivelcombo['id'] ?>"><?php echo $Ponernivelcombo['nombre'] ?></option>
							<?php } ?>
						</select>

						<h3>Imagen del curso</h3>
						<input type="file" name="imagencurso" required="yes">

						<h3>Enlace relacionado</h3>
						<input type="text" name="enlacecurso" placeholder="Ingrese enlace relacionado" required="yes">

						<div class="btns-submit">
		  					<input type="reset" name="" value="Cancelar">
		  					<input type="submit" name="crearcurso" value="Crear curso">
		  				</div>

	  				</form>

				</div>



				<div class="contenedor-titulos-cajas">
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
					
						<h3 class="curso-titulo" id="editarCurso">Editar/eliminar curso</h3>

						<h3>Curso ah editar</h3>
						<select name="idCurso" required="yes">
							<option value="">Seleccione un curso</option>
							<?php foreach($vercursos as $Ponercursocombo){ ?>
							<option value="<?php echo $Ponercursocombo['id'] ?>"><?php echo $Ponercursocombo['area'] ?></option>
							<?php } ?>
						</select>

						<h3>Nombre</h3>
						<input type="text" name="nomcursoedit" placeholder="Nombre">

						<h3>Nivel</h3>
						<select name="nivelcursoedit">
							<option value="">Seleccione un nivel</option>
							<?php foreach($vernivel as $Ponernivelcombo){ ?>
							<option value="<?php echo $Ponernivelcombo['id'] ?>"><?php echo $Ponernivelcombo['nombre'] ?></option>
							<?php } ?>
						</select>

						<h3>Imagen del curso</h3>
						<input type="file" name="imagencursoedit">

						<h3>Enlace relacionado</h3>
						<input type="text" name="enlacecursoedit" placeholder="Ingrese enlace relacionado">

						<div class="btns-submit">
							<input type="submit" name="eliminarCurso" value="Eliminar">
		  					<input type="reset" name="" value="Cancelar">
		  					<input type="submit" name="editarCurso" value="Editar curso">
		  				</div>
	  				</form>
				</div>
			</div>
  		</div>


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

  	<script>
	    BalloonEditor
	        .create( document.querySelector( '#editor1' ) )
	        .catch( error => {
	            console.error( error );
	        } );

	    BalloonEditor
	        .create( document.querySelector( '#editor2' ) )
	        .catch( error => {
	            console.error( error );
	        } );

        BalloonEditor
	        .create( document.querySelector( '#editor3' ) )
	        .catch( error => {
	            console.error( error );
	        } );

        BalloonEditor
	        .create( document.querySelector( '#editor4' ) )
	        .catch( error => {
	            console.error( error );
	        } );

	    BalloonEditor
	        .create( document.querySelector( '#editor5' ) )
	        .catch( error => {
	            console.error( error );
	        } );

	    BalloonEditor
			.create( document.querySelector( '#editor6' ) )
			.catch( error => {
			    console.error( error );
			} );
	</script>

	<script src="js/animaciones.js"></script>

  	<!-- Script necesario para que funcione el menu -->
	<script src="js/menu.js"></script>
	
	<!-- Script necesario para que funcione el btn de volver arriba -->
	<script src="js/irArriba.js"></script>

	<!-- Script necesario para que funcione el btn de redes sociales -->
	<script src="js/redesSociales.js"></script>
</body>
</html>