$(document).ready(function(){
    $('#form1').validate({
        rules:{
            tipoCiudadano:{
                required: true
            },
            tipoSolicitud:{
                required: true
            },
            descripcion:{
                required: true
            },
            dependencia:{
                required: true
            },
            ejeTematico:{
                required: true
            },
            responsable:{
                required: true
            }
        },
        messages:{
            tipoCiudadano: {
                required: "Este Campo es Requerido"
            },
            tipoSolicitud:{
                required: "Debe seleccionar un tipo de PQRD"
            },
            descripcion:{
                required: "Ingrese la descripcion del PQRD"
            },
            dependencia:{
                required: "Debe seleccionar la dependencia"
            },
            ejeTematico:{
                required: "Debe seleccionar un eje tematico"
            },
            responsable:{
                required: "Debe Seleccionar un responsable"
            }
        }
    });
    $('#numDocumento').blur(function(){
        $('#login').val($('#numDocumento').val());
    });
    $('#fecha_nacimiento').datepicker({dateFormat: "yy-mm-dd",changeMonth: true,changeYear: true});
    $('#tipoCiudadano').change(function(){
        switch($('#tipoCiudadano').val()){
            case '1':
                $('#divApellidos').css("display","block");
                $('#divGenero').css("display","block");
                $('#lblDepartamento').html("Deparatamento de Expedici&oacute;n*");
                $('#lblCiudad').html("Ciudad de Expedici&oacute;n*");
                break;
            case '2':
                $('#divApellidos').css("display","none");
                $('#divGenero').css("display","none");
                $('#lblDepartamento').html("Deparatamento de Registro*");
                $('#lblCiudad').html("Ciudad de Registro*");
                break;
        }
    });
});
