<?php
	//error_reporting(0);
	require_once("modelo/modeloNoticias.php");
	$noticia = new modeloNoticias();
	$etiquetas = new modeloNoticias();
	$enlaces = new modeloNoticias();
/*	$comentarios = new modeloNoticias();
	$respuestas = new modeloNoticias();

	$agregarComentario = new modeloNoticias();
*/
	/*Iniciamos la variable para luego obtener todas las áreas*/
	$areaMenu = new modeloNoticias();
	$areaMenu2 = new modeloNoticias();

	$PonerNoticia = $noticia->MostrarNotiCompleta();
	$PonerEtiqueta = $etiquetas->obtenerEtiquetas();
	$PonerEnlace = $enlaces->obtenerEnlaces();
	/*$datosComentarios = $comentarios->mostrarComentarios();
	$datosRespuestas = $respuestas->mostrarRespuestas();
	*/
	/*Obtenemos las areas y las guardamos en una variable
	se guarda en forma de array*/
	$datosAreasMenu = $areaMenu->obtenerAreasMenu();
	$datosAreasMenu2 = $areaMenu2->obtenerAreasMenu();
	

	require_once("vista/vistaNoticiasIndividual.php");


?>
