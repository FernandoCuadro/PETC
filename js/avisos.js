

/*########## INFORMES ###########*/

// Cuando se envie el formulario, oscurecemos el fondo de la pagina, para luego mostrar una ventana emergente
//const fondoOscuro = document.querySelector('.fondoOscuro');

// Btn submit, al hacer click en el se muestra el mensaje
//const submitCrearNivel = document.querySelector('#formularioNivel1 input[name="crearnivel"]');



// Datos para saber que aviso mostrar

// Elemento usado para obtener el tipo de aviso que necesitamos mostrar
const informeDatoTipo = document.querySelector('#info-aviso__tipo').textContent; 

// Elemento usado para obtener el mensaje para el aviso que mostraremos
const informeDatoMensaje = document.querySelector('#info-aviso__mensaje').textContent; 

// Elemento usado para obtener la nota que debe de tener el aviso
const informeDatoNota = document.querySelector('#info-aviso__nota').textContent; 

// Elemento usado para obtener la url del tercer btn (izquierda)
const informeDatoUrl3 = document.querySelector('#info-aviso__url3').textContent;

// Elemento usado para obtener la url del segundo btn (medio)
const informeDatoUrl2 = document.querySelector('#info-aviso__url2').textContent;

// Elemento usado para obtener la url del primer btn (derecha)
const informeDatoUrl1 = document.querySelector('#info-aviso__url1').textContent;

// Elemento usado para obtener el texto del tercer btn (izquierda)
const informeDatoTexto3 = document.querySelector('#info-aviso__texto3').textContent;

// Elemento usado para obtener el texto del segundo btn (medio)
const informeDatoTexto2 = document.querySelector('#info-aviso__texto2').textContent;

// Elemento usado para obtener el texto del primer btn (derecha)
const informeDatoTexto1 = document.querySelector('#info-aviso__texto1').textContent;






// Elementos a mostrar cuando tenemos los datos

// 
const informeContenedorGeneral = document.querySelector('.contenedor-general-verificacion');

// Elemento para colocar el tipo de aviso
const informeContenedor = document.querySelector('#contenedor-general-verificacion__mensaje');

// Elemento para colocar el mensaje que llevará el aviso
const informeMensaje = document.querySelector('#contenedor-general-verificacion__mensaje h4');

// Elemento para colocar el icono que llevará el aviso
const informeIcono = document.querySelector('#contenedor-general-verificacion__mensaje i');

// Elemento para colocar la nota del aviso
const informeNota = document.querySelector('.mensaje-nota');

// Elemento para colocar la url y el texto del tercer btn (izquierda)
let informeBtn3 = document.querySelector('#tercerBtn');

// Elemento para colocar la url y el texto del segundo btn (medio)
let informeBtn2 = document.querySelector('#segundoBtn');

// Elemento para colocar la url y el texto del primer btn (derecha)
let informeBtn1 = document.querySelector('#primerBtn');



/*########### ASIGNAMOS LOS VALORES SEGUN CORRESPONDA ############*/

