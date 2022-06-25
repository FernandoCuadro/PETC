<?php
	error_reporting(0);
	require_once("modelo/modeloNoticias.php");

		/*Iniciamos la variable para luego obtener todos los 
		articulos del apartado Noticias*/
		$noticias = new modeloNoticias();
		/*Iniciamos la variable para luego obtener todas las áreas*/
		$areaMenu = new modeloNoticias();
		$areaMenu2 = new modeloNoticias();
		$obtenerTodo = new modeloNoticias();


		$noticiaCom = new modeloNoticias();
		

		// Obtenemos los articulos de noticias y las guardamos en una variable
		// se guarda en forma de array
		$ListaNoticiasAdmin = $obtenerTodo->obtenerNoticiasAdmin();
		$listaNoticias = $noticias->obtenerNoticias();

		/*Obtenemos las areas y las guardamos en una variable
		se guarda en forma de array*/
		$datosAreasMenu = $areaMenu->obtenerAreasMenu();
		$datosAreasMenu2 = $areaMenu2->obtenerAreasMenu();


		


	require_once("vista/vistaNoticias.php");



?>
