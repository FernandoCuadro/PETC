<?php date_default_timezone_set("America/Montevideo");?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png">
<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href="css/styleEditores2.css">
=======
	<link rel="stylesheet" type="text/css" href="css/styleEditores34.css">
>>>>>>> b958538 (Hasta Cursos arreglado)
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">

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
<<<<<<< HEAD
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
=======
	<script type="text/javascript" src="js/EtiAgrNot"></script>
	<script type="text/javascript" src="js/EnlAgrNot"></script>

<?php
	if(!empty($_GET['idNot'])){
		foreach($datosMostrarDatos as $MostrarNoticiaTitle){						
?>  	
	<title><?php echo $MostrarNoticiaTitle['titulo'] ?></title>
<?php 
	}	
	}else{	
?>	
>>>>>>> b958538 (Hasta Cursos arreglado)
	<title>Editor | Novedades</title>
<?php } ?>		
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
		  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post" id="formulario">
		  <?php
			/*Mostramos el id obtenido en un input para poder usarlo luego*/
				$idNot = $_GET['idNot'];
				 	
				//echo "<input type='text' class='esconder' name='idNot' value='".$idNot."'>";	
				echo "<input type='hidden' name='idNot' value='".$idNot."'>";
				//echo $idNot;

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
					<div class="contenedor-titulos-cajas grupo__titulo">
						<h3>Título<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

	  					<input type="text" name="titulo" maxlength="100" minlength="5" placeholder="Ingrese un titulo" value="<?php echo $MostrarNoticia['titulo']; ?>" required>

	  					<div class="contenedor-informacion">
		  					<p class="textoInfo">Mínimo 5 caracteres</p>
		  					<p class="cantCaracteres">0/100</p>
		  					<p class="textoLimite">.</p>
	  					</div>

					</div>	  				
	  				
<<<<<<< HEAD
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
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Imagen 1</h3>
	  					<input type="file" name="archivo1">
					</div>  				
	  				

					<div class="contenedor-titulos-cajas">
						<h3>Contenido 2</h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"><?php echo $MostrarNoticia['contenido2']; ?></textarea>  			
=======
					<div class="contenedor-titulos-cajas grupo__area">
						<h3>Área<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

		  				<select name="area" required>
						  <option value="<?php echo $MostrarNoticia['id_area']; ?>"><?php echo $MostrarNoticia['area']; ?></option>
								<?php
								foreach($datosArea as $datoArea){
								?>
									<option value="<?php echo $datoArea['id']; ?>"><?php echo $datoArea['area']; ?></option>
								<?php }	?>					
		  				</select>

		  				<div class="contenedor-informacion">
			  				<p class="textoInfo">Seleccione un área para la novedad</p>
			  			</div>

					</div>
	  				
					<div class="contenedor-titulos-cajas grupo__descripcion">
						<h3>Descripción<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
						<textarea placeholder="Ingrese una descripción breve para la noticia" maxlength="490" minlength="20" name="descripcion" required=yes><?php echo $MostrarNoticia['descripcion']; ?></textarea>
						<!-- <div id="editor1"> -->	

						<div class="contenedor-informacion">
		  					<p class="textoInfo">Mínimo 20 caracteres</p>
		  					<p class="cantCaracteres">0/490</p>
		  					<p class="textoLimite">.</p>	  					
	  					</div>
									
					</div>
	  				
					<div class="contenedor-titulos-cajas grupo__miniatura">
						<h3>Miniatura<i class="fa-solid fa-triangle-exclamation advertencia"></i></h3>
	  					<input type="file" name="miniatura" id="inputMiniatura">

	  					<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>

					</div>
	  				
					<div class="contenedor-titulos-cajas grupo__contenido1">
						<h3>Contenido 1<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido1" required><?php echo $MostrarNoticia['contenido1'];?></textarea>

						<div class="contenedor-informacion">
							<p class="textoInfo">Mínimo 100 caracteres</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p>	
		  				</div>

	  				</div>
	  				
					<div class="contenedor-titulos-cajas grupo__imagen1">
						<h3>Imagen 1<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

	  					<input type="file" name="archivo1" id="inputImagen1">

	  					<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>

					</div>  				
	  				

					<div class="contenedor-titulos-cajas grupo__contenido2">
						<h3>Contenido 2<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"><?php echo $MostrarNoticia['contenido2']; ?></textarea>

						<div class="contenedor-informacion">
							<p class="textoInfo">Este campo está vacío</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p> 
		  				</div>

