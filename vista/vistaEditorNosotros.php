<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleEditores.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">
 
	<?php //<!-- Usado para el editor, por cada cantidad de editores, es la cantidad de veces que usamos el script --> ?>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>
	<script type="text/javascript" src="js/ckeditor.js"></script>

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
        	//session_start();
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
						<h3>Imágenes actuales</h3>
	  					
	  					<div id="contenedor-imagenes-actuales">
							<?php foreach($PonerImagen as $ColocarImagen){ 
								if($rowcount = 0){
								?>
	  						<?php //<!--Esto aparece en caso de que no haya imágenes cargadas--> ?>
	  						
							<div id="sin-imagen">
	  							<p>No hay imágenes cargadas. 
	  								<a href="#agregar-imagenes">Subir imagen</a>
	  							</p>
								<input type="button" value="aa">
	  						</div>
								
							<?php }else{ ?>

	  						<div class="imagen">
	  							<p><?php echo $ColocarImagen['id'] ?></p>
	  							<img src="<?php echo $ColocarImagen['imagen'] ?>">
	  						</div>
	  						<?php 	}
								}
							?>					
	  					</div>
					</div>	

					<div class="wrapper-container">
						
						<div class="contenedor-titulos-cajas">
							<h3 id="agregar-imagenes">Agregar imágenes</h3>						
			  				<input type="file" name="imagen1" id="subir-nueva-imagen">
			  				<input type="file" name="imagen2">
			  				<input type="file" name="imagen3">
			  				<input type="file" name="imagen4">
			  				<input type="file" name="imagen5">

			  				<div class="btns-submit">
			  					<input type="reset" name="" value="Cancelar">
			  					<input type="submit" name="agregarimagenes" value="Agregar seleccionadas">
			  				</div>			  			
						</div>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">						
						<div class="contenedor-titulos-cajas">
							<h3>Eliminar imágenes</h3>						
			  				<select name="idimagen1">
			  					<option value="">Seleccione una imagen</option>
								  <?php foreach($PonerImagen as $ColocarImagenCombo1){ ?>
			  					<option value="<?php echo $ColocarImagenCombo1['id']?>"><?php echo $ColocarImagenCombo1['id']?></option>
								<?php } ?>	
			  				</select>

			  				<select name="idimagen2">
			  					<option value="">Seleccione una imagen</option>
								  <?php foreach($PonerImagen as $ColocarImagenCombo2){ ?>
			  					<option value="<?php echo $ColocarImagenCombo2['id']?>"><?php echo $ColocarImagenCombo2['id']?></option>
								<?php } ?>	
			  				</select>

			  				<select name="idimagen3">
			  					<option value="">Seleccione una imagen</option>
								  <?php foreach($PonerImagen as $ColocarImagenCombo3){ ?>
			  					<option value="<?php echo $ColocarImagenCombo3['id']?>"><?php echo $ColocarImagenCombo3['id']?></option>
								<?php } ?>	
			  				</select>

			  				<select name="idimagen4">
			  					<option value="">Seleccione una imagen</option>
								  <?php foreach($PonerImagen as $ColocarImagenCombo4){ ?>
			  					<option value="<?php echo $ColocarImagenCombo4['id']?>"><?php echo $ColocarImagenCombo4['id']?></option>
								<?php } ?>	
			  				</select>

			  				<select name="idimagen5">
			  					<option value="">Seleccione una imagen</option>
								  <?php foreach($PonerImagen as $ColocarImagenCombo5){ ?>
			  					<option value="<?php echo $ColocarImagenCombo5['id']?>"><?php echo $ColocarImagenCombo5['id']?></option>
								<?php } ?>	
			  				</select>

			  				<div class="btns-submit">
			  					<input type="reset" name="" value="Cancelar">
			  					<input type="submit" name="eliminarintegrantes" value="Eliminar seleccionadas">
			  				</div>			  				
						</div>
		</form>
					</div>  
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
							
					<div class="wrapper-container">
						
						<div class="contenedor-titulos-cajas" id="seccion-integrantes">
							<h3 class="integrante-titulo">Crear integrante</h3>

							<h3>Nombre</h3>
							<input type="text" name="nombreint" placeholder="Ingrese un Nombre" required="yes">

							<h3>Rol</h3>
							<input type="text" name="cargoint" placeholder="Ingrese un Rol" required="yes">

							<h3>Foto de perfil</h3>
							<input type="file" name="fotoint" required="yes">

							<input type="submit" name="crearintegrante" value="Crear integrante">

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
						<div class="contenedor-titulos-cajas">
							<h3 class="integrante-titulo">Editar/eliminar integrante</h3>
							<h3>ID integrante</h3>
							
							<select name="idint">
								<option value="<?php echo $ColocarCampo['id']?>"><?php echo "ID: ".$ColocarCampo['id']." || ".$ColocarCampo['nombreint']?></option>		
							</select>

							<h3>Nombre</h3>
							<input type="text" name="nombreintedit" value="<?php echo $ColocarCampo['nombreint']?>" placeholder="Ingrese Nombre">	
							
							<h3>Rol</h3>
							<input type="text" name="cargointedit" value="<?php echo $ColocarCampo['cargoint']?>" placeholder="Ingrese Rol">
								
							<h3>Foto de perfil</h3>
							<input type="file" name="fotointedit">

							<div class="btns-submit">
								<input type="submit" name="eliminarintegrante" value="Eliminar">
			  					<input type="reset" name="" value="Cancelar">
			  					<input type="submit" name="editarintegrante" value="Editar integrante">
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
						<div class="contenedor-titulos-cajas">
							<h3 class="integrante-titulo">Editar/eliminar integrante</h3>
							<h3>ID integrante</h3>
							<select name="idint" required="yes">
								<option value="">Seleccione un integrante</option>
								<?php foreach($PonerIntegrantes as $ColocarIntegrante){ ?>
								<option value="<?php echo $ColocarIntegrante['id']?>"><?php echo "ID: ".$ColocarIntegrante['id']." || ".$ColocarIntegrante['nombreint']?></option>
								<?php } ?>
							</select>
									
							<h3>Nombre</h3>
							<input type="text" name="nombreintedit" placeholder="Ingrese Nombre">

							<h3>Rol</h3>
							<input type="text" name="cargointedit" placeholder="Ingrese Rol">
								
							<h3>Foto de perfil</h3>
							<input type="file" name="fotointedit">
										
							<div class="btns-submit">
								<input type="submit" name="eliminarintegrante" value="Eliminar">
			  					<input type="reset" name="" value="Cancelar">
			  					<input type="submit" name="editarintegrante" value="Editar integrante">
			  				</div>

						</div>
						<?php } ?>			
		</form>				
					</div>
	  				
					

  				<?php //<!--Dependiendo de si se va a editar o no el articulo--> ?>
  				<!-- <input type="submit" name="" value="Editar artículo"> -->

  			
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


	<script src="js/animacionesEditores.js"></script>

	<script src="js/animaciones.js"></script>

  	<?php //<!-- Script necesario para que funcione el menu --> ?>
	<script src="js/menu.js"></script>
	
	<?php //<!-- Script necesario para que funcione el btn de volver arriba --> ?>
	<script src="js/irArriba.js"></script>

	<?php //<!-- Script necesario para que funcione el btn de redes sociales --> ?>
	<script src="js/redesSociales.js"></script>
</body>
</html>