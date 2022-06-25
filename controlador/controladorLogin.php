<?php

//	error_reporting(0);
	require_once("modelo/modeloLogin.php");

	/*Iniciamos la variable para obtener las crendenciales
	ingresadas por el usuario*/
	$logueoUsuarios = new modeloLogin();


	require_once("vista/vistaLogin.php");

	/*Al presionar en iniciar sesion (vista login), 
	se envian las crendenciales al modelo para allí ser 
	procesadas y ver si coincide con un usuario existente o no*/	
	if(isset($_POST['login'])){

	    $logueo = $logueoUsuarios->LoginUsuario($loginUsuario = $_POST['ci'],
	    $loginContraseña = md5($_POST['contraseña']));

		

	}	
?>