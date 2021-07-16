$(document).ready(function(){

		$("#RegistroUser").validate({
			rules:{///// inicia rules

				cedulaOrif:"required",
				nombres:"required",
				apellidos:"required",
				pais:"required",
				estado:"required",
				ciudad:"required",
				parroquia:"required",
				dirrecion:"required",
				email:"required",
				tipousuario:"required",
				hostname:"required",
				password:"required"

			},/////cierre de rules

			messages:{/// inicio de messages

				cedulaOrif:"Llenar Campo Vacio",
				nombres:"Llenar Campo Vacio",
				apellidos:"Llenar Campo Vacio",
				pais:"Llenar Campo Vacio",
				estado:"Llenar Campo Vacio",
				ciudad:"Llenar Campo Vacio",
				parroquia:"Llenar Campo Vacio",
				dirrecion:"Llenar Campo Vacio",
				email:"Llenar Campo Vacio",
				tipousuario:"Llenar Campo Vacio",
				hostname:"Llenar Campo Vacio",
				password:"Llenar Campo Vacio"

			},//// cierre de messages

			errorPlacement: function(error, element){
			 	if (element.is(":radio")||element.is(":checkbox")) {
			 		// statement
			 			error.appendTo(element.parent());
			 	}else{
			 		error.insertAfter(element);
			 	}
			}
		});	
});