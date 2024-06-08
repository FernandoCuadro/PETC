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
		$ver = new modeloNoticias();
		$verver = new modeloNoticias();

		$noticiaCom = new modeloNoticias();
		$noticiasnoadmin = new modeloNoticias();

		// Obtenemos los articulos de noticias y las guardamos en una variable
		// se guarda en forma de array
		$listaNoticias = $noticias->obtenerNoticias();
		

		/*Obtenemos las areas y las guardamos en una variable
		se guarda en forma de array*/
		$datosAreasMenu = $areaMenu->obtenerAreasMenu();
		$datosAreasMenu2 = $areaMenu2->obtenerAreasMenu();
		$NoticiaVer = $ver->listaVer();
		$listanoadmin = $noticiasnoadmin->obtenerNoticiasnoAdmin();

		


	require_once("vista/vistaNoticias.php");
		if(isset($_POST['ver'])){
			$list = $_POST['listaver'];
			$añomes = $_POST['añomes'];

			echo "<script> window.location='noticias.php?lista2=$list';</script>";
		}

		
?>
