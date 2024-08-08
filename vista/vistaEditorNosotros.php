<!DOCTYPE html>
<html>	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleEditores34.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">

	<?php //<!-- Fuente usada para la introduccion sobre la imagen --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet"> 

	<?php //<!-- Fuente usada para los titulos --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

	<?php //<!-- Fuente usada para la descripcion --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title>Editor | Nosotros</title>
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
		<?php //<!-- Importante que el div tampoco aparezca cuando el usuario no está iniciado, ocupa espacio demás --> ?>
	    <div id="contenedor-sesion">
	    <?php //<!-- Esto se muestra en caso de que la sesion iniciada sea de Admin --> ?>
	    	<p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <a href="admin.php" id="modo-admin">Administrador</a></p>
		</div>
		<?php
		}elseif($_SESSION['perfil'] == 'moderador'){	
		?>	
		<div id="contenedor-sesion">	
	    	<?php //<!-- Esto se muestra en caso de que la sesion iniciada sea de Editor --> ?>
	    	<p><i class="fa-solid fa-user"></i><a href="logout.php" class="btn-cerrar-sesion">Cerrar sesión</a> | <span id="modo-editor">Moderador</span></p>

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
		   <?php // <!-- Termina el menu responsive --> ?>

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
	   <?php // <!-- Termina menu --> ?>
  	</header>
  	
  	<?php //<!-- Empieza contenido de la pagina --> ?>
  	<main>


  		<div id="contenedor-editor">
		 	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
  				
  				<!-- <div id="wrapper-container">	 -->
  				
				<div class="contenedor-titulos-cajas" id="seccion-imagenes">
					
  			
					<div class="wrapper-container2">
					
					<div id="grupo__nosotrosImagen1" class="contenedor-titulos-cajas">
						
						<h3 id="agregar-imagenes">Agregar imágenes<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>						
		  				
		  				<input type="file" name="imagengaleria[]" multiple="multiple" accept="image/png,image/jpeg">
		  				<div class="contenedor-informacion-agregarImagenes">
		  					<p class="textoInfo">Seleccione las imagenes que va a agregar</p>
		  				</div>
						<div class="btns-submit2">	
		  					<input class="submit cursorInactivo" type="submit" name="agregarimagenes" value="Agregar imágenes" disabled title="Cargue por lo menos una imagen para habilitar esta acción">
		  				</div>

		  				

		  							  			
					</div>
				</div>  		
				
				<h3>Imágenes actuales</h3>
  					<div id="contenedor-imagenes-actuales">
						<?php foreach($PonerImagen as $ColocarImagen){ 
							if($rowcount = 0){
							?>
  						
  						
						<div id="sin-imagen">
  							<p>No hay imágenes cargadas. 
							  <input type="file" name="imagengaleria[]" multiple="multiple" accept="image/png,image/jpeg">
		  				<div class="contenedor-informacion-agregarImagenes">
		  					<p class="textoInfo">Seleccione las imagenes que va a agregar</p>
		  				</div>
						<div class="btns-submit2">	
		  					<input class="submit cursorInactivo" type="submit" name="agregarimagenes" value="Agregar imágenes" disabled title="Cargue por lo menos una imagen para habilitar esta acción">
		  				</div>

  						</div>
							
						<?php }else{ ?>
							
  						<div class="imagen">
  							<p><?php echo $ColocarImagen['id'] ?></p>
							  <div class="contenedor-articulo__contenido__edicion">
							<a href="modelo/eliminarimagen.php?idimagen=<?php echo $ColocarImagen['id'] ?>" class="remove"><i class="fa-solid fa-trash-can"></i></a>
							</div>
  							<img src="<?php echo $ColocarImagen['imagen'] ?>">
  						</div>
  						<?php 	}
							}
						?>					
  					</div>	
				</div>		

			
			</form>

									

					
		


		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
							
					<div class="wrapper-container">
						
						<div class="contenedor-titulos-cajas grupo__nosotrosIntegrantes1" id="seccion-integrantes">
							<h3 class="integrante-titulo">Crear integrante</h3>

							<h3 id="nombreAgregarIntegrante">Nombre<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

							<input type="text" name="nombreint" placeholder="Juan Pereira" required minlength="2" maxlength="30">

							<div class="contenedor-informacion-agregarIntegrante">
								<p class="textoInfo">Mínimo 2 caracteres</p>
								<p class="cantCaracteres">0/30</p>
								<p class="textoLimite">.</p>
							</div>

							<h3 id="rolAgregarIntegrante">Rol<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

							<input type="text" name="cargoint" placeholder="Administración" required minlength="2" maxlength="25">

							<div class="contenedor-informacion-agregarRol">
								<p class="textoInfo">Mínimo 2 caracteres</p>
								<p class="cantCaracteres">0/25</p>
								<p class="textoLimite">.</p>
							</div>

							<h3 id="imagenAgregarIntegrante">Foto de perfil<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

							<input type="file" name="fotoint" accept="image/png,image/jpeg">

							<div class="contenedor-informacion-agregarImagen">
								<p class="textoInfo">Ninguna imagen fue cargada</p>
							</div>

							<input class="submit cursorInactivo" type="submit" name="crearintegrante" value="Crear integrante" disabled title="Complete el formulario para habilitar esta acción">

						</div>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
								
				<?php	
					$idInt = $_GET['idInt'];
					//echo "<input type='text' class='esconder' name='idNot' value='".$idInt."'>";
					if($idInt != 0){
						foreach($MostrarEditar as $ColocarCampo){
							if($idInt == $ColocarCampo['id']){	 	
				?>			
						<div class="contenedor-titulos-cajas grupo__nosotrosIntegrantes2">
							<h3 class="integrante-titulo">Editar/eliminar integrante</h3>

							<h3 id="idEditarIntegrante">ID integrante<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
							
							<select name="idint">
								<option value="<?php echo $ColocarCampo['id']?>"><?php echo "ID: ".$ColocarCampo['id']." || ".$ColocarCampo['nombreint']?></option>		
							</select>

							<div class="contenedor-informacion-editarID">
								<p class="textoInfo">Seleccione un integrante ya ingresado</p>
							</div>

							<h3 id="nombreEditarIntegrante">Nombre <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

							<input type="text" name="nombreintedit" value="<?php echo $ColocarCampo['nombreint']?>" placeholder="Juan Pereira" required minlength="2" maxlength="30">

							<div class="contenedor-informacion-editarNombre">
								<p class="textoInfo">Mínimo 2 caracteres</p>
								<p class="cantCaracteres">0/30</p>
								<p class="textoLimite">.</p>
							</div>
							
							<h3 id="rolEditarIntegrante">Rol <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

							<input type="text" name="cargointedit" value="<?php echo $ColocarCampo['cargoint']?>" placeholder="Equipo de Administración" required minlength="2" maxlength="25">

							<div class="contenedor-informacion-editarRol">
								<p class="textoInfo">Mínimo 2 caracteres</p>
								<p class="cantCaracteres">0/25</p>
								<p class="textoLimite">.</p>
							</div>
								
							<h3 id="imagenEditarIntegrante">Foto de perfil <span>(edición)</span><i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

							<input type="file" name="fotointedit" accept="image/png,image/jpeg">

							<div class="contenedor-informacion-editarImagen">
								<p class="textoInfo">Ninguna imagen fue cargada</p>
							</div>

							<div class="btns-submit">
								<input class="delete cursorInactivo" type="submit" name="eliminarintegrante" value="Eliminar" disabled title="Seleccione uno de los integrantes para habilitar esta acción">

			  					<input class="submit cursorInactivo" type="submit" name="editarintegrante" value="Editar integrante" disabled title="Complete el formulario para habilitar esta acción">
			  				</div>
						</div>	
				<?php //}else{ 
					//echo "<script>window.alert('No puede editar integrantes que no existen');window.location='editor-nosotros.php#seccion-integrantes';</script>";
			
				
						}
					}	 
				?>
						</div>
						<?php  
							}else{
						?>

						<div class="contenedor-titulos-cajas grupo__nosotrosIntegrantes2">
							<h3 class="integrante-titulo">Editar/eliminar integrante</h3>

							<h3 id="idEditarIntegrante">ID integrante<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

							<select name="idint" required>
								<option value="">Seleccione un integrante</option>
								<?php foreach($PonerIntegrantes as $ColocarIntegrante){ ?>
								<option value="<?php echo $ColocarIntegrante['id']?>"><?php echo "ID: ".$ColocarIntegrante['id']." || ".$ColocarIntegrante['nombreint']?></option>
								<?php } ?>
							</select>

							<div class="contenedor-informacion-editarID">
								<p class="textoInfo">Seleccione un integrante ya ingresado</p>
							</div>
									
							<h3 id="nombreEditarIntegrante">Nombre <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

							<input type="text" name="nombreintedit" placeholder="Juan Pereira" required minlength="2" maxlength="30">

							<div class="contenedor-informacion-editarNombre">
								<p class="textoInfo">Mínimo 2 caracteres</p>
								<p class="cantCaracteres">0/30</p>
								<p class="textoLimite">.</p>
							</div>

							<h3 id="rolEditarIntegrante">Rol <span>(edición)</span><i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

							<input type="text" name="cargointedit" placeholder="Equipo de Administración" required minlength="2" maxlength="25">

							<div class="contenedor-informacion-editarRol">
								<p class="textoInfo">Mínimo 2 caracteres</p>
								<p class="cantCaracteres">0/25</p>
								<p class="textoLimite">.</p>
							</div>
								
							<h3 id="imagenEditarIntegrante">Foto de perfil <span>(edición)</span><i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

							<input type="file" name="fotointedit" accept="image/png,image/jpeg">

							<div class="contenedor-informacion-editarImagen">
								<p class="textoInfo">Ninguna imagen fue cargada</p>
							</div>
										
							<div class="btns-submit">
								<input class="delete cursorInactivo" type="submit" name="eliminarintegrante" value="Eliminar integrante" disabled title="Seleccione uno de los integrantes para habilitar esta acción">
			  					<input class="submit cursorInactivo" type="submit" name="editarintegrante" value="Editar integrante" disabled title="Complete el formulario para habilitar esta acción">
			  				</div>

						</div>
						<?php } ?>			
		</form>				
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

	<script src="js/validaciones.js"></script>
	<script src="js/animacionesEditores.js"></script>
	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>
</body>
</html>