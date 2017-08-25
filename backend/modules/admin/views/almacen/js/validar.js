$(document).ready(function(){
    $('#form1').validate({
        rules:{
            nombre:{
                required: true,
                maxlength: 255
            },
            piso:{
                required: true,
                maxlength: 5
            },
            bloque:{
                required: true,
                maxlength: 5
            },
            local:{
                required: true,
                maxlength: 5
            }
            
        },
        messages:{
            nombre: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 255 caracteres"
            },
            piso: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 5 caracteres"
            },
            bloque: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 5 caracteres"
            },
            local: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 5 caracteres"
            }
            
        }
    });
});
