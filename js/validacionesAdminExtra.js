

//#################### ADMIN CONTRASEÑA AGREGAR ####################

const iconoAdminAgregarVerContraseña = document.querySelector('.formularioUsuariosAgregar .contraseña .passwordIcon');
const inputAdminAgregarContraseña = document.querySelector('.formularioUsuariosAgregar .contraseña input[name="contraUsuario"]');


// Funcion para ver/no ver la contraseña ingresada en AGREGAR
const verContraseñaAdminAgregar = (e) => {

	// En caso de que el icono que aparezca sea el de VER
	if(iconoAdminAgregarVerContraseña.classList.item(2) == "fa-eye"){

		// Lo cambiamos por el de NO VER
		iconoAdminAgregarVerContraseña.classList.remove('fa-eye');
		iconoAdminAgregarVerContraseña.classList.add('fa-eye-slash');
		iconoAdminAgregarVerContraseña.title = "Ocultar contraseña";

		// Y cambiamos el type del campo para que se pueda ver la contraseña
		inputAdminAgregarContraseña.setAttribute('type', 'text');


	// En caso de que el icono que aparezca sea el de NO VER
	}else if(iconoAdminAgregarVerContraseña.classList.item(2) == "fa-eye-slash"){

		// Lo cambiamos por el de VER
		iconoAdminAgregarVerContraseña.classList.remove('fa-eye-slash');
		iconoAdminAgregarVerContraseña.classList.add('fa-eye');
		iconoAdminAgregarVerContraseña.title = "Ver contraseña";

		// Y cambiamos el type del campo para que NO se pueda ver la contraseña
		inputAdminAgregarContraseña.setAttribute('type', 'password');

	}

}


// Mostramos el icono correspondiente, en caso de que se vea o no lo ingresado en el campo contraseña
iconoAdminAgregarVerContraseña.addEventListener('click', verContraseñaAdminAgregar);




//#################### ADMIN CONTRASEÑA EDITAR ####################


const iconoAdminEditarVerContraseña = document.querySelector('.formularioUsuariosEditar .contraseña .passwordIcon');
const inputAdminEditarContraseña = document.querySelector('.formularioUsuariosEditar .contraseña input[name="contUsuario"]');


// Funcion para ver/no ver la contraseña ingresada en EDITAR
const verContraseñaAdminEditar = (e) => {

	// En caso de que el icono que aparezca sea el de VER
	if(iconoAdminEditarVerContraseña.classList.item(2) == "fa-eye"){

		// Lo cambiamos por el de NO VER
		iconoAdminEditarVerContraseña.classList.remove('fa-eye');
		iconoAdminEditarVerContraseña.classList.add('fa-eye-slash');
		iconoAdminEditarVerContraseña.title = "Ocultar contraseña";

		// Y cambiamos el type del campo para que se pueda ver la contraseña
		inputAdminEditarContraseña.setAttribute('type', 'text');


	// En caso de que el icono que aparezca sea el de NO VER
	}else if(iconoAdminEditarVerContraseña.classList.item(2) == "fa-eye-slash"){

		// Lo cambiamos por el de VER
		iconoAdminEditarVerContraseña.classList.remove('fa-eye-slash');
		iconoAdminEditarVerContraseña.classList.add('fa-eye');
		iconoAdminEditarVerContraseña.title = "Ver contraseña";

		// Y cambiamos el type del campo para que NO se pueda ver la contraseña
		inputAdminEditarContraseña.setAttribute('type', 'password');

	}

}


// Mostramos el icono correspondiente, en caso de que se vea o no lo ingresado en el campo contraseña
iconoAdminEditarVerContraseña.addEventListener('click', verContraseñaAdminEditar);