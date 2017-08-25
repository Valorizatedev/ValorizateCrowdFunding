$(document).ready(function(){
    $('#form1').validate({
        rules:{
            nombre:{
                required: true,
                maxlength: 75
            },
            Descripcion:{
                maxlength: 1000
            },
            nivel:{
                required: true,
                digits: true,
                maxlength: 3
            }
        },
        messages:{
            nombre: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 75 caracteres"
            },
            Descripcion:{
                maxlength: "Maximo 1000 caracteres"
            },
            nivel:{
                required: "Dato Obligatorio",
                digits: "Solo Numeros",
                maxlength: "Maximo 3 caracteres"
            }
        }
    });
});
