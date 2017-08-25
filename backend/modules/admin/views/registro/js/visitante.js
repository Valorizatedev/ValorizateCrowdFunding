$(document).ready(function() {
    allFields = $([]).add('#nombre').add('#apellidos').add('#tipoDocumento').add('#numDocumento').add('#departamentoRes').add('#ciudadRes').add('genero').add('#direccion').add('#telefono').add('#email').add('#observaciones').add('#fecha_nacimiento').add('#estado').add('#hijos').add('#departamentoExp').add('#ciudadExp')
    $("#crearVisitante").dialog({
        autoOpen: false,
        height: 600,
        width: 800,
        modal: true,
        buttons: {
            "Registrar Visitante": function() {
                var bValid = true;
                bValid = bValid && $("#nombre").valid();
                bValid = bValid && $("#tipoDocumento").valid();
                bValid = bValid && $("#numDocumento").valid();
                bValid = bValid && $("#departamentoRes").valid();
                bValid = bValid && $("#ciudadRes").valid();
                bValid = bValid && $("#email").valid();
                allFields.removeClass("ui-state-error");
                if (bValid == true) {
                    $.ajax({
                        type: "POST",
                        url: _root_ + "admin/visitante/nuevo",
                        dataType: "json",
                        data: {
                            guardar: 1,
                            nombre: $("#nombre").val(),
                            apellidos: $("#apellidos").val(),
                            tipoDocumento: $("#tipoDocumento").val(),
                            numDocumento: $("#numDocumento").val(),
                            ciudadExp: $("#ciudadExp").val(),
                            genero: $("#genero").val(),
                            direccion: $("#direccion").val(),
                            ciudadRes: $("#ciudadRes").val(),
                            telefono: $("#telefono").val(),
                            email: $("#email").val(),
                            observaciones: $("#observaciones").val(),
                            fecha_nacimiento: $("#fecha_nacimiento").val(),
                            estado: $("#estado").val(),
                            hijos: $("#hijos").val() ? $("#hijos").val() : 0
                        },
                        success: function(data) {
                            if (data == '\n1') {
                                alert("Visitante Guardado con exito");
                                allFields.val("");
                            } else {
                                alert("Error al crear al visitante, intentelo de nuevo");
                            }
                            //allFields.val("");//.removeClass("ui-state-error");
                        }
                    });
                }
                $(this).dialog("close");
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        },
        close: function() {
            allFields.val("").removeClass("ui-state-error");
        }
    });
    $('#fecha_nacimiento').datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "1900:" + (new Date().getFullYear() + 5)});
    $("#registrarVisitante")
            .button()
            .click(function() {
        $("#crearVisitante").dialog("open");
    });
});