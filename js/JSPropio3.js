
$(document).ready(function(){

	$("#GuardPublic").validate({
			rules:{///// inicia rules
				
				cantd:{
					range:[1,25];
				},
				imagen:"requerid"

			},/////cierre de rules

			messages:{/// inicio de messages

				cantd:{
					range:"Valor Entre 1 a 25"
				},
				imagen:"Se Solicita Este Campo"

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