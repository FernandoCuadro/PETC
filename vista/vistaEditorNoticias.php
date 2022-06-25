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
	<script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click","#td-menos",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
		</script>
	<title>Editor | Novedades</title>
</head>
<body>
	<a href="javascript:void(0);" id="scroll" title="Volver arriba">Top<span></span></a>

	<div id="contenedor-carga">
  			
		<div class="spinner"></div>
			
  	</div>
	<header>

		<img id="img-header" src="img/banner.png">
		<?php
        	if($_SESSION['perfil'] == 'administrador'){
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


  		<div id="contenedor-editor">
		  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
		  <?php
			/*Mostramos el id obtenido en un input para poder usarlo luego*/
				$idNot = $_GET['idNot'];    	
				echo "<input type='text' class='esconder' name='idNot' value='".$idNot."'>";	
			?>
			<?php
			 		/*Si el id obtenido es distinto a 0, entonces
						se trata de una actualización/modificación 
						a un articulo ya existente*/
				if($idNot != 0){
			?>
			<?php
				foreach($datosMostrarDatos as $MostrarNoticia){						
			?>  				
  				<div class="wrapper-container">	
  		
					<div class="contenedor-titulos-cajas">
						<h3>Título</h3>
	  					<input type="text" name="titulo" placeholder="Ingrese un titulo" value="<?php echo $MostrarNoticia['titulo']; ?>" required="yes">
					</div>	  				
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Área</h3>
		  				<select name="area">
						  <option value="<?php echo $MostrarNoticia['id_area']; ?>"><?php echo $MostrarNoticia['area']; ?></option>
										<?php
										foreach($datosArea as $datoArea){
										?>
											<option value="<?php echo $datoArea['id']; ?>"><?php echo $datoArea['area']; ?></option>
										<?php }	?>					
		  				</select>
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Descripción</h3>
						<textarea placeholder="Ingrese una descripción breve para la noticia" maxlength="500" minlength="20" name="descripcion" required="yes"><?php echo $MostrarNoticia['descripcion']; ?></textarea>
						<!-- <div id="editor1"> -->
		  				
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Miniatura</h3>
	  					<input type="file" name="miniatura">
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Contenido 1</h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido1" required="yes"><?php echo $MostrarNoticia['contenido1'];?></textarea>  
	  					</div>
					</div>
	  				

					<div class="contenedor-titulos-cajas">
						<h3>Imagen 1</h3>
	  					<input type="file" name="archivo1">
					</div>  				
	  				

					<div class="contenedor-titulos-cajas">
						<h3>Contenido 2</h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"><?php echo $MostrarNoticia['contenido2']; ?></textarea>  

	  					
					</div>
	  				

	  			
					<div class="contenedor-titulos-cajas">
						<h3>Imagen 2</h3>
	  					<input type="file" name="archivo2">
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Contenido 3</h3>
		  				<div id="editor4">

		  				</div>
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Imagen 3</h3>
	  					<input type="file" name="archivo3">
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Contenido 4</h3>
	  					
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Imagen 4</h3>
						<input type="file" name="archivo 4">
					</div>
					
					<div class="contenedor-titulos-cajas">
						<h3>Contenido 5</h3>
	  					
					</div>
					
					<div class="contenedor-titulos-cajas">
						<h3>Imagen 5</h3>
						<input type="file" name="archivo 5">
					</div>
					
					<div class="contenedor-titulos-cajas">
						<h3>Fecha</h3>
						<input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i', strtotime($MostrarNoticia['fecha'])); ?>"required=yes>
					</div>

					<div class="contenedor-titulos-cajas">
		  				<h2>Enlace</h2>
		  				<input type="text" name="url" autofocus="yes" placeholder="Puede ingresar una URL" value="<?php echo $MostrarNoticia['enlace']; ?>">
		  			</div> 
					
					<div class="contenedor-titulos-cajas">
		  				<h2>Estado</h2>
		  				<select name="estado">
							<option value="<?php echo $MostrarNoticia['estado']; ?>"><?php echo $MostrarNoticia['estado']; ?></option>
							<option value="activo">Activo</option>
							<option value="inactivo">Inactivo</option>
						</select>
		  			</div>
					
					<div class="contenedor-titulos-cajas">
						<h3>Etiquetas</h3>
						<?php }
						  foreach($PonerEtiqueta as $ColocarEtiqueta){ 
						 ?>
						 <input type="text" name="a" value = "<?php echo $ColocarEtiqueta['id']?>">
	  					<input type="text" name="nombreEtiqueta" placeholder="Ingrese un etiqueta" value="<?php echo $ColocarEtiqueta['nombre']?>">
						  <select name="estadoEtiqueta">
							<option value="<?php echo $ColocarEtiqueta['estado']; ?>"><?php echo $ColocarEtiqueta['estado']; ?></option>
							<option value="activo">Activo</option>
							<option value="inactivo">Inactivo</option>
						</select>
						<?php } ?>
					</div>	  				  
					<input type="submit" name="editarNoticias" value="Editar artículo">				
				</div>
				<?php 
					}else{ 
				?>		
				<div class="wrapper-container">
					<div class="contenedor-titulos-cajas">
						<h3>Título</h3>
	  					<input type="text" name="titulo" placeholder="Ingrese un titulo" required="yes">
					</div>	  			
				
				<div class="contenedor-titulos-cajas">
						<h3>Área</h3>
						<select name="area">
										<?php
										foreach($datosArea as $datoArea){
										?>
											<option value="<?php echo $datoArea['id']; ?>"><?php echo $datoArea['area']; ?></option>
										<?php }	?>										
		  				</select>
				</div>	
				
				<div class="contenedor-titulos-cajas">
						<h3>Descripción</h3>
						<textarea placeholder="Ingrese una descripción breve para la noticia" maxlength="500" minlength="20" name="descripcion" required="yes"></textarea>
						<!-- <div id="editor1"> -->
		  				</div>
				</div>

				<div class="contenedor-titulos-cajas">
						<h3>Miniatura</h3>
	  					<input type="file" name="miniatura">
				</div>
	  				
				<div class="contenedor-titulos-cajas">
						<h3>Contenido 1</h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido1" required="yes"></textarea>  
	  			</div>
				
					
				<div class="contenedor-titulos-cajas">
						<h3>Imagen 1</h3>
	  					<input type="file" name="archivo1">
				</div>  				
	  				

				<div class="contenedor-titulos-cajas">
						<h3>Contenido 2</h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"></textarea>  
				</div>

				<div class="contenedor-titulos-cajas">
						<h3>Imagen 2</h3>
	  					<input type="file" name="archivo2">
				</div>
	  				
				<div class="contenedor-titulos-cajas">
						<h3>Contenido 3</h3>
		  				
				</div>
	  				
				<div class="contenedor-titulos-cajas">
						<h3>Imagen 3</h3>
	  					<input type="file" name="archivo3">
				</div>
	  				
				<div class="contenedor-titulos-cajas">
						<h3>Contenido 4</h3>		
				</div>
	  				
				<div class="contenedor-titulos-cajas">
						<h3>Imagen 4</h3>
						<input type="file" name="archivo 4">
				</div>
					
				<div class="contenedor-titulos-cajas">
						<h3>Contenido 5</h3>	  
				</div>
					
				<div class="contenedor-titulos-cajas">
						<h3>Imagen 5</h3>
						<input type="file" name="archivo 5">
				</div>
					
				<div class="contenedor-titulos-cajas">
						<h3>Fecha</h3>
						<input type="datetime-local" name="fecha" required=yes>
				</div>

				<div class="contenedor-titulos-cajas">
		  			<h2>Enlace</h2>
		  			<input type="text" name="url" autofocus="yes" placeholder="Puede ingresar una URL">
		  		</div> 
				
				<div class="contenedor-titulos-cajas">
		  				<h2>Estado</h2>
		  				<select name="estado">
							<option value="activo">Activo</option>
							<option value="inactivo">Inactivo</option>
						</select>
		  		</div>  

					<div class="contenedor-titulos-cajas">

						<h3>Etiquetas</h3>

						<table class="table bg-info"  id="tabla">
							<tr class="fila-fija">
								<td id="td-etiqueta"><input type="text" name="nombreEtiqueta[]" placeholder="Ingrese una etiqueta"></td>

								<td id="td-estado">
									<select name="estadoEtiqueta[]">
										<option>Activo</option>
										<option>Inactivo</option>
									</select>
								</td>
								<td id="td-menos"><input type="button" value="Menos"></td>
							</tr>
						</table>
						<button id="adicional" name="adicional" type="button" class="btn btn-warning">Más +</button>
					</div>
					
					<input type="submit" name="agregarNoticias" value="Agregar artículo">						
				
				</div>
				
				<?php } ?>				

  			</form>
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