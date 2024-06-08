
/*################# VALIDACIONES PARA EDITOR NOVEDADES ##########################*/

// algunas expresiones para validar los campos que tenemos
const expresiones = {
	ejemplo1: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	ejemplo2: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	titulo: /^.{5,100}$/, // Todos los caracteres min 0 max 100
	descripcion: /^(\n)*(\n*(.)){20,490}(\n)*$/, // Todos los caracteres, min 20 max 490, incluye saltos de linea/, // Todos los caracteres, minimo 20 max 490
	//contenido1: /^.{100,3000}$/, // Todos los caracteres, mínimo 100 max 3000
	contenido1: /^(\n)*(\n*(.)){100,3000}(\n)*$/, // Todos los caracteres, min 100 max 3000, incluye saltos de linea
	contenidos: /^(.{0,3000})(\n)*$/, // Todos los caracteres, mínimo 0 max 3000
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
	enlaceNoSeguro: /^(http:[//]+[//]+)/, //el enlace debe tener http://
	enlaceSeguro: /^(https:[//]+[//]+)/, //el enlace debe tener http://
	palabrasNoAdmitidas: /(\bidiota\b)|(\bestupido\b)|(\bestúpido\b)|(\bgil\b)|(\bputa\b)|(\bmongolico\b)|(\bputo\b)|(\bimbecil\b)|(\bchupapija\b)|(\bPuto\b)|(\bMongolico\b)|(\bImbecil\b)/
}

// campos que tenemos que validar
//const formulario = document.getElementById('formulario');
const submit = document.querySelector('#formulario input[type="submit"]');
const inputs = document.querySelectorAll("#formulario input");
const inputsFile = document.querySelectorAll('#formulario input[type="file"]');
const selects = document.querySelectorAll('#formulario select');
const dates = document.querySelectorAll('#formulario input[type="datetime-local"]');
const textareas = document.querySelectorAll('#formulario textarea');

const enlaceNovedades1 = document.querySelector('.grupo__enlaces input[name="url[]"]');
const enlaceNovedades2 = document.querySelector('.grupo__enlacess input[name="urlagr[]"]');
const enlaceNovedades3 = document.querySelector('.grupo__enlaces input[name="url3"]');
const enlaceNovedades4 = document.querySelector('.grupo__enlaces input[name="url4"]'		);
const enlaceNovedades5 = document.querySelector('.grupo__enlaces input[name="url5"]');


// los campos que son necesarios estan definidos como false
let aprobadoTitulo = false;
let aprobadoArea = false;
let aprobadoDescripcion = false;
let aprobadoContenido1 = false;
let aprobadoFecha = false;
let aprobadoEstado = false;

// vamos a aprobar uno por uno cada contenido extra
let aprobadoContenido2 = true;
let aprobadoContenido3 = true;
let aprobadoContenido4 = true;
let aprobadoContenido5 = true;

// vamos a aprobar uno por uno cada enlace
let aprobadoEnlace1 = true;
let aprobadoEnlaceEdit = true;



// funcion para validar que los campos tengan los caracteres que deben tener
const validarFormulario = (e) => {
	switch (e.target.name){
		case "titulo":

				// si los caracteres ingresados son mas del limite se borra el excedente
				const caracteresPermitidosTitulo = e.target.value.substring(0,100);
				e.target.value = caracteresPermitidosTitulo;

				let cantCaracteresTitulo = e.target.value.length;

				// limite de caracteres para el titulo
				const limiteTitulo = 100;	

				
				const hijosTitulo = document.querySelector('.grupo__titulo .contenedor-informacion').children;
				
				const iconoTitulo = document.querySelector('.grupo__titulo h3 i');
				
				// En caso de que se cumpla la expresion
				if(expresiones.titulo.test(e.target.value)){
					
					for (hijo of hijosTitulo){

						if(hijo.classList.item(0) == "textoInfo"){

							// En caso de que se encuentren palabras inapropiadas
							if(expresiones.palabrasNoAdmitidas.test(e.target.value)){

								// Mostramos mensaje de error
								hijo.classList.remove('textoValido');
								hijo.classList.add('textoError');
								hijo.textContent = "Se encontraron palabras inapropiadas";

								// Mostramos icono de error
								iconoTitulo.classList.remove('completo')
								iconoTitulo.classList.remove('fa-circle-check');
								iconoTitulo.classList.add('fa-circle-xmark');
								iconoTitulo.classList.add('error');
								iconoTitulo.title = "Campo incompleto";

								// Aprobamos el campo       
								aprobadoTitulo = false;

							}else{
							// En caso de que no se encuentren palabras inapropiadas

								// Mostramos mensaje de exito
								hijo.classList.remove('textoError');
								hijo.classList.add('textoValido');
								hijo.textContent = "Completado";

								// Mostramos icono de exito
								iconoTitulo.classList.remove('fa-triangle-exclamation');
								iconoTitulo.classList.remove('fa-circle-xmark');
								iconoTitulo.classList.remove('error');
								iconoTitulo.classList.add('completo')
								iconoTitulo.classList.add('fa-circle-check');
								iconoTitulo.title = "Campo completado";

								// Aprobamos el campo       
								aprobadoTitulo = true;

							}
							
						}

					}

				}else{
				// En caso de que no se cumpla la expresion

					for (hijo of hijosTitulo){

						if(hijo.classList.item(0) == "textoInfo"){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError')
							hijo.textContent = "Mínimo 5 caracteres";

							// En caso de que se encuentren palabras inapropiadas
							if(expresiones.palabrasNoAdmitidas.test(e.target.value)){
								// Mostramos mensaje de error
								hijo.textContent = "Se encontraron palabras inapropiadas";
							}
						}

					}

					// Mostramos icono de error
					iconoTitulo.classList.remove('fa-circle-check');
					iconoTitulo.classList.remove('fa-triangle-exclamation');
					iconoTitulo.classList.remove('completo');
					iconoTitulo.classList.add('error')
					iconoTitulo.classList.add('fa-circle-xmark');
					iconoTitulo.title = "Campo incompleto";

					// NO aprobamos el campo
					aprobadoTitulo = false;
				}

				// si los caracteres ingresados alcanzan el limite
				if(cantCaracteresTitulo >= limiteTitulo){

					for (hijo of hijosTitulo){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.textContent = "Límite de caracteres alcanzado";
							hijo.classList.add('activo');
						}
					}	
				/*		
					iconoTitulo.classList.remove('fa-circle-check');
					iconoTitulo.classList.remove('fa-triangle-exclamation');
					iconoTitulo.classList.remove('completo');
					iconoTitulo.classList.add('error')
					iconoTitulo.classList.add('fa-circle-xmark');
					iconoTitulo.title = "Campo incompleto";

					// NO aprobamos el campo
					aprobadoTitulo = false;
				*/
					//}
				
				} else {

					for (hijo of hijosTitulo){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.classList.remove('activo');
						}

					}
				}

				/*
					iconoTitulo.classList.remove('fa-triangle-exclamation');
								iconoTitulo.classList.remove('fa-circle-xmark');
								iconoTitulo.classList.remove('error');
								iconoTitulo.classList.add('completo')
								iconoTitulo.classList.add('fa-circle-check');
								iconoTitulo.title = "Campo completado";

								// Aprobamos el campo       
								aprobadoTitulo = true;
				*/

				//}


				// mostrar la cantidad de caracteres que fueron ingresados
				for (hijo of hijosTitulo){

					if(hijo.classList.item(0) == "cantCaracteres"){
						hijo.textContent = `${cantCaracteresTitulo}/${limiteTitulo}`;
					}

				}

				break;      
			
		case "area":
			
			const hijosArea = document.querySelector('.grupo__area .contenedor-informacion').children;
			const area = document.querySelector('.grupo__area select');
			const iconoArea = document.querySelector('.grupo__area h3 i');

			if(e.target.value != ""){

				for(hijo of hijosArea){

					if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";
					}

				}

					iconoArea.classList.remove('fa-circle-xmark');
					iconoArea.classList.remove('error');
					iconoArea.classList.add('completo')
					iconoArea.classList.add('fa-circle-check');
					iconoArea.title = "Campo completado";

				// el campo pasa a estar completo
				aprobadoArea = true;

			} else {

				for(hijo of hijosArea){

					if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError')
							hijo.textContent = "Seleccione un área para la novedad.";
					}

				}

				iconoArea.classList.remove('fa-circle-check');
				iconoArea.classList.remove('completo');
				iconoArea.classList.add('error')
				iconoArea.classList.add('fa-circle-xmark');
				iconoArea.title = "Campo incompleto";

				// el campo pasa a estar incompleto
				aprobadoArea = false;

			}

			break;      
		
		case "descripcion":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosDescripcion = e.target.value.substring(0,490);
			e.target.value = caracteresPermitidosDescripcion;

			let cantCaracteresDescripcion = e.target.value.length;

			// limite de caracteres para el descripcion
			const limiteDescripcion = 490;  

			const hijosDescripcion = document.querySelector('.grupo__descripcion .contenedor-informacion').children;
			const iconoDescripcion = document.querySelector('.grupo__descripcion h3 i');

			if(expresiones.descripcion.test(e.target.value)){
					// si se cumple la condicion de los caracteres
					
				for (hijo of hijosDescripcion){

					if(hijo.classList.item(0) == "textoInfo"){

						// En caso de que se encuentren palabras inapropiadas
						if(expresiones.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// Mostramos icono de error
							iconoDescripcion.classList.remove('completo')
							iconoDescripcion.classList.remove('fa-circle-check');
							iconoDescripcion.classList.add('fa-circle-xmark');
							iconoDescripcion.classList.add('error');
							iconoDescripcion.title = "Campo incompleto";

							// NO aprobamos el campo       
							aprobadoDescripcion = false;

						}else{
						// En caso de que no se encuentren palabras inapropiadas

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

							// Mostramos icono de exito
							iconoDescripcion.classList.remove('fa-triangle-exclamation');
							iconoDescripcion.classList.remove('fa-circle-xmark');
							iconoDescripcion.classList.remove('error');
							iconoDescripcion.classList.add('completo')
							iconoDescripcion.classList.add('fa-circle-check');
							iconoDescripcion.title = "Campo completado";

							// Aprobamos el campo       
							aprobadoDescripcion = true;

						}
					}	

				}

			} else {

				for (hijo of hijosDescripcion){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError')
						hijo.textContent = "Mínimo 20 caracteres";

						if(expresiones.palabrasNoAdmitidas.test(e.target.value)){
							hijo.textContent = "Se encontraron palabras inapropiadas";
						}
					}

				}

				iconoDescripcion.classList.remove('fa-circle-check');
				iconoDescripcion.classList.remove('fa-triangle-exclamation');
				iconoDescripcion.classList.remove('completo');
				iconoDescripcion.classList.add('error')
				iconoDescripcion.classList.add('fa-circle-xmark');
				iconoDescripcion.title = "Campo incompleto";

				// el campo pasa a estar incompleto
				aprobadoDescripcion = false;
			}

				// si los caracteres ingresados alcanzan el limite
				if(cantCaracteresDescripcion >= limiteDescripcion){

					for (hijo of hijosDescripcion){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.textContent = "Límite de caracteres alcanzado";
							hijo.classList.add('activo');
						}

					}
				
				} else {

					for (hijo of hijosDescripcion){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.classList.remove('activo');
						}

					}

				}


				// mostrar la cantidad de caracteres que fueron ingresados
				for (hijo of hijosDescripcion){

					if(hijo.classList.item(0) == "cantCaracteres"){
						hijo.textContent = `${cantCaracteresDescripcion}/${limiteDescripcion}`;
					}

				}
			break;      
		
		case "miniatura":

			const hijosMiniatura = document.querySelector('.grupo__miniatura .contenedor-informacion').children;
			const inputMiniatura = document.getElementById('inputMiniatura');
			const iconoMiniatura = document.querySelector('.grupo__miniatura h3 i');

			let archivosCargadosMiniatura = inputMiniatura.files.length;
			archivosCargadosMiniatura = parseInt(archivosCargadosMiniatura, 10)

			if(archivosCargadosMiniatura == 1){
			var archivo = inputMiniatura;
				var archivoRuta = archivo.value;
				var extPermitidas = /(.jpeg|.jpg|.png|.gif)$/i;
				if (!extPermitidas.exec(archivoRuta)){
					
				for (hijo of hijosMiniatura){

					if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError')
							hijo.textContent = "No es una imagen.";
					}

				}

				iconoMiniatura.classList.remove('fa-circle-check');
				iconoMiniatura.classList.remove('fa-triangle-exclamation');
				iconoMiniatura.classList.remove('completo');
				iconoMiniatura.classList.add('error')
				iconoMiniatura.classList.add('fa-circle-xmark');
				iconoMiniatura.title = "Campo incompleto";
				
				
			}else{
						for(hijo of hijosMiniatura){

					if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoAdvertencia');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

					}

				}

				iconoMiniatura.classList.remove('fa-triangle-exclamation');
				iconoMiniatura.classList.remove('fa-circle-xmark');
				iconoMiniatura.classList.remove('advertencia');
				iconoMiniatura.classList.remove('error');
				iconoMiniatura.classList.add('completo')
				iconoMiniatura.classList.add('fa-circle-check');
				iconoMiniatura.title = "Campo completado";
				aprobadoMiniatura = true;
					}
				
				
				
				
			} else {

				for (hijo of hijosMiniatura){

						if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoAdvertencia')
							hijo.textContent = "Ninguna imagen fue cargada. Colocando imagen por defecto.";
						}

				}

				iconoMiniatura.classList.remove('fa-circle-check');
				iconoMiniatura.classList.remove('fa-circle-xmark');
				iconoMiniatura.classList.remove('completo');
				iconoMiniatura.classList.add('fa-triangle-exclamation');
				iconoMiniatura.title = "Campo vacío";
				aprobadoMiniatura = true;
			}
			break;      
		
		case "contenido1":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosContenido1 = e.target.value.substring(0,3000);
			e.target.value = caracteresPermitidosContenido1;

			let cantCaracteresContenido1 = e.target.value.length;

			// limite de caracteres para el contenido1
			const limiteContenido1 = 3000;

			const hijosContenido1 = document.querySelector('.grupo__contenido1 .contenedor-informacion').children;
			const iconoContenido1 = document.querySelector('.grupo__contenido1 h3 i');

			// En caso de que se cumpla con la expresion
			if(expresiones.contenido1.test(e.target.value)){
	 			
				for (hijo of hijosContenido1){

					if(hijo.classList.item(0) == "textoInfo"){

						// En caso de que se encuentren palabras inapropiadas
						if(expresiones.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// Mostramos icono de error
							iconoContenido1.classList.remove('completo')
							iconoContenido1.classList.remove('fa-circle-check');
							iconoContenido1.classList.add('fa-circle-xmark');
							iconoContenido1.classList.add('error');
							iconoContenido1.title = "Campo incompleto";

							// NO aprobamos el campo
							aprobadoContenido1 = false;


						}else{
						// En caso de que no se encuentren palabras inapropiadas

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

							// Mostramos icono de exito
							iconoContenido1.classList.remove('fa-circle-xmark');
							iconoContenido1.classList.remove('error');
							iconoContenido1.classList.add('completo')
							iconoContenido1.classList.add('fa-circle-check');
							iconoContenido1.title = "Campo completado";

							// Aprobamos el campo
							aprobadoContenido1 = true;

						}
					}
				}

			}else{
			// En caso de que no se cumpla con la expresion

				for (hijo of hijosContenido1){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError')
						hijo.textContent = "Mínimo 100 caracteres.";

						if(expresiones.palabrasNoAdmitidas.test(e.target.value)){
							hijo.textContent = "Se encontraron palabras inapropiadas";
						}
					}

				}	

				// Mostramos icono de error
				iconoContenido1.classList.remove('fa-circle-check');
				iconoContenido1.classList.remove('fa-triangle-exclamation');
				iconoContenido1.classList.remove('completo');
				iconoContenido1.classList.add('error')
				iconoContenido1.classList.add('fa-circle-xmark');
				iconoContenido1.title = "Campo incompleto";

				// campo no aprobado
				aprobadoContenido1 = false;
					
			}

				// si los caracteres ingresados alcanzan el limite
				if(cantCaracteresContenido1 >= limiteContenido1){

					for (hijo of hijosContenido1){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.textContent = "Límite de caracteres alcanzado";
							hijo.classList.add('activo');
						}

					}
				
				} else {

					for (hijo of hijosContenido1){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.classList.remove('activo');
						}

					}

				}

				// mostrar la cantidad de caracteres que fueron ingresados
				for (hijo of hijosContenido1){

					if(hijo.classList.item(0) == "cantCaracteres"){
						hijo.textContent = `${cantCaracteresContenido1}/${limiteContenido1}`;
					}

				}
				 
			break;      
		
		case "archivo1":
			
			const hijosImagen1 = document.querySelector('.grupo__imagen1 .contenedor-informacion').children;
			const inputImagen1 = document.getElementById('inputImagen1');
			const iconoImagen1 = document.querySelector('.grupo__imagen1 h3 i');

			let archivosCargadosImagen1 = inputImagen1.files.length;
			archivosCargadosImagen1 = parseInt(archivosCargadosImagen1, 10)

			if(archivosCargadosImagen1 == 1){
				
				for(hijo of hijosImagen1){

					if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoAdvertencia');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

					}

				}

				iconoImagen1.classList.remove('fa-triangle-exclamation');
				iconoImagen1.classList.remove('fa-circle-xmark');
				iconoImagen1.classList.remove('advertencia');
				iconoImagen1.classList.remove('error');
				iconoImagen1.classList.add('completo')
				iconoImagen1.classList.add('fa-circle-check');
				iconoImagen1.title = "Campo completado";
				
				// el campo no es obligatorio
				// su valor ya es true
				
			} else {

				for (hijo of hijosImagen1){

						if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoAdvertencia')
							hijo.textContent = "Ninguna imagen fue cargada";
						}

				}

				iconoImagen1.classList.remove('fa-circle-check');
				iconoImagen1.classList.remove('fa-circle-xmark');
				iconoImagen1.classList.remove('completo');
				iconoImagen1.classList.add('fa-triangle-exclamation');
				iconoImagen1.title = "Campo vacío";
				
			}
			break;      

		case "contenido2":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosContenido2 = e.target.value.substring(0,3000);
			e.target.value = caracteresPermitidosContenido2;

			let cantCaracteresContenido2 = e.target.value.length;

			// limite de caracteres para el contenido2
			const limiteContenido2 = 3000;

			const hijosContenido2 = document.querySelector('.grupo__contenido2 .contenedor-informacion').children;
			const iconoContenido2 = document.querySelector('.grupo__contenido2 h3 i');

			// En caso de que se cumpla la expresion
			if(expresiones.contenidos.test(e.target.value)){
			
						for (hijo of hijosContenido2){

						if(hijo.classList.item(0) == "textoInfo"){

							// En caso de que el campo no esté vacío
							if(e.target.value !== ""){

								// En caso de que se encuentren palabras inapropiadas
								if(expresiones.palabrasNoAdmitidas.test(e.target.value)){

									// Mostramos mensaje de error
									hijo.classList.remove('textoValido');
									hijo.classList.remove('textoAdvertencia');
									hijo.classList.add('textoError');
									hijo.textContent = "Se encontraron palabras inapropiadas";

									// Mostramos icono de error
									iconoContenido2.classList.remove('completo')
									iconoContenido2.classList.remove('fa-circle-check');
									iconoContenido2.classList.remove('fa-triangle-exclamation');
									iconoContenido2.classList.remove('advertencia');
									iconoContenido2.classList.add('fa-circle-xmark');
									iconoContenido2.classList.add('error');
									iconoContenido2.title = "Campo incompleto";

									aprobadoContenido2 = false;

								}else{
								// En caso de que no se encuentren palabras inapropiadas

									// Mostramos mensaje de exito
									hijo.classList.remove('textoAdvertencia');
									hijo.classList.remove('textoError');
									hijo.classList.add('textoValido');
									hijo.textContent = "Completado";

									// Mostramos icono de exito
									iconoContenido2.classList.remove('fa-triangle-exclamation');
									iconoContenido2.classList.remove('advertencia');
									iconoContenido2.classList.remove('fa-circle-xmark');
									iconoContenido2.classList.remove('error');
									iconoContenido2.classList.add('completo');
									iconoContenido2.classList.add('fa-circle-check');
									iconoContenido2.title = "Campo completado";

									aprobadoContenido2 = true;

								}

								

							}else{
							// En caso de que la expresion no se cumpla

								// Mostramos mensaje de advertencia
								hijo.classList.remove('textoValido');
								hijo.classList.remove('textoError');
								hijo.classList.add('textoAdvertencia');
								hijo.textContent = "Este campo está vacío.";

								// Mostramos icono de advertencia
								iconoContenido2.classList.remove('fa-circle-xmark');
								iconoContenido2.classList.remove('error');
								iconoContenido2.classList.remove('fa-circle-check');
								iconoContenido2.classList.remove('completo');
								iconoContenido2.classList.add('advertencia')
								iconoContenido2.classList.add('fa-triangle-exclamation');
								iconoContenido2.title = "Campo vacío";

								aprobadoContenido2 = true;
							}
							
						}

				}

				// el campo no es obligatorio
				// su valor ya es true

			} else {
				// el campo puede quedar vacio
			}

			// si los caracteres ingresados alcanzan el limite
				if(cantCaracteresContenido2 >= limiteContenido2){

					for (hijo of hijosContenido2){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.textContent = "Límite de caracteres alcanzado";
							hijo.classList.add('activo');
						}

					}
				
				} else {

					for (hijo of hijosContenido2){

						if(hijo.classList.item(0) == "textoLimite"){							
							hijo.classList.remove('activo');
						}

					}

				}

				// mostrar la cantidad de caracteres que fueron ingresados
				for (hijo of hijosContenido2){

					if(hijo.classList.item(0) == "cantCaracteres"){
						hijo.textContent = `${cantCaracteresContenido2}/${limiteContenido2}`;
					}

				}
			break; 
			
		
	
		
		case "archivo2":
			
			const hijosImagen2 = document.querySelector('.grupo__imagen2 .contenedor-informacion').children;
			const inputImagen2 = document.getElementById('inputImagen2');
			const iconoImagen2 = document.querySelector('.grupo__imagen2 h3 i');

			let archivosCargadosImagen2 = inputImagen2.files.length;
			

			// En caso de que una imagen sea cargada
			if(archivosCargadosImagen2 == 1){

				for(hijo of hijosImagen2){

					if(hijo.classList.item(0) == "textoInfo"){

							// Mostramos mensaje de exito
							hijo.classList.remove('textoAdvertencia');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

					}

				}

				// Mostramos icono de exito
				iconoImagen2.classList.remove('fa-triangle-exclamation');
				iconoImagen2.classList.remove('fa-circle-xmark');
				iconoImagen2.classList.remove('advertencia');
				iconoImagen2.classList.remove('error');
				iconoImagen2.classList.add('completo')
				iconoImagen2.classList.add('fa-circle-check');
				iconoImagen2.title = "Campo completado";
				

				// el campo no es obligatorio
				// su valor ya es true

			}else{
			// En caso de que no se cargue ninguna imagen

				for (hijo of hijosImagen2){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de advertencia
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoAdvertencia')
						hijo.textContent = "Ninguna imagen fue cargada";
					}

				}

				// Mostramos icono de advertencia
				iconoImagen2.classList.remove('fa-circle-check');
				iconoImagen2.classList.remove('fa-circle-xmark');
				iconoImagen2.classList.remove('completo');
				iconoImagen2.classList.add('fa-triangle-exclamation');
				iconoImagen2.title = "Campo vacío";

			}
			break;      
		
		case "contenido3":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosContenido3 = e.target.value.substring(0,3000);
			e.target.value = caracteresPermitidosContenido3;

			let cantCaracteresContenido3 = e.target.value.length;

			// limite de caracteres para el contenido3
			const limiteContenido3 = 3000;

			const hijosContenido3 = document.querySelector('.grupo__contenido3 .contenedor-informacion').children;
			const iconoContenido3 = document.querySelector('.grupo__contenido3 h3 i');

			if(expresiones.contenidos.test(e.target.value)){

				for (hijo of hijosContenido3){

					if(hijo.classList.item(0) == "textoInfo"){

						if(e.target.value !== ""){

							// En caso de que se encuentren palabras inapropiadas
							if(expresiones.palabrasNoAdmitidas.test(e.target.value)){

								// Mostramos mensaje de error
								hijo.classList.remove('textoValido');
								hijo.classList.remove('textoAdvertencia');
								hijo.classList.add('textoError');
								hijo.textContent = "Se encontraron palabras inapropiadas";

								// Mostramos icono de error
								iconoContenido3.classList.remove('completo')
								iconoContenido3.classList.remove('fa-circle-check');
								iconoContenido3.classList.remove('fa-triangle-exclamation');
								iconoContenido3.classList.remove('advertencia');
								iconoContenido3.classList.add('fa-circle-xmark');
								iconoContenido3.classList.add('error');
								iconoContenido3.title = "Campo incompleto";

								aprobadoContenido3 = false;

							}else{
							// En caso de que no se encuentren palabras inapropiadas

								// Mostramos mensaje de exito
								hijo.classList.remove('textoAdvertencia');
								hijo.classList.remove('textoError');
								hijo.classList.add('textoValido');
								hijo.textContent = "Completado";

								// Mostramos icono de exito
								iconoContenido3.classList.remove('fa-triangle-exclamation');
								iconoContenido3.classList.remove('advertencia');
								iconoContenido3.classList.remove('fa-circle-xmark');
								iconoContenido3.classList.remove('error');
								iconoContenido3.classList.add('completo');
								iconoContenido3.classList.add('fa-circle-check');
								iconoContenido3.title = "Campo completado";

								aprobadoContenido3 = true;

							}

						}else{
						// En caso de que el campo este vacío

							for(hijo of hijosContenido3){

								if(hijo.classList.item(0) == "textoInfo"){

									// Mostramos mensaje de error
									hijo.classList.remove('textoValido');
									hijo.classList.remove('textoError');
									hijo.classList.add('textoAdvertencia');
									hijo.textContent = "Este campo está vacío";

									// Mostramos icono de error
									iconoContenido3.classList.remove('completo')
									iconoContenido3.classList.remove('fa-circle-check');
									iconoContenido3.classList.remove('fa-circle-xmark');
									iconoContenido3.classList.remove('error');
									iconoContenido3.classList.add('fa-triangle-exclamation');
									iconoContenido3.classList.add('advertencia');
									iconoContenido3.title = "Campo vacío";

									aprobadoContenido3 = true;

								}

							}

						}
						
					}
				}

				// el campo no es obligatorio
				// su valor ya es true

			}else{

			}

			// si los caracteres ingresados alcanzan el limite
				if(cantCaracteresContenido3 >= limiteContenido3){

					for (hijo of hijosContenido3){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.textContent = "Límite de caracteres alcanzado";
							hijo.classList.add('activo');
						}

					}
				
				} else {

					for (hijo of hijosContenido3){

						if(hijo.classList.item(0) == "textoLimite"){							
							hijo.classList.remove('activo');
						}

					}

				}

				// mostrar la cantidad de caracteres que fueron ingresados
				for (hijo of hijosContenido3){

					if(hijo.classList.item(0) == "cantCaracteres"){
						hijo.textContent = `${cantCaracteresContenido3}/${limiteContenido3}`;
					}

				}
			break;      

		case "archivo3":
			
			const hijosImagen3 = document.querySelector('.grupo__imagen3 .contenedor-informacion').children;
			const inputImagen3 = document.getElementById('inputImagen3');
			const iconoImagen3 = document.querySelector('.grupo__imagen3 h3 i');

			let archivosCargadosImagen3 = inputImagen3.files.length;
			archivosCargadosImagen3 = parseInt(archivosCargadosImagen3, 10)

			if(archivosCargadosImagen3 == 1){

				for(hijo of hijosImagen3){

					if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoAdvertencia');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

					}

				}

				iconoImagen3.classList.remove('fa-triangle-exclamation');
				iconoImagen3.classList.remove('fa-circle-xmark');
				iconoImagen3.classList.remove('advertencia');
				iconoImagen3.classList.remove('error');
				iconoImagen3.classList.add('completo')
				iconoImagen3.classList.add('fa-circle-check');
				iconoImagen3.title = "Campo completado";

				// el campo no es obligatorio
				// su valor ya es true

			} else {

				for (hijo of hijosImagen3){

						if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoAdvertencia')
							hijo.textContent = "Ninguna imagen fue cargada";
						}

				}

				iconoImagen3.classList.remove('fa-circle-check');
				iconoImagen3.classList.remove('fa-circle-xmark');
				iconoImagen3.classList.remove('completo');
				iconoImagen3.classList.add('fa-triangle-exclamation');
				iconoImagen3.title = "Campo vacío";

			}
			break;      
		
		case "contenido4":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosContenido4 = e.target.value.substring(0,3000);
			e.target.value = caracteresPermitidosContenido4;

			let cantCaracteresContenido4 = e.target.value.length;

			// limite de caracteres para el contenido4
			const limiteContenido4 = 3000;

			const hijosContenido4 = document.querySelector('.grupo__contenido4 .contenedor-informacion').children;
			const iconoContenido4 = document.querySelector('.grupo__contenido4 h3 i');

			if(expresiones.contenidos.test(e.target.value)){
					for (hijo of hijosContenido4){

						if(hijo.classList.item(0) == "textoInfo"){

							// En caso de que el campo NO esté vacío
							if(e.target.value !== ""){

								// En caso de que se encuentren palabras inapropiadas
								if(expresiones.palabrasNoAdmitidas.test(e.target.value)){

									// Mostramos mensaje de error
									hijo.classList.remove('textoAdvertencia');
									hijo.classList.remove('textoValido');
									hijo.classList.add('textoError');
									hijo.textContent = "Se encontraron palabras inapropiadas";

									// Mostramos icono de error
									iconoContenido4.classList.remove('fa-triangle-exclamation')
									iconoContenido4.classList.remove('advertencia');
									iconoContenido4.classList.remove('fa-circle-check')
									iconoContenido4.classList.remove('completo');
									iconoContenido4.classList.add('fa-circle-xmark');
									iconoContenido4.classList.add('error');
									iconoContenido4.title = "Campo incompleto";

									aprobadoContenido4 = false;

								}else{
								// En caso de que no se encuentren palabras inapropiadas

									// Mostramos mensaje de exito
									hijo.classList.remove('textoError');
									hijo.classList.remove('textoAdvertencia');
									hijo.classList.add('textoValido');
									hijo.textContent = "Completado";

									// Mostramos icono de exito
									iconoContenido4.classList.remove('fa-triangle-exclamation');
									iconoContenido4.classList.remove('advertencia');
									iconoContenido4.classList.remove('fa-circle-xmark')
									iconoContenido4.classList.remove('error');
									iconoContenido4.classList.add('completo')
									iconoContenido4.classList.add('fa-circle-check');
									iconoContenido4.title = "Campo completado";

									aprobadoContenido4 = true;

								}

								

							}else{
							// En caso de que el campo esté vacío

								hijo.classList.remove('textoError');
								hijo.classList.remove('textoValido');
								hijo.classList.add('textoAdvertencia');
								hijo.textContent = "Este campo está vacío.";

								iconoContenido4.classList.remove('fa-circle-check');
								iconoContenido4.classList.remove('fa-circle-xmark');
								iconoContenido4.classList.remove('completo');
								iconoContenido4.classList.remove('error');
								iconoContenido4.classList.add('advertencia')
								iconoContenido4.classList.add('fa-triangle-exclamation');
								iconoContenido4.title = "Campo vacío";

								aprobadoContenido4 = true;
							}
							
						}

				}

				// el campo no es obligatorio
				// su valor ya es true

			} else {
				// el campo puede quedar vacio
			}

			// si los caracteres ingresados alcanzan el limite
				if(cantCaracteresContenido4 >= limiteContenido4){

					for (hijo of hijosContenido4){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.textContent = "Límite de caracteres alcanzado";
							hijo.classList.add('activo');
						}

					}
				
				} else {

					for (hijo of hijosContenido4){

						if(hijo.classList.item(0) == "textoLimite"){							
							hijo.classList.remove('activo');
						}

					}

				}

				// mostrar la cantidad de caracteres que fueron ingresados
				for (hijo of hijosContenido4){

					if(hijo.classList.item(0) == "cantCaracteres"){
						hijo.textContent = `${cantCaracteresContenido4}/${limiteContenido4}`;
					}

				}
			break;      

		case "archivo4":
			
			const hijosImagen4 = document.querySelector('.grupo__imagen4 .contenedor-informacion').children;
			const inputImagen4 = document.getElementById('inputImagen4');
			const iconoImagen4 = document.querySelector('.grupo__imagen4 h3 i');

			let archivosCargadosImagen4 = inputImagen4.files.length;
			archivosCargadosImagen4 = parseInt(archivosCargadosImagen4, 10)

			if(archivosCargadosImagen4 == 1){

				for(hijo of hijosImagen4){

					if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoAdvertencia');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

					}

				}

				iconoImagen4.classList.remove('fa-triangle-exclamation');
				iconoImagen4.classList.remove('fa-circle-xmark');
				iconoImagen4.classList.remove('advertencia');
				iconoImagen4.classList.remove('error');
				iconoImagen4.classList.add('completo')
				iconoImagen4.classList.add('fa-circle-check');
				iconoImagen4.title = "Campo completado";

				// el campo no es obligatorio
				// su valor ya es true

			} else {

				for (hijo of hijosImagen4){

						if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoAdvertencia')
							hijo.textContent = "Ninguna imagen fue cargada";
						}

				}

				iconoImagen4.classList.remove('fa-circle-check');
				iconoImagen4.classList.remove('fa-circle-xmark');
				iconoImagen4.classList.remove('completo');
				iconoImagen4.classList.add('fa-triangle-exclamation');
				iconoImagen4.title = "Campo vacío";

			}
			break;      
		
		case "contenido5":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosContenido5 = e.target.value.substring(0,3000);
			e.target.value = caracteresPermitidosContenido5;

			let cantCaracteresContenido5 = e.target.value.length;

			// limite de caracteres para el contenido5
			const limiteContenido5 = 3000;

			const hijosContenido5 = document.querySelector('.grupo__contenido5 .contenedor-informacion').children;
			const iconoContenido5 = document.querySelector('.grupo__contenido5 h3 i');

			if(expresiones.contenidos.test(e.target.value)){
					for (hijo of hijosContenido5){

						if(hijo.classList.item(0) == "textoInfo"){

							// En caso de que el campo NO esté vacio
							if(e.target.value !== ""){

								// En caso de que se encuentren palabras inapropiadas
								if(expresiones.palabrasNoAdmitidas.test(e.target.value)){

									// Mostramos mensaje de error
									hijo.classList.remove('textoValido');
									hijo.classList.remove('textoAdvertencia');
									hijo.classList.add('textoError');
									hijo.textContent = "Se encontraron palabras inapropiadas";

									// Mostramos icono de error
									iconoContenido5.classList.remove('fa-triangle-exclamation');
									iconoContenido5.classList.remove('advertencia');
									iconoContenido5.classList.remove('fa-circle-check')
									iconoContenido5.classList.remove('completo');
									iconoContenido5.classList.add('error')
									iconoContenido5.classList.add('fa-circle-xmark');
									iconoContenido5.title = "Campo incompleto";

									aprobadoContenido5 = false;

								}else{
								// En caso de que no se encuentren palabras inapropiadas

									// Mostramos mensaje de exito
									hijo.classList.remove('textoAdvertencia');
									hijo.classList.remove('textoError');
									hijo.classList.add('textoValido');
									hijo.textContent = "Completado";

									// Mostramos icono de exito
									iconoContenido5.classList.remove('fa-triangle-exclamation');
									iconoContenido5.classList.remove('advertencia');
									iconoContenido5.classList.remove('fa-circle-xmark');
									iconoContenido5.classList.remove('error');
									iconoContenido5.classList.add('completo')
									iconoContenido5.classList.add('fa-circle-check');
									iconoContenido5.title = "Campo completado";

									aprobadoContenido5 = true;

								}

							}else{
							// En caso de que el campo esté vacío

								// Mostramos mensaje de advertencia
								hijo.classList.remove('textoValido');
								hijo.classList.remove('textoError');
								hijo.classList.add('textoAdvertencia');
								hijo.textContent = "Este campo está vacío.";

								// Mostramos icono de advertencia
								iconoContenido5.classList.remove('fa-circle-check');
								iconoContenido5.classList.remove('completo');
								iconoContenido5.classList.remove('fa-circle-xmark');
								iconoContenido5.classList.remove('error');
								iconoContenido5.classList.add('advertencia')
								iconoContenido5.classList.add('fa-triangle-exclamation');
								iconoContenido5.title = "Campo vacío";

								aprobadoContenido5 = true;
							}
							
						}

				}

				// el campo no es obligatorio
				// su valor ya es true

			} else {
				// el campo puede quedar vacio
			}

			// si los caracteres ingresados alcanzan el limite
				if(cantCaracteresContenido5 >= limiteContenido5){

					for (hijo of hijosContenido5){

						if(hijo.classList.item(0) == "textoLimite"){
							hijo.textContent = "Límite de caracteres alcanzado";
							hijo.classList.add('activo');
						}

					}
				
				} else {

					for (hijo of hijosContenido5){

						if(hijo.classList.item(0) == "textoLimite"){							
							hijo.classList.remove('activo');
						}

					}

				}

				// mostrar la cantidad de caracteres que fueron ingresados
				for (hijo of hijosContenido5){

					if(hijo.classList.item(0) == "cantCaracteres"){
						hijo.textContent = `${cantCaracteresContenido5}/${limiteContenido5}`;
					}

				}
			break;      
		
		case "archivo5":
			
			const hijosImagen5 = document.querySelector('.grupo__imagen5 .contenedor-informacion').children;
			const inputImagen5 = document.getElementById('inputImagen5');
			const iconoImagen5 = document.querySelector('.grupo__imagen5 h3 i');

			let archivosCargadosImagen5 = inputImagen5.files.length;
			archivosCargadosImagen5 = parseInt(archivosCargadosImagen5, 10)

			if(archivosCargadosImagen5 == 1){

				for(hijo of hijosImagen5){

					if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoAdvertencia');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

					}

				}

				iconoImagen5.classList.remove('fa-triangle-exclamation');
				iconoImagen5.classList.remove('fa-circle-xmark');
				iconoImagen5.classList.remove('advertencia');
				iconoImagen5.classList.remove('error');
				iconoImagen5.classList.add('completo')
				iconoImagen5.classList.add('fa-circle-check');
				iconoImagen5.title = "Campo completado";

				// el campo no es obligatorio
				// su valor ya es true

			} else {

				for (hijo of hijosImagen5){

						if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoAdvertencia')
							hijo.textContent = "Ninguna imagen fue cargada";
						}

				}

				iconoImagen5.classList.remove('fa-circle-check');
				iconoImagen5.classList.remove('fa-circle-xmark');
				iconoImagen5.classList.remove('completo');
				iconoImagen5.classList.add('fa-triangle-exclamation');
				iconoImagen5.title = "Campo vacío";

			}
			break;      
		
		case "fecha":
			
			const hijosFecha = document.querySelector('.grupo__fecha .contenedor-informacion').children;
			const iconoFecha = document.querySelector('.grupo__fecha h3 i');

			let fecha = document.querySelector('.grupo__fecha input[type="datetime-local"]');
			let fechaActual = new Date();

			const fechaActualAño = fechaActual.getFullYear();
			let fechaActualMonth = fechaActual.getMonth();
			fechaActualMonth = fechaActualMonth + 1;

			let fechaActualDia = fechaActual.getDate();
			let fechaActualHora = fechaActual.getHours();
			let fechaActualMinutos = fechaActual.getMinutes();

			let fechaActualMonthString = fechaActualMonth.toString();
			let fechaActualDiaString = fechaActualDia.toString();
			let fechaActualHoraString = fechaActualHora.toString();
			let fechaActualMinutosString = fechaActualMinutos.toString();

			if(fechaActualMonthString.length == 1){

				fechaActualMonth = '0' + fechaActualMonth;


			} 

			if(fechaActualDiaString.length == 1){

			    fechaActualDia = '0' + fechaActualDia;

			} 

			if(fechaActualHoraString.length == 1){

		        fechaActualHora = '0' + fechaActualHora;
		       
			} 

			if(fechaActualMinutosString.length == 1){

				fechaActualMinutos = '0' + fechaActualMinutos;


			} 
			

			fechaActual = fechaActualAño + '-' + 
		              fechaActualMonth + '-' + 
		              fechaActualDia + 'T' + 
		              fechaActualHora + ':' + 
		              fechaActualMinutos;

			

			if(fecha.value >= fechaActual){

				for(hijo of hijosFecha){

					if(hijo.classList.item(0) == "textoInfo"){
						hijo.classList.remove("textoError");
						hijo.classList.add("textoValido");
						hijo.textContent = "Completado";
					}

				}

				iconoFecha.classList.remove('fa-triangle-exclamation');
				iconoFecha.classList.remove('fa-circle-xmark');
				iconoFecha.classList.remove('error');
				iconoFecha.classList.add('completo')
				iconoFecha.classList.add('fa-circle-check');
				iconoFecha.title = "Campo completado";

				// campo aprobado
				aprobadoFecha = true;

			} else {

				for(hijo of hijosFecha){

					if(hijo.classList.item(0) == "textoInfo"){
						hijo.classList.remove("textoValido");
						hijo.classList.add("textoError");
						hijo.textContent = "La fecha de la novedad debe ser actual o posterior";
					}

				}

				iconoFecha.classList.remove('fa-circle-check');
				iconoFecha.classList.remove('fa-triangle-exclamation');
				iconoFecha.classList.remove('completo');
				iconoFecha.classList.add('error')
				iconoFecha.classList.add('fa-circle-xmark');
				iconoFecha.title = "Campo incompleto";

				// campo no aprobado
				aprobadoFecha = false;

			}
			break;



		case "url[]":

		const hijosEnlacesNovedades = document.querySelector('.grupo__enlaces .contenedor-informacion').children;
		const iconoEnlacesNovedades = document.querySelector('.grupo__enlaces h3 i');
			// El campo solo será aprobado en caso de que cumpla con la expresion de enlaces
			// o que el campo esté vacío
			if(expresiones.enlaceNoSeguro.test(e.target.value) ||
			   expresiones.enlaceSeguro.test(e.target.value) ||
			   enlaceNovedades1.value == ""){
				

					for (hijo of hijosEnlacesNovedades){
						if(hijo.classList.item(0) == "textoInfo"){
							hijo.classList.remove("textoError");
							hijo.classList.add("textoValido");
							hijo.textContent = "Completado";
						}
	
					}
	
	
					iconoEnlacesNovedades.classList.remove('fa-circle-xmark');
					iconoEnlacesNovedades.classList.remove('error');
					iconoEnlacesNovedades.classList.remove('advertencia');
					iconoEnlacesNovedades.classList.remove('fa-triangle-exclamation');

					iconoEnlacesNovedades.classList.add('fa-circle-check'),
					iconoEnlacesNovedades.classList.add('completo');
					iconoEnlacesNovedades.title = "Campo completado";
	
					// aprobamos el campo para que se pueda activar el btn submit
					aprobadoEnlace1 = true;
					

			
			
				}else{

				
				for (hijo of hijosEnlacesNovedades){

					hijo.classList.remove('textoValido');
					hijo.classList.add('textoError');
					hijo.textContent = "Ingrese el enlace correspondiente";

				}


				iconoEnlacesNovedades.classList.remove('fa-circle-check');
				iconoEnlacesNovedades.classList.remove('completo');
				iconoEnlacesNovedades.classList.add('fa-circle-xmark');
				iconoEnlacesNovedades.classList.add('error'),
				iconoEnlacesNovedades.title = "Campo incompleto";

				// NO aprobamos el campo, el btn submit sigue desactivado
				aprobadoEnlace1 = false;


			}

		break;




		case "urlagr[]":

		const hijosEnlacesNovedadesEditar = document.querySelector('.grupo__enlacess .contenedor-informacion').children;
		const iconoEnlacesNovedadesEditar = document.querySelector('.grupo__enlacess h3 i');
			// El campo solo será aprobado en caso de que cumpla con la expresion de enlaces
			// o que el campo esté vacío
			if(expresiones.enlaceNoSeguro.test(e.target.value) ||
			   expresiones.enlaceSeguro.test(e.target.value) ||
			   enlaceNovedades2.value == ""){
				

				for (hijo of hijosEnlacesNovedadesEditar){
					if(hijo.classList.item(0) == "textoInfo"){
						hijo.classList.remove("textoError");
						hijo.classList.add("textoValido");
						hijo.textContent = "Completado";
					}

				}
	
	
					iconoEnlacesNovedadesEditar.classList.remove('fa-circle-xmark');
					iconoEnlacesNovedadesEditar.classList.remove('error');
					iconoEnlacesNovedadesEditar.classList.remove('advertencia');
					iconoEnlacesNovedadesEditar.classList.remove('fa-triangle-exclamation');

					iconoEnlacesNovedadesEditar.classList.add('fa-circle-check'),
					iconoEnlacesNovedadesEditar.classList.add('completo');
					iconoEnlacesNovedadesEditar.title = "Campo completado";
	
					// aprobamos el campo para que se pueda activar el btn submit
					aprobadoEnlaceEdit = true;
					

			
			
				}else{

				
				for (hijo of hijosEnlacesNovedadesEditar){

					hijo.classList.remove('textoValido');
					hijo.classList.add('textoError');
					hijo.textContent = "Ingrese el enlace correspondiente";

				}


				iconoEnlacesNovedadesEditar.classList.remove('fa-circle-check');
				iconoEnlacesNovedadesEditar.classList.remove('completo');
				iconoEnlacesNovedadesEditar.classList.add('fa-circle-xmark');
				iconoEnlacesNovedadesEditar.classList.add('error'),
				iconoEnlacesNovedadesEditar.title = "Campo incompleto";

				// NO aprobamos el campo, el btn submit sigue desactivado
				aprobadoEnlaceEdit = false;


			}

		break;	



		case "estado":

			const hijosEstado = document.querySelector('.grupo__estado .contenedor-informacion').children;
			const estado = document.querySelector('.grupo__estado select');
			const iconoEstado = document.querySelector('.grupo__estado h3 i');

			if(estado.value == "activo" || estado.value == "inactivo"){

				for(hijo of hijosEstado){

					if(hijo.classList.item(0) == "textoInfo"){
						hijo.classList.remove("textoError");
						hijo.classList.add("textoValido");
						hijo.textContent = "Completado";
					}

				}

				iconoEstado.classList.remove('fa-circle-xmark');
				iconoEstado.classList.remove('error');
				iconoEstado.classList.add('completo')
				iconoEstado.classList.add('fa-circle-check');
				iconoEstado.title = "Campo completado";

				// campo aprobado
				aprobadoEstado = true;

			} else {

				for(hijo of hijosEstado){

					if(hijo.classList.item(0) == "textoInfo"){
						hijo.classList.remove("textoValido");
						hijo.classList.add("textoError");
						hijo.textContent = "Seleccione un estado para la novedad";
					}

				}

				iconoEstado.classList.remove('fa-circle-check');
				iconoEstado.classList.remove('completo');
				iconoEstado.classList.add('error')
				iconoEstado.classList.add('fa-circle-xmark');
				iconoEstado.title = "Campo incompleto";

				// campo no aprobado
				aprobadoEstado = false;

			}
			break;        
				
	}
}


