$(document).ready(function(){
    $('#form1').validate({
        rules:{
            nombre:{
                required: true,
                maxlength: 150
            },
            codigo:{
                required: true,
                maxlength: 5
            },
            departamento:{
                required: true
            }
        },
        messages:{
            nombre: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 150 caracteres"
            },
            codigo: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 5 caracteres"
            }
            ,
            departamento: {
                required: "Dato Obligatorio"
            }
        }
    });
});