// En caso de que el tipo de informe, mensaje, y el primer btn sean definidos
if((informeDatoTipo.toUpperCase() == "EXITO" ||
	informeDatoTipo.toUpperCase() == "ÉXITO" ||
    informeDatoTipo.toUpperCase() == "ADVERTENCIA" ||
    informeDatoTipo.toUpperCase() == "ERROR" ||
    informeDatoTipo.toUpperCase() == "INFORME") &&
    informeDatoMensaje !== "" &&
    informeDatoUrl1 !== "" &&
    informeDatoTexto1 !== ""){


   	// Eliminamos todos los estilos por defecto
	informeContenedor.classList.remove('mensaje-informe');
	informeMensaje.textContent = "";
	informeIcono.classList.remove('fa-circle-info');
	informeNota.classList.remove('informe');


	// Definimos el mensaje que tendrá el aviso
	informeMensaje.textContent = informeDatoMensaje;

	// Definimos la nota que tendrá el informe
	informeNota.textContent = informeDatoNota;


	// En caso de que el btn 3 este definido por url y texto lo mostramos
	if(informeDatoUrl3 !== "" && informeDatoTexto3 !== ""){

		// Definimos url y texto del tercer btn
		informeBtn3.classList.remove('noMostrar');
		informeBtn3.setAttribute('href', informeDatoUrl3);
		informeBtn3.textContent = informeDatoTexto3;

	}else{
	// En caso de que no este definido NO lo mostramos

		// No mostramos el btn
		informeBtn3.classList.add('noMostrar');
	}


	// En caso de que el btn 2 este definido por url y texto lo mostramos
	if(informeDatoUrl2 !== "" && informeDatoTexto2 !== ""){

		// Definimos url y texto del tercer btn
		informeBtn2.classList.remove('noMostrar');
		informeBtn2.setAttribute('href', informeDatoUrl2);
		informeBtn2.textContent = informeDatoTexto2;

	}else{
	// En caso de que no este definido NO lo mostramos

		// No mostramos el btn
		informeBtn2.classList.add('noMostrar');
	}

	// Definimos url y texto del bt1
	informeBtn1.setAttribute('href', informeDatoUrl1);
	informeBtn1.textContent = informeDatoTexto1;


	// En caso de que el tipo de mensaje que se quiere mostrar sea EXITO 
	if(informeDatoTipo.toUpperCase() == "EXITO" || informeDatoTipo.toUpperCase() == "ÉXITO"){

		// Agregamos la clase mensaje-exito, para darle el color y los demas estilos
		informeContenedor.classList.add('mensaje-exito');

		// Definimos el icono que tendrá
		informeIcono.classList.add('fa-circle-check');
		informeIcono.title = "Éxito";

		// Definimos el estilo de la nota
		informeNota.classList.add('exito');



	// En caso de que el tipo de mensaje que se quiere mostrar sea ADVERTENCIA 
	}else if(informeDatoTipo.toUpperCase() == "ADVERTENCIA"){

		// Agregamos la clase mensaje-advertencia, para darle el color y los demas estilos
		informeContenedor.classList.add('mensaje-advertencia');

		// Definimos el icono que tendrá
		informeIcono.classList.add('fa-triangle-exclamation');
		informeIcono.title = "Advertencia";

		// Definimos el estilo de la nota
		informeNota.classList.add('advertencia');



	// En caso de que el tipo de mensaje que se quiere mostrar sea ERROR 
	}else if(informeDatoTipo.toUpperCase() == "ERROR"){

		// Agregamos la clase mensaje-error, para darle el color y los demas estilos
		informeContenedor.classList.add('mensaje-error');

		// Definimos el icono que tendrá
		informeIcono.classList.add('fa-circle-xmark');
		informeIcono.title = "Error";

		// Definimos el estilo de la nota
		informeNota.classList.add('error');



	}else if(informeDatoTipo.toUpperCase() == "INFORME"){

		// Agregamos la clase mensaje-informe, para darle el color y los demas estilos
		informeContenedor.classList.add('mensaje-informe');

		// Definimos el icono que tendrá
		informeIcono.classList.add('fa-circle-info');
		informeIcono.title = "Información";

		// Definimos el estilo de la nota
		informeNota.classList.add('informe');

	}

}else{
// Definimos el tipo de aviso informe por defecto

	// Definimos los estilos y textos para informe por defecto
	informeContenedor.classList.add('mensaje-informe');
	informeMensaje.textContent = "No hay informes nuevos";
	informeIcono.classList.add('fa-circle-info');
	informeIcono.title = "Información";
	informeNota.classList.add('informe');
	informeNota.textContent = "En caso de que se registre una interacción con el sistema será redirigido de forma automática a esta página";

	// Btn izquierda, url y texto
	informeBtn3.setAttribute('href', 'index.php');
	informeBtn3.textContent = "Volver a Inicio";

	// Btn medio, url y texto
	informeBtn2.setAttribute('href', '');
	informeBtn2.textContent = "Volver atrás";
	informeBtn2.style.display = "none";

	// Btn derecha, url y texto
	informeBtn2.setAttribute('href', '');
	informeBtn1.textContent = "Aceptar";
	// Funcion para volver atras en caso de que se haga click en el btn
	
	/*	
	informeBtn1.addEventListener('click', () => {
		window.history.back()
	});
*/
}


// submitCrearNivel.addEventListener('click', function(event){
// 	event.preventDefault();
// });

// submitCrearNivel.addEventListener('click', mostrarAviso);

