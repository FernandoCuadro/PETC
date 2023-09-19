

const contenedorEliminarContenido = document.querySelector('.eliminarContenido');
const avisoEliminarContenido = document.querySelector('.eliminarContenido p');

const btnEliminarContenido = document.querySelector('.eliminarContenido h2');
const btnEliminarContenidoIcono = document.querySelector('.eliminarContenido h2 i');

const contenedorPaginaNovedades = document.querySelector('.paginaNovedades');


btnEliminarContenido.addEventListener('click', () => {
	contenedorEliminarContenido.classList.toggle('espacioExtra')
	btnEliminarContenidoIcono.classList.toggle('girar')
	avisoEliminarContenido.classList.toggle('mostrar')
	contenedorPaginaNovedades.classList.toggle('mostrar')
});




