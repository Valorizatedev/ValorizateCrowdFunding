$(document).ready(function() {
//consultar que el correo este o no este
    $("#correor").change(function() {
	    $.ajax({
                type: "POST",
                url: _root_ + "admin/usuario/consultacorreo",
                dataType: "json",
                data: {
                    correo: correor.value
                },
                success: function(data) {
					console.log(data);
					//correo valido o no valido
					cantidad=data.length;
					console.log(cantidad);
					
					if (cantidad > 0){
					 $('#alerta').html('');
					 $('#alerta').css("display", "none");
					 $('#botonverificacion').attr('disabled', false);
					 }
					else{
					 $('#alerta').html('Correo no esta en la base de datos actualmente');
					  $('#alerta').css("display", "block");
					 $('#botonverificacion').attr('disabled', true);
					 }
                }
            });
	
  
	});
  });
function validar()
{
 $.ajax({
                type: "POST",
                url: _root_ + "admin/usuario/consultacorreo",
                dataType: "json",
                data: {
                    correo: correor.value
                },
                success: function(data) {
					console.log(data);
					//correo valido o no valido
					cantidad=data.length;
					console.log(cantidad);
					
					if (cantidad > 0){
					 $('#alerta').html('');
					 $('#alerta').css("display", "none");
					 $('#botonverificacion').attr('disabled', false);
					 }
					else{
					 $('#alerta').html('Correo no esta en la base de datos actualmente');
					 $('#alerta').css("display", "block");
					 $('#botonverificacion').attr('disabled', true);
					 }
                }
            });
}


