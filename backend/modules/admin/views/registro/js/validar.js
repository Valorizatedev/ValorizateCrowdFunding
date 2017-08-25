var facturas = 0;
$(document).ready(function() {
    $('#form1').submit(function() {
        if (!$("#keyVisitante").val()) {
            alert("Debe ingresar un visitante");
            return false;
        }
        if ($("#totalFacturas").val()=="0"){
            alert("Debe ingresar minimo una factura");
            return false;
        }
    });
    $('#form2').validate({
        rules: {
            nombre: {
                required: true
            },
            apellidos: {
                required: true
            },
            tipoDocumento: {
                required: true
            },
            numDocumento: {
                required: true
            },
            departamentoRes: {
                required: true
            },
            ciudadRes: {
                required: true
            },
            email: {
                email: true
            }
        }
    });
    $("#valor").maskMoney({symbol: '$ ', precision: '0', thousands: '.'});
    $("#fecha").datepicker({dateFormat: "yy-mm-dd"});
    $("#addfactura").click(function() {
        facturas += 1;
        $("#totalFacturas").val(facturas);
        $("#addfacturas").append(
                "<tr id='registro" + facturas + "'><td>" +
                "<input type='hidden' name='almacen_key" + facturas + "' id='almacen_key" + facturas + "' value='" + $("#almacen").val() + "'/>" +
                "<input value='" + $("#almacen option:selected").html() + "' readonly/>" +
                "</td><td>" +
                "<input value='" + $("#valor").val() + "' name='valor"+facturas+"' readonly/>" +
                "</td><td>" +
                "<a class='btn btn-primary' id='quitar' onclick='retirar(" + facturas + ")'><i class='icon-trash'></i> Eliminar</a>" +
                "</td></tr>"
                );
        $("#valor").val("0");
        $("#almacen").prop("selectedIndex", 0);
    });
});

function retirar(id) {
    facturas -= 1;
    $("#totalFacturas").val(facturas);
    $("#registro" + id).remove();
}