>>>>>>> b958538 (Hasta Cursos arreglado)
					</div>
	  				

	  			
					<div class="contenedor-titulos-cajas grupo__imagen2">
						<h3>Imagen 2<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

	  					<input type="file" name="archivo2" id="inputImagen2">

	  					<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
					</div>
	  				
<<<<<<< HEAD
					<div class="contenedor-titulos-cajas">
						<h3>Contenido 3</h3>
		  				<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"><?php echo $MostrarNoticia['contenido2']; ?></textarea>
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Imagen 3</h3>
	  					<input type="file" name="archivo3">
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Contenido 4</h3>
	  					<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"><?php echo $MostrarNoticia['contenido2']; ?></textarea>
					</div>
	  				
					<div class="contenedor-titulos-cajas">
						<h3>Imagen 4</h3>
						<input type="file" name="archivo 4">
					</div>
					
					<div class="contenedor-titulos-cajas">
						<h3>Contenido 5</h3>
	  					<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"><?php echo $MostrarNoticia['contenido2']; ?></textarea>
					</div>
					
					<div class="contenedor-titulos-cajas">
						<h3>Imagen 5</h3>
						<input type="file" name="archivo 5">
					</div>
					
					<div class="contenedor-titulos-cajas">
						<h3>Fecha</h3>
						<input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i', strtotime($MostrarNoticia['fecha'])); ?>"required=yes>
					</div>
=======
					<div class="contenedor-titulos-cajas grupo__contenido3">
						<h3>Contenido 3<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

		  				<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido3"><?php echo $MostrarNoticia['contenido3']; ?></textarea>

		  				<div class="contenedor-informacion">
			  				<p class="textoInfo">Este campo está vacío</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p> 
		  				</div>

					</div>
	  				
					<div class="contenedor-titulos-cajas grupo__imagen3">
						<h3>Imagen 3<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

	  					<input type="file" name="archivo3" id="inputImagen3">

	  					<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
					</div>
	  				
					<div class="contenedor-titulos-cajas grupo__contenido4">
						<h3>Contenido 4<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

	  					<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido4"><?php echo $MostrarNoticia['contenido4']; ?></textarea>

	  					<div class="contenedor-informacion">
							<p class="textoInfo">Este campo está vacío</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p> 	
		  				</div>
					</div>
	  				
					<div class="contenedor-titulos-cajas grupo__imagen4">
						<h3>Imagen 4<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
