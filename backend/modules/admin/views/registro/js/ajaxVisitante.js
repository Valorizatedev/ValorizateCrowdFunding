$(document).ready(function() {

    $("#buscarUsuario").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: _root_ + "admin/visitante/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            value: (item.vis_num_documento ? item.vis_num_documento : "") + " - " + (item.vis_nombre ? item.vis_nombre : ""),
                            label: (item.vis_num_documento ? item.vis_num_documento : "") + " - " + (item.vis_nombre ? item.vis_nombre : ""),
                            key: item.vis_key,
                            nombre: (item.vis_nombre ? item.vis_nombre : ""),
                            documento: item.vis_num_documento,
                            telefono: item.vis_telefono,
                            direccion: item.vis_direccion
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            $("#numDocumentoVisitante").val(ui.item.documento);
            $("#nombreVisitante").val(ui.item.nombre);
            $("#telefonoVisitante").val(ui.item.telefono);
            $("#direccionVisitante").val(ui.item.direccion);
            $("#keyVisitante").val(ui.item.key);
            $("#datosVisitante").css("display", "");
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            $(this).val("");
        }
    });


    var getCiudadExp = function() {
        $.post(_root_ + 'admin/ciudad/consultarCiudad', 'valor=' + $("#departamentoExp").val(), function(datos) {
            $("#ciudadExp").html('');
            $("#ciudadExp").append('<option value="">Seleccione una Ciudad</option>');
            for (var i = 0; i < datos.length; i++) {
                $("#ciudadExp").append('<option value="' + datos[i].ciu_key + '">' + datos[i].ciu_nombre + '</option>');
            }
        }, 'json');
    }

    $("#departamentoExp").change(function() {
        if (!$("#departamentoExp").val()) {
            $("#ciudadExp").html('');
        }
        else {
            getCiudadExp();
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
});