// Función para mostrar el icono de enlaces, si el campo esta con un enlace que empiece 
// con http:// o https:// mostramos exito, sino mostramos error
// En caso de que el campo este vacio mostramos advertencia
const aprobadoEnlacesNovedades = (e) => {

	

	// en caso de que todos los enlaces sean aprobados, definimos la variable que los 
	// representa a todos como aprobada
	if(aprobadoEnlace1 == true){

		// en caso de que los campos este todos vacios solo mostramos 
		// mensaje de advertencia
		if(enlaceNovedades1.value == ""){

		   	for(hijo of hijosEnlacesNovedades){

		   		if(hijo.classList.item(0) == "textoInfo"){

		   			hijo.classList.remove('textoError');
		   			hijo.classList.remove('textoValido');
		   			hijo.classList.add('textoAdvertencia');
		   			hijo.textContent = "Ningún enlace fue colocado";

		   		}

		   	}

			iconoEnlacesNovedades.classList.remove('fa-circle-check');
			iconoEnlacesNovedades.classList.remove('fa-circle-xmark');
			iconoEnlacesNovedades.classList.remove('completo');
			iconoEnlacesNovedades.classList.remove('error');
			iconoEnlacesNovedades.classList.add('fa-triangle-exclamation');
			iconoEnlacesNovedades.classList.add('advertencia');
			iconoEnlacesNovedades.title = "Campos vacíos";

		}else{
		// pero por otro lado, si los campos estan aprobados porque uno de ellos fue
		// completado, mostramos mensaje de exito

			for(hijo of hijosEnlacesNovedades){

		   		if(hijo.classList.item(0) == "textoInfo"){

		   			hijo.classList.remove('textoError');
		   			hijo.classList.remove('textoAdvertencia');
		   			hijo.classList.add('textoValido');
		   			hijo.textContent = "Completado";

		   		}

		   	}

			iconoEnlacesNovedades.classList.remove('fa-triangle-exclamation');
			iconoEnlacesNovedades.classList.remove('fa-circle-xmark');
			iconoEnlacesNovedades.classList.remove('advertencia');
			iconoEnlacesNovedades.classList.remove('error');
			iconoEnlacesNovedades.classList.add('fa-circle-check');
			iconoEnlacesNovedades.classList.add('completo');
			iconoEnlacesNovedades.title = "Campo completado";

			

		}

	}else{
	// en caso de que los enlaces individuales no sean 
	// aprobados, la variable no es aprobada, por lo tanto btn submit no es activado
	// Mostramos mensaje de error

		for(hijo of hijosEnlacesNovedades){

	   		if(hijo.classList.item(0) == "textoInfo"){

	   			hijo.classList.remove('textoValido');
	   			hijo.classList.remove('textoAdvertencia');
	   			hijo.classList.add('textoError');
	   			hijo.textContent = 'Los enlaces deben comenzar por "https://" o "http://"';

	   		}

	   	}

		iconoEnlacesNovedades.classList.remove('fa-triangle-exclamation');
		iconoEnlacesNovedades.classList.remove('fa-circle-check');
		iconoEnlacesNovedades.classList.remove('advertencia');
		iconoEnlacesNovedades.classList.remove('completo');
		iconoEnlacesNovedades.classList.add('fa-circle-xmark');
		iconoEnlacesNovedades.classList.add('error');
		iconoEnlacesNovedades.title = "Campo incompleto";

	}

}


