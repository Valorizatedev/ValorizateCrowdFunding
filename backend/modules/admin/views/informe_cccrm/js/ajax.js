$(document).ready(function() {
    var getCiudad = function() {
        $.post(_root_ + 'admin/ciudad/consultarCiudad', 'valor=' + $("#departamento").val(), function(datos) {
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