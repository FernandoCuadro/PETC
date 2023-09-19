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
			echo "<script>window.alert('El titulo esta vácio');window.location='editor-noticias.php';</script>";
		}elseif($_POST['area'] == ""){
			echo "<script>window.alert('El área esta vacia');window.location='editor-noticias.php';</script>";
		}elseif($_POST['descripcion'] == ""){
			echo "<script>window.alert('La descripción esta vácia');window.location='editor-noticias.php';</script>";
		}elseif(strlen($_POST['descripcion']) > 490){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";
		}elseif($_POST['contenido1'] == ""){
			echo "<script>window.alert('El contenido 1 esta vácio');window.location='editor-noticias.php';</script>";
		}elseif(strlen($_POST['contenido1']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['contenido2']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['contenido3']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['contenido4']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['contenido5']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['titulo']) > 150){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif($_POST['fecha'] == ""){
			echo "<script>window.alert('No se establecio una fecha');window.location='editor-noticias.php';</script>";
		}elseif($_POST['estado'] == ""){
			echo "<script>window.alert('el estado no puede estar vacio');window.location='editor-noticias.php';</script>";
		}elseif($_POST['estado'] == 'activo' || $_POST['estado'] == 'inactivo'){

		
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
			$_POST['urlagr']
			
		
			

			
		);

	}else{
		echo "<script>window.alert('El estado solo puede ser activo o inactivo');window.location='editor-noticias.php';</script>";

	}
}
if(isset($_POST['agregarNoticias'])){

		if($_POST['titulo'] == ""){
			echo "<script>window.alert('El titulo esta vácio');window.location='editor-noticias.php';</script>";
		}elseif($_POST['area'] == ""){
			echo "<script>window.alert('El área esta vacia');window.location='editor-noticias.php';</script>";
		}elseif($_POST['descripcion'] == ""){
			echo "<script>window.alert('La descripción esta vácia');window.location='editor-noticias.php';</script>";
		}elseif(strlen($_POST['descripcion']) > 490){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";
		}elseif($_POST['contenido1'] == ""){
			echo "<script>window.alert('El contenido 1 esta vácio');window.location='editor-noticias.php';</script>";
		}elseif(strlen($_POST['contenido1']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['contenido2']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['contenido3']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['contenido4']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['contenido5']) > 3500){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif(strlen($_POST['titulo']) > 150){
			echo "<script>window.alert('La descripción sobrepasa el limite de caracteres');window.location='editor-noticias.php';</script>";	
		}elseif($_POST['fecha'] == ''){
			echo "<script>window.alert('No se establecio una fecha');window.location='editor-noticias.php#CrearFecha';</script>";
		}elseif($_POST['fecha'] < date("Y-m-d")){
        	echo "<script>window.alert('Debe ingresar una fecha actual');window.location='editor-noticias.php#CrearFecha';</script>";
		}elseif($_POST['estado'] == ""){
			echo "<script>window.alert('el estado no puede estar vacio');window.location='editor-noticias.php';</script>";
		}elseif($_POST['estado'] == 'activo' || $_POST['estado'] == 'inactivo'){
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
		$estadoEtiqueta = $_POST['estadoEtiqueta']

	);


	}else{
		echo "<script>window.alert('El estado solo puede ser activo o inactivo');window.location='editor-noticias.php';</script>";
	}
}




?>