$(document).ready(function(){
    $('#form1').validate({
        rules:{
            nombre:{
                required: true,
                maxlength: 75
            }
        },
        messages:{
            nombre: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 75 caracteres"
            }
        }
    });
    $('#valor').maskMoney({symbol:'$ ',precision:'0',thousands:'.'});
});
