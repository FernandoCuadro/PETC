<!DOCTYPE html>
<html lang="spanish">	
<head>
	
	<!--Meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

	<meta name="description" content="Conocé las novedades del Polo Educativo Tecnológico Cerro en todas sus áreas, Informática, Diseño, Construcción, y más.
	Enterate de todo lo que pasa en el Polo Educativo Cerro.">

	<meta name="keywords" content="informática,diseño,construcción,bachillerato,novedades,noticias,polo,educativo,tecnológico,cerro,información,montevideo,utu,petc,tecnicatura,logística,steel,framing,wood,framing,prevencionista,técnico,terciario,ingeniero,EMT,tecnólogo,bachiller,utu cerro,cursos,universidad de trabajo">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<!--Link a icono y hojas de estilo-->
	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleArticulos11.css">
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
	<title>Novedades</title>
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
  		<!-- Esto solo lo ve el editor o el admin -->
  		<div id="contenedor-agregar-ver-articulo">
		  <?php
			if(empty($_SESSION['usuario'])){
					  
				}elseif($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){
		?>		  
  			<a href="editor-noticias.php">Agregar artículo</a>
			  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
  			<!--	<input type="month" name="añomes"> -->
				<select name="listaver">
  					<option value="reciente">Más recientes</option>
  					<option value="antiguo">Más antiguos</option>
  					<option value="visible">Visibles</option>
  					<option value="novisible">No visibles</option>	
  				</select>
			
  				<input type="submit" name="ver" value="Ver">	
  			</form>
			<?php } ?>
  		</div>

		  <?php  
					if(empty($_GET['lista2'])){
									
				if(empty($listaNoticias)){
					$nohayNot = $_SESSION['NotNot'];
					
					?>
					
						<p id="noNot"><?php echo $nohayNot ?></p>
					 	
			<?php 
				
				}else{
					if($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){
				?>
  		<!-- Articulo/noticia independiente -->
  		<article id="articulo">
  			<div class="contenedor-articulo">
			<?php  			
				foreach($listaNoticias as $colocarNoticia){		
			?>				
  				<!-- Esto será lo que se tiene que replicar por cada noticia que exista -->
	  			<div class="contenedor-articulo__contenido">
					
				<?php
                /*Si el articulo no tiene miniatura cargada la imagen por defecto será la que definamos*/
				  if(empty($colocarNoticia['miniatura'])){
                ?>  
                    <!--Imagen por defecto-->
                    <img src="img/pti.jpg">
					
                <?php
                    }else{
                ?>  
	  				<img src="<?php echo $colocarNoticia['miniatura']?>">
				<?php 
				} 
				if($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){
				
				?>	
				
					<div class="contenedor-articulo__contenido__edicion">
					  <a href="modelo/inactivoNoticias.php?idInNot=<?php echo $colocarNoticia['id'] ?>" class="no-view"><i class="fa-solid fa-eye-slash"></i></a>
	  					<a href="modelo/activoNoticias.php?idAcNot=<?php echo $colocarNoticia['id'] ?>" class="view"><i class="fa-solid fa-eye"></i></a>
  						<a href="editor-noticias.php?idNot=<?php echo $colocarNoticia['id'] ?>" class="edit"><i class="fa-solid fa-pen"></i></a>
  						<?php if($_SESSION['perfil'] == 'moderador'){}else{ ?>
						<a href="modelo/eliminarnoticia.php?idNotEli=<?php echo $colocarNoticia['id'] ?>" class="remove"><i class="fa-solid fa-trash-can"></i></a>
						<?php } ?>
						
	  				</div>	
					  <?php 
					  }
					  if($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){ 
					  ?>

					  <p class="articulo-id"><?php echo $colocarNoticia['id']?></p>
					<?php } ?>
					<div class="contenedor-articulo__contenido__info">						
					<a href="noticias.php?idarea=<?php echo $colocarNoticia['idarea']; ?>" class="articulo-area-btn"><?php echo $colocarNoticia['area'] ?></a>
						
	  					<div class="articulo-titulo">
					  		<h2><?php echo $colocarNoticia['titulo'] ?></h2>
					  	</div>
	  					<div class="articulo-descripcion">
	  						<p><?php echo nl2br($colocarNoticia['descripcion']) ?></p>
	  					</div>
	  					
	  					<p class="articulo-fecha"><?php echo substr($colocarNoticia['fecha'], 0, 16); ?></p>
	  				</div>
	  				<div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $colocarNoticia['id'] ?>">LEER MÁS</a>
	  				</div>
					
					  <?php
					  if($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){
					 	if($colocarNoticia['estado'] == 'inactivo') {
					?> 	
	  				<div class="contenedor-articulo__contenido__estado-articulo">
	  					<i class="fa-solid fa-eye-slash no-view-end">
	  						<span class="bubble-no-view"><i class="fa-solid fa-triangle-exclamation"></i>Artículo actualmente oculto</span>
	  					</i>
					</div>
					<?php
						}elseif($colocarNoticia['estado'] == 'activo') {
					?> 
					<div class="contenedor-articulo__contenido__estado-articulo">		
	  					<i class="fa-solid fa-eye view-end">
	  						<span class="bubble-view"><i class="fa-solid fa-check"></i>Artículo actualmente visible</span>
	  					</i>
	  				</div>
				<?php
					 }
					} 
				?>
	  			</div>
				  
				  <?php } ?>
			</div>
  		</article>
			<?php
					}else{

			?>			<!-- Articulo/noticia independiente -->
						<article id="articulo">
							<div class="contenedor-articulo">
						  <?php  			
							  foreach($listanoadmin as $listanoadmins){		
						  ?>				
								<!-- Esto será lo que se tiene que replicar por cada noticia que exista -->
								<div class="contenedor-articulo__contenido">
								  
							  <?php
							  /*Si el articulo no tiene miniatura cargada la imagen por defecto será la que definamos*/
								if(empty($listanoadmins['miniatura'])){
							  ?>  
								  <!--Imagen por defecto-->
								  <img src="img/pti.jpg">
								  
							  <?php
								  }else{
							  ?>  
									<img src="<?php echo $listanoadmins['miniatura']?>">
							  <?php } ?>	
								  <div class="contenedor-articulo__contenido__info">						
								  <a href="noticias.php?idarea=<?php echo $listanoadmins['idarea']; ?>" class="articulo-area-btn"><?php echo $listanoadmins['area'] ?></a>
									  
										<div class="articulo-titulo">
											<h2><?php echo $listanoadmins['titulo'] ?></h2>
										</div>
										<div class="articulo-descripcion">
											<p><?php echo nl2br($listanoadmins['descripcion']) ?></p>
										</div>
										
										<p class="articulo-fecha"><?php echo substr($listanoadmins['fecha'], 0, 16); ?></p>
									</div>
									<div class="contenedor-articulo__contenido__read-more">
										<a href="noticiaCompleta.php?idNot=<?php echo $listanoadmins['id'] ?>">LEER MÁS</a>
									</div>
								</div>
								
								<?php } ?>
						  </div>
						</article>		
			<?php					  
					}
			}			
			}else{ 	
				if(empty($NoticiaVer)){
					$nohayNot = $_SESSION['NoNot'];
					
					?>
					
						<p id="noNot"><?php echo $nohayNot ?></p>
					 	
			<?php }else{ ?>
			
			<article id="articulo">
  			<div class="contenedor-articulo">
			<?php	
				foreach($NoticiaVer as $PonerVer){
		
			?>

		<!-- Esto será lo que se tiene que replicar por cada noticia que exista -->
		<div class="contenedor-articulo__contenido">
				<?php
                /*Si el articulo no tiene miniatura cargada la imagen por defecto será la que definamos*/
				  if(empty($PonerVer['miniatura'])){
                ?>  
                    <!--Imagen por defecto-->
                    <img src="img/pti.jpg">
                <?php
                    }else{
                ?>  
	  				<img src="<?php echo $PonerVer['miniatura']?>">
				<?php 
				} 
				if($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){
				
				?>	
				
					<div class="contenedor-articulo__contenido__edicion">
					  <a href="modelo/inactivoNoticias.php?idInNot=<?php echo $PonerVer['id'] ?>" class="no-view"><i class="fa-solid fa-eye-slash"></i></a>
	  					<a href="modelo/activoNoticias.php?idAcNot=<?php echo $PonerVer['id'] ?>" class="view"><i class="fa-solid fa-eye"></i></a>
  						<a href="editor-noticias.php?idNot=<?php echo $PonerVer['id'] ?>" class="edit"><i class="fa-solid fa-pen"></i></a>
  						<?php if($_SESSION['perfil'] == 'moderador'){}else{ ?>
						<a href="modelo/eliminarnoticia.php?idNotEli=<?php echo $PonerVer['id'] ?>" class="remove"><i class="fa-solid fa-trash-can"></i></a>
						<?php } ?>
	  				</div>	
					  <?php } ?>		
					<div class="contenedor-articulo__contenido__info">
	  				
					  	<a href="noticias.php?idarea=<?php echo $PonerVer['idarea']; ?>" class="articulo-area-btn"><?php echo $PonerVer['area'] ?></a>
	  					<div class="articulo-titulo">
					  		<h2><?php echo $PonerVer['titulo'] ?></h2>
					  	</div>
	  					<div class="articulo-descripcion">
	  						<p><?php echo nl2br($PonerVer['descripcion']) ?></p>
	  					</div>
	  					
	  					<p class="articulo-fecha"><?php echo substr($PonerVer['fecha'], 0, 16); ?></p>
	  				</div>
	  				<div class="contenedor-articulo__contenido__read-more">
	  					<a href="noticiaCompleta.php?idNot=<?php echo $PonerVer['id'] ?>">LEER MÁS</a>
	  				</div>
					  <?php
					  if($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){
					 	if($PonerVer['estado'] == 'inactivo') {
					?> 	
	  				<div class="contenedor-articulo__contenido__estado-articulo">
	  					<i class="fa-solid fa-eye-slash no-view-end">
	  						<span class="bubble-no-view"><i class="fa-solid fa-triangle-exclamation"></i>Artículo actualmente oculto</span>
	  					</i>
					</div>
					</div>
					<?php
						}elseif($PonerVer['estado'] == 'activo') {
					?> 
					<div class="contenedor-articulo__contenido__estado-articulo">		
	  					<i class="fa-solid fa-eye view-end">
	  						<span class="bubble-view"><i class="fa-solid fa-check"></i>Artículo actualmente visible</span>
	  					</i>
	  				</div>
				</div>	
				<?php
					 }
					} 
					
				}
				?>
			</div>
  		</article>
		<?php 
			}
	}	?>		
		
  	
		<?php

			if($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'moderador'){	
						
				if($_GET['lista2'] != ''){
				$list = $_GET['lista2'];
		
		?>	
			<!--Aparece la paginacion de los articulos, segun lo hecho en el modelo, en este caso aparecen 6 articulos maximo por pagina-->
			<div id="contenedor-paginacion">
            <div id="contenido-paginacion">
					<div class="btns-prev-next prev">
                <?php
				
                $url = "noticias.php";
                      
                      if ($_SESSION['TPagVer'] > 1) {
                          if ($_SESSION['Pag'] != 1)
                              echo '<a class='.'paginas'.' href="'.$url.'?lista2='.$list.'&pagina='.($_SESSION['Pag']-1).'"> <span>Anterior</span> </a>';

                          	?>
					</div>
                          	<div class="paginasTotales">

                          	<?php

                              for ($i=1;$i<=$_SESSION['TPagVer'];$i++) {
                                  if ($_SESSION['Pag'] == $i){
                                      // Si se muestra el índice de la página actual, no se coloca enlace.
                                      echo '<p class="paginaActiva">'.$_SESSION['Pag'].'</p>';
                                  }else{
                                      // Si el índice no corresponde con la página mostrada actualmente, 
                                      // se coloca el enlace para ir a esa página.
                                      echo '<a class='.'paginas'.' href="'.$url.'?lista2='.$list.'&pagina='.$i.'">'.$i.'</a> ';
                                  }
                              }
                            ?>

                        	</div>
							<div class="btns-prev-next next">
                        	<?php

                          if ($_SESSION['Pag'] != $_SESSION['TPagVer'])
                              echo '<a class='.'paginas'.' href="'.$url.'?lista2='.$list.'&pagina='.($_SESSION['Pag']+1).'"> <span>Siguiente</span> </a>';
                      }

                      if ($_SESSION['Pag'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['Pag'] == 2){
                ?>                    

                <?php
                      }

                  ?>
            </div>
				</div>		  
        </div>




		<?php 	
			}elseif($_GET['idarea'] != ''){
				$idarea = $_GET['idarea'];
		?>
				
		<!--Aparece la paginacion de los articulos, segun lo hecho en el modelo, en este caso aparecen 6 articulos maximo por pagina-->
		  <div id="contenedor-paginacion">
            <div id="contenido-paginacion">

            	<div class="btns-prev-next prev">
                <?php
                $url = "noticias.php";
                      
                      if ($_SESSION['TPagAreAdmin'] > 1) {
                          if ($_SESSION['PagAreAdmin'] != 1)
						  
                              echo '<a class='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.($_SESSION['PagAreAdmin']-1).'"> <span>Anterior</span> </a>';
                          ?>
                </div>
                        <div class="paginasTotales">

                          <?php

                              for ($i=1;$i<=$_SESSION['TPagAreAdmin'];$i++) {
                                  if ($_SESSION['PagAreAdmin'] == $i){
                                      // Si se muestra el índice de la página actual, no se coloca enlace.
                                      echo '<p class="paginaActiva">'.$_SESSION['PagAreAdmin'].'</p>';
                                  }else{
                                      // Si el índice no corresponde con la página mostrada actualmente, 
                                      // se coloca el enlace para ir a esa página.
                                      echo '<a class='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.$i.'">'.$i.'</a> ';
                                  }
                              }

                          ?>

                      	</div>
                <div class="btns-prev-next next">
                      	<?php
                          if ($_SESSION['PagAreAdmin'] != $_SESSION['TPagAreAdmin'])
                              echo '<a class='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.($_SESSION['PagAreAdmin']+1).'"> <span>Siguiente</span> </a>';
                      }

                      if ($_SESSION['PagAreAdmin'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['PagAreAdmin'] == 2){
                ?>       

                <?php
                      }

                  ?>
              </div>
            </div>

        </div>
	<?php 
		}elseif($_GET['idEti'] != ''){ 
		$idEti = $_GET['idEti'];
	?>
	<!--Aparece la paginacion de los articulos, segun lo hecho en el modelo, en este caso aparecen 6 articulos maximo por pagina-->
	<div id="contenedor-paginacion">
            <div id="contenido-paginacion">

            	<div class="btns-prev-next prev">
                <?php
                $url = "noticias.php";
                      
                  if ($_SESSION['TPagEtiAdmin'] > 1) {
                      if ($_SESSION['PagEtiAdmin'] != 1)
                          echo '<a class='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.($_SESSION['PagEtiAdmin']-1).'"> <span>Anterior</span> </a>';

                      	?>
                </div>
                          	<div class="paginasTotales">	

                          	<?php
                          	

                              for ($i=1;$i<=$_SESSION['TPagEtiAdmin'];$i++) {
                                  if ($_SESSION['PagEtiAdmin'] == $i){
                                      // Si se muestra el índice de la página actual, no se coloca enlace.
                                      echo '<p class="paginaActiva">'.$_SESSION['PagEtiAdmin'].'</p>';
                                  }else{
                                      // Si el índice no corresponde con la página mostrada actualmente, 
                                      // se coloca el enlace para ir a esa página.
                                      echo '<a class='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.$i.'">'.$i.'</a> ';
                                  }
                              }

                            ?>

                            </div>

                <div class="btns-prev-next next">

                            <?php
                          if ($_SESSION['PagEtiAdmin'] != $_SESSION['TPagEtiAdmin'])
                              echo '<a class='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.($_SESSION['PagEtiAdmin']+1).'"> <span>Siguiente</span> </a>';
                      }

                      if ($_SESSION['PagEtiAdmin'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['PagEtiAdmin'] == 2){
                ?>

                    

					<?php } ?>

				</div>
            </div>


        </div>
		<?php }else{ ?>
			<div id="contenedor-paginacion">
            <div id="contenido-paginacion">

            	<div class="btns-prev-next prev">
                <?php
                $url = "noticias.php";	
                      
                      if ($_SESSION['TPagNovAdmin'] > 1) {
                          if ($_SESSION['PagAdmin'] != 1)
                              echo '<a class='.'paginas'.' href="'.$url.'?pagina='.($_SESSION['PagAdmin']-1).'"> <span>Anterior</span> </a>';
                          ?>
                </div>
                <div class="paginasTotales">

                  <?php
                      for ($i=1;$i<=$_SESSION['TPagNovAdmin'];$i++) {
						
                          if ($_SESSION['PagAdmin'] == $i){
                              // Si se muestra el índice de la página actual, no se coloca enlace.
                             echo '<p class="paginaActiva">'.$_SESSION['PagAdmin'].'</p>';
                          }else{
                              // Si el índice no corresponde con la página mostrada actualmente, 
                              // se coloca el enlace para ir a esa página.
                              echo '<a class='.'paginas'.' href="'.$url.'?pagina='.$i.'">'.$i.'</a> ';
                          }
                      }
                  ?>
              	</div>

              	<div class="btns-prev-next next">
                      	<?php
                          if ($_SESSION['Pag'] != $_SESSION['TPagNovAdmin'])
                              echo '<a class='.'paginas'.' href="'.$url.'?pagina='.($_SESSION['PagAdmin']+1).'"> <span>Siguiente</span> </a>';
							 // echo $_SESSION['TPagNov'];
                   
					  }

                      if ($_SESSION['PagAdmin'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['PagAdmin'] == 2){
                ?>

                    

					<?php } ?>
				</div>
            </div>

        </div>
		
	<?php 
		} 
	
	}else{
	
	if($_GET['idEti'] != ''){ 
		$idEti = $_GET['idEti'];
	?>	
	<!--Aparece la paginacion de los articulos, segun lo hecho en el modelo, en este caso aparecen 6 articulos maximo por pagina-->
	<div id="contenedor-paginacion">
            <div id="contenido-paginacion">

            	<div class="btns-prev-next prev">
                <?php
                $url = "noticias.php";
                      
                  if ($_SESSION['TPagEti'] > 1) {
                      if ($_SESSION['PagEti'] != 1)
                          echo '<a class='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.($_SESSION['PagEti']-1).'"> <span>Anterior</span> </a>';

                      	?>
                </div>
                          	<div class="paginasTotales">	

                          	<?php
                          	

                              for ($i=1;$i<=$_SESSION['TPagEti'];$i++) {
                                  if ($_SESSION['PagEti'] == $i){
                                      // Si se muestra el índice de la página actual, no se coloca enlace.
                                      echo '<p class="paginaActiva">'.$_SESSION['PagEti'].'</p>';
                                  }else{
                                      // Si el índice no corresponde con la página mostrada actualmente, 
                                      // se coloca el enlace para ir a esa página.
                                      echo '<a class='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.$i.'">'.$i.'</a> ';
                                  }
                              }

                            ?>

                            </div>

                <div class="btns-prev-next next">

                            <?php
                          if ($_SESSION['PagEti'] != $_SESSION['TPagEti'])
                              echo '<a class='.'paginas'.' href="'.$url.'?idEti='.$idEti.'&pagina='.($_SESSION['PagEti']+1).'"> <span>Siguiente</span> </a>';
                      }

                      if ($_SESSION['PagEti'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['PagEti'] == 2){
                ?>

                    

					<?php } ?>

				</div>
            </div>
<?php
		}elseif($_GET['idarea'] != ''){
	$idarea = $_GET['idarea'];

?>
	
<!--Aparece la paginacion de los articulos, segun lo hecho en el modelo, en este caso aparecen 6 articulos maximo por pagina-->
<div id="contenedor-paginacion">
<div id="contenido-paginacion">

	<div class="btns-prev-next prev">
	<?php
	$url = "noticias.php";
		  
		  if ($_SESSION['TPagAre'] > 1) {
			  if ($_SESSION['PagAre'] != 1)
			  
				  echo '<a class='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.($_SESSION['PagAre']-1).'"> <span>Anterior</span> </a>';
			  ?>
	</div>
			<div class="paginasTotales">

			  <?php

				  for ($i=1;$i<=$_SESSION['TPagAre'];$i++) {
					  if ($_SESSION['PagAre'] == $i){
						  // Si se muestra el índice de la página actual, no se coloca enlace.
						  echo '<p class="paginaActiva">'.$_SESSION['PagAre'].'</p>';
					  }else{
						  // Si el índice no corresponde con la página mostrada actualmente, 
						  // se coloca el enlace para ir a esa página.
						  echo '<a class='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.$i.'">'.$i.'</a> ';
					  }
				  }

			  ?>

			  </div>
	<div class="btns-prev-next next">
			  <?php
			  if ($_SESSION['PagAre'] != $_SESSION['TPagAre'])
				  echo '<a class='.'paginas'.' href="'.$url.'?idarea='.$idarea.'&pagina='.($_SESSION['PagAre']+1).'"> <span>Siguiente</span> </a>';
		  }

		  if ($_SESSION['PagAre'] == 1){
	?>

	<?php

		  }elseif($_SESSION['PagAre'] == 2){
	?>       

	<?php
		  }

	  ?>
  </div>
</div>

</div>
<?php 
		}else{
		
?>

			<div id="contenedor-paginacion">
            <div id="contenido-paginacion">

            	<div class="btns-prev-next prev">
                <?php
                $url = "noticias.php";	
                      
                      if ($_SESSION['TPagNov'] > 1) {
                          if ($_SESSION['PagNov'] != 1)
                              echo '<a class='.'paginas'.' href="'.$url.'?pagina='.($_SESSION['PagNov']-1).'"> <span>Anterior</span> </a>';
                          ?>
                </div>
                <div class="paginasTotales">

                  <?php
                      for ($i=1;$i<=$_SESSION['TPagNov'];$i++) {
						
                          if ($_SESSION['PagNov'] == $i){
                              // Si se muestra el índice de la página actual, no se coloca enlace.
                             echo '<p class="paginaActiva">'.$_SESSION['PagNov'].'</p>';
                          }else{
                              // Si el índice no corresponde con la página mostrada actualmente, 
                              // se coloca el enlace para ir a esa página.
                              echo '<a class='.'paginas'.' href="'.$url.'?pagina='.$i.'">'.$i.'</a> ';
                          }
                      }
                  ?>
              	</div>

              	<div class="btns-prev-next next">
                      	<?php
                          if ($_SESSION['PagNov'] != $_SESSION['TPagNov'])
                              echo '<a class='.'paginas'.' href="'.$url.'?pagina='.($_SESSION['PagNov']+1).'"> <span>Siguiente</span> </a>';
							 // echo $_SESSION['TPagNov'];
                   
					  }

                      if ($_SESSION['PagNov'] == 1){
                ?>

                <?php

                      }elseif($_SESSION['PagNov'] == 2){
                ?>

                    

					<?php } ?>
				</div>
            </div>

        </div>
		
	


<?php 
	}
		 
	}	
?>


  		<!-- Btn para redes sociales -->
	

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

  	<script src="js/avoidOverflowNovedades.js"></script>
  	<script src="js/loaderScreen.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>
</body>
</html>