
// PAGINA ADMIN MOSTRAR/OCULTAR NOVEDADES
var novedad = document.getElementsByClassName('novedad');

for (let item of novedad){
    item.addEventListener('click', (e) => {
        e.target.classList.toggle('activo');
    });
};



// PAGINA ADMIN MINI NAV MOSTRAR/OCULTAR

var btn = document.getElementById('btn-mini-nav');
var miniNav = document.getElementById('mini-nav');

btn.addEventListener('click', function(){
    this.classList.toggle('accionar');
    miniNav.classList.toggle('accionar');
});