const formularioAprobado = (e) => {

	if(aprobadoTitulo == false ||
		aprobadoArea == false ||
		aprobadoDescripcion == false ||
		aprobadoContenido1 == false ||	
		aprobadoContenido2 == false ||
		aprobadoContenido3 == false ||
		aprobadoContenido4 == false ||
		aprobadoContenido5 == false ||
		aprobadoFecha == false ||
		aprobadoEnlace1 == false ||
		aprobadoEnlaceEdit == false ||
		aprobadoEstado == false){

		// si alguno de los campos necesarios es false, sigue desactivado
		submit.disabled = true;
		submit.classList.add('cursorInactivo');
		submit.title = "Complete el formulario para habilitar esta acción";

	}else{

		// cuando los campos necesarios esten completos lo activamos para
		// poder enviar el formulario
		submit.disabled = false;
		submit.classList.remove('cursorInactivo');
		submit.title = "Agregar novedad";

	}

}


// para los inputs
inputs.forEach((input) => {
	// comprobar que los caracteres ingresados son correctos
	input.addEventListener("keyup", validarFormulario)
	input.addEventListener("keydown", validarFormulario)
	input.addEventListener("blur", validarFormulario)
	input.addEventListener("focus", validarFormulario)

	// comprobar que todos los campos necesarios son correctos
	input.addEventListener("keyup", formularioAprobado)
	input.addEventListener("keydown", formularioAprobado)

	input.addEventListener("keyup", aprobadoEnlacesNovedades)
	input.addEventListener("keydown", aprobadoEnlacesNovedades)
	input.addEventListener("focus", aprobadoEnlacesNovedades)
	input.addEventListener("blur", aprobadoEnlacesNovedades)
});

// para los textarea
textareas.forEach((textarea) => {
	textarea.addEventListener("keyup", validarFormulario)
	textarea.addEventListener("keydown", validarFormulario)
	textarea.addEventListener("blur", validarFormulario)
	textarea.addEventListener("focus", validarFormulario)

	// comprobar que todos los campos necesarios son correctos
	textarea.addEventListener("keydown", formularioAprobado)
	textarea.addEventListener("keyup", formularioAprobado)
});

// para los input file
inputsFile.forEach((inputFile) => {
	inputFile.addEventListener("change", validarFormulario)
});

// para los select
selects.forEach((select) => {
	select.addEventListener("change", validarFormulario)
	select.addEventListener("blur", validarFormulario)
	select.addEventListener("focus", validarFormulario)

	// comprobar que todos los campos necesarios son correctos
	select.addEventListener("change", formularioAprobado)
	select.addEventListener("focus", formularioAprobado)
});

// para los input datetime-local
dates.forEach((date) => {
	date.addEventListener("change", validarFormulario)
	date.addEventListener("blur", validarFormulario)
	date.addEventListener("focus", validarFormulario)

	// comprobar que todos los campos necesarios son correctos
	date.addEventListener("change", formularioAprobado)
});



/*################ VALIDACIONES PARA EL EDITOR CURSOS ######################*/

// algunas expresiones para validar los campos que tenemos
const expresionesCursos = {
	nombre: /^[a-zA-ZÀ-ÿ\s\_\-]{5,40}$/, // Letras y espacios, pueden llevar acentos, guio y guion bajo
	orden: /[1-9]{1}/, // 1 numero
	enlaceNoSeguro: /^(http:[//]+[//]+)/, //el enlace debe tener http://
	enlaceSeguro: /^(https:[//]+[//]+)/, //el enlace debe tener http://
	numeros: /\d+/,
	letras: /[a-zA-z]+/,
	simbolos: /[!"#$%&/()=?¡¿'°¬^`~.,{}+´*+<>{}\]\\[;:_¨-]+/,
	palabrasNoAdmitidas: /(\bidiota\b)|(\bestupido\b)|(\bestúpido\b)|(\bgil\b)|(\bputa\b)/
}

// campos que tenemos que validar
/*NIVEL NUEVO*/
const submitNivel1 = document.querySelector('#formularioNivel1 input[type="submit"]');
const inputsNivel1 = document.querySelectorAll("#formularioNivel1 input");

/*NIVEL EDITAR*/
const selectNivel2 = document.querySelectorAll('#formularioNivel2 select');
const inputsNivel2 = document.querySelectorAll('#formularioNivel2 input');
const deleteNivel2 = document.querySelector('#deleteNivel2');
const submitNivel2 = document.querySelector('#submitNivel2');



/*CURSO NUEVO*/
const inputsCurso1 = document.querySelectorAll('#formularioCurso1 input');
const selectCurso1 = document.querySelectorAll('#formularioCurso1 select')
const submitCurso1 = document.querySelector('#formularioCurso1 input[type="submit"]');

/*CURSO EDITAR*/
const selectCurso2 = document.querySelectorAll('#formularioCurso2 select');
const inputsCurso2 = document.querySelectorAll('#formularioCurso2 input');
const deleteCurso2 = document.querySelector('#deleteCurso2');
const submitCurso2 = document.querySelector('#submitCurso2');


// los campos que son necesarios estan definidos como false
/*NIVEL*/
let aprobadoNombreNivelNuevo = false;
let aprobadoOrdenNivelNuevo = false;

let aprobadoNombreNivelAntiguoEditar = false;
let aprobadoNombreNivelEditar = false;
let aprobadoOrdenNivelEditar = false;

/*CURSO*/
let aprobadoNombreCursoNuevo = false;
let aprobadoNivelCursoNuevo = false;
let aprobadoEnlaceCursoNuevo = false;
let aprobadoImagenCursoNuevo = false;


let aprobadoNombreAntiguoCursoEditar = false;
let aprobadoNombreCursoEditar = false;
let aprobadoNivelCursoEditar = false;
let aprobadoEnlaceCursoEditar = false;
let aprobadoImagenCursoEditar = true;


// funcion para tomar los caracteres ingresados en los distintos campos
const validarFormularioNivel = (e) => {
	switch (e.target.name){
		case "nomnivel":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosNombreNivel1 = e.target.value.substring(0,40);
			e.target.value = caracteresPermitidosNombreNivel1;

			let canCaracteresPermitidosNombreNivel1 = e.target.value.length;

			// limite de caracteres para el nombre nivel 1
			const limiteNombreNivel1 = 40;

			const hijosNombreNivel1 = document.querySelector('#grupo__nivel1 .contenedor-informacion-nombre').children;
			const iconoNombreNivel1 = document.querySelector('#nombreNivel1 i');

			// En caso de que se cumpla la expresion
			if(expresionesCursos.nombre.test(e.target.value)){

				for(hijo of hijosNombreNivel1){

					if(hijo.classList.item(0) == "textoInfo"){

						// En caso de que se encuentren palabras inapropiadas
						if(expresionesCursos.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// Mostramos icono de error
							iconoNombreNivel1.classList.remove('completo')
							iconoNombreNivel1.classList.remove('fa-circle-check');
							iconoNombreNivel1.classList.add('fa-circle-xmark');
							iconoNombreNivel1.classList.add('error');
							iconoNombreNivel1.title = "Campo incompleto";

							// NO aprobamos el campo
							aprobadoNombreNivelNuevo = false;

						}else{
						// En caso de que no se encuentren palabras inapropiadas

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

							// Mostramos icono de exito
							iconoNombreNivel1.classList.remove('fa-circle-xmark');
							iconoNombreNivel1.classList.remove('error');
							iconoNombreNivel1.classList.add('completo')
							iconoNombreNivel1.classList.add('fa-circle-check');
							iconoNombreNivel1.title = "Campo completado";

							// Aprobamos el campo
							aprobadoNombreNivelNuevo = true;

						}

						

					}

				}

			}else{
			// En caso de que la expresion no se cumpla
				
				for(hijo of hijosNombreNivel1){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 5 caracteres";

						if(expresionesCursos.palabrasNoAdmitidas.test(e.target.value)){
							hijo.textContent = "Se encontraron palabras inapropiadas";
						}
							
						// En caso de que se ingrese un numero
						if(expresionesCursos.numeros.test(e.target.value)){
							// Mostramos mensaje de error
							hijo.textContent = "Números no tolerados";
						}

						// En caso de que se ingrese algun simbolo
						if(expresionesCursos.simbolos.test(e.target.value)){
							// Mostramos mensaje de error
							hijo.textContent = "Símbolos no tolerados";
						}	

					}

				}

				// NO aprobamos el campo
				aprobadoNombreNivelNuevo = false;

				iconoNombreNivel1.classList.remove('fa-circle-check');
				iconoNombreNivel1.classList.remove('fa-triangle-exclamation');
				iconoNombreNivel1.classList.remove('completo');
				iconoNombreNivel1.classList.add('error')
				iconoNombreNivel1.classList.add('fa-circle-xmark');
				iconoNombreNivel1.title = "Campo incompleto";	

			}	

			// si los caracteres ingresados alcanzan el limite
			if(canCaracteresPermitidosNombreNivel1 >= limiteNombreNivel1){

				for (hijo of hijosNombreNivel1){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.textContent = "Límite de caracteres alcanzado";
						hijo.classList.add('activo');
					}

				}
			
			} else {

				for (hijo of hijosNombreNivel1){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.classList.remove('activo');
					}

				}

			}

			// mostrar la cantidad de caracteres que fueron ingresados
			for (hijo of hijosNombreNivel1){

				if(hijo.classList.item(0) == "cantCaracteres"){
					hijo.textContent = `${canCaracteresPermitidosNombreNivel1}/${limiteNombreNivel1}`;
				}

			}
		break; 


		case "ordernivel":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosOrdenNivel1 = e.target.value.substring(0,1);
			e.target.value = caracteresPermitidosOrdenNivel1;

			let canCaracteresPermitidosOrdenNivel1 = e.target.value.length;

			// limite de caracteres para el nombre nivel 1
			const limiteOrdenNivel1 = 1;

			const hijosOrdenNivel1 = document.querySelector('#grupo__nivel1 .contenedor-informacion-orden').children;
			const iconoOrdenNivel1 = document.querySelector('#ordenNivel1 i');

			if(expresionesCursos.orden.test(e.target.value)){

				for(hijo of hijosOrdenNivel1){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				iconoOrdenNivel1.classList.remove('fa-triangle-exclamation');
				iconoOrdenNivel1.classList.remove('fa-circle-xmark');
				iconoOrdenNivel1.classList.remove('error');
				iconoOrdenNivel1.classList.add('completo')
				iconoOrdenNivel1.classList.add('fa-circle-check');
				iconoOrdenNivel1.title = "Campo completado";

				// el campo pasa a estar completo
				aprobadoOrdenNivelNuevo = true;
				
			}else{
				
				for(hijo of hijosOrdenNivel1){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Número mínimo: 1";
						
						if(expresionesCursos.letras.test(e.target.value)){
							hijo.textContent = "Letras no toleradas";
						}	

					}

				}

				iconoOrdenNivel1.classList.remove('fa-circle-check');
				iconoOrdenNivel1.classList.remove('fa-triangle-exclamation');
				iconoOrdenNivel1.classList.remove('completo');
				iconoOrdenNivel1.classList.add('error')
				iconoOrdenNivel1.classList.add('fa-circle-xmark');
				iconoOrdenNivel1.title = "Campo incompleto";

				// el campo pasa a estar incompleto
				aprobadoOrdenNivelNuevo = false;
			}

			// mostrar la cantidad de caracteres que fueron ingresados
			for (hijo of hijosOrdenNivel1){

				if(hijo.classList.item(0) == "cantCaracteres"){
					hijo.textContent = `${canCaracteresPermitidosOrdenNivel1}/${limiteOrdenNivel1}`;
				}

			}

		break;


		case "idnivel": 

			const hijosIdNivel2 = document.querySelector('#grupo__nivel2 .contenedor-informacion-id').children;
			const iconoIdNivel2 = document.querySelector('#idNivel2 i');

			if(e.target.value != ""){

				for(hijo of hijosIdNivel2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				iconoIdNivel2.classList.remove('fa-triangle-exclamation');
				iconoIdNivel2.classList.remove('fa-circle-xmark');
				iconoIdNivel2.classList.remove('error');
				iconoIdNivel2.classList.add('completo')
				iconoIdNivel2.classList.add('fa-circle-check');
				iconoIdNivel2.title = "Campo completado";

				// el campo pasa a estar completo
				aprobadoNombreNivelAntiguoEditar = true;
				
			}else{
				
				for(hijo of hijosIdNivel2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Seleccione un nivel ya ingresado";	

					}

				}

				iconoIdNivel2.classList.remove('fa-circle-check');
				iconoIdNivel2.classList.remove('fa-triangle-exclamation');
				iconoIdNivel2.classList.remove('completo');
				iconoIdNivel2.classList.add('error')
				iconoIdNivel2.classList.add('fa-circle-xmark');
				iconoIdNivel2.title = "Campo incompleto";

				// el campo pasa a estar incompleto
				aprobadoNombreNivelAntiguoEditar = false;
			}

		break;


		case "nomniveledit":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosNombreNivel2 = e.target.value.substring(0,40);
			e.target.value = caracteresPermitidosNombreNivel2;

			let canCaracteresPermitidosNombreNivel2 = e.target.value.length;

			// limite de caracteres para el nombre nivel 1
			const limiteNombreNivel2 = 40;

			const hijosNombreNivel2 = document.querySelector('#grupo__nivel2 .contenedor-informacion-nombre').children;
			const iconoNombreNivel2 = document.querySelector('#nombreNivel2 i');

			// En caso de que se cumpla la expresion
			if(expresionesCursos.nombre.test(e.target.value)){

				for(hijo of hijosNombreNivel2){

					if(hijo.classList.item(0) == "textoInfo"){

						// En caso de que se encuentren palabras inapropiadas
						if(expresionesCursos.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// Mostramos icono de error
							iconoNombreNivel2.classList.remove('completo')
							iconoNombreNivel2.classList.remove('fa-circle-check');
							iconoNombreNivel2.classList.add('fa-circle-xmark');
							iconoNombreNivel2.classList.add('error');
							iconoNombreNivel2.title = "Campo incompleto";

							// NO aprobamos el campo
							aprobadoNombreNivelEditar = false;

						}else{
						// En caso de que no se encuentren palabras inapropiadas

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

							// Mostramos icono de exito
							iconoNombreNivel2.classList.remove('fa-triangle-exclamation');
							iconoNombreNivel2.classList.remove('fa-circle-xmark');
							iconoNombreNivel2.classList.remove('error');
							iconoNombreNivel2.classList.add('completo')
							iconoNombreNivel2.classList.add('fa-circle-check');
							iconoNombreNivel2.title = "Campo completado";

							// Aprobamos el campo
							aprobadoNombreNivelEditar = true;

						}
				
					}

				}

				

			}else{
			// En caso de que no se cumpla la expresion
				
				for(hijo of hijosNombreNivel2){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 5 caracteres";

						// En caso de que se encuentren palabras inapropiadas
						if(expresionesCursos.palabrasNoAdmitidas.test(e.target.value)){
							// Mostramos mensaje de error
							hijo.textContent = "Se encontraron palabras inapropiadas";
						}	
						
						// En caso de que se ingresen numeros
						if(expresionesCursos.numeros.test(e.target.value)){
							// Mostramos mensaje de error
							hijo.textContent = "Números no tolerados";
						}	

						// En caso de que se ingresen simbolos
						if(expresionesCursos.simbolos.test(e.target.value)){
							// Mostramos mensaje de error
							hijo.textContent = "Símbolos no tolerados";
						}	

					}

				}

				// Mostramos icono de error
				iconoNombreNivel2.classList.remove('fa-circle-check');
				iconoNombreNivel2.classList.remove('fa-triangle-exclamation');
				iconoNombreNivel2.classList.remove('completo');
				iconoNombreNivel2.classList.add('error')
				iconoNombreNivel2.classList.add('fa-circle-xmark');
				iconoNombreNivel2.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoNombreNivelEditar = false;	

			}	

			// si los caracteres ingresados alcanzan el limite
			if(canCaracteresPermitidosNombreNivel2 >= limiteNombreNivel2){

				for (hijo of hijosNombreNivel2){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.textContent = "Límite de caracteres alcanzado";
						hijo.classList.add('activo');
					}

				}
			
			} else {

				for (hijo of hijosNombreNivel2){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.classList.remove('activo');
					}

				}

			}

			// mostrar la cantidad de caracteres que fueron ingresados
			for (hijo of hijosNombreNivel2){

				if(hijo.classList.item(0) == "cantCaracteres"){
					hijo.textContent = `${canCaracteresPermitidosNombreNivel2}/${limiteNombreNivel2}`;
				}

			}

		break;


		case "ordernivel2":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosOrdenNivel2 = e.target.value.substring(0,1);
			e.target.value = caracteresPermitidosOrdenNivel2;

			let canCaracteresPermitidosOrdenNivel2 = e.target.value.length;

			// limite de caracteres para el nombre nivel 1
			const limiteOrdenNivel2 = 1;

			const hijosOrdenNivel2 = document.querySelector('#grupo__nivel2 .contenedor-informacion-orden').children;
			const iconoOrdenNivel2 = document.querySelector('#ordenNivel2 i');

			// En caso de que se cumpla la expresion
			if(expresionesCursos.orden.test(e.target.value)){

				for(hijo of hijosOrdenNivel2){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de exito
						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				// Mostramos icono de exito
				iconoOrdenNivel2.classList.remove('fa-triangle-exclamation');
				iconoOrdenNivel2.classList.remove('fa-circle-xmark');
				iconoOrdenNivel2.classList.remove('error');
				iconoOrdenNivel2.classList.add('completo')
				iconoOrdenNivel2.classList.add('fa-circle-check');
				iconoOrdenNivel2.title = "Campo completado";

				// Aprobamos el campo
				aprobadoOrdenNivelEditar = true;
				
			}else{
			// En caso de que no se cumpla la expresion

				for(hijo of hijosOrdenNivel2){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Número mínimo: 1";
						
						// En caso de que se ingresen letras
						if(expresionesCursos.letras.test(e.target.value)){
							//Mostramos mensaje de error
							hijo.textContent = "Letras no toleradas";
						}	

						// En caso de que se ingresen simbolos
						if(expresionesCursos.simbolos.test(e.target.value)){
							//Mostramos mensaje de error
							hijo.textContent = "Símbolos no toleradas";
						}

					}

				}

				// Mostramos icono de error
				iconoOrdenNivel2.classList.remove('fa-circle-check');
				iconoOrdenNivel2.classList.remove('fa-triangle-exclamation');
				iconoOrdenNivel2.classList.remove('completo');
				iconoOrdenNivel2.classList.add('error')
				iconoOrdenNivel2.classList.add('fa-circle-xmark');
				iconoOrdenNivel2.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoOrdenNivelEditar = false;
			}

			// mostrar la cantidad de caracteres que fueron ingresados
			for (hijo of hijosOrdenNivel2){

				if(hijo.classList.item(0) == "cantCaracteres"){
					hijo.textContent = `${canCaracteresPermitidosOrdenNivel2}/${limiteOrdenNivel2}`;
				}

			}

		break;
		
	}

}