>>>>>>> b958538 (Hasta Cursos arreglado)

						<input type="file" name="archivo4" id="inputImagen4">

						<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
					</div>
					
					<div class="contenedor-titulos-cajas grupo__contenido5">
						<h3>Contenido 5<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

	  					<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido5"><?php echo $MostrarNoticia['contenido5']; ?></textarea>

	  					<div class="contenedor-informacion">
							<p class="textoInfo">Este campo está vacío</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p>  
		  				</div>
					</div>
					
					<div class="contenedor-titulos-cajas grupo__imagen5">
						<h3>Imagen 5<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>

						<input type="file" name="archivo5" id="inputImagen5">

						<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
					</div>
					
					<div class="contenedor-titulos-cajas grupo__fecha">
						<h3 id="CrearFecha">Fecha<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

						<input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i', strtotime($MostrarNoticia['fecha'])); ?>"required=yes>

						<div class="contenedor-informacion">
							<p class="textoInfo">Debe confirmar la fecha y hora de publicación</p>
						</div>
					</div>
					
					<div class="contenedor-titulos-cajas grupo__estado">
		  				<h3>Estado<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>

		  				<select name="estado" required>
							<option value="<?php echo $MostrarNoticia['estado']; ?>"><?php echo $MostrarNoticia['estado']; ?></option>
							<option value="activo">Activo</option>
							<option value="inactivo">Inactivo</option>
						</select>

						<div class="contenedor-informacion">
							<p class="textoInfo">Se debe seleccionar un estado para la novedad</p>
						</div>

		  			</div>
					
					  <div class="contenedor-titulos-cajas">
					  <h3> Agregar enlaces<i class="fa-solid fa-triangle-exclamation advertencia" title="Campos vacíos"></i></h3>
					<p class="textoInfo">Los enlaces deben empezar con https://</p>
					  <table class="tabla1"  id="tabla1">
							<tr class="fila-fija1">
								<td id="td-enlace"><input type="text" name="urlagr[]" placeholder="Ingrese un enlace"></td>
								<td id="td-menosEnl" name="botonMenos"><input type="button" value="Menos"></td>
								
							</tr>
						</table>					
						<button id="adicionalEnl" name="adicional" type="button" class="btn btn-warning">Más +</button>
						
		  			</div> 	
					  
					<div class="contenedor-titulos-cajas grupo__enlaces">
					<h3> Editar enlaces<i class="fa-solid fa-triangle-exclamation advertencia" title="Campos vacíos"></i></h3>
					<p class="textoInfo">Los enlaces deben empezar con https://</p>
						<?php foreach($PonerEnlaces as $ColocarEnlace){ 
							if($ColocarEnlace['nombre'] != ''){
							?>
						<input type="text" name="idurl[]" class="esconder" value = "<?php echo $ColocarEnlace['id']?>">				
		  				<input type="text" name="url[]" placeholder="https://ejemplo-enlace.com" value="<?php echo $ColocarEnlace['nombre']; ?>">
								
							<?php }else{ ?>	
					 	<div class="contenedor-informacion">
							<p class="textoInfo">Ningún enlace fue colocado</p>
						</div>
						<?php 
						}
						}
						?>	
		  			</div>					
					  
					  <?php } ?>

					<div class="contenedor-titulos-cajas">
<<<<<<< HEAD
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

					</div>	
					<input type="submit" name="" value="Eliminar">
					<input type="reset" value="aaaa">  				  
					<input type="submit" name="editarNoticias" value="Editar artículo">				
				</div>
=======

					<h3> Agregar etiquetas<i class="fa-solid fa-triangle-exclamation advertencia" title="Campos vacíos"></i></h3>

						<table class="table bg-info"  id="tabla">
							<tr class="fila-fija">
								<td id="td-etiqueta"><input type="text" name="nombreEtiquetaagr[]" placeholder="Ingrese una etiqueta"></td>

								<?php $boton = "<td id='td-menos'><input type='button' value='Menos'></td>"; 
								?>
								<td id="td-menos" name="botonMenos"><input type="button" value="Menos"></td>
								
							</tr>
						</table>
						<button id="adicional" name="adicional" type="button" class="btn btn-warning">Más +</button>
					</div>					

					  <div class="contenedor-titulos-cajas grupo__enlaces">	
					  <h3> Editar etiquetas<i class="fa-solid fa-triangle-exclamation advertencia" title="Campos vacíos"></i></h3>
					<?php
					//Puede causar error ? se vera
					foreach($PonerEtiqueta as $ifeti){}	 
					  if($ifeti['nombre'] != ''){
					 ?>
						
							<?php
							  foreach($PonerEtiqueta as $ColocarEtiqueta){ 
							 ?>
							 <input type="text" name="idEtiqueta[]" class="esconder" value = "<?php echo $ColocarEtiqueta['id']?>">
		  					<input type="text" name="nombreEtiqueta[]" placeholder="Ingrese un etiqueta" value="<?php echo $ColocarEtiqueta['nombre']?>">
		  				
						
					<?php 
					} 
					}else{
					?>
					<div class="contenedor-informacion">
							<p class="textoInfo">Ningúna etiqueta fue colocado</p>
						</div>
					<?php } ?>
					</div>	
					
							
				


				</div>	

					 				  
				<input class="submit cursorInactivo" type="submit" name="editarNoticias" value="Editar artículo" title="Complete el formulario para habilitar esta acción" disabled>

				
