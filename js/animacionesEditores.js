
// Subir nueva imagen 

var btn = document.getElementById('sin-imagen');
var input = document.getElementById('subir-nueva-imagen');

btn.addEventListener('click', (e) => {
    if(e.target && e.target.tagName == 'A'){
        input.click();
    }
    
});