
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
                            value: item.usu_nombre,
                            label: item.usu_nombre,
                            key: item.usu_key
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

    var getCiudad = function() {
        $.post(_root_+'admin/ciudad/consultarCiudad', 'valor=' + $("#departamento").val(), function(datos) {
            $("#ciudad").html('');
            $("#ciudad").append('<option value="">Seleccione una Ciudad</option>');
            for (var i = 0; i < datos.length; i++) {
                $("#ciudad").append('<option value="' + datos[i].ciu_key + '">' + datos[i].ciu_nombre + '</option>');
            }
        }, 'json');
    }

    $("#departamento").change(function() {
        if (!$("#departamento").val()) {
            $("#ciudad").html('');
        }
        else {
            getCiudad();
        }
    });
});