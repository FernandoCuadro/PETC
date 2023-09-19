
// PAGINA ADMIN MOSTRAR/OCULTAR NOVEDADES
let novedad = document.getElementsByClassName('novedad');

for (let item of novedad){
    item.addEventListener('click', (e) => {
        e.target.classList.toggle('activo');
    });
};
