var cantidadcontacto = parseInt($("#num_contactos").val());
$(document).ready(function() {
    //cantidadcontacto=;
   
    $("#buscar").autocomplete({
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
                        return {
                            value: (item.cli_num_documento ? item.cli_num_documento : '') + ' - ' + (item.cli_nombre ? item.cli_nombre : '') + ' ' + (item.cli_apellidos ? item.cli_apellidos : ''),
                            label: (item.cli_num_documento ? item.cli_num_documento : '') + ' - ' + (item.cli_nombre ? item.cli_nombre : '') + ' ' + (item.cli_apellidos ? item.cli_apellidos : ''),
                            key: item.cli_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
			window.location = _root_ + "admin/cliente/detalles/" + ui.item.key;
        },
        open: function() {
         //   $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
         //   $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }
    });


    var getCiudadcon = function() {
        $.post(_root_ + 'admin/ciudad/consultarCiudad', 'valor=' + $("#departamentocon").val(), function(datos) {
            $("#ciudadcon").html('');
            $("#ciudadcon").append('<option value="">Seleccione una Ciudad</option>');
            for (var i = 0; i < datos.length; i++) {
                $("#ciudadcon").append('<option value="' + datos[i].ciu_key + '">' + datos[i].ciu_nombre + '</option>');
            }
        }, 'json');
    }

    $("#departamentocon").change(function() {
        if (!$("#departamentocon").val()) {
            $("#ciudadcon").html('');
        }
        else {
            getCiudadcon();
        }
    });

    var getCiudadRes = function() {
        $.post(_root_ + 'admin/ciudad/consultarCiudad', 'valor=' + $("#departamentoRes").val(), function(datos) {
            $("#ciudadRes").html('');
            $("#ciudadRes").append('<option value="">Seleccione una Ciudad</option>');
            for (var i = 0; i < datos.length; i++) {
                $("#ciudadRes").append('<option value="' + datos[i].ciu_key + '">' + datos[i].ciu_nombre + '</option>');
            }
        }, 'json');
    }

    $("#departamentoRes").change(function() {
        if (!$("#departamentoRes").val()) {
            $("#ciudadRes").html('');
        }
        else {
            getCiudadRes();
        }
    });
    var contacto = "";
    $("#buscarContacto").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: _root_ + "admin/contacto/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        contacto = item.con_key + " - " + item.con_nombre;
                        return {
                            value: contacto,
                            label: contacto,
                            key: item.con_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            cantidadcontacto += 1;
            $("#contactos").append("<tr id='contacto" + cantidadcontacto + "'><td><input type = 'hidden' name = 'contacto_key" + cantidadcontacto + "' id = 'contacto_key" + cantidadcontacto + "' value = '" + ui.item.key + "' />" + ui.item.value + "</td><td><input type='text' name='relacion" + cantidadcontacto + "' id='relacion" + cantidadcontacto + "'/></td><td><a href = '#contacto' class = 'btn btn-danger' id = 'quitarcontacto" + cantidadcontacto + "' name = 'quitar' onclick = 'quitarcontacto(" + cantidadcontacto + ")' > Eliminar</a></td></tr>");
                    $("#num_contactos").val(cantidadcontacto);
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            $(this).val("");
        }
    });
});

function quitarcontacto(valor) {
    $("#contacto" + valor).remove();
    $("#quitarcontacto" + valor).remove();
    $("#saltocontacto" + valor).remove();
    $("#num_contactos").val(cantidadcontacto);
}