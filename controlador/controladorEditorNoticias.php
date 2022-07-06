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
	$datosAgregarNoticia = $agregarNoticia->agregarNoticias();
	$PonerEtiqueta = $etiquetas->obtenerEtiquetas();

	//$ID = $_GET['idNot'];
	$datosMostrarDatos = $Mostrar->MostrarDatos($_GET['idNot']);

	require_once("vista/vistaEditorNoticias.php");

	/*Cuando le damos a editar articulo*/
	if(isset($_POST['editarNoticias'])){
		$editarNoticias = $editar->editarNoticias(
			
			/*Pedimos todos los datos necesarios*/
			$_POST['idNot'],
			$_POST['fecha'],
			$_POST['titulo'],
			$_POST['descripcion'],
		//	$_POST['miniatura'],
			$_POST['contenido1'],	
			$_POST['contenido2'],
			$_POST['url'],
		//	$_POST['archivo2'],			
			$_POST['estado'],
			$_POST['area'],
			$_POST['nombreEtiqueta'],
			$_POST['estadoEtiqueta']
		
			

			
		);

	}

?>