<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/styleAdmin13.css">
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
  							<a href="modelo/activoNoticias.php?idAcNot=<?php echo $PonerNovedad['id'] ?>"><i class="fa-solid fa-eye"></i></a>
  							<a href="modelo/inactivoNoticias.php?idInNot=<?php echo $PonerNovedad['id'] ?>"><i class="fa-solid fa-eye-slash"></i></a>
  							<a href="editor-noticias.php?idNot=<?php echo $PonerNovedad['id'] ?>"><i class="fa-solid fa-pen"></i></a>
  							<a href="modelo/eliminarnoticia.php?idNotEli=<?php echo $PonerNovedad['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
  						</div>
  						
  					</div>

  				</article>
				  <?php } ?>

  			</div>

  		</section>
		  <h2 id="ir-seccion-auditoria">Auditorias</h2> 
		<center>
		<div id="tablascroll">
		  <table id="auditoriatabla">
				<tr> <th>Cedula</th> <th>Nombre</th> <th>Antecedente</th>
				<th>Fecha</th> 
				</tr>
				<?php foreach($obtenerauditoria as $Ponerauditoria){ ?>
				<tr> 
					<td><?php echo $Ponerauditoria['ciusuario']; ?></td> 
					<td><?php echo $Ponerauditoria['nombreusuario']; ?></td> 
					<td><?php echo $Ponerauditoria['antecedente'] ?></td>
					<td><?php echo $Ponerauditoria['fecha']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>						  
		</center>
  		<!--EMPIEZA SECCION DE USUARIOS-->
  		<section id="contenedor-usuarios">
		  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
  			<article id="usuarios-agregar">

  				<h2 id="ir-seccion-usuarios">Agregar nuevo usuario</h2>
				
				<div class="contenedor-formulario-usuarios formularioUsuariosAgregar">
					<form class="formulario-usuarios">
						
						<div class="nombre">
							<h3>Nombre<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<input type="text" name="nombreUsuario" minlength="2" maxlength="30" placeholder="Gimena Ramirez" title="Ingrese un nombre" required>

							<div class="contenedor-informacion-nombre">
								<p class="textoInfo">Mínimo 2 caracteres</p>
								<p class="cantCaracteres">0/30</p>
								<p class="textoLimite">.</p>
							</div>
						</div>
						
						<div class="cedula">
							<h3>Cédula<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<input type="text" name="ciUsuario" minlength="8" maxlength="8" placeholder="12345678" title="Ingrese una cédula" required>	

							<div class="contenedor-informacion-cedula">
								<p class="textoInfo">Ingrese una cédula válida</p>
							</div>
						</div>

						<div class="contraseña">
							<h3>Contraseña<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<input type="password" name="contraUsuario" minlength="8" maxlength="120" placeholder="Gime25!#" title="Ingrese una contraseña" required>
							<i class="passwordIcon fa-solid fa-eye" title="Ver contraseña"></i>

							<div class="contenedor-informacion-contra">
								<p class="textoInfo">Mínimo 8 caracteres, debe incluir mayúsculas, minúsculas, números y símbolos. Tildes no admitidos</p>
								<p class="cantCaracteres">0/120</p>
								<p class="textoLimite">.</p>
							</div>
						</div>	

						<div class="contraseñaRep">
							<h3>Repetir contraseña<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<input type="password" name="contraUsuarioRep" minlength="8" maxlength="120" placeholder="Gime25!#" title="Ingrese una contraseña" required>
							<i class="passwordIconRep fa-solid fa-eye" title="Ver contraseña"></i>

							<div class="contenedor-informacion-contraRep">
								<p class="textoInfo">Mínimo 8 caracteres, debe incluir mayúsculas, minúsculas, números y símbolos. Tildes no admitidos</p>
								<p class="cantCaracteres">0/120</p>
								<p class="textoLimite">.</p>
							</div>
						</div>

						<div class="rol">
							<h3>Rol<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<select name="rolUsuario" title="Seleccione un rol" required>
								<option value="">Seleccione rol</option>
								<option value="administrador">Administrador</option>
								<option value="moderador">Moderador</option>
							</select>

							<div class="contenedor-informacion-rol">
								<p class="textoInfo">Seleccione un rol</p>
							</div>
						</div>

						<div class="btns-submit">
	
							<input class="submit cursorInactivo" type="submit" name="crearUsuario" value="Crear usuario" title="Complete el formulario para habilitar esta acción" disabled>

						</div>
						
					</form>
				</div>

  			</article>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">					  
  			<article id="usuarios-editar-eliminar">

  				<h2>Editar/Eliminar usuario</h2>
  				
  				<div class="contenedor-formulario-usuarios formularioUsuariosEditar">
					<form class="formulario-usuarios">
						
						<div class="dato-existente">
							<h3>Usuario existente<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<select name="seleccionarCIUsuario" title="Seleccione un usuario" required>
								<option value="">Seleccione un usuario</option>
								<?php foreach($obtenerUsuarios as $PonerUsuario){ ?>
								<option value="<?php echo $PonerUsuario['ci'] ?>"><?php echo $PonerUsuario['nombre'] ?></option>
								<?php } ?>
							</select>

							<div class="contenedor-informacion-seleccionarCI">
								<p class="textoInfo">Seleccione un usuario ya ingresado</p>
							</div>

						</div>
						

						<div class="nombre">
							<h3>Nuevo nombre <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<input type="text" name="nombreUsuarioEditar" placeholder="Nombre" minlength="2" maxlength="30" title="Ingrese un nombre" required>

							<div class="contenedor-informacion-nombre">
								<p class="textoInfo">Mínimo 2 caracteres</p>
								<p class="cantCaracteres">0/30</p>
								<p class="textoLimite">.</p>
							</div>
						</div>
						
						<div class="contraseña">
							<h3>Contraseña <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<input type="password" name="contUsuario" minlength="8" maxlength="120" placeholder="Gime25!#" title="Ingrese una contraseña" required>
							<i class="passwordIcon fa-solid fa-eye" title="Ver contraseña"></i>

							<div class="contenedor-informacion-contra">
								<p class="textoInfo">Mínimo 8 caracteres, debe incluir mayúsculas, minúsculas, números y símbolos. Tildes no admitidos</p>
								<p class="cantCaracteres">0/120</p>
								<p class="textoLimite">.</p>
							</div>
						</div>
						<div class="contraseñaRep">
							<h3>Repetir Contraseña <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<input type="password" name="contUsuarioRep" minlength="8" maxlength="120" placeholder="Gime25!#" title="Ingrese una contraseña" required>
							<i class="passwordIconRep fa-solid fa-eye" title="Ver contraseña"></i>

							<div class="contenedor-informacion-contraRep">
								<p class="textoInfo">Mínimo 8 caracteres, debe incluir mayúsculas, minúsculas, números y símbolos. Tildes no admitidos</p>
								<p class="cantCaracteres">0/120</p>
								<p class="textoLimite">.</p>
							</div>
						</div>

						<div class="rol">
							<h3>Rol <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							<select name="rolUsuarioEditar" title="Seleccione un rol" required>
								<option value="">Seleccione rol</option>
								<option value="administrador">Administrador</option>
								<option value="moderador">Moderador</option>
							</select>
							<div class="contenedor-informacion-rol">
								<p class="textoInfo">Seleccione un rol</p>
							</div>
						</div>

						<div class="btns-submit">

							<input class="delete cursorInactivo" type="submit" name="eliminarusuario" value="Eliminar usuario" title="Seleccione un usuario para habilitar esta acción" disabled>

							<input class="submit cursorInactivo" type="submit" name="editarusuario" value="Editar usuario" title="Complete el formulario para habilitar esta acción" disabled>

						</div>
						
						

					</form>
				</div>

  			</article>
		</form>							
  		</section>

  		<!--Seccion para Eliminar todos los articulos de novedades -->
  		<section class="eliminarContenido">

  			<h2>Eliminar contenido <i class="fa-solid fa-angle-right"></i></h2>

  			<p>Los cambios realizados no se podrán deshacer</p>


  			<div class="paginaNovedades">

	  			<!--Eliminar Novedades-->
	  			<article>
	  				<div class="btnEliminar-definitivo">
	  					<a href="modelo/eliminartodasNot.php"><i class="fa-solid fa-trash"></i> Eliminar todas las novedades</a>
	  				</div>
	  			</article>

	  		</div>

  		</section>


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
  	<script src="js/adminMenu.js"></script>
  	<script src="js/validaciones.js"></script>
  	<script src="js/validacionesAdminExtra.js"></script>
  	<script src="js/abrirSeccionAdmin.js"></script>
  	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>
</body>
</html>