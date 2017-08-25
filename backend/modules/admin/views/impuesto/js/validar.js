$(document).ready(function(){
    $('#form1').validate({
        rules:{
            nombre:{
                required: true,
                maxlength: 25
            },
            valor:{
                required: true,
                digits: true,
                maxlength: 3
            }
        },
        messages:{
            nombre: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 25 caracteres"
            },
            valor:{
                required: "Dato Obligatorio",
                digits: "Solo Numeros",
                maxlength: "Maximo 3 caracteres"
            }
        }
    });
});
