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
				password:"required",
				repassword:"required"

			},/////cierre de rules

			messages:{/// inicio de messages

				cedulaOrif:"!!!Campo Vacio!!!",
				nombres:"!!!Campo Vacio!!!",
				apellidos:"!!!Campo Vacio!!!",
				pais:"!!!Campo Vacio!!!",
				estado:"!!!Campo Vacio!!!",
				ciudad:"!!!Campo Vacio!!!",
				parroquia:"!!!Campo Vacio!!!",
				dirrecion:"!!!Campo Vacio!!!",
				email:"!!!Campo Vacio!!!",
				tipousuario:"!!!Campo Vacio!!!",
				hostname:"!!!Campo Vacio!!!",
				password:"!!!Campo Vacio!!!",
				repassword:"!!!Campo Vacio!!!"

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


function valPassw() {
	
	var dato1 = document.getElementById('password').value;
	var dato2 = document.getElementById('repassword').value;

	if (dato1 != dato2) {
		alert('Error!!!! Constraseña No Coinciden');
		return false;
	}

}