// funcion para validar que los campos de Cursos (Nuevo, Editar y Eliminar) estan completos
const validarFormularioCurso = (e) => {
	switch (e.target.name){

		// tomamos los campos de Crear cursos
		case "nomcurso": 

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosNombreCurso1 = e.target.value.substring(0,40);
			e.target.value = caracteresPermitidosNombreCurso1;

			let canCaracteresPermitidosNombreCurso1 = e.target.value.length;

			// limite de caracteres para el nombre nivel 1
			const limiteNombreCurso1 = 40;

			const hijosNombreCurso1 = document.querySelector('#grupo__curso1 .contenedor-informacion-nombre').children;
			const iconoNombreCurso1 = document.querySelector('#nombreCurso1 i');


			if(expresionesCursos.nombre.test(e.target.value)){

				for(hijo of hijosNombreCurso1){

					if(hijo.classList.item(0) == "textoInfo"){

						// En caso de que se encuentren palabras inapropiadas
						if(expresionesCursos.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// Mostramos icono de error
							iconoNombreCurso1.classList.remove('fa-circle-check');
							iconoNombreCurso1.classList.remove('completo');
							iconoNombreCurso1.classList.add('fa-circle-xmark');
							iconoNombreCurso1.classList.add('error');
							iconoNombreCurso1.title = "Campo completado";

							// NO aprobamos el campo
							aprobadoNombreCursoNuevo = false;

						}else{
						// En caso de que no se encuentren palabras inapropiadas

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

							// Mostramos icono de exito
							iconoNombreCurso1.classList.remove('fa-circle-xmark');
							iconoNombreCurso1.classList.remove('error');
							iconoNombreCurso1.classList.add('fa-circle-check');
							iconoNombreCurso1.classList.add('completo');
							iconoNombreCurso1.title = "Campo completado";

							// Aprobamos el campo
							aprobadoNombreCursoNuevo = true;

						}

					}

				}
				
			}else{
				
				for(hijo of hijosNombreCurso1){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 5 caracteres";

						if(expresionesCursos.palabrasNoAdmitidas.test(e.target.value)){
							hijo.textContent = "Se encontraron palabras inapropiadas";
						}
						
						if(expresionesCursos.numeros.test(e.target.value)){
							hijo.textContent = "Números no tolerados";
						}

						if(expresionesCursos.simbolos.test(e.target.value)){
							hijo.textContent = "Símbolos no tolerados";
						}	

					}

				}

				iconoNombreCurso1.classList.remove('fa-circle-check');
				iconoNombreCurso1.classList.remove('fa-triangle-exclamation');
				iconoNombreCurso1.classList.remove('completo');
				iconoNombreCurso1.classList.add('error')
				iconoNombreCurso1.classList.add('fa-circle-xmark');
				iconoNombreCurso1.title = "Campo incompleto";

				// el campo pasa a estar incompleto
				aprobadoNombreCursoNuevo = false;
			}

			// si los caracteres ingresados alcanzan el limite
			if(canCaracteresPermitidosNombreCurso1 >= limiteNombreCurso1){

				for (hijo of hijosNombreCurso1){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.textContent = "Límite de caracteres alcanzado";
						hijo.classList.add('activo');
					}

				}
			
			} else {

				for (hijo of hijosNombreCurso1){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.classList.remove('activo');
					}

				}

			}

			// mostrar la cantidad de caracteres que fueron ingresados
			for (hijo of hijosNombreCurso1){

				if(hijo.classList.item(0) == "cantCaracteres"){
					hijo.textContent = `${canCaracteresPermitidosNombreCurso1}/${limiteNombreCurso1}`;
				}

			}

		break;


		case "nivelcurso":

			const hijosIdCurso1 = document.querySelector('#grupo__curso1 .contenedor-informacion-id').children;
			const iconoNivelCurso1 = document.querySelector('#idNivelCurso1 i');

			// en caso de que el campo NO esté vacío mostramos mensaje de éxito
			if(e.target.value !== ""){

				for (hijo of hijosIdCurso1){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				iconoNivelCurso1.classList.remove('fa-circle-xmark');
				iconoNivelCurso1.classList.remove('error');
				iconoNivelCurso1.classList.add('completo')
				iconoNivelCurso1.classList.add('fa-circle-check');
				iconoNivelCurso1.title = "Campo completado";

				// aprobamos el campo para poder activar el btn submit
				aprobadoNivelCursoNuevo = true;

			}else{
				// en caso de que el campo esté vacío mostramos mensaje de error

				for (hijo of hijosIdCurso1){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Seleccione el nivel al que corresponde el curso";
					}

				}
				

				iconoNivelCurso1.classList.remove('fa-circle-check');
				iconoNivelCurso1.classList.remove('completo');
				iconoNivelCurso1.classList.add('error')
				iconoNivelCurso1.classList.add('fa-circle-xmark');
				iconoNivelCurso1.title = "Campo incompleto";

				// NO aprobamos el campo, dejamos desactivado el btn submit
				aprobadoNivelCursoNuevo = false;

			}

		break;


		case "imagencurso":
			
			const hijosImagenCurso1 = document.querySelector('#grupo__curso1 .contenedor-informacion-imagen').children;
			const inputImagenCurso1 = document.querySelector('#grupo__curso1 input[name="imagencurso"]');
			const iconoImagenCurso1 = document.querySelector('#imagenCurso1 i');
			let archivosCargadosImagenCurso1 = inputImagenCurso1.files.length;
			archivosCargadosImagenCurso1 = parseInt(archivosCargadosImagenCurso1, 10);
			
			

			if(archivosCargadosImagenCurso1 == 1 ){
				var archivo = inputImagenCurso1;
				var archivoRuta = archivo.value;
				var extPermitidas = /(.jpeg|.jpg|.png|.gif)$/i;
				if (!extPermitidas.exec(archivoRuta)){
					for (hijo of hijosImagenCurso1){

						if(hijo.classList.item(0) == "textoInfo"){
	
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "eso no es imagen.";
	
						}
					}
	
					iconoImagenCurso1.classList.remove('fa-circle-check');
					iconoImagenCurso1.classList.remove('completo');
					iconoImagenCurso1.classList.add('error');
					iconoImagenCurso1.classList.add('fa-circle-xmark');
					iconoImagenCurso1.title = "Campo incompleto";

					aprobadoImagenCursoNuevo = false;
				}else{
				for (hijo of hijosImagenCurso1){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}
				}

				iconoImagenCurso1.classList.remove('fa-circle-xmark');
				iconoImagenCurso1.classList.remove('error');
				iconoImagenCurso1.classList.add('fa-circle-check');
				iconoImagenCurso1.classList.add('completo');
				iconoImagenCurso1.title = "Campo completado";

				// precisa aprobar el campo, ya que es necesario
				aprobadoImagenCursoNuevo = true;
			}
			}else{

				for (hijo of hijosImagenCurso1){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Ninguna imagen fue cargada.";

					}
				}

				iconoImagenCurso1.classList.remove('fa-circle-check');
				iconoImagenCurso1.classList.remove('completo');
				iconoImagenCurso1.classList.add('error');
				iconoImagenCurso1.classList.add('fa-circle-xmark');
				iconoImagenCurso1.title = "Campo incompleto";

			
				// precisa aprobar el campo, ya que es necesario
				aprobadoImagenCursoNuevo = false;
			}

		break;


		case "enlacecurso":

			const hijosEnlaceCurso1 = document.querySelector('#grupo__curso1 .contenedor-informacion-enlace').children;
			const iconoEnlaceCurso1 = document.querySelector('#enlaceCurso1 i');


			// nos aseguramos que el enlace ingresado comience por http:// (enlaceNoSeguro)
			// o por https:// (enlaceSeguro)
			if(expresionesCursos.enlaceNoSeguro.test(e.target.value) || 
			   expresionesCursos.enlaceSeguro.test(e.target.value)){

				for (hijo of hijosEnlaceCurso1){

					hijo.classList.remove('textoError');
					hijo.classList.add('textoValido');
					hijo.textContent = "Completado";

				}


				iconoEnlaceCurso1.classList.remove('fa-circle-xmark');
				iconoEnlaceCurso1.classList.remove('error');
				iconoEnlaceCurso1.classList.add('fa-circle-check'),
				iconoEnlaceCurso1.classList.add('completo');
				iconoEnlaceCurso1.title = "Campo completado";

				// aprobamos el campo para que se pueda activar el btn submit
				aprobadoEnlaceCursoNuevo = true;
				
			}else{

				for (hijo of hijosEnlaceCurso1){

					hijo.classList.remove('textoValido');
					hijo.classList.add('textoError');
					hijo.textContent = "Ingrese el enlace correspondiente para el curso a ingresar";

				}


				iconoEnlaceCurso1.classList.remove('fa-circle-check');
				iconoEnlaceCurso1.classList.remove('completo');
				iconoEnlaceCurso1.classList.add('fa-circle-xmark');
				iconoEnlaceCurso1.classList.add('error'),
				iconoEnlaceCurso1.title = "Campo incompleto";

				// NO aprobamos el campo, el btn submit sigue desactivado
				aprobadoEnlaceCursoNuevo = false;

			}

		break;


		// tomamos los campos de Editar y Eliminar cursos
		case "idCurso":

			const hijosEditarCurso2 = document.querySelector('#grupo__curso2 .contenedor-informacion-curso').children;
			const iconoEditarCurso2 = document.querySelector('#editarCurso2 i');

			if(e.target.value !== ""){

				for (hijo of hijosEditarCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				iconoEditarCurso2.classList.remove('fa-circle-xmark');
				iconoEditarCurso2.classList.remove('error');
				iconoEditarCurso2.classList.add('fa-circle-check');
				iconoEditarCurso2.classList.add('completo');
				iconoEditarCurso2.title = "Campo completado";

				// aprobamos el campo para que el btn submit se active
				aprobadoNombreAntiguoCursoEditar = true;

			}else{	

				for (hijo of hijosEditarCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Seleccione un curso ya ingresado";

					}

				}

				iconoEditarCurso2.classList.remove('fa-circle-check');
				iconoEditarCurso2.classList.remove('completo');
				iconoEditarCurso2.classList.add('fa-circle-xmark');
				iconoEditarCurso2.classList.add('error');
				iconoEditarCurso2.title = "Campo incompleto";

				// aprobamos el campo para que el btn submit se active
				aprobadoNombreAntiguoCursoEditar = false;

			}
		break;

		case "nomcursoedit":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosNombreCurso2 = e.target.value.substring(0,40);
			e.target.value = caracteresPermitidosNombreCurso2;

			let canCaracteresPermitidosNombreCurso2 = e.target.value.length;

			// limite de caracteres para el nombre nivel 1
			const limiteNombreCurso2 = 40;

			const hijosNombreCurso2 = document.querySelector('#grupo__curso2 .contenedor-informacion-nombre').children;
			const iconoNombreCurso2 = document.querySelector('#nombreCurso2 i');

			// En caso de que se cumpla la expresion
			if(expresionesCursos.nombre.test(e.target.value)){

				for(hijo of hijosNombreCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						// En caso de que se encuentren palabras inapropiadas
						if(expresionesCursos.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// Mostramos icono de error
							iconoNombreCurso2.classList.remove('fa-circle-check');
							iconoNombreCurso2.classList.remove('completo');
							iconoNombreCurso2.classList.add('fa-circle-xmark');
							iconoNombreCurso2.classList.add('error');
							iconoNombreCurso2.title = "Campo completado";

							// NO aprobamos el campo
							aprobadoNombreCursoEditar = false;

						}else{
						// En caso de que no se encuentren palabras inapropiadas

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

							// Mostramos icono de exito
							iconoNombreCurso2.classList.remove('fa-circle-xmark');
							iconoNombreCurso2.classList.remove('error');
							iconoNombreCurso2.classList.add('fa-circle-check');
							iconoNombreCurso2.classList.add('completo');
							iconoNombreCurso2.title = "Campo completado";

							// Aprobamos el campo
							aprobadoNombreCursoEditar = true;

						}

					}

				}

			}else{
			// En caso de que la expresion no se cumpla

				for(hijo of hijosNombreCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 5 caracteres";

						// En caso de que se encuentren palabras inapropiadas
						if(expresionesCursos.palabrasNoAdmitidas.test(e.target.value)){
							// Mostramos mensaje de error
							hijo.textContent = "Se encontraron palabras inapropiadas";
						}

						// En caso de que se ingresen numeros
						if(expresionesCursos.numeros.test(e.target.value)){
							// Mostramos mensaje de error
							hijo.textContent = "Números no tolerados";
						}

						// En caso de que se ingresen simbolos
						if(expresionesCursos.simbolos.test(e.target.value)){
							// Mostramos mensaje de error
							hijo.textContent = "Símbolos no tolerados";
						}

					}

				}

				// Mostramos mensaje de error
				iconoNombreCurso2.classList.remove('fa-circle-check');
				iconoNombreCurso2.classList.remove('completo');
				iconoNombreCurso2.classList.add('fa-circle-xmark');
				iconoNombreCurso2.classList.add('error');
				iconoNombreCurso2.title = "Campo incompleto"

				// NO aprobamos el campo
				aprobadoNombreCursoEditar = false;

			}

			// si los caracteres ingresados alcanzan el limite
			if(canCaracteresPermitidosNombreCurso2 >= limiteNombreCurso2){

				for (hijo of hijosNombreCurso2){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.textContent = "Límite de caracteres alcanzado";
						hijo.classList.add('activo');
					}

				}
			
			} else {

				for (hijo of hijosNombreCurso2){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.classList.remove('activo');
					}

				}

			}


			// mostrar la cantidad de caracteres que fueron ingresados
			for (hijo of hijosNombreCurso2){

				if(hijo.classList.item(0) == "cantCaracteres"){
					hijo.textContent = `${canCaracteresPermitidosNombreCurso2}/${limiteNombreCurso2}`;
				}

			}

		break;


		case "nivelcursoedit":

			const hijosNivelCurso2 = document.querySelector('#grupo__curso2 .contenedor-informacion-nivel').children;
			const iconoNivelCurso2 = document.querySelector('#nivelCurso2 i');

			if(e.target.value !== ""){

				for(hijo of hijosNivelCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				iconoNivelCurso2.classList.remove('fa-circle-xmark');
				iconoNivelCurso2.classList.remove('error');
				iconoNivelCurso2.classList.add('fa-circle-check');
				iconoNivelCurso2.classList.add('completo');
				iconoNivelCurso2.title = "Campo completado";

				// aprobamos el campo, btn submit se activa
				aprobadoNivelCursoEditar = true;

			}else{

				for(hijo of hijosNivelCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Seleccione el nivel al que corresponde el curso";

					}

				}

				iconoNivelCurso2.classList.remove('fa-circle-check');
				iconoNivelCurso2.classList.remove('completo');
				iconoNivelCurso2.classList.add('fa-circle-xmark');
				iconoNivelCurso2.classList.add('error');
				iconoNivelCurso2.title = "Campo incompleto";

				// NO aprobamos el campo, btn submit sigue desactivado
				aprobadoNivelCursoEditar = false;

			}

		break;


		case "imagencursoedit":

			const hijosImagenCurso2 = document.querySelector('#grupo__curso2 .contenedor-informacion-imagen').children;
			const inputImagenCurso2 = document.querySelector('#grupo__curso2 input[name="imagencursoedit"]');
			const iconoImagenCurso2 = document.querySelector('#imagenCurso2 i');

			let archivosCargadosImagenCurso2 = inputImagenCurso2.files.length;
			archivosCargadosImagenCurso2 = parseInt(archivosCargadosImagenCurso2, 10)
			
			if(archivosCargadosImagenCurso2 == 1){
				var archivo = inputImagenCurso2;
				var archivoRuta = archivo.value;
				var extPermitidas = /(.jpeg|.jpg|.png|.gif)$/i;
				if (!extPermitidas.exec(archivoRuta)){
					for (hijo of hijosImagenCurso2){

						if(hijo.classList.item(0) == "textoInfo"){
	
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "eso no es imagen.";
	
						}
					}
					iconoImagenCurso2.classList.remove('fa-circle-check');
					iconoImagenCurso2.classList.remove('completo');
					iconoImagenCurso2.classList.add('fa-triangle-exclamation');
					iconoImagenCurso2.classList.add('advertencia');
					iconoImagenCurso2.title = "Campo incompleto";

					// precisa aprobar el campo, ya que es necesario
					aprobadoImagenCursoEditar = false;
				}else{	
				for(hijo of hijosImagenCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoAdvertencia');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}


				iconoImagenCurso2.classList.remove('fa-triangle-exclamation');
				iconoImagenCurso2.classList.remove('advertencia');
				iconoImagenCurso2.classList.add('fa-circle-check');
				iconoImagenCurso2.classList.add('completo');
				iconoImagenCurso2.title = "Campo completado";
				// precisa aprobar el campo, ya que es necesario
				aprobadoImagenCursoEditar = true;	
			}	
			}else{

				for(hijo of hijosImagenCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoAdvertencia');
						hijo.textContent = "Ninguna imagen fue cargada. Colocando imagen por defecto";

					}

				}


				iconoImagenCurso2.classList.remove('fa-circle-check');
				iconoImagenCurso2.classList.remove('completo');
				iconoImagenCurso2.classList.add('fa-triangle-exclamation');
				iconoImagenCurso2.classList.add('advertencia');
				iconoImagenCurso2.title = "Campo incompleto";
				aprobadoImagenCursoEditar = true;
			}

		break;


		case "enlacecursoedit":

			const hijosEnlaceCurso2 = document.querySelector('#grupo__curso2 .contenedor-informacion-enlace').children;
			const iconoEnlaceCurso2 = document.querySelector('#enlaceCurso2 i');

			if(expresionesCursos.enlaceNoSeguro.test(e.target.value) ||
			   expresionesCursos.enlaceSeguro.test(e.target.value)){

				for(hijo of hijosEnlaceCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				iconoEnlaceCurso2.classList.remove('fa-circle-xmark');
				iconoEnlaceCurso2.classList.remove('error');
				iconoEnlaceCurso2.classList.add('fa-circle-check');
				iconoEnlaceCurso2.classList.add('completo');
				iconoEnlaceCurso2.title = "Campo completado";

				// aprobamos el campo, el btn submit se activa
				aprobadoEnlaceCursoEditar = true;

			}else{

				for(hijo of hijosEnlaceCurso2){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Ingrese el enlace correspondiente para el curso a editar";

					}

				}

				iconoEnlaceCurso2.classList.remove('fa-circle-check');
				iconoEnlaceCurso2.classList.remove('completo');
				iconoEnlaceCurso2.classList.add('fa-circle-xmark');
				iconoEnlaceCurso2.classList.add('error');
				iconoEnlaceCurso2.title = "Campo incompleto";

				// NO aprobamos el campo, el btn submit sigue desactivado
				aprobadoEnlaceCursoEditar = false;
			}

		break;

	}
}



// Aprobar los formularios de Nivel - Crear
const formularioNivel1Aprobado = (e) => {

	if(aprobadoNombreNivelNuevo == false ||
	   aprobadoOrdenNivelNuevo == false){

		// si alguno de los campos necesarios es false, sigue desactivado
		submitNivel1.disabled = true;
		submitNivel1.classList.add('cursorInactivo');
		submitNivel1.title = "Complete el formulario para habilitar esta acción";

	}else{

		// cuando los campos necesarios esten completos lo activamos para
		// poder enviar el formulario
		submitNivel1.disabled = false;
		submitNivel1.classList.remove('cursorInactivo');
		submitNivel1.title = "Crear nivel";

	}
}


// Aprobar los formularios de Nivel - Editar
const formularioNivel2Aprobado = (e) => {

	if(aprobadoNombreNivelAntiguoEditar == false ||
	   aprobadoNombreNivelEditar == false ||
	   aprobadoOrdenNivelEditar == false){

		// si alguno de los campos necesarios es false, sigue desactivado btn submit
		submitNivel2.disabled = true;
		submitNivel2.classList.add('cursorInactivo');
		submitNivel2.title = "Complete el formulario para habilitar esta acción";


	}else{

		// cuando los campos necesarios esten completos activamos btn submit para
		// poder enviar el formulario
		submitNivel2.disabled = false;
		submitNivel2.classList.remove('cursorInactivo');
		submitNivel2.title = "Editar nivel seleccionado";

	}
}


