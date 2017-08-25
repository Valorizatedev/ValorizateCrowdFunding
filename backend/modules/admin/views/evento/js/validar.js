$(document).ready(function(){
    $('#form1').validate({
        rules:{
            nombre:{
                required: true,
                maxlength: 255
            },
            fecha:{
                required: true
            },
            descripcion:{
                required: true,
                maxlength: 1000
            }
            
        },
        messages:{
            nombre: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 255 caracteres"
            },
            fecha: {
                required: "Dato Obligatorio",
            },
            descripcion: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 1000 caracteres"
            }
            
        }
    });
    $("#fecha").datepicker({dateFormat: "yy-mm-dd"});
});
