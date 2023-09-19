
//Usado para la pantalla de carga
    var body = document.querySelector('body');
        body.style.overflow = 'hidden';

window.onload = function(){
    var contenedor = document.getElementById('contenedor-carga');

    body.style.overflow = 'auto';

    contenedor.style.visibility = 'hidden';
    contenedor.style.opacity = '0';
}







