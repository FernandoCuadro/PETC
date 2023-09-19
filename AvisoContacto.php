<?php 

    // Colocamos el tipo de aviso (exito, error, advertencia, informe)
	$avisoTipo = "exito"; 

    // Colocamos el mensaje que se va a mostrar
    $avisoMensaje = "La operacion se completó con éxito";

    // Colocamos la nota que se mostrará debajo del mensaje principal, en caso de que se quiera, puede estar vacío
    $avisoNota = "Se envió el mail correctamente";

    // Indicamos la url a la que nos llevará uno de los btns secundarios (btn de la izquierda)
    // Este nos llevará siempre al Inicio
    $informeUrl3 = "index.php";

    // Indicamos la url a la que nos llevará uno de los btns secundarios (btn del medio)
    // Este nos llevará a la página de la que venimos, ej: al cargar un articulo nos devuelve al editor en cuestion
    $informeUrl2 = "index.php";

    // Indicamos la url a la que nos llevará el btn primario (btn de la derecha) (OBLIGATORIO)
    // Este nos llevará a la pagina donde se puede ver lo que cargamos, ej: estamos en editor novedades, tocamos este btn nos lleva a novedades
    $informeUrl1 = "contacto.php";
	
    // Colocamos el texto de uno de los btns secundarios (btn de la izquierda)
    $informeTexto3 = "Volver a Inicio";

    // Colocamos el texto de uno de los btns secundarios (btn del medio)
    $informeTexto2 = "Volver";

    // Colocamos el texto del btn primario (btn de la derecha) (OBLIGATORIO)
    $informeTexto1 = "Aceptar";

    /*########### IMPORTANTE ##########*/
    // Uno de los botones puede no mostrarse o variar su url para el caso del Login
    // quiza no sean necesario 3 btns, hay que evaluarlo

?>	
<!DOCTYPE html>
<html lang="spanish">	
<head>
	
	<!--Meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; utf-8">

	<meta name="Revisit-after" content="7 days">
	<meta name="robots" content="all">

	<!--Link a icono y hojas de estilo-->
	<link rel="icon" type="image/jpg" href="img/Logo.png">
	<link rel="stylesheet" type="text/css" href="css/styleInforme4.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-web/css/all.css">

	<!-- Fuente usada para la introduccion sobre la imagen -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet"> 

	<!-- Fuente usada para los titulos -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>	
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> 	

	<!-- Fuente usada para la descripcion -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">  

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title>Informe</title>
</head>
<body>
	<a href="javascript:void(0);" id="scroll" title="Volver arriba">Top<span></span></a>

	<div id="contenedor-carga">
  			
		<div class="spinner"></div>
			
  	</div>

  	<div class="fondoOscuro">
  		
  	</div>

				
  	<!-- Empieza contenido de la pagina -->
  	<main>

  		<!--Este contenedor obtiene todos los datos-->
  		<div id="info-aviso">
  			<!--Solo colocamos el tipo de aviso, ej: error,exito,advertencia,informe-->
  			<p id="info-aviso__tipo"><?php echo $avisoTipo ?></p>
  			<!--Colocamos el mensaje que va a llevar el aviso-->
  			<p id="info-aviso__mensaje"><?php echo $avisoMensaje ?></p>
  			<!--Colocamos la nota que lleva el aviso, en caso de que necesite-->
  			<p id="info-aviso__nota"><?php echo $avisoNota ?></p>
  			<!--Colocamos url de tercer btn (izquierda)-->
  			<p id="info-aviso__url3"><?php echo $informeUrl3 ?></p>
  			<!--Colocamos url de segundo btn (medio)-->
  			<p id="info-aviso__url2"><?php echo $informeUrl2 ?></p>
  			<!--Colocamos url de primer btn (derecha)-->
  			<p id="info-aviso__url1"><?php echo $informeUrl1 ?></p>

  			<!--Colocamos texto de tercer btn (izquierda)-->
  			<p id="info-aviso__texto3"><?php echo $informeTexto3 ?></p>
  			<!--Colocamos texto de segundo btn (medio)-->
  			<p id="info-aviso__texto2"><?php echo $informeTexto2 ?></p>
  			<!--Colocamos texto de primer btn (derecha)-->
  			<p id="info-aviso__texto1"><?php echo $informeTexto1 ?></p>
  		</div>


  		<div id="contenedor-general-verificacion">

  			<!--Recuadro de prueba-->
  			<div id="contenedor-general-verificacion__mensaje" class="mensaje-informe">
  				<!--Mensaje en cuestion-->
  				<h4 id="mensaje-texto"></h4>
  				<i class="fa-solid fa-circle-info"></i>
  			</div>

  			<div class="mensaje-nota informe">
  				<p></p>
  			</div>

  			<div id="contenedor-general-verificacion__botones">
  				<a class="btn btn-secundario" id="tercerBtn" href=""></a>
  				<a class="btn btn-secundario" id="segundoBtn" href="" hidden></a>
  				<a class="btn" id="primerBtn" href=""></a>
  			</div>

  			<!--EJEMPLO MENSAJE DE EXITO-->

  			<!-- <div id="contenedor-general-verificacion__mensaje" class="mensaje-exito"> -->
  				<!--Mensaje en cuestion-->
  				<!-- <h4 id="mensaje-texto">¡El artículo se ha cargado de forma correcta!</h4>
  				<i class="fa-solid fa-circle-check"></i>
  			</div> -->



  			<!--EJEMPLO MENSAJE DE ADVERTENCIA-->

  			<!-- <div id="contenedor-general-verificacion__mensaje" class="mensaje-advertencia"> -->
  				<!--Mensaje en cuestion-->
  				<!-- <h4 id="mensaje-texto">Este es un mensaje de advertencia</h4>
  				<i class="fa-solid fa-triangle-exclamation"></i>
  			</div> -->



  			<!--EJEMPLO MENSAJE DE ERROR-->

  			<!-- <div id="contenedor-general-verificacion__mensaje" class="mensaje-error"> -->
  				<!--Mensaje en cuestion-->
  				<!-- <h4 id="mensaje-texto">El artículo no fue cargado</h4>
  				<i class="fa-solid fa-circle-xmark"></i>
  			</div> -->



  			<!--EJEMPLO NOTA DE ERROR-->

  			<!-- <div class="mensaje-nota error">
  				<p>NOTA: En caso de que el problema persista, contacte al soporte técnico por ayuda</p>
  			</div> -->



  			<!--EJEMPLO MENSAJE DE INFORME-->

  			<!-- <div id="contenedor-general-verificacion__mensaje" class="mensaje-informe"> -->
  				<!--Mensaje en cuestion-->
  				<!-- <h4 id="mensaje-texto">Se colocó una imagen por defecto como miniatura</h4>
  				<i class="fa-solid fa-circle-info"></i>
  			</div> -->



  			<!--EJEMPLO BOTONES-->

  			<!-- <div id="contenedor-general-verificacion__botones">
  				<a class="btn" href="#">Volver a Inicio</a>
  				<a class="btn" href="#">Volver atrás</a>
  				<a class="btn" id="btn-primario" href="#">OK</a>
  			</div> -->
  		</div>

  	</main>


  	<script src="js/avisosCursos.js"></script>
  	<script src="js/loaderScreen.js"></script>
	<script src="js/irArriba.js"></script>
	<script src="js/redesSociales.js"></script>
</body>
</html>