// Aprobar los formularios de Nivel - Eliminar
const formularioNivel2AprobadoEliminar = (e) => {

	if(aprobadoNombreNivelAntiguoEditar == false){

		// si alguno de los campos necesarios es false, sigue desactivado btn submit
		deleteNivel2.disabled = true;
		deleteNivel2.classList.add('cursorInactivo');
		deleteNivel2.title = "Complete el formulario para habilitar esta acción";

		inputsNivel2.forEach((input) => {
			input.required = true;
		});


	}else{

		// cuando los campos necesarios esten completos activamos btn submit para
		// poder enviar el formulario
		deleteNivel2.disabled = false;
		deleteNivel2.classList.remove('cursorInactivo');
		deleteNivel2.title = "Eliminar nivel seleccionado";

		inputsNivel2.forEach((input) => {
			input.required = false;
		});

	}
}


// definimos los event listener
inputsNivel1.forEach((input) => {
	// comprobar que los caracteres ingresados son correctos
	input.addEventListener('keydown', validarFormularioNivel)
	input.addEventListener('keyup', validarFormularioNivel)
	input.addEventListener('blur', validarFormularioNivel)
	input.addEventListener('focus', validarFormularioNivel)
	input.addEventListener('change', validarFormularioNivel)

	input.addEventListener('keydown', formularioNivel1Aprobado)
	input.addEventListener('keyup', formularioNivel1Aprobado)
	input.addEventListener('blur', formularioNivel1Aprobado)
	input.addEventListener('focus', formularioNivel1Aprobado)
	input.addEventListener('change', formularioNivel1Aprobado)
});


selectNivel2.forEach((select) => {
	// comprobar que los caracteres ingresados son correctos
	select.addEventListener('change', validarFormularioNivel)

	select.addEventListener('change', formularioNivel2Aprobado)

	select.addEventListener('change', formularioNivel2AprobadoEliminar)
});

inputsNivel2.forEach((input) => {
	// comprobar que los caracteres ingresados son correctos
	input.addEventListener('keydown', validarFormularioNivel)
	input.addEventListener('keyup', validarFormularioNivel)
	input.addEventListener('blur', validarFormularioNivel)
	input.addEventListener('focus', validarFormularioNivel)
	input.addEventListener('change', validarFormularioNivel)

	input.addEventListener('keydown', formularioNivel2Aprobado)
	input.addEventListener('keyup', formularioNivel2Aprobado)
	input.addEventListener('blur', formularioNivel2Aprobado)
	input.addEventListener('focus', formularioNivel2Aprobado)
	input.addEventListener('change', formularioNivel2Aprobado)
});



// Aprobar los formularios de Curso - Crear
const formularioCurso1Aprobado = (e) => {

	if(aprobadoNombreCursoNuevo == false || 
	   aprobadoNivelCursoNuevo == false ||
	   aprobadoImagenCursoNuevo == false ||
	   aprobadoEnlaceCursoNuevo == false){

		// si alguno de los campos necesarios es false, sigue desactivado
		submitCurso1.disabled = true;
		submitCurso1.classList.add('cursorInactivo');
		submitCurso1.title = "Complete el formulario para habilitar esta acción";

	}else{

		// cuando los campos necesarios esten completos lo activamos para
		// poder enviar el formulario
		submitCurso1.disabled = false;
		submitCurso1.classList.remove('cursorInactivo');
		submitCurso1.title = "Crear curso";

	}
}


// Aprobar los formularios de Curso - Editar
const formularioCurso2Aprobado = (e) => {

	if(aprobadoNombreAntiguoCursoEditar == false || 
	   aprobadoNombreCursoEditar == false ||
	   aprobadoNivelCursoEditar == false ||
	   aprobadoImagenCursoEditar == false ||
	   aprobadoEnlaceCursoEditar == false){

		// si alguno de los campos necesarios es false, sigue desactivado
		submitCurso2.disabled = true;
		submitCurso2.classList.add('cursorInactivo');
		submitCurso2.title = "Complete el formulario para habilitar esta acción";


	}else{

		// cuando los campos necesarios esten completos lo activamos para
		// poder enviar el formulario
		submitCurso2.disabled = false;
		submitCurso2.classList.remove('cursorInactivo');
		submitCurso2.title = "Editar curso seleccionado";

	}
}

const formularioCurso2AprobadoEliminar = (e) => {

	if(aprobadoNombreAntiguoCursoEditar == false){

		deleteCurso2.disabled = true;
		deleteCurso2.classList.add('cursorInactivo');
		deleteCurso2.title = "Seleccione un curso para habilitar esta acción";

		inputsCurso2.forEach((input) => {
			input.required = true;
		});

		selectCurso2.forEach((select) => {
			select.required = true;
		});

	}else{

		deleteCurso2.disabled = false;
		deleteCurso2.classList.remove('cursorInactivo');
		deleteCurso2.title = "Eliminar curso seleccionado";

		inputsCurso2.forEach((input) => {
			input.required = false;
		});

		selectCurso2.forEach((select) => {
			select.required = false;
		});

	}

}


// definimos los event listener

// campos de Curso1
inputsCurso1.forEach((input) => {
	// comprobar que los caracteres ingresados son correctos
	input.addEventListener('keydown', validarFormularioCurso)
	input.addEventListener('keyup', validarFormularioCurso)
	input.addEventListener('blur', validarFormularioCurso)
	input.addEventListener('focus', validarFormularioCurso)
	input.addEventListener('change', validarFormularioCurso)

	input.addEventListener('keydown', formularioCurso1Aprobado)
	input.addEventListener('keyup', formularioCurso1Aprobado)
	input.addEventListener('blur', formularioCurso1Aprobado)
	input.addEventListener('focus', formularioCurso1Aprobado)
	input.addEventListener('change', formularioCurso1Aprobado)
});

selectCurso1.forEach((select) => {

	select.addEventListener('change', validarFormularioCurso);
	select.addEventListener('focus', validarFormularioCurso);

	select.addEventListener('change', formularioCurso1Aprobado);
	select.addEventListener('focus', formularioCurso1Aprobado);

});



// campos de Curso2
selectCurso2.forEach((select) => {
	// comprobar que los caracteres ingresados son correctos
	select.addEventListener('change', validarFormularioCurso)
	select.addEventListener('focus', validarFormularioCurso)

	select.addEventListener('change', formularioCurso2Aprobado)
	select.addEventListener('focus', formularioCurso2Aprobado)

	select.addEventListener('change', formularioCurso2AprobadoEliminar)
	select.addEventListener('focus', formularioCurso2AprobadoEliminar)
});


inputsCurso2.forEach((input) => {
	// comprobar que los caracteres ingresados son correctos
	input.addEventListener('keydown', validarFormularioCurso)
	input.addEventListener('keyup', validarFormularioCurso)
	input.addEventListener('blur', validarFormularioCurso)
	input.addEventListener('focus', validarFormularioCurso)
	input.addEventListener('change', validarFormularioCurso)

	input.addEventListener('keydown', formularioCurso2Aprobado)
	input.addEventListener('keyup', formularioCurso2Aprobado)
	input.addEventListener('blur', formularioCurso2Aprobado)
	input.addEventListener('focus', formularioCurso2Aprobado)
	input.addEventListener('change', formularioCurso2Aprobado)
});




/*################### VALIDACIONES PARA EDITOR NOSOTROS #######################*/

// algunas expresiones para validar los campos que tenemos
const expresionesNosotros = {
	nombre: /^[a-zA-ZÀ-ÿ\s\_\-]{2,40}$/, // Letras y espacios, pueden llevar acentos, guio y guion bajo
	rol: /^[a-zA-ZÀ-ÿ\s\_\-]{2,40}$/, // Letras y espacios, pueden llevar acentos, guio y guion bajo
	numeros: /\d+/,
	simbolos: /[!"#$%&/()=?¡¿'°¬^`~.,{}+´*+<>{}\]\\[;:_¨-]+/,
	palabrasNoAdmitidas: /(\bidiota\b)|(\bestupido\b)|(\bestúpido\b)|(\bgil\b)|(\bputa\b)/
}




// campos que tenemos que validar o necesitamos del formulario en cuestion
/*AGREGAR IMAGENES*/
const inputsFileNosotrosImagen = document.querySelectorAll('#grupo__nosotrosImagen1 input');
const submitAgregar = document.querySelector('#grupo__nosotrosImagen1 .submit');


/*ELIMINAR IMAGENES*/
const selectsNosotrosImagen = document.querySelectorAll('#grupo__nosotrosImagen2 select');
const submitEliminar = document.querySelector('#grupo__nosotrosImagen2 .btns-submit .submit');



/*AGREGAR INTEGRANTES*/
const inputsNosotrosIntegrantesAgregar = document.querySelectorAll('.grupo__nosotrosIntegrantes1 input');
const submitAgregarIntegrante = document.querySelector('.grupo__nosotrosIntegrantes1 .submit');


/*ELIMINAR INTEGRANTES*/
const inputsNosotrosIntegrantesEditar = document.querySelectorAll('.grupo__nosotrosIntegrantes2 input');
const selectsNosotrosIntegrantesEditar = document.querySelectorAll('.grupo__nosotrosIntegrantes2 select');
const submitEditarIntegrante = document.querySelector('.grupo__nosotrosIntegrantes2 .submit');
const deleteEditarIntegrante = document.querySelector('.grupo__nosotrosIntegrantes2 .delete');




// los campos que son necesarios estan definidos como false

// los campos que son necesarios estan definidos como false
/*AGREGAR IMAGENES*/





/*AGREGAR IMAGENES A LA GALERIA*/

let aprobadoNosotrosAgregarImagen = false;

/*AGREGAR INTEGRANTES*/
let aprobadoNosotrosAgregarIntegranteNombre = false;
let aprobadoNosotrosAgregarIntegranteRol = false;
let aprobadoNosotrosAgregarImagenes = true;

/*ELIMINAR INTEGRANTES*/
let aprobadoNosotrosEditarIntegranteId = false;
let aprobadoNosotrosEditarIntegranteNombre = false;
let aprobadoNosotrosEditarIntegranteRol = false;
let aprobadoNosotrosEditarImagen = true;


// funcion para tomar las imagenes ingresadas
const formularioNosotrosImagen = (e) => {

	switch(e.target.name){

		// CUANDO SE AGREGA UNA IMAGEN
		case "imagengaleria[]":

			const inputFileNosotrosImagen = document.querySelector('#grupo__nosotrosImagen1 input[name="imagengaleria[]"]');
			let archivosCargadosNosotrosAgregarImagen = inputFileNosotrosImagen.files.length;
			// convertimos a dato tipo Int sistema decimal, para poder trabajar con el dato obtenido
			archivosCargadosNosotrosAgregarImagen = parseInt(archivosCargadosNosotrosAgregarImagen, 10);

			if(archivosCargadosNosotrosAgregarImagen > 0){
				var archivo = inputFileNosotrosImagen;
				var archivoRuta = archivo.value;
				var extPermitidas = /(.jpeg|.jpg|.png|.gif)$/i;
				if (!extPermitidas.exec(archivoRuta)){
					aprobadoNosotrosAgregarImagen = false;


					}else{
						aprobadoNosotrosAgregarImagen = true;
					}
					
					
				

			}else{

				aprobadoNosotrosAgregarImagen = false;

			}

		break;		

	}

}




// Funcion para CREAR EDITAR y ELIMINAR integrantes
const formularioNosotrosIntegrante = (e) => {

	switch(e.target.name){

		case "nombreint":

			// si los caracteres ingresados son mas del limite se borra el excedente
			const caracteresPermitidosAgregarIntegranteNombre = e.target.value.substring(0,30);
			e.target.value = caracteresPermitidosAgregarIntegranteNombre;

			let canCaracteresPermitidosAgregarIntegranteNombre = e.target.value.length;

			// limite de caracteres para el nombre nivel 1
			const limiteAgregarIntegranteNombre = 30;

			const hijosAgregarIntegranteNombre = document.querySelector('.grupo__nosotrosIntegrantes1 .contenedor-informacion-agregarIntegrante').children;
			const iconoAgregarIntegranteNombre = document.querySelector('#nombreAgregarIntegrante i');

			// en caso de que el campo cumpla con la expresion regular correspondiente
			if(expresionesNosotros.nombre.test(e.target.value)){

				if(expresionesNosotros.palabrasNoAdmitidas.test(e.target.value)){

					for(hijo of hijosAgregarIntegranteNombre){

						if(hijo.classList.item(0) == "textoInfo"){

							// mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

						}

					}

					// mostramos icono de error
					iconoAgregarIntegranteNombre.classList.remove('fa-circle-check');
					iconoAgregarIntegranteNombre.classList.remove('completo');
					iconoAgregarIntegranteNombre.classList.add('fa-circle-xmark');
					iconoAgregarIntegranteNombre.classList.add('error');
					iconoAgregarIntegranteNombre.title = "Campo incompleto";

					// NO aprobamos el campo
					aprobadoNosotrosAgregarIntegranteNombre = false;

				}else{

					for(hijo of hijosAgregarIntegranteNombre){

						if(hijo.classList.item(0) == "textoInfo"){

							// mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

						}

					}

					// mostramos icono de exito
					iconoAgregarIntegranteNombre.classList.remove('fa-circle-xmark');
					iconoAgregarIntegranteNombre.classList.remove('error');
					iconoAgregarIntegranteNombre.classList.add('fa-circle-check');
					iconoAgregarIntegranteNombre.classList.add('completo');
					iconoAgregarIntegranteNombre.title = "Campo completado";

					// aprobamos el campo para que luego se pueda activar el btn submit
					aprobadoNosotrosAgregarIntegranteNombre = true;

				}
	

			}else{	
				// en caso de que el campo no cumpla la expresion regular correspondiente

				for(hijo of hijosAgregarIntegranteNombre){

					if(hijo.classList.item(0) == "textoInfo"){

						// mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 2 caracteres";

						if(expresionesNosotros.numeros.test(e.target.value)){

							// en caso de que un numero sea ingresado mostramos un error
							hijo.textContent = "Números no tolerados";

						}

						if(expresionesNosotros.simbolos.test(e.target.value)){

							// en caso de que un numero sea ingresado mostramos un error
							hijo.textContent = "Símbolos no tolerados";

						}

					}

				}

				// mostramos icono de error
				iconoAgregarIntegranteNombre.classList.remove('fa-circle-check');
				iconoAgregarIntegranteNombre.classList.remove('completo');
				iconoAgregarIntegranteNombre.classList.add('fa-circle-xmark');
				iconoAgregarIntegranteNombre.classList.add('error');
				iconoAgregarIntegranteNombre.title = "Campo incompleto";

				// NO aprobamos el campo, btn submit sigue desactivado
				aprobadoNosotrosAgregarIntegranteNombre = false;

			}


			// si los caracteres ingresados alcanzan el limite
			if(canCaracteresPermitidosAgregarIntegranteNombre >= limiteAgregarIntegranteNombre){

				for (hijo of hijosAgregarIntegranteNombre){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.textContent = "Límite de caracteres alcanzado";
						hijo.classList.add('activo');
					}

				}
			
			} else {

				for (hijo of hijosAgregarIntegranteNombre){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.classList.remove('activo');
					}

				}

			}


			// mostrar la cantidad de caracteres que fueron ingresados
			for (hijo of hijosAgregarIntegranteNombre){

				if(hijo.classList.item(0) == "cantCaracteres"){
					hijo.textContent = `${canCaracteresPermitidosAgregarIntegranteNombre}/${limiteAgregarIntegranteNombre}`;
				}

				}

		break;


		case "cargoint":

			const caracteresPermitidosAgregarIntegranteRol = e.target.value.substring(0,25);
			e.target.value = caracteresPermitidosAgregarIntegranteRol;

			let canCaracteresPermitidosAgregarIntegranteRol = e.target.value.length;

			// limite de caracteres para el nombre nivel 1
			const limiteAgregarIntegranteRol = 25;

			const hijosNosotrosAgregarIntegranteRol = document.querySelector('.grupo__nosotrosIntegrantes1 .contenedor-informacion-agregarRol').children;
			const iconoNosotrosAgregarIntegranteRol = document.querySelector('#rolAgregarIntegrante i');

			if(expresionesNosotros.rol.test(e.target.value)){



				if(expresionesNosotros.palabrasNoAdmitidas.test(e.target.value)){

					for(hijo of hijosNosotrosAgregarIntegranteRol){

						if(hijo.classList.item(0) == "textoInfo"){

							// mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

						}

					}

					// mostramos icono de error
					iconoNosotrosAgregarIntegranteRol.classList.remove('fa-circle-check');
					iconoNosotrosAgregarIntegranteRol.classList.remove('completo');
					iconoNosotrosAgregarIntegranteRol.classList.add('fa-circle-xmark');
					iconoNosotrosAgregarIntegranteRol.classList.add('error');
					iconoNosotrosAgregarIntegranteRol.title = "Campo incompleto";

					// NO aprobamos el campo
					aprobadoNosotrosAgregarIntegranteRol = false;

				}else{

					for(hijo of hijosNosotrosAgregarIntegranteRol){

						if(hijo.classList.item(0) == "textoInfo"){

							// mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

						}

					}

					// mostramos icono de exito
					iconoNosotrosAgregarIntegranteRol.classList.remove('fa-circle-xmark');
					iconoNosotrosAgregarIntegranteRol.classList.remove('error');
					iconoNosotrosAgregarIntegranteRol.classList.add('fa-circle-check');
					iconoNosotrosAgregarIntegranteRol.classList.add('completo');
					iconoNosotrosAgregarIntegranteRol.title = "Campo completado";

					// aprobamos el campo para que luego se pueda activar el btn submit
					aprobadoNosotrosAgregarIntegranteRol = true;

				}

			}else{

				for(hijo of hijosNosotrosAgregarIntegranteRol){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 2 caracteres";

						// en caso de que un numero sea ingresado mostramos un error
						if(expresionesNosotros.numeros.test(e.target.value)){

							hijo.textContent = "Números no tolerados";

						}

						// en caso de que un simbolo sea ingresado mostramos un error
						if(expresionesNosotros.simbolos.test(e.target.value)){

							hijo.textContent = "Símbolos no tolerados";

						}

					}

				}

				iconoNosotrosAgregarIntegranteRol.classList.remove('fa-circle-check');
				iconoNosotrosAgregarIntegranteRol.classList.remove('completo');
				iconoNosotrosAgregarIntegranteRol.classList.add('fa-circle-xmark');
				iconoNosotrosAgregarIntegranteRol.classList.add('error');
				iconoNosotrosAgregarIntegranteRol.title = "Campo incompleto";


				aprobadoNosotrosAgregarIntegranteRol = false;

			}


			// si los caracteres ingresados alcanzan el limite
			if(canCaracteresPermitidosAgregarIntegranteRol >= limiteAgregarIntegranteRol){

				for (hijo of hijosNosotrosAgregarIntegranteRol){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.textContent = "Límite de caracteres alcanzado";
						hijo.classList.add('activo');
					}

				}
			
			} else {

				for (hijo of hijosNosotrosAgregarIntegranteRol){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.classList.remove('activo');
					}

				}

			}


			// mostrar la cantidad de caracteres que fueron ingresados
			for (hijo of hijosNosotrosAgregarIntegranteRol){

				if(hijo.classList.item(0) == "cantCaracteres"){
					hijo.textContent = `${canCaracteresPermitidosAgregarIntegranteRol}/${limiteAgregarIntegranteRol}`;
				}

			}

		break;


		case "fotoint":

			const inputAgregarIntegranteImagen = document.querySelector('.grupo__nosotrosIntegrantes1 input[name="fotoint"]');

			let archivosCargadosAgregarIntegranteImagen = inputAgregarIntegranteImagen.files.length;
			// convertimos a dato tipo Int sistema decimal, para poder trabajar con el dato obtenido
			archivosCargadosAgregarIntegranteImagen = parseInt(archivosCargadosAgregarIntegranteImagen, 10);

			const hijosAgregarIntegranteImagen = document.querySelector('.grupo__nosotrosIntegrantes1 .contenedor-informacion-agregarImagen').children;
			const iconoAgregarIntegranteImagen = document.querySelector('#imagenAgregarIntegrante i');

			if(archivosCargadosAgregarIntegranteImagen == 1){
				var archivo = inputAgregarIntegranteImagen;
				var archivoRuta = archivo.value;
				var extPermitidas = /(.jpeg|.jpg|.png|.gif)$/i;
				if (!extPermitidas.exec(archivoRuta)){
					for(hijo of hijosAgregarIntegranteImagen){

						if(hijo.classList.item(0) == "textoInfo"){
	
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoAdvertencia');
							hijo.textContent = "No es una imagen";
	
						}
	
					}
	
					iconoAgregarIntegranteImagen.classList.remove('fa-circle-check');
					iconoAgregarIntegranteImagen.classList.remove('completo');
					iconoAgregarIntegranteImagen.classList.add('fa-triangle-exclamation');
					iconoAgregarIntegranteImagen.classList.add('advertencia');
					iconoAgregarIntegranteImagen.title = "Campo vacío";
					aprobadoNosotrosAgregarImagenes = false;
					}else{
						for(hijo of hijosAgregarIntegranteImagen){

							if(hijo.classList.item(0) == "textoInfo"){
		
								hijo.classList.remove('textoAdvertencia');
								hijo.classList.add('textoValido');
								hijo.textContent = "Completado";
		
							}
		
						}
		
		
						iconoAgregarIntegranteImagen.classList.remove('fa-triangle-exclamation');
						iconoAgregarIntegranteImagen.classList.remove('advertencia');
						iconoAgregarIntegranteImagen.classList.add('fa-circle-check');
						iconoAgregarIntegranteImagen.classList.add('completo');
						iconoAgregarIntegranteImagen.title = "Campo completado";
						aprobadoNosotrosAgregarImagenes = true;
					}
				
				
			}else{

				for(hijo of hijosAgregarIntegranteImagen){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoAdvertencia');
						hijo.textContent = "Ninguna imagen fue cargada. Colocando imagen por defecto";

					}

				}

				iconoAgregarIntegranteImagen.classList.remove('fa-circle-check');
				iconoAgregarIntegranteImagen.classList.remove('completo');
				iconoAgregarIntegranteImagen.classList.add('fa-triangle-exclamation');
				iconoAgregarIntegranteImagen.classList.add('advertencia');
				iconoAgregarIntegranteImagen.title = "Campo vacío";
				aprobadoNosotrosAgregarImagenes = true;

			}

		break;


		// EDITAR/ELIMINAR 

		case "idint":

			const hijosEditarIntegrantesID = document.querySelector('.grupo__nosotrosIntegrantes2 .contenedor-informacion-editarID').children;
			const iconoEditarIntegranteID = document.querySelector('#idEditarIntegrante i');

			if(e.target.value !== ""){

				for(hijo of hijosEditarIntegrantesID){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}


				iconoEditarIntegranteID.classList.remove('fa-circle-xmark');
				iconoEditarIntegranteID.classList.remove('error');
				iconoEditarIntegranteID.classList.add('fa-circle-check');
				iconoEditarIntegranteID.classList.add('completo');
				iconoEditarIntegranteID.title = "Campo completado";


				aprobadoNosotrosEditarIntegranteId = true;

			}else{

				for(hijo of hijosEditarIntegrantesID){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Seleccione un integrante ya ingresado";

					}

				}

				iconoEditarIntegranteID.classList.remove('fa-circle-check');
				iconoEditarIntegranteID.classList.remove('completo');
				iconoEditarIntegranteID.classList.add('fa-circle-xmark');
				iconoEditarIntegranteID.classList.add('error');
				iconoEditarIntegranteID.title = "Campo incompleto";


				aprobadoNosotrosEditarIntegranteId = false;

			}

		break;


		case "nombreintedit":

			const caracteresPermitidosEditarIntegranteNombre = e.target.value.substring(0,30);
			e.target.value = caracteresPermitidosEditarIntegranteNombre;

			let canCaracteresPermitidosEditarIntegranteNombre = e.target.value.length;

			// limite de caracteres para EDITAR INTEGRANTE
			const limiteEditarIntegranteNombre = 30;

			const hijosEditarIntegrantesNombre = document.querySelector('.grupo__nosotrosIntegrantes2 .contenedor-informacion-editarNombre').children;
			const iconoEditarIntegranteNombre = document.querySelector('#nombreEditarIntegrante i');

			if(expresionesNosotros.nombre.test(e.target.value)){

				// En caso de que se encuentren palabras inapropiadas
				if(expresionesNosotros.palabrasNoAdmitidas.test(e.target.value)){

					for(hijo of hijosEditarIntegrantesNombre){

						if(hijo.classList.item(0) == "textoInfo"){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

						}

					}

					// Mostramos icono de error
					iconoEditarIntegranteNombre.classList.remove('fa-circle-check');
					iconoEditarIntegranteNombre.classList.remove('completo');
					iconoEditarIntegranteNombre.classList.add('fa-circle-xmark');
					iconoEditarIntegranteNombre.classList.add('error');
					iconoEditarIntegranteNombre.title = "Campo incompleto";

					// NO aprobamos el campo
					aprobadoNosotrosEditarIntegranteNombre = false;

				}else{	
				// En caso de que NO se encuentren palabras inapropiadas

					for(hijo of hijosEditarIntegrantesNombre){

						if(hijo.classList.item(0) == "textoInfo"){

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

						}

					}


					// Mostramos icono de exito
					iconoEditarIntegranteNombre.classList.remove('fa-circle-xmark');
					iconoEditarIntegranteNombre.classList.remove('error');
					iconoEditarIntegranteNombre.classList.add('fa-circle-check');
					iconoEditarIntegranteNombre.classList.add('completo');
					iconoEditarIntegranteNombre.title = "Campo completado";

					// Aprobamos el campo
					aprobadoNosotrosEditarIntegranteNombre = true;

				}

			}else{
			// En caso de que la expresion correspondiente no se cumpla

				for(hijo of hijosEditarIntegrantesNombre){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 2 caracteres";

						// en caso de que un numero sea ingresado mostramos un error
						if(expresionesNosotros.numeros.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.textContent = "Números no tolerados";

						}

						// en caso de que un simbolo sea ingresado mostramos un error
						if(expresionesNosotros.simbolos.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.textContent = "Símbolos no tolerados";

						}

					}

				}

				// Mostramos icono de error
				iconoEditarIntegranteNombre.classList.remove('fa-circle-check');
				iconoEditarIntegranteNombre.classList.remove('completo');
				iconoEditarIntegranteNombre.classList.add('fa-circle-xmark');
				iconoEditarIntegranteNombre.classList.add('error');
				iconoEditarIntegranteNombre.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoNosotrosEditarIntegranteNombre = false;

			}


			// si los caracteres ingresados alcanzan el limite
			if(canCaracteresPermitidosEditarIntegranteNombre >= limiteEditarIntegranteNombre){

				for (hijo of hijosEditarIntegrantesNombre){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.textContent = "Límite de caracteres alcanzado";
						hijo.classList.add('activo');
					}

				}
			
			} else {

				for (hijo of hijosEditarIntegrantesNombre){

					if(hijo.classList.item(0) == "textoLimite"){
						hijo.classList.remove('activo');
					}

				}

			}


			// mostrar la cantidad de caracteres que fueron ingresados
			for(hijo of hijosEditarIntegrantesNombre){

				if(hijo.classList.item(0) == "cantCaracteres"){

					hijo.textContent = `${canCaracteresPermitidosEditarIntegranteNombre}/${limiteEditarIntegranteNombre}`;

				}

			}

		break;


		case "cargointedit":

			const caracteresPermitidosEditarIntegranteRol = e.target.value.substring(0,25);
			e.target.value = caracteresPermitidosEditarIntegranteRol;

			let canCaracteresPermitidosEditarIntegranteRol = e.target.value.length;

			const limiteEditarIntegranteRol = 25;

			const hijosEditarIntegrantesRol = document.querySelector('.grupo__nosotrosIntegrantes2 .contenedor-informacion-editarRol').children;
			const iconoEditarIntegranteRol = document.querySelector('#rolEditarIntegrante i');


			if(expresionesNosotros.rol.test(e.target.value)){

				// En caso de que se encuentren palabras inapropiadas
				if(expresionesNosotros.palabrasNoAdmitidas.test(e.target.value)){

					for(hijo of hijosEditarIntegrantesRol){

						if(hijo.classList.item(0) == "textoInfo"){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

						}

					}

					// Mostramos icono de error
					iconoEditarIntegranteRol.classList.remove('fa-circle-check');
					iconoEditarIntegranteRol.classList.remove('completo');
					iconoEditarIntegranteRol.classList.add('fa-circle-xmark');
					iconoEditarIntegranteRol.classList.add('error');
					iconoEditarIntegranteRol.title = "Campo incompleto";

					// NO aprobamos el campo
					aprobadoNosotrosEditarIntegranteRol = false;

				}else{	
				// En caso de que NO se encuentren palabras inapropiadas

					for(hijo of hijosEditarIntegrantesRol){

						if(hijo.classList.item(0) == "textoInfo"){

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

						}

					}


					// Mostramos icono de exito
					iconoEditarIntegranteRol.classList.remove('fa-circle-xmark');
					iconoEditarIntegranteRol.classList.remove('error');
					iconoEditarIntegranteRol.classList.add('fa-circle-check');
					iconoEditarIntegranteRol.classList.add('completo');
					iconoEditarIntegranteRol.title = "Campo completado";

					// Aprobamos el campo
					aprobadoNosotrosEditarIntegranteRol = true;

				}

			}else{
			// En caso de que la expresion correspondiente NO se cumpla

				for(hijo of hijosEditarIntegrantesRol){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 2 caracteres";

						if(expresionesNosotros.numeros.test(e.target.value)){

							hijo.textContent = "Números no tolerados";

						}

						if(expresionesNosotros.simbolos.test(e.target.value)){

							hijo.textContent = "Símbolos no tolerados";

						}

					}

				}

				iconoEditarIntegranteRol.classList.remove('fa-circle-check');
				iconoEditarIntegranteRol.classList.remove('completo');
				iconoEditarIntegranteRol.classList.add('fa-circle-xmark');
				iconoEditarIntegranteRol.classList.add('error');
				iconoEditarIntegranteRol.title = "Campo incompleto";


				aprobadoNosotrosEditarIntegranteRol = false;

			}


			// En caso de que se alcance el limite de caracteres
			if(canCaracteresPermitidosEditarIntegranteRol >= limiteEditarIntegranteRol){

				for(hijo of hijosEditarIntegrantesRol){

					if(hijo.classList.item(0) == "textoLimite"){

						// Mostramos mensaje correspondiente
						hijo.textContent = "Límite de caracteres alcanzado";
						hijo.classList.add('activo');

					}

				}

			}else{
			// En caso de que NO se alcancen

				for(hijo of hijosEditarIntegrantesRol){

					if(hijo.classList.item(0) == "textoLimite"){

						// No mostramos ningun mensaje
						hijo.classList.remove('activo');

					}

				}

			}


			// Mostramos la cantidad de caracteres ingresados
			for(hijo of hijosEditarIntegrantesRol){

				if(hijo.classList.item(0) == "cantCaracteres"){

					hijo.textContent = `${canCaracteresPermitidosEditarIntegranteRol}/${limiteEditarIntegranteRol}`;

				}

			}

		break;


		case "fotointedit":

			const inputEditarIntegranteImagen = document.querySelector('.grupo__nosotrosIntegrantes2 input[name="fotointedit"]');

			let archivosCargadosEditarIntegranteImagen = inputEditarIntegranteImagen.files.length;
			archivosCargadosEditarIntegranteImagen = parseInt(archivosCargadosEditarIntegranteImagen, 10);

			const hijosEditarIntegrantesImagen = document.querySelector('.grupo__nosotrosIntegrantes2 .contenedor-informacion-editarImagen').children;
			const iconoEditarIntegranteImagen = document.querySelector('#imagenEditarIntegrante i');

			if(archivosCargadosEditarIntegranteImagen == 1){
				var archivo = inputEditarIntegranteImagen;
				var archivoRuta = archivo.value;
				var extPermitidas = /(.jpeg|.jpg|.png|.gif)$/i;
				if (!extPermitidas.exec(archivoRuta)){
					
				for(hijo of hijosEditarIntegrantesImagen){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoAdvertencia');
						hijo.textContent = "No es imagen";

					}

				}


				iconoEditarIntegranteImagen.classList.remove('fa-circle-check');
				iconoEditarIntegranteImagen.classList.remove('completo');
				iconoEditarIntegranteImagen.classList.add('fa-triangle-exclamation');
				iconoEditarIntegranteImagen.classList.add('advertencia');
				iconoEditarIntegranteImagen.title = "Campo vacío";
					aprobadoNosotrosEditarImagen = false;
					}else{
						for(hijo of hijosEditarIntegrantesImagen){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoAdvertencia');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}


				iconoEditarIntegranteImagen.classList.remove('fa-triangle-exclamation');
				iconoEditarIntegranteImagen.classList.remove('advertencia');
				iconoEditarIntegranteImagen.classList.add('fa-circle-check');
				iconoEditarIntegranteImagen.classList.add('completo');
				iconoEditarIntegranteImagen.title = "Campo completado";
						aprobadoNosotrosEditarImagen = true;
					}
				
				

			}else{

				for(hijo of hijosEditarIntegrantesImagen){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoAdvertencia');
						hijo.textContent = "Ninguna imagen fue cargada. Colocando imagen por defecto";

					}

				}


				iconoEditarIntegranteImagen.classList.remove('fa-circle-check');
				iconoEditarIntegranteImagen.classList.remove('completo');
				iconoEditarIntegranteImagen.classList.add('fa-triangle-exclamation');
				iconoEditarIntegranteImagen.classList.add('advertencia');
				iconoEditarIntegranteImagen.title = "Campo vacío";
				aprobadoNosotrosEditarImagen = true;
			}

		break;

	}

}






