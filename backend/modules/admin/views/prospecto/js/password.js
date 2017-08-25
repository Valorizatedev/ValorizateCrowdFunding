$(document).ready(function(){
    $('#form1').validate({
        rules:{
            old:{
                required: true
            },
            password:{
                required: true
            },
            confirm:{
                required: true,
                equalTo: "#password"
            }            
        },
        messages:{
            old: {
                required: "Este Campo es Requerido"
            },
            password:{
                required: "Este Campo es Requerido"
            },
            confirm:{
                required: "Este Campo es Requerido",
                equalTo: "Las contraseñas no coincide"
            }
        }
    });
});
