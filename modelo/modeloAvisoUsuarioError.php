<?php 

    // Colocamos el tipo de aviso (exito, error, advertencia, informe)
	$avisoTipo = "error"; 

    // Colocamos el mensaje que se va a mostrar
    $avisoMensaje = "Ah ocurrido un error";

    // Colocamos la nota que se mostrará debajo del mensaje principal, en caso de que se quiera, puede estar vacío
    $avisoNota = "Ya existe ese orden, ingrese otro";

    // Indicamos la url a la que nos llevará uno de los btns secundarios (btn de la izquierda)
    // Este nos llevará siempre al Inicio
    $informeUrl3 = "index.php";

    // Indicamos la url a la que nos llevará uno de los btns secundarios (btn del medio)
    // Este nos llevará a la página de la que venimos, ej: al cargar un articulo nos devuelve al editor en cuestion
    $informeUrl2 = "admin.php";

    // Indicamos la url a la que nos llevará el btn primario (btn de la derecha) (OBLIGATORIO)
    // Este nos llevará a la pagina donde se puede ver lo que cargamos, ej: estamos en editor novedades, tocamos este btn nos lleva a novedades
    $informeUrl1 = "admin.php";

    // Colocamos el texto de uno de los btns secundarios (btn de la izquierda)
    $informeTexto3 = "Volver a Inicio";

    // Colocamos el texto de uno de los btns secundarios (btn del medio)
    $informeTexto2 = "Volver a editor";

    // Colocamos el texto del btn primario (btn de la derecha) (OBLIGATORIO)
    $informeTexto1 = "Aceptar";

    /*########### IMPORTANTE ##########*/
    // Uno de los botones puede no mostrarse o variar su url para el caso del Login
    // quiza no sean necesario 3 btns, hay que evaluarlo

?>