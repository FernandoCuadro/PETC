
// Subir nueva imagen 

let btn = document.getElementById('sin-imagen');
let input = document.getElementById('subir-nueva-imagen');


if(btn !== null){

    btn.addEventListener('click', (e) => {
        if(e.target && e.target.tagName == 'A'){
        input.click();
        }

    });
 
}
