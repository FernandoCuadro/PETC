<!DOCTYPE html>
<html>	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleEditores34.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">

<<<<<<< HEAD
	<?php //<!-- Usado para el editor, por cada cantidad de editores, es la cantidad de veces que usamos el script -->  ?>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>

=======
>>>>>>> b958538 (Hasta Cursos arreglado)
	<?php //<!-- Fuente usada para la introduccion sobre la imagen --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet"> 

	<?php //<!-- Fuente usada para los titulos --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

	<?php //<!-- Fuente usada para la descripcion -->?>
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

  	<div class="fondoOscuro">
  			
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
  	</header>
  	
  	<main>


  		<div id="contenedor-editor">

  			<div class="wrapper-container">
					
				<div class="contenedor-titulos-cajas" id="grupo__nivel1">
				<form id="formularioNivel1" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">

						<h2 class="curso-titulo" id="CrearNivel">Crear nuevo nivel</h2>

						<h3 id="nombreNivel1">Nombre<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<input type="text" name="nomnivel" placeholder="Ciclo básico" minlength="5" maxlength="40" required>

						<div class="contenedor-informacion-nombre">
		  					<p class="textoInfo">Mínimo 5 caracteres</p>
		  					<p class="cantCaracteres">0/40</p>
		  					<p class="textoLimite">.</p>
	  					</div>

						<h3 id="ordenNivel1">Orden en el que se muestra<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<input type="number" min="1" max="9" minlength="1" maxlength="1" name="ordernivel" placeholder="1" required>

						<div class="contenedor-informacion-orden">
		  					<p class="textoInfo">Número mínimo: 1</p>
		  					<p class="cantCaracteres">0/1</p>
		  					<p class="textoLimite">.</p>
	  					</div>

						<div class="btns-submit">
		  					<input class="submit cursorInactivo" type="submit" name="crearnivel" value="Crear nivel" disabled title="Complete el formulario para habilitar esta acción">
		  				</div>

	  				</form>

				</div>



				<div class="contenedor-titulos-cajas" id="grupo__nivel2">
					<form id="formularioNivel2" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
					
						<h2 class="curso-titulo" id="EditarNivel">Editar/eliminar nivel</h2>

						<h3 id="idNivel2">Nombre del nivel<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<select name="idnivel" required>
							<option value="">Seleccione un nivel</option>
							<?php foreach($vernivel as $Ponernivelcombo){ ?>
							<option value="<?php echo $Ponernivelcombo['id'] ?>"><?php echo $Ponernivelcombo['nombre'] ?></option>
							<?php } ?>
						</select>

						<div class="contenedor-informacion-id">
		  					<p class="textoInfo">Seleccione un nivel ya ingresado</p>
	  					</div>

						<h3 id="nombreNivel2">Nombre <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<input type="text" name="nomniveledit" placeholder="Bachillerato" minlength="5" maxlength="490" required>

						<div class="contenedor-informacion-nombre">
		  					<p class="textoInfo">Mínimo 5 caracteres</p>
		  					<p class="cantCaracteres">0/40</p>
		  					<p class="textoLimite">.</p>
	  					</div>

						<h3 id="ordenNivel2">Orden en el que se muestra <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<input type="number" min="1" max="9" minlength="1" maxlength="1" name="ordernivel2" placeholder="2" required>

						<div class="contenedor-informacion-orden">
		  					<p class="textoInfo">Número mínimo: 1</p>
		  					<p class="cantCaracteres">0/1</p>
		  					<p class="textoLimite">.</p>
	  					</div>

						<div class="btns-submit">
							<input id="deleteNivel2" class="delete cursorInactivo" type="submit" name="eliminarNivel" value="Eliminar nivel" disabled title="Complete el formulario para habilitar esta acción">

		  					<input id="submitNivel2" class="submit cursorInactivo" type="submit" name="editarnivel" value="Editar nivel" disabled title="Complete el formulario para habilitar esta acción">
		  				</div>
						
	  				</form>
				</div>
			</div>
  				
			<div class="wrapper-container">
					
				<div class="contenedor-titulos-cajas" id="grupo__curso1">
					<form id="formularioCurso1" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">

						<h2 class="curso-titulo" id="CrearCurso">Crear curso</h2>

						<h3 id="nombreCurso1">Nombre<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
						
						<input type="text" name="nomcurso" placeholder="Informática" minlength="5" maxlength="40" required>

						<div class="contenedor-informacion-nombre">
		  					<p class="textoInfo">Mínimo 5 caracteres</p>
		  					<p class="cantCaracteres">0/40</p>
		  					<p class="textoLimite">.</p>
	  					</div>

						<h3 id="idNivelCurso1">Nivel<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<select name="nivelcurso" required>
							<option value="">Seleccione un nivel</option>
							<?php foreach($vernivel as $Ponernivelcombo){ ?>
<<<<<<< HEAD
							<option value="<?php echo $Ponernivelcombo['numero'] ?>"><?php echo $Ponernivelcombo['nombre'] ?></option>
=======
							<option value="<?php echo $Ponernivelcombo['numero'] ?>"><?php echo $Ponernivelcombo['numero']."->".$Ponernivelcombo['nombre']?></option>
>>>>>>> b958538 (Hasta Cursos arreglado)
							<?php } ?>
						</select>

						<div class="contenedor-informacion-id">
		  					<p class="textoInfo">Seleccione el nivel al que corresponde el curso</p>
	  					</div>

						<h3 id="imagenCurso1">Imagen del curso<i class="fa-solid fa-circle-xmark error" title="Campo vacío"></i></h3>

						<input accept="image/png,image/jpeg" type="file" name="imagencurso">

						<div class="contenedor-informacion-imagen">
		  					<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>

						<h3 id="enlaceCurso1">Enlace relacionado<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<input type="text" name="enlacecurso" placeholder="https://ejemplo-curso.com" required>

						<div class="contenedor-informacion-enlace">
		  					<p class="textoInfo">Ingrese el enlace correspondiente para el curso a ingresar</p>
	  					</div>

						<div class="btns-submit">

		  					<input class="submit cursorInactivo" type="submit" name="crearcurso" value="Crear curso" disabled title="Complete el formulario para habilitar esta acción">

		  				</div>

	  				</form>

				</div>



				<div class="contenedor-titulos-cajas" id="grupo__curso2">
					<form id="formularioCurso2" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
					
						<h2 class="curso-titulo" id="editarCurso">Editar/eliminar curso</h2>

						<h3 id="editarCurso2">Nombre del curso<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<select name="idCurso" required>
							<option value="">Seleccione un curso</option>
							<?php foreach($vercursos as $Ponercursocombo){ ?>
							<option value="<?php echo $Ponercursocombo['id'] ?>"><?php echo $Ponercursocombo['area'] ?></option>
							<?php } ?>
						</select>

						<div class="contenedor-informacion-curso">
		  					<p class="textoInfo">Seleccione un curso ya ingresado</p>
	  					</div>

						<h3 id="nombreCurso2">Nombre <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<input type="text" name="nomcursoedit" placeholder="Diseño gráfico" minlength="5" maxlength="40" required>

						<div class="contenedor-informacion-nombre">
		  					<p class="textoInfo">Mínimo 5 caracteres</p>
		  					<p class="cantCaracteres">0/40</p>
		  					<p class="textoLimite">.</p>
	  					</div>

						<h3 id="nivelCurso2">Nivel <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<select name="nivelcursoedit" required>
							<option value="">Seleccione un nivel</option>
							<?php foreach($vernivel as $Ponernivelcombo){ ?>
							<option value="<?php echo $Ponernivelcombo['numero'] ?>"><?php echo $Ponernivelcombo['nombre'] ?></option>
							<?php } ?>
						</select>

						<div class="contenedor-informacion-nivel">
		  					<p class="textoInfo">Seleccione el nivel al que corresponde el curso</p>
	  					</div>

						<h3 id="imagenCurso2">Imagen del curso <span>(edición)</span><i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

						<input type="file" name="imagencursoedit">

						<div class="contenedor-informacion-imagen">
		  					<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>

						<h3 id="enlaceCurso2">Enlace relacionado <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<input type="text" name="enlacecursoedit" placeholder="https://ejemplo-curso.com" required>


						<div class="contenedor-informacion-enlace">
		  					<p class="textoInfo">Ingrese el enlace correspondiente para el curso a editar</p>
	  					</div>

						<div class="btns-submit">
							<input id="deleteCurso2" class="delete cursorInactivo" type="submit" name="eliminarCurso" value="Eliminar curso" disabled title="Seleccione un curso para habilitar esta acción">

		  					<input id="submitCurso2" class="submit cursorInactivo" type="submit" name="editarCurso" value="Editar curso" disabled title="Complete el formulario para habilitar esta acción">
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

<<<<<<< HEAD
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

	<script src="js/menu.js"></script>
	
	<script src="js/irArriba.js"></script>

=======
	<script src="js/validaciones"></script>
	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>	
	<script src="js/irArriba.js"></script>
>>>>>>> b958538 (Hasta Cursos arreglado)
	<script src="js/redesSociales.js"></script>
</body>
</html>