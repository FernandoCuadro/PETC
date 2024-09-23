<?php
	error_reporting(0);
	require_once("modelo/modeloNoticias.php");
	/*Iniciamos la variable para luego obtener todas las áreas*/
	$areaMenu = new modeloNoticias();
	$areaMenu2 = new modeloNoticias();
	$area = new modeloNoticias();
	$etiquetas = new modeloNoticias();
//	$usuario = new modeloNoticias();
	$agregarNoticia = new modeloNoticias();
	$Mostrar = new modeloNoticias();
	$editar = new modeloNoticias();
	$enlaces = new modeloNoticias();
	

	/*Obtenemos las areas y las guardamos en una variable
	se guarda en forma de array*/	
	//$datosAreasMenu = $areaMenu->obtenerArea();
	//$datosAreasMenu2 = $areaMenu2->obtenerArea();
	//$datosArea = $area->obtenerArea();
	$datosAreasMenu = $areaMenu->obtenerAreasMenu();
	$datosAreasMenu2 = $areaMenu2->obtenerAreasMenu();
	$datosArea = $area->obtenerAreasMenu();

	// Obtenemos todos los usuarios activos
//	$datosUsuario = $usuario->obtenerUsuario();

	/*Recolectamos los datos en la vista correspondiente y enviamos la consulta a la base de datos una vez enviada la consulta habremos agregado un
	articulo nuevo*/
	
	$PonerEtiqueta = $etiquetas->obtenerEtiquetas();
	$PonerEnlaces = $enlaces->obtenerEnlaces();

	//$ID = $_GET['idNot'];
	$datosMostrarDatos = $Mostrar->MostrarDatos($_GET['idNot']);

	require_once("vista/vistaEditorNoticias.php");
	//$idNot = $_GET['idNot'];
	//echo "<input type='text' class='esconder' name='idNot' value='".$idNot."'>";
	/*Cuando le damos a editar articulo*/
	if(isset($_POST['editarNoticias'])){
		if($_POST['titulo'] == ""){	
			echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Noticias',
                    text:'No se ah ingresado un titulo',
                    icon:'error'                    
                    })
                   </script>";
        		}elseif($_POST['area'] == ""){
					echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
					echo "<script>
							swal({
							title:'Noticias',
							text:'No se ah ingresado el area',
							icon:'error'                    
							})
						   </script>";		
						}elseif($_POST['descripcion'] == ""){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'No se ah ingresado la descripcion',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['descripcion']) > 490){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'La descripcion sobrepasa el limite de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif($_POST['contenido1'] == ""){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'No se ah ingresado el contenido 1',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['contenido1']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['contenido2']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";		
						}elseif(strlen($_POST['contenido3']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['contenido4']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['contenido5']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['titulo']) > 150){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El titulo sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif($_POST['fecha'] == ''){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'Debe ingresar una fecha',
									icon:'error'                    
									})
								   </script>";
						}elseif($_POST['fecha'] < date("Y-m-d")){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'Debe ingresar una fecha a partir de hoy',
									icon:'error'                    
									})
								   </script>";
						}elseif($_POST['estado'] == ""){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'Debe seleccionar un estado',
									icon:'error'                    
									})
								   </script>";				
						}elseif($_POST['estado'] == 'activo' || $_POST['estado'] == 'inactivo'){
						
						

							$directorio = 'img';
	  
							$archivo = $_FILES['miniatura']['tmp_name'];	
					
							if(is_dir($directorio) && is_uploaded_file($archivo)){
					
							  $nom_archivo = $_FILES['miniatura']['name'];
							  $tipo_archivo = $_FILES['miniatura']['type'];
					
							  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
								move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
								  $miniaturaNombre = $directorio . '/' . $nom_archivo;
							  }else{
								echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
								echo "<script>
								swal({
								title:'Noticias',
								text:'Eso no es una imagen',
								icon:'error'                    
								})
							   </script>";
							  }
							}
						
						
						if($_FILES['archivo1']['name'] == ""){
							$imagen1Nombre = '';
						}else{
							$directorio = 'img';
	 
							$archivo = $_FILES['archivo1']['tmp_name'];
					
							if(is_dir($directorio) && is_uploaded_file($archivo)){
					
							  $nom_archivo = $_FILES['archivo1']['name'];
							  $tipo_archivo = $_FILES['archivo1']['type'];
					
							  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
								move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
								  $imagen1Nombre = $directorio . '/' . $nom_archivo;
							  }else{
								echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
								echo "<script>
								swal({
								title:'Noticias',
								text:'Eso no es una imagen',
								icon:'error'                    
								})
							   </script>";
							  }
							}
						}
						if($_FILES['archivo2']['name'] == ""){
							$imagen2Nombre = '';
						}else{
							$directorio = 'img';
	 
							$archivo = $_FILES['archivo2']['tmp_name'];
					
							if(is_dir($directorio) && is_uploaded_file($archivo)){
					
							  $nom_archivo = $_FILES['archivo2']['name'];
							  $tipo_archivo = $_FILES['archivo2']['type'];
					
							  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
								move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
								  $imagen2Nombre = $directorio . '/' . $nom_archivo;
							  }else{
								echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
								echo "<script>
								swal({
								title:'Noticias',
								text:'Eso no es una imagen',
								icon:'error'                    
								})
							   </script>";
							  }
							}  
						}
						if($_FILES['archivo3']['name'] == ""){
							$imagen3Nombre = '';
						}else{
							$directorio = 'img';
	 
							$archivo = $_FILES['archivo3']['tmp_name'];
					
							if(is_dir($directorio) && is_uploaded_file($archivo)){
					
							  $nom_archivo = $_FILES['archivo3']['name'];
							  $tipo_archivo = $_FILES['archivo3']['type'];
					
							  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
								move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
								  $imagen3Nombre = $directorio . '/' . $nom_archivo;
							  }else{
								echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
								echo "<script>
								swal({
								title:'Noticias',
								text:'Eso no es una imagen',
								icon:'error'                    
								})
							   </script>";
							  }
							}

						}
						if($_FILES['archivo4']['name'] == ""){
							$imagen4Nombre = '';
						}else{
							$directorio = 'img';
	 
							$archivo = $_FILES['archivo4']['tmp_name'];
					
							if(is_dir($directorio) && is_uploaded_file($archivo)){
					
							  $nom_archivo = $_FILES['archivo4']['name'];
							  $tipo_archivo = $_FILES['archivo4']['type'];
					
							  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
								move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
								  $imagen4Nombre = $directorio . '/' . $nom_archivo;
							  }else{
								echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
								echo "<script>
								swal({
								title:'Noticias',
								text:'Eso no es una imagen',
								icon:'error'                    
								})
							   </script>";	
							  }
							}
						}
						if($_FILES['archivo5']['name'] == ""){
							$imagen5Nombre = '';
						}else{
							$directorio = 'img';
	 
							$archivo = $_FILES['archivo5']['tmp_name'];
					
							if(is_dir($directorio) && is_uploaded_file($archivo)){
					
							  $nom_archivo = $_FILES['archivo5']['name'];
							  $tipo_archivo = $_FILES['archivo5']['type'];
					
							  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
								move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
								  $imagen5Nombre = $directorio . '/' . $nom_archivo;
								}else{
									echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
								echo "<script>
								swal({
								title:'Noticias',
								text:'Eso no es una imagen',
								icon:'error'                    
								})
							   </script>";
							  }
							}
						}
		
		$editarNoticias = $editar->editarNoticias(
			
			/*Pedimos todos los datos necesarios*/
			$_POST['idNot'],
			$_POST['fecha'],
			$_POST['titulo'],
			$_POST['descripcion'],
			$_POST['contenido1'],	
			$_POST['contenido2'],
			$_POST['contenido3'],
			$_POST['contenido4'],
			$_POST['contenido5'],				
			$_POST['estado'],
			$_POST['area'],
			$_POST['idEtiqueta'],
			$_POST['nombreEtiqueta'],
			$_POST['nombreEtiquetaagr'],
			$_POST['idurl'],
			$_POST['url'],
			$_POST['urlagr'],
			$miniaturaNombre,
			$imagen1Nombre,
			$imagen2Nombre,
			$imagen3Nombre,
			$imagen4Nombre,
			$imagen5Nombre
		);

	}else{
		echo "<script>window.alert('El estado solo puede ser activo o inactivo');window.location='editor-noticias.php';</script>";

	}
}
if(isset($_POST['agregarNoticias'])){

		if($_POST['titulo'] == ""){	
			echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                    swal({
                    title:'Noticias',
                    text:'No se ah ingresado un titulo',
                    icon:'error'                    
                    })
                   </script>";
        		}elseif($_POST['area'] == ""){
					echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
					echo "<script>
							swal({
							title:'Noticias',
							text:'No se ah ingresado el area',
							icon:'error'                    
							})
						   </script>";		
						}elseif($_POST['descripcion'] == ""){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'No se ah ingresado la descripcion',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['descripcion']) > 490){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'La descripcion sobrepasa el limite de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif($_POST['contenido1'] == ""){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'No se ah ingresado el contenido 1',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['contenido1']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['contenido2']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";		
						}elseif(strlen($_POST['contenido3']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['contenido4']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['contenido5']) > 3500){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El contenido sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif(strlen($_POST['titulo']) > 150){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'El titulo sobrepasa los limites de escritura',
									icon:'error'                    
									})
								   </script>";
						}elseif($_POST['fecha'] == ''){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'Debe ingresar una fecha',
									icon:'error'                    
									})
								   </script>";
						}elseif($_POST['fecha'] < date("Y-m-d")){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'Debe ingresar una fecha a partir de hoy',
									icon:'error'                    
									})
								   </script>";
						}elseif($_POST['estado'] == ""){
							echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
							echo "<script>
									swal({
									title:'Noticias',
									text:'Debe seleccionar un estado',
									icon:'error'                    
									})
								   </script>";		
						}elseif($_POST['estado'] == 'activo' || $_POST['estado'] == 'inactivo'){
							if($_FILES['miniatura']['name'] === ""){
							
									$miniaturaNombre = 'img/miniatura/pti.jpg';
									
							}else{

								$directorio = 'img';
          
								$archivo = $_FILES['miniatura']['tmp_name'];	
						
								if(is_dir($directorio) && is_uploaded_file($archivo)){
						
								  $nom_archivo = $_FILES['miniatura']['name'];
								  $tipo_archivo = $_FILES['miniatura']['type'];
								 // $jpg = '.jpg';
									// $a = strpos($tipo_archivo, $jpg); 
								  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
								   move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
									  $miniaturaNombre = $directorio . '/' . $nom_archivo;

									
								  }else{
									echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
									echo "<script>
									swal({
									title:'Noticias',
									text:'Eso no es una imagen',
									icon:'error'                    
									})
								   </script>";
								  }
								}
							}
							if($_FILES['archivo1']['name'] == ""){
								$imagen1Nombre = '';
							}else{
								$directorio = 'img';
         
								$archivo = $_FILES['archivo1']['tmp_name'];
						
								if(is_dir($directorio) && is_uploaded_file($archivo)){
						
								  $nom_archivo = $_FILES['archivo1']['name'];
								  $tipo_archivo = $_FILES['archivo1']['type'];
						
								  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
									move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
									  $imagen1Nombre = $directorio . '/' . $nom_archivo;
								  }else{
									echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
									echo "<script>
									swal({
									title:'Noticias',
									text:'Eso no es una imagen',
									icon:'error'                    
									})
								   </script>";
								  }
								}
							}
							if($_FILES['archivo2']['name'] == ""){
								$imagen2Nombre = '';
							}else{
								$directorio = 'img';
         
								$archivo = $_FILES['archivo2']['tmp_name'];
						
								if(is_dir($directorio) && is_uploaded_file($archivo)){
						
								  $nom_archivo = $_FILES['archivo2']['name'];
								  $tipo_archivo = $_FILES['archivo2']['type'];
						
								  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
									move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
									  $imagen2Nombre = $directorio . '/' . $nom_archivo;
								  }else{
									echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
									echo "<script>
									swal({
									title:'Noticias',
									text:'Eso no es una imagen',
									icon:'error'                    
									})
								   </script>";
								  }
								}  
							}
							if($_FILES['archivo3']['name'] == ""){
								$imagen3Nombre = '';
							}else{
								$directorio = 'img';
         
								$archivo = $_FILES['archivo3']['tmp_name'];
						
								if(is_dir($directorio) && is_uploaded_file($archivo)){
						
								  $nom_archivo = $_FILES['archivo3']['name'];
								  $tipo_archivo = $_FILES['archivo3']['type'];
						
								  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
									move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
									  $imagen3Nombre = $directorio . '/' . $nom_archivo;
								  }else{
									echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
									echo "<script>
									swal({
									title:'Noticias',
									text:'Eso no es una imagen',
									icon:'error'                    
									})
								   </script>";
								  }
								}

							}
							if($_FILES['archivo4']['name'] == ""){
								$imagen4Nombre = '';
							}else{
								$directorio = 'img';
         
								$archivo = $_FILES['archivo4']['tmp_name'];
						
								if(is_dir($directorio) && is_uploaded_file($archivo)){
						
								  $nom_archivo = $_FILES['archivo4']['name'];
								  $tipo_archivo = $_FILES['archivo4']['type'];
						
								  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
									move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
									  $imagen4Nombre = $directorio . '/' . $nom_archivo;
								  }else{
									echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
									echo "<script>
									swal({
									title:'Noticias',
									text:'Eso no es una imagen',
									icon:'error'                    
									})
								   </script>";	
								  }
								}
							}
							if($_FILES['archivo5']['name'] == ""){
								$imagen5Nombre = '';
							}else{
								$directorio = 'img';
         
								$archivo = $_FILES['archivo5']['tmp_name'];
						
								if(is_dir($directorio) && is_uploaded_file($archivo)){
						
								  $nom_archivo = $_FILES['archivo5']['name'];
								  $tipo_archivo = $_FILES['archivo5']['type'];
						
								  if (((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "webp")))){
									move_uploaded_file($archivo, $directorio . '/' . $nom_archivo);
									  $imagen5Nombre = $directorio . '/' . $nom_archivo;
									}else{
										echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
									echo "<script>
									swal({
									title:'Noticias',
									text:'Eso no es una imagen',
									icon:'error'                    
									})
								   </script>";
								  }
								}
							}
								
	$datosAgregarNoticia = $agregarNoticia->agregarNoticias(
		$Titulo = $_POST['titulo'],
		$Descripcion = $_POST['descripcion'],
		$Contenido1 = $_POST['contenido1'],
		$Contenido2 = $_POST['contenido2'],
		$Contenido3 = $_POST['contenido3'],
		$Contenido4 = $_POST['contenido4'],
		$Contenido5 = $_POST['contenido5'],
		$Fecha = $_POST['fecha'],
		$Estado = $_POST['estado'],
		$IDArea = $_POST['area'],
		$url = $_POST['url'],
		$nombreEtiqueta = $_POST['nombreEtiqueta'],
		$estadoEtiqueta = $_POST['estadoEtiqueta'],
		$miniatura = $miniaturaNombre,
		$imagen1 = $imagen1Nombre,
		$imagen2 = $imagen2Nombre,
		$imagen3 = $imagen3Nombre,
		$imagen4 = $imagen4Nombre,
		$imagen5 = $imagen5Nombre

	);


	}else{
		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
		echo "<script>
				swal({
				title:'Noticias',
				text:'El estado solo puede ser activo o inactivo',
				icon:'error'                    
				})
			   </script>";	}
}




?>