/*AGREGAR*/

// funcion para mostrar mensajes de exito/error cuando un campo es aprobado
const aprobadoNosotrosAgregar = (e) => {

	// Configuramos todo para cuando por lo menos una imagen sea cargada
	const hijosNosotrosAgregarImagen = document.querySelector('#grupo__nosotrosImagen1 .contenedor-informacion-agregarImagenes').children;
	const iconoNosotrosImagenAgregar = document.querySelector('#grupo__nosotrosImagen1 #agregar-imagenes i');

	// si se carga por lo menos una nueva imagen
	if(
	   aprobadoNosotrosAgregarImagen == true 
	   ){

		//mostramos mensaje de exito
		for (hijo of hijosNosotrosAgregarImagen){

			if(hijo.classList.item(0) == "textoInfo"){

				hijo.classList.remove('textoError');
				hijo.classList.add('textoValido');
				hijo.textContent = "Completado";

			}

		}

		//mostramos icono de exito
		iconoNosotrosImagenAgregar.classList.remove('fa-circle-xmark');
		iconoNosotrosImagenAgregar.classList.remove('error');
		iconoNosotrosImagenAgregar.classList.add('fa-circle-check');
		iconoNosotrosImagenAgregar.classList.add('completo');
		iconoNosotrosImagenAgregar.title = "Campo completado";

		// activamos el btn submit
		submitAgregar.disabled = false;
		submitAgregar.classList.remove('cursorInactivo');
		submitAgregar.title = "Agregar imágenes cargadas";


	}else{
		// en caso de que ninguna imagen sea cargada

		//mostramos mensaje de error
		for (hijo of hijosNosotrosAgregarImagen){

			if(hijo.classList.item(0) == "textoInfo"){

				hijo.classList.remove('textoValido');
				hijo.classList.add('textoError');
				hijo.textContent = "Se debe cargar por lo menos una imagen";

			}

		}

		//mostramos icono de error
		iconoNosotrosImagenAgregar.classList.remove('fa-circle-check');
		iconoNosotrosImagenAgregar.classList.remove('completo');
		iconoNosotrosImagenAgregar.classList.add('fa-circle-xmark');
		iconoNosotrosImagenAgregar.classList.add('error');
		iconoNosotrosImagenAgregar.title = "Campo incompleto";

		// dejamos desactivado el btn submit
		submitAgregar.disabled = true;
		submitAgregar.classList.add('cursorInactivo');
		submitAgregar.title = "Cargue por lo menos una imagen para habilitar esta acción";
	}

}



/*ELIMINAR*/

// funcion para mostrar mensajes de exito/error cuando un campo es aprobado




// usados para la sección de AGREGAR imagenes
inputsFileNosotrosImagen.forEach((input) => {
	// comprobamos que los campos no estén vacíos
	input.addEventListener('focus', formularioNosotrosImagen)
	input.addEventListener('blur', formularioNosotrosImagen)
	input.addEventListener('change', formularioNosotrosImagen)

	// en caso de que aplique activamos btn submit, en caso de que no sigue desactivado
	input.addEventListener('focus', aprobadoNosotrosAgregar)
	input.addEventListener('blur', aprobadoNosotrosAgregar)
	input.addEventListener('change', aprobadoNosotrosAgregar)
});


// usados para la sección de ELIMINAR imagenes
selectsNosotrosImagen.forEach((select) => {
	// comprobamos que los campos no estén vacíos
	select.addEventListener('focus', formularioNosotrosImagen)
	select.addEventListener('blur', formularioNosotrosImagen)
	select.addEventListener('change', formularioNosotrosImagen)

	// en caso de que aplique activamos btn submit, en caso de que no sigue desactivado
	select.addEventListener('focus', aprobadoNosotrosEliminar)
	select.addEventListener('blur', aprobadoNosotrosEliminar)
	select.addEventListener('change', aprobadoNosotrosEliminar)
});





// funcion para mostrar mensajes de exito/error cuando un campo es aprobado (AGREGAR INTEGRANTES)
const aprobadoNosotrosAgregarIntegrante = (e) => {

	// en caso de que no se completen los campos requeridos
	if(aprobadoNosotrosAgregarIntegranteNombre == false ||
	   aprobadoNosotrosAgregarIntegranteRol == false ||
	   aprobadoNosotrosAgregarImagenes == false){
	
		// dejamos desactivado el btn submit
		submitAgregarIntegrante.disabled = true;
		submitAgregarIntegrante.classList.add('cursorInactivo');
		submitAgregarIntegrante.title = "Complete el formulario para habilitar esta acción";


	}else{	
		// si se completan los campos requeridos

		// activamos el btn submit
		submitAgregarIntegrante.disabled = false;
		submitAgregarIntegrante.classList.remove('cursorInactivo');
		submitAgregarIntegrante.title = "Crear nuevo integrante";
	}

}


// Usado para la seccion de AGREGAR INTEGRATES
inputsNosotrosIntegrantesAgregar.forEach((input) => {
	//
	input.addEventListener('keyup', formularioNosotrosIntegrante)
	input.addEventListener('keydown', formularioNosotrosIntegrante)
	input.addEventListener('focus', formularioNosotrosIntegrante)
	input.addEventListener('blur', formularioNosotrosIntegrante)
	input.addEventListener('change', formularioNosotrosIntegrante)

	input.addEventListener('keyup', aprobadoNosotrosAgregarIntegrante)
	input.addEventListener('keydown', aprobadoNosotrosAgregarIntegrante)
	input.addEventListener('focus', aprobadoNosotrosAgregarIntegrante)
	input.addEventListener('blur', aprobadoNosotrosAgregarIntegrante)
	input.addEventListener('change', aprobadoNosotrosAgregarIntegrante)

});




// funcion para mostrar mensajes de exito/error cuando un campo es aprobado (ELIMINAR INTEGRANTES)
const aprobadoNosotrosEliminarIntegrante = (e) => {

	// en caso de que no se completen los campos requeridos
	if(aprobadoNosotrosEditarIntegranteId == false){
	
		// dejamos desactivado el btn submit
		deleteEditarIntegrante.disabled = true;
		deleteEditarIntegrante.classList.add('cursorInactivo');
		deleteEditarIntegrante.title = "Seleccione uno de los integrantes para habilitar esta acción";


	}else{	
		// si se completan los campos requeridos

		// activamos el btn submit
		deleteEditarIntegrante.disabled = false;
		deleteEditarIntegrante.classList.remove('cursorInactivo');
		deleteEditarIntegrante.title = "Eliminar integrante seleccionado";

		inputsNosotrosIntegrantesEditar.forEach((input) => {
			input.required = false
		});
	}

}


// funcion para mostrar mensajes de exito/error cuando un campo es aprobado (EDITAR INTEGRANTES)
const aprobadoNosotrosEditarIntegrante = (e) => {

	// en caso de que no se completen los campos requeridos
	if(aprobadoNosotrosEditarIntegranteId == false ||
	   aprobadoNosotrosEditarIntegranteNombre == false ||
	   aprobadoNosotrosEditarIntegranteRol == false ||
	   aprobadoNosotrosEditarImagen == false){
	
		// dejamos desactivado el btn submit
		submitEditarIntegrante.disabled = true;
		submitEditarIntegrante.classList.add('cursorInactivo');
		submitEditarIntegrante.title = "Complete el formulario para habilitar esta acción";


	}else{	
		// si se completan los campos requeridos

		// activamos el btn submit
		submitEditarIntegrante.disabled = false;
		submitEditarIntegrante.classList.remove('cursorInactivo');
		submitEditarIntegrante.title = "Editar integrante seleccionado";
	}

}

// EDITAR/ELIMINAR
selectsNosotrosIntegrantesEditar.forEach((select) => {
	//
	select.addEventListener('focus', formularioNosotrosIntegrante)
	select.addEventListener('blur', formularioNosotrosIntegrante)
	select.addEventListener('change', formularioNosotrosIntegrante)

	//
	select.addEventListener('focus', aprobadoNosotrosEditarIntegrante)
	select.addEventListener('blur', aprobadoNosotrosEditarIntegrante)
	select.addEventListener('change', aprobadoNosotrosEditarIntegrante)

	//
	select.addEventListener('focus', aprobadoNosotrosEliminarIntegrante)
	select.addEventListener('blur', aprobadoNosotrosEliminarIntegrante)
	select.addEventListener('change', aprobadoNosotrosEliminarIntegrante)
});


inputsNosotrosIntegrantesEditar.forEach((input) => {
	//
	input.addEventListener('keydown', formularioNosotrosIntegrante)
	input.addEventListener('keyup', formularioNosotrosIntegrante)
	input.addEventListener('focus', formularioNosotrosIntegrante)
	input.addEventListener('blur', formularioNosotrosIntegrante)
	input.addEventListener('change', formularioNosotrosIntegrante)

	//
	input.addEventListener('keydown', aprobadoNosotrosEditarIntegrante)
	input.addEventListener('keyup', aprobadoNosotrosEditarIntegrante)
	input.addEventListener('focus', aprobadoNosotrosEditarIntegrante)
	input.addEventListener('blur', aprobadoNosotrosEditarIntegrante)
	input.addEventListener('change', aprobadoNosotrosEditarIntegrante)

});




/* ################## VALIDACIONES PARA PAGINA DE CONTACTO ##################### */

