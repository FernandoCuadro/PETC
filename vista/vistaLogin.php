<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/jpg" href="img/Logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/styleLogin2.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">

	<?php //<!-- Fuente usada para los titulos --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> 

	<?php //<!-- Fuente usada para la descripcion --> ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title>Login</title>
</head>
<body>
	<div id="contenedor-carga">
  			
		<div class="spinner"></div>
			
  	</div>	

	<main>

		<div id="contenedor-login">
			<img src="img/fondo-login.jpg">	

			<div id="login-formulario">

				<h1>Inicio de sesión</h1>

				<p>Bienvenido al sitio web del Polo Educativo Tecnológico Cerro</p>

				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<input type="text" name="ci" placeholder="Ingrese su usuario" autofocus required>
					<input type="password" name="contraseña" placeholder="Ingrese su contraseña" autofocus required>
					<input type="submit" name="login" value="Iniciar sesión">
					<a href="index.php" id="volverIni">Volver al Inicio</a>

				</form>

			</div>
		</div>

	</main>

<<<<<<< HEAD
	<?php //<!--Script necesario para pantalla de carga--> ?>
	<script src="js/animaciones.js"></script>
=======
	<script src="js/loaderScreen.js"></script>
>>>>>>> b958538 (Hasta Cursos arreglado)
</body>
</html>