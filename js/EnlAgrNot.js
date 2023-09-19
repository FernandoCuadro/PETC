let numEnl = 1;
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicionalEnl").on('click', function(){
					
					$("#tabla1 tbody tr:eq(0)").clone().removeClass('fila-fija1').appendTo("#tabla1");
					numEnl ++;
					
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click","#td-menosEnl",function(){

					if(numEnl >= 2){
					var parent = $(this).parents().get(0);
					$(parent).remove();
					numEnl --;
					}
				});
			});