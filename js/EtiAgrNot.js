let num = 1;
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
					num ++;
					
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click","#td-menos",function(){

					if(num >= 2){
					var parent = $(this).parents().get(0);
					$(parent).remove();
					num --;
					}
				});
			});