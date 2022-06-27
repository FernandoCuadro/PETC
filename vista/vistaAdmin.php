<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/styleAdmin.css">
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
	<title>Página del Administrador</title>
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

  		<!--EMPIEZA SECCION NOVEDADES-->
  		<section id="contenedor-novedades">
  			
  			<h2 id="ir-seccion-novedades">Novedades</h2>

  			<div class="contenedor-novedad">
  				<?php foreach($obtenerNoticias as $PonerNovedad){ ?>
  				<article class="novedad">

  					<div class="preview">
  						<p>ID novedad: <?php echo $PonerNovedad['id'];?><i class="fa-solid fa-angle-right"></i></p>

  						<!--Dependiendo del estado de la novedad es el mensaje que se muestra-->
						<?php if($PonerNovedad['estado'] == "activo"){ ?>
  						<p class="estado-activo"><?php echo $PonerNovedad['estado'];?></p>
						<?php }elseif($PonerNovedad['estado'] == "inactivo"){	?>
  							<p class="estado-inactivo">Inactivo</p>
							<?php } ?>
  					</div>
  					
  					<div class="contenido">

  						<div class="contenido-info">
  							<h3><?php echo $PonerNovedad['titulo'];?></h3>

	  						<p class="descripcion"><?php echo $PonerNovedad['descripcion'];?></p>

	  						<div class="etiquetas">
							  <?php foreach($obtenerEtiquetas as $PonerEtiqueta){ 
									if($PonerEtiqueta['nombre'] == ""){
								?>	
	  							<!--Cuando no hay etiquetas aparece este mensaje-->
	  								<p class="mensaje">No hay etiquetas para esta novedad</p>

								<?php }elseif($PonerEtiqueta['idnoticia'] == $PonerNovedad['id']){ ?>			
	  							<a href="noticias.php?idEti=<?php echo $PonerEtiqueta['nombre'];?>" class="etiqueta"><?php echo $PonerEtiqueta['nombre'];?></a>
							<?php
								}
							?> 
							<?php		
							  }		
							?>  
	  						</div>

	  						<p class="fecha"><?php echo $PonerNovedad['fecha'] ?></p>
  						</div>

  						<div class="contenido-edicion">
  							<a href="activoNoticias.php?idAcNot=<?php echo $PonerNovedad['id'] ?>"><i class="fa-solid fa-eye"></i></a>
  							<a href="inactivoNoticias.php?idInNot=<?php echo $PonerNovedad['id'] ?>"><i class="fa-solid fa-eye-slash"></i></a>
  							<a href="editor-noticias.php?idNot=<?php echo $PonerNovedad['id'] ?>"><i class="fa-solid fa-pen"></i></a>
  							<a href="eliminarNoticia.php?idNotEli=<?php echo $PonerNovedad['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
  						</div>
  						
  					</div>

  				</article>
				  <?php } ?>

  			</div>

  		</section>



  		<!--EMPIEZA SECCION DE USUARIOS-->
  		<section id="contenedor-usuarios">
		  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
  			<article id="usuarios-agregar">

  				<h2 id="ir-seccion-usuarios">Agregar nuevo usuario</h2>
				
				<div class="contenedor-formulario-usuarios">
					<form class="formulario-usuarios">
						
						<div class="nombre">
							<h3>Nombre</h3>
							<input type="text" name="nombreUsuario" placeholder="Nombre" required="yes">
						</div>
						
						<div class="cedula">
							<h3>Cédula</h3>
							<input type="number" name="ciUsuario" min="10000000" max="99999999" placeholder="Cédula de identidad" required="yes">	
						</div>

						<div class="contraseña">
							<h3>Contraseña</h3>
							<input type="password" name="contraUsuario" placeholder="Contraseña" required="yes">
						</div>

						<div class="nombre">
							<h3>Rol</h3>
							<input type="text" name="rolUsuario" placeholder="Rol" required="yes">
						</div>
					<!--		  
						<div class="nombre">
		  				<h2>Estado</h2>
		  				<select name="estado">
							<option value="activo">Activo</option>
							<option value="inactivo">Inactivo</option>
						</select>
		  			</div>  
							--> 	
						<div class="submit">
							<input type="reset" name="" value="Borrar datos">
							<input type="submit" name="crearUsuario" value="Crear usuario">
						</div>
						
					</form>
				</div>

  			</article>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">					  
  			<article id="usuarios-editar-eliminar">

  				<h2>Editar/Eliminar usuario</h2>
  				
  				<div class="contenedor-formulario-usuarios">
					<form class="formulario-usuarios">
						
						<div class="dato-existente">
							<h3>Usuario existente</h3>
							<select name="ciUsuario">
								<option value="">Seleccione un usuario</option>
								<?php foreach($obtenerUsuarios as $PonerUsuario){ ?>
								<option value="<?php echo $PonerUsuario['ci'] ?>"><?php echo $PonerUsuario['nombre'] ?></option>
								<?php } ?>
							</select>
						</div>
						

						<div class="nombre">
							<h3>Nuevo nombre <span>(solo edición)</span></h3>
							<input type="text" name="nombreUsuario" placeholder="Nombre">
						</div>
						
						<div class="contraseña">
							<h3>Contraseña</h3>
							<input type="password" name="contUsuario" placeholder="Contraseña">
						</div>

						<div class="nombre">
							<h3>Rol</h3>
							<input type="text" name="rolUsuario" placeholder="Rol">
						</div>
						
						<div class="submit">
							<input type="submit" name="" value="Eliminar usuario">
							<input type="reset" name="" value="Borrar datos">
							<input type="submit" name="editarusuario" value="Editar usuario">
						</div>

						

					</form>
				</div>

  			</article>
		</form>							
  		</section>



  		<!--EMPIEZA SECCION DE AREAS-->
  		<section id="contenedor-areas">
  		<!--	
  			<article id="areas-agregar">

  				<h2 id="ir-seccion-areas">Agregar nueva área</h2>
				
				<div class="contenedor-formulario-areas">
					<form class="formulario-areas">
						
						<div class="nombre">
							<h3>Nombre de área</h3>
							<input type="text" name="" placeholder="Nombre de área">
						</div>
						
						<div class="submit">
							<input type="reset" name="" value="Borrar datos">
							<input type="submit" name="" value="Crear área">
						</div>
						
					</form>
				</div>

  			</article>


  			<article id="areas-editar-eliminar">

  				<h2>Editar/Eliminar área</h2>
  				
  				<div class="contenedor-formulario-areas">
					<form class="formulario-areas">
						
						<div class="dato-existente">
							<h3>Área existente</h3>
							<select>
								<option value="">Seleccione un área</option>
								<option>Área 1</option>
								<option>Área 2</option>
								<option>Área 3</option>
								<option>Área 4</option>
								<option>Área 5</option>
								<option>Área 6</option>
							</select>
						</div>
						

						<div class="nombre">
							<h3>Nuevo nombre de área <span>(solo edición)</span></h3>
							<input type="text" name="" placeholder="Nombre de área">
						</div>
						
						<div class="submit">
							<input type="submit" name="" value="Eliminar área">
							<input type="reset" name="" value="Borrar datos">
							<input type="submit" name="" value="Editar área">
						</div>

						

					</form>
				</div>

  			</article>

  		</section>


  		<nav id="contenedor-mini-nav">

  			<div id="btn-mini-nav">
  				<i class="fa-solid fa-arrow-right-arrow-left"></i>
  			</div>
  			
  			<div id="mini-nav">
  				<a href="#ir-seccion-novedades"><i class="fa-solid fa-newspaper"></i></a>
  				<a href="#ir-seccion-usuarios"><i class="fa-solid fa-user"></i></a>
  				<a href="#ir-seccion-areas"><i class="fa-solid fa-graduation-cap"></i></a>				
  			</div>		
  		</nav>
-->

  		<!-- Empieza seccion de redes sociales -->
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
  		<!-- Termina seccion de redes sociales -->
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


  	<!---->
  	<script src="js/animaciones.js"></script>

  	<!-- Script necesario para que funcione el menu -->
	<script src="js/menu.js"></script>
	
	<!-- Script necesario para que funcione el btn de volver arriba -->
	<script src="js/irArriba.js"></script>

	<!-- Script necesario para que funcione el btn de redes sociales -->
	<script src="js/redesSociales.js"></script>

	<!-- Script necesario para que funcione la pagina de Adminsitrador-->
	<script src="js/adminMenu.js"></script>
</body>
</html>