$(document).ready(function(){
    $('#form1').validate({
        rules:{
            nombre:{
                required: true,
                maxlength: 255
            },
            fecha_ini:{
                required: true
            },
            fecha_fin:{
                required: true
            },
            monto:{
                required: true,
                maxlength: 10
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
            fecha_ini: {
                required: "Dato Obligatorio",
            },
            fecha_fin: {
                required: "Dato Obligatorio",
            },
            monto: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 10 caracteres"
            }            ,
            descripcion: {
                required: "Dato Obligatorio",
                maxlength: "Maximo 1000 caracteres"
            }
            
        }
    });
    $("#fecha_ini").datepicker({dateFormat: "yy-mm-dd"});
    $("#fecha_fin").datepicker({dateFormat: "yy-mm-dd"});
    $("#monto").maskMoney({symbol:'$ ',precision:'0',thousands:'.'});
});