// Expresiones regulares para validar el formulario de Contacto
const expresionesContacto = {
	nombre: /^[a-zA-ZÀ-ÿ\s\_\-]{2,40}$/, // Letras y espacios, pueden llevar acentos, guio y guion bajo,
	apellido: /^[a-zA-ZÀ-ÿ\s\_\-]{2,40}$/, // Letras y espacios, pueden llevar acentos, guio y guion bajo,
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	mensaje: /((.)(\s)*){30,3000}/, // simbolos, letras y numeros	
	simbolos: /[!"#$%&/()=?¡¿'°¬^`~.,{}+´*+<>{}\]\\[;:_¨-]+/,
	numeros: /\d+/,
	palabrasNoAdmitidas: /(\bidiota\b)|(\bestupido\b)|(\bestúpido\b)|(\bgil\b)|(\bputa\b)/
}

// Campos para validar y usar
const inputsContacto = document.querySelectorAll('.formularioContacto input');
const textareasContacto = document.querySelectorAll('.formularioContacto textarea');
const submitContacto = document.querySelector('.formularioContacto input[type="submit"]');


// Aprobamos los campos
let aprobadoNombreContacto = false;
let aprobadoApellidoContacto = true;
let aprobadoCorreoContacto = false;
let aprobadoMensajeContacto = false;


const validarFormularioContacto = (e) => {

	switch (e.target.name){

		case "nombre":

			// Con esto indicamos que solo vamos a usar desde donde empieza la cadena hasta
			// la posicion 30, hecho esto definimos que el valor ahora sera la cadena que acabamos
			// de obtener
			const caracteresNombreContacto = e.target.value.substring(0,30);
			e.target.value = caracteresNombreContacto;

			// Con esto obtenemos el largo de la cadena que obtuvimos antes, luego lo convertimos a 
			// una variable de tipo int para finalmente poder compararlos, y saber si llego a su limite,
			// luego mostraremos un mensaje en base a eso
			let canCaracteresPermitidosNombreContacto = caracteresNombreContacto.length;
			canCaracteresPermitidosNombreContacto = parseInt(canCaracteresPermitidosNombreContacto, 10);

			// definimos el limite de caracteres con el que se comparará los caracteres ingresados
			const limiteNombreContacto = 30;

			const hijosNombreContacto = document.querySelector('.formularioContacto .contenedor-informacion-nombre').children;

			if(expresionesContacto.nombre.test(e.target.value)){

				for (hijo of hijosNombreContacto){

					if(hijo.classList.item(0) == "textoInfo"){

						// En caso de que el campo nombre tenga palabras no apropiedas
						if(expresionesContacto.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.classList.add('activo');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// NO aprobamos el campo
							aprobadoNombreContacto = false;

						}else{
							// En caso de que no tenga estas palabras

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.classList.add('activo');
							hijo.textContent = "¡Listo!";

							// Aprobamos el campo
							aprobadoNombreContacto = true;

						}

					}

				}


			}else{
				// En caso de que el campo no tenga por lo menos 2 caracteres, sin numeros ni simbolos

				for (hijo of hijosNombreContacto){

					if(hijo.classList.item(0) == "textoInfo"){

						// Añadimos clase de error, en todos los casos de error
						// la vamos a necesitar
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.classList.add('activo');

						// En caso de que se ingresen simbolos en el campo
						if(expresionesContacto.simbolos.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.textContent = "Símbolos no tolerados";

						// En caso de que se ingresen numeros en el campo	
						}else if(expresionesContacto.numeros.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.textContent = "Números no tolerados";

						}else{
							// En caso de que no se ingresen minimo 2 caracteres

							// Mostramos mensaje de error
							hijo.textContent = "Mínimo 2 caracteres";

						}

					}
				}

				// NO aprobamos el campo
				aprobadoNombreContacto = false;

			}


			// Mostramos conteo de caracteres
			for(hijo of hijosNombreContacto){

				if(hijo.classList.item(0) == "cantCaracteres"){

					hijo.textContent = `${canCaracteresPermitidosNombreContacto}/${limiteNombreContacto}`;

				}

			}


			// Mostramos mensaje si se alcanza el limite de caracteres
			for(hijo of hijosNombreContacto){

				if(hijo.classList.item(0) == "textoLimite"){

					if(canCaracteresPermitidosNombreContacto >= limiteNombreContacto){

						hijo.classList.add('activo');
						hijo.textContent = "Límite de caracteres alcanzado";

					}else{

						hijo.classList.remove('activo');
					}
				}

			}

		break;


		case "apellido":

			// Con esto indicamos que solo vamos a usar desde donde empieza la cadena hasta
			// la posicion 30, hecho esto definimos que el valor ahora sera la cadena que acabamos
			// de obtener
			const caracteresApellidoContacto = e.target.value.substring(0,30);
			e.target.value = caracteresApellidoContacto;

			// Con esto obtenemos el largo de la cadena que obtuvimos antes, luego lo convertimos a 
			// una variable de tipo int para finalmente poder compararlos, y saber si llego a su limite,
			// luego mostraremos un mensaje en base a eso
			let canCaracteresPermitidosApellidoContacto = caracteresApellidoContacto.length;
			canCaracteresPermitidosApellidoContacto = parseInt(canCaracteresPermitidosApellidoContacto, 10);

			// definimos el limite de caracteres con el que se comparará los caracteres ingresados
			const limiteApellidoContacto = 30;

			const hijosApellidoContacto = document.querySelector('.formularioContacto .contenedor-informacion-apellido').children;

			// En caso de que se cumpla la expresion o que el campo este vacio
			if(expresionesContacto.apellido.test(e.target.value) ||
			   e.target.value == ""){

			   	for (hijo of hijosApellidoContacto){

			   		if(hijo.classList.item(0) == "textoInfo"){

			   			// En caso de que se encuentren palabras inapropiadas
						if(expresionesContacto.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.remove('textoAdvertencia');
							hijo.classList.add('textoError');
							hijo.classList.add('activo');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// NO aprobamos el campo
							aprobadoApellidoContacto = false;

						}else{
						// En caso de que no tenga estas palabras

							// Eliminamos esta clase, ya que no la necesitamos en ninguno de los casos siguientes
							hijo.classList.remove('textoError');
							hijo.classList.remove('textoAdvertencia');
							hijo.classList.add('activo');
							

							// En caso de que el campo esté vacío
							if(e.target.value == ""){

								// Mostramos mensaje de advertencia
								hijo.classList.add('textoAdvertencia');
								hijo.classList.add('activo');
								hijo.textContent = "Campo actualmente vacío";

							}else{

								// Mostramos mensaje de exito
								hijo.classList.add('textoValido');
								hijo.classList.add('activo');
								hijo.textContent = "¡Listo!";

							}	

							// Aprobamos el campo
							aprobadoApellidoContacto = true;

						}
					}

				}

		}else{
		// En caso de que el campo no tenga por lo menos 2 caracteres, sin numeros ni simbolos

			for (hijo of hijosApellidoContacto){

				if(hijo.classList.item(0) == "textoInfo"){

					// Añadimos clase de error, en todos los casos de error
					// la vamos a necesitar
					hijo.classList.remove('textoValido');
					hijo.classList.remove('textoAdvertencia');
					hijo.classList.add('textoError');
					hijo.classList.add('activo');

					// En caso de que se ingresen simbolos en el campo
					if(expresionesContacto.simbolos.test(e.target.value)){

						// Mostramos mensaje de error
						hijo.textContent = "Símbolos no tolerados";

					// En caso de que se ingresen numeros en el campo	
					}else if(expresionesContacto.numeros.test(e.target.value)){

						// Mostramos mensaje de error
						hijo.textContent = "Números no tolerados";

					}else{
						// En caso de que no se ingresen minimo 2 caracteres

						// Mostramos mensaje de error
						hijo.textContent = "Mínimo 2 caracteres";

					}

				}
			}

			// NO aprobamos el campo
			aprobadoApellidoContacto = false;
		}


		// Mostramos conteo de caracteres
		for(hijo of hijosApellidoContacto){

			if(hijo.classList.item(0) == "cantCaracteres"){

				hijo.textContent = `${canCaracteresPermitidosApellidoContacto}/${limiteApellidoContacto}`;

			}

		}


		// Mostramos mensaje si se alcanza el limite de caracteres
		for(hijo of hijosApellidoContacto){

			if(hijo.classList.item(0) == "textoLimite"){

				if(canCaracteresPermitidosApellidoContacto >= limiteApellidoContacto){

					hijo.classList.add('activo');
					hijo.textContent = "Límite de caracteres alcanzado";

				}else{

					hijo.classList.remove('activo');

				}
			}

		}

		break;


		case "correo":

			const hijosCorreoContacto = document.querySelector('.formularioContacto .contenedor-informacion-correo').children;

			// En caso que el value del campo corresponda con la expresion regular
			// para dicho campo
			if(expresionesContacto.correo.test(e.target.value)){

				for(hijo of hijosCorreoContacto){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.classList.add('activo');
						hijo.textContent = "¡Listo!";

					}

				}

				// Aprobamos el campo
				aprobadoCorreoContacto = true;

			}else{
				// En caso de que el value del campo no corresponda con la expresion
				// regular expresada no aprobamos el campo

				for(hijo of hijosCorreoContacto){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.classList.add('activo');

						// En caso de que el campo esté vacío
						if(e.target.value == ""){

							// Indicamos que se ingrese un correo electronico
							hijo.textContent = "Escriba un correo electrónico";

						}else{	
						// En caso de que no esté vacío, pero no cumpla con la expresion definida

							// Mostramos mensaje de error
							hijo.textContent = "Correo electrónico inválido";

						}

						
					}

				}

				// NO aprobamos el campo
				aprobadoCorreoContacto = false;

			}

		break;


		case "mensaje":

			// Con esto indicamos que solo vamos a usar desde donde empieza la cadena hasta
			// la posicion 30, hecho esto definimos que el valor ahora sera la cadena que acabamos
			// de obtener
			const caracteresMensajeContacto = e.target.value.substring(0,3000);
			e.target.value = caracteresMensajeContacto;

			// Con esto obtenemos el largo de la cadena que obtuvimos antes, luego lo convertimos a 
			// una variable de tipo int para finalmente poder compararlos, y saber si llego a su limite,
			// luego mostraremos un mensaje en base a eso
			let canCaracteresPermitidosMensajeContacto = caracteresMensajeContacto.length;
			canCaracteresPermitidosMensajeContacto = parseInt(canCaracteresPermitidosMensajeContacto, 10);

			// definimos el limite de caracteres con el que se comparará los caracteres ingresados
			const limiteMensajeContacto = 3000;

			const hijosMensajeContacto = document.querySelector('.formularioContacto .contenedor-informacion-mensaje').children;

			if(expresionesContacto.mensaje.test(e.target.value)){

				for(hijo of hijosMensajeContacto){

					if(hijo.classList.item(0) == "textoInfo"){

						if(expresionesContacto.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.classList.add('activo');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// NO aprobamos el campo
							aprobadoMensajeContacto = false;

						}else{
							// En caso de que no tenga estas palabras

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.classList.add('activo');
							hijo.textContent = "¡Listo!";

							// Aprobamos el campo
							aprobadoMensajeContacto = true;

						}

					}

				}

			}else{
			// En caso de que el campo no tenga por lo menos 2 caracteres, sin numeros ni simbolos

				for (hijo of hijosMensajeContacto){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.classList.add('activo');
						hijo.textContent = "Mínimo 30 caracteres (sin contar espacios)";

					}

				}

				// NO aprobamos el campo
				aprobadoMensajeContacto = false;

			}

			// Mostramos conteo de caracteres
			for(hijo of hijosMensajeContacto){

				if(hijo.classList.item(0) == "cantCaracteres"){

					hijo.textContent = `${canCaracteresPermitidosMensajeContacto}/${limiteMensajeContacto}`;

				}

			}


		// Mostramos mensaje si se alcanza el limite de caracteres
		for(hijo of hijosMensajeContacto){

			if(hijo.classList.item(0) == "textoLimite"){

				if(canCaracteresPermitidosMensajeContacto >= limiteMensajeContacto){

					hijo.classList.add('activo');
					hijo.textContent = "Límite de caracteres alcanzado";

				}else{

					hijo.classList.remove('activo');

				}
			}

		}

		break;

	}

}


// Función para aprobar todos los campos del formulario, en caso de que todos los campos
// sean aprobados el btn submit se activa, en caso de que no, permance desactivado
const aprobarFormularioContacto = (e) => {

	// en caso de que los campos no sean aprobados, dejamos desactivado el btn submit
	if(aprobadoNombreContacto == false ||
	   aprobadoApellidoContacto == false ||
	   aprobadoCorreoContacto == false ||
	   aprobadoMensajeContacto == false){

	   	submitContacto.disabled = true;
		submitContacto.classList.add('cursorInactivo');
		submitContacto.title = "Complete el formulario para habilitar esta acción";

	}else{
		// En caso de que los campos sean aprobados activamos el btn submit

		submitContacto.disabled = false;
		submitContacto.classList.remove('cursorInactivo');
		submitContacto.title = "Enviar mensaje al PETC";

	}

}


inputsContacto.forEach((input) => {
	input.addEventListener('keyup', validarFormularioContacto)
	input.addEventListener('keydown', validarFormularioContacto)
	input.addEventListener('focus', validarFormularioContacto)

	input.addEventListener('keyup', aprobarFormularioContacto)
	input.addEventListener('keydown', aprobarFormularioContacto)	
	input.addEventListener('focus', aprobarFormularioContacto)	
});


textareasContacto.forEach((textarea) =>{
	textarea.addEventListener('keyup', validarFormularioContacto);
	textarea.addEventListener('keydown', validarFormularioContacto);
	textarea.addEventListener('focus', validarFormularioContacto);
	textarea.addEventListener('change', validarFormularioContacto);

	textarea.addEventListener('keyup', aprobarFormularioContacto);
	textarea.addEventListener('keydown', aprobarFormularioContacto);
	textarea.addEventListener('focus', aprobarFormularioContacto);
	textarea.addEventListener('change', aprobarFormularioContacto);
});







/*########################## VALIDACIONES PARA PÁGINA DE ADMINISTRADOR ##############################*/


//Expresiones regulares para validar los campos necesarios
const expresionesAdmin = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos
	cedula: /\d{8}/,
	contraseña: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!"#$%&/()=?¡¿'°¬^`~.,{}+´*+<>{}\]\\[;:_¨-])([A-Za-z\d!"#$%&/()=?¡¿'°¬^`~.,{}+´*+<>{}\]\\[;:_¨-]){8,120}$/, // Letras en mayuscula y en minuscula, simbolos y numeros
	numeros: /\d+/,
	simbolos: /[!"#$%&/()=?¡¿'°¬^`~.,{}+´*+<>{}\]\\[;:_¨-]+/,
	letras: /[a-zA-ZÀ-ÿ]+/,
	espacios: /\s+/,
	palabrasNoAdmitidas: /(\bidiota\b)|(\bestupido\b)|(\bestúpido\b)|(\bgil\b)|(\bputa\b)/
}


// Campos para validar y usar
// AGREGAR
const adminUsuariosAgregarInputs = document.querySelectorAll('.formularioUsuariosAgregar input');
const adminUsuariosAgregarSelect = document.querySelectorAll('.formularioUsuariosAgregar select');
const adminUsuariosAgregarSubmit = document.querySelector('.formularioUsuariosAgregar input[type="submit"]');

// EDITAR/ELIMINAR
const adminUsuariosEditarInputs = document.querySelectorAll('.formularioUsuariosEditar input');
const adminUsuariosEditarSelect = document.querySelectorAll('.formularioUsuariosEditar select');
const adminUsuariosEditarSubmit = document.querySelector('.formularioUsuariosEditar input[name="editarusuario"]');
const adminUsuariosEditarDelete = document.querySelector('.formularioUsuariosEditar input[name="eliminarusuario"]');


// Aprobar campos
//AGREGAR
let aprobadoAdminAgregarNombre = false;
let aprobadoAdminAgregarCedula = false;
let aprobadoAdminAgregarContra = false;
let aprobadoAdminAgregarContraRep = false;
let aprobadoAdminAgregarRol = false;


//EDITAR/ELIMINAR
let aprobadoAdminEditarID = false;
let aprobadoAdminEditarNombre = false;
let aprobadoAdminEditarContra = false;
let aprobadoAdminEditarContraRep = false;
let aprobadoAdminEditarRol = false;



