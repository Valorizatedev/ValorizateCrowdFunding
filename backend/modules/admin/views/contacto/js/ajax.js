
$(document).ready(function() {

    $("#buscar").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: location.pathname + "/consultaAjax",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            value: (item.con_num_documento ? item.con_num_documento : '') + ' - ' + (item.con_nombre ? item.con_nombre : '') + ' ' + (item.con_apellidos ? item.con_apellidos : ''),
                            label: (item.con_num_documento ? item.con_num_documento : '') + ' - ' + (item.con_nombre ? item.con_nombre : '') + ' ' + (item.con_apellidos ? item.con_apellidos : ''),
                            key: item.con_key
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            window.location = location.pathname + "/detalles/" + ui.item.key;
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
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