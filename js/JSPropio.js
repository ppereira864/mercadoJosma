$(document).ready(function(){

		$("#BuscarArticulos").validate({
			rules:{  	////inicia los rules

				articuloAbuscar:"required"
			
			}, 			///// CIERRRE DE RULES

			messages:{
				articuloAbuscar:"Busqueda En Blanca"
			}

		});
	
});