// Funcion para tomar lo que se ingrese en cada campo
const validarFormularioAdmin = (e) => {

	switch(e.target.name){


		case "nombreUsuario":

			// Con esto indicamos que solo vamos a usar desde donde empieza la cadena hasta
			// la posicion 30, hecho esto definimos que el valor ahora sera la cadena que acabamos
			// de obtener
			const caracteresNombreAdmin = e.target.value.substring(0,30);
			e.target.value = caracteresNombreAdmin;

			// Con esto obtenemos el largo de la cadena que obtuvimos antes, luego lo convertimos a 
			// una variable de tipo int para finalmente poder compararlos, y saber si llego a su limite,
			// luego mostraremos un mensaje en base a eso
			let canCaracteresPermitidosNombreAdmin = caracteresNombreAdmin.length;
			canCaracteresPermitidosNombreAdmin = parseInt(canCaracteresPermitidosNombreAdmin, 10);

			// definimos el limite de caracteres con el que se comparará los caracteres ingresados
			const limiteNombreAdmin = 30;


			const hijosAdminAgregarNombre = document.querySelector('.formularioUsuariosAgregar .contenedor-informacion-nombre').children;
			const iconoAdminAgregarNombre = document.querySelector('.formularioUsuariosAgregar .nombre h3 i');

			// En caso de que el campo cumpla con la expresion
			if(expresionesAdmin.nombre.test(e.target.value)){

				for(hijo of hijosAdminAgregarNombre){

					if(hijo.classList.item(0) == "textoInfo"){

						if(expresionesAdmin.palabrasNoAdmitidas.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							// Mostramos icono de error
							iconoAdminAgregarNombre.classList.remove('fa-circle-check');
							iconoAdminAgregarNombre.classList.remove('completo');
							iconoAdminAgregarNombre.classList.add('fa-circle-xmark');
							iconoAdminAgregarNombre.classList.add('error');
							iconoAdminAgregarNombre.title = "Campo incompleto";

							// NO aprobamos el campo
							aprobadoAdminAgregarNombre = false;

						}else{

							// Mostramos mensaje de exito
							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

							// Mostramos icono de exito
							iconoAdminAgregarNombre.classList.remove('fa-circle-xmark');
							iconoAdminAgregarNombre.classList.remove('error');
							iconoAdminAgregarNombre.classList.add('fa-circle-check');
							iconoAdminAgregarNombre.classList.add('completo');
							iconoAdminAgregarNombre.title = "Campo completado";

							// Aprobamos el campo
							aprobadoAdminAgregarNombre = true;

						}

					}

				}

					
			}else{
			// En caso de que el campo no cumpla con la expresion

				for(hijo of hijosAdminAgregarNombre){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 2 caracteres";

						if(expresionesAdmin.simbolos.test(e.target.value)){
							hijo.textContent = "Símbolos no tolerados";
						
						}					

					}

				}

				if(expresionesAdmin.numeros.test(e.target.value)){
					
					for(hijo of hijosAdminAgregarNombre){

						if(hijo.classList.item(0) == "textoInfo"){

							// Mostramos mensaje de error
							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Números no tolerados";

						}

					}

				}

				// Mostramos icono de error
				iconoAdminAgregarNombre.classList.remove('fa-circle-check');
				iconoAdminAgregarNombre.classList.remove('completo');
				iconoAdminAgregarNombre.classList.add('fa-circle-xmark');
				iconoAdminAgregarNombre.classList.add('error');
				iconoAdminAgregarNombre.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoAdminAgregarNombre = false;

			}


			// Mostramos la cantidad de caracteres ingresados
			for(hijo of hijosAdminAgregarNombre){

				if(hijo.classList.item(0) == "cantCaracteres"){

					hijo.textContent = `${canCaracteresPermitidosNombreAdmin}/${limiteNombreAdmin}`;

				}

			}


			// Mostramos limite de caracteres
			for(hijo of hijosAdminAgregarNombre){

				if(hijo.classList.item(0) == "textoLimite"){

					if(canCaracteresPermitidosNombreAdmin >= limiteNombreAdmin){

						hijo.classList.add('activo');
						hijo.textContent = "Límite de caracteres alcanzado";

					}else{

						hijo.classList.remove('activo');

					}

				}

			}

		break;


		case "ciUsuario":

			// Con esto indicamos que solo vamos a usar desde donde empieza la cadena hasta
			// la posicion 8, hecho esto definimos que el valor ahora sera la cadena que acabamos
			// de obtener
			const caracteresCedulaAdmin = e.target.value.substring(0,8);
			e.target.value = caracteresCedulaAdmin;	

			const hijosAdminAgregarCedula = document.querySelector('.formularioUsuariosAgregar .contenedor-informacion-cedula').children;
			const iconoAdminAgregarCedula = document.querySelector('.formularioUsuariosAgregar .cedula h3 i');

			if(expresionesAdmin.cedula.test(e.target.value)){

				for(hijo of hijosAdminAgregarCedula){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de exito
						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				// Mostramos icono de exito
				iconoAdminAgregarCedula.classList.remove('fa-circle-xmark');
				iconoAdminAgregarCedula.classList.remove('error');
				iconoAdminAgregarCedula.classList.add('fa-circle-check');
				iconoAdminAgregarCedula.classList.add('completo');
				iconoAdminAgregarCedula.title = "Campo completado";

				// Aprobamos el campo
				aprobadoAdminAgregarCedula = true;

			}else{	
			// En caso de que no se cumpla la expresion

				for(hijo of hijosAdminAgregarCedula){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Ingrese una cédula válida";

						if(expresionesAdmin.letras.test(e.target.value)){
							hijo.textContent = "Letras no toleradas";
						}

						if(expresionesAdmin.espacios.test(e.target.value)){
							hijo.textContent = "Espacios no tolerados";
						}

						if(expresionesAdmin.simbolos.test(e.target.value)){
							hijo.textContent = "Símbolos no tolerados";
						}

					}

				}

				// Mostramos icono de error
				iconoAdminAgregarCedula.classList.remove('fa-circle-check');
				iconoAdminAgregarCedula.classList.remove('completo');
				iconoAdminAgregarCedula.classList.add('fa-circle-xmark');
				iconoAdminAgregarCedula.classList.add('error');
				iconoAdminAgregarCedula.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoAdminAgregarCedula = false;

			}

		break;


		case "contraUsuario":

			const caracteresContraAdmin = e.target.value.substring(0,120);
			e.target.value = caracteresContraAdmin;

			let cantCaracteresContraAdmin = e.target.value.length;
			canCaracteresContraAdmin = parseInt(cantCaracteresContraAdmin, 10);

			const limiteContraAdmin = 120;

			const hijosAdminAgregarContra = document.querySelector('.formularioUsuariosAgregar .contenedor-informacion-contra').children;
			const iconoAdminAgregarContra = document.querySelector('.formularioUsuariosAgregar .contraseña h3 i');
			//const contra1 = document.querySelector('input[name ="contraUsuario"]').value;
			if(expresionesAdmin.contraseña.test(e.target.value)){

				for(hijo of hijosAdminAgregarContra){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de exito
						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}


				// Mostramos icono de exito
				iconoAdminAgregarContra.classList.remove('fa-circle-xmark');
				iconoAdminAgregarContra.classList.remove('error');
				iconoAdminAgregarContra.classList.add('fa-circle-check');
				iconoAdminAgregarContra.classList.add('completo');
				iconoAdminAgregarContra.title = "Campo completado";

				// Aprobamos el campo
				aprobadoAdminAgregarContra = true;

			}else{

				for(hijo of hijosAdminAgregarContra){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 8 caracteres, debe incluir mayúsculas, minúsculas, números y símbolos. Tildes no admitidos";

					}

				}


				// Mostramos icono de error
				iconoAdminAgregarContra.classList.remove('fa-circle-check');
				iconoAdminAgregarContra.classList.remove('completo');
				iconoAdminAgregarContra.classList.add('fa-circle-xmark');
				iconoAdminAgregarContra.classList.add('error');
				iconoAdminAgregarContra.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoAdminAgregarContra = false;

			}


			// Mostramos cantidad de caracteres ingresados
			for(hijo of hijosAdminAgregarContra){

				if(hijo.classList.item(0) == "cantCaracteres"){

					hijo.textContent = `${cantCaracteresContraAdmin}/${limiteContraAdmin}`;

				}

			}


			// Mostramos limite de caracteres alcanzado
			if(cantCaracteresContraAdmin >= limiteContraAdmin){

				for(hijo of hijosAdminAgregarContra){

					if(hijo.classList.item(0) == "textoLimite"){

						hijo.classList.add('activo');
						hijo.textContent = "Límite de caracteres alcanzado";

					}

				}

			}else{

				for(hijo of hijosAdminAgregarContra){

					if(hijo.classList.item(0) == "textoLimite"){

						hijo.classList.remove('activo');

					}

				}
	
			}

		break;


		case "contraUsuarioRep":

		const caracteresContraAdminRep = e.target.value.substring(0,120);
		e.target.value = caracteresContraAdminRep;

		let cantCaracteresContraAdminRep = e.target.value.length;
		canCaracteresContraAdminRep = parseInt(cantCaracteresContraAdminRep, 10);

		const limiteContraAdminRep = 120;

		const hijosAdminAgregarContraRep = document.querySelector('.formularioUsuariosAgregar .contenedor-informacion-contraRep').children;
		const iconoAdminAgregarContraRep = document.querySelector('.formularioUsuariosAgregar .contraseñaRep h3 i');
		const contra2 = document.querySelector('input[name ="contraUsuarioRep"]').value;	
		const contra1 = document.querySelector('input[name ="contraUsuario"]').value;	
	


			
		if(contra1 == contra2){

			for(hijo of hijosAdminAgregarContraRep){

				if(hijo.classList.item(0) == "textoInfo"){

					// Mostramos mensaje de exito
					hijo.classList.remove('textoError');
					hijo.classList.add('textoValido');
					hijo.textContent = "Completado";

				}

			}


			// Mostramos icono de exito
			iconoAdminAgregarContraRep.classList.remove('fa-circle-xmark');
			iconoAdminAgregarContraRep.classList.remove('error');
			iconoAdminAgregarContraRep.classList.add('fa-circle-check');
			iconoAdminAgregarContraRep.classList.add('completo');
			iconoAdminAgregarContraRep.title = "Campo completado";

			// Aprobamos el campo
			aprobadoAdminAgregarContraRep = true;


			}else{

			for(hijo of hijosAdminAgregarContraRep){

				if(hijo.classList.item(0) == "textoInfo"){

					// Mostramos mensaje de error
					hijo.classList.remove('textoValido');
					hijo.classList.add('textoError');
					hijo.textContent = "Las contraseñas no coinciden";

				}

			}


			// Mostramos icono de error
			iconoAdminAgregarContraRep.classList.remove('fa-circle-check');
			iconoAdminAgregarContraRep.classList.remove('completo');
			iconoAdminAgregarContraRep.classList.add('fa-circle-xmark');
			iconoAdminAgregarContraRep.classList.add('error');
			iconoAdminAgregarContraRep.title = "Campo incompleto";

			// NO aprobamos el campo
			aprobadoAdminAgregarContraRep = false;

		}


		

	break;



		case "rolUsuario":

		

			const hijosAdminAgregarRol = document.querySelector('.formularioUsuariosAgregar .contenedor-informacion-rol').children;
			const iconoAdminAgregarRol = document.querySelector('.formularioUsuariosAgregar .rol h3 i');

	
			if(e.target.value !== ""){

				for(hijo of hijosAdminAgregarRol){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de exito
						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				// Mostramos icono de exito
				iconoAdminAgregarRol.classList.remove('fa-circle-xmark');
				iconoAdminAgregarRol.classList.remove('error');
				iconoAdminAgregarRol.classList.add('fa-circle-check');
				iconoAdminAgregarRol.classList.add('completo');
				iconoAdminAgregarRol.title = "Campo completado";

				// Aprobamos el campo
				aprobadoAdminAgregarRol = true;

			}else{
			// En caso de que el campo este vacío

				for(hijo of hijosAdminAgregarRol){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Seleccione un rol";

					}

				}

				// Mostramos icono de error
				iconoAdminAgregarRol.classList.remove('fa-circle-check');
				iconoAdminAgregarRol.classList.remove('completo');
				iconoAdminAgregarRol.classList.add('fa-circle-xmark');
				iconoAdminAgregarRol.classList.add('error');
				iconoAdminAgregarRol.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoAdminAgregarRol = false;

			}




			
		break;


		// EDITAR Y ELIMINAR

		case "seleccionarCIUsuario":

			const hijosAdminEditarSeleccionarCI = document.querySelector('.formularioUsuariosEditar .contenedor-informacion-seleccionarCI').children;
			const iconoAdminEditarSeleccionarCI = document.querySelector('.formularioUsuariosEditar .dato-existente h3 i');

			// En caso de que el campo sea completado
			if(e.target.value !== ""){

				for(hijo of hijosAdminEditarSeleccionarCI){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de exito
						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				// Mostramos icono de exito
				iconoAdminEditarSeleccionarCI.classList.remove('fa-circle-xmark');
				iconoAdminEditarSeleccionarCI.classList.remove('error');
				iconoAdminEditarSeleccionarCI.classList.add('fa-circle-check');
				iconoAdminEditarSeleccionarCI.classList.add('completo');
				iconoAdminEditarSeleccionarCI.title = "Campo completado";

				// Aprobamos el campo
				aprobadoAdminEditarID = true;

			}else{
			// En caso de que el campo este vacío

				for(hijo of hijosAdminEditarSeleccionarCI){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Seleccione un usuario ya ingresado";

					}

				}

				// Mostramos icono de error
				iconoAdminEditarSeleccionarCI.classList.remove('fa-circle-check');
				iconoAdminEditarSeleccionarCI.classList.remove('completo');
				iconoAdminEditarSeleccionarCI.classList.add('fa-circle-xmark');
				iconoAdminEditarSeleccionarCI.classList.add('error');
				iconoAdminEditarSeleccionarCI.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoAdminEditarID = false;

			}

		break;


		case "nombreUsuarioEditar":

			const caracteresNombreAdminEditar = e.target.value.substring(0,30);
			e.target.value = caracteresNombreAdminEditar;

			let canCaracteresNombreAdminEditar = e.target.value.length;
			canCaracteresNombreAdminEditar = parseInt(canCaracteresNombreAdminEditar, 10);

			const limiteNombreAdminEditar = 30;

			const hijosAdminEditarNombre = document.querySelector('.formularioUsuariosEditar .contenedor-informacion-nombre').children;
			const iconoAdminEditarNombre = document.querySelector('.formularioUsuariosEditar .nombre h3 i');

			// En caso de que el campo cumpla con la expresion
			if(expresionesAdmin.nombre.test(e.target.value)){

				for(hijo of hijosAdminEditarNombre){

					if(hijo.classList.item(0) == "textoInfo"){

						if(expresionesAdmin.palabrasNoAdmitidas.test(e.target.value)){

							hijo.classList.remove('textoValido');
							hijo.classList.add('textoError');
							hijo.textContent = "Se encontraron palabras inapropiadas";

							iconoAdminEditarNombre.classList.remove('fa-circle-check');
							iconoAdminEditarNombre.classList.remove('completo');
							iconoAdminEditarNombre.classList.add('fa-circle-xmark');
							iconoAdminEditarNombre.classList.add('error');
							iconoAdminEditarNombre.title = "Campo incompleto";

							aprobadoAdminEditarRol = false;

						}else{

							hijo.classList.remove('textoError');
							hijo.classList.add('textoValido');
							hijo.textContent = "Completado";

							iconoAdminEditarNombre.classList.remove('fa-circle-xmark');
							iconoAdminEditarNombre.classList.remove('error');
							iconoAdminEditarNombre.classList.add('fa-circle-check');
							iconoAdminEditarNombre.classList.add('completo');
							iconoAdminEditarNombre.title = "Campo completado";

							aprobadoAdminEditarNombre = true;

						}

					}

				}

			}else{
			// En caso de que el campo no cumpla con la expresion

				for(hijo of hijosAdminEditarNombre){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 2 caracteres";

						// En caso de que se ingresen numeros en el campo
						if(expresionesAdmin.numeros.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.textContent = "Números no tolerados";

						}

						// En caso de que se ingresen simbolos en el campo
						if(expresionesAdmin.simbolos.test(e.target.value)){

							// Mostramos mensaje de error
							hijo.textContent = "Símbolos no tolerados";

						}

					}

				}

				// Mostramos icono de error
				iconoAdminEditarNombre.classList.remove('fa-circle-check');
				iconoAdminEditarNombre.classList.remove('completo');
				iconoAdminEditarNombre.classList.add('fa-circle-xmark');
				iconoAdminEditarNombre.classList.add('error');
				iconoAdminEditarNombre.title = "Campo incompleto";

				aprobadoAdminEditarNombre = false;

			}


			// Mostramos cantidad de caracteres ingresados
			for(hijo of hijosAdminEditarNombre){

				if(hijo.classList.item(0) == "cantCaracteres"){

					hijo.textContent = `${canCaracteresNombreAdminEditar}/${limiteNombreAdminEditar}`;

				}

			}


			// Mostramos limite de caracteres alcanzado 
			if(canCaracteresNombreAdminEditar >= limiteNombreAdminEditar){

				for(hijo of hijosAdminEditarNombre){

					if(hijo.classList.item(0) == "textoLimite"){

						hijo.classList.add('activo');
						hijo.textContent = "Límite de caracteres alcanzado";

					}

				}

			}else{

				for(hijo of hijosAdminEditarNombre){

					if(hijo.classList.item(0) == "textoLimite"){

						hijo.classList.remove('activo');

					}

				}

			}

		break;


		case "contUsuario":

			const caracteresContraAdminEditar = e.target.value.substring(0,120);
			e.target.value = caracteresContraAdminEditar;

			let canCaracteresContraAdminEditar = e.target.value.length;
			canCaracteresContraAdminEditar = parseInt(canCaracteresContraAdminEditar, 10);

			const limiteContraAdminEditar = 120;

			const hijosAdminEditarContra = document.querySelector('.formularioUsuariosEditar .contenedor-informacion-contra').children;
			const iconoAdminEditarContra = document.querySelector('.formularioUsuariosEditar .contraseña h3 i');

			if(expresionesAdmin.contraseña.test(e.target.value)){

				for(hijo of hijosAdminEditarContra){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}


				iconoAdminEditarContra.classList.remove('fa-circle-xmark');
				iconoAdminEditarContra.classList.remove('error');
				iconoAdminEditarContra.classList.add('fa-circle-check');
				iconoAdminEditarContra.classList.add('completo');
				iconoAdminEditarContra.title = "Campo completado";

				aprobadoAdminEditarContra = true;

			}else{

				for(hijo of hijosAdminEditarContra){

					if(hijo.classList.item(0) == "textoInfo"){

						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Mínimo 8 caracteres, debe incluir mayúsculas, minúsculas, números y símbolos. Tildes no admitidos";

					}

				}


				iconoAdminEditarContra.classList.remove('fa-circle-check');
				iconoAdminEditarContra.classList.remove('completo');
				iconoAdminEditarContra.classList.add('fa-circle-xmark');
				iconoAdminEditarContra.classList.add('error');
				iconoAdminEditarContra.title = "Campo incompleto";

				aprobadoAdminEditarContra = false;

			}

			// Mostramos cantidad de caracteres ingresados
			for(hijo of hijosAdminEditarContra){

				if(hijo.classList.item(0) == "cantCaracteres"){

					hijo.textContent = `${canCaracteresContraAdminEditar}/${limiteContraAdminEditar}`;

				}

			}


			// Mostramos mensaje de limite de caracteres
			if(canCaracteresContraAdminEditar >= limiteContraAdminEditar){

				for(hijo of hijosAdminEditarContra){

					if(hijo.classList.item(0) == "textoLimite"){

						hijo.classList.add('activo');
						hijo.textContent = "Límite de caracteres alcanzado";

					}

				}

			}else{

				for(hijo of hijosAdminEditarContra){

					if(hijo.classList.item(0) == "textoLimite"){

						hijo.classList.remove('activo');

					}

				}

			}

		break;

		case "contUsuarioRep":
/*
		const caracteresContraAdminEditarRep = e.target.value.substring(0,120);
		e.target.value = caracteresContraAdminEditarRep;

		let cantCaracteresContraAdminEditarRep = e.target.value.length;
		canCaracteresContraAdminEditarRep= parseInt(cantCaracteresContraAdminEditarRep, 10);

		const limiteContraAdminEditarRep = 120;
*/
		const hijosAdminEditarContraRep = document.querySelector('.formularioUsuariosEditar .contenedor-informacion-contraRep').children;
		const iconoAdminEditarContraRep = document.querySelector('.formularioUsuariosEditar .contraseñaRep h3 i');
		const contraedit2 = document.querySelector('input[name ="contUsuarioRep"]').value;	
		const contraedit1 = document.querySelector('input[name ="contUsuario"]').value;	
	


			
		if(contraedit1 == contraedit2){

			for(hijo of hijosAdminEditarContraRep){

				if(hijo.classList.item(0) == "textoInfo"){

					// Mostramos mensaje de exito
					hijo.classList.remove('textoError');
					hijo.classList.add('textoValido');
					hijo.textContent = "Completado";

				}

			}


			// Mostramos icono de exito
			iconoAdminEditarContraRep.classList.remove('fa-circle-xmark');
			iconoAdminEditarContraRep.classList.remove('error');
			iconoAdminEditarContraRep.classList.add('fa-circle-check');
			iconoAdminEditarContraRep.classList.add('completo');
			iconoAdminEditarContraRep.title = "Campo completado";

			// Aprobamos el campo
			aprobadoAdminEditarContraRep = true;


			}else{

			for(hijo of hijosAdminEditarContraRep){

				if(hijo.classList.item(0) == "textoInfo"){

					// Mostramos mensaje de error
					hijo.classList.remove('textoValido');
					hijo.classList.add('textoError');
					hijo.textContent = "Las contraseñas no coinciden";

				}

			}


			// Mostramos icono de error
			iconoAdminEditarContraRep.classList.remove('fa-circle-check');
			iconoAdminEditarContraRep.classList.remove('completo');
			iconoAdminEditarContraRep.classList.add('fa-circle-xmark');
			iconoAdminEditarContraRep.classList.add('error');
			iconoAdminEditarContraRep.title = "Campo incompleto";

			// NO aprobamos el campo
			aprobadoAdminEditarContraRep = false;

		}

	

		break;

		
		case "rolUsuarioEditar":

		const hijosAdminEditarRol = document.querySelector('.formularioUsuariosEditar .contenedor-informacion-rol').children;
			const iconoAdminEditarRol = document.querySelector('.formularioUsuariosEditar .rol h3 i');

	
			if(e.target.value !== ""){

				for(hijo of hijosAdminEditarRol){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de exito
						hijo.classList.remove('textoError');
						hijo.classList.add('textoValido');
						hijo.textContent = "Completado";

					}

				}

				// Mostramos icono de exito
				iconoAdminEditarRol.classList.remove('fa-circle-xmark');
				iconoAdminEditarRol.classList.remove('error');
				iconoAdminEditarRol.classList.add('fa-circle-check');
				iconoAdminEditarRol.classList.add('completo');
				iconoAdminEditarRol.title = "Campo completado";

				// Aprobamos el campo
				aprobadoAdminEditarRol = true;

			}else{
			// En caso de que el campo este vacío

				for(hijo of hijosAdminEditarRol){

					if(hijo.classList.item(0) == "textoInfo"){

						// Mostramos mensaje de error
						hijo.classList.remove('textoValido');
						hijo.classList.add('textoError');
						hijo.textContent = "Seleccione un rol";

					}

				}

				// Mostramos icono de error
				iconoAdminEditarRol.classList.remove('fa-circle-check');
				iconoAdminEditarRol.classList.remove('completo');
				iconoAdminEditarRol.classList.add('fa-circle-xmark');
				iconoAdminEditarRol.classList.add('error');
				iconoAdminEditarRol.title = "Campo incompleto";

				// NO aprobamos el campo
				aprobadoAdminEditarRol = false;

			}





			
		break;

	}

}



// Funcion para ver/ocultar contraseña en validacionesContactoExtra.js


const mostrarIconoContraseñaAgregar = (e) => {

	iconoAdminAgregarVerContraseña.style.visibility = "visible";
	iconoAdminAgregarVerContraseña.style.opacity = "1";

}


const noMostrarIconoContraseñaAgregar = (e) => {

	iconoAdminAgregarVerContraseña.style.visibility = "hidden";
	iconoAdminAgregarVerContraseña.style.opacity = "0";

}



// Funcion para aprobar los campos y poder AGREGAR
const aprobarFormularioAdminAgregar = (e) => {

	// Comprobamos que ninguno de los campos este vacio, si alguno esta vacio
	if(aprobadoAdminAgregarNombre == false ||
	   aprobadoAdminAgregarCedula == false ||
	   aprobadoAdminAgregarContra == false ||                        
	   aprobadoAdminAgregarContraRep == false ||                        
	   aprobadoAdminAgregarRol == false){

	   	adminUsuariosAgregarSubmit.disabled = true;
		adminUsuariosAgregarSubmit.classList.add('cursorInactivo');
		adminUsuariosAgregarSubmit.title = "Complete el formulario para habilitar esta acción";

	}else{
	// en caso de que no esten vacios

		adminUsuariosAgregarSubmit.disabled = false;
		adminUsuariosAgregarSubmit.classList.remove('cursorInactivo');
		adminUsuariosAgregarSubmit.title = "Agregar usuario";

	}
		
}


// Funcion para ver/ocultar contraseña en validacionesContactoExtra.js



// Funcion para aprobar los campos y poder EDITAR
const aprobarFormularioAdminEditar = (e) => {

	if(aprobadoAdminEditarID == false ||
	   aprobadoAdminEditarNombre == false ||
	   aprobadoAdminEditarContra == false ||
	   aprobadoAdminEditarContraRep == false ||
	   aprobadoAdminEditarRol == false){

		adminUsuariosEditarSubmit.disabled = true;
		adminUsuariosEditarSubmit.classList.add('cursorInactivo');
		adminUsuariosEditarSubmit.title = "Complete el formulario para habilitar esta acción";

	}else{

		adminUsuariosEditarSubmit.disabled = false;
		adminUsuariosEditarSubmit.classList.remove('cursorInactivo');
		adminUsuariosEditarSubmit.title = "Editar el usuario seleccionado";

	}

}


// Funcion para aprobar los campos y poder ELIMINAR
const aprobarFormularioAdminEliminar = (e) => {

	if(aprobadoAdminEditarID == false){

		adminUsuariosEditarInputs.forEach((input) =>{
			input.required = true;
		});

		adminUsuariosEditarDelete.disabled = true;
		adminUsuariosEditarDelete.classList.add('cursorInactivo');
		adminUsuariosEditarDelete.title = "Seleccione un usuario para habilitar esta acción";

	}else{

		adminUsuariosEditarInputs.forEach((input) =>{
			input.required = false;
		});
		adminUsuariosEditarSelect.forEach((select) =>{
			select.required = false;
		});
		
		adminUsuariosEditarDelete.disabled = false;
		adminUsuariosEditarDelete.classList.remove('cursorInactivo');
		adminUsuariosEditarDelete.title = "Eliminar usuario";
		
	}


}


// Añadimos los Event Listener para poder tomar los datos ingresados
// AGREGAR

// Tomamos los datos de elementos Input de la seccion de AGREGAR
adminUsuariosAgregarInputs.forEach((input) => {
	//
	input.addEventListener('keyup', validarFormularioAdmin)
	input.addEventListener('keydown', validarFormularioAdmin)
	input.addEventListener('focus', validarFormularioAdmin)
	input.addEventListener('change', validarFormularioAdmin)

	//
	input.addEventListener('keyup', aprobarFormularioAdminAgregar)
	input.addEventListener('keydown', aprobarFormularioAdminAgregar)
	input.addEventListener('focus', aprobarFormularioAdminAgregar)
	input.addEventListener('change', aprobarFormularioAdminAgregar)
});

adminUsuariosAgregarSelect.forEach((select) => {
	//
	select.addEventListener('keyup', validarFormularioAdmin)
	select.addEventListener('keydow', validarFormularioAdmin)
	select.addEventListener('focus', validarFormularioAdmin)
	select.addEventListener('change', validarFormularioAdmin)

	//
	select.addEventListener('keyup', aprobarFormularioAdminAgregar)
	select.addEventListener('keydow', aprobarFormularioAdminAgregar)
	select.addEventListener('focus', aprobarFormularioAdminAgregar)
	select.addEventListener('change', aprobarFormularioAdminAgregar)

	
});



// Event Listener de los iconos de contraseña en validacionesContactoExtra.js



// EDITAR/ELIMINAR

// Tomamos los datos de elementos Input de la seccion de EDITAR/ELIMINAR
adminUsuariosEditarInputs.forEach((input) => {
	//
	input.addEventListener('keyup', validarFormularioAdmin)
	input.addEventListener('keydown', validarFormularioAdmin)
	input.addEventListener('focus', validarFormularioAdmin)
	input.addEventListener('change', validarFormularioAdmin)

	//
	input.addEventListener('keyup', aprobarFormularioAdminEditar)
	input.addEventListener('keydown', aprobarFormularioAdminEditar)
	input.addEventListener('focus', aprobarFormularioAdminEditar)
	input.addEventListener('change', aprobarFormularioAdminEditar)

	//
	input.addEventListener('keyup', aprobarFormularioAdminEliminar)
	input.addEventListener('keydown', aprobarFormularioAdminEliminar)
	input.addEventListener('focus', aprobarFormularioAdminEliminar)
	input.addEventListener('change', aprobarFormularioAdminEliminar)
});


// Event Listener de los iconos de contraseña en validacionesContactoExtra.js
	

// Tomamos los datos de elemento Select de la seccion de EDITAR/ELIMINAR
adminUsuariosEditarSelect.forEach((select) => {
	//
	select.addEventListener('keyup', validarFormularioAdmin)
	select.addEventListener('keydow', validarFormularioAdmin)
	select.addEventListener('focus', validarFormularioAdmin)
	select.addEventListener('change', validarFormularioAdmin)

	//
	select.addEventListener('keyup', aprobarFormularioAdminEditar)
	select.addEventListener('keydow', aprobarFormularioAdminEditar)
	select.addEventListener('focus', aprobarFormularioAdminEditar)
	select.addEventListener('change', aprobarFormularioAdminEditar)

	//
	select.addEventListener('keyup', aprobarFormularioAdminEliminar)
	select.addEventListener('keydow', aprobarFormularioAdminEliminar)
	select.addEventListener('focus', aprobarFormularioAdminEliminar)
	select.addEventListener('change', aprobarFormularioAdminEliminar)
});












