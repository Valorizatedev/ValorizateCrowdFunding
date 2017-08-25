var cantidadcontacto = 0;
var cantidadproducto = 0;
var impuesto = "";
$(document).ready(function() {

    $("#buscar").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: _root_ + "admin/oportunidad/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            value: item.opo_observacion,
                            label: item.opo_observacion,
                            key: item.opo_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            
                    window.location = _root_ + "admin/oportunidad/detalles/" + ui.item.key ;
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }
    });
	
	
	
    var solicitante = "";
    $("#buscar_solicitante").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: _root_ + "admin/cliente/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        solicitante = "";
                        if (item.cli_num_documento != null) {
                            solicitante = item.cli_num_documento + " - ";
                        }
                        if (item.cli_nombre != null) {
                            solicitante += item.cli_nombre + " ";
                        }
                        return {
                            value: solicitante,
                            label: solicitante,
                            key: item.cli_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            $("#solicitante_key").val(ui.item.key);
            $("#solicitante").html("");
            $("#solicitante").append("<div><h4>"+ui.item.value+"</h4></div>");
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            $(this).val("");
        }
    });
    
	
	
	var contacto = "";
    $("#buscarProductos").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: _root_ + "admin/producto/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        var etiqueta=item.pro_referencia+"-"+item.pro_nombre+" $"+item.pro_valor;
                        return {
                            value: etiqueta,
                            label: etiqueta,
                            key: item.pro_key,
                            valor: item.pro_valor,
                            impuesto: item.imp_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            cantidadproducto += 1;
            $("#productos").append("<tr id='producto" + cantidadproducto + "'>"+
										"<td><input type='hidden' name='producto_key" + cantidadproducto + "' value='" + ui.item.key + "'/>" + ui.item.value + "</td>"+
										"<td><output id='valorproducto" + cantidadproducto + "'>" + ui.item.valor + "</output></td>\n\
										<td><input type='text' name='cantidad_producto" + cantidadproducto + "' id='cantidad_producto" + cantidadproducto + "' style='width: 25px;' onblur='calcular(" + cantidadproducto + ")'/></td>\n\
<td><input id='antesimpuesto" + cantidadproducto + "' name='antesimpuesto" + cantidadproducto + "' readonly='true' style='width: 100px;'/></td>\n\
<td><input type='hidden' id='impuesto" + cantidadproducto + "' name='impuesto" + cantidadproducto + "' value='" + ui.item.impuesto + "'/>\n\
<input class='dinero' id='despuesimpuesto" + cantidadproducto + "' name='despuesimpuesto" + cantidadproducto + "' readonly='true' style='width: 100px;'/></td>"+
"<td><a href = '#producto' class = 'btn btn-danger' id = 'quitarproducto" + cantidadproducto + "' name = 'quitar' onclick = 'quitarproducto(" + cantidadproducto + ")'> <i class = 'icon-trash'> </i>Eliminar</a></td></tr>");
            $("#num_productos").val(cantidadproducto);
            impuesto = ui.item.impuesto;
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            $(this).val("");
        }
    });
	
	
	
	
	//aqui
	
	
});




function quitarcontacto(valor) {
    cantidadcontacto -= 1;
    $("#contacto" + valor).remove();
    $("#quitarcontacto" + valor).remove();
    $("#saltocontacto" + valor).remove();
    $("#num_contactos").val(cantidadcontacto);
}


function quitarproducto(valor) {
    cantidadproducto -= 1;
    $("#producto" + valor).remove();
    $("#quitarproducto" + valor).remove();
    $("#saltoproducto" + valor).remove();
    $("#num_productos").val(cantidadproducto);
}

function calcular(valor) {
    $("#antesimpuesto" + valor).val($("#valorproducto" + valor).val() * $("#cantidad_producto" + valor).val());
    impuestos(valor);
}

function impuestos(valor) {
    //alert($("#impuesto" + valor).val());
    $.ajax({
        type: "POST",
        url: _root_ + "admin/impuesto/consultaKeyAjax",
        dataType: "json",
        data: {
            valor: $("#impuesto" + valor).val()
        },
        success: function(data) {
            $.map(data, function(item) {
                var temp = "1." + item.imp_valor;
                $("#despuesimpuesto" + valor).val(Math.round($("#antesimpuesto" + valor).val() * temp));
				
				
				//totalP
				$("#totalP").val(( parseInt($("#totalP").val()) + parseInt($("#despuesimpuesto" + valor).val() )));
            });
        }
    });
}

function saber(){
//alert("entro");
var value  = $('#exitoso').is(':checked');

//document.getElementById("form1").reset();
return value;
}



function toogle(a,b,c,d)
{

  
  
		  document.getElementById(b).style.display=a;
		  document.getElementById(c).style.display=a;
	

}

function toogle2(a,b,c)
{
  
  document.getElementById(b).style.display=a;
  document.getElementById(c).style.display=a;

}


//onchange()


function calcularfecha()
{
	     $.ajax({
                type: "POST",
                url: _root_ + "admin/oportunidad/calcularFecha",
                dataType: "json",
                data: {
                    fechaini:FechaInicio.value ,
					duracion:duracion.value
                },
                success: function(data) {
				console.log(data);
				FechaFinal.value = data;
                  /*  response($.map(data, function(item) {
                        return {
                            value: item.pro_nombre,
                            label: item.pro_nombre,
                            key: item.pro_key
                        };
                    }));*/
                }
            });
}

function returnString(){  

	//var st = ;
	$("#cierrenoexitoso").attr('{$_layoutParams.root}admin/oportunidad/cerrar/{$oportunidad}');
  
}  