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
		if($_POST['ci'] == ""){
			echo "<script>window.alert('El campo usuario esta vacio');</script>";
		}elseif($_POST['contraseña'] == ""){
			echo "<script>window.alert('El campo contraseña esta vacio');</script>";
		}else{
	    $logueo = $logueoUsuarios->LoginUsuario($loginUsuario = $_POST['ci'],
	    $loginContraseña = md5($_POST['contraseña']));

		
		}
	}	
?>