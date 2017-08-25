$(document).ready(function() {
    $('#form1').validate();
    $('#numDocumento').blur(function() {
        $('#login').val($('#numDocumento').val());
    });
    $('#fecha_nacimiento').datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "1900:" + (new Date().getFullYear() + 5)});
    $('#fecha_nacimientocon').datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "1900:" + (new Date().getFullYear() + 5)});
///////////////////////////////////////////////////////////////////////////
    var allFields = $([]).add('#nombrecontacto').add('#departamentocon').add('#ciudadcon').add('#generocon').add('#direccioncon').add('#telefonocon').add('#emailcon').add('#observacionescon').add('#fecha_nacimientocon').add('#ecivilcon').add('#hijoscon')
    $("#crearVisitante").dialog({
        autoOpen: false,
        height: 550,
        width: 600,
        modal: true,
        buttons: {
            "Registrar contacto": function() {
                var bValid = true;
                bValid = bValid && $("#nombrecontacto").valid();
                bValid = bValid && $("#departamentocon").valid();
                bValid = bValid && $("#ciudadcon").valid();
                if ($("#emailcon").length >= 1)
                    bValid = bValid && $("#emailcon").valid();
                allFields.removeClass("ui-state-error");
                if (bValid == true) {
                    $.ajax({
                        type: "POST",
                        url: _root_ + "admin/contacto/nuevo",
                        dataType: "html",
                        data: {
                            guardar: 1,
                            nombre: $("#nombrecontacto").val(),
                            genero: $("#generocon").val(),
                            direccion: $("#direccioncon").val(),
                            ciudadRes: $("#ciudadcon").val(),
                            telefono: $("#telefonocon").val(),
                            email: $("#emailcon").val(),
                            observaciones: $("#observacionescon").val(),
                            fecha_nacimiento: $("#fecha_nacimientocon").val(),
                            ecivil: $("#ecivilcon").val(),
                            hijos: $("#hijoscon").val() ? $("#hijoscon").val() : 0
                        },
                        success: function(data) {
                            if (data.replace(/^\s+/g, '').replace(/\s+$/g, '') == "<script type='text/javascript'>window.location.replace(_root_+'error/access/8080/')</script><script type='text/javascript'>window.location.replace(_root_+'admin/cliente/')</script>") {
                                alert("El tiempo de session termino\nPor favor inicie session nuevamente");
                            }
                            alert("Visitante Guardado con exito");
                            allFields.val("").removeClass("ui-state-error");
                        }
                    });
                }
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        },
        close: function() {
            allFields.val("").removeClass("ui-state-error");
            $('#form2').val("");
        }
    });
    $("#registrarVisitante")
            .button()
            .click(function() {
        $("#crearVisitante").dialog("open");
    });
});

