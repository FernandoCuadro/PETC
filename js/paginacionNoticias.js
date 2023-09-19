

const paginas = document.querySelector('.paginasTotales').children;

let btnPrev = document.querySelector('.prev');
let btnNext = document.querySelector('.next');

let paginasArray = [];

for(hijo of paginas){

    // Colocamos todos los elementos dentro de un array
    paginasArray.push(hijo);

}


// En caso de que la primer pagina este activa
if(paginasArray[0].classList == "paginaActiva"){

    // No mostramos el btn de anterior
    btnNext.classList.remove('noMostrar');
    btnPrev.classList.add('noMostrar');

// En caso de que la ultima pagina este activa
}else if(paginasArray[paginasArray.length - 1].classList == "paginaActiva"){

    // No mostramos el btn de siguiente
    btnPrev.classList.remove('noMostrar');
    btnNext.classList.add('noMostrar');

}