>>>>>>> b958538 (Hasta Cursos arreglado)
				<?php 
					}else{ 
				?>	
				<div class="wrapper-container">
					<div class="contenedor-titulos-cajas grupo__titulo">
						<h3>Título<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
	  					<input type="text" name="titulo" placeholder="Ingrese un titulo" minlength="5" maxlength="100" id="tituloInput" required>

	  					<div class="contenedor-informacion">
		  					<p class="textoInfo">Mínimo 5 caracteres</p>
		  					<p class="cantCaracteres">0/100</p>
		  					<p class="textoLimite">.</p>
	  					</div>

					</div>	  			
				
<<<<<<< HEAD
					<div class="contenedor-titulos-cajas">
						<h3>Área</h3>
						<select name="area">
=======
					<div class="contenedor-titulos-cajas grupo__area">	
						<h3>Área<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
						<select name="area" required>
							<option value="">Seleccione un área</option>
>>>>>>> b958538 (Hasta Cursos arreglado)
							<?php
								foreach($datosArea as $datoArea){
							?>
							<option value="<?php echo $datoArea['id']; ?>"><?php echo $datoArea['area']; ?></option>
								<?php }	?>										
<<<<<<< HEAD
			  				</select>
					</div>	
				
					<div class="contenedor-titulos-cajas">
						<h3>Descripción</h3>
						<textarea placeholder="Ingrese una descripción breve para la noticia" maxlength="500" minlength="20" name="descripcion" required="yes"></textarea>
=======
			  			</select>

			  			<div class="contenedor-informacion">
			  				<p class="textoInfo">Seleccione un área para la novedad</p>
			  			</div>

					</div>	
				
					<div class="contenedor-titulos-cajas grupo__descripcion">
						<h3>Descripción<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
						<textarea id="textareaDescripcion" placeholder="Ingrese una descripción breve para la noticia" minlength="20" maxlength="490" name="descripcion" required></textarea>

						<div class="contenedor-informacion">
		  					<p class="textoInfo">Mínimo 20 caracteres</p>
		  					<p class="cantCaracteres">0/490</p>
		  					<p class="textoLimite">.</p>	  					
	  					</div>
>>>>>>> b958538 (Hasta Cursos arreglado)
				</div>

				<div class="contenedor-titulos-cajas grupo__miniatura">
						<h3>Miniatura<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
	  					<input type="file" name="miniatura" id="inputMiniatura">

	  					<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
				</div>
	  				
				<div class="contenedor-titulos-cajas grupo__contenido1">
						<h3>Contenido 1<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido1" required></textarea>

						<div class="contenedor-informacion">
							<p class="textoInfo">Mínimo 100 caracteres</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p>	
		  				</div>
	  			</div>
				
					
				<div class="contenedor-titulos-cajas grupo__imagen1">
						<h3>Imagen 1<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
	  					<input type="file" name="archivo1" id="inputImagen1">

	  					<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
				</div>  				
	  				

				<div class="contenedor-titulos-cajas grupo__contenido2">
						<h3>Contenido 2<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"></textarea>

						<div class="contenedor-informacion">
							<p class="textoInfo">Este campo está vacío</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p> 
		  				</div>
				</div>

				<div class="contenedor-titulos-cajas grupo__imagen2">
						<h3>Imagen 2<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
	  					<input type="file" name="archivo2" id="inputImagen2">

	  					<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
				</div>
	  				
<<<<<<< HEAD
				<div class="contenedor-titulos-cajas">
						<h3>Contenido 3</h3>
		  				<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"></textarea>
=======
				<div class="contenedor-titulos-cajas grupo__contenido3">
						<h3>Contenido 3<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
		  				<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido3"></textarea>

		  				<div class="contenedor-informacion">
			  				<p class="textoInfo">Este campo está vacío</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p> 
		  				</div>
>>>>>>> b958538 (Hasta Cursos arreglado)
				</div>
	  				
				<div class="contenedor-titulos-cajas grupo__imagen3">
						<h3>Imagen 3<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
	  					<input type="file" name="archivo3" id="inputImagen3">

	  					<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
				</div>
	  				
<<<<<<< HEAD
				<div class="contenedor-titulos-cajas">
						<h3>Contenido 4</h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"></textarea>		
=======
				<div class="contenedor-titulos-cajas grupo__contenido4">
						<h3>Contenido 4<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido4"></textarea>

						<div class="contenedor-informacion">
							<p class="textoInfo">Este campo está vacío</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p> 	
		  				</div>
>>>>>>> b958538 (Hasta Cursos arreglado)
				</div>
	  				
				<div class="contenedor-titulos-cajas grupo__imagen4">
						<h3>Imagen 4<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
						<input type="file" name="archivo4" id="inputImagen4">

						<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
				</div>
					
<<<<<<< HEAD
				<div class="contenedor-titulos-cajas">
						<h3>Contenido 5</h3>	
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido2"></textarea>  
=======
				<div class="contenedor-titulos-cajas grupo__contenido5">
						<h3>Contenido 5<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>	
						<textarea placeholder="Ingrese un contenido para la noticia" maxlength="3000" minlength="100" name="contenido5"></textarea>

						<div class="contenedor-informacion">
							<p class="textoInfo">Este campo está vacío</p>
		  					<p class="cantCaracteres">0/3000</p>
			  				<p class="textoLimite">.</p>  
		  				</div>
>>>>>>> b958538 (Hasta Cursos arreglado)
				</div>
					
				<div class="contenedor-titulos-cajas grupo__imagen5">
						<h3>Imagen 5<i class="fa-solid fa-triangle-exclamation advertencia" title="Campo vacío"></i></h3>
						<input type="file" name="archivo5" id="inputImagen5">

						<div class="contenedor-informacion">
	  						<p class="textoInfo">Ninguna imagen fue cargada</p>
	  					</div>
				</div>
					
				<div class="contenedor-titulos-cajas grupo__fecha">
						<h3>Fecha<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
						<input type="datetime-local" name="fecha" required=yes min="<?php echo date("Y-m-d\TH:i")?>" value="<?php echo date("Y-m-d\TH:i");?>">
					
						<div class="contenedor-informacion">
							<p class="textoInfo">Debe confirmar la fecha y hora de publicación</p>
						</div>
				</div>

				
				<div class="contenedor-titulos-cajas grupo__estado">
		  				<h3>Estado<i class="fa-solid fa-circle-xmark error" title="Campo incompleto"></i></h3>
		  				<select name="estado">
		  					<option value="">Seleccione un estado</option>
							<option value="activo">Activo</option>
							<option value="inactivo">Inactivo</option>
						</select>

						<div class="contenedor-informacion">
							<p class="textoInfo">Seleccione un estado para la novedad</p>
						</div>
		  		</div>  
				  
				<div class="contenedor-titulos-cajas">
					  <h3> Agregar enlaces<i class="fa-solid fa-triangle-exclamation advertencia" title="Campos vacíos"></i></h3>
					  <p class="textoInfo">Los enlaces deben empezar con https://</p>
			
					  <table class="tabla1"  id="tabla1">
							<tr class="fila-fija1">
								<td id="td-enlace"><input type="text" name="url[]" placeholder="Ingrese un enlace"></td>
								<td id="td-menosEnl" name="botonMenos"><input type="button" value="Menos"></td>
								
							</tr>
						</table>	
						<button id="adicionalEnl" name="adicional" type="button" class="btn btn-warning">Más +</button>
		  			</div> 	
									

					<div class="contenedor-titulos-cajas">

						<h3>Agregar etiquetas</h3>

						<table class="table bg-info"  id="tabla">
							<tr class="fila-fija">
								<td id="td-etiqueta"><input type="text" name="nombreEtiqueta[]" placeholder="Ingrese una etiqueta"></td>

								<td id="td-estado">
									<select name="estadoEtiqueta[]">
										<option>Activo</option>
										<option>Inactivo</option>
									</select>
								</td>
								<?php $boton = "<td id='td-menos'><input type='button' value='Menos'></td>"; 
								?>
								<td id="td-menos" name="botonMenos"><input type="button" value="Menos"></td>
								
							</tr>
						</table>
						<button id="adicional" name="adicional" type="button" class="btn btn-warning">Más +</button>
					</div>						
				
				</div>

<<<<<<< HEAD
				<input type="submit" name="agregarNoticias" value="Agregar artículo">
=======
				<input class="submit cursorInactivo" type="submit" name="agregarNoticias" value="Agregar novedad" title="Complete el formulario para habilitar esta acción" disabled>
>>>>>>> b958538 (Hasta Cursos arreglado)
				
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

	<script src="js/validaciones.js"></script>
	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>
</body>
</html>