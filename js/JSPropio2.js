
$(document).ready(function(){

	$("#IniciarUser").validate({
			rules:{///// inicia rules
				
				hostname:"required",
				password:"required"

			},/////cierre de rules

			messages:{/// inicio de messages

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