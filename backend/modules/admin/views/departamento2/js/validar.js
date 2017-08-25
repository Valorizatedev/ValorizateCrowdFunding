$(document).ready(function(){
    $('#form1').validate({
        rules:{
            nombre:{
                required: true,
                maxlength: 75
            },
            codigo:{
                required: true,
                maxlength: 5
            }
        },
        messages:{
            nombre: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 75 caracteres"
            },
            codigo: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 5 caracteres"
            }
        }
    });
});
