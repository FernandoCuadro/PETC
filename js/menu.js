
// Menu responsive
var burgerMenu = document.getElementById('burger-menu');
var show = document.getElementById('menu-responsive');

burgerMenu.addEventListener('click', function(){
    this.classList.toggle("close");
    show.classList.toggle("show");
})

// sub menu o menu desplegable dentro de menu responsive
var btnNoticias = document.getElementById('btn-noticias');
var subMenu = document.getElementById('sub-menu-noticias');

btnNoticias.addEventListener('click', function(){
    this.classList.toggle("close2");
    subMenu.classList.toggle("show2");
})

// Empieza menu de tamaño normal NO RESPONSIVE
var btnNoticiasNormalSize = document.getElementById('btn-noticias-normal-size');
var subMenuNormalSize = document.getElementById('sub-menu-noticias-normal-size');

btnNoticiasNormalSize.addEventListener('click', function(){
    this.classList.toggle("close3");
    subMenuNormalSize.classList.toggle("show3");
})