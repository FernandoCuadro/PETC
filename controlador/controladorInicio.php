<?php
	//error_reporting(0);
	require_once("modelo/modeloInicio.php");

	/*Iniciamos la variable para luego obtener todos los 
	articulos del apartado Inicio*/
	$Slider = new modeloInicio();
	$Areas = new modeloInicio();
	$nivel = new modeloInicio();
	/*Iniciamos la variable para luego obtener todas las áreas*/



	// Obtenemos los articulos de inicio y las guardamos en una variable
	// se guarda en forma de array	
	$datosNoticias = $Slider->PrimerasNoticias();
	//$datosAreas = $Areas->obtenerAreas();
	$datosNiveles = $nivel->obtenerNiveles();

	/*Obtenemos las areas y las guardamos en una variable
	se guarda en forma de array*/
	
	
	require_once("vista/vistaInicio